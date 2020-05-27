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
 * Handle Base Custom CSS Functionality in BetterFramework
 */
class BF_Custom_CSS {

	/**
	 * Contain all css's that must be generated
	 *
	 * @var array
	 */
	protected $fields = array();


	/**
	 * Contain final css that rendered.
	 *
	 * @var string
	 */
	protected $final_css = '';


	/**
	 * Contain Fonts That Must Be Import In Top Of CSS
	 *
	 * @var array
	 */
	protected $fonts = array();


	/**
	 * Used For Adding New Font To Fonts Queue
	 *
	 * @param string $family
	 * @param string $variants
	 * @param string $subsets
	 */
	public function set_fonts( $family = '', $variants = '', $subsets = '' ) {


		// If Font Currently is in Queue Then Add New Variant Or Subset
		if ( isset( $this->fonts[ $family ] ) ) {

			if ( ! in_array( $variants, $this->fonts[ $family ]['variants'] ) ) {
				$this->fonts[ $family ]['variants'][] = $variants;
			}

			if ( ! in_array( $subsets, $this->fonts[ $family ]['subsets'] ) ) {
				$this->fonts[ $family ]['subsets'][] = $subsets;
			}

		} // Add New Font to Queue
		else {

			$this->fonts[ $family ] = array(
				'variants' => array( $variants ),
				'subsets'  => array( $subsets ),
			);

		}

	}


	/**
	 * Used For Generating Fonts
	 *
	 * @param string $type
	 *
	 * @param string $protocol custom protocol
	 *
	 * @return array|string
	 */
	public function render_fonts( $type = 'google-fonts', $protocol = 'default' ) {

		if ( ! count( $this->fonts ) ) {
			return '';
		}

		$output = ''; // Final Out Put CSS

		$out_fonts = array(); // Array of Fonts, Each inner element separately

		// Collect all fonts in one url for better performance
		if ( $type == 'google-fonts' ) {
			$out_fonts['main'] = array();
		}

		// Create Each Font CSS
		foreach ( $this->fonts as $font_id => $font_information ) {

			//
			// Google Font
			//
			if ( $type == 'google-fonts' ) {

				$_font_have_subset = FALSE;

				$font_data = Better_Framework::fonts_manager()->google_fonts()->get_font( $font_id );

				if ( $font_data == FALSE ) {
					continue;
				} // font id is not valid google font

				$_font = str_replace( ' ', '+', $font_id );

				if ( in_array( 'italic', $font_information['variants'] ) ) {
					unset( $font_information['variants'][ array_search( 'italic', $font_information['variants'] ) ] );
					$font_information['variants'][] = '400italic';
				}

				if ( implode( ',', $font_information['variants'] ) != '' ) {
					$_font .= ':' . implode( ',', $font_information['variants'] );
				}

				// Remove Latin Subset because default subset is latin!
				// and if font have other subset then we make separate @import.
				foreach ( $font_information['subsets'] as $key => $value ) {
					if ( $value == 'latin' ) {
						unset( $font_information['subsets'][ $key ] );
					}
				}

				if ( implode( ',', $font_information['subsets'] ) != '' ) {
					$_font_have_subset = TRUE;
					$_font             .= '&subset=' . implode( ',', $font_information['subsets'] );
				}

				// no subset
				if ( ! $_font_have_subset ) {
					array_push( $out_fonts['main'], $_font );
				} else {
					$out_fonts[][] = $_font;
				}
			}

			//
			// Custom Font
			//
			elseif ( $type == 'custom-fonts' || $type == 'theme-fonts' ) {

				if ( $type == 'custom-fonts' ) {
					$font_data = Better_Framework::fonts_manager()->custom_fonts()->get_font( $font_id );
				} else {
					$font_data = Better_Framework::fonts_manager()->theme_fonts()->get_font( $font_id );
				}

				if ( $font_data === FALSE ) {
					continue;
				} // font id is not valid or removed

				$main_src_printed = FALSE;

				$custom_output = '';

				$custom_output .= "
@font-face {
    font-family: '" . $font_id . "';";

				// .EOT
				if ( ! empty( $font_data['eot'] ) ) {

					$custom_output .= "
    src: url('" . $font_data['eot'] . "'); /* IE9 Compat Modes */
    src: url('" . $font_data['eot'] . "?#iefix') format('embedded-opentype') /* IE6-IE8 */";

					$main_src_printed = TRUE;

				}

				// .WOFF
				if ( ! empty( $font_data['woff'] ) ) {

					if ( $main_src_printed ) {

						$custom_output .= "
    , url('" . $font_data['woff'] . "') format('woff') /* Pretty Modern Browsers */";

					} else {

						$main_src_printed = TRUE;

						$custom_output .= "
    src: url('" . $font_data['woff'] . "') format('woff') /* Pretty Modern Browsers */";

					}
				}


				// .TTF
				if ( ! empty( $font_data['ttf'] ) ) {

					if ( $main_src_printed ) {

						$custom_output .= "
    , url('" . $font_data['ttf'] . "') format('truetype') /* Safari, Android, iOS */";

					} else {

						$main_src_printed = TRUE;

						$custom_output .= "
    src: url('" . $font_data['ttf'] . "') format('truetype') /* Safari, Android, iOS */";

					}
				}

				// .SVG
				if ( ! empty( $font_data['svg'] ) ) {

					if ( $main_src_printed ) {

						$custom_output .= "
    , url('" . $font_data['svg'] . "#" . $font_id . "') format('svg') /* Legacy iOS */";

					} else {

						$custom_output .= "
    src: url('" . $font_data['svg'] . "#" . $font_id . "') format('svg') /* Legacy iOS */";


					}
				}

				$custom_output .= ";
    font-weight: normal;
    font-style: normal;
}";

				$out_fonts[] = $custom_output;

			} // Google EA Fonts
			elseif ( $type == 'google-ea-fonts' ) {

				$font_data = Better_Framework::fonts_manager()->google_ea_fonts()->get_font( $font_id );

				if ( $font_data === FALSE ) {
					continue;
				} // font id is not valid or removed

				$out_fonts[] = $font_data['url'];
			}
		}


		//
		// Google Fonts final array of links
		//
		if ( $type == 'google-fonts' ) {

			$final_fonts = array();
			foreach ( $out_fonts as $key => $out_font ) {
				if ( count( $out_font ) > 0 ) {
					$final_fonts[] = Better_Framework::fonts_manager()->get_protocol( $protocol ) . 'fonts.googleapis.com/css?family=' . implode( '%7C', $out_font );
				}
			}

			return $final_fonts;
		}

		//
		// Google EA Fonts final array of links
		//
		if ( $type == 'google-ea-fonts' ) {
			return $out_fonts;
		}

		//
		// Custom Fonts final string of font-face
		//
		elseif ( $type == 'custom-fonts' || $type == 'theme-fonts' ) {

			foreach ( $out_fonts as $out_font ) {
				$output .= $out_font;
			}

			if ( ! empty( $output ) ) {
				$output .= "\n";
			}
		}

		return $output;
	}


