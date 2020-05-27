<?php


class BF_Elementor_Widget_Wrapper extends \Elementor\Widget_Base {

	public $widget_id;


	public function __construct( array $data = [], array $args = null ) {

		if ( isset( $data['widgetType'] ) ) {
			$this->widget_id = $data['widgetType'];
		}

		parent::__construct( $data, $args );
	}


	/**
	 * @var array
	 */
	protected $bf_shortcode_settings = array();


	/**
	 * Get widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return isset( $this->bf_shortcode_settings['id'] ) ? $this->bf_shortcode_settings['id'] : '';
	}


	/**
	 * Get widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return isset( $this->bf_shortcode_settings['name'] ) ? $this->bf_shortcode_settings['name'] : '';
	}


	/**
	 * Get widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return isset( $this->bf_shortcode_settings['icon'] ) ? $this->bf_shortcode_settings['icon'] : '';
	}


	/**
	 * Get widget categories.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {

		if ( isset( $this->bf_shortcode_settings['category'] ) ) {

			return array(
				$this->bf_shortcode_settings['category']
			);
		}

		return array( 'general' );
	}


	/**
	 * Register oEmbed widget controls.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		if ( ! class_exists( 'BF_Fields_Adapter' ) ) {

			require BF_PATH . '/page-builder/class-bf-fields-adapter.php';
		}

		if ( ! class_exists( 'BF_To_Elementor_Fields_Adapter' ) ) {

			require BF_PATH . 'page-builder/adapters/elementor/class-bf-to-elementor-fields-adapter.php';
		}

		BF_Shortcodes_Manager::factory();
		$adapter = new BF_To_Elementor_Fields_Adapter();

		$adapter->set_elementor_widget( $this );


		$adapter->load_fields( $this->shortcode_fields() );
		$adapter->transform();
	}


	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * @access protected
	 */
	protected function render() {

		$content = '';

		echo BF_Shortcodes_Manager::handle_shortcodes(
			$this->attributes(),
			$content,
			$this->widget_id
		);
	}


	/**
	 * @return array
	 */
	protected function attributes() {

		$attrs = $this->get_settings();

		foreach ( $this->attributes_changes() as $id => $index ) {

			if ( ! isset( $attrs[ $id ] ) ) {
				continue;
			}

			$attrs[ $id ] = isset( $attrs[ $id ][ $index ] ) ? $attrs[ $id ][ $index ] : '';
		}

		return $attrs;
	}


	/**
	 * @return array
	 */
	protected function attributes_changes() {

		if ( ! $changes = get_option( 'bf-elementor-fields-comp' ) ) {
			return array();
		}

		return isset( $changes[ $this->widget_id ] ) ? $changes[ $this->widget_id ] : array();
	}


	/**
	 * @param array $settings
	 */
	public function set_bf_shortcode_settings( $settings ) {

		$this->bf_shortcode_settings = $settings;

		if ( ! empty( $settings['id'] ) ) {

			$this->widget_id = $settings['id'];
		}
	}


	/**
	 * @return array
	 */
	public function get_bf_shortcode_settings() {

		return $this->bf_shortcode_settings;
	}


	public function shortcode_fields() {

		$fields = array();

		if ( $shortcode = BF_Shortcodes_Manager::factory( $this->widget_id ) ) {

			$fields = $shortcode->get_fields();

			$this->fields_compatibility( $fields );
		}

		return $fields;
	}


	public function fields_compatibility( &$fields ) {

		$status = get_option( 'bf-elementor-fields-comp', array() );

		foreach ( $fields as $field ) {

			if ( isset( $field['type'] ) && 'media_image' === $field['type'] ) {

				$status[ $this->widget_id ][ $field['id'] ] = isset( $field['data-type'] ) ? $field['data-type'] : 'url';
			}
		}

		update_option( 'bf-elementor-fields-comp', $status );
	}
}
