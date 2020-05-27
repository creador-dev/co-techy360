<?php

$css_id = $this->get_css_id();

$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Archive RSS icon color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // memory cleanup

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
