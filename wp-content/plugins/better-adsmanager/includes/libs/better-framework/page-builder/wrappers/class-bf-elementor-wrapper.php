<?php


class BF_Elementor_Wrapper extends BF_Page_Builder_Wrapper {

	/**
	 * @var array
	 */
	protected $elementor_built_in_fields = array(
		'text',
		'heading',
		'hr',
		'textarea',
		'wp_editor',
		'code',
		'switch',
		'select',
		'radio',
		'color',
		'media_image',
		'slider',
	);

	/**
	 * @var array
	 */
	protected $wrapper_fields_list = array(
		//		'date',
		//		'checkbox',
		//		'ajax_select',
		//		'ajax_action',
		//		'sorter',
		//		'sorter_checkbox',
		//		'media',
		//		'background_image',
		//		'image_upload',
		//		'image_checkbox',
		//		'image_radio',
		//		'image_select',
		//		'icon_select',
		//		'typography',
		//		'border',
		//		'export',
		//		'import',
		//		'custom',
		//		'group_close',
		//		'editor',
		//		'term_select',
		//		'image_preview',
		//		'select_popup',
		'info',
	);


	/**
	 * Register supported fields.
	 *
	 * @return bool true on success.
	 */
	public function register_fields() {

		if ( ! class_exists( 'BF_Elementor_Control_Wrapper' ) ) {

			require BF_PATH . 'page-builder/wrappers/class-bf-elementor-control-wrapper.php';
		}

		foreach ( $this->wrapper_fields_list as $field_type ) {

			$control = new BF_Elementor_Control_Wrapper();
			$control->set_bf_field_type( $field_type );

			\Elementor\Plugin::$instance->controls_manager->register_control( $field_type, $control );
		}

		return true;
	}


	/**
	 * Register shortcode map.
	 *
	 * @param array $settings
	 * @param array $fields transformed fields
	 *
	 * @return bool true on success
	 */
	public function register_map( array $settings, $fields ) {

		if ( $settings['id'] !== 'bs-about' ) {

			return;
		}

		if ( ! class_exists( 'BF_Elementor_Widget_Wrapper' ) ) {
			require BF_PATH . 'page-builder/wrappers/class-bf-elementor-widget-wrapper.php';
		}

		try {

			$widget = new BF_Elementor_Widget_Wrapper();
			$widget->set_bf_shortcode_settings( $settings );

			return \Elementor\Plugin::instance()->widgets_manager->register_widget_type( $widget );

		} catch( Exception $e ) {

			return false;
		}
	}


	/**
	 * List of supported fields type.
	 *
	 * @return array
	 */
	public function supported_fields() {

		return array_merge( $this->elementor_built_in_fields, $this->wrapper_fields_list );
	}


	/**
	 * Call register_map method when this hook has been fired.
	 *
	 * Empty return value will fire the method immediately.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	public static function register_map_hook() {

		return 'elementor/widgets/widgets_registered';
	}


	/**
	 * Call register_map method when this hook has been fired.
	 *
	 * Empty return value will fire the method immediately.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	public static function register_fields_hook() {

		return 'elementor/controls/controls_registered';
	}

	/**
	 * Unique id of the page builder.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	public function unique_id() {

		return 'Elementor';
	}
}
