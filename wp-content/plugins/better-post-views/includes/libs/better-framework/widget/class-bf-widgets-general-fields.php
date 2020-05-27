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
 * Used for adding fields for all WordPress widgets
 */
class BF_Widgets_General_Fields {


	/**
	 * Contain active general fields
	 *
	 * @var array
	 */
	var $fields = array();


	/**
	 * Contain current fields options
	 *
	 * @var array
	 */
	private $options = array();


	/**
	 * Contains list of all valid general field ID
	 *
	 * @var array
	 */
	static $valid_general_fields = array(

		// title Fields
		'bf-widget-bg-color',
		'bf-widget-title-color',
		'bf-widget-title-bg-color',
		'bs-text-color-scheme',
		'bf-widget-title-icon',
		'bf-widget-title-link',
		'bf-widget-title-style',

		// Responsive Fields
		'bf-widget-show-desktop',
		'bf-widget-show-tablet',
		'bf-widget-show-mobile',

		// Responsive Fields
		'bf-widget-custom-class',
		'bf-widget-custom-id',

	);


	/**
	 * Contains default value of general fields
	 *
	 * @var array
	 */
	static $default_values = array();


	function __construct() {

		// Load and prepare options only in backend for better performance
		if ( is_admin() ) {

			// Loads all active fields
			$this->fields = apply_filters( 'better-framework/widgets/options/general', $this->fields );

			// Prepare fields for generator
			$this->prepare_options();

			// Add input fields(priority 10, 3 parameters)
			add_action( 'in_widget_form', array( $this, 'in_widget_form' ), 5, 3 );

			// Callback function for options update (priority 5, 3 parameters)
			add_filter( 'widget_update_callback', array( $this, 'in_widget_form_update' ), 99, 2 );

		} else {

			add_filter( 'dynamic_sidebar_params', array( $this, 'dynamic_sidebar_params' ), 99, 2 );

		}

	}


	/**
	 * Check for when a field is general field
	 *
	 * @param $field
	 *
	 * @return bool
	 */
	public static function is_valid_field( $field ) {

		return in_array( $field, self::$valid_general_fields );

	}


	/**
	 * Returns list of all valid general fields
	 *
	 * @return array
	 */
	public static function get_general_fields() {

		return self::$valid_general_fields;
	}


	/**
	 * Get default value for general fields
	 *
	 * @param $field
	 *
	 * @return bool
	 */
	public static function get_default_value( $field ) {

		// Return default value from cache
		if ( isset( self::$default_values[ $field ] ) ) {
			return self::$default_values[ $field ];
		}

		$_default = '';

		switch ( $field ) {

			case 'bf-widget-show-desktop':
			case 'bf-widget-show-tablet':
			case 'bf-widget-show-mobile':
				$_default = 'show';

		}


		// Get field default value from filters
		self::$default_values[ $field ] = apply_filters( "better-framework/widgets/options/general/{$field}/default", $_default );

		return self::$default_values[ $field ];

	}


	/**
	 * Save active fields values
	 *
	 * @param $instance
	 * @param $new_instance
	 *
	 * @return mixed
	 */
	function in_widget_form_update( $instance, $new_instance ) {

		// Create default fields
		foreach ( $this->options as $option ) {
			if ( ! empty( $option['id'] ) ) {
				$def[ $option['id'] ] = $option['std'];
			}
		}

		// Save all valid general fields
		foreach ( $this->get_general_fields() as $field ) {
			if ( isset( $new_instance[ $field ] ) ) {
				if ( $new_instance[ $field ] != $def[ $field ] ) {
					$instance[ $field ] = $new_instance[ $field ];
				} else {
					unset( $new_instance[ $field ] );
					unset( $instance[ $field ] );
				}
			}
		}

		return $instance;
	}


