<?php


class Resumable_Migration_Util {

	public static $key = 'wp-migrator-step-id';

	/**
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $class_name = '';


	/**
	 * Resumable_Migration_Handler constructor.
	 *
	 * @param string $class_name
	 */
	public function __construct( $class_name ) {

		$this->class_name = $class_name;
	}

	public function get_migration_percentage() {

	}

	public function is_resumable() {

	}

	public function generate_unique_id() {

		return mg_generate_uuid4();
	}

	public function the_id() {


	}
}
