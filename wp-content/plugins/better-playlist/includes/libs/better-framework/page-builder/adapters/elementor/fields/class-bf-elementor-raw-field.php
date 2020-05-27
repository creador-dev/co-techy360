<?php


class BF_Elementor_Raw_Field extends BF_Elementor_Field_Transformer {

	/**
	 * @return array
	 */
	public function transform_field() {

		$raw = $this->raw_code();

		return compact( 'raw' );
	}


	/**
	 * @return string
	 */
	public function raw_code() {

		if ( ! isset( $this->field['input_callback'] ) ) {
			return '';
		}

		if ( is_array( $this->field['input_callback'] ) ) {

			$callback = $this->field['input_callback']['callback'];

			if ( isset( $this->field['input_callback']['args'][0] ) ) {

				$callback_args = $this->field['input_callback']['args'];

				$callback_args[0]['field_options'] = $this->field;
			} else {

				$callback_args = array( array( 'field_options' => $this->field ) );
			}

		} else {

			$callback = $this->field['input_callback'];

			$callback_args = array( array( 'field_options' => $this->field ) );
		}

		ob_start();

		call_user_func_array( $callback, $callback_args );

		return ob_get_clean();
	}
}
