<?php
/**
 * user.php
 *---------------------------
 * Registers options for users
 *
 */


add_filter( 'better-framework/user-metabox/add', 'publisher_user_metabox_add', 100 );

if ( ! function_exists( 'publisher_user_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_user_metabox_add( $metabox ) {

		/**
		 * General Post Options
		 */
		$metabox['better_author_options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
		);

		return $metabox;
	}
}


add_filter( 'better-framework/user-metabox/better_author_options/config', 'publisher_user_metabox_config', 100 );

if ( ! function_exists( 'publisher_user_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_user_metabox_config( $config ) {

		return array(
			'title' => sprintf( __( '%s Author Options', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
		);
	} // publisher_user_metabox_config
} // if


add_filter( 'better-framework/user-metabox/better_author_options/std', 'publisher_user_metabox_std', 100 );

if ( ! function_exists( 'publisher_user_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_user_metabox_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/user-std.php';

		return $fields;
	}
}


add_filter( 'better-framework/user-metabox/better_author_options/fields', 'publisher_user_metabox_fields', 100 );

if ( ! function_exists( 'publisher_user_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_user_metabox_fields( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/user-fields.php';

		return $fields;
	}
}

