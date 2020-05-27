<?php


class BF_Elementor_WYSIWYG_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'type' => 'wysiwyg',
		);
	}
}
