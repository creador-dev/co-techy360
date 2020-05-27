<?php


if ( ! function_exists( 'publisher_listing_option_list' ) ) {
	/**
	 * Panels posts listing field option
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_listing_option_list( $default = false ) {

		$option = array();

		if ( $default ) {
			$option['default'] = array(
				'img'           => PUBLISHER_THEME_URI . 'images/options/listing-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label'         => __( 'Default', 'publisher' ),
				'current_label' => __( 'Default Listing', 'publisher' ),
			);
		}

		$option['grid-1']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-grid-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Grid 1', 'publisher' ),
			'current_label' => __( 'Grid Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Grid Listing', 'publisher' ),
				),
			),
		);
		$option['grid-1-3']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-grid-1-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Grid 1', 'publisher' ),
			'current_label' => __( 'Grid Listing 1 (3 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Grid Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'3 Column',
			),
		);
		$option['grid-2']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-grid-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Grid 2', 'publisher' ),
			'current_label' => __( 'Grid Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Grid Listing', 'publisher' ),
				),
			),
		);
		$option['grid-2-3']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-grid-2-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Grid 2', 'publisher' ),
			'current_label' => __( 'Grid Listing 2 (3 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Grid Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'3 Column',
			),
		);
		$option['blog-1']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-blog-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Blog 1', 'publisher' ),
			'current_label' => __( 'Blog Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Blog Listing', 'publisher' ),
				),
			),
		);
		$option['blog-2']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-blog-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Blog 2', 'publisher' ),
			'current_label' => __( 'Blog Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Blog Listing', 'publisher' ),
				),
			),
		);
		$option['blog-3']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-blog-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Blog 3', 'publisher' ),
			'current_label' => __( 'Blog Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Blog Listing', 'publisher' ),
				),
			),
		);
		$option['blog-4']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-blog-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Blog 4', 'publisher' ),
			'current_label' => __( 'Blog Listing 4', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Blog Listing', 'publisher' ),
				),
			),
		);
		$option['blog-5']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-blog-5.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Blog 5', 'publisher' ),
			'current_label' => __( 'Blog Listing 5', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Blog Listing', 'publisher' ),
				),
			),
		);
		$option['classic-1'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-classic-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Classic 1', 'publisher' ),
			'current_label' => __( 'Classic Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Classic Listing', 'publisher' ),
				),
			),
		);
		$option['classic-2'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-classic-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Classic 2', 'publisher' ),
			'current_label' => __( 'Classic Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Classic Listing', 'publisher' ),
				),
			),
		);
		$option['classic-3'] = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-classic-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Classic 3', 'publisher' ),
			'current_label' => __( 'Classic Listing 3', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Classic Listing', 'publisher' ),
				),
			),
		);
		$option['tall-1']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-tall-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Tall 1', 'publisher' ),
			'current_label' => __( 'Tall Listing 1', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Tall Listing', 'publisher' ),
				),
			),
		);
		$option['tall-1-4']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-tall-1-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Tall 1', 'publisher' ),
			'current_label' => __( 'Tall Listing 1 (4 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Tall Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'4 Column',
			),
		);
		$option['tall-2']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-tall-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Tall 2', 'publisher' ),
			'current_label' => __( 'Tall Listing 2', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Tall Listing', 'publisher' ),
				),
			),
		);
		$option['tall-2-4']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-tall-2-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Tall 2', 'publisher' ),
			'current_label' => __( 'Tall Listing 2 (4 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Tall Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'4 Column',
			),
		);
		$option['mix-4-1']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 11', 'publisher' ),
			'current_label' => __( 'Mix Listing 11', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Tall Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-2']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 12', 'publisher' ),
			'current_label' => __( 'Mix Listing 12', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-3']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 13', 'publisher' ),
			'current_label' => __( 'Mix Listing 13', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-4']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 14', 'publisher' ),
			'current_label' => __( 'Mix Listing 14', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-5']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-5.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 15', 'publisher' ),
			'current_label' => __( 'Mix Listing 15', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-6']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-6.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 16', 'publisher' ),
			'current_label' => __( 'Mix Listing 16', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-7']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-7.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 17', 'publisher' ),
			'current_label' => __( 'Mix Listing 17', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['mix-4-8']   = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-mix-4-8.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Mix 18', 'publisher' ),
			'current_label' => __( 'Mix Listing 18', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Mix Listing', 'publisher' ),
				),
			),
		);
		$option['text-1-2']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-1-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 1', 'publisher' ),
			'current_label' => __( 'Text Listing 1 (2 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'2 Column',
				'NEW',
			),
		);
		$option['text-1-3']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-1-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 1', 'publisher' ),
			'current_label' => __( 'Text Listing 1 (3 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'3 Column',
				'NEW',
			),
		);
		$option['text-2-2']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-2-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 2', 'publisher' ),
			'current_label' => __( 'Text Listing 2 (2 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'2 Column',
				'NEW',
			),
		);
		$option['text-2-3']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-2-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 2', 'publisher' ),
			'current_label' => __( 'Text Listing 2 (3 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'3 Column',
				'NEW',
			),
		);
		$option['text-3']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 3', 'publisher' ),
			'current_label' => __( 'Text Listing 3 (1 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'1 Column',
				'NEW',
			),
		);
		$option['text-3-2']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-3-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 3', 'publisher' ),
			'current_label' => __( 'Text Listing 3 (2 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'2 Column',
				'NEW',
			),
		);
		$option['text-3-3']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-3-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 3', 'publisher' ),
			'current_label' => __( 'Text Listing 3 (3 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'3 Column',
				'NEW',
			),
		);
		$option['text-4']    = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 4', 'publisher' ),
			'current_label' => __( 'Text Listing 4 (1 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'1 Column',
				'NEW',
			),
		);
		$option['text-4-2']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-4-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 4', 'publisher' ),
			'current_label' => __( 'Text Listing 4 (2 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'2 Column',
				'NEW',
			),
		);
		$option['text-4-3']  = array(
			'img'           => PUBLISHER_THEME_URI . 'images/options/listing-text-4-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label'         => __( 'Text 4', 'publisher' ),
			'current_label' => __( 'Text Listing 4 (3 column)', 'publisher' ),
			'class'         => 'bf-flip-img-rtl',
			'info'          => array(
				'cat' => array(
					__( 'Text Listing', 'publisher' ),
				),
			),
			'badges'        => array(
				'3 Column',
				'NEW',
			),
		);

		return $option;
	} // publisher_listing_option_list
} // if


if ( ! function_exists( 'publisher_is_valid_listing' ) ) {
	/**
	 * Checks parameter to be a theme valid listing
	 *
	 * @param $listing
	 *
	 * @return bool
	 */
	function publisher_is_valid_listing( $listing ) {

		return array_key_exists( $listing, publisher_listing_option_list() );
	} // publisher_is_valid_listing

} // if


