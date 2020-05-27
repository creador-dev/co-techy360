<?php
/**
 * publisher-search.php
 *---------------------------
 * Handles all tasks about search in Publisher
 *
 */


/**
 * Publisher Search Class
 *
 * @since 1.8.0
 */
class Publisher_Search {

	/**
	 *
	 * @since 1.8.0
	 */
	public static function init() {

		add_action( 'wp_ajax_ajaxified-search', 'Publisher_Search::handle_ajaxified_search' );
		add_action( 'wp_ajax_nopriv_ajaxified-search', 'Publisher_Search::handle_ajaxified_search' );

		// Filter WP_Query
		add_action( 'pre_get_posts', 'Publisher_Search::pre_get_posts' );
	}


	/**
	 * Detects the current active template for search
	 *
	 * @since 1.8.0
	 *
	 * @return null|string
	 */
	public static function get_ajax_search_template() {

		$suffix = self::is_menu_full_width() ? '-full' : '';

		//$post_types    = get_post_types( array( 'public' => true ) );
		//if ( isset( $post_types['product'] ) && function_exists( 'WC' ) ) {
		//	return publisher_get_view( 'ahax-search', 'with-products' . $suffix, '', false );
		//}

		return publisher_get_view( 'ajax-search', 'without-products' . $suffix, '', false );
	}


	/**
	 * Detects the search container is full with or partial width
	 *
	 * @since 1.8.0
	 *
	 * @return bool
	 */
	public static function is_menu_full_width() {

		$_check = array(
			'style-1' => '',
			'style-2' => '',
			'style-3' => '',
			'style-4' => '',
			'style-7' => '',
		);

		return isset( $_check[ publisher_get_header_style() ] );
	}


	/**
	 *
	 *
	 * @param        $wp_query
	 * @param string $taxonomy
	 * @param int    $limit
	 *
	 * @since 1.8.0
	 *
	 * @return array|bool
	 */
	public static function _get_query_categories( &$wp_query, $taxonomy = 'category', $limit = 4 ) {

		if ( ! $wp_query->posts ) {
			return false;
		}

		$i       = 0;
		$results = array();
		$founded = 0;

		while( $founded < $limit && $i < $wp_query->post_count ) {

			$post = &$wp_query->posts[ $i ];
			$i ++;

			/**
			 * @var WP_Term $_cat
			 */
			$post_cats = get_the_terms( $post->ID, $taxonomy );

			if ( $post_cats && ! is_wp_error( $post_cats ) ) {
				foreach ( $post_cats as $_cat ) {

					if ( $founded > $limit ) {
						break;
					}

					$results[ $_cat->term_id ] = $_cat;
					$founded ++;
				}
			}

		};

		return $results;
	}


	/**
	 * Set Custom Search Query
	 *
	 * @param string $query
	 * @param array  $args additional query args
	 *
	 * @since 1.8.0
	 *
	 * @return WP_Query
	 */
	public static function set_search_page_query( $query = '', $args = array() ) {

		if ( ! $query ) {
			$query = get_search_query();
		}

		$wp_query = self::get_search_query( $query, $args );
		publisher_set_query( $wp_query );

		return $wp_query;
	}


	/**
	 * Get Custom Search Query
	 *
	 * @since 1.8.0
	 *
	 * @return null|WP_Query
	 */
	public static function get_search_page_query() {

		return publisher_get_query();
	}


	/**
	 * Get Search Page Query
	 *
	 * @param string $query the search query
	 * @param array  $args  additional query args
	 *
	 * @since 1.8.0
	 *
	 * @return WP_Query
	 */
	public static function get_search_query( $query, $args = array() ) {

		$search_post_types = array();

		// Customize search result content
		switch ( publisher_get_option( 'search_result_content' ) ) {

			case 'post':
				$search_post_types[] = 'post';
				break;

			case 'page':
				$search_post_types[] = 'page';
				break;

			case 'both':
			case 'post-page':
				$search_post_types[] = 'post';
				$search_post_types[] = 'page';
				break;

			case 'advanced':
				if ( publisher_get_option( 'search_result_advanced' ) ) {
					$search_post_types = array_merge( $search_post_types, explode( ',', publisher_get_option( 'search_result_advanced' ) ) );
				}
				break;


		}// switch

		$q_args = array(
			's'           => $query,
			'post_type'   => $search_post_types,
			'post_status' => array( 'publish' ),
		);

		$q_args = bf_merge_args( $q_args, $args );

		return new WP_Query( $q_args );
	} // get_search_query


