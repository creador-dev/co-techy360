<?php
/***
 *  Better Ads ad locations.
 *  This feature is depended to our Ads Manager plugin (Better Ads v1.8)
 *  For more information about BetterAds you can contact us info@betterstudio.com
 */


add_filter( 'better-framework/panel/better_ads_manager/fields', 'bssl_better_ad_options', 81 );

if ( ! function_exists( 'bssl_better_ad_options' ) ) {
	/**
	 * ads
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bssl_better_ad_options( $fields ) {

		$fields['bssl_ads'] = array(
			'name'       => __( 'Smart List Ads', 'better-studio' ),
			'id'         => 'bssl_ads',
			'type'       => 'tab',
			'icon'       => 'bsai-list-bullet',
			'margin-top' => 10,
		);

		$fields[] = array(
			'name'   => __( 'Before & After', 'better-studio' ),
			'desc'   => __( 'Following ads will be shown before and after of all smart listing styles.', 'better-studio' ),
			'type'   => 'heading',
			'layout' => 'style-2',
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'Before Smart List', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_before',
				'format'      => 'normal',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'After Smart List', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_after',
				'format'      => 'normal',
			)
		);

		$fields[] = array(
			'name'   => __( 'Style Base Ad Location', 'better-studio' ),
			'type'   => 'heading',
			'layout' => 'style-2',
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 6 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_6',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_6_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_6_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_6',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 7 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_7',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_7_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_7_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_7',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 8 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_8',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_8_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_8_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_8',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 9 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_9',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_9_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_9_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_9',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 10 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_10',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_10_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_10_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_10',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 11 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_11',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_11_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_11_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_11',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'        => TRUE,
				'group_title'  => __( 'Style 12 - After Each', 'better-studio' ),
				'group_state'  => 'close',
				'id_prefix'    => 'bssl_style_12',
				'format'       => 'normal',
				'start_fields' => array(
					'bssl_style_12_each' => array(
						'name'  => __( 'Each X Item', 'better-studio' ),
						'id'    => 'bssl_style_12_each',
						'type'  => 'text',
						'desc'  => __( 'Show this banner after each X list item.', 'better-studio' ),
						'ad-id' => 'bssl_style_12',
					),
				),
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'Style 13', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_style_13',
				'format'      => 'normal',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'Style 14', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_style_14',
				'format'      => 'normal',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'Style 15', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_style_15',
				'format'      => 'normal',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'Style 16', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_style_16',
				'format'      => 'normal',
			)
		);

		better_ads_inject_ad_field_to_fields(
			$fields,
			array(
				'group'       => TRUE,
				'group_title' => __( 'Style 17', 'better-studio' ),
				'group_state' => 'close',
				'id_prefix'   => 'bssl_style_17',
				'format'      => 'normal',
			)
		);

		return $fields;
	} // bssl_better_ad_options
}


add_filter( 'better-framework/panel/better_ads_manager/std', 'bssl_better_ad_std', 33 );

if ( ! function_exists( 'bssl_better_ad_std' ) ) {
	/**
	 * Ads STD
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bssl_better_ad_std( $fields ) {

		$ad_locations = array(
			'bssl_before',
			'bssl_after',
			'bssl_style_6',
			'bssl_style_7',
			'bssl_style_8',
			'bssl_style_9',
			'bssl_style_10',
			'bssl_style_11',
			'bssl_style_12',
			'bssl_style_13',
			'bssl_style_14',
			'bssl_style_15',
			'bssl_style_16',
			'bssl_style_17',
		);

		foreach ( $ad_locations as $location_id ) {
			$fields[ $location_id . '_type' ]     = array(
				'std' => '',
			);
			$fields[ $location_id . '_banner' ]   = array(
				'std' => 'none',
			);
			$fields[ $location_id . '_campaign' ] = array(
				'std' => 'none',
			);
			$fields[ $location_id . '_count' ]    = array(
				'std' => 1,
			);
			$fields[ $location_id . '_columns' ]  = array(
				'std' => 1,
			);
			$fields[ $location_id . '_orderby' ]  = array(
				'std' => 'rand',
			);
			$fields[ $location_id . '_order' ]    = array(
				'std' => 'ASC',
			);
			$fields[ $location_id . '_align' ]    = array(
				'std' => 'center',
			);
		}

		$fields['bssl_style_6_each'] = array(
			'std' => 5,
		);

		$fields['bssl_style_7_each'] = array(
			'std' => 5,
		);

		$fields['bssl_style_8_each'] = array(
			'std' => 5,
		);

		$fields['bssl_style_9_each'] = array(
			'std' => 5,
		);

		$fields['bssl_style_10_each'] = array(
			'std' => 5,
		);

		$fields['bssl_style_11_each'] = array(
			'std' => 5,
		);

		$fields['bssl_style_12_each'] = array(
			'std' => 5,
		);

		return $fields;
	} // bssl_better_ad_std
}
