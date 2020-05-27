<?php
/**
 * metabox.php
 *---------------------------
 * Registers options for products
 *
 */

add_filter( 'better-framework/metabox/add', 'publisher_wc_metabox_add', 5 );

if ( ! function_exists( 'publisher_wc_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_wc_metabox_add( $metabox ) {

		$metabox['better_product_options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
		);

		return $metabox;
	}
}


add_filter( 'better-framework/metabox/better_product_options/config', 'publisher_wc_metabox_config', 5 );

if ( ! function_exists( 'publisher_wc_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_wc_metabox_config( $config ) {

		return array(
			'title'    => __( 'Product Options', 'publisher' ),
			'pages'    => 'product',
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);
	} // publisher_wc_metabox_config
} // if


add_filter( 'better-framework/metabox/better_product_options/std', 'publisher_wc_metabox_std', 5 );

if ( ! function_exists( 'publisher_wc_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_wc_metabox_std( $fields ) {

		/**
		 * => Product Options
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


add_filter( 'better-framework/metabox/better_product_options/fields', 'publisher_wc_metabox_fields', 5 );

if ( ! function_exists( 'publisher_wc_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_wc_metabox_fields( $fields ) {

		/**
		 * => Product Options
		 */
		$fields['_pr_options'] = array(
			'name' => __( 'Product', 'publisher' ),
			'id'   => '_pr_options',
			'type' => 'tab',
			'icon' => 'bsai-page-text',
		);

		$fields['page_layout'] = array(
			'name'             => __( 'Product Page Layout', 'publisher' ),
			'id'               => 'page_layout',
			'std'              => 'default',
			'type'             => 'select_popup',
			'section_class'    => 'style-floated-left bordered affect-editor-on-change',
			'desc'             => __( 'Override page layout for this product.', 'publisher' ),
			'deferred-options' => array(
				'callback' => 'publisher_layout_option_list',
				'args'     => array(
					true,
				),
			),
			'texts'            => array(
				'modal_title'   => __( 'Choose Product Page Listing', 'publisher' ),
				'modal_current' => __( 'Current', 'publisher' ),
				'modal_button'  => __( 'Select', 'publisher' ),
				'box_pre_title' => __( 'Selected listing', 'publisher' ),
				'box_button'    => __( 'Change listing', 'publisher' ),
			),
			'column_class'     => 'three-column',
		);

		// todo add support to header options

		/**
		 *
		 * Adds custom CSS options for metabox
		 *
		 */
		bf_inject_panel_custom_css_fields( $fields );

		return $fields;
	}
}