	/**
	 * Callback: Used for changing WP_Query, specifically for posts per page in archives
	 *
	 * @param   WP_Query $query WP_Query instance
	 */
	public static function pre_get_posts( $query ) {

		// This is only for front end and main query
		if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {

			if ( publisher_get_option( 'search_posts_count' ) != '' && intval( publisher_get_option( 'search_posts_count' ) ) > 0 ) {
				$query->set( 'posts_per_page', intval( publisher_get_option( 'search_posts_count' ) ) );
				$query->set( 'paged', bf_get_query_var_paged() );
			}

			// Support previous post_types
			$post_type = $query->get( 'post_type' );

			if ( empty( $post_type ) ) {
				$post_type = array();
			} elseif ( is_string( $post_type ) ) {
				$post_type = array(
					$post_type,
				);
			}

			// Customize search result content
			switch ( publisher_get_option( 'search_result_content' ) ) {

				case 'post':
					$post_type[] = 'post';
					break;

				case 'page':
					$post_type[] = 'page';
					break;

				case 'both':
				case 'post-page':
					$post_type[] = 'post';
					$post_type[] = 'page';
					break;

				case 'advanced':
					if ( publisher_get_option( 'search_result_advanced' ) ) {
						$post_type = array_merge( $post_type, explode( ',', publisher_get_option( 'search_result_advanced' ) ) );
					}
					break;

			}// switch

			$query->set( 'post_type', $post_type );

		}// if

	} // pre_get_posts


	/**
	 * Search into custom taxonomy
	 *
	 * @param string $query the search query
	 * @param string $taxonomy
	 * @param int    $max_items
	 *
	 * @since 1.8.0
	 *
	 * @return array
	 */
	public static function search_terms( $query, $taxonomy = 'category', $max_items = 4 ) {

		$terms_counter = 0;
		$categories    = array();

		foreach ( array( 'search', 'posts' ) as $search_method ) {

			if ( $terms_counter >= $max_items ) {
				break;
			}

			if ( $search_method == 'search' ) {
				$search_terms = self::search_term( $query, $taxonomy, 4 );
			} else {
				if ( ! empty( $query->posts ) ) {
					$search_terms = self::_get_query_categories( $query );
				} else {
					break;
				}
			}

			foreach ( (array) $search_terms as $s_term ) {

				if ( isset( $categories[ $s_term->term_id ] ) ) {
					continue;
				} else {
					$categories[ $s_term->term_id ] = $s_term;
				}
			}

			return $categories;
		}
	} // search_terms


