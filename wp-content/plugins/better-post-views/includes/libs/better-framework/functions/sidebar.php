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


if ( ! function_exists( 'bf_get_current_sidebar' ) ) {
	/**
	 * Used For retrieving current sidebar
	 *
	 * @since 2.5.5
	 *
	 * @return string
	 */
	function bf_get_current_sidebar() {
		return Better_Framework::widget_manager()->get_current_sidebar();
	}
}


if ( ! function_exists( 'bf_get_sidebar_name_from_id' ) ) {
	/**
	 * Used For retrieving current sidebar
	 *
	 * @since 2.0
	 *
	 * @param $sidebar_id
	 *
	 * @return
	 */
	function bf_get_sidebar_name_from_id( $sidebar_id ) {

		global $wp_registered_sidebars;

		if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
			return $wp_registered_sidebars[ $sidebar_id ]['name'];
		}

	}
}
