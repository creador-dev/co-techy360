<?php
/**
 * menu.php
 *---------------------------
 * Registers options for menus
 *
 */

add_filter( 'better-framework/menu/options', 'publisher_menu_options', 100 );

if ( ! function_exists( 'publisher_menu_options' ) ) {
	/**
	 * Filter callback: Custom menu fields
	 */
	function publisher_menu_options( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/menu-fields.php';

		return $fields;

	}
}


add_filter( 'better-framework/menu/std', 'publisher_menu_std', 100 );

if ( ! function_exists( 'publisher_menu_std' ) ) {
	/**
	 * Filter callback: Custom menu std
	 */
	function publisher_menu_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/menu-std.php';

		return $fields;

	}
}