	/**
	 * Callback: a Handler to response  ajax search
	 * Filter  : wp_ajax_ajaxified-search
	 *           wp_ajax_nopriv_ajaxified-search
	 *
	 * @since 1.8.0
	 */
	public static function handle_ajaxified_search() {

		global $wpdb;

		if ( empty( $_REQUEST['s'] ) || empty( $_REQUEST['sections'] ) ) {
			return;
		}

		if ( isset( $_REQUEST['full_width'] ) ) {
			$is_full_width = filter_var( $_REQUEST['full_width'], FILTER_VALIDATE_BOOLEAN );
		} else {
			$is_full_width = self::is_menu_full_width();
		}

		$search     = $wpdb->esc_like( $_REQUEST['s'] );
		$sections   = (array) $_REQUEST['sections'];
		$post_count = $is_full_width ? 6 : 4;

		/**
		 * Get Posts section
		 */
		if ( in_array( 'posts', $sections ) ) {

			$query = publisher_search_query( $search, array(
				'posts_per_page' => $post_count,
			) );

			publisher_set_prop( 'show-more-link', $query->found_posts > $post_count );

			if ( $is_full_width ) {
				publisher_set_prop( 'posts-count', 6 );
				publisher_set_prop( 'listing-class', 'columns-2' );
			} else {
				publisher_set_prop( 'posts-count', 3 );
				publisher_set_prop( 'listing-class', 'columns-1' );
			}

			$posts = publisher_get_view( 'loop', 'ajax-search-posts', '', false );

		}


		/**
		 * Get Product section
		 */
		//		if ( in_array( 'products', $sections ) &&
		//		     isset( $post_types['product'] ) &&
		//		     function_exists( 'WC' )
		//		) { // if product post exists & WC enabled
		//			$showposts = 3;
		//
		//			publisher_clear_query();
		//			publisher_clear_props();
		//
		//			$query = new WP_Query( array( 's' => $search, 'post_type' => 'product', 'showposts' => $showposts ) );
		//			publisher_set_query( $query );
		//			publisher_set_prop( 'posts-count', $showposts );
		//			publisher_set_prop( 'hide_heading', true );
		//
		//			add_action( 'woocommerce_shortcode_before_products_loop', function () {
		//
		//			} );
		//			$products = publisher_get_view( 'loop', 'ajax-search-products', '', false );
		//		}


		/**
		 * Choose related categories
		 *
		 * todo: display parent categories if founded cats was less than 3 item
		 */
		if ( in_array( 'categories', $sections ) ) {

			$categories = '';
			foreach ( publisher_search_terms( $search ) as $_term ) {

				$link = get_term_link( $_term, 'category' );

				if ( ! is_wp_error( $link ) ) {

					$categories .= '<li>';
					$categories .= '<a href="' . esc_url( $link ) . '" class="clean-button clean-button-light">';
					$categories .= '<i class="fa fa-folder-open" aria-hidden="true"></i>';
					$categories .= $_term->name;
					$categories .= '</a></li>';
				}
			}

			if ( empty( $categories ) ) {
				$categories = '<div class="align-vertical-center search-404">';
				$categories .= publisher_translation_get( 'search_cat_not_found' );
				$categories .= '</div>';
			} else {
				$categories = '<ul class="post-categories">' . $categories . '</ul>';
			}

		}


		/**
		 * Choose related tags
		 */
		if ( in_array( 'tags', $sections ) ) {

			$tags = '';

			foreach ( publisher_search_terms( $search, 'post_tag' ) as $_term ) {

				$link = get_term_link( $_term, 'post_tag' );

				if ( ! is_wp_error( $link ) ) {

					$tags .= '<li>';
					$tags .= '<a href="' . esc_url( $link ) . '" class="clean-button clean-button-light">';
					$tags .= '<i class="fa fa-hashtag" aria-hidden="true"></i>';
					$tags .= $_term->name;
					$tags .= '</a></li>';
				}

			}

			if ( empty( $tags ) ) {
				$tags = '<div class="align-vertical-center search-404">';
				$tags .= publisher_translation_get( 'search_tag_not_found' );
				$tags .= '</div>';
			} else {
				$tags = '<ul class="post-categories">' . $tags . '</ul>';
			}
		}


		wp_send_json( array(
			'sections' => compact( 'posts', 'more_posts', 'products', 'categories', 'tags' )
		) );

	}


	/**
	 * Search terms by name
	 *
	 * @param string $text
	 * @param string $tax
	 *
	 * @since 1.8.0
	 *
	 * @return array|null|object
	 */
	public static function search_term( $text = '', $tax = 'category', $limit = 4 ) {

		if ( empty( $text ) ) {
			return array();
		}

		global $wpdb;

		$tax_clause = $wpdb->prepare( "AND tt.taxonomy = %s", $tax );

		// Assume already escaped
		$value = '%' . wp_unslash( $text ) . '%';

		return $wpdb->get_results( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE t.name LIKE %s", $value ) . " $tax_clause LIMIT $limit" );

	}

} // Publisher_Search
