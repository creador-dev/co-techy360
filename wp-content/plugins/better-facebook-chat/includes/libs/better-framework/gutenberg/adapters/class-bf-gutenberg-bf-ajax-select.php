<?php


class BF_Gutenberg_BF_Ajax_Select extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		unset( $this->field['get_name'] );
		unset( $this->field['type'] );

		$this->field['label'] = isset( $this->field['name'] ) ? $this->field['name'] : '';

		unset( $this->field['name'] );


		return $this->field;
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Ajax_Select';
	}


	/**
	 * Return value data type.
	 *
	 * @return string
	 */
	public static function data_type() {

		return 'string';
	}
}
