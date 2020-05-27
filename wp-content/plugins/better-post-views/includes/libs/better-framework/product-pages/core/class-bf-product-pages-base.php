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
 * Class BS_Theme_Pages_Base
 */
abstract class BF_Product_Pages_Base {

	public static $config = array();

	public function __construct() {

		self::init_config();
	}

	public function error( $error_message ) {

		//todo: print error message

		printf( '<div class="update-nag">%s</div>', $error_message );
	}


	public static function init_config() {

		if ( ! self::$config ) {

			self::$config         = apply_filters( 'better-framework/product-pages/config', array() );
			self::$config['URI']  = BF_PRODUCT_PAGES_URI;
			self::$config['path'] = BF_PRODUCT_PAGES_PATH;
		}

	}

	public static function get_config() {

		self::init_config();

		return self::$config;
	}

	public static function get_product_info( $index, $default = FALSE ) {

		if ( isset( self::$config[ $index ] ) ) {
			return self::$config[ $index ];
		}

		return $default;
	}

	/**
	 * handle api request
	 *
	 * @see \BetterFramework_Oculus::request
	 *
	 * @param string $action
	 * @param array  $data
	 * @param array  $auth
	 * @param bool   $use_wp_error
	 *
	 * @return array|bool|object|WP_Error
	 */
	protected function api_request( $action, $data = array(), $auth = array(), $use_wp_error = TRUE ) {

		if ( ! class_exists( 'BetterFramework_Oculus' ) ) {
			return FALSE;
		}

		$results = BetterFramework_Oculus::request( $action, compact( 'auth', 'data', 'use_wp_error' ) );

		if ( isset( $results->result ) && 'error' === $results->result ) {

			return new WP_Error( $results->{'error-code'}, $results->{'error-message'} );
		}

		return $results;
	} //api_request

	/**
	 * Throw exception when argument is WP_Error
	 *
	 * @param mixed $maybe_wp_error
	 *
	 * @throws BF_Exception
	 */
	protected static function throw_if_is_wp_error( $maybe_wp_error ) {
		if ( is_wp_error( $maybe_wp_error ) ) {
			/**
			 * @var WP_Error $maybe_wp_error
			 */
			$message = '';

			foreach ( $maybe_wp_error->get_error_codes() as $code ) {
				$message .= "\n";
				$message .= $code . ': ';
				$message .= $maybe_wp_error->get_error_message( $code );
				$message .= "\n";
				$message .= print_r( $maybe_wp_error->get_error_data( $code ), TRUE );
				$message .= "\n";
			}

			$message .= " ----- \n";

			$args = func_get_args();
			foreach ( array_slice( $args, 1 ) as $param ) {
				$message .= "\n";
				$message .= print_r( $param, TRUE );
			}

			throw new BF_Exception( $message, $maybe_wp_error->get_error_code() );
		}
	}
}
