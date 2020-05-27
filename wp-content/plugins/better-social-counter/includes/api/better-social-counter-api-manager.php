<?php


class Better_Social_Counter_API_Manager {

	/**
	 * Cache duration in second
	 *
	 * @var int
	 */
	public $cache_time = 3600;


	/**
	 * Store services handler class
	 *
	 * @var array
	 */
	public $services_list = array(

		'behance'    => 'Better_Social_Counter_Behance_API',
		'comments'   => 'Better_Social_Counter_Comments_API',
		'delicious'  => 'Better_Social_Counter_Delicious_API',
		'dribbble'   => 'Better_Social_Counter_Dribbble_API',
		'envato'     => 'Better_Social_Counter_Envato_API',
		'facebook'   => 'Better_Social_Counter_Facebook_API',
		'flickr'     => 'Better_Social_Counter_Flickr_API',
		'forrst'     => 'Better_Social_Counter_Forrst_API',
		'github'     => 'Better_Social_Counter_Github_API',
		'google'     => 'Better_Social_Counter_Google_API',
		'instagram'  => 'Better_Social_Counter_Instagram_API',
		'mailchimp'  => 'Better_Social_Counter_Mailchimp_API',
		'members'    => 'Better_Social_Counter_Members_API',
		'pinterest'  => 'Better_Social_Counter_Pinterest_API',
		'posts'      => 'Better_Social_Counter_Posts_API',
		'rss'        => 'Better_Social_Counter_RSS_API',
		'snapchat'   => 'Better_Social_Counter_SnapChat_API',
		'soundcloud' => 'Better_Social_Counter_SoundCloud_API',
		'steam'      => 'Better_Social_Counter_Steam_API',
		'telegram'   => 'Better_Social_Counter_Telegram_API',
		'twitter'    => 'Better_Social_Counter_Twitter_API',
		'vimeo'      => 'Better_Social_Counter_Vimeo_API',
		'vine'       => 'Better_Social_Counter_Vine_API',
		'vk'         => 'Better_Social_Counter_VK_API',
		'ok_ru'      => 'Better_Social_Counter_OkRu_API',
		'youtube'    => 'Better_Social_Counter_YouTube_API',
		'linkedin'   => 'Better_Social_Counter_Linkedin_API',
		'tumblr'     => 'Better_Social_Counter_Tumblr_API',
		'line'       => 'Better_Social_Counter_Line_API',
		'viber'      => 'Better_Social_Counter_Viber_API',
		'bbm'        => 'Better_Social_Counter_BBM_API',
		'appstore'   => 'Better_Social_Counter_AppStore_API',
		'android'    => 'Better_Social_Counter_Android_API',
		'_default'   => 'Better_Social_Counter_Default_API',
	);


	/**
	 * Store service provider object
	 *
	 * @var Better_Social_Counter_Service_Interface
	 */
	protected $service_instance;


	/**
	 * Prepare social counter data
	 *
	 * @param string $service_id
	 * @param string $format
	 *
	 * @return Better_Social_Counter_Data|bool false on failure or object on success.
	 */
	public function prepare_data( $service_id, $format = 'full' ) {

		if ( ! $this->load_service_provider_object( $service_id ) ) {

			$this->load_default_service_provider_object( $service_id );
		}

		if ( ! $data = $this->fetch_saved_data( $service_id ) ) {

			return false;
		}

		$cache_key = sprintf( '%s-%s-%s', $service_id, $data->id(), $format );
		$use_cache = $this->service_instance->use_cache( $format );


		if ( $use_cache ) {

			if ( $final_data = $this->get_cache( $cache_key ) ) {

				return $this->build_data_object( $final_data );
			}
		}

		if ( ! $this->service_instance->init( $data ) ) {

			return false;
		}

		if ( 'full' === $format ) {

			$count = $this->service_instance->count();
			$link  = $this->service_instance->link();

			$fetch_data = compact( 'count', 'link' );

		} else {

			$fetch_data = array(
				'link' => $this->service_instance->link(),
			);
		}

		$fetch_data = array_filter( $fetch_data, array( $this, 'filter_service_item_output' ) );

		$final_data = array_merge(
			$data->to_array(),
			$fetch_data
		);


		if ( $use_cache ) {

			$this->set_cache( $cache_key, $final_data );
		}

		return $this->build_data_object( $final_data );
	}


