<?php

if ( ! function_exists( 'publisher_is_ad_plugin_active' ) ) {
	/**
	 * Detect the BetterAds manager v1.4 is active or not
	 *
	 * @return bool
	 */
	function publisher_is_ad_plugin_active() {

		static $active;

		if ( ! is_null( $active ) ) {
			return $active;
		}

		return $active = class_exists( 'Better_Ads_Manager' ) && function_exists( 'better_ads_get_ad_data_override' );
	}
}


if ( ! function_exists( 'publisher_get_ad_location_data' ) ) {
	/**
	 * Return data of Ad location by its ID prefix
	 *
	 * @param string     $ad_location_prefix
	 * @param null|array $extra_fields Extra fields related to this ad location
	 * @param bool       $cache        Caches the ad data for next usage, Optional
	 *
	 * @return array
	 */
	function publisher_get_ad_location_data( $ad_location_prefix = '', $extra_fields = null, $cache = false ) {

		static $_cache = array();

		if ( ! publisher_is_ad_plugin_active() ) {
			return better_ads_get_ad_data_default( $extra_fields );
		}

		if ( $cache && isset( $_cache[ $ad_location_prefix ] ) ) {
			return $_cache[ $ad_location_prefix ];
		}

		$data = better_ads_get_ad_location_data( $ad_location_prefix, false, $extra_fields );

		if ( $cache ) {
			$_cache[ $ad_location_prefix ] = $data;
		}

		return $data;
	}
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
			'active_location' => false,
		);

		if ( ! is_null( $extra_fields ) ) {
			$fields = bf_merge_args( $fields, $extra_fields );
		}

		return $fields;
	}
}


if ( ! function_exists( 'publisher_show_ad_location' ) ) {
	/**
	 * Return data of Ad location by its ID prefix
	 *
	 * @param string $ad_location_prefix
	 * @param array  $args
	 *
	 * @return array
	 */
	function publisher_show_ad_location( $ad_location_prefix = '', $args = array() ) {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		// get data if not passed
		if ( empty( $args['ad-data'] ) ) {
			$ad = publisher_get_ad_location_data( $ad_location_prefix );
		} else {
			$ad = $args['ad-data'];
		}

		// Ads advanced classes for banner type
		if ( $ad['active_location'] && $ad['type'] == 'banner' ) {

			$ad_data = Better_Ads_Manager()->get_banner_data( $ad['banner'] );

			if ( empty( $args['container-class'] ) ) {
				$args['container-class'] = 'better-ads-pubadban';
			} else {
				$args['container-class'] .= ' better-ads-pubadban';
			}

			if ( $ad_data['show_desktop'] ) {
				$args['container-class'] .= ' better-ads-show-desktop';
			}

			if ( ! empty( $ad_data['show_tablet_portrait'] ) ) {
				$args['container-class'] .= ' better-ads-show-tablet-portrait';
			}

			if ( ! empty( $ad_data['show_tablet_landscape'] ) ) {
				$args['container-class'] .= ' better-ads-show-tablet-landscape';
			}

			if ( ! empty( $ad_data['show_phone'] ) ) {
				$args['container-class'] .= ' better-ads-show-phone';
			}
		}

		if ( $ad['active_location'] ) {

			if ( empty( $args['container-class'] ) ) {
				$args['container-class'] = '';
			}

			if ( ! empty( $args['before'] ) ) {
				echo $args['before'];
			}

			better_ads_show_ad_location( $ad_location_prefix, $ad, array(
				'container-class' => $args['container-class']
			) );

			if ( ! empty( $args['after'] ) ) {
				echo $args['after'];
			}
		}
	}
}


add_filter( 'better-framework/panel/better_ads_manager/fields', 'publisher_better_ads_options_top', 10 );

