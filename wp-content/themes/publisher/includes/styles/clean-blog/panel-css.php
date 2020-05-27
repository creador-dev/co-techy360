<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

$theme_color['bg_color']['selector'][]     = '.entry-terms.source .terms-label, .entry-terms.via .terms-label, .entry-terms.post-tags .terms-label';
$theme_color['border_color']['selector'][] = '.entry-terms.source .terms-label, .entry-terms.via .terms-label, .entry-terms.post-tags .terms-label';
$theme_color['bg_color']['selector'][]     = '.entry-terms.entry-terms .terms-label';

$theme_color['c_border_top_color']['selector'] = array(
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
);

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color );


/**
 * -> Topbar Colors
 */
$fields['topbar_bg_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.site-header .topbar',
		),
		'prop'     => array(
			'background-color' => '%%value%%'
		)
	),
);


/**
 * -> Heading
 */
$fields['widget_bg_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.sidebar-column .widget',
		),
		'prop'     => array(
			'background' => '%%value%%;'
		)
	),
);


/**
 * -> Readmore Button
 */
$fields['listings_readmore_color'][ $css_id ]                            = $fields['listings_readmore_color']['css'];
$fields['listings_readmore_color'][ $css_id ]['border']['prop']['color'] = '%%value%%';
