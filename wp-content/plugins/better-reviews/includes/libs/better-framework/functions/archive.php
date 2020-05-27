<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( ! function_exists( 'bf_get_query_var_paged' ) ) {
	/**
	 * Handy function used to find current page paged query var
	 * This is home page firendly
	 *
	 * @since 2.0
	 *
	 * @param int $default
	 *
	 * @return int|mixed
	 */
	function bf_get_query_var_paged( $default = 1 ) {

		return get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : $default );

	}
}


if ( ! function_exists( 'bf_is_search_page' ) ) {
	/**
	 * Used for detecting current page is search page or not
	 */
	function bf_is_search_page() {

		if ( stripos( $_SERVER['REQUEST_URI'], '/?s=' ) === false && stripos( $_SERVER['REQUEST_URI'], '/search/' ) === false ) {
			return false;
		} elseif ( ! is_search() ) {
			return false;
		}

		return true;
	}
}


if ( ! function_exists( 'bf_get_author_archive_user' ) ) {
	/**
	 * Used for finding user in author archive page
	 *
	 * @since   2.0
	 * @return WP_User|false WP_User object on success, false on failure.
	 */
	function bf_get_author_archive_user() {

		global $author_name, $author;

		return isset( $_GET['author_name'] ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );

	}
}


if ( ! function_exists( 'bf_get_admin_current_post_type' ) ) {
	/**
	 * Used to check for the current post type, works when creating or editing a
	 * new post, page or custom post type.
	 *
	 * @since    1.0
	 * @return    string [custom_post_type], page or post
	 */
	function bf_get_admin_current_post_type() {

		// admin side
		if ( is_admin() ) {

			$uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : null;

			if ( isset( $uri ) ) {

				$uri_parts = parse_url( $uri );

				$file = basename( $uri_parts['path'] );

				$_check = array(
					'post.php'     => '',
					'post-new.php' => '',
				);

				// Post types
				if ( $uri AND isset( $_check[ $file ] ) ) {
					$post_id = bf_get_admin_current_post_id();

					$post_type = isset( $_GET['post_type'] ) ? $_GET['post_type'] : null;

					$post_type = $post_id ? get_post_type( $post_id ) : $post_type;

					if ( isset( $post_type ) ) {

						return $post_type;

					} else {

						// because of the 'post.php' and 'post-new.php' checks above, we can default to 'post'
						return 'post';

					}
				} // Taxonomies
				elseif ( $uri AND ( $file === 'edit-tags.php' || $file === 'term.php' ) ) {

					$taxonomy = isset( $_GET['taxonomy'] ) ? $_GET['taxonomy'] : null;

					return $taxonomy;

				} // Pages custom css
				elseif ( isset( $_GET['bs_per_page_custom_css'] ) && ! empty( $_GET['bs_per_page_custom_css'] ) ) {

					if ( isset( $_GET['post_id'] ) && ! empty( $_GET['post_id'] ) ) {

						return get_post_type( $_GET['post_id'] );

					}

				}
			}

		} // if used in front end
		else {

			return get_post_type( bf_get_admin_current_post_id() );

		}


		return null;
	}
}


if ( ! function_exists( 'bf_get_admin_current_post_id' ) ) {
	/**
	 * Used to get the current post id.
	 *
	 * @since    1.0
	 * @return    int post ID
	 */
	function bf_get_admin_current_post_id() {

		global $post;

		$p_post_id = isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : null;

		$g_post_id = isset( $_GET['post'] ) ? $_GET['post'] : null;

		$post_id = $g_post_id ? $g_post_id : $p_post_id;

		$post_id = isset( $post->ID ) ? $post->ID : $post_id;

		if ( isset( $post_id ) ) {
			return (integer) $post_id;
		} else {
			return 0;
		}

	}
}