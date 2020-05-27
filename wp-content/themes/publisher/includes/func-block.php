<?php


if ( ! function_exists( 'publisher_general_fix_shortcode_vc_style' ) ) {
	/**
	 * Fixes shortcode style for generated style from VC -> General fixes
	 *
	 * @param $atts
	 */
	function publisher_general_fix_shortcode_vc_style( &$atts ) {


		switch ( $atts['shortcode-id'] ) {

			case 'bs-modern-grid-listing-5':

				if ( empty( $atts['_style_bg_color'] ) ) {
					return;
				}

				$code = '.' . $atts['css-class'] . ' .listing-mg-5-item-big .content-container{ background-color:' . $atts['_style_bg_color'] . ' !important}';

				if ( ! empty( $atts['css-code'] ) ) {
					$atts['css-code'] .= $code;
				} else {
					$atts['css-code'] = $code;
				}

				break;

			// Classic Listing 3 content BG Fix
			case 'bs-classic-listing-3':
			case 'bs-mix-listing-4-7':
			case 'bs-mix-listing-4-2':
			case 'bs-mix-listing-4-1':

				if ( empty( $atts['_style_bg_color'] ) ) {
					return;
				}

				$code = '.' . $atts['css-class'] . ' .listing-item-classic-3 .featured .title{ background-color:' . $atts['_style_bg_color'] . '}';

				if ( ! empty( $_t['code'] ) ) {
					$atts['css-code'] .= $code;
				} else {
					$atts['css-code'] = $code;
				}

				break;
		}


		return; // It's for inner style!
	}
}// publisher_general_fix_shortcode_vc_style


if ( ! function_exists( 'publisher_fix_shortcode_vc_style' ) ) {
	/**
	 * Fixes shortcode style for generated style from VC
	 *
	 * @param $atts
	 */
	function publisher_fix_shortcode_vc_style( &$atts ) {

		publisher_general_fix_shortcode_vc_style( $atts ); // general fixes

		return; // It's for inner style!
	}
}// publisher_fix_shortcode_vc_style
