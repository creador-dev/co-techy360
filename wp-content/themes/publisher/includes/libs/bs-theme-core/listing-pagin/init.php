<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


// Active and new shortcodes
add_filter( 'better-framework/shortcodes', 'publisher_theme_core_init_pagin', 10 );

if ( ! function_exists( 'publisher_theme_core_init_pagin' ) ) {
	/**
	 * Initializes BS Pagin
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	function publisher_theme_core_init_pagin( $shortcodes ) {

		include Publisher_Theme_Core()->get_dir_path() . 'listing-pagin/functions.php';
		include Publisher_Theme_Core()->get_dir_path() . 'listing-pagin/class-publisher-theme-listing-pagin-manager.php';
		include Publisher_Theme_Core()->get_dir_path() . 'listing-pagin/class-publisher-theme-listing-shortcode.php';
		include Publisher_Theme_Core()->get_dir_path() . 'listing-pagin/class-publisher-theme-listing-widget.php';

		return $shortcodes;
	}
}
