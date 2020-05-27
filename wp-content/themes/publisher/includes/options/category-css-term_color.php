<?php

return array(
	'color'            =>
		array(
			'selector' =>
				array(
					0  => '.widget.widget_categories li.cat-item.cat-item-%%id%% > a:hover',
					1  => '.main-menu.menu > li.menu-term-%%id%%:hover > a',
					2  => 'ul.menu.footer-menu li.menu-term-%%id%% > a:hover',
					3  => '.listing-item.main-term-%%id%%:hover .title a',
					4  => 'body.category-%%id%% .archive-title .page-heading',
					5  => '.listing-item-classic.main-term-%%id%% .post-meta a:hover',
					6  => '.listing-item-blog.main-term-%%id%% .post-meta a:hover',
					7  => '.listing-item-grid.main-term-%%id%% .post-meta a:hover',
					8  => '.listing-item-text-1.main-term-%%id%% .post-meta a:hover',
					9  => '.listing-item-text-2.main-term-%%id%% .post-meta a:hover',
					10 => '.bs-popular-categories .bs-popular-term-item.term-item-%%id%%:hover a',
					11 => '.listing-mg-5-item.main-term-%%id%%:hover .title',
					14 => '.listing-mg-5-item.main-term-%%id%%:hover .title a:hover',
					12 => '.listing-item-tall-1.main-term-%%id%%:hover > .title',
					13 => '.listing-item-tall-2.main-term-%%id%%:hover > .title',
					// 14 reserved
					// 15 removed
					// 16 removed
					// 17 removed
					// 18 removed
					19 => '.tabbed-grid-posts .tabs-section .active a.term-%%id%%',
					20 => '.search-header .clean-button.term-%%id%%:hover',
				),
			'prop'     =>
				array(
					'color' => '%%value%% !important',
				),
		),
	'bg_color'         =>
		array(
			'selector' =>
				array(
					0 => '.main-menu.menu > li.menu-term-%%id%%:hover > a:before',
					1 => '.main-menu.menu > li.menu-term-%%id%%.current-menu-item > a:before',
					2 => '.main-menu.menu > li.menu-term-%%id%%.current-menu-parent > a:before',

					3  => '.widget.widget_nav_menu ul.menu li.menu-term-%%id%% > a:hover',
					26 => '.widget.widget_nav_menu ul.menu li.current-menu-item.menu-term-%%id%% > a',
					4  => '.widget.widget_categories li.cat-item.cat-item-%%id%% > a:hover > .post-count',

					5 => '.listing-item-text-1.main-term-%%id%%:hover .term-badges.floated .term-badge.term-%%id%% a',
					6 => '.listing-item-tb-2.main-term-%%id%%:hover .term-badges.floated .term-badge a',
					7 => '.listing-item.main-term-%%id%%:hover a.read-more',

					8  => '.term-badges .term-badge.term-%%id%% a',
					25 => '.archive-title .term-badges span.term-badge.term-%%id%% a:hover',

					9  => 'body.category-%%id%% .archive-title .pre-title span',
					10 => 'body.category-%%id%% .archive-title .pre-title:after',

					// 11 removed
					// 12  removed
					// 13 removed

					14 => '.bs-pagination.main-term-%%id%% .btn-bs-pagination:hover',
					15 => '.bs-pagination-wrapper.main-term-%%id%% .bs-loading > div',
					24 => '.bs-pagination.main-term-%%id%% .btn-bs-pagination.bs-pagination-in-loading',

					22 => '.bs-slider-controls.main-term-%%id%% .btn-bs-pagination:hover',
					23 => '.bs-slider-controls.main-term-%%id%% .bs-slider-dots .bs-slider-active > .bts-bs-dots-btn',

					16 => '.main-menu.menu > li.menu-term-%%id%% > a > .better-custom-badge',

					17 => '.bs-popular-categories .bs-popular-term-item.term-item-%%id%%:hover .term-count',

					18 => '.bs-slider-2-item.main-term-%%id%% .term-badges.floated .term-badge a',
					19 => '.bs-slider-3-item.main-term-%%id%% .term-badges.floated .term-badge a',
					20 => '.bs-slider-2-item.main-term-%%id%% .content-container a.read-more:hover',
					21 => '.bs-slider-3-item.main-term-%%id%% .content-container a.read-more:hover',
					// 22 is reserved
					// 23 is reserved
					// 24 is reserved
					// 25 is reserved
					// 26 is reserved
					27 => '.listing-item.main-term-%%id%% .post-count-badge.pcb-t1.pcb-s1',
				),
			'prop'     =>
				array(
					'background-color' => '%%value%% !important; color: #fff;',
				),
		),
	'border_top_color' =>
		array(
			'selector' =>
				array(
					0 => '.main-menu.menu > li.menu-term-%%id%% > a > .better-custom-badge:after',
				),
			'prop'     =>
				array(
					'border-top-color' => '%%value%% !important',
				),
		),
	'border_color'     =>
		array(
			'selector' =>
				array(
					0 => '.listing-item-text-2.main-term-%%id%%:hover .item-inner',

					1 => '.bs-pagination.main-term-%%id%% .btn-bs-pagination:hover',
					6 => '.bs-pagination.main-term-%%id%% .btn-bs-pagination.bs-pagination-in-loading',

					5 => '.bs-slider-controls.main-term-%%id%% .btn-bs-pagination:hover',

					3 => '.bs-slider-2-item.main-term-%%id%% .content-container a.read-more',
					4 => '.bs-slider-3-item.main-term-%%id%% .content-container a.read-more',

					// 5 is reserved
					// 6 is reserved
				),
			'prop'     =>
				array(
					'border-color' => '%%value%% !important',
				),
		),
	'selection'        =>
		array(
			'selector' =>
				array(
					0 => 'body.category-%%id%% ::selection',
				),
			'prop'     =>
				array(
					'background' => '%%value%% !important',
				),
		),
	'selection_moz'    =>
		array(
			'selector' =>
				array(
					0 => 'body.category-%%id%% ::-moz-selection',
				),
			'prop'     =>
				array(
					'background' => '%%value%% !important',
				),
		),
	'reviews_bg_color' =>
		array(
			'selector' =>
				array(
					0 => '.listing-item.main-term-%%id%% .rating-bar span'
				),
			'prop'     => 'background-color',
		),
	'reviews_color'    =>
		array(
			'selector' =>
				array(
					0 => '.listing-item.main-term-%%id%% .rating-stars span:before'
				),
			'prop'     => 'color',
		),
	'text_badges'      =>
		array(
			'selector' =>
				array(
					0 => '.term-badges.text-badges .term-badge.term-%%id%% a'
				),
			'prop'     =>
				array(
					'color' => '%%value%% !important; background-color: transparent !important',
				),
		),
	'callback'         => array(
		'fun'  => 'publisher_cb_css_generator_section_heading',
		'args' => array(
			'type' => 'term_color'
		),
	)
);
