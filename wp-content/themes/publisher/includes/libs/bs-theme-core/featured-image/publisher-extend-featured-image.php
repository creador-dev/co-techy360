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
 * WordPress featured images functionality provider
 */
class Publisher_Extend_Featured_Image {

	/**
	 * Store live singleton instance
	 *
	 * @var self
	 */
	protected static $instance;

	/**
	 * @var Publisher_Screenshot_Manager
	 */
	protected $screenshot;


	/**
	 * Start running the library!
	 *
	 * @return self
	 */
	public static function Run() {

		if ( ! self::$instance instanceof self ) {

			self::$instance = new self();

			if ( did_action( 'init' ) ) {

				self::$instance->init();

			} else {

				add_action( 'init', array( self::$instance, 'init' ) );

			}
		}

		return self::$instance;
	}


	/**
	 * Apply hooks
	 */
	public function init() {

		if ( ! apply_filters( 'publisher-theme-core/featured-image/enable', true ) ) {
			return;
		}


		if ( ! class_exists( 'Publisher_Screenshot_Manager' ) ) {

			/** @noinspection PhpIncludeInspection */
			require Publisher_Theme_Core()->get_dir_path( 'featured-image/fetch-screenshot/' . 'publisher-screenshot-manager.php' );
		}

		$this->screenshot = new Publisher_Screenshot_Manager;

		add_action( 'wp_insert_post', array( $this, 'catch_video_post_thumbnail' ) );

		if ( ! is_admin() || bf_is_doing_ajax() ) {

			$this->video_screenshot_as_thumbnail();
		}
	}


	/**
	 * Register hook to change posts thumbnail to video screenshot if needed
	 */
	protected function video_screenshot_as_thumbnail() {

		if ( apply_filters( 'publisher-theme-core/featured-image/replace-video-screenshot', false ) ) {

			add_filter( 'get_post_metadata', array( $this, 'replace_thumbnail_id_with_screenshot' ), 3, 3 );
		}
	}


	/**
	 * Replace post thumbnail id with video screenshot
	 *
	 * @param null   $null
	 * @param int    $post_id
	 * @param string $meta_key
	 *
	 * @hooked get_post_metadata
	 *
	 * @return mixed
	 */
	public function replace_thumbnail_id_with_screenshot( $null, $post_id, $meta_key ) {

		if ( '_thumbnail_id' !== $meta_key ) {

			return $null;
		}

		if ( $video_screenshot = get_post_meta( $post_id, 'publisher-video-featured-image-id', true ) ) {

			return $video_screenshot;
		}

		return $null;
	}


	/**
	 * Fetch video screenshot and save it as media
	 *
	 * @param int $post_id
	 *
	 * @hooked wp_insert_post
	 *
	 * @return bool true on success
	 */
	public function catch_video_post_thumbnail( $post_id ) {

		if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {

			return false;
		}

		if ( ! $video_url_list = get_post_meta( $post_id, '_featured_embed_code', true ) ) {

			return false;
		}

		$video_url_list = array_filter( explode( "\n", $video_url_list ) );

		$this->screenshot->set_video_url_list( $video_url_list );

		$id_list = $this->screenshot->attachments_id();

		if ( empty( $id_list ) ) {

			return false;
		}

		$first_video_url      = key( $id_list );
		$first_video_id       = $id_list[ $first_video_url ];
		$first_video_provider = Publisher_Fetch_Screenshot_util::detect_service_provider( $first_video_url );


		if ( ! $attachment_id = $this->get_attachment_video_screenshot( $first_video_id, $first_video_provider ) ) {

			$attachment_id = $this->catch_screenshot( $first_video_url, $first_video_id, $post_id, $first_video_provider );
		}

		if ( ! $attachment_id ) {

			return false;
		}

		update_post_meta( $post_id, 'publisher-video-featured-image-id', $attachment_id );

		if ( apply_filters( 'publisher-theme-core/featured-image/set-video-screenshot', ! has_post_thumbnail( $post_id ), $attachment_id, $post_id ) ) {

			set_post_thumbnail( $post_id, $attachment_id );
		}

		return true;
	}


	/**
	 * Get saved video screenshot
	 *
	 * @param string $video_id
	 * @param int    $provider
	 *
	 * @return int
	 */
	protected function get_attachment_video_screenshot( $video_id, $provider ) {

		global $wpdb;

		$sql = $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'publisher-video-screenshot' AND meta_value = %s LIMIT 1", "$provider-$video_id" );

		return (int) $wpdb->get_var( $sql );
	}


	/**
	 * Fetch video screen-shot and save it as a media
	 *
	 * @param string $video_url
	 * @param string $video_id
	 * @param int    $post_id
	 * @param string $provider
	 *
	 * @return int new media id
	 */
	protected function catch_screenshot( $video_url, $video_id, $post_id, $provider ) {

		$this->screenshot->set_video_url_list( $video_url );


		if ( ! $thumbnails = $this->screenshot->fetch_screenshot_list() ) {
			return 0;
		}

		return $this->save_screenshot( array_shift( $thumbnails ), $video_url, $video_id, $post_id, $provider );
	}


	/**
	 * Download thumbnail image and attach it to media
	 *
	 * @param string $thumbnail_url
	 * @param string $video_url
	 * @param string $video_id
	 * @param int    $post_id
	 * @param string $provider
	 *
	 * @access internal
	 *
	 * @return int
	 */
	protected function save_screenshot( $thumbnail_url, $video_url, $video_id, $post_id, $provider ) {

		if ( ! function_exists( 'download_url' ) ) {

			require ABSPATH . '/wp-admin/includes/file.php';
		}

		if ( ! function_exists( 'media_handle_sideload' ) ) {

			require ABSPATH . '/wp-admin/includes/media.php';
		}

		if ( ! function_exists( 'wp_read_image_metadata' ) ) {
			require ABSPATH . '/wp-admin/includes/image.php';
		}
		
		$file_array         = array();
		$file_array['name'] = basename( $thumbnail_url );

		// Download file to temp location.
		$file_array['tmp_name'] = download_url( $thumbnail_url );

		// If error storing temporarily, return the error.
		if ( is_wp_error( $file_array['tmp_name'] ) ) {
			return 0;
		}

		// Do the validation and storage stuff.
		$attachment_id = media_handle_sideload(
			$file_array,
			$post_id,
			sprintf( "Automatic downloaded screenshots from %s by Publisher", $video_url )
		);

		if ( ! $attachment_id || is_wp_error( $attachment_id ) ) {
			return 0;
		}

		add_post_meta( $attachment_id, 'publisher-video-screenshot', "$provider-$video_id" );

		return $attachment_id;
	}
}


Publisher_Extend_Featured_Image::Run();
