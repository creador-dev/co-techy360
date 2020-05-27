<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


new Publisher_Theme_Gallery_Slider();


/**
 * Publisher Gallery Slider
 *
 * WordPress gallery wrapper for adding advanced gallery slider.
 *
 * @package  Publisher Gallery Slider
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.2.0
 * @access   public
 * @see      http://www.betterstudio.com
 */
class Publisher_Theme_Gallery_Slider {

	function __construct() {

		// Extends gallery fields
		add_action( 'print_media_templates', array( $this, 'extend_gallery_settings' ), 100 );

		// Wrapper for change gallery output
		add_filter( 'post_gallery', array( $this, 'extend_gallery_shortcode' ), 10, 4 );

	}


	/**
	 * Extends gallery fields and add new ones for better gallery slider
	 */
	function extend_gallery_settings() {

		publisher_get_view( 'shortcodes', 'bs-image-gallery-admin' );
	} // extend_gallery_settings


	/**
	 * Extends gallery fields
	 *
	 * @param string $output - is empty !!!
	 * @param        $atts
	 * @param bool   $content
	 * @param bool   $tag
	 *
	 * @return mixed
	 */
	function extend_gallery_shortcode( $output = '', $atts, $content = false, $tag = false ) {

		// Don't convert to custom gallery in FIA
		if ( bf_is_fia() ) {
			return $output;
		}

		if ( ! is_feed() && isset( $atts['bgs_gallery_type'] ) && $atts['bgs_gallery_type'] == 'slider' ) {

			publisher_set_prop( 'shortcode-bs-image-gallery-1', $atts );

			$new_output = publisher_get_view( 'shortcodes', 'bs-image-gallery-1', '', false );

			if ( ! empty( $new_output ) ) {
				return $new_output;
			}

		}

		return $output;
	} // extend_gallery_shortcode


	/**
	 * Used for retrieving full information of attachment
	 *
	 * @param int|WP_Post $post
	 * @param string      $size
	 *
	 * @return array
	 */
	public static function get_attachment_full_info( $post, $size = 'full' ) {

		if ( ! $post instanceof WP_Post ) {
			$post = get_post( $post );
		}

		$data = self::get_attachment_src( $post->ID, $size );

		return array(
			'alt'         => get_post_meta( $post->ID, '_wp_attachment_image_alt', true ),
			'caption'     => $post->post_excerpt,
			'description' => $post->post_content,
			'href'        => get_permalink( $post->ID ),
			'src'         => $data['src'],
			'title'       => $post->post_title,
			'width'       => $data['width'],
			'height'      => $data['height']
		);

	} // get_attachment_full_info


	/**
	 * Safe wrapper for getting an attachment image url + size information.
	 *
	 * @param        $id
	 * @param string $size
	 *
	 * @return mixed
	 */
	public static function get_attachment_src( $id, $size = 'full' ) {

		$image_src_array = wp_get_attachment_image_src( $id, $size );

		$data = array();

		if ( empty( $image_src_array[0] ) ) {
			$data['src'] = '';
		} else {
			$data['src'] = $image_src_array[0];
		}

		if ( empty( $image_src_array[1] ) ) {
			$data['width'] = '';
		} else {
			$data['width'] = $image_src_array[1];
		}

		if ( empty( $image_src_array[2] ) ) {
			$data['height'] = '';
		} else {
			$data['height'] = $image_src_array[2];
		}

		return $data;
	} // get_attachment_src

} // Publisher_Theme_Gallery_Slider
