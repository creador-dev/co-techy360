<?php
/*
Plugin Name: Better Facebook Chat
Plugin URI: http://betterstudio.com
Description: Integrate Facebook Messenger experience directly into your website.
Version: 1.1.1
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/


/**
 * Better_Facebook_Chat class wrapper
 *
 * @return Better_Facebook_Chat
 */
function Better_Facebook_Chat() {

	return Better_Facebook_Chat::self();
}

// Fire up the plugin
Better_Facebook_Chat();


/**
 * Smart Lists Pack Functionality
 */
class Better_Facebook_Chat {

	/**
	 * Contains BP version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	public static $version = '1.1.1';


	/**
	 * Contains BR option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'better_facebook_chat';


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

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		add_action( 'wp_footer', array( $this, 'print_template' ) );
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
	 * Is chat active or not?
	 *
	 * @return bool
	 */
	public function is_active() {

		return self::get_option( 'chat_enabled' ) && self::get_option( 'facebook_page' );
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
			 * Main BS_Financial_Pack_Pro Class
			 */
			case 'self':
				$class = 'Better_Facebook_Chat';
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
	 * @return Better_Facebook_Chat
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

		$features['admin_panel'] = true;

		return $features;
	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		if ( ! $this->is_active() ) {
			return;
		}

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


	/**
	 * Callback: Used for registering scripts
	 *
	 * @hooked enqueue_scripts
	 */
	function enqueue_scripts() {

		$locale = get_locale();

		wp_enqueue_script( 'facebook-sdk', "https://connect.facebook.net/$locale/sdk/xfbml.customerchat.js" );

		if ( function_exists( 'wp_add_inline_script' ) ) {
			wp_add_inline_script( 'facebook-sdk', $this->init_sdk_js() );
		}

		bf_enqueue_style(
			'better-facebook-chat',
			bf_append_suffix( self::dir_url( 'css/style' ), '.css' ),
			array(),
			bf_append_suffix( self::dir_path( 'css/style' ), '.css' ),
			self::$version
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
	function oculus_logger( $bool, $product_dir, $type_dir ) {

		if ( $type_dir === 'plugins' && $product_dir === 'better-facebook-chat' ) {
			return false;
		}

		return $bool;
	}


	/**
	 * Print facebook chat html markup
	 */
	public function print_template() {

		if ( ! $this->is_active() ) {
			return;
		}

		if ( ! function_exists( 'wp_add_inline_script' ) ) {
			printf( '<script>%s</script>', $this->init_sdk_js() );
		}

		$attrs   = '';
		$options = array(
			'theme_color',
			'logged_out_greeting',
			'logged_in_greeting',
			'position',
		);

		foreach ( $options as $option_key ) {

			$option_value = $this->get_option( $option_key );

			$attrs .= sprintf( ' %s="%s"', $option_key, esc_attr( $option_value ) );
		}

		?>
		<div class="fb-customerchat"<?php echo $attrs ?> page_id="<?php echo bsfc_get_page_id(
			$this->get_option( 'facebook_page' )
		) ?>"></div>
		<?php

	}


	/**
	 * Get init facebook std js as raw string
	 *
	 * @return string
	 */
	public function init_sdk_js() {

		return <<<JS
			window.fbAsyncInit = function () {
				FB.init({
                    autoLogAppEvents: true,
                    xfbml: true,
                    version: 'v2.12'
                });
                FB.CustomerChat.show(true);
            };
JS;

	}
}
