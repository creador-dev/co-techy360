<?php


class BF_Gutenberg_BF_Code extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'             => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'lang'              => isset( $this->field['lang'] ) ? $this->field['lang'] : '',
			'desc'              => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'placeholder'       => isset( $this->field['placeholder'] ) ? $this->field['placeholder'] : '',
			'lineNumbers'       => empty( $this->field['line_numbers'] ) ? 'disable' : 'enable',
			'autoCloseBrackets' => empty( $this->field['auto_close_brackets'] ) ? 'disable' : 'enable',
			'autoCloseTags'     => empty( $this->field['auto_close_tags'] ) ? 'disable' : 'enable',
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Code';
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
