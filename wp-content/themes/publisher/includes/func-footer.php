<?php


if ( ! function_exists( 'publisher_footer_style_option_list' ) ) {
	/**
	 * Panels footer style field options
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_footer_style_option_list( $default = false, $disable = true ) {

		$option = array();

		if ( $default ) {
			$option['default'] = array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/footer-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '-- Default --', 'publisher' ),
			);
		}

		if ( $disable ) {
			$option['disable'] = array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/footer-disable.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'No Footer', 'publisher' ),
			);
		}

		return $option;
	} // publisher_footer_style_option_list
} // if


if ( ! function_exists( 'publisher_get_footer_style' ) ) {
	/**
	 * Used to get current page footer style
	 *
	 * @return string
	 */
	function publisher_get_footer_style() {

		static $style;

		if ( $style ) {
			return $style;
		}

		$style = 'style-1';

		if ( publisher_is_valid_cpt() ) {
			$style = bf_get_post_meta( 'footer_style' );
		} // WooCommerce
		elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {

			if ( is_shop() ) {
				$style = bf_get_post_meta( 'footer_style', wc_get_page_id( 'shop' ) );
			} elseif ( is_product() ) {
				$style = bf_get_post_meta( 'footer_style', get_the_ID() );
			} elseif ( is_cart() ) {
				$style = bf_get_post_meta( 'footer_style', wc_get_page_id( 'cart' ) );
			} elseif ( is_checkout() ) {
				$style = bf_get_post_meta( 'footer_style', wc_get_page_id( 'checkout' ) );
			} elseif ( is_account_page() ) {
				$style = bf_get_post_meta( 'footer_style', wc_get_page_id( 'myaccount' ) );
			} elseif ( is_product_category() || is_product_tag() ) {
				$style = bf_get_term_meta( 'footer_style', get_queried_object()->term_id );
			}
		}

		if ( $style === 'default' || ! $style ) {
			$style = 'style-1';
		}

		return $style;

	} // publisher_get_footer_style
} // if


if ( ! function_exists( 'publisher_footer_layout_option_list' ) ) {
	/**
	 * Footer layouts list
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_footer_layout_option_list( $default = false ) {

		$option = array(
			array(
				'label'   => 'Lock Inside Page Layout',
				'options' => array(
					'boxed'      => __( 'Boxed footer', 'publisher' ),
					'full-width' => __( 'Full width footer (Boxed Content)', 'publisher' ),
					'stretched'  => __( 'Full width footer (Stretched Content)', 'publisher' ),
				)
			),
			array(
				'label'   => 'Out Of Page Layout',
				'options' => array(
					'out-full-width' => __( 'Full width footer (Boxed Content)', 'publisher' ),
					'out-stretched'  => __( 'Full width footer (Stretched Content)', 'publisher' ),
				)
			)
		);

		if ( $default ) {
			$option = array(
				          'default' => __( '-- Default --', 'publisher' ),
			          ) + $option;
		}

		return $option;
	} // publisher_footer_layout_option_list
} // if


if ( ! function_exists( 'publisher_get_footer_layout' ) ) {
	/**
	 * Returns footer layout for current page
	 *
	 * @return bool
	 */
	function publisher_get_footer_layout() {

		// Return from cache
		if ( publisher_get_global( 'footer-layout' ) ) {
			return publisher_get_global( 'footer-layout' );
		}

		$layout = publisher_get_option( 'footer_layout' );

		// Cache
		publisher_set_global( 'footer-layout', $layout );

		return $layout;

	} // publisher_get_footer_layout
}


if ( ! function_exists( 'publisher_get_footer_layout_class' ) ) {
	/**
	 * Returns footer layout class for current page
	 *
	 * @return bool
	 */
	function publisher_get_footer_layout_class() {

		static $class;

		if ( $class ) {
			return $class;
		}

		$class = publisher_get_footer_layout();

		$_check = array(
			'boxed'          => 'boxed',
			'full-width'     => 'full-width',
			'stretched'      => 'full-width stretched',
			'out-full-width' => 'full-width',
			'out-stretched'  => 'full-width stretched',
		);

		$class = $_check[ $class ];
		unset( $_check );

		return $class;

	} // publisher_get_footer_layout_class
}
