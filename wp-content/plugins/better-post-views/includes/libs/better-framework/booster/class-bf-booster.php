<?php


/**
 * BetterStudio Speed Booster
 *
 *
 * @package  BetterFramework
 * @author   BetterStudio <info@betterstudio.com>
 * @access   public
 * @see      http://www.betterstudio.com
 */
class BF_Booster {


	/**
	 * Panel ID
	 *
	 * @var string
	 */
	public static $option_panel_id = 'bs-booster';


	/**
	 * Inner array of object instances and caches
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 *
	 */
	function __construct() {

		add_filter( 'better-framework/panel/add', array(
			$this,
			'panel_add'
		), 100 );

		add_filter( 'better-framework/panel/' . self::$option_panel_id . '/config', array(
			$this,
			'panel_config'
		), 100 );

		add_filter( 'better-framework/panel/' . self::$option_panel_id . '/fields', array(
			$this,
			'panel_fields'
		), 100 );

		add_filter( 'better-framework/panel/' . self::$option_panel_id . '/std', array(
			$this,
			'panel_std'
		), 100 );

		// Callback for resetting data
		add_filter( 'better-framework/panel/reset/result', array( $this, 'callback_panel_reset_result' ), 10, 2 );

		// Callback for importing data
		add_filter( 'better-framework/panel/import/result', array( $this, 'callback_panel_import_result' ), 10, 3 );

		// Callback changing save result
		add_filter( 'better-framework/panel/save/result', array( $this, 'callback_panel_save_result' ), 10, 2 );

		// Hook BF admin assets enqueue
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		self::include_modules();
	}


	/**
	 * Build the required object instance
	 *
	 * @param   string $object
	 * @param   bool   $fresh
	 * @param   bool   $just_include
	 *
	 * @return  null|BF_Booster
	 */
	public static function factory( $object = 'self', $fresh = FALSE, $just_include = FALSE ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main BF_Booster Class
			 */
			case 'self':
				$class = 'BF_Booster';
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
	 * Used for retrieving options simply and safely for next versions
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	public static function get_option( $option_key ) {

		return bf_get_option( $option_key, self::$option_panel_id );
	}


	/**
	 * Callback: Used for enqueue font manager assets
	 *
	 * Filter: admin_enqueue_scripts
	 */
	function admin_enqueue_scripts() {

		if ( Better_Framework()->sections['admin_panel'] != TRUE || Better_Framework()->get_current_page_type() != 'panel' ) {
			return;
		}

	}


	/**
	 * Callback: Setup panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param array $panels
	 *
	 * @return array
	 */
	public function panel_add( $panels ) {

		$panels[ self::$option_panel_id ] = array(
			'id'    => self::$option_panel_id,
			'style' => FALSE,
		);

		return $panels;
	}


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return mixed
	 */
	public function panel_config( $panels ) {

		include BF_PATH . 'booster/panel-config.php';

		return $panels;
	}


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	public function panel_fields( $fields ) {

		include BF_PATH . 'booster/panel-fields.php';

		return $fields;
	}


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	public function panel_std( $fields ) {

		include BF_PATH . 'booster/panel-std.php';

		return $fields;
	}


	/**
	 * Filter callback: Used for resetting current language on resetting panel
	 *
	 * @param   $options
	 * @param   $result
	 *
	 * @return array
	 */
	function callback_panel_reset_result( $result, $options ) {

		// check panel
		if ( $options['id'] != self::$option_panel_id ) {
			return $result;
		}

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'BS Booster options reset to default.', 'better-studio' );
		} else {
			$result['msg'] = __( 'An error occurred while resetting BS Booster.', 'better-studio' );
		}

