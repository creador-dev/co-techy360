<?php
/***
 *
 * Special CSS for TinyMCE editor
 *
 */

$output = '';

/***
 *
 * Custom CSS for page layout & default issue
 *
 */
if ( BF_Editor_Shortcodes::get_config( 'layouts', true ) && bf_get_post_meta( 'page_layout', $post_id ) == 'default' ) {

	if ( get_post_type( $post_id ) == 'page' ) {
		$layout = publisher_get_option( 'page_layout' );
	} else {
		$layout = publisher_get_option( 'post_layout' );
	}

	if ( $layout == 'default' ) {
		$layout = publisher_get_option( 'general_layout' );
	}


	$filename = "style-tinymce-{$layout}.css";

	if ( file_exists( $filename ) ) {

		ob_start();
		include $filename;
		$output .= ob_get_clean() . "\n\n";
	}
}


/***
 *
 * Style of the TinyMCE
 *
 */
{
	ob_start();
	include "style-tinymce.css";
	$output .= ob_get_clean() . "\n\n";
}

return $output;
