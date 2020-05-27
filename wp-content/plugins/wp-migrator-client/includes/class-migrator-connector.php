<?php


/**
 * Migrator Remote API Interface
 *
 * @since     1.0.0
 *
 * @package   WP-Migrator/Remote/Connector
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */
class Migrator_Connector {

	/**
	 * Cache requests response
	 *
	 * @since 1.0.0
	 * @var bool
	 */
	public static $cache = TRUE;

	/**
	 * Cache life duration
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	public static $cache_duration = 600; // 10 minutes


	/**
	 * Save last http error
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	public static $last_error = array();

	/**
	 * Get a theme information
	 *
	 * @param string $product_id
	 * @param string $product_type theme or plugin
	 * @param string $version      version number or latest
	 *
	 * @since 1.0.0
	 *
	 * @return array|bool false on failure.
	 */
	public static function product_info( $product_id, $product_type, $version = 'latest' ) {

		if ( $result = self::request( 'get-product-migration-info', compact( 'product_id', 'version', 'product_type' ) ) ) {
			return $result;
		}

		return FALSE;
	}


	/**
	 * Fetch list of themes from server
	 *
	 * @param int $offset
	 * @param int $limit
	 *
	 * @since 1.0.0
	 * @return array|bool array on success
	 */
	public static function products_list( $offset = 0, $limit = 300 ) {

		return self::request( 'get-products', compact( 'offset', 'limit' ), TRUE );
	}

	/**
	 * Fetch product migration-configuration information
	 *
	 * @param string $product_type . plugin or theme
	 * @param string $product_id
	 *
	 * @since 1.0.0
	 * @return array none empty array on success
	 */
	public static function config( $product_type, $product_id ) {

		if ( $result = self::request( 'config', compact( 'product_type', 'product_id' ) ) ) {

			if ( ! empty( $result['config'] ) ) {
				return $result['config'];
			}
		}

		return array();
	}


	/**
	 * Migrate the product data to sa!
	 *
	 * @since 1.0.0
	 *
	 * @param string $product_type . plugin or theme
	 * @param string $source_product_id
	 * @param string $destination_product_id
	 * @param string $source_product_version
	 * @param string $destination_product_version
	 * @param array  $data
	 *
	 * @return array|bool migrated info as array or false on failure.
	 */
	public static function migrate( $product_type, $source_product_id, $destination_product_id, $source_product_version, $destination_product_version, $data ) {

		return self::request(
			'migrate',
			compact(
				'data',
				'product_type',
				'source_product_id',
				'destination_product_id',
				'source_product_version',
				'destination_product_version'
			)
		);

	}


	/**
	 * Fetch configuration about how to detect theme/plugin on this WordPress installation
	 *
	 * @param string $product_types themes or
	 *
	 * @return array|bool configuration array on success or false on failure.
	 */
	public static function product_detector( $product_types ) {

		return self::request(
			'detector',
			compact(
				'product_types'
			)
		);
	}

	/**
	 * Fire a web service callback
	 *
	 * @param string $endpoint
	 * @param array  $data
	 * @param bool   $can_cache
	 *
	 * @return array|bool array on success
	 * @since 1.0.0
	 */
	public static function request( $endpoint, $data = array(), $can_cache = FALSE ) {

		$can_cache = self::$cache && ( $can_cache || empty( $data ) );

		if ( $can_cache ) {

			if ( $cache = self::cache_read( $endpoint ) ) {
				return $cache;
			}
		}

		$request = Migrator_Core_Connector::request( $endpoint, $data );

		if ( ! empty( $request['success'] ) ) {

			if ( $can_cache ) {
				self::cache_save( $endpoint, $request );
			}

			return $request;
		}

		if ( isset( $request['result'] ) && $request['result'] === 'error' ) {

			self::$last_error = array( $request['error-message'], $request['error-code'] );

		} else {

			self::$last_error = array( 'unknown', 'unknown' );
		}

		return FALSE;
	}


	/**
	 * Read cache storage data
	 *
	 * @param string $endpoint
	 *
	 * @since 1.0.0
	 *
	 * @return mixed
	 */
	public static function cache_read( $endpoint ) {

		return get_transient( "wp-migrator-$endpoint" );
	}


	/**
	 * Save data to cache storage
	 *
	 * @param string $endpoint
	 * @param mixed  $data
	 *
	 * @since 1.0.0
	 *
	 * @return bool true on successfully save
	 */
	public static function cache_save( $endpoint, $data ) {

		return set_transient( "wp-migrator-$endpoint", $data, self::$cache_duration );
	}
}
