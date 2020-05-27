<?php

add_filter( 'better-framework/taxonomy/metabox/add', 'better_ads_manager_taxonomy_metabox_add', 20 );

if ( ! function_exists( 'better_ads_manager_taxonomy_metabox_add' ) ) {
	/**
	 * Adds metabox for taxonomies
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function better_ads_manager_taxonomy_metabox_add( $metabox ) {

		$metabox['better_ads_taxonomy_metabox'] = array(
			'panel-id' => Better_Ads_Manager::$panel_id,
			'css'      => true,
		);

		return $metabox;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better_ads_taxonomy_metabox/config', 'better_ads_manager_taxonomy_metabox_config', 10 );

if ( ! function_exists( 'better_ads_manager_taxonomy_metabox_config' ) ) {
	/**
	 * Configs taxonomy metabox
	 *
	 * @return array
	 */
	function better_ads_manager_taxonomy_metabox_config() {

		//
		// Support to custom taxonomies
		//

		$sections = better_ads_get_override_sections_list();

		if ( empty( $sections['taxonomy']['items'] ) ) {
			return array();
		}

		$taxonomies = array_keys( $sections['taxonomy']['items'] );

		return array(
			'taxonomies' => $taxonomies,
			'name'       => __( 'Better Ads Manager', 'better-studio' )
		);

	} // better_ads_manager_metabox_config
} // if


add_filter( 'better-framework/taxonomy/metabox/better_ads_taxonomy_metabox/std', 'better_ads_manager_taxonomy_metabox_std', 10 );

if ( ! function_exists( 'better_ads_manager_taxonomy_metabox_std' ) ) {
	/**
	 * Configs taxonomy metabox STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_taxonomy_metabox_std( $fields ) {

		global $tag;

		//
		// Current term inside ajax tab
		//
		if ( bf_is_doing_ajax() ) {

			if ( ! ( isset( $_POST['action'] ) && $_POST['action'] == 'bf_ajax' && $_POST['type'] == 'taxonomy' ) ) {
				return $fields;
			} else {


				$tag = get_term( $_POST['object_id'] );

				if ( ! $tag || is_wp_error( $tag ) ) {
					return $fields;
				}
			}
		}

		if ( empty( $tag->taxonomy ) ) {
			return $fields;
		}

		$sections = better_ads_get_override_sections_list();
		$section  = $sections['taxonomy']['items'][ $tag->taxonomy ];
		$args     = array(
			'id'           => $section['id'] . '_top_level',
			'section-name' => $section['label'],
			'section'      => $section['id'],
			'type'         => 'taxonomy',
		);

		foreach ( better_ads_section_override_fields_list( $args ) as $id => $field ) {
			$fields[ $id ] = array(
				'std'      => isset( $field['std'] ) ? $field['std'] : '',
				'save-std' => false,
			);
		}

		$fields['bam_disable_all']          = array(
			'std'      => '',
			'save-std' => false,
		);
		$fields['bam_disable_locations']    = array(
			'std'      => '',
			'save-std' => false,
		);
		$fields['bam_disable_widgets']      = array(
			'std'      => '',
			'save-std' => false,
		);
		$fields['bam_disable_post_content'] = array(
			'std'      => '',
			'save-std' => false,
		);

		return $fields;
	}
}


add_filter( 'better-framework/taxonomy/metabox/better_ads_taxonomy_metabox/fields', 'better_ads_manager_taxonomy_metabox_fields', 10 );

if ( ! function_exists( 'better_ads_manager_taxonomy_metabox_fields' ) ) {
	/**
	 * Configs taxonomy metabox fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_taxonomy_metabox_fields( $fields ) {

		$taxonomy = '';

		if ( bf_is_doing_ajax() ) {

			global $wp_version, $wpdb;

			if ( isset( $_REQUEST['object_id'] ) ) {

				$params = array( $_REQUEST['object_id'] );
				if ( version_compare( '4.4.0', $wp_version, '>' ) ) { // WP < 4.4 support
					// Get taxonomy by term id
					$params[1] = $wpdb->get_var( $wpdb->prepare( "SELECT taxonomy FROM $wpdb->term_taxonomy WHERE term_id = %d", $_REQUEST['object_id'] ) );
				}

				$term = call_user_func_array( 'get_term', $params );

				if ( $term && ! is_wp_error( $term ) ) {
					$taxonomy = $term->taxonomy;
				}


			} elseif ( isset( $_REQUEST['taxonomy'] ) && taxonomy_exists( $_REQUEST['taxonomy'] ) ) {

				$taxonomy = $_REQUEST['taxonomy'];

			}

		} else {
			global $taxonomy;
		}

		if ( ! $taxonomy ) {
			return $fields;
		}

		$sections       = better_ads_get_override_sections_list();
		$section_fields = array(); // fields of ajax tab


		$fields['ads'] = array(
			'name' => __( 'Ads', 'better-studio' ),
			'id'   => 'ads',
			'type' => 'tab',
			'icon' => 'bsai-advertise',
		);

		$fields = better_ads_section_disable_fields_list( $fields, array(
			'type' => 'taxonomy'
		) );

		if ( isset( $sections['taxonomy']['items'][ $taxonomy ] ) ) {

			$fields['ads_override'] = array(
				'name'         => __( 'Override Ads', 'better-studio' ),
				'id'           => 'ads_override',
				'type'         => 'tab',
				'icon'         => 'bsai-goal',
				'ajax-section' => 'bf-ajax-tab',
			);

			$section_fields = better_ads_section_override_fields_list(
				array(
					'id'                 => $sections['taxonomy']['items'][ $taxonomy ]['id'] . '_top_level',
					'type'               => 'taxonomy',
					'section'            => $sections['taxonomy']['items'][ $taxonomy ]['id'],
					'section-name'       => $sections['taxonomy']['items'][ $taxonomy ]['label'],
					'ajax-section-field' => 'ads_override',
				)
			);
		}

		return $fields + $section_fields;
	}
}
