<?php

$css_id = $this->get_css_id();

/**
 * => Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Trending Icon Color
$theme_color['color']['selector'][] = '.wpb_wrapper .better-newsticker .heading:before';

$theme_color['border_color']['selector'][] = '.bs-listing-listing-blog-1 .listing-item-blog.listing-item-blog-1';

// Search Icon Color
unset( $fields['header_menu_text_h_color']['css'][0]['selector'][1] );
unset( $theme_color['color']['selector'][27] );
unset( $theme_color['color']['selector'][28] );

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

