<?php


/**
 * Generate Reviews Preview Codes
 */
class Better_Reviews_Generator {


	function __construct() {

		add_filter( 'the_content', array( $this, 'bf_main_content' ), 1 );

		add_filter( 'post_class', array( $this, 'bf_post_class' ) );

	}


	/**
	 * Callback: Ads review class for post classes
	 * Filter: post_class
	 *
	 * @param $classes
	 *
	 * @return string
	 */
	public function bf_post_class( $classes ) {

		if ( ! $this->is_review_enabled() ) {
			return $classes;
		}

		$classes[] = 'review-post';

		if ( is_single( get_the_ID() ) && Better_Reviews::get_meta( '_bs_review_pos' ) && Better_Reviews::get_meta( '_bs_review_pos' ) != 'none' ) {
			$classes[] = 'review-post-' . Better_Reviews::get_meta( '_bs_review_pos' );
		}

		return $classes;
	}


	/**
	 * Filter Callback: Main Content off page and posts
	 */
	public function bf_main_content( $content ) {

		if ( is_admin() ) {
			return $content;
		}

		if ( ! $this->is_review_enabled() ) {
			return $content;
		}

		//
		// Detect the current the_content is for the main object of the page.
		//
		{
			$result = false;
			if ( get_post_type() === 'page' && is_page( get_the_ID() ) ) {
				$result = true;
			} elseif ( is_single( get_the_ID() ) ) {
				$result = true;
			}
		}

		// only append review for single post
		if ( ! $result ) {
			return $content;
		}

		//
		// don't add duplicate reviews
		//
		{
			static $processed_posts;

			if ( is_null( $processed_posts ) ) {
				$processed_posts = array();
			}

			if ( isset( $processed_posts[ get_the_ID() ] ) ) {
				return $content;
			} else {
				$processed_posts[ get_the_ID() ] = true;
			}
		}

		$atts = $this->prepare_atts( array() );

		if ( $atts['position'] && $atts['position'] != 'none' ) {

			$locations = array();

			if ( $atts['position'] === 'top-bottom' ) {
				$locations[] = 'top';
				$locations[] = 'bottom';
			} else {
				$locations[] = $atts['position'];
			}

			foreach ( $locations as $loc ) {

				$atts['class']    = 'review-' . $loc;
				$atts['position'] = $loc;

				// inject it
				bf_content_inject( array(
					'position' => $loc,
					'content'  => $this->generate_block( $atts, true ),
				) );
			}

			// BetterAMP plugins
			if ( bf_is_amp() === 'better' ) {

				// Get style -> Do not prints duplicate styles
				ob_start();
				echo $this->get_amp_inline_style( $atts['style'] );
				$code = ob_get_clean();

				if ( ! empty( $code ) ) {
					better_amp_add_inline_style( better_amp_css_sanitizer( $code ), 'better-reviews' );
				}
			}

		}

		return $content;
	}


