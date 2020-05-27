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


/**
 * override parent method to discard printed outputs
 *
 * Class BF_Product_Upgrader_Skin
 */
class BF_Product_Upgrader_Skin {

	public function header() {
	}

	public function footer() {
	}

	public function feedback( $string ) {
	}

	public function before() {
	}

	public function after() {
	}

	public function decrement_update_count( $type ) {
	}

	public function set_upgrader( &$upgrader ) {
	}

	public function add_strings() {
	}

	public function set_result( $result ) {
	}

	public function request_filesystem_credentials( $error = FALSE, $context = FALSE, $allow_relaxed_file_ownership = FALSE ) {
	}

	public function error( $errors ) {
	}

	public function bulk_header() {
	}

	public function bulk_footer() {
	}
}