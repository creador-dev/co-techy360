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


// Prevent Direct Access
defined( 'ABSPATH' ) or die;


/**
 * Class BF_Admin_Menus
 */
class BF_Admin_Menus {


	/**
	 * Contains list of all active admin menus
	 *
	 * @since 1.4
	 * @var array
	 */
	public $admin_menus = array();


	/**
	 * Contains list of all active admin bar menus
	 *
	 * @var array
	 */
	protected $admin_bar_menus = array();


	/**
	 * contains id of BetterStudio menu
	 *
	 * @since 1.4
	 * @var string
	 */
	protected $main_admin_menu_id = '';


	/**
	 * contains slug of BetterStudio menu
	 *
	 * @since 1.4
	 * @var string
	 */
	protected $main_admin_menu_slug = '';


	function __construct() {

		// Used for registering active menus to WP admin menu
		$hook = is_admin() ? 'admin_menu' : 'wp_head';
		add_action( $hook, array( $this, 'wp_admin_menu' ), 5 );

		add_action( 'admin_bar_menu', array( $this, 'wp_admin_bar_menu' ), 81 );

	}


	/**
	 * @param WP_Admin_Bar $wp_admin_bar
	 */
	public function wp_admin_bar_menu( $wp_admin_bar ) {

		if ( $this->admin_bar_menus ) {
			usort( $this->admin_bar_menus, array( $this, 'usort_cmp_by_position' ) );

			$parent_suffix = '-parent';
			foreach ( $this->admin_bar_menus as $menu ) {

				$capability = isset( $menu['capability'] ) ? $menu['capability'] : 'manage_options';

				if ( ! current_user_can( $capability ) ) {
					continue;
				}

				$icon = '';

				// append new  menu and set icon for parent item
				if ( empty( $menu['parent'] ) ) {

					if ( ! empty( $menu['icon'] ) ) {

						$menu = $this->normalize_icon( $menu );

						$class = 'bf-admin-bar-icon-' . str_replace( array( '/', '_' ), '-', $menu['slug'] );
						$icon  = '<span class="' . $class . '"></span>';

						$this->add_css( '.' . $class . ':before{ vertical-align:middle;content: \'' . $menu['icon']['font_code'] . '\' !important; font-family: \'' . $menu['icon']['font_name'] . '\'; font-size: 14px; line-height: 21px;' . ( is_rtl() ? 'vertical-align: middle;' : '' ) . '}', TRUE );
						$this->add_css( '.' . $class . '{font-weight:normal; vertical-align:top;margin-' . ( is_rtl() ? 'left' : 'right' ) . ':10px !important;display: inline-block;line-height: 32px !important;' . ( is_rtl() ? 'float:right' : '' ) . '; text-rendering: auto !important;-webkit-font-smoothing: antialiased !important;-moz-osx-font-smoothing: grayscale !important;}', TRUE );
					}

					$wp_admin_bar->add_node( array(
						'id'     => $menu['slug'] . $parent_suffix,
						'title'  => $icon . ( isset( $menu['parent_title'] ) ? $menu['parent_title'] : $menu['menu_title'] ),
						'href'   => isset( $menu['href'] ) ? $menu['href'] : admin_url( 'admin.php?page=' . $menu['slug'] ),
						'meta'   => isset( $menu['meta'] ) ? $menu['meta'] : array(),
						'parent' => FALSE
					) );

					$menu['parent'] = $menu['slug'];
				}


				$wp_admin_bar->add_node( array(
					'id'     => $menu['slug'],
					'title'  => isset( $menu['menu_title'] ) ? $menu['menu_title'] : $menu['name'],
					'href'   => isset( $menu['href'] ) ? $menu['href'] : admin_url( 'admin.php?page=' . $menu['slug'] ),
					'meta'   => isset( $menu['meta'] ) ? $menu['meta'] : array(),
					'parent' => $menu['parent'] . $parent_suffix
				) );
			}
		}
	}


