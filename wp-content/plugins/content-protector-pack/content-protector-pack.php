<?php
/*
Plugin Name: Content Protector Pack
Plugin URI: http://betterstudio.com
Description: Want to stop robbers to copy your site content and images? You can usee Better Content Protector to disable copy and right click on your site and so many more features to abandon the robbers! Keep your content safe.
Version: 1.1.1
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
Requires at least: 4.5.0
*/

/**
 * Content_Protector_Pack class wrapper
 *
 * @return Content_Protector_Pack
 */
function Content_Protector_Pack() {

	return Content_Protector_Pack::self();
}

// Fire up the plugin
Content_Protector_Pack();


/**
 * Content Protector Pack Functionality
 */
class Content_Protector_Pack {

	/**
	 * Current plugin version number
	 *
	 * @var string
	 */
	public static $version = '1.1.1';


	/**
	 * Contains BR option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'content-protector-pack';

	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();

	/**
	 * List of active modules.
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	public static $modules = array(

		'obfuscator' => array(
			'class' => 'CPP_Obfuscator',
			'file'  => 'obfuscator/class-cpp-obfuscator.php',
		),

		'content-protection' => array(
			'class' => 'CPP_Content_Protection',
			'file'  => 'content-protection/class-cpp-content-protection.php',
		),
	);


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

		// core function
		include self::dir_path( 'includes/core-function.php' );

		// Add option panel
		include $this->dir_path( 'includes/options/panel.php' );
		// Add metabox
		include $this->dir_path( 'includes/options/metabox.php' );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 50 );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		add_action( 'template_redirect', array( $this, 'init' ), 22 );

		// Initialize Watermark handler
		self::factory( 'watermark' )->init();
		self::factory( 'web-server' )->init();

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_admin' ) );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		register_deactivation_hook( __FILE__, array( $this, 'undo_htaccess_changes' ) );
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
			 * Main Content_Protector_Pack Class
			 */
			case 'self':
				$class = 'Content_Protector_Pack';
				break;

			/**
			 * Watermark Class
			 */
			case 'watermark':

				$class = 'CPP_Image_Watermark';

				if ( ! class_exists( $class ) ) {

					require self::dir_path( 'includes/class-cpp-image-watermark.php' );
				}

				break;

			/**
			 * Web Server Class
			 */
			case 'web-server':

				if ( ! class_exists( 'CPP_Web_Server_Configuration' ) ) {
					require Content_Protector_Pack::dir_path( 'includes/web-server/class-cpp-web-server-configuration.php' );
				}

				$class = 'CPP_Web_Server_Config_Modifier';

				if ( ! class_exists( $class ) ) {

					require self::dir_path( 'includes/web-server/class-cpp-web-server-config-modifier.php' );
				}

				break;

			default:

				if ( ! isset( self::$modules[ $object ] ) ) {
					return;
				}

				if ( ! class_exists( self::$modules[ $object ]['class'] ) ) {
					include cpp_module_path( self::$modules[ $object ]['file'] );
				}

				$class = self::$modules[ $object ]['class'];

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
	 * @return Content_Protector_Pack
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
			'version' => '3.10.3',
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

