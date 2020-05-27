<?php


if ( ! function_exists( 'publisher_get_single_template' ) ) {
	/**
	 * Used to get template for single page
	 *
	 * @return string
	 */
	function publisher_get_single_template() {

		static $template;

		if ( $template ) {
			return $template;
		}

		// default not valid post types
		if ( ! publisher_is_valid_cpt() ) {
			return $template = 'style-1';
		}

		$_check = array(
			''        => '',
			'default' => '',
		);

		$template = 'default';

		// Customized template in post
		if ( isset( $_check[ $template ] ) ) {
			$template = bf_get_post_meta( 'post_template' );
		}

		// Customized in category
		if ( isset( $_check[ $template ] ) ) {

			$main_term = publisher_get_post_primary_cat();

			if ( ! is_wp_error( $main_term ) && is_object( $main_term ) ) {
				$template = bf_get_term_meta( 'single_template', $main_term );
			}
		}

		// General Post Template
		if ( isset( $_check[ $template ] ) ) {
			$template = publisher_get_option( 'post_template' );
		}

		// validate
		if ( $template != 'default' && ! publisher_is_valid_single_template( $template ) ) {
			$template = 'default';
		}

		// default is style-1
		if ( isset( $_check[ $template ] ) ) {
			$template = 'style-1';
		}

		return $template;

	}
}// publisher_get_single_template


if ( ! function_exists( 'publisher_get_single_template_option' ) ) {
	/**
	 * Used to get template for single page
	 *
	 * @return array
	 */
	function publisher_get_single_template_option( $default = false ) {

		$option = array();

		if ( $default ) {
			$option['default'] = array(
				'img'           => PUBLISHER_THEME_URI . 'images/options/post-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label'         => __( 'Default', 'publisher' ),
				'current_label' => __( 'Default Template', 'publisher' ),
			);
		}

		$option['style-1']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 1', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Normal', 'publisher' ),
				),
			),
		);
		$option['style-2']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 2', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-3']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 3', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-4']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 4', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-5']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-5.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 5', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-6']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-6.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 6', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-7']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-7.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 7', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-8']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-8.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 8', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Normal', 'publisher' ),
				),
			),
		);
		$option['style-9']  = array(
			'img'    => PUBLISHER_THEME_URI . 'images/options/post-style-9.png?v=' . PUBLISHER_THEME_VERSION,
			'label'  => __( 'Template 9', 'publisher' ),
			'class'  => 'bf-flip-img-rtl',
			'info'   => array(
				'cat' => array(
					__( 'No Thumbnail', 'publisher' ),
				),
			),
			'Badges' => array(
				'cat' => array(
					__( 'No Thumbnail', 'publisher' ),
				),
			),
		);
		$option['style-10'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-10.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 10', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Normal', 'publisher' ),
				),
			),
		);
		$option['style-11'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-11.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 11', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Normal', 'publisher' ),
				),
			),
		);
		$option['style-12'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-12.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 12', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Video', 'publisher' ),
				),
			),
		);
		$option['style-13'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/post-style-13.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'Template 13', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
		);
		$option['style-14'] = array(
			'img'    => PUBLISHER_THEME_URI . 'images/options/post-style-14.png?v=' . PUBLISHER_THEME_VERSION,
			'label'  => __( 'Template 14', 'publisher' ),
			'class'  => 'bf-flip-img-rtl',
			'info'   => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
			'badges' => array(
				__( 'New', 'publisher' ),
			),
		);
		$option['style-15'] = array(
			'img'    => PUBLISHER_THEME_URI . 'images/options/post-style-15.png?v=' . PUBLISHER_THEME_VERSION,
			'label'  => __( 'Template 15', 'publisher' ),
			'class'  => 'bf-flip-img-rtl',
			'info'   => array(
				'cat' => array(
					__( 'Wide', 'publisher' ),
				),
			),
			'badges' => array(
				__( 'New', 'publisher' ),
			),
		);

		return $option;
	}
}// publisher_get_single_template_option


if ( ! function_exists( 'publisher_is_valid_single_template' ) ) {
	/**
	 * Checks parameter to be a theme valid single template
	 *
	 * @param $template
	 *
	 * @return bool
	 */
	function publisher_is_valid_single_template( $template ) {

		return array_key_exists( $template, publisher_get_single_template_option() );
	} // publisher_is_valid_listing
}
