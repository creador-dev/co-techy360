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
$theme_color['bg_color']['selector'][]             = '.footer-widgets.light-text .section-heading.sh-t5 .h-text:last-child:first-child:before';
$theme_color['header_menu_bg_color']['selector'][] = '';

$theme_color['bg_color']['selector'][]             = '.listing .listing-item .item-inner .post-count-badge.pcb-t1.pcb-s1';

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