<?php

add_filter( 'better-framework/panel/add', 'wep_panel_add', 10 );

if ( ! function_exists( 'wep_panel_add' ) ) {
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
	function wep_panel_add( $panels ) {

		$panels['better-wp-embedder'] = array(
			'id' => 'better-wp-embedder',
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/better-wp-embedder/config', 'wep_panel_config', 10 );

if ( ! function_exists( 'wep_panel_config' ) ) {
	/**
	 * Init's BF options
	 *
	 * @hooked better-framework/panel/better-wp-embedder/config
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function wep_panel_config() {

		$panel = array(
			'config'     => array(
				'parent'              => 'better-studio',
				'slug'                => 'better-studio/wp-embedder-pack',
				'name'                => __( 'WP Embedder Pack', 'wp-embedder-pack' ),
				'page_title'          => __( 'WP Embedder Pack', 'wp-embedder-pack' ),
				'menu_title'          => __( 'WP Embedder Pack', 'wp-embedder-pack' ),
				'capability'          => 'manage_options',
				'icon_url'            => NULL,
				'position'            => 81.04,
				'exclude_from_export' => FALSE,
			),
			'panel-name' => _x( 'WP Embedder Pack', 'Panel title', 'wp-embedder-pack' ),
			'panel-desc' => '<p>' . __( 'The best way to embed documents into WordPress contents.', 'wp-embedder-pack' ) . '</p>',
		);

		return $panel;
	} // wep_panel_config
}


add_filter( 'better-framework/panel/better-wp-embedder/std', 'wep_panel_std', 10 );

if ( ! function_exists( 'wep_panel_std' ) ) {
	/**
	 * Options std fields
	 *
	 * @hooked better-framework/panel/better-wp-embedder/std
	 *
	 * @param array $fields
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function wep_panel_std( $fields ) {

		include WP_Embedder_Pack::dir_path( 'includes/options/panel-std.php' );

		return $fields;
	}
}


add_filter( 'better-framework/panel/better-wp-embedder/fields', 'wep_panel_fields', 10 );

if ( ! function_exists( 'wep_panel_fields' ) ) {
	/**
	 * Init's BF options
	 *
	 * @hooked better-framework/panel/better-wp-embedder/fields
	 *
	 * @param array $fields
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function wep_panel_fields( $fields ) {

		include WP_Embedder_Pack::dir_path( 'includes/options/panel-fields.php' );

		return $fields;
	}
}
