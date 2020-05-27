<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// BG Color for hover and active Pagination
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .current';
$theme_color['color']['selector'][]        = '.pagination.bs-numbered-pagination .current';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .current, .pagination.bs-numbered-pagination .current:hover , .bs-listing .bs-pagination .pagination.bs-numbered-pagination a.page-numbers:hover';

// Footer border top color
$theme_color['border_top_color']['selector'][] = '.site-footer';

// Archive RSS icon color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Color of post category and tags
$theme_color['bg_color']['selector'][]     = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';
$theme_color['border_color']['selector'][] = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
