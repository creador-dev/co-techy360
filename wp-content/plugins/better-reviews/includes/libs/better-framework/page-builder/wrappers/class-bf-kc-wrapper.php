<?php


class BF_KC_Wrapper extends BF_Page_Builder_Wrapper {

	/**
	 * @var array
	 *
	 * @since 4.0.0
	 */
	public $static_fields = array();


	/**
	 * Register
	 *
	 * @return bool true on success.
	 */
	public function register_fields() {

		global $kc;

		if ( ! $kc || ! is_callable( array( $kc, 'add_param_type' ) ) ) {
			return false;
		}

		// Register fields except deferred ones, they will load via ajax
		// @see BF_KC_Compatibility::ajax_load_fields()

		$this->static_fields = array_diff(
			$this->supported_fields(),
			$this->dynamic_deferred_fields(),
			$this->static_deferred_fields()
		);

		/**
		 * We can't use  $kc->add_param_type because the second parameter doesn't accept object
		 * That's silly but we have to handle this part in hard way!
		 *
		 * @see KingComposer::convert_paramTypes
		 */
		//		add_action( 'kc_after_admin_footer', array( $this, 'print_static_fields_template' ) );

		require BF_PATH . 'page-builder/generators/kc/kc-field-generator-functions.php';
		foreach ( $this->static_fields as $field ) {

			if ( function_exists( 'bf_kc_field_' . $field ) ) {
				$kc->add_param_type( $field, 'bf_kc_field_' . $field );
			}
		}

		return true;
	}

	/**
	 * @since 4.0.0
	 */
	/*public function print_static_fields_template() {

		if ( empty( $this->static_fields ) ) {

			return;
		}

		if ( ! class_exists( 'BF_KC_Fields_Generator' ) ) {
			require BF_PATH . 'page-builder/generators/kc/class-bf-kc-fields-generator.php';
		}

		$generator = new BF_KC_Fields_Generator();

		foreach ( $this->static_fields as $field ) {

			echo '<script type="text/html" id="tmpl-kc-field-type-' . esc_attr( $field ) . '-template">';

			$options = array(
				'id'    => '{{data.name}}',
				'value' => '{{data.value}}',
				'type'  => $field,
			);

			call_user_func( array( $generator, $field ), $options );

			echo "</script>\n";
		}
	}*/

	/**
	 * Adds BF Select field to Visual Composer
	 *
	 * @param $settings
	 * @param $value
	 *
	 * @return string
	 */
	function select_param( $settings, $value ) {

		$options = $this->convert_field_option( $settings, $value );

		$options['type'] = 'select';

		if ( isset( $settings['multiple'] ) ) {
			$options['multiple'] = $settings['multiple'];
		}

		$generator = new BF_VC_Front_End_Generator( $options, $settings['param_name'] );

		return $generator->get_field();
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

		if ( empty( $settings['name'] ) || empty( $settings['id'] ) ) {
			return false;
		}
		if ( empty( $fields ) ) {
			return false;
		}

		$always_fetch_fields = false;
		$deferred_types      = $this->dynamic_deferred_fields();

		foreach ( $fields as $tab_fields ) {

			foreach ( $tab_fields as $field ) {

				if ( in_array( $field['type'], $deferred_types ) ) {

					BF_KC_Compatibility::always_fetch_map_fields( $settings['id'] );

					$always_fetch_fields = true;
					break 2;
				}
			}
		}

		if ( ! $always_fetch_fields ) {

			$deferred_types  = $this->static_deferred_fields();
			$deferred_fields = array();

			foreach ( $fields as $tab_fields ) {

				foreach ( $tab_fields as $field ) {

					if ( in_array( $field['type'], $deferred_types ) ) {

						$deferred_fields[] = $field['type'];
					}
				}
			}

			if ( ! empty( $deferred_fields ) ) {
				BF_KC_Compatibility::mark_fields_as_deferred( $settings['id'], $deferred_fields );
			}
		}

		$settings['params'] = $fields;

		if ( isset( $settings['desc'] ) ) {

			$settings['description'] = $settings['desc'];
			unset( $settings['desc'] );
		}

		return $this->kc_map( $settings['id'], $settings );
	}


	/**
	 * List of all supported fields type.
	 *
	 * @return array
	 */
	public function supported_fields() {

		return array(
			'text',
			'color',
			'switch',
			'heading',
			'icon_select',
			'select',
			'select_popup',
			'term_select',
			'ajax_select',
			'custom',
			'group',
			'group_close',
			'info',
			'heading',
			'image_radio',
			'media_image',
			'sorter_checkbox',
			// 'background_image',
		);
	}


	/**
	 * todo: add comment
	 *
	 * @return array
	 */
	public function static_deferred_fields() {

		return array();
	}


	/**
	 * todo: add comment
	 * List of fields types that should be fetch via ajax
	 *
	 * @return array
	 */
	public function dynamic_deferred_fields() {

		return array(
			'icon_select',
			'select',
			'select_popup',
			'term_select',
			'ajax_select',
			'heading',
			'custom',
			'group',
			'group_close',
			'info',
			'image_radio',
			'media_image',
			'sorter_checkbox',
			// 'background_image',
		);
	}


	/**
	 * @param string        $id
	 * @param array         $atts
	 *
	 * @global KingComposer $kc
	 *
	 * @since 4.0.0
	 * @return bool true on success or false on error.
	 */
	public function kc_map( $id, $atts ) {

		global $kc;

		if ( $kc && is_callable( array( $kc, 'add_map' ) ) ) {

			if ( empty( $atts['category'] ) ) {
				$atts['category'] = 'all';
			}

			if ( empty( $atts['icon'] ) ) {

				$atts['icon'] = "$id-icon";
			}

			$kc->add_map( array( $id => $atts ) );

			return true;
		}

		return false;
	}

	/**
	 * Unique id of the page builder.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	public function unique_id() {

		return 'KC';
	}
}