if ( ! function_exists( 'publisher_better_ads_options_top' ) ) {
	/**
	 * Publisher ads
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_better_ads_options_top( $fields ) {

		/**
		 *
		 * Header Ads
		 *
		 */
		$fields['header_ads'] = array(
			'name' => __( 'Header Ads', 'publisher' ),
			'id'   => 'header_ads',
			'type' => 'tab',
			'icon' => 'bsai-header',
		);

		$fields[] = array(
			'name'   => __( 'Header Style 2 & 3', 'publisher' ),
			'type'   => 'heading',
			'layout' => 'style-2',
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => true,
				'group_title' => __( 'Aside Logo Ad', 'publisher' ),
				'group_state' => 'close',
				'id_prefix'   => 'header_aside_logo',
				'end_fields'  => array(
					'header_aside_logo_show_mobile' => array(
						'name'    => __( 'Show on mobile?', 'publisher' ),
						'id'      => 'header_aside_logo_show_mobile',
						'type'    => 'select',
						'options' => array(
							'hide'               => __( 'No, Hide it', 'publisher' ),
							'show-after-header'  => __( 'Yes, Show ad after header', 'publisher' ),
							'show-before-header' => __( 'Yes, Show ad before header', 'publisher' ),
						),
						'std'     => __( 'By enabling this option the aside logo ad will be shown on the mobile devices', 'publisher' ),
						'ad-id'   => 'header_aside_logo',
					),
				)
			)
		);


		$fields[] = array(
			'name'   => __( 'Header Style 1, 4 & 7', 'publisher' ),
			'type'   => 'heading',
			'layout' => 'style-2',
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => true,
				'group_title' => __( 'Header Left Ad', 'publisher' ),
				'group_state' => 'close',
				'id_prefix'   => 'header_aside_logo_left',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => true,
				'group_title' => __( 'Header Right Ad', 'publisher' ),
				'group_state' => 'close',
				'id_prefix'   => 'header_aside_logo_right',
			)
		);


		$fields[] = array(
			'name'   => __( 'General Header', 'publisher' ),
			'type'   => 'heading',
			'layout' => 'style-2',
		);


		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'Before Header', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'header_before',
				'start_fields' => array(
					'header_before_bg'     => array(
						'name'  => __( 'Background Color', 'publisher' ),
						'id'    => 'header_before_bg',
						'type'  => 'color',
						'std'   => __( 'This will adds background color for Before Header ad location.', 'publisher' ),
						'ad-id' => 'header_before',
					),
					'header_before_margin' => array(
						'name'  => __( 'Top & Bottom Margin', 'publisher' ),
						'id'    => 'header_before_margin',
						'type'  => 'text',
						'std'   => __( 'Space between ad box and add banner in this ad location.', 'publisher' ),
						'ad-id' => 'header_before',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => true,
				'group_title' => __( 'After Header', 'publisher' ),
				'group_state' => 'close',
				'id_prefix'   => 'header_after',
			)
		);

		return $fields;
	}
}


add_filter( 'better-framework/panel/better_ads_manager/fields', 'publisher_better_ads_options_bottom', 50 );

