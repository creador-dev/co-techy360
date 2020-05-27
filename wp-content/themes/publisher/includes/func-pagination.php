<?php


if ( ! function_exists( 'publisher_pagination_option_list' ) ) {
	/**
	 * Panels archives pagination field options
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_pagination_option_list( $default = false ) {

		$option = array();

		if ( $default ) {
			$option['default'] = __( '-- Default pagination --', 'publisher' );
		}

		// simple paginations
		$option['numbered'] = __( 'Numbered pagination buttons', 'publisher' );
		$option['links']    = __( 'Newer & Older buttons', 'publisher' );

		// advanced ajax pagination
		$option['ajax_next_prev']         = __( 'Ajax - Next Prev buttons', 'publisher' );
		$option['ajax_more_btn']          = __( 'Ajax - Load more button', 'publisher' );
		$option['ajax_more_btn_infinity'] = __( 'Ajax - Load more button + Infinity loading', 'publisher' );
		$option['ajax_infinity']          = __( 'Ajax - Infinity loading', 'publisher' );
		$option['']                       = __( 'Disabled', 'publisher' );

		return $option;

	} // publisher_pagination_option_list
} // if


if ( ! function_exists( 'publisher_is_valid_pagination' ) ) {
	/**
	 * Checks parameter to be a theme valid pagination
	 *
	 * @param $pagination
	 *
	 * @return bool
	 */
	function publisher_is_valid_pagination( $pagination ) {

		return array_key_exists( $pagination, publisher_pagination_option_list() );
	} // publisher_is_valid_pagination
} // if


if ( ! function_exists( 'publisher_get_pagination_style' ) ) {
	/**
	 * Used to get current page pagination style
	 */
	function publisher_get_pagination_style() {

		// Return from cache
		if ( publisher_get_global( 'page-pagination' ) ) {
			return publisher_get_global( 'page-pagination' );
		}

		$pagination = 'default';

		$paged = bf_get_query_var_paged();

		// Homepage pagination
		if ( is_home() || ( ( 'page' === get_option( 'show_on_front' ) ) && is_front_page() && bf_get_query_var_paged( 1 ) > 1 ) ) {
			$pagination = publisher_get_option( 'home_pagination_type' );
		} // Categories pagination
		elseif ( publisher_is_valid_tax() ) {

			$pagination = bf_get_term_meta( 'term_pagination_type' );

			if ( $pagination === 'default' ) {
				$pagination = publisher_get_option( 'cat_pagination_type' );
			}

		} // Tags pagination
		elseif ( publisher_is_valid_tax( 'tag' ) ) {

			$pagination = bf_get_term_meta( 'term_pagination_type' );

			if ( $pagination === 'default' ) {
				$pagination = publisher_get_option( 'tag_pagination_type' );
			}

		} // Author pagination
		elseif ( is_author() ) {
			$pagination = bf_get_user_meta( 'author_pagination_type' );

			if ( $pagination === 'default' ) {
				$pagination = publisher_get_option( 'author_pagination_type' );
			}
		} // Search page pagination
		elseif ( is_search() ) {
			$pagination = publisher_get_option( 'search_pagination_type' );
		}

		// fix for when request is from robots,
		// e.g. user agent: 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)'
		// fix for when paged and is ajax pagination then it should show simple numbered pagination
		$ajax_pagins = array(
			'ajax_infinity'          => '',
			'ajax_more_btn'          => '',
			'ajax_next_prev'         => '',
			'ajax_more_btn_infinity' => '',
		);

		if (
			( $paged > 1 && isset( $ajax_pagins[ $pagination ] ) ) ||
			( bf_is_crawler() && isset( $ajax_pagins[ $pagination ] ) )
		) {
			$pagination = 'numbered';
		}

		unset( $ajax_pagins ); // clear memory

		// get default pagination
		if ( $pagination === 'default' ) {
			$pagination = publisher_get_option( 'pagination_type' );
		}

		// check to be valid theme pagination
		if ( ! publisher_is_valid_pagination( $pagination ) ) {
			$pagination = key( publisher_pagination_option_list() );
		}

		// Cache
		publisher_set_global( 'page-pagination', $pagination );

		return $pagination;

	} // publisher_get_pagination_style
}


