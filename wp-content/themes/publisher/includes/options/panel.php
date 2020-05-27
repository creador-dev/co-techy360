<?php

// Custom generators for CSS
include PUBLISHER_THEME_PATH . 'includes/options/css-generator-callbacks.php';

add_filter( 'better-framework/panel/add', 'publisher_panel_add', 10 );

if ( ! function_exists( 'publisher_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return mixed
	 */
	function publisher_panel_add( $panels ) {

		$panels[ publisher_get_theme_panel_id() ] = array(
			'id'    => publisher_get_theme_panel_id(),
			'style' => true,
			'css'   => true,
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/config', 'publisher_panel_config', 10 );

if ( ! function_exists( 'publisher_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return mixed
	 */
	function publisher_panel_config( $panel ) {

		include PUBLISHER_THEME_PATH . 'includes/options/panel-config.php';

		return $panel;

	} // publisher_panel_config
}


add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/std', 'publisher_panel_std', 10 );

if ( ! function_exists( 'publisher_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function publisher_panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/fields', 'publisher_panel_fields', 10 );

if ( ! function_exists( 'publisher_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function publisher_panel_fields( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/panel-fields.php';

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/css', 'publisher_panel_css', 10 );

if ( ! function_exists( 'publisher_panel_css' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function publisher_panel_css( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/panel-css.php';

		return $fields;
	}
}