	/**
	 * Used for adding page to WP menu
	 *
	 * @since 1.4
	 *
	 * @param $menu
	 */
	function add_menupage( $menu ) {

		if ( isset( $menu['id'] ) && isset( $menu['callback'] ) ) {

			$this->admin_menus[ $menu['id'] ] = $menu;

		}

	}

	/**
	 * Used for remove a page from WP menu
	 *
	 * @since 1.4
	 *
	 * @param string $menu_id
	 *
	 * @return bool
	 */
	function remove_menupage( $menu_id ) {

		if ( isset( $this->admin_menus[ $menu_id ] ) ) {

			unset( $this->admin_menus[ $menu_id ] );

			return TRUE;
		}

		return FALSE;
	}


	/**
	 * Used for adding separator to BetterStudio WP menu
	 *
	 * @since 2.0
	 *
	 * @param $position
	 */
	function add_menu_separator( $position = 79 ) {

		$id = 'sep-' . mt_rand();

		$this->admin_menus[ $id ] = array(
			'id'         => $id,
			'slug'       => 'sep',
			'name'       => '',
			'page_title' => '',
			'menu_title' => '',
			'callback'   => '',
			'parent'     => 'better-studio',
			'position'   => $position,
		);

	}


	/**
	 * Hook register menus to WordPress
	 *
	 * @since   1.4
	 * @access  public
	 *
	 * @return  void
	 */
	function wp_admin_menu() {

		/**
		 * Action for adding menu pages
		 *
		 * @since 1.4
		 */
		do_action( 'better-framework/admin-menus/admin-menu/before', $this );

		// If there is no submitted admin menu
		if ( count( $this->admin_menus ) == 0 ) {
			return;
		}

		// Collects all menus outside of main betterstudio menu
		$other_menus = array();

		// Adds admin pages that are outside of BetterStudio main menu
		foreach ( (array) $this->admin_menus as $menu_id => $menu ) {

			if ( isset( $menu['register_menu'] ) && $menu['register_menu'] == FALSE ) {
				unset( $this->admin_menus[ $menu_id ] );
				continue;
			}

			if ( isset( $menu['parent'] ) && $menu['parent'] != 'better-studio' ) {

				if ( isset( $menu['on_admin_bar'] ) && $menu['on_admin_bar'] ) {
					$this->admin_bar_menus[ $menu_id ] = $menu;
				}
				if ( isset( $menu['on_sidebar'] ) && ! $menu['on_sidebar'] ) {
					continue;
				}

				$other_menus[ $menu_id ] = $menu;

				unset( $this->admin_menus[ $menu_id ] ); // remove from main menus
			}
		}

		// Sorts items with position sub array key
		usort( $other_menus, array( $this, 'usort_cmp_by_position' ) );

		// Adds admin pages that are outside of BetterStudio main menu
		foreach ( (array) $other_menus as $menu_id => $menu ) {

			if ( $menu['parent'] === FALSE && isset( $menu['parent_title'] ) ) {

				$_main_admin_menu_id   = 'better-studio/' . $menu['id'];
				$_main_admin_menu_slug = $menu['slug'];

				// Adds main better studio menu page
				$this->register_menu_page( array(
					'id'         => $_main_admin_menu_id,
					'slug'       => $_main_admin_menu_slug,
					'parent'     => FALSE,
					'name'       => $menu['parent_title'],
					'page_title' => $menu['parent_title'],
					'menu_title' => $menu['parent_title'],
					'callback'   => $menu['callback'],
					'capability' => 'manage_options',
					'icon'       => '',
					'position'   => $menu['position'],
				) );

				// Updates main menu page for new main sub menu
				$this->register_menu_page( array(
					'id'         => $_main_admin_menu_id,
					'slug'       => $_main_admin_menu_slug,
					'parent'     => $_main_admin_menu_slug,
					'name'       => $menu['name'],
					'page_title' => $menu['page_title'],
					'menu_title' => $menu['menu_title'],
					'callback'   => $menu['callback'],
					'capability' => 'manage_options',
					'icon'       => NULL,
					'position'   => 1,
				) );

				// Adds another temp item to force menu for having sub menu
				$this->register_menu_page( array(
					'id'         => '',
					'slug'       => 'extra',
					'parent'     => $_main_admin_menu_slug,
					'name'       => '',
					'page_title' => '',
					'menu_title' => '',
					'capability' => 'manage_options',
					'icon'       => NULL,
					'position'   => '99',
				) );

				// Add style for hiding temp sub menu with css
				$this->add_css( '#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $_main_admin_menu_slug ) . ' .wp-submenu li:nth-child(3){ display: none !important; }', TRUE );

				if ( ! empty( $menu['icon'] ) ) {

					$menu = $this->normalize_icon( $menu );

					$this->add_css( '#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $_main_admin_menu_slug ) . ' .wp-menu-image:before{ content: \'' . $menu['icon']['font_code'] . '\' !important; font-family: \'' . $menu['icon']['font_name'] . '\'; font-size: 15px; line-height: 21px;}', TRUE );
				}

				unset( $this->admin_menus[ $menu_id ] );

			} else {

				$this->register_menu_page( $menu );

				unset( $this->admin_menus[ $menu_id ] );

			}
		}

		// add separator if needed
		$this->prepare_menu_separators();

		// Sorts items with position sub array key
		usort( $this->admin_menus, array( $this, "usort_cmp_by_position" ) );

		// When there is only one item in BetterStudio main menu
		if ( count( $this->admin_menus ) == 1 ) {

			$menu = current( $this->admin_menus );

			// Save main menu id tat will be used for hiding
			$this->main_admin_menu_id = 'better-studio/' . $menu['id'];
			// todo check this, here we should set $this->main_admin_menu_slug but we don't!

			// Adds main better studio menu page
			$this->register_menu_page( array(
				'id'         => $this->main_admin_menu_id,
				'slug'       => $this->main_admin_menu_slug,
				'parent'     => FALSE,
				'name'       => '<strong>Better</strong> Studio',
				'page_title' => '<strong>Better</strong> Studio',
				'menu_title' => '<strong>Better</strong> Studio',
				'callback'   => $menu['callback'],
				'capability' => 'manage_options',
				'icon'       => '',
				'position'   => '59.001',
			) );

			// Updates main menu page for new main sub menu
			$this->register_menu_page( array(
				'id'         => $this->main_admin_menu_id,
				'slug'       => $this->main_admin_menu_slug,
				'parent'     => $this->main_admin_menu_slug,
				'name'       => $menu['name'],
				'page_title' => $menu['page_title'],
				'menu_title' => $menu['menu_title'],
				'callback'   => $menu['callback'],
				'capability' => 'manage_options',
				'icon'       => NULL,
				'position'   => '59.001',
			) );

			// Adds another temp item to force menu for having sub menu
			$this->register_menu_page( array(
				'id'         => '',
				'slug'       => 'extra',
				'parent'     => $this->main_admin_menu_slug,
				'name'       => '',
				'page_title' => '',
				'menu_title' => '',
				'capability' => 'manage_options',
				'icon'       => NULL,
				'position'   => '59.001',
			) );

			// Add style for hiding temp sub menu with css
			$this->add_css( '#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $this->main_admin_menu_slug ) . ' .wp-submenu li:nth-child(3){ display: none !important; }', TRUE );
			$this->add_css( '#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $this->main_admin_menu_slug ) . ' .wp-menu-image:before{ content: \'\e000\' !important; font-family: \'Better Studio Admin Icons\'; font-size: 15px; line-height: 21px;}', TRUE );

		} else {

			foreach ( $this->admin_menus as $menu_id => $menu ) {

				// Adds main menu and update sub menu
				if ( empty( $this->main_admin_menu_id ) ) {

					// Save main menu id that will be used for hiding
					$this->main_admin_menu_id = 'better-studio/' . $menu['id'];

					if ( isset( $menu['slug'] ) ) {
						$this->main_admin_menu_slug = $menu['slug'];
					} else {
						$this->main_admin_menu_slug = $this->main_admin_menu_id;
					}

					// Adds main better studio menu page
					$this->register_menu_page( array(
						'id'                  => $this->main_admin_menu_id,
						'slug'                => $this->main_admin_menu_slug,
						'parent'              => FALSE,
						'name'                => '<strong>Better</strong> Studio',
						'page_title'          => '<strong>Better</strong> Studio',
						'menu_title'          => '<strong>Better</strong> Studio',
						'callback'            => $menu['callback'],
						'capability'          => 'manage_options',
						'icon'                => '',
						'position'            => '59.001',
						'exclude_from_export' => FALSE,
					) );

					// Updates main menu page for new main sub menu
					$this->register_menu_page( array(
						'id'                  => $this->main_admin_menu_id,
						'slug'                => $this->main_admin_menu_slug,
						'parent'              => $this->main_admin_menu_slug,
						'name'                => $menu['name'],
						'page_title'          => $menu['page_title'],
						'menu_title'          => $menu['menu_title'],
						'callback'            => $menu['callback'],
						'capability'          => 'manage_options',
						'icon'                => NULL,
						'position'            => '59.001',
						'exclude_from_export' => FALSE,
					) );

				} // add sub menu for main menu
				else {

					$menu['parent'] = $this->main_admin_menu_slug;

					$this->register_menu_page( $menu );

				}
			}


		}

		// adding separator for main menu
		$this->add_css( '
#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $this->main_admin_menu_slug ) . ' { margin-bottom: 10px !important; }
#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $this->main_admin_menu_slug ) . ' ul li a[href=sep]{
height: 0px;
border-top: 1px solid rgba(255, 255, 255, 0.1);
overflow: hidden;
margin: 5px 0;
pointer-events: none;
padding:0;
cursor: default;
}
', TRUE );
		$this->add_css( '#adminmenu li#toplevel_page_' . str_replace( array( '/' ), '-', $this->main_admin_menu_slug ) . ' .wp-menu-image:before{ content: \'\e000\' !important; font-family: \'Better Studio Admin Icons\'; font-size: 15px; line-height: 21px;}', TRUE );

	}


	/**
	 * Adds menu page or sub page to WordPress
	 *
	 * @since 1.4
	 *
	 * @param bool|array $menu
	 */
	public function register_menu_page( $menu = FALSE ) {

		if ( $menu == FALSE || ! is_admin() ) {
			return;
		}

		$menu['parent'] = isset( $menu['parent'] ) ? $menu['parent'] : FALSE;

		// Prepares menu name
		$name = str_replace(
			array(
				'_',
				'-'
			),
			array(
				' ',
				' '
			),
			$menu['id']
		);

		$name = ucwords( $name );

		// Page title
		$menu['page_title'] = isset( $menu['page_title'] ) ? $menu['page_title'] : ucfirst( $menu['id'] );

		// Menu title
		$menu['menu_title'] = isset( $menu['menu_title'] ) ? $menu['menu_title'] : $name;

		// Page shown for users that hav this capabilities
		$menu['capability'] = isset( $menu['capability'] ) ? $menu['capability'] : 'manage_options';

		// Menu icon
		$menu['icon'] = isset( $menu['icon'] ) ? $menu['icon'] : NULL;

		// Menu position in BetterStudio sub menu
		$menu['position'] = isset( $menu['position'] ) ? $menu['position'] : 40;

		// prepare menu slug
		if ( isset( $menu['slug'] ) ) {
			$menu_slug = $menu['slug'];
		} else {
			$menu_slug = 'better-studio/' . $menu['id'];
		}

		// prepare callback
		if ( ! isset( $menu['callback'] ) ) {
			$menu['callback'] = '';
		}

		if ( $menu['parent'] == FALSE ) {

			call_user_func_array( 'add_' . 'menu' . '_page', array(
					$menu['page_title'],
					$menu['menu_title'],
					$menu['capability'],
					$menu_slug,
					$menu['callback'],
					$menu['icon'],
					$menu['position']
				)
			);

		} else {

			call_user_func_array( 'add_' . 'sub' . 'menu' . '_page', array(
					$menu['parent'],
					$menu['page_title'],
					$menu['menu_title'],
					$menu['capability'],
					$menu_slug,
					$menu['callback']
				)
			);

		}

	}


	/**
	 * Evaluate registered menus and adds smart separators
	 */
	function prepare_menu_separators() {

		$important_pages = FALSE; // Theme pages and other important pages

		$general_pages = FALSE; // General pages

		$plugins_pages = FALSE; // Plugin pages

		$unimportant_pages = FALSE; // Unimportant pages

		foreach ( $this->admin_menus as $menu ) {

			// Important pages
			if ( floatval( $menu['position'] ) > 0 && floatval( $menu['position'] ) < 50 ) {
				$important_pages = TRUE;
			} elseif ( floatval( $menu['position'] ) > 50 && floatval( $menu['position'] ) < 80 ) {
				$general_pages = TRUE;
			} elseif ( floatval( $menu['position'] ) > 80 && floatval( $menu['position'] ) < 100 ) {
				$plugins_pages = TRUE;
			} elseif ( floatval( $menu['position'] ) >= 100 ) {
				$unimportant_pages = TRUE;
			}

		}

		if ( $important_pages && $general_pages && $plugins_pages && $unimportant_pages ) {
			$this->add_menu_separator( 49 );
			$this->add_menu_separator( 79 );
			$this->add_menu_separator( 99 );
		} elseif ( ! $important_pages && $general_pages && $plugins_pages && $unimportant_pages ) {
			$this->add_menu_separator( 79 );
			$this->add_menu_separator( 99 );
		} elseif ( ! $important_pages && ! $general_pages && $plugins_pages && $unimportant_pages ) {
			$this->add_menu_separator( 99 );
		} elseif ( ! $important_pages && ! $general_pages && ! $plugins_pages && $unimportant_pages ) {
			$this->add_menu_separator( 99 );
		} elseif ( $important_pages && $general_pages && ! $plugins_pages && ! $unimportant_pages ) {
			$this->add_menu_separator( 49 );
		} elseif ( $important_pages && $general_pages && ! $plugins_pages && $unimportant_pages ) {
			$this->add_menu_separator( 49 );
			$this->add_menu_separator( 99 );
		} elseif ( $important_pages && $general_pages && $plugins_pages && ! $unimportant_pages ) {
			$this->add_menu_separator( 79 );
		}

	}

	//
	//
	// Handy Functions
	//
	//


	/**
	 * Handy function for sorting arrays with position sub value value
	 *
	 * @since 1.4
	 *
	 * @param $a
	 * @param $b
	 *
	 * @return mixed
	 */
	private function usort_cmp_by_position( $a, $b ) {

		return floatval( $a["position"] ) > floatval( $b["position"] );
	}


	protected function add_css( $code, $to_top = TRUE ) {

		if ( is_user_logged_in() ) {
			call_user_func( is_admin() ? 'bf_add_admin_css' : 'bf_add_css', $code, $to_top, TRUE );
		}
	}


	/**
	 * Changes icon field into standard format.
	 * (Backward compatibility)
	 *
	 * @param $menu
	 *
	 * @return mixed
	 */
	private function normalize_icon( $menu ) {

		if ( is_string( $menu['icon'] ) ) {

			$menu['icon'] = array(
				'icon'      => 'bsfi-publisher',
				'type'      => 'bs-icons',
				'height'    => '',
				'width'     => '',
				'font_code' => $menu['icon'],
				'font_name' => 'Better Studio Admin Icons',
			);
		} else {

			$_check = array(
				'bs-icons'    => 'bs-icons',
				'fontawesome' => 'FontAwesome',
			);

			if ( isset( $_check[ $menu['icon']['type'] ] ) ) {
				$menu['icon']['font_name'] = $_check[ $menu['icon']['type'] ];
			} else {
				$menu['icon']['font_name'] = 'Better Studio Admin Icons';
			}
		}

		return $menu;
	}
}