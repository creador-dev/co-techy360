<?php


if ( ! function_exists( 'publisher_is_review_active' ) ) {
	/**
	 * Returns state of review for current post
	 *
	 * Supported Plugins:
	 *
	 * - Better Reviews     : Not public
	 * - WP Reviews         : https://wordpress.org/plugins/wp-review/
	 *
	 * @since 1.7
	 */
	function publisher_is_review_active() {

		/**
		 * Better Reviews plugin
		 */
		if ( function_exists( 'Better_Reviews' ) ) {
			if ( function_exists( 'better_reviews_is_review_active' ) ) {
				return better_reviews_is_review_active();
			} // compatibility for Better Reviews before v1.2.0
			else {
				return Better_Reviews::get_meta( '_bs_review_enabled' );
			}
		}


		/**
		 * WP Reviews plugin
		 *
		 * https://wordpress.org/plugins/wp-review/
		 */
		if ( function_exists( 'wp_review_get_post_review_type' ) ) {
			return wp_review_get_post_review_type();
		}


		return false;
	}
}


if ( ! function_exists( 'publisher_get_rating' ) ) {
	/**
	 * Shows rating bar
	 *
	 * Supported Plugins:
	 *
	 * - Better Reviews     : Not public
	 * - WP Reviews         : https://wordpress.org/plugins/wp-review/
	 *
	 * @param bool $show_rate
	 *
	 * @since 1.7
	 *
	 * @return string
	 */
	function publisher_get_rating( $show_rate = false ) {

		if ( ! publisher_is_review_active() ) {
			return;
		}

		$rate = false;
		$type = '';


		/**
		 * Better Reviews plugin
		 */
		if ( function_exists( 'better_reviews_is_review_active' ) ) {

			if ( function_exists( 'better_reviews_get_review_type' ) ) {
				$type = better_reviews_get_review_type();
				$rate = better_reviews_get_total_rate();
			} // compatibility for Better Reviews before v1.2.0
			else {
				$type = Better_Reviews::get_meta( '_bs_review_rating_type' );
				$rate = Better_Reviews()->generator()->calculate_overall_rate();
			}

		}


		/**
		 * WP Reviews plugin
		 *
		 * https://wordpress.org/plugins/wp-review/
		 */
		if ( $rate == false && function_exists( 'wp_review_get_post_review_type' ) ) {

			$rate = get_post_meta( get_the_ID(), 'wp_review_total', true );
			$type = wp_review_get_post_review_type();

			if ( $type === 'star' ) {
				$type = 'stars';
				$rate *= 20;
			} elseif ( $type === 'point' ) {
				$type = 'points';
				$rate *= 10;
			}

		}


		if ( $rate == false ) {
			return;
		}


		if ( $show_rate ) {
			if ( $type === 'points' ) {
				$show_rate = '<span class="rate-number">' . round( $rate / 10, 1 ) . '</span>';
			} else {
				$show_rate = '<span class="rate-number">' . esc_html( $rate ) . '%</span>';
			}
		} else {
			$show_rate = '';
		}

		if ( $type === 'points' || $type === 'percentage' ) {
			$type = 'bar';
		}

		echo '<div class="rating rating-' . esc_attr( $type ) . '"><span style="width: ' . esc_attr( $rate ) . '%;"></span>' . $show_rate . '</div>';

	} // publisher_get_rating
}


if ( ! function_exists( 'publisher_get_ranking_icon' ) ) {
	/**
	 * Returns icon of rank from panel
	 *
	 *
	 * @param int    $rank
	 * @param string $type
	 * @param string $default
	 * @param bool   $force_show
	 *
	 * @return array, bool
	 * @since 1.8.0
	 *
	 */
	function publisher_get_ranking_icon( $rank = 0, $type = 'views_ranking', $default = 'fa-eye', $force_show = false ) {

		static $ranks;

		if ( is_null( $ranks ) ) {
			$ranks = array();
		}

		// prepare ranks
		if ( ! isset( $ranks[ $type ] ) ) {

			$ranks[ $type ] = array();

			$field = publisher_get_option( $type );


			foreach ( $field as $_value ) {

				if ( intval( $_value['rate'] ) < 0 ) {
					continue;
				}

				$ranks[ $type ][ $_value['rate'] ]         = $_value;
				$ranks[ $type ][ $_value['rate'] ]['icon'] = bf_get_icon_tag( $_value['icon'] );
			}

			ksort( $ranks[ $type ] );

			$_ranks = array();

			foreach ( $ranks[ $type ] as $_rank => $_rank_v ) {

				$_ranks[ $_rank ]       = $_rank_v;
				$_ranks[ $_rank ]['id'] = 'rank-' . ( $_rank > 0 ? $_rank : 'default' );
			}

			$ranks[ $type ] = $_ranks;

			$ranks[ $type ]['default'] = array(
				'rate' => '',
				'id'   => 'rank-default',
				'show' => true,
				'icon' => bf_get_icon_tag( $default ),
			);

		}

		$icon = false;

		// Check rank
		foreach ( $ranks[ $type ] as $_rank_i => $_rank ) {

			if ( $_rank_i === 'default' ) {
				continue;
			}

			if ( intval( $_rank['rate'] ) > $rank &&
			     isset( $ranks[ $type ][ $_rank_i - 1 ] ) && $ranks[ $type ][ $_rank_i - 1 ]['rate'] < $rank
			) {
				$icon = $ranks[ $type ][ $_rank_i - 1 ];
				continue;
			}

			if ( intval( $_rank['rate'] ) <= $rank &&
			     (
				     ( isset( $ranks[ $type ][ $_rank_i + 1 ] ) && $ranks[ $type ][ $_rank_i + 1 ]['rate'] > $rank ) ||
				     ! isset( $ranks[ $type ][ $_rank_i + 1 ] )
			     )
			) {
				$icon = $_rank;
			}

		}

		if ( $icon && $force_show ) {
			$icon['show'] = true;
		}

		if ( $icon ) {
			return $icon;
		} else {
			return $ranks[ $type ]['default'];
		}

	}
}
