<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Search Icon Color
unset( $theme_color['color']['selector'][27] );


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

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Section Heading Newsletter
$theme_color['bg_color']['selector'][] = '.bs-subscribe-newsletter .section-heading.sh-t1 .h-text:after';
$theme_color['bg_color']['selector'][] = '.widget_bs-subscribe-newsletter .section-heading.sh-t1 .h-text:after';

// About Social Icon
$theme_color['bg_color']['selector'][] = '.bs-about .about-icons-list .about-icon-item a ';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

