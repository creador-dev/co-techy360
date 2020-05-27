<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

unset( $theme_color['color']['selector'][51] ); // menu hover color
$theme_color['bg_color']['selector'][] = '.listing-item.listing-item-tb-2 .term-badges.floated .term-badge a';

$fields['theme_color'][ $css_id ] = $theme_color;

unset( $theme_color );
