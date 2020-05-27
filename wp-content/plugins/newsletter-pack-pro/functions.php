<?php


/**
 * Used to get array of key->name of newsletters
 *
 * @param int  $count
 * @param bool $empty_label
 *
 * @since 1.0
 *
 * @return array
 */
function bsnp_get_newsletters_list_option( $count = 10, $empty_label = false ) {

	static $cache = array();

	if ( isset( $cache[ $count . $empty_label ] ) ) {
		return $cache[ $count . $empty_label ];
	}

	$args = array(
		'posts_per_page' => $count,
	);

	if ( $empty_label ) {
		$cache[ $count . $empty_label ] = array( 'none' => __( '-- Select Newsletter --', 'better-studio' ) ) + BS_Newsletter_Pack_Pro::query_newsletters( $args );
	} else {
		$cache[ $count . $empty_label ] = BS_Newsletter_Pack_Pro::query_newsletters( $args );
	}

	return $cache[ $count . $empty_label ];
}


/**
 * Handy function to add Newsletter location fields to panel by it's prefix
 *
 * @param       $fields
 * @param array $args
 *
 * @since 1.0
 *
 * @return void
 */
function bsnp_inject_newsletter_field_to_fields( &$fields, $args = array() ) {

	if ( is_string( $args ) ) {
		$args = array(
			'location_prefix' => $args,
		);
	}

	$args = bf_merge_args( $args, array(
		'location_prefix'  => '',
		'group'            => true,
		'group_state'      => 'open',
		'group_title'      => __( 'Newsletter', 'better-studio' ),
		'group_auto_close' => true,
		'group_desc'       => '',
		'start_fields'     => '',
		'format'           => 'normal',
	) );

	if ( empty( $args['location_prefix'] ) ) {
		return;
	}

	if ( $args['group'] ) {
		$fields[ $args['location_prefix'] . '-group' ] = array(
			'id'              => $args['location_prefix'] . '-group',
			'name'            => $args['group_title'],
			'type'            => 'group',
			'state'           => $args['group_state'],
			'desc'            => $args['group_desc'],
			'container-class' => 'newsletter-pack-group-field',
		);
	}

	if ( ! empty( $args['start_fields'] ) ) {
		foreach ( (array) $args['start_fields'] as $field_id => $field_val ) {
			$fields[ $field_id ] = $field_val;
		}
	}

	$fields[ $args['location_prefix'] . '_type' ] = array(
		'name'             => __( 'Newsletter', 'better-studio' ),
		'id'               => $args['location_prefix'] . '_newsletter',
		'desc'             => __( 'Choose a configured newsletter to show it in this newsletter location.', 'better-studio' ),
		'type'             => 'select',
		'std'              => '',
		'deferred-options' => array(
			'callback' => 'bsnp_get_newsletters_list_option',
			'args'     => array(
				- 1,
				true
			),
		),
		'section_class'    => 'newsletter-pack-newsletter-field',
	);


	$fields[ $args['location_prefix'] . '_style' ] = array(
		'name'             => __( 'Override Style', 'better-studio' ),
		'id'               => $args['location_prefix'] . '_style',
		'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
		'type'             => 'select_popup',
		'std'              => '',
		'deferred-options' => array(
			'callback' => 'bsnp_get_newsletters_style_option',
			'args'     => array(
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Newsletter Style', 'better-studio' ),
			'box_pre_title' => __( 'Active style', 'better-studio' ),
			'box_button'    => __( 'Change Style', 'better-studio' ),
		),
		'section_class'    => 'newsletter-pack-newsletter-field',
		'show_on'          => array(
			array(
				$args['location_prefix'] . '_newsletter!=none'
			)
		),
	);

	$fields[ $args['location_prefix'] . '_si_style' ] = array(
		'name'             => __( 'Override Social Icons Style', 'better-studio' ),
		'id'               => $args['location_prefix'] . '_si_style',
		'desc'             => __( 'Custom newsletter icons style for this location.', 'better-studio' ),
		'type'             => 'select_popup',
		'std'              => '',
		'deferred-options' => array(
			'callback' => 'bsnp_get_newsletters_si_style_option',
			'args'     => array(
				true,
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Social Icons Style', 'better-studio' ),
			'box_pre_title' => __( 'Active style', 'better-studio' ),
			'box_button'    => __( 'Change Style', 'better-studio' ),
		),
		'section_class'    => 'newsletter-pack-newsletter-field',
		'show_on'          => array(
			array(
				$args['location_prefix'] . '_newsletter!=none'
			)
		),
	);

	if ( ! empty( $args['end_fields'] ) ) {
		foreach ( (array) $args['end_fields'] as $field_id => $field_val ) {
			$fields[ $field_id ] = $field_val;
		}
	}

	if ( $args['group'] && $args['group_auto_close'] ) {
		$fields[] = array(
			'type' => 'group_close',
		);
	}
} // bsnp_inject_newsletter_field_to_fields


/**
 * Handy function to add Newsletter location repeater newsletter field to panel by it's prefix
 *
 * @param       $fields
 * @param array $args
 *
 * @since 1.0
 *
 * @return void
 */
function bsnp_inject_newsletter_repeater_field_to_fields( &$fields, $args = array() ) {

	if ( is_string( $args ) ) {
		$args = array(
			'location_prefix' => $args,
		);
	}

	$args = bf_merge_args( $args, array(
		'location_prefix'        => '',
		'group'                  => true,
		'group_state'            => 'close',
		'group_title'            => __( 'Newsletter', 'better-studio' ),
		'group_auto_close'       => true,
		'group_desc'             => '',
		'field_title'            => '',
		'field_desc'             => '',
		'field_add_label'        => '<i class="fa fa-plus"></i> ' . __( 'New Newsletter', 'better-studio' ),
		'field_delete_label'     => __( 'Delete Newsletter', 'better-studio' ),
		'field_item_title'       => __( 'Newsletter', 'better-studio' ),
		'field_item_smart_title' => true,
		'start_fields'           => '',
		'format'                 => 'normal',
	) );

	if ( empty( $args['location_prefix'] ) ) {
		return;
	}

	if ( $args['group'] ) {
		$fields[] = array(
			'name'  => $args['group_title'],
			'type'  => 'group',
			'state' => $args['group_state'],
			'desc'  => $args['group_desc'],
		);
	}

	if ( ! empty( $args['start_fields'] ) ) {
		foreach ( (array) $args['start_fields'] as $field_id => $field_val ) {
			$fields[ $field_id ] = $field_val;
		}
	}

	$repeater_items = array();

	if ( ! empty( $args['field_start_fields'] ) ) {
		foreach ( (array) $args['field_start_fields'] as $field_id => $field_val ) {
			$repeater_items[ $field_id ] = $field_val;
		}
	}

	$repeater_items['newsletter'] = array(
		'name'             => __( 'Newsletter', 'better-studio' ),
		'id'               => 'newsletter',
		'desc'             => __( 'Choose a configured newsletter to show it in this newsletter location.', 'better-studio' ),
		'type'             => 'select',
		'deferred-options' => array(
			'callback' => 'bsnp_get_newsletters_list_option',
			'args'     => array(
				- 1,
				true
			),
		),
		'repeater_item'    => true,
	);

	$repeater_items['style'] = array(
		'name'             => __( 'Override Style', 'better-studio' ),
		'id'               => 'style',
		'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
		'type'             => 'select_popup',
		'std'              => '',
		'deferred-options' => array(
			'callback' => 'bsnp_get_newsletters_style_option',
			'args'     => array(
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Newsletter Style', 'better-studio' ),
			'box_pre_title' => __( 'Active style', 'better-studio' ),
			'box_button'    => __( 'Change Style', 'better-studio' ),
		),
		'section_class'    => 'newsletter-pack-newsletter-field',
		'repeater_item'    => true,
		'show_on'          => array(
			array(
				'newsletter!=none'
			)
		),
	);

	$repeater_items['si_style'] = array(
		'name'             => __( 'Override Social Icons Style', 'better-studio' ),
		'id'               => 'si_style',
		'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
		'type'             => 'select_popup',
		'std'              => '',
		'deferred-options' => array(
			'callback' => 'bsnp_get_newsletters_si_style_option',
			'args'     => array(
				true,
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Social Icons Style', 'better-studio' ),
			'box_pre_title' => __( 'Active style', 'better-studio' ),
			'box_button'    => __( 'Change Style', 'better-studio' ),
		),
		'section_class'    => 'newsletter-pack-newsletter-field',
		'repeater_item'    => true,
		'show_on'          => array(
			array(
				'newsletter!=none'
			)
		),
	);


	if ( ! empty( $args['field_end_fields'] ) ) {
		foreach ( (array) $args['field_end_fields'] as $field_id => $field_val ) {
			$repeater_items[ $field_id ] = $field_val;
		}
	}

	$fields[ $args['location_prefix'] ] = array(
		'name'          => $args['field_title'],
		'desc'          => $args['field_desc'],
		'id'            => $args['location_prefix'],
		'type'          => 'repeater',
		'save-std'      => true,
		'default'       => array(
			array(
				'newsletter' => '',
				'style'      => 'default',
				'si_style'   => 'default',
			),
		),
		'add_label'     => $args['field_add_label'],
		'delete_label'  => $args['field_delete_label'],
		'item_title'    => $args['field_item_title'],
		'section_class' => 'full-with-both' . ( $args['field_item_smart_title'] ? ' newsletter-pack-repeater-field' : '' ),
		'options'       => $repeater_items,
		'ad-id'         => $args['location_prefix'],
	);

	if ( ! empty( $args['end_fields'] ) ) {
		foreach ( (array) $args['end_fields'] as $field_id => $field_val ) {
			$fields[ $field_id ] = $field_val;
		}
	}

	if ( $args['group'] && $args['group_auto_close'] ) {
		$fields[] = array(
			'type' => 'group_close',
		);
	}

} // bsnp_inject_newsletter_repeater_field_to_fields


/**
 * Shows newsletter location code by its panel prefix or data
 *
 * @param string $panel_loc_prefix
 * @param null   $newsletter_data
 * @param array  $args
 *
 *
 * @since 1.0
 *
 * @return void
 */
function bsnp_show_location( $panel_loc_prefix = '', $newsletter_data = null, $args = array() ) {

	if ( empty( $panel_loc_prefix ) ) {
		return;
	}

	if ( is_null( $newsletter_data ) || ! is_array( $newsletter_data ) ) {
		$newsletter_data = bsnp_get_location_data( $panel_loc_prefix );
	}

	if ( ! isset( $newsletter_data['newsletter-data'] ) ) {
		$newsletter_data['newsletter-data'] = array();
	}

	if ( isset( $args['custom-data'] ) ) {
		$newsletter_data['newsletter-data'] = bf_merge_args( $newsletter_data['newsletter-data'], $args['custom-data'] );
	}

	if ( ! isset( $args['before'] ) ) {
		$args['before'] = '';
	}

	if ( ! isset( $args['after'] ) ) {
		$args['after'] = '';
	}

	if ( isset( $args['show-error'] ) ) {
		$newsletter_data['show-error'] = $args['show-error'];
	}

	$newsletter_code = BS_Newsletter_Pack_Pro()->show_newsletter( $newsletter_data );

	if ( $newsletter_code ) {
		echo $args['before'], $newsletter_code, $args['after'];
	}

} // bsnp_show_location


if ( ! function_exists( 'bsnp_get_location_data_ids' ) ) {
	/**
	 * returns base data for newsletter
	 *
	 * @param array|null $extra_fields Extra fields related to this location
	 *
	 * @return array
	 */
	function bsnp_get_location_data_ids( $extra_fields = null ) {

		$fields = array(
			'newsletter' => '',
			'style'      => '',
			'si_style'   => '',
		);

		if ( ! is_null( $extra_fields ) ) {
			$fields = bf_merge_args( $fields, $extra_fields );
		}

		return $fields;
	}
} // bsnp_get_location_data_ids


if ( ! function_exists( 'bsnp_get_location_data_override' ) ) {
	/**
	 * Returns data for newsletter  location (even overidded data)
	 *
	 * @param string $panel_ad_prefix
	 * @param bool   $multiple
	 * @param string $type
	 * @param null   $extra_fields Extra fields for current newsletter location
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_get_location_data_override( $panel_ad_prefix = '', $multiple = false, $type = 'newsletter-location', $extra_fields = null ) {

		$data_ids = bsnp_get_location_data_ids( $extra_fields );

		$data = array();

		if ( $multiple ) {
			$data = BS_Newsletter_Pack_Pro::get_option( $panel_ad_prefix );

		} else {

			if ( $type == 'newsletter-location' ) {

				foreach ( $data_ids as $id => $value ) {
					$data[ $id ] = BS_Newsletter_Pack_Pro::get_option( $panel_ad_prefix . '_' . $id );
				}

			} elseif ( $type === 'option' ) {
				$data = BS_Newsletter_Pack_Pro::get_option( $panel_ad_prefix );
			}
		}

		return $data;

	} // bsnp_get_location_data_override
}


/**
 * Returns full list of newsletter location data from it's prefix inside panel
 *
 * @param string $location_prefix
 * @param bool   $multiple
 * @param null   $extra_fields Extra fields related to current newsletter location
 *
 * @since 1.0
 *
 * @return array
 */
function bsnp_get_location_data( $location_prefix = '', $multiple = false, $extra_fields = null ) {

	$data_ids = bsnp_get_location_data_ids( $extra_fields );


	if ( empty( $location_prefix ) ) {
		return $multiple ? array( $data_ids ) : $data_ids;
	}

	$final_ads = array();
	$data      = bsnp_get_location_data_override( $location_prefix, $multiple, 'newsletter-location', $extra_fields );

	if ( ! $multiple ) {
		$data = array( $data );
	}

	$_check = array(
		'default' => '',
		''        => '',
	);

	foreach ( $data as $item ) {

		// Type not selected
		if ( empty( $item['newsletter'] ) || $item['newsletter'] === 'none' ) {
			continue;
		}

		$newsletter_item = $item;

		$newsletter_item['newsletter-data'] = bsnp_get_newsletter_data( $item['newsletter'], $extra_fields );

		// newsletter is not active
		if ( empty( $newsletter_item['newsletter-data']['active-newsletter'] ) ) {
			continue;
		}

		// update custom style
		if ( ! isset( $_check[ $newsletter_item['style'] ] ) ) {
			$newsletter_item['newsletter-data']['style'] = $newsletter_item['style'];
		}

		// update custom social icon
		if ( ! isset( $_check[ $newsletter_item['si_style'] ] ) ) {

			if ( $newsletter_item['si_style'] === 'hidden' ) {
				$newsletter_item['newsletter-data']['social_icons'] = false;
			} else {
				$newsletter_item['newsletter-data']['social_icons_style'] = $newsletter_item['si_style'];
			}
		}

		$newsletter_item['active_location'] = true;

		$final_ads[] = $newsletter_item;
	}

	// return default ID's
	if ( empty( $final_ads ) ) {
		return $multiple ? array( $data_ids ) : $data_ids;
	}

	if ( $multiple ) {
		return $final_ads;
	}

	return current( $final_ads );
}


/**
 * Returns full list of newsletter data from it's id
 *
 * @param int  $newsletter_id
 * @param null $extra_fields Extra fields related to current newsletter location
 *
 * @since 1.0
 *
 * @return array
 */
function bsnp_get_newsletter_data( $newsletter_id = 0, $extra_fields = null ) {

	$data = bf_get_post_meta( 'newsletter-data-cache', $newsletter_id, false );

	//	 not cached yet
	if ( $data === false ) {

		$data = bsnp_fetch_newsletter_data( $newsletter_id );

		update_post_meta( $newsletter_id, 'newsletter-data-cache', $data );
	}

	return $data;
}


/**
 * Returns full list of newsletter data from it's id
 *
 * @param int  $newsletter_id
 * @param null $extra_fields Extra fields related to current newsletter location
 *
 * @return array
 */
function bsnp_fetch_newsletter_data( $newsletter_id = 0, $extra_fields = null ) {

	$data_ids = array(
		//
		'social_icons'       => '',
		'social_icons_style' => '',
		'social_icons_sites' => '',
		//
		'type'               => '',
		'mailchimp_code'     => '',
		'mailerlite_code'    => '',
		'aweber_code'        => '',
		'feedburner_id'      => '',
		//
		'style'              => '',
		'color'              => '',
		//
		'text_title'         => '',
		'text_desc'          => '',
		'text_input'         => '',
		'text_button'        => '',
		'text_after'         => '',

		//
		'custom_class'       => '',
		'custom_id'          => '',
		'custom_css'         => '',
	);


	// Support extra fields from outside
	if ( ! is_null( $extra_fields ) ) {
		$data_ids = bf_merge_args( $extra_fields, $data_ids );
	}

	// aggregate fields
	$data = array();

	$meta = get_metadata( 'post', $newsletter_id );

	if ( $meta ) {
		foreach ( get_metadata( 'post', $newsletter_id ) as $meta_key => $meta_value ) {
			if ( isset( $data_ids[ $meta_key ] ) ) {
				$data[ $meta_key ] = $meta_value[0];
			}
		}
	}


	//
	// Validate selected type
	//
	if ( ! empty( $data['type'] ) ) {

		//
		// Mailchimp support
		//
		if ( $data['type'] === 'mailchimp' && ! empty( $data['mailchimp_code'] ) ) {

			preg_match( '/action="([^"]*?)"/i', $data['mailchimp_code'], $matched );

			if ( ! empty( $matched[1] ) ) {
				$data['mailchimp_url']     = $matched[1];
				$data['active-newsletter'] = true;
			}

		}

		//
		// AWeber
		//
		elseif ( $data['type'] === 'aweber' && ! empty( $data['aweber_code'] ) ) {


			preg_match( '/<input type="hidden" name="meta_web_form_id" value="([^"]*?)" \/>/i', $data['aweber_code'], $matched );

			if ( ! empty( $matched[1] ) ) {
				$data['aweber_data'] = array();

				$data['aweber_data']['meta_web_form_id'] = $matched[1];

				preg_match( '/<input type="hidden" name="listname" value="([^"]*?)" \/>/i', $data['aweber_code'], $matched );

				if ( ! empty( $matched[1] ) ) {
					$data['aweber_data']['listname'] = $matched[1];
					$data['active-newsletter']       = true;
				} else {
					unset( $data['aweber_data'] );
				}
			}

		}
		//
		// Mailer Lite
		//
		elseif ( $data['type'] === 'mailerlite' && ! empty( $data['mailerlite_code'] ) ) {

			$data['mailerlite-data'] = array();

			preg_match( '/action="([^"]*?)"/i', $data['mailerlite_code'], $matched );

			if ( ! empty( $matched[1] ) ) {

				$data['mailerlite-data']['url'] = $matched[1];

				preg_match( '/data-id="([^"]*?)"/i', $data['mailerlite_code'], $matched );

				// they changed the data-id to data-code
				if ( empty( $matched[1] ) ) {
					preg_match( '/data-code="([^"]*?)"/i', $data['mailerlite_code'], $matched );
				}

				if ( ! empty( $matched[1] ) ) {
					$data['mailerlite-data']['id'] = $matched[1];

					preg_match( '/data-code="([^"]*?)"/i', $data['mailerlite_code'], $matched );

					if ( ! empty( $matched[1] ) ) {
						$data['mailerlite-data']['code'] = $matched[1];

						$data['active-newsletter'] = true;
					}

				}

			}

			unset( $data['mailerlite_code'] );

		}
		//
		// Feedburner
		//
		elseif ( $data['type'] === 'feedburner' && ! empty( $data['feedburner_id'] ) ) {
			$data['active-newsletter'] = true;
		}
	}

	// clean extra and long fields
	unset( $data['aweber_code'] );
	unset( $data['mailchimp_code'] );
	unset( $data['mailerlite_code'] );

	// Not defined mean it is ot validated
	if ( ! isset( $data['active-newsletter'] ) ) {
		$data['active-newsletter'] = false;
	}

	// unserialize icons field
	if ( ! empty( $data['active-newsletter'] ) && ! empty( $data['social_icons_sites'] ) ) {
		$data['social_icons_sites'] = unserialize( $data['social_icons_sites'] );
	}

	return $data;
}


if ( ! function_exists( 'bsnp_social_counter_options_list_callback' ) ) {
	/**
	 * Handy deferred function for improving performance
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_social_counter_options_list_callback() {

		if ( ! class_exists( 'Better_Social_Counter' ) ) {
			return array();
		} else {
			return Better_Social_Counter_Data_Manager::self()->get_widget_options_list();
		}

	}
}


if ( ! function_exists( 'bsnp_get_form_code' ) ) {
	/**
	 * Handy deferred function for improving performance
	 *
	 * @return array
	 */
	function bsnp_get_form_code( $newsletter_data = array(), $args = array() ) {

		$args = bf_merge_args( $args, array(
			'form-url'                  => '',
			'form-class'                => '',
			'form-fields-wrapper-class' => '',
			//
			'input-class'               => '',
			'input-placeholder'         => ! empty( $newsletter_data['text_input'] ) ? $newsletter_data['text_input'] : '',
			//
			'input-name-class'          => '',
			'input-name-placeholder'    => ! empty( $newsletter_data['text_input'] ) ? $newsletter_data['text_input'] : '',
			//
			'button-class'              => '',
			'button-text'               => ! empty( $newsletter_data['text_button'] ) ? $newsletter_data['text_button'] : '',
		) );


		switch ( $newsletter_data['type'] ) {

			case 'mailchimp':
				$code_pattern = array(
					'form'   => '<form action="%%url%%" method="post" name="mc-embedded-subscribe-form" class="bsnp-form clearfix %%class%%" target="_blank">
									<div class="bsnp-inputs-wrap bsnp-clearfix %%fields-wrapper-class%%">
							            %%input%%
							            %%button%%
									</div>
								</form>',
					'input'  => '<div class="bsnp-field-w bsnp-field-input-w"><input name="EMAIL" type="email" placeholder="%%placeholder%%" class="bsnp-input %%class%%"><i class="bsnp-icon fa fa-envelope"></i></div>',
					'button' => '<div class="bsnp-field-w bsnp-field-button-w"><button class="bsnp-button" name="subscribe" type="submit">%%title%%</button></div>',
				);

				$args['form-url'] = $newsletter_data['mailchimp_url'];
				break;

			case 'feedburner':
				$code_pattern = array(
					'form'   => '
						<form method="post" action="//feedburner.google.com/fb/a/mailverify" class="bsnp-form clearfix %%class%%" target="_blank">
				            <input type="hidden" value="%%url%%" name="uri"/>
				            <input type="hidden" name="loc" value="' . get_locale() . '"/>
				            <div class="bsnp-inputs-wrap bsnp-clearfix %%fields-wrapper-class%%">
					            %%input%%
					            %%button%%
							</div>
			            </form>',
					'input'  => '<div class="bsnp-field-w bsnp-field-input-w"><input autocomplete="email" x-autocompletetype="email" spellcheck="false" autocapitalize="off" autocorrect="off" id="feedburner-email" name="email" class="bsnp-input %%class%%" placeholder="%%placeholder%%" /><i class="bsnp-icon fa fa-envelope"></i></div>',
					'button' => '<div class="bsnp-field-w bsnp-field-button-w"><button class="bsnp-button" name="submit" type="submit">%%title%%</button></div>',
				);

				$args['form-url'] = $newsletter_data['feedburner_id'];
				break;

			case 'aweber':
				$code_pattern = array(
					'form'   => '<form method="post" class="bsnp-form clearfix %%class%%" target="_blank" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl"  >
							<div style="display: none;">
								<input type="hidden" name="meta_web_form_id" value="%%meta_web_form_id%%" />
								<input type="hidden" name="meta_split_id" value="" />
								<input type="hidden" name="listname" value="%%listname%%" />
								<input type="hidden" name="redirect" value="https://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_bb6798c1be50342e4c5a83d72fffb594" />
						
								<input type="hidden" name="meta_required" value="email" />
						
								<input type="hidden" name="meta_tooltip" value="" />
							</div>
							
							<div class="bsnp-inputs-wrap bsnp-clearfix %%fields-wrapper-class%%">
					            %%input%%
					            %%button%%
							</div>
					  </form>',
					'input'  => '<div class="bsnp-field-w bsnp-field-input-w"><input autocomplete="email" x-autocompletetype="email" spellcheck="false" autocapitalize="off" autocorrect="off" name="email" class="bsnp-input %%class%%" placeholder="%%placeholder%%" /><i class="bsnp-icon fa fa-envelope"></i></div>',
					'button' => '<div class="bsnp-field-w bsnp-field-button-w"><button class="bsnp-button" name="submit" type="submit">%%title%%</button></div>',
				);

				$code_pattern['form'] = str_replace(
					array(
						'%%meta_web_form_id%%',
						'%%listname%%',
					),
					array(
						$newsletter_data['aweber_data']['meta_web_form_id'],
						$newsletter_data['aweber_data']['listname'],
					),
					$code_pattern['form']
				);

				break;

			case 'mailerlite':
				$code_pattern = array(
					'form'   => '<form class="bsnp-form clearfix %%class%%" action="%%url%%" data-id="%%id%%" data-code="%%code%%" method="POST" target="_blank">
									<input type="hidden" name="ml-submit" value="1" />
									<div class="bsnp-inputs-wrap bsnp-clearfix %%fields-wrapper-class%%">
								        %%input%%
								        %%button%%
									</div>
								</form>',
					'input'  => '<div class="bsnp-field-w bsnp-field-input-w"><input type="email" name="fields[email]" class="bsnp-input %%class%%" placeholder="%%placeholder%%" value="" autocomplete="email" x-autocompletetype="email" spellcheck="false" autocapitalize="off" autocorrect="off"><i class="bsnp-icon fa fa-envelope"></i></div>',
					'button' => '<div class="bsnp-field-w bsnp-field-button-w"><button class="bsnp-button" name="submit" type="submit">%%title%%</button></div>',
				);

				$code_pattern['form'] = str_replace(
					array(
						'%%url%%',
						'%%id%%',
						'%%code%%',
					),
					array(
						$newsletter_data['mailerlite-data']['url'],
						$newsletter_data['mailerlite-data']['id'],
						$newsletter_data['mailerlite-data']['code'],
					),
					$code_pattern['form']
				);

				break;

		}


		//
		// Prepare pattern
		//
		{
			$code_pattern['input'] = str_replace(
				array(
					'%%class%%',
					'%%placeholder%%',
				),
				array(
					$args['input-class'],
					$args['input-placeholder'],
				),
				$code_pattern['input']
			);

			$code_pattern['button'] = str_replace(
				array(
					'%%class%%',
					'%%title%%',
				),
				array(
					$args['button-class'],
					$args['button-text'],
				),
				$code_pattern['button']
			);

			$code_pattern['form'] = str_replace(
				array(
					'%%class%%',
					'%%fields-wrapper-class%%',
					'%%url%%',
					'%%input%%',
					'%%button%%',
				),
				array(
					$args['form-class'],
					$args['form-fields-wrapper-class'],
					$args['form-url'],
					$code_pattern['input'],
					$code_pattern['button'],
				),
				$code_pattern['form']
			);

		}

		return $code_pattern['form'];
	}
} // bsnp_get_form_code


if ( ! function_exists( 'bsnp_get_form_social_icons_code' ) ) {
	/**
	 * Handy deferred function for improving performance
	 *
	 * @return array
	 */
	function bsnp_get_form_social_icons_code( $newsletter_data = array() ) {

		// Needs Better Social Counter plugin
		if ( ! class_exists( 'Better_Social_Counter_Shortcode' ) ) {
			return '';
		}

		// active icons
		$icons = isset( $newsletter_data['social_icons_sites'] ) ? $newsletter_data['social_icons_sites'] : array();

		// make string for shortcode
		if ( is_array( $icons ) ) {
			$_icons = array();

			foreach ( (array) $icons as $icon_key => $icon ) {
				if ( $icon ) {
					$_icons[ $icon_key ] = $icon_key;
				}
			}

			$icons = implode( ',', $_icons );
		}

		return do_shortcode( "[better-social-counter show_title='0' style='name' colored='0' order='{$icons}']" );
	}
}


/**
 * Used to get array of key->name of newsletters
 *
 * @param bool $default
 *
 * @since 1.0
 *
 * @return array
 */
function bsnp_get_newsletters_style_option( $default = false ) {

	$option  = array();
	$version = BS_Newsletter_Pack_Pro::get_version();

	if ( $default ) {
		$option['default'] = array(
			'img'           => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-default.png?v=' . $version ),
			'label'         => __( 'Default', 'better-studio' ),
			'current_label' => __( 'Default Layout', 'better-studio' ),
		);
	}

	$option['style-1']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-1.png?v=' . $version ),
		'label' => __( 'Style 1', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-2']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-2.png?v=' . $version ),
		'label' => __( 'Style 2', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-3']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-3.png?v=' . $version ),
		'label' => __( 'Style 3', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-4']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-4.png?v=' . $version ),
		'label' => __( 'Style 4', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-5']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-5.png?v=' . $version ),
		'label' => __( 'Style 5', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-6']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-6.png?v=' . $version ),
		'label' => __( 'Style 6', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Modern', 'better-studio' ),
			),
		),
	);
	$option['style-7']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-7.png?v=' . $version ),
		'label' => __( 'Style 7', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Modern', 'better-studio' ),
			),
		),
	);
	$option['style-8']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-8.png?v=' . $version ),
		'label' => __( 'Style 8', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Modern', 'better-studio' ),
			),
		),
	);
	$option['style-9']  = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-9.png?v=' . $version ),
		'label' => __( 'Style 9', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Modern', 'better-studio' ),
			),
		),
	);
	$option['style-10'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-10.png?v=' . $version ),
		'label' => __( 'Style 10', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Dark', 'better-studio' ),
			),
		),
	);
	$option['style-11'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/style-11.png?v=' . $version ),
		'label' => __( 'Style 11', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);

	return $option;
} // bsnp_get_newsletters_style_option


