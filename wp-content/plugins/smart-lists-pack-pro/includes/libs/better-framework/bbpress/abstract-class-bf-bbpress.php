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


/**
 * BetterFramework bbPress Functionality For Themes
 */
abstract class BF_bbPress {

	public function __construct() {

		add_theme_support( 'bbpress' );

		add_filter( 'init', array( $this, 'init' ) );
	}


	/**
	 * Register WooCommrece related hooks
	 */
	public function init() {

		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );

	}


	/**
	 * Action callback: Add WooCommerce assets
	 */
	abstract public function register_assets();

}