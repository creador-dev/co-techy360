<?php


class BF_Gutenberg_BF_Sorter_Checkbox extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label' => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'desc'  => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'items' => $this->listItems(),
		);
	}


	/**
	 * @return array
	 */
	public function listItems() {

		$this->prepare_deferred_options();

		$items = array();

		if ( empty( $this->field['options'] ) ) {

			return $items;
		}

		foreach ( $this->field['options'] as $item_id => $item ) {

			$item['id']       = $item_id;
			$item['cssClass'] = isset( $item['css-class'] ) ? $item['css-class'] : '';

			unset( $item['css-class'] );

			array_push( $items, $item );
		}

		return $items;
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Sorter_Checkbox';
	}


	/**
	 * Return value data type.
	 *
	 * @since 3.9.0
	 * @return string
	 */
	public static function data_type() {

		return 'object';
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
