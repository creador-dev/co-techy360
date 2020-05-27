<?php


/**
 * Better Error Handler Class
 *
 * @since     1.0.0
 *
 * @package   Better_Plugin_Core/Error_Handle
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */


if ( ! class_exists( 'BS_Error_handler' ) ) {

	final class BS_Error_handler {

		//
		// List of the supported error types
		//

		CONST THROW_ERROR = 2;

		CONST WP_ERROR = 4;

		CONST NONE_ERROR = 8;


		/**
		 * @param BS_Exception $e    Exception Class
		 * @param int          $type of the error types.optional. default NONE_ERROR
		 *
		 * @return mixed
		 *
		 * false        if $type === NONE_ERROR
		 * WP_Error     if $type === WP_ERROR
		 * @throws BS_Exception if $type === THROW_ERROR
		 *
		 * @since 1.0.0
		 */
		public static function handle( BS_Exception $e, $type = 0 ) {

			switch ( $type ) {

				case self::THROW_ERROR:

					throw $e;
					break;

				case self::WP_ERROR:

					return new WP_Error( $e->getCode(), $e->getMessage() );
					break;

				case self::NONE_ERROR:
				default:

					return FALSE;

					break;
			}
		}
	}
}
