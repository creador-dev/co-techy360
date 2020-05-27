<?php


/**
 * Used to get array of key->name of campaigns
 *
 * @param int  $count
 * @param bool $empty_label
 *
 * @return array
 */
function better_ads_get_campaigns_option( $count = 10, $empty_label = false ) {

	static $cache = array();

	if ( isset( $cache[ $count . $empty_label ] ) ) {
		return $cache[ $count . $empty_label ];
	}

	$args = array(
		'posts_per_page' => $count,
	);

	if ( $empty_label ) {
		$cache[ $count . $empty_label ] = array( 'none' => __( '-- Select Campaign --', 'better-studio' ) ) + Better_Ads_Manager::get_campaigns( $args );
	} else {
		$cache[ $count . $empty_label ] = Better_Ads_Manager::get_campaigns( $args );
	}

	return $cache[ $count . $empty_label ];
}


/**
 * Used to get array of key->name of banners
 *
 * @param int    $count
 * @param bool   $empty_label
 * @param string $format
 *
 * @param string $label_type
 *
 * @return array
 */
function better_ads_get_banners_option( $count = 10, $empty_label = false, $format = 'normal', $label_type = 'type' ) {

	static $cache = array();

	if ( isset( $cache[ $count . $empty_label . $format . $label_type ] ) ) {
		return $cache[ $count . $empty_label . $format . $label_type ];
	}

	$args = array(
		'posts_per_page' => $count,
		'label_type'     => $label_type,
	);

	if ( $format === 'normal' ) {
		$args['meta_query'] = array(
			'relation' => 'OR',
			array(
				'key'   => 'format',
				'value' => '',
			),
			array(
				'key'     => 'format',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'   => 'format',
				'value' => 'normal',
			),
		);
	} elseif ( $format === 'amp' ) {
		$args['meta_query'] = array(
			array(
				'key'   => 'format',
				'value' => 'amp',
			),
		);
	}

	if ( $empty_label ) {
		$cache[ $count . $empty_label . $format . $label_type ] = array( 'none' => __( '-- Select Banner --', 'better-studio' ) ) + Better_Ads_Manager::get_banners( $args );
	} else {
		$cache[ $count . $empty_label . $format . $label_type ] = Better_Ads_Manager::get_banners( $args );
	}

	return $cache[ $count . $empty_label . $format . $label_type ];
}


/**
 * Handy function to add Ad location fields to panel by it's prefix
 *
 * @param       $fields
 * @param array $args
 */
