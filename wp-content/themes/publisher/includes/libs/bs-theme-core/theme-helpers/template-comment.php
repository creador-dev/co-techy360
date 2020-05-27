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


/**
 * Functions for loading comment templates and some other handy function about comments..
 *
 * @package    BS Theme Core
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2017, BetterStudio
 */

// Used to save comment template for better performance
$GLOBALS['publisher_theme_core_comment_templates_cache'] = NULL;


if ( ! function_exists( 'publisher_list_comments_args' ) ) {
	/**
	 * Arguments for the wp_list_comments_function() used in comments.php.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args
	 *
	 * @return array
	 */
	function publisher_list_comments_args( $args = array() ) {

		// Default arguments for listing comments.
		$defaults = array(
			'style'        => 'ol',
			'type'         => 'all',
			'avatar_size'  => 60,
			'callback'     => 'publisher_comments_callback',
			'end-callback' => 'publisher_comments_end_callback'
		);

		// Filter default arguments to enable developers to change it. also return it.
		return apply_filters( 'publisher-theme-core/comments/list-args', bf_merge_args( $args, $defaults ) );
	}
}


if ( ! function_exists( 'publisher_comments_callback' ) ) {
	/**
	 * Determine which comment template should be used and save it to ache and locate.
	 *
	 * @since  1.0.0
	 *
	 * @param  $comment object  Comment object.
	 * @param  $args    Array   Arguments passed from wp_list_comments().
	 * @param  $depth   Int     Comment level.
	 *
	 * @return void
	 */
	function publisher_comments_callback( $comment, $args, $depth ) {

		global $publisher_theme_core_comment_templates_cache;

		// current comment type
		$comment_type = get_comment_type( $comment->comment_ID );

		$style = publisher_get_style();

		if ( $style == 'default' ) {
			$style = 'general';
		} // fix for new structure

		// Not cached before
		if ( ! isset( $publisher_theme_core_comment_templates_cache[ $comment_type ] ) ) {

			$templates = array();

			// Extra comment/ping.php for both pingback and trackback
			if ( 'pingback' == $comment_type || 'trackback' == $comment_type ) {
				$templates[] = "views/{$style}/comments/ping.php";

				// Fallback to general ping comment template
				if ( $style != 'general' ) {
					$templates[] = 'views/general/comments/ping.php';
				}

			}

			$templates[] = "views/{$style}/comments/comment.php";

			// fallback to default comment template
			if ( $style != 'general' ) {
				$templates[] = 'views/general/comments/comment.php';
			}

			$template = locate_template( $templates );

			// Cache comment template.
			$publisher_theme_core_comment_templates_cache[ $comment_type ] = $template;
		}

		// Include if not empty
		if ( $publisher_theme_core_comment_templates_cache[ $comment_type ] != '' ) {
			include $publisher_theme_core_comment_templates_cache[ $comment_type ];
		}
	}
}


if ( ! function_exists( 'publisher_is_ajaxified_comments_active' ) ) {
	/**
	 * Determinate is comment ajax loading (deferred) enabled for this request
	 *
	 * @return bool true if enable
	 */
	function publisher_is_ajaxified_comments_active() {

		return (
			       ! bf_is_doing_ajax() || defined( 'PUBLISHER_THEME_AJAXIFIED_LOAD_POST' ) && PUBLISHER_THEME_AJAXIFIED_LOAD_POST
		       )
		       &&
		       (
			       empty( $GLOBALS['cpage'] ) || intval( $GLOBALS['cpage'] ) === 1
		       );
	}
}


add_filter( 'comment_post_redirect', 'publisher_comment_post_redirect' );

if ( ! function_exists( 'publisher_comment_post_redirect' ) ) {
	/**
	 * Handy function to add 'bs-comment-added' to query string after inserting comment
	 * @access private
	 *
	 * @param $location
	 *
	 * @return string
	 */
	function publisher_comment_post_redirect( $location ) {

		$location = add_query_arg( array(
			'bs-comment-added' => '1',
		), $location );

		return $location;
	}
}


if ( ! function_exists( 'publisher_comments_end_callback' ) ) {
	/**
	 * Ends the display of comments.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	function publisher_comments_end_callback() {
		echo '</li><!-- .comment -->';
	}
}


if ( ! function_exists( 'publisher_echo_comment_reply_link' ) ) {
	/**
	 * Outputs the comment reply link.
	 * Only use outside of `wp_list_comments()`.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  array $args
	 *
	 * @return void
	 */
	function publisher_echo_comment_reply_link( $args = array() ) {
		echo publisher_get_comment_reply_link( $args ); // escaped before
	}
}


if ( ! function_exists( 'publisher_get_comment_reply_link' ) ) {
	/**
	 * Outputs the comment reply link.
	 * Only use outside of `wp_list_comments()`.
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @param  array $args
	 *
	 * @return string
	 */
	function publisher_get_comment_reply_link( $args = array() ) {

		$_check = array(
			'pingback'  => '',
			'trackback' => '',
		);

		if ( ! get_option( 'thread_comments' ) || isset( $_check[ get_comment_type() ] ) ) {
			return '';
		}

		$login_to_reply_text = publisher_translation_get( 'comments_login_to_reply' );

		if ( empty( $login_to_reply_text ) ) {
			$login_to_reply_text = publisher_translation_get( 'comments_reply' );
		}

		$args = bf_merge_args(
			$args,
			array(
				'depth'         => intval( $GLOBALS['comment_depth'] ),
				'max_depth'     => get_option( 'thread_comments_depth' ),
				'reply_text'    => '<i class="fa fa-reply"></i> ' . publisher_translation_get( 'comments_reply' ),
				'reply_to_text' => '<i class="fa fa-reply"></i> ' . publisher_translation_get( 'comments_reply_to' ),
				'login_text'    => '<i class="fa fa-reply"></i> ' . $login_to_reply_text,
			)
		);

		return get_comment_reply_link( $args );
	}
}


if ( ! function_exists( 'publisher_get_comment_avatar' ) ) {
	/**
	 * @param string $id_or_email
	 * @param string $size
	 * @param string $default
	 * @param bool   $alt
	 *
	 * @return false|string
	 */
	function publisher_get_comment_avatar( $id_or_email, $size = '60', $default = '', $alt = false ) {
		return get_avatar( $id_or_email, $size, $default, $alt );
	}
}


if ( ! function_exists( 'publisher_echo_comment_avatar' ) ) {
	/**
	 * @param string $id_or_email
	 * @param string $size
	 * @param string $default
	 * @param bool   $alt
	 *
	 * @return false|string
	 */
	function publisher_echo_comment_avatar( $id_or_email, $size = '60', $default = '', $alt = false ) {
		echo publisher_get_comment_avatar( $id_or_email, $size, $default, $alt ); // escaped before
	}
}
