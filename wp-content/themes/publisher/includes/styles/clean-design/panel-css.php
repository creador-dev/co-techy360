<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

$theme_color['bg_color']['selector'][]   = '.listing-item.listing-item-tb-2 .term-badges.floated .term-badge a';
$theme_color['bg_color']['selector'][]   = '.entry-terms.entry-terms .terms-label';
$theme_color['bg_color']['selector'][56] = '.bs-slider-2-item .content-container a.read-more';
$theme_color['bg_color']['selector'][57] = '.bs-slider-3-item .content-container a.read-more';
$fields['theme_color'][ $css_id ]        = $theme_color;
unset( $theme_color ); // clean memory

$fields['site_bg_color']['css-echo-default'] = true;

$fields['site_bg_color'][ $css_id ]                  = $fields['site_bg_color']['css'];
$fields['site_bg_color'][ $css_id ][0]['selector'][] = 'body.full-width .post-tp-7-header.wfi .post-header-title';
$fields['site_bg_color'][ $css_id ][]                = array(
	'selector' => array(
		'.page-title .post-title',
	),
	'prop'     => array(
		'border-color' => '%%value%%'
	),
);

unset( $css_id );