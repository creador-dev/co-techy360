<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


//
//
// Global variable that used for save blocks property
//
//

// Used to save all template properties
$GLOBALS['publisher_theme_core_props_cache'] = array();

// Used to save all template force properties
$GLOBALS['publisher_theme_core_force_props_cache'] = array();

// Used to save globals variables
$GLOBALS['publisher_theme_core_globals_cache'] = array();

// Used to save template query
$GLOBALS['publisher_theme_core_query'] = NULL;

// Used to save posts info
$GLOBALS['publisher_post_cache'] = NULL;

if ( ! function_exists( 'publisher_get_theme_panel_id' ) ) {
	/**
	 * Returns theme panel id, This should be override in theme
	 *
	 * @return string
	 */
	function publisher_get_theme_panel_id() {

		return 'bs_' . 'publisher_theme_options';
	}
}


if ( ! function_exists( 'publisher_get_option' ) ) {
	/**
	 * Used to get theme panel options
	 *
	 * @param $field_id
	 *
	 * @return mixed|null
	 */
	function publisher_get_option( $field_id ) {

		return bf_get_option( $field_id, publisher_get_theme_panel_id() );
	}
}


if ( ! function_exists( 'publisher_echo_option' ) ) {
	/**
	 * Used to get theme panel options
	 *
	 * @param $field_id
	 *
	 * @return mixed|null
	 */
	function publisher_echo_option( $field_id ) {

		echo publisher_get_option( $field_id ); // escaped before
	}
}


if ( ! function_exists( 'publisher_get_std' ) ) {
	/**
	 * Used to get theme panel field default value
	 *
	 * @param $field_id
	 *
	 * @return mixed|null
	 */
	function publisher_get_std( $field_id ) {

		return bf_get_std( $field_id, publisher_get_theme_panel_id() );
	}
}


if ( ! function_exists( 'publisher_echo_std' ) ) {
	/**
	 * Used to get theme panel field default value
	 *
	 * @param $field_id
	 *
	 * @return mixed|null
	 */
	function publisher_echo_std( $field_id ) {

		echo bf_get_std( $field_id ); // escaped before
	}
}


if ( ! function_exists( 'publisher_get_style' ) ) {
	/**
	 * Used to get current active style.
	 *
	 * Default style: general
	 *
	 * @return  string
	 */
	function publisher_get_style() {

		return 'general'; // 'default' is also valid for general
	}
}


if ( ! function_exists( 'publisher_get_view' ) ) {
	/**
	 * Used to print view/partials.
	 *
	 * @param   string $folder Folder name
	 * @param   string $file   File name
	 * @param   string $style  Style
	 * @param   bool   $echo   Echo the result or not
	 *
	 * @return null|string
	 */
	function publisher_get_view( $folder, $file = '', $style = '', $echo = true ) {

		// If style is not provided
		if ( empty( $style ) ) {
			// Get current style if not defined
			$style = publisher_get_style();
		}

		if ( $style == 'default' ) {
			$style = 'general';
		} // fix for new structure

		// If file name passed as folder argument for short method call
		if ( ! empty( $folder ) && empty( $file ) ) {
			$file   = $folder;
			$folder = '';
		}

		static $cached_path = array();


		$file_id = $folder . '-' . $file . '-' . $style;

		if ( ! isset( $cached_path[ $file_id ] ) ) {

			$templates = array();

			// File is inside another folder
			if ( ! empty( $folder ) ) {

				// Fallback to general file
				if ( $style != 'general' ) {
					$templates[] = 'views/general/' . $folder . '/' . $file . '.php';
				} else {
					$templates[] = 'views/' . $style . '/' . $folder . '/' . $file . '.php';
				}

			} // File is inside style base folder
			else {

				// Fallback to general file
				if ( $style != 'general' ) {
					$templates[] = 'views/general/' . $file . '.php';
				} else {
					$templates[] = 'views/' . $style . '/' . $file . '.php';
				}
			}

			$cached_path[ $file_id ] = locate_template( $templates, false, false );
		}

		if ( $echo == false ) {
			ob_start();
		}

		//		do_action( 'publisher-theme-core/view/before/' . $file );

		if ( ! empty( $cached_path[ $file_id ] ) ) {
			include $cached_path[ $file_id ];
		}

		//		do_action( 'publisher-theme-core/view/after/' . $file );

		if ( $echo == false ) {
			return ob_get_clean();
		}

	} // publisher_get_view
}