if ( ! function_exists( 'publisher_get_links_pagination' ) ) {
	/**
	 * @param array $options
	 *
	 * @return string
	 */
	function publisher_get_links_pagination( $options = array() ) {

		// Default Options
		$default_options = array(
			'echo' => true,
		);

		// Texts with RTL support
		if ( is_rtl() ) {
			$default_options['older-text'] = '<i class="fa fa-angle-double-right"></i> ' . publisher_translation_get( 'pagination_newer' );
			$default_options['next-text']  = publisher_translation_get( 'pagination_older' ) . ' <i class="fa fa-angle-double-left"></i>';
		} else {
			$default_options['next-text']  = '<i class="fa fa-angle-double-left"></i> ' . publisher_translation_get( 'pagination_older' );
			$default_options['older-text'] = publisher_translation_get( 'pagination_newer' ) . ' <i class="fa fa-angle-double-right"></i>';
		}

		// Merge default and passed options
		$options = bf_merge_args( $options, $default_options );

		if ( ! $options['echo'] ) {
			ob_start();
		}

		// fix category posts link because of offset
		if ( publisher_is_valid_tax() ) {
			$term_id       = get_queried_object()->term_id;
			$count         = bf_get_term_posts_count( $term_id, array( 'include_childs' => true ) );
			$limit         = get_option( 'posts_per_page' );
			$slider_config = publisher_main_slider_config();

			// Custom count per category
			if ( bf_get_term_meta( 'term_posts_count', get_queried_object()->term_id, '' ) != '' ) {
				$limit = bf_get_term_meta( 'term_posts_count', get_queried_object()->term_id, '' );
			} // Custom count for all categories
			elseif ( publisher_get_option( 'cat_posts_count' ) != '' && intval( publisher_get_option( 'cat_posts_count' ) ) > 0 ) {
				$limit = publisher_get_option( 'cat_posts_count' );
			}

			if ( $slider_config['show'] && $slider_config['type'] === 'custom-blocks' ) {
				$max_items = ceil( ( $count - intval( $slider_config['posts'] ) ) / $limit );
			} else {
				$max_items = publisher_get_query()->max_num_pages;
			}

		} else {
			$max_items = publisher_get_query()->max_num_pages;
		}

		$paginated_front_page = ( 'page' === get_option( 'show_on_front' ) ) && is_front_page() && bf_get_query_var_paged( 1 ) > 1;

		// Change global $paged value to fix next_posts_link issue in static paginated homepages
		if ( $paginated_front_page ) {
			global $paged;
			$paged_c = $paged;
			$paged   = bf_get_query_var_paged();
		}

		if ( $max_items > 1 ) {

			add_filter( 'next_posts_link_attributes', 'publisher_filter_pagination_link_attr' );
			add_filter( 'previous_posts_link_attributes', 'publisher_filter_pagination_link_attr' );

			?>
			<div <?php publisher_attr( 'pagination', 'bs-links-pagination clearfix' ) ?>>
				<div class="older"><?php next_posts_link( $options['next-text'], $max_items ); ?></div>
				<div class="newer"><?php previous_posts_link( $options['older-text'] ); ?></div>
			</div>
			<?php

			remove_filter( 'next_posts_link_attributes', 'publisher_filter_pagination_link_attr' );
			remove_filter( 'previous_posts_link_attributes', 'publisher_filter_pagination_link_attr' );
		}

		// return bac the global $paged value
		if ( $paginated_front_page ) {
			$paged = $paged_c;
		}

		if ( ! $options['echo'] ) {
			return ob_get_clean();
		}

	} // publisher_get_links_pagination
} // if


