<?php
/**
 * Header social icons template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// Needs Better Social Counter plugin
if ( ! class_exists( 'Better_Social_Counter_Shortcode' ) ) {
	return;
}

// active topbar icons
$icons = publisher_get_option( 'topbar_socials' );

// make string for shortcode
if ( is_array( $icons ) ) {
	$_icons = array();

	foreach ( (array) $icons as $icon_key => $icon ) {
		if ( $icon ) {
			$_icons[ $icon_key ] = $icon_key;
		}
	}

	$icons = implode( ',', $_icons );
}

echo do_shortcode( "[better-social-counter show_title='0' style='button' colored='0' order='{$icons}']" ); // escaped before