//
//
// Blocks properties
//
//


if ( ! function_exists( 'publisher_get_prop' ) ) {
	/**
	 * Used to get a property value.
	 *
	 * @param   string $id
	 * @param   mixed  $default
	 *
	 * @return  mixed
	 */
	function publisher_get_prop( $id, $default = NULL ) {

		global $publisher_theme_core_props_cache;

		if ( isset( $publisher_theme_core_props_cache[ $id ] ) ) {
			return $publisher_theme_core_props_cache[ $id ];
		} else {
			return $default;
		}
	}
}


if ( ! function_exists( 'publisher_conc_prop' ) ) {
	/**
	 * Used to concatenate a value to an existing property.
	 *
	 * @param   string $id
	 * @param null     $value
	 * @param string   $sep
	 *
	 * @return mixed
	 * @internal param mixed $default
	 *
	 */
	function publisher_conc_prop( $id, $value = NULL, $sep = ' ' ) {

		global $publisher_theme_core_props_cache;

		if ( isset( $publisher_theme_core_props_cache[ $id ] ) ) {
			$publisher_theme_core_props_cache[ $id ] .= $sep . $value;
		} else {
			$publisher_theme_core_props_cache[ $id ] = $value;
		}
	}
}


if ( ! function_exists( 'publisher_echo_prop' ) ) {
	/**
	 * Used to print a property value.
	 *
	 * @param   string $id
	 * @param   mixed  $default
	 *
	 * @return  mixed
	 */
	function publisher_echo_prop( $id, $default = NULL ) {

		global $publisher_theme_core_props_cache;

		if ( isset( $publisher_theme_core_props_cache[ $id ] ) ) {
			echo $publisher_theme_core_props_cache[ $id ]; // escaped before
		} else {
			echo $default; // escaped before
		}
	}
}


if ( ! function_exists( 'publisher_prop_is' ) ) {
	/**
	 * Use to check prop is equal to something
	 *
	 * @param   string $id
	 * @param   mixed  $value
	 *
	 * @return  mixed
	 */
	function publisher_prop_is( $id, $value = NULL ) {

		global $publisher_theme_core_props_cache;

		return isset( $publisher_theme_core_props_cache[ $id ] ) && $publisher_theme_core_props_cache[ $id ] == $value;
	}
}


if ( ! function_exists( 'publisher_prop_is_set' ) ) {
	/**
	 * Use to check prop is set or not
	 *
	 * @param   string $id
	 *
	 * @return  mixed
	 */
	function publisher_prop_is_set( $id ) {

		global $publisher_theme_core_props_cache;

		return isset( $publisher_theme_core_props_cache[ $id ] );
	}
}


if ( ! function_exists( 'publisher_get_prop_class' ) ) {
	/**
	 * Used to get block class property.
	 *
	 * @return string
	 */
	function publisher_get_prop_class() {

		global $publisher_theme_core_props_cache;

		if ( isset( $publisher_theme_core_props_cache['class'] ) ) {
			return $publisher_theme_core_props_cache['class'];
		} else {
			return '';
		}
	}
}


if ( ! function_exists( 'publisher_get_prop_thumbnail_size' ) ) {
	/**
	 * Used to get block thumbnail size property.
	 *
	 * @param   string $default
	 *
	 * @return  string
	 */
	function publisher_get_prop_thumbnail_size( $default = 'thumbnail' ) {

		global $publisher_theme_core_props_cache;

		if ( isset( $publisher_theme_core_props_cache['thumbnail-size'] ) ) {
			return $publisher_theme_core_props_cache['thumbnail-size'];
		} else {
			return $default;
		}
	}
}


if ( ! function_exists( 'publisher_set_prop' ) ) {
	/**
	 * Used to set a block property value.
	 *
	 * @param   string $id
	 * @param   mixed  $value
	 */
	function publisher_set_prop( $id, $value ) {

		global $publisher_theme_core_props_cache;

		$publisher_theme_core_props_cache[ $id ] = $value;
	}
}


