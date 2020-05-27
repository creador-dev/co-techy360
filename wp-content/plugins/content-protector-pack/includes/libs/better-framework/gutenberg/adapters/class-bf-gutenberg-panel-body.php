<?php


class BF_Gutenberg_Panel_Body extends BF_Gutenberg_Field_Transformer {

	/**
	 * @var bool
	 */
	public $wrap_section_container = false;

	public $first_item = true;


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'title'       => $this->field['name'],
			'initialOpen' => ( isset( $this->field['state'] ) && 'open' === $this->field['state'] ) || $iteration === 1,
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'PanelBody';
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


	public function is_first_panel() {

		if ( $this->first_item ) {

			$this->first_item = false;

			return true;
		}

		return false;
	}
}