function better_ads_inject_ad_field_to_fields( &$fields, $args = array() ) {

	if ( is_string( $args ) ) {
		$args = array(
			'id_prefix' => $args,
		);
	}

	$args = bf_merge_args( $args, array(
		'id_prefix'        => '',
		'group'            => true,
		'group_state'      => 'open',
		'group_title'      => __( 'Ad', 'better-ads' ),
		'group_auto_close' => true,
		'group_desc'       => '',
		'start_fields'     => '',
		'format'           => 'normal',
	) );

	if ( empty( $args['id_prefix'] ) ) {
		return;
	}

	if ( $args['group'] ) {
		$fields[ $args['id_prefix'] . '-group' ] = array(
			'id'              => $args['id_prefix'] . '-group',
			'name'            => $args['group_title'],
			'type'            => 'group',
			'state'           => $args['group_state'],
			'desc'            => $args['group_desc'],
			'container-class' => 'better-ads-ad-group-field',
		);
	}

	if ( ! empty( $args['start_fields'] ) ) {
		foreach ( (array) $args['start_fields'] as $field_id => $field_val ) {
			$fields[ $field_id ] = $field_val;
		}
	}

	$fields[ $args['id_prefix'] . '_type' ]      = array(
		'name'          => __( 'Ad Type', 'better-studio' ),
		'id'            => $args['id_prefix'] . '_type',
		'desc'          => __( 'Choose campaign or banner.', 'better-studio' ),
		'type'          => 'select',
		'std'           => '',
		'options'       => array(
			''         => __( '-- Select Ad type --', 'better-studio' ),
			'campaign' => __( 'Campaign', 'better-studio' ),
			'banner'   => __( 'Banner', 'better-studio' ),
		),
		'ad-id'         => $args['id_prefix'],
		'section_class' => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_banner' ]    = array(
		'name'             => __( 'Banner', 'better-studio' ),
		'id'               => $args['id_prefix'] . '_banner',
		'desc'             => __( 'Choose banner.', 'better-studio' ),
		'type'             => 'select',
		'std'              => 'none',
		'deferred-options' => array(
			'callback' => 'better_ads_get_banners_option',
			'args'     => array(
				- 1,
				true,
				$args['format']
			),
		),
		'show_on'          => array(
			array(
				$args['id_prefix'] . '_type=banner'
			),
		),
		'_show_on_parent'  => $args['id_prefix'] . '_type',
		'ad-id'            => $args['id_prefix'],
		'section_class'    => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_campaign' ]  = array(
		'name'             => __( 'Campaign', 'better-studio' ),
		'id'               => $args['id_prefix'] . '_campaign',
		'desc'             => __( 'Choose campaign.', 'better-studio' ),
		'type'             => 'select',
		'std'              => 'none',
		'deferred-options' => array(
			'callback' => 'better_ads_get_campaigns_option',
			'args'     => array(
				- 1,
				true
			),
		),
		'show_on'          => array(
			array(
				$args['id_prefix'] . '_type=campaign'
			),
		),
		'_show_on_parent'  => $args['id_prefix'] . '_type',
		'ad-id'            => $args['id_prefix'],
		'section_class'    => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_count' ]     = array(
		'name'            => __( 'Max Amount of Allowed Banners', 'better-studio' ),
		'id'              => $args['id_prefix'] . '_count',
		'desc'            => __( 'How many banners are allowed?.', 'better-studio' ),
		'input-desc'      => __( 'Leave empty to show all banners.', 'better-studio' ),
		'type'            => 'text',
		'std'             => 1,
		'show_on'         => array(
			array(
				$args['id_prefix'] . '_type=campaign'
			),
		),
		'_show_on_parent' => $args['id_prefix'] . '_type',
		'ad-id'           => $args['id_prefix'],
		'section_class'   => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_columns' ]   = array(
		'name'            => __( 'Columns', 'better-studio' ),
		'id'              => $args['id_prefix'] . '_columns',
		'desc'            => __( 'Show ads in multiple columns.', 'better-studio' ),
		'type'            => 'select',
		"options"         => array(
			1 => __( '1 Column', 'better-studio' ),
			2 => __( '2 Column', 'better-studio' ),
			3 => __( '3 Column', 'better-studio' ),
		),
		'std'             => 1,
		'show_on'         => array(
			array(
				$args['id_prefix'] . '_type=campaign'
			),
		),
		'_show_on_parent' => $args['id_prefix'] . '_type',
		'ad-id'           => $args['id_prefix'],
		'section_class'   => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_orderby' ]   = array(
		'name'            => __( 'Order By', 'better-studio' ),
		'id'              => $args['id_prefix'] . '_orderby',
		'type'            => 'select',
		"options"         => array(
			'date'  => __( 'Date', 'better-studio' ),
			'title' => __( 'Title', 'better-studio' ),
			'rand'  => __( 'Random (Rotate)', 'better-studio' ),
		),
		'std'             => 'rand',
		'show_on'         => array(
			array(
				$args['id_prefix'] . '_type=campaign'
			),
		),
		'_show_on_parent' => $args['id_prefix'] . '_type',
		'ad-id'           => $args['id_prefix'],
		'section_class'   => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_order' ]     = array(
		'name'            => __( 'Order', 'better-studio' ),
		'id'              => $args['id_prefix'] . '_order',
		'type'            => 'select',
		"options"         => array(
			'ASC'  => __( 'Ascending', 'better-studio' ),
			'DESC' => __( 'Descending', 'better-studio' ),
		),
		'std'             => 'ASC',
		'show_on'         => array(
			array(
				$args['id_prefix'] . '_type=campaign'
			),
		),
		'_show_on_parent' => $args['id_prefix'] . '_type',
		'ad-id'           => $args['id_prefix'],
		'section_class'   => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_align' ]     = array(
		'name'            => __( 'Align', 'better-studio' ),
		'desc'            => __( 'Choose align of ad.', 'better-studio' ),
		'id'              => $args['id_prefix'] . '_align',
		'type'            => 'select',
		"options"         => array(
			'left'   => __( 'Left', 'better-studio' ),
			'center' => __( 'Center', 'better-studio' ),
			'right'  => __( 'Right', 'better-studio' ),
		),
		'std'             => 'center',
		'show_on'         => array(
			array(
				$args['id_prefix'] . '_type=banner',
			),
			array(
				$args['id_prefix'] . '_type=campaign',
			),
		),
		'_show_on_parent' => $args['id_prefix'] . '_type',
		'ad-id'           => $args['id_prefix'],
		'section_class'   => 'better-ads-ad-field',
	);
	$fields[ $args['id_prefix'] . '_lazy-load' ] = array(
		'name'            => __( 'Lazy Load Ad?', 'better-studio' ),
		'desc'            => __( 'Chose the behaviour of lazy loading.', 'better-studio' ),
		'id'              => $args['id_prefix'] . '_lazy-load',
		'type'            => 'select',
		"options"         => array(
			''        => __( '-- Inherit from panel --', 'better-studio' ),
			'enable'  => __( 'Yes, Lazy load this ad', 'better-studio' ),
			'disable' => __( 'No, Load this Ad as normal', 'better-studio' ),
		),
		'std'             => 'center',
		'show_on'         => array(
			array(
				$args['id_prefix'] . '_type=banner',
			),
			array(
				$args['id_prefix'] . '_type=campaign',
			),
		),
		'_show_on_parent' => $args['id_prefix'] . '_type',
		'ad-id'           => $args['id_prefix'],
		'section_class'   => 'better-ads-ad-field',
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
}


/**
 * Handy function to add Ad location reperator ad field to panel by it's prefix
 *
 * @param       $fields
 * @param array $args
 */
function better_ads_inject_ad_repeater_field_to_fields( &$fields, $args = array() ) {

	if ( is_string( $args ) ) {
		$args = array(
			'id_prefix' => $args,
		);
	}

	$args = bf_merge_args( $args, array(
		'id_prefix'              => '',
		'group'                  => true,
		'group_state'            => 'close',
		'group_title'            => __( 'Ad', 'better-studio' ),
		'group_auto_close'       => true,
		'group_desc'             => '',
		'field_title'            => '',
		'field_desc'             => '',
		'field_add_label'        => '<i class="fa fa-plus"></i> ' . __( 'New Ad', 'better-studio' ),
		'field_delete_label'     => __( 'Delete Ad', 'better-studio' ),
		'field_item_title'       => __( 'Ad', 'better-studio' ),
		'field_item_smart_title' => true,
		'start_fields'           => '',
		'format'                 => 'normal',
	) );

	if ( empty( $args['id_prefix'] ) ) {
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

	$repeater_items['type']      = array(
		'name'          => __( 'Ad Type', 'better-studio' ),
		'id'            => 'type',
		'desc'          => __( 'Choose campaign or banner.', 'better-studio' ),
		'type'          => 'select',
		'options'       => array(
			''         => __( '-- Select Ad Type --', 'better-studio' ),
			'campaign' => __( 'Campaign', 'better-studio' ),
			'banner'   => __( 'Banner', 'better-studio' ),
		),
		'repeater_item' => true,
		'ad-id'         => $args['id_prefix'],
	);
	$repeater_items['campaign']  = array(
		'name'             => __( 'Campaign', 'better-studio' ),
		'id'               => 'campaign',
		'desc'             => __( 'Choose campaign.', 'better-studio' ),
		'type'             => 'select',
		'deferred-options' => array(
			'callback' => 'better_ads_get_campaigns_option',
			'args'     => array(
				- 1,
				true,
				$args['format']
			),
		),
		'show_on'          => array(
			array(
				'type=campaign'
			),
		),
		'repeater_item'    => true,
		'ad-id'            => $args['id_prefix'],
	);
	$repeater_items['banner']    = array(
		'name'             => __( 'Banner', 'better-studio' ),
		'id'               => 'banner',
		'desc'             => __( 'Choose banner.', 'better-studio' ),
		'type'             => 'select',
		'deferred-options' => array(
			'callback' => 'better_ads_get_banners_option',
			'args'     => array(
				- 1,
				true,
				$args['format']
			),
		),
		'show_on'          => array(
			array(
				'type=banner'
			),
		),
		'repeater_item'    => true,
		'ad-id'            => $args['id_prefix'],
	);
	$repeater_items['count']     = array(
		'name'          => __( 'Max Amount of Allowed Banners', 'better-studio' ),
		'id'            => 'count',
		'desc'          => __( 'How many banners are allowed?.', 'better-studio' ),
		'input-desc'    => __( 'Leave empty to show all banners.', 'better-studio' ),
		'type'          => 'text',
		'show_on'       => array(
			array(
				'type=campaign'
			),
		),
		'repeater_item' => true,
		'ad-id'         => $args['id_prefix'],
	);
	$repeater_items['columns']   = array(
		'name'          => __( 'Columns', 'better-studio' ),
		'id'            => 'columns',
		'desc'          => __( 'Show ads in multiple columns.', 'better-studio' ),
		'type'          => 'select',
		"options"       => array(
			1 => __( '1 Column', 'better-studio' ),
			2 => __( '2 Column', 'better-studio' ),
			3 => __( '3 Column', 'better-studio' ),
		),
		'show_on'       => array(
			array(
				'type=campaign'
			),
		),
		'repeater_item' => true,
		'ad-id'         => $args['id_prefix'],
	);
	$repeater_items['orderby']   = array(
		'name'          => __( 'Order By', 'better-studio' ),
		'id'            => 'orderby',
		'type'          => 'select',
		"options"       => array(
			'date'  => __( 'Date', 'better-studio' ),
			'title' => __( 'Title', 'better-studio' ),
			'rand'  => __( 'Rand', 'better-studio' ),
		),
		'show_on'       => array(
			array(
				'type=campaign'
			),
		),
		'repeater_item' => true,
		'ad-id'         => $args['id_prefix'],
	);
	$repeater_items['order']     = array(
		'name'          => __( 'Order', 'better-studio' ),
		'id'            => 'order',
		'type'          => 'select',
		"options"       => array(
			'ASC'  => __( 'Ascending', 'better-studio' ),
			'DESC' => __( 'Descending', 'better-studio' ),
		),
		'show_on'       => array(
			array(
				'type=campaign'
			),
		),
		'repeater_item' => true,
		'ad-id'         => $args['id_prefix'],
	);
	$repeater_items['align']     = array(
		'name'          => __( 'Align', 'better-studio' ),
		'id'            => 'align',
		'desc'          => __( 'Choose align of ad.', 'better-studio' ),
		'type'          => 'select',
		'options'       => array(
			'left'   => __( 'Left Align', 'better-studio' ),
			'center' => __( 'Center Align', 'better-studio' ),
			'right'  => __( 'Right Align', 'better-studio' ),
		),
		'show_on'       => array(
			array(
				'type=banner',
			),
			array(
				'type=campaign',
			),
		),
		'repeater_item' => true,
		'ad-id'         => $args['id_prefix'],
	);
	$repeater_items['lazy-load'] = array(
		'name'          => __( 'Lazy Load Ad?', 'better-studio' ),
		'desc'          => __( 'Chose the behaviour of lazy loading.', 'better-studio' ),
		'id'            => 'lazy-load',
		'type'          => 'select',
		"options"       => array(
			''        => __( '-- Inherit from panel --', 'better-studio' ),
			'enable'  => __( 'Yes, Lazy load this ad', 'better-studio' ),
			'disable' => __( 'No, Load this Ad as normal', 'better-studio' ),
		),
		'std'           => 'center',
		'show_on'       => array(
			array(
				'type=banner',
			),
			array(
				'type=campaign',
			),
		),
		'ad-id'         => $args['id_prefix'],
		'repeater_item' => true,
	);


	if ( ! empty( $args['field_end_fields'] ) ) {
		foreach ( (array) $args['field_end_fields'] as $field_id => $field_val ) {
			$repeater_items[ $field_id ] = $field_val;
		}
	}

	$fields[ $args['id_prefix'] ] = array(
		'name'          => $args['field_title'],
		'desc'          => $args['field_desc'],
		'id'            => $args['id_prefix'],
		'type'          => 'repeater',
		'save-std'      => true,
		'default'       => array(
			array(
				'type'      => '',
				'campaign'  => 'none',
				'banner'    => 'none',
				'paragraph' => 3,
				'count'     => 3,
				'columns'   => 3,
				'orderby'   => 'rand',
				'order'     => 'ASC',
				'align'     => 'center',
				'lazy-load' => '',
				'post_type' => '',
			),
		),
		'add_label'     => $args['field_add_label'],
		'delete_label'  => $args['field_delete_label'],
		'item_title'    => $args['field_item_title'],
		'section_class' => 'full-with-both' . ( $args['field_item_smart_title'] ? ' better-ads-repeater-ad-field' : '' ),
		'options'       => $repeater_items,
		'ad-id'         => $args['id_prefix'],
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

}


/**
 * Shows ad location code by its panel prefix or data
 *
 * @param string $panel_ad_prefix
 * @param null   $ad_data
 * @param array  $args
 */
function better_ads_show_ad_location( $panel_ad_prefix = '', $ad_data = null, $args = array() ) {

	if ( empty( $panel_ad_prefix ) ) {
		return;
	}

	if ( is_null( $ad_data ) || ! is_array( $ad_data ) ) {
		$ad_data = better_ads_get_ad_location_data( $panel_ad_prefix );
	}

	if ( ! empty( $args['container-class'] ) ) {
		if ( ! empty( $ad_data['container-class'] ) ) {
			$ad_data['container-class'] .= ' ' . $args['container-class'] . ' better-ads-loc-' . $panel_ad_prefix;
		} else {
			$ad_data['container-class'] = $args['container-class'] . ' better-ads-loc-' . $panel_ad_prefix;
		}
	} else {
		$ad_data['container-class'] = 'better-ads-loc-' . $panel_ad_prefix;
	}

	echo Better_Ads_Manager()->show_ads( $ad_data );
}


/**
 * Returns full list of Ad location data from it's prefix inside panel
 *
 * @param string     $panel_ad_prefix
 * @param bool       $multiple
 * @param array|null $extra_fields Extra fields related to this ad location
 *
 * @return array
 */
function better_ads_get_ad_location_data( $panel_ad_prefix = '', $multiple = false, $extra_fields = null ) {

	// Disabled for this item -> not matters for all or not
	if ( ! better_ads_ad_can_be_shown( 'ad-location' ) ) {
		return better_ads_get_ad_data_default( $extra_fields );
	}

	return better_ads_get_ad_data( $panel_ad_prefix, $multiple, $extra_fields );
}


/**
 * Checks the ad can be shown on page based on the location and the disable feature
 * .
 *
 * @param string $type
 *
 * @return bool
 */
function better_ads_ad_can_be_shown( $type = '' ) {

	$func         = '';
	$object       = '';
	$object_id    = null;
	$disable_all  = '';
	$disable_item = '';

	if ( is_singular() ) {
		$func   = 'bf_get_post_meta';
		$object = get_post_type();
	} elseif ( is_archive() ) {

		$queried_object = get_queried_object();

		if ( ! empty( $queried_object->taxonomy ) ) {
			$func   = 'bf_get_term_meta';
			$object = $queried_object->taxonomy;
		} elseif ( is_date() ) {
			$object = 'date';
		} // WooCommerce shop page is a exception because the page ID is not the same as the value of get_the_ID()
		elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() && is_shop() ) {
			$func      = 'bf_get_post_meta';
			$object    = 'page';
			$object_id = get_option( 'woocommerce_shop_page_id' );
		}
	} elseif ( is_search() ) {
		$object = 'search';
	} elseif ( is_404() ) {
		$object = '404';
	}


	//
	// Disabled for all items
	//
	if ( ! empty( $object ) ) {
		$disable_all = Better_Ads_Manager::get_option( $object . '_disable_all' );
	}

	//
	// Disabled for this item
	//
	if ( ! empty( $func ) ) {

		$disable_loc = '';

		if ( $type == 'ad-location' ) {
			$disable_loc = call_user_func( $func, 'bam_disable_locations', $object_id );
		} elseif ( $type == 'widget' ) {
			$disable_loc = call_user_func( $func, 'bam_disable_widgets', $object_id );
		} elseif ( $type == 'shortcode' ) {
			$disable_loc = call_user_func( $func, 'bam_disable_post_content', $object_id );
		}

		$disable_item = $disable_loc;

		// not 'show' or '1'
		// mean it show for location -> highest priority
		if ( $disable_loc == '' ) {
			$disable_item = call_user_func( $func, 'bam_disable_all', $object_id );
		}

		// '1' means hide
		// '' and 'show' mean Show
		if ( $disable_item == 1 ) {
			$disable_item = 'hide';
		}

		//
		// $disable_item == ''      ->  show    ->  panel have priority
		// $disable_item == '1'     ->  hide    ->  hide it, more priority than panel
		// $disable_item == 'show'  ->  show    ->  show it, more priority than panel
		//
	}

	// Disabled for this item -> not matters for all or not
	if ( $disable_item == 'hide' ) {
		return false;
	} // Disabled for all items but this item made it enable!
	elseif ( $disable_all && $disable_item != 'show' ) {
		return false;
	}

	return true;
}


if ( ! function_exists( 'better_ads_get_ad_data_default' ) ) {
	/**
	 * returns base data for ad banner!
	 *
	 * @param array|null $extra_fields Extra fields related to this ad location
	 *
	 * @return array
	 */
	function better_ads_get_ad_data_default( $extra_fields = null ) {

		$fields = array(
			'type'            => '',
			'banner'          => '',
			'campaign'        => '',
			'count'           => '',
			'columns'         => '',
			'orderby'         => '',
			'order'           => '',
			'align'           => '',
			'lazy-load'       => '',
			'active_location' => false,
		);

		if ( ! is_null( $extra_fields ) ) {
			$fields = bf_merge_args( $fields, $extra_fields );
		}

		return $fields;
	}
}


if ( ! function_exists( 'better_ads_get_ad_data_override' ) ) {
	/**
	 * Returns data for ad location (even overidded data)
	 *
	 * @param string $panel_ad_prefix
	 * @param bool   $multiple
	 * @param string $type
	 * @param null   $extra_fields Extra fields for current ad location
	 *
	 * @return array
	 */
	function better_ads_get_ad_data_override( $panel_ad_prefix = '', $multiple = false, $type = 'ad-location', $extra_fields = null ) {

		$data_ids = better_ads_get_ad_data_default( $extra_fields );

		$object_id   = 0;
		$object_type = '';
		$override_id = false;
		$data        = array();
		$data_filled = false;


		//
		// Find override ID for current page
		//
		if ( is_front_page() ) {

			global $wp_query;

			if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_on_front' ) && $wp_query->is_page( get_option( 'page_on_front' ) ) ) {
				$override_id = get_post_type();
				$object_id   = get_queried_object_id();
				$object_type = 'post';
			} else {
				$queried_object = get_queried_object();

				if ( ! empty( $queried_object->name ) ) {
					$override_id = $queried_object->name;
				}
			}
		} elseif ( is_singular() ) {
			if ( get_post_type() ) {
				$override_id = get_post_type();
				$object_id   = get_queried_object_id();
				$object_type = 'post';
			}
		} elseif ( is_post_type_archive() ) {

			$queried_object = get_queried_object();

			if ( ! empty( $queried_object->name ) ) {
				$override_id = $queried_object->name;
			}

		} elseif ( is_archive() ) {

			$queried_object = get_queried_object();

			if ( ! empty( $queried_object->taxonomy ) ) {
				$override_id = $queried_object->taxonomy;
				$object_id   = $queried_object->term_id;
				$object_type = 'taxonomy';
			} elseif ( is_date() ) {
				$override_id = 'date';
				$object_type = 'date';
			}
		} elseif ( is_search() ) {
			$override_id = 'search';
			$object_type = 'search';
		} elseif ( is_404() ) {
			$override_id = '404';
			$object_type = '404';
		}


		/**
		 * TODO: Refactor, DRY!
		 */
		if ( $multiple ) {

			if ( $override_id && $object_type === 'post' &&
			     bf_get_post_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix . '-active', $object_id )
			) {

				$data = bf_get_post_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix, $object_id );

			} elseif ( $override_id && $object_type === 'taxonomy' &&
			           bf_get_term_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix . '-active', $object_id )
			) {

				$data = bf_get_term_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix, $object_id );

			} elseif ( $override_id && Better_Ads_Manager::get_option( 'ovr_' . $override_id . '-' . $panel_ad_prefix . '-active' ) ) {


				$data = Better_Ads_Manager::get_option( 'ovr_' . $override_id . '-' . $panel_ad_prefix );

			} else {
				$data = Better_Ads_Manager::get_option( $panel_ad_prefix );
			}

		} else {


			if ( $type == 'ad-location' ) {

				$ad_active_id = 'ovr_' . $override_id . '-' . $panel_ad_prefix . '-active';


				if ( $override_id && $object_type === 'post' ) {

					//
					// The post itself overridden the ad
					//
					if ( bf_get_post_meta( $ad_active_id, $object_id ) ) {
						foreach ( $data_ids as $id => $value ) {
							$data[ $id ] = bf_get_post_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix . '_' . $id, $object_id );
						}

						$data_filled = true;
					} else {

						//
						// iterate all taxonomies of current post to find first term that overridden the ad
						//
						foreach ( get_post_taxonomies( $object_id ) as $taxonomy ) {

							// data filled in prev taxonomy
							if ( $data_filled ) {
								break;
							}

							// Exceptions
							{
								$_check = array(
									'post_format' => '',
									'post_tag'    => '',
								);

								if ( isset( $_check[ $taxonomy ] ) ) {
									continue;
								}
							}

							$terms = wp_get_post_terms( $object_id, $taxonomy );

							// todo add default category support

							// issue in terms
							if ( is_wp_error( $terms ) ) {
								continue;
							}

							foreach ( $terms as $term ) {

								// not override in this term
								if ( ! bf_get_term_meta( 'ovr_' . $taxonomy . '-' . $panel_ad_prefix . '-active', $term->term_id ) ) {
									continue;
								}

								// collects data of overridden ad from term
								foreach ( $data_ids as $id => $value ) {
									$data[ $id ] = bf_get_term_meta( 'ovr_' . $taxonomy . '-' . $panel_ad_prefix . '_' . $id, $term->term_id );
								}

								$data_filled = true;
								break;
							}


						}
					}
				}


				//
				// Taxonomy
				//
				if ( ! $data_filled && $override_id && $object_type === 'taxonomy' &&
				     bf_get_term_meta( $ad_active_id, $object_id )
				) {

					foreach ( $data_ids as $id => $value ) {
						$data[ $id ] = bf_get_term_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix . '_' . $id, $object_id );
					}

					$data_filled = true;
				}

				//
				// Option ad location
				//
				if ( ! $data_filled && $override_id && Better_Ads_Manager::get_option( $ad_active_id ) ) {

					foreach ( $data_ids as $id => $value ) {
						$data[ $id ] = Better_Ads_Manager::get_option( 'ovr_' . $override_id . '-' . $panel_ad_prefix . '_' . $id );
					}

					$data_filled = true;
				}

				//
				// exact option
				//
				if ( ! $data_filled ) {

					foreach ( $data_ids as $id => $value ) {
						$data[ $id ] = Better_Ads_Manager::get_option( $panel_ad_prefix . '_' . $id );
					}
				}
			} elseif ( $type === 'option' ) {

				$data = '___default___';

				if ( $override_id && $object_type === 'post' ) {
					$data = bf_get_post_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix, $object_id, $data );
				} elseif ( $override_id && $object_type === 'taxonomy' ) {
					$data = bf_get_term_meta( 'ovr_' . $override_id . '-' . $panel_ad_prefix, $object_id, $data );
				}

				if ( $data === '___default___' || is_null( $data ) ) {
					$data = Better_Ads_Manager::get_option( $panel_ad_prefix );
				}
			}

		}

		return $data;
	} // better_ads_get_ad_data_override
}


