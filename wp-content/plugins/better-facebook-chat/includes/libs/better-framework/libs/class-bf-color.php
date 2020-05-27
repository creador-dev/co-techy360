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


/**
 * Handy Functions for Color
 */
class BF_Color {

	/**
	 * Contains User profile Colors
	 *
	 * @var array
	 */
	private static $user_profile_color = null;


	function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'get_user_colors' ), 1 );
	}


	/**
	 * Used for reliving current user color schema informations
	 */
	function get_user_colors() {

		global $_wp_admin_css_colors;

		$user_color = get_user_option( 'admin_color' );
		if ( empty( $user_color ) ) {
			return '';
		}

		$user_color = $_wp_admin_css_colors[ $user_color ];

		if ( empty( $user_color ) || ! is_object( $user_color ) ) {
			return '';
		}

		self::$user_profile_color['color-1'] = $user_color->colors[0]; // background
		self::$user_profile_color['color-2'] = $user_color->colors[1]; // lighter background
		self::$user_profile_color['color-3'] = $user_color->colors[2]; // active color
		self::$user_profile_color['color-4'] = $user_color->colors[3]; // hover active color

		switch ( get_user_option( 'admin_color' ) ) {
			case 'light':
				self::$user_profile_color['color-3'] = '#888';
				break;
			case 'midnight':
				self::$user_profile_color['color-3'] = '#e14d43';
				break;
		}

	}


	/**
	 * Used for Retrieving User Profile Color
	 *
	 * color-1 => background
	 * color-2 => lighter background
	 * color-3 => active color
	 * color-4 => hover active color
	 *
	 * @param $color_type
	 *
	 * @return array
	 */
	public static function get_user_profile_color( $color_type ) {

		if ( is_null( self::$user_profile_color ) ) {
			// todo why i did this?!!?
			return 'NOOOOO';

		}

		return self::$user_profile_color[ $color_type ];
	}


	/**
	 * Change Color Brighter or Darker
	 *
	 *
	 * Steps should be between -255 and 255. Negative = darker, positive = lighter
	 *
	 * @param $hex
	 * @param $steps
	 *
	 * @return string
	 */
	static function change_color( $hex, $steps ) {

		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max( - 255, min( 255, $steps ) );

		// Format the hex color string
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
		}

		// Get decimal values
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );

		// Adjust number of steps and keep it inside 0 to 255
		$r = max( 0, min( 255, $r + $steps ) );
		$g = max( 0, min( 255, $g + $steps ) );
		$b = max( 0, min( 255, $b + $steps ) );

		$r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
		$g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
		$b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

		return '#' . $r_hex . $g_hex . $b_hex;
	}


	public static function hex_to_rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		if ( empty( $color ) ) {
			return $default;
		}

		if ( $color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		$rgb = array_map( 'hexdec', $hex );

		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}

			$output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode( ",", $rgb ) . ')';
		}

		return $output;
	}

}