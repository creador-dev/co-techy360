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
 * Base class for all shortcodes that have some general functionality for all of them
 *
 */
class BF_Shortcode {

	/**
	 * Shortcode id
	 *
	 * @var string
	 */
	public $id;


	/**
	 * Widget ID For Class Name
	 *
	 * @var string
	 */
	public $widget_id;


	/**
	 * the enclosed content (if the shortcode is used in its enclosing form)
	 *
	 * @var string
	 */
	public $content;


	/**
	 * Name Of Shortcode Used In VC
	 *
	 * @var string
	 */
	public $name = '';


	/**
	 * Description Of Shortcode Used In VC
	 *
	 * @var string
	 */
	public $description = '';


	/**
	 * Icon URL Of Shortcode Used In VC
	 *
	 * @var string
	 */
	public $icon = '';


	/**
	 * contains an array of attributes to add to this item
	 *
	 * @var array
	 */
	public $defaults = array();


	/**
	 * contains options for shortcode
	 *
	 * @var array
	 */
	public $options = array();


	/**
	 * Define this shortcode have widget or not
	 *
	 * @var bool
	 */
	public $have_widget = false;


	/**
	 * Define this shortcode have VC add-on
	 *
	 * @deprecated use available_in_page_builder property
	 *
	 * @var bool
	 */
	public $have_vc_add_on = false;


	/**
	 * Define this shortcode have tinymce add-on
	 *
	 * @var bool
	 */
	public $have_tinymce_add_on = false;


	/**
	 * Define this shortcode have gutenberg block
	 *
	 * @var bool
	 */
	public $have_gutenberg_add_on = false;


	/**
	 * Is shortcode available in active page builder plugin?
	 *
	 * @var bool
	 */
	public $available_in_page_builder;


	/**
	 * Constructor.
	 */
	function __construct( $id = '', $options = array() ) {

		if ( empty( $id ) ) {
			return false;
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

		// Deprecated option use available_in_page_builder instead

		if ( isset( $options['have_vc_add_on'] ) ) {
			$this->have_vc_add_on = $options['have_vc_add_on'];

			if ( ! isset( $options['available_in_page_builder'] ) ) {
				$options['available_in_page_builder'] = $options['have_vc_add_on'];
			}

			unset( $options['have_vc_add_on'] );
		}


		if ( isset( $options['available_in_page_builder'] ) ) {

			$this->available_in_page_builder = $options['available_in_page_builder'];
		}


		if ( isset( $options['have_tinymce_add_on'] ) ) {
			$this->have_tinymce_add_on = $options['have_tinymce_add_on'];
			unset( $options['have_tinymce_add_on'] );

			if ( $this->have_tinymce_add_on ) {
				BF_Shortcodes_Manager::register_tinymce_addon( $id );
			}
		}

		if ( isset( $options['name'] ) ) {
			$this->name = $options['name'];
		}

		if ( isset( $options['have_gutenberg_add_on'] ) ) {

			$this->have_gutenberg_add_on = $options['have_gutenberg_add_on'];
			unset( $options['have_gutenberg_add_on'] );

			if ( $this->have_gutenberg_add_on ) {

				if ( ! class_exists( 'BF_Gutenberg_Shortcode_Wrapper' ) ) {

					require BF_PATH . 'gutenberg/class-bf-gutenberg-shortcode-wrapper.php';
				}

				BF_Gutenberg_Shortcode_Wrapper::register( $id, $this->page_builder_settings() );
			}
		}

		$this->options = $options;

		// Deprecated: Register VC Add-on
		if ( $this->can_register_vc_add_on() ) {

			$this->register_vc_add_on();
		}

		if ( $this->available_in_page_builder ) {

			$this->register_in_page_builder();
		}
	}


	/**
	 * Determines need to register visual composer add-on
	 *
	 * @return bool
	 */
	public function can_register_vc_add_on() {

		if ( ! $this->have_vc_add_on ) {
			return false;
		}

		if ( ! is_user_logged_in() || ! defined( 'WPB_VC_VERSION' ) ) {
			return false;
		}

		$register = false;

		if ( is_admin() ) {
			$register = bf_is_doing_ajax( 'vc_edit_form' ) || ! bf_is_doing_ajax();
		} elseif ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) { // Fix for vc inline editor
			$register = true;
		}

		return $register;
	}