if ( ! function_exists( 'publisher_get_page_listing' ) ) {
	/**
	 * Used to get current page posts listing
	 *
	 * @param WP_Query|null $wp_query
	 *
	 * @return mixed|string
	 */
	function publisher_get_page_listing( $wp_query = null ) {

		if ( is_null( $wp_query ) ) {
			$wp_query = publisher_get_query();
		}

		// Return from cache
		if ( publisher_get_global( 'page-listing' ) ) {
			return publisher_get_global( 'page-listing' );
		}

		$listing = 'default';

		// Homepage listing
		if ( $wp_query->is_home ) {
			$listing = publisher_get_option( 'home_listing' );
		} // Category Layout
		elseif ( $wp_query->get_queried_object_id() > 0 && publisher_is_valid_tax( 'category', $wp_query->get_queried_object() ) ) {

			$listing = bf_get_term_meta( 'page_listing', $wp_query->get_queried_object_id() );

			if ( $listing === 'default' ) {
				$listing = publisher_get_option( 'cat_listing' );
			}
		} // Tag Layout
		elseif ( $wp_query->get_queried_object_id() > 0 && publisher_is_valid_tax( 'tag', $wp_query->get_queried_object() ) ) {
			$listing = bf_get_term_meta( 'page_listing', $wp_query->get_queried_object_id() );

			if ( $listing === 'default' ) {
				$listing = publisher_get_option( 'tag_listing' );
			}
		} // Author Layout
		elseif ( $wp_query->is_author ) {

			if ( $user = bf_get_author_archive_user() ) {
				$listing = bf_get_user_meta( 'page_listing', $user->ID );
			}

			if ( $listing === 'default' ) {
				$listing = publisher_get_option( 'author_listing' );
			}
		} // Search Layout
		elseif ( $wp_query->is_search ) {
			$listing = publisher_get_option( 'search_listing' );
		}

		// check to be valid theme listing or use default
		if ( $listing === 'default' || ! publisher_is_valid_listing( $listing ) ) {
			$listing = publisher_get_option( 'general_listing' );
		}

		switch ( $listing ) {

			case 'grid-1';
				publisher_set_prop( 'listing-class', 'columns-2' );
				break;

			case 'grid-1-3';
				publisher_set_prop( 'listing-class', 'columns-3' );
				$listing = 'grid-1';
				break;

			case 'grid-2';
				publisher_set_prop( 'listing-class', 'columns-2' );
				break;

			case 'grid-2-3';
				publisher_set_prop( 'listing-class', 'columns-3' );
				$listing = 'grid-2';
				break;

			case 'tall-1';
				publisher_set_prop( 'listing-class', 'columns-3' );
				break;

			case 'tall-1-4';
				publisher_set_prop( 'listing-class', 'columns-4' );
				$listing = 'tall-1';
				break;

			case 'tall-2';
				publisher_set_prop( 'listing-class', 'columns-3' );
				break;

			case 'tall-2-4';
				publisher_set_prop( 'listing-class', 'columns-4' );
				$listing = 'tall-2';
				break;

			case 'text-1-2';
				publisher_set_prop( 'listing-class', 'columns-2' );
				$listing = 'text-1';
				break;

			case 'text-1-3';
				publisher_set_prop( 'listing-class', 'columns-3' );
				$listing = 'text-1';
				break;

			case 'text-2-2';
				publisher_set_prop( 'listing-class', 'columns-2' );
				$listing = 'text-2';
				break;

			case 'text-2-3';
				publisher_set_prop( 'listing-class', 'columns-3' );
				$listing = 'text-2';
				break;

			case 'text-3-2';
				publisher_set_prop( 'listing-class', 'columns-2' );
				$listing = 'text-3';
				break;

			case 'text-3-3';
				publisher_set_prop( 'listing-class', 'columns-3' );
				$listing = 'text-3';
				break;

			case 'text-4-2';
				publisher_set_prop( 'listing-class', 'columns-2' );
				$listing = 'text-4';
				break;

			case 'text-4-3';
				publisher_set_prop( 'listing-class', 'columns-3' );
				$listing = 'text-4';
				break;

		}


		// Cache
		publisher_set_global( 'page-listing', 'listing-' . $listing );

		return 'listing-' . $listing;

	} // publisher_get_page_listing
} // if


