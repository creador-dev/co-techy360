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
 * BetterFramework Bas Functionality For Themes
 */
abstract class BF_WooCommerce {

	public function __construct() {

		add_theme_support( 'woocommerce' );

		add_filter( 'init', array( $this, 'init' ) );
	}


	/**
	 * Register WooCommrece related hooks
	 */
	public function init() {

		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );

		add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragments' ) );

	}


	/**
	 * Action callback: Add WooCommerce assets
	 */
	abstract public function register_assets();


	/**
	 * Filter Callback: Used for adding total items in cart
	 *
	 * @param $fragments
	 *
	 * @return mixed
	 */
	public function add_to_cart_fragments( $fragments ) {

		global $woocommerce;

		$fragments['total-items-in-cart'] = $woocommerce->cart->cart_contents_count;

		return $fragments;

	}

}