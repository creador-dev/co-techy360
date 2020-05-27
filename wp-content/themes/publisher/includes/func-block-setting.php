<?php


if ( ! function_exists( 'publisher_improve_block_atts_for_size' ) ) {
	/**
	 * Calculate and improve attributes of blocks for making them in-column responsive
	 *
	 * @param        $atts
	 * @param string $block_type
	 *
	 * @return mixed
	 */
	function publisher_improve_block_atts_for_size( $atts, $block_type = 'columns' ) {

		switch ( $block_type ) {

			// Base columns grid
			case 'mg-3':
			case 'columns':

				$size = publisher_get_block_size();

				$_check = array(
					2 => array(
						4 => 1,
						3 => 1,
						2 => 1,
						1 => 1,
					),
					3 => array(
						6 => 2,
						5 => 2,
						4 => 1,
						3 => 1,
						2 => 1,
						1 => 1,
					),
					4 => array(
						10 => 4,
						9  => 3,
						8  => 3,
						7  => 3,
						6  => 2,
						5  => 2,
						4  => 1,
						3  => 1,
						2  => 1,
						1  => 1,
					),
				);

				if ( isset( $_check[ $atts['columns'] ][ $size ] ) ) {
					$atts['columns'] = $_check[ $atts['columns'] ][ $size ];
				}
				break;


			// small columns used in thumbnail listing 2
			case 'small-columns':

				$size = publisher_get_block_size();

				$_check = array(
					2 => array(
						4 => 2,
						3 => 2,
						2 => 2,
						1 => 2,
					),
					3 => array(
						6 => 3,
						5 => 3,
						4 => 2,
						3 => 2,
						2 => 2,
						1 => 2,
					),
					4 => array(
						9 => 4,
						8 => 4,
						7 => 4,
						6 => 3,
						5 => 3,
						4 => 2,
						3 => 2,
						2 => 2,
						1 => 2,
					),
					5 => array(
						10 => 4,
						9  => 4,
						8  => 4,
						7  => 4,
						6  => 3,
						5  => 3,
						4  => 2,
						3  => 2,
						2  => 2,
						1  => 2,
					),
				);

				if ( isset( $_check[ $atts['columns'] ][ $size ] ) ) {
					$atts['columns'] = $_check[ $atts['columns'] ][ $size ];
				}

				break;


			case 'mix-2';
			case 'mix-1';

				$size = publisher_get_block_size();

				if ( $size <= 6 ) {
					$atts['mix-layout'] = 'l-1-col';
				}
				break;

			case 'mix-1-4';

				$size = publisher_get_block_size();

				if ( $size <= 4 ) {
					$atts['mix-layout'] = 'l-1-col';
				}
				break;

			case 'mix-4';
			case 'mix-3';

				$size = publisher_get_block_size();

				if ( $size <= 5 ) {
					$atts['mix-layout'] = 'l-1-col';
				}
				break;

			case 'mg-9';
			case 'mg-2';
			case 'mg-1';

				$size = publisher_get_block_size();

				$_check = array(
					10 => 'l-1',
					9  => 'l-1',
					8  => 'l-2',
					7  => 'l-2',
					6  => 'l-3',
					5  => 'l-4',
					4  => 'l-5',
					3  => 'l-5',
					2  => 'l-5',
					1  => 'l-5',
				);

				if ( isset( $_check[ $size ] ) ) {
					$atts['mg-layout'] = $_check[ $size ];
				}

				break;

			case 'mg-4';

				$size = publisher_get_block_size( 50 );

				$_check = array(
					10 => 'l-1',
					9  => 'l-1',
					8  => 'l-2',
					7  => 'l-2',
					6  => 'l-3',
					5  => 'l-4',
					4  => 'l-5',
					3  => 'l-5',
					2  => 'l-5',
					1  => 'l-5',
				);

				if ( isset( $_check[ $size ] ) ) {
					$atts['mg-layout'] = $_check[ $size ];
				}

				$size = publisher_get_block_size( 100 );

				$_check = array(
					2 => array(
						4 => 1,
						3 => 1,
						2 => 1,
						1 => 1,
					),
					3 => array(
						6 => 2,
						5 => 2,
						4 => 1,
						3 => 1,
						2 => 1,
						1 => 1,
					),
					4 => array(
						10 => 4,
						9  => 3,
						8  => 3,
						7  => 3,
						6  => 2,
						5  => 2,
						4  => 1,
						3  => 1,
						2  => 1,
						1  => 1,
					),
				);

				if ( isset( $_check[ $atts['columns'] ][ $size ] ) ) {
					$atts['columns'] = $_check[ $atts['columns'] ][ $size ];
				}

				break;


			case 'mg-5';

				$size = publisher_get_block_size( 50 );

				if ( $size > 750 ) {
					$atts['mg-layout'] = 'l-1';
				} else {
					$atts['mg-layout'] = 'l-2';
				}

				break;

			case 'mg-10';
			case 'mg-8';

				$size = publisher_get_block_size();

				$_check = array(
					10 => 'l-1',
					9  => 'l-1',
					8  => 'l-2',
					7  => 'l-2',
					6  => 'l-3',
					5  => 'l-4',
					4  => 'l-4',
					3  => 'l-4',
					2  => 'l-4',
					1  => 'l-4',
				);

				if ( isset( $_check[ $size ] ) ) {
					$atts['mg-layout'] = $_check[ $size ];
				}

				break;

			case 'slider-1';

				$size = publisher_get_block_size();

				$_check = array(
					8 => 'l-1',
					7 => 'l-1',
					6 => 'l-1',
					5 => 'l-1',
					4 => 'l-2',
					3 => 'l-2',
					2 => 'l-2',
					1 => 'l-2',
				);

				if ( isset( $_check[ $size ] ) ) {
					$atts['mg-layout'] = $_check[ $size ];
				}

				break;

			case 'slider-2';

				$size = publisher_get_block_size();

				$_check = array(
					8 => 'l-1',
					7 => 'l-1',
					6 => 'l-1',
					5 => 'l-2',
					4 => 'l-2',
					3 => 'l-3',
					2 => 'l-3',
					1 => 'l-3',
				);

				if ( isset( $_check[ $size ] ) ) {
					$atts['mg-layout'] = $_check[ $size ];
				}

				break;

			case 'slider-3';

				$size = publisher_get_block_size();

				$_check = array(
					8 => 'l-1',
					7 => 'l-1',
					6 => 'l-1',
					5 => 'l-2',
					4 => 'l-3',
					3 => 'l-3',
					2 => 'l-3',
					1 => 'l-3',
				);

				if ( isset( $_check[ $size ] ) ) {
					$atts['mg-layout'] = $_check[ $size ];
				}

				break;

		}

		return $atts;
	}
}