	/**
	 * load options and prepare to admin form generation for active fields
	 */
	function prepare_options() {

		$color_fields['group-1'] = array(
			'name'  => __( 'Color Options', 'better-studio' ),
			'type'  => 'group',
			'id'    => 'group-1',
			// Keep Widget Group State After Widget Settings Saved
			'state' => isset( $_POST['_group_status']['group-1'] ) ? $_POST['_group_status']['group-1'] : 'close',
		);

		$title_fields['group-2'] = array(
			'name'  => __( 'Title Options', 'better-studio' ),
			'type'  => 'group',
			'id'    => 'group-2',
			// Keep Widget Group State After Widget Settings Saved
			'state' => isset( $_POST['_group_status']['group-2'] ) ? $_POST['_group_status']['group-2'] : 'close',
		);

		$responsive_fields['group-3'] = array(
			'name'  => __( 'Responsive Options', 'better-studio' ),
			'type'  => 'group',
			'id'    => 'group-3',
			// Keep Widget Group State After Widget Settings Saved
			'state' => isset( $_POST['_group_status']['group-3'] ) ? $_POST['_group_status']['group-3'] : 'close',
		);

		$advanced_fields['group-4'] = array(
			'name'  => __( 'Advanced Options', 'better-studio' ),
			'type'  => 'group',
			'id'    => 'group-4',
			// Keep Widget Group State After Widget Settings Saved
			'state' => isset( $_POST['_group_status']['group-4'] ) ? $_POST['_group_status']['group-4'] : 'close',
		);


		// Iterate all fields to find active fields
		foreach ( (array) $this->fields as $field_id => $field ) {

			// detect advanced fields category
			if ( self::is_valid_field( $field ) ) {

				// Color Fields
				$raw_field = $this->register_color_option( $field );

				if ( $raw_field != FALSE ) {
					$color_fields[] = $raw_field;
					continue;
				}

				// Advanced Fields
				$raw_field = $this->register_title_option( $field );

				if ( $raw_field != FALSE ) {
					$title_fields[] = $raw_field;
					continue;
				}

				// Responsive Fields
				$raw_field = $this->register_responsive_option( $field );

				if ( $raw_field != FALSE ) {
					$responsive_fields[] = $raw_field;
					continue;
				}

				// Responsive Fields
				$raw_field = $this->register_advanced_option( $field );

				if ( $raw_field != FALSE ) {
					$advanced_fields[] = $raw_field;
					continue;
				}

			}

		}

		// Add advanced fields to main fields
		if ( count( $title_fields ) > 1 ) {
			// Fix group title for 1 field
			if ( count( $title_fields ) == 2 ) {
				$title_fields['group-2']['name'] = $title_fields[0]['name'];
				$title_fields[0]['name']         = '';
			}

			$this->options = array_merge( $this->options, $title_fields );
		}

		// Add color fields to main fields
		if ( count( $color_fields ) > 1 ) {
			// Fix group title for 1 field
			if ( count( $color_fields ) == 2 ) {
				$color_fields['group-1']['name'] = $color_fields[0]['name'];
				$color_fields[0]['name']         = '';
			}

			$this->options = array_merge( $this->options, $color_fields );
		}

		// Add responsive fields to main fields
		if ( count( $responsive_fields ) > 1 ) {
			// Fix group title for 1 field
			if ( count( $responsive_fields ) == 2 ) {
				$responsive_fields['group-3']['name'] = $responsive_fields[0]['name'];
				$responsive_fields[0]['name']         = '';
			}

			$this->options = array_merge( $this->options, $responsive_fields );
		}

		// Add advanced fields to main fields
		if ( count( $advanced_fields ) > 1 ) {
			// Fix group title for 1 field
			if ( count( $advanced_fields ) == 2 ) {
				$advanced_fields['group-3']['name'] = $advanced_fields[0]['name'];
				$advanced_fields[0]['name']         = '';
			}

			$this->options = array_merge( $this->options, $advanced_fields );
		}

	}


	/**
	 * Init a general field generator options
	 *
	 * @param $field
	 *
	 * @return array|bool
	 */
	private function register_color_option( $field ) {

		switch ( $field ) {

			case 'bf-widget-title-color':
				return array(
					'name' => __( 'Widget Title Text Color', 'better-studio' ),
					'id'   => $field,
					'type' => 'color',
					'std'  => $this->get_default_value( $field ),
				);
				break;

			case 'bf-widget-title-bg-color':
				return array(
					'name' => __( 'Widget Title Background Color', 'better-studio' ),
					'id'   => $field,
					'type' => 'color',
					'std'  => $this->get_default_value( $field ),
				);
				break;

			case 'bf-widget-bg-color':
				return array(
					'name' => __( 'Widget Background Color', 'better-studio' ),
					'id'   => $field,
					'type' => 'color',
					'std'  => $this->get_default_value( $field ),
				);
				break;

			case 'bs-text-color-scheme':
				return array(
					'name'    => __( 'Widget Text Color Scheme', 'better-studio' ),
					'id'      => $field,
					'type'    => 'select',
					'std'     => $this->get_default_value( $field ),
					'options' => array(
						''      => __( '-- Default --', 'better-studio' ),
						'light' => __( 'White Color Texts', 'better-studio' ),
					),
				);
				break;

		}

		return FALSE;
	}


