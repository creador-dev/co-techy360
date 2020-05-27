<?php


class BF_Gutenberg_BF_Background_Image extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'       => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'desc'        => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'uploadLabel' => isset( $this->field['upload_label'] ) ? $this->field['upload_label'] : '',
			'mediaTitle'  => isset( $this->field['media_title'] ) ? $this->field['media_title'] : '',
			'buttonText'  => isset( $this->field['button_text'] ) ? $this->field['button_text'] : '',
			'uploadLabel' => isset( $this->field['upload_label'] ) ? $this->field['upload_label'] : '',
			'removeLabel' => isset( $this->field['remove_label'] ) ? $this->field['remove_label'] : '',
			'inputClass'  => isset( $this->field['input_class'] ) ? $this->field['input_class'] : '',
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Background_Image';
	}


	/**
	 * Return value data type.
	 *
	 * @return string
	 */
	public static function data_type() {

		return 'array';
	}
}
