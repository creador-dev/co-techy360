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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * BetterFramework core menu manager.
 */
class BF_Menus {


	/**
	 * Active Fields
	 *
	 * @var array
	 */
	public static $fields = array();


	/**
	 * STD value for all fields
	 *
	 * @var array
	 */
	public static $std = array();

	/**
	 * BF Menu Field generator
	 *
	 * @var
	 */
	public $field_generator;


	/**
	 * Default walker for all menus
	 *
	 * @var string
	 */
	private static $default_walker = 'BF_Menu_Walker';


	/**
	 * BF_Menus constructor.
	 */
	public function __construct() {

		// low priority init, give theme a chance to register hooks
		add_action( 'init', array( $this, 'init' ), 50 );

		// Icons Factory
		Better_Framework::factory( 'icon-factory' );
	}


	/**
	 * Loads all fields
	 *
	 * @return array
	 */
	public static function get_fields() {

		static $loaded;

		if ( $loaded ) {
			return self::$fields;
		}

		$loaded = TRUE;

		return self::$fields = apply_filters( 'better-framework/menu/options', self::$fields );
	}


	/**
	 * Loads all default values for fields
	 *
	 * @return array
	 */
	public static function get_std() {

		static $loaded;

		if ( $loaded ) {
			return self::$std;
		}

		$loaded = TRUE;

		return self::$std = apply_filters( 'better-framework/menu/std', self::$std );
	}


	/**
	 * Filters and returns walker
	 */
	public static function get_walker() {

		static $filtered;

		if ( $filtered ) {
			return self::$default_walker;
		}

		$filtered = TRUE;

		return self::$default_walker = apply_filters( 'better-framework/menu/walker', self::$default_walker );
	}


	/**
	 * Initializes
	 */
	public function init() {

		add_filter( 'wp_setup_nav_menu_item', array( $this, 'setup_menu_fields' ) );

		// Save and Walker filter only needed for admin
		if ( is_admin() ) {
			add_action( 'wp_update_nav_menu_item', array( $this, 'save_menu_fields' ), 10, 3 );
			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'walker_menu_fields' ), 999 );

			// Bug fix: when create a new menu, menu walker not fire so bf_enqueue_modal()
			// not fire and user cannot set icon for the menu items

