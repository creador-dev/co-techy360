<?php
/**
 * metabox.php
 *---------------------------
 * Registers options for forums
 *
 */

add_filter( 'better-framework/metabox/add', 'publisher_bbpress_metabox_add', 5 );

if ( ! function_exists( 'publisher_bbpress_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function publisher_bbpress_metabox_add( $metabox ) {

		$metabox['better_forum_options'] = array(
			'panel-id' => publisher_get_theme_panel_id(),
		);


		return $metabox;
	}
}


add_filter( 'better-framework/metabox/better_forum_options/config', 'publisher_bbpress_metabox_config', 5 );

if ( ! function_exists( 'publisher_bbpress_metabox_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function publisher_bbpress_metabox_config( $config ) {

		return array(
			'title'    => __( 'Forum Options', 'publisher' ),
			'pages'    => 'forum',
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);
	} // publisher_bbpress_metabox_config
} // if


add_filter( 'better-framework/metabox/better_forum_options/std', 'publisher_bbpress_metabox_std', 5 );

if ( ! function_exists( 'publisher_bbpress_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_bbpress_metabox_std( $fields ) {

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


add_filter( 'better-framework/metabox/better_forum_options/fields', 'publisher_bbpress_metabox_fields', 5 );

if ( ! function_exists( 'publisher_bbpress_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_bbpress_metabox_fields( $fields ) {

		/**
		 * => Product Options
		 */
		$fields['_fr_options'] = array(
			'name' => __( 'Forum Settings', 'publisher' ),
			'id'   => '_pr_options',
			'type' => 'tab',
			'icon' => 'bsai-page-text',
		);

		$fields['page_layout'] = array(
			'name'             => __( 'Forum Page Layout', 'publisher' ),
			'id'               => 'page_layout',
			'std'              => 'default',
			'type'             => 'select_popup',
			'section_class'    => 'style-floated-left bordered affect-editor-on-change',
			'desc'             => __( 'Override page layout for this forum.', 'publisher' ),
			'deferred-options' => array(
				'callback' => 'publisher_layout_option_list',
				'args'     => array(
					true,
				),
			),
			'texts'            => array(
				'modal_title'   => __( 'Choose Forum Page Listing', 'publisher' ),
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
