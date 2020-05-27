<?php


class BF_Elementor_Select_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'options' => isset( $this->field['options'] ) ? $this->field['options'] : array(),
		);
	}
}
