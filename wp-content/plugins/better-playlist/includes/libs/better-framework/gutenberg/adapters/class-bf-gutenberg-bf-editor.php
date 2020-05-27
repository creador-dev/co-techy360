<?php


class BF_Gutenberg_BF_Editor extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'    => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'type'     => isset( $this->field['type'] ) ? $this->field['type'] : '',
			'lang'     => isset( $this->field['lang'] ) ? $this->field['lang'] : '',
			'desc'     => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'maxLines' => isset( $this->field['max-lines'] ) ? $this->field['max-lines'] : '',
			'minLines' => isset( $this->field['min-lines'] ) ? $this->field['min-lines'] : '',
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Editor';
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
