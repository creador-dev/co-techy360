<?php

/**
 * => Style
 */
$fields[]                       = array(
	'name' => __( 'Style', 'publisher' ),
	'id'   => 'tab_style',
	'type' => 'tab',
	'icon' => 'bsai-paint',
);
$fields['term_color']           = array(
	'name'     => __( 'Category Highlight Color', 'publisher' ),
	'id'       => 'term_color',
	'type'     => 'color',
	'save-std' => false,
	'style'    => array( 'default' ),
	'desc'     => __( 'This color will be used in several areas such as navigation and listing blocks to emphasize category.', 'publisher' ),
);
$fields['override_in_posts']    = array(
	'name'      => __( 'Use Settings For Posts Of Category', 'publisher' ),
	'desc'      => __( 'By enabling this options settings like logo, page layout, boxed and all other possible features will be used for posts of current category.', 'publisher' ),
	'id'        => 'override_in_posts',
	'type'      => 'switch',
	'on-label'  => __( 'Yes, Use for posts', 'publisher' ),
	'off-label' => __( 'No', 'publisher' ),
);
$fields['single_template']      = array(
	'name'             => __( 'Posts template', 'publisher' ),
	'id'               => 'single_template',
	'type'             => 'select_popup',
	'section_class'    => 'style-floated-left bordered',
	'desc'             => __( 'Change template of all posts that have this category.', 'publisher' ),
	'deferred-options' => array(
		'callback' => 'publisher_get_single_template_option',
		'args'     => array(
			true,
		),
	),
	'texts'            => array(
		'modal_title'   => __( 'Choose Post Template', 'publisher' ),
		'modal_current' => __( 'Current', 'publisher' ),
		'modal_button'  => __( 'Select', 'publisher' ),
		'box_pre_title' => __( 'Selected Template', 'publisher' ),
		'box_button'    => __( 'Change Template', 'publisher' ),
	),
	'column_class'     => 'three-column',
);
$fields['page_layout']          = array(
	'name'             => __( 'Page Layout', 'publisher' ),
	'id'               => 'page_layout',
	'type'             => 'select_popup',
	'desc'             => __( 'Override default layout for this category layout.', 'publisher' ),
	'deferred-options' => array(
		'callback' => 'publisher_layout_option_list',
		'args'     => array(
			true,
		),
	),
	'texts'            => array(
		'modal_title'   => __( 'Choose Category Page Layout', 'publisher' ),
		'modal_current' => __( 'Current', 'publisher' ),
		'modal_button'  => __( 'Select', 'publisher' ),
		'box_pre_title' => __( 'Selected layout', 'publisher' ),
		'box_button'    => __( 'Change layout', 'publisher' ),
	),
	'column_class'     => 'four-column',
);
$fields['layout_style']         = array(
	'name'    => __( 'Page Boxed Style', 'publisher' ),
	'id'      => 'layout_style',
	'type'    => 'select',
	'desc'    => __( 'Override default layout for this category layout.', 'publisher' ),
	'options' => array(
		'default'    => __( 'Default', 'publisher' ),
		'full-width' => __( 'Full Width', 'publisher' ),
		'boxed'      => __( 'Boxed', 'publisher' ),
	)
);
$fields['page_listing']         = array(
	'name'             => __( 'Posts Listing', 'publisher' ),
	'id'               => 'page_listing',
	'type'             => 'select_popup',
	'desc'             => __( 'Override default posts listing fot this category.', 'publisher' ),
	'deferred-options' => array(
		'callback' => 'publisher_listing_option_list',
		'args'     => array(
			true,
		),
	),
	'texts'            => array(
		'modal_title'   => __( 'Choose Category Page Listing', 'publisher' ),
		'modal_current' => __( 'Current', 'publisher' ),
		'modal_button'  => __( 'Select', 'publisher' ),
		'box_pre_title' => __( 'Selected listing', 'publisher' ),
		'box_button'    => __( 'Change listing', 'publisher' ),
	),
	'column_class'     => 'three-column',
);
$fields['page_listing_excerpt'] = array(
	'name'    => __( 'Show Excerpt?', 'publisher' ),
	'id'      => 'page_listing_excerpt',
	'type'    => 'select',
	'desc'    => __( 'Select show or hide post excerpt in listings with excerpt.', 'publisher' ),
	'options' => array(
		'default' => __( '-- Default --', 'publisher' ),
		'show'    => __( 'Yes, Show.', 'publisher' ),
		'hide'    => __( 'No.', 'publisher' ),
	)
);
$fields['term_posts_count']     = array(
	'name' => __( 'Number of Post to Show', 'publisher' ),
	'id'   => 'term_posts_count',
	'desc' => wp_kses( sprintf( __( 'Leave this empty for default. <br>Default: %s', 'publisher' ), publisher_get_option( 'cat_posts_count' ) != '' ? publisher_get_option( 'cat_posts_count' ) : get_option( 'posts_per_page' ) ), bf_trans_allowed_html() ),
	'type' => 'text',
);
$fields['term_pagination_type'] = array(
	'name'             => __( 'Category pagination', 'publisher' ),
	'id'               => 'term_pagination_type',
	'type'             => 'select',
	'desc'             => __( 'Select pagination of this category.', 'publisher' ),
	'deferred-options' => array(
		'callback' => 'publisher_pagination_option_list',
		'args'     => array(
			true,
		),
	),
);


