<?php

add_filter( 'better-framework/panel/add', 'better_facebook_comments_panel_add', 10 );

if ( ! function_exists( 'better_facebook_comments_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function better_facebook_comments_panel_add( $panels ) {

		$panels[ 'better_facebook_comments' ] = array(
			'id' => 'better_facebook_comments',
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/better_facebook_comments/config', 'better_facebook_comments_panel_config', 10 );

if ( ! function_exists( 'better_facebook_comments_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function better_facebook_comments_panel_config( $panel ) {

		include Better_Facebook_Comments::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	} // better_facebook_comments_panel_config
}


add_filter( 'better-framework/panel/better_facebook_comments/std', 'better_facebook_comments_panel_std', 10 );

if ( ! function_exists( 'better_facebook_comments_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_facebook_comments_panel_std( $fields ) {

		$fields['app_id']           = array(
			'std' => '',
		);
		$fields['numposts']         = array(
			'std' => '10',
		);
		$fields['order_by']         = array(
			'std' => 'social',
		);
		$fields['colorscheme']      = array(
			'std' => 'light',
		);
		$fields['locale']           = array(
			'std' => 'en_US',
		);
		$fields['text_no_comment']  = array(
			'std' => 'No Comment',
		);
		$fields['text_one_comment'] = array(
			'std' => 'One Comment',
		);
		$fields['text_two_comment'] = array(
			'std' => 'Two Comment',
		);
		$fields['text_comments']    = array(
			'std' => '%%NUMBER%% Comment',
		);
		$fields['text_loading']    = array(
			'std' => 'Loading...',
		);
		

		return $fields;
	}
}


add_filter( 'better-framework/panel/better_facebook_comments/fields', 'better_facebook_comments_panel_fields', 10 );

if ( ! function_exists( 'better_facebook_comments_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_facebook_comments_panel_fields( $fields ) {

		include Better_Facebook_Comments::dir_path( 'includes/options/panel-fields.php' );

		return $fields;
	}
}