if ( ! function_exists( 'publisher_filter_pagination_link_attr' ) ) {
	/**
	 * Adds rel attributed to pagintion next and previous links
	 *
	 * @hooked next_posts_link_attributes
	 * @hooked previous_posts_link_attributes
	 *
	 * @param $attr
	 *
	 * @return string
	 */
	function publisher_filter_pagination_link_attr( $attr ) {

		if ( current_filter() === 'next_posts_link_attributes' ) {
			$attr .= ' rel="next"';
		} else {
			$attr .= ' rel="prev"';
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_get_pagination' ) ) {
	/**
	 * BetterTemplate Custom Pagination
	 *
	 * @param array $options extend options for paginate_links()
	 *
	 * @return array|mixed|string
	 *
	 * @see paginate_links()
	 */
	function publisher_get_pagination( $options = array() ) {

		global $wp_rewrite;

		// Default Options
		$default_options = array(
			'echo'            => true,
			'use-wp_pagenavi' => true,
			'users-per-page'  => 6,
		);

		// Prepare query
		if ( publisher_get_query() != null ) {
			$default_options['query'] = publisher_get_query();
		} else {
			global $wp_query;
			$default_options['query'] = $wp_query;
		}


		// Merge default and passed options
		$options = bf_merge_args( $options, $default_options );


		// Texts with RTL support
		if ( ! isset( $options['next-text'] ) && ! isset( $options['prev-text'] ) ) {
			if ( is_rtl() ) {
				$options['next-text'] = publisher_translation_get( 'pagination_next' ) . ' <i class="fa fa-angle-left"></i>';
				$options['prev-text'] = '<i class="fa fa-angle-right"></i> ' . publisher_translation_get( 'pagination_prev' );
			} else {
				$options['next-text'] = publisher_translation_get( 'pagination_next' ) . ' <i class="fa fa-angle-right"></i>';
				$options['prev-text'] = ' <i class="fa fa-angle-left"></i> ' . publisher_translation_get( 'pagination_prev' );
			}
		}


		// WP-PageNavi Plugin
		if ( $options['use-wp_pagenavi'] && function_exists( 'wp_pagenavi' ) && ! is_a( $options['query'], 'WP_User_Query' ) ) {

			ob_start();

			// Use WP-PageNavi plugin to generate pagination
			wp_pagenavi(
				array(
					'query' => $options['query']
				)
			);

			$pagination = ob_get_clean();

		} // Custom Pagination With WP Functionality
		else {

			$paged = $options['query']->get( 'paged', '' ) ? $options['query']->get( 'paged', '' ) : ( $options['query']->get( 'page', '' ) ? $options['query']->get( 'page', '' ) : 1 );

			if ( is_a( $options['query'], 'WP_User_Query' ) ) {

				$offset = $options['users-per-page'] * ( $paged - 1 );

				$total_pages = ceil( $options['query']->total_users / $options['users-per-page'] );

			} else {
				$total_pages = $options['query']->max_num_pages;

				// fix category posts link because of offset
				if ( publisher_is_valid_tax() ) {
					$term_id = get_queried_object()->term_id;
					$count   = bf_get_term_posts_count( $term_id, array( 'include_childs' => true ) );

					$limit         = get_option( 'posts_per_page' );
					$slider_config = publisher_main_slider_config( array(
							'type'    => 'term',
							'term_id' => $term_id
						)
					);

					// Custom count per category
					if ( bf_get_term_meta( 'term_posts_count', $term_id, '' ) != '' ) {
						$limit = bf_get_term_meta( 'term_posts_count', $term_id, '' );
					} // Custom count for all categories
					elseif ( publisher_get_option( 'cat_posts_count' ) != '' && intval( publisher_get_option( 'cat_posts_count' ) ) > 0 ) {
						$limit = publisher_get_option( 'cat_posts_count' );
					}

					if ( $slider_config['show'] && $slider_config['type'] === 'custom-blocks' ) {
						$total_pages = ceil( ( $count - intval( $slider_config['posts'] ) ) / $limit );
					}
				}

			}

			if ( $total_pages <= 1 ) {
				return '';
			}

			$args = array(
				'base'      => add_query_arg( 'paged', '%#%' ),
				'current'   => max( 1, $paged ),
				'total'     => $total_pages,
				'next_text' => $options['next-text'],
				'prev_text' => $options['prev-text']
			);

			if ( is_a( $options['query'], 'WP_User_Query' ) ) {
				$args['offset'] = $offset;
			}

			if ( $wp_rewrite->using_permalinks() ) {
				$big          = 999999999;
				$args['base'] = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
			}

			if ( is_search() ) {
				$args['add_args'] = array(
					's' => urlencode( get_query_var( 's' ) )
				);
			}

			// Fix: paginate_links use max_num_pages property to detect max page number
			// and it dosen't consider query offset so it make last pages 404
			if ( $options['query'] && ( $total = bf_get_wp_query_total_pages( $options['query'] ) ) ) {
				$args['total'] = $total;
			}

			$pagination = paginate_links( array_merge( $args, $options ) );

			$pagination = preg_replace( '/&#038;paged=1(\'|")/', '\\1', trim( $pagination ) );

		}

		$pagination = '<div ' . publisher_get_attr( 'pagination', 'bs-numbered-pagination' ) . '>' . $pagination . '</div>';

		if ( $options['echo'] ) {
			echo $pagination; // escaped before
		} else {
			return $pagination;
		}

	} // publisher_get_pagination
} // if


add_filter( 'publisher/archive/before-loop', 'publisher_archive_show_pagination' );
add_filter( 'publisher/archive/after-loop', 'publisher_archive_show_pagination' );
if ( ! function_exists( 'publisher_archive_show_pagination' ) ) {
	/**
	 * used to add pagination
	 *
	 * note: do not call this manually. it should be fire with following callbacks:
	 * 1. publisher/archive/before-loop
	 * 2. publisher/archive/after-loop
	 */
	function publisher_archive_show_pagination() {

		$wp_query = publisher_get_query();

		$pagination = publisher_get_pagination_style(); // determine current page pagination (with inner cache)

		$filter = current_filter();

		// Show/Hide excerpt
		if ( $filter === 'publisher/archive/before-loop' ) {

			$_check = array(
				'listing-mix-4-1' => '',
				'listing-mix-4-2' => '',
				'listing-mix-4-3' => '',
				'listing-mix-4-4' => '',
				'listing-mix-4-5' => '',
				'listing-mix-4-6' => '',
				'listing-mix-4-7' => '',
				'listing-mix-4-8' => ''
			);

			if ( isset( $_check[ publisher_get_page_listing() ] ) ) {
				publisher_set_prop( 'show-excerpt-small', publisher_get_show_page_listing_excerpt() );
				publisher_set_prop( 'show-excerpt-big', publisher_get_show_page_listing_excerpt() );
			} else {
				publisher_set_prop( 'show-excerpt', publisher_get_show_page_listing_excerpt() );
			}

		}

		// pagination
		switch ( true ) {

			case $pagination === 'numbered' && $filter === 'publisher/archive/before-loop':
				return;
				break;

			case $pagination === 'numbered' && $filter === 'publisher/archive/after-loop':
				publisher_get_pagination();

				return;
				break;

			case $pagination === 'links' && $filter === 'publisher/archive/before-loop':
				return;
				break;

			case $pagination === 'links' && $filter === 'publisher/archive/after-loop':
				publisher_get_links_pagination();

				return;
				break;

			case $pagination === 'ajax_more_btn_infinity' && $filter === 'publisher/archive/before-loop':
			case $pagination === 'ajax_infinity' && $filter === 'publisher/archive/before-loop':
			case $pagination === 'ajax_more_btn' && $filter === 'publisher/archive/before-loop':
			case $pagination === 'ajax_next_prev' && $filter === 'publisher/archive/before-loop':

				$max_num_pages = bf_get_wp_query_total_pages( $wp_query );

				// fix for when there is no more pages
				if ( $max_num_pages <= 1 ) {
					return;
				}

				// Create valid name for BS_Pagination
				$pagin_style = str_replace( 'ajax_', '', $pagination );

				$atts = array(
					'paginate'        => $pagin_style,
					'have_pagination' => true,
				);

				publisher_theme_pagin_manager()->wrapper_start( $atts );

				break;

			case $pagination === 'ajax_more_btn_infinity' && $filter === 'publisher/archive/after-loop':
			case $pagination === 'ajax_infinity' && $filter === 'publisher/archive/after-loop':
			case $pagination === 'ajax_more_btn' && $filter === 'publisher/archive/after-loop':
			case $pagination === 'ajax_next_prev' && $filter === 'publisher/archive/after-loop':

				$max_num_pages = bf_get_wp_query_total_pages( $wp_query );

				// fix for when there is no more pages
				if ( $max_num_pages <= 1 ) {
					return;
				}

				// Create valid name for BS_Pagination
				$pagin_style = str_replace( 'ajax_', '', $pagination );

				$atts = array(
					'paginate'        => $pagin_style,
					'have_pagination' => true,
					'show_label'      => publisher_theme_pagin_manager()->get_pagination_label( 1, $max_num_pages ),
					'next_page_link'  => next_posts( 0, false ), // next page link for better SEO
					'query_vars'      => bf_get_wp_query_vars( $wp_query ),
				);


				if ( publisher_prop_is_set( 'show-excerpt' ) ) {
					$atts['show_excerpt'] = publisher_get_prop( 'show-excerpt', false );
				} elseif ( publisher_prop_is_set( 'show-excerpt-big' ) ) {
					$atts['show_excerpt'] = publisher_get_prop( 'show-excerpt-big', false );
				} elseif ( publisher_prop_is_set( 'show-excerpt-small' ) ) {
					$atts['show_excerpt'] = publisher_get_prop( 'show-excerpt-small', false );
				}

				publisher_theme_pagin_manager()->wrapper_end();

				publisher_theme_pagin_manager()->display_pagination( $atts, $wp_query, 'Publisher::bs_pagin_ajax_archive', 'custom' );
		}

	} // publisher_archive_show_pagination
} // if
