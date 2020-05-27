<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );
unset( $theme_color['color']['selector'][28] );
unset( $theme_color['color']['selector'][43] );

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';
$theme_color['bg_color']['selector'][] = '.bs-box-3 .box-text';

// Pagination
$theme_color[] = array(
	'selector' =>
		array(
			0 => '.pagination.bs-numbered-pagination .wp-pagenavi a:hover',
			1 => '.pagination.bs-numbered-pagination .page-numbers:hover',
			2 => '.pagination.bs-numbered-pagination .wp-pagenavi .current',
			3 => '.pagination.bs-numbered-pagination .current',
		),
	'prop'     =>
		array(
			'background-color' => '%%value%%',
		),
);


$theme_color[] = array(
	'selector' =>
		array(
			0 => '.site-header.header-style-2 .main-menu-wrapper .main-menu-container',
		),
	'prop'     =>
		array(
			'box-shadow' => '0 5px 0 0 %%value%%, 0 10px 17px -1px %%value%%',
		),
);


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

$fields['topbar_bg_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.site-header .topbar',
		    'body.boxed:before'
		),
		'prop'     => array(
			'background-color' => '%%value%% !important'
		)
	),
);

$fields['topbar_text_hcolor'][ $css_id ] = array(
	array(
		'selector' => array(
			'.top-menu.menu > li.current-menu-item a',
		),
		'prop'     => array(
			'color' => '%%value%% !important'
		)
	),
);