	/**
	 * Used for preparing review atts
	 *
	 * @param $atts
	 *
	 * @return array
	 */
	public function prepare_atts( $atts = array() ) {

		if ( ! isset( $atts['type'] ) ) {
			$atts['type'] = Better_Reviews::get_meta( '_bs_review_rating_type' );
		}

		if ( ! isset( $atts['heading'] ) ) {
			$atts['heading'] = Better_Reviews::get_meta( '_bs_review_heading' );
		}

		if ( ! isset( $atts['verdict'] ) ) {
			$atts['verdict'] = Better_Reviews::get_meta( '_bs_review_verdict' );
		}

		if ( ! isset( $atts['summary'] ) ) {
			$atts['summary'] = Better_Reviews::get_meta( '_bs_review_verdict_summary' );
		}

		if ( ! isset( $atts['criteria'] ) ) {
			$atts['criteria'] = Better_Reviews::get_meta( '_bs_review_criteria' );
		}

		if ( ! isset( $atts['position'] ) ) {
			$atts['position'] = Better_Reviews::get_meta( '_bs_review_pos' );
		}

		if ( empty( $atts['position'] ) ) {
			$atts['position'] = 'bottom';
		}

		if ( ! isset( $atts['extra_desc'] ) ) {
			$atts['extra_desc'] = Better_Reviews::get_meta( '_bs_review_extra_desc' );
		}

		if ( ! isset( $atts['affiliate_desc'] ) ) {
			$atts['affiliate_desc'] = Better_Reviews::get_meta( '_affiliate_desc' );
		}
		if ( ! isset( $atts['affiliate_btn'] ) ) {
			$atts['affiliate_btn'] = Better_Reviews::get_meta( '_affiliate_btn' );
		}
		if ( ! isset( $atts['affiliate_icon'] ) ) {
			$atts['affiliate_icon'] = Better_Reviews::get_meta( '_affiliate_icon' );
		}
		if ( ! isset( $atts['affiliate_link'] ) ) {
			$atts['affiliate_link'] = Better_Reviews::get_meta( '_affiliate_link' );
		}

		if ( ! isset( $atts['cons_heading'] ) ) {

			$atts['cons_heading'] = Better_Reviews::get_meta( '_cons_heading' );

			if ( empty( $atts['cons_heading'] ) ) {
				$atts['cons_heading'] = Better_Reviews::get_option( 'text_cons' );
			}
		}

		if ( ! isset( $atts['pros_heading'] ) ) {
			$atts['pros_heading'] = Better_Reviews::get_meta( '_pros_heading' );

			if ( empty( $atts['pros_heading'] ) ) {
				$atts['pros_heading'] = Better_Reviews::get_option( 'text_pros' );
			}
		}

		if ( ! isset( $atts['advantages'] ) ) {
			$atts['advantages'] = Better_Reviews::get_meta( '_pros' );
		}

		if ( ! isset( $atts['disadvantages'] ) ) {
			$atts['disadvantages'] = Better_Reviews::get_meta( '_cons' );
		}

		if ( ! isset( $atts['disadvantages_icon'] ) ) {
			$icon = Better_Reviews::get_meta( '_icon_cons', null, Better_Reviews::get_option( '_icon_cons' ) );

			if ( empty( $icon ) || empty( $icon['icon'] ) ) {
				$icon = Better_Reviews::get_option( 'icon_cons' );
			}

			$atts['disadvantages_icon'] = $icon;
		}

		if ( ! isset( $atts['advantages_icon'] ) ) {
			$icon = Better_Reviews::get_meta( '_icon_pros', null, Better_Reviews::get_option( '_icon_pros' ) );

			if ( empty( $icon ) || empty( $icon['icon'] ) ) {
				$icon = Better_Reviews::get_option( 'icon_pros' );
			}

			$atts['advantages_icon'] = $icon;
		}

		if ( ! isset( $atts['align'] ) ) {
			$atts['align'] = Better_Reviews::get_meta( '_bs_review_align' );
		}

		// prepare style
		{
			$atts['style'] = Better_Reviews::get_meta( '_bs_review_box_style', 'default' );

			if ( ! $atts['style'] || $atts['style'] === 'default' ) {
				$atts['style'] = Better_Reviews::get_option( 'review_box_style' );
			}
		}

		return $atts;
	}


	/**
	 * Used for preparing review atts
	 *
	 * @param $atts
	 *
	 * @return array
	 */
	public function prepare_rate_atts( $atts = array() ) {

		if ( ! isset( $atts['type'] ) ) {
			$atts['type'] = Better_Reviews::get_meta( '_bs_review_rating_type' );
		}

		if ( ! isset( $atts['criteria'] ) ) {
			$atts['criteria'] = Better_Reviews::get_meta( '_bs_review_criteria' );
		}

		return $atts;
	}


	/**
	 * Used for checking state of review
	 *
	 * @return string
	 */
	public function is_review_enabled() {

		return Better_Reviews::get_meta( '_bs_review_enabled' );
	}


