<?php
/***
 *  Better Ads related factions to show ads in Smart List.
 *  This feature is depended to our Ads Manager plugin (Better Ads v1.8)
 *  For more information about BetterAds you can contact us info@betterstudio.com
 */


if ( ! function_exists( 'bssl_is_ad_plugin_active' ) ) {
	/**
	 * Detect the "Better Ads Manager" v1.8.0 is active or not
	 *
	 * @return bool
	 */
	function bssl_is_ad_plugin_active() {

		static $state;

		if ( ! is_null( $state ) ) {
			return $state;
		}

		$state = class_exists( 'Better_Ads_Manager' ) && ( defined( 'BETTER_ADS_MANAGER_AMP' ) && BETTER_ADS_MANAGER_AMP );

		// Min BetterAds v1.9
		if ( $state && ! function_exists( 'better_ads_inject_ad_repeater_field_to_fields' ) ) {
			$state = FALSE;
		}

		return $state;
	}
}


if ( ! function_exists( 'bssl_get_ad_location_data' ) ) {
	/**
	 * Return data of Ad location by its ID prefix
	 *
	 * @param string $ad_location_prefix
	 *
	 * @param bool   $multiple
	 * @param null   $extra_fields
	 *
	 * @return array
	 */
	function bssl_get_ad_location_data( $ad_location_prefix = '', $multiple = FALSE, $extra_fields = NULL ) {

		if ( ! bssl_is_ad_plugin_active() ) {
			return array(
				'format'          => '',
				'type'            => '',
				'banner'          => '',
				'campaign'        => '',
				'active_location' => '',
			);
		}

		return better_ads_get_ad_location_data( $ad_location_prefix, $multiple, $extra_fields );
	}
}


if ( ! function_exists( 'bssl_show_ad_location' ) ) {
	/**
	 * Return data of Ad location by its ID prefix
	 *
	 * @param string $ad_location_prefix
	 *
	 * @param array  $args
	 *
	 * @return array
	 */
	function bssl_show_ad_location( $ad_location_prefix = '', $args = array() ) {

		if ( ! bssl_is_ad_plugin_active() ) {
			return;
		}

		// Smart list ads disabled for this post
		if ( ! bf_get_post_meta( '_bs_smart_lists_ads', get_the_ID(), 1 ) ) {
			return;
		}

		// not show normal ads in AMP
		if ( bf_is_amp() ) {
			return;
		}

		// get data if not passed
		if ( empty( $args['ad-data'] ) ) {
			$ad_data = better_ads_get_ad_location_data( $ad_location_prefix );
		} else {
			$ad_data = $args['ad-data'];
		}

		// Ad is not active
		if ( ! $ad_data['active_location'] ) {
			return;
		}

		better_ads_show_ad_location( $ad_location_prefix, $ad_data, $args );
	}
}
