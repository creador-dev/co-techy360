<?php


if ( ! function_exists( 'publisher_cat_main_slider_config' ) ) {
	/**
	 * Deprecated function.
	 * Use publisher_main_slider_config
	 *
	 * @param null $term_id
	 *
	 * @return array|mixed
	 */
	function publisher_cat_main_slider_config( $term_id = null ) {

		return publisher_main_slider_config( array(
			'type'    => 'term',
			'term_id' => is_null( $term_id ) ? '' : $term_id,
		) );
	}
}


if ( ! function_exists( 'publisher_main_slider_config' ) ) {
	/**
	 * Prepare main slider config
	 *
	 * @param array $args
	 *
	 * @return array|mixed
	 */
	function publisher_main_slider_config( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'type'    => 'term',
			'term_id' => '',
		) );

		// return from cache
		if ( publisher_get_global( $args['type'] . '-slider-config' ) != null ) {
			return publisher_get_global( $args['type'] . '-slider-config' );
		}

		//
		// Base config
		//
		$config = array(
			'type'      => 'default',
			'style'     => 'default',
			'overlay'   => 'default',
			'show'      => false,
			'in-column' => false,
			'bg_color'  => '',
		);

		//
		// Term Type
		//
		if ( $args['type'] === 'term' ) {

			if ( empty( $args['term_id'] ) ) {
				$queried_object = get_queried_object();

				if ( isset( $queried_object->term_id ) ) {
					$args['term_id'] = $queried_object->term_id;
				}
			}

			// get from current term
			if ( publisher_is_valid_tax() ) {
				$config['type'] = bf_get_term_meta( 'slider_type', $args['term_id'] );
			}

			// slider Type
			if ( $config['type'] === 'default' ) {
				$config['type'] = publisher_get_option( 'cat_slider' );
			}
		} elseif ( $args['type'] === 'home' ) {

			// slider Type
			$config['type'] = publisher_get_option( 'home_slider' );
		}

		if ( ! publisher_is_valid_slider_type( $config['type'] ) ) {
			$config['type'] = 'disable';
		}

		switch ( $config['type'] ) {

			case 'disable':
				$config['style']     = 'disable';
				$config['directory'] = '';
				$config['file']      = '';
				$config['show']      = false;
				$config['posts']     = 0;
				break;

			case 'custom-blocks':

				//
				// Term type
				//
				if ( $args['type'] === 'term' ) {

					// get from current term
					if ( publisher_is_valid_tax() ) {
						$config['style']   = bf_get_term_meta( 'better_slider_style', $args['term_id'] );
						$config['overlay'] = bf_get_term_meta( 'better_slider_gradient', $args['term_id'] );
					}

					// Slider style
					if ( $config['style'] === 'default' ) {
						$config['style'] = publisher_get_option( 'cat_top_posts' );
					}

					// overlay
					if ( $config['overlay'] === 'default' ) {
						$config['overlay'] = publisher_get_option( 'cat_top_posts_gradient' );
					}
				}
				//
				// Home type
				//
				elseif ( $args['type'] === 'home' ) {

					// Slider style
					$config['style'] = publisher_get_option( 'home_top_posts' );

					// overlay
					$config['overlay'] = publisher_get_option( 'home_top_posts_gradient' );
				}

				// Validate it
				if ( ! publisher_is_valid_topposts_style( $config['style'] ) ) {
					$config['style'] = 'disable';
				}

				// Posts config
				switch ( $config['style'] ) {

					case 'style-1':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-1';
						$config['show']      = true;
						$config['posts']     = 4;
						$config['in-column'] = false;
						$config['class']     = '';
						break;

					case 'style-2':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-1';
						$config['show']      = true;
						$config['posts']     = 4;
						$config['in-column'] = true;
						$atts                = publisher_improve_block_atts_for_size( array(), 'mg-1' );

						if ( isset( $atts['mg-layout'] ) ) {
							$config['class'] = $atts['mg-layout'];
						}
						break;

					case 'style-3':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-2';
						$config['show']      = true;
						$config['posts']     = 5;
						$config['in-column'] = false;
						break;

					case 'style-4':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-2';
						$config['show']      = true;
						$config['posts']     = 5;
						$config['in-column'] = true;
						$atts                = publisher_improve_block_atts_for_size( array(), 'mg-2' );

						if ( isset( $atts['mg-layout'] ) ) {
							$config['class'] = $atts['mg-layout'];
						}

						break;

					case 'style-5':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-3';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = 3;
						$config['in-column'] = false;
						break;

					case 'style-6':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-3';
						$config['show']      = true;
						$config['posts']     = 2;
						$config['columns']   = 2;
						$config['in-column'] = true;

						// Set columns
						if ( isset( $atts['columns'] ) ) {
							$atts = publisher_improve_block_atts_for_size( array( 'columns' => $config['columns'] ), 'mg-3' );

							if ( isset( $atts['mg-layout'] ) ) {
								$config['class'] = $atts['mg-layout'];
							}
						}

						break;

					case 'style-7':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-4';
						$config['show']      = true;
						$config['posts']     = 4;
						$config['columns']   = 4;
						$config['in-column'] = false;
						break;

					case 'style-8':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-4';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = 3;
						$config['in-column'] = true;

						// set smart responsive layout
						if ( isset( $atts['columns'] ) ) {
							$atts = publisher_improve_block_atts_for_size( array( 'columns' => $config['columns'] ), 'mg-4' );

							if ( isset( $atts['mg-layout'] ) ) {
								$config['class'] = $atts['mg-layout'];
							}
						}

						break;

					case 'style-9':
						$config['directory'] = 'shortcodes';
						$config['file']      = 'bs-slider-1';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-10':
						$config['directory'] = 'shortcodes';
						$config['file']      = 'bs-slider-1';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = true;

						$atts = publisher_improve_block_atts_for_size( array(), 'slider-1' );

						if ( isset( $atts['mg-layout'] ) ) {
							$config['class'] = $atts['mg-layout'];
						}

						break;

					case 'style-11':
						$config['directory'] = 'shortcodes';
						$config['file']      = 'bs-slider-2';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-12':
						$config['directory'] = 'shortcodes';
						$config['file']      = 'bs-slider-2';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = true;

						$atts = publisher_improve_block_atts_for_size( array(), 'slider-2' );

						if ( isset( $atts['mg-layout'] ) ) {
							$config['class'] = $atts['mg-layout'];
						}

						break;

					case 'style-13':
						$config['directory'] = 'shortcodes';
						$config['file']      = 'bs-slider-3';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-14':
						$config['directory'] = 'shortcodes';
						$config['file']      = 'bs-slider-3';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = true;

						$atts = publisher_improve_block_atts_for_size( array(), 'slider-3' );

						if ( isset( $atts['mg-layout'] ) ) {
							$config['class'] = $atts['mg-layout'];
						}

						break;

					case 'style-15':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-5';
						$config['show']      = true;
						$config['posts']     = 5;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-16':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-5';
						$config['show']      = true;
						$config['posts']     = 3;
						$config['columns']   = '';
						$config['in-column'] = true;

						// Set columns
						$atts = publisher_improve_block_atts_for_size( array(), 'mg-5' );

						if ( isset( $atts['mg-layout'] ) ) {
							$config['class'] = $atts['mg-layout'];
						}

						break;

					case 'style-17':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-7';
						$config['show']      = true;
						$config['posts']     = 5;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-18':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-7';
						$config['show']      = true;
						$config['posts']     = 5;
						$config['columns']   = '';
						$config['in-column'] = true;
						$config['class']     = 'bsw-' . publisher_get_block_size();

						break;

					case 'style-19':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-8';
						$config['show']      = true;
						$config['posts']     = 5;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-20':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-9';
						$config['show']      = true;
						$config['posts']     = 7;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-21':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-10';
						$config['show']      = true;
						$config['posts']     = 6;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-22':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-6';
						$config['show']      = true;
						$config['posts']     = 2;
						$config['columns']   = '';
						$config['in-column'] = false;
						break;

					case 'style-23':
						$config['directory'] = 'loop';
						$config['file']      = 'listing-modern-grid-6';
						$config['show']      = true;
						$config['posts']     = 2;
						$config['columns']   = '';
						$config['in-column'] = true;
						$config['class']     = 'bsw-' . publisher_get_block_size();
						break;

					default:
						$config['type']      = 'disable';
						$config['style']     = 'disable';
						$config['directory'] = '';
						$config['file']      = '';
						$config['show']      = false;
						$config['posts']     = 0;

				}

				break;

			case 'rev_slider':

				//
				// Term type
				//
				if ( $args['type'] === 'term' ) {

					// get from current term
					if ( publisher_is_valid_tax() ) {
						$config['style'] = bf_get_term_meta( 'rev_slider_item', $args['term_id'], 'default' );
					}

					// Slider style
					if ( $config['style'] === 'default' || empty( $config['style'] ) ) {
						$config['style'] = publisher_get_option( 'cat_rev_slider_item' );
					}
				}
				//
				// Home type
				//
				elseif ( $args['type'] === 'home' ) {
					$config['style'] = publisher_get_option( 'home_rev_slider_item' );
				}


				// determine show
				if ( ! empty( $config['style'] ) && function_exists( 'putRevSlider' ) ) {
					$config['show'] = true;
				}

				$config['in-column'] = false;

				break;
		}

		// Have bg color
		if ( ! $config['in-column'] ) {
			$config['bg_color'] = publisher_get_option( 'cat_topposts_bg_color' );
		}

		// Save it to cache
		publisher_set_global( $args['type'] . '-slider-config', $config );

		return $config;

	} // publisher_main_slider_config

} // if


