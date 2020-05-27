<?php


/**
 * Class BF_KC_Front_End_Generator
 *
 * @since 4.0.0
 */
class BF_KC_Fields_Generator extends BF_Admin_Fields {

	/**
	 * Holds Items Array
	 *
	 * @since  1.0
	 * @access public
	 * @var array|null
	 */
	public $item;

	/**
	 * Panel ID
	 *
	 * @since  1.0
	 * @access public
	 * @var string
	 */
	public $id;


	/**
	 * Constructor
	 *
	 * @param array $item Contain details of one field
	 * @param       $id
	 */
	public function __construct( $item = array(), $id = array() ) {

		$generator_options = array(
			'fields_dir'    => BF_PATH . 'page-builder/generators/kc/fields/',
			'templates_dir' => BF_PATH . 'page-builder/generators/kc/templates/'
		);

		parent::__construct( $generator_options );

		$item['input_class'] = 'kc-param';

		$this->item = $item;
		$this->id   = $id;
	}


	/**
	 * Display HTML output of panel array
	 *
	 * Display full html of panel array which is defined in object parameter
	 *
	 * @since  1.0
	 * @access public
	 * @return string
	 */
	public function get_field() {

		$output = '';
		$field  = $this->item;

		if ( ! isset( $field['value'] ) && isset( $field['std'] ) ) {
			$field['value'] = $field['std'];
		}

		$output .= $this->section(
			call_user_func(
				array( $this, $field['type'] ),
				$field
			),
			$field
		);

		return $output;
	}
}
