<?php


class BF_Elementor_Slider_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		if ( isset( $this->field['min'] ) ) {
			$min = $this->field['min'];
		}

		if ( isset( $this->field['max'] ) ) {
			$max = $this->field['max'];
		}

		$step = 1;

		return array(
			'type'  => 'slider',
			'range' => compact( 'min', 'max', 'step' ),
		);
	}
}
