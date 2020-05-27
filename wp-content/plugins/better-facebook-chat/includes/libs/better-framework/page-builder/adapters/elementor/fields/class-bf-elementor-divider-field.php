<?php


class BF_Elementor_Divider_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		return array(
			'type'      => 'divider',
			'separator' => 'after',
		);
	}
}
