<?php

add_filter( 'better-framework/panel/add', 'better_social_counter_panel_add', 10 );

if ( ! function_exists( 'better_social_counter_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function better_social_counter_panel_add( $panels ) {

		$panels[ Better_Social_Counter::$panel_id ] = array(
			'id'  => Better_Social_Counter::$panel_id,
			'css' => true,
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/' . Better_Social_Counter::$panel_id . '/config', 'better_social_counter_panel_config', 10 );

if ( ! function_exists( 'better_social_counter_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function better_social_counter_panel_config( $panel ) {

		include Better_Social_Counter::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	}
}


add_filter( 'better-framework/panel/' . Better_Social_Counter::$panel_id . '/std', 'better_social_counter_panel_std', 10 );

if ( ! function_exists( 'better_social_counter_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_social_counter_panel_std( $fields ) {

		include Better_Social_Counter::dir_path( 'includes/options/panel-std.php' );

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . Better_Social_Counter::$panel_id . '/fields', 'better_social_counter_panel_fields', 10 );

if ( ! function_exists( 'better_social_counter_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_social_counter_panel_fields( $fields ) {

		include Better_Social_Counter::dir_path( 'includes/options/panel-fields.php' );

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . Better_Social_Counter::$panel_id . '/css', 'better_social_counter_panel_css', 10 );

if ( ! function_exists( 'better_social_counter_panel_css' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_social_counter_panel_css( $fields ) {

		include Better_Social_Counter::dir_path( 'includes/options/panel-css.php' );

		return $fields;
	}
}
