<?php


if ( ! function_exists( 'migrator_add_submenu_page' ) ) {

	/**
	 *
	 * Add a submenu page
	 *
	 * Add the following features to wordpress  add_submenu_page function
	 *
	 * 1. Pass custom arguments to callback
	 *
	 * @see   add_submenu_page for more doc.
	 *
	 * @global array   $migrator_submenu_page_argument store callbacks arguments
	 *
	 * @param string   $parent_slug                    The slug name for the parent menu (or the file name of a standard
	 *                                                 WordPress admin page).
	 * @param string   $page_title                     The text to be displayed in the title tags of the page when the menu
	 *                                                 is selected.
	 * @param string   $menu_title                     The text to be used for the menu.
	 * @param string   $capability                     The capability required for this menu to be displayed to the user.
	 * @param string   $menu_slug                      The slug name to refer to this menu by (should be unique for this
	 *                                                 menu).
	 * @param callable $function                       The function to be called to output the content for this page.
	 * @param array    $arguments
	 *
	 * @since 1.0.0
	 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
	 */
	function migrator_add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = NULL, $arguments = array() ) {

		global $migrator_submenu_page_argument;

		$result = add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

		if ( $result ) {

			$hookname = &$result;

			remove_action( $hookname, $function );

			if ( ! has_action( $hookname, '_migrator_submenu_page_callback' ) ) {
				add_action( $hookname, '_migrator_submenu_page_callback' );
			}

			if ( ! $migrator_submenu_page_argument ) {
				$migrator_submenu_page_argument = array();
			}

			$migrator_submenu_page_argument[ $hookname ] = array( $function, $arguments );
		}

		return $result;
	}
}

if ( ! function_exists( '_migrator_submenu_page_callback' ) ) {

	/**
	 * Handle callbacks has been added to  migrator_add_submenu_page function
	 *
	 * @see    migrator_add_submenu_page
	 *
	 * @global array $migrator_submenu_page_argument store callbacks arguments
	 * @global array $mg_routes_sub_pages            store routes sub pages info
	 * @global array $mg_current_controller          store fired controller name
	 *
	 * @access private
	 * @since  1.0.0
	 *
	 */
	function _migrator_submenu_page_callback() {

		global $migrator_submenu_page_argument;
		global $mg_routes_sub_pages;
		global $mg_current_controller;

		$hookname = current_filter();

		if ( isset( $migrator_submenu_page_argument[ $hookname ] ) ) {

			// Check sub pages
			if ( ! empty( $mg_routes_sub_pages[ $hookname ] ) && ( $sub_pages = array_intersect_key( $mg_routes_sub_pages[ $hookname ], $_REQUEST ) ) ) {

				$var   = key( $sub_pages );
				$value = $_REQUEST[ $var ];

				$callback  = &$mg_routes_sub_pages[ $hookname ][ $var ];
				$arguments = array( $value );

				if ( $callback[0] === '@' ) {

					if ( isset( $migrator_submenu_page_argument[ $hookname ][0] ) ) {

						$method = substr( $callback, 1 );
						//
						$callback = &$migrator_submenu_page_argument[ $hookname ][0];
						//
						$arguments    = $migrator_submenu_page_argument[ $hookname ][1];
						$arguments[1] = $method;
						$arguments[2] = array( $value );

					} else {

						$callback = FALSE;
					}

				}

			} else {

				$callback  = &$migrator_submenu_page_argument[ $hookname ][0];
				$arguments = &$migrator_submenu_page_argument[ $hookname ][1];
			}

			if ( $callback ) {

				if ( isset( $callback[0] ) && in_array( 'Migrator_Is_Controller', class_implements( $callback[0] ) ) ) {
					$mg_current_controller = $callback[0];
				}

				call_user_func_array( $callback, $arguments );
			}
		}
	}
}


