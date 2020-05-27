<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

$theme_color['bg_color']['selector'][] = '.section-heading.sh-t2.sh-s4:after';
$theme_color['color']['selector'][]    = '.better-social-counter.style-style-10 .social-list .social-item .item-link .item-icon';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
