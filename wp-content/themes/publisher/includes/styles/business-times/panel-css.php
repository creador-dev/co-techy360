<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Main  Menu
unset( $theme_color['bg_color']['selector'][31] );
unset( $theme_color['bg_color']['selector'][32] );
unset( $theme_color['bg_color']['selector'][33] );
unset( $theme_color['bg_color']['selector'][51] );
//
unset( $theme_color['bg_color']['selector'][74] );

// Pagination
unset( $theme_color['color']['selector'][27] );
unset( $theme_color['color']['selector'][28] );

// Newsletter
unset( $theme_color['bg_color']['selector'][43] );
unset( $theme_color['border_left_color']['selector'][0] );

//
$theme_color['color']['selector'][]            = '.about-text a';
$theme_color['border_top_color']['selector'][] = '.site-footer';

// Newsletter
$theme_color['bg_color']['selector'][] = '.bs-newsletter-pack.bsnp-t1.bsnp-s4:before';
$theme_color['bg_color']['selector'][] = '.bs-newsletter-pack.bsnp-t1.bsnp-s4 .bsnp-button';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