add_filter( 'vc_shortcodes_css_class', 'publisher_vc_block_class', 100, 2 );

if ( ! function_exists( 'publisher_vc_block_class' ) ) {
	/**
	 * Handy function to customize VC blocks classes
	 *
	 * @return string
	 */
	function publisher_vc_block_class( $class = '', $base = '', $atts = array() ) {

		$_check = array(
			'vc_gmaps'              => '',
			'vc_column_text'        => '',
			'vc_toggle'             => '',
			'vc_gallery'            => '',
			'vc_images_carousel'    => '',
			'vc_posts_slider'       => '',
			'vc_progress_bar'       => '',
			'vc_pie'                => '',
			'vc_round_chart'        => '',
			'vc_line_chart'         => '',
			'vc_media_grid'         => '',
			'vc_masonry_media_grid' => '',
		);

		if ( isset( $_check[ $base ] ) ) {
			$class .= ' bs-vc-block';
		}

		return $class;
	}// publisher_vc_block_class
}


if ( ! function_exists( 'publisher_block_create_query_args' ) ) {
	/**
	 * Handy function to create master listing query args
	 *
	 * todo remove this!
	 *
	 * @param $atts
	 *
	 * @return array
	 */
	function publisher_block_create_query_args( &$atts ) {

		$args = array(
			'post_type' => array( 'post' ),
			'order'     => $atts['order'],
			'orderby'   => $atts['order_by'],
		);

		// Category
		if ( ! empty( $atts['category'] ) ) {
			$args['cat'] = $atts['category'];
		}

		// Tag
		if ( $atts['tag'] ) {
			$args['tag__and'] = explode( ',', $atts['tag'] );
		}

		// Post id filters
		if ( ! empty( $atts['post_ids'] ) ) {

			$post_id_array = explode( ',', $atts['post_ids'] );
			$post_in       = array();
			$post_not_in   = array();

			// Split ids into post_in and post_not_in
			foreach ( $post_id_array as $post_id ) {

				$post_id = trim( $post_id );

				if ( is_numeric( $post_id ) ) {
					if ( intval( $post_id ) < 0 ) {
						$post_not_in[] = str_replace( '-', '', $post_id );
					} else {
						$post_in[] = $post_id;
					}
				}
			}

			if ( ! empty( $post_not_in ) ) {
				$wp_query_args['post__not_in'] = $post_not_in;
			}

			if ( ! empty( $post_in ) ) {
				$args['post__in'] = $post_in;
				$args['orderby']  = 'post__in';
			}
		}


		// Custom post types
		if ( $atts['post_type'] ) {
			$args['post_type'] = explode( ',', $atts['post_type'] );
		}

		if ( ! empty( $atts['count'] ) && intval( $atts['count'] ) > 0 ) {
			$args['posts_per_page'] = $atts['count'];
		} else {
			switch ( $atts['style'] ) {

				//
				// Grid Listing
				//
				case 'listing-grid':

					switch ( $atts['columns'] ) {

						case 1:
							$args['posts_per_page'] = 4;
							break;

						case 2:
							$args['posts_per_page'] = 4;
							break;

						case 3:
							$args['posts_per_page'] = 6;
							break;

						case 4:
							$args['posts_per_page'] = 8;
							break;

						default:
							$args['posts_per_page'] = 6;
							break;

					}
					break;

				//
				// Thumbnail Listing 1
				//
				case 'listing-thumbnail-1':
					switch ( $atts['columns'] ) {

						case 1:
							$args['posts_per_page'] = 4;
							break;

						case 2:
							$args['posts_per_page'] = 6;
							break;

						case 3:
							$args['posts_per_page'] = 9;
							break;

						case 4:
							$args['posts_per_page'] = 12;
							break;

						default:
							$args['posts_per_page'] = 6;
							break;
					}
					break;

				//
				// Thumbnail Listing 2
				//
				case 'listing-thumbnail-2':
					$args['posts_per_page'] = 4;
					break;


				//
				// Blog Listing
				//
				case 'listing-blog':
					switch ( $atts['columns'] ) {

						case 1:
							$args['posts_per_page'] = 4;
							break;

						case 2:
							$args['posts_per_page'] = 6;
							break;

						case 3:
							$args['posts_per_page'] = 9;
							break;

						case 4:
							$args['posts_per_page'] = 12;
							break;


						default:
							$args['posts_per_page'] = 6;
							break;
					}
					break;


				//
				// mix Listing
				//
				case 'listing-mix-1-1':
					$args['posts_per_page'] = 5;
					break;
				case 'listing-mix-1-2':
					$args['posts_per_page'] = 5;
					break;
				case 'listing-mix-1-3':
					$args['posts_per_page'] = 7;
					break;
				case 'listing-mix-2-1':
					$args['posts_per_page'] = 8;
					break;
				case 'listing-mix-2-2':
					$args['posts_per_page'] = 10;
					break;
				case 'listing-mix-3-1':
					$args['posts_per_page'] = 4;
					break;
				case 'listing-mix-3-2':
					$args['posts_per_page'] = 5;
					break;
				case 'listing-mix-3-3':
					$args['posts_per_page'] = 5;
					break;


				//
				// Text Listing 1
				//
				case 'listing-text-1':
					switch ( $atts['columns'] ) {

						case 1:
							$args['posts_per_page'] = 3;
							break;

						case 2:
							$args['posts_per_page'] = 6;
							break;

						case 3:
							$args['posts_per_page'] = 9;
							break;

						case 4:
							$args['posts_per_page'] = 12;
							break;

						default:
							$args['posts_per_page'] = 3;
							break;
					}
					break;

				//
				// Text Listing 2
				//
				case 'listing-text-2':
					switch ( $atts['columns'] ) {

						case 1:
							$args['posts_per_page'] = 4;
							break;

						case 2:
							$args['posts_per_page'] = 8;
							break;

						case 3:
							$args['posts_per_page'] = 12;
							break;

						case 4:
							$args['posts_per_page'] = 16;
							break;

						default:
							$args['posts_per_page'] = 4;
							break;
					}
					break;


				//
				// Modern Grid Listing
				//
				case 'modern-grid-listing-1':
					$args['posts_per_page'] = 4;
					break;

				case 'modern-grid-listing-2':
					$args['posts_per_page'] = 5;
					break;

				case 'modern-grid-listing-3':
					$args['posts_per_page'] = 3;
					break;


				default:
					$args['posts_per_page'] = 6;
			}
		}


		/*

		compatibility for better reviews

		if( $atts['order_by'] === 'reviews' ){
			$args['orderby'] = 'date';
			$args['meta_key'] = '_bs_review_enabled';
			$args['meta_value'] = '1';
		}

		*/

		// Order by views count
		if ( $atts['order_by'] === 'views' ) {
			$args['meta_key'] = 'better-views-count';
			$args['orderby']  = 'meta_value_num';
		}

		// Time filter
		if ( $atts['time_filter'] != '' ) {
			$args['date_query'] = publisher_get_time_filter_query( $atts['time_filter'] );
		}

		return $args;
	}
}


