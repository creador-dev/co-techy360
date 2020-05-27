<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// About Us BTN
$theme_color['bg_color']['selector'][] = '.site-footer .widget.widget_bs-about .about-link a:hover';

// search-handler
unset( $theme_color['color']['selector'][27] );

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// color text 3
$theme_color['bg_color']['selector'][] = '.listing-text-3 .listing-item-text-3 .item-inner:after';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

