<?php

$css_id = $this->get_css_id();

/**
 * => Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// .search-handler
unset( $theme_color['color']['selector'][27] );
unset( $theme_color['color']['selector'][28] );

// Header
$theme_color['bg_color']['selector'][] = 'body .site-header .main-menu.menu > li.current-menu-item > a:before';
$theme_color['bg_color']['selector'][] = 'body .site-header .main-menu.menu > li > a:hover:before';

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

/**
 * -> Section Heading
 */
$fields['section_title_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.section-heading.sh-t7 > .h-text',
		),
		'prop'     => array(
			'color' => '%%value%% !important'
		)
	)
);

/**
 * -> Breadcrumb
 */
$fields['header_bg_color']['css'][0]['selector'][] = '.bf-breadcrumb';