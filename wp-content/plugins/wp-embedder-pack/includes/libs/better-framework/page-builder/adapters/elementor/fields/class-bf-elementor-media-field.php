<?php


class BF_Elementor_Media_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'type'        => 'media',
			'show_label'  => ! empty( $this->field['show_input'] ),
			'label_block' => ! empty( $this->field['show_input'] ),
		);
	}
}
