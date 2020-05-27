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


// initialize all metaboxe
BF_Metabox_Core::init_metabox();


/**
 * This class handles all functionality of BetterFramework Meta box feature for creating, saving, editing
 * and another functionality like filtering metaboxe's for post types, pages and etc
 *
 * @package    BetterFramework
 * @since      1.0
 */
class BF_Metabox_Core {

	/**
	 * Contains all metabox's
	 *
	 * @var array
	 */
	public static $metabox = array();


	/**
	 * Contains config for all metabox's
	 *
	 * @var array
	 */
	public static $config = array();


	/**
	 * Contains all fields
	 *
	 * @var array
	 */
	public static $fields = array();


	/**
	 * Contains all std
	 *
	 * @var array
	 */
	public static $std = array();


	/**
	 * Contains all css
	 *
	 * @var array
	 */
	public static $css = array();


	/**
	 * Initializes all metaboxes
	 */
	public static function init_metabox() {

		static $loaded;

		if ( $loaded ) {
			return;
		}

		self::$metabox = apply_filters( 'better-framework/metabox/add', array() );

	}


	/**
	 * loads and returns metabox config
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_config( $metabox_id = '' ) {

		if ( empty( $metabox_id ) ) {
			return array();
		}

		if ( isset( self::$config[ $metabox_id ] ) ) {
			return self::$config[ $metabox_id ];
		}

		return self::$config[ $metabox_id ] = apply_filters( 'better-framework/metabox/' . $metabox_id . '/config', array() );
	}


	/**
	 * loads and returns metabox std values
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_std( $metabox_id = '' ) {

		if ( empty( $metabox_id ) || ! isset( self::$metabox[ $metabox_id ] ) ) {
			return array();
		}

		if ( isset( self::$std[ $metabox_id ] ) ) {
			return self::$std[ $metabox_id ];
		}

		return self::$std[ $metabox_id ] = apply_filters( 'better-framework/metabox/' . $metabox_id . '/std', array() );
	}


	/**
	 * loads and returns metabox std values
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_fields( $metabox_id = '' ) {

		if ( empty( $metabox_id ) || ! isset( self::$metabox[ $metabox_id ] ) ) {
			return array();
		}

		if ( isset( self::$fields[ $metabox_id ] ) ) {
			return self::$fields[ $metabox_id ];
		}

		return self::$fields[ $metabox_id ] = apply_filters( 'better-framework/metabox/' . $metabox_id . '/fields', array() );
	}


	/**
	 * loads and returns metabox css
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_css( $metabox_id = '' ) {

		if ( empty( $metabox_id ) || ! isset( self::$metabox[ $metabox_id ] ) ) {
			return array();
		}

		if ( isset( self::$css[ $metabox_id ] ) ) {
			return self::$css[ $metabox_id ];
		}

		return self::$css[ $metabox_id ] = apply_filters( 'better-framework/metabox/' . $metabox_id . '/css', array() );
	}


	/**
	 * Used to add action for constructing the meta box
	 *
	 * @since     1.0
	 * @access    public
	 */
	public function __construct() {

		self::init_metabox();

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );

		add_action( 'pre_post_update', array( $this, 'save' ), 1 );

