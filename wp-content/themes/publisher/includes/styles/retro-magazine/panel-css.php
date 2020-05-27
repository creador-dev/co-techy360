<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Main Menu BG Color
$theme_color['color']['selector'][] = '.site-header .main-menu > li.current-menu-item > a';

$theme_color[] = array(
	'selector' =>
		array(
			0 => '.site-header.site-header li > a > .better-custom-badge:after',
		),
	'prop'     =>
		array(
			'border-bottom-color' => '%%value%%',
		),
);


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory


/**
 * -> Topbar Colors
 */
$fields['topbar_bg_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.site-header .topbar',
			'.bs-slider-dots .bs-slider-active > .bts-bs-dots-btn',
			'.pagination.bs-numbered-pagination .current',
			'.pagination.bs-numbered-pagination a:hover',
			'.single-post-share .social-item a',
			'.post-share .post-share-btn-group .post-share-btn:before',
		),
		'prop'     => array(
			'background-color' => '%%value%% !important'
		)
	),
	array(
		'selector' => array(
			'.entry-terms.via .terms-label',
			'.entry-terms.source .terms-label',
			'.entry-terms.post-tags .terms-label',
			'.entry-terms.via a',
			'.entry-terms.source a',
			'.entry-terms.post-tags a',
			'.single-post-share .post-share-btn',
			'.post-related',
			'.single-container > .post-author',
			'.pagination.bs-numbered-pagination .page-numbers',
		),
		'prop'     => array(
			'border-color' => '%%value%% !important',
			'color'        => '%%value%% !important'
		)
	),
	array(
		'selector' => array(
			'.sidebar-column .sidebar',
			'.bs-newsletter-pack + .next-prev-post',
			'.post-author + .next-prev-post',
			'.comments-template',
			'body.single .content-column > .bs-newsletter-pack',
			'.bs-newsletter-pack.bsnp-t1.bsnp-s9 input.bsnp-input',
		),
		'prop'     => array(
			'border-color' => '%%value%% !important',
		)
	),
	array(
		'selector' => array(
			'.post-share .share-handler:before',
		),
		'prop'     => array(
			'border-left-color' => '%%value%% !important',
		)
	),
);


$fields['site_bg_color_2'][ $css_id ]    = $fields['site_bg_color_2']['css'];
$fields['site_bg_color_2'][ $css_id ][1] = array(
	'selector' =>
		array(
			0 => 'body',
		),
	'prop'     =>
		array(
			'background-color' => '%%value%%',
		),
	'before'   => '@media (max-width: 767px){',
	'after'    => '}',
);

/**
 * -> Background Color 2
 */
$fields['site_bg_color_2'][ $css_id ] = array(
	array(
		'selector' => array(
			'html',
			'.section-heading.sh-t1 .h-text',
			'.section-heading.sh-t3.sh-s8 > .h-text',
			'.site-header.header-style-1 .main-menu-wrapper .main-menu-container',
			'.section-heading.sh-t3.sh-s8 >.main-link > .h-text:before, .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before, .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before, .section-heading.sh-t3.sh-s8 > .main-link > .h-text:after, .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after, .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after',
			'.pagination.bs-numbered-pagination .page-numbers.dots:hover, .pagination.bs-numbered-pagination .page-numbers, .pagination.bs-numbered-pagination span, .pagination.bs-numbered-pagination .wp-pagenavi a, .pagination.bs-numbered-pagination .wp-pagenavi span',
			'.entry-terms.via .terms-label',
			'.entry-terms.source .terms-label',
			'.entry-terms.post-tags .terms-label',
		),
		'prop'     => array(
			'background-color' => '%%value%% !important'
		)
	),
	array(
		'selector' => array(
			'.post-share .share-handler:after',
		),
		'prop'     => array(
			'border-left-color' => '%%value%% !important'
		)
	),
);


/**
 * -> Background Image 2
 */
$fields['site_bg_image_2'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => 'html',
							1 => '.section-heading.sh-t3.sh-s8 > .h-text',
							2 => '.site-header.header-style-1 .main-menu-wrapper.menu-actions-btn-width-1 .main-menu-container',
							3 => '.section-heading.sh-t3.sh-s8 >.main-link > .h-text:before, .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before, .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before, .section-heading.sh-t3.sh-s8 > .main-link > .h-text:after, .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after, .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after',
							4 => '.section-heading.sh-t1 .h-text',
							5 => '.pagination.bs-numbered-pagination .page-numbers.dots:hover, .pagination.bs-numbered-pagination .page-numbers, .pagination.bs-numbered-pagination span, .pagination.bs-numbered-pagination .wp-pagenavi a, .pagination.bs-numbered-pagination .wp-pagenavi span',
							6 => '.entry-terms.via .terms-label',
							7 => '.entry-terms.source .terms-label',
							8 => '.entry-terms.post-tags .terms-label',
						),
					'prop'     =>
						array(
							0 => 'background-image',
						),
					'type'     => 'background-image',
				),
		),
);