			if ( $GLOBALS['pagenow'] === 'nav-menus.php' ) {
				bf_enqueue_modal( 'icon' );
			}
		}

		// Front Site Walker
		add_filter( 'wp_nav_menu_args', array( $this, 'walker_front' ) );
	}


	/**
	 * Setup custom walker for editing the menu
	 */
	public function walker_menu_fields( $walker, $menu_id = NULL ) {

		if ( ! class_exists( 'BF_Menu_Edit_Walker' ) ) {
			include BF_PATH . 'menu/class-bf-menu-edit-walker.php';
		}

		return 'BF_Menu_Edit_Walker';
	}


	/**
	 * Load the correct walker on demand when needed for the frontend menu
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	public function walker_front( $args ) {

		if ( ! empty( $args['bf_menu_walker'] ) && ! $args['bf_menu_walker'] ) {
			return $args;
		}

		$_walker = self::get_walker();

		// fix for when location have no any menu!
		// We change the walker and empty the theme location to stop WP from showing errors
		if ( ! empty( $args['theme_location'] ) && ! has_nav_menu( $args['theme_location'] ) ) {
			$args['fallback_cb']    = $_walker;
			$args['theme_location'] = '';
		}

		if ( $_walker == self::$default_walker ) {

			if ( ! class_exists( 'BF_Menu_Walker' ) ) {
				require BF_PATH . 'menu/class-bf-menu-walker.php';
			}

			$args['walker'] = new BF_Menu_Walker;
		} else {

			$_walker        = "Class" . $_walker;
			$args['walker'] = new $_walker;

		}

		return $args;
	}


	/**
	 * Load custom fields to the menu
	 *
	 * @param $menu_item
	 *
	 * @return WP_Post
	 */
	public function setup_menu_fields( $menu_item ) {

		foreach ( self::get_std() as $key => $field ) {

			// load values
			$value = get_post_meta( $menu_item->ID, '_menu_item_' . $key, TRUE );

			if ( ! empty( $value ) ) {
				$menu_item->{$key} = $value;
				continue;
			}

			if ( isset( $field['panel-id'] ) ) {
				$std_id = Better_Framework::options()->get_panel_std_id( $field['panel-id'] );
			} else {
				$std_id = 'std';
			}

			if ( ! isset( $field[ $std_id ] ) ) {
				$std_id = 'std';
			}

			// load default value when it's not available!
			if ( isset( $field[ $std_id ] ) ) {
				$menu_item->{$key} = $field[ $std_id ];
			}
		}

		return $menu_item;
	}


	/**
	 * Save menu custom fields
	 *
	 * @global $wp_version WordPress version number
	 */
	public function save_menu_fields( $menu_id, $menu_item_db_id, $args ) {

		global $wp_version;

		$is_data_array = FALSE;

		if ( isset( $_POST['bf-m-i'] ) ) {

			// Parse JSON and convert it to array
			// Parse this one time for better performance
			if ( is_string( $_POST['bf-m-i'] ) ) {
				$_POST['bf-m-i'] = json_decode( urldecode( $_POST['bf-m-i'] ), TRUE );
			} else {
				$is_data_array = is_array( $_POST['bf-m-i'] );
			}

		} else {
			return; // continue if there is not better-menu-field!
		}


		/**
		 * Convert menu array style to new
		 */
		include ABSPATH . WPINC . '/version.php'; // include an unmodified $wp_version

		//check WordPress version and make sure $_POST modified by WordPress
		if ( ! $is_data_array && version_compare( $wp_version, '4.5.3', '<' ) ) {
			$this->convert_data_array();
		}

		foreach ( self::get_std() as $key => $field ) {

			// add / update meta
			if ( isset( $_POST['bf-m-i'][ $key ][ $menu_item_db_id ] ) ) {

				if ( isset( $field['panel-id'] ) ) {
					$std_id = Better_Framework::options()->get_panel_std_id( $field['panel-id'] );
				} else {
					$std_id = 'std';
				}

				if ( ! isset( $field[ $std_id ] ) ) {
					$std_id = 'std';
				}

				// check for saving default or not!?
				if ( isset( $field['save-std'] ) && ! $field['save-std'] ) {
					if ( $_POST['bf-m-i'][ $key ][ $menu_item_db_id ] != $field[ $std_id ] ) {
						update_post_meta( $menu_item_db_id, '_menu_item_' . $key, $_POST['bf-m-i'][ $key ][ $menu_item_db_id ] );
					} else {
						delete_post_meta( $menu_item_db_id, '_menu_item_' . $key );
					}
				} // save anyway ( save-std not defined or is true )
				else {
					update_post_meta( $menu_item_db_id, '_menu_item_' . $key, $_POST['bf-m-i'][ $key ][ $menu_item_db_id ] );
				}

			}

		}
	} // save_menu_fields


	/**
	 * Convert menu array to new WP version style
	 *
	 * @since 4.5.3 in menu array data, item key and menu item ID postion fliped
	 *
	 *
	 *
	 * @see   _wp_expand_nav_menu_post_data()
	 */
	protected function convert_data_array() {
		if ( ! is_array( $_POST['bf-m-i'] ) ) {
			return;
		}

		$new_structure = array();
		foreach ( $_POST['bf-m-i'] as $post_ID => $data_array ) {

			if ( ! is_array( $data_array ) ) {
				continue;
			}

			foreach ( $data_array as $item_type => $item_value ) {
				$new_structure[ $item_type ][ $post_ID ] = $item_value;
			}
		}

		$_POST['bf-m-i'] = $new_structure;
	}

}