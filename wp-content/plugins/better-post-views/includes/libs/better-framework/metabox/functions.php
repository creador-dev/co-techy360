<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


if ( ! function_exists( 'bf_get_post_meta' ) ) {

	/**
	 * Used for retrieving meta fields ofr  posts and pages
	 *
	 * @param null        $key           Field ID
	 * @param null        $post_id       Post ID (Optional)
	 * @param null|string $force_default Default value (Optional)
	 *
	 * @global WPDB       $wpdb          WordPress database access object.
	 *
	 * @return mixed|void
	 */
	function bf_get_post_meta( $key = NULL, $post_id = NULL, $force_default = NULL ) {

		global $wp_query;

		if ( is_null( $post_id ) ) {
			global $post;
			$post_id = isset( $post->ID ) ? $post->ID : 0;
		}

		/**
		 * Detecting the BuddyPress $post object resetting to prevent returning false as default value.
		 *
		 * @see bp_theme_compat_reset_post function for more info
		 */
		static $bp_component_post_id;

		if ( empty( $post_id ) && $wp_query->is_main_query() ) {

			if ( ! isset( $bp_component_post_id ) ) {
				$bp_component_post_id = bf_bp_get_component_page_id();
			}

			$post_id = $bp_component_post_id;
		}

		$meta = get_post_meta( $post_id, $key, TRUE );

		if ( $meta == '' && ! is_null( $force_default ) ) {
			return $force_default;
		}

		// If Meta check for default value
		if ( $meta !== '' ) {
			return $meta;
		}

		// initialize base BF metabox
		if ( ! class_exists( 'BF_Metabox_Core' ) ) {
			Better_Framework()->post_meta();
		}

		foreach ( (array) BF_Metabox_Core::$metabox as $metabox_id => $metabox ) {

			// get style id for current metabox
			if ( isset( $metabox['panel-id'] ) ) {
				$std_id = Better_Framework()->options()->get_panel_std_id( $metabox['panel-id'] );
			} else {
				$std_id = 'std';
			}

			$metabox_std = BF_Metabox_Core::get_metabox_std( $metabox_id );

			if ( isset( $metabox_std[ $key ] ) ) {
				if ( isset( $metabox_std[ $key ][ $std_id ] ) ) {
					return $metabox_std[ $key ][ $std_id ];
				} elseif ( isset( $metabox_std[ $key ]['std'] ) ) {
					return $metabox_std[ $key ]['std'];
				} else {
					return '';
				}
			}

		}

		return '';
	}
}


if ( ! function_exists( 'bf_echo_post_meta' ) ) {

	/**
	 * Used for retrieving meta fields ofr  posts and pages
	 *
	 * @param null        $key           Field ID
	 * @param null        $post_id       Post ID (Optional)
	 * @param null|string $force_default Default value (Optional)
	 *
	 * @return mixed|void
	 */
	function bf_echo_post_meta( $key = NULL, $post_id = NULL, $force_default = NULL ) {
		echo bf_get_post_meta( $key, $post_id, $force_default ); // escaped before
	}
}