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
 * Class BS_API
 */
final class BetterFramework_Oculus {

	/**
	 * Better Studio API URI
	 *
	 * @var string
	 */
	private $base_urls = array(

		'http://core.betterstudio.com/api/%group%/v1/%action%',
		'http://core-cf.betterstudio.com/api/%group%/v1/%action%',
	);

	/**
	 * self instance
	 *
	 * @var array
	 */
	protected static $instance;

	/**
	 * Oculus base slug
	 *
	 * Created to be flexible for future updates
	 */
	public static $slug = 'oculus';

	/**
	 * Store Authentication params - array {
	 *
	 * @type string|int $item_id       the item id in envato marketplace
	 * @type string     $purchase_code envato purchase code
	 * }
	 *
	 * @var array
	 */
	protected $auth = array();

	/**
	 * Oculus Version
	 */
	const VERSION = '1.1.0';


	/**
	 * Initialize
	 */
	public static function Run() {

		global $bs_oculus;

		if ( $bs_oculus === FALSE ) {
			return;
		}

		if ( ! $bs_oculus instanceof self ) {
			$bs_oculus = new self();
			$bs_oculus->init();
		}

		return $bs_oculus;
	}


	/**
	 * apply filters/actions
	 */
	public function init() {

		$this->include_files();

		add_action( 'admin_init', array( $this, 'register_schedule' ) );
		add_action( 'better-framework/oculus/check-update/init', array( $this, 'check_for_update' ) );
	}


	public function check_for_update() {

		$status       = array(
			'is-rtl'    => is_rtl() ? '1' : '0',
			'languages' => bf_get_all_languages(),
		);
		$slug         = self::$slug;
		$data         = apply_filters( "better-framework/$slug/check-update/data", $status );
		$use_wp_error = FALSE;
		$response     = self::request( 'check-update', compact( 'data', 'use_wp_error' ) );

		if ( $response && ! empty( $response->success ) ) {
			do_action( 'better-framework/oculus/check-update/done', $response, $data );
		}
	}


	/**
	 * Callback: register sync cron job
	 * action  : admin_init
	 */
	public function register_schedule() {

		if ( ! wp_next_scheduled( 'better-framework/oculus/check-update/init' ) ) {
			wp_schedule_event( time(), 'daily', 'better-framework/oculus/check-update/init' );
		}
	}


	/**
	 * Include oculus additional classes
	 */
	protected function include_files() {

		require BS_OCULUS_PATH . 'includes/class-bf-oculus-logger.php';
		require BS_OCULUS_PATH . 'includes/class-bf-oculus-message-manager.php';
	}


	/**
	 * Connect Better Studio API and Retrieve Data From Server
	 *
	 * @param string $action       {@see handle_request}
	 * @param array  $args         {
	 *
	 * @type array   $auth         authentication info {@see $auth}
	 * @type array   $data         array of data to send
	 * @type string  $group        API group name
	 * @type bool    $use_wp_error use wp_error object on failure or always return false
	 * }
	 *
	 * @return bool|WP_Error|array|object bool|WP_Error on failure.
	 */
	public static function request( $action, $args = array() ) {

		try {
			$args = bf_merge_args( $args, array(
				'auth'         => array(),
				'data'         => array(),
				'group'        => 'default',
				'json_assoc'   => FALSE,
				'use_wp_error' => TRUE,
			) );

			$auth = bf_merge_args( $args['auth'], apply_filters( 'better-framework/oculus/request/auth', array() ) );

			if ( ! isset( $auth['item_id'] ) || ! isset( $auth['purchase_code'] ) ) {
				throw new BF_API_Exception( 'invalid authentication data', 'invalid-auth-data' );
			}

			$instance = self::get_instance();
			$instance->set_auth_params( $auth );
			$response = $instance->handle_request( $action, $args['group'], $args['data'], $args['json_assoc'] );

			// auto clean product registration info if purchase-code was not valid!
			if ( isset( $response->result ) && isset( $response->{'error-code'} ) &&
			     $response->result === 'error' && $response->{'error-code'} === 'invalid-purchase-code'
			) {
				if ( function_exists( 'bf_register_product_clear_info' ) ) {
					bf_register_product_clear_info( $auth['item_id'] );
				}
			}

			return $response;
		} catch( Exception $e ) {

			if ( $args['use_wp_error'] ) {
				return new WP_Error( 'error-' . $e->getCode(), $e->getMessage() );
			}

			return FALSE;
		}
	}


