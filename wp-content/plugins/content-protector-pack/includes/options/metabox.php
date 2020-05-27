<?php
/**
 * metabox.php
 *---------------------------
 * Registers options for posts and pages
 *
 */

add_filter( 'better-framework/metabox/add', 'cpp_metabox_add', 5 );

if ( ! function_exists( 'cpp_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function cpp_metabox_add( $metabox ) {

		$metabox['cpp_post_options'] = array(
			'panel-id' => 'content-protector-pack',
			'css'      => TRUE,
		);

		return $metabox;
	}
}


add_filter( 'better-framework/metabox/cpp_post_options/config', 'cpp_metabox_config', 5 );

if ( ! function_exists( 'cpp_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function cpp_metabox_config( $config ) {

		//
		// Support custom post types
		//
		$pages = array_values( get_post_types( array(
			'public'             => TRUE,
			'publicly_queryable' => TRUE
		) ) );

		return array(
			'title'    => __( 'Content Protector Pack', 'content-protector-pack' ),
			'pages'    => $pages,
			'context'  => 'side',
			'prefix'   => FALSE,
			'priority' => 'low'
		);
	} // cpp_metabox_config
} // if


add_filter( 'better-framework/metabox/cpp_post_options/std', 'cpp_metabox_std', 5 );

if ( ! function_exists( 'cpp_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function cpp_metabox_std( $fields ) {

		include Content_Protector_Pack::dir_path( 'includes/options/metabox-std.php' );

		return $fields;
	}
}


add_filter( 'better-framework/metabox/cpp_post_options/fields', 'cpp_metabox_fields', 5 );

if ( ! function_exists( 'cpp_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function cpp_metabox_fields( $fields ) {

		include Content_Protector_Pack::dir_path( 'includes/options/metabox-fields.php' );

		return $fields;
	}
}
