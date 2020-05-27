<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color_css = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Archive heading
$theme_color_css['bg_color']['selector'][] = '.archive-title .pre-title span';
$theme_color_css['bg_color']['selector'][] = '.archive-title .pre-title:after';


// Comment Awaiting color fix
unset( $theme_color_css['color']['selector'][65] );
$theme_color_css['bg_color']['selector'][] = '.comment-list .comment-content em.needs-approve';


// Header border top color on scroll when border top line is not active!
$theme_color_css['c_border_top_color'] = array(
	'selector' => array(
		'.header-style-1.full-width .bs-pinning-block.pinned.main-menu-wrapper',
		'.header-style-1.boxed .bs-pinning-block.pinned .main-menu-container',
		'.header-style-2.full-width .bs-pinning-block.pinned.main-menu-wrapper',
		'.header-style-2.boxed .bs-pinning-block.pinned .main-menu-container',
		'.header-style-3.full-width .bs-pinning-block.pinned.main-menu-wrapper',
		'.header-style-3.boxed .bs-pinning-block.pinned .main-menu-container',
		'.header-style-4.full-width .bs-pinning-block.pinned.main-menu-wrapper',
		'.header-style-4.boxed .bs-pinning-block.pinned .main-menu-container',
		'.header-style-5.full-width .bspw-header-style-5 .bs-pinning-block.pinned',
		'.header-style-5.boxed .bspw-header-style-5 .bs-pinning-block.pinned .header-inner',
		'.header-style-6.full-width .bspw-header-style-6 .bs-pinning-block.pinned',
		'.header-style-6.boxed .bspw-header-style-6 .bs-pinning-block.pinned .header-inner',
		'.header-style-7.full-width .bs-pinning-block.pinned.main-menu-wrapper',
		'.header-style-7.boxed .bs-pinning-block.pinned .main-menu-container',
		'.header-style-8.full-width .bspw-header-style-8 .bs-pinning-block.pinned',
		'.header-style-8.boxed .bspw-header-style-8 .bs-pinning-block.pinned .header-inner',
	),
	'prop'     => array(
		'border-top' => '3px solid %%value%%'
	)
);


// Numbered paginations color
unset( $theme_color_css['color']['selector'][41] );
$theme_color_css['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .page-numbers.current';

$fields['theme_color'][ $css_id ] = $theme_color_css;
unset( $theme_color_css );

$fields['site_bg_color'][ $css_id ]   = $fields['site_bg_color']['css'];
$fields['site_bg_color'][ $css_id ][] = array(
	'selector' => array(
		'body',
		'body.boxed',
		'.page-layout-2-col-right .post-tp-7-header .post-header-title',
		// Sections headings fix
		'.section-heading.sh-t1 .other-link .h-text,
.section-heading.sh-t1 .h-text,
.section-heading.sh-t3.sh-s8 >.main-link > .h-text:before,
.section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before,
.section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before,
.section-heading.sh-t3.sh-s8 > .main-link > .h-text:after,
.section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after,
.section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after,
.section-heading.sh-t3.sh-s8.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text,
.section-heading.sh-t3.sh-s8 > a > .h-text, .section-heading.sh-t3.sh-s8 > .h-text,
.section-heading.sh-t3.sh-s8.multi-tab .bs-pretty-tabs-container,
.section-heading.sh-t3 .bs-pretty-tabs-container .bs-pretty-tabs-elements,
.section-heading.sh-t4.sh-s3 .h-text:after,
.section-heading.sh-t4.sh-s1 .h-text:after,
.section-heading.multi-tab.sh-t4 > a > .h-text,
.section-heading.multi-tab.sh-t4 > .h-text,
.section-heading.multi-tab.sh-t4.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text,
.bs-pretty-tabs-container .bs-pretty-tabs-elements,
.section-heading.multi-tab.sh-t4.bs-pretty-tabs .bs-pretty-tabs-more.other-link:hover .h-text,
.section-heading.sh-t6.sh-s2.bs-pretty-tabs .bs-pretty-tabs-more.other-link .h-text,
.section-heading.sh-t6.sh-s2 .other-link .h-text,
.section-heading.sh-t6.sh-s7 > .main-link > .h-text:after,
.section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:after,
.section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:after,
.section-heading.sh-t6.sh-s6 > .main-link > .h-text:after,
.section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:after,
.section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:after'
	),
	'prop'     => array(
		'background-color' => '%%value%%'
	),
);

$fields['site_bg_color'][ $css_id ][] = array(
	'selector' => array(
		'.section-heading.sh-t6.sh-s7 > .main-link > .h-text:before,
.section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before,
.section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before,
.section-heading.sh-t6.sh-s6 > .main-link > .h-text:before,
.section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:before,
.section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:before,
.section-heading.sh-t6.sh-s5 > .main-link > .h-text:before,
.section-heading.sh-t6.sh-s5 > a:last-child:first-child > .h-text:before,
.section-heading.sh-t6.sh-s5 > .h-text:last-child:first-child:before'
	),
	'prop'     => array(
		'border-top-color' => '%%value%%'
	),
);


$fields['site_bg_color'][ $css_id ][] = array(
	'selector' => array(
		'.section-heading.sh-t6.sh-s7 > .main-link > .h-text:before,
.section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before,
.section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before'
	),
	'prop'     => array(
		'border-bottom-color' => '%%value%%'
	),
);

$fields['site_bg_color'][ $css_id ][] = array(
	'selector' => array(
		'.ltr .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after,
.ltr .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after,
.ltr .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after'
	),
	'prop'     => array(
		'border-right-color' => '%%value%%'
	),
);

$fields['site_bg_color'][ $css_id ][] = array(
	'selector' => array(
		'.rtl .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after,
.rtl .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after,
.rtl .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after'
	),
	'prop'     => array(
		'border-left-color' => '%%value%%'
	),
);


// Full BG color for Topbar
$fields['topbar_bg_color'][ $css_id ] = array(
	array(
		'selector' =>
			array(
				0 => '.site-header .topbar',
			),
		'prop'     =>
			array(
				'background-color' => '%%value%%',
			),
	),
);
