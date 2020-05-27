<?php


if ( ! function_exists( 'publisher_irp_listing_option_list' ) ) {
	/**
	 * Panels inline related posts listing field
	 *
	 * @param bool $default_choice
	 *
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_irp_listing_option_list( $default_choice = false ) {

		$option = array();

		if ( $default_choice ) {
			$option['default'] = array(
				'img'           => PUBLISHER_THEME_URI . 'images/options/post-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label'         => __( 'Default', 'publisher' ),
				'current_label' => __( 'Default [ From Theme Panel ]', 'publisher' ),
			);
		}

		$option['thumbnail-1']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-thumbnail-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 1', 'publisher' ),
			'current_label' => __( 'Thumbnail Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['thumbnail-2']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-thumbnail-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 2', 'publisher' ),
			'current_label' => __( 'Thumbnail Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['thumbnail-3']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-thumbnail-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 3', 'publisher' ),
			'current_label' => __( 'Thumbnail Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['thumbnail-1-full'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-thumbnail-1-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 1 Full', 'publisher' ),
			'current_label' => __( 'Full Thumbnail Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);
		$option['thumbnail-2-full'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-thumbnail-2-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 2 Full', 'publisher' ),
			'current_label' => __( 'Full Thumbnail Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);
		$option['thumbnail-3-full'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-thumbnail-3-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 3 Full', 'publisher' ),
			'current_label' => __( 'Full Thumbnail Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);
		$option['text-1']           = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 1', 'publisher' ),
			'current_label' => __( 'Text Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['text-2']           = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 2', 'publisher' ),
			'current_label' => __( 'Text Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['text-3']           = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 3', 'publisher' ),
			'current_label' => __( 'Text Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['text-4']           = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 4', 'publisher' ),
			'current_label' => __( 'Text Listing 4', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Aligned', 'publisher' ),
				),
			),
		);
		$option['text-1-full']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-1-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 1 Full', 'publisher' ),
			'current_label' => __( 'Full Text Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);
		$option['text-2-full']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-2-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 2 Full', 'publisher' ),
			'current_label' => __( 'Full Text Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);
		$option['text-3-full']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-3-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 3 Full', 'publisher' ),
			'current_label' => __( 'Full Text Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);
		$option['text-4-full']      = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/irp-listing-text-4-full.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 4 Full', 'publisher' ),
			'current_label' => __( 'Full Text Listing 4', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat'  => array(
					__( 'Text Listing', 'publisher' ),
				),
				'type' => array(
					__( 'Full', 'publisher' ),
				),
			),
		);

		return $option;
	}
}


if ( ! function_exists( 'publisher_get_related_post_type' ) ) {
	/**
	 * Returns type of related posts for current page
	 *
	 * @return string
	 */
	function publisher_get_related_post_type() {

		static $related_post;

		if ( $related_post ) {
			return $related_post;
		}

		$related_post = 'default';

		if ( publisher_is_valid_cpt() ) {
			$related_post = bf_get_post_meta( 'post_related' );
		}

		if ( $related_post === 'default' || ! $related_post ) {
			$related_post = publisher_get_option( 'post_related' );
		}

		return $related_post;

	}
}
