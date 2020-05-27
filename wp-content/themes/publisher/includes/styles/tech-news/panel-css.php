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
$theme_color['bg_color']['selector'][] = '.bs-box-3 .box-text';



// Pagination
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );

$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .current';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .current:hover';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .wp-pagenavi a:hover';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination a.page-numbers:hover';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .current';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .wp-pagenavi a:hover';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination a.page-numbers:hover';



$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
