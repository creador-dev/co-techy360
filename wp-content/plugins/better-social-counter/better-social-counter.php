<?php
/*
Plugin Name: Better Social Counter Widget
Plugin URI: http://betterstudio.com
Description: BetterStudio Social Counter Widget
Version: 1.13.0
Author: BetterStudio
Author URI: http://betterstudio.com
License: 
*/


/**
 * Better_Social_Counter class wrapper
 *
 * @return Better_Social_Counter
 */
function Better_Social_Counter() {

	return Better_Social_Counter::self();
}


// Initialize Up Better Social Counter
Better_Social_Counter();


/**
 * Class Better_Social_Counter
 */
class Better_Social_Counter {


	/**
	 * Contains BSC version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	public static $version = '1.13.0';


	/**
	 * Contains BSC option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'better_social_counter_options';


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	function __construct() {

		// make sure following code only one time run
		static $initialized;
		if ( $initialized ) {
			return;
		} else {
			$initialized = true;
		}

		define( 'BETTER_SOCIAL_COUNTER_DIR_URL', plugin_dir_url( __FILE__ ) );
		define( 'BETTER_SOCIAL_COUNTER_DIR_PATH', plugin_dir_path( __FILE__ ) );

		// need BF_Social_Counter class for retrieving data
		include self::dir_path( 'includes/class-better-social-counter-data-manager.php' );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Register oculus library
		add_filter( 'better-framework/oculus/loader', array( $this, 'register_oculus' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'better_framework_sections' ) );

		// need BF_Social_Counter class for retrieving data
		include self::dir_path( 'includes/options/panel.php' );

		// Active and new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ) );

		// Initialize
		add_action( 'better-framework/after_setup', array( $this, 'init' ) );

		// Callback for resetting data
		add_filter( 'better-framework/panel/reset/result', array( $this, 'callback_panel_reset_result' ), 10, 2 );

		// Callback for importing data
		add_filter( 'better-framework/panel/import/result', array( $this, 'callback_panel_import_result' ), 10, 3 );

		// Callback used for clearing cache after save
		add_filter( 'better-framework/panel/save/result', array( $this, 'callback_panel_save_result' ), 10, 2 );

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );

		// Enqueue admin scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );

		// Clear BF transients on plugin activation and deactivation
		register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'plugin_deactivation' ) );

		// Includes BF loader if not included before
		require self::dir_path( 'includes/libs/better-framework/init.php' );
		require self::dir_path( 'includes/libs/better-framework/oculus/better-framework-oculus-loader.php' );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		add_action( 'better-framework/panel/reset/after', array( $this, 'clear_cache_after_save' ), 20, 2 );
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
			$url = plugin_dir_url( __FILE__ );
		}

		return $url . $address;
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
			$path = plugin_dir_path( __FILE__ );
		}

		return $path . $address;
	}


	/**
	 * Returns BSC current Version
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;

	}


	/**
	 * Clears BF transients for avoiding of happening any problem
	 */
	function plugin_activation() {

		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );
		delete_transient( '__better_framework__backend_css' );

	}


	/**
	 * Clears BF transients for avoiding of happening any problem
	 */
	function plugin_deactivation() {

		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );
		delete_transient( '__better_framework__backend_css' );

	}


	/**
	 * Build the required object instance
	 *
	 * @param string $object
	 * @param bool   $fresh
	 * @param bool   $just_include
	 *
	 * @return null
	 */
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Better_Social_Counter Class
			 */
			case 'self':
				$class = 'Better_Social_Counter';
				break;


			default:
				return NULL;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return;
		}

		// don't cache fresh objects
		if ( $fresh ) {
			return new $class;
		}

		self::$instances[ $object ] = new $class;

		return self::$instances[ $object ];
	}


	/**
	 * Used for accessing alive instance of Better_Social_Counter
	 *
	 * static
	 *
	 * @since 1.0
	 * @return Better_Social_Counter
	 */
	public static function self() {

		return self::factory();

	}


	/**
	 * Used for retrieving options simply and safely for next versions
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	public static function get_option( $option_key ) {

		return bf_get_option( $option_key, self::$panel_id );

	}


	/**
	 * Adds included BetterFramework to loader
	 *
	 * @param $frameworks
	 *
	 * @return array
	 */
	function better_framework_loader( $frameworks ) {

		$frameworks[] = array(
			'version' => '3.10.14',
			'path'    => $this->dir_path( 'includes/libs/better-framework/' ),
			'uri'     => $this->dir_url( 'includes/libs/better-framework/' ),
		);

		return $frameworks;
	}


	/**
	 * Register oculus library
	 *
	 * @param array $libs
	 *
	 * @return array
	 */
	function register_oculus( $libs ) {

		$libs[] = array(
			'version' => '1.0.6',
			'path'    => $this->dir_path( 'includes/libs/better-framework/oculus/' ),
			'uri'     => $this->dir_path( 'includes/libs/better-framework/oculus/' ),
		);

		return $libs;
	}


	/**
	 * Activate BF needed sections
	 *
	 * @param $sections
	 *
	 * @return mixed
	 */
	function better_framework_sections( $sections ) {

		$sections['vc-extender'] = true;

		return $sections;

	}


	/**
	 *  Init the plugin
	 */
	function init() {

		load_plugin_textdomain( 'better-studio', false, 'better-social-counter/languages' );

	}


	/**
	 * Enqueue css and js files
	 */
	function enqueue_assets() {

		$dir_url  = self::dir_url();
		$dir_path = self::dir_path();

		// Enqueue "Better Social Font Icon" from framework
		bf_enqueue_style( 'better-social-font-icon' );

		// Element Query
		bf_enqueue_script( 'element-query' );

		// Script
		bf_enqueue_script(
			'better-social-counter',
			bf_append_suffix( $dir_url . 'js/script', '.js' ),
			array( 'jquery' ),
			bf_append_suffix( $dir_path . 'js/script', '.js' ),
			Better_Social_Counter::$version
		);

		// Style
		bf_enqueue_style(
			'better-social-counter',
			bf_append_suffix( $dir_url . 'css/style', '.css' ),
			array(),
			bf_append_suffix( $dir_path . 'css/style', '.css' ),
			Better_Social_Counter::$version
		);

		if ( is_rtl() ) {
			bf_enqueue_style(
				'better-social-counter-rtl',
				bf_append_suffix( $dir_url . 'css/rtl', '.css' ),
				array(),
				bf_append_suffix( $dir_path . 'css/rtl', '.css' ),
				Better_Social_Counter::$version
			);
		}

	}


	/**
	 *  Enqueue admin scripts
	 */
	function admin_enqueue() {

		$dir_url = self::dir_url();

		wp_enqueue_style(
			'better-social-counter-admin',
			bf_append_suffix( $dir_url . 'css/admin-style', '.css' ),
			array(),
			Better_Social_Counter::$version
		);

	}


	/**
	 * Setups Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	function setup_shortcodes( $shortcodes ) {

		require $this->dir_path( 'includes/shortcodes/class-better-social-counter-shortcode.php' );
		require $this->dir_path( 'includes/shortcodes/class-better-social-banner-shortcode.php' );

		require $this->dir_path( 'includes/widgets/class-better-social-counter-widget.php' );
		require $this->dir_path( 'includes/widgets/class-better-social-banner-widget.php' );

		$shortcodes['better-social-counter'] = array(
			'shortcode_class' => 'Better_Social_Counter_Shortcode',
			'widget_class'    => 'Better_Social_Counter_Widget',
		);

		$shortcodes['better-social-banner'] = array(
			'shortcode_class' => 'Better_Social_Banner_Shortcode',
			'widget_class'    => 'Better_Social_Banner_Widget',
		);

		return $shortcodes;
	}


	/**
	 * Clears all cache inside data base
	 *
	 * Callback
	 *
	 * @return array
	 */
	public static function clear_cache_all() {

		Better_Social_Counter_Data_Manager::self()->clear_cache();

		return array(
			'status' => 'succeed',
			'msg'    => __( 'All Cache was cleaned.', 'better-studio' ),
		);

	}


	/**
	 * Filter callback: Used for changing current language on importing translation panel data
	 *
	 * @param $result
	 * @param $data
	 * @param $args
	 *
	 * @return array
	 */
	function callback_panel_import_result( $result, $data, $args ) {

		// check panel
		if ( $args['panel-id'] != self::$panel_id ) {
			return $result;
		}

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'Better Social Counter options imported successfully.', 'better-studio' );
		} else {
			if ( $result['msg'] == __( 'Imported data is not for this panel.', 'better-studio' ) ) {
				$result['msg'] = __( 'Imported data is not for Better Social Counter.', 'better-studio' );
			} else {
				$result['msg'] = __( 'An error occurred while importing options.', 'better-studio' );
			}
		}

		return $result;
	}


	/**
	 * Filter callback: Used for resetting current language on resetting panel
	 *
	 * @param $result
	 * @param $options
	 *
	 * @return array
	 */
	function callback_panel_reset_result( $result, $options ) {

		// check panel
		if ( $options['id'] != self::$panel_id ) {
			return $result;
		}

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'Better Social Counter options reset to default.', 'better-studio' );
		} else {
			$result['msg'] = __( 'An error occurred while resetting options.', 'better-studio' );
		}

		return $result;
	}


	/**
	 * Filter callback: Used for clearing cache
	 *
	 * @param $output
	 * @param $args
	 *
	 * @return string
	 */
	function callback_panel_save_result( $output, $args ) {

		// change only for BSC panel
		if ( $args['id'] == self::$panel_id ) {
			self::clear_cache_all();
		}

		return $output;
	}


	/**
	 * Resets typography options to default
	 *
	 * Callback
	 *
	 * @return array
	 */
	public static function reset_typography_options() {

		$lang = bf_get_current_language_option_code();

		$panel_id = self::$panel_id . $lang;

		$options = get_option( $panel_id );

		$fields = Better_Framework()->options()->options[ self::$panel_id ]['fields'];

		$std_id = 'std';

		foreach ( (array) $fields as $field ) {
			if ( ! isset( $field['reset-typo'] ) || ! $field['reset-typo'] ) {
				continue;
			}

			$options[ $field['id'] ] = $field[ $std_id ];
		}

		// Updates option
		update_option( $panel_id, $options );

		// clear caches
		delete_transient( '__better_framework__panel_css' );
		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );

		Better_Framework()->admin_notices()->add_notice( array(
			'msg' => __( 'Typography options resets to default.', 'better-studio' ),
		) );

		return array(
			'status'  => 'succeed',
			'msg'     => __( 'Typography resets to default.', 'better-studio' ),
			'refresh' => true
		);

	} // reset_typography_options


	/**
	 * Callback: Enable oculus error logging system for plugin
	 * Filter  : better-framework/oculus/logger/filter
	 *
	 * @access private
	 *
	 * @param boolean $bool previous value
	 * @param string  $product_dir
	 * @param string  $type_dir
	 *
	 * @return bool true if error belongs to theme, previous value otherwise.
	 */
	function oculus_logger( $bool, $product_dir, $type_dir ) {

		if ( $type_dir === 'plugins' && $product_dir === 'better-social-counter' ) {
			return false;
		}

		return $bool;
	}


	/**
	 * Flush all caches after panel has been saved.
	 *
	 * @param string $args   contain options
	 * @param array  $output arguments
	 */
	public function clear_cache_after_save( $output, $args ) {

		if ( $args['id'] === self::$panel_id ) {

			if ( ! class_exists( 'Better_Social_Counter_API_Manager' ) ) {
				require_once Better_Social_Counter()->dir_path() . 'includes/api/better-social-counter-api-manager.php';
			}

			Better_Social_Counter_API_Manager::flush_cache();
		}
	}
}
