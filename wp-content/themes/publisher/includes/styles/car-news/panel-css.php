<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );
unset( $theme_color['color']['selector'][28] );
unset( $theme_color['color']['selector'][43] );

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Pagination
$theme_color['bg_color']['selector'][]     = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination';
$theme_color['border_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination';

// Term Badge Single Page
$theme_color['bg_color']['selector'][]     = '.post-tp-1-header .term-badges .term-badge:first-child a';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory