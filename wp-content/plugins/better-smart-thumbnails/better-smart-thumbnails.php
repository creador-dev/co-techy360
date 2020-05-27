<?php
/*
Plugin Name: Smart Thumbnails
Plugin URI: http://betterstudio.com
Description: Create Better and Smarter Thumbnails.
Version: 1.0.0
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
Requires at least: 4.5.0
*/

/**
 * Better_Smart_Thumbnails class wrapper
 *
 * @return Better_Smart_Thumbnails
 */
function Better_Smart_Thumbnails() {

	return Better_Smart_Thumbnails::self();
}

// Fire up the plugin
Better_Smart_Thumbnails();


/**
 * Better Comments Functionality
 */
class Better_Smart_Thumbnails {

	/**
	 * @var array
	 */
	protected $focus_point = array();

	/**
	 * Current plugin version number
	 *
	 * @var string
	 */
	public static $version = '1.0.0';


	/**
	 * Contains BR option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'smart-thumbnails';

	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 * Initialize!
	 */
	function __construct() {

		// make sure following code only one time run
		static $initialized;

		if ( $initialized ) {
			return;
		} else {
			$initialized = TRUE;
		}

		add_action( 'better-framework/after_setup', array( $this, 'init' ) );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		// Add option panel
		include $this->dir_path( 'includes/options/panel.php' );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 50 );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );
	}


	/**
	 * Used for accessing plugin directory URL
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_url( $address = '' ) {

		static $url;

		if ( is_null( $url ) ) {
			$url = trailingslashit( plugin_dir_url( __FILE__ ) );
		}

		return $url . ltrim( $address, '/' );
	}


	/**
	 * Used for accessing plugin directory path
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_path( $address = '' ) {

		static $path;

		if ( is_null( $path ) ) {
			$path = trailingslashit( plugin_dir_path( __FILE__ ) );
		}

		return $path . ltrim( $address, '/' );
	}


	/**
	 * Returns current version
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;
	}


	/**
	 * Used for retrieving options simply and safely for next versions
	 *
	 * @param string $option_key
	 *
	 * @return mixed|null
	 */
	public static function get_option( $option_key ) {

		return bf_get_option( $option_key, self::$panel_id );
	}


	/**
	 * Build the required object instance
	 *
	 * @param string $object
	 * @param bool   $fresh
	 * @param bool   $just_include
	 *
	 * @return self|null
	 */
	public static function factory( $object = 'self', $fresh = FALSE, $just_include = FALSE ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Better_Smart_Thumbnails Class
			 */
			case 'self':
				$class = 'Better_Smart_Thumbnails';
				break;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return NULL;
		}

		// don't cache fresh objects
		if ( $fresh ) {
			return new $class;
		}

		self::$instances[ $object ] = new $class;

		return self::$instances[ $object ];
	}


	/**
	 * Used for accessing alive instance class
	 *
	 * @since 1.0
	 *
	 * @return Better_Smart_Thumbnails
	 */
	public static function self() {

		return self::factory();
	}


	/**
	 * @hooked better-framework/after_setup
	 *
	 * @since  1.0.0
	 */
	public function init() {

		if ( ! self::get_option( 'enable' ) ) {
			return;
		}

		// Enqueue assets
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_admin' ) );

		add_filter( 'image_resize_dimensions', array( $this, 'resize_dimensions' ), 100, 6 );

		// Do not crop medium image size because it will show for preview image on `Featured Image` modal
		add_filter( 'pre_option_medium_crop', '__return_false', 99 );

		add_filter( 'attachment_fields_to_edit', array( $this, 'pass_data2_media_modal' ), 30, 2 );

		add_action( 'wp_ajax_bt-regenerate-thumbnails', array( $this, 'ajax_get_crop_image_data' ) );
		add_action( 'wp_ajax_bt-preview-thumbnails', array( $this, 'ajax_get_preview_image_data' ) );

		if ( self::get_option( 'force-clear-cache' ) ) {

			add_filter( 'wp_get_attachment_metadata', array( $this, 'append_time2images' ) );

		}
	}


	/**
	 * Adds included BetterFramework to loader
	 *
	 * @param $frameworks
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function better_framework_loader( $frameworks ) {

		$frameworks[] = array(
			'version' => '3.9.0',
			'path'    => self::dir_path( 'includes/libs/better-framework/' ),
			'uri'     => self::dir_url( 'includes/libs/better-framework/' ),
		);

		return $frameworks;
	}


	/**
	 * Setups features of BetterFramework
	 *
	 * @param array $features
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function setup_bf_features( $features ) {

		$features['admin_panel'] = TRUE;

		return $features;
	}


	/**
	 * @param int $attachment_id
	 *
	 * @since    1.0.0
	 * @return array
	 */
	protected function delete_useless_thumbnails( $attachment_id ) {

		if ( ! class_exists( 'ST_CleanUp_Thumbnail' ) ) {

			require self::dir_path( 'includes/class-st-cleanup-thumbnails.php' );
		}

		$cleanup = new ST_CleanUp_Thumbnail( $attachment_id );

		$cleanup->cleanup();
	}


	/**
	 * @hooked wp_ajax_bt-regenerate-thumbnails
	 *
	 * @since  1.0.0
	 */
	public function ajax_get_crop_image_data() {

		if ( empty( $_REQUEST['thumbnail_id'] ) || ! isset( $_REQUEST['focus_x'] ) || ! isset( $_REQUEST['focus_y'] ) ) {
			return;
		}

		$attachment_id = intval( $_REQUEST['thumbnail_id'] );

		check_ajax_referer( $this->get_nonce_key( $attachment_id ), 'nonce' );

		$focus_x = intval( $_REQUEST['focus_x'] ) / 100;
		$focus_y = intval( $_REQUEST['focus_y'] ) / 100;

		// Validate x, y values

		if ( ! ( $focus_x >= 0 && $focus_x <= 1 ) ) {
			return;
		}

		if ( ! ( $focus_y >= 0 && $focus_y <= 1 ) ) {
			return;
		}

		$this->focus_point = array( $focus_x, $focus_y );

		$this->set_focus_point( $attachment_id, $focus_x, $focus_y );

		$metadata = wp_generate_attachment_metadata( $attachment_id, get_attached_file( $attachment_id ) );
		//
		$metadata['bt-time'] = time();

		wp_update_attachment_metadata( $attachment_id, $metadata );

		if ( self::get_option( 'delete-unused-thumbnail' ) ) {
			$this->delete_useless_thumbnails( $attachment_id );
		}

		wp_send_json_success( array( 'message' => __( 'All thumbnails has been successfully generated.', 'smart-thumbnails' ) ) );
	}


	/**
	 * @hooked wp_ajax_bt-preview-thumbnails
	 *
	 * @since  1.0.0
	 */
	public function ajax_get_preview_image_data() {

		if ( empty( $_REQUEST['thumbnail_id'] ) ) {
			return;
		}

		$attachment_id = intval( $_REQUEST['thumbnail_id'] );

		check_ajax_referer( $this->get_nonce_key( $attachment_id ), 'nonce' );

		$data = array();

		$data['l10n'] = array(
			'all_l10n' => __( 'All', 'smart-thumbnails' ),
			'header'   => __( 'Preview Cropped Images', 'smart-thumbnails' ),
		);

		$data['images'] = array();

		$metadata = wp_get_attachment_metadata( $attachment_id );

		if ( ! empty( $metadata['sizes'] ) ) {

			$base_url = wp_upload_dir();
			$base_url = $base_url['baseurl'];
			$sub_dir  = dirname( $metadata['file'] );


			foreach ( $metadata['sizes'] as $id => $size ) {

				$file = $size['file'];

				array_push( $data['images'], array(
					'id'    => $id,
					'img'   => "$base_url/$sub_dir/$file",
					'label' => ucwords( str_replace( array( '-', '_' ), ' ', $id ) ),
				) );
			}
		}

		wp_send_json_success( compact( 'data' ) );
	}


	/**
	 *
	 * @param array   $form_fields An array of attachment form fields.
	 * @param WP_Post $post        The WP_Post attachment object.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function pass_data2_media_modal( $form_fields, $post ) {

		$nonce             = sprintf( '<input value="%s" class="bt-regenerate-nonce" type="hidden">', esc_attr( $this->get_nonce( $post->ID ) ) );
		$saved_focus_point = sprintf( '<input value="%s" class="bt-focus-point-xy" type="hidden">', esc_attr( $this->get_focus_point( $post->ID ) ) );


		$form_fields['bt-regenerate-nonce'] = array(
			'show_in_edit' => FALSE,
			'tr'           => $nonce . $saved_focus_point,
		);

		return $form_fields;
	}


	/**
	 * @param null|mixed $null   Whether to preempt output of the resize dimensions.
	 * @param int        $orig_w Original width in pixels.
	 * @param int        $orig_h Original height in pixels.
	 * @param int        $dest_w New width in pixels.
	 * @param int        $dest_h New height in pixels.
	 * @param bool|array $crop   Whether to crop image to specified width and height or resize.
	 *
	 * @return array
	 */
	function resize_dimensions( $null, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {

		if ( ! $crop ) {
			return $null;
		}

		$is_portrait = ( $orig_w + ( $orig_h * 0.14 ) ) < $orig_h;

		if ( $is_portrait && empty( $this->focus_point ) ) {

			if ( Better_Smart_Thumbnails::get_option( 'portrait-default-top' ) ) {
				$this->focus_point = array( 0.5, 0 );
			}
		}

		if ( empty( $this->focus_point ) ) {
			return $null;
		}

		if ( ! self::get_option( 'enlarge-smaller' ) ) {

			$dest_w = min( $dest_w, $orig_w );
			$dest_h = min( $dest_h, $orig_h );
		}

		$dest_x     = $dest_y = 0;
		$size_ratio = max( $dest_w / $orig_w, $dest_h / $orig_h );

		$crop_w = round( $dest_w / $size_ratio );
		$crop_h = round( $dest_h / $size_ratio );

		$s_x = floor( ( $orig_w - $crop_w ) * $this->focus_point[0] );
		$s_y = floor( ( $orig_h - $crop_h ) * $this->focus_point[1] );

		// The canvas is the same as the resulting image.
		$dst_canvas_w = $dest_w;
		$dst_canvas_h = $dest_h;

		if (
			$dest_w >= $orig_w &&
			$dest_h >= $orig_h
		) {
			return $null;
		}

		return array(
			(int) $dest_x,
			(int) $dest_y,
			(int) $s_x,
			(int) $s_y,
			(int) $dest_w,
			(int) $dest_h,
			(int) $crop_w,
			(int) $crop_h,
			(int) $dst_canvas_w,
			(int) $dst_canvas_h
		);
	}


	/**
	 * @param int $thumbnail_id
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function get_nonce( $thumbnail_id ) {

		return wp_create_nonce( $this->get_nonce_key( $thumbnail_id ) );
	}


	/**
	 * @param int $thumbnail_id
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function get_nonce_key( $thumbnail_id ) {

		return sprintf( 'ajax-protect-%d', $thumbnail_id );
	}


	/**
	 * Used for registering scripts in admin area
	 *
	 * @hooked admin_enqueue_scripts
	 *
	 * @since  1.0.0
	 */
	public function enqueue_scripts_admin() {

		bf_enqueue_script(
			'smart-thumbnails',
			bf_append_suffix( self::dir_url( '/assets/js/better-smart-thumbnails' ), '.js' ),
			array(),
			bf_append_suffix( self::dir_path( '/assets/js/better-smart-thumbnails' ), '.js' ),
			self::$version
		);

		bf_enqueue_style(
			'smart-thumbnails',
			bf_append_suffix( self::dir_url( '/assets/css/better-smart-thumbnails' ), '.css' ),
			array(),
			bf_append_suffix( self::dir_path( '/assets/css/better-smart-thumbnails' ), '.css' ),
			self::$version
		);

		$this->localize_script();
	}


	/**
	 * Print localization vars.
	 *
	 * @hooked wp_enqueue_scripts
	 *
	 * @since  1.0.0
	 */
	public function localize_script() {

		bf_localize_script( 'smart-thumbnails', 'st_loc', array(

			'translate' => array(
				'preview' => __( 'Preview Images', 'smart-thumbnails' ),
			),

			'grid'                 => (bool) self::get_option( 'grid' ),
			'default_fp'           => $this->default_focus_point(),
			'portrait_default_top' => (booL) Better_Smart_Thumbnails::get_option( 'portrait-default-top' ),
		) );
	}


	/**
	 * Enable Oculus error logging system for plugin
	 *
	 * @hooked better-framework/oculus/logger/filter
	 *
	 * @access private
	 *
	 * @param boolean $bool previous value
	 * @param string  $product_dir
	 * @param string  $type_dir
	 *
	 * @return bool true if error belongs to plugin, previous value otherwise.
	 */
	public function oculus_logger( $bool, $product_dir, $type_dir ) {

		if ( $type_dir === 'plugins' && $product_dir === 'smart-thumbnails' ) {
			return FALSE;
		}

		return $bool;
	}


	/**
	 * @hooked wp_get_attachment_metadata
	 *
	 * @param array|bool $data    Array of meta data for the given attachment, or false
	 *                            if the object does not exist.
	 *
	 * @since  1.0.0
	 * @return array|bool
	 */
	public function append_time2images( $data ) {

		if ( ! $data || empty( $data['bt-time'] ) ) {

			return $data;
		}

		$time         = $data['bt-time'];
		$data['file'] .= '?' . $time;

		if ( ! empty( $data['sizes'] ) ) {

			$sizes = array();

			foreach ( $data['sizes'] as $size => $info ) {

				$info['file'] .= '?' . $time;

				$sizes[ $size ] = $info;
			}

			$data['sizes'] = $sizes;
		}

		return $data;
	}


	/**
	 * Save attachment image focus point
	 *
	 * @param int $attachment_id
	 * @param int $focus_x
	 * @param int $focus_y
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function set_focus_point( $attachment_id, $focus_x, $focus_y ) {

		return (bool) update_post_meta( $attachment_id, 'bt-focus-point', "$focus_x-$focus_y" );
	}


	/**
	 * Save attachment image focus point
	 *
	 * @param int $attachment_id
	 *
	 * @since 1.0.0
	 * @return string "x-y" on success
	 */
	public function get_focus_point( $attachment_id ) {

		return get_post_meta( $attachment_id, 'bt-focus-point', TRUE );
	}


	/**
	 * Get default image focus point.
	 *
	 * @since 1.0.0
	 * @return array x,y in position values in 0-1 range
	 */
	public function default_focus_point() {

		list( $y_position_name, $x_position_name ) = explode( '-', self::get_option( 'default-focus-point' ), 2 );

		$location_percentage = array(

			'x' => array(
				'left'   => 0.165,
				'center' => 0.5,
				'right'  => 0.835,
			),

			'y' => array(
				'top'    => 0.165,
				'center' => 0.5,
				'bottom' => 0.835,
			),
		);

		if ( isset( $location_percentage['y'][ $y_position_name ] ) && isset( $location_percentage['x'][ $x_position_name ] ) ) {

			return array(
				$location_percentage['x'][ $x_position_name ],
				$location_percentage['y'][ $y_position_name ]
			);
		}

		return array( 50, 50 );
	}
}
