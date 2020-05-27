<?php


/**
 * Transform standard BF fields format to VisualComposer style
 *
 * @since 4.0.0
 */
class BF_To_VC_Fields_Adapter extends BF_Fields_Adapter {

	/**
	 * Transform
	 *
	 * @since 4.0.0
	 * @return array
	 */
	public function transform() {

		$replacements = array(
			// 'bf key' => 'vc key'
			'name'           => 'heading',
			'desc'           => 'description',
			'id'             => 'param_name',
			'vc_admin_label' => 'admin_label',
		);


		$wrapper_class    = Better_Framework::factory( 'page-builder' )->wrapper_class( 'VC' );
		$vc_wrapper       = new $wrapper_class;
		$supported_fields = $vc_wrapper->supported_fields();
		$current_tab      = __( 'General', 'better-studio' );
		$fields           = $this->fields;

		foreach ( $this->fields as $idx => $field ) {

			if ( $field['type'] === 'tab' ) {
				$current_tab = $field['name'];
				unset( $fields[ $idx ] );
				continue;
			}

			// Set default value if exists
			if ( isset( $field['id'] ) && isset( $this->defaults[ $field['id'] ] ) ) {
				$fields[ $idx ]['value'] = $this->defaults[ $field['id'] ];
			}

			// Transform field type to vc-extender standard
			if ( $field['type'] === 'text' ) {
				$fields[ $idx ]['type'] = 'textfield';
			} elseif ( in_array( $field['type'], $supported_fields ) ) {
				$fields[ $idx ]['type'] = 'bf_' . $field['type'];
			}

			// Transform bf fields key to visual composer type
			foreach ( array_intersect_key( $replacements, $field ) as $key => $new_key ) {

				$fields[ $idx ][ $new_key ] = $field[ $key ];

				unset( $fields[ $idx ][ $key ] );
			}

			$fields[ $idx ]['group'] = $current_tab;
		}

		return $fields;
	}
}