if ( ! function_exists( 'mg_admin_route' ) ) {

	/**
	 *
	 * Add new admin page
	 *
	 * @param string   $parent
	 * @param string   $slug
	 * @param callable $callback
	 * @param          $sub_pages
	 * @param array    $options             {
	 *
	 * @return mixed
	 * @throws \BS_Exception
	 * @internal param string $capability . User capability to access to register page. optional. default:manage_options
	 * @internal param string $error_type .
	 *
	 * @internal param string $page_title The text to be displayed in the title tags of the page when the menu is selected.
	 * @internal param string $menu_title The text to be used for the menu.
	 *
	 * @internal param string $route_name name of the route.
	 * }
	 *
	 *
	 * @global array   $mg_named_routes     store named routes info
	 * @global array   $mg_routes_sub_pages store routes sub pages info
	 *
	 * @since    1.0.0
	 */
	function mg_admin_route( $parent, $slug, $callback, $sub_pages, $options = array() ) {

		global $mg_named_routes;
		global $mg_routes_sub_pages;

		$options = wp_parse_args( $options, array(
			'capability' => 'manage_options',
			'error_type' => BS_Error_handler::WP_ERROR,
			//
			'page_title' => '',
			'menu_title' => '',
			//
			'route_name' => '',
		) );

		try {

			$_callback = mg_factory_method( $callback, $callback );
			$arguments = array();

			if ( is_array( $_callback ) ) {

				if ( isset( $_callback['args'] ) ) {
					$arguments = $_callback['args'];
				}

				if ( isset( $_callback['callable'] ) ) {
					$_callback = $_callback['callable'];
				}
			}


			if ( ! is_callable( $_callback ) ) {

				throw new BS_Exception( __( 'Invalid Callback passed.', WPMG_LOC ), 'invalid-callback' );
			}

			if ( empty( $options['menu_title'] ) ) {

				throw new BS_Exception( __( 'The menu_title is empty', WPMG_LOC ), 'empty-menu_title' );
			}

			if ( ! did_action( 'admin_menu' ) ) {

				return BS_Deffer_Callback::queue( 'admin_menu', array(
					'callback' => __FUNCTION__,
					'params'   => func_get_args(),
				) );
			}


			if ( ! $hookname = migrator_add_submenu_page( $parent, $options['page_title'], $options['menu_title'], $options['capability'], $slug, $_callback, $arguments ) ) {
				throw new BS_Exception( __( 'Unknown error occurred', WPMG_LOC ), 'failed' );
			}


			if ( $sub_pages ) {
				$mg_routes_sub_pages[ $hookname ] = $sub_pages;
			}

			if ( $options['route_name'] ) {
				$mg_named_routes[ $options['route_name'] ] = $slug;
			}

			return TRUE;

		} catch( BS_Exception $e ) {

			return BS_Error_handler::handle( $e, $options['error_type'] );
		}
	}
}

if ( ! function_exists( 'mg_router_ajax_fix' ) ) {

	/**
	 * Handle routing in ajax requests
	 *
	 * @global string $mg_current_controller
	 *
	 * @since 1.0.0
	 */
	function mg_router_ajax_fix() {

		global $mg_current_controller;

		if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {
			return;
		}

		if ( isset( $_REQUEST['_mgctrl'] ) && $_REQUEST['_mgctrl_token'] ) {

			$controller = $_REQUEST['_mgctrl'];

			if ( is_string( $controller ) && wp_verify_nonce( $_REQUEST['_mgctrl_token'], "migrator-controller-$controller" ) ) {

				if ( $callback = mg_factory_method( "$controller@ajax_init" ) ) {

					call_user_func_array( $callback['callable'], $callback['args'] );

					$mg_current_controller = $controller;
				}
			}
		}
	}

	add_action( 'admin_init', 'mg_router_ajax_fix' );
}


if ( ! function_exists( 'mg_factory_method' ) ) {

	/**
	 *
	 * Get factory method of the object
	 *
	 * @param string $class
	 * @param mixed  $default
	 *
	 * @return mixed array on success or $default on failure.
	 * @since 1.0.0
	 */
	function mg_factory_method( $class, $default = '' ) {

		$callable = '';
		$args     = array();

		if ( is_string( $class ) && strstr( $class, '@' ) ) {

			$parsed = explode( '@', $class );

			/**
			 * @see Migrator_Is_Controller::controller_call_method
			 */
			$callable = array(
				$parsed[0],              # Class name
				'controller_call_method',
			);

			$args = array(
				$parsed[0], # Class name,
				$parsed[1], # Class method
			);
		}

		if ( $callable ) {
			return compact( 'callable', 'args' );
		}

		return $default;
	}
}

