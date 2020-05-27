<?php


class BF_Gutenberg_BF_Ajax_Action extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'      => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'buttonName' => isset( $this->field['button-name'] ) ? $this->field['button-name'] : '',
			'callback'   => isset( $this->field['callback'] ) ? $this->field['callback'] : '',
			'confirm'    => isset( $this->field['confirm'] ) ? $this->field['confirm'] : '',
			'token'      => isset( $this->field['callback'] ) ?
				Better_Framework::callback_token( $this->field['callback'] ) : '',
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Ajax_Action';
	}


	/**
	 * Return value data type.
	 *
	 * @return string
	 */
	public static function data_type() {

		return '';
	}
}