if ( ! function_exists( 'publisher_get_show_page_listing_excerpt' ) ) {
	/**
	 * Used to get  show excerpt of current page posts listing
	 *
	 * @param WP_Query|null $wp_query
	 *
	 * @return mixed|string
	 */
	function publisher_get_show_page_listing_excerpt( $wp_query = null ) {

		if ( is_null( $wp_query ) ) {
			$wp_query = publisher_get_query();
		}

		// Return from cache
		if ( publisher_get_global( 'page-listing-excerpt' ) ) {
			return publisher_get_global( 'page-listing-excerpt' );
		}

		$excerpt = 'default';

		// Homepage listing
		if ( $wp_query->is_home ) {
			$excerpt = publisher_get_option( 'home_listing_excerpt' );
		} // Category Layout
		elseif ( $wp_query->get_queried_object_id() > 0 && publisher_is_valid_tax( 'category', $wp_query->get_queried_object() ) ) {

			$excerpt = bf_get_term_meta( 'page_listing_excerpt', $wp_query->get_queried_object_id() );

			if ( $excerpt === 'default' ) {
				$excerpt = publisher_get_option( 'cat_listing_excerpt' );
			}
		} // Tag Layout
		elseif ( $wp_query->get_queried_object_id() > 0 && publisher_is_valid_tax( 'tag', $wp_query->get_queried_object() ) ) {
			$excerpt = bf_get_term_meta( 'page_listing_excerpt', $wp_query->get_queried_object_id() );

			if ( $excerpt === 'default' ) {
				$excerpt = publisher_get_option( 'tag_listing_excerpt' );
			}
		} // Author Layout
		elseif ( $wp_query->is_author ) {
			if ( $user = bf_get_author_archive_user() ) {
				$excerpt = bf_get_user_meta( 'page_listing_excerpt', $user->ID );
			}

			if ( $excerpt === 'default' ) {
				$excerpt = publisher_get_option( 'author_listing_excerpt' );
			}
		} // Search Layout
		elseif ( $wp_query->is_search ) {
			$excerpt = publisher_get_option( 'search_listing_excerpt' );
		}

		// check to be valid theme listing or use default
		if ( $excerpt === 'default' || is_null( $excerpt ) ) {
			$excerpt = publisher_get_option( 'general_listing_excerpt' );
		}

		if ( $excerpt === 'hide' ) {
			$excerpt = false;
		} else {
			$excerpt = true;
		}

		// Cache
		publisher_set_global( 'page-listing-excerpt', $excerpt );

		return $excerpt;

	} // publisher_get_page_listing
} // if


if ( ! function_exists( 'publisher_format_icon' ) ) {
	/**
	 * Handy function used to get post format badge
	 *
	 * @param   bool $echo Echo or return
	 *
	 * @return string
	 */
	function publisher_format_icon( $echo = true ) {

		$output = '';

		if ( post_type_supports( get_post_type(), 'post-formats' ) ) {

			$format = publisher_get_post_format();

			if ( $format ) {

				switch ( $format ) {

					case 'video':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-play"></i></span>';
						break;

					case 'aside':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-pencil"></i></span>';
						break;

					case 'quote':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-quote-left"></i></span>';
						break;

					case 'gallery':
					case 'image':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-camera"></i></span>';
						break;

					case 'status':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-refresh"></i></span>';
						break;

					case 'audio':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-music"></i></span>';
						break;

					case 'chat':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-coffee"></i></span>';
						break;

					case 'link':
						$output = '<span class="format-icon format-' . $format . '"><i class="fa fa-link"></i></span>';
						break;

				}

			}

		}

		if ( $echo ) {
			echo $output; // escaped before
		} else {
			return $output;
		}

	} // publisher_format_badge_code
} // if
