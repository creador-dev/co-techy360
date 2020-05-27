<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


/**
 * Manager of screenshot providers
 */
class Publisher_Screenshot_Manager {

	/**
	 * Store services class list
	 *
	 * @var array
	 */
	protected $providers_list = array(
		'vimeo'       => array(
			'class' => 'Publisher_Fetch_Screenshot_Vimeo',
			'file'  => 'publisher-fetch-screenshot-vimeo.php',
		),
		'youtube'     => array(
			'class' => 'Publisher_Fetch_Screenshot_Youtube',
			'file'  => 'publisher-fetch-screenshot-youtube.php',
		),
		'twitter'     => array(
			'class' => 'Publisher_Fetch_Screenshot_Twitter',
			'file'  => 'publisher-fetch-screenshot-twitter.php',
		),
		'facebook'    => array(
			'class' => 'Publisher_Fetch_Screenshot_Facebook',
			'file'  => 'publisher-fetch-screenshot-facebook.php',
		),
		'dailymotion' => array(
			'class' => 'Publisher_Fetch_Screenshot_DailyMotion',
			'file'  => 'publisher-fetch-screenshot-dailymotion.php',
		),
		'aparat' => array(
			'class' => 'Publisher_Fetch_Screenshot_Aparat',
			'file'  => 'publisher-fetch-screenshot-aparat.php',
		),
	);

	/**
	 * Store video urls list
	 *
	 * @var array
	 */
	protected $video_url_list = array();


	/**
	 * Store service provider object
	 *
	 * @var Publisher_Fetch_Screenshot_Service_Interface
	 */
	protected $provider_instance;


	/**
	 * Publisher_Fetch_Screenshot constructor.
	 *
	 * @param array|string $video_url
	 */
	public function __construct( $video_url = array() ) {

		$this->set_video_url_list( $video_url );

		if ( ! class_exists( 'Publisher_Fetch_Screenshot_util' ) ) {

			require dirname( __FILE__ ) . '/publisher-fetch-screenshot-util.php';
		}

		if ( ! class_exists( 'Publisher_Fetch_Screenshot_Service_Interface' ) ) {

			require dirname( __FILE__ ) . '/' . 'publisher-fetch-screenshot-service-service-interface.php';
		}
	}


	/**
	 * Fetch videos screenshot list
	 *
	 * @return array
	 */
	public function fetch_screenshot_list() {

		$screenshots = array();

		if ( ! $this->video_url_list ) {

			return $screenshots;
		}

		$video_url_list = Publisher_Fetch_Screenshot_util::categorize_video_url_list( self::get_video_url_list() );


		foreach ( $video_url_list as $provider => $category_videos_list ) {

			if ( ! $this->load_service_provider_object( $provider ) ) {
				continue;
			}

			$screenshots = array_merge(
				$screenshots,
				$this->provider_instance->fetch_screenshots_list( $category_videos_list )
			);
		}


		return $screenshots;
	}


	/**
	 * @return array
	 */
	public function attachments_id() {

		$attachments = array();

		if ( ! $this->video_url_list ) {

			return $attachments;
		}

		$video_url_list = Publisher_Fetch_Screenshot_util::categorize_video_url_list( self::get_video_url_list() );

		foreach ( $video_url_list as $provider => $category_videos_list ) {

			if ( ! $this->load_service_provider_object( $provider ) ) {
				continue;
			}

			$attachments = array_merge(
				$attachments,
				$this->provider_instance->get_video_id_list( $category_videos_list )
			);
		}

		return $attachments;
	}


	/**
	 * Automattic and set service provider object
	 *
	 * @param string $provider name of the service provider
	 *
	 * @return bool true on success or false on failure.
	 */
	public function load_service_provider_object( $provider ) {

		if ( empty( $this->providers_list[ $provider ] ) ) {
			return false;
		}

		$class_name = $this->providers_list[ $provider ]['class'];
		$filename   = $this->providers_list[ $provider ]['file'];

		if ( ! class_exists( $class_name ) ) {

			$provider_class_path = dirname( __FILE__ ) . "/providers/$filename";

			if ( ! file_exists( $provider_class_path ) ) {
				return false;
			}

			/** @noinspection PhpIncludeInspection */
			include $provider_class_path;
		}

		$this->set_service( new $class_name );

		return true;
	}


	//
	// Getter and Setter methods
	//

	/**
	 * Get video url
	 *
	 * @return array
	 */
	public function get_video_url_list() {

		return $this->video_url_list;
	}


	/**
	 * Add to list of video urls to queue
	 *
	 * @param array|string $url_list
	 */
	public function set_video_url_list( $url_list ) {

		$this->video_url_list = array();

		foreach ( (array) $url_list as $url ) {

			$this->push_single_video_url( trim( $url ) );
		}
	}


	/**
	 * @param string $url valid video url
	 *
	 * @access internal
	 * @return bool true on success
	 */
	protected function push_single_video_url( $url ) {

		if ( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {

			return false;
		}

		array_push( $this->video_url_list, $url );

		return true;
	}


	/**
	 * Set custom service provider object
	 *
	 * @param Publisher_Fetch_Screenshot_Service_Interface $service
	 */
	public function set_service( Publisher_Fetch_Screenshot_Service_Interface $service ) {

		$this->provider_instance = $service;
	}


	/**
	 * Get service provider object
	 *
	 * @return Publisher_Fetch_Screenshot_Service_Interface
	 */
	public function get_service() {

		return $this->provider_instance;
	}

}