	/**
	 * Generates big block
	 *
	 * @param      $atts
	 *
	 * @param bool $prepared_atts
	 *
	 * @return string
	 */
	public function generate_block( $atts, $prepared_atts = false ) {

		// Review is not enable
		if ( ! $this->is_review_enabled() ) {
			return '';
		}

		if ( ! $prepared_atts ) {
			$atts = $this->prepare_atts( $atts );
		}

		if ( ! isset( $atts['class'] ) ) {
			$atts['class'] = '';
		}

		better_reviews_set_props( $atts );

		ob_start();

		better_reviews_locate_template( $atts['style'] . '.php', true );

		$output = ob_get_clean();

		$output = str_replace( "\n", '', $output ); // remove \n because using it inside other shortcodes like VC will create some bugs!

		better_reviews_clear_props();

		return $output;
	}


	/**
	 * Calculates overall rate
	 *
	 * @param $atts
	 *
	 * @return float
	 */
	public function calculate_overall_rate( $atts = null ) {

		if ( is_null( $atts ) ) {
			$atts = $this->prepare_atts( array() );
		}

		$total = 0;

		foreach ( (array) $atts['criteria'] as $criteria ) {
			if ( ! empty( $criteria['rate'] ) ) {
				$total += floatval( $criteria['rate'] ) * 10;
			}
		}

		if ( $total == 0 ) {
			return 0;
		}

		if ( $atts['type'] === 'points' ) {
			return round( $total / bf_count( $atts['criteria'] ), 1 );
		} else {
			return round( $total / bf_count( $atts['criteria'] ) );
		}

	}


	/**
	 * Used for retiring generated bars
	 *
	 * @param        $rate
	 * @param string $type
	 * @param bool   $show_rate
	 *
	 * @return string
	 */
	public function get_rating( $rate, $type = 'stars', $show_rate = false ) {

		if ( $show_rate ) {
			if ( $type == 'points' ) {
				$show_rate = '<span class="rate-number">' . round( $rate / 10, 1 ) . '</span>';
			} else {
				$show_rate = '<span class="rate-number">' . esc_html( $rate ) . '%</span>';
			}
		} else {
			$show_rate = '';
		}

		if ( $type == 'points' || $type == 'percentage' ) {
			$type = 'bar';
		}

		return '<div class="rating rating-' . esc_attr( $type ) . '"><span style="width: ' . esc_attr( $rate ) . '%;"></span>' . $show_rate . '</div>';
	}


	/**
	 * Handy function used to get inline and exact css codes of each style
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function get_amp_inline_style( $style = 'big-1' ) {

		static $cache;

		if ( isset( $cache[ $style ] ) ) {
			return '';
		}

		$_check = array(
			'big-1'  => array(
				'css/amp',
				'css/styles/general',
			),
			'big-2'  => array(
				'css/amp',
				'css/styles/general',
				'css/styles/style-big-2-3',
			),
			'big-3'  => array(
				'css/amp',
				'css/styles/general',
				'css/styles/style-big-2-3',
			),
			'big-4'  => array(
				'css/amp',
				'css/styles/general',
				'css/styles/style-big-4',
			),
			'big-5'  => array(
				'css/amp',
				'css/styles/general',
				'css/styles/style-big-5',
			),
			'tall-1' => array(
				'css/amp',
				'css/styles/general',
				'css/styles/style-tall-1-2',
			),
			'tall-2' => array(
				'css/amp',
				'css/styles/general',
				'css/styles/style-tall-1-2',
			),
		);


		ob_start();

		foreach ( $_check[ $style ] as $_style ) {
			include bf_append_suffix( Better_Reviews::dir_path( $_style ), '.css' );
		}

		if ( is_rtl() ) {
			foreach ( $_check[ $style ] as $style ) {
				include bf_append_suffix( Better_Reviews::dir_path( $style ) . '-rtl', '.css' );
			}
		}

		$cache[ $style ] = true;

		return ob_get_clean();
	}

}
