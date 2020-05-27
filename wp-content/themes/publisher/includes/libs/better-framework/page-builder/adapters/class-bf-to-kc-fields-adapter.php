<?php


/**
 * Transform standard BF fields format to King Composer style
 *
 * @since 4.0.0
 */
class BF_To_KC_Fields_Adapter extends BF_Fields_Adapter {

	/**
	 * Transform
	 *
	 * @since 4.0.0
	 * @return array
	 */
	public function transform() {

		if ( empty( $this->fields ) ) {
			return array();
		}


		$shared_field_options = array(
			'type'          => '',
			'name'          => '',
			'value'         => '',
			'label'         => '',
			'admin_label'   => '',
			'description'   => '',
			'section_class' => '',
			'_options'      => '',
			'show_on'       => '',
			'multiple'      => '',
		);
		$replacements         = array(
			// 'bf key' => 'kc key'
			'name'           => 'label',
			'id'             => 'name',
			'desc'           => 'description',
			'vc_admin_label' => 'admin_label',
			'admin_label'    => 'admin_label',
		);

		$standard_fields  = $this->list_standard_fields();
		$supported_fields = $this->list_all_supported_fields();
		$current_tab      = __( 'General', 'publisher' );

		$new_fields = array();

		foreach ( $this->fields as $idx => $field ) {

			if ( $field['type'] === 'tab' ) {
				$current_tab = $field['name'];
				continue;
			}

			if ( ! in_array( $field['type'], $supported_fields ) ) {
				continue;
			}

			$new_field                = $field;
			$new_field['is_standard'] = in_array( $field['type'], $standard_fields );

			// Set default value if exists
			if ( isset( $field['id'] ) && isset( $this->defaults[ $field['id'] ] ) ) {
				$new_field['value'] = $this->defaults[ $field['id'] ];
			}

			// Transform bf fields key to visual composer type
			foreach ( array_intersect_key( $replacements, $field ) as $key => $new_key ) {

				$new_field[ $new_key ] = $field[ $key ];

				unset( $new_field[ $key ] );
			}

			if ( isset( $new_field['options'] ) ) { // handle reserved 'options' key
				$new_field['_options'] = $new_field['options'];
				unset( $new_field['options'] );
			}
			$new_field['options'] = array_diff_key( $new_field, $shared_field_options );

			// Pass show_on value via options parameter only  for standard fields
			if ( $new_field['is_standard'] && ! empty( $field['show_on'] ) ) {

				$new_field['options']['show_on'] = array( 'show_on' => $field['show_on'] );
			}


			// Change 'group' type to bf_group to prevent conflict with king composer group field.]

			if ( 'group' === $new_field['type'] ) {

				$new_field['type'] = 'bf_group';

			} elseif ( 'group_close' === $new_field['type'] ) {

				$new_field['type'] = 'bf_group_close';
			}

			//TODO: add bf color picker support
			if ( 'color' === $new_field['type'] ) {

				$new_field['type'] = 'color_picker';
			}

			$new_fields[ $current_tab ][] = $new_field;
		}

		return $new_fields;
	}


	/**
	 * @since 4.0.0
	 * @return array
	 */
	public function list_standard_fields() {

		/**
		 * @var BF_KC_Wrapper $kc_wrapper
		 */

		if ( ! $kc_wrapper = Better_Framework::factory( 'page-builder' )->wrapper_class( 'KC' ) ) {
			return array();
		}

		$kc_wrapper = new $kc_wrapper();

		return array_diff(
			$kc_wrapper->supported_fields(),
			$kc_wrapper->dynamic_deferred_fields(),
			$kc_wrapper->static_deferred_fields()
		);
	}


	/**
	 * Get list of all supported fields in King Composer
	 *
	 * @since 4.0.0
	 * @return array
	 */
	public function list_all_supported_fields() {

		if ( ! $kc_wrapper = Better_Framework::factory( 'page-builder' )->wrapper_class( 'KC' ) ) {
			return array();
		}

		$kc_wrapper = new $kc_wrapper;

		return $kc_wrapper->supported_fields();
	}
}
