<?php


class Better_Social_Counter_Utilities {

	/**
	 * @var WP_Error|string
	 */
	public static $last_http_error = '';


	/**
	 * Pick an index from given array
	 *
	 * @param array                $array
	 * @param array|string|boolean $indexes
	 *
	 * @since 1.0.0
	 * @return mixed
	 */
	public static function get_array_index( &$array, $indexes = false ) {

		if ( $indexes !== false ) {

			if ( filter_var( $indexes, FILTER_VALIDATE_INT ) !== false ) {
				$indexes = array( filter_var( $indexes, FILTER_VALIDATE_INT ) );
			} elseif ( ! is_array( $indexes ) ) {
				$indexes = explode( '.', $indexes );
			} elseif ( count( $indexes ) === 1 ) {
				$indexes = explode( '.', $indexes[0] );
			}

			return self::_get_array_index( $indexes, $array );

		} else {

			return $array;
		}
	}


	/**
	 * Internal handy function for get_array_index
	 *
	 * @param $indexes
	 * @param $data
	 *
	 * @return null
	 */
	private static function _get_array_index( $indexes, $data ) {

		if ( is_array( $indexes ) ) {

			$current = array_shift( $indexes );

			if ( isset( $data[ $current ] ) ) {

				if ( count( $indexes ) >= 1 ) {
					return self::_get_array_index( $indexes, $data[ $current ] );
				} else {
					return $data[ $current ];
				}

			} else {

				return NULL;
			}
		}

		if ( isset( $data[ current( $indexes ) ] ) ) {

			return $data[ current( $indexes ) ];

		} else {

			return NULL;
		}
	}


	/**
	 * Push $value into $data
	 *
	 * @param array  &$array
	 * @param string &$id
	 * @param mixed  &$value
	 *
	 * @since  1.0.0
	 */
	public static function push_value( &$array, &$id, &$value ) {

		$ref = &$array;

		foreach ( explode( '.', $id ) as $index ) {

			if ( is_string( $ref ) ) { // if is not array it cause php error, illegal index
				return;
			}

			if ( ! isset( $ref[ $index ] ) ) {
				$ref[ $index ] = array();
			}

			$ref = &$ref[ $index ];
		}

		$ref = $value;
	}


	/**
	 * Pop $index from $data
	 *
	 * @param array  &$array
	 * @param string &$id
	 *
	 * @since  1.0.0
	 *
	 * @return mixed
	 */
	public static function pop_value( &$array, &$id ) {

		$ref = &$array;

		$explode = explode( '.', $id );
		$last    = array_pop( $explode );

		foreach ( $explode as $index ) {

			if ( is_string( $ref ) ) { // if is not array it cause php error, illegal index
				return NULL;
			}

			if ( ! isset( $ref[ $index ] ) ) {
				$ref[ $index ] = array();
			}

			$ref = &$ref[ $index ];
		}

		if ( isset( $ref[ $last ] ) ) {

			$pop = $ref[ $last ];
			unset( $ref[ $last ] );

			return $pop;
		}

		return NULL;
	}


	/**
	 * Request and fetch data from an api endpoint
	 *
	 * @param string $endpoint_url
	 * @param array  $args
	 * @param bool   $raw_data
	 *
	 * @return array|string
	 */
	public static function request( $endpoint_url, $args = array(), $raw_data = false ) {

		self::$last_http_error = '';

		$remote = wp_remote_get( $endpoint_url, $args );

		if ( ! $remote ) {

			self::$last_http_error = new WP_Error( 'failed_to_connect', __( 'Failed to connect to the server', 'better-social-counter' ) );

			return array();
		}

		if ( is_wp_error( $remote ) ) {

			self::$last_http_error = $remote;

			return array();
		}

		if ( wp_remote_retrieve_response_code( $remote ) !== 200 ) {

			self::$last_http_error = new WP_Error( 'invalid_status', __( 'Invalid Status code.', 'better-social-counter' ), compact( 'remote' ) );

			return array();
		}

		$response = wp_remote_retrieve_body( $remote );

		if ( ! $raw_data ) {
			$response = json_decode( $response, true );
		}

		return $response;
	}


	/**
	 * @param string $html
	 *
	 * @return bool|simple_html_dom
	 */
	public static function dom( $html ) {

		if ( ! function_exists( 'str_get_html' ) ) {
			include Better_Social_Counter()->dir_path() . '/includes/libs/simple_html_dom.php';
		}

		return str_get_html( $html );
	}


	/**
	 * Format number to human friendly style
	 *
	 * @param $number
	 *
	 * @return string
	 */
	public static function format_number( $number ) {

		if ( ! is_numeric( $number ) ) {
			return $number;
		}

		if ( $number >= 1000000 ) {
			return round( ( $number / 1000 ) / 1000, 1 ) . "M";
		} elseif ( $number >= 100000 ) {
			return round( $number / 1000, 0 ) . "k";
		} else {
			return @number_format( $number );
		}
	}

}