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
 * Manager for base and public functionality related to Widgets and dynamic sidebars
 */
class BF_Widgets_Manager {

	/**
	 * Contain current showed dynamic sidebar location id
	 *
	 * @var string
	 */
	public static $current_sidebar = '';


	/**
	 * Contain top-bar sidebars locations
	 *
	 * @var array
	 */
	public static $top_bar_sidebars = array();


	/**
	 * Contain footer sidebars locations
	 *
	 * @var array
	 */
	public static $footer_sidebars = array();


	function __construct() {

		$this->load_special_sidebars();

		$this->load_widgets_general_fields();

		add_action( 'dynamic_sidebar_before', array( 'BF_Widgets_Manager', 'dynamic_sidebar_before' ) );
		add_action( 'dynamic_sidebar_after', array( 'BF_Widgets_Manager', 'dynamic_sidebar_after' ) );

		add_filter( 'widget_title', array( $this, 'widget_title_filter' ), 99 );
		add_filter( 'in_widget_form', array( $this, 'append_position_field' ), 20, 4 );
	}


	/**
	 * This filter used for delete widgets title on special sidebar locations
	 *
	 * @param $title
	 *
	 * @return string
	 */
	function widget_title_filter( $title ) {

		if ( self::is_special_sidebar() ) {
			$title = '';
		}

		return $title;
	}


	/**
	 * Filter special sidebars
	 */
	function load_special_sidebars() {

		self::$top_bar_sidebars = apply_filters( 'better-framework/sidebars/locations/top-bar', array() );

		self::$footer_sidebars = apply_filters( 'better-framework/sidebars/locations/footer-bar', array() );

	}


	/**
	 * Init general fields for all WordPress widgets
	 */
	function load_widgets_general_fields() {

		require_once BF_PATH . 'widget/class-bf-widgets-general-fields.php';

		new BF_Widgets_General_Fields();

	}


	public function append_position_field( $instance ) {

		if ( property_exists( $instance, 'position' ) ) {
			$position = $instance->position;
		} else {
			$position = apply_filters( 'better-framework/widget/default-position', 30, $instance );
		}

		$position = apply_filters( 'better-framework/widget/position', $position, $instance );

		printf( '<input type="hidden"  value="%d" class="bf-widget-position">', $position );
	}


	/**
	 * Fires before widgets are rendered in a dynamic sidebar.
	 *
	 * @param $index
	 */
	public static function dynamic_sidebar_before( $index ) {

		self::$current_sidebar = $index;

	}


	/**
	 * Fires after widgets are rendered in a dynamic sidebar.
	 *
	 * @param $index
	 */
	public static function dynamic_sidebar_after( $index ) {

		self::$current_sidebar = '';

	}


	/**
	 * Used For retrieving current sidebar
	 *
	 */
	public static function get_current_sidebar() {

		return self::$current_sidebar;

	}


	/**
	 * Load widget for shortcode
	 *
	 * @param string $id
	 * @param array  $options
	 */
	public static function register_widget_for_shortcode( $id = '', $options = array() ) {

		// custom class for widget. 3rd party shortcode widget that is outside of BF
		if ( isset( $options['widget_class'] ) && class_exists( $options['widget_class'] ) && is_subclass_of( $options['widget_class'], 'WP_Widget' ) ) {

			$class = $options['widget_class'];

			register_widget( $class );

		} else {

			$class = bf_convert_string_to_class_name( $id, 'BF_', '_Widget' );

			if ( ! class_exists( $class ) ) {

				if ( file_exists( BF_PATH . 'widget/widgets/class-bf-' . $id . '-widget.php' ) ) {

					require_once BF_PATH . 'widget/widgets/class-bf-' . $id . '-widget.php';

					register_widget( $class );

				}

			}
		}

	}


	/**
	 * Determine current showing sidebar is a top bar sidebar!
	 */
	public static function is_top_bar_sidebar() {

		return in_array( self::$current_sidebar, self::$top_bar_sidebars );

	}


	/**
	 * Determine current showing sidebar is a footer sidebar!
	 */
	public static function is_footer_sidebar() {

		return in_array( self::$current_sidebar, self::$footer_sidebars );

	}


	/**
	 * Determine current showing sidebar is a special sidebar!
	 */
	public static function is_special_sidebar() {

		if ( self::is_top_bar_sidebar() || self::is_footer_sidebar() ) {
			return true;
		}

		return false;

	}

}