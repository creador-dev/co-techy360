<?php


class BF_Elementor_Radio_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'options' => $this->field['options']
		);
	}
}