if ( ! function_exists( 'publisher_better_ads_options_bottom' ) ) {
	/**
	 * Publisher ads
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_better_ads_options_bottom( $fields ) {

		$fields[] = array(
			'name'   => __( 'Publisher Post Ads', 'publisher' ),
			'type'   => 'heading',
			'layout' => 'style-2',
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'Above Post (Top of post before everything)', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'post_box_above',
				'start_fields' => array(
					'post_box_above_note' => array(
						'name'      => __( 'Please Note', 'publisher' ),
						'id'        => 'post_box_above_note',
						'type'      => 'info',
						'std'       => __( 'This will be shown in top of post (before title and featured image).', 'publisher' ) .
						               __( '<br><br><strong style="color: red;">Important 1:</strong> Please note this can make a conflict with "After Header" ad location in this post templates: 2, 3, 4, 5, 6, 7, 12 and 13', 'publisher' ) .
						               __( '<br><br><strong style="color: red;">Important 2:</strong> This ad will be shown after header in responsive design (small screen size) and all post template will have conflict with "After Header" ad location.', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'warning',
						'ad-id'     => 'post_box_above',
					)
				),
			)
		);


		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'Between Featured Image & Post Title', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'post_between_featured_title',
				'start_fields' => array(
					'post_between_featured_logo_note' => array(
						'name'      => __( 'Please Note', 'publisher' ),
						'id'        => 'post_before_author_box_note',
						'type'      => 'info',
						'std'       => __( 'This will be shown only in post templates 1, 10, 12 and 13 and will not be shown in other post templates.', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'warning',
						'ad-id'     => 'post_between_featured_title',
					)
				),
			)
		);


		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'After Tags, Before Author Box', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'post_before_author_box',
				'start_fields' => array(
					'post_before_author_box_note' => array(
						'name'      => __( 'Please Note', 'publisher' ),
						'id'        => 'post_before_author_box_note',
						'type'      => 'info',
						'std'       => __( 'This will be shown before Author box and right after the Tags and if your post haven\'t tag then this will be the same as "<strong>Below Post Content</strong>".', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'warning',
						'ad-id'     => 'post_before_author_box',
					)
				),
			)
		);


		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'After Related Posts Box', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'post_after_related',
				'start_fields' => array(
					'post_after_related_note' => array(
						'name'      => __( 'Please Note', 'publisher' ),
						'id'        => 'post_after_related_note',
						'type'      => 'info',
						'std'       => __( 'This will be shown after related posts box and before comments box.', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'warning',
						'ad-id'     => 'post_after_related',
					)
				),
			)
		);


		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => true,
				'group_title' => __( 'Ajax Related Posts - Between Posts', 'publisher' ),
				'group_state' => 'close',
				'id_prefix'   => 'post_ajax_related',
			)
		);


		/**
		 *
		 * Header Ads
		 *
		 */
		$fields[] = array(
			'name' => __( 'Footer Ads', 'publisher' ),
			'id'   => 'footer_ads',
			'type' => 'tab',
			'icon' => 'bsai-footer',
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => true,
				'group_title' => __( 'Before Footer Ad', 'publisher' ),
				'group_state' => 'close',
				'id_prefix'   => 'footer_before',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'After Footer Ad', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'footer_after',
				'start_fields' => array(
					'footer_after_bg'     => array(
						'name'  => __( 'Background Color', 'publisher' ),
						'id'    => 'footer_after_bg',
						'type'  => 'color',
						'std'   => '',
						'desc'  => __( 'This will adds background color for After Footer ad location.', 'publisher' ),
						'ad-id' => 'footer_after',
					),
					'footer_after_margin' => array(
						'name'  => __( 'Top & Bottom Margin', 'publisher' ),
						'id'    => 'footer_after_margin',
						'type'  => 'text',
						'std'   => '',
						'desc'  => __( 'Space between ad box and add banner in this ad location.', 'publisher' ),
						'ad-id' => 'footer_after',
					),
				),
			)
		);


		/**
		 *
		 * Out of box
		 *
		 */
		$fields['after_x_post_ad_tab'] = array(
			'name'  => __( 'After Each X Posts Ads', 'publisher' ),
			'id'    => 'after_x_post_ad_tab',
			'type'  => 'tab',
			'icon'  => 'bsai-checked-grid',
			'badge' => array(
				'text'  => __( 'New', 'publisher' ),
				'color' => '#28CA41'
			),
		);


		//
		// Trick to don't add group in ads manager panel but show it in all other override panels.
		//
		{
			$group = true;

			if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] === 'better-studio/better-ads-manager' ) {
				$group = false;
			}
		}


		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => $group,
				'group_title'  => __( 'Ad', 'publisher' ),
				'group_state'  => 'open',
				'id_prefix'    => 'after_x_post',
				'start_fields' => array(
					'after_x_post-help' => array(
						'name'      => __( 'What is this?', 'publisher' ),
						'id'        => 'after_x_post-help',
						'type'      => 'info',
						'std'       => __( 'This option enables you to show ad between each X number of posts in categories, tags and all other archive pages.<br><br> You can use <strong>override</strong> section to enable/disable this ad in specific category or tag.', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'info',
						'ad-id'     => 'after_x_post'
					),
					'after_each'        => array(
						'name'  => __( 'After each X number of post?', 'publisher' ),
						'id'    => 'after_x_post_after_each',
						'type'  => 'text',
						'desc'  => __( 'Please note you have to check your site archive pages to see the result and please note more ads in each page mean slower site.', 'publisher' ),
						'ad-id' => 'after_x_post'
					),
				),
			)
		);


		/**
		 *
		 * Out of box
		 *
		 */
		$fields[]               = array(
			'name'  => __( 'Skyscraper Banner', 'publisher' ),
			'id'    => 'out_of_box_ads',
			'type'  => 'tab',
			'icon'  => 'bsai-skyscraper',
			'badge' => array(
				'text'  => __( 'New', 'publisher' ),
				'color' => '#d44f23'
			),
		);
		$fields['sks-help']     = array(
			'name'          => __( 'What is Skyscraper?', 'publisher' ),
			'id'            => 'sks-help',
			'type'          => 'info',
			'std'           => '<p style="text-align: center"><img src="' . bf_get_theme_uri( 'images/admin/sks-help.png' ) . '"><br><br></p>' . __( 'A skyscraper ad is a tall and narrow banner advertisement placed to the right or left of content on a Web page. Standard dimensions for a skyscraper ad are 160 X 600 pixels. The skyscraper offers an advertiser a large space for a message.', 'publisher' ),
			'state'         => 'open',
			'info-type'     => 'help',
			'section_class' => 'widefat',
		);
		$fields['sks-sticky']   = array(
			'name'                => __( 'Sticky Skyscraper?', 'publisher' ),
			'desc'                => __( 'Skyscraper banners will be fixed in user scroll to make sure they will be shown all time!', 'publisher' ),
			'id'                  => 'sks-sticky',
			'type'                => 'switch',
			'exclude-in-override' => true,
		);
		$fields['sks-position'] = array(
			'name'                => __( 'Banners Position', 'publisher' ),
			'desc'                => __( 'Select the start position of banner.', 'publisher' ),
			'id'                  => 'sks-position',
			'type'                => 'select',
			'options'             => array(
				'top-page'     => __( 'Top of Page', 'publisher' ),
				'after-header' => __( 'After Header', 'publisher' ),
			),
			'exclude-in-override' => true,
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'Left Banner (Left Skyscraper)', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'skyscraper_left',
				'start_fields' => array(
					'left-sks-help' => array(
						'name'      => __( 'Important Google AdSense Note', 'publisher' ),
						'id'        => 'left-sks-help',
						'type'      => 'info',
						'std'       => __( 'Default Google AdSense dimensions for a skyscraper ad are <b>160 X 600</b> pixels but you can override it in selected banner.', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'warning',
						'ad-id'     => 'skyscraper_left',
					)
				)
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => true,
				'group_title'  => __( 'Right Banner (Right Skyscraper)', 'publisher' ),
				'group_state'  => 'close',
				'id_prefix'    => 'skyscraper_right',
				'start_fields' => array(
					'right-sks-help' => array(
						'name'      => __( 'Important Google AdSense Note', 'publisher' ),
						'id'        => 'right-sks-help',
						'type'      => 'info',
						'std'       => __( 'Default Google AdSense dimensions for a skyscraper ad are <b>160 X 600</b> pixels but you can override it in selected banner.', 'publisher' ),
						'state'     => 'open',
						'info-type' => 'warning',
						'ad-id'     => 'skyscraper_right',
					)
				)
			)
		);


		return $fields;
	}
}