/**
 * -> Background
 */
$fields[]           = array(
	'name'  => __( 'Background Style', 'publisher' ),
	'type'  => 'group',
	'state' => 'close',
);
$fields['bg_color'] = array(
	'name' => __( 'Body Background Color', 'publisher' ),
	'id'   => 'bg_color',
	'type' => 'color',
	'desc' => __( 'Setting a body background image below will override it.', 'publisher' ),
);
$fields['bg_image'] = array(
	'name'         => __( 'Body Background Image', 'publisher' ),
	'id'           => 'bg_image',
	'type'         => 'background_image',
	'upload_label' => __( 'Upload Image', 'publisher' ),
	'desc'         => __( 'Use light patterns in non-boxed layout. For patterns, use a repeating background. Use photo to fully cover the background with an image. Note that it will override the background color option.', 'publisher' ),
);


/**
 * => Title
 */
$fields[]                        = array(
	'name'     => __( 'Title', 'publisher' ),
	'id'       => 'tab_title',
	'type'     => 'tab',
	'icon'     => 'bsai-title',
	'ajax-tab' => true
);
$fields['term_custom_pre_title'] = array(
	'name'           => __( 'Custom Pre Title', 'publisher' ),
	'id'             => 'term_custom_pre_title',
	'type'           => 'text',
	'desc'           => __( 'Customize category pre title with this option for making category page more specific.', 'publisher' ),
	'ajax-tab-field' => 'tab_title',
);
$fields['term_custom_title']     = array(
	'name'           => __( 'Custom Category Title', 'publisher' ),
	'id'             => 'term_custom_title',
	'type'           => 'text',
	'desc'           => __( 'Customize category title in archive page without renaming name of category.', 'publisher' ),
	'ajax-tab-field' => 'tab_title',
);
$fields['hide_term_title']       = array(
	'name'           => __( 'Hide Category Title', 'publisher' ),
	'id'             => 'hide_term_title',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'Enable this for hiding category title.', 'publisher' ),
	'ajax-tab-field' => 'tab_title',
);
$fields['hide_term_description'] = array(
	'name'           => __( 'Hide Category Description', 'publisher' ),
	'id'             => 'hide_term_description',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'Enable this for hiding category description.', 'publisher' ),
	'ajax-tab-field' => 'tab_title',
);


/**
 * => Header Options
 */
$fields['header_options'] = array(
	'name'     => __( 'Header', 'publisher' ),
	'id'       => 'header_options',
	'type'     => 'tab',
	'icon'     => 'bsai-header',
	'ajax-tab' => true
);
$fields[]                 = array(
	'name'           => __( 'Header', 'publisher' ),
	'type'           => 'group',
	'state'          => 'open',
	'ajax-tab-field' => 'header_options',
);
$fields['header_style']   = array(
	'name'             => __( 'Header Style', 'publisher' ),
	'id'               => 'header_style',
	'desc'             => __( 'Override header style for this category.', 'publisher' ),
	'type'             => 'image_radio',
	'section_class'    => 'style-floated-left bordered',
	'deferred-options' => array(
		'callback' => 'publisher_header_style_option_list',
		'args'     => array(
			true,
		),
	),
	'ajax-tab-field'   => 'header_options',
);
$fields['header_layout']  = array(
	'name'             => __( 'Header Boxed', 'publisher' ),
	'id'               => 'header_layout',
	'desc'             => __( 'Select header layout.', 'publisher' ),
	'type'             => 'select',
	'deferred-options' => array(
		'callback' => 'publisher_header_layout_option_list',
		'args'     => array(
			true,
		),
	),
	'ajax-tab-field'   => 'header_options',
);
$fields['main_nav_menu']  = array(
	'name'             => __( 'Main Navigation Menu', 'publisher' ),
	'id'               => 'main_nav_menu',
	'desc'             => __( 'Replace & change main menu for this category.', 'publisher' ),
	'type'             => 'select',
	'deferred-options' => array(
		'callback' => 'bf_get_menus_option',
		'args'     => array(
			true,
			__( '-- Default Main Navigation --', 'publisher' ),
		),
	),
	'ajax-tab-field'   => 'header_options',
);

