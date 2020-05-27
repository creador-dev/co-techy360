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


add_filter( 'publisher_meta_tag_title', 'publisher_meta_tag_headline', 5, 3 ); // alias
add_filter( 'publisher_meta_tag_headline', 'publisher_meta_tag_headline', 5, 3 );
add_filter( 'publisher_meta_tag_name', 'publisher_meta_tag_name', 5, 3 ); // For videos
add_filter( 'publisher_meta_tag_description', 'publisher_meta_tag_description', 5, 3 ); // For videos
add_filter( 'publisher_meta_tag_url', 'publisher_meta_tag_url', 5, 3 ); // alias
add_filter( 'publisher_meta_tag_publisher', 'publisher_meta_tag_author', 5, 3 ); // alias
add_filter( 'publisher_meta_tag_author', 'publisher_meta_tag_author', 5, 3 );
add_filter( 'publisher_meta_tag_date', 'publisher_meta_tag_date_published', 5, 3 );
add_filter( 'publisher_meta_tag_date_published', 'publisher_meta_tag_date_published', 5, 3 ); // alias
add_filter( 'publisher_meta_tag_date_upload', 'publisher_meta_tag_date_upload', 5, 3 ); // For videos
add_filter( 'publisher_meta_tag_image', 'publisher_meta_tag_featured_image', 5, 3 );
add_filter( 'publisher_meta_tag_thumbnail', 'publisher_meta_tag_featured_image', 5, 3 ); // alias
add_filter( 'publisher_meta_tag_interaction', 'publisher_meta_tag_comments', 5, 3 ); // alias
add_filter( 'publisher_meta_tag_comments', 'publisher_meta_tag_comments', 5, 3 );


if ( ! function_exists( 'publisher_meta_tag_headline' ) ) {
	/**
	 * Post headline meta tag.
	 *
	 * @since   1.1.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return array
	 */
	function publisher_meta_tag_headline( $content = '' ) {

		$attr['itemprop'] = 'headline';

		if ( empty( $content ) ) {
			$attr['content'] = get_the_title();
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_name' ) ) {
	/**
	 * Post name meta tag.
	 *
	 * Used for videos
	 *
	 * @since   1.2.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return array
	 */
	function publisher_meta_tag_name( $content = '' ) {

		$attr['itemprop'] = 'name';

		if ( empty( $content ) ) {
			$attr['content'] = get_the_title();
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_description' ) ) {
	/**
	 * Description of post,
	 * Used for Video object.
	 *
	 * @since   1.2.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return array
	 */
	function publisher_meta_tag_description( $content = '' ) {

		$attr['itemprop'] = 'description';

		if ( empty( $content ) ) {

			if ( function_exists( 'publisher_limit_words' ) ) {
				$attr['content'] = esc_attr( publisher_limit_words( get_the_excerpt(), 40 ) );
			} else {
				$attr['content'] = esc_attr( get_the_excerpt() );
			}

		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_url' ) ) {
	/**
	 * Post URL meta tag.
	 *
	 * @since   1.1.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return array
	 */
	function publisher_meta_tag_url( $content = '' ) {

		$attr['itemprop'] = 'url';

		if ( empty( $content ) ) {
			$attr['content'] = get_permalink();
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_author' ) ) {
	/**
	 * Post author meta tag.
	 *
	 * @since   1.1.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return  array
	 */
	function publisher_meta_tag_author( $content = '' ) {

		$attr['itemprop'] = 'author';

		if ( empty( $content ) ) {
			$attr['content'] = get_the_author_meta( 'nickname' );
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_date_published' ) ) {
	/**
	 * Post published date meta tag.
	 *
	 * @since   1.1.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return  array
	 */
	function publisher_meta_tag_date_published( $content = '' ) {
		global $post;

		$attr['itemprop'] = 'datePublished';

		if ( empty( $content ) ) {
			if ( isset( $post->post_date ) ) {
				$attr['content'] = mysql2date( 'Y-m-d\TH:i:sP', $post->post_date, false );
			}
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_date_upload' ) ) {
	/**
	 * Post upload date meta tag.
	 * Used for video
	 *
	 * @since   1.2.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return  array
	 */
	function publisher_meta_tag_date_upload( $content = '' ) {
		global $post;

		$attr['itemprop'] = 'uploadDate';

		if ( empty( $content ) ) {
			if ( isset( $post->post_date ) ) {
				$attr['content'] = mysql2date( 'Y-m-d\TH:i:sP', $post->post_date, false );
			}
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_featured_image' ) ) {
	/**
	 * Post featured image meta tag
	 *
	 * @since   1.1.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return  array
	 */
	function publisher_meta_tag_featured_image( $content = '' ) {

		if ( ! has_post_thumbnail() ) {
			return array( 'empty' => true );
		}

		$attr['itemprop'] = 'image';

		if ( empty( $content ) ) {
			$img             = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$attr['content'] = $img[0];
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_meta_tag_comments' ) ) {
	/**
	 * Post comments count meta tag (interaction count).
	 *
	 * @since   1.1.0
	 * @access  public
	 *
	 * @param   string $content
	 *
	 * @return  array
	 */
	function publisher_meta_tag_comments( $content = '' ) {

		$attr['itemprop'] = 'interactionCount';

		if ( empty( $content ) ) {
			$attr['content'] = get_comments_number();
		} else {
			$attr['content'] = $content;
		}

		return $attr;
	}
}