add_filter( 'better-framework/panel/better_ads_manager/std', 'publisher_better_ads_std', 33 );


/**
 * Ads STD
 *
 * @param $fields
 *
 * @return array
 */
function publisher_better_ads_std( $fields ) {

	//  header_aside_logo
	$fields['header_aside_logo_type']        = array(
		'std' => '',
	);
	$fields['header_aside_logo_banner']      = array(
		'std' => 'none',
	);
	$fields['header_aside_logo_campaign']    = array(
		'std' => 'none',
	);
	$fields['header_aside_logo_count']       = array(
		'std' => 1,
	);
	$fields['header_aside_logo_columns']     = array(
		'std' => 1,
	);
	$fields['header_aside_logo_orderby']     = array(
		'std' => 'rand',
	);
	$fields['header_aside_logo_order']       = array(
		'std' => 'ASC',
	);
	$fields['header_aside_logo_align']       = array(
		'std' => 'right',
	);
	$fields['header_aside_logo_lazy_load']   = array(
		'std' => '',
	);
	$fields['header_aside_logo_show_mobile'] = array(
		'std' => 'hide',
	);

	//  header_aside_logo_left
	$fields['header_aside_logo_left_type']      = array(
		'std' => '',
	);
	$fields['header_aside_logo_left_banner']    = array(
		'std' => 'none',
	);
	$fields['header_aside_logo_left_campaign']  = array(
		'std' => 'none',
	);
	$fields['header_aside_logo_left_count']     = array(
		'std' => 1,
	);
	$fields['header_aside_logo_left_columns']   = array(
		'std' => 1,
	);
	$fields['header_aside_logo_left_orderby']   = array(
		'std' => 'rand',
	);
	$fields['header_aside_logo_left_order']     = array(
		'std' => 'ASC',
	);
	$fields['header_aside_logo_left_align']     = array(
		'std' => 'left',
	);
	$fields['header_aside_logo_left_lazy_load'] = array(
		'std' => '',
	);

	//  header_aside_logo_right
	$fields['header_aside_logo_right_type']      = array(
		'std' => '',
	);
	$fields['header_aside_logo_right_banner']    = array(
		'std' => 'none',
	);
	$fields['header_aside_logo_right_campaign']  = array(
		'std' => 'none',
	);
	$fields['header_aside_logo_right_count']     = array(
		'std' => 1,
	);
	$fields['header_aside_logo_right_columns']   = array(
		'std' => 1,
	);
	$fields['header_aside_logo_right_orderby']   = array(
		'std' => 'rand',
	);
	$fields['header_aside_logo_right_order']     = array(
		'std' => 'ASC',
	);
	$fields['header_aside_logo_right_align']     = array(
		'std' => 'right',
	);
	$fields['header_aside_logo_right_lazy_load'] = array(
		'std' => '',
	);


	//  header_before
	$fields['header_before_bg']        = array(
		'std' => '#f8f8f8',
	);
	$fields['header_before_margin']    = array(
		'std' => '30px',
	);
	$fields['header_before_type']      = array(
		'std' => '',
	);
	$fields['header_before_banner']    = array(
		'std' => 'none',
	);
	$fields['header_before_campaign']  = array(
		'std' => 'none',
	);
	$fields['header_before_count']     = array(
		'std' => 1,
	);
	$fields['header_before_columns']   = array(
		'std' => 1,
	);
	$fields['header_before_orderby']   = array(
		'std' => 'rand',
	);
	$fields['header_before_order']     = array(
		'std' => 'ASC',
	);
	$fields['header_before_align']     = array(
		'std' => 'center',
	);
	$fields['header_before_lazy_load'] = array(
		'std' => '',
	);


	//  header_after
	$fields['header_after_type']      = array(
		'std' => '',
	);
	$fields['header_after_banner']    = array(
		'std' => 'none',
	);
	$fields['header_after_campaign']  = array(
		'std' => 'none',
	);
	$fields['header_after_count']     = array(
		'std' => 1,
	);
	$fields['header_after_columns']   = array(
		'std' => 1,
	);
	$fields['header_after_orderby']   = array(
		'std' => 'rand',
	);
	$fields['header_after_order']     = array(
		'std' => 'ASC',
	);
	$fields['header_after_align']     = array(
		'std' => 'center',
	);
	$fields['header_after_lazy_load'] = array(
		'std' => '',
	);


	//  post_box_above
	$fields['post_box_above_type']      = array(
		'std' => '',
	);
	$fields['post_box_above_banner']    = array(
		'std' => 'none',
	);
	$fields['post_box_above_campaign']  = array(
		'std' => 'none',
	);
	$fields['post_box_above_count']     = array(
		'std' => 1,
	);
	$fields['post_box_above_columns']   = array(
		'std' => 1,
	);
	$fields['post_box_above_orderby']   = array(
		'std' => 'rand',
	);
	$fields['post_box_above_order']     = array(
		'std' => 'ASC',
	);
	$fields['post_box_above_align']     = array(
		'std' => 'center',
	);
	$fields['post_box_above_lazy_load'] = array(
		'std' => '',
	);


	//  post_before_author_box
	$fields['post_before_author_box_type']      = array(
		'std' => '',
	);
	$fields['post_before_author_box_banner']    = array(
		'std' => 'none',
	);
	$fields['post_before_author_box_campaign']  = array(
		'std' => 'none',
	);
	$fields['post_before_author_box_count']     = array(
		'std' => 1,
	);
	$fields['post_before_author_box_columns']   = array(
		'std' => 1,
	);
	$fields['post_before_author_box_orderby']   = array(
		'std' => 'rand',
	);
	$fields['post_before_author_box_order']     = array(
		'std' => 'ASC',
	);
	$fields['post_before_author_box_align']     = array(
		'std' => 'center',
	);
	$fields['post_before_author_box_lazy_load'] = array(
		'std' => '',
	);


	//  post_between_featured_title
	$fields['post_between_featured_title_type']      = array(
		'std' => '',
	);
	$fields['post_between_featured_title_banner']    = array(
		'std' => 'none',
	);
	$fields['post_between_featured_title_campaign']  = array(
		'std' => 'none',
	);
	$fields['post_between_featured_title_count']     = array(
		'std' => 1,
	);
	$fields['post_between_featured_title_columns']   = array(
		'std' => 1,
	);
	$fields['post_between_featured_title_orderby']   = array(
		'std' => 'rand',
	);
	$fields['post_between_featured_title_order']     = array(
		'std' => 'ASC',
	);
	$fields['post_between_featured_title_align']     = array(
		'std' => 'center',
	);
	$fields['post_between_featured_title_lazy_load'] = array(
		'std' => '',
	);


	//  post_ajax_related
	$fields['post_ajax_related_type']      = array(
		'std' => '',
	);
	$fields['post_ajax_related_banner']    = array(
		'std' => 'none',
	);
	$fields['post_ajax_related_campaign']  = array(
		'std' => 'none',
	);
	$fields['post_ajax_related_count']     = array(
		'std' => 1,
	);
	$fields['post_ajax_related_columns']   = array(
		'std' => 1,
	);
	$fields['post_ajax_related_orderby']   = array(
		'std' => 'rand',
	);
	$fields['post_ajax_related_order']     = array(
		'std' => 'ASC',
	);
	$fields['post_ajax_related_align']     = array(
		'std' => 'center',
	);
	$fields['post_ajax_related_lazy_load'] = array(
		'std' => '',
	);


	//  post_after_related
	$fields['post_after_related_type']      = array(
		'std' => '',
	);
	$fields['post_after_related_banner']    = array(
		'std' => 'none',
	);
	$fields['post_after_related_campaign']  = array(
		'std' => 'none',
	);
	$fields['post_after_related_count']     = array(
		'std' => 1,
	);
	$fields['post_after_related_columns']   = array(
		'std' => 1,
	);
	$fields['post_after_related_orderby']   = array(
		'std' => 'rand',
	);
	$fields['post_after_related_order']     = array(
		'std' => 'ASC',
	);
	$fields['post_after_related_align']     = array(
		'std' => 'center',
	);
	$fields['post_after_related_lazy_load'] = array(
		'std' => '',
	);


	//  footer_before
	$fields['footer_before_type']      = array(
		'std' => '',
	);
	$fields['footer_before_banner']    = array(
		'std' => 'none',
	);
	$fields['footer_before_campaign']  = array(
		'std' => 'none',
	);
	$fields['footer_before_count']     = array(
		'std' => 1,
	);
	$fields['footer_before_columns']   = array(
		'std' => 1,
	);
	$fields['footer_before_orderby']   = array(
		'std' => 'rand',
	);
	$fields['footer_before_order']     = array(
		'std' => 'ASC',
	);
	$fields['footer_before_align']     = array(
		'std' => 'center',
	);
	$fields['footer_before_lazy_load'] = array(
		'std' => '',
	);


	//  footer_after
	$fields['footer_after_bg']        = array(
		'std' => '#f8f8f8',
	);
	$fields['footer_after_margin']    = array(
		'std' => '30px',
	);
	$fields['footer_after_type']      = array(
		'std' => '',
	);
	$fields['footer_after_banner']    = array(
		'std' => 'none',
	);
	$fields['footer_after_campaign']  = array(
		'std' => 'none',
	);
	$fields['footer_after_count']     = array(
		'std' => 1,
	);
	$fields['footer_after_columns']   = array(
		'std' => 1,
	);
	$fields['footer_after_orderby']   = array(
		'std' => 'rand',
	);
	$fields['footer_after_order']     = array(
		'std' => 'ASC',
	);
	$fields['footer_after_align']     = array(
		'std' => 'center',
	);
	$fields['footer_after_lazy_load'] = array(
		'std' => '',
	);


	//  after_x_post
	$fields['after_x_post_after_each'] = array(
		'std' => 6,
	);
	$fields['after_x_post_type']       = array(
		'std' => '',
	);
	$fields['after_x_post_banner']     = array(
		'std' => 'none',
	);
	$fields['after_x_post_campaign']   = array(
		'std' => 'none',
	);
	$fields['after_x_post_count']      = array(
		'std' => 1,
	);
	$fields['after_x_post_columns']    = array(
		'std' => 1,
	);
	$fields['after_x_post_orderby']    = array(
		'std' => 'rand',
	);
	$fields['after_x_post_order']      = array(
		'std' => 'ASC',
	);
	$fields['after_x_post_align']      = array(
		'std' => 'center',
	);
	$fields['after_x_post_lazy_load']  = array(
		'std' => '',
	);


	//
	// Skyscraper
	//
	$fields['sks-sticky']   = array(
		'std' => 1,
	);
	$fields['sks-position'] = array(
		'std' => 'after-header',
	);

	//  skyscraper_left
	$fields['skyscraper_left_type']      = array(
		'std' => '',
	);
	$fields['skyscraper_left_banner']    = array(
		'std' => 'none',
	);
	$fields['skyscraper_left_campaign']  = array(
		'std' => 'none',
	);
	$fields['skyscraper_left_count']     = array(
		'std' => 1,
	);
	$fields['skyscraper_left_columns']   = array(
		'std' => 1,
	);
	$fields['skyscraper_left_orderby']   = array(
		'std' => 'rand',
	);
	$fields['skyscraper_left_order']     = array(
		'std' => 'ASC',
	);
	$fields['skyscraper_left_align']     = array(
		'std' => 'center',
	);
	$fields['skyscraper_left_lazy_load'] = array(
		'std' => '',
	);

	//  skyscraper_right
	$fields['skyscraper_right_type']      = array(
		'std' => '',
	);
	$fields['skyscraper_right_banner']    = array(
		'std' => 'none',
	);
	$fields['skyscraper_right_campaign']  = array(
		'std' => 'none',
	);
	$fields['skyscraper_right_count']     = array(
		'std' => 1,
	);
	$fields['skyscraper_right_columns']   = array(
		'std' => 1,
	);
	$fields['skyscraper_right_orderby']   = array(
		'std' => 'rand',
	);
	$fields['skyscraper_right_order']     = array(
		'std' => 'ASC',
	);
	$fields['skyscraper_right_align']     = array(
		'std' => 'center',
	);
	$fields['skyscraper_right_lazy_load'] = array(
		'std' => '',
	);

	return $fields;
}


