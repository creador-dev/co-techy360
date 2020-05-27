<?php


class BF_Widget_Artificial extends BF_Widget {


	/**
	 * @var string
	 */
	protected $shortcode_id;


	/**
	 * @var BF_Shortcode
	 */
	protected $shortcode_instance;


	public function __construct( $shortcode_id ) {

		$this->set_shortcode_id( $shortcode_id );

		if ( ! $this->shortcode_instance ) {
			return;
		}

		$settings = $this->shortcode_instance->page_builder_settings();

		parent::__construct(
			$shortcode_id,
			$settings['name'],
			isset( $settings['description'] ) ? $settings['description'] : ''
		);
	}


	/**
	 * Loads fields
	 */
	public function load_fields() {

		$this->fields = array_values( $this->shortcode_instance->get_fields() );
	}


	/**
	 * @param string $shortcode_id
	 */
	public function set_shortcode_id( $shortcode_id ) {

		$this->shortcode_id       = $shortcode_id;
		$this->shortcode_instance = BF_Shortcodes_Manager::factory(
			$this->shortcode_id, array(), true
		);
	}


	/**
	 * @return string
	 */
	public function get_shortcode_id() {

		return $this->shortcode_id;
	}
}
