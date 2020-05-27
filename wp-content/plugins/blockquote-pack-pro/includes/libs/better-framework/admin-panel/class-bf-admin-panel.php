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


// Prevent Direct Access
defined( 'ABSPATH' ) or die;


/**
 * BF Admin Panel Main Class
 *
 * @package BetterFramework
 * @since   1.0
 */
class BF_Admin_Panel {


	/**
	 * Holds everything about the front-end template
	 *
	 * @since  1.0
	 * @access public
	 * @var array
	 */
	public $template = array();


	/**
	 * Init Function
	 *
	 * Hook Initial Functions
	 *
	 * @static
	 * @since  1.0
	 * @access public
	 * @return BF_Admin_Panel
	 */
	public static function init() {

		$class = __CLASS__;

		return new $class;
	}


	/**
	 * Constructor Function
	 *
	 * @since  1.0
	 * @access public
	 * @return BF_Admin_Panel
	 */
	public function __construct() {

		// loads all fields
		if ( ! BF_Options::get_panels() ) {
			return;
		}

		// Callback for adding admin menus
		add_action( 'better-framework/admin-menus/admin-menu/before', array( $this, 'add_menu' ) );

		add_action( 'better-framework/panel/save', array( $this, 'handle_saving_option_panel' ) );

		add_action( 'better-framework/panel/reset', array( $this, 'reset_options' ) );

		add_action( 'better-framework/panel/import', array( $this, 'handle_ajax_import' ), 10, 2 );

		// Ajax panel groups handler
		add_action( 'better-framework/panel/ajax-panel-field', array( $this, 'ajax_panel_field' ), 10, 2 );

		if ( is_admin() && isset( $_POST['bf-export'] ) && $_POST['bf-export'] == 1 ) {

			if ( is_user_logged_in() ) {
				add_action( 'admin_init', array( $this, 'handle_export_download' ) );
			}
		}

		// Callback for adding page custom classes
		add_filter( 'admin_body_class', array( $this, 'admin_body_class' ), 999 );

	}


	/**
	 * Handle ajax group loading requests in panel
	 *
	 * @param string $panel_id
	 * @param string $section_id
	 *
	 * @since 2.10.0
	 */
	public function ajax_panel_field( $panel_id, $section_id ) {

		if ( ! class_exists( 'BF_Admin_Panel_Front_End_Generator' ) ) {
			require BF_PATH . 'admin-panel/class-bf-admin-panel-front-end-generator.php';
		}

		$data = $this->get_page_data_by_id( $panel_id );

		if ( ! $data ) {
			return;
		}

		$feg_instance = new BF_Admin_Panel_Front_End_Generator( $data, $panel_id );
		$items        = $feg_instance->get_items();
		$fields       = &$items['fields'];

		if ( empty( $fields[ $section_id ]['ajax-section-handler'] ) ) {

			foreach ( $fields as $idx => $field ) {

				// Backward compatibility
				if ( isset( $field['ajax-tab-field'] ) ) {
					$field['ajax-section-field'] = $field['ajax-tab-field'];
				}

				if ( empty( $field['ajax-section-field'] ) || $field['ajax-section-field'] !== $section_id ) {
					unset( $fields[ $idx ] );
				}
			}

			$feg_instance->set_items( $items );
			$out = $feg_instance->get_fields( false, false );
		} else {

			$args = isset( $fields[ $section_id ]['ajax-section-handler-args'] ) ? $fields[ $section_id ]['ajax-section-handler-args'] : array();
			$args = array_merge( $args, compact( 'panel_id', 'section_id' ) );

			if (
				! isset( $fields[ $section_id ]['ajax-section-handler-type'] ) ||
				$fields[ $section_id ]['ajax-section-handler-type'] === 'field-generator'
			) {

				$items['fields'] = call_user_func( $fields[ $section_id ]['ajax-section-handler'], $args );

				$feg_instance->set_items( $items );
				$out = $feg_instance->get_fields( false, false );

			} else {

				$out = call_user_func( $fields[ $section_id ]['ajax-section-handler'], $args );
			}
		}


		wp_send_json( compact( 'out', 'section_id' ) );
	}


