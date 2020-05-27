<?php

$css_id = $this->get_css_id();

/**
 * => Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

unset( $theme_color ); // clean memory