		add_action( 'better-framework/metabox/ajax-tab', array( $this, 'ajax_tab' ), 10, 3 );
	}


	/**
	 * Used for creating meta boxes
	 *
	 * Callback: add_meta_boxes action
	 *
	 * @since   1.0
	 * @access  public
	 */
	public function add_meta_boxes() {

		if ( ! class_exists( 'BF_Metabox_Front_End_Generator' ) ) {
			require BF_PATH . 'metabox/class-bf-metabox-front-end-generator.php';
		}

		foreach ( (array) self::$metabox as $metabox_id => $metabox ) {

			$metabox_config = self::get_metabox_config( $metabox_id );

			if ( empty( $metabox_config ) ) {
				continue;
			}

			if ( ! $this->can_output( $metabox_config ) ) {
				continue;
			}

			$metabox_config['fields'] = self::get_metabox_fields( $metabox_id );
			$metabox_value            = $this->get_meta_data( $metabox_id );
			$title                    = empty( $metabox_config['title'] ) ? '' : $metabox_config['title'];
			$generator                = new BF_Metabox_Front_End_Generator( $metabox_config, $metabox_id, $metabox_value );

			if ( is_array( $metabox_config['pages'] ) ) {

				foreach ( $metabox_config['pages'] as $page ) {
					add_meta_box(
						'bf_' . $metabox_id,
						$title,
						array( $generator, 'callback' ),
						$page,
						isset( $metabox_config['context'] ) ? $metabox_config['context'] : 'normal',
						isset( $metabox_config['priority'] ) ? $metabox_config['priority'] : 'default'
					);
				}

			} else if ( is_string( $metabox_config['pages'] ) ) {

				add_meta_box(
					'bf_' . $metabox_id,
					$title,
					array( $generator, 'callback' ),
					$metabox_config['pages'],
					isset( $metabox_config['context'] ) ? $metabox_config['context'] : 'normal',
					isset( $metabox_config['priority'] ) ? $metabox_config['priority'] : 'default'
				);

			}
		}// foreach

	} // add_meta_boxes


	/**
	 * Used for retrieve meta data values
	 *
	 * @param   string $id      meta box id
	 * @param   int    $post_id meta box id
	 *
	 * @since    1.0
	 * @return  array
	 * @access   public
	 */
	public function get_meta_data( $id = '', $post_id = 0 ) {

		global $pagenow;

		$output = array();

		if ( isset( self::$metabox['panel-id'] ) ) {
			$std_id = Better_Framework::options()->get_panel_std_id( self::$metabox['panel-id'] );
		} else {
			$std_id = 'std';
		}

		$metabox_std = self::get_metabox_std( $id );

		if ( $pagenow == 'post-new.php' ) {

			if ( ! empty( $metabox_std ) ) {

				foreach ( (array) $metabox_std as $field_id => $field ) {

					if ( isset( $field[ $std_id ] ) ) {
						$output[ $field_id ] = $field[ $std_id ];
					} elseif ( isset( $field['std'] ) ) {
						$output[ $field_id ] = $field['std'];
					}
				}

			}

			return $output;
		}

		$meta = get_post_custom( $post_id );

		foreach ( (array) $metabox_std as $field_id => $field ) {

			if ( isset( $meta[ $field_id ] ) ) {

				if ( is_serialized( $meta[ $field_id ][0] ) ) {
					$output[ $field_id ] = unserialize( $meta[ $field_id ][0] );
				} else {
					$output[ $field_id ] = $meta[ $field_id ][0];
				}

			} else {

				if ( isset( $field[ $std_id ] ) ) {
					$output[ $field_id ] = $field[ $std_id ];
				} elseif ( isset( $field['std'] ) ) {
					$output[ $field_id ] = $field['std'];
				}
			}

		}

		return $output;
	}


	/**
	 * Generates fields of ajaxified tab
	 *
	 * @param $tab_id
	 * @param $metabox_id
	 * @param $object_id
	 */
	public function ajax_tab( $tab_id, $metabox_id, $object_id ) {

		$metabox_config           = self::get_metabox_config( $metabox_id );
		$metabox_config['fields'] = self::get_metabox_fields( $metabox_id );
		$metabox_values           = array();
		$use_generator            = TRUE;

		if ( empty( $metabox_config['fields'][ $tab_id ]['ajax-section-handler'] ) ) {

			$metabox_values = $this->get_meta_data( $metabox_id, $object_id );

			foreach ( $metabox_config['fields'] as $idx => $field ) {

				// Backward compatibility
				if ( isset( $field['ajax-tab-field'] ) ) {
					$field['ajax-section-field'] = $field['ajax-tab-field'];
				}

				if ( empty( $field['ajax-section-field'] ) || $field['ajax-section-field'] !== $tab_id ) {
					unset( $metabox_config['fields'][ $idx ] );
				}
			}
		} else {

			$parent_field = $metabox_config['fields'][ $tab_id ];

			$args = isset( $parent_field['ajax-section-handler-args'] ) ? $parent_field['ajax-section-handler-args'] : array();
			$args = array_merge( $args, compact( 'metabox_id', 'section_id' ) );

			if (
				! isset( $parent_field['ajax-section-handler-type'] ) ||
				$parent_field['ajax-section-handler-type'] === 'field-generator'
			) {

				$metabox_config['fields'] = call_user_func( $parent_field['ajax-section-handler'], $args );

				foreach ( $metabox_config['fields'] as $key => $field ) {
					$metabox_values[ $field['id'] ] = bf_get_post_meta( $field['id'], $object_id );
				}
			} else {

				$use_generator = FALSE;
				$out           = call_user_func( $parent_field['ajax-section-handler'], $args );

			}
		}

		if ( $use_generator ) {

			if ( ! class_exists( 'BF_Metabox_Front_End_Generator' ) ) {
				require BF_PATH . 'metabox/class-bf-metabox-front-end-generator.php';
			}

			self::$fields[ $metabox_id ] = $metabox_config['fields'];
			$generator                   = new BF_Metabox_Front_End_Generator( $metabox_config, $metabox_id, $metabox_values );

			ob_start();
			$generator->callback( TRUE );
			$out = ob_get_clean();

		}

		wp_send_json( array( 'out' => $out, 'tab_id' => $tab_id ) );

	}


	/**
	 * Calculate when meta box can added
	 *
	 * @param   array $config Configuration values of meta box
	 *
	 * @return bool
	 * @since   1.1.1
	 * @access  public
	 */
	public function can_output( $config ) {

		$post_id = bf_get_admin_current_post_id();

		// post types
		switch ( TRUE ) {
			case ( ! isset( $config['pages'] ) || empty( $config['pages'] ) ):
				$post_types = array();
				break;
			case ( is_array( $config['pages'] ) ):
				$post_types = $config['pages'];
				break;
			case ( is_string( $config['pages'] ) ):
				$post_types[] = $config['pages'];
				break;
		}

		// include_template
		switch ( TRUE ) {

			case( ! isset( $config['include_template'] ) || empty( $config['include_template'] ) ):
				$include_template = array();
				break;

			case( is_array( $config['include_template'] ) ):
				$include_template = $config['include_template'];
				break;

			case ( is_string( $config['include_template'] ) ):
				$include_template[] = $config['include_template'];
				break;
		}

		// exclude_template
		switch ( TRUE ) {

			case ( ! isset( $config['exclude_template'] ) || empty( $config['exclude_template'] ) ):
				$exclude_template = array();
				break;

			case ( is_array( $config['exclude_template'] ) ):
				$exclude_template = $config['exclude_template'];
				break;

			case ( is_string( $config['exclude_template'] ) ):
				$exclude_template[] = $config['exclude_template'];
				break;

		}


		if ( ! empty( $include_template ) || ! empty( $exclude_template ) ) {
			$template_file = get_post_meta( $post_id, '_wp_page_template', TRUE );
		}

		$can_output = TRUE;

		// processing order: "exclude" then "include"
		// processing order: "template"

		if ( ! empty( $include_template ) || ! empty( $exclude_template ) ) {

			if ( ! empty( $exclude_template ) ) {
				if ( in_array( $template_file, $exclude_template ) ) {
					$can_output = FALSE;
				}
			}

			// excludes are not set use "include only" mode
			if ( empty( $exclude_template ) ) {
				$can_output = FALSE;
			}

			if ( ! empty( $include_template ) ) {

				if ( in_array( $template_file, $include_template ) ) {
					$can_output = TRUE;
				}

			}
		}

		// Filter for post types
		$current_post_type = bf_get_admin_current_post_type();

		if ( isset( $current_post_type ) && ! in_array( $current_post_type, $post_types ) ) {
			$can_output = FALSE;
		}

		return $can_output;
	}


	/**
	 * Update Post Meta
	 *
	 * @param   string $id  The id post
	 * @param   string $key Post meta key name
	 * @param   string $val Post meta key value
	 *
	 * @static
	 * @since   1.0
	 * @return  bool
	 */
	public static function update( $id, $key, $val ) {
		return update_post_meta( $id, $key, $val );
	}


	/**
	 * Save post meta box values
	 *
	 * Callback: pre_post_update action
	 *
	 * @param   int $post_id
	 *
	 * @static
	 * @return  mixed
	 * @since   1.0
	 */
	public function save( $post_id ) {

		if (
			empty( $_POST['bf-metabox-option'] )
			|| ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| ( ! isset( $_POST['post_ID'] )
			     || $post_id != $_POST['post_ID'] )
			|| ! current_user_can( 'edit_post', $post_id )
		) {
			return $post_id;
		}


		foreach ( self::$metabox as $metabox_id => $metabox ) {

			if ( ! isset( $_POST['bf-metabox-option'][ $metabox_id ] ) ) {
				continue;
			}

			$metabox_std = self::get_metabox_std( $metabox_id );

			if ( empty( $metabox_std ) || ! is_array( $metabox_std ) ) {
				continue;
			}

			$new_value = &$_POST['bf-metabox-option'][ $metabox_id ];

			foreach ( $metabox_std as $field_key => $_field_value ) {

				// value not passed
				if ( ! isset( $new_value[ $field_key ] ) ) {
					continue;
				}

				$field_value = &$new_value[ $field_key ];

				if ( isset( $metabox['panel-id'] ) ) {
					$std_id = Better_Framework::options()->get_panel_std_id( $metabox['panel-id'] );
				} else {
					$std_id = 'std';
				}

				// Save value if save-std is true or not defined
				if ( ! isset( $metabox_std[ $field_key ]['save-std'] ) || $metabox_std[ $field_key ]['save-std'] == TRUE ) {
					self::update( $post_id, $field_key, $field_value );
				} // Don't Save Default Value
				elseif ( isset( $metabox_std[ $field_key ]['save-std'] ) ) {

					// If style std defined then save it
					if ( isset( $metabox_std[ $field_key ][ $std_id ] ) ) {

						if ( $metabox_std[ $field_key ][ $std_id ] != $field_value ) {
							self::update( $post_id, $field_key, $field_value );
						} else {
							delete_post_meta( $post_id, $field_key );
						}

					} // If style std defined then save it
					elseif ( isset( $metabox_std[ $field_key ]['std'] ) ) {

						if ( $metabox_std[ $field_key ]['std'] != $field_value ) {
							self::update( $post_id, $field_key, $field_value );
						} else {
							delete_post_meta( $post_id, $field_key );
						}

					}

				} // Delete Custom field
				else {
					delete_post_meta( $post_id, $field_key );
				}
			}
		} // foreach
	} // save
}
