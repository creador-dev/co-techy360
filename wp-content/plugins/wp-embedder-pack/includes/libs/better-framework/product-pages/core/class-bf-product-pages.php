<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


/**
 * Class BF_Product_Pages
 */
class BF_Product_Pages extends BF_Product_Pages_Base {

	/**
	 * Current version number of BS Product Pages
	 *
	 * todo move this to better location
	 *
	 * @var string
	 */
	public static $version = '1.0.0';


	/**
	 * Base menu slug
	 *
	 * @var string
	 */
	public static $menu_slug = 'bs-product-pages';


	/**
	 * Used to get current version number
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;
	}


	/**
	 * @var array
	 */
	protected $instances = array();


	/**
	 * Initialize
	 */
	public static function Run() {

		global $bs_theme_pages;

		if ( $bs_theme_pages === false ) {
			return;
		}

		if ( ! $bs_theme_pages instanceof self ) {
			$bs_theme_pages = new self();
			$bs_theme_pages->init();
		}

		return $bs_theme_pages;
	}


	public static function get_asset_url( $file_path ) {

		return self::$config['URI'] . "/assets/$file_path";
	}


	public static function get_asset_path( $file_path ) {

		return self::$config['path'] . "/assets/$file_path";
	}


	/**
	 * Use to get URL of BS Theme Pages
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	public static function get_url( $append = '' ) {

		return self::$config['URI'] . '/' . $append;
	}


	/**
	 * Use to get path of BS Theme Pages
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	public static function get_path( $append = '' ) {

		return trailingslashit( self::$config['path'] ) . ltrim( $append, '/' );
	}


	public function init() {

		add_action( 'wp_ajax_bs_pages_ajax', array( $this, 'ajax_response' ) );

		add_action( 'after_switch_theme', array( $this, 'show_welcome_page' ), 999 );

		$this->load_modules_function_file();
	}


	/**
	 * handle ajax requests
	 */

	public function ajax_response() {

		$required_fields = array(
			'active-page' => '',
			'token'       => '',
		);

		if ( array_diff_key( $required_fields, $_REQUEST ) ) {
			return;
		}

		try {

			$sub_page_id = &$_REQUEST['active-page'];

			//validate request
			if ( $_REQUEST['token'] !== wp_create_nonce( 'bs-pages-' . $sub_page_id ) ) {
				throw new Exception( 'Security Error' );
			}

			$settings    = $this->get_config();
			$item_params = &$settings['pages'][ $sub_page_id ];
			$item_params = array_merge( $_REQUEST, $item_params );

			$instance = $this->get_instance( $sub_page_id );
			//call ajax_request method of children class
			$response = $instance->ajax_request( $item_params );

			if ( ! $response ) {

				wp_send_json( array(
					'success' => 0,
					'error'   => 'invalid request'
				) );
			} else {

				wp_send_json( array(
					'success' => empty( $response['is_error'] ),
					'result'  => $response
				) );
			}

			$instance = null;

		} catch( Exception $e ) {

			wp_send_json( array(
				'status' => 'error',
				'error'  => $e->getMessage()
			) );

		}

		exit;
	}


	public function plugins_menu_instance() {

		require_once $this->get_path( 'install-plugin/class-bf-product-plugin-manager.php' );

		return new BF_Product_Plugin_Manager();
	}


	public function install_demo_menu_instance() {

		require_once $this->get_path( 'install-demo/class-bf-product-demo-manager.php' );
		require_once $this->get_path( 'install-demo/functions.php' );

		return new BF_Product_Demo_Manager();
	}


	public function support_menu_instance() {

		require_once $this->get_path( 'support/class-bf-product-support.php' );

		return new BF_Product_Support();
	}


	public function welcome_menu_instance() {

		require_once $this->get_path( 'welcome/class-bf-product-welcome.php' );

		return new BF_Product_Welcome();
	}


	public function report_menu_instance() {

		require_once $this->get_path( 'report/class-bf-product-report.php' );

		return new BF_Product_Report();
	}


	/**
	 *
	 * @return array list of modules  array {
	 *
	 *  module name (directory name)
	 *  ...
	 * }
	 */
	protected function get_modules_list() {

		return array(

			'install-plugin',
			'install-demo',
			'support',
			'report',
			'welcome'
		);
	}


	/**
	 * callback: load modules functions.php file
	 * action: admin_init
	 */

	public function load_modules_function_file() {

		foreach ( $this->get_modules_list() as $dir ) {

			$functions_file = $this->get_path( "$dir/functions.php" );

			if ( file_exists( $functions_file ) ) {
				require_once $functions_file;
			}
		}
	}


	/**
	 *
	 * @param string $handler_name
	 *
	 * @return bool|string
	 */
	public function get_item_handler_instance( $handler_name ) {

		$suffix   = '_menu_instance';
		$method   = str_replace( '-', '_', $handler_name ) . $suffix;
		$callback = array( $this, $method );

		if ( is_callable( $callback ) ) {

			return call_user_func( $callback );
		}
	}


	/**
	 * return item object instance
	 *
	 * @param $sub_page_id
	 *
	 * @return BF_Product_Item
	 * @throws Exception
	 */
	public function get_instance( $sub_page_id ) {

		if ( isset( $this->instances[ $sub_page_id ] ) ) {
			return $this->instances[ $sub_page_id ];
		}

		$settings = $this->get_config();

		if ( ! isset( $settings['pages'][ $sub_page_id ] ) ) {
			throw new Exception( 'cannot process your request' );
		}

		$item     = &$settings['pages'][ $sub_page_id ];
		$instance = $this->get_item_handler_instance( $item['type'] );

		if ( ! $instance instanceof BF_Product_Item ) {
			throw new Exception( 'Manager Class is not instance of BS_Theme_Pages_Menu Class' );
		}

		$this->instances[ $sub_page_id ] = $instance;

		return $instance;
	}


	/**
	 * @param string $page_slug
	 *
	 * @return string
	 * @throws Exception
	 */

	public function the_sub_page_id( $page_slug ) {

		$prefix = preg_quote( self::$menu_slug );

		if ( preg_match( "/$prefix\-*(.+)$/i", $page_slug, $match ) ) {

			return $match[1];
		}

		return '';
	}


	/**
	 * Callback function for menus & sub menus
	 */
	public function menu_callback() {

		global $page_hook;

		try {

			if ( ! $sub_page_id = $this->the_sub_page_id( $page_hook ) ) {

				throw new Exception( 'cannot process your request' );
			}

			$settings    = $this->get_config();
			$item_params = &$settings['pages'][ $sub_page_id ];

			$instance = $this->get_instance( $sub_page_id );

			//display html result to admin user
			$instance->render( $item_params );

			$instance = null;

		} catch( Exception $e ) {

			$this->error( $e->getMessage() );
		}

	}


	/**
	 * callback: Redirect user to welcome if welcome page is available after actived BS Theme
	 *
	 * action: after_switch_theme
	 *
	 */
	public function show_welcome_page() {

		global $pagenow;
		if ( $pagenow == 'admin.php' ) {
			return;
		}

		$settings = $this->get_config();
		if ( isset( $settings['pages'] ) && is_array( $settings['pages'] ) ) {

			foreach ( $settings['pages'] as $id => $menu ) {

				if ( $menu['type'] === 'welcome' ) {


					wp_safe_redirect( admin_url( 'admin.php?page=' . self::$menu_slug . "-$id" ) );
					exit;
				}
			}
		}
	}
}


BF_Product_Pages::Run();
