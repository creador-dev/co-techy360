<?php


class BF_Gutenberg_BF_Image_Preview extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {


		$urls = array();

		if ( empty( $this->field['value'] ) && isset( $this->field['std'] ) ) {

			$urls = (array) $this->field['std'];

		} elseif ( isset( $this->field['value'] ) ) {

			$urls = (array) $this->field['value'];
		}

		$align = isset( $this->field['align'] ) ? $this->field['align'] : '';

		return compact( 'urls', 'align' );
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Image_Preview';
	}


	/**
	 * Return value data type.
	 *
	 * @since 3.9.0
	 * @return string
	 */
	public static function data_type() {

		return '';
	}
}
