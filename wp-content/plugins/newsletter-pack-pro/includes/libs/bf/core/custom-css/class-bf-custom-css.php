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

		if ( ! bf_count( $this->fonts ) ) {
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

				$_font_have_subset = false;

				$font_data = Better_Framework::fonts_manager()->google_fonts()->get_font( $font_id );

				if ( $font_data == false ) {
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
					$_font_have_subset = true;
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
					$font = Better_Framework::fonts_manager()->custom_fonts()->get_font( $font_id );
				} else {
					$font = Better_Framework::fonts_manager()->theme_fonts()->get_font( $font_id );
				}

				if ( $font === false ) {
					continue;
				} // font id is not valid or removed

				$main_src_printed = false;

				$custom_output = '';
				$src           = array(
					'main'  => array(),
					'extra' => array(),
				);
				$custom_output .= " 
@font-face { 
	font-family: '" . $font_id . "';";


				// .EOT
				if ( ! empty( $font['eot'] ) ) {
					$src['extra'][] = "url('" . $font['eot'] . "')";
					$src['extra'][] = "url('" . $font['eot'] . "?#iefix') format('embedded-opentype')";
				}

				// .WOFF2
				if ( ! empty( $font['woff2'] ) ) {
					$src['main'][] = "url('" . $font['woff2'] . "') format('woff2')";
				}

				// .WOFF
				if ( ! empty( $font['woff'] ) ) {
					$src['main'][] = "url('" . $font['woff'] . "') format('woff')";
				}

				// .TTF
				if ( ! empty( $font['ttf'] ) ) {
					$src['main'][] = "url('" . $font['ttf'] . "') format('truetype')";
				}

				// .SVG
				if ( ! empty( $font['svg'] ) ) {
					$src['main'][] = "url('" . $font['svg'] . "#" . $font_id . "') format('svg')";
				}

				// .OTF
				if ( ! empty( $font['otf'] ) ) {
					$src['main'][] = "url('" . $font['otf'] . "#" . $font_id . "') format('opentype')";
				}

				//
				// Generate SRC attrs
				//
				{
					if ( ! empty( $src['extra'] ) ) {
						foreach ( $src['extra'] as $_src ) {
							$custom_output .= "src: $_src;";
						}
					}

					if ( ! empty( $src['main'] ) ) {
						$custom_output .= 'src: ' . implode( ',', $src['main'] ) . ';';
					}
				}

				$custom_output .= "
    font-weight: normal;
    font-style: normal;
}";

				$out_fonts[] = $custom_output;

			} // Google EA Fonts
			elseif ( $type == 'google-ea-fonts' ) {

				$font_data = Better_Framework::fonts_manager()->google_ea_fonts()->get_font( $font_id );

				if ( $font_data === false ) {
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
				if ( $out_font ) {
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

		$this->fields[] = array( 'newline' => true );

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
	private function render_block( $block, $value = '', $add_to_final = true ) {

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
			if ( ! isset( $field['value'] ) || $field['value'] === false || $field['value'] == '' ) {
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