<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( ! function_exists( 'bf_get_menu_location_name_from_id' ) ) {
	/**
	 * Used For retrieving current sidebar
	 *
	 * #since 2.0
	 *
	 * @param $location
	 *
	 * @return
	 */
	function bf_get_menu_location_name_from_id( $location ) {

		$locations = get_registered_nav_menus();

		if ( isset( $locations[ $location ] ) ) {
			return $locations[ $location ];
		}

	}
}


if ( ! function_exists( 'bf_get_menus_option' ) ) {
	/**
	 * Handy function to get select option for using this as deferred callback
	 *
	 * @since 2.5.5
	 *
	 * @param bool   $default
	 * @param string $default_label
	 * @param string $menus_label
	 *
	 * @return array
	 */
	function bf_get_menus_option( $default = false, $default_label = '', $menus_label = '', $args = array() ) {

		$menus = array();

		if ( $default ) {
			$menus['default'] = ! empty( $default_label ) ? $default_label : __( 'Default Navigation', 'better-studio' );
		}

		$menus[] = array(
			'label'   => ! empty( $menus_label ) ? $menus_label : __( 'Menus', 'better-studio' ),
			'options' => bf_get_menus(),
		);

		if ( isset( $args['append'] ) ) {
			$menus = array_merge( $menus, $args['append'] );
		}

		return $menus;

	} // bf_get_menus_option
} // if


if ( ! function_exists( 'bf_get_menus_animations_option' ) ) {
	/**
	 * Handy function to get select option of all menu animations for using as deferred callback
	 *
	 * @since 2.5.5
	 *
	 * @param array $args used for future changes
	 *
	 * @return array
	 */
	function bf_get_menus_animations_option( $args = array() ) {

		$animations = array(

			'default' => __( '-- Default --', 'better-studio' ),
			'none'    => __( 'No Animation', 'better-studio' ),
			'random'  => __( 'Random Animation', 'better-studio' ),

			array(
				'label'   => __( 'Fading', 'better-studio' ),
				'options' => array(
					'fade'       => __( 'Simple Fade', 'better-studio' ),
					'slide-fade' => __( 'Fading Slide', 'better-studio' ),
				),
			),

			array(
				'label'   => __( 'Attention Seekers', 'better-studio' ),
				'options' => array(
					'bounce' => __( 'Bounce', 'better-studio' ),
					'tada'   => __( 'Tada', 'better-studio' ),
					'shake'  => __( 'Shake', 'better-studio' ),
					'swing'  => __( 'Swing', 'better-studio' ),
					'wobble' => __( 'Wobble', 'better-studio' ),
					'buzz'   => __( 'Buzz', 'better-studio' ),
				),
			),

			array(
				'label'   => __( 'Sliding', 'better-studio' ),
				'options' => array(
					'slide-top-in'    => __( 'Slide &#x2193; In', 'better-studio' ),
					'slide-bottom-in' => __( 'Slide &#x2191; In', 'better-studio' ),
					'slide-left-in'   => __( 'Slide &#x2192; In', 'better-studio' ),
					'slide-right-in'  => __( 'Slide &#x2190; In', 'better-studio' ),
				),
			),

			array(
				'label'   => __( 'Flippers', 'better-studio' ),
				'options' => array(
					'filip-in-x' => __( 'Filip In X - &#x2195;', 'better-studio' ),
					'filip-in-y' => __( 'Filip In Y - &#x2194;', 'better-studio' ),
				),
			),

		);

		return $animations;

	} // bf_get_menus_animations_option
} // if


