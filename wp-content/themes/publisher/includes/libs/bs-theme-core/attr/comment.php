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
// Comment section specific attributes
//
//
add_filter( 'publisher_attr_comment', 'publisher_attr_comment', 5, 3 );
add_filter( 'publisher_attr_comment-author', 'publisher_attr_comment_author', 5, 3 );
add_filter( 'publisher_attr_comment-published', 'publisher_attr_comment_published', 5, 3 );
add_filter( 'publisher_attr_comment-url', 'publisher_attr_comment_url', 5, 3 );
add_filter( 'publisher_attr_comment-avatar', 'publisher_attr_comment_avatar', 5, 3 );
add_filter( 'publisher_attr_comment-content', 'publisher_attr_comment_content', 5, 3 );


if ( ! function_exists( 'publisher_attr_comment' ) ) {
	/**
	 * Comment wrapper attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_comment( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = "comment-{$context}";
		} else {
			$attr['id'] = 'comment-' . get_comment_ID();
		}

		$attr['class'] = join( ' ', get_comment_class() );

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		if ( in_array( get_comment_type(), array( '', 'comment' ) ) ) {
			$attr['itemprop']  = ''; // comment
			$attr['itemscope'] = 'itemscope';
			$attr['itemtype']  = publisher_attr_get_protocol() . 'schema.org/UserComments';
		}

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_comment_author' ) ) {
	/**
	 * Comment author attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_comment_author( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		$attr['class'] = 'comment-author';

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop']  = 'creator';
		$attr['itemscope'] = 'itemscope';
		$attr['itemtype']  = publisher_attr_get_protocol() . 'schema.org/Person';

		return $attr;

	}
}


if ( ! function_exists( 'publisher_attr_comment_published' ) ) {
	/**
	 * Comment time/published attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_comment_published( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		$attr['class'] = 'comment-published';

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['datetime'] = get_comment_time( 'Y-m-d\TH:i:sP' );

		$attr['title'] = get_comment_time( 'l, F j, Y, g:i a' );

		$attr['itemprop'] = 'commentTime';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_comment_url' ) ) {
	/**
	 * Comment permalink attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_comment_url( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		$attr['class'] = 'comment-permalink';

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['href'] = get_comment_link();

		$attr['itemprop'] = 'url';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_comment_avatar' ) ) {
	/**
	 * Comment permalink attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_comment_avatar( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		$attr['class'] = 'comment-avatar';

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop'] = 'image';

		$attr['itemscope'] = 'itemscope';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_comment_content' ) ) {
	/**
	 * Comment content/text attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_comment_content( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		$attr['class'] = 'comment-content';

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop'] = 'commentText';

		return $attr;
	}
}