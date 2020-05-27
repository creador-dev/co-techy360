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


if ( ! class_exists( 'BetterFramework_Oculus_Loader' ) ) {

	class BetterFramework_Oculus_Loader {

		static $libraries = array();

		static $active_library;


		/**
		 * Load newest oculus library
		 */
		public static function setup_library() {

			self::$libraries = apply_filters( 'better-framework/oculus/loader', array() );

			$count = count( self::$libraries );

			if ( ! $count ) {
				return FALSE;
			}

			if ( $count == 1 ) {
				self::load_library( current( self::$libraries ) );
			} else {

				$latest_version = NULL;

				foreach ( self::$libraries as $lib ) {

					if ( $latest_version == NULL ) {
						$latest_version = $lib;
						continue;
					}

					if ( version_compare( $latest_version['version'], $lib['version'] ) <= 0 ) {
						$latest_version = $lib;
					}

				}

				self::$active_library = $latest_version;
				self::load_library( $latest_version );
			}

			do_action( 'better-framework/oculus/after_setup' );
		}


		/**
		 * Loads framework
		 *
		 * @param $library
		 */
		public static function load_library( $library ) {

			define( 'BS_OCULUS_URI', trailingslashit( $library['uri'] ) );
			define( 'BS_OCULUS_PATH', trailingslashit( $library['path'] ) );

			include_once BS_OCULUS_PATH . 'exceptions.php';
			include_once BS_OCULUS_PATH . 'class-bf-oculus.php';
		}


		/**
		 * Register PHP Error Log System Functions
		 */
		public static function register_custom_error_handler() {

			add_action( 'better-framework/oculus/check-update/done', array(
				'BetterFramework_Oculus_Loader',
				'flush_log'
			) );

			register_shutdown_function( 'BetterFramework_Oculus_Loader::bs_custom_fatal_error_handler' );
			set_error_handler( 'BetterFramework_Oculus_Loader::bs_custom_error_handler' );

			add_filter( "better-framework/oculus/check-update/data", array(
				'BetterFramework_Oculus_Loader',
				'_data'
			) );
		}


		/**
		 * Store errors in DB error source belongs to BetterStudio products
		 *
		 * @param $message
		 * @param $file
		 * @param $line
		 * @param $type
		 */
		public static function bs_log_error( $message, $file, $line, $type ) {

			if ( defined( 'BF_DEV_MODE' ) && BF_DEV_MODE ) {
				return;
			}

			$abs  = wp_normalize_path( ABSPATH );
			$file = wp_normalize_path( $file );
			if ( ! preg_match( '#^/*' . trim( $abs, '/' ) . '/*wp-content/([^/]+)/*([^/]+)#', $file, $match ) ) {
				return;
			}
			$type_dir    = &$match[1];
			$product_dir = &$match[2];

			if ( apply_filters( 'better-framework/oculus/logger/turn-off', TRUE, $product_dir, $type_dir, $file, $line, $type, $message ) ) {
				return;
			}

			if ( is_int( $type ) ) {
				switch ( $type ) {
					case E_CORE_WARNING:
					case E_WARNING:
						$type = 'warning';
						break;
					case E_ERROR:
						$type = 'error';
						break;
					case E_PARSE:
						$type = 'parse';
						break;
					case E_NOTICE:
						$type = 'notice';
						break;
					case E_CORE_ERROR:
					case E_COMPILE_ERROR:
						$type = 'core_error';
						break;
					case E_COMPILE_WARNING:
						$type = 'compile_warning';
						break;
					//TODO: enable user trigger errors logging
					case E_USER_ERROR:
						$type = 'user_error';

						return;
						break;
					case E_USER_WARNING:
						$type = 'user_warning';

						return;
						break;
					case E_USER_NOTICE:
						$type = 'user_notice';

						return;
						break;
					case E_STRICT:
						$type = 'strict';

						//TODO: enable strict errors logging
						return;
						break;
					case E_RECOVERABLE_ERROR:
						$type = 'recoverable_error';
						break;
					case E_DEPRECATED:
					case E_USER_DEPRECATED:
						$type = 'deprecated';

						//TODO: enable deprecated errors logging
						return;
						break;
				}
			}

			$errors   = get_option( 'bs-backend-error-log', array() );
			$errors[] = array(
				'msg'       => $message,
				'file'      => self::wp_content_basename( $file ),
				'timestamp' => time(),
				'line'      => $line,
				'type'      => $type,
				'trace'     => $type === 'fatal' ? '' : print_r( self::get_debug_backtrace(), TRUE )
			);


			$logged = update_option( 'bs-backend-error-log', array_slice( $errors, - 30 ), 'no' );

			do_action( 'better-framework/oculus/logger/logged', $logged );
		}


		/**
		 * Get debug backtrace summary
		 *
		 * @return array
		 */
		public static function get_debug_backtrace() {

			$result = array();
			foreach ( array_slice( debug_backtrace(), 3, 3 ) as $idx => $trace ) {
				if ( isset( $trace['object'] ) ) {
					$trace['object'] = get_class( $trace['object'] );
				}
				$result[ $idx ] = $trace;
			}

			unset( $result[0]['args'][4] ); // unset bs_custom_error_handler fifth argument

			return $result;
		}


		/**
		 * Log all php errors except fatal errors
		 *
		 * @param integer $errno
		 * @param string  $errstr
		 * @param string  $errfile
		 * @param integer $errline
		 *
		 * @see set_error_handler
		 *
		 * @return boolean false
		 */
		public static function bs_custom_error_handler( $errno, $errstr, $errfile, $errline ) {

			self::bs_log_error( $errstr, $errfile, $errline, $errno );

			return FALSE;
		}


		/**
		 * Log only php fatal errors
		 */
		public static function bs_custom_fatal_error_handler() {

			$last_error = error_get_last();

			if ( $last_error && isset( $last_error['type'] ) && $last_error['type'] === E_ERROR ) {
				self::bs_log_error( $last_error['message'], $last_error['file'], $last_error['line'], 'fatal' );
			}
		}


		/**
		 * @param array $data
		 *
		 * @return array|mixed
		 */
		public static function _data( $data ) {

			if ( $errors = get_option( 'bs-backend-error-log' ) ) {
				$data['backend'] = $errors;
			}

			return $data;
		}


		/**
		 * @param object $obj
		 */
		public static function flush_log( $obj ) {

			if ( ! empty( $obj->clean_backend_log ) ) {
				update_option( 'bs-backend-error-log', array(), 'no' );
			}
		}


		/**
		 * Catch file path after wp-content dir.
		 *
		 * @param string $file full path to file
		 *
		 * @return string
		 */
		public static function wp_content_basename( $file ) {

			$file        = wp_normalize_path( $file );
			$content_dir = wp_normalize_path( WP_CONTENT_DIR );

			$file = preg_replace( '#^' . preg_quote( $content_dir, '#' ) . '/#', '', $file ); // get relative path from wp-content dir
			$file = trim( $file, '/' );

			return $file;
		}
	}


	BetterFramework_Oculus_Loader::register_custom_error_handler();
	add_action( 'after_setup_theme', array( 'BetterFramework_Oculus_Loader', 'setup_library' ), 11 );
}