if ( ! function_exists( 'publisher_set_props' ) ) {
	/**
	 * Used to set group of block properties value.
	 *
	 * @param   array $props
	 *
	 * @since 1.2.0
	 */
	function publisher_set_props( $props ) {

		global $publisher_theme_core_props_cache;

		$publisher_theme_core_props_cache = array_merge( $publisher_theme_core_props_cache, $props );
	}
}


if ( ! function_exists( 'publisher_set_prop_class' ) ) {
	/**
	 * Used to set a block class property value.
	 *
	 * @param   mixed $value
	 * @param   bool  $clean
	 *
	 * @return  mixed
	 */
	function publisher_set_prop_class( $value, $clean = false ) {

		global $publisher_theme_core_props_cache;

		if ( $clean ) {
			$publisher_theme_core_props_cache['class'] = $value;
		} else {
			$publisher_theme_core_props_cache['class'] = $value . ' ' . publisher_get_prop_class();
		}
	}
}


if ( ! function_exists( 'publisher_set_prop_thumbnail_size' ) ) {
	/**
	 * Used to set a block property value.
	 *
	 * @param   mixed $value
	 *
	 * @return  mixed
	 */
	function publisher_set_prop_thumbnail_size( $value = 'thumbnail' ) {

		global $publisher_theme_core_props_cache;

		$publisher_theme_core_props_cache['thumbnail-size'] = $value;
	}
}


if ( ! function_exists( 'publisher_set_prop_count_multi_column' ) ) {
	/**
	 * Used For Finding Best Count For Multiple columns
	 *
	 * @param int $post_counts
	 * @param int $columns
	 * @param int $current_column
	 */
	function publisher_set_prop_count_multi_column( $post_counts = 0, $columns = 1, $current_column = 1 ) {

		if ( $post_counts == 0 ) {
			return;
		}

		$count = floor( $post_counts / $columns );

		$reminder = $post_counts % $columns;

		if ( $reminder >= $current_column ) {
			$count ++;
		}

		publisher_set_prop( "posts-count", $count );
	}
}


if ( ! function_exists( 'publisher_unset_prop' ) ) {
	/**
	 * Used to remove a property from block property list.
	 *
	 * @param   string $id
	 *
	 * @return  mixed
	 */
	function publisher_unset_prop( $id ) {

		global $publisher_theme_core_props_cache;

		unset( $publisher_theme_core_props_cache[ $id ] );
	}
}


if ( ! function_exists( 'publisher_clear_props' ) ) {
	/**
	 * Used to clear all properties.
	 *
	 * @return  void
	 */
	function publisher_clear_props() {

		global $publisher_theme_core_props_cache, $publisher_theme_core_force_props_cache;

		$publisher_theme_core_props_cache = array();


		if ( $publisher_theme_core_force_props_cache ) {
			foreach ( $publisher_theme_core_force_props_cache as $key => $value ) {
				$publisher_theme_core_props_cache[ $key ] = $value;
			}
		}
	}
}


if ( ! function_exists( 'publisher_set_force_prop' ) ) {
	/**
	 * Used to set a force block property value.
	 *
	 * @param   string $id
	 * @param   mixed  $value
	 */
	function publisher_set_force_prop( $id, $value ) {

		global $publisher_theme_core_props_cache, $publisher_theme_core_force_props_cache;

		$publisher_theme_core_props_cache[ $id ]       = $value;
		$publisher_theme_core_force_props_cache[ $id ] = $value;
	}
}


if ( ! function_exists( 'publisher_unset_force_prop' ) ) {
	/**
	 * Used to remove a force property from block property list.
	 *
	 * @param   string $id
	 *
	 * @return  mixed
	 */
	function publisher_unset_force_prop( $id ) {

		global $publisher_theme_core_props_cache, $publisher_theme_core_force_props_cache;

		unset( $publisher_theme_core_props_cache[ $id ] );
		unset( $publisher_theme_core_force_props_cache[ $id ] );
	}
}


//
//
// Global Variables
//
//