	/**
	 * Registers Visual Composer Add-on
	 *
	 * Must override in child classes
	 *
	 * @deprecated it's just for backward compatibility, please override page_builder_settings() instead.
	 */
	function register_vc_add_on() {

		return false;
	}


	/**
	 * @since 3.8.0
	 * @return array
	 */
	public function page_builder_settings() {

		return array(
			'id'       => $this->id,
			'name'     => $this->name,
			'desc'     => $this->description,
			'icon_url' => isset( $this->options['icon_url'] ) ? $this->options['icon_url'] : false
		);
	}


	/**
	 * Add shortcode to page builder elements list.
	 *
	 * @since 3.8.0
	 * @return bool true on success
	 */
	public function register_in_page_builder() {

		/**
		 * @var BF_Page_Builder_Extender $page_builder
		 */
		$page_builder = Better_Framework::factory( 'page-builder' );

		Better_Framework::factory( 'page-builder', false, true );

		foreach ( \BF_Page_Builder_Extender::active_page_builders() as $id ) {

			if ( ! $wrapper_class = $page_builder->wrapper_class( $id ) ) {
				return false;
			}

			if ( $hook = call_user_func( array( $wrapper_class, 'register_map_hook' ) ) ) {

				add_action( $hook, array( $this, 'register_map' ) );

			} else {

				$this->register_map( $wrapper_class );
			}
		}

		return true;
	}


	public function register_map( $wrapper_class ) {

		/**
		 * @var BF_Page_Builder_Wrapper $wrapper
		 */
		$wrapper  = new $wrapper_class();
		$settings = $this->page_builder_settings();

		if ( ! isset( $settings['icon'] ) && isset( $settings['id'] ) ) {
			$settings['icon'] = $settings['id'] . '-icon';
		}

		// normalize data
		if ( isset( $settings['base'] ) ) {

			$settings['id'] = $settings['base'];

			unset( $settings['base'] );
		}

		$wrapper->register_map(
			$settings,
			$this->page_builder_fields( $wrapper->unique_id() )
		);
	}


	/**
	 * Prepares shortcodes atts
	 *
	 * @param &$atts
	 */
	function prepare_atts( &$atts ) {

		// king composer __empty__ value fix

		$atts = array_filter( $atts, array( $this, 'filter_kc_empty' ) );

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
	 * @param mixed $value
	 *
	 * @return bool
	 */
	protected function filter_kc_empty( $value ) {

		return '__empty__' !== $value;
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
	function do_shortcode( $atts = array(), $content = '', $echo = false ) {

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

	public function gutenberg_live_edit() {

		return '';
	}

	/**
	 * @return array
	 */
	public function gutenberg_attributes() {

		return array();
	}


	/**
	 * Maps all listing VC params
	 *
	 * @param string $page_builder_id
	 *
	 * @since 3.8.0
	 * @return array
	 */
	public function page_builder_fields( $page_builder_id ) {

		/**
		 * @var BF_Page_Builder_Extender $page_builder
		 */
		$page_builder = Better_Framework::factory( 'page-builder' );
		$fields       = $page_builder->transform( $page_builder_id, $this->get_fields(), $this->defaults );

		if ( $fields && ! is_wp_error( $fields ) ) {
			return $fields;
		}


		return array();
	}


	/**
	 * @see        page_builder_fields
	 *
	 * @deprecated it's just for backward compatibility, please use page_builder_fields() instead.
	 * @return array
	 */
	public function vc_map_listing_all() {

		return $this->page_builder_fields( 'VC' );
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
