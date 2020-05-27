<?php


if ( ! function_exists( 'better_review_overall_rate' ) ) {
	/**
	 * @since 1.3.0
	 *
	 * @return int
	 */
	function better_review_overall_rate() {

		// check cache storage
		if ( $result = better_reviews_get_prop( '_overall_rate' ) ) {
			return $result;
		}

		$total     = 0;
		$criterias = get_better_review_criterias();

		foreach ( $criterias as $criteria ) {
			$total += floatval( $criteria['rate'] );
		}

		if ( $total ) {

			if ( better_reviews_get_prop( 'type' ) === 'points' || better_reviews_get_prop( 'type' ) === 'percentage' ) {
				return round( $total / ( bf_count( $criterias ) / 10 ), 1 );
			} else {
				return round( $total / ( bf_count( $criterias ) / 10 ) );
			}
		}

		better_reviews_set_prop( '_overall_rate', $total ); // cache result

		return $total;
	}
}


if ( ! function_exists( 'get_better_review_class' ) ) {
	/**
	 *
	 * @param array $classes
	 *
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_class( $classes = array() ) {

		settype( $classes, 'array' );

		$classes[] = 'betterstudio-review';

		if ( $type = better_reviews_get_prop( 'type' ) ) {
			$classes[] = 'type-' . $type;
		}

		if ( $extra_classes = better_reviews_get_prop( 'class' ) ) {
			$extra_classes = explode( ' ', $extra_classes );
			$classes       = array_merge( $classes, $extra_classes );
		}

		$classes = array_filter( $classes );
		$classes = array_unique( $classes );
		$classes = array_map( 'sanitize_html_class', $classes );

		return implode( ' ', $classes );
	}
}


if ( ! function_exists( 'the_better_review_class' ) ) {
	/**
	 *
	 * @param array $classes
	 *
	 * @since 1.3.0
	 * @return string
	 */
	function the_better_review_class( $classes = array() ) {

		printf( 'class="%s"', get_better_review_class( $classes ) );
	}
}


if ( ! function_exists( 'get_better_review_rating' ) ) {
	/**
	 * @since 1.3.0
	 *
	 * @param int    $rate
	 * @param string $type
	 *
	 * @return string
	 */
	function get_better_review_rating( $rate = NULL, $type = '' ) {

		if ( ! is_int( $rate ) ) {
			$rate = better_review_overall_rate();
		}
		if ( ! $type ) {
			$type = better_reviews_get_prop( 'type' );
		}

		$_type = $type == 'points' || $type == 'percentage' ? 'bar' : $type;
		$class = '';

		// Width problem in AMP
		if ( bf_is_amp() === 'better' ) {
			$class = 'rating-' . mt_rand( 1000, 10000 ) . '-spec';

			bf_add_css( ".$class.$class.rating span{width:$rate%}", FALSE, TRUE );
		}

		return '<div class="rating rating-' . esc_attr( $_type ) . ' rating-type-' . esc_attr( $type ) . ' ' . $class . '"><span style="width: ' . esc_attr( $rate ) . '%;"></span></div>';
	}
}


if ( ! function_exists( 'the_better_review_rating' ) ) {
	/**
	 * @since 1.3.0
	 *
	 * @param int    $rate
	 * @param string $type
	 */
	function the_better_review_rating( $rate = NULL, $type = '' ) {

		echo get_better_review_rating( $rate, $type );
	}
}


