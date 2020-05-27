<?php
/*
Plugin Name: WP Embedder Pack
Plugin URI: http://betterstudio.com
Description: Want to show a .pdf, .docs or even an Excel file on your site? It’s time to use Better WP Embbeder plugin to add such that file and more 40+ file types to your site easily without extra tools! Easy to use for you and your users.
Version: 1.2.2
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/

/**
 * WP_Embedder_Pack class wrapper
 *
 * @return WP_Embedder_Pack
 */
function WP_Embedder_Pack() {

	return WP_Embedder_Pack::self();
}

// Fire up the plugin
WP_Embedder_Pack();


/**
 * WP Embedder Functionality
 */
class WP_Embedder_Pack {

	/**
	 * Contains BP version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	public static $version = '1.2.2';

	/**
	 * Name of the template directory to override in theme
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public static $override_template_directory = 'wp-embedder-pack';


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
			$initialized = true;
		}

		include $this->dir_path( 'includes/functions.php' );

		include $this->dir_path( 'includes/class-wep-tinymce.php' );

		include $this->dir_path( 'includes/options/panel.php' );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 50 );

		// Initialize after bf init
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 110 );
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
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main WP_Embedder_Pack Class
			 */
			case 'self':
				$class = 'WP_Embedder_Pack';
				break;

			default:
				return null;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return null;
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
	 * @return WP_Embedder_Pack
	 */
	public static function self() {

		return self::factory();
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
			'version' => '3.10.14',
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

		$features['admin_panel'] = true;
		$features['booster']     = true;

		return $features;
	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		// Frontend enqueues
		{
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}


		// Admin enqueues Enqueue assets
		{
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_localize_script' ) );
		}

	}


	/**
	 * Callback: Used for registering scripts
	 *
	 * @hooked enqueue_scripts
	 *
	 * @since  1.0.0
	 */
	public function enqueue_scripts() {

		// Theme libraries
		bf_enqueue_style(
			'wp-embedder-pack-pro',
			bf_append_suffix( self::dir_url( '/assets/css/wpep' ), '.css' ),
			array(),
			bf_append_suffix( self::dir_path( '/assets/css/wpep' ), '.css' ),
			self::$version
		);

	}


	/**
	 * Callback: Used for registering scripts
	 *
	 * @hooked enqueue_scripts
	 *
	 * @since  1.0.0
	 */
	public function admin_enqueue_scripts() {

		wp_enqueue_script(
			'google-api',
			'https://apis.google.com/js/api.js'
		);

		wp_enqueue_script(
			'wp-embedder-pack',
			bf_append_suffix( self::dir_url( '/assets/js/admin-wpep' ), '.js' ),
			array( 'jquery', 'bf-modal', 'google-api' ),
			self::$version
		);

		wp_enqueue_style(
			'wp-embedder-pack',
			bf_append_suffix( self::dir_url( '/assets/css/admin-wpep' ), '.css' ),
			array(),
			self::$version
		);

	}


	/**
	 * @since 1.0.0
	 */
	public function admin_localize_script() {

		bf_localize_script( 'wp-embedder-pack', 'WP_Embedder_Pack_loc',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),

				'main_modal' => array(
					'header' => __( 'Embed a Document', 'wp-embedder-pack' ),
				),

				'labels' => array(
					'cancel'       => __( 'Cancel', 'wp-embedder-pack' ),
					'insert'       => __( 'Insert', 'wp-embedder-pack' ),
					//
					'media_title'  => __( 'Upload a document', 'wp-embedder-pack' ),
					'media_button' => __( 'Choose', 'wp-embedder-pack' ),
					//
					'go'           => __( 'Settings Page', 'wp-embedder-pack' ),
				),

				'warning_modal' => array(
					'icon'   => 'fa-warning',
					'header' => __( '{provider} is not ready.', 'wp-embedder-pack' ),
					'body'   => __( '{provider} is not enabled or  properly configured. please go to the plugin settings page and follow the instructions then come back and refresh this page.', 'wp-embedder-pack' ),
				),

				'api'         => array(

					'google'  => wep_google_drive_api(),
					'dropbox' => wep_dropbox_api(),
				),
				'dropbox_key' => '41zi0vl6zo7q7sr',
			)
		);
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

		if ( $type_dir === 'plugins' && $product_dir === 'wp-embedder-pack' ) {
			return false;
		}

		return $bool;
	}


	/**
	 * @param array $shortcodes
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function setup_shortcodes( $shortcodes ) {

		if ( ! class_exists( 'WEP_Shortcode' ) ) {

			include $this->dir_path( 'includes/class-wep-shortcode.php' );
		}

		$shortcodes['wp-embedder-pack'] = array(
			'shortcode_class' => 'WEP_Shortcode',
		);

		return $shortcodes;
	}

}