/**
 * Returns full list of Ad location data from it's prefix inside panel
 *
 * @param string $panel_ad_prefix
 * @param bool   $multiple
 * @param null   $extra_fields Extra fields related to current ad location
 *
 * @return array
 */
function better_ads_get_ad_data( $panel_ad_prefix = '', $multiple = false, $extra_fields = null ) {

	$data_ids = better_ads_get_ad_data_default( $extra_fields );

	if ( empty( $panel_ad_prefix ) ) {
		return $multiple ? array( $data_ids ) : $data_ids;
	}

	$final_ads = array();
	$data      = better_ads_get_ad_data_override( $panel_ad_prefix, $multiple, 'ad-location', $extra_fields );

	if ( ! $multiple ) {
		$data = array( $data );
	}

	foreach ( $data as $ad_item ) {

		// Type not selected
		if ( empty( $ad_item['type'] ) || $ad_item['type'] === 'none' ) {
			continue;
		}

		// Banner not selected
		if ( $ad_item['type'] === 'banner' && ( empty( $ad_item['banner'] ) || $ad_item['banner'] === 'none' ) ) {
			continue;
		} // Campaign not selected
		elseif ( $ad_item['type'] === 'campaign' && ( empty( $ad_item['campaign'] ) || $ad_item['campaign'] == 'none' ) ) {
			continue;
		}

		// Post type is not valid
		if ( ! empty( $ad_item['post_type'] ) ) {
			foreach ( explode( ',', $ad_item['post_type'] ) as $post_type ) {
				if ( ! is_singular( $post_type ) ) {
					continue;
				}
			}
		}

		$ad_item['active_location'] = true;

		if ( empty( $ad_item['align'] ) ) {
			$ad_item['align'] = 'center';
		}

		if ( bf_is_doing_ajax() ) {
			$ad_item['lazy-load'] = 'disable';
		} elseif ( empty( $ad_item['lazy-load'] ) ) {
			$ad_item['lazy-load'] = Better_Ads_Manager::get_option( 'lazy_loading_ads' );
		}


		$final_ads[] = $ad_item;
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


if ( ! function_exists( 'better_ads_extract_google_ad_code_data' ) ) {
	/**
	 * Handy function to fetching data from Google Adsense code.
	 *
	 * @param $code
	 *
	 * @return array
	 */
	function better_ads_extract_google_ad_code_data( $code ) {

		$data = array(
			'ad-client'             => '',
			'ad-layout'             => '',
			'ad-slot'               => '',
			'ad-format'             => '',
			'ad-layout-key'         => '',
			'style'                 => '',
			'full-width-responsive' => '',
		);

		$code = strtolower( $code );


		/**
		 *
		 * data-ad-client
		 *
		 * Format 1: <ins class="adsbygoogle" data-ad-client="*" ></ins>
		 *
		 * Format 2: <script> google_ad_client = "*"; </script>
		 *
		 */
		{
			// Format 1
			{
				preg_match( '/data-ad-client="(.*)"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['ad-client'] = $matches[1];
				}
			}

			// Other format: google_ad_client = "*";
			if ( empty( $data['ad-client'] ) ) {

				preg_match( '/google_ad_client\s*=\s*"\s*(.*)\s*"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['ad-client'] = $matches[1];
				}
			}
		}


		/**
		 *
		 * data-ad-slot
		 *
		 * Format 1: <ins class="adsbygoogle" data-ad-slot="*" ></ins>
		 *
		 * Format 2: <script> google_ad_slot = "*"; </script>
		 *
		 */
		{
			// Format 1
			{
				preg_match( '/data-ad-slot="(.*)"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['ad-slot'] = $matches[1];
				}
			}

			// Format 2
			if ( empty( $data['ad-slot'] ) ) {

				preg_match( '/google_ad_slot\s*=\s*"\s*(.*)\s*"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['ad-slot'] = $matches[1];
				}
			}
		}


		/**
		 *
		 * data-ad-layout-key
		 *
		 */
		preg_match( '/data-ad-layout-key="(.*)"/', $code, $matches );

		if ( ! empty( $matches[1] ) ) {
			$data['ad-layout-key'] = $matches[1];
		}


		/**
		 *
		 * data-layout
		 *
		 */
		preg_match( '/data-ad-layout="(.*)"/', $code, $matches );

		if ( ! empty( $matches[1] ) ) {
			$data['ad-layout'] = $matches[1];
		}


		/**
		 *
		 * data-ad-format
		 *
		 */
		preg_match( '/data-ad-format="(.*)"/', $code, $matches );

		if ( ! empty( $matches[1] ) ) {
			$data['ad-format'] = $matches[1];
		}

		$_check = array(
			'vertical'    => '',
			'horizontal'  => '',
			'rectangle'   => '',
			'fluid'       => '',
			'autorelaxed' => '',
			'auto'        => '',
		);

		if ( empty( $data['ad-format'] ) || ! isset( $_check[ $data['ad-format'] ] ) ) {
			$data['ad-format'] = 'auto';
		}


		/**
		 *
		 * data-full-width-responsive
		 *
		 */
		preg_match( '/data-full-width-responsive="(.*)"/', $code, $matches );

		if ( ! empty( $matches[1] ) ) {
			$data['full-width-responsive'] = $matches[1];
		}

		$_check = array(
			'false' => '',
			'true'  => '',
			''      => '',
		);
		if ( ! isset( $_check[ $data['full-width-responsive'] ] ) ) {
			$data['full-width-responsive'] = '';
		}


		/**
		 *
		 * style
		 *
		 */
		preg_match( '/style="(.*)"/', $code, $matches );

		if ( ! empty( $matches[1] ) ) {
			$data['style'] = $matches[1];
		}


		/**
		 *
		 * Matched Content Customization Attrs
		 *
		 */
		{

			/**
			 * matched-content-ui-type
			 */
			{
				preg_match( '/data-matched-content-ui-type="(.*)"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['matched-content-ui-type'] = $matches[1];
				}
			}

			/**
			 * matched-content-rows-num
			 */
			{
				preg_match( '/data-matched-content-rows-num="(.*)"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['matched-content-rows-num'] = $matches[1];
				}
			}

			/**
			 * matched-content-columns-num
			 */
			{
				preg_match( '/data-matched-content-columns-num="(.*)"/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['matched-content-columns-num'] = $matches[1];
				}
			}
		}


		/**
		 *
		 * Style width
		 *
		 * Format 1: <ins class="adsbygoogle" style="width:728px" ></ins>
		 *
		 * Format 2: <script> google_ad_width = 728; </script>
		 *
		 */
		if ( empty( $data['width'] ) ) {

			// Format 1
			{
				preg_match( '/[^-]width[: ]+([0-9]+)[px]/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['width'] = $matches[1];
				}
			}

			// Format 2
			if ( empty( $data['width'] ) ) {
				preg_match( '/google_ad_width\s*=\s*(\d*)\s*;/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['width'] = $matches[1];
				}
			}
		}


		/**
		 *
		 * Style height
		 *
		 * Format 1: <ins class="adsbygoogle" style="height:90px" ></ins>
		 *
		 * Format 2: <script> google_ad_height = 90; </script>
		 *
		 */
		if ( empty( $data['height'] ) ) {

			// Format 1
			{
				preg_match( '/[^-]height[: ]+([0-9]+)[px]/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['height'] = $matches[1];
				}
			}

			// Format 2
			if ( empty( $data['height'] ) ) {
				preg_match( '/google_ad_height\s*=\s*(\d*)\s*;/', $code, $matches );

				if ( ! empty( $matches[1] ) ) {
					$data['height'] = $matches[1];
				}
			}
		}

		return $data;
	} // better_ads_extract_google_ad_code_data
}


if ( ! function_exists( 'bam_deferred_dfp_spot_options' ) ) {
	/**
	 * Callback for banner options. Extracts spots from list and shows them to user for easy to use.
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function bam_deferred_dfp_spot_options( $args = array() ) {

		$options = array(
			''       => __( '-- Select Spot --', 'better-studio' ),
			'custom' => __( 'Custom Code', 'better-studio' ),
		);

		$dfp_code = Better_Ads_Manager::get_option( 'dfp_code' );

		if ( ! empty( $dfp_code ) ) {
			preg_match_all( '#defineSlot\((.*)\).addService#', $dfp_code, $dfp_spots );
		} else {
			$dfp_spots = array();
		}

		$group = array(
			'label'   => __( 'Auto detected DFP spots', 'better-studio' ),
			'options' => array()
		);

		if ( ! empty( $dfp_spots[1] ) ) {
			foreach ( $dfp_spots[1] as $_spot ) {
				$group['options'][ str_replace( ',', '--', $_spot ) ] = $_spot;
			}
		}

		if ( empty( $group['options'] ) ) {
			$group['options']['not-detected'] = array(
				'label'    => __( 'Please enter DFP code into Better Ads Manager panle', 'better-studio' ),
				'disabled' => true,
			);
		}

		$options[] = $group;

		return $options;
	}
}


if ( ! function_exists( 'better_ads_get_override_sections_list' ) ) {
	/**
	 * Returns list of items that can be overridden
	 *
	 * @return array
	 */
	function better_ads_get_override_sections_list() {

		static $sections;

		if ( $sections ) {
			return $sections;
		}

		$sections = array(
			'post_type'     => array(
				'label' => 'Post Types',
				'items' => array(),
			),
			'taxonomy'      => array(
				'label' => 'Taxonomies',
				'items' => array(),
			),
			'general_pages' => array(
				'label' => 'General Pages',
				'items' => array(),
			),
		);


		//
		// CPT's
		//
		{
			$post_types = array_diff_key(
				get_post_types(
					array(
						'public' => true,
					)
				),
				array(
					'attachment' => 0,
				)
			);


			foreach ( $post_types as $cpt_id ) {

				$post_type = get_post_type_object( $cpt_id );

				$sections['post_type']['items'][ $cpt_id ] = array(
					'id'           => $cpt_id,
					'label'        => $post_type->labels->singular_name,
					'label_plural' => $post_type->labels->name,
				);
			}

			ksort( $sections['post_type']['items'] );
		}


		//
		// Taxonomy
		//
		{
			$taxonomies = array_diff_key(
				get_taxonomies(
					array(
						'public' => true,
					)
				),
				array(
					'nav_menu'               => 0,
					'link_category'          => 0,
					'post_format'            => 0,
					'product_shipping_class' => 0,
					'product_type'           => 0,
				)
			);

			foreach ( $taxonomies as $tax_id ) {
				$tax = get_taxonomy( $tax_id );

				$sections['taxonomy']['items'][ $tax_id ] = array(
					'id'           => $tax_id,
					'label'        => $tax->labels->singular_name,
					'label_plural' => $tax->labels->name,
				);
			}

			ksort( $sections['taxonomy']['items'] );
		}


		//
		// General Pages
		//
		{
			// Search page
			$sections['general_pages']['items']['search'] = array(
				'id'           => 'search',
				'label'        => 'Search Page',
				'label_plural' => 'Search Pages',
			);

			// Date archive pages
			$sections['general_pages']['items']['date'] = array(
				'id'           => 'date',
				'label'        => 'Date Archive Page',
				'label_plural' => 'Date Archive Pages',
			);

			// 404 page
			$sections['general_pages']['items']['404'] = array(
				'id'           => '404',
				'label'        => '404 Page',
				'label_plural' => '404 Pages',
			);
		}

		return $sections;
	} // better_ads_get_override_sections_list
}


if ( ! function_exists( 'better_ads_get_override_fields_list' ) ) {
	/**
	 * Creates fields list of a overriden section
	 *
	 * @param array $fields
	 * @param array $args
	 *
	 * @return array
	 */
	function better_ads_get_override_fields_list( $fields = array(), $args = array() ) {

		$section_fields = array();

		//
		// Loads fields from filter
		//
		if ( empty( $fields ) ) {
			$fields = apply_filters( 'better-framework/panel/better_ads_manager/fields', array() );
		}

		//
		// Remove extra field or not!
		//
		if ( isset( $args['type'] ) ) {
			$exclude_extra_fields_type = $args['type'];
			$exclude_extra_fields      = true;
		} elseif ( bf_is_doing_ajax() && isset( $_REQUEST['type'] ) ) {
			$exclude_extra_fields_type = $_REQUEST['type'];
			$exclude_extra_fields      = true;
		} else {
			$exclude_extra_fields_type = false;
			$exclude_extra_fields      = false;
		}

		$exclude_to_next_tab = false;

		// Converts tabs and groups to be nested fields
		foreach ( $fields as $field_id => $field ) {

			// from start to DFP or AMP ads
			if ( ! empty( $field['id'] ) && ( $field['id'] === 'dfp_settings' || $field['id'] === 'amp_ads' || $field['id'] === 'override_settings' ) ) {
				break;
			}

			//
			// Remove extra and unneeded override fields.
			// For example post ads in taxonomy does not sense!
			//
			if ( $exclude_extra_fields ) {

				// Note: Commented because we added override tax ads inside their posts and because of that
				//       the posts ads needed to be overridden.
				//
				// Taxonomy and Inside Post Ads
				//if ( $exclude_extra_fields_type === 'taxonomy' && ! empty( $field['id'] ) && $field['id'] === 'post_ads_tab' ) {
				//	$exclude_to_next_tab = TRUE;
				//	continue;
				//} // Metabox and After X Post Ads (archive ads)
				if ( ( $exclude_extra_fields_type === 'metabox' || $exclude_extra_fields_type === 'post_type' ) && ! empty( $field['id'] ) && $field['id'] === 'after_x_post_ad_tab' ) {
					$exclude_to_next_tab = true;
					continue;
				}

				// Exclude all field to the next tab field.
				if ( $exclude_to_next_tab ) {
					if ( ! isset( $field['type'] ) || $field['type'] !== 'tab' ) {
						continue;
					} else {
						$exclude_to_next_tab = false;
					}
				}
			}


			// exclude specific fields
			if ( isset( $field['exclude-in-override'] ) && $field['exclude-in-override'] ) {
				continue;
			}

			if ( ! empty( $field['type'] ) ) {
				if ( $field['type'] === 'tab' ) {
					$field['type']  = 'group';
					$field['level'] = 2;
					$field['state'] = 'close';
					unset( $field['ajax-tab'] );
				} elseif ( $field['type'] === 'group' ) {
					$field['level'] = 4;
					$field['type']  = 'group';
					$field['state'] = 'close';
				} elseif ( $field['type'] === 'heading' ) {
					$field['type']  = 'group';
					$field['level'] = 3;
					$field['state'] = 'close';
				}
			}

			$field['ajax-tab-field'] = 'override_settings';

			$section_fields[ $field_id ] = $field;
		}

		return $section_fields;

	} // better_ads_get_override_fields_list
}


if ( ! function_exists( 'better_ads_inject_override_ad_section_fields' ) ) {
	/**
	 * Creates overridable fields for a section
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function better_ads_inject_override_ad_section_fields( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'id'                 => '',
			'name'               => '',
			'fields'             => array(),
			'ajax-section-field' => '',
			'type'               => '',
		) );

		$action             = '';
		$condition_field_id = '';
		$override_fields    = array();
		$closed             = true;

		foreach ( $args['fields'] as $field_k => $field ) {

			// create new ID
			if ( ! empty( $field['id'] ) ) {
				$id = 'ovr_' . $args['id'] . '-' . $field['id'];
			} else {
				$id = $field_k;
			}

			if ( ! isset( $override_fields[ $args['id'] . '_disable_all' ] ) ) {
				$override_fields[ $args['id'] . '_disable_all' ] = array(
					'name'           => sprintf( __( 'Hide all Ads in "%s"', 'better-studio' ), $args['name'] ),
					'desc'           => sprintf( __( 'by enabling this all ads inside "%s" will be disabled and not showing.', 'better-studio' ), $args['name'] ),
					'id'             => $args['id'] . '_disable_all',
					'type'           => 'switch',
					'std'            => 0,
					'ajax-tab-field' => $args['ajax-section-field'],
				);
			}

			//
			// Add condition field for group fields
			//
			if ( $action == 'add condition' ) {

				if ( isset( $field['ad-id'] ) ) {
					$condition_field_id = 'ovr_' . $args['id'] . '-' . $field['ad-id'] . '-active';
				} else {
					$condition_field_id = $id . '-active';
				}

				$override_fields[ $condition_field_id ] = array(
					'name'           => __( 'Override this ad?', 'better-studio' ),
					'desc'           => sprintf( __( 'You can override this ad location for "%s" with enabling this option', 'better-studio' ), $args['name'] ),
					'id'             => $condition_field_id,
					'type'           => 'switch',
					'std'            => 0,
					'ajax-tab-field' => $args['ajax-section-field'],
				);

				//
				// Adds an override ads in the post of taxonomy field to the ad override fields
				//
				if ( $args['type'] === 'taxonomy' ) {

					if ( isset( $field['ad-id'] ) ) {
						$override_child_field_id = 'ovr_' . $args['id'] . '-' . $field['ad-id'] . '-override-in-child';
					} else {
						$override_child_field_id = $id . '-override-in-child';
					}

					$override_fields[ $override_child_field_id ] = array(
						'name'           => __( 'Override inside the Child Posts?', 'better-studio' ),
						'desc'           => sprintf( __( 'By enabling this option the overridden ad will be shows for all posts of this "%s".', 'better-studio' ), $args['name'] ),
						'id'             => $override_child_field_id,
						'type'           => 'switch',
						'std'            => 0,
						'ajax-tab-field' => $args['ajax-section-field'],
						'show_on'        => array(
							array(
								$condition_field_id . '=1'
							)
						)
					);
				}

				$action = 'add filter';

			}


			//
			// Add filter for group fields (show_on)
			//
			if ( $action == 'add filter' && $field['type'] !== 'group' ) {

				//
				// Update old show_on value
				//
				if ( isset( $field['show_on'] ) ) {

					$new_show_on = array();

					if ( ! empty( $field['_show_on_parent'] ) ) {
						$type_id = $field['_show_on_parent'];
						$rep_id  = 'ovr_' . $args['id'] . '-' . $field['_show_on_parent'];
					} else {

						//
						// remove text after last _ to detect the parent field id for replacement
						// We suggest to add "_show_on_parent" to parent.
						//
						$type_id = explode( '_', $field['id'] );
						if ( bf_count( $type_id ) > 1 ) {
							array_pop( $type_id );
						}

						$type_id = implode( '_', $type_id );
						$rep_id  = 'ovr_' . $args['id'] . '-' . $type_id;
					}


					// renames old ID's to new id
					foreach ( $field['show_on'] as $show_l1 ) {

						$_show_l1 = array();

						foreach ( $show_l1 as $show_l2 ) {
							$_show_l1[] = str_replace( $type_id, $rep_id, $show_l2 );
						}

						$new_show_on[] = $_show_l1;
					}


					// add new filter to show on
					foreach ( $new_show_on as $idx => $_ ) {
						$new_show_on[ $idx ][] = $condition_field_id . '=1';
					}
					$field['show_on'] = $new_show_on;

				} else {
					$field['show_on'] = array(
						array(
							$condition_field_id . '=1'
						)
					);
				}

			}


			if ( $field['type'] === 'group' && $field['level'] == 2 ) {
				$override_fields[ $id . '-close' ] = array(
					'type'           => 'group_close',
					'ajax-tab-field' => $args['ajax-section-field'],
					'level'          => 'all',
				);
			}


			if ( $field['type'] !== 'group_close' ) {
				$field['id']             = $id;
				$field['ajax-tab-field'] = $args['ajax-section-field'];
				$override_fields[ $id ]  = $field;
			}


			//
			// auto close for old group
			//
			if ( $field['type'] === 'group' && $field['level'] == 4 && ! $closed ) {
				$override_fields[ $id . '-close' ] = array(
					'type'           => 'group_close',
					'ajax-tab-field' => $args['ajax-section-field'],
				);
				$closed                            = true;
			}


			//
			// group start -> condition field should be added
			//
			if ( $field['type'] === 'group' && $field['level'] == 4 ) {
				$action = 'add condition';
			}


			//
			// End of group -> clear
			//
			elseif ( $field['type'] === 'group_close' ) {
				$action             = '';
				$condition_field_id = '';
				$closed             = true;
			}

		}

		return $override_fields;

	} // better_ads_inject_override_ad_section_fields
}


if ( ! function_exists( 'better_ads_section_override_fields_list' ) ) {
	/**
	 * Prepares fields to opened group in ajax action of panel
	 *
	 * @param $args
	 *
	 * @return array
	 */
	function better_ads_section_override_fields_list( $args ) {

		$section_fields_list = better_ads_get_override_fields_list( array(), $args );

		if ( empty( $args['ajax-section-field'] ) ) {
			$args['ajax-section-field'] = 'ajax-section-field';
		}

		$section_fields = better_ads_inject_override_ad_section_fields( array(
			'id'                 => $args['section'],
			'name'               => $args['section-name'],
			'fields'             => $section_fields_list,
			'ajax-section-field' => $args['ajax-section-field'],
			'type'               => ! empty( $args['type'] ) ? $args['type'] : '',
		) );

		return $section_fields;
	}
}


if ( ! function_exists( 'better_ads_section_disable_fields_list' ) ) {
	/**
	 * Prepares fields to opened group in ajax action of panel
	 *
	 * @param array $fields
	 * @param array $args
	 *
	 * @return array
	 */
	function better_ads_section_disable_fields_list( $fields = array(), $args = array() ) {

		$args = bf_merge_args( $args, array(
			'type' => 'post',
		) );

		$fields['bam_disable_all'] = array(
			'name'    => __( 'Disable All Ads?', 'better-studio' ),
			'id'      => 'bam_disable_all',
			'type'    => 'select',
			'options' => array(
				''     => __( '-- Inherit From Ads Manager Panel --', 'better-studio' ),
				'1'    => __( 'Disable All Ads', 'better-studio' ),
				'show' => __( 'Show All Ads', 'better-studio' ),
			),
			'desc'    => __( 'Hides all ads.', 'better-studio' ),
		);

		$fields['bam_disable_locations'] = array(
			'name'    => __( 'Disable All Ad Locations?', 'better-studio' ),
			'id'      => 'bam_disable_locations',
			'type'    => 'select',
			'options' => array(
				''     => __( '-- Inherit From Ads Manager Panel --', 'better-studio' ),
				'1'    => __( 'Disable All Ads', 'better-studio' ),
				'show' => __( 'Show All Ads', 'better-studio' ),
			),
			'desc'    => __( 'Hides only ad locations.', 'better-studio' ),
		);

		$fields['bam_disable_widgets'] = array(
			'name'    => __( 'Disable All Widgets?', 'better-studio' ),
			'id'      => 'bam_disable_widgets',
			'type'    => 'select',
			'options' => array(
				''     => __( '-- Inherit From Ads Manager Panel --', 'better-studio' ),
				'1'    => __( 'Disable All Ads', 'better-studio' ),
				'show' => __( 'Show All Ads', 'better-studio' ),
			),
			'desc'    => __( 'Hides ad widgets.', 'better-studio' ),
		);

		if ( $args['type'] === 'post' ) {
			$fields['bam_disable_post_content'] = array(
				'name'    => __( 'Disable All Content Ads?', 'better-studio' ),
				'id'      => 'bam_disable_post_content',
				'type'    => 'select',
				'options' => array(
					''     => __( '-- Inherit From Ads Manager Panel --', 'better-studio' ),
					'1'    => __( 'Disable All Ads', 'better-studio' ),
					'show' => __( 'Show All Ads', 'better-studio' ),
				),
				'desc'    => __( 'Hides post content ads.', 'better-studio' ),
			);
		}

		return $fields;
	}
}
