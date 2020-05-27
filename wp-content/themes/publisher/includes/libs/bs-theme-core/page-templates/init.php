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


if ( ! is_admin() ) {
	return;
}

// Performs the Bf setup
add_action( 'better-framework/after_setup', 'publisher_page_templates_init' );

if ( ! function_exists( 'publisher_page_templates_init' ) ) {
	/**
	 * Initialize Page Templates
	 */
	function publisher_page_templates_init() {

		if ( ! class_exists( 'Publisher_Page_Templates' ) ) {
			include_once Publisher_Theme_Core()->get_dir_path( 'page-templates/class-publisher-page-templates.php' );
		}

		new Publisher_Page_Templates();

	}
}