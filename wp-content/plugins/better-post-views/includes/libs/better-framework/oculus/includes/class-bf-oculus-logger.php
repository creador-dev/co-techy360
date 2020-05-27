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


BetterFramework_Oculus_Logger::Run();


class BetterFramework_Oculus_Logger {

	/**
	 * Store log data
	 * Initialize
	 */
	public static function Run() {

		global $bs_oculus_logger;

		if ( $bs_oculus_logger === FALSE ) {
			return;
		}

		if ( ! $bs_oculus_logger instanceof self ) {
			$bs_oculus_logger = new self();
			$bs_oculus_logger->init();
		}

		return $bs_oculus_logger;
	}


	public function init() {

		add_action( 'better-framework/oculus/check-update/done', array( $this, 'clean_data' ) );

		// log demo installation process
		add_action( 'better-framework/product-pages/install-demo/import-finished', array(
			$this,
			'log_demo_install'
		), 9, 2 );
		add_action( 'better-framework/product-pages/install-demo/rollback-finished', array(
			$this,
			'log_demo_uninstall'
		), 9, 2 );

		$o_slug = BetterFramework_Oculus::$slug;

		add_filter( "better-framework/$o_slug/check-update/data", array( $this, 'check_data' ) );
	}


	/**
	 * Get logged data
	 *
	 * @return array
	 */
	protected function get_data() {

		return get_option( 'bs-oculus-logger', array() );
	}


	/**
	 * callback: saved imported demo list in database
	 * action: bs-product-pages/install-demo/import-finished
	 *
	 * @param string                    $demo_ID
	 * @param BF_Product_Demo_Installer $_this
	 */
	function log_demo_install( $demo_ID, $_this ) {

		$log = $this->get_data();
		if ( ! isset( $log['demo'] ) ) {
			$log['demo'] = array();
		}

		$log['demo'][] = array(
			'action'  => 'install',
			'demo-id' => $demo_ID,
			'time'    => time(),
			'context' => $_this->demo_context
		);
		$this->save( $log );
	}


	/**
	 * callback: remove imported demo from database after demo uninstalled successfully
	 * action: bs-product-pages/install-demo/rollback-finished
	 *
	 * @param string                    $demo_ID
	 * @param BF_Product_Demo_Installer $_this
	 */
	function log_demo_uninstall( $demo_ID, $_this ) {

		$log = $this->get_data();
		if ( ! isset( $log['demo'] ) ) {
			$log['demo'] = array();
		}

		$log['demo'][] = array(
			'action'  => 'uninstall',
			'demo-id' => $demo_ID,
			'time'    => time(),
			'context' => $_this->demo_context
		);
		$this->save( $log );
	}


	/**
	 * callback: save $log array info into db
	 * action  : admin_footer
	 *
	 * @param array $log
	 */
	public function save( $log ) {

		if ( is_array( $log ) ) {
			update_option( 'bs-oculus-logger', array_slice( $log, - 30 ), 'no' );
		}
	}


	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function check_data( $data ) {

		$logger_data = $this->get_data();
		$data        = array_merge( $data, $logger_data );

		return $data;
	}


	public function clean_data( $obj ) {

		if ( ! empty( $obj->clean_demo_log ) ) {
			// clean demo log
			$log = $this->get_data();
			if ( isset( $log['demo'] ) ) {
				unset( $log['demo'] );
				$this->save( $log );
			}
		}
	}
}