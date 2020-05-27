<?php


interface Queue_Able {

	/**
	 * Register new queue
	 *
	 * @param string $queue_id
	 * @param mixed  $data
	 *
	 * @return bool true on success
	 */
	public static function queue( $queue_id, array $data );


	/**
	 * Get list of the all items in the queue.
	 *
	 * @param string $queue_id
	 *
	 * @return array
	 */
	public static function get_stack( $queue_id );


	/**
	 * Push an item into queue list
	 *
	 * @param string $queue_id
	 * @param array  $data
	 *
	 * @return mixed
	 */
	public static function set_stack( $queue_id, array $data );


	/**
	 * Fire a queue by unique id
	 *
	 * @param string $queue_id
	 */
	public static function run_queue( $queue_id = '' );
}