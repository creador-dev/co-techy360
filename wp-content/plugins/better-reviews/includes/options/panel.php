<?php

add_filter( 'better-framework/panel/add', 'better_reviews_panel_add', 10 );

if ( ! function_exists( 'better_reviews_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function better_reviews_panel_add( $panels ) {

		$panels[ Better_Reviews::$panel_id ] = array(
			'id' => Better_Reviews::$panel_id,
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/' . Better_Reviews::$panel_id . '/config', 'better_reviews_panel_config', 10 );

if ( ! function_exists( 'better_reviews_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function better_reviews_panel_config( $panel ) {

		include Better_Reviews::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	} // better_reviews_panel_config
}


add_filter( 'better-framework/panel/' . Better_Reviews::$panel_id . '/std', 'better_reviews_panel_std', 10 );

if ( ! function_exists( 'better_reviews_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_reviews_panel_std( $fields ) {

		$fields['review_box_style']    = array(
			'std' => 'big-1',
		);
		$fields['readers_rating']      = array(
			'std' => 'enable',
		);
		$fields['text_pros']           = array(
			'std' => 'Pros',
		);
		$fields['text_cons']           = array(
			'std' => 'Cons',
		);
		$fields['text_readers_rating'] = array(
			'std' => 'Readers Rating: %s',
		);
		$fields['text_votes']          = array(
			'std' => '%s votes',
		);
		$fields['icon_pros']           = array(
			'std' => array(
				'icon'      => 'fa-check',
				'type'      => 'fontawesome',
				'height'    => '',
				'width'     => '',
				'font_code' => '\f00c',
			),
		);
		$fields['icon_cons']           = array(
			'std' => array(
				'icon'      => 'fa-times',
				'type'      => 'fontawesome',
				'height'    => '',
				'width'     => '',
				'font_code' => '\f00c',
			),
		);

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . Better_Reviews::$panel_id . '/fields', 'better_reviews_panel_fields', 10 );

if ( ! function_exists( 'better_reviews_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_reviews_panel_fields( $fields ) {

		$fields[]                   = array(
			'name' => __( 'General', 'better-studio' ),
			'id'   => 'general_tab',
			'type' => 'tab',
			'icon' => 'bsai-gear'
		);
		$fields['review_box_style'] = array(
			'name'             => __( 'Review Box Style', 'better-studio' ),
			'desc'             => __( 'Chose style of review box.', 'better-studio' ),
			'id'               => 'review_box_style',
			'type'             => 'select_popup',
			'section_class'    => 'style-floated-left bordered',
			'deferred-options' => array(
				'callback' => 'better_reviews_review_box_style_options',
				'args'     => array(
					true,
				),
			),
		);
		$fields['readers_rating']   = array(
			'name'    => __( 'Visitors Rating?', 'better-studio' ),
			'desc'    => __( 'Enables users to enter their review in review boxes.', 'better-studio' ),
			'id'      => 'readers_rating',
			'type'    => 'select',
			'options' => array(
				'enable'  => __( 'Enable', 'better-studio' ),
				'disable' => __( 'Disable', 'better-studio' ),
			),
		);

		$fields[]            = array(
			'name' => __( 'Pros & Cons', 'better-studio' ),
			'id'   => 'pros_cons_tab',
			'type' => 'tab',
			'icon' => 'bsai-global'
		);
		$fields['icon_pros'] = array(
			'name' => __( 'Pros Icon', 'better-studio' ),
			'id'   => 'icon_pros',
			'type' => 'icon_select',
		);
		$fields['icon_cons'] = array(
			'name' => __( 'Cons Icon', 'better-studio' ),
			'id'   => 'icon_cons',
			'type' => 'icon_select',
		);

		$fields[]                      = array(
			'name' => __( 'Translation', 'better-studio' ),
			'id'   => 'translation_tab',
			'type' => 'tab',
			'icon' => 'bsai-global'
		);
		$fields[]                      = array(
			'name'  => __( 'Translation', 'better-studio' ),
			'type'  => 'group',
			'state' => 'close',
		);
		$fields['text_pros']           = array(
			'name' => __( 'Pros', 'better-studio' ),
			'id'   => 'text_pros',
			'type' => 'text',
		);
		$fields['text_cons']           = array(
			'name' => __( 'Cons', 'better-studio' ),
			'id'   => 'text_cons',
			'type' => 'text',
		);
		$fields['text_readers_rating'] = array(
			'name' => __( 'Readers Rating:', 'better-studio' ),
			'id'   => 'text_readers_rating',
			'type' => 'text',
		);
		$fields['text_votes']          = array(
			'name' => __( 'Votes', 'better-studio' ),
			'id'   => 'text_votes',
			'type' => 'text',
		);

		return $fields;
	}
}