if ( ! function_exists( 'publisher_set_global' ) ) {
	/**
	 * Used to set a global variable.
	 *
	 * @param   string $id
	 * @param   mixed  $value
	 *
	 * @return  mixed
	 */
	function publisher_set_global( $id, $value ) {

		global $publisher_theme_core_globals_cache;

		$publisher_theme_core_globals_cache[ $id ] = $value;
	}
}


if ( ! function_exists( 'publisher_unset_global' ) ) {
	/**
	 * Used to remove a global variable.
	 *
	 * @param   string $id
	 *
	 * @return  mixed
	 */
	function publisher_unset_global( $id ) {

		global $publisher_theme_core_globals_cache;

		unset( $publisher_theme_core_globals_cache[ $id ] );
	}
}


if ( ! function_exists( 'publisher_get_global' ) ) {
	/**
	 * Used to get a global value.
	 *
	 * @param   string $id
	 * @param   mixed  $default
	 *
	 * @return  mixed
	 */
	function publisher_get_global( $id, $default = NULL ) {

		global $publisher_theme_core_globals_cache;

		if ( isset( $publisher_theme_core_globals_cache[ $id ] ) ) {
			return $publisher_theme_core_globals_cache[ $id ];
		} else {
			return $default;
		}
	}
}


if ( ! function_exists( 'publisher_echo_global' ) ) {
	/**
	 * Used to print a global value.
	 *
	 * @param   string $id
	 * @param   mixed  $default
	 *
	 * @return  mixed
	 */
	function publisher_echo_global( $id, $default = NULL ) {

		global $publisher_theme_core_globals_cache;

		if ( isset( $publisher_theme_core_globals_cache[ $id ] ) ) {
			echo $publisher_theme_core_globals_cache[ $id ]; // escaped before
		} else {
			echo $default; // escaped before
		}
	}
}


if ( ! function_exists( 'publisher_clear_globals' ) ) {
	/**
	 * Used to clear all properties.
	 *
	 * @return  void
	 */
	function publisher_clear_globals() {

		global $publisher_theme_core_globals_cache;

		$publisher_theme_core_globals_cache = array();
	}
}


//
//
// Queries
//
//


if ( ! function_exists( 'publisher_get_query' ) ) {
	/**
	 * Used to get current query.
	 *
	 * @return  WP_Query|null
	 */
	function publisher_get_query() {

		global $publisher_theme_core_query;

		// Add default query to Publisher query if its not added or default query is used.
		if ( ! is_a( $publisher_theme_core_query, 'WP_Query' ) ) {
			global $wp_query;

			$publisher_theme_core_query = &$wp_query;
		}

		return $publisher_theme_core_query;
	}
}


if ( ! function_exists( 'publisher_get_query_posts_count' ) ) {
	/**
	 * Get query posts_per_page
	 *
	 * @since 1.8.0
	 * @return int
	 */
	function publisher_get_query_posts_count() {

		global $publisher_theme_core_query;

		if ( $publisher_theme_core_query ) {

			return $publisher_theme_core_query->get( 'posts_per_page' );
		}

		return 0;
	}
}


if ( ! function_exists( 'publisher_set_query' ) ) {
	/**
	 * Used to get current query.
	 *
	 * @param   WP_Query $query
	 * @param   array    $args
	 */
	function publisher_set_query( &$query, $args = array() ) {

		global $publisher_theme_core_query;

		$publisher_theme_core_query = $query;

		$args = bf_merge_args( $args, array(
			'cache_posts' => false,
		) );

		if ( $args['cache_posts'] && ! empty( $query->posts ) ) {

			$posts_thumb_id = array();
			foreach ( $query->posts as $_post ) {
				$posts_thumb_id[] = get_post_meta( $_post->ID, '_thumbnail_id', true );
			}

			// Load group of posts to cache & prevent wordpress fetch every single post from database
			static $cached = array();
			$_query     = array(
				'post__in'  => $posts_thumb_id,
				'post_type' => 'attachment',
				'showposts' => count( $posts_thumb_id )
			);
			$query_hash = md5( serialize( $_query ) );

			if ( ! isset( $cached[ $query_hash ] ) ) {
				get_posts( $_query );
				$cached[ $query_hash ] = true;
			}
		}
	}
}