/**
 * -> Logo
 */
$fields[]                        = array(
	'name'           => __( 'Category Custom Logo', 'publisher' ),
	'type'           => 'group',
	'state'          => 'open',
	'ajax-tab-field' => 'header_options',
);
$fields['logo_image']            = array(
	'name'           => __( 'Logo Image', 'publisher' ),
	'id'             => 'logo_image',
	'desc'           => __( 'You can override default site logo with this option to create fully customized archive pages for each category.', 'publisher' ),
	'type'           => 'media_image',
	'media_title'    => __( 'Select or Upload Logo', 'publisher' ),
	'media_button'   => __( 'Select Image', 'publisher' ),
	'upload_label'   => __( 'Upload Logo', 'publisher' ),
	'remove_label'   => __( 'Remove Logo', 'publisher' ),
	'ajax-tab-field' => 'header_options',
);
$fields['logo_image_retina']     = array(
	'name'           => __( 'Logo Image Retina (2x)', 'publisher' ),
	'id'             => 'logo_image_retina',
	'desc'           => __( 'If you want to upload a Retina Image, It\'s Image Size should be exactly double in compare with your normal Logo. It requires WP Retina 2x plugin.', 'publisher' ),
	'type'           => 'media_image',
	'media_title'    => __( 'Select or Upload Retina Logo', 'publisher' ),
	'media_button'   => __( 'Select Retina Image', 'publisher' ),
	'upload_label'   => __( 'Upload Retina Logo', 'publisher' ),
	'remove_label'   => __( 'Remove Retina Logo', 'publisher' ),
	'ajax-tab-field' => 'header_options',
);
$fields[]                        = array(
	'name'           => __( 'Header Padding', 'publisher' ),
	'type'           => 'group',
	'state'          => 'close',
	'ajax-tab-field' => 'header_options',
);
$fields['header-padding-help']   = array(
	'name'           => __( 'Warning', 'publisher' ),
	'id'             => 'header-padding-help',
	'type'           => 'info',
	'std'            => __( '<p>Please note following settings <strong>not works</strong> for <strong>Header 5, 6 and 8</strong></p>', 'publisher' ),
	'state'          => 'open',
	'info-type'      => 'warning',
	'section_class'  => 'widefat',
	'ajax-tab-field' => 'header_options',
);
$fields['header_top_padding']    = array(
	'name'           => __( 'Header Top Padding', 'publisher' ),
	'id'             => 'header_top_padding',
	'suffix'         => __( 'Pixel', 'publisher' ),
	'desc'           => __( 'In pixels without px, ex: 20. <br>Leave empty for default value.', 'publisher' ),
	'type'           => 'text',
	'ajax-tab-field' => 'header_options',
);
$fields['header_bottom_padding'] = array(
	'name'           => __( 'Header Bottom Padding', 'publisher' ),
	'id'             => 'header_bottom_padding',
	'suffix'         => __( 'Pixel', 'publisher' ),
	'desc'           => __( 'In pixels without px, ex: 20. <br>Leave empty for default value. Values lower than 60px will break the style.', 'publisher' ),
	'type'           => 'text',
	'ajax-tab-field' => 'header_options',
);


/**
 * -> Top Posts
 */