if ( ! function_exists( 'publisher_topposts_option_list' ) ) {
	/**
	 * Panels category toposts field options
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_topposts_option_list( $default = false ) {

		$option = array();

		if ( $default ) {
			$option['default'] = array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Default', 'publisher' ),
			);
		}

		$option['style-1']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 1', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-2']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 2', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-3']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 3', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-4']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 4', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-5']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-5.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 5', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-6']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-6.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 6', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-7']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-7.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 7', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-8']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-8.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 8', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-9']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-9.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 9', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-10'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-10.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 10', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-11'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-11.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 11', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-12'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-12.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 12', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-13'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-13.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 13', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-14'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-14.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 14', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-15'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-15.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 15', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-16'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-16.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 16', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-17'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-17.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 17', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-18'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-18.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 18', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);
		$option['style-19'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-19.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 19', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-20'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-20.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 20', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-21'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-21.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 21', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-22'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-22.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 22', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Large', 'publisher' ),
				),
			),
		);
		$option['style-23'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/cat-slider-style-23.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 23', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Small', 'publisher' ),
				),
			),
		);

		return $option;
	} // publisher_topposts_option_list
} // if


if ( ! function_exists( 'publisher_is_valid_topposts_style' ) ) {
	/**
	 * Check the parameter is theme valid topposts style
	 *
	 * @param $layout
	 *
	 * @return bool
	 */
	function publisher_is_valid_topposts_style( $layout ) {

		return array_key_exists( $layout, publisher_topposts_option_list() );
	} // publisher_is_valid_topposts_style
} // if


if ( ! function_exists( 'publisher_slider_types_option_list' ) ) {
	/**
	 * Panels category slider field options
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_slider_types_option_list( $default = false ) {

		$option = array();

		if ( $default ) {
			$option['default'] = __( '-- Default --', 'publisher' );
		}

		$option['disable']       = __( 'Disabled', 'publisher' );
		$option['custom-blocks'] = __( 'Top posts', 'publisher' );
		$option['rev_slider']    = __( 'Slider Revolution', 'publisher' );

		return $option;
	} // publisher_slider_types_option_list
} // if


if ( ! function_exists( 'publisher_is_valid_slider_type' ) ) {
	/**
	 * Check the parameter is theme valid slider type
	 *
	 * @param $layout
	 *
	 * @return bool
	 */
	function publisher_is_valid_slider_type( $layout ) {

		return ( is_string( $layout ) || is_int( $layout ) ) &&
		       array_key_exists( $layout, publisher_slider_types_option_list() );
	} // publisher_is_valid_slider_type
} // if