	/**
	 * Callback: Used for adding page custom classes to admin body
	 *
	 * @since   2.0
	 *
	 * @param $classes
	 *
	 * @return string
	 */
	function admin_body_class( $classes ) {

		if ( ! $this->get_current_page_id() ) {

			return $classes;
		}

		$classes = explode( ' ', $classes );

		$classes = array_flip( $classes );

		$classes['bf-admin-panel'] = 'bf-admin-panel';
		$classes['hide-notices']   = 'hide-notices';

		return implode( ' ', $classes );
	}


	/**
	 * Hook register menus to WordPress
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	public function add_menu() {

		if ( ! is_admin() || bf_is_doing_ajax() ) {
			return;
		}

		foreach ( BF_Options::$panels as $panel_id => $panel ) {

			$config = BF_Options::load_panel_config( $panel_id );

			if ( ! isset( $config['config'] ) ) {
				continue;
			}

			$menu = $config['config'];

			$menu['id'] = $panel_id;

			if ( isset( $panel['theme-panel'] ) ) {
				$menu['theme-panel'] = true;
			}

			// prepare slug
			if ( ! isset( $menu['callback'] ) ) {
				$menu['callback'] = array( $this, 'menu_callback' );
			}

			Better_Framework()->admin_menus()->add_menupage( $menu );
		}

	}


	/**
	 * Get All Paths
	 *
	 * get all paths, such as template directories
	 *
	 * @since  1.0
	 * @access public
	 * @return array|bool
	 */
	public function get_all_paths() {

		$id = $this->get_current_page_id();

		if ( $id == false ) {
			return false;
		}

		$i = BF_PATH . '/includes/';

		$output                                            = array();
		$output['custom-panel-main-default-template']      = $i . 'templates/admin-panel/default/';
		$output['custom-panel-main-template-current-page'] = $i . "templates/admin-panel/{$id}/";
		$output['default-panel-main-template']             = bf_get_dir( "admin-panel/templates/default/" );

		return $output;
	}


	/**
	 * Get current page
	 *
	 * Return current page id
	 *
	 * static
	 *
	 * @since  1.0
	 * @access public
	 * @return string
	 */
	public function get_current_page_id() {

		if ( ! isset( $_GET['page'] ) ) {
			return false;
		}

		$page = explode( '/', $_GET['page'] );

		if ( empty( $page[1] ) ) {
			return false;
		}

		switch ( $page[1] ) {

			// Support better-translation slug
			case 'translations':
				return $page[2];

			default:
				// Validating panel id by slug.
				if ( $this->get_page_data_by_id( $page[1] ) ) {

					return $page[1];
				}

				return false;

		}
	}


	/**
	 * Get page data which is hooked to better-framework/panel/options
	 *
	 * @param string $panel_id Needed page ID
	 *
	 * @since  1.0
	 * @access public
	 * @return bool|array
	 */
	public function get_page_data_by_id( $panel_id ) {


		// If panel slug is page id
		if ( isset( BF_Options::$panels[ $panel_id ] ) ) {

			return BF_Options::load_panel_config( $panel_id );

		} // Check for panels with custom slug
		else {

			foreach ( BF_Options::$panels as $_panel_id => $panel ) {

				$panel = BF_Options::load_panel_config( $_panel_id );

				if (
					isset( $panel['config']['slug'] ) &&
					( $panel['config']['slug'] == $panel_id ||
					  $panel['config']['slug'] == ( 'better-studio/' . $panel_id ) ||
					  $panel['config']['slug'] == ( 'better-studio/translations/' . $panel_id )
					)
				) {
					$panel['panel-id'] = $_panel_id;

					return $panel;
				}

			}
		}

		return false;
	}


	/**
	 * Get page current data
	 *
	 * @since  1.0
	 * @access public
	 * @return bool|array
	 */
	public function get_current_page_data() {

		return $this->get_page_data_by_id( $this->get_current_page_id() );
	}


