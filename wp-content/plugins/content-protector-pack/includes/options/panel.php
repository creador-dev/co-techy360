<?php

add_filter( 'better-framework/panel/add', 'cpp_panel_add', 16 );

if ( ! function_exists( 'cpp_panel_add' ) ) {
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
	function cpp_panel_add( $panels ) {

		$panels['content-protector-pack'] = array(
			'id' => 'content-protector-pack',
		);

		return $panels;
	}
}

add_filter( 'better-framework/panel/content-protector-pack/config', 'cpp_panel_config', 12 );

if ( ! function_exists( 'cpp_panel_config' ) ) {
	/**
	 * Init's BF options
	 *
	 * @hooked better-framework/panel/content-protector-pack/config
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function cpp_panel_config() {

		$panel = array(
			'config'     => array(
				'name'                => __( 'Content Protector Pack', 'content-protector-pack' ),
				'page_title'          => __( 'Content Protector Pack', 'content-protector-pack' ),
				'menu_title'          => __( 'Content Protector', 'content-protector-pack' ),
				'slug'                => 'better-studio/content-protector-pack',
				'capability'          => 'manage_options',
				'parent'              => 'better-studio',
				'exclude_from_export' => FALSE,
				'icon_url'            => NULL,
				'position'            => 83,
			),
			'panel-name' => _x( 'Content Protector Pack', 'Panel title', 'content-protector-pack' ),
			'panel-desc' => '<p>' . __( 'Protect your website content from the burglars!', 'content-protector-pack' ) . '</p>',
		);

		return $panel;
	} // cpp_panel_config
}


add_filter( 'better-framework/panel/content-protector-pack/std', 'cpp_panel_std', 12 );

if ( ! function_exists( 'cpp_panel_std' ) ) {
	/**
	 * Options std fields
	 *
	 * @hooked better-framework/panel/content-protector-pack/std
	 *
	 * @param array $fields
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function cpp_panel_std( $fields ) {

		include Content_Protector_Pack::dir_path( 'includes/options/panel-stds.php' );

		return $fields;
	}
}


add_filter( 'better-framework/panel/content-protector-pack/fields', 'cpp_panel_fields', 12 );

if ( ! function_exists( 'cpp_panel_fields' ) ) {
	/**
	 * Init's BF options
	 *
	 * @hooked better-framework/panel/content-protector-pack/fields
	 *
	 * @param array $fields
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function cpp_panel_fields( $fields ) {

		include Content_Protector_Pack::dir_path( 'includes/options/panel-fields.php' );

		return $fields;
	}
}

