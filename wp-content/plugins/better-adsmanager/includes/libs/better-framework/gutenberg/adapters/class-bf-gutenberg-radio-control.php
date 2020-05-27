<?php


class BF_Gutenberg_Radio_Control extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		$options = array();

		foreach ( $this->field['options'] as $value => $label ) {

			$options[] = compact( 'value', 'label' );
		}
		$label = $this->field['name'];

		return compact( 'label', 'options' );
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'RadioControl';
	}


	/**
	 * Return value data type.
	 *
	 * @since 3.9.0
	 * @return string
	 */
	public static function data_type() {

		return 'string';
	}

}
