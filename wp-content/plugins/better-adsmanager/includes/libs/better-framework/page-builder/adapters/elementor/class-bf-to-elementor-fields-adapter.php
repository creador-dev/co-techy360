<?php


class BF_To_Elementor_Fields_Adapter extends BF_Fields_Adapter {

	/**
	 * @var Elementor\Widget_Base
	 */
	protected $widget;


	/**
	 * @var array
	 */
	protected $supported_fields = array();


	public function __construct( array $fields = array(), array $defaults = array() ) {

		parent::__construct( $fields, $defaults );

		$wrapper_class = Better_Framework::factory( 'page-builder' )->wrapper_class( 'Elementor' );

		$wrapper = new $wrapper_class();
		//
		$this->supported_fields = $wrapper->supported_fields();

	}


	/**
	 * @return mixed|WP_Error WP_Error on failure or transformed fields on success.
	 */
	public function transform() {

		if ( empty( $this->fields ) ) {
			return false;
		}

		reset( $this->fields );
		$first_index = key( $this->fields );
		$first_field = $this->fields[ $first_index ];
		//
		end( $this->fields );
		$last_index = key( $this->fields );
		$last_field = $this->fields[ $last_index ];
		//

		if ( ! isset( $first_field['type'] ) ||
		     ! in_array( $first_field['type'], array( 'group', 'tab' ) )
		) {

			$this->widget->start_controls_section(
				'section_title',
				array(
					'label' => $this->widget->get_title(),
				)
			);
		}
		$tab_started = false;

		foreach ( $this->fields as $id => $field ) {

			if ( empty( $field['type'] ) ) {
				continue;
			}

			$type = $field['type'];

			if ( $type === 'group' ) {

				$this->widget->start_controls_section(
					isset( $field['id'] ) ? $field['id'] : $id,
					array(
						'label' => $field['name'],
					)
				);

				continue;
			}

			if ( $type === 'group_close' ) {

				$this->widget->end_controls_section();

				continue;
			}

			if ( $type === 'tab' ) {

				$this->widget->end_controls_section();

				$this->widget->start_controls_section(
					isset( $field['id'] ) ? $field['id'] : $id,
					array(
						'label' => $field['name'],
					)
				);

				$tab_started = true;
			}

			if ( ! in_array( $type, $this->supported_fields ) ) {
				continue;
			}

			if ( empty( $field['id'] ) ) {
				continue;
			}

			if ( $factory = $this->factory( $field ) ) {
				$override_args = $factory->transform_field();
			} else {
				$override_args = array();
			}

			$type_const = strtoupper( $type );

			$this->widget->add_control( $field['id'], array_merge( array(

				'label'       => $field['name'],
				'type'        => defined( "Controls_Manager::$type_const" ) ? Controls_Manager::$type_const : $field['type'],
				'description' => isset( $field['desc'] ) ? $field['desc'] : '',
			), $override_args ) );
		}

		if ( $tab_started ) {
			$this->widget->end_controls_section();
		}

		if ( ! isset( $last_field['type'] ) ||
		     $last_field['type'] !== 'group_close'
		) {

			$this->widget->end_controls_section();
		}


		return true;
	}


	/**
	 * @param \Elementor\Widget_Base $widget
	 */
	public function set_elementor_widget( \Elementor\Widget_Base $widget ) {

		$this->widget = $widget;
	}


	/**
	 * @return \Elementor\Widget_Base
	 */
	public function get_elementor_widget() {

		return $this->widget;
	}


	/**
	 * @param array $field
	 *
	 * @since 3.9.0
	 * @return BF_Elementor_Field_Transformer on success or null on failure.
	 */
	public function factory( array $field ) {

		if ( empty( $field['type'] ) ) {
			return null;
		}

		if ( ! class_exists( 'BF_Elementor_Field_Transformer' ) ) {

			require BF_PATH . 'page-builder/adapters/elementor/class-bf-elementor-field.php';
		}

		switch ( $field['type'] ) {

			case 'custom';

				if ( ! class_exists( 'BF_Elementor_Raw_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-raw-field.php';
				}

				$instance = new BF_Elementor_Raw_Field();

				break;

			case 'hr';

				if ( ! class_exists( 'BF_Elementor_Divider_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-divider-field.php';
				}

				$instance = new BF_Elementor_Divider_Field();

				break;

			case 'wp_editor';

				if ( ! class_exists( 'BF_Elementor_WYSIWYG_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-wysiwyg-field.php';
				}

				$instance = new BF_Elementor_WYSIWYG_Field();

				break;


			case 'editor';

				if ( ! class_exists( 'BF_Elementor_Code_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-code-field.php';
				}

				$instance = new BF_Elementor_Code_Field();

				break;

			case 'switch';

				if ( ! class_exists( 'BF_Elementor_Switcher_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-switcher-field.php';
				}

				$instance = new BF_Elementor_Switcher_Field();

				break;


			case 'select';

				if ( ! class_exists( 'BF_Elementor_Select_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-select-field.php';
				}

				$instance = new BF_Elementor_Select_Field();

				break;

			case 'radio';

				if ( ! class_exists( 'BF_Elementor_Radio_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-radio-field.php';
				}

				$instance = new BF_Elementor_Radio_Field();

				break;

			case 'media_image';

				if ( ! class_exists( 'BF_Elementor_Media_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-media-field.php';
				}

				$instance = new BF_Elementor_Media_Field();

				break;


			case 'slider';

				if ( ! class_exists( 'BF_Elementor_Slider_Field' ) ) {

					require BF_PATH . 'page-builder/adapters/elementor/fields/class-bf-elementor-slider-field.php';
				}

				$instance = new BF_Elementor_Slider_Field();

				break;
		}

		if ( isset( $instance ) ) {
			$instance->init( $field );

			return $instance;
		}

		return null;
	}
}