add_filter( 'better-framework/panel/better_ads_manager/css', 'publisher_better_ads_css', 33 );


/**
 * Ads CSS settings
 *
 * @param $fields
 *
 * @return array
 */
function publisher_better_ads_css( $fields ) {

	$fields['header_before_bg'] = array(
		'css'              =>
			array(
				0 =>
					array(
						'selector' =>
							array(
								0 => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-before-header',
								1 => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-before-header:before',
							),
						'prop'     =>
							array(
								'background-color' => '%%value%%',
							),
					),
			),
		'css-echo-default' => true,
	);

	$fields['header_before_margin'] = array(
		'css'              =>
			array(
				0 =>
					array(
						'selector' =>
							array(
								0 => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-before-header',
							),
						'prop'     =>
							array(
								'padding-top'    => '%%value%% !important',
								'padding-bottom' => '%%value%% !important',
							),
					),
			),
		'css-echo-default' => true,
	);

	$fields['footer_after_bg'] = array(
		'css'              =>
			array(
				0 =>
					array(
						'selector' =>
							array(
								0 => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-after-footer',
								1 => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-after-footer:after',
							),
						'prop'     =>
							array(
								'background-color' => '%%value%%',
							),
					),
			),
		'css-echo-default' => true,
	);

	$fields['footer_after_margin'] = array(
		'css'              =>
			array(
				0 =>
					array(
						'selector' =>
							array(
								0 => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-after-footer',
							),
						'prop'     =>
							array(
								'padding-top'    => '%%value%% !important',
								'padding-bottom' => '%%value%% !important',
							),
					),
			),
		'css-echo-default' => true,
	);

	return $fields;
}