/**
 * Used to get array of key->option of newsletters
 *
 * @param bool $default
 *
 * @since 1.0
 *
 * @return array
 */
function bsnp_get_newsletters_si_style_option( $default = false, $hidden = false ) {

	$option  = array();
	$version = BS_Newsletter_Pack_Pro::get_version();

	if ( $default ) {
		$option['default'] = array(
			'img'           => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-default.png?v=' . $version ),
			'label'         => __( 'Default', 'better-studio' ),
			'current_label' => __( 'Default Layout', 'better-studio' ),
		);
	}

	if ( $hidden ) {
		$option['hidden'] = array(
			'img'           => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-hidden.png?v=' . $version ),
			'label'         => __( 'Hidden', 'better-studio' ),
			'current_label' => __( 'Hidden', 'better-studio' ),
		);
	}

	$option['t1-s1'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-t1-s1.png?v=' . $version ),
		'label' => __( 'Style 1', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);

	$option['t1-s2'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-t1-s2.png?v=' . $version ),
		'label' => __( 'Style 2', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);

	$option['t1-s3'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-t1-s3.png?v=' . $version ),
		'label' => __( 'Style 3', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);

	$option['t1-s4'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-t1-s4.png?v=' . $version ),
		'label' => __( 'Style 4', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);

	$option['t1-s5'] = array(
		'img'   => BS_Newsletter_Pack_Pro::dir_url( 'images/options/si-t1-s5.png?v=' . $version ),
		'label' => __( 'Style 5', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);

	return $option;
}