if ( ! function_exists( 'publisher_clear_query' ) ) {
	/**
	 * Used to get current query.
	 *
	 * @param   bool $reset_query
	 */
	function publisher_clear_query( $reset_query = true ) {

		global $publisher_theme_core_query;

		$publisher_theme_core_query = NULL;

		// This will remove obscure bugs that occur when the previous wp_query object is not destroyed properly before another is set up.
		if ( $reset_query ) {
			wp_reset_postdata();
		}

		// Clear posts cache
		publisher_clear_post_cache();
	}
}


if ( ! function_exists( 'publisher_have_posts' ) ) {
	/**
	 * Used for checking have posts in advanced way!
	 */
	function publisher_have_posts() {

		// Add default query to better_template query if its not added or default query is used.
		if ( ! publisher_get_query() instanceof WP_Query ) {
			global $wp_query;

			publisher_set_query( $wp_query );
		}

		// If count customized
		if ( publisher_get_prop( 'posts-count', NULL ) != NULL ) {
			if ( publisher_get_prop( 'posts-counter', 1 ) > publisher_get_prop( 'posts-count' ) ) {
				$have_posts = false;
			} else {
				if ( publisher_get_query()->current_post + 1 < publisher_get_query()->post_count ) {
					$have_posts = true;
				} else {
					$have_posts = false;
				}
			}
		} else {
			$have_posts = publisher_get_query()->current_post + 1 < publisher_get_query()->post_count;
		}

		if ( $have_posts === false ) {
			publisher_clear_post_cache();
		}

		return $have_posts;
	}
}


if ( ! function_exists( 'publisher_the_post' ) ) {
	/**
	 * Custom the_post for custom counter functionality
	 */
	function publisher_the_post() {

		// If count customized
		if ( publisher_get_prop( 'posts-count', NULL ) != NULL ) {
			publisher_set_prop( 'posts-counter', absint( publisher_get_prop( 'posts-counter', 1 ) ) + 1 );
		}

		// Do default the_post
		publisher_get_query()->the_post();

		// Clear post cache for this post
		publisher_clear_post_cache();
	}
}


if ( ! function_exists( 'publisher_is_main_query' ) ) {
	/**
	 * Detects and returns that current query is main query or not? with support of better_{get|set}_query
	 *
	 * @return  WP_Query|null
	 */
	function publisher_is_main_query() {

		global $publisher_theme_core_query;

		// Add default query to better_template query if its not added or default query is used.
		if ( ! is_a( $publisher_theme_core_query, 'WP_Query' ) ) {
			global $wp_query;

			return $wp_query->is_main_query();
		}

		return $publisher_theme_core_query->is_main_query();
	}
}


//
//
// Post Caches
//
//


if ( ! function_exists( 'publisher_get_post_cache' ) ) {
	/**
	 * Retrieves data from post cache or NULL
	 *
	 * @param      $key
	 * @param null $value
	 *
	 * @return mixed
	 */
	function publisher_get_post_cache( $key, $value = NULL ) {

		global $publisher_post_cache;

		if ( isset( $publisher_post_cache[ $key ] ) ) {
			return $publisher_post_cache[ $key ];
		}

		return $value; // return null
	}
}


if ( ! function_exists( 'publisher_set_post_cache' ) ) {
	/**
	 * Save key to post cache
	 */
	function publisher_set_post_cache( $key, $value = NULL ) {

		global $publisher_post_cache;

		$publisher_post_cache[ $key ] = $value;
	}
}


if ( ! function_exists( 'publisher_clear_post_cache' ) ) {
	/**
	 * Save key to post cache
	 */
	function publisher_clear_post_cache() {

		global $publisher_post_cache;

		$publisher_post_cache = NULL;
	}
}


//
//
// Post Functions
//
//

if ( ! function_exists( 'publisher_get_the_title' ) ) {
	/**
	 * Retrieve post title.
	 */
	function publisher_get_the_title() {

		$data = publisher_get_post_cache( 'title' );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		$data = get_the_title();

		publisher_set_post_cache( 'title', $data );

		return $data;
	}
}


