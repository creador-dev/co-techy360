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
 * Used For retrieving custom fonts.
 */
class BF_FM_Custom_Fonts_Helper {


	/**
	 * Contain array of all fonts
	 *
	 * @var array
	 */
	private static $fonts_list = null;


	/**
	 * Used for Retrieving list of all fonts
	 */
	public static function get_all_fonts() {

		if ( self::$fonts_list != null ) {
			return self::$fonts_list;
		}

		// load option
		$custom_fonts = bf_get_option( 'custom_fonts', Better_Framework::fonts_manager()->option_panel_id );

		// create array
		$_custom_fonts = array();
		foreach ( (array) $custom_fonts as $font ) {

			if ( empty( $font['svg'] ) && empty( $font['ttf'] ) && empty( $font['eot'] ) && empty( $font['woff'] ) && empty( $font['woff2'] ) && empty( $font['otf'] ) ) {
				continue;
			}

			$_custom_fonts[ $font['id'] ]         = $font;
			$_custom_fonts[ $font['id'] ]['type'] = 'custom-font';
		}

		// save to cache
		return self::$fonts_list = $_custom_fonts;
	}


	/**
	 * Used for retrieving single font info
	 *
	 * @param $font_name
	 *
	 * @return bool
	 */
	public static function get_font( $font_name ) {

		$fonts = self::get_all_fonts();

		if ( isset( $fonts[ $font_name ] ) ) {
			return $fonts[ $font_name ];
		} else {
			return false;
		}
	}


	/**
	 * Generate and return Option elements of all font for select element
	 *
	 * @param   string $active_font  Family name of selected font in options
	 * @param   bool   $option_group Add options to option group?
	 *
	 * @return  string
	 */
	public static function get_fonts_family_option_elements( $active_font = '', $option_group = true ) {

		$output = '';

		if ( $option_group ) {
			$output .= '<optgroup label="' . __( 'Custom Fonts', 'better-studio' ) . '">';
		}

		foreach ( self::get_all_fonts() as $key => $font ) {
			$output .= '<option value="' . esc_attr( $key ) . '" ' . ( $key == $active_font ? 'selected' : '' ) . '>' . esc_html( $key ) . '</option>';
		}

		if ( $option_group ) {
			$output .= '</optgroup>';
		}

		return $output;
	}


	/**
	 * Generate and return Option elements of font variants
	 *
	 * @param   string $font_variant Active or selected variant
	 *
	 * @return string
	 */
	public static function get_font_variants_option_elements( $font_variant = '400' ) {

		// default value
		if ( empty( $font_variant ) ) {
			$font_variant = '400';
		}

		$output = '';

		$variants = array(
			'100'       => __( 'Ultra-Light 100', 'better-studio' ),
			'300'       => __( 'Book 300', 'better-studio' ),
			'400'       => __( 'Normal 400', 'better-studio' ),
			'500'       => __( 'Medium 500', 'better-studio' ),
			'700'       => __( 'Bold 700', 'better-studio' ),
			'900'       => __( 'Ultra-Bold 900', 'better-studio' ),
			'100italic' => __( 'Ultra-Light 100 Italic', 'better-studio' ),
			'300italic' => __( 'Book 300 Italic', 'better-studio' ),
			'400italic' => __( 'Normal 400 Italic', 'better-studio' ),
			'500italic' => __( 'Medium 500 Italic', 'better-studio' ),
			'700italic' => __( 'Bold 700 Italic', 'better-studio' ),
			'900italic' => __( 'Ultra-Bold 900 Italic', 'better-studio' ),
		);

		foreach ( $variants as $variant_id => $variant_name ) {
			$output .= '<option value="' . esc_attr( $variant_id ) . '" ' . ( $variant_id == $font_variant ? 'selected' : '' ) . '>' . esc_html( $variant_name ) . '</option>';
		}

		return $output;
	}


	/**
	 * Generate and return Option elements of font subsets
	 *
	 * @return string
	 */
	public static function get_font_subset_option_elements() {

		return '<option value="unknown" selected>' . esc_html__( 'Unknown', 'better-studio' ) . '</option>';
	}

}