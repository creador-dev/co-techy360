<?php


if ( ! function_exists( 'publisher_search_query' ) ) {

	/**
	 * Set Custom Search Query
	 *
	 * @param string $search search query string
	 * @param array  $args   additional query args
	 *
	 * @since 1.8.0
	 * @return WP_Query
	 */
	function publisher_search_query( $search = '', $args = array() ) {

		return Publisher_Search::set_search_page_query( $search, $args );
	}
}


if ( ! function_exists( 'publisher_search_terms' ) ) {

	/**
	 * Search terms
	 *
	 * @param string $query the search query
	 * @param string $taxonomy
	 * @param int    $max_items
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_search_terms( $query, $taxonomy = 'category', $max_items = 4 ) {

		return Publisher_Search::search_terms( $query, $taxonomy, $max_items );
	}
}
