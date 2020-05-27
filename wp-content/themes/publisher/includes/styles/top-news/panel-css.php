<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

//
// Remove current color
//
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );


//
// Newsticker color
//
$theme_color['color']['selector'][]    = '.wpb_wrapper .better-newsticker .heading';
$theme_color['bg_color']['selector'][] = '.better-newsticker .heading:after';
$theme_color['bg_color']['selector'][] = '.better-newsticker .heading:before';

//
// Save
//
$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory


$header_bs_css = $fields['header_bg_color']['css'];

//
// Make Footer bar color like header color
//
$header_bs_css[0]['selector'][] = '.site-footer .copy-footer .container > .row:first-child ';

//
// Mobile menu bg to header color
//
$header_bs_css[0]['selector'][] = '.rh-header .rh-container';

//
// save
//
$fields['header_bg_color'][ $css_id ] = $header_bs_css;
