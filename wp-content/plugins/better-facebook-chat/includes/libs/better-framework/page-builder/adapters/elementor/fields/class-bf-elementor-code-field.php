<?php


class BF_Elementor_Code_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'type'     => 'code',
			'language' => isset( $this->field['lang'] ) ? $this->field['lang'] : '',
		);
	}
}
