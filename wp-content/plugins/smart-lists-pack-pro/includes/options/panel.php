<?php

add_filter( 'better-framework/panel/add', 'bs_smart_lists_panel_add', 10 );

if ( ! function_exists( 'bs_smart_lists_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function bs_smart_lists_panel_add( $panels ) {

		$panels['bs_smart_lists_pack'] = array(
			'id' => 'bs_smart_lists_pack',
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/bs_smart_lists_pack/config', 'bs_smart_lists_panel_config', 10 );

if ( ! function_exists( 'bs_smart_lists_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function bs_smart_lists_panel_config( $panel ) {

		$panel = array(
			'config'     => array(
				'parent'              => 'better-studio',
				'slug'                => 'better-studio/smart-lists-pack',
				'name'                => __( 'Smart Lists Pack', 'better-studio' ),
				'page_title'          => __( 'Smart Lists Pack', 'better-studio' ),
				'menu_title'          => __( 'Smart Lists Pack', 'better-studio' ),
				'capability'          => 'manage_options',
				'icon_url'            => NULL,
				'position'            => 80.04,
				'exclude_from_export' => FALSE,
			),
			'panel-name' => _x( 'Smart Lists Pack Pro', 'Panel title', 'better-studio' ),
			'panel-desc' => '<p>' . __( 'The best way to show listed and paginated posts!', 'better-studio' ) . '</p>',
		);

		return $panel;
	} // bs_smart_lists_panel_config
}


add_filter( 'better-framework/panel/bs_smart_lists_pack/std', 'bs_smart_lists_panel_std', 10 );

if ( ! function_exists( 'bs_smart_lists_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_smart_lists_panel_std( $fields ) {

		$fields['list-style'] = array(
			'std' => 'style-1',
		);

		$fields['trans_page_next'] = array(
			'std' => 'Next',
		);

		$fields['trans_page_prev'] = array(
			'std' => 'Prev',
		);

		$fields['trans_page_x_of_y'] = array(
			'std' => 'Page %1$s of %2$s',
		);

		$fields['trans_x_of_y'] = array(
			'std' => '%1$s of %2$s',
		);

		return $fields;
	}
}


add_filter( 'better-framework/panel/bs_smart_lists_pack/fields', 'bs_smart_lists_panel_fields', 10 );

if ( ! function_exists( 'bs_smart_lists_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_smart_lists_panel_fields( $fields ) {

		$fields['list-style'] = array(
			'name'             => __( 'Default Smart Lists Style', 'better-studio' ),
			'desc'             => __( 'Choose a default style for all lists. <br>You can override style of list in post metabox settings.', 'better-studio' ),
			'id'               => 'list-style',
			'type'             => 'select_popup',
			'section_class'    => 'style-floated-left bordered',
			'deferred-options' => array(
				'callback' => 'bs_smart_lists_pack_styles_option',
				'args'     => array(
					FALSE,
				),
			),
		);

		$fields[]                    = array(
			'name' => __( 'Translation', 'better-studio' ),
			'type' => 'group',
		);
		$fields['trans_page_next']   = array(
			'name' => __( 'Next', 'better-studio' ),
			'desc' => __( 'Next item button.', 'better-studio' ),
			'id'   => 'trans_page_next',
			'type' => 'text',
		);
		$fields['trans_page_prev']   = array(
			'name' => __( 'Prev', 'better-studio' ),
			'desc' => __( 'Previous item button.', 'better-studio' ),
			'id'   => 'trans_page_prev',
			'type' => 'text',
		);
		$fields['trans_page_x_of_y'] = array(
			'name' => __( 'Page X of N', 'better-studio' ),
			'desc' => __( '%1$s is current page and %2$s is all pages count', 'better-studio' ),
			'id'   => 'trans_page_x_of_y',
			'type' => 'text',
		);
		$fields['trans_x_of_y']      = array(
			'name' => __( 'X of N', 'better-studio' ),
			'desc' => __( '%1$s is current page and %2$s is all pages count', 'better-studio' ),
			'id'   => 'trans_x_of_y',
			'type' => 'text',
		);

		return $fields;
	}
}