	/**
	 * Add new line to active fields
	 */
	private function add_new_line() {

		$this->fields[] = array( 'newline' => TRUE );

	}


	/**
	 * Render a block array to css code
	 *
	 * @param   array  $block
	 * @param   string $value
	 * @param   bool   $add_to_final
	 *
	 * @return string
	 */
	private function render_block( $block, $value = '', $add_to_final = TRUE ) {

		$css = bf_render_css_block_array( $block, $value );

		if ( $add_to_final ) {
			$this->final_css .= $css['code'];
		}

		//
		// Adds font into current font stacks
		//
		if ( ! empty( $css['font']['family'] ) ) {

			if ( ! isset( $css['font']['variant'] ) ) {
				$css['font']['variant'] = '';
			}

			if ( ! isset( $css['font']['subset'] ) ) {
				$css['font']['subset'] = '';
			}

			$this->set_fonts( $css['font']['family'], $css['font']['variant'], $css['font']['subset'] );
		}

		return $css['code'];
	}


	/**
	 * Render all fields css
	 *
	 * @return string
	 */
	function render_css() {

		foreach ( (array) $this->fields as $field ) {

			// new line field
			if ( isset( $field['newline'] ) ) {
				$this->render_block( $field, '' );
				continue;
			}


			// Continue when value in empty
			if ( ! isset( $field['value'] ) || $field['value'] === FALSE || $field['value'] == '' ) {
				if ( empty( $field['force-callback-call'] ) ) {
					continue;
				}
			}

			$value = $field['value'];

			unset( $field['value'] );

			// Custom callbacks for generating CSS
			if ( isset( $field['callback'] ) ) {

				if ( is_string( $field['callback'] ) & is_callable( $field['callback'] ) ) {
					call_user_func_array( $field['callback'], array( &$field, &$value ) );
				} elseif ( isset( $field['callback']['fun'] ) && is_callable( $field['callback']['fun'] ) ) {

					$args = array( &$field, &$value );

					if ( ! empty( $field['callback']['args'] ) ) {
						$args[] = $field['callback']['args'];
					}

					call_user_func_array( $field['callback']['fun'], $args );
				}

			}

			foreach ( (array) $field as $block ) {
				if ( is_array( $block ) ) {
					$this->render_block( $block, $value );
				}
			}
		}



		return $this->final_css;
	}


/**
 * display css
 */
function display() {

	status_header( 200 );
	header( "Content-type: text/css; charset: utf-8" );

	$this->load_all_fields();

	$final_css = $this->render_css();

	echo $this->render_fonts(); // escaped before in generating

	echo $final_css; // escaped before in generating

}


/**
 * Returns current css field id that integrated with style system
 *
 * @param   string $panel_id
 *
 * @return  string
 */
function get_css_id( $panel_id ) {

	// If panel haven't style feature
	if ( ! isset( BF_Options::$panels[ $panel_id ]['style'] ) ) {
		return 'css';
	}

	$style = get_option( $panel_id . '_current_style' );

	if ( $style == 'default' ) {
		return 'css';
	} else {
		return 'css-' . $style;
	}

}
}