<?php

$fields['layout-2-col'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_generator_layout_2_col'
	),
	'css-echo-default' => true,
);

$fields['layout-3-col'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_generator_layout_3_col'
	),
	'css-echo-default' => true,
);

$fields['layout_columns_space'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_generator_columns_space'
	),
	'css-echo-default' => true,
);

$fields['header_top_padding'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-1 .header-inner',
							1 => '.site-header.header-style-2 .header-inner',
							2 => '.site-header.header-style-3 .header-inner',
							3 => '.site-header.header-style-4 .header-inner',
							4 => '.site-header.header-style-7 .header-inner',
							5 => '.site-header.header-style-1.h-a-ad .header-inner',
							6 => '.site-header.header-style-4.h-a-ad .header-inner',
							7 => '.site-header.header-style-7.h-a-ad .header-inner',
						),
					'prop'     =>
						array(
							'padding-top' => '%%value%%px',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_bottom_padding'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-1 .header-inner',
							1 => '.site-header.header-style-2 .header-inner',
							2 => '.site-header.header-style-3 .header-inner',
							3 => '.site-header.header-style-4 .header-inner',
							4 => '.site-header.header-style-7 .header-inner',
							5 => '.site-header.header-style-1.h-a-ad .header-inner',
							6 => '.site-header.header-style-4.h-a-ad .header-inner',
							7 => '.site-header.header-style-7.h-a-ad .header-inner',
						),
					'prop'     =>
						array(
							'padding-bottom' => '%%value%%px',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['theme_color'] = array(
	'css'              => include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php',
	'css-echo-default' => true,
);

$fields['widgets_heading_style'] = array(
	'css' =>
		array(
			'callback' => 'publisher_cb_css_generator_section_heading_widget',
			'args'                  => array(
				'type' => 'general-widget',
			),
		),
);


$fields['site_bg_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'body',
							1 => 'body.boxed',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
			1 =>
				array(
					'selector' =>
						array(
							0 => '.main-wrap',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
					'before'   => '@media (max-width: 767px){',
					'after'    => '}',
				),
		),
);

$fields['site_bg_image'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'body',
						),
					'prop'     =>
						array(
							0 => 'background-image',
						),
					'type'     => 'background-image',
				),
			1 =>
				array(
					'selector' =>
						array(
							0 => '.main-wrap',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
					'before'   => '@media (max-width: 767px){',
					'after'    => '}',
					'type'     => 'background-image',
				),
		),
);

$fields['site_bg_image_2'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'html',
						),
					'prop'     =>
						array(
							0 => 'background-image',
						),
					'type'     => 'background-image',
				),
		),
);

$fields['site_bg_color_2'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'html',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
);

$fields['resp_bg_image'] = array(
	'css' => array(
		'callback' => 'publisher_cb_css_resp_bg_image'
	),
);

$fields['resp_bg_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.rh-cover',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
			1 =>
				array(
					'selector' =>
						array(
							0 => '.rh-cover .bs-login .bs-login-reset-panel .login-btn',
							1 => '.rh-cover .bs-login .login-btn',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),

		),
);

