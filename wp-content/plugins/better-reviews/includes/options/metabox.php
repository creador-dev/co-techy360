<?php


add_filter( 'better-framework/metabox/add', 'better_reviews_metabox_add', 100 );

if ( ! function_exists( 'better_reviews_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function better_reviews_metabox_add( $metabox ) {

		$metabox['bs_review_metabox'] = array(
			'panel-id' => Better_Reviews::$panel_id,
		);

		return $metabox;
	}
}

add_filter( 'better-framework/metabox/bs_review_metabox/config', 'better_reviews_metabox_config', 10 );

if ( ! function_exists( 'better_reviews_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function better_reviews_metabox_config( $config ) {

		return array(
			'title'    => __( 'Better Reviews', 'better-studio' ),
			'pages'    => Better_Reviews::$post_types,
			'context'  => 'normal',
			'prefix'   => FALSE,
			'priority' => 'high'
		);
	} // better_reviews_metabox_config
} // if


add_filter( 'better-framework/metabox/bs_review_metabox/std', 'better_reviews_metabox_std', 10 );

if ( ! function_exists( 'better_reviews_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_reviews_metabox_std( $fields ) {

		include Better_Reviews::dir_path( 'includes/options/metabox-std.php' );

		return $fields;
	}
}


add_filter( 'better-framework/metabox/bs_review_metabox/fields', 'better_reviews_metabox_fields', 10 );

if ( ! function_exists( 'better_reviews_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_reviews_metabox_fields( $fields ) {

		include Better_Reviews::dir_path( 'includes/options/metabox-fields.php' );

		return $fields;
	}
}
