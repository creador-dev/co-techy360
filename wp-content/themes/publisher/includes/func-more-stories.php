<?php


if ( ! function_exists( 'publisher_more_stories_listing_option_list' ) ) {
	/**
	 * Panels more stories listing field option
	 *
	 * @param bool $default_choice
	 *
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_more_stories_listing_option_list( $default_choice = false ) {

		$option = array();


		if ( $default_choice ) {
			$option['default'] = array(
				'img'           => PUBLISHER_THEME_URI . 'images/options/post-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label'         => __( 'Default', 'publisher' ),
				'current_label' => __( 'Default [ From Theme Panel ]', 'publisher' ),
			);
		}

		$option['thumbnail-1'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-thumbnail-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 1', 'publisher' ),
			'current_label' => __( 'Thumbnail Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
			),
		);
		$option['thumbnail-2'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-thumbnail-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 2', 'publisher' ),
			'current_label' => __( 'Thumbnail Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
			),
		);
		$option['thumbnail-3'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-thumbnail-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Thumbnail 3', 'publisher' ),
			'current_label' => __( 'Thumbnail Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Thumbnail Listing', 'publisher' ),
				),
			),
		);

		$option['text-1'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-text-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 1', 'publisher' ),
			'current_label' => __( 'Text Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
		);
		$option['text-2'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-text-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 2', 'publisher' ),
			'current_label' => __( 'Text Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
		);
		$option['text-3'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-text-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 3', 'publisher' ),
			'current_label' => __( 'Text Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
		);
		$option['text-4'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/ms-listing-text-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 4', 'publisher' ),
			'current_label' => __( 'Text Listing 4', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
		);

		return $option;
	} // publisher_more_stories_listing_option_list
}
