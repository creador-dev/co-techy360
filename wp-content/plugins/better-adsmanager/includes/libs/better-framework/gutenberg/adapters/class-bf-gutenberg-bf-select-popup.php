<?php


class BF_Gutenberg_BF_Select_Popup extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label' => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'desc'  => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'data'  => $this->prepare_public_data(),
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Select_Popup';
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


	/**
	 * @return array
	 */
	protected function prepare_public_data() {

		if ( ! function_exists( 'bf_field_extra_options' ) ) {

			require BF_PATH . 'core/field-generator/functions.php';
		}

		$this->prepare_deferred_options();

		$public_data = wp_array_slice_assoc( $this->field, bf_field_extra_options( 'select_popup' ) );

		if ( ! isset( $this->field['options'] ) ) {
			return $public_data;
		}

		foreach ( (array) $this->field['options'] as $key => $option ) {
			if ( empty( $option['info'] ) ) {
				$option['info'] = array();
			}
			$option['info']['img']   = $option['img'];
			$option['info']['label'] = $option['label'];

			if ( isset( $option['badges'] ) ) {
				$option['info']['badges'] = $option['badges'];
			}
			if ( isset( $option['class'] ) ) {
				$option['info']['class'] = $option['class'];
			}
			if ( ! empty( $option['current_img'] ) ) {
				$option['info']['current_img'] = $option['current_img'];
			}

			$public_data['options'][ $key ] = bf_map_deep( $option['info'], 'sanitize_text_field' );
		}

		if ( ! isset( $public_data['texts']['box_pre_title'] ) ) {
			$public_data['texts']['box_pre_title'] = __( 'Active item', 'better-studio' );
		}

		if ( ! isset( $public_data['texts']['box_button'] ) ) {
			$public_data['texts']['box_button'] = __( 'Change', 'better-studio' );
		}

		if ( ! isset( $public_data['texts']['default_text'] ) ) {
			$public_data['texts']['default_text'] = __( 'chose one...', 'better-studio' );
		}

		return $public_data;
	}


	/**
	 * @return mixed
	 */
	protected function prepare_deferred_options() {

		if ( isset( $this->field['options'] ) ) {
			return;
		}

		if ( ! isset( $this->field['deferred-options'] ) ) {
			return;
		}

		$this->field['options'] = array();

		if ( is_string( $this->field['deferred-options'] ) && is_callable( $this->field['deferred-options'] ) ) {

			$this->field['options'] = call_user_func( $this->field['deferred-options'] );

		} elseif ( is_array( $this->field['deferred-options'] ) && ! empty( $this->field['deferred-options']['callback'] ) && is_callable( $this->field['deferred-options']['callback'] ) ) {

			if ( isset( $this->field['deferred-options']['args'] ) ) {

				$this->field['options'] = call_user_func_array( $this->field['deferred-options']['callback'], $this->field['deferred-options']['args'] );

			} else {

				$this->field['options'] = call_user_func( $this->field['deferred-options']['callback'] );
			}
		}
	}
}
