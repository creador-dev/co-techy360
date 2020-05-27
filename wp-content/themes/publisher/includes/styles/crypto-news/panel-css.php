<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );

// Color of post category and tags
unset( $theme_color['color']['selector'][45] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .current';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination a:hover';
$theme_color['border_color']['selector'][] = 'body .pagination.bs-numbered-pagination .current';
$theme_color['border_color']['selector'][] = 'body .pagination.bs-numbered-pagination a.page-numbers:hover';
// Footer Line Top Color
$theme_color['border_color']['selector'][] = '.site-footer';

// Footer Line Top Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

