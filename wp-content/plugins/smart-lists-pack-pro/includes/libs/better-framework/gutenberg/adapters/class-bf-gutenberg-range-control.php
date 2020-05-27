<?php


class BF_Gutenberg_Range_Control extends BF_Gutenberg_Field_Transformer {

	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		$field = array(
			'label' => $this->field['name'],
		);

		if ( isset( $this->field['desc'] ) ) {
			$field['desc'] = $this->field['desc'];
		}

		if ( isset( $this->field['min'] ) ) {
			$field['min'] = $this->field['min'];
		}

		if ( isset( $this->field['max'] ) ) {
			$field['max'] = $this->field['max'];
		}

		if ( isset( $this->field['std'] ) ) {
			$field['initialPosition'] = $this->field['std'];
		}


		return $field;
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'RangeControl';
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