	/**
	 * Menu Callback
	 *
	 * The callback of add_menupage which is about the front-end stuff
	 *
	 * todo add support for custom template for each panel
	 *
	 * @since  1.0
	 * @access public
	 * @return mixed
	 */
	public function menu_callback() {

		$id = $this->get_current_page_id();

		// If panel id is not valid.
		if ( ! $id ) {
			return;
		}

		$data = (array) $this->get_current_page_data();

		// Update panel id, this used because of custom slug for pages
		if ( isset( $data['panel-id'] ) ) {
			$id = $data['panel-id'];
		}

		if ( ! class_exists( 'BF_Admin_Panel_Front_End_Generator' ) ) {
			require BF_PATH . 'admin-panel/class-bf-admin-panel-front-end-generator.php';
		}

		$front_end_instance = new BF_Admin_Panel_Front_End_Generator( $data, $id );

		// Defined Template Tags
		$this->template = array(
			'id'     => $id,
			'data'   => $data,
			'tabs'   => $front_end_instance->get_tabs(),
			'fields' => $front_end_instance->get_fields(),
			'texts'  => array(
				// Reset Buttons
				'reset-button'      => isset( $data['texts']['reset-button'] ) ? $data['texts']['reset-button'] : __( 'Reset Settings', 'better-studio' ),
				'reset-button-all'  => isset( $data['texts']['reset-button-all'] ) ? $data['texts']['reset-button-all'] : __( 'Reset All Settings', 'better-studio' ),

				// Reset Confirms
				'reset-confirm'     => isset( $data['texts']['reset-confirm'] ) ? $data['texts']['reset-confirm'] : __( 'Are you sure to reset settings?', 'better-studio' ),
				'reset-confirm-all' => isset( $data['texts']['reset-confirm-all'] ) ? $data['texts']['reset-confirm-all'] : __( 'Are you sure to reset all settings?', 'better-studio' ),

				// Save Buttons
				'save-button'       => isset( $data['texts']['save-button'] ) ? $data['texts']['save-button'] : __( 'Save Settings', 'better-studio' ),
				'save-button-all'   => isset( $data['texts']['save-button-all'] ) ? $data['texts']['save-button-all'] : __( 'Save All Settings', 'better-studio' ),

				// Save Confirms
				'save-confirm'      => isset( $data['texts']['save-confirm'] ) ? $data['texts']['save-confirm'] : '',
				'save-confirm-all'  => isset( $data['texts']['save-confirm-all'] ) ? $data['texts']['save-confirm-all'] : __( 'Are you sure to save all settings? this will override specified settings per languages', 'better-studio' ),
			)
		);

		// Add tab class
		$has_tab = $front_end_instance->has_tab();
		if ( $has_tab ) {
			$this->template['css-class'][] = 'panel-with-tab';
		} else {
			$this->template['css-class'][] = 'panel-without-tab';
		}

		if ( isset( $data['panel-desc'] ) ) {
			$this->template['desc'] = $data['panel-desc'];
		}

		$lang = bf_get_current_lang_raw();

		if ( $lang != 'none' ) {

			if ( $lang == 'all' && isset( $data['texts']['panel-desc-lang-all'] ) ) {

				$this->template['desc'] = $data['texts']['panel-desc-lang-all'];

			} elseif ( isset( $data['texts']['panel-desc-lang'] ) ) {

				$this->template['desc'] = sprintf( $data['texts']['panel-desc-lang'], bf_get_language_name( $lang ) );

			}

		}

		$paths = $this->get_all_paths();

		if ( file_exists( $paths['custom-panel-main-template-current-page'] . 'main.php' ) ) {
			require_once $paths['custom-panel-main-template-current-page'] . 'main.php';
		} elseif ( file_exists( $paths['custom-panel-main-default-template'] . 'main.php' ) ) {
			require_once $paths['custom-panel-main-default-template'] . 'main.php';
		} else {
			require_once $paths['default-panel-main-template'] . 'main.php';
		}

	}


