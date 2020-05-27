<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );

// RSS Color
$theme_color['color']['selector'][] = 'body .main-menu.main-menu > .current-menu-item > a';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

