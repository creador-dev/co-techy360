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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * Used For retrieving Google fonts list.
 * Also contain some helper functions for general usage
 */
class BF_FM_Google_Fonts_Helper {


	/**
	 * Contain array of all Google Fonts List
	 *
	 * @var array
	 */
	private static $fonts_list = NULL;


	/**
	 * Used for Retrieving list of all Google Fonts
	 */
	public static function get_all_fonts() {

		if ( self::$fonts_list != NULL ) {
			return self::$fonts_list;
		}

		return self::$fonts_list = include BF_PATH . 'core/fonts-manager/fonts-google.php';
	}


	/**
	 * Used for retrieving single font info
	 *
	 * @param   $font_name      string      Font name
	 *
	 * @return  bool
	 */
	public static function get_font( $font_name ) {

		$fonts = self::get_all_fonts();

		if ( isset( $fonts[ $font_name ] ) ) {
			return $fonts[ $font_name ];
		}

		return FALSE;
	}


	/**
	 * Generate and return Option elements of all font for select element
	 *
	 * @param   string $active_font  Family name of selected font in options
	 * @param   bool   $option_group Add options into option group?
	 *
	 * @return string
	 */
	public static function get_fonts_family_option_elements( $active_font = '', $option_group = TRUE ) {

		$output = '';

		if ( $option_group ) {
			$output .= '<optgroup label="' . __( 'Google Fonts', 'better-studio' ) . '">';
		}

		foreach ( self::get_all_fonts() as $key => $font ) {
			$output .= '<option value="' . esc_attr( $key ) . '"' . ( $key == $active_font ? 'selected' : '' ) . '>' . esc_html( $key ) . '</option>';
		}

		if ( $option_group ) {
			$output .= '</optgroup>';
		}

		return $output;
	}


	/**
	 * Generate and return Option elements of font variants
	 *
	 * @param   $font               string|array        Font array or ID
	 * @param   $font_variant       string              Active or selected variant
	 *
	 * @return  string
	 */
	public static function get_font_variants_option_elements( $font, $font_variant ) {

		$output = '';

		if ( ! is_array( $font ) ) {
			$font_info = self::get_font( $font );
		} else {
			$font_info = $font;
		}

		if ( $font_variant == '400' || $font_variant == '400italic' ) {
			foreach ( $font_info['variants'] as $variant ) {
				if ( $font_variant == '400' && $variant['id'] == 'regular' ) {
					$font_variant = 'regular';
					break;
				} elseif ( $font_variant == '400italic' && $variant['id'] == 'italic' ) {
					$font_variant = 'italic';
					break;
				}
			}
		}

		foreach ( $font_info['variants'] as $variant ) {
			$output .= '<option value="' . esc_html( $variant['id'] ) . '"' . ( $variant['id'] == $font_variant ? ' selected="selected" ' : '' ) . '>' . esc_html( $variant['name'] ) . '</option>';
		}

		return $output;

	}


	/**
	 * Generate and return Option elements of font subsets
	 *
	 * @param   $font               string|array        Font array or ID
	 * @param   $active_subset      string              Active or selected subset
	 *
	 * @return  string
	 */
	public static function get_font_subset_option_elements( $font, $active_subset ) {

		$output = '';

		if ( ! is_array( $font ) ) {
			$font_info = self::get_font( $font );
		} else {
			$font_info = $font;
		}

		foreach ( $font_info['subsets'] as $variant ) {
			$output .= '<option value="' . esc_attr( $variant['id'] ) . '"' . ( $variant['id'] == $active_subset ? ' selected="selected" ' : '' ) . '>' . esc_html( $variant['name'] ) . '</option>';
		}

		return $output;
	}

}