$fields['topbar_date_bg'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .topbar-date.topbar-date',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_date_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .topbar-date.topbar-date',
						),
					'prop'     =>
						array(
							'color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_text_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header .top-menu.menu > li > a',
							// 1 removed
							// 2 removed
							3 => '.topbar .topbar-sign-in',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_text_hcolor'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header .top-menu.menu > li:hover > a',
							1 => '.site-header .top-menu.menu .sub-menu > li:hover > a',
							2 => '.topbar .better-newsticker ul.news-list li a',
							3 => '.topbar .topbar-sign-in:hover',
						),
					'prop'     =>
						array(
							'color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.full-width .topbar',
							1 => '.site-header.boxed .topbar .topbar-inner'
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_border_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.full-width .topbar',
							1 => '.site-header.boxed .topbar .topbar-inner',
						),
					'prop'     =>
						array(
							'border-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_icon_text_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .better-social-counter.style-button .social-item .item-icon',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_icon_text_hcolor'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .better-social-counter.style-button .social-item:hover .item-icon',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_icon_bg'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .better-social-counter.style-button .social-item .item-icon',
						),
					'prop'     =>
						array(
							'background' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['topbar_icon_bg_hover'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .better-social-counter.style-button .social-item:hover .item-icon',
						),
					'prop'     =>
						array(
							'background' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_top_border_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'body.active-top-line',
						),
					'prop'     =>
						array(
							'border-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_btop_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.boxed .main-menu-wrapper .main-menu-container',
							1 => '.site-header.full-width .main-menu-wrapper',
						),
					'prop'     =>
						array(
							'border-top-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st1_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-1.boxed .main-menu-wrapper .main-menu-container',
							1 => '.site-header.header-style-1.full-width .main-menu-wrapper',
							2 => '.site-header.header-style-1 .better-pinning-block.pinned.main-menu-wrapper .main-menu-container',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st2_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-2.boxed .main-menu-wrapper .main-menu-container',
							1 => '.site-header.header-style-2.full-width .main-menu-wrapper',
							2 => '.site-header.header-style-2 .better-pinning-block.pinned.main-menu-wrapper .main-menu-container',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st3_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-3.boxed .main-menu-container',
							1 => '.site-header.full-width.header-style-3 .main-menu-wrapper',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st4_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-4.boxed .main-menu-container',
							1 => ' .site-header.full-width.header-style-4 .main-menu-wrapper',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st5_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-5.boxed .header-inner',
							1 => '.site-header.header-style-5.full-width',
							2 => '.site-header.header-style-5.full-width > .bs-pinning-wrapper > .content-wrap.pinned',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st6_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-6.boxed .header-inner',
							1 => '.site-header.header-style-6.full-width',
							2 => '.site-header.header-style-6.full-width > .bs-pinning-wrapper > .content-wrap.pinned',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st7_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-7.boxed .main-menu-container',
							1 => ' .site-header.full-width.header-style-7 .main-menu-wrapper',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_st8_bbottom_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-8.boxed .header-inner',
							1 => '.site-header.header-style-8.full-width',
							2 => '.site-header.header-style-8.full-width > .bs-pinning-wrapper > .content-wrap.pinned',
						),
					'prop'     =>
						array(
							'border-bottom-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_text_color'] = array(
	'css'              =>
		array(
			'color'    =>
				array(
					'selector' =>
						array(
							0 => '.site-header .shop-cart-container .cart-handler',
							1 => '.site-header .search-container .search-handler',
							2 => '.site-header .main-menu > li > a',
							3 => '.site-header .search-container .search-box .search-form .search-field',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
			'bg_color' =>
				array(
					'selector' =>
						array(
							1 => '.site-header .off-canvas-menu-icon .off-canvas-menu-icon-el',
							2 => '.site-header .off-canvas-menu-icon .off-canvas-menu-icon-el:after',
							3 => '.site-header .off-canvas-menu-icon .off-canvas-menu-icon-el:before',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
			'pl_1'     =>
				array(
					'selector' =>
						array(
							1 => '.site-header .search-container .search-box .search-form .search-field::-webkit-input-placeholder',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),

			'pl_2' =>
				array(
					'selector' =>
						array(
							1 => '.site-header .search-container .search-box .search-form .search-field::-moz-placeholder',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),

			'pl_3' =>
				array(
					'selector' =>
						array(
							1 => '.site-header .search-container .search-box .search-form .search-field:-ms-input-placeholder',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),

			'pl_4' =>
				array(
					'selector' =>
						array(
							1 => '.site-header .search-container .search-box .search-form .search-field:-moz-placeholder',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),


		),
	'css-echo-default' => true,
);

$fields['header_menu_text_h_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header .shop-cart-container:hover .cart-handler',
							1 => '.site-header .search-container:hover .search-handler',
							2 => '.site-header .main-menu > li:hover > a',
							3 => '.site-header .main-menu > li > a:hover',
							4 => '.site-header .main-menu > li.current-menu-item > a',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
			1 =>
				array(
					'selector' =>
						array(
							0 => '.main-menu.menu > li:hover > a:before',
							1 => '.main-menu.menu .sub-menu li.current-menu-item:hover > a',
							2 => '.main-menu.menu .sub-menu > li:hover > a',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_item_h_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.site-header.site-header .main-menu.menu > li.current-menu-item > a',
							1 => '.site-header.site-header.site-header .main-menu.menu > li.current-menu-parent > a',
							2 => '.site-header.site-header.site-header .main-menu.menu > li:hover > a',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_sub_text_h_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'body .main-menu.menu .sub-menu li.current-menu-item:hover > a',
							1 => 'body .main-menu.menu .sub-menu > li:hover > a',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_menu_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0  => '.site-header.boxed.header-style-1 .main-menu-wrapper .main-menu-container',
							1  => '.site-header.full-width.header-style-1 .main-menu-wrapper',
							2  => '.bspw-header-style-1.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container',
							3  => '.site-header.boxed.header-style-2 .main-menu-wrapper .main-menu-container',
							4  => '.site-header.full-width.header-style-2 .main-menu-wrapper',
							5  => '.bspw-header-style-2.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container',
							6  => '.site-header.boxed.header-style-3 .main-menu-wrapper .main-menu-container',
							7  => '.site-header.full-width.header-style-3 .main-menu-wrapper',
							8  => '.bspw-header-style-3.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container',
							9  => '.site-header.boxed.header-style-4 .main-menu-wrapper .main-menu-container',
							10 => '.site-header.full-width.header-style-4 .main-menu-wrapper',
							11 => '.bspw-header-style-4.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container',
							15 => '.site-header.header-style-5 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
							16 => '.site-header.header-style-5.full-width .content-wrap.pinned',
							12 => '.site-header.boxed.header-style-7 .main-menu-wrapper .main-menu-container',
							13 => '.site-header.full-width.header-style-7 .main-menu-wrapper',
							14 => '.bspw-header-style-7.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container',
							// 15 is reserved
							// 16 is reserved
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
			1 =>
				array(
					'selector' =>
						array(
							1  => '.site-header.header-style-5 .header-inner',
							6  => '.site-header.header-style-5.full-width.stretched > .bspw-header-style-5 > .content-wrap',
							7  => '.site-header.header-style-5.full-width.stretched > .content-wrap',
							// 2 removed
							// 3 removed
							4  => '.site-header.header-style-6 .header-inner',
							8  => '.site-header.header-style-6.full-width.stretched > .bspw-header-style-6 > .content-wrap',
							9  => '.site-header.header-style-6.full-width.stretched > .content-wrap',
							5  => '.site-header.header-style-8 .header-inner',
							10 => '.site-header.header-style-8.full-width.stretched > .bspw-header-style-8 > .content-wrap',
							11 => '.site-header.header-style-8.full-width.stretched > .content-wrap',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_submenu_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header .menu .mega-menu',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_submenu_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.mega-links > .menu-item a',
							1 => '.mega-links > .menu-item a:hover',
						),
					'prop'     =>
						array(
							'color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0  => '.site-header.header-style-1',
							1  => '.site-header.header-style-2',
							2  => '.site-header.header-style-3',
							3  => '.site-header.header-style-4',
							4  => '.site-header.header-style-5.full-width',
							5  => '.site-header.header-style-5.boxed > .content-wrap > .container',
							6  => '.site-header.header-style-5 .bs-pinning-wrapper.bspw-header-style-5 > .bs-pinning-block',
							7  => '.site-header.header-style-6.full-width',
							8  => '.site-header.header-style-6.boxed > .content-wrap > .container',
							9  => '.site-header.header-style-6 .bs-pinning-wrapper.bspw-header-style-6 > .bs-pinning-block',
							10 => '.site-header.header-style-7',
							11 => '.site-header.header-style-8.full-width',
							12 => '.site-header.header-style-8.boxed > .content-wrap > .container',
							13 => '.site-header.header-style-8 .bs-pinning-wrapper.bspw-header-style-8 > .bs-pinning-block',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['header_bg_image'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0  => '.site-header.header-style-1',
							1  => '.site-header.header-style-2',
							2  => '.site-header.header-style-3',
							3  => '.site-header.header-style-4',
							4  => '.site-header.header-style-5.full-width',
							5  => '.site-header.header-style-5.boxed > .content-wrap > .container',
							6  => '.site-header.header-style-5 .bs-pinning-wrapper.bspw-header-style-5 > .bs-pinning-block',
							7  => '.site-header.header-style-6.full-width',
							8  => '.site-header.header-style-6.boxed > .content-wrap > .container',
							9  => '.site-header.header-style-6 .bs-pinning-wrapper.bspw-header-style-6 > .bs-pinning-block',
							10 => '.site-header.header-style-7',
							11 => '.site-header.header-style-8.full-width',
							12 => '.site-header.header-style-8.boxed > .content-wrap > .container',
							13 => '.site-header.header-style-8 .bs-pinning-wrapper.bspw-header-style-8 > .bs-pinning-block',
						),
					'prop'     =>
						array(
							0 => 'background-image',
						),
					'type'     => 'background-image',
				),
		),
	'css-echo-default' => true,
);

$fields['content_a_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.single-post-content .entry-content a',
							1 => '.single-page-simple-content .entry-content a',
							2 => '.bbp-reply-content a',
							3 => '.bs-text a',
							4 => '.wpb_text_column a',
						),
					'prop'     =>
						array(
							'color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['content_a_hover_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.single-post-content .entry-content a:hover',
							1 => '.single-page-simple-content .entry-content a:hover',
							2 => '.bbp-reply-content a:hover',
							3 => '.bs-text a:hover',
							4 => '.wpb_text_column a:hover',
						),
					'prop'     =>
						array(
							'color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['cat_topposts_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0  => '.slider-style-15-container .listing-mg-5-item-big .content-container',
							1  => '.slider-style-15-container',
							2  => '.slider-style-13-container',
							3  => '.slider-style-11-container',
							4  => '.slider-style-9-container',
							5  => '.slider-style-7-container',
							6  => '.slider-style-4-container.slider-container-1col',
							7  => '.slider-style-3-container',
							8  => '.slider-style-5-container',
							9  => '.slider-style-2-container.slider-container-1col',
							10 => '.slider-style-1-container',
							11 => '.slider-style-17-container',
							12 => '.slider-style-19-container',
							13 => '.slider-style-20-container',
							14 => '.slider-style-21-container',
							15 => '.slider-style-22-container',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%% !important; margin-bottom: 0',
						),
				),
			1 =>
				array(
					'selector' =>
						array(
							0  => '.bf-breadcrumb.bc-before-slider-style-1',
							1  => '.bf-breadcrumb.bc-before-slider-style-3',
							2  => '.bf-breadcrumb.bc-before-slider-style-5',
							3  => '.bf-breadcrumb.bc-before-slider-style-7',
							4  => '.bf-breadcrumb.bc-before-slider-style-9',
							5  => '.bf-breadcrumb.bc-before-slider-style-11',
							6  => '.bf-breadcrumb.bc-before-slider-style-13',
							7  => '.bf-breadcrumb.bc-before-slider-style-15',
							8  => '.bf-breadcrumb.bc-before-slider-style-17',
							9  => '.bf-breadcrumb.bc-before-slider-style-19',
							10 => '.bf-breadcrumb.bc-before-slider-style-20',
							11 => '.bf-breadcrumb.bc-before-slider-style-21',
							12 => '.bf-breadcrumb.bc-before-slider-style-22',
							13 => '.bf-breadcrumb.bc-before-slider-style-23',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%% !important',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['footer_link_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'ul.menu.footer-menu li > a',
							1 => '.site-footer .copy-2 a',
							2 => '.site-footer .copy-2',
							3 => '.site-footer .copy-1 a',
							4 => '.site-footer .copy-1',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['footer_link_hover_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'ul.menu.footer-menu li > a:hover',
							1 => '.site-footer .copy-2 a:hover',
							2 => '.site-footer .copy-1 a:hover',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['footer_widgets_bg_color'] = array(
	'css'              => array(
		0          =>
			array(
				'selector' =>
					array(
						'.site-footer .footer-widgets',
						'.footer-widgets .section-heading.sh-t4.sh-s5 .h-text:after',
					),
				'prop'     =>
					array(
						'background-color' => '%%value%% !important',
					),
			),
		1          =>
			array(
				'selector' =>
					array(
						'.site-footer .section-heading.sh-t4.sh-s5 .h-text:before',
					),
				'prop'     =>
					array(
						'border-top-color' => '%%value%% !important',
					),
			),
		'callback' => 'publisher_cb_css_footer_widgets_bg',
	),
	'css-echo-default' => true,
);

$fields['footer_line_top_color'] = array(
	'css'              => array(
		'callback'            => 'publisher_cb_css_footer_line_top_color',
		'force-callback-call' => true,
	),
	'css-echo-default' => true,
);

$fields['footer_menu_bg_color'] = array(
	'css'              => array(
		'callback'            => 'publisher_cb_css_footer_menu_bg',
		'force-callback-call' => true,
	),
	'css-echo-default' => true,
);

$fields['footer_copy_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-footer .copy-footer',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['footer_social_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-footer .footer-social-icons',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['footer_bg_color'] = array(
	'css'              =>
		array(
			'callback' => 'publisher_cb_css_footer_bg',
			0          =>
				array(
					'selector' =>
						array(
							0 => '.site-footer',
							1 => '.footer-widgets .section-heading.sh-t4.sh-s5 .h-text:after',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
			1          =>
				array(
					'selector' =>
						array(
							0 => '.site-footer .section-heading.sh-t4.sh-s5 .h-text:before',
						),
					'prop'     =>
						array(
							'border-top-color' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['footer_bg_image'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-footer',
						),
					'prop'     =>
						array(
							0 => 'background-image',
						),
					'type'     => 'background-image',
				),
		),
	'css-echo-default' => true,
);

$fields['widget_bg_color'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							1 => '.sidebar-column > aside > *',
							2 => '.bs-vc-sidebar-column > .bs-vc-wrapper > *',
							3 => '.post-related',
						),
					'prop'     =>
						array(
							'background' => '%%value%%; padding: 20px',
						),
				),
			1 =>
				array(
					'selector' =>
						array(
							1 => '.sidebar-column > aside > .' . BAM_PREFIX,
							2 => '.sidebar-column > aside > .widget_better-ads',
							3 => '.bs-vc-sidebar-column > .bs-vc-wrapper > .' . BAM_PREFIX,
							4 => '.bs-vc-sidebar-column > .bs-vc-wrapper > .widget_better-ads',
						),
					'prop'     =>
						array(
							'background' => 'transparent; padding: inherit',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['section_title_bg_color'] = array(
	'css'              =>
		array(
			'callback' => array(
				'fun'  => 'publisher_cb_css_generator_section_heading',
				'args' => array(
					'type'    => 'theme_color',
					'section' => 'bg',
				),
			)
		),
	'css-echo-default' => true,
);

$fields['section_title_color'] = array(
	'css'              => array(
		'callback' => array(
			'fun'  => 'publisher_cb_css_generator_section_heading',
			'args' => array(
				'type'    => 'theme_color',
				'section' => 'color',
			),
		)
	),
	'css-echo-default' => true,
);

$fields['term_badge_bg_color'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_term_badge_bg_color',
	),
	'css-echo-default' => true,
);

$fields['term_badge_text_color'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_term_badge_text_color',
	),
	'css-echo-default' => true,
);

$fields['listings_readmore_color'] = array(
	'css'              =>
		array(
			'bg'     =>
				array(
					'selector' =>
						array(
							1 => '.entry-content a.read-more',
							2 => 'a.read-more',
							3 => '.listing-item-classic:hover a.read-more',
							4 => '.listing-item-blog:hover a.read-more',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%% !important',
						),
				),
			'border' => array(
				'selector' =>
					array(
						1 => '.bs-slider-2-item .content-container a.read-more',
						2 => '.bs-slider-3-item .content-container a.read-more',
					),
				'prop'     =>
					array(
						'border-color' => '%%value%%',
					),
			),
		),
	'css-echo-default' => true,
);

$fields['listings_readmore_color_hover'] = array(
	'css'              =>
		array(
			'bg'     =>
				array(
					'selector' =>
						array(
							1 => '.entry-content a.read-more.read-more.read-more:hover',
							2 => 'a.read-more.read-more.read-more:hover',
							3 => '.listing-item-classic:hover a.read-more.read-more.read-more',
							4 => '.bs-slider-2-item .content-container a.read-more.read-more.read-more:hover',
							5 => '.bs-slider-3-item .content-container a.read-more.read-more.read-more:hover',
							6 => '.listing-item-blog:hover a.read-more.read-more.read-more',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%% !important',
						),
				),
			'border' => array(
				'selector' =>
					array(
						1 => '.bs-slider-2-item .content-container a.read-more.read-more.read-more:hover',
						2 => '.bs-slider-3-item .content-container a.read-more.read-more.read-more:hover',
					),
				'prop'     =>
					array(
						'border-color' => '%%value%%',
					),
			),
		),
	'css-echo-default' => true,
);

$fields['typo_body'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' => array(
						'body.bs-theme',
						'body.bs-theme .btn-bs-pagination',
						'body.bs-theme .body-typo',
					),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_meta'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-meta',
							1 => '.post-meta a',
						),
					'type'     => 'font',
				),
			1 =>
				array(
					'selector'       =>
						array(
							0 => '.listing-mg-item.listing-mg-5-item .post-meta.post-meta .views.views.views',
						),
					'type'           => 'font',
					'important-attr' => array(
						'font-weight',
						'color',
					),
				),

		),
	'css-echo-default' => true,
);

$fields['typo_meta_author'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-meta .post-author',
						),
					'type'     => 'font',
					'exclude'  => array(
						'color'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_badges'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.term-badges .format-badge',
							1 => '.term-badges .term-badge',
							2 => '.main-menu .term-badges a',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);


$fields['typo_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0  => '.heading-typo',
							1  => 'h1,h2,h3,h4,h5,h6',
							27 => '.h1,.h2,.h3,.h4,.h5,.h6',
							28 => '.heading-1,.heading-2,.heading-3,.heading-4,.heading-5,.heading-6',
							2  => '.header .site-branding .logo',
							3  => '.search-form input[type="submit"]',
							4  => '.widget.widget_categories ul li',
							5  => '.widget.widget_archive ul li',
							6  => '.widget.widget_nav_menu ul.menu',
							7  => '.widget.widget_pages ul li',
							8  => '.widget.widget_recent_entries li a',
							9  => '.widget .tagcloud a',
							10 => '.widget.widget_calendar table caption',
							11 => '.widget.widget_rss li .rsswidget',
							12 => '.listing-widget .listing-item .title',
							13 => 'button,html input[type="button"],input[type="reset"],input[type="submit"],input[type="button"]',
							14 => '.pagination',
							15 => '.site-footer .footer-social-icons .better-social-counter.style-name .social-item',
							16 => '.section-heading .h-text',
							17 => '.entry-terms a',
							18 => '.single-container .post-share a',
							19 => '.comment-list .comment-meta .comment-author',
							20 => '.comments-wrap .comments-nav',
							21 => '.main-slider .content-container .read-more',
							22 => 'a.read-more',
							23 => '.single-page-content > .post-share li',
							24 => '.single-container > .post-share li',
							25 => '.better-newsticker .heading',
							26 => '.better-newsticker ul.news-list li a',
							// 27 reserved
							// 28 reserved
						),
					'type'     => 'font',
				),
			1 =>
				array(
					'selector' =>
						array(
							0 => '.better-gcs-wrapper .gsc-result .gs-title',
						),
					'type'     => 'font',
					'filter'   =>
						array(
							0 =>
								array(
									'type'      => 'class',
									'condition' => 'Better_GCS',
								),
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h1'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h1',
							1 => '.h1',
							2 => '.heading-1',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h1_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h1',
							1 => '.h1',
							2 => '.heading-1',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
);

$fields['typo_heading_h2'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h2',
							1 => '.h2',
							2 => '.heading-2',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h2_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h2',
							1 => '.h2',
							2 => '.heading-2',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
);

$fields['typo_heading_h3'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h3',
							1 => '.h3',
							2 => '.heading-3',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h3_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h3',
							1 => '.h3',
							2 => '.heading-3',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
);

$fields['typo_heading_h4'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h4',
							1 => '.h4',
							2 => '.heading-4',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h4_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h4',
							1 => '.h4',
							2 => '.heading-4',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
);

$fields['typo_heading_h5'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h5',
							1 => '.h5',
							2 => '.heading-5',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h5_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h5',
							1 => '.h5',
							2 => '.heading-5',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
);

$fields['typo_heading_h6'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h6',
							1 => '.h6',
							2 => '.heading-6',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_heading_h6_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'h6',
							1 => '.h6',
							2 => '.heading-6',
						),
					'prop'     =>
						array(
							'color' => '%%value%%',
						),
				),
		),
);

$fields['typo_post_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.single-post-title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp1_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-1 .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp2_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-2-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp3_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-3-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp4_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-4-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp5_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-5-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp6_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-6 .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp7_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-7-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp8_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-8 .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp9_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-9 .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp10_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-10 .single-post-title',
							1 => '.ajax-post-content .single-post-title.single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp11_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-11-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp12_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-tp-12-header .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp13_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-13 .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_tp14_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.post-template-14 .single-post-title',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' => '.post-subtitle',
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_entry_content'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' => '.entry-content',
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_summary'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' => '.post-summary',
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_post_summary_single'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' => '.single-post-excerpt',
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typ_header_logo'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' => '.site-header .site-branding .logo.text-logo',
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typ_header_menu'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.main-menu li > a',
							1 => '.main-menu li',
							2 => '.off-canvas-menu > ul > li > a',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typ_header_sub_menu'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.main-menu.menu .sub-menu > li > a',
							1 => '.main-menu.menu .sub-menu > li',
							2 => '.rh-header .menu-container .resp-menu li > a',
							3 => '.rh-header .menu-container .resp-menu li',
							4 => '.mega-menu.mega-type-link-list .mega-links li > a',
							5 => 'ul.sub-menu.bs-pretty-tabs-elements .mega-menu.mega-type-link .mega-links > li > a',
							6 => '.off-canvas-menu li > a',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_topbar_menu'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.top-menu.menu > li > a',
							1 => '.top-menu.menu > li > a:hover',
							2 => '.top-menu.menu > li',
							3 => '.topbar .topbar-sign-in',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_topbar_sub_menu'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.top-menu.menu .sub-menu > li > a',
							1 => '.top-menu.menu .sub-menu > li',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_topbar_date'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.topbar .topbar-date',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_archive_title_pre'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.archive-title .pre-title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_archive_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.archive-title .page-heading',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_blocks_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item .post-subtitle',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_classic_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-classic-1 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_classic_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-classic-1 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_classic_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-classic-2 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_classic_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-classic-2 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_classic_3_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-classic-3 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_classic_3_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-classic-3 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-1-item .content-container',
							1 => '.listing-mg-1-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-1-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-2-item .content-container',
							1 => '.listing-mg-2-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-2-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_3_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-3-item .content-container',
							1 => '.listing-mg-3-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_4_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-4-item .content-container',
							1 => '.listing-mg-4-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_4_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-4-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_5_title_big'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-5-item-big .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_5_title_small'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-5-item-small .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_5_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-5-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_6_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-6-item .content-container',
							1 => '.listing-mg-6-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_6_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-6-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_7_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-7-item .content-container',
							1 => '.listing-mg-7-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_7_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-7-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_8_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-8-item .content-container',
							1 => '.listing-mg-8-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_8_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-8-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_9_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-9-item .content-container',
							1 => '.listing-mg-9-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_9_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-9-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_10_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-10-item .content-container',
							1 => '.listing-mg-10-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_mg_10_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-mg-10-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_grid_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-grid-1 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_grid_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-grid-1 .post-subtitle',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%px',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_grid_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-grid-2 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_grid_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-grid-2 .post-subtitle',
						),
					'prop'     =>
						array(
							'font-size' => '%%value%%px',
						),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_tall_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tall-1 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_tall_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tall-1 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_tall_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tall-2 .title',
							1 => '.listing-item-tall-2 .title a',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_tall_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tall-2 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_slider_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-slider-1-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_slider_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-slider-1-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_slider_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-slider-2-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_slider_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-slider-2-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_slider_3_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-slider-3-item .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_slider_3_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-slider-3-item .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_box_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-box-1 .box-title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_box_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-box-2 .box-title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_box_3_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-box-3 .box-title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_box_4_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-box-4 .box-title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_blog_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-blog-1 > .item-inner > .title',
							1 => '.listing-item-blog-2 > .item-inner > .title',
							2 => '.listing-item-blog-3 > .item-inner > .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_blog_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-blog-1 > .item-inner > .post-subtitle',
							1 => '.listing-item-blog-2 > .item-inner > .post-subtitle',
							2 => '.listing-item-blog-3 > .item-inner > .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_blog_5_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-blog-5 > .item-inner > .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_blog_5_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-blog-5 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_thumbnail_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tb-3 .title',
							1 => '.listing-item-tb-1 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_thumbnail_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tb-3 .post-subtitle',
							1 => '.listing-item-tb-1 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_thumbnail_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tb-2 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_listing_thumbnail_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-tb-2 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_text_listing_1_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-text-1 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_text_listing_1_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-text-1 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_text_listing_2_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-text-2 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_text_listing_2_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-text-2 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);

$fields['typo_text_listing_3_title'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-text-3 .title',
							1 => '.listing-item-text-4 .title',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_text_listing_3_subtitle'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.listing-item-text-3 .post-subtitle',
							1 => '.listing-item-text-4 .post-subtitle',
						),
					'prop'     => array(
						'font-size' => '%%value%%px'
					),
				),
		),
	'css-echo-default' => true,
);


$fields['typo_section_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.section-heading .h-text',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_widget_section_heading'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.widget .section-heading .h-text',
							1 => '.bs-vc-sidebar-column .section-heading .h-text',
						),
					'prop'     =>
						array(
							'',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_footer_menu'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-footer .copy-footer .menu',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['typo_footer_copy'] = array(
	'css'              =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-footer .copy-footer .container',
						),
					'type'     => 'font',
				),
		),
	'css-echo-default' => true,
);

$fields['views_ranking'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_generator_views_ranking'
	),
	'css-echo-default' => true,
);

$fields['shares_ranking'] = array(
	'css'              => array(
		'callback' => 'publisher_cb_css_generator_shares_ranking'
	),
	'css-echo-default' => true,
);

$fields['gdpr_cookie_law_bg'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-wrap-gdpr-law .bs-gdpr-law',
						),
					'prop'     => 'background-color',
				),
		),
);

$fields['gdpr_cookie_law_text_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-wrap-gdpr-law',
						),
					'prop'     => 'color',
				),
		),
);

$fields['gdpr_cookie_law_accept_bg_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-wrap-gdpr-law .bs-gdpr-accept',
						),
					'prop'     => 'background-color',
				),
		),
);

$fields['gdpr_cookie_law_accept_text_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-wrap-gdpr-law .bs-gdpr-accept',
						),
					'prop'     => 'color',
				),
		),
);

$fields['gdpr_cookie_law_cookie_policy_bg'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-wrap-gdpr-law .bs-gdpr-show',
						),
					'prop'     => 'background-color',
				),
		),
);

$fields['gdpr_cookie_law_cookie_policy_text'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.bs-wrap-gdpr-law .bs-gdpr-show',
						),
					'prop'     => 'color',
				),
		),
);
