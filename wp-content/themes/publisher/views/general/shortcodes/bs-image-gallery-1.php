<?php
/**
 * The template to show posts image gallery
 *
 * [bs-image-gallery-1] & [gallery] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.1.0
 */

$atts = publisher_get_prop( 'shortcode-bs-image-gallery-1' );

// Slider title
if ( isset( $atts['bgs_gallery_title'] ) ) {
	$slider_title = $atts['bgs_gallery_title'];
} else {
	$slider_title = '';
}

$id = get_the_ID();

$inc = 'incl' . 'ude';
if ( ! empty( $atts[ $inc ] ) ) {

	$_attachments = get_posts( array(
		$inc             => $atts[ $inc ],
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'orderby'        => 'post__in'
	) );

	$image_ids = array();

	foreach ( $_attachments as $key => $val ) {
		$image_ids[ $val->ID ] = $_attachments[ $key ];
	}

} elseif ( ! empty( $atts['exclude'] ) ) {

	$image_ids = get_children( array(
		'post_parent'    => $id,
		'exclude'        => $atts['exclude'],
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'orderby'        => 'post__in'
	) );

} else {

	$image_ids = get_children( array(
		'post_parent'    => $id,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

}

// Check for valid images
// TODO: Check Logic of the condition statement
if ( bf_count( $image_ids ) == 1 and ! is_numeric( $image_ids[0] ) ) {
	return '';
}

$gallery_popup_id  = mt_rand();
$js_gallery_images = array();
$js_gallery_descs  = array();

$gallery_class = '';

$image_size           = ! empty( $atts['bgs_gallery_image_size'] ) ? $atts['bgs_gallery_image_size'] : 'publisher-lg';
$thumbnail_image_size = 'thumbnail';

if ( $image_size === 'small' ) {
	$image_size = 'publisher-sm';
}

if ( $image_size == 'full' ) {
	$thumbnail_image_size = 'full';
}

//
// Title output
//
{
	$title = '<div class="gallery-title clearfix">';

	if ( ! empty( $slider_title ) ) {
		$title .= '<h3 class="main-title">' . wp_kses( $slider_title, bf_trans_allowed_html() ) . '</h3>';
	}

	$title .= '    <span class="prev"><i class="fa fa-angle-' . ( is_rtl() ? 'right' : 'left' ) . '"></i> ' . publisher_translation_get( 'bs_pagin_prev' ) . '</span>
                    <span class="count">' . sprintf( publisher_translation_get( 'bs_pagin_pages_label' ), '<i class="current">1</i>', '<i class="total">' . bf_count( $image_ids ) . '</i>' ) . '</span>
                    <span class="next">' . publisher_translation_get( 'bs_pagin_next' ) . ' <i class="fa fa-angle-' . ( is_rtl() ? 'left' : 'right' ) . '"></i></span>
                ';
	$title .= '</div>';
}


$new_output = '<div class="better-gallery-container"><div id="gallery-' . esc_attr( $gallery_popup_id ) . '" class="better-gallery ' . esc_attr( $gallery_class ) . ' better-gallery-img-' . $image_size . '" data-gallery-id="' . esc_attr( $gallery_popup_id ) . '">';

if ( ! empty( $slider_title ) ) {
	$new_output .= $title;
}

$new_output .= ' <div class="fotorama" data-nav="thumbs" data-auto="false" data-ratio="16/7">';

foreach ( $image_ids as $key => $image_post ) {

	if ( is_a( $image_post, 'WP_Post' ) ) {
		$image_id = $image_post->ID;
	} else {
		$image_id = $image_post;
	}

	$image = Publisher_Theme_Gallery_Slider::get_attachment_full_info( $image_post, $image_size );

	$image_full = Publisher_Theme_Gallery_Slider::get_attachment_src( $image_id, 'full' );

	$image_thumb = Publisher_Theme_Gallery_Slider::get_attachment_src( $image_id, $thumbnail_image_size );

	$alt = '';

	if ( ! empty( $image['alt'] ) ) {
		$alt = $image['alt'];
	}

	$new_output .= '<div data-thumb="' . esc_attr( $image_thumb['src'] ) . '">
                        <a href="' . esc_url( $image_full['src'] ) . '" class="slide-link" data-not-rel="true">
                            <img ' . ( ! empty( $alt ) ? 'alt="' . $alt . '"' : '' ) . ' data-id="' . esc_attr( $key ) . '" src="' . esc_url( $image['src'] ) . '">
                        </a>
                    <div class="slide-title-wrap">';

	if ( ! empty( $image['caption'] ) ) {
		$new_output .= '<span class="slide-title">' . esc_html( $image['caption'] ) . '</span>';
	}


	$new_output .= '</div></div>';

	$js_gallery_images[] = $image_full['src'];
	$js_gallery_descs[]  = $image['caption'];

}

$new_output .= '</div>';

if ( empty( $slider_title ) ) {
	$new_output .= $title;
}

$new_output .= '</div>';


$new_output .= "<script>";
$new_output .= 'var prt_gal_img_' . $gallery_popup_id . " = " . json_encode( $js_gallery_images ) . "; ";
$new_output .= 'var prt_gal_cap_' . $gallery_popup_id . " = " . json_encode( $js_gallery_descs ) . "; ";
$new_output .= "</script>";
$new_output .= '</div>';

echo $new_output;
