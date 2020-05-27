<?php

add_filter( 'better-framework/panel/add', 'bsnp_panel_reg', 10 );

if ( ! function_exists( 'bsnp_panel_reg' ) ) {
	/**
	 * Callback: Newsletter panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_panel_reg( $panels ) {

		$panels['bs-newsletter-pack'] = array(
			'id' => 'bs-newsletter-pack',
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/bs-newsletter-pack/config', 'bsnp_panel_config', 10 );

if ( ! function_exists( 'bsnp_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_panel_config( $panel ) {

		include BS_Newsletter_Pack_Pro::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	}
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel_post_newsletter_tab', 30 );

/**
 * Ads "Post Newsletter" tab to options
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel_post_newsletter_tab( $fields ) {

	$fields['post_newsletter_tab'] = array(
		'name' => __( 'Post Newsletter', 'better-studio' ),
		'id'   => 'post_newsletter_tab',
		'type' => 'tab',
		'icon' => 'bsai-page-text',
	);

	return $fields;
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel_post_top', 33 );

/**
 * Ads "Post Post Content Newsletters" group to post newsletter tab
 *
 * @param $fields
 *
 * @return array
 */
function _bsnp_panel_post_top( $fields ) {

	$fields['_post_content_newsletter_h'] = array(
		'name'   => __( 'Post Content Newsletters', 'better-studio' ),
		'id'     => '_post_content_newsletter_h',
		'type'   => 'heading',
		'layout' => 'style-2',
	);

	bsnp_inject_newsletter_field_to_fields( $fields, array(
		'group'           => true,
		'group_title'     => __( 'Above Post Content', 'better-studio' ),
		'location_prefix' => 'post_top',
		'group_state'     => 'close',
		'start_fields'    => array(
			'post_top_align' => array(
				'name'    => __( 'Align', 'better-studio' ),
				'id'      => 'post_top_align',
				'desc'    => __( 'Align of inline newsletter', 'better-studio' ),
				'options' => array(
					'left'  => __( 'Left', 'better-studio' ),
					'right' => __( 'Right', 'better-studio' ),
				),
				'type'    => 'select',
			),
		),
	) );

	return $fields;
}

add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel_post_middle', 35 );

/**
 * Ads "Post Bottom Newsletter" to options
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel_post_middle( $fields ) {

	bsnp_inject_newsletter_field_to_fields( $fields, array(
		'group'           => true,
		'group_title'     => __( 'Middle Post Content', 'better-studio' ),
		'group_desc'      => __( 'Newsletter that will be shown exactly in middle of post content.', 'better-studio' ),
		'location_prefix' => 'post_middle',
		'group_state'     => 'close',
		'start_fields'    => array(
			'post_middle_align' => array(
				'name'    => __( 'Align', 'better-studio' ),
				'id'      => 'post_middle_align',
				'desc'    => __( 'Align of inline newsletter', 'better-studio' ),
				'options' => array(
					'left'  => __( 'Left', 'better-studio' ),
					'right' => __( 'Right', 'better-studio' ),
				),
				'type'    => 'select',
			),
		),
	) );

	return $fields;
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel__post_bottom', 37 );

/**
 * Ads "Post Bottom Newsletter" to options
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel__post_bottom( $fields ) {

	bsnp_inject_newsletter_field_to_fields( $fields, array(
		'group'           => true,
		'group_title'     => __( 'Below Post Content', 'better-studio' ),
		'location_prefix' => 'post_bottom',
		'group_state'     => 'close',
		'start_fields'    => array(
			'post_bottom_align' => array(
				'name'    => __( 'Align', 'better-studio' ),
				'id'      => 'post_bottom_align',
				'desc'    => __( 'Align of inline newsletter', 'better-studio' ),
				'options' => array(
					'left'  => __( 'Left', 'better-studio' ),
					'right' => __( 'Right', 'better-studio' ),
				),
				'type'    => 'select',
			),
		),
	) );

	return $fields;
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel_post_inline', 33 );

/**
 * Ads "Post Ads" tab to options
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel_post_inline( $fields ) {

	bsnp_inject_newsletter_repeater_field_to_fields( $fields, array(
			'location_prefix'    => 'post_inline',
			'group_title'        => __( 'Inside Post Content (After X Paragraph)', 'better-studio' ),
			'field_desc'         => __( 'Add inline newsletter inside post content. <br>You can add multiple inline newsletter for multiple location of post content.', 'better-studio' ),
			'field_add_label'    => '<i class="fa fa-plus"></i> ' . __( 'Add New Inline Newsletter', 'better-studio' ),
			'field_item_title'   => __( 'Inline Content Newsletter', 'better-studio' ),
			'group_auto_close'   => true,
			'field_start_fields' => array(
				'paragraph' => array(
					'name'          => __( 'After Paragraph', 'better-studio' ),
					'id'            => 'paragraph',
					'desc'          => __( 'Content of each post will analyzed and it will inject an newsletter after the selected number of paragraphs.', 'better-studio' ),
					'input-desc'    => __( 'After how many paragraphs the newsletter will display.', 'better-studio' ),
					'type'          => 'text',
					'repeater_item' => true,
				),
				'align'     => array(
					'name'          => __( 'Align', 'better-studio' ),
					'id'            => 'align',
					'desc'          => __( 'Align of inline newsletter', 'better-studio' ),
					'options'       => array(
						'left'  => __( 'Left', 'better-studio' ),
						'right' => __( 'Right', 'better-studio' ),
					),
					'type'          => 'select',
					'repeater_item' => true,
				),
			),
		)
	);

	return $fields;
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel_advanced', 86 );

/**
 * Advanced Settings Tab
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel_advanced( $fields ) {

	$fields['advanced_settings'] = array(
		'name'       => __( 'Advanced Settings', 'better-studio' ),
		'id'         => 'advanced_settings',
		'type'       => 'tab',
		'icon'       => 'bsai-gear',
		'margin-top' => 20,
	);

	$fields['html_block_tags'] = array(
		'name' => __( 'Consider These Tags as New Paragraph', 'better-studio' ),
		'desc' => __( 'Separate tags name with comma. This tags will be used in adding inline newsletter. <code>Example: p,div,table</code>', 'better-studio' ),
		'id'   => 'html_block_tags',
		'type' => 'text',
	);

	return $fields;
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', '_bsnp_panel_import_export', 100 );

/**
 * Ads "Custom CSS/JS" to options
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel_import_export( $fields ) {

	bf_inject_panel_import_export_fields( $fields, array(
		'panel-id'         => BS_Newsletter_Pack_Pro::$panel_id,
		'export-file-name' => 'newsletter-pack-backup',
	) );

	return $fields;
}


add_filter( 'better-framework/panel/bs-newsletter-pack/std', '_bsnp_panel_std', 33 );

/**
 * Default value of all newsletter locations
 *
 * @param $fields
 *
 * @since 1.0
 *
 * @return array
 */
function _bsnp_panel_std( $fields ) {

	// Above Post
	$fields['post_top_newsletter'] = array(
		'std' => '',
	);
	$fields['post_top_style']      = array(
		'std' => 'default',
	);
	$fields['post_top_si_style']   = array(
		'std' => 'default',
	);
	$fields['post_top_align']      = array(
		'std' => 'left',
	);


	//  middle newsletter
	$fields['post_middle_newsletter'] = array(
		'std' => '',
	);
	$fields['post_middle_style']      = array(
		'std' => 'default',
	);
	$fields['post_middle_si_style']   = array(
		'std' => 'default',
	);
	$fields['post_middle_align']      = array(
		'std' => 'left',
	);


	// Post Bottom
	$fields['post_bottom_newsletter'] = array(
		'std' => '',
	);
	$fields['post_bottom_style']      = array(
		'std' => 'default',
	);
	$fields['post_bottom_si_style']   = array(
		'std' => 'default',
	);
	$fields['post_bottom_align']      = array(
		'std' => 'left',
	);


	// Post inline
	$fields['post_inline'] = array(
		'default' => array(
			array(
				'newsletter' => '',
				'style'      => 'default',
				'si_style'   => 'default',
				'paragraph'  => 3,
				'align'      => 'left',
			),
		),
		'std'     => array(
			array(
				'newsletter' => '',
				'style'      => '',
				'si_style'   => '',
				'paragraph'  => 3,
				'align'      => 'left',
			),
		),
	);


	$fields['html_block_tags'] = array(
		'std' => '',
	);

	return $fields;
}
