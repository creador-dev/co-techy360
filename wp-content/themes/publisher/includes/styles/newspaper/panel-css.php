<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

unset( $theme_color['bg_color']['selector'][31] );
unset( $theme_color['bg_color']['selector'][32] );
unset( $theme_color['bg_color']['selector'][33] );
//
unset( $theme_color['bg_color']['selector'][74] );

$theme_color['color']['selector'][] = '.about-text a';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
