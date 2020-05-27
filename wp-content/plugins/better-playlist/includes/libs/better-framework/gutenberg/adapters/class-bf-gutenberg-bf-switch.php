<?php


class BF_Gutenberg_BF_Switch extends BF_Gutenberg_Field_Transformer {

	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'    => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'onLabel'  => ! empty( $this->field['on-label'] ) ? $this->field['on-label'] : __( 'On', 'better-studio' ),
			'offLabel' => ! empty( $this->field['off-label'] ) ? $this->field['off-label'] : __( 'Off', 'better-studio' ),
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Switch';
	}


	/**
	 * Return value data type.
	 *
	 * @since 3.9.0
	 * @return string
	 */
	public static function data_type() {

		return 'string';
	}
}
