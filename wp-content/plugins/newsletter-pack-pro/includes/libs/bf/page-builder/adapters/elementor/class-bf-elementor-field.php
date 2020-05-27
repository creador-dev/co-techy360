<?php


abstract class BF_Elementor_Field_Transformer {

	/**
	 * @var array
	 */
	protected $field;


	/**
	 *
	 * @return array
	 */
	abstract public function transform_field();


	/**
	 * @param array $field
	 */
	public function init( $field ) {

		$this->field = $field;
	}


	/**
	 * @param string $index
	 *
	 * @return mixed
	 */
	public function field( $index = '' ) {

		if ( $index ) {

			return isset( $this->field[ $index ] ) ? $this->field[ $index ] : null;
		}

		return $this->field;
	}
}