	/**
	 * Fetch a remove url
	 *
	 * @param string $url
	 * @param array  $args wp_remote_get() $args
	 *
	 * @return string|false string on success or false|Exception on failure.
	 * @throws Exception
	 */
	public function fetch_data( $url, $args = array() ) {

		global $wp_version;

		if ( is_callable( 'Theme_Name_Translation::factory' ) ) {
			$current_panel_lang = get_option( Theme_Name_Translation::factory()->option_panel_id . bf_get_current_language_option_code() . '-current' );
		} else {
			$current_panel_lang = 'unavailable';
		}

		$defaults = array(
			'timeout'    => 30,
			'user-agent' => 'BetterStudioApi Domain:' . home_url( '/' ) .
			                '; WordPress/' . $wp_version . '; Oculus/' . self::VERSION . ';',
			'headers'    => array(
				'better-studio-item-id'      => $this->auth['item_id'],
				'better-studio-item-version' => isset( $this->auth['version'] ) ? $this->auth['version'] : 0,
				'envato-purchase-code'       => $this->auth['purchase_code'],
				'panel-language'             => $current_panel_lang,
				'locale'                     => get_locale(),
			)
		);

		$args         = bf_merge_args( $args, $defaults );
		$raw_response = wp_remote_post( $url, $args );

		if ( is_wp_error( $raw_response ) ) {
			$error_message = $raw_response->get_error_message();

			if ( preg_match( '/^\s*cURL\s*error\s*(\d+)\s*\:?\s*$/i', $error_message, $match ) && function_exists( 'curl_strerror' ) ) {
				$error_message .= curl_strerror( $match[1] );
			}

			throw new BF_API_Exception( $error_message, $raw_response->get_error_code() );
		}

		$response_code = wp_remote_retrieve_response_code( $raw_response );

		if ( 200 == $response_code ) {
			return wp_remote_retrieve_body( $raw_response );
		} elseif ( 403 == $response_code ) {

			$parse_url = parse_url( $url );
			throw new BF_API_Exception( sprintf( __( 'Server cannot connect to %s', 'better-studio' ), $parse_url['host'] ), $response_code );
		}

		return FALSE;
	}


	/**
	 * Handle API Remove Request
	 *
	 * @param string $action Api action. EX: register_product, check_update,....
	 * @param string $group  Api group
	 * @param array  $data   array of data
	 * @param bool   $assoc  json_decode second parameter
	 *
	 * @return array|false|object array or object on success, false|Exception on failure
	 * @throws Exception
	 */

	public function handle_request( $action, $group, $data, $assoc = FALSE ) {

		$url = str_replace(
			array( '%group%', '%action%' ),
			array( $group, $action ),
			$this->the_base_url()
		);

		$args = array(
			'body' => $data
		);

		if ( $received = $this->fetch_data( $url, $args ) ) {

			return json_decode( $received, $assoc );
		}

		return FALSE;
	}


	/**
	 * Returns live instance of BS_API
	 *
	 * @return self
	 */
	public static function get_instance() {

		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * Set Authentication Params
	 *
	 * @param array $args
	 *
	 * @see   $auth
	 */
	public function set_auth_params( $args ) {

		$this->auth = $args;
	}


	/**
	 * Is given url accessible
	 *
	 * @param string $url
	 *
	 * @since 1.1.0
	 * @return bool true if it does
	 */
	public static function is_host_accessible( $url ) {

		$request = wp_remote_get( $url, array( 'timeout' => bf_is_localhost() ? 10 : 2 ), array( 'sslverify' => FALSE ) );

		return $request && ! is_wp_error( $request ) && 200 === wp_remote_retrieve_response_code( $request );
	}

	/**
	 * Choose an accessible core url from available servers
	 *
	 * @since 1.1.0
	 * @return string
	 */
	protected function the_base_url() {

		static $base_url;

		if ( isset( $base_url ) ) {

			return $base_url;
		}

		reset( $this->base_urls );

		do {

			$base_url   = current( $this->base_urls );
			$parsed_url = parse_url( $base_url );
			$test_url   = sprintf( '%s://%s', $parsed_url['scheme'], $parsed_url['host'] );

			if ( $this->is_host_accessible( $test_url ) ) {

				break;
			}

		} while( next( $this->base_urls ) !== FALSE );

		return $base_url;
	}
}


BetterFramework_Oculus::Run();