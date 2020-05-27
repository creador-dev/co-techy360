<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Remove current color
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );


// BG Color for hover and active
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .wp-pagenavi a:hover';
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination a.page-numbers:hover';
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .wp-pagenavi .current';
$theme_color['bg_color']['selector'][] = '.pagination.bs-numbered-pagination .current';


//
// Archive Heading color
//
{
	$theme_color['bg_color']['selector'][] = '.archive-title .pre-title span';
	$theme_color['bg_color']['selector'][] = '.archive-title .pre-title:after';
	$theme_color['color']['selector'][]    = '.archive-title .pre-title:after';
	$theme_color['color']['selector'][]    = '.archive-title .rss-link';
	$theme_color['color']['selector'][]    = '.archive-title .page-heading .h-title';
}

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