		return $result;
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
		if ( $args['panel-id'] != self::$option_panel_id ) {
			return $result;
		}

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'BS Booster options imported successfully.', 'better-studio' );
		} else {
			if ( $result['msg'] == __( 'Imported data is not for this panel.', 'better-studio' ) ) {
				$result['msg'] = __( 'Imported translation is not for BS Booster.', 'better-studio' );
			} else {
				$result['msg'] = __( 'An error occurred while importing BS Booster options.', 'better-studio' );
			}
		}

		return $result;
	}


	/**
	 * Filter callback: Used for changing save translation panel result
	 *
	 * @param $output
	 * @param $args
	 *
	 * @return string
	 */
	function callback_panel_save_result( $output, $args ) {

		// change only for translation panel
		if ( $args['id'] == self::$option_panel_id ) {
			if ( $output['status'] == 'succeed' ) {
				$output['msg'] = __( 'Booster settings saved.', 'better-studio' );
			} else {
				$output['msg'] = __( 'An error occurred while saving booster!', 'better-studio' );
			}
		}

		return $output;
	}


	/**
	 *
	 */
	public static function reset_cache_cb() {

		// remove all cached css and js files
		BF_Minify::clear_cache( 'all' );

		// remove mega-menus and widgets cache
		BF_Booster_Cache::flush_cache();

		return array(
			'status' => 'succeed',
			'msg'    => __( 'BS Booster cache cleared.', 'better-studio' ),
		);
	}


	/**
	 * Returns state of Booster sections
	 *
	 * @param string $section
	 *
	 * @return bool|mixed
	 */
	public static function is_active( $section = '' ) {

		if ( empty( $section ) ) {
			return FALSE;
		}

		static $state;

		if ( ! is_null( $state ) ) {

			if ( isset( $state[ $section ] ) ) {
				return $state[ $section ];
			} else {
				return FALSE;
			}
		}

		$state = array(
			'minify-css' => self::get_option( 'minify' ),
			'minify-js'  => self::get_option( 'minify' ),
		);

		if ( is_admin() || bf_is( 'dev' ) ) {
			$state['minify-css'] = FALSE;
			$state['minify-js']  = FALSE;
		}

		$state = apply_filters( 'better-framework/booster/active', $state );

		if ( isset( $state[ $section ] ) ) {
			return $state[ $section ];
		} else {
			return FALSE;
		}
	}


	/**
	 * Include booster sub-modules
	 */
	public static function include_modules() {

		if ( ! class_exists( 'BF_Booster_Cache' ) ) {
			include BF_PATH . 'booster/class-bf-booster-cache.php';
		}

		if ( ! class_exists( 'BF_Menu_cache' ) ) {
			// Include menu cache object
			include BF_PATH . 'booster/class-bf-menu-cache.php';
		}

		if ( ! class_exists( 'BF_Widget_Cache' ) ) {
			// Include widget cache object
			include BF_PATH . 'booster/class-bf-widget-cache.php';
		}

		if ( ! class_exists( 'BF_Shortcode_Cache' ) ) {
			// Include shortcode cache object
			include BF_PATH . 'booster/class-bf-shortcode-cache.php';
		}

		self::register_clear_cache_hooks();        // Reset caches
	}


	/**
	 * Register hooks to clear widget and menu cache
	 */
	public static function register_clear_cache_hooks() {

		add_action( 'wp_update_nav_menu', 'BF_Booster_Cache::flush_cache' );

		add_action( 'delete_category', 'BF_Booster_Cache::flush_cache' );
		add_action( 'edit_category', 'BF_Booster_Cache::flush_cache' );
		add_action( 'add_category', 'BF_Booster_Cache::flush_cache' );

		add_action( 'delete_attachment', 'BF_Booster_Cache::flush_cache' );
		add_action( 'edit_attachment', 'BF_Booster_Cache::flush_cache' );
		add_action( 'untrashed_post', 'BF_Booster_Cache::flush_cache' );
		add_action( 'trashed_post', 'BF_Booster_Cache::flush_cache' );
		add_action( 'deleted_post', 'BF_Booster_Cache::flush_cache' );
		add_action( 'save_post', 'BF_Booster_Cache::flush_cache' );

		add_action( 'delete_term', 'BF_Booster_Cache::flush_cache' );
		add_action( 'edit_terms', 'BF_Booster_Cache::flush_cache' );

		add_action( 'wp_set_comment_status', 'BF_Booster_Cache::flush_cache' );
		add_action( 'untrashed_comment', 'BF_Booster_Cache::flush_cache' );
		add_action( 'unspammed_comment', 'BF_Booster_Cache::flush_cache' );
		add_action( 'deleted_comment', 'BF_Booster_Cache::flush_cache' );
		add_action( 'spammed_comment', 'BF_Booster_Cache::flush_cache' );

		add_action( 'upgrader_process_complete', 'BF_Booster_Cache::flush_cache' );
		add_action( 'switch_theme', 'BF_Booster_Cache::flush_cache' );

		add_action( 'deactivated_plugin', 'BF_Booster_Cache::flush_cache' );
		add_action( 'activated_plugin', 'BF_Booster_Cache::flush_cache' );

		add_action( 'better-framework/version-compatibility/checked', 'BF_Booster_Cache::flush_cache' );
		add_action( 'better-framework/template-compatibility/done', 'BF_Booster_Cache::flush_cache' );
		add_action( 'better-framework/panel/save', 'BF_Booster_Cache::flush_cache' );


		// WP rocket compatibility
		add_action( 'after_rocket_clean_cache_busting', 'BF_Booster_Cache::flush_cache' );

		// WP super cache compatibility
		add_action( 'pre_update_option_supercache_stats', 'BF_Booster::wpsc_clean_cache' );

		// W3 Total Cache Compatibility
		add_action( 'w3tc_flush_all', 'BF_Booster_Cache::flush_cache' );

		// WP fastest cache compatibility
		add_action( 'wp_ajax_wpfc_delete_cache', 'BF_Booster::wpfc_toolbar_clean_cache' );
		add_action( 'wp_ajax_wpfc_delete_current_page_cache', 'BF_Booster::wpfc_toolbar_clean_cache' );
		add_action( 'wp_ajax_wpfc_delete_cache_and_minified', 'BF_Booster::wpfc_toolbar_clean_cache' );
		//
		add_action( 'pre_option_WpFastestCachePreLoad', 'BF_Booster::wpfc_admin_clean_cache' );
	}


	/**
	 * Clear booster cache when wp super cache delete.
	 *
	 * @return bool true on success
	 */
	public static function wpsc_clean_cache() {

		if ( ! isset( $_POST['wp_delete_cache'] ) ) {
			return FALSE;
		}

		if ( ! function_exists( 'wpsupercache_site_admin' ) || ! wpsupercache_site_admin() ) {
			return FALSE;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return FALSE;
		}

		return BF_Booster_Cache::flush_cache();
	}


	/**
	 * Check user access whether is allow to clear wpfc plugin cache
	 *
	 * @return bool
	 */
	public static function can_user_clean_wpfc_cache() {

		if ( ! is_user_logged_in() ) {
			return FALSE;
		}

		$is_user_valid = ( current_user_can( 'manage_options' ) || current_user_can( 'edit_others_pages' ) ) ? TRUE : FALSE;

		if ( ! $is_user_valid && defined( 'WPFC_TOOLBAR_FOR_AUTHOR' ) && WPFC_TOOLBAR_FOR_AUTHOR ) {
			$is_user_valid = current_user_can( 'delete_published_posts' ) || current_user_can( 'edit_published_posts' );
		}

		return $is_user_valid;
	}


	/**
	 * Clear booster cache when user clicked on WPFC => "delete cache" on admin toolbar
	 */
	public static function wpfc_toolbar_clean_cache() {

		if ( self::can_user_clean_wpfc_cache() ) {
			BF_Booster_Cache::flush_cache();
		}
	}


	/**
	 * Clear booster cache when user clicked on "delete cache" on WPFC admin panel
	 */
	public static function wpfc_admin_clean_cache() {

		if ( self::can_user_clean_wpfc_cache() ) {
			if ( isset( $_POST['wpFastestCachePage'] ) && $_POST['wpFastestCachePage'] === 'deleteCache' ) {
				BF_Booster_Cache::flush_cache();
			}
		}
	}
}
