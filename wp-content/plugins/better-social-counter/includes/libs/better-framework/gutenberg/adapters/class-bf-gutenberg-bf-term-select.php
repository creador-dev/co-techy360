<?php


class BF_Gutenberg_BF_Term_Select extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'  => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'desc'   => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'labels' => array(
				'help'         => __( 'Help: Click on check box to', 'better-studio' ),
				'not_selected' => __( 'Not Selected', 'better-studio' ),
				'selected'     => __( 'Selected', 'better-studio' ),
				'excluded'     => __( 'Excluded', 'better-studio' ),
			),

			'taxonomy' => isset( $this->field['taxonomy'] ) ? $this->field['taxonomy'] : 'category',
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Term_Select';
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
