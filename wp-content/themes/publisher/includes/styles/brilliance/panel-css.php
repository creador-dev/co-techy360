<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Color of social share links in single
$theme_color['bg_color_ni']['selector'][] = '.single-post-share .social-item.social-item a';

// Color of post category and tags
$theme_color['bg_color']['selector'][]     = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';
$theme_color['border_color']['selector'][] = '.entry-terms.post-tags .terms-label, .entry-terms.source .terms-label, .entry-terms.via .terms-label';

// .search-handler
unset( $theme_color['color']['selector'][27] );

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
