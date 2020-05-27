<?php


class BF_Gutenberg_BF_Icon_Select extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		$label = isset( $this->field['name'] ) ? $this->field['name'] : '';

		return compact( 'label' );
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Icon_Select';
	}


	/**
	 * Return value data type.
	 *
	 * @return string
	 */
	public static function data_type() {

		return 'object';
	}
}
