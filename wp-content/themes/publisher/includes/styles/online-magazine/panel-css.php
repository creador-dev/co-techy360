<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

/**
 * -> Topbar Colors
 */
unset( $theme_color['topbar_border_color']['css'][0]['selector'] );

$fields['topbar_border_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.topbar-style-1',
		),
		'prop'     => array(
			'border-color' => '%%value%%; border-bottom-style: solid; border-bottom-width: 1px;'
		)
	),
);

$theme_color['bg_color']['selector'][] = '.site-header.site-header .main-menu.menu > li.current-menu-item > a';
$theme_color['bg_color']['selector'][] = '.site-header.site-header .main-menu.menu > li:hover > a';
$theme_color['bg_color']['selector'][] = '.site-header.site-header .main-menu.menu > li.current-menu-parent > a';
$theme_color['bg_color']['selector'][] = '.site-header.site-header .main-menu.menu > li.current-post-ancestor > a';

// Search Icon Color
unset( $fields['header_menu_text_h_color']['css'][0]['selector'][1] );

/**
 * -> Mega Menu BG
 */
$theme_color['bg_color']['selector'][] = '.mega-menu.mega-type-link-list';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