	/**
	 * Init a general field generator options
	 *
	 * @param $field
	 *
	 * @return array|bool
	 */
	private function register_title_option( $field ) {

		switch ( $field ) {

			case 'bf-widget-title-icon':
				return array(
					'name' => __( 'Widget Title Icon', 'better-studio' ),
					'id'   => $field,
					'type' => 'icon_select',
					'std'  => $this->get_default_value( $field ),
				);
				break;

			case 'bf-widget-title-link':
				return array(
					'name' => __( 'Widget Title Link', 'better-studio' ),
					'id'   => $field,
					'type' => 'text',
					'std'  => $this->get_default_value( $field ),
					'ltr'  => TRUE,
				);
				break;

			case 'bf-widget-title-style':
				return array(
					'name'             => __( 'Widget Title Style', 'better-studio' ),
					'id'               => $field,
					'type'             => 'select_popup',
					'std'              => 'default',
					'deferred-options' => array(
						'callback' => $this->get_default_value( $field ),
						'args'     => array(
							TRUE
						),
					),
					'column_class'     => 'one-column',
				);
				break;

		}

		return FALSE;
	}


	/**
	 * Init a general field generator options
	 *
	 * @param $field
	 *
	 * @return array|bool
	 */
	private function register_responsive_option( $field ) {

		switch ( $field ) {

			case 'bf-widget-show-desktop':
				return array(
					'name'    => __( 'Show On Desktop', 'better-studio' ),
					'id'      => $field,
					'type'    => 'select',
					'std'     => $this->get_default_value( $field ),
					'options' => array(
						'show' => __( 'Show', 'better-studio' ),
						'hide' => __( 'Hide', 'better-studio' ),
					),
				);
				break;

			case 'bf-widget-show-tablet':
				return array(
					'name'    => __( 'Show On Tablet', 'better-studio' ),
					'id'      => $field,
					'type'    => 'select',
					'std'     => $this->get_default_value( $field ),
					'options' => array(
						'show' => __( 'Show', 'better-studio' ),
						'hide' => __( 'Hide', 'better-studio' ),
					),
				);
				break;

			case 'bf-widget-show-mobile':
				return array(
					'name'    => __( 'Show On Mobile', 'better-studio' ),
					'id'      => $field,
					'type'    => 'select',
					'std'     => $this->get_default_value( $field ),
					'options' => array(
						'show' => __( 'Show', 'better-studio' ),
						'hide' => __( 'Hide', 'better-studio' ),
					),
				);
				break;

		}

		return FALSE;
	}


	/**
	 * Init a advanced fields
	 *
	 * @param $field
	 *
	 * @return array|bool
	 */
	private function register_advanced_option( $field ) {

		switch ( $field ) {

			case 'bf-widget-custom-class':
				return array(
					'name' => __( 'Custom CSS Class', 'better-studio' ),
					'id'   => $field,
					'type' => 'text',
					'std'  => $this->get_default_value( $field ),
				);
				break;

			case 'bf-widget-custom-id':
				return array(
					'name' => __( 'Custom ID', 'better-studio' ),
					'id'   => $field,
					'type' => 'text',
					'std'  => $this->get_default_value( $field ),
				);
				break;

		}

		return FALSE;
	}


	/**
	 * @param $widget WP_Widget
	 */
	function prepare_fields( $widget ) {

		for ( $i = 0; $i < count( $this->options ); $i ++ ) {

			if ( isset( $this->options[ $i ]['attr_id'] ) ) { //  Backward compatibility
				$this->options[ $i ]['id'] = $this->options[ $i ]['attr_id'];
			}

			// do not do anything on fields that haven't ID, ex: group fields
			if ( ! isset( $this->options[ $i ]['id'] ) ) {
				continue;
			}

			$this->options[ $i ]['input_name'] = $widget->get_field_name( $this->options[ $i ]['id'] );

			if ( $this->options[ $i ]['type'] == 'repeater' ) {

				for ( $j = 0; $j < count( $this->options[ $i ]['options'] ); $j ++ ) {

					$this->options[ $i ]['options'][ $j ]['input_name'] = $this->options[ $i ]['input_name'] . '[%d][' . $this->options[ $i ]['options'][ $j ]['id'] . ']';

				}

			} elseif ( $this->options[ $i ]['type'] == 'select' && ! empty( $this->options[ $i ]['multiple'] ) && $this->options[ $i ]['multiple'] ) {
				$this->options[ $i ]['input_name'] .= '[]';
			}

		}

	}


	/**
	 * Add input fields to widget form
	 *
	 * @param $t
	 * @param $return
	 * @param $instance
	 */
	function in_widget_form( $t, $return, $instance ) {

		Better_Framework::factory( 'widgets-field-generator', FALSE, TRUE );

		$this->prepare_fields( $t );

		// Return if there is no general field
		if ( count( $this->options ) <= 0 ) {
			return;
		}

		// Prepare generator config file
		$options = array(
			'fields' => $this->options
		);

		// Create generator instance
		$generator = new BF_Widgets_Field_Generator( $options, $instance );

		echo $generator->get_fields(); // escaped before inside generator

	}


