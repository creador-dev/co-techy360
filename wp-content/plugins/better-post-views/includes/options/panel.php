<?php

add_filter( 'better-framework/panel/add', 'better_post_views_panel_add', 10 );

if ( ! function_exists( 'better_post_views_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function better_post_views_panel_add( $panels ) {

		$panels[ Better_Post_Views::$panel_id ] = array(
			'id' => Better_Post_Views::$panel_id,
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/' . Better_Post_Views::$panel_id . '/config', 'better_post_views_panel_config', 10 );

if ( ! function_exists( 'better_post_views_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function better_post_views_panel_config( $panel ) {

		include Better_Post_Views::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	} // better_post_views_panel_config
}


add_filter( 'better-framework/panel/' . Better_Post_Views::$panel_id . '/std', 'better_post_views_panel_std', 10 );

if ( ! function_exists( 'better_post_views_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_post_views_panel_std( $fields ) {

		$fields['count']          = array(
			'std' => 'daily',
		);
		$fields['counts_for']     = array(
			'std' => 'guest',
		);
		$fields['exclude_bots']   = array(
			'std' => '1',
		);
		$fields['views_template'] = array(
			'std' => '%VIEW_COUNT% views',
		);

		return $fields;
	}
}


add_filter( 'better-framework/panel/' . Better_Post_Views::$panel_id . '/fields', 'better_post_views_panel_fields', 10 );

if ( ! function_exists( 'better_post_views_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_post_views_panel_fields( $fields ) {

		$fields['count']          = array(
			'name'    => __( 'Count functionality', 'better-studio' ),
			'id'      => 'count',
			'type'    => 'select',
			'desc'    => __( 'You can change the counting functionality wih this. If you need to soort posts byre view count in last 7 days you should select the 7 days but if you need to count simply the total post views then select the dasily.', 'better-studio' ),
			'options' => array(
				'daily' => __( 'Daily', 'better-studio' ),
				'7days' => __( '7 Days', 'better-studio' ),
			)
		);
		$fields['counts_for']     = array(
			'name'    => __( 'Count views from', 'better-studio' ),
			'id'      => 'counts_for',
			'type'    => 'select',
			'desc'    => __( 'Chose where the counter should be increment.', 'better-studio' ),
			'options' => array(
				'everyone'         => __( 'Everyone', 'better-studio' ),
				'guest'            => __( 'Guests Only', 'better-studio' ),
				'guest_registered' => __( 'Guests + Subscriber Users', 'better-studio' ),
				'registered'       => __( 'Registered Users Only ( All logged in users )', 'better-studio' ),
			)
		);
		$fields['exclude_bots']   = array(
			'name'      => __( 'Exclude bot\'s form views count', 'better-studio' ),
			'desc'      => __( 'Search Engines and other bots will not be count in your post views.', 'better-studio' ),
			'id'        => 'exclude_bots',
			'type'      => 'switch',
			'on-label'  => __( 'Yes', 'better-studio' ),
			'off-label' => __( 'No', 'better-studio' ),
		);
		$fields['views_template'] = array(
			'name' => __( 'Views template', 'better-studio' ),
			'id'   => 'views_template',
			'type' => 'text',
			'desc' => __( 'Allowed variables: <br>- %VIEW_COUNT% <br>- %VIEW_COUNT_ROUNDED%', 'better-studio' )
		);

		return $fields;
	}
}
