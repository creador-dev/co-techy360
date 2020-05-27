<?php


class BF_Page_Builder_Widget_Wrapper {

	public $widget_based_page_builders = array(
		'Elementor',
		'SiteOrigin',
	);


	public function __construct() {

		add_action( 'widgets_init', array( $this, 'init_widgets' ), 30 );

		if ( ! class_exists( 'BF_Widget_Artificial' ) ) {

			require BF_PATH . 'page-builder/misc/class-bf-widget-artificial.php';
		}
	}


	/**
	 * Init shortcodes as widget for known page builders.
	 */
	public function init_widgets() {

		if ( ! $this->can_init_widgets() ) {
			return;
		}

		foreach ( BF_Shortcodes_Manager::shortcodes_list() as $key => $shortcode ) {

			if ( isset( $shortcode['widget_class'] ) || ! empty( $shortcode['skip_page_builder'] ) ) {

				continue;
			}

			$this->register_widget( $key );
		}
	}


	/**
	 * @param string $shortcode_id
	 *
	 * @return BF_Widget_Artificial
	 */
	public function widget_class( $shortcode_id ) {

		return new BF_Widget_Artificial( $shortcode_id );
	}


	/**
	 * @param string $shortcode_id
	 */
	public function register_widget( $shortcode_id ) {

		global $wp_widget_factory;

		// we can't use register_widget( $widget ) because siteorigin page builder won't work when $widget is an object

		$wp_widget_factory->widgets["bf-page-builder-widget-$shortcode_id"] = $this->widget_class( $shortcode_id );

	}


	/**
	 * @return bool
	 */
	public function can_init_widgets() {

		if ( $this->is_wp_widgets_page() ) {
			return false;
		}

		$page_builder = Better_Framework::factory( 'page-builder' )->active_page_builders();

		return in_array( $page_builder, $this->widget_based_page_builders );
	}


	public function is_wp_widgets_page() {

		global $pagenow;

		return 'widgets.php' === $pagenow;
	}
}
