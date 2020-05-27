<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Normal BG Color for pagination button
$theme_color['bg_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination';

// Remove current color
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );

// BG Color for hover and active
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .wp-pagenavi a:hover';
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination a.page-numbers:hover';
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .wp-pagenavi .current';
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .current';

//
// Archive page title
//
$theme_color['bg_color']['selector'][] = '.archive-title .pre-title:after';
$theme_color['bg_color']['selector'][] = '.archive-title .pre-title span';
$theme_color['color']['selector'][]    = '.archive-title .rss-link';

//
// Color of post category and tags
//
$theme_color['bg_color']['selector'][]     = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';
$theme_color['border_color']['selector'][] = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';


//
// Color of "no color" social counter as theme color
//
$theme_color['bg_color_ni']['selector'][] = '.not-colored.better-social-counter.style-modern .item-icon';
$theme_color['bg_color_ni']['selector'][] = '.not-colored.better-social-counter.style-style-6 .item-icon';
$theme_color['bg_color_ni']['selector'][] = '.not-colored.better-social-counter.style-big-button .social-item';
$theme_color['bg_color_ni']['selector'][] = '.not-colored.better-social-counter.style-box .item-icon';
$theme_color['bg_color_ni']['selector'][] = '.not-colored.better-social-counter.style-button .item-icon';
$theme_color['bg_color_ni']['selector'][] = '.not-colored.better-social-counter.style-clean .item-icon';

//
// Mobile menu bg to main color
//
$theme_color['bg_color']['selector'][] = '.rh-header .rh-container';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

