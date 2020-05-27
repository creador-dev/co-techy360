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
 * Used For retrieving Font Stacks.
 */
class BF_FM_Theme_Fonts_Helper {


	/**
	 * Contain array of all font stacks
	 *
	 * @var array
	 */
	private static $fonts_list = array();


	public static function load_fonts() {

		static $font_loaded;

		if ( $font_loaded ) {
			return;
		}

		/**
		 * Use this filter to add theme specified inside font manager!
		 *
		 * @since 2.0
		 *
		 * @param string $fonts_list Contains all fonts list
		 */
		self::$fonts_list = apply_filters( 'better-fonts-manager/theme-fonts', self::$fonts_list );
	}


	/**
	 * Used for Retrieving list of all Google Fonts
	 *
	 * @return array
	 */
	public static function get_all_fonts() {

		// Load all fonts one time
		self::load_fonts();

		return self::$fonts_list;
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
	 * @param   bool   $option_group Active or selected font
	 *
	 * @return  string
	 */
	public static function get_fonts_family_option_elements( $active_font = '', $option_group = true ) {

		$output = '';

		if ( $option_group ) {
			$output .= '<optgroup label="' . __( 'Theme Fonts', 'publisher' ) . '">';
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
	public static function get_font_variants_option_elements( $font_variant = '' ) {

		if ( empty( $font_variant ) ) {
			$font_variant = '400';
		}

		$output = '';

		$variants = array(
			'100'       => __( 'Ultra-Light 100', 'publisher' ),
			'300'       => __( 'Book 300', 'publisher' ),
			'400'       => __( 'Normal 400', 'publisher' ),
			'500'       => __( 'Medium 500', 'publisher' ),
			'700'       => __( 'Bold 700', 'publisher' ),
			'900'       => __( 'Ultra-Bold 900', 'publisher' ),
			'100italic' => __( 'Ultra-Light 100 Italic', 'publisher' ),
			'300italic' => __( 'Book 300 Italic', 'publisher' ),
			'400italic' => __( 'Normal 400 Italic', 'publisher' ),
			'500italic' => __( 'Medium 500 Italic', 'publisher' ),
			'700italic' => __( 'Bold 700 Italic', 'publisher' ),
			'900italic' => __( 'Ultra-Bold 900 Italic', 'publisher' ),
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

		return '<option value="unknown">' . esc_html__( 'Unknown', 'publisher' ) . '</option>';
	}

}