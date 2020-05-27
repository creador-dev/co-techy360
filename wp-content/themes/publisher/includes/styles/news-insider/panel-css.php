<?php

$css_id = $this->get_css_id();

/**
 * => Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// About Us Social Icon Color On Hover
$theme_color['color']['selector'][] = '.about-icons-list .about-icon-item a:hover';

$theme_color['border_color']['selector'][] = '.bs-listing-listing-blog-1 .listing-item-blog.listing-item-blog-1';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

