<?php


abstract class BF_Fields_Adapter {

	/**
	 * @var array
	 *
	 * @since 4.0.0
	 */
	protected $fields = array();

	/**
	 * @var array
	 *
	 * @since 4.0.0
	 */
	protected $defaults = array();


	/**
	 * @return mixed|WP_Error WP_Error on failure or transformed fields on success.
	 */
	abstract public function transform();


	/**
	 * BF_Fields_Adapter constructor.
	 *
	 * @param array $fields
	 * @param array $defaults
	 *
	 */
	public function __construct( array $fields = array(), array $defaults = array() ) {

		$this->load_fields( $fields );
		$this->load_defaults( $defaults );
	}


	/**
	 * @param array $fields
	 *
	 * @return bool true on success
	 */
	public function load_fields( array $fields ) {

		$this->fields = $fields;

		return true;
	}


	/**
	 * @param array $defaults
	 *
	 * @return bool true on success
	 */
	public function load_defaults( array $defaults ) {

		$this->defaults = $defaults;

		return true;
	}
}
