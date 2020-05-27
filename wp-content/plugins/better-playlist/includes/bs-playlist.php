<?php

/**
 * Class BS_PlayList
 */
class BS_PlayList {

	/**
	 * @var string
	 */
	protected $cache_name_format = '{group}-{ID}';


	/**
	 * self instance
	 *
	 * @var array
	 */
	protected static $instance;


	/**
	 * Service Instance
	 *
	 * @var BS_PlayList_Service_Interface
	 */
	private $broad_cast_service;


	/**
	 * Sets service provide for playlist
	 *
	 * @param \BS_PlayList_Service_Interface $service
	 */
	public function set_service( BS_PlayList_Service_Interface $service ) {

		$this->broad_cast_service = $service;
	}


	/**
	 * Fetch Playlist information
	 *
	 * @param string $playlist_ID
	 * @param array  $settings misc settings
	 *
	 * @return mixed false on failure other types on success
	 */
	public function fetch_playlist_info( $playlist_ID, $settings = array() ) {

		if ( empty( $playlist_ID ) ) {
			return FALSE;
		}
		$cache_group = 'pinfo';

		// First, Check Cache
		if ( $cached = $this->get_cache( $playlist_ID, $cache_group ) ) {

			return $cached;
		}

		//Fetch Data if Cache not exists
		$playlist_info = $this->broad_cast_service->get_playlist_info( $playlist_ID, $settings );

		//Cache Fetched Data on success
		if ( $playlist_info !== FALSE ) {

			$this->set_cache( $playlist_ID, $playlist_info, $cache_group );
		}

		return $playlist_info;
	}


	/**
	 *
	 * @param string|array $videos list of the videos ID
	 *
	 * @return array list of videos ID
	 */
	private function sanitize_videos_list( $videos ) {

		if ( is_string( $videos ) ) {
			$videos = implode( ',', $videos );
		}

		$videos = array_map( 'trim', (array) $videos ); // bug fix
		$videos = array_filter( $videos );

		return $videos;
	}


	/**
	 * Create a Custom PlayList
	 *
	 * @param string $playlist_title Playlist Title
	 *
	 * @return object playlist information
	 */
	public function create_playlist( $playlist_title ) {

		$info = (object) array(
			'title' => $playlist_title
		);

		return $info;
	}


	/**
	 * Fetch Json Data From a Remote Server
	 *
	 * @param string $url
	 * @param array  $args wp_remote_get() $args
	 *
	 * @return bool|array|object $url false on failure or object|array on success
	 */
	public static function fetch_json_data( $url, $args = array() ) {
		$data = self::fetch_data( $url, $args );
		if ( $data ) {
			return json_decode( $data );
		}

		return FALSE;
	}


	/**
	 * Fetch a remove url
	 *
	 * @param string $url
	 * @param array  $args wp_remote_get() $args
	 *
	 * @return string|false string on success or false on failure.
	 */
	public static function fetch_data( $url, $args = array() ) {

		$defaults = array(
			'timeout' => 30,
		);
		$args     = wp_parse_args( $args, $defaults );

		$raw_response = wp_remote_get( $url, $args );

		if ( ! is_wp_error( $raw_response ) && 200 == wp_remote_retrieve_response_code( $raw_response ) ) {

			return wp_remote_retrieve_body( $raw_response );
		}

		return FALSE;
	}


	/****
	 *
	 *
	 * Cache Methods
	 *
	 *
	 ***/

	/***
	 * @param string $cache_key   cache name
	 * @param string $cache_group optional. cache group
	 *
	 * @return mixed cached data success or false on failure.
	 */
	protected function get_cache( $cache_key, $cache_group = 'default' ) {

		$transient_name = $this->get_cache_name( $cache_key, $cache_group );

		if ( $group_cached = get_transient( $transient_name ) ) {
			if ( isset( $group_cached[ $cache_group ] ) ) {
				return $group_cached[ $cache_group ];
			}
		}

		return FALSE;
	}


	/**
	 * Save Data in Cache Storage
	 *
	 * @param string $cache_key   name of the cache
	 * @param mixed  $data2cache  data to cache
	 * @param string $cache_group optional. cache group
	 * @param null   $expiration  optional. cache expiration time
	 *
	 * @return bool true on success or false otherwise
	 */
	protected function set_cache( $cache_key, $data2cache, $cache_group = 'default', $expiration = NULL ) {

		$transient_name = $this->get_cache_name( $cache_key, $cache_group );

		if ( ! is_int( $expiration ) || ! $expiration ) {
			$expiration = apply_filters( 'better-playlist/cache-time', HOUR_IN_SECONDS * 6 );
		}

		$current_data = get_transient( $transient_name );
		if ( ! $current_data ) {
			$current_data = array();
		}
		$current_data = (array) $current_data;

		$new_data                 = &$current_data;
		$new_data[ $cache_group ] = $data2cache;

		return set_transient( $transient_name, $new_data, $expiration );
	}


