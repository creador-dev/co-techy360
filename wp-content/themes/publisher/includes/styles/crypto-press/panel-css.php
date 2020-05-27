<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Search Icon Color
unset( $theme_color['color']['selector'][27] );

// Pagination
$theme_color['border_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination:hover';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

