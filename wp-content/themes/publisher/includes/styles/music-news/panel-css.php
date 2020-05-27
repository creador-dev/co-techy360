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

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

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