	/**
	 * Handle Save Options
	 *
	 * @param array $args The variable that includes all options in array
	 *
	 * @since 1.0
	 * @return void
	 */
	public function handle_saving_option_panel( $args ) {

		/**
		 * Fires before options save
		 *
		 * @since 2.0
		 *
		 * @param string $args arguments
		 */
		do_action( 'better-framework/panel/save/before', $args );

		if ( ! isset( $args['lang'] ) ) {
			$args['lang'] = '';
		}

		if ( $args['lang'] != 'all' ) {

			// Prepare Language
			if ( is_null( $args['lang'] ) || $args['lang'] == 'en' || $args['lang'] == 'none' ) {
				$lang_full = '';
			} else {
				$lang_full = '_' . $args['lang'];
			}

			// Fix for magic_quotes_gpc
			if ( function_exists( 'get_magic_quotes_gpc' ) && is_callable( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc() ) {
				$args['data'] = stripslashes_deep( $args['data'] );
			}

			// init value if not before
			if ( ! isset( BF_Options::$values[ $args['id'] ] ) ) {
				BF_Options::$values[ $args['id'] ] = get_option( $args['id'] . $lang_full );
			}

			// combine values
			foreach ( (array) $args['data'] as $field_id => $field_value ) {
				BF_Options::$values[ $args['id'] ][ $field_id ] = $field_value;
			}

			$skin_state = $this->prepare_skin( $args['id'], BF_Options::$values[ $args['id'] ], $args['lang'] );

			if ( Better_Framework()->options()->add_option( $args['id'], BF_Options::$values[ $args['id'] ], $args['lang'] ) !== false ) {

				Better_Framework()->factory( 'custom-css-fe' )->clear_cache( 'all' );

				$output = array(
					'status'  => 'succeed',
					'msg'     => __( 'Options saved.', 'better-studio' ),
					'notice'  => $skin_state ? __( 'Pre-defined Skin and Styles updated.', 'better-studio' ) : __( 'All options saved.', 'better-studio' ),
					'refresh' => $skin_state,
				);

			} else {
				$output = array(
					'status' => 'error',
					'msg'    => __( 'Error happened in saving option.', 'better-studio' )
				);
			}

		} else {

			foreach ( bf_get_all_languages() as $lang ) {

				if ( $lang['id'] == 'en' ) {
					$_lang = 'none';
				} else {
					$_lang = $lang['id'];
				}

				// Prepare Language
				if ( is_null( $lang['id'] ) || $lang['id'] == 'en' || $lang['id'] == 'none' ) {
					$lang_full = '';
				} else {
					$lang_full = '_' . $lang['id'];
				}

				// Fix for magic_quotes_gpc
				if ( function_exists( 'get_magic_quotes_gpc' ) && is_callable( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc() ) {
					$args['data'] = stripslashes_deep( $args['data'] );
				}

				// init value if not before
				if ( ! isset( BF_Options::$values[ $args['id'] . $lang_full ] ) ) {
					$saved_before = get_option( $args['id'] . $lang_full );
					if ( $saved_before == false ) {
						$saved_before = get_option( $args['id'] );
					}
					BF_Options::$values[ $args['id'] . $lang_full ] = $saved_before;
				}

				// combine values
				foreach ( (array) $args['data'] as $field_id => $field_value ) {
					BF_Options::$values[ $args['id'] . $lang_full ][ $field_id ] = $field_value;
				}

				$skin_state = $this->prepare_skin( $args['id'], BF_Options::$values[ $args['id'] . $lang_full ], $_lang );

				if ( Better_Framework()->options()->add_option( $args['id'], BF_Options::$values[ $args['id'] . $lang_full ], $_lang ) !== false ) {

					Better_Framework()->factory( 'custom-css-fe' )->clear_cache( 'all' );

					$output = array(
						'status'  => 'succeed',
						'msg'     => __( 'Options saved.', 'better-studio' ),
						'notice'  => $skin_state ? __( 'Pre-defined Skin and Styles updated.', 'better-studio' ) : __( 'All options saved.', 'better-studio' ),
						'refresh' => $skin_state,
					);

				} else {
					$output = array(
						'status' => 'error',
						'msg'    => __( 'Error happened in saving option.', 'better-studio' )
					);
				}

			}

		}


		/**
		 * Filter result of save panel
		 *
		 * @since 2.0
		 *
		 * @param array  $output  contains result of save
		 * @param string $options contain options
		 */
		$output = apply_filters( 'better-framework/panel/save/result', $output, $args );


		if ( $skin_state && ( $output['status'] == 'succeed' ) ) {
			Better_Framework()->admin_notices()->add_notice( array( 'msg' => $output['notice'] ) );
		}


		/**
		 * Fires after panel save
		 *
		 * @since 2.0
		 *
		 * @param string $args   contain options
		 * @param array  $output arguments
		 */
		do_action( 'better-framework/panel/reset/after', $output, $args );


		echo json_encode( $output );
	}


	/**
	 * Prepare values of options before save for specified values for styles.
	 *
	 * Checks if "style" was changed then check all fields for custom value for new style and change them and returns
	 * changed option.
	 *
	 * @param   string $panel_id Panel ID
	 * @param   array  $data     Panel Data
	 * @param   null   $lang     Panel Language
	 *
	 * @return bool
	 */
	function prepare_skin( $panel_id, &$data = array(), $lang = null ) {

		BF_Options::get_panels();

		// if panel have not valid or have not style
		if ( ! isset( BF_Options::$panels[ $panel_id ] ) || ! isset( BF_Options::$panels[ $panel_id ]['style'] ) || ! BF_Options::$panels[ $panel_id ]['style'] ) {
			return false;
		}

		// if data is empty or not added to function
		if ( bf_count( $data ) <= 0 ) {
			return false;
		}

		if ( is_null( $lang ) || empty( $lang ) ) {
			$lang = bf_get_current_lang();
		}

		if ( $lang == 'en' || $lang == 'none' || $lang == 'all' ) {
			$_lang = '';
		} else {
			$_lang = '_' . $lang;
		}

		$current_style = get_option( $panel_id . $_lang . '_current_style' );

		// if skin not changed
		if ( $current_style == $data['style'] ) {
			return false;
		}

		// update style
		update_option( $panel_id . $_lang . '_current_style', $data['style'], ! empty( $_lang ) ? 'no' : 'yes' );

		// Panel all default values
		$default = BF_Options::get_panel_std( $panel_id );

		// Panel all fields
		$fields = BF_Options::load_panel_fields( $panel_id );

		// Panel std id
		if ( $data['style'] == bf_get_panel_default_style() ) {
			$std_id = 'std';
		} else {
			$std_id = 'std-' . $data['style'];
		}

		foreach ( (array) $fields as $field ) {

			// no style
			// not in this style
			if ( ! isset( $field['style'] ) || ! in_array( $current_style, $field['style'] ) ) {
				continue;
			}

			// If field have std value then change current value std std value
			if ( isset( $default[ $field['id'] ][ $std_id ] ) ) {
				$data[ $field['id'] ] = $default[ $field['id'] ][ $std_id ];
			} elseif ( isset( $default[ $field['id'] ]['std'] ) ) {
				$data[ $field['id'] ] = $default[ $field['id'] ]['std'];
			}

		}

		return true;
	}


	/**
	 * Reset All Options
	 *
	 * @since 1.0
	 *
	 * @param $data
	 *
	 * @return void
	 */
	public function reset_options( $data ) {

		/**
		 * Fires before options reset
		 *
		 * @since 2.0
		 *
		 * @param string $data contain options
		 */
		do_action( 'better-framework/panel/reset/before', $data );

		$fields = BF_Options::load_panel_fields( $data['id'] );

		// Reset specific language panel data
		if ( $data['lang'] != 'all' ) {

			if ( isset( $fields['style'] ) ) {

				if ( $data['lang'] != 'none' && ! empty( $data['lang'] ) ) {
					update_option( $data['id'] . '_' . $data['lang'] . '_current_style', 'default' );
				} else {
					update_option( $data['id'] . '_current_style', bf_get_panel_default_style( $data['id'] ) );
				}
			}

			if ( Better_Framework::options()->save_panel_default_values( $data['id'], $data['lang'] ) !== false ) {

				Better_Framework::factory( 'custom-css-fe' )->clear_cache( 'all' );

				$result = array(
					'status'  => 'succeed',
					'msg'     => __( 'Options Reset to default.', 'better-studio' ),
					'refresh' => true,
				);

			} else {

				$result = array(
					'status' => 'error',
					'msg'    => __( 'An error occurred while resetting options.', 'better-studio' )
				);

			}


		} // Reset panel data for all languages
		else {
			foreach ( bf_get_all_languages() as $lang ) {

				if ( $lang['language_code'] == 'en' ) {
					$_lang = 'none';
				} else {
					$_lang = $lang['language_code'];
				}

				if ( isset( $fields['style'] ) ) {

					if ( $data['lang'] != 'none' && ! empty( $data['lang'] ) ) {
						update_option( $data['id'] . '_' . $_lang . '_current_style', 'default' );
					} else {
						update_option( $data['id'] . '_current_style', 'default' );
					}

				}

				if ( Better_Framework::options()->save_panel_default_values( $data['id'], $_lang ) !== false ) {

					Better_Framework::factory( 'custom-css-fe' )->clear_cache( 'all' );

					$result = array(
						'status'  => 'succeed',
						'msg'     => __( 'Options Reset to default.', 'better-studio' ),
						'refresh' => true,
					);

				} else {

					$result = array(
						'status' => 'error',
						'msg'    => __( 'An error occurred while resetting options.', 'better-studio' )
					);

				}

			}


		}


		/**
		 * Filter result of resetting panel
		 *
		 * @since 1.4.0
		 *
		 * @param array  $result contains result of reset
		 * @param string $data   contain options
		 */
		$result = apply_filters( 'better-framework/panel/reset/result', $result, $data );


		/**
		 * Fires after options reset
		 *
		 * @since 2.0
		 *
		 * @param string $data   contain options
		 * @param array  $result contains result of reset
		 */
		do_action( 'better-framework/panel/reset/after', $data, $result );

		// Print result
		echo json_encode( $result );

		Better_Framework::admin_notices()->add_notice( array( 'msg' => $result['msg'] ) );


	}


	/**
	 * Handle Ajax Import
	 *
	 * @since 1.0
	 *
	 * @param $file
	 * @param $args
	 *
	 * @return void
	 */
	public function handle_ajax_import( $file, $args ) {

		$data = bf_get_local_file_content( $file['tmp_name'] );

		$data = json_decode( $data, true );

		/**
		 * Fires before options import
		 *
		 * @since 2.0
		 *
		 * @param string $data contain import file data
		 */
		do_action( 'better-framework/panel/import/before', $data );

		// data is not correct
		if (
			$data === false ||
			! isset( $data['panel-id'] ) ||
			empty( $data['panel-id'] ) ||
			! isset( $data['panel-data'] ) ||
			empty( $data['panel-data'] ) ||
			! isset( $args['panel-id'] ) ||
			empty( $args['panel-id'] )
		) {

			$result = array(
				'msg'    => __( 'Imported data is not correct or was corrupted.', 'better-studio' ),
				'status' => 'error'
			);

		} elseif ( $args['panel-id'] != $data['panel-id'] ) {
			$result = array(
				'msg'    => __( 'Imported data is not for this panel.', 'better-studio' ),
				'status' => 'error'
			);

		} else {

			if ( isset( $args['lang'] ) && $args['lang'] != 'none' ) {
				$lang = $args['lang'];
			} else {
				$lang = '';
			}

			// Save options
			update_option( $data['panel-id'] . ( empty( $lang ) ? '' : '_' . $lang ), $data['panel-data'] );

			// Imports style
			if ( isset( $data['panel-data']['style'] ) && ! empty( $data['panel-data']['style'] ) ) {
				update_option( $data['panel-id'] . ( empty( $lang ) ? '' : '_' . $lang ) . '_current_style', $data['panel-data']['style'] );
			}

			// Clear CSS caches
			Better_Framework::factory( 'custom-css-fe' )->clear_cache( 'all' );

			$result = array(
				'msg'     => __( 'Theme Options successfully imported.', 'better-studio' ),
				'status'  => 'succeed',
				'refresh' => true,
			);

		}


		/**
		 * Filter result of import options
		 *
		 * @since 2.0
		 *
		 * @param string $data   contains file data
		 * @param array  $result contains result of reset
		 * @param array  $args   arguments
		 */
		$result = apply_filters( 'better-framework/panel/import/result', $result, $data, $args );


		/**
		 * Fires after options import
		 *
		 * @since 2.0
		 *
		 * @param string $data   contains file data
		 * @param array  $result contains result of reset
		 */
		do_action( 'better-framework/panel/import/after', $data, $result );


		// Print result
		echo json_encode( $result );

		// Success notice
		if ( $result['status'] == 'succeed' ) {
			Better_Framework::admin_notices()->add_notice( array( 'msg' => $result['msg'], 'product' ) );
		}

	}


	/**
	 * @param string $panel_id
	 * @param string $lang
	 *
	 * @return array|bool array on success or false on failure.
	 */
	public function get_export_data( $panel_id, $lang = 'none' ) {

		$export   = array();
		$panel_id = sanitize_key( $panel_id );

		// validate panel id
		$config = apply_filters( "better-framework/panel/$panel_id/config", array() );

		if ( empty( $config ) ) {

			return false;
		}

		$export['panel-id'] = $panel_id;

		$lang = $export['panel-multilingual'] = sanitize_key( $lang );

		if ( $lang != 'none' ) {
			$lang = '_' . $lang;
		} else {
			$lang = '';
		}

		$export['panel-data'] = get_option( $panel_id . $lang );


		/**
		 * Filter for export data
		 *
		 * @since 2.0
		 *
		 * @param string $options contains export data
		 */
		return apply_filters( 'better-framework/panel/export/data', $export );
	}


	/**
	 * Add Default Options After Theme Activated.
	 *
	 * @since 1.0
	 * @return void
	 */
	public function handle_export_download() {

		if ( ! is_user_logged_in() ) {
			die( "Illegal access." );
		}

		if ( empty( $_POST['panel_id'] ) ) {
			return;
		}

		$panel_id = sanitize_key( $_POST['panel_id'] );
		$lang     = isset( $_POST['lang'] ) ? sanitize_key( $_POST['lang'] ) : '';

		// Get panel capability
		$cap = empty( $config['config']['capability'] ) ? 'manage_options' : $config['config']['capability'];

		if ( ! current_user_can( $cap ) ) {
			die( "Illegal access." );
		}

		$options_array = $this->get_export_data( $panel_id, $lang );

		/**
		 * Fires before options export
		 *
		 * @since 2.0
		 *
		 * @param string $options contains export data
		 */
		do_action( 'better-framework/panel/export/before', $options_array );


		// Custom file name for each theme
		if ( isset( $_POST['file_name'] ) && ! empty( $_POST['file_name'] ) ) {
			$file_name = $_POST['file_name'] . '-' . date( 'm-d-Y h:i:s a', time() );
		} else {
			$file_name = 'options-backup-' . date( 'm-d-Y h:i:s a', time() );
		}

		/**
		 * Filter export file name
		 *
		 * @since 2.0
		 *
		 * @param string $filename contains current file name
		 * @param string $options  contains export data
		 */
		$file_name     = apply_filters( 'better-framework/panel/export/file-name', sanitize_file_name( $file_name ), $options_array );
		$options_array = json_encode( $options_array );


		// No Cache
		header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		header( 'Cache-Control: no-store, no-cache, must-revalidate' );
		header( 'Cache-Control: post-check=0, pre-check=0', false );
		header( 'Pragma: no-cache' );
		header( 'Content-Type: application/force-download' );
		header( 'Content-Length: ' . strlen( $options_array ) );
		header( 'Content-Disposition: attachment; filename="' . $file_name . '.json"' );

		add_filter( 'wp_die_handler', array( $this, 'wp_die_handler' ) );

		wp_die( $options_array );
	}


	/**
	 * @hooked wp_die_handler in handle_export_download method
	 *
	 * @return array
	 */
	public function wp_die_handler() {

		return array( $this, 'print_and_exit' );
	}


	/**
	 * @param string $data
	 */
	public function print_and_exit( $data ) {

		echo $data;

		exit;
	}
}