if ( ! function_exists( 'publisher_block_create_tabs' ) ) {
	/**
	 * Handy function to create master listing tabs
	 *
	 * @param $atts
	 *
	 * todo check time filter and order by
	 *
	 * @return array
	 */
	function publisher_block_create_tabs( &$atts ) {

		// 1. collect all tabs array
		// 2. chose to be tab or single column
		// 3. print it
		$tabs = array();

		$active = true; // flag to identify the main tab

		$main_cat = false;

		//
		// First tab ( main )
		//
		if ( ! empty( $atts['query-main-term'] ) ) {
			$main_cat = $atts['query-main-term'];
		} elseif ( ! empty( $atts['category'] ) ) {
			$main_cat = $atts['category'];
		}

		if ( $main_cat ) {

			$cat = get_category( $main_cat );

			// is valid category
			if ( $cat && ! is_wp_error( $cat ) ) {

				if ( empty( $atts['title'] ) ) {
					$atts['title'] = $cat->name;
				}

				// Icon
				if ( ! empty( $atts['icon'] ) ) {
					$icon = bf_get_icon_tag( $atts['icon'] ) . ' ';
				} else {
					$icon = '';
				}

				$tabs[] = array(
					'title'   => $atts['title'],
					'link'    => ! empty( $atts['title_link'] ) ? $atts['title_link'] : get_category_link( $cat ),
					'type'    => 'category',
					'term_id' => $main_cat,
					'id'      => 'tab-' . mt_rand(),
					'icon'    => $icon,
					'class'   => 'main-term-' . $main_cat,
					'active'  => $active,
				);

				$active = false; // only one active
			}

		} elseif ( ! empty( $atts['tag'] ) ) {

			$tags = explode( ',', $atts['tag'] );

			$tag = false;

			foreach ( $tags as $_tag ) {
				$tag = get_tag( $_tag );
				if ( $tag && ! is_wp_error( $tag ) ) {
					break;
				}
			}

			if ( $tag && ! is_wp_error( $tag ) ) {

				if ( empty( $atts['title'] ) ) {
					$atts['title'] = $tag->name;
				}

				// Icon
				if ( ! empty( $atts['icon'] ) ) {
					$icon = bf_get_icon_tag( $atts['icon'] ) . ' ';
				} else {
					$icon = '';
				}

				$tabs[] = array(
					'title'   => $atts['title'],
					'link'    => ! empty( $atts['title_link'] ) ? $atts['title_link'] : get_tag_link( $tag->term_id ),
					'type'    => 'tag',
					'term_id' => $tag->term_id,
					'id'      => 'tab-' . mt_rand(),
					'icon'    => $icon,
					'class'   => 'main-term-none',
					'active'  => $active,
				);

				$active = false; // only one active

			}
		} elseif ( ! empty( $atts['taxonomy'] ) ) {

			$tax = explode( ':', current( explode( ',', $atts['taxonomy'] ) ) );

			if ( bf_count( $tax ) >= 2 ) {
				$tax_term = get_term( $tax[1], $tax[0] );

				if ( ! is_wp_error( $tax_term ) ) {

					if ( empty( $atts['title'] ) ) {
						$atts['title'] = $tax_term->name;
					}

					// Icon
					if ( ! empty( $atts['icon'] ) ) {
						$icon = bf_get_icon_tag( $atts['icon'] ) . ' ';
					} else {
						$icon = '';
					}

					$tabs[] = array(
						'title'   => $atts['title'],
						'link'    => ! empty( $atts['title_link'] ) ? $atts['title_link'] : get_tag_link( $tax_term ),
						'type'    => 'taxonomy',
						'term_id' => $tax_term->term_id,
						'id'      => 'tab-' . mt_rand(),
						'icon'    => $icon,
						'class'   => 'main-term-none',
						'active'  => $active,
					);

					$active = false; // only one active
				}
			}
		}

		// Default tab for fallback
		if ( $active ) {
			$tabs[] = publisher_block_create_tabs_default_tab( $atts, $active );
			$active = false;
		}

		// not return other tabs if they will not shown!
		if ( ( ! empty( $atts['hide_title'] ) && $atts['hide_title'] ) ||
		     ( ! empty( $atts['show_title'] ) && ! $atts['show_title'] )
		) {
			return $tabs;
		}

		//
		// Other Tabs
		//
		if ( isset( $atts['tabs'] ) && ! empty( $atts['tabs'] ) ) {

			$terms = array();
			switch ( $atts['tabs'] ) {

				//
				// Category tabs
				//
				case 'cat_filter':

					if ( empty( $atts['tabs_cat_filter'] ) ) {
						break;
					} elseif ( is_string( $atts['tabs_cat_filter'] ) ) {
						$atts['tabs_cat_filter'] = explode( ',', $atts['tabs_cat_filter'] );
					}

					$terms = get_categories( array( 'include' => $atts['tabs_cat_filter'] ) );

					break;

				case 'sub_cat_filter':

					if ( $main_cat ) {
						$terms = get_categories( array( 'child_of' => $main_cat, 'number' => 20 ) );
					}

					break;

				case 'tax_filter':

					if ( ! empty( $atts['tabs_tax_filter'] ) ) {

						if ( preg_match_all( '/ (\w+) \s* : \s*  ([^,]+)/isx', $atts['tabs_tax_filter'], $matches ) ) {

							$_all_terms = array();
							foreach ( $matches[1] as $idx => $taxonomy ) {
								$term_id = $matches[2][ $idx ];
								$section = $term_id[0] === '-' ? 'exclude' : 'include';

								$_all_terms[ $taxonomy ][ $section ][] = absint( $term_id );
							}

							foreach ( $_all_terms as $taxonomy => $_terms ) {

								$terms_id_include = isset( $_terms['include'] ) ? $_terms['include'] : array();
								$terms_id_exclude = isset( $_terms['exclude'] ) ? $_terms['exclude'] : array();


								$terms = array_merge(
									$terms,
									get_terms(
										array(
											'include' => bf_get_term_childs( $terms_id_include, $terms_id_exclude, $taxonomy )
										)
									)
								);
							}
						}

					}

					break;
			}

			foreach ( $terms as $term ) {

				$tabs[] = array(
					'title'   => $term->name,
					'link'    => get_term_link( $term, $term->taxonomy ),
					'type'    => $term->taxonomy,
					'term_id' => $term->term_id,
					'id'      => 'tab-' . mt_rand(),
					'icon'    => '',
					'class'   => 'main-term-' . $term->term_id,
					'active'  => $active,
				);

				// only one active
				if ( $active ) {
					$active = false;
				}
			}

		}

		return $tabs;
	} // publisher_block_create_tabs
}

if ( ! function_exists( 'publisher_block_create_tabs_default_tab' ) ) {
	/**
	 * Handy internal function to get default tab from atts
	 *
	 * @param      $atts
	 * @param bool $active
	 *
	 * @return array
	 */
	function publisher_block_create_tabs_default_tab( &$atts, $active = true ) {

		if ( empty( $atts['title'] ) ) {
			$atts['title'] = publisher_translation_get( 'recent_posts' );
		}

		// Icon
		if ( ! empty( $atts['icon'] ) ) {
			$icon = bf_get_icon_tag( $atts['icon'] ) . ' ';
		} else {
			$icon = '';
		}

		return array(
			'title'   => $atts['title'],
			'link'    => ! empty( $atts['title_link'] ) ? $atts['title_link'] : '',
			'type'    => 'custom',
			'term_id' => '',
			'id'      => 'tab-' . mt_rand(),
			'icon'    => $icon,
			'class'   => 'main-term-none',
			'active'  => $active,
		);

	}
}
