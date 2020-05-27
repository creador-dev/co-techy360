<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Current Menu Link
$theme_color['color']['selector'][] = '.main-menu.menu > li.current-menu-parent > a, .main-menu.menu > li.current-menu-item > a';


// search-handler
unset( $theme_color['color']['selector'][27] );

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Title Hover Color Unset Array
unset( $theme_color['color']['selector'][33] );
unset( $theme_color['color']['selector'][34] );
unset( $theme_color['color']['selector'][35] );
unset( $theme_color['color']['selector'][66] );


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

