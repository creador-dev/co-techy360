<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// Normal BG Color for pagination button
$theme_color['bg_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination';

// Remove current color
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );

// BG Color for hover and active
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .wp-pagenavi a:hover';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination a.page-numbers:hover';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .wp-pagenavi .current';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .current';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .page-numbers';
$theme_color['color']['selector'][]        = '.pagination.bs-numbered-pagination .page-numbers';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .current';
//$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .page-numbers';
//$theme_color['color']['selector'][] = '.pagination.bs-numbered-pagination .page-numbers';

// BG Color Button Newsletter
$theme_color['bg_color']['selector'][] = 'footer .bs-newsletter-pack.bsnp-t1.bsnp-s3 .bsnp-button, footer .bs-newsletter-pack.bsnp-t1.bsnp-s3 .bsnp-button:hover';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
