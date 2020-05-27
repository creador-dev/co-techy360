<?php

if ( ! function_exists( 'publisher_is_one_signal_plugin_active' ) ) {
	/**
	 * Detect is "onesignal-free-web-push-notifications" plugin active
	 *
	 * @since 5.0.0
	 * @return bool
	 */
	function publisher_is_one_signal_plugin_active() {

		return defined( 'ONESIGNAL_PLUGIN_URL' ) && class_exists( 'OneSignal_Public' );
	}
}


if ( ! function_exists( 'publisher_notification_message_locations' ) ) {
	/**
	 * Get all active location for push-notification/subscribe message
	 *
	 * @since 5.0.0
	 * @return array
	 */
	function publisher_notification_message_locations() {

		$locations = array();

		if ( publisher_get_option( 'push_notification_top_posts' ) ) {
			$locations['post-top'] = true;
		}

		if ( publisher_get_option( 'push_notification_bottom_posts' ) ) {
			$locations['post-bottom'] = true;
		}

		return $locations;
	}
}


if ( ! function_exists( 'publisher_is_notification_location_active' ) ) {
	/**
	 * Determine is a location marked to display push-notification message
	 *
	 * @param string $location
	 *
	 * @since 5.0.0
	 * @return boolean
	 */
	function publisher_is_notification_location_active( $location ) {

		if ( ! publisher_is_one_signal_plugin_active() ) {
			return false;
		}

		$locations = publisher_notification_message_locations();

		return isset( $locations[ $location ] );
	}
}


add_filter( 'publisher-theme/localized-items', 'publisher_append_notification_location_localize' );

if ( ! function_exists( 'publisher_append_notification_location_localize' ) ) {


	/**
	 * Append push-notification localization variables
	 *
	 * @param array $l10n
	 *
	 * @since 5.0.0
	 * @return boolean
	 */
	function publisher_append_notification_location_localize( $l10n ) {

		$l10n['notification'] = array(
			'subscribe_msg'  => publisher_translation_get( 'notification_subscribe_now' ),
			'subscribed_msg' => publisher_translation_get( 'notification_subscribed' ),
			//
			'subscribe_btn'  => publisher_translation_get( 'push_notification_subscribe' ),
			'subscribed_btn' => publisher_translation_get( 'push_notification_unsubscribe' ),
			//
		);

		return $l10n;
	}
}


if ( ! function_exists( 'publisher_print_push_notification_widget' ) ) {
	/**
	 * Print push notification widget
	 *
	 * @param string $location
	 *
	 * @since 5.0.0
	 */
	function publisher_print_push_notification_widget( $location ) {

		if ( ! publisher_is_notification_location_active( $location ) ) {

			return;
		}

		$option_name = '';

		switch ( $location ) {

			case 'post-bottom':
				$option_name = 'push_notification_bottom_posts_style';

				break;

			case 'post-top':
				$option_name = 'push_notification_top_posts_style';

				break;
		}

		if ( empty( $option_name ) ) {
			return;
		}

		$style = publisher_get_option( $option_name );

		echo do_shortcode( "[bs-push-notification style='{$style}' location='{$location}' title='']" );
	}
}


if ( ! function_exists( 'publisher_cb_notification_styles_list' ) ) {
	/**
	 * Admin push notifications style list
	 *
	 * @return array
	 */
	function publisher_cb_notification_styles_list() {

		return array(
			't1-s1' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/admin/push-notification/panel-t1-s1-large.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/admin/push-notification/panel-t1-s1-small.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 1', 'publisher' ),
			),
			't2-s1' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/admin/push-notification/panel-t2-s1-large.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/admin/push-notification/panel-t2-s1-small.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 2', 'publisher' ),
			),
		);
	}
}


if ( ! function_exists( 'publisher_cb_widget_notification_styles_list' ) ) {
	/**
	 * Admin push notifications style list for widget
	 *
	 * @return array
	 */
	function publisher_cb_widget_notification_styles_list() {

		return array(
			't1-s1' => array(
				'img'   => PUBLISHER_THEME_URI . 'images/admin/push-notification/widget-t1-s1.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Style 1', 'publisher' ),
			),
			't2-s1' => array(
				'img'   => PUBLISHER_THEME_URI . 'images/admin/push-notification/widget-t2-s1.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Style 2', 'publisher' ),
			),
		);
	}
}
