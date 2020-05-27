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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( ! function_exists( 'bf_get_user_meta' ) ) {
	/**
	 * Used for finding user meta field value.
	 *
	 * @since   2.0
	 *
	 * @param   string         $field_key     User field ID
	 * @param   string|WP_User $user          User ID or object
	 * @param   null           $force_default Default value (Optional)
	 *
	 * @return mixed
	 */
	function bf_get_user_meta( $field_key, $user = null, $force_default = null ) {

		if ( is_null( $user ) ) {

			// Get current post author id
			if ( is_singular() ) {
				$user = get_the_author_meta( 'ID' );
			} // Get current archive user
			elseif ( is_author() ) {
				$user = bf_get_author_archive_user();
			} // Return default value
			else {
				return $force_default;
			}
		}

		// Get user id from object
		if ( is_object( $user ) ) {
			$user = $user->ID;
		}

		// get value if saved in DB
		$value = get_user_meta( $user, $field_key, true );

		if ( $value !== false ) {
			return $value;
		} // Or return force default value
		elseif ( ! is_null( $force_default ) ) {
			return $force_default;
		}

		// initialize base BF metabox
		if ( ! class_exists( 'BF_User_Metabox_Core' ) ) {
			Better_Framework()->user_meta();
		}

		// Iterate all meta boxes
		foreach ( BF_User_Metabox_Core::$metabox as $metabox_id => $metabox ) {

			// if this meta box connected to a panel for style field
			if ( isset( $metabox['panel-id'] ) ) {
				$std_id = Better_Framework()->options()->get_panel_std_id( $metabox['panel-id'] );
			} else {
				$std_id = 'std';
			}

			$metabox_std = BF_User_Metabox_Core::get_metabox_std( $metabox_id );

			// retrieve default value
			if ( isset( $metabox_std[ $field_key ][ $std_id ] ) ) {
				return $metabox_std[ $field_key ][ $std_id ];
			} elseif ( isset( $metabox_std[ $field_key ]['std'] ) ) {
				return $metabox_std[ $field_key ]['std'];
			}

		}

		return false;
	}
}


if ( ! function_exists( 'bf_echo_user_meta' ) ) {
	/**
	 * Used to echo user meta field value.
	 *
	 * @since   2.0
	 *
	 * @param   string         $field_key     User field ID
	 * @param   string|WP_User $user          User ID or object
	 * @param   null           $force_default Default value (Optional)
	 *
	 * @return mixed
	 */
	function bf_echo_user_meta( $field_key, $user = null, $force_default = null ) {

		echo bf_get_user_meta( $field_key, $user, $force_default );
	}
}

