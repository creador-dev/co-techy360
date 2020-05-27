<?php
/*
Plugin Name: Blockquote Pack Pro
Plugin URI: http://betterstudio.com
Description: The best Blockquote shortcodes
Version: 1.3.2
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/

/***
 *  ______ _            _                     _        ______          _
 *  | ___ \ |          | |                   | |       | ___ \        | |
 *  | |_/ / | ___   ___| | ____ _ _   _  ___ | |_ ___  | |_/ /_ _  ___| | __
 *  | ___ \ |/ _ \ / __| |/ / _` | | | |/ _ \| __/ _ \ |  __/ _` |/ __| |/ /
 *  | |_/ / | (_) | (__|   < (_| | |_| | (_) | ||  __/ | | | (_| | (__|   <
 *  \____/|_|\___/ \___|_|\_\__, |\__,_|\___/ \__\___| \_|  \__,_|\___|_|\_\
 *                             | |
 *                             |_|
 *
 * \--> BetterStudio, 2017 <--/
 *
 * Thanks for using our plugin!
 *
 * Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 */


/**
 * BS_Blockquote_Pack_Pro class wrapper
 *
 * @return BS_Blockquote_Pack_Pro
 */
function BS_Blockquote_Pack_Pro() {

	return BS_Blockquote_Pack_Pro::self();
}

// Fire up Blockquote Pack
BS_Blockquote_Pack_Pro();


/**
 * Blockquote Pack Functionality
 */
class BS_Blockquote_Pack_Pro {

	/**
	 * Contains BP version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	public static $version = '1.3.2';


	/**
	 * Contains BR option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'bs_blockquote_pack';


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

		// Includes functions
		include $this->dir_path( 'includes/functions.php' );

		// Register panel
		include $this->dir_path( 'includes/options/panel.php' );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 50 );

		// Initialize after bf init
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		// Add custom items to editor shortcodes menu
		add_filter( 'better-framework/editor-shortcodes/shortcodes-array', array(
			$this,
			'register_shortcode_to_editor'
		), 5 );

		// Configs "BF Editor Shortcodes" library
		add_filter( 'better-framework/editor-shortcodes/config', array( $this, 'editor_shortcodes_config' ) );

		// Active and new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 100 );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		// Clears BF caches
		register_activation_hook( __FILE__, array( $this, 'after_theme_switch' ) );
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
			 * Main Blockquote_Pack_Pro Class
			 */
			case 'self':
				$class = 'BS_Blockquote_Pack_Pro';
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
	 * Used for accessing alive instance of Blockquote_Pack_Pro
	 *
	 * @since 1.0
	 *
	 * @return BS_Blockquote_Pack_Pro
	 */
	public static function self() {

		return self::factory();
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
			'path'    => self::dir_path( 'includes/libs/better-framework/' ),
			'uri'     => self::dir_url( 'includes/libs/better-framework/' ),
		);

		return $frameworks;
	}


	/**
	 * Setups features of BetterFramework
	 *
	 * @param $features
	 *
	 * @return array
	 */
	function setup_bf_features( $features ) {

		$features['admin_panel']       = true;
		$features['editor-shortcodes'] = true;
		$features['page-builder']      = true;

		return $features;
	}


	/**
	 * clears last BF caches for avoiding conflict
	 */
	function after_theme_switch() {

		// Clears BF transients for preventing of happening any problem
		delete_transient( '__better_framework__widgets_css' );
		delete_transient( '__better_framework__panel_css' );
		delete_transient( '__better_framework__menu_css' );
		delete_transient( '__better_framework__terms_css' );
		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );
		delete_transient( '__better_framework__backend_css' );

		// Delete all pages css transients
		global $wpdb;
		$wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE meta_key LIKE %s", '_bf_post_css_%' ) );

	} // after_theme_switch


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts' ) );
	}



	/**
	 * Callback: Used for registering scripts and styles
	 *
	 * Action: enqueue_scripts
	 */
	function enqueue_scripts() {

		bf_enqueue_style( 'bs-icons' ); // Enqueue "BetterStudio Icons" from framework

		bf_enqueue_style(
			'blockquote-pack-pro',
			bf_append_suffix( BS_Blockquote_Pack_Pro::dir_url( 'css/blockquote-pack' ), '.css' ),
			array(),
			bf_append_suffix( BS_Blockquote_Pack_Pro::dir_path( 'css/blockquote-pack' ), '.css' ),
			BS_Blockquote_Pack_Pro::$version
		);

		if ( is_rtl() ) {
			bf_enqueue_style(
				'blockquote-pack-rtl',
				bf_append_suffix( BS_Blockquote_Pack_Pro::dir_url( 'css/blockquote-pack-rtl' ), '.css' ),
				array(),
				bf_append_suffix( BS_Blockquote_Pack_Pro::dir_path( 'css/blockquote-pack-rtl' ), '.css' ),
				BS_Blockquote_Pack_Pro::$version
			);
		}

		// Custom style for Gutenberg editor
		if ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {
			bf_enqueue_style(
				'blockquote-pack-gutenberg',
				bf_append_suffix( BS_Blockquote_Pack_Pro::dir_url( 'css/gutenberg' ), '.css' ),
				array(),
				bf_append_suffix( BS_Blockquote_Pack_Pro::dir_path( 'css/gutenberg' ), '.css' ),
				BS_Blockquote_Pack_Pro::$version
			);
		}
	}


	/**
	 * Filter Callback: Registers shortcode to BetterStudio Editor Shortcodes Plugin
	 *
	 * todo change this
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	public static function register_shortcode_to_editor( $shortcodes ) {

		$quote_text   = 'Great things in business are never done by one person. They are done by a team of people.';
		$quote_avatar = BS_Blockquote_Pack_Pro::dir_url( 'img/other/steve-jobs.png' );

		$shortcodes['bs-quote'] = array(
			'type'     => 'button',
			'label'    => __( 'Blockquote Pack', 'better-studio' ),
			'callback' => 'Quote',
			'register' => false,
			'content'  => '[bs-quote style="default" quote="' . $quote_text . '" author_name="Steve Jobs" author_job="Apple co-founder" author_avatar="' . $quote_avatar . '" align="left" ]<br />'
		);

		return $shortcodes;
	}


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
	 * @return bool true if error belongs to plugin, previous value otherwise.
	 */
	function oculus_logger( $bool, $product_dir, $type_dir ) {

		if ( $type_dir === 'plugins' && $product_dir === 'blockquote-pack-pro' ) {
			return false;
		}

		return $bool;
	}


	/**
	 * Setups Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	function setup_shortcodes( $shortcodes ) {

		include BS_Blockquote_Pack_Pro::dir_path( 'includes/shortcodes/bs-quote.php' );

		$shortcodes['bs-quote'] = array(
			'shortcode_class' => 'Blockquote_Pack_Quote_Shortcode',
		);

		return $shortcodes;
	}


	/**
	 * Configs BF Editor Shortcodes library
	 *
	 * @param $config
	 *
	 * @return array
	 */
	public function editor_shortcodes_config( $config ) {

		// dynamic styles
		$config['editor-dynamic-style'][] = BS_Blockquote_Pack_Pro::dir_path( 'includes/dynamics/editor_css.php' );

		// Show sidebars
		$config['layouts'] = false;

		return $config;
	}

}
