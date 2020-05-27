<?php

add_filter( 'better-framework/panel/add', 'better_ads_manager_panel_add', 10 );

if ( ! function_exists( 'better_ads_manager_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function better_ads_manager_panel_add( $panels ) {

		$panels['better_ads_manager'] = array(
			'id'  => 'better_ads_manager',
			'css' => true,
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/better_ads_manager/config', 'better_ads_manager_panel_config', 10 );

if ( ! function_exists( 'better_ads_manager_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function better_ads_manager_panel_config( $panel ) {

		include Better_Ads_Manager::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	}
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_post_ads_tab', 30 );

/**
 * Ads "Post Ads" tab to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_post_ads_tab( $fields ) {

	$fields['post_ads_tab'] = array(
		'name' => __( 'Post Ads', 'better-studio' ),
		'id'   => 'post_ads_tab',
		'type' => 'tab',
		'icon' => 'bsai-page-text',
	);

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_post_top_ads', 33 );

/**
 * Ads "Post Ads" tab to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_post_top_ads( $fields ) {

	$fields['_post_content_ads_h'] = array(
		'name'   => __( 'Post Content Ads', 'better-studio' ),
		'id'     => '_post_content_ads_h',
		'type'   => 'heading',
		'layout' => 'style-2',
	);

	better_ads_inject_ad_field_to_fields( $fields, array(
		'group'       => true,
		'group_title' => __( 'Above Post Content', 'better-studio' ),
		'id_prefix'   => 'ad_post_top',
		'group_state' => 'close',
	) );

	return $fields;
}

add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_post_middle_ads', 35 );

/**
 * Ads "Post Bottom Ads" to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_post_middle_ads( $fields ) {

	better_ads_inject_ad_field_to_fields( $fields, array(
		'group'       => true,
		'group_title' => __( 'Middle Post Content', 'better-studio' ),
		'group_desc'  => __( 'Ads that will be shown exactly in middle of post content.', 'better-studio' ),
		'id_prefix'   => 'ad_post_middle',
		'group_state' => 'close',
	) );

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_post_bottom_ads', 37 );

/**
 * Ads "Post Bottom Ads" to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_post_bottom_ads( $fields ) {

	better_ads_inject_ad_field_to_fields( $fields, array(
		'group'       => true,
		'group_title' => __( 'Below Post Content', 'better-studio' ),
		'id_prefix'   => 'ad_post_bottom',
		'group_state' => 'close',
	) );

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_post_inline_ads', 33 );

/**
 * Ads "Post Ads" tab to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_post_inline_ads( $fields ) {

	better_ads_inject_ad_repeater_field_to_fields( $fields, array(
			'id_prefix'        => 'ad_post_inline',
			'group_title'      => __( 'Inside Post Content (After X Paragraph)', 'better-studio' ),
			'field_desc'       => __( 'Add inline adds inside post content. <br>You can add multiple inline adds for multiple location of post content.', 'better-studio' ),
			'field_add_label'  => '<i class="fa fa-plus"></i> ' . __( 'Add New Inline Ad', 'better-studio' ),
			'field_item_title' => __( 'Inline Ad', 'better-studio' ),
			'group_auto_close' => true,
			'field_end_fields' => array(
				'paragraph' => array(
					'name'          => __( 'After Paragraph', 'better-studio' ),
					'id'            => 'paragraph',
					'desc'          => __( 'Content of each post will analyzed and it will inject an ad after the selected number of paragraphs.', 'better-studio' ),
					'input-desc'    => __( 'After how many paragraphs the ad will display.', 'better-studio' ),
					'type'          => 'text',
					'show_on'       => array(
						array(
							'type=banner',
						),
						array(
							'type=campaign',
						),
					),
					'ad-id'         => 'ad_post_inline',
					'repeater_item' => true,
				)
			),
		)
	);

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_custom_css_js', 90 );

/**
 * Ads "Custom CSS/JS" to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_custom_css_js( $fields ) {

	include Better_Ads_Manager::dir_path( 'includes/options/panel-fields-css.php' );

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_overrides_fields', 79.9 );

/**
 * Add override section
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_overrides_fields( $fields ) {

	//
	// Ajax -> BF Ajax Tab -> Override Settings Tab
	//
	if (
		bf_is_doing_ajax( 'bf_ajax' ) &&
		isset( $_REQUEST['panelID'] ) &&
		$_REQUEST['panelID'] === 'better_ads_manager' /*&&
			( isset( $_REQUEST['reqID'] ) && $_REQUEST['reqID'] === 'fetch-deferred-field' )*/ /*&&
			( isset( $_REQUEST['sectionID'] ) && $_REQUEST['sectionID'] === 'override_settings' )*/
	) {

		$fields['override_settings'] = array(
			'name'       => __( 'Override Ads', 'better-studio' ),
			'id'         => 'override_settings',
			'type'       => 'tab',
			'icon'       => 'bsai-sitemap',
			'badge'      => array(
				'text'  => __( 'New', 'better-studio' ),
				'color' => '#d54e21'
			),
			'margin-top' => 20,
			'ajax-tab'   => true
		);

		$fields['reset_override_settings'] = array(
			'name'               => __( 'Reset Ad Overrides', 'better-studio' ),
			'id'                 => 'reset_override_settings',
			'type'               => 'ajax_action',
			'button-name'        => '<i class="fa fa-refresh"></i> ' . __( 'Reset All Overrides', 'better-studio' ),
			'callback'           => 'Better_Ads_Manager::reset_typography_options',
			'confirm'            => __( 'Are you sure for resetting ad overrides?', 'better-studio' ),
			'desc'               => __( 'This allows you to remove all ad overrides.', 'better-studio' ),
			'ajax-section-field' => 'override_settings',
		);

		$section_fields = array(); // fields of ajax tab
		$sections       = better_ads_get_override_sections_list();

		foreach ( $sections as $type_id => $type ) {

			// close all prev groups
			$section_fields[ $type_id . '-type-label-close' ] = array(
				'type'         => 'group_close',
				'level'        => 'all',
				'ajax-section' => 'override_settings',
			);

			$section_fields[ $type_id . '-type-label' ] = array(
				'name'               => $type['label'],
				'id'                 => $type_id . '-type-label',
				'type'               => 'heading',
				'layout'             => 'style-2',
				'ajax-section-field' => 'override_settings',
			);

			foreach ( $type['items'] as $section ) {

				$section_fields[ $section['id'] . '_top_level' ] = array(
					'name'                      => $section['label'] . ' Ads',
					'id'                        => $section['id'] . '_top_level',
					'type'                      => 'group',
					'level'                     => 1,
					'state'                     => 'close',
					'ajax-section'              => 'bf-ajax-group',
					'ajax-section-field'        => 'override_settings',
					'ajax-section-handler'      => 'better_ads_section_override_fields_list',
					'ajax-section-handler-args' => array(
						'id'           => $section['id'] . '_top_level',
						'type'         => $type_id,
						'section'      => $section['id'],
						'section-name' => $section['label'],
					),
					'ajax-section-handler-type' => 'field-generator',
				);

				$section_fields[ $section['id'] . '_top_level-close' ] = array(
					'type'               => 'group_close',
					'level'              => 'all',
					'id'                 => $section['id'] . '_top_level-close',
					'ajax-section-field' => 'override_settings',
				);
			}

		}

		return $fields + $section_fields;

	} else {

		$fields['override_settings'] = array(
			'name'       => __( 'Override Ads', 'better-studio' ),
			'id'         => 'override_settings',
			'type'       => 'tab',
			'icon'       => 'bsai-sitemap',
			'badge'      => array(
				'text'  => __( 'New', 'better-studio' ),
				'color' => '#d54e21'
			),
			'margin-top' => 20,
			'ajax-tab'   => true
		);

	}

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_lazy_loading', 86 );
add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_advanced', 86 );


/**
 * Advanced Settings Tab
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_advanced( $fields ) {

	$fields['advanced_settings'] = array(
		'name'  => __( 'Advanced Settings', 'better-studio' ),
		'id'    => 'advanced_settings',
		'type'  => 'tab',
		'icon'  => 'bsai-gear',
		'badge' => array(
			'text'  => __( 'New', 'better-studio' ),
			'color' => '#d54e21'
		),
	);

	$fields['html_block_tags'] = array(
		'name' => __( 'Consider These Tags as New Paragraph', 'better-studio' ),
		'desc' => __( 'Separate tags name with comma. This tags will be used in adding inline ad. <code>Example: p,div,table</code>', 'better-studio' ),
		'id'   => 'html_block_tags',
		'type' => 'text',
	);

	$fields['caption_position'] = array(
		'name'    => __( 'Ads Caption Location', 'better-studio' ),
		'desc'    => __( 'Chose the location of ads.', 'better-studio' ),
		'id'      => 'caption_position',
		'type'    => 'select',
		'options' => array(
			'above' => __( 'Above Ads', 'better-studio' ),
			'below' => __( 'Below Ads', 'better-studio' ),
		)
	);

	return $fields;
}


/**
 * Advanced Settings Tab
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_lazy_loading( $fields ) {

	$fields['lazy_loading_tab'] = array(
		'name'       => __( 'Lazy Loading Ads', 'better-studio' ),
		'id'         => 'lazy_loading_tab',
		'type'       => 'tab',
		'icon'       => 'bsai-gear',
		'margin-top' => 20,
		'badge'      => array(
			'text'  => __( 'New', 'better-studio' ),
			'color' => '#d54e21'
		),
	);

	$fields['lazy_loading_ads']  = array(
		'name'    => __( 'Lazy Load Ads?', 'better-studio' ),
		'desc'    => __( 'Load ads only when they are on user view report. <br><br><strong style="color:red;">Currently this only works for AdSense ad format.</strong>', 'better-studio' ),
		'id'      => 'lazy_loading_ads',
		'type'    => 'select',
		'options' => array(
			'enable'  => __( 'Yes, Lazy load all Ads', 'better-studio' ),
			'disable' => __( 'No, Load ads as normal', 'better-studio' ),
		)
	);
	$fields['lazy_loading_text'] = array(
		'name' => __( 'Loading text', 'better-studio' ),
		'desc' => __( 'Load ads only when they are on user view report.', 'better-studio' ),
		'id'   => 'lazy_loading_text',
		'type' => 'text',
	);

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_dfp_section', 85 );

/**
 * DFP
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_dfp_section( $fields ) {

	$fields['dfp_settings'] = array(
		'name'       => __( 'Google DFP', 'better-studio' ),
		'id'         => 'dfp_settings',
		'type'       => 'tab',
		'icon'       => 'bsai-header',
		'margin-top' => 20,
		'badge'      => array(
			'text'  => __( 'New', 'better-studio' ),
			'color' => '#d54e21'
		),
	);

	$fields['dfp_code'] = array(
		'name' => __( 'DFP Before &lt;/head&gt; Code', 'better-studio' ),
		'desc' => __( 'Enter your DFP setup code for before &lt;/head&gt;. With entering it you can create ad banner and select this spots to show them.', 'better-studio' ),
		'id'   => 'dfp_code',
		'type' => 'textarea',
	);

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/fields', '_better_ads_options_import_export', 100 );

/**
 * Ads "Custom CSS/JS" to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_import_export( $fields ) {

	bf_inject_panel_import_export_fields( $fields, array(
		'panel-id'         => Better_Ads_Manager::$panel_id,
		'export-file-name' => 'better-ads-backup',
	) );

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/std', '_better_ads_options_std', 33 );

/**
 * Ads "Post Ads" tab to options
 *
 * @param $fields
 *
 * @return array
 */
function _better_ads_options_std( $fields ) {

	// Above Post
	$fields['ad_post_top_type']     = array(
		'std' => '',
	);
	$fields['ad_post_top_banner']   = array(
		'std' => 'none',
	);
	$fields['ad_post_top_campaign'] = array(
		'std' => 'none',
	);
	$fields['ad_post_top_count']    = array(
		'std' => 1,
	);
	$fields['ad_post_top_columns']  = array(
		'std' => 1,
	);
	$fields['ad_post_top_orderby']  = array(
		'std' => 'rand',
	);
	$fields['ad_post_top_order']    = array(
		'std' => 'ASC',
	);
	$fields['ad_post_top_align']    = array(
		'std' => 'center',
	);


	//  middle ads
	$fields['ad_post_middle_type']     = array(
		'std' => '',
	);
	$fields['ad_post_middle_banner']   = array(
		'std' => 'none',
	);
	$fields['ad_post_middle_campaign'] = array(
		'std' => 'none',
	);
	$fields['ad_post_middle_count']    = array(
		'std' => 1,
	);
	$fields['ad_post_middle_columns']  = array(
		'std' => 1,
	);
	$fields['ad_post_middle_orderby']  = array(
		'std' => 'rand',
	);
	$fields['ad_post_middle_order']    = array(
		'std' => 'ASC',
	);
	$fields['ad_post_middle_align']    = array(
		'std' => 'center',
	);


	// Post Bottom
	$fields['ad_post_bottom_type']     = array(
		'std' => '',
	);
	$fields['ad_post_bottom_banner']   = array(
		'std' => 'none',
	);
	$fields['ad_post_bottom_campaign'] = array(
		'std' => 'none',
	);
	$fields['ad_post_bottom_count']    = array(
		'std' => 1,
	);
	$fields['ad_post_bottom_columns']  = array(
		'std' => 1,
	);
	$fields['ad_post_bottom_orderby']  = array(
		'std' => 'rand',
	);
	$fields['ad_post_bottom_order']    = array(
		'std' => 'ASC',
	);
	$fields['ad_post_bottom_align']    = array(
		'std' => 'center',
	);


	// Post inline
	$fields['ad_post_inline'] = array(
		'default' => array(
			array(
				'type'      => '',
				'campaign'  => 'none',
				'banner'    => 'none',
				'paragraph' => 3,
				'count'     => 3,
				'columns'   => 3,
				'orderby'   => 'rand',
				'order'     => 'ASC',
				'align'     => 'center',
			),
		),
		'std'     => array(
			array(
				'type'      => '',
				'campaign'  => 'none',
				'banner'    => 'none',
				'position'  => 'center',
				'paragraph' => 3,
				'count'     => 3,
				'columns'   => 3,
				'orderby'   => 'rand',
				'order'     => 'ASC',
				'align'     => 'center',
			),
		),
	);

	// Custom code
	$fields['custom_css_code']    = array(
		'std' => '',
	);
	$fields['custom_header_code'] = array(
		'std' => '',
	);

	// Lazy Load
	$fields['lazy_loading_ads']  = array(
		'std' => 'disable',
	);
	$fields['lazy_loading_text'] = array(
		'std' => 'Loading...',
	);

	// Advanced
	$fields['html_block_tags']  = array(
		'std' => '',
	);
	$fields['caption_position'] = array(
		'std' => 'below',
	);

	return $fields;
}
