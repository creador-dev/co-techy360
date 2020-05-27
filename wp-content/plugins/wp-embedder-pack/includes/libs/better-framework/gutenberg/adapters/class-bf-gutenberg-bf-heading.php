<?php


class BF_Gutenberg_BF_Heading extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		$title  = $this->field['name'];
		$layout = '';

		if ( isset( $this->field['layout'] ) ) {
			$layout = $this->field['layout'];
		}

		return compact( 'title', 'layout' );
	}


	/**
	 * The component name.
	 *
	 * @return string
	 *
	 */
	public function component() {

		return 'BF_Heading';
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