		return $features;
	}


	/**
	 * @hooked init
	 *
	 * @since  1.0.0
	 */
	public function init() {

		if ( ! $this->is_active() ) {
			return;
		}

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'localize_script' ) );

		$this->include_modules();

		if ( apply_filters( 'content-protector-pack/buffer-output/enable', false ) ) {

			add_action( 'wp_head', array( $this, 'output_buffer_start' ), 2 );
			add_action( 'wp_footer', 'ob_end_flush', 9e4, 0 );
		}
	}


	/**
	 * Load modules.
	 *
	 * @since 1.0.0
	 */
	protected function include_modules() {

		foreach ( self::$modules as $module => $_ ) {

			self::factory( $module )->init();
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

		bf_enqueue_script(
			'content-protector-pack',
			bf_append_suffix( self::dir_url( '/assets/js/content-protector-pack' ), '.js' ),
			array( 'jquery', 'bf-modal' ),
			bf_append_suffix( self::dir_path( '/assets/js/content-protector-pack' ), '.js' ),
			self::$version
		);
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
			'content-protector-pack-admin',
			bf_append_suffix( self::dir_url( '/assets/js/content-protector-pack-admin' ), '.js' ),
			array( 'jquery', 'bf-modal' ),
			bf_append_suffix( self::dir_path( '/assets/js/content-protector-pack-admin' ), '.js' ),
			self::$version
		);
	}


	/**
	 * Print localization vars.
	 *
	 * @hooked wp_enqueue_scripts
	 *
	 * @since  1.0.0
	 */
	public function localize_script() {

		bf_localize_script( 'content-protector-pack', 'cpp_loc', apply_filters( 'content-protector-pack/localize', array() ) );
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

		if ( $type_dir === 'plugins' && $product_dir === 'content-protector-pack' ) {
			return false;
		}

		return $bool;
	}


	/**
	 * @since 1.0.0
	 *
	 * @return bool true if active
	 */
	public function is_active() {

		if ( $this->bypass_protection_for_user() ) {
			return false;
		}

		if ( $this->bypass_protection_for_query() ) {
			return false;
		}

		if ( is_singular() && get_post_meta( get_queried_object_id(), 'protect_post', true ) ) {
			return false;
		}

		return true;
	}


	/**
	 * @since 1.0.0
	 * @return bool
	 */
	protected function bypass_protection_for_user() {

		$active_users = $this->get_option( 'filter_by_users' );

		if ( 'off' === $active_users ) {
			return false;
		}

		if ( 'guests' === $active_users ) {

			return is_user_logged_in();
		}

		if ( 'specified_roles' === $active_users ) {

			$roles = (array) $this->get_option( 'filter_users_role' );

			foreach ( $roles as $role ) {

				if ( current_user_can( $role ) ) {

					return false;
				}
			}

			return true;
		}

		return false;
	}


	/**
	 * FIXME: test
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	protected function bypass_protection_for_query() {

		$filter_posts = $this->get_option( 'filter_by_posts' );

		if ( 'off' === $filter_posts ) {
			return false;
		}

		if ( 'all_except_home' === $filter_posts ) {
			return is_home();
		}

		if ( 'specified_pages' !== $filter_posts ) {
			return false;
		}

		if ( is_page() && $this->get_option( 'filter_pages' ) ) {

			return in_array( get_queried_object_id(), (array) $this->get_option( 'filter_exclude_pages_list' ) );
		}

		if ( is_singular( 'post' ) ) {

			return ! $this->get_option( 'filter_posts' );
		}

		if ( is_tax() || is_category() || is_tag() ) {

			return ! in_array( get_queried_object()->taxonomy, (array) $this->get_option( 'filter_taxonomies_list' ) );
		}

		// TODO: test
		if ( is_post_type_archive() || is_singular() ) {

			return ! in_array( get_queried_object()->post_type, (array) $this->get_option( 'filter_post_types_list' ) );
		}

		return false;
	}

	/**
	 * Clear All htaccess changes.
	 *
	 * @since 1.0.
	 */
	public function undo_htaccess_changes() {

		/**
		 * @var CPP_Web_Server_Config_Modifier $web_server
		 */
		$web_server = self::factory( 'web-server' );

		if ( ! $web_server->find_web_server() ) {
			return;
		}

		$web_server->image_protection_config( false );
		$web_server->iframe_protection_config( false );
	}

	/**
	 * @hooked wp_head
	 *
	 * @since  1.0.0
	 */
	public function output_buffer_start() {

		ob_start( array( $this, 'output_buffer_callback' ) );
	}


	/**
	 * @see   output_buffer_start
	 *
	 * @param string $buffer
	 *
	 * @since 1.0.0
	 * @return string
	 */
	protected function output_buffer_callback( $buffer ) {

		return apply_filters( 'content-protector-pack/buffer-output', $buffer );
	}

}
