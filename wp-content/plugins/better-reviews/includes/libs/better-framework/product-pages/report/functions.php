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


function bf_system_report_enqueue_scripts() {

	if ( bf_is_product_page( 'report' ) ) {

		$ver = BF_Product_Pages::Run()->get_version();

		wp_enqueue_script( 'bs-product-report-scripts', BF_Product_Pages::get_url( 'report/assets/js/bs-system-report.js' ), array(), $ver );
	}

}

add_action( 'admin_enqueue_scripts', 'bf_system_report_enqueue_scripts' );


/**
 * callback: saved imported demo list in database
 * action: bs-product-pages/install-demo/import-finished
 *
 * @param string $demo_ID
 */
function bf_product_report_log_demo_install( $demo_ID ) {

	$history             = (array) get_option( 'bs-demo-install-log', array() );
	$history[ $demo_ID ] = time();

	update_option( 'bs-demo-install-log', $history, 'no' );
}

add_action( 'better-framework/product-pages/install-demo/import-finished', 'bf_product_report_log_demo_install' );


/**
 * callback: remove imported demo from database after demo uninstalled successfully
 * action: bs-product-pages/install-demo/rollback-finished
 *
 * @param string $demo_ID
 */
function bf_product_report_log_demo_uninstall( $demo_ID ) {

	$history = (array) get_option( 'bs-demo-install-log', array() );
	if ( isset( $history[ $demo_ID ] ) ) {
		unset( $history[ $demo_ID ] );
		update_option( 'bs-demo-install-log', $history, 'no' );
	}
}

add_action( 'better-framework/product-pages/install-demo/rollback-finished', 'bf_product_report_log_demo_uninstall' );
