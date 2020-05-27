<?php

add_filter( 'better-framework/panel/add', 'better_facebook_chat_panel_add', 10 );

if ( ! function_exists( 'better_facebook_chat_panel_add' ) ) {
	/**
	 * Callback: Ads panel
	 *
	 * @hooked better-framework/panel/add
	 *
	 * @param $panels
	 *
	 * @return array
	 */
	function better_facebook_chat_panel_add( $panels ) {

		$panels['better_facebook_chat'] = array(
			'id' => 'better_facebook_chat',
		);

		return $panels;
	}
}


add_filter( 'better-framework/panel/better_facebook_chat/config', 'better_facebook_chat_panel_config', 10 );

if ( ! function_exists( 'better_facebook_chat_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @hooked better-framework/panel/better_facebook_chat/config
	 *
	 * @param $panel
	 *
	 * @return array
	 */
	function better_facebook_chat_panel_config( $panel ) {

		include better_facebook_chat::dir_path( 'includes/options/panel-config.php' );

		return $panel;
	} // better_facebook_chat_panel_config
}


add_filter( 'better-framework/panel/better_facebook_chat/std', 'better_facebook_chat_panel_std', 10 );

if ( ! function_exists( 'better_facebook_chat_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @hooked better-framework/panel/better_facebook_chat/std
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_facebook_chat_panel_std( $fields ) {

		include better_facebook_chat::dir_path( 'includes/options/panel-std.php' );


		return $fields;
	}
}


add_filter( 'better-framework/panel/better_facebook_chat/fields', 'better_facebook_chat_panel_fields', 10 );

if ( ! function_exists( 'better_facebook_chat_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @hooked better-framework/panel/better_facebook_chat/fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_facebook_chat_panel_fields( $fields ) {

		include better_facebook_chat::dir_path( 'includes/options/panel-fields.php' );

		return $fields;
	}
}