	/**
	 * Get Name of The Cache
	 *
	 * @param string $cache_key
	 * @param string $cache_group
	 *
	 * @return string cache name
	 */
	private function get_cache_name( $cache_key, $cache_group = '' ) {

		$cache_group = $this->sanitize_group_name( $cache_group );

		$replacement = array(
			'{ID}'    => $cache_key,
			'{group}' => $cache_group,
		);

		return str_replace( array_keys( $replacement ), array_values( $replacement ), $this->cache_name_format );
	}


	/**
	 * Sanitize a Group name
	 *
	 * @param string $cache_key
	 * @param string $cache_group
	 *
	 * @see set_cache  for Params DOC
	 *
	 * @return string
	 */
	private function sanitize_group_name( $cache_key, $cache_group = '' ) {

		if ( ! empty( $cache_group ) || ! is_string( $cache_group ) ) {
			return $cache_group;
		}

		return get_class( $this->broad_cast_service );
	}


	/**
	 * Filters shortcode attrs for service provider
	 *
	 * @param $atts
	 *
	 * @return mixed
	 */
	private function filter_atts( $atts ) {

		return $this->broad_cast_service->filter_atts( $atts );
	}


	/**
	 * Gets playlist videos info from service provider
	 *
	 * @param        $playlist_ID
	 * @param string $limit
	 *
	 * @return mixed
	 */
	public function get_playlist_videos_info( $playlist_ID, $limit = '' ) {

		$cache_group = 'pvinfo';

		// First, Check Cache
		if ( $cached = $this->get_cache( $playlist_ID, $cache_group ) ) {
			return $cached;
		}

		//Fetch Data if Cache not exists
		$playlist_videos = $this->broad_cast_service->get_playlist_videos_info( $playlist_ID, $limit );

		//Cache Fetched Data on success
		if ( $playlist_videos !== FALSE ) {

			$this->set_cache( $playlist_ID, $playlist_videos, $cache_group );
		}

		return $playlist_videos;
	}


	/**
	 * Gets video info from service provider
	 *
	 * @param $videos
	 *
	 * @return array|mixed
	 */
	private function get_videos_info( $videos ) {

		$videos      = $this->sanitize_videos_list( $videos );
		$cache_name  = md5( serialize( $videos ) );
		$cache_group = 'vinfo';

		// First, Check Cache
		if ( $cached = $this->get_cache( $cache_name, $cache_group ) ) {
			return $cached;
		}

		//Fetch Data if Cache not exists
		$videos_info = $this->broad_cast_service->get_videos_info( $videos );

		//Cache Fetched Data on success
		if ( $videos_info !== FALSE ) {
			$this->set_cache( $cache_name, $videos_info, $cache_group );
		}

		return $videos_info;
	}

	/**
	 * @param Array $atts ShortCode Attribute
	 *
	 * @return BS_PlayList
	 */
	public static function get_playlist( $atts ) {

		try {

			if ( empty( $atts['playlist_service'] ) || ! $atts['playlist_service'] instanceof BS_PlayList_Service_Interface ) {
				throw new Exception( 'Invalid PlayList Service Class Passed!' );
			}

			if ( ( $atts['type'] === 'custom' && empty( $atts['videos'] ) ) || ( $atts['type'] !== 'custom' && empty( $atts['playlist_url'] ) ) ) {
				throw new Exception( 'Please enter playlist URL' );
			}

			/**
			 * @var self $instance
			 */
			$instance = self::get_instance( $atts['playlist_service'] );
			$atts     = $instance->filter_atts( $atts );

			if ( $atts['type'] === 'custom' ) {
				$info   = $instance->create_playlist( $atts['playlist_title'] );
				$videos = $instance->get_videos_info( $instance->sanitize_videos_list( $atts['videos'] ) );
			} else {
				$info   = $instance->fetch_playlist_info( $atts['playlist_url'], $atts['videos_limit'] );
				$videos = $instance->get_playlist_videos_info( $atts['playlist_url'], $atts['videos_limit'] );
			}

			if ( is_array( $videos ) ) {
				$videos = array_filter( $videos );
			}
			if ( is_array( $info ) ) {
				$info = array_filter( $info );
			}

			return compact( 'info', 'videos' );

		} catch( Exception $e ) {
			// For debugging!
			// var_dump($e->getMessage());
			return FALSE;
		}
	}


	/**
	 * Gets default frame url from service provider
	 *
	 * @param $atts
	 *
	 * @return mixed
	 */
	public static function default_frame_url( $atts ) {

		return $atts['playlist_service']->default_frame_url( $atts );
	}


	/**
	 * Changes video frame URL with commanding the service provider
	 *
	 * @param $atts
	 *
	 * @return mixed
	 */
	public static function change_video_frame_url( $atts ) {

		return $atts['playlist_service']->change_video_frame_url( $atts );
	}


	/**
	 * Returns live instance of BS_Playlist
	 *
	 * @param \BS_PlayList_Service_Interface $service
	 *
	 * @return array
	 */
	private static function get_instance( BS_PlayList_Service_Interface $service ) {

		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}
		self::$instance->set_service( $service );

		return self::$instance;
	}


	/**
	 * Destructs service provider
	 */
	function __destruct() {

		$this->broad_cast_service = NULL;
	}
}
