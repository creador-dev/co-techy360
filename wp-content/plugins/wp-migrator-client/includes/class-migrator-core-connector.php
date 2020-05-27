<?php


/**
 * API to connect migrator core server in easy way
 *
 * @since     1.0.0
 *
 * @package   WP-Migrator/Remote/Connector
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */
class Migrator_Core_Connector {

	/**
	 * Migrator Core URI
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public static $uri = 'http://core.migrator.betterstudio.com/v1/%ep%';
	//	public static $uri = 'http://localhost/migrator-api/v1/%ep%';


	/**
	 * a Flag to turn on/off compression in http requests
	 *
	 * @since 1.0.0
	 * @var bool
	 */
	public static $compress = TRUE;


	/**
	 * Server maintenance-mode message
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public static $maintenance_msg;

	/**
	 * Request an endpoint from migrator server
	 *
	 * @param string $end_point
	 * @param array  $data
	 * @param array  $options
	 *
	 * @since 1.0.0
	 * @return array|bool|object
	 */
	public static function request( $end_point, $data = array(), $options = array() ) {

		$compress_data = self::$compress ? self::compress_data( $data ) : NULL;

		$url             = str_replace( '%ep%', $end_point, self::$uri );
		$args['body']    = $compress_data ? $compress_data : $data;
		$args['headers'] = self::remote_header();
		$args['assoc']   = TRUE;

		$result = self::fetch_json_data( $url, $args );


		if ( isset( $result['error-code'] ) && isset( $result['error-message    '] ) &&
		     $result['error-code'] === 'maintenance-mode' ) { # Trigger maintenance-mode
			self::$maintenance_msg = $result['error-message'];
		}

		return apply_filters( 'wp-migrator/http-request/result', $result, $url, $args );
	}


	/**
	 * Is migration server in maintenance mode
	 *
	 * @since 1.0.0
	 * @return boolean
	 */
	public static function is_maintenance_mode() {

		return ! empty( self::$maintenance_msg );
	}


	/**
	 * Get migration server maintenance-mode message
	 *
	 * @since 1.0.0
	 * @return boolean
	 */
	public function maintenance_mode_message() {

		return self::$maintenance_msg;
	}

	/**
	 * @param array $data
	 *
	 * @since 1.0.0
	 *
	 * @return array|void
	 */
	public static function compress_data( $data ) {

		if ( function_exists( 'gzdeflate' ) ) {

			$compressed        = TRUE;
			$compressed_string = base64_encode( gzdeflate( serialize( $data ) ) );

			return compact( 'compressed', 'compressed_string' );
		}
	}

	/**
	 * Get http request headers
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public static function remote_header() {

		return array(
			'migrator-version' => Migrator_Client::VERSION,
			'wp-version'       => $GLOBALS['wp_version'],
			'php-version'      => phpversion(),
			'site-locale'      => get_locale(),
			'site-url'         => home_url(),
		);
	}


	/**
	 * Fetch json from remote server
	 *
	 * @param string  $url
	 * @param array   $args
	 *
	 * @global string $wp_version wordpress version number
	 *
	 * @since 1.0.0
	 * @return bool|array|object
	 */
	public static function fetch_json_data( $url, $args = array() ) {

		global $wp_version;

		$auth = apply_filters( 'better-framework/oculus/request/auth', array() );
		$args = wp_parse_args( $args, array(

			'headers'    => array(),
			'user-agent' => 'BetterStudioApi Domain:' . home_url( '/' ) .
			                '; WordPress/' . $wp_version . '; Migrator/' . Migrator_Client::VERSION . ';',
		) );

		$args['headers'] = wp_parse_args( array(
			'envato-purchase-code'       => isset( $auth['purchase_code'] ) ? $auth['purchase_code'] : '',
			'better-studio-item-id'      => isset( $auth['item_id'] ) ? $auth['item_id'] : '',
			'better-studio-item-version' => isset( $auth['version'] ) ? $auth['version'] : 0,
			'locale'                     => get_locale(),
		), $args['headers'] );
		$raw_response    = wp_remote_post( $url, $args );

		if ( ! is_wp_error( $raw_response ) && 200 == wp_remote_retrieve_response_code( $raw_response ) ) {

			$assoc    = ! empty( $args['assoc'] );
			$response = json_decode( wp_remote_retrieve_body( $raw_response ), $assoc );

			return $response;
		}

		return FALSE;
	}
}
