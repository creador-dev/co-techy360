<?php

add_filter( 'better-framework/panel/add', 'bs_blockquote_panel_add', 10 );

if ( ! function_exists( 'bs_blockquote_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function bs_blockquote_panel_add( $panels ) {

		$panels[ BS_Blockquote_Pack_Pro::$panel_id ] = array(
			'id'  => BS_Blockquote_Pack_Pro::$panel_id,
			'css' => TRUE,
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/' . BS_Blockquote_Pack_Pro::$panel_id . '/config', 'bs_blockquote_panel_config', 10 );

if ( ! function_exists( 'bs_blockquote_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function bs_blockquote_panel_config( $panel ) {

		$panel = array(
			'config'     => array(
				'parent'              => 'better-studio',
				'slug'                => 'better-studio/blockquote-pack',
				'name'                => __( 'Blockquote Pack', 'better-studio' ),
				'page_title'          => __( 'Blockquote Pack', 'better-studio' ),
				'menu_title'          => __( 'Blockquote Pack', 'better-studio' ),
				'capability'          => 'manage_options',
				'icon_url'            => NULL,
				'position'            => 80.04,
				'exclude_from_export' => FALSE,
			),
			'panel-name' => _x( 'Blockquote Pack Pro', 'Panel title', 'better-studio' ),
			'panel-desc' => '<p>' . __( 'The best way to show quote and citation!', 'better-studio' ) . '</p>',
		);

		return $panel;
	} // bs_blockquote_panel_config
}


add_filter( 'better-framework/panel/' . BS_Blockquote_Pack_Pro::$panel_id . '/std', 'bs_blockquote_panel_std', 10 );

if ( ! function_exists( 'bs_blockquote_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_blockquote_panel_std( $fields ) {

		$fields['quote-style'] = array(
			'std' => 'style-1',
		);

		$fields['color'] = array(
			'std' => '',
		);

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . BS_Blockquote_Pack_Pro::$panel_id . '/fields', 'bs_blockquote_panel_fields', 10 );

if ( ! function_exists( 'bs_blockquote_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_blockquote_panel_fields( $fields ) {

		$fields['quote-style'] = array(
			'name'             => __( 'Default Style', 'better-studio' ),
			'desc'             => __( 'Choose a default style for all advanced quotes. You can override style of each quote in shortcode popup setting.', 'better-studio' ),
			'id'               => 'quote-style',
			'type'             => 'select_popup',
			'section_class'    => 'style-floated-left bordered',
			'deferred-options' => array(
				'callback' => 'bs_blockquote_pack_styles_option',
				'args'     => array(
					FALSE,
				),
			),
		);

		$fields['color'] = array(
			'name' => __( 'Color of Quotes', 'better-studio' ),
			'desc' => __( 'Customize highlight color of quotes.', 'better-studio' ),
			'id'   => 'color',
			'type' => 'color',
		);

		return $fields;
	}
}

add_filter( 'better-framework/panel/' . BS_Blockquote_Pack_Pro::$panel_id . '/css', 'bs_blockquote_panel_css', 10 );

if ( ! function_exists( 'bs_blockquote_panel_css' ) ) {
	/**
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_blockquote_panel_css( $fields ) {

		$fields['color'] = array(
			'css' => bs_blockquote_pack_panel_css_config(),
		);

		return $fields;
	}
}