	public function get_default_data( $service_id, $format ) {


	}


	/**
	 * Prepare short format of the social counter data
	 *
	 * @param string $service_id
	 *
	 * @return Better_Social_Counter_Data|bool false on failure or object on success.
	 */
	public function prepare_short_data( $service_id ) {

		return $this->prepare_data( $service_id, 'short' );
	}


	/**
	 * Create new fresh data object
	 *
	 * @param $data
	 *
	 * @return Better_Social_Counter_Data|bool false on failure or object on success.
	 */
	protected function build_data_object( $data ) {

		if ( ! $data || ! is_array( $data ) ) {
			return false;
		}

		if ( ! class_exists( 'Better_Social_Counter_Data' ) ) {
			require Better_Social_Counter()->dir_path() . 'includes/class-better-social-counter-data.php';
		}

		$object = new Better_Social_Counter_Data();

		$object->_load( $data );

		return $object;

	}


	/**
	 * Get saved data for service and format it into expected format
	 *
	 * @param array $service_id
	 *
	 * @return Better_Social_Counter_Data|null null on failure or object on success
	 */
	public function fetch_saved_data( $service_id ) {

		$file_abs_path = Better_Social_Counter()->dir_path() . 'includes/api/data-adapters/';
		$file_abs_path .= "$service_id.php";

		if ( ! file_exists( $file_abs_path ) ) {

			return null;
		}

		/** @noinspection PhpIncludeInspection */
		$data = include $file_abs_path;

		return $this->build_data_object( $data );
	}


	/**
	 * Automattic and set service provider object
	 *
	 * @param string $provider name of the service provider
	 *
	 * @return bool true on success or false on failure.
	 */
	public function load_service_provider_object( $provider ) {

		if ( ! isset( $this->services_list[ $provider ] ) ) {
			return false;
		}

		$class_name = $this->services_list[ $provider ];
		//
		$filename = str_replace( '_', '-', $class_name );
		$filename = sprintf( 'class-%s.php', strtolower( $filename ) );

		if ( ! class_exists( $class_name ) ) {

			$this->include_interface();

			$provider_class_path = Better_Social_Counter()->dir_path() . "/includes/api/services/$filename";

			if ( ! file_exists( $provider_class_path ) ) {
				return false;
			}

			/** @noinspection PhpIncludeInspection */
			include $provider_class_path;
		}

		$this->set_service( new $class_name );

		return true;
	}


	public function load_default_service_provider_object( $provider ) {

		return $this->load_service_provider_object( '_default' );
	}


	//
	// Getters and Setters methods
	//

	/**
	 * Set custom service provider object
	 *
	 * @param Better_Social_Counter_Service_Interface $service
	 */
	public function set_service( Better_Social_Counter_Service_Interface $service ) {

		$this->service_instance = $service;
	}


	/**
	 * Get service provider object
	 *
	 * @return Better_Social_Counter_Service_Interface
	 */
	public function get_service() {

		return $this->service_instance;
	}


	/**
	 * Get saved cache
	 *
	 * @param string $cache_key
	 *
	 * @return mixed
	 */
	public function get_cache( $cache_key ) {

		return get_transient( 'bsc_data_' . $cache_key );
	}


	/**
	 * @param string $cache_key
	 * @param mixed  $data
	 *
	 * @return bool true if value set
	 */
	public function set_cache( $cache_key, $data ) {


		return set_transient( 'bsc_data_' . $cache_key, $data, $this->cache_time );
	}


	/**
	 * Clear all cached data
	 *
	 * @return bool true on success.
	 */
	public static function flush_cache() {

		global $wpdb;

		return (bool) $wpdb->query( 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE \'_transient_bsc_data_%\' OR option_name LIKE \'_transient_timeout_bsc_data_%\'' );
	}


	/**
	 * @access internal
	 */
	protected function include_interface() {

		if ( class_exists( 'Better_Social_Counter_Service_Interface' ) ) {
			return;
		}

		$interface_path = Better_Social_Counter()->dir_path() . '/includes/api/class-better-social-counter-service-interface.php';

		/** @noinspection PhpIncludeInspection */
		require_once $interface_path;
	}


	/**
	 * Filter services output.
	 *
	 * @param mixed $item
	 *
	 * @access internal
	 *
	 * @return bool
	 */
	public function filter_service_item_output( $item ) {

		return ! is_null( $item );
	}
}