if ( ! function_exists( 'get_better_review_verdict' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_verdict() {

		return better_reviews_get_prop( 'verdict' );
	}
}

if ( ! function_exists( 'the_better_review_verdict' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_verdict() {

		echo get_better_review_verdict();
	}
}

if ( ! function_exists( 'get_better_review_affiliate_desc' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_affiliate_desc() {

		return better_reviews_get_prop( 'affiliate_desc' );
	}
}

if ( ! function_exists( 'the_better_review_affiliate_desc' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_affiliate_desc() {

		echo get_better_review_affiliate_desc();
	}
}

if ( ! function_exists( 'get_better_review_affiliate_permalink' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_affiliate_permalink() {

		return better_reviews_get_prop( 'affiliate_link' );
	}
}

if ( ! function_exists( 'the_better_review_affiliate_permalink' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_affiliate_permalink() {

		echo esc_attr( get_better_review_affiliate_permalink() );
	}
}

if ( ! function_exists( 'get_better_review_affiliate_btn' ) ) {
	/**
	 *
	 * @param array $args
	 *
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_affiliate_btn( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'button' => '<a href="%s" class="btn affiliate-btn" target="_blank">%s</a>',
		) );

		$label = '';
		$icon  = better_reviews_get_prop( 'affiliate_icon' );

		if ( ! empty( $icon['icon'] ) ) {
			$label .= bf_get_icon_tag( $icon['icon'] );
			$label .= ' ';
		}

		$label .= better_reviews_get_prop( 'affiliate_btn' );

		if ( ! $label ) {
			return $label;
		}

		return sprintf( $args['button'], get_better_review_affiliate_permalink(), $label );

		/**
		 *
		 */

		return $label;
	}
}

if ( ! function_exists( 'the_better_review_affiliate_btn' ) ) {
	/**
	 *
	 * @param array $args
	 *
	 * @since 1.3.0
	 */
	function the_better_review_affiliate_btn( $args = array() ) {

		echo get_better_review_affiliate_btn( $args );
	}
}


if ( ! function_exists( 'get_better_review_heading' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_heading() {

		return better_reviews_get_prop( 'heading' );
	}
}

if ( ! function_exists( 'the_better_review_heading' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_heading() {

		echo get_better_review_heading();
	}
}


if ( ! function_exists( 'get_better_review_summary' ) ) {
	/**
	 * @since 1.3.0
	 *
	 * @param string $location
	 *
	 * @return string
	 */
	function get_better_review_summary( $location = 'top' ) {

		if ( $location == 'top' ) {
			$location = 'summary';
		} else {
			$location = 'extra_desc';
		}

		if ( $desc = better_reviews_get_prop( $location ) ) {
			return wpautop( do_shortcode( $desc ) );
		}

		return '';
	}
}

if ( ! function_exists( 'the_better_review_summary' ) ) {
	/**
	 * @since 1.3.0
	 *
	 * @param string $location
	 */
	function the_better_review_summary( $location = 'top' ) {

		echo get_better_review_summary( $location );
	}
}

if ( ! function_exists( 'get_better_review_pros_heading' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_pros_heading() {

		return better_reviews_get_prop( 'pros_heading' );
	}
}

if ( ! function_exists( 'the_better_review_pros_heading' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_pros_heading() {

		echo get_better_review_pros_heading();
	}
}

if ( ! function_exists( 'get_better_review_cons_heading' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_cons_heading() {

		return better_reviews_get_prop( 'cons_heading' );
	}
}

if ( ! function_exists( 'the_better_review_cons_heading' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_cons_heading() {

		echo get_better_review_cons_heading();
	}
}


if ( ! function_exists( 'get_better_review_advantages' ) ) {
	/**
	 * @since 1.3.0
	 * @return array
	 */
	function get_better_review_advantages() {

		$advantages = better_reviews_get_prop( 'advantages' );

		if ( $advantages && is_array( $advantages ) ) {

			if ( bf_count( $advantages ) == 1 ) {

				$item = reset( $advantages );

				if ( empty( $item['label'] ) ) {
					return array();
				}
			}

			return $advantages;
		}


		return array();
	}
}


if ( ! function_exists( 'get_better_review_disadvantages' ) ) {
	/**
	 * @since 1.3.0
	 */
	function get_better_review_disadvantages() {

		$disadvantages = better_reviews_get_prop( 'disadvantages' );
		if ( $disadvantages && is_array( $disadvantages ) ) {

			if ( bf_count( $disadvantages ) == 1 ) {

				$item = reset( $disadvantages );

				if ( empty( $item['label'] ) ) {
					return array();
				}
			}

			return $disadvantages;
		}

		return array();
	}
}


if ( ! function_exists( 'get_better_review_readers_state' ) ) {
	/**
	 * Returns state of readers rating activation for current post
	 *
	 * @since 1.3.0
	 */
	function get_better_review_readers_state() {

		$_check = array(
			''        => '',
			'default' => ''
		);

		$state = bf_get_post_meta( '_bs_readers_rating', NULL, 'default' );

		if ( isset( $_check[ $state ] ) ) {
			$state = Better_Reviews::get_option( 'readers_rating' );
		}

		if ( $state == 'enable' ) {
			return TRUE;
		}

		return FALSE;
	}
}


if ( ! function_exists( 'get_better_review_readers_average' ) ) {
	/**
	 * FIXME:
	 *
	 * @since 1.3.0
	 */
	function get_better_review_readers_average() {

		$votes  = (int) get_post_meta( get_the_ID(), '_bs_review_user_votes', TRUE );
		$voters = (int) get_post_meta( get_the_ID(), '_bs_review_total_user_votes', TRUE );

		if ( ! $voters ) {
			return 0;
		}

		return round( $votes / $voters, 0, PHP_ROUND_HALF_DOWN ) . '%';
	}
}

if ( ! function_exists( 'get_better_review_readers_votes' ) ) {
	/**
	 * FIXME:
	 *
	 * @since 1.3.0
	 */
	function get_better_review_readers_votes() {

		return (int) get_post_meta( get_the_ID(), '_bs_review_total_user_votes', TRUE );
	}
}

if ( ! function_exists( 'the_better_review_readers_average' ) ) {
	/**
	 * FIXME:
	 *
	 * @since 1.3.0
	 */
	function the_better_review_readers_average() {

		echo get_better_review_readers_average();
	}
}

if ( ! function_exists( 'get_better_review_criterias' ) ) {
	/**
	 * @since 1.3.0
	 * @return array
	 */
	function get_better_review_criterias() {

		$criteria = better_reviews_get_prop( 'criteria' );

		if ( $criteria && is_array( $criteria ) ) {
			return $criteria;
		}

		return array();
	}
}


if ( ! function_exists( 'get_better_review_description' ) ) {
	/**
	 * @since 1.3.0
	 * @return string
	 */
	function get_better_review_description() {

		if ( $desc = better_reviews_get_prop( 'extra_desc' ) ) {
			return wpautop( do_shortcode( $desc ) );
		}

		return '';
	}
}


if ( ! function_exists( 'the_better_review_description' ) ) {
	/**
	 * @since 1.3.0
	 */
	function the_better_review_description() {

		echo get_better_review_description();
	}
}


$GLOBALS['better_review_props_cache'] = array();

if ( ! function_exists( 'better_reviews_get_prop' ) ) {
	/**
	 * Used to get a property value.
	 *
	 * @param   string $id
	 * @param   mixed  $default
	 *
	 * @since 1.3.0
	 * @return  mixed
	 */
	function better_reviews_get_prop( $id, $default = NULL ) {

		global $better_review_props_cache;

		if ( isset( $better_review_props_cache[ $id ] ) ) {
			return $better_review_props_cache[ $id ];
		} else {
			return $default;
		}
	}
}


if ( ! function_exists( 'better_reviews_set_prop' ) ) {
	/**
	 * Used to set a block property value.
	 *
	 * @param   string $id
	 * @param   mixed  $value
	 *
	 * @since 1.3.0
	 */
	function better_reviews_set_prop( $id, $value ) {

		global $better_review_props_cache;

		$better_review_props_cache[ $id ] = $value;
	}
}


if ( ! function_exists( 'better_reviews_set_props' ) ) {
	/**
	 * Used to set group of block properties value.
	 *
	 * @param   array $props
	 *
	 * @since 1.2.0
	 */
	function better_reviews_set_props( $props ) {

		global $better_review_props_cache;

		$better_review_props_cache = array_merge( $better_review_props_cache, $props );
	}
}


if ( ! function_exists( 'better_reviews_clear_props' ) ) {
	/**
	 * Used to clear all properties.
	 *
	 * @return  void
	 */
	function better_reviews_clear_props() {

		global $better_review_props_cache;

		$better_review_props_cache = array();
	}
}