if ( ! function_exists( 'publisher_the_title' ) ) {
	/**
	 * Display or retrieve the current post title with optional markup.
	 *
	 * @param string $before Optional. Markup to prepend to the title. Default empty.
	 * @param string $after  Optional. Markup to append to the title. Default empty.
	 * @param bool   $echo   Optional. Whether to echo or return the title. Default true for echo.
	 *
	 * @return mixed|string|void
	 */
	function publisher_the_title( $before = '', $after = '', $echo = true ) {

		if ( $echo ) {
			echo $before, publisher_get_the_title(), $after;
		} else {
			return $before . publisher_get_the_title() . $after;
		}
	}
}


if ( ! function_exists( 'publisher_the_title_attribute' ) ) {
	/**
	 * Sanitize the current title when retrieving or displaying.
	 *
	 * @param string $before Optional. Markup to prepend to the title. Default empty.
	 * @param string $after  Optional. Markup to append to the title. Default empty.
	 * @param bool   $echo   Optional. Whether to echo or return the title. Default true for echo.
	 *
	 * @return mixed|string|void
	 */
	function publisher_the_title_attribute( $before = '', $after = '', $echo = true ) {

		$data = publisher_get_post_cache( 'title_attribute' );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		$data = publisher_get_the_title();

		if ( empty( $data ) ) {
			$data = esc_attr( $data );
		}

		publisher_set_post_cache( 'title_attribute', $data );

		if ( $echo ) {
			echo $before, $data, $after;
		} else {
			return $before . $data . $after;
		}
	}
}


if ( ! function_exists( 'publisher_get_permalink' ) ) {
	/**
	 * Retrieves the full permalink for the current post
	 *
	 * @return mixed|string|void
	 */
	function publisher_get_permalink() {

		$data = publisher_get_post_cache( 'permalink' );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		// Link post format should point to first a in content
		if ( publisher_get_post_format() === 'link' ) {

			global $post;

			$has_url = get_url_in_content( $post->post_content );

			if ( $has_url ) {
				$data = $has_url;
			}
		}

		if ( empty( $data ) ) {
			$data = get_permalink();
		}

		publisher_set_post_cache( 'permalink', $data );

		return $data;
	}
}


if ( ! function_exists( 'publisher_the_permalink' ) ) {
	/**
	 * Display the full permalink for the current post or post ID.
	 */
	function publisher_the_permalink() {

		echo publisher_get_permalink();
	}
}


if ( ! function_exists( 'publisher_get_comments_link' ) ) {
	/**
	 * Retrieves the link to the current post comments.
	 */
	function publisher_get_comments_link() {

		$data = publisher_get_post_cache( 'comments_link' );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		$hash = publisher_get_comments_number() ? '#comments' : '#respond';
		$data = publisher_get_permalink() . $hash;

		/**
		 * Filters the returned post comments permalink.
		 *
		 * @param string      $comments_link Post comments permalink with '#comments' appended.
		 * @param int|WP_Post $post_id       Post ID or WP_Post object.
		 */
		$data = apply_filters( 'get_comments_link', $data, get_the_ID() );

		publisher_set_post_cache( 'comments_link', $data );

		return $data;
	}
}


if ( ! function_exists( 'publisher_get_comments_number' ) ) {
	/**
	 * Retrieve the amount of comments a post has.
	 */
	function publisher_get_comments_number() {

		$data = publisher_get_post_cache( 'comments_number' );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		$data = get_comments_number();

		publisher_set_post_cache( 'comments_number', $data );

		return $data;
	}
}


if ( ! function_exists( 'publisher_get_author_posts_url' ) ) {
	/**
	 * Retrieve the URL to the author page for the user with the ID provided.
	 *
	 * @param $user_id
	 *
	 * @return mixed|string
	 */
	function publisher_get_author_posts_url( $user_id ) {

		static $authors;

		if ( is_null( $authors ) ) {
			$authors = array();
		}

		if ( isset( $authors[ $user_id ] ) ) {
			return $authors[ $user_id ];
		}

		return $authors[ $user_id ] = get_author_posts_url( $user_id );
	}
}

if ( ! function_exists( 'publisher_get_post_format' ) ) {
	/**
	 * Retrieve the format slug for a post
	 */
	function publisher_get_post_format() {

		$data = publisher_get_post_cache( 'post_format' );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		$data = get_post_format();

		publisher_set_post_cache( 'post_format', $data );

		return $data;
	}
}