if ( ! function_exists( 'mg_sanitize_file_name' ) ) {

	/**
	 * Sanitize file name
	 *
	 * @param string $file_name
	 *
	 * @since 1.0.0
	 *
	 * @uses  sanitize_file_name
	 *
	 * @return string
	 */
	function mg_sanitize_file_name( $file_name ) {


		$file_name = str_replace( '.', '/', $file_name );

		return $file_name;
	}
}


if ( ! function_exists( 'mg_view' ) ) {

	/**
	 * Load view file
	 *
	 * @param string $view_file view file path
	 * @param array  $vars      pass variables to view
	 * @param array  $options   options
	 *
	 * @since 1.0.0
	 *
	 * @throws BS_Exception
	 * @return string|bool|WP_Error string on success or the following types on failure.
	 *
	 * false        if $options[error_type] === BS_Error_handler::NONE_ERROR
	 * WP_Error     if $options[error_type] === BS_Error_handler::WP_ERROR
	 * BS_Exception if $options[error_type] === BS_Error_handler::THROW_ERROR
	 */
	function mg_view( $view_file, $vars = array(), $options = array() ) {

		$view_directory = apply_filters( 'wp-migrator/core/view-dir', WP_MIGRATOR_PATH . '/resources/views' );

		$options = wp_parse_args( $options, array(
			'error_type' => BS_Error_handler::WP_ERROR,
			'root'       => $view_directory,
			'echo'       => TRUE,
		) );


		try {

			if ( ! is_string( $view_file ) ) {
				throw new BS_Exception( 'Invalid file name passed!', 'invalid_file_name' );
			}

			$view_file      = mg_sanitize_file_name( $view_file );
			$view_full_path = trailingslashit( $options['root'] ) . $view_file . '.php';

			if ( ! is_readable( $view_full_path ) ) {
				throw new BS_Exception( "Cannot read the view file $view_file", 'file_not_found' );
			}

			if ( ! $options['echo'] ) {
				ob_start();
			}

			extract( $vars );

			include $view_full_path;

			if ( ! $options['echo'] ) {
				return ob_get_clean();
			}

		} catch( BS_Exception $e ) {

			return BS_Error_handler::handle( $e, $options['error_type'] );
		}
	}
}

if ( ! function_exists( 'mg_asset' ) ) {

	/**
	 * Get asset url
	 *
	 * @param string $path File Path
	 *
	 * @since 1.0.0
	 *
	 * @return void|string
	 */
	function mg_asset( $path ) {

		$full_path = WP_MIGRATOR_PATH . '/assets/' . $path;

		if ( file_exists( $full_path ) ) {

			return WPMG_URL . 'assets/' . $path;
		}
	}
}

if ( ! function_exists( 'mg_route' ) ) {

	/**
	 *
	 * Get permalink of a named route
	 *
	 * @see   mg_admin_route 'route_name' option
	 *
	 * @global array $mg_named_routes store named routes info
	 *
	 * @param string $rote_name       name of the round
	 * @param array  $query_args      http query args
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function mg_route( $rote_name, $query_args = array() ) {

		global $mg_named_routes;


		if ( isset( $mg_named_routes[ $rote_name ] ) ) {

			if ( $url = menu_page_url( $mg_named_routes[ $rote_name ], FALSE ) ) {

				if ( $query_args ) {
					$url = add_query_arg( $query_args, $url );
				}

				return $url;
			}
		}

		return '';
	}
}

if ( ! function_exists( 'mg_current_controller' ) ) {


	/**
	 * Get current running controller
	 *
	 *
	 * @global string $mg_current_controller
	 * @since 1.0.0
	 *
	 * @return string
	 */
	function mg_current_controller() {

		global $mg_current_controller;

		return $mg_current_controller;
	}
}

if ( ! function_exists( 'mg_ajax_url' ) ) {

	/**
	 * Get ajax url
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function mg_ajax_url() {

		$controller = mg_current_controller();
		$url        = add_query_arg(
			array(
				'_mgctrl'       => $controller,
				'_mgctrl_token' => wp_create_nonce( "migrator-controller-$controller" ),
			),
			self_admin_url( 'admin-ajax.php' )
		);

		return $url;
	}
}


