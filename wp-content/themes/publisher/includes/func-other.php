<?php


if ( ! function_exists( 'publisher_setup_paged_frontpage_query' ) ) {
	/**
	 * Setups paged front page query
	 * -> When homepage is static but pagination used for next pages
	 *
	 * @return bool
	 */
	function publisher_setup_paged_frontpage_query() {

		$home_args = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 10,
			'paged'          => bf_get_query_var_paged( 1 ),
		);

		// Home posts count
		if ( publisher_get_option( 'home_posts_count' ) != '' ) {
			$home_args['posts_per_page'] = publisher_get_option( 'home_posts_count' );
		}

		// Home category filters
		if ( publisher_get_option( 'home_cat_include' ) != '' ) {
			$home_args['cat'] = publisher_get_option( 'home_cat_include' );
		}

		// Home exclude category filters
		if ( publisher_get_option( 'home_cat_exclude' ) != '' ) {
			$home_args['category__not_in'] = publisher_get_option( 'home_cat_exclude' );
		}

		// Home tag filters
		if ( publisher_get_option( 'home_tag_include' ) != '' ) {
			$home_args['tag__in'] = publisher_get_option( 'home_tag_include' );
		}

		$front_page_query = new WP_Query( $home_args );

		publisher_set_query( $front_page_query );

	} // publisher_setup_paged_frontpage_query
}


if ( ! function_exists( '_themename_width_changer_to_px' ) ) {
	/**
	 * Handy function used to generate value for fields
	 *
	 * @param string $value
	 * @param string $unite
	 * @param string $append
	 *
	 * @return string
	 */
	function _themename_width_changer_to_px( $value = '', $unite = 'px', $append = '' ) {

		if ( $value === '' ) {
			$value = 0;
		}

		if ( $value !== 0 ) {
			$value = $value . $unite;
		}

		if ( ! empty( $append ) ) {
			return $value . $append;
		} else {
			return $value;
		}
	}
}


add_filter( 'oembed_result', 'publisher_hide_youtube_related_videos', 10, 3 );

if ( ! function_exists( 'publisher_hide_youtube_related_videos' ) ) {
	/**
	 * Remove related posts from youtube videos.
	 *
	 * Copyright: https://wordpress.org/plugins/hide-youtube-related-videos/
	 *
	 * @param       $data
	 * @param       $url
	 * @param array $args
	 *
	 * @return mixed
	 */
	function publisher_hide_youtube_related_videos( $data, $url, $args = array() ) {

		//Autoplay
		$autoplay = strpos( $url, "autoplay=1" ) !== false ? "&autoplay=1" : "";

		//Setup the string to inject into the url
		$str_to_add = apply_filters( "hyrv_extra_querystring_parameters", "wmode=transparent&amp;" ) . 'rel=0';

		//Regular oembed
		if ( strpos( $data, "feature=oembed" ) !== false ) {
			$data = str_replace( 'feature=oembed', $str_to_add . $autoplay . '&amp;feature=oembed', $data );

			//Playlist
		} elseif ( strpos( $data, "list=" ) !== false ) {
			$data = str_replace( 'list=', $str_to_add . $autoplay . '&amp;list=', $data );
		}

		//All Set
		return $data;
	}
}


add_filter( 'better-framework/oculus/logger/turn-off', 'publisher_enable_error_collector', 22, 3 );

/**
 * Callback: Enable oculus error logging system for theme
 * Filter  : better-framework/oculus/logger/filter
 *
 * @access private
 *
 * @param boolean $bool previous value
 * @param string  $product_dir
 * @param string  $type_dir
 *
 * @return bool true if error belongs to theme, previous value otherwise.
 */
function publisher_enable_error_collector( $bool, $product_dir, $type_dir ) {

	if ( $type_dir === 'themes' ) {
		return $product_dir !== get_template();
	}

	return $bool;
}


if ( ! function_exists( 'publisher_social_counter_options_list_callback' ) ) {
	/**
	 * Handy deferred function for improving performance
	 *
	 * @return array
	 */
	function publisher_social_counter_options_list_callback() {

		if ( ! class_exists( 'Better_Social_Counter' ) ) {
			return array();
		} else {
			return Better_Social_Counter_Data_Manager::self()->get_widget_options_list();
		}

	}
}


if ( ! function_exists( 'publisher_is_animated_thumbnail_active' ) ) {
	/**
	 * Returns the condition of animated thumbnail activation
	 *
	 * @return bool
	 */
	function publisher_is_animated_thumbnail_active() {

		return true;
	}
}


if ( ! function_exists( 'publisher_show_breadcrumb' ) ) {
	/**
	 * Defines the breadcrumb should be shown or not
	 *
	 * @return bool
	 */
	function publisher_show_breadcrumb() {

		static $show;

		if ( ! is_null( $show ) ) {
			return $show;
		}

		$paginated_front_page = ( 'page' === get_option( 'show_on_front' ) ) && is_front_page() && bf_get_query_var_paged( 1 ) > 1;

		// hide breadcrumb in home
		if ( ( is_home() || is_front_page() ) && ! $paginated_front_page ) {
			return $show = false;
		}

		$show = 'default';

		if ( is_singular() && ! $paginated_front_page ) {
			$show = bf_get_post_meta( 'post_breadcrumb', null, 'default' );
		}

		if ( $show === 'default' || empty( $show ) ) {
			$show = publisher_get_option( 'breadcrumb' );
		}

		$show = $show !== 'hide';

		return $show;

	} // publisher_show_breadcrumb
}


add_filter( 'publisher-theme-core/featured-image/enable', 'publisher_is_video_feature_image_on' );

if ( ! function_exists( 'publisher_is_video_feature_image_on' ) ) {
	/**
	 * Is "Attach video thumbnail" options on?
	 *
	 * @since 4.5.0
	 * @return bool
	 */
	function publisher_is_video_feature_image_on() {

		return (bool) publisher_get_option( 'bs_video_post_thumbnail' );
	}
}


add_filter( 'publisher-theme-core/featured-image/replace-video-screenshot', 'publisher_set_video_screenshot_as_post_thumbnail' );

if ( ! function_exists( 'publisher_set_video_screenshot_as_post_thumbnail' ) ) {
	/**
	 * @return bool
	 */
	function publisher_set_video_screenshot_as_post_thumbnail() {

		return (bool) publisher_get_option( 'bs_video_post_thumbnail_usage' );
	}
}
