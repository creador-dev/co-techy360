<?php


class BF_Gutenberg_BF_Repeater extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		$default_params = wp_parse_args(
			isset( $this->field['default'][0] ) ? $this->field['default'][0] : array(),
			array_fill_keys( array_keys( $this->children_items_list() ), '' )
		);

		return array(
			'defaultParams' => $default_params,
			'label'         => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'addLabel'      => isset( $this->field['add_label'] ) ? $this->field['add_label'] : __( 'Add', 'publisher' ),
			'deleteLabel'   => isset( $this->field['delete_label'] ) ? $this->field['delete_label'] : __( 'Delete', 'publisher' ),
			'itemTitle'     => isset( $this->field['item_title'] ) ? $this->field['item_title'] : __( 'Item', 'publisher' ),
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Repeater';
	}


	/**
	 * Return value data type.
	 *
	 * @since 3.9.0
	 * @return string
	 */
	public static function data_type() {

		return 'array';
	}


	public function children_items_list() {

		return isset( $this->field['options'] ) ? $this->field['options'] : array();
	}


	public function children_item( $item ) {

		$item['repeater_item'] = $this->field['id'];

		return $item;
	}
}
