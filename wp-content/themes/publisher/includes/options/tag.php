<?php
/**
 * tag.php
 *---------------------------
 * Registers metabox for tag
 *
 */


add_filter( 'better-framework/taxonomy/metabox/add', 'publisher_tag_metabox_add', 100 );

if ( ! function_exists( 'publisher_tag_metabox_add' ) ) {
	/**
	 * Adds metabox for category
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_tag_metabox_add( $metabox ) {

		$metabox['better-tag-options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
		);

		return $metabox;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-tag-options/config', 'publisher_tag_metabox_config', 100 );

if ( ! function_exists( 'publisher_tag_metabox_config' ) ) {
	/**
	 * Configs category metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_tag_metabox_config( $config ) {

		//
		// Support to custom taxonomies
		//
		$tag_taxonomies = array( 'post_tag' );

		if ( publisher_get_option( 'advanced_tag_options_tax' ) != '' ) {
			$tag_taxonomies = array_merge( explode( ',', publisher_get_option( 'advanced_tag_options_tax' ) ), $tag_taxonomies );
		}

		return array(
			'taxonomies' => $tag_taxonomies,
			'name'       => sprintf( __( '%s Tag Options', 'publisher' ), publisher_white_label_get_option( 'publisher' ) )
		);

	} // publisher_metabox_config
} // if


add_filter( 'better-framework/taxonomy/metabox/better-tag-options/std', 'publisher_tag_metabox_std', 100 );

if ( ! function_exists( 'publisher_tag_metabox_std' ) ) {
	/**
	 * Configs category metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_tag_metabox_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/tag-std.php';

		return $fields;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-tag-options/fields', 'publisher_tag_metabox_fields', 100 );

if ( ! function_exists( 'publisher_tag_metabox_fields' ) ) {
	/**
	 * Configs category metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_tag_metabox_fields( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/tag-fields.php';

		return $fields;
	}
}
