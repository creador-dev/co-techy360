<?php
/**
 * terms.php
 *---------------------------
 * Registers options for WooCommerce terms
 *
 */

add_filter( 'better-framework/taxonomy/metabox/add', 'publisher_wc_category_metabox_add', 10 );

if ( ! function_exists( 'publisher_wc_category_metabox_add' ) ) {
	/**
	 * Adds metabox for category
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_wc_category_metabox_add( $metabox ) {

		$metabox['better-product-category-options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
		);

		return $metabox;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-product-category-options/config', 'publisher_wc_category_metabox_config', 10 );

if ( ! function_exists( 'publisher_wc_category_metabox_config' ) ) {
	/**
	 * Configs category metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_wc_category_metabox_config( $config ) {

		return array(
			'name'       => __( 'Better Category Options', 'publisher' ),
			'taxonomies' => array( 'product_cat', 'product_tag' ),
		);

	} // publisher_metabox_config
} // if


add_filter( 'better-framework/taxonomy/metabox/better-product-category-options/std', 'publisher_wc_category_metabox_std', 10 );

if ( ! function_exists( 'publisher_wc_category_metabox_std' ) ) {
	/**
	 * Configs category metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_wc_category_metabox_std( $fields ) {

		/**
		 * => Style
		 */
		$fields['page_layout'] = array(
			'std' => 'default',
		);


		/**
		 * -> Custom CSS
		 */
		$fields['_custom_css_code']                  = array(
			'std' => '',
		);
		$fields['_custom_css_class']                 = array(
			'std' => '',
		);
		$fields['_custom_css_desktop_code']          = array(
			'std' => '',
		);
		$fields['_custom_css_tablet_landscape_code'] = array(
			'std' => '',
		);
		$fields['_custom_css_tablet_portrait_code']  = array(
			'std' => '',
		);
		$fields['_custom_css_phones_code']           = array(
			'std' => '',
		);

		return $fields;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better-product-category-options/fields', 'publisher_wc_category_metabox_fields', 10 );

if ( ! function_exists( 'publisher_wc_category_metabox_fields' ) ) {
	/**
	 * Configs category metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_wc_category_metabox_fields( $fields ) {

		/**
		 * => Style
		 */
		$fields[]              = array(
			'name' => __( 'Style', 'publisher' ),
			'id'   => 'tab_style',
			'type' => 'tab',
			'icon' => 'bsai-paint',
		);
		$fields['page_layout'] = array(
			'name'             => __( 'Page Layout', 'publisher' ),
			'id'               => 'page_layout',
			'std'              => 'default',
			'type'             => 'image_radio',
			'section_class'    => 'style-floated-left bordered',
			'desc'             => __( 'Select and override page layout for this page.', 'publisher' ),
			'deferred-options' => array(
				'callback' => 'publisher_layout_option_list',
				'args'     => array(
					true,
				),
			),
		);

		// todo add header options

		/**
		 *
		 * Adds custom CSS options for metabox
		 *
		 */
		bf_inject_panel_custom_css_fields( $fields );

		return $fields;
	}
}
