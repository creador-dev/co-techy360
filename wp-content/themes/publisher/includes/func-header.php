<?php


if ( ! function_exists( 'publisher_header_style_option_list' ) ) {
	/**
	 * Panels header style field options
	 *
	 * @param bool $default
	 *
	 * @param bool $disable
	 *
	 * @return array
	 */
	function publisher_header_style_option_list( $default = false, $disable = true ) {

		$option = array();

		if ( $default ) {
			$option['default'] = array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/header-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '-- Default --', 'publisher' ),
			);
		}

		$option['style-1'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 1', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-2'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 2', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-3'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 3', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-4'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 4', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-5'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-5.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 5', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-6'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-6.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 6', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-7'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-7.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 7', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);
		$option['style-8'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/header-style-8.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Style 8', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
		);

		if ( $disable ) {
			$option['disable'] = array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/header-disable.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'No Header', 'publisher' ),
				'class' => 'bf-flip-img-rtl',
			);
		}

		$option = apply_filters( 'publisher/headers/list', $option, $default, $disable );

		return $option;
	} // publisher_header_style_option_list
} // if


if ( ! function_exists( 'publisher_header_layout_option_list' ) ) {
	/**
	 * Header layouts list
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_header_layout_option_list( $default = false ) {

		$option = array(
			array(
				'label'   => 'Lock Inside Page Layout',
				'options' => array(
					'boxed'      => __( 'Boxed header', 'publisher' ),
					'full-width' => __( 'Full width header (Boxed Content)', 'publisher' ),
					'stretched'  => __( 'Full width header (Stretched Content)', 'publisher' ),
				)
			),
			array(
				'label'   => 'Out Of Page Layout',
				'options' => array(
					'out-full-width' => __( 'Full width header (Boxed Content)', 'publisher' ),
					'out-stretched'  => __( 'Full width header (Stretched Content)', 'publisher' ),
				)
			)
		);

		if ( $default ) {
			$option = array(
				          'default' => __( '-- Default --', 'publisher' ),
			          ) + $option;
		}

		return $option;
	} // publisher_header_layout_option_list
} // if


if ( ! function_exists( 'publisher_get_header_style' ) ) {
	/**
	 * Used to get current page header style
	 *
	 * @return bool|mixed|null|string
	 */
	function publisher_get_header_style() {

		static $style;

		if ( $style ) {
			return $style;
		}

		$style = 'default';

		if ( publisher_is_valid_tax( 'category' ) ) {
			$style = bf_get_term_meta( 'header_style' );
		} elseif ( publisher_is_valid_cpt() ) {

			$style = bf_get_post_meta( 'header_style' );

			// default -> Retrieve from parent category
			if ( $style === 'default' || ! publisher_is_valid_header_style( $style ) ) {

				$main_term = publisher_get_post_primary_cat();

				if ( ! is_wp_error( $main_term ) && is_object( $main_term ) && bf_get_term_meta( 'override_in_posts', $main_term ) ) {
					$style = bf_get_term_meta( 'header_style', $main_term );
				}
			}

		}// WooCommerce
		elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {

			if ( is_shop() ) {
				$style = bf_get_post_meta( 'header_style', wc_get_page_id( 'shop' ) );
			} elseif ( is_product() ) {
				$style = bf_get_post_meta( 'header_style', get_the_ID() );
			} elseif ( is_cart() ) {
				$style = bf_get_post_meta( 'header_style', wc_get_page_id( 'cart' ) );
			} elseif ( is_checkout() ) {
				$style = bf_get_post_meta( 'header_style', wc_get_page_id( 'checkout' ) );
			} elseif ( is_account_page() ) {
				$style = bf_get_post_meta( 'header_style', wc_get_page_id( 'myaccount' ) );
			} elseif ( is_product_category() || is_product_tag() ) {
				$style = bf_get_term_meta( 'header_style', get_queried_object()->term_id );
			}

		}

		if ( $style === 'default' || ! publisher_is_valid_header_style( $style ) ) {
			$style = publisher_get_option( 'header_style' );
		}

		return $style;

	} // publisher_get_header_style
} // if


if ( ! function_exists( 'publisher_is_valid_header_style' ) ) {
	/**
	 * Check the parameter is theme valid layout or not!
	 *
	 * This is because of multiple theme that have same header_style id for page headers
	 *
	 * @param $layout
	 *
	 * @return bool
	 */
	function publisher_is_valid_header_style( $layout ) {

		return ( is_string( $layout ) || is_int( $layout ) ) &&
		       array_key_exists( $layout, publisher_header_style_option_list() );
	} // publisher_is_valid_header_style
} // if


if ( ! function_exists( 'publisher_get_header_layout' ) ) {
	/**
	 * Returns header layout for current page
	 *
	 * @return bool
	 */
	function publisher_get_header_layout() {

		// Return from cache
		if ( publisher_get_global( 'header-layout' ) ) {
			return publisher_get_global( 'header-layout' );
		}

		$layout = 'default';

		if ( publisher_is_valid_tax() ) {
			$layout = bf_get_term_meta( 'header_layout' );
		} elseif ( publisher_is_valid_cpt() ) {


			$layout = bf_get_post_meta( 'header_layout' );
			// default -> Retrieve from parent category
			if ( $layout === 'default' ) {

				$main_term = publisher_get_post_primary_cat();

				if ( ! is_wp_error( $main_term ) && is_object( $main_term ) && bf_get_term_meta( 'override_in_posts', $main_term ) ) {
					$layout = bf_get_term_meta( 'header_layout', $main_term );
				}
			}
		}

		if ( $layout === 'default' ) {
			$layout = publisher_get_option( 'header_layout' );
		}

		// Cache
		publisher_set_global( 'header-layout', $layout );

		return $layout;

	} // publisher_get_header_layout
}


if ( ! function_exists( 'publisher_get_header_layout_class' ) ) {
	/**
	 * Returns header layout class for current page
	 *
	 * @return string
	 */
	function publisher_get_header_layout_class() {

		static $class;

		if ( isset( $class ) ) {
			return $class;
		}

		$class  = '';
		$layout = publisher_get_header_layout();

		$class_map = array(
			'boxed'          => 'boxed',
			'full-width'     => 'full-width',
			'stretched'      => 'full-width stretched',
			'out-full-width' => 'full-width',
			'out-stretched'  => 'full-width stretched',
		);

		if ( isset( $class_map[ $layout ] ) ) {

			$class = $class_map[ $layout ];
		}

		return $class;
	} // publisher_get_header_layout_class
}
