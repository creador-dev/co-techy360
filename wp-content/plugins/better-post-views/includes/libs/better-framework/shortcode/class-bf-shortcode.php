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
 * Base class for all shortcodes that have some general functionality for all of them
 *
 */
class BF_Shortcode {

	/**
	 * Shortcode id
	 *
	 * @var string
	 */
	var $id;


	/**
	 * Widget ID For Class Name
	 *
	 * @var string
	 */
	var $widget_id;


	/**
	 * the enclosed content (if the shortcode is used in its enclosing form)
	 *
	 * @var string
	 */
	var $content;


	/**
	 * Name Of Shortcode Used In VC
	 *
	 * @var string
	 */
	var $name = '';


	/**
	 * Description Of Shortcode Used In VC
	 *
	 * @var string
	 */
	var $description = '';


	/**
	 * Icon URL Of Shortcode Used In VC
	 *
	 * @var string
	 */
	var $icon = '';


	/**
	 * contains an array of attributes to add to this item
	 *
	 * @var array
	 */
	var $defaults = array();


	/**
	 * contains options for shortcode
	 *
	 * @var array
	 */
	var $options = array();


	/**
	 * Define this shortcode have widget or not
	 *
	 * @var bool
	 */
	var $have_widget = FALSE;


	/**
	 * Define this shortcode have VC add-on
	 *
	 * @var bool
	 */
	var $have_vc_add_on = FALSE;


	/**
	 * Define this shortcode have tinymce add-on
	 *
	 * @var bool
	 */
	var $have_tinymce_add_on = FALSE;


	/**
	 * Constructor.
	 */
	function __construct( $id = '', $options = array() ) {

		if ( empty( $id ) ) {
			return FALSE;
		}

		$this->id = $id;

		if ( isset( $options['defaults'] ) ) {
			$this->defaults = $options['defaults'];
			unset( $options['defaults'] );
		}

		if ( isset( $options['have_widget'] ) ) {
			$this->have_widget = $options['have_widget'];
			unset( $options['have_widget'] );
		}

		if ( isset( $options['have_vc_add_on'] ) ) {
			$this->have_vc_add_on = $options['have_vc_add_on'];
			unset( $options['have_vc_add_on'] );
		}

		if ( isset( $options['have_tinymce_add_on'] ) ) {
			$this->have_tinymce_add_on = $options['have_tinymce_add_on'];
			unset( $options['have_tinymce_add_on'] );

			if ( $this->have_tinymce_add_on ) {
				BF_Shortcodes_Manager::register_tinymce_addon( $id );
			}
		}

		$this->options = $options;

		// Register VC Add-on
		if ( $this->can_register_vc_add_on() ) {
			$this->register_vc_add_on();
		}

	}


	/**
	 * Determines need to register visual composer add-on
	 *
	 * @return bool
	 */
	public function can_register_vc_add_on() {

		if ( ! $this->have_vc_add_on ) {
			return FALSE;
		}

		if ( ! is_user_logged_in() || ! defined( 'WPB_VC_VERSION' ) ) {
			return FALSE;
		}

		$register = FALSE;

		if ( is_admin() ) {
			$register = bf_is_doing_ajax( 'vc_edit_form' ) || ! bf_is_doing_ajax();
		} elseif ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) { // Fix for vc inline editor
			$register = TRUE;
		}

