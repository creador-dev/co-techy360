<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );

// Pagination
$theme_color['border_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination:hover';

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

