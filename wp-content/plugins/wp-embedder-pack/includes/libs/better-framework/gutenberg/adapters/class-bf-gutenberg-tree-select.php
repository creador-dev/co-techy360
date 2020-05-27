<?php


class BF_Gutenberg_Tree_Select extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return array
	 */
	public function transform_field( $iteration ) {

		$label = $this->field['name'];
		$tree  = array();

		// set options from deferred callback

		if ( isset( $this->field['deferred-options'] ) ) {

			if ( is_callable( $this->field['deferred-options'] ) ) {
				$this->field['options'] = call_user_func( $this->field['deferred-options'] );
			} elseif ( is_array( $this->field['deferred-options'] ) && ! empty( $this->field['deferred-options']['callback'] ) && is_callable( $this->field['deferred-options']['callback'] ) ) {

				if ( isset( $this->field['deferred-options']['args'] ) ) {
					$this->field['options'] = call_user_func_array( $this->field['deferred-options']['callback'], $this->field['deferred-options']['args'] );
				} else {
					$this->field['options'] = call_user_func( $this->field['deferred-options']['callback'] );
				}
			}

		}

		if ( ! isset( $this->field['options'] ) ) {

			return array();
		}

		foreach ( $this->field['options'] as $id => $name ) {

			if ( is_array( $name ) ) {

				$tree[] = $this->parse_grouped_field( $name, $id );

			} else {

				$tree[] = compact( 'id', 'name' );
			}
		}

		return compact( 'label', 'tree' );
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'TreeSelect';
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
	 * @link https://wordpress.org/gutenberg/handbook/block-api/attributes/
	 *
	 * @return array
	 */
	public function the_attribute() {

		$enum = array();

		if ( isset( $this->field['options'] ) ) {
			$enum = array_keys( $this->field['options'] );

			foreach ( $this->field['options'] as $key => $option ) {

				$enum[] = $key;

				if ( ! empty( $option['options'] ) && is_array( $option['options'] ) ) {

					$enum = array_merge( $enum, array_keys( $option['options'] ) );
				}
			}

			$enum = array_values( array_unique( $enum ) );
		}

		return array_merge( parent::the_attribute(), compact( 'enum' ) );
	}


	/**
	 * @param $option
	 * @param $id
	 *
	 * @return array
	 */
	protected function parse_grouped_field( $option, $id ) {

		$children = array();

		if ( ! empty( $option['options'] ) ) {

			foreach ( $option['options'] as $child_id => $child_name ) {

				$children[] = array(
					'id'   => $child_id,
					'name' => $child_name,
				);
			}
		}

		$name = $option['label'];

		return compact( 'id', 'name', 'children' );
	}
}
