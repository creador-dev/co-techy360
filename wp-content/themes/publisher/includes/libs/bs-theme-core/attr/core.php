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


if ( ! function_exists( 'publisher_attr' ) ) {
	/**
	 * Outputs an HTML element's attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $slug    Slug/ID of the element/tag
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return void
	 */
	function publisher_attr( $slug, $class = '', $context = '' ) {
		echo publisher_get_attr( $slug, $class, $context ); // escaped before
	}
}


if ( ! function_exists( 'publisher_get_attr' ) ) {
	/**
	 * Gets an HTML element's attributes.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @param   string $slug    Slug/ID of the element/tag
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return string
	 */
	function publisher_get_attr( $slug, $class = '', $context = '' ) {

		$output = '';

		$attributes = apply_filters( "publisher_attr_{$slug}", array(), $class, $context );

		if ( empty( $attributes ) ) {
			$attributes['class'] = $slug;
		}

		foreach ( $attributes as $attr_id => $attr ) {
			$output .= ! empty( $attr ) ? sprintf( ' %s="%s"', $attr_id, $attr ) : ' ' . $attr_id;
		}

		return trim( $output );
	}
}


if ( ! function_exists( 'publisher_attr_get_protocol' ) ) {
	/**
	 * Returns site protocol
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string
	 */
	function publisher_attr_get_protocol() {
		return is_ssl() ? 'https://' : 'http://';
	}
}
