<?php


class BF_Gutenberg_BF_Info extends BF_Gutenberg_Field_Transformer {

	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		$label = $this->field['name'];
		$note  = $this->field['std'];

		if ( isset( $this->field['state'] ) ) {
			$state = $this->field['state'];
		}
		if ( isset( $this->field['info-type'] ) ) {
			$level = $this->field['info-type'];
		}

		return compact( 'label', 'note', 'state', 'level' );
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Info';
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
