<?php


interface Migrator_Is_Controller {

	/**
	 * Fire a method on the controller
	 *
	 * @param string $controller
	 * @param string $method
	 * @param        $args
	 * @param        $echo
	 *
	 * @return \Migrator_Is_Controller
	 * @since 1.0.0
	 */
	public static function controller_call_method( $controller, $method, $args, $echo );
}