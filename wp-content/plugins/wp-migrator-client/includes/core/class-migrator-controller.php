<?php


class Migrator_Controller implements Migrator_Is_Controller {

	/**
	 * Create an instance of controller
	 *
	 * @param string $controller
	 * @param string $method
	 * @param        $args
	 * @param bool   $echo
	 *
	 * @return Migrator_Controller
	 * @since 1.0.0
	 */
	public static function controller_call_method( $controller, $method, $args = array(), $echo = FALSE ) {

		/**
		 * @var self $controller
		 */
		$instance = new $controller;

		$instance->setup();

		$result = call_user_func_array( array( $instance, $method ), $args );

		$instance->tear_down();

		if ( $echo ) {

			echo $result;

		} else {

			return $result;
		}
	}

	public function ajax_init() {

	}

	public function setup() {

	}

	public function tear_down() {

	}
}
