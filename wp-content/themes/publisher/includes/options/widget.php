<?php
/**
 * widget.php
 *---------------------------
 * Registers options for widgets
 *
 */


// Define general widget fields and values
add_filter( 'better-framework/widgets/options/general', 'publisher_widgets_general_fields', 100 );
add_filter( 'better-framework/widgets/options/general/bf-widget-title-bg-color/default', 'publisher_general_widget_title_bg_color_field_default', 100 );
add_filter( 'better-framework/widgets/options/general/bf-widget-title-color/default', 'publisher_general_widget_title_color_field_default', 100 );
add_filter( 'better-framework/widgets/options/general/bf-widget-bg-color/default', 'publisher_general_widget_bg_color_field_default', 100 );
add_filter( 'better-framework/widgets/options/general/bf-widget-title-style/default', 'publisher_general_widget_title_style_field_default', 100 );

// Define custom css for widgets
add_filter( 'better-framework/css/widgets', 'publisher_widgets_custom_css', 100 );

if ( ! function_exists( 'publisher_widgets_general_fields' ) ) {
	/**
	 * Filter widgets general fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_widgets_general_fields( $fields ) {

		$fields[] = 'bf-widget-title-bg-color';
		$fields[] = 'bf-widget-title-color';
		$fields[] = 'bf-widget-bg-color';

		$fields[] = 'bf-widget-title-icon';
		$fields[] = 'bf-widget-title-link';
		$fields[] = 'bf-widget-title-style';
		$fields[] = 'bs-text-color-scheme';

		$fields[] = 'bf-widget-show-desktop';
		$fields[] = 'bf-widget-show-tablet';
		$fields[] = 'bf-widget-show-mobile';

		$fields[] = 'bf-widget-custom-class';
		$fields[] = 'bf-widget-custom-id';

		$fields[] = 'bf-widget-listing-settings';

		return $fields;

	} // publisher_widgets_general_fields
}


if ( ! function_exists( 'publisher_general_widget_title_bg_color_field_default' ) ) {
	/**
	 * Default value for widget title heading color
	 *
	 * @param $value
	 *
	 * @return string
	 */
	function publisher_general_widget_title_bg_color_field_default( $value ) {

		return '';
	}
}


if ( ! function_exists( 'publisher_general_widget_title_color_field_default' ) ) {
	/**
	 * Default value for widget title text color
	 *
	 * @param $value
	 *
	 * @return string
	 */
	function publisher_general_widget_title_color_field_default( $value ) {

		return '';
	}
}


if ( ! function_exists( 'publisher_general_widget_bg_color_field_default' ) ) {
	/**
	 * Default value for widget title heading color
	 *
	 * @param $value
	 *
	 * @return string
	 */
	function publisher_general_widget_bg_color_field_default( $value ) {

		return publisher_get_option( 'widget_bg_color' );
	}
}


if ( ! function_exists( 'publisher_general_widget_title_style_field_default' ) ) {
	/**
	 * Default value for widget heading style
	 *
	 * @param $value
	 *
	 * @return string
	 */
	function publisher_general_widget_title_style_field_default( $value ) {

		return 'publisher_cb_heading_option_list';
	}
}


if ( ! function_exists( 'publisher_widgets_custom_css' ) ) {
	/**
	 * Widgets Custom css parameters
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_widgets_custom_css( $fields ) {

		$fields['bf-widget-title-style'] = array(
			'field'               => 'bf-widget-title-style',
			'callback'            => array(
				'fun'                   => 'publisher_cb_css_generator_section_heading_widget',
				'args'                  => array(
					'type' => 'single-widget',
				),
				'_NEEDED_WIDGET_FIELDS' => array(
					'bf-widget-title-bg-color',
					'bf-widget-title-color',
				)
			),
			'force-callback-call' => true,
		);

		$fields['bf-widget-title-bg-color'] = array(
			'field'               => 'bf-widget-title-bg-color',
			'callback'            => array(
				'fun'                   => 'publisher_cb_css_generator_section_heading',
				'args'                  => array(
					'type' => 'widget_color',
				),
				'_NEEDED_WIDGET_FIELDS' => array(
					'bf-widget-title-style'
				)
			),
			'force-callback-call' => true,
			'css-echo-default'    => true,
		);

		$fields['bf-widget-title-color'] = array(
			'field'               => 'bf-widget-title-color',
			'callback'            => array(
				'fun'                   => 'publisher_cb_css_generator_section_heading',
				'args'                  => array(
					'type'    => 'widget_color',
					'section' => 'color',
				),
				'_NEEDED_WIDGET_FIELDS' => array(
					'bf-widget-title-style'
				)
			),
			'force-callback-call' => true,
			'css-echo-default'    => true,
		);

		$fields['bf-widget-bg-color'] = array(
			'field'               => 'bf-widget-bg-color',
			array(
				'selector' => array(
					'%%widget-id%%',
				),
				'prop'     => array(
					'background-color' => '%%value%%; padding: 20px;',
				),
			),
			'callback'            => array(
				'fun'                   => 'publisher_cb_css_generator_section_heading',
				'args'                  => array(
					'type'    => 'widget_color',
					'section' => 'bg_fix',
				),
				'_NEEDED_WIDGET_FIELDS' => array(
					'bf-widget-title-style'
				)
			),
			'force-callback-call' => true,
			'css-echo-default'    => true,
		);


		return $fields;
	}
}

