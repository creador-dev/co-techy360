<?php


class BF_Elementor_Switcher_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'type'      => 'switcher',
			'label_on'  => isset( $this->field['on-label'] ) ? $this->field['on-label'] : '',
			'label_off' => isset( $this->field['off-label'] ) ? $this->field['off-label'] : '',
		);
	}
}
