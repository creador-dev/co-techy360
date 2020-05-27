<?php

add_filter( 'better-framework/metabox/add', 'bs_smart_lists_metabox_add', 10 );

if ( ! function_exists( 'bs_smart_lists_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function bs_smart_lists_metabox_add( $metabox ) {

		$metabox['better_smart_lists_pack_metabox'] = array(
			'panel-id' => BS_Smart_Lists_Pack_Pro::$panel_id,
		);

		return $metabox;
	}
}

add_filter( 'better-framework/metabox/better_smart_lists_pack_metabox/config', 'bs_smart_lists_metabox_config', 10 );

if ( ! function_exists( 'bs_smart_lists_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function bs_smart_lists_metabox_config( $config ) {

		return array(
			'title'    => __( 'Smart Lists Pack', 'better-studio' ),
			'pages'    => BS_Smart_Lists_Pack_Pro::$post_types,
			'context'  => 'normal',
			'prefix'   => FALSE,
			'priority' => 'high'
		);
	}
}


add_filter( 'better-framework/metabox/better_smart_lists_pack_metabox/fields', 'bs_smart_lists_metabox_fields', 10 );

if ( ! function_exists( 'bs_smart_lists_metabox_fields' ) ) {
	/**
	 * Configs metabox fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_smart_lists_metabox_fields( $fields ) {

		$fields['_bs_smart_lists_enabled']   = array(
			'name'      => __( 'Enable Smart List', 'better-studio' ),
			'id'        => '_bs_smart_lists_enabled',
			'type'      => 'switch',
			'on-label'  => __( 'Enable', 'better-studio' ),
			'off-label' => __( 'Disable', 'better-studio' ),
			'desc'      => __( 'Wrap post content to items and show them in following smart list style.', 'better-studio' ),
		);
		$fields['_bs_smart_lists_style']     = array(
			'name'             => __( 'Smart List Style', 'better-studio' ),
			'desc'             => __( 'Chose the style of smart list.', 'better-studio' ),
			'id'               => '_bs_smart_lists_style',
			'type'             => 'select_popup',
			'section_class'    => 'style-floated-left bordered',
			'deferred-options' => array(
				'callback' => 'bs_smart_lists_pack_styles_option',
				'args'     => array(
					TRUE,
				),
			),
			'texts'            => array(
				'modal_title'   => __( 'Choose Smart List Style', 'better-studio' ),
				'modal_current' => __( 'Current', 'better-studio' ),
				'modal_button'  => __( 'Select', 'better-studio' ),
				'box_pre_title' => __( 'Selected style', 'better-studio' ),
				'box_button'    => __( 'Change style', 'better-studio' ),
			),
			'show_on'          => array(
				array(
					'_bs_smart_lists_enabled=1',
				)
			),
		);
		$fields['_bs_smart_lists_title_tag'] = array(
			'name'          => __( 'Title Tags', 'better-studio' ),
			'desc'          => __( 'The tags that wrap the title of each Smart List item.', 'better-studio' ),
			'id'            => '_bs_smart_lists_title_tag',
			'type'          => 'select',
			'section_class' => 'style-floated-left bordered',
			'options'       => array(
				'h1' => __( 'Heading 1 (H1 Tag)', 'better-studio' ),
				'h2' => __( 'Heading 2 (H2 Tag)', 'better-studio' ),
				'h3' => __( 'Heading 3 (H3 Tag)', 'better-studio' ),
				'h4' => __( 'Heading 4 (H4 Tag)', 'better-studio' ),
				'h5' => __( 'Heading 5 (H5 Tag)', 'better-studio' ),
				'h6' => __( 'Heading 6 (H6 Tag)', 'better-studio' ),
			),
			'show_on'       => array(
				array(
					'_bs_smart_lists_enabled=1',
				)
			),
		);
		$fields['_bs_smart_lists_sort']      = array(
			'name'          => __( 'List Sorting', 'better-studio' ),
			'desc'          => __( 'The smart lists put a number on each item, select the counting method.', 'better-studio' ),
			'id'            => '_bs_smart_lists_sort',
			'type'          => 'select',
			'section_class' => 'style-floated-left bordered',
			'options'       => array(
				'desc' => __( 'Descending (ex: 3, 2, 1)', 'better-studio' ),
				'asc'  => __( 'Asc (ex: 1, 2, 3)', 'better-studio' ),
			),
			'show_on'       => array(
				array(
					'_bs_smart_lists_enabled=1',
				)
			),
		);

		if ( bssl_is_ad_plugin_active() ) {
			$fields['_bs_smart_lists_ads'] = array(
				'name'      => __( 'Show Ads?', 'better-studio' ),
				'id'        => '_bs_smart_lists_ads',
				'type'      => 'switch',
				'on-label'  => __( 'Enable', 'better-studio' ),
				'off-label' => __( 'Disable', 'better-studio' ),
				'desc'      => __( 'You can show/hide all smart list ads for this post.', 'better-studio' ),
				'show_on'   => array(
					array(
						'_bs_smart_lists_enabled=1',
					)
				),
			);
		}

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_smart_lists_pack_metabox/std', 'bs_smart_lists_metabox_std', 10 );

if ( ! function_exists( 'bs_smart_lists_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bs_smart_lists_metabox_std( $fields ) {

		$fields['_bs_smart_lists_enabled']   = array(
			'std' => 0,
		);
		$fields['_bs_smart_lists_style']     = array(
			'std' => 'default',
		);
		$fields['_bs_smart_lists_title_tag'] = array(
			'std' => 'h3',
		);
		$fields['_bs_smart_lists_sort']      = array(
			'std' => 'asc',
		);
		$fields['_bs_smart_lists_ads']       = array(
			'std' => 1,
		);

		return $fields;
	}
}
