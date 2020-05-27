<?php
/**
 * metabox.php
 *---------------------------
 * Registers options for posts and pages
 *
 */


add_filter( 'better-framework/metabox/add', 'better_post_views_metabox_add', 5 );

if ( ! function_exists( 'better_post_views_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function better_post_views_metabox_add( $metabox ) {

		$metabox['better_post_views'] = array(
			'panel-id' => Better_Post_Views::$panel_id,
		);

		return $metabox;
	}
}


add_filter( 'better-framework/metabox/better_post_views/config', 'better_post_views_metabox_config', 5 );

if ( ! function_exists( 'better_post_views_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function better_post_views_metabox_config( $config ) {

		return array(
			'title'   => __( 'Better Post Views', 'better-studio' ),
			'pages'   => array( 'post', 'page' ),
			'context' => 'side',
			'prefix'  => FALSE,
		);

	} // better_post_views_metabox_config
} // if


add_filter( 'better-framework/metabox/better_post_views/std', 'better_post_views_metabox_std', 5 );

if ( ! function_exists( 'better_post_views_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_post_views_metabox_std( $fields ) {

		$fields[ Better_Post_Views::$meta_id_daily ] = array(
			'std' => 0,
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_post_views/fields', 'better_post_views_metabox_fields', 5 );

if ( ! function_exists( 'better_post_views_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_post_views_metabox_fields( $fields ) {

		$fields[ Better_Post_Views::$meta_id_daily ] = array(
			'name'            => __( 'Post Views Count', 'better-studio' ),
			'id'              => Better_Post_Views::$meta_id_daily,
			'input-desc'      => __( 'You can change views count to fake number. This helps your post to get more attention from visitors.', 'better-studio' ),
			'type'            => 'text',
			'section_class'   => 'full-width-controls',
			'container_class' => 'bpv-count-field',
		);

		return $fields;
	}
}
