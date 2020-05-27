<?php

add_filter( 'better-framework/panel/add', 'st_panel_add', 20 );

if ( ! function_exists( 'st_panel_add' ) ) {
	/**
	 * Introduce panel to framework
	 *
	 * @hooked better-framework/panel/add
	 *
	 * @param array $panels
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function st_panel_add( $panels ) {

		$panels['smart-thumbnails'] = array(
			'id' => 'smart-thumbnails',
		);

		return $panels;
	}
}

add_filter( 'better-framework/panel/smart-thumbnails/config', 'st_panel_config', 12 );

if ( ! function_exists( 'st_panel_config' ) ) {
	/**
	 * Init's BF options
	 *
	 * @hooked better-framework/panel/smart-thumbnails/config
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function st_panel_config() {

		$panel = array(
			'config'     => array(
				'name'                => __( 'Smart Thumbnails', 'smart-thumbnails' ),
				'page_title'          => __( 'Smart Thumbnails', 'smart-thumbnails' ),
				'menu_title'          => __( 'Smart Thumbnails', 'smart-thumbnails' ),
				'slug'                => 'better-studio/smart-thumbnails',
				'capability'          => 'manage_options',
				'parent'              => 'better-studio',
				'exclude_from_export' => FALSE,
				'icon_url'            => NULL,
				'position'            => 84,
			),
			'panel-name' => _x( 'Smart Thumbnails', 'Panel title', 'smart-thumbnails' ),
			'panel-desc' => '<p>' . __( 'Create Better and Smarter Thumbnails', 'smart-thumbnails' ) . '</p>',
		);

		return $panel;
	} // st_panel_config
}


add_filter( 'better-framework/panel/smart-thumbnails/std', 'st_panel_std', 12 );

if ( ! function_exists( 'st_panel_std' ) ) {
	/**
	 * Options std fields
	 *
	 * @hooked better-framework/panel/smart-thumbnails/std
	 *
	 * @param array $fields
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function st_panel_std( $fields ) {

		include Better_Smart_Thumbnails::dir_path( 'includes/options/panel-stds.php' );

		return $fields;
	}
}


add_filter( 'better-framework/panel/smart-thumbnails/fields', 'st_panel_fields', 12 );

if ( ! function_exists( 'st_panel_fields' ) ) {
	/**
	 * Init's BF options
	 *
	 * @hooked better-framework/panel/smart-thumbnails/fields
	 *
	 * @param array $fields
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function st_panel_fields( $fields ) {

		include Better_Smart_Thumbnails::dir_path( 'includes/options/panel-fields.php' );

		return $fields;
	}
}