	/**
	 * Callback: Used to change sidebar params to add general fields
	 *
	 * Filter: dynamic_sidebar_params
	 *
	 * @param $params
	 *
	 * @return mixed
	 */
	public function dynamic_sidebar_params( $params ) {

		global $wp_registered_widgets;

		$id = $params[0]['widget_id']; // Current widget ID

		if ( isset( $wp_registered_widgets[ $id ]['callback'][0] ) && is_object( $wp_registered_widgets[ $id ]['callback'][0] ) ) {

			$custom_class = array();

			// Get settings for all widgets of this type
			$settings = $wp_registered_widgets[ $id ]['callback'][0]->get_settings();

			// Get settings for this instance of the widget
			$setting_key = substr( $id, strrpos( $id, '-' ) + 1 );
			$instance    = isset( $settings[ $setting_key ] ) ? $settings[ $setting_key ] : array();

			// Add custom link to widget title
			if ( ! empty( $instance['bf-widget-title-link'] ) ) {
				$params[0]['before_title'] .= "<a href='{$instance['bf-widget-title-link']}'>";
				$params[0]['after_title']  = "</a>" . $params[0]['after_title'];
			}

			// Append custom css class
			if ( ! empty( $instance['bf-widget-custom-class'] ) ) {
				$custom_class[] = sanitize_html_class( $instance['bf-widget-custom-class'] );
			}

			// Add icon before widget title
			if ( ! empty( $instance['bf-widget-title-icon'] ) ) {

				if ( is_array( $instance['bf-widget-title-icon'] ) && $instance['bf-widget-title-icon']['icon'] != '' ) {
					$params[0]['before_title'] .= bf_get_icon_tag( $instance['bf-widget-title-icon'] ) . ' ';
					$custom_class[]            = 'h-i'; // Have Icon
				} elseif ( is_string( $instance['bf-widget-title-icon'] ) ) {
					$params[0]['before_title'] .= bf_get_icon_tag( $instance['bf-widget-title-icon'] ) . ' ';
					$custom_class[]            = 'h-i'; // Have Icon
				} else {
					$custom_class[] = 'h-ni'; // Have Not Icon
				}

			} else {
				$custom_class[] = 'h-ni'; // Have Not Icon
			}

			// Add class for bg color
			if ( ! empty( $instance['bf-widget-bg-color'] ) ) {
				$custom_class[] = 'w-bg'; // Wdiegt BG Color
				$custom_class[] = 'w-bg-' . sanitize_html_class( $instance['bf-widget-bg-color'] );
			}

			// Add class for title color
			if ( ! empty( $instance['bf-widget-title-color'] ) ) {
				$custom_class[] = 'h-c'; // Heading Color
				$custom_class[] = 'h-c-' . sanitize_html_class( $instance['bf-widget-title-color'] );
			}

			// Add class for title bg color
			if ( ! empty( $instance['bf-widget-title-bg-color'] ) ) {
				$custom_class[] = 'h-bg'; // Heading BG
				$custom_class[] = 'h-bg-' . sanitize_html_class( $instance['bf-widget-title-bg-color'] );
			}

			// Show on desktop
			if ( ! empty( $instance['bf-widget-show-desktop'] ) ) {
				if ( $instance['bf-widget-show-desktop'] == 'hide' ) {
					$custom_class[] = 'bs-hidden-lg';
					$custom_class[] = 'bs-hidden-md';
				}
			}

			// Show on tablet
			if ( ! empty( $instance['bf-widget-show-tablet'] ) ) {
				if ( $instance['bf-widget-show-tablet'] == 'hide' ) {
					$custom_class[] = 'bs-hidden-sm';
				}
			}

			// Show on mobile
			if ( ! empty( $instance['bf-widget-show-mobile'] ) ) {
				if ( $instance['bf-widget-show-mobile'] == 'hide' ) {
					$custom_class[] = 'bs-hidden-xs';
				}
			}

			// add title classes
			if ( ! empty( $instance['title'] ) ) {
				$custom_class[] = 'w-t'; // Have Title
			} else {
				$custom_class[] = 'w-nt'; // Have No Title
			}

			// Prepare custom classes
			$class_to_add = 'class=" ' . implode( ' ', $custom_class ) . ' '; // Make sure you leave a space at the end

			// Add classes
			$params[0]['before_widget'] = str_replace(
				'class="',
				$class_to_add,
				$params[0]['before_widget']
			);


			// Change id to custom ID
			if ( ! empty( $instance['bf-widget-custom-id'] ) ) {

				$params[0]['before_widget'] = str_replace(
					' id="' . $params[0]['widget_id'] . '"',
					' id="' . sanitize_html_class( $instance['bf-widget-custom-id'] ) . '"',
					$params[0]['before_widget']
				);
			}
		}

		return $params;
	}
}