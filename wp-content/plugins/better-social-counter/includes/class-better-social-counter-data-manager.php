<?php


/**
 * Used for retrieving social data from social sites and caching them
 */
class Better_Social_Counter_Data_Manager {


	/**
	 * Contain live instance object class
	 *
	 * @var Better_Social_Counter_Data_Manager
	 */
	private static $instance;


	/**
	 * Cached value for counts
	 *
	 * @var array
	 */
	private $cache = array();


	/**
	 * Contain sites that supported in class
	 *
	 * @var array
	 */
	private $supported_sites = array(
		'facebook',
		'twitter',
		'google',
		'youtube',
		'dribbble',
		'vimeo',
		'delicious',
		'soundcloud',
		'github',
		'behance',
		'vk',
		'vine',
		'pinterest',
		'flickr',
		'steam',
		'instagram',
		'forrst',
		'mailchimp',
		'envato',
		'posts',
		'comments',
		'members',
		'rss',
		'telegram',
		'line',
		'viber',
		'bbm',
		'appstore',
		'android',
		'linkedin',
		'ok_ru',
		'snapchat',
		'tumblr',
	);


	/**
	 * Used for retrieving instance of class
	 *
	 * @param bool $fresh
	 *
	 * @return Better_Social_Counter_Data_Manager
	 */
	public static function self( $fresh = false ) {

		// get fresh instance
		if ( $fresh ) {
			self::$instance = new Better_Social_Counter_Data_Manager();

			return self::$instance;
		}

		if ( isset( self::$instance ) && ( self::$instance instanceof Better_Social_Counter_Data_Manager ) ) {
			return self::$instance;
		}

		self::$instance = new Better_Social_Counter_Data_Manager();

		return self::$instance;
	}


	/**
	 * Returns list of all supported sites
	 *
	 * @return array
	 */
	public function get_supported_sites() {

		return $this->supported_sites;
	}


	/**
	 * Used for retrieving data for a social site
	 *
	 * @param      $id
	 * @param bool $fresh
	 *
	 * @return bool|mixed
	 */
	public function get_transient( $id, $fresh = false ) {

		if ( isset( $this->cache[ $id ] ) && ! $fresh ) {
			return $this->cache[ $id ];
		}

		// id = better framework social counter cache ;)
		$temp = get_transient( 'better_social_counter_data_' . $id );

		if ( $temp === false ) {
			return false;
		}

		$this->cache[ $id ] = $temp;

		return $temp;
	}


	/**
	 * Save a value in WP cache system
	 *
	 * @param $id
	 * @param $data
	 *
	 * @return bool
	 */
	public function set_transient( $id, $data ) {

		return set_transient( 'better_social_counter_data_' . $id, $data, Better_Social_Counter::get_option( 'cache_time' ) * HOUR_IN_SECONDS );
	}


	/**
	 * clear cache in WP cache system
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	public function clear_transient( $id ) {

		return delete_transient( 'better_social_counter_data_' . $id );
	}


	/**
	 * Deletes cached data
	 *
	 * @param string $key
	 */
	public static function clear_cache( $key = 'all' ) {

		if ( $key == 'all' ) {

			global $wpdb;

			$wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->options WHERE option_name LIKE %s", '_transient_better_social_counter_data_%' ) );
			$wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->options WHERE option_name LIKE %s", '_transient_timeout_better_social_counter_data_%' ) );

		} else {

			self::self()->clear_transient( $key );

		}
	}


	/**
	 * used for getting sites data in out of class
	 *
	 * @param string $id
	 *
	 * @return Better_Social_Counter_Data|bool false on failure or object on success.
	 */
	public static function get_full_data( $id = '' ) {

		if ( ! class_exists( 'Better_Social_Counter_API_Manager' ) ) {
			require_once Better_Social_Counter()->dir_path() . 'includes/api/better-social-counter-api-manager.php';
		}

		$api_manager = new Better_Social_Counter_API_Manager();

		return $api_manager->prepare_data( $id );
	}


	/**
	 * used for getting sites data in out of class
	 *
	 * @param string $id
	 *
	 * @return Better_Social_Counter_Data|bool false on failure or object on success.
	 */
	public static function get_short_data( $id = '' ) {

		if ( ! class_exists( 'Better_Social_Counter_API_Manager' ) ) {
			require_once Better_Social_Counter()->dir_path() . 'includes/api/better-social-counter-api-manager.php';
		}

		$api_manager = new Better_Social_Counter_API_Manager();

		return $api_manager->prepare_short_data( $id );
	}


	/**
	 * Used for checking if a social site fields is prepared for getting data
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	public function is_active( $id ) {

		if ( ! in_array( $id, $this->supported_sites ) ) {
			return false;
		}

		switch ( $id ) {

			case 'facebook':

				return Better_Social_Counter::get_option( 'facebook_page' ) !== '';
				break;

			case 'twitter':

				return Better_Social_Counter::get_option( 'twitter_username' ) !== '';
				break;

			case 'google':

				return Better_Social_Counter::get_option( 'google_page' ) !== '';
				break;

			case 'youtube':

				return Better_Social_Counter::get_option( 'youtube_username' ) !== '';
				break;

			case 'dribbble':

				return Better_Social_Counter::get_option( 'dribbble_username' ) !== '';
				break;

			case 'vimeo':

				return Better_Social_Counter::get_option( 'vimeo_username' ) !== '';
				break;

			case 'delicious':

				return Better_Social_Counter::get_option( 'delicious_username' ) !== '';
				break;

			case 'soundcloud':

				return Better_Social_Counter::get_option( 'soundcloud_username' ) !== '' &&
				       Better_Social_Counter::get_option( 'soundcloud_api_key' ) !== '';
				break;

			case 'github':

				return Better_Social_Counter::get_option( 'github_username' ) !== '';
				break;

			case 'behance':

				return Better_Social_Counter::get_option( 'behance_username' ) !== '';
				break;

			case 'vk':

				return Better_Social_Counter::get_option( 'vk_username' ) !== '';
				break;

			case 'vine':

				return Better_Social_Counter::get_option( 'vine_profile' ) !== '' &&
				       Better_Social_Counter::get_option( 'vine_email' ) !== '' &&
				       Better_Social_Counter::get_option( 'vine_pass' ) !== '';

				break;

			case 'pinterest':

				return Better_Social_Counter::get_option( 'pinterest_username' ) !== '';
				break;

			case 'flickr':

				return Better_Social_Counter::get_option( 'flickr_group' ) !== '';
				break;

			case 'steam':

				return Better_Social_Counter::get_option( 'steam_group' ) !== '';
				break;

			case 'instagram':

				return Better_Social_Counter::get_option( 'instagram_username' ) !== '';
				break;


			case 'linkedin':

				return trim( Better_Social_Counter::get_option( 'linkedin_link' ) ) !== '';

				break;

			case 'telegram':

				return Better_Social_Counter::get_option( 'telegram_link' ) !== '';
				break;

			case 'line':

				return Better_Social_Counter::get_option( 'line_link' ) !== '';
				break;

			case 'snapchat':

				return Better_Social_Counter::get_option( 'snapchat_link' ) !== '';
				break;

			case 'viber':

				return Better_Social_Counter::get_option( 'viber_link' ) !== '';
				break;

			case 'bbm':

				return Better_Social_Counter::get_option( 'bbm_link' ) !== '';
				break;

			case 'appstore':

				return Better_Social_Counter::get_option( 'appstore_link' ) !== '';
				break;

			case 'android':

				return Better_Social_Counter::get_option( 'android_link' ) !== '';
				break;

			case 'mailchimp':

				return Better_Social_Counter::get_option( 'mailchimp_list_id' ) !== '' &&
				       Better_Social_Counter::get_option( 'mailchimp_list_url' ) !== '' &&
				       Better_Social_Counter::get_option( 'mailchimp_api_key' ) !== '';

				break;

			case 'envato':

				return Better_Social_Counter::get_option( 'envato_username' ) !== '';
				break;

			case 'posts':

				return ! ! Better_Social_Counter::get_option( 'posts_enabled' );
				break;

			case 'comments':

				return ! ! Better_Social_Counter::get_option( 'comments_enabled' );
				break;

			case 'members':

				return ! ! Better_Social_Counter::get_option( 'members_enabled' );
				break;

			case 'rss':
				return true;
				break;

			case 'ok_ru':

				return trim( Better_Social_Counter::get_option( 'ok_ru_link' ) ) !== '';
				break;

			case 'tumblr':

				return trim( Better_Social_Counter::get_option( 'tumblr_link' ) ) !== '';
				break;

			case 'forrst':

				return trim( Better_Social_Counter::get_option( 'forrst_username' ) ) !== '';
				break;

		}
	}


	/**
	 * Used for checking if a social site fields is prepared for getting data
	 *
	 * minimum requirements will be checked.
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	public function is_min_active( $id ) {


		if ( ! in_array( $id, $this->supported_sites ) ) {
			return false;
		}

		switch ( $id ) {

			case 'facebook':
			case 'twitter':
			case 'google':
			case 'youtube':
			case 'dribbble':
			case 'behance':
			case 'flickr':
			case 'linked_in':
			case 'ok_ru':
			case 'tumblr':

				return $this->is_active( $id );
				break;

			case 'vimeo':

				return Better_Social_Counter::get_option( 'vimeo_username' ) !== '';
				break;

			case 'telegram':

				return Better_Social_Counter::get_option( 'telegram_link' ) !== '';

				break;

			case 'line':

				return Better_Social_Counter::get_option( 'line_link' ) !== '';

				break;

			case 'snapchat':

				return Better_Social_Counter::get_option( 'snapchat_link' ) !== '';

				break;

			case 'viber':

				return Better_Social_Counter::get_option( 'viber_link' ) !== '';

				break;

			case 'bbm':

				return Better_Social_Counter::get_option( 'bbm_link' ) !== '';

				break;

			case 'appstore':

				return Better_Social_Counter::get_option( 'appstore_link' ) !== '';

				break;

			case 'android':

				return Better_Social_Counter::get_option( 'android_link' ) !== '';

				break;

			case 'delicious':

				return Better_Social_Counter::get_option( 'delicious_username' ) !== '';

				break;

			case 'soundcloud':

				return Better_Social_Counter::get_option( 'soundcloud_username' ) !== '';

				break;

			case 'github':

				return Better_Social_Counter::get_option( 'github_username' ) !== '';

				break;

			case 'vk':

				return Better_Social_Counter::get_option( 'vk_username' ) !== '';

				break;


			case 'linkedin':

				return trim( Better_Social_Counter::get_option( 'linkedin_link' ) ) !== '';

				break;

			case 'vine':

				return Better_Social_Counter::get_option( 'vine_profile' ) !== '';

				break;

			case 'pinterest':

				return Better_Social_Counter::get_option( 'pinterest_username' ) !== '';

				break;

			case 'steam':

				return Better_Social_Counter::get_option( 'steam_group' ) !== '';

				break;

			case 'instagram':

				return Better_Social_Counter::get_option( 'instagram_username' ) !== '';

				break;

			case 'mailchimp':

				return Better_Social_Counter::get_option( 'mailchimp_list_id' ) !== '';

				break;

			case 'envato':

				return Better_Social_Counter::get_option( 'envato_username' ) !== '';

				break;

			case 'posts':

				return Better_Social_Counter::get_option( 'posts_enabled' );

				break;

			case 'comments':

				return Better_Social_Counter::get_option( 'comments_enabled' );

				break;

			case 'members':

				return Better_Social_Counter::get_option( 'members_enabled' );

				break;

			case 'rss':

				return true;

				break;

		}
	}


	/**
	 * Used for retrieving an array that contain sites list with specified active sites for widgets backend fields
	 *
	 * @return array
	 */
	function get_widget_options_list() {

		$result       = array();
		$active_items = array();

		//
		// Facebook
		//
		$facebook_active = $this->is_active( 'facebook' );

		$temp = array(
			'facebook' => array(
				'label'     => 'Facebook',
				'css-class' => $facebook_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $facebook_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['facebook'] = $temp['facebook'];
		}


		//
		// Twitter
		//
		$twitter_active = $this->is_active( 'twitter' );

		$temp = array(
			'twitter' => array(
				'label'     => 'Twitter',
				'css-class' => $twitter_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $twitter_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['twitter'] = $temp['twitter'];
		}


		//
		// Google+
		//
		$google_active = $this->is_active( 'google' );

		$temp = array(
			'google' => array(
				'label'     => 'Google+',
				'css-class' => $google_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $google_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['google'] = $temp['google'];
		}


		//
		// Youtube
		//
		$youtube_active = $this->is_active( 'youtube' );

		$temp = array(
			'youtube' => array(
				'label'     => 'Youtube',
				'css-class' => $youtube_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $youtube_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['youtube'] = $temp['youtube'];
		}


		//
		// Telegram
		//
		$telegram_active = $this->is_active( 'telegram' );

		$temp = array(
			'telegram' => array(
				'label'     => 'Telegram',
				'css-class' => $telegram_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $telegram_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['telegram'] = $temp['telegram'];
		}


		//
		// Line
		//
		$line_active = $this->is_active( 'line' );

		$temp = array(
			'line' => array(
				'label'     => 'Line',
				'css-class' => $line_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $line_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['line'] = $temp['line'];
		}


		//
		// SnapChat
		//
		$snapchat_active = $this->is_active( 'snapchat' );

		$temp = array(
			'snapchat' => array(
				'label'     => 'SnapChat',
				'css-class' => $snapchat_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $snapchat_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['snapchat'] = $temp['snapchat'];
		}


		//
		// Viber
		//
		$viber_active = $this->is_active( 'viber' );

		$temp = array(
			'viber' => array(
				'label'     => 'Viber',
				'css-class' => $viber_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $viber_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['viber'] = $temp['viber'];
		}


		//
		// BBM
		//
		$bbm_active = $this->is_active( 'bbm' );

		$temp = array(
			'bbm' => array(
				'label'     => 'Blackberry',
				'css-class' => $bbm_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $bbm_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['bbm'] = $temp['bbm'];
		}


		//
		// AppStore
		//
		$appstore_active = $this->is_active( 'appstore' );

		$temp = array(
			'appstore' => array(
				'label'     => 'AppStore',
				'css-class' => $appstore_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $appstore_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['appstore'] = $temp['appstore'];
		}


		//
		// Google Play
		//
		$android_active = $this->is_active( 'android' );

		$temp = array(
			'android' => array(
				'label'     => 'Google Play',
				'css-class' => $android_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $android_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['android'] = $temp['android'];
		}


		//
		// Dribbble
		//
		$dribbble_active = $this->is_active( 'dribbble' );

		$temp = array(
			'dribbble' => array(
				'label'     => 'Dribbble',
				'css-class' => $dribbble_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $dribbble_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['dribbble'] = $temp['dribbble'];
		}


		//
		// Vimeo
		//
		$vimeo_active = $this->is_active( 'vimeo' );

		$temp = array(
			'vimeo' => array(
				'label'     => 'Vimeo',
				'css-class' => $vimeo_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $vimeo_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['vimeo'] = $temp['vimeo'];
		}


		//
		// Delicious
		//
		$delicious_active = $this->is_active( 'delicious' );

		$temp = array(
			'delicious' => array(
				'label'     => 'Delicious',
				'css-class' => $delicious_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $delicious_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['delicious'] = $temp['delicious'];
		}


		//
		// SoundCloud
		//
		$soundcloud_active = $this->is_active( 'soundcloud' );

		$temp = array(
			'soundcloud' => array(
				'label'     => 'SoundCloud',
				'css-class' => $soundcloud_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $soundcloud_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['soundcloud'] = $temp['soundcloud'];
		}


		//
		// Github
		//
		$github_active = $this->is_active( 'github' );

		$temp = array(
			'github' => array(
				'label'     => 'Github',
				'css-class' => $github_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $github_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['github'] = $temp['github'];
		}


		//
		// Behance
		//
		$behance_active = $this->is_active( 'behance' );

		$temp = array(
			'behance' => array(
				'label'     => 'Behance',
				'css-class' => $behance_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $behance_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['behance'] = $temp['behance'];
		}


		//
		// VK
		//
		$vk_active = $this->is_active( 'vk' );

		$temp = array(
			'vk' => array(
				'label'     => 'VK',
				'css-class' => $vk_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $vk_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['vk'] = $temp['vk'];
		}


		//
		// Vine
		//
		$vine_active = $this->is_active( 'vine' );

		$temp = array(
			'vine' => array(
				'label'     => 'Vine',
				'css-class' => $vine_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $vine_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['vine'] = $temp['vine'];
		}


		//
		// Pinterest
		//
		$pinterest = $this->is_active( 'pinterest' );

		$temp = array(
			'pinterest' => array(
				'label'     => 'Pinterest',
				'css-class' => $pinterest ? 'active-item' : 'disable-item'
			)
		);

		if ( $pinterest ) {
			$active_items = $active_items + $temp;
		} else {
			$result['pinterest'] = $temp['pinterest'];
		}


		//
		// Flickr
		//
		$flickr_active = $this->is_active( 'flickr' );

		$temp = array(
			'flickr' => array(
				'label'     => 'Flickr',
				'css-class' => $flickr_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $flickr_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['flickr'] = $temp['flickr'];
		}


		//
		// Steam
		//
		$steam_active = $this->is_active( 'steam' );

		$temp = array(
			'steam' => array(
				'label'     => 'Steam',
				'css-class' => $steam_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $steam_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['steam'] = $temp['steam'];
		}


		//
		// Instagram
		//
		$instagram_active = $this->is_active( 'instagram' );

		$temp = array(
			'instagram' => array(
				'label'     => 'Instagram',
				'css-class' => $instagram_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $instagram_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['instagram'] = $temp['instagram'];
		}

		//
		// Linkedin
		//
		$linkedin_active = $this->is_active( 'linkedin' );

		$temp = array(
			'linkedin' => array(
				'label'     => 'Linkedin',
				'css-class' => $linkedin_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $linkedin_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['linkedin'] = $temp['linkedin'];
		}


		//
		// tumblr
		//
		$tumblr_active = $this->is_active( 'tumblr' );

		$temp = array(
			'tumblr' => array(
				'label'     => 'Tumblr',
				'css-class' => $tumblr_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $tumblr_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['tumblr'] = $temp['tumblr'];
		}


		//
		// ok.ru
		//
		$ok_ru_active = $this->is_active( 'ok_ru' );

		$temp = array(
			'ok_ru' => array(
				'label'     => 'ok.ru',
				'css-class' => $ok_ru_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $ok_ru_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['ok_ru'] = $temp['ok_ru'];
		}

		//
		// Mailchimp
		//
		$mailchimp_active = $this->is_active( 'mailchimp' );

		$temp = array(
			'mailchimp' => array(
				'label'     => 'Mailchimp',
				'css-class' => $mailchimp_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $mailchimp_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['mailchimp'] = $temp['mailchimp'];
		}


		//
		// Envato
		//
		$envato_active = $this->is_active( 'envato' );

		$temp = array(
			'envato' => array(
				'label'     => 'Envato',
				'css-class' => $envato_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $envato_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['envato'] = $temp['envato'];
		}


		//
		// Posts
		//
		$posts_active = $this->is_active( 'posts' );

		$temp = array(
			'posts' => array(
				'label'     => 'Posts',
				'css-class' => $posts_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $posts_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['posts'] = $temp['posts'];
		}


		//
		// Comments
		//
		$comments_active = $this->is_active( 'comments' );

		$temp = array(
			'comments' => array(
				'label'     => 'Comments',
				'css-class' => $comments_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $comments_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['comments'] = $temp['comments'];
		}


		//
		// Members
		//
		$members_active = $this->is_active( 'members' );

		$temp = array(
			'members' => array(
				'label'     => 'Members',
				'css-class' => $members_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $members_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['members'] = $temp['members'];
		}


		//
		// RSS
		//
		$active_items['rss'] = array(
			'label'     => 'RSS',
			'css-class' => 'active-item'
		);

		// add active sites to top of list
		$result = $active_items + $result;

		return $result;
	}


	/**
	 * Used for retrieving an array that contain sites list with specified active sites for widgets backend fields
	 *
	 * @return array
	 */
	function get_deferred_widget_options_list() {

		$result       = array();
		$active_items = array();

		$saved_options = get_option( 'better_social_counter_options' );

		//
		// Facebook
		//
		$facebook_active = true;

		if ( empty( $saved_options['facebook_page'] ) ||
		     empty( $saved_options['facebook_app_secret'] ) ||
		     empty( $saved_options['facebook_app_id'] )
		) {
			$facebook_active = false;
		}

		$temp = array(
			'facebook' => array(
				'label'     => 'Facebook',
				'css-class' => $facebook_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $facebook_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['facebook'] = $temp['facebook'];
		}


		//
		// Twitter
		//
		$twitter_active = true;

		if ( empty( $saved_options['twitter_api_key'] ) ||
		     empty( $saved_options['twitter_api_secret'] ) ||
		     empty( $saved_options['twitter_username'] )
		) {
			$twitter_active = false;
		}

		$temp = array(
			'twitter' => array(
				'label'     => 'Twitter',
				'css-class' => $twitter_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $twitter_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['twitter'] = $temp['twitter'];
		}


		//
		// Google+
		//
		$google_active = true;

		if ( empty( $saved_options['google_page'] ) || empty( $saved_options['google_page_key'] ) ) {
			$google_active = false;
		}

		$temp = array(
			'google' => array(
				'label'     => 'Google+',
				'css-class' => $google_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $google_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['google'] = $temp['google'];
		}


		//
		// Telegram
		//
		$telegram_active = true;

		if ( empty( $saved_options['telegram_link'] ) ) {
			$telegram_active = false;
		}

		$temp = array(
			'telegram' => array(
				'label'     => 'Telegram',
				'css-class' => $telegram_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $telegram_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['telegram'] = $temp['telegram'];
		}


		//
		// Line
		//
		$line_active = true;

		if ( empty( $saved_options['line_link'] ) ) {
			$line_active = false;
		}

		$temp = array(
			'line' => array(
				'label'     => 'Line',
				'css-class' => $line_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $line_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['line'] = $temp['line'];
		}


		//
		// SnapChat
		//
		$snapchat_active = true;

		if ( empty( $saved_options['snapchat_link'] ) ) {
			$snapchat_active = false;
		}

		$temp = array(
			'line' => array(
				'label'     => 'SnapChat',
				'css-class' => $snapchat_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $snapchat_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['snapchat'] = $temp['snapchat'];
		}


		//
		// Viber
		//
		$viber_active = true;

		if ( empty( $saved_options['viber_link'] ) ) {
			$viber_active = false;
		}

		$temp = array(
			'line' => array(
				'label'     => 'Viber',
				'css-class' => $viber_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $viber_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['viber'] = $temp['viber'];
		}


		//
		// BBM
		//
		$bbm_active = true;

		if ( empty( $saved_options['bbm_link'] ) ) {
			$bbm_active = false;
		}

		$temp = array(
			'line' => array(
				'label'     => 'Blackberry',
				'css-class' => $bbm_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $bbm_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['bbm'] = $temp['bbm'];
		}


		//
		// AppStore
		//
		$appstore_active = true;

		if ( empty( $saved_options['appstore_link'] ) ) {
			$appstore_active = false;
		}

		$temp = array(
			'line' => array(
				'label'     => 'AppStore',
				'css-class' => $appstore_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $appstore_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['appstore'] = $temp['appstore'];
		}


		//
		// Google Play
		//
		$android_active = true;

		if ( empty( $saved_options['android_link'] ) ) {
			$android_active = false;
		}

		$temp = array(
			'line' => array(
				'label'     => 'Google Play',
				'css-class' => $android_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $android_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['android'] = $temp['android'];
		}


		//
		// Youtube
		//
		$youtube_active = true;

		if ( empty( $saved_options['youtube_username'] ) || empty( $saved_options['youtube_api_key'] ) ) {
			$youtube_active = false;
		}

		$temp = array(
			'youtube' => array(
				'label'     => 'Youtube',
				'css-class' => $youtube_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $youtube_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['youtube'] = $temp['youtube'];
		}


		//
		// Dribbble
		//
		$dribbble_active = true;

		if ( empty( $saved_options['dribbble_username'] ) || empty( $saved_options['dribbble_access_token'] ) ) {
			$dribbble_active = false;
		}

		$temp = array(
			'dribbble' => array(
				'label'     => 'Dribbble',
				'css-class' => $dribbble_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $dribbble_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['dribbble'] = $temp['dribbble'];
		}


		//
		// Vimeo
		//
		$vimeo_active = true;

		if ( empty( $saved_options['vimeo_username'] ) ) {
			$vimeo_active = false;
		}

		$temp = array(
			'vimeo' => array(
				'label'     => 'Vimeo',
				'css-class' => $vimeo_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $vimeo_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['vimeo'] = $temp['vimeo'];
		}


		//
		// Delicious
		//
		$delicious_active = true;

		if ( empty( $saved_options['delicious_username'] ) ) {
			$delicious_active = false;
		}

		$temp = array(
			'delicious' => array(
				'label'     => 'Delicious',
				'css-class' => $delicious_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $delicious_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['delicious'] = $temp['delicious'];
		}


		//
		// SoundCloud
		//
		$soundcloud_active = true;

		if ( empty( $saved_options['soundcloud_username'] ) || empty( $saved_options['soundcloud_api_key'] ) ) {
			$soundcloud_active = false;
		}

		$temp = array(
			'soundcloud' => array(
				'label'     => 'SoundCloud',
				'css-class' => $soundcloud_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $soundcloud_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['soundcloud'] = $temp['soundcloud'];
		}


		//
		// Github
		//
		$github_active = true;

		if ( empty( $saved_options['github_username'] ) ) {
			$github_active = false;
		}

		$temp = array(
			'github' => array(
				'label'     => 'Github',
				'css-class' => $github_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $github_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['github'] = $temp['github'];
		}


		//
		// Behance
		//
		$behance_active = true;

		if ( empty( $saved_options['behance_username'] ) ) {
			$behance_active = false;
		}

		$temp = array(
			'behance' => array(
				'label'     => 'Behance',
				'css-class' => $behance_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $behance_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['behance'] = $temp['behance'];
		}


		//
		// VK
		//
		$vk_active = true;

		if ( empty( $saved_options['vk_username'] ) ) {
			$vk_active = false;
		}

		$temp = array(
			'vk' => array(
				'label'     => 'VK',
				'css-class' => $vk_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $vk_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['vk'] = $temp['vk'];
		}


		//
		// Vine
		//
		$vine_active = true;

		if ( empty( $saved_options['vine_profile'] ) || empty( $saved_options['vine_email'] ) || empty( $saved_options['vine_pass'] ) ) {
			$vine_active = false;
		}

		$temp = array(
			'vine' => array(
				'label'     => 'Vine',
				'css-class' => $vine_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $vine_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['vine'] = $temp['vine'];
		}


		//
		// Pinterest
		//
		$pinterest = true;

		if ( empty( $saved_options['pinterest_username'] ) ) {
			$pinterest = false;
		}

		$temp = array(
			'pinterest' => array(
				'label'     => 'Pinterest',
				'css-class' => $pinterest ? 'active-item' : 'disable-item'
			)
		);

		if ( $pinterest ) {
			$active_items = $active_items + $temp;
		} else {
			$result['pinterest'] = $temp['pinterest'];
		}


		//
		// Flickr
		//
		$flickr_active = true;

		if ( empty( $saved_options['flickr_group'] ) || empty( $saved_options['flickr_key'] ) ) {
			$flickr_active = false;
		}

		$temp = array(
			'flickr' => array(
				'label'     => 'Flickr',
				'css-class' => $flickr_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $flickr_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['flickr'] = $temp['flickr'];
		}


		//
		// Steam
		//
		$steam_active = true;

		if ( empty( $saved_options['steam_group'] ) ) {
			$steam_active = false;
		}

		$temp = array(
			'steam' => array(
				'label'     => 'Steam',
				'css-class' => $steam_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $steam_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['steam'] = $temp['steam'];
		}


		//
		// Instagram
		//
		$instagram_active = true;

		if ( empty( $saved_options['instagram_username'] ) ) {
			$instagram_active = false;
		}

		$temp = array(
			'instagram' => array(
				'label'     => 'Instagram',
				'css-class' => $instagram_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $instagram_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['instagram'] = $temp['instagram'];
		}


		//
		// Mailchimp
		//
		$mailchimp_active = true;

		if ( empty( $saved_options['mailchimp_list_id'] ) || empty( $saved_options['mailchimp_list_url'] ) || empty( $saved_options['mailchimp_api_key'] ) ) {
			$mailchimp_active = false;
		}

		$temp = array(
			'mailchimp' => array(
				'label'     => 'Mailchimp',
				'css-class' => $mailchimp_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $mailchimp_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['mailchimp'] = $temp['mailchimp'];
		}


		//
		// Envato
		//
		$envato_active = true;

		if ( empty( $saved_options['envato_username'] ) ) {
			$envato_active = false;
		}

		$temp = array(
			'envato' => array(
				'label'     => 'Envato',
				'css-class' => $envato_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $envato_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['envato'] = $temp['envato'];
		}


		//
		// Posts
		//
		$posts_active = true;

		if ( empty( $saved_options['posts_enabled'] ) && $saved_options['posts_enabled'] == false ) {
			$posts_active = false;
		}

		$temp = array(
			'posts' => array(
				'label'     => 'Posts',
				'css-class' => $posts_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $posts_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['posts'] = $temp['posts'];
		}


		//
		// Comments
		//
		$comments_active = true;

		if ( empty( $saved_options['comments_enabled'] ) && $saved_options['comments_enabled'] == false ) {
			$comments_active = false;
		}

		$temp = array(
			'comments' => array(
				'label'     => 'Comments',
				'css-class' => $comments_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $comments_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['comments'] = $temp['comments'];
		}

		//
		// Members
		//
		$members_active = true;

		if ( empty( $saved_options['members_enabled'] ) && $saved_options['members_enabled'] == false ) {
			$members_active = false;
		}

		$temp = array(
			'members' => array(
				'label'     => 'Members',
				'css-class' => $members_active ? 'active-item' : 'disable-item'
			)
		);

		if ( $members_active ) {
			$active_items = $active_items + $temp;
		} else {
			$result['members'] = $temp['members'];
		}


		// add active sites to top of list
		$result = $active_items + $result;

		return $result;
	}


	/**
	 * Returns sites list for select option
	 *
	 * @param bool $remove_extra remove extra sites for banner shortcode
	 *
	 * @return array
	 */
	public function get_select_options_for_banner( $remove_extra = true, $add_select = false ) {

		// Temp for active sites
		$sites_list = array(
			'' => __( '-- Select Site--', 'better-studio' ),
		);

		// Make final select options
		foreach ( self::get_widget_options_list() as $id => $site ) {

			if ( $site['css-class'] == 'disable-item' ) {
				$sites_list[ $id ] = array(
					'label'    => $site['label'] . ' ' . __( '( Disable )', 'better-studio' ),
					'disabled' => true
				);
			} else {
				$sites_list[ $id ] = $site['label'];
			}
		}

		// Remove extra items
		if ( $remove_extra ) {
			unset( $sites_list['posts'] );
			unset( $sites_list['comments'] );
			unset( $sites_list['members'] );
		}

		return $sites_list;
	}
}
