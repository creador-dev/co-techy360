<?php


class BF_Gutenberg_BF_Image_Radio extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'   => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'desc'    => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'options' => $this->the_options(),
		);
	}


	/**
	 * @return array
	 */
	protected function the_options() {

		$options = array();

		if ( isset( $this->field['options'] ) ) {

			$options = $this->field['options'];

		} elseif ( isset( $this->field['deferred-options'] ) ) {

			if ( is_callable( $this->field['deferred-options'] ) ) {

				$options = call_user_func( $this->field['deferred-options'] );

			} elseif ( isset( $this->field['deferred-options']['callback'] ) ) {

				if ( isset( $this->field['deferred-options']['args'] ) ) {

					$options = call_user_func_array( $this->field['deferred-options']['callback'], $this->field['deferred-options']['args'] );

				} else {

					$options = call_user_func( $this->field['deferred-options']['callback'] );
				}
			}
		}

		return $this->reformat_options( $options );
	}


	/**
	 * @param array $options
	 *
	 * @return array
	 */
	public function reformat_options( &$options ) {

		$reformatted = array();

		foreach ( $options as $id => $option ) {

			$option['id'] = $id;

			array_push( $reformatted, $option );
		}

		return $reformatted;
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Image_Radio';
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
