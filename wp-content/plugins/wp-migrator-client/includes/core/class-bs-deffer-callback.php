<?php


/**
 * Better Error Handler Class
 *
 * @since     1.0.0
 *
 * @package   Better_Plugin_Core/BS_Deffer_Callback
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 *
 * TODO: Add support for priority
 */
class BS_Deffer_Callback implements Queue_Able {

	/**
	 *
	 * Store callbacks to fire in future.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private static $stack = array();


	/**
	 * Register new queue
	 *
	 * @param string  $hook     wp hook name.
	 * @param array   $data     {
	 *
	 * @type callable $callback .
	 * @type array    $params   .
	 * }
	 *
	 * @since 1.0.0
	 * @return bool true on success
	 */
	public static function queue( $hook, array $data ) {

		if ( ! self::can_queue( $hook ) ) {
			return FALSE;
		}

		$queue_callback = array( __CLASS__, 'run_queue' );

		if ( ! has_action( $hook, $queue_callback ) ) {

			add_action( $hook, $queue_callback );
		}

		self::set_stack( $hook, $data );

		return TRUE;

	}


	/**
	 * Get list of the all items in the queue.
	 *
	 * @param string $queue_id
	 *
	 * @since 1.0.0
	 * @return array array on success or false on failure.
	 * @see   queue for more doc
	 */
	public static function get_stack( $queue_id ) {

		if ( isset( self::$stack[ $queue_id ] ) ) {
			return self::$stack[ $queue_id ];
		}

		return array();
	}


	/**
	 * Push an item into queue list
	 *
	 * @param string $queue_id
	 * @param array  $data
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function set_stack( $queue_id, array $data ) {

		self::$stack[ $queue_id ] [] = $data;
	}


	public static function can_queue( $hook ) {

		return ! did_action( $hook );
	}


	/**
	 *
	 *
	 * @param string $queue_id n
	 */
	public static function run_queue( $queue_id = '' ) {

		$hook_id = current_filter();

		if ( $callbacks_info = self::get_stack( $hook_id ) ) {

			foreach ( $callbacks_info as $callback_info ) {

				$cb     = &$callback_info['callback'];
				$params = array();

				if ( isset( $callback_info['params'] ) ) {
					$params = &$callback_info['params'];
				}

				call_user_func_array( $cb, $params );
			}
		}
	}
}