$fields[]                         = array(
	'name'     => __( 'Slider', 'publisher' ),
	'id'       => 'tab_slider',
	'type'     => 'tab',
	'icon'     => 'bsai-slider',
	'ajax-tab' => true,
);
$fields['slider_type']            = array(
	'name'             => __( 'Categories Slider Type', 'publisher' ),
	'id'               => 'slider_type',
	'desc'             => __( 'Select category top posts blocks or custom "Slider Revolution".', 'publisher' ),
	'type'             => 'select',
	'deferred-options' => array(
		'callback' => 'publisher_slider_types_option_list',
		'args'     => array(
			true
		)
	),
	'ajax-tab-field'   => 'tab_slider',
);
$fields[]                         = array(
	'name'           => __( 'Top Posts Settings', 'publisher' ),
	'type'           => 'group',
	'state'          => 'open',
	'ajax-tab-field' => 'tab_slider',
);
$fields['better_slider_style']    = array(
	'name'             => __( 'Category Top Posts', 'publisher' ),
	'id'               => 'better_slider_style',
	'desc'             => __( 'Select slider style.', 'publisher' ),
	'type'             => 'select_popup',
	'section_class'    => 'style-floated-left bordered',
	'deferred-options' => array(
		'callback' => 'publisher_topposts_option_list',
		'args'     => array(
			true,
		),
	),
	'ajax-tab-field'   => 'tab_slider',
	'texts'            => array(
		'modal_title'   => __( 'Choose Slider', 'publisher' ),
		'modal_current' => __( 'Current', 'publisher' ),
		'modal_button'  => __( 'Select', 'publisher' ),
		'box_pre_title' => __( 'Selected slider', 'publisher' ),
		'box_button'    => __( 'Change Slider', 'publisher' ),
	),
	'column_class'     => 'four-column',
);
$fields['better_slider_gradient'] = array(
	'name'           => __( 'Overlay Gradient', 'publisher' ),
	'id'             => 'better_slider_gradient',
	'desc'           => __( 'Select slider items overlay style.', 'publisher' ),
	'type'           => 'select',
	'section_class'  => 'style-floated-left bordered',
	'options'        => array(
		'default'      => __( '-- Default --', 'publisher' ),
		'colored'      => __( 'Colored Gradient', 'publisher' ),
		'colored-anim' => __( 'Animated Gradient', 'publisher' ),
		'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
		'simple'       => __( 'Simple', 'publisher' ),
	),
	'ajax-tab-field' => 'tab_slider',
);
$fields[]                         = array(
	'name'           => __( 'Slider Revolution Settings', 'publisher' ),
	'type'           => 'group',
	'state'          => 'open',
	'ajax-tab-field' => 'tab_slider',
);
// todo add style for rev slider ex: wide, boxed, in main columns...
$fields['rev_slider_item'] = array(
	'name'             => __( 'Categories Top Slider Revolution', 'publisher' ),
	'id'               => 'rev_slider_item',
	'desc'             => __( 'Select a "Slider Revolution" slider for top of categories.', 'publisher' ),
	'type'             => 'select',
	'deferred-options' => array(
		'callback' => 'bf_deferred_option_get_rev_sliders',
		'args'     => array(
			array(
				'default' => true
			)
		)
	),
	'ajax-tab-field'   => 'tab_slider',
);

/**
 * -> Injection Locations
 */
$fields['_injection_tab']                  = array(
	'name'     => __( 'Injection Locations', 'publisher' ),
	'id'       => '_injection_tab',
	'type'     => 'tab',
	'icon'     => 'bsai-inject',
	'ajax-tab' => true,
);
$fields['injection_disable_all']           = array(
	'name'           => __( 'Disable all Injection Locations?', 'publisher' ),
	'id'             => 'injection_disable_all',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove all injection locations ', 'publisher' ),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_before_header']         = array(
	'name'           => __( 'Disable Before Header Injection Locations?', 'publisher' ),
	'id'             => 'injection_before_header',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove Before Header injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_after_header']          = array(
	'name'           => __( 'Disable After Header Injection Locations?', 'publisher' ),
	'id'             => 'injection_after_header',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove After Header injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_before_footer']         = array(
	'name'           => __( 'Disable Before Footer Injection Locations?', 'publisher' ),
	'id'             => 'injection_before_footer',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove Before Footer injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_after_footer']          = array(
	'name'           => __( 'Disable After Footer Injection Locations?', 'publisher' ),
	'id'             => 'injection_after_footer',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove After Footer injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_category_after_header'] = array(
	'name'           => __( 'Disable After Category Header Injection Locations?', 'publisher' ),
	'id'             => 'injection_category_after_header',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove After Category Header injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);
$fields['injection_category_after_posts']  = array(
	'name'           => __( 'Disable After Category Posts Injection Locations?', 'publisher' ),
	'id'             => 'injection_category_after_posts',
	'type'           => 'switch',
	'on-label'       => __( 'Yes', 'publisher' ),
	'off-label'      => __( 'No', 'publisher' ),
	'desc'           => __( 'You can remove After Category Posts injection locations', 'publisher' ),
	'show_on'        => array(
		array(
			'injection_disable_all!=1'
		)
	),
	'ajax-tab-field' => '_injection_tab',
);


/**
 *
 * Custom CSS code
 *
 */
bf_inject_panel_custom_css_fields( $fields );