		return $register;
	}


	/**
	 * Registers Visual Composer Add-on
	 *
	 * Must override in child classes
	 */
	function register_vc_add_on() {

		return FALSE;
	}


	/**
	 * Prepares shortcodes atts
	 *
	 * @param &$atts
	 */
	function prepare_atts( &$atts ) {

		$class = bf_shortcode_custom_css_class( $atts );
		if ( ! empty( $atts['css-class'] ) ) {
			$atts['css-class'] .= ' ' . $class;
		} else {
			$atts['css-class'] = $class;
		}

		if ( isset( $atts['bs-show-desktop'] ) && ! $atts['bs-show-desktop'] ) {
			$atts['css-class'] .= ' bs-hidden-lg';
		}

		if ( isset( $atts['bs-show-tablet'] ) && ! $atts['bs-show-tablet'] ) {
			$atts['css-class'] .= ' bs-hidden-md';
		}

		if ( isset( $atts['bs-show-phone'] ) && ! $atts['bs-show-phone'] ) {
			$atts['css-class'] .= ' bs-hidden-sm';
		}

		if ( ! empty( $atts['bs-text-color-scheme'] ) ) {
			$atts['css-class'] .= " bs-{$atts['bs-text-color-scheme']}-scheme";
		}
	}


	/**
	 * Handle shortcode
	 *
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */
	function handle_shortcode( $atts, $content ) {

		$atts = bf_merge_args( $atts, $this->defaults );

		$this->prepare_atts( $atts );

		$atts['shortcode-id'] = $this->id; // adds shortcode id to atts for using it inside filters

		// customize atts from outside
		$atts = apply_filters( 'better-framework/shortcodes/atts', $atts, $this->id );

		return $this->display( $atts, $content );
	}


	/**
	 * Handle widget display
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	function handle_widget( $atts ) {

		$atts = bf_merge_args( $atts, $this->defaults );

		$this->prepare_atts( $atts );

		// customize atts from outside
		$atts = apply_filters( 'better-framework/widgets/atts', $atts, $this->id );

		return $this->display( $atts );

	}


	/**
	 * This function must override in child's for displaying results
	 *
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {

		return '';
	}


	/**
	 * Method returns a proper array of attributes
	 */
	function get_atts( $atts ) {

		return bf_merge_args( $atts, $this->defaults );
	}


	/**
	 * Method returns a string of attributes
	 *
	 */
	function get_atts_string( $atts ) {

		$attr = '';

		foreach ( $this->get_atts( $atts ) as $key => $value ) {
			$attr .= " $key='" . trim( $value ) . "'";
		}

		return $attr;
	}


	/**
	 * Method returns the completed shortcode as a string
	 */
	function do_shortcode( $atts = array(), $content = '', $echo = FALSE ) {

		//initializing
		$attrs = $this->get_atts_string( $atts );

		if ( $this->content ) {
			$content = $this->content . "[/$this->id]";
		}

		ob_start();
		echo do_shortcode( "[$this->id $attrs]$content" );
		$output = ob_get_clean();

		if ( $echo ) {
			echo $output; // escaped before

			return '';
		}

		return $output;
	}


	/**
	 * Load widget for shortcode
	 */
	function load_widget() {

		if ( $this->widget_id ) {
			BF_Widgets_Manager::register_widget_for_shortcode( $this->id, $this->options );
		} else {
			BF_Widgets_Manager::register_widget_for_shortcode( $this->id, $this->options );
		}
	}


	/**
	 * Get fields config array
	 *
	 * @inheritdoc This method must override in subclass
	 *
	 * @since      3.0.0
	 * @return array
	 */
	public function get_fields() {

		return array();
	}


	/**
	 * Transform bf fields key to visual composer standard
	 *
	 * @param array $fields BF Fields Array
	 *
	 * @since 3.0.0
	 */
	public function transform_to_vc_fields( &$fields ) {

		$replacements = array(
			// 'bf key' => 'vc key'
			'name'           => 'heading',
			'desc'           => 'description',
			'id'             => 'param_name',
			'vc_admin_label' => 'admin_label',
		);


		$vc_fields = Better_Framework::factory( 'vc-extender' )->supported_fields;

		$current_tab = __( 'General', 'better-studio' );

		foreach ( $fields as $idx => $field ) {

			if ( $field['type'] === 'tab' ) {
				$current_tab = $field['name'];
				unset( $fields[ $idx ] );
				continue;
			}

			// Set default value if exists
			if ( isset( $this->defaults[ $field['id'] ] ) ) {
				$fields[ $idx ]['value'] = $this->defaults[ $field['id'] ];
			}

			// Transform field type to vc-extender standard
			if ( $field['type'] === 'text' ) {
				$fields[ $idx ]['type'] = 'textfield';
			} elseif ( in_array( $field['type'], $vc_fields ) ) {
				$fields[ $idx ]['type'] = 'bf_' . $field['type'];
			}

			// Transform bf fields key to visual composer type
			foreach ( array_intersect_key( $replacements, $field ) as $key => $new_key ) {

				$fields[ $idx ][ $new_key ] = $field[ $key ];

				unset( $fields[ $idx ][ $key ] );
			}

			$fields[ $idx ]['group'] = $current_tab;
		}
	}


	/**
	 * Maps all listing VC params
	 *
	 * @return array
	 */
	public function vc_map_listing_all() {

		$fields = $this->get_fields();
		$this->transform_to_vc_fields( $fields );

		return $fields;
	}


	/**
	 * Tinymce View Settings
	 *
	 * @return array {
	 *
	 * @type string $name           name of the shortcode
	 * @type array  $scripts        dedicated scripts for the shortcode. array like bf_enqueue_tinymce_style() return
	 *       values
	 * @type array  $style          dedicated styles  for the shortcode. array like bf_enqueue_tinymce_style() return
	 *       values
	 *
	 * @type array  $sub_shortcodes information to insert a new shortcode inside the
	 *                               main one EX:[tabs] [tab][/tab] [/tabs].   array{
	 *      'repeater field id' => 'shortcodeName',
	 *      ...
	 *
	 *      EX: array(
	 *       'single_tab_settings' => 'tab'
	 *      )
	 *      it will we collect each repeater item, and the create [tab attr1=a attr2=b]
	 * }
	 * }
	 */
	public function tinymce_settings() {

		return array();
	}
}
