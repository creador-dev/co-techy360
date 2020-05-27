<?php
/**
 * metabox.php
 *---------------------------
 * Registers options for posts and pages
 *
 */


add_filter( 'better-framework/metabox/add', 'publisher_metabox_add', 5 );

if ( ! function_exists( 'publisher_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_metabox_add( $metabox ) {

		$metabox['better_post_options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
			'css'      => true,
		);

		return $metabox;
	}
}


add_filter( 'better-framework/metabox/better_post_options/config', 'publisher_metabox_config', 5 );

if ( ! function_exists( 'publisher_metabox_config' ) ) {
	/**
	 * Configs custom metabox
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_metabox_config( $config ) {

		//
		// Support custom post types
		//
		$pages = array( 'post', 'page' );
		if ( publisher_get_option( 'advanced_post_options_types' ) != '' ) {
			$pages = array_merge( explode( ',', publisher_get_option( 'advanced_post_options_types' ) ), $pages );
		}

		$title = bf_get_admin_current_post_type() == 'page' ? __( '%s Page Options', 'publisher' ) : __( '%s Post Options', 'publisher' );

		return array(
			'title'    => sprintf( $title, publisher_white_label_get_option( 'publisher' ) ),
			'pages'    => $pages,
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);
	} // publisher_metabox_config
} // if


add_filter( 'better-framework/metabox/better_post_options/std', 'publisher_metabox_std', 5 );

if ( ! function_exists( 'publisher_metabox_std' ) ) {
	/**
	 * Configs metabox STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_metabox_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/metabox-std.php';

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_post_options/fields', 'publisher_metabox_fields', 5 );

if ( ! function_exists( 'publisher_metabox_fields' ) ) {
	/**
	 * Configs metabox fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_metabox_fields( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/metabox-fields.php';

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_post_options/css', 'publisher_metabox_css', 5 );

if ( ! function_exists( 'publisher_metabox_css' ) ) {
	/**
	 * Configs metabox CSS
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_metabox_css( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/metabox-css.php';

		return $fields;
	}
}
