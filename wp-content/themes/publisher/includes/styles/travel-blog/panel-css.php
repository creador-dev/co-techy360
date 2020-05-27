<?php

$css_id = $this->get_css_id();

$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Social share button to theme color
$theme_color['bg_color_ni']['selector'][] = '.single-post-share .social-item.social-item a';

// Mobile menu bg to main color
$theme_color['bg_color']['selector'][] = '.rh-header .rh-container';

// Archive RSS icon color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// All headings typo to theme color
$theme_color['color']['selector'][] = '.heading-typo';

// Color of post category and tags
$theme_color['bg_color']['selector'][]     = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';
$theme_color['border_color']['selector'][] = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';

$theme_color['color']['selector'][]        = '.pagination.bs-numbered-pagination .page-numbers';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .page-numbers';

$theme_color['bg_color']['selector'][] = $theme_color['color']['selector'][42];
$theme_color['bg_color']['selector'][] = $theme_color['color']['selector'][43];
$theme_color['bg_color']['selector'][] = $theme_color['color']['selector'][44];
$theme_color['bg_color']['selector'][] = $theme_color['color']['selector'][45];

unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );

$fields['theme_color'][ $css_id ] = $theme_color;

unset( $theme_color );
