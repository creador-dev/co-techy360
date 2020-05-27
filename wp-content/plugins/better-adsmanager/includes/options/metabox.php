<?php


add_filter( 'better-framework/metabox/add', 'better_ads_manager_metabox_add', 100 );

if ( ! function_exists( 'better_ads_manager_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param $metabox array
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_add( $metabox ) {

		$metabox['better_ads_banner_options'] = array(
			'panel-id' => Better_Ads_Manager::$panel_id,
		);

		$metabox['better_ads_banner_campaign_options'] = array(
			'panel-id' => Better_Ads_Manager::$panel_id,
		);

		$metabox['better_ads_campaign_options'] = array(
			'panel-id' => Better_Ads_Manager::$panel_id,
		);

		$metabox['better_ads_post_metabox'] = array(
			'panel-id' => Better_Ads_Manager::$panel_id,
		);

		return $metabox;
	}
}

add_filter( 'better-framework/metabox/better_ads_banner_options/config', 'better_ads_manager_metabox_banner_config', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_banner_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_banner_config( $config ) {

		return array(
			'title'    => __( 'Banner Options', 'better-studio' ),
			'pages'    => array( 'better-banner' ),
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);

	} // better_ads_manager_metabox_config
} // if

add_filter( 'better-framework/metabox/better_ads_banner_options/std', 'better_ads_manager_metabox_std', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_std( $fields ) {

		include Better_Ads_Manager::dir_path( 'includes/options/metabox-std.php' );

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_ads_banner_options/fields', 'better_ads_manager_metabox_fields', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_fields( $fields ) {

		include Better_Ads_Manager::dir_path( 'includes/options/metabox-fields.php' );

		return $fields;
	}
}

if ( ! function_exists( 'better_ads_field_responsive_callback' ) ) {
	/**
	 * Callback for responsive field
	 *
	 * @since 1.4.1
	 */
	function better_ads_field_responsive_callback() {

		include Better_Ads_Manager::dir_path( 'includes/options/metabox-fields-responsive-cb.php' );

	} // better_ads_field_responsive_callback
}


add_filter( 'better-framework/metabox/better_ads_campaign_options/config', 'better_ads_manager_metabox_campaign_config', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_campaign_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_campaign_config( $config ) {

		return array(
			'title'    => __( 'Better Campaign Options', 'better-studio' ),
			'pages'    => array( 'better-campaign' ),
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);

	} // better_ads_manager_metabox_config
} // if


add_filter( 'better-framework/metabox/better_ads_campaign_options/fields', 'better_ads_manager_metabox_campaign_fields', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_campaign_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_campaign_fields( $fields ) {

		$fields['campaign_options'] = array(
			'name' => __( 'Campaign', 'better-studio' ),
			'id'   => 'campaign_options',
			'type' => 'tab',
			'icon' => 'bsai-gear',
		);
		$fields['desc']             = array(
			'name'          => __( 'Campaign Note & Description', 'better-studio' ),
			'id'            => 'desc',
			'type'          => 'textarea',
			'section_class' => 'full-with-both',
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_ads_campaign_options/std', 'better_ads_manager_metabox_campaign_std', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_campaign_std' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_campaign_std( $fields ) {

		$fields['desc'] = array(
			'std' => '',
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_ads_banner_campaign_options/config', 'better_ads_manager_metabox_banner_campaign_config', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_banner_campaign_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_banner_campaign_config( $config ) {

		return array(
			'title'    => __( 'Campaign of Ad', 'better-studio' ),
			'pages'    => array( 'better-banner' ),
			'context'  => 'side',
			'prefix'   => false,
			'priority' => 'high'
		);

	} // better_ads_manager_metabox_config
} // if


add_filter( 'better-framework/metabox/better_ads_banner_campaign_options/fields', 'better_ads_manager_metabox_banner_campaign_fields', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_banner_campaign_fields' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_banner_campaign_fields( $fields ) {

		$fields['campaign'] = array(
			'name'             => __( 'Select a campaign for this ad', 'better-studio' ),
			'input-desc'       => __( 'Hold the "CTRL in Windows" or "Command in Mac" to select multiple items.', 'better-studio' ),
			'id'               => 'campaign',
			'type'             => 'select',
			'section_class'    => 'full-with-both',
			'container_class'  => 'campaign-field',
			'deferred-options' => array(
				'callback' => 'better_ads_get_campaigns_option',
				'args'     => array(
					- 1,
					true
				),
			),
			'section-css'      => array(
				'background' => '#f7f7f7',
			),
			'multiple'         => true,
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_ads_banner_campaign_options/std', 'better_ads_manager_metabox_banner_campaign_std', 10 );

if ( ! function_exists( 'better_ads_manager_metabox_banner_campaign_std' ) ) {
	/**
	 * Configs metaboxe fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_metabox_banner_campaign_std( $fields ) {

		$fields['campaign'] = array(
			'std' => '',
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/better_ads_post_metabox/config', 'better_ads_manager_post_metabox', 15 );

if ( ! function_exists( 'better_ads_manager_post_metabox' ) ) {
	/**
	 * Configs custom metabox
	 *
	 * @return array
	 */
	function better_ads_manager_post_metabox() {

		$sections = better_ads_get_override_sections_list();

		if ( empty( $sections['post_type']['items'] ) ) {
			return array();
		}

		return array(
			'title'   => __( 'Better Ads Manager', 'better-studio' ),
			'pages'   => array_keys( $sections['post_type']['items'] ),
			'context' => 'normal',
			'prefix'  => false,
		);

	} // better_ads_manager_metabox_config
} // if


add_filter( 'better-framework/metabox/better_ads_post_metabox/std', 'better_ads_manager_post_metabox_std', 10 );

if ( ! function_exists( 'better_ads_manager_post_metabox_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_post_metabox_std( $fields ) {

		if ( bf_is_doing_ajax() ) {

			if ( ! isset( $_REQUEST['object_id'] ) ) {
				return $fields;
			}

			if ( ! ( $post = get_post( $_REQUEST['object_id'] ) ) ) {
				return $fields;
			}
		} else {
			global $post;
		}

		if ( empty( $post ) ) {
			return $fields;
		}


		$sections = better_ads_get_override_sections_list();

		if ( ! isset( $sections['post_type']['items'][ $post->post_type ] ) ) {
			return $fields;
		}

		$section = $sections['post_type']['items'][ $post->post_type ];

		$args = array(
			'id'           => $section['id'] . '_top_level',
			'section-name' => $section['label'],
			'section'      => $section['id'],
			'type'         => 'post_type',
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


add_filter( 'better-framework/metabox/better_ads_post_metabox/fields', 'better_ads_manager_post_metabox_fields', 10 );

if ( ! function_exists( 'better_ads_manager_post_metabox_fields' ) ) {
	/**
	 * Configs metabox fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function better_ads_manager_post_metabox_fields( $fields ) {

		if ( bf_is_doing_ajax() ) {

			if ( ! isset( $_REQUEST['object_id'] ) ) {
				return $fields;
			}

			if ( ! ( $post = get_post( $_REQUEST['object_id'] ) ) ) {
				return $fields;
			}

		} else {
			global $post;
		}

		if ( empty( $post ) ) {
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
			'type' => 'post'
		) );

		if ( isset( $sections['post_type']['items'][ $post->post_type ] ) ) {

			$fields['ads_override'] = array(
				'name'         => __( 'Override Ads', 'better-studio' ),
				'id'           => 'ads_override',
				'type'         => 'tab',
				'icon'         => 'bsai-goal',
				'ajax-section' => 'bf-ajax-tab',
			);

			$section_fields = better_ads_section_override_fields_list(
				array(
					'id'                 => $sections['post_type']['items'][ $post->post_type ]['id'] . '_top_level',
					'type'               => 'post_type',
					'section'            => $sections['post_type']['items'][ $post->post_type ]['id'],
					'section-name'       => $sections['post_type']['items'][ $post->post_type ]['label'],
					'ajax-section-field' => 'ads_override',
				)
			);

		}

		return $fields + $section_fields;
	}
}