if ( ! function_exists( 'publisher_ad_skyscraper_info' ) ) {
	/**
	 * Returns status of skyscrapper ads
	 *
	 * @return array
	 */
	function publisher_ad_skyscraper_info() {

		if ( ! publisher_is_ad_plugin_active() ) {
			return array(
				'sticky'   => '',
				'position' => '',
			);
		}

		static $info;

		if ( $info ) {
			return $info;
		}

		$info = array(
			'left'  => publisher_get_ad_location_data( 'skyscraper_left' ),
			'right' => publisher_get_ad_location_data( 'skyscraper_right' ),
		);

		// Position should be after header when user selects full width header!
		{
			$_check = array(
				'stretched'      => '',
				'out-stretched'  => '',
				'full-width'     => '',
				'out-full-width' => '',
			);

			if ( isset( $_check[ publisher_get_header_layout() ] ) ) {
				$info['position'] = 'after-header';
			}
		}

		// Future compatibility!
		if ( function_exists( 'better_ads_get_ad_data_override' ) ) {

			$info['sticky'] = better_ads_get_ad_data_override( 'sks-sticky', false, 'option' );

			if ( ! isset( $info['position'] ) ) {
				$info['position'] = better_ads_get_ad_data_override( 'sks-position', false, 'option' );
			}
		} else {

			$info['sticky'] = Better_Ads_Manager::get_option( 'sks-sticky' );

			if ( ! isset( $info['position'] ) ) {
				$info['position'] = Better_Ads_Manager::get_option( 'sks-position' );
			}
		}

		return $info;
	}
}


add_action( 'wp_head', 'publisher_init_skyscraper_ads' );

if ( ! function_exists( 'publisher_init_skyscraper_ads' ) ) {
	/**
	 * Determines the location of skyscraper banner location.
	 */
	function publisher_init_skyscraper_ads() {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		$skyscraper_info = publisher_ad_skyscraper_info();

		// No active ad
		if ( ! $skyscraper_info['left']['active_location'] && ! $skyscraper_info['right']['active_location'] ) {
			return;
		}

		$action   = '';
		$priority = 10;

		$_check = array(
			'out-stretched'  => '',
			'out-full-width' => '',
		);

		if ( publisher_get_page_boxed_layout() != 'boxed' ) {
			if ( $skyscraper_info['position'] === 'top-page' ) {

				//
				// Move skyscraper ads after taxonomy slider if needed
				//
				if ( publisher_is_valid_tax() ) {

					$slider_config = publisher_main_slider_config();

					// if slider is showing and have bg color!
					if ( $slider_config['show'] && ! $slider_config['in-column'] && $slider_config['bg_color'] != '' ) {
						$action = 'publisher/content-wrap/start';
					}
				}

				if ( empty( $action ) ) {
					$action = 'publisher/main-wrap/start';
				}
			} else {

				if ( publisher_get_header_layout() == 'boxed' ) {
					$action = 'publisher/main-wrap/start';
				} else {
					$action = 'publisher/content-wrap/start';
				}
			}
		} else {

			if ( isset( $_check[ publisher_get_header_layout() ] ) ) {
				$action = 'publisher/content-wrap/start';
			} else {
				$action = 'publisher/main-wrap/start';
			}
		}

		add_action( $action, 'publisher_add_sks_banners', $priority );
	}
}


