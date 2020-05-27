<?php
/**
 * category.php
 *---------------------------
 * Registers metabox for category
 *
 */


add_filter( 'better-framework/taxonomy/metabox/add', 'publisher_category_metabox_add', 10 );

if ( ! function_exists( 'publisher_category_metabox_add' ) ) {
	/**
	 * Adds metabox for category
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_category_metabox_add( $metabox ) {

		$metabox['better-category-options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
			'css'      => true,
		);

		return $metabox;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-category-options/config', 'publisher_category_metabox_config', 10 );

if ( ! function_exists( 'publisher_category_metabox_config' ) ) {
	/**
	 * Configs category metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_category_metabox_config( $config ) {

		//
		// Support to custom taxonomies
		//
		$cat_taxonomies = array( 'category' );
		if ( publisher_get_option( 'advanced_category_options_tax' ) != '' ) {
			$cat_taxonomies = array_merge( explode( ',', publisher_get_option( 'advanced_category_options_tax' ) ), $cat_taxonomies );
		}

		return array(
			'taxonomies' => $cat_taxonomies,
			'name'       => sprintf( __( '%s Category Options', 'publisher' ), publisher_white_label_get_option( 'publisher' ) )
		);

	} // publisher_metabox_config
} // if


add_filter( 'better-framework/taxonomy/metabox/better-category-options/std', 'publisher_category_metabox_std', 10 );

if ( ! function_exists( 'publisher_category_metabox_std' ) ) {
	/**
	 * Configs category metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_category_metabox_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/category-std.php';

		return $fields;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-category-options/fields', 'publisher_category_metabox_fields', 10 );

if ( ! function_exists( 'publisher_category_metabox_fields' ) ) {
	/**
	 * Configs category metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_category_metabox_fields( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/category-fields.php';

		return $fields;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-category-options/css', 'publisher_category_metabox_css', 10 );

if ( ! function_exists( 'publisher_category_metabox_css' ) ) {
	/**
	 * Configs category metaboxe CSS
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_category_metabox_css( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/category-css.php';

		return $fields;
	}
}
