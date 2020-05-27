<?php


class BF_Gutenberg_Textarea_Control extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label' => $this->field['name'],
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'TextareaControl';
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