if ( ! function_exists( 'publisher_add_sks_banners' ) ) {
	/**
	 * Adds left and right Skyscraper ads
	 */
	function publisher_add_sks_banners() {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		$skyscrapper = publisher_ad_skyscraper_info();

		?>
		<div class="bs-sks <?php echo "bs-sks-p{$skyscrapper['position']} bs-sks-s{$skyscrapper['sticky']}" ?> content-wrap">
			<div class="bs-sksin1">
				<div class="bs-sksin2">
					<div class="bs-sksin3">
						<?php

						if ( $skyscrapper['left']['active_location'] ) {

							$skyscrapper['left']['banner-custom-config'] = array(
								'adsense_default_size' => array(
									160,
									600
								),
							);

							?>
							<div class="bs-sksitem bs-sksiteml">
								<?php

								// Left Skyscraper
								publisher_show_ad_location( 'skyscraper_left',
									array(
										'container-class' => 'better-ads-leftskyscraper',
										'ad-data'         => $skyscrapper['left'],
									) );

								?>
							</div>
							<?php
						}

						if ( $skyscrapper['right']['active_location'] ) {

							$skyscrapper['right']['banner-custom-config'] = array(
								'adsense_default_size' => array(
									160,
									600
								),
							);

							?>
							<div class="bs-sksitem bs-sksitemr">
								<?php

								// Left Skyscraper
								publisher_show_ad_location( 'skyscraper_right',
									array(
										'container-class' => 'better-ads-leftskyscraper',
										'ad-data'         => $skyscrapper['right'],
									) );

								?>
							</div>
							<?php

						}

						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	} // publisher_add_sks_banners
}


add_action( 'publisher/main-wrap/before', 'publisher_add_before_header_ad', 1 );

if ( ! function_exists( 'publisher_add_before_header_ad' ) ) {
	/**
	 * Adds before header ad
	 */
	function publisher_add_before_header_ad() {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		publisher_show_ad_location( 'header_before', array(
				'container-class' => 'better-ads-before-header',
			)
		);

	}
}


add_action( 'publisher/main-wrap/after', 'publisher_add_after_footer_ad', 1 );

if ( ! function_exists( 'publisher_add_after_footer_ad' ) ) {
	/**
	 * Adds after header ad
	 */
	function publisher_add_after_footer_ad() {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		publisher_show_ad_location( 'footer_after', array(
				'container-class' => 'better-ads-after-footer',
			)
		);

	}
}


if ( ! function_exists( 'publisher_process_page_listing_block_ad' ) ) {
	/**
	 * Prepares the block level ads to show them inside listings.
	 */
	function publisher_process_page_listing_block_ad() {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		$block_ad = publisher_get_ad_location_data( 'after_x_post', array( 'after_each' => 6 ) );;

		if ( $block_ad['active_location'] ) {
			publisher_set_prop( 'block-ad', $block_ad );
		}

	}
}


if ( ! function_exists( 'publisher_process_listing_block_ad' ) ) {
	/**
	 * Prepares the block level ads to show them inside listings.
	 */
	function publisher_process_listing_block_ad( $atts ) {

		if ( ! publisher_is_ad_plugin_active() ) {
			return;
		}

		if ( ! isset( $atts['ad-active'] ) || ! $atts['ad-active'] ) {
			return;
		}


		//
		// Base ad required fields
		//
		$fields = array(
			'after_each'      => 5,
			'type'            => '',
			'banner'          => '',
			'campaign'        => '',
			'count'           => '',
			'columns'         => '',
			'orderby'         => '',
			'order'           => '',
			'align'           => '',
			'active_location' => false,
		);


		// check and get value of ad from block attributes
		foreach ( $fields as $field_id => $field ) {

			$_id = 'ad-' . $field_id;

			if ( isset( $atts[ $_id ] ) ) {
				$fields[ $field_id ] = $atts[ $_id ];
			}
		}


		// active banner
		if ( $fields['type'] === 'banner' && $fields['banner'] != '' ) {
			$fields['active_location'] = true;
		} // active campaign
		elseif ( $fields['type'] === 'campaign' && $fields['campaign'] != '' ) {
			$fields['active_location'] = true;
		}


		if ( $fields['active_location'] ) {
			publisher_set_prop( 'block-ad', $fields );
		}
	} // publisher_process_listing_block_ad
}


if ( ! function_exists( 'publisher_show_after_posts_ad' ) ) {
	/**
	 * Prints ad between listings.
	 *
	 * @param array $args settings. 'ad' item is required
	 */
	function publisher_show_after_posts_ad( $args = array() ) {

		if ( ! publisher_is_ad_plugin_active() || ! isset( $args['ad'] ) ) {
			return;
		}

		if ( ! isset( $args['class'] ) ) {
			$args['class'] = '';
		}

		?>
		<div class="listing-item better-ads-listitemad <?php echo $args['class']; ?>">
			<?php

			better_ads_show_ad_location( 'block-ad', $args['ad'], array(
				'container-class' => isset( $args['container-class'] ) ? $args['container-class'] : '',
			) );

			?>
		</div>
		<?php
	}
}

