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


// Add Ability to setting short code in text widget
add_filter( 'widget_text', 'do_shortcode' );

if ( ! function_exists( 'publisher_get_pagination' ) ) {
	/**
	 * BetterTemplate Custom Pagination
	 *
	 * @param array $options extend options for paginate_links()
	 *
	 * @return array|mixed|string
	 *
	 * @see paginate_links()
	 */
	function publisher_get_pagination( $options = array() ) {

		global $wp_rewrite;

		// Default Options
		$default_options = array(
			'echo'            => true,
			'use-wp_pagenavi' => true,
			'users-per-page'  => 6,
		);

		// Prepare query
		if ( publisher_get_query() != null ) {
			$default_options['query'] = publisher_get_query();
		} else {
			global $wp_query;
			$default_options['query'] = $wp_query;
		}

		// Merge default and passed options
		$options = bf_merge_args( $options, $default_options );


		// Texts with RTL support
		if ( ! isset( $options['next-text'] ) && ! isset( $options['prev-text'] ) ) {
			if ( is_rtl() ) {
				$options['next-text'] = publisher_translation_get( 'pagination_next' ) . ' <i class="fa fa-angle-left"></i>';
				$options['prev-text'] = '<i class="fa fa-angle-right"></i> ' . publisher_translation_get( 'pagination_prev' );
			} else {
				$options['next-text'] = publisher_translation_get( 'pagination_next' ) . ' <i class="fa fa-angle-right"></i>';
				$options['prev-text'] = ' <i class="fa fa-angle-left"></i> ' . publisher_translation_get( 'pagination_prev' );
			}
		}


		// WP-PageNavi Plugin
		if ( $options['use-wp_pagenavi'] && function_exists( 'wp_pagenavi' ) && ! is_a( $options['query'], 'WP_User_Query' ) ) {

			ob_start();

			// Use WP-PageNavi plugin to generate pagination
			wp_pagenavi(
				array(
					'query' => $options['query']
				)
			);

			$pagination = ob_get_clean();

		} // Custom Pagination With WP Functionality
		else {

			$paged = $options['query']->get( 'paged', '' ) ? $options['query']->get( 'paged', '' ) : ( $options['query']->get( 'page', '' ) ? $options['query']->get( 'page', '' ) : 1 );

			if ( is_a( $options['query'], 'WP_User_Query' ) ) {

				$offset = $options['users-per-page'] * ( $paged - 1 );

				$total_pages = ceil( $options['query']->total_users / $options['users-per-page'] );

			} else {
				$total_pages = $options['query']->max_num_pages;
			}

			if ( $total_pages <= 1 ) {
				return '';
			}

			$args = array(
				'base'      => add_query_arg( 'paged', '%#%' ),
				'current'   => max( 1, $paged ),
				'total'     => $total_pages,
				'next_text' => $options['next-text'],
				'prev_text' => $options['prev-text']
			);

			if ( is_a( $options['query'], 'WP_User_Query' ) ) {
				$args['offset'] = $offset;
			}

			if ( $wp_rewrite->using_permalinks() ) {
				$big          = 999999999;
				$args['base'] = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
			}

			if ( is_search() ) {
				$args['add_args'] = array(
					's' => urlencode( get_query_var( 's' ) )
				);
			}

			$pagination = paginate_links( array_merge( $args, $options ) );

			$pagination = preg_replace( '/&#038;paged=1(\'|")/', '\\1', trim( $pagination ) );

		}

		$pagination = '<div ' . publisher_get_attr( 'pagination', 'bs-numbered-pagination' ) . '>' . $pagination . '</div>';

		if ( $options['echo'] ) {
			echo $pagination; // escaped before
		} else {
			return $pagination;
		}

	} // publisher_get_pagination
} // if


if ( ! function_exists( 'publisher_get_links_pagination' ) ) {
	/**
	 * @param array $options
	 *
	 * @return string
	 */
	function publisher_get_links_pagination( $options = array() ) {

		// Default Options
		$default_options = array(
			'echo' => true,
		);

		// Texts with RTL support
		if ( is_rtl() ) {
			$default_options['older-text'] = '<i class="fa fa-angle-double-right"></i> ' . publisher_translation_get( 'pagination_newer' );
			$default_options['next-text']  = publisher_translation_get( 'pagination_older' ) . ' <i class="fa fa-angle-double-left"></i>';
		} else {
			$default_options['next-text']  = '<i class="fa fa-angle-double-left"></i> ' . publisher_translation_get( 'pagination_older' );
			$default_options['older-text'] = publisher_translation_get( 'pagination_newer' ) . ' <i class="fa fa-angle-double-right"></i>';
		}

		// Merge default and passed options
		$options = bf_merge_args( $options, $default_options );

		if ( ! $options['echo'] ) {
			ob_start();
		}

		?>
		<div <?php publisher_attr( 'pagination', 'bs-links-pagination clearfix' ) ?>>

			<div class="older"><?php next_posts_link( $options['next-text'] ); ?></div>

			<div class="newer"><?php previous_posts_link( $options['older-text'] ); ?></div>

		</div>
		<?php

		if ( ! $options['echo'] ) {
			return ob_get_clean();
		}

	} // publisher_get_links_pagination
} // if


// Hook to WP categories list functionality
add_filter( 'wp_list_categories', 'publisher_category_list_post_count_filter' );

if ( ! function_exists( 'publisher_category_list_post_count_filter' ) ) {
	/**
	 * Used to wrap categories count inside span
	 *
	 * @param $links
	 *
	 * @return mixed
	 */
	function publisher_category_list_post_count_filter( $links ) {

		$links = str_replace( '</a> (', ' <span class="post-count">', $links );

		$links = str_replace( ')', '</span></a>', $links );

		return $links;

	} // publisher_category_list_post_count_filter
} // if

// Hook to get_archives_link
add_filter( 'get_archives_link', 'publisher_archive_list_post_count_filter' );

if ( ! function_exists( 'publisher_archive_list_post_count_filter' ) ) {
	/**
	 * Used to wrap archive links count inside span for better style
	 *
	 * @param $link
	 *
	 * @return mixed
	 */
	function publisher_archive_list_post_count_filter( $link ) {

		$link = str_replace( '(', '<span class="post-count">', $link );

		$link = str_replace( ')', '</span>', $link );

		return $link;

	} // publisher_archive_list_post_count_filter
} // if

// add theme title tag support
add_theme_support( 'title-tag' );
// Backwards Compatibility For Theme title-tag Feature
if ( ! function_exists( '_wp_render_title_tag' ) ) {

	add_action( 'wp_head', 'publisher_theme_slug_render_title' );
	if ( ! function_exists( 'publisher_theme_slug_render_title' ) ) {
		/**
		 * Hooked to wp_head to add title tag
		 */
		function publisher_theme_slug_render_title() {

			?>
			<title><?php wp_title( '|', true, 'right' ); ?></title>
			<?php
		} // publisher_theme_slug_render_title
	} // if
} // if


if ( ! function_exists( 'publisher_get_time_filter_query' ) ) {
	/**
	 * Handy function used to generate array of time filter from ID
	 *
	 * @param $filter_id
	 *
	 * @return array
	 */
	function publisher_get_time_filter_query( $filter_id ) {

		$date_query = array();

		switch ( $filter_id ) {

			// Today posts
			case 'today':

				$date_query = array(
					array(
						'after' => '1 day ago', // should not escaped because will be passed to WP_Query
					),
				);

				break;

			// Today + Yesterday posts
			case 'yesterday':

				$date_query = array(
					array(
						'after' => '2 day ago', // should not escaped because will be passed to WP_Query
					),
				);

				break;


			// Week posts
			case 'week':

				$date_query = array(
					array(
						'after' => '1 week ago', // should not escaped because will be passed to WP_Query
					),
				);

				break;

			// Month posts
			case 'month':

				$date_query = array(
					array(
						'after' => '1 month ago', // should not escaped because will be passed to WP_Query
					),
				);

				break;

			// Year posts
			case 'year':

				$date_query = array(
					array(
						'after' => '1 year ago', // should not escaped because will be passed to WP_Query
					),
				);

				break;
		}

		return $date_query;
	} // publisher_get_time_filter_query
} // if


if ( ! function_exists( 'publisher_get_order_filter_query' ) ) {
	/**
	 * Handy function used to generate array of order filter from ID
	 *
	 * @param $filter_id
	 *
	 * @return array
	 */
	function publisher_get_order_filter_query( $filter_id, $args = null ) {

		if ( is_null( $args ) || ! is_array( $args ) ) {
			$args = array();
		}

		switch ( $filter_id ) {

			case 'title':
				$args['orderby'] = 'title';
				break;

			case 'recent':
			case 'date':
				$args['orderby'] = 'date';
				break;

			case 'comment_count':
				$args['orderby'] = 'comment_count';
				break;

			case 'popular':
				$args['meta_key'] = 'better-views-count';
				$args['orderby']  = 'meta_value_num';
				break;

			case 'popular_7days':

				// work only when 7day views is active!
				if ( function_exists( 'The_Better_Views' ) && function_exists( 'Better_Post_Views' ) && Better_Post_Views()->is_active( '7days' ) ) {
					$args['meta_key'] = 'better-views-7days-total';
					$args['orderby']  = 'meta_value_num';
				}

				break;

			default:
				$args['orderby'] = $filter_id;
		}

		return $args;
	} // publisher_get_order_filter_query
} // if


if ( ! function_exists( 'publisher_get_order_field_option' ) ) {
	/**
	 * Handy function used to get list of order select field options
	 *
	 * @return array
	 */
	function publisher_get_order_field_option() {

		$options = array(
			'date'          => __( 'Published Date', 'publisher' ),
			'modified'      => __( 'Modified Date', 'publisher' ),
			'rand'          => __( 'Random', 'publisher' ),
			'comment_count' => __( 'Number of Comments', 'publisher' ),
			'title'         => __( 'Title', 'publisher' ),
		);

		// Order by post views
		if ( function_exists( 'The_Better_Views' ) && function_exists( 'Better_Post_Views' ) ) {
			$options['popular'] = __( 'Popular', 'publisher' );
			if ( Better_Post_Views()->is_active( '7days' ) ) {
				$options['popular_7days'] = __( '7 Days popular', 'publisher' );
			}
		}

		return $options;

	} // publisher_get_order_filter_query
} // if


// Hooked to show user custom avatar
add_filter( 'get_avatar', 'publisher_get_avatar_filter', 10, 6 );

if ( ! function_exists( 'publisher_get_avatar_filter' ) ) {
	/**
	 * Callback: Used for using user avatar field
	 *
	 * Filter: get_avatar
	 *
	 * @param $avatar
	 * @param $id_or_email
	 * @param $size
	 * @param $default
	 * @param $alt
	 * @param $args
	 *
	 * @return string
	 */
	function publisher_get_avatar_filter( $avatar, $id_or_email, $size, $default, $alt, $args = null ) {

		if ( empty( $args['url'] ) ) {

			$args = get_avatar_data( $id_or_email, $args );
		}

		return "<img alt='{$alt}' src='{$args['url']}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
	} // publisher_get_avatar_filter
} // if


add_filter( 'get_avatar_url', 'publisher_get_avatar_url', 7, 3 );

if ( ! function_exists( 'publisher_get_avatar_url' ) ) {

	function publisher_get_avatar_url( $url, $id_or_email, $args ) {

		if ( is_numeric( $id_or_email ) ) {

			$id = (int) $id_or_email;

		} elseif ( is_object( $id_or_email ) && ! empty( $id_or_email->user_id ) ) {

			$id = (int) $id_or_email->user_id;

		} else {

			return $url;
		}

		if ( function_exists( 'bf_get_user_meta' ) ) {
			$custom_avatar = bf_get_user_meta( 'avatar', $id );
		} else {
			$custom_avatar = get_user_meta( $id, 'avatar', true );
		}

		if ( ! $custom_avatar ) {
			return $url;
		}

		// Backward compatibility
		if ( filter_var( $custom_avatar, FILTER_VALIDATE_URL ) ) {
			return $custom_avatar;
		}

		if ( $avatar_media_id = filter_var( $custom_avatar, FILTER_VALIDATE_INT ) ) { // Backward Compatibility

			if ( $args['size'] <= intval( get_option( 'thumbnail_size_w' ) ) ) {
				$avatar_size = 'thumbnail';
			} elseif ( $args['size'] <= intval( get_option( 'medium_size_w' ) ) ) {
				$avatar_size = 'medium';
			} elseif ( $args['size'] <= intval( get_option( 'medium_large_size_w' ) ) ) {
				$avatar_size = 'medium_large';
			} elseif ( $args['size'] <= intval( get_option( 'large_size_w' ) ) ) {
				$avatar_size = 'large';
			} else {
				$avatar_size = 'full';
			}

			return publisher_get_media_src( $avatar_media_id, $avatar_size );
		}

		return $url;
	}
}

// Hooked to filter comments nav next page attributes
add_filter( 'next_comments_link_attributes', 'publisher_next_comments_link_attributes_filter' );

if ( ! function_exists( 'publisher_next_comments_link_attributes_filter' ) ) {
	/**
	 * Callback: ads class to comments nav attributes
	 *
	 * @param $attributes
	 *
	 * @return string
	 */
	function publisher_next_comments_link_attributes_filter( $attributes ) {

		return $attributes . ' class="next-page" ';
	}
}


// Hooked to filter comments nav next page attributes
add_filter( 'previous_comments_link_attributes', 'publisher_previous_comments_link_attributes_filter' );

if ( ! function_exists( 'publisher_previous_comments_link_attributes_filter' ) ) {
	/**
	 * Callback: ads class to comments nav attributes
	 *
	 * @param $attributes
	 *
	 * @return string
	 */
	function publisher_previous_comments_link_attributes_filter( $attributes ) {

		return $attributes . ' class="prev-page" ';
	}
}


add_filter( 'next_comments_link_attributes', 'publisher_add_comments_nav_rel' );
add_filter( 'previous_comments_link_attributes', 'publisher_add_comments_nav_rel' );
if ( ! function_exists( 'publisher_add_comments_nav_rel' ) ) {
	/**
	 * Adds next and prev rel into comments navigation
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	function publisher_add_comments_nav_rel( $attrs ) {

		if ( current_filter() === 'next_comments_link_attributes' ) {
			$attrs .= ' rel="next" ';
		} elseif ( current_filter() === 'previous_comments_link_attributes' ) {
			$attrs .= ' rel="prev" ';
		}

		return $attrs;
	}
}


if ( ! function_exists( 'publisher_the_author_social_icons' ) ) {
	/**
	 * Generates author social links UL
	 *
	 * @param null  $author
	 * @param array $args
	 */
	function publisher_the_author_social_icons( $author = null, $args = array() ) {

		if ( is_null( $author ) ) {

			// Get current post author id
			if ( is_singular() ) {
				$author = get_the_author_meta( 'ID' );
			} // Get current archive user
			elseif ( is_author() ) {
				$author = bf_get_author_archive_user();
			} // Return
			else {
				return;
			}
		}

		if ( is_int( $author ) ) {
			$author = get_user_by( 'id', $author );
		}

		if ( ! $author ) {
			return;
		}

		$args = bf_merge_args( $args, array(
			'wrapper_class' => 'author-social-icons',
			'list_start'    => '',
			'list_end'      => '',
			'max-links'     => - 1,
		) );

		// Contains links of author
		$social_links = array(
			// Github Link
			'github_url'     => array(
				'title' => '<i class="fa fa-github"></i>',
				'class' => 'github',
			),
			// Pinterest Link
			'pinterest_url'  => array(
				'title' => '<i class="fa fa-pinterest"></i>',
				'class' => 'pinterest',
			),
			// Youtube Link
			'youtube_url'    => array(
				'title' => '<i class="fa fa-youtube"></i>',
				'class' => 'youtube',
			),
			// Linkedin Link
			'linkedin_url'   => array(
				'title' => '<i class="fa fa-linkedin"></i>',
				'class' => 'linkedin',
			),
			// Dribbble Link
			'dribbble_url'   => array(
				'title' => '<i class="fa fa-dribbble"></i>',
				'class' => 'dribbble',
			),
			// Vimeo Link
			'vimeo_url'      => array(
				'title' => '<i class="fa fa-vimeo-square"></i>',
				'class' => 'vimeo',
			),
			// Delicious Link
			'delicious_url'  => array(
				'title' => '<i class="fa fa-delicious"></i>',
				'class' => 'delicious',
			),
			// SoundCloud Link
			'soundcloud_url' => array(
				'title' => '<i class="fa fa-soundcloud"></i>',
				'class' => 'soundcloud',
			),
			// Behance Link
			'behance_url'    => array(
				'title' => '<i class="fa fa-behance"></i>',
				'class' => 'behance',
			),
			// Flickr Link
			'flickr_url'     => array(
				'title' => '<i class="fa fa-flickr"></i>',
				'class' => 'flickr',
			),
			// Instagram Link
			'instagram_url'  => array(
				'title' => '<i class="fa fa-instagram"></i>',
				'class' => 'instagram',
			),
			// Google+ Link
			'gplus_url'      => array(
				'title' => '<i class="fa fa-google-plus"></i>',
				'class' => 'google-plus',
			),
			// Twitter Link
			'twitter_url'    => array(
				'title' => '<i class="fa fa-twitter"></i>',
				'class' => 'twitter',
			),
			// Facebook Link
			'facebook_url'   => array(
				'title' => '<i class="fa fa-facebook"></i>',
				'class' => 'facebook',
			),
			// User Link
			'url'            => array(
				'title' => '<i class="fa fa-globe"></i>',
				'class' => 'site',
				'value' => get_the_author_meta( 'user_url', $author->ID )
			),
			// Telegram Link
			'telegram_url'   => array(
				'title' => '<i class="fa fa-telegram"></i>',
				'class' => 'telegram',
			),
		);

		$limit = intval( $args['max-links'] );
		$i     = 0;
		$links = array();

		foreach ( $social_links as $meta_key => $link ) {

			if ( $i === $limit ) {
				break;
			}

			if ( isset( $link['value'] ) ) {

				if ( ! empty( $link['value'] ) ) {
					$link['href'] = $link['value'];
					$links[]      = $link;

					$i ++;
				}

			} elseif ( $href = bf_get_user_meta( $meta_key, $author->ID ) ) {

				$link['href'] = $href;
				$links[]      = $link;

				$i ++;
			}
		}

		// Fix order issue in RTL languages
		if ( is_rtl() ) {
			$links = array_reverse( $links );
		}

		?>
		<ul class="<?php echo $args['wrapper_class'] ?>">
			<?php

			echo $args['list_start'];

			foreach ( $links as $link ) {
				?>
				<li class="social-item <?php echo esc_attr( $link['class'] ); ?>">
					<a href="<?php echo esc_url( $link['href'] ); ?>"
					   target="_blank"
					   rel="nofollow noreferrer"><?php echo $link['title']; // escaped before in top ?></a>
				</li>
				<?php
			}

			echo $args['list_end'];

			?>
		</ul>
		<?php

	} // publisher_the_author_social_icons
} // if


if ( ! function_exists( 'publisher_limit_words' ) ) {
	/**
	 * Truncates string to the word closest to a certain number of characters
	 *
	 * @param        $string
	 * @param int    $width
	 * @param string $append
	 *
	 * @return string
	 */
	function publisher_limit_words( $string, $width = 100, $append = '&hellip;' ) {

		if ( $width < 1 ) {
			return $string;
		}

		// do nothing if length is smaller or equal filter!
		if ( strlen( $string ) <= $width ) {
			return $string;
		}

		$parts       = preg_split( '/([\s\n\r]+)/u', $string, null, PREG_SPLIT_DELIM_CAPTURE );
		$parts_count = count( $parts );

		$length    = 0;
		$last_part = 0;
		for ( ; $last_part < $parts_count; ++ $last_part ) {
			$length += mb_strlen( $parts[ $last_part ] );

			if ( $length > $width ) {
				break;
			}
		}

		if ( $length > $width ) {
			return trim( implode( array_slice( $parts, 0, $last_part ) ) ) . $append;
		} else {
			return implode( array_slice( $parts, 0, $last_part ) );
		}
	}
}


if ( ! function_exists( 'publisher_html_limit_words' ) ) {
	/**
	 * Truncates string to the word closest to a certain number of characters
	 *
	 * @param string $html
	 * @param int    $width
	 * @param string $append
	 *
	 * @return string
	 */
	function publisher_html_limit_words( $html = '', $width = 100, $append = '&hellip;' ) {

		if ( $width < 1 ) {
			return $html;
		}

		//TODO: Fix RegEx to prevent match none html inputs
		if ( ( preg_match_all( '/( [^\<]* ) (<)? (?(2)	 (\/?) ([^\>]+ ) > )/isx', $html, $match ) ) && array_filter( $match[2] ) ) {

			// do nothing if length is smaller or equal filter!
			if ( strlen( $html ) <= $width ) {
				return $html;
			}

			$break = false;
			$texts = &$match[1];
			$tags  = &$match[4];

			$length         = 0;
			$result         = '';
			$open_tags_list = array();

			foreach ( $texts as $index => $text ) {
				$slice_size = $width - $length;
				if ( $slice_size < 1 ) {
					$break = true;
					break;
				}

				$sliced_text = publisher_limit_words( $text, $slice_size, '' );
				$length      += mb_strlen( $text );
				$result      .= $sliced_text;

				if ( $sliced_text !== $text ) {
					$break = true;
					break;
				}

				$tag_data = $tags[ $index ];
				$tag_data = explode( ' ', $tag_data, 2 );

				$tag  = &$tag_data[0];
				$atts = isset( $tag_data[1] ) ? ' ' . $tag_data[1] : '';

				$is_open_tag = empty( $match[3][ $index ] );

				if ( $is_open_tag ) {
					$open_tags_list[] = $tag;

					if ( $tag ) {
						$result .= '<' . $tag . $atts . '>';
					}
				} else {

					do {
						$last_open_tag = array_pop( $open_tags_list );

						$result .= '</' . $last_open_tag . '>';
					} while( $last_open_tag && $last_open_tag !== $tag );
				}
			}

			do {
				if ( $last_open_tag = array_pop( $open_tags_list ) ) {
					$result .= '</' . $last_open_tag . '>';
				}
			} while( $last_open_tag );

			if ( $break ) {
				$result .= $append;
			}

			/* remove empty tags
				 $result = preg_replace('/\s*<([^\s\>]+).*?>\s*(?:<\s*\/\\1\s*>)?/i', '', $result); */

			return $result;
		} else {
			return publisher_limit_words( $html, $width, $append );
		}
	}
}


if ( ! function_exists( 'publisher_echo_limit_words' ) ) {
	/**
	 * Truncates string to the word closest to a certain number of characters
	 *
	 * @param        $string
	 * @param int    $width
	 * @param string $append
	 */
	function publisher_echo_limit_words( $string, $width = 100, $append = '&hellip;' ) {

		echo publisher_limit_words( $string, $width, $append ); // escaped before
	}
}


if ( ! function_exists( 'publisher_echo_html_limit_words' ) ) {
	/**
	 * Truncates HTML to the word closest to a certain number of characters
	 * with support of HTML tags inside text also this fixes unclosed tags inside HTML
	 *
	 * @param        $html
	 * @param int    $width
	 * @param string $append
	 */
	function publisher_echo_html_limit_words( $html, $width = 100, $append = '&hellip;' ) {

		echo publisher_html_limit_words( $html, $width, $append ); // escaped before
	}
}


if ( ! function_exists( 'publisher_strpos_array' ) ) {

	/**
	 * Used to find first element with string inside array
	 *
	 * @param     $haystack_string
	 * @param     $needle_array
	 * @param int $offset
	 *
	 * @return bool
	 */
	function publisher_strpos_array( $haystack_string, $needle_array, $offset = 0 ) {

		foreach ( $needle_array as $query ) {
			if ( strpos( $haystack_string, $query, $offset ) !== false ) {
				return true;
			}
		}

		return false;
	}
} // publisher_strpos_array


if ( ! function_exists( 'publisher_edit_post_link' ) ) {
	/**
	 * Returns edit link for post
	 * 2x quicker than WP function!
	 */
	function publisher_edit_post_link( $echo = true ) {

		if ( ! bf_is_user_logged_in() ) {
			return '';
		}

		$link = get_edit_post_link();
		$out  = '';

		if ( $link ) {
			$out = '<a class="post-edit-link" href="' . $link . '">' . publisher_translation_get( 'edit_post' ) . '</a>';
		}

		if ( $echo ) {
			echo $out;
		} else {
			return $out;
		}
	}
}


if ( ! function_exists( 'bf_get_block_size' ) ) {

	/**
	 * Get size of the current vc block
	 *
	 * @since 3.0.1
	 *
	 * @param int    $round
	 * @param string $up_or_down
	 *
	 * @return int
	 */
	function publisher_get_block_size( $round = 100, $up_or_down = 'up' ) {

		static $cache = array();

		$vc_state = bf_vc_layout_state();

		// is currently in the sidebar
		$current_sidebar = bf_get_current_sidebar();
		$cache_key       = $vc_state['column']['width'] . $vc_state['row']['width'] .
		                   $vc_state['column']['list_count'] . $round . $up_or_down . $current_sidebar;

		if ( isset( $cache[ $cache_key ] ) ) {
			return $cache[ $cache_key ];
		}

		{ # Calculate Available width in current position

			$sidebars_count = 0;

			//
			// is inside Injection location?
			//
			if ( function_exists( 'publisher_inject_location_get_status' ) && publisher_inject_location_get_status() ) {
				$sidebars_count = 0;
			} else {
				/**
				 * Get number of sidebars from page layout config
				 */
				preg_match( '/^(\d+)\-col\-?(.*?)$/', publisher_get_page_layout(), $match );

				if ( ! empty( $match[2] ) ) {
					$sidebars_count = $match[1] - 1;
				}
			}

			// site columns number
			$layout_columns = $sidebars_count + 1;

			if ( $layout_columns > 1 ) {
				$layout_options = publisher_get_option( "layout-$layout_columns-col" );
			} else {

				$_width_of_column = isset( $match[1] ) ? $match[1] : 1;// width of 2 or 3 column layout
				$_width_of_column = $_width_of_column == 1 ? 2 : $_width_of_column;

				$layout_options = publisher_get_option( "layout-$_width_of_column-col" );
			}

			if ( $current_sidebar ) {

				$which_sidebar = 'primary-sidebar' === $current_sidebar ? 'primary' : 'secondary';
				if ( isset( $layout_options[ $which_sidebar ] ) ) {
					$available_width_per = $layout_options[ $which_sidebar ];// available width in percentage
					$consider_gap        = false;
				} else {
					$available_width_per = 100;
					$consider_gap        = false;
				}
			} else {

				$available_width_per = $layout_columns > 1 ? $layout_options['content'] : 100;// available width in percentage
				$consider_gap        = true;
			}

			$layout_options['width'] -= 50; # boxed left an right padding

			$available_width = ( $layout_options['width'] / 100 ) * $available_width_per; // Available width in px


			if ( $consider_gap ) {
				if ( $gap = publisher_get_option( 'layout_columns_space' ) ) { //

					$vc_columns       = $vc_state['column']['list_count'];
					$total_gap_column = ( $layout_columns ) + ( $vc_columns );


					$available_width -= $gap * $total_gap_column;
				}
			}

		}

		{ # Calculate size of the column

			$coefficient = 1;

			if ( isset( $vc_state['column']['width'] ) ) {

				$_explode = explode( '/', $vc_state['column']['width'] );
				$num      = $_explode[0];
				$denom    = isset( $_explode[1] ) ? $_explode[1] : null;

				if ( $num && $denom ) {
					$coefficient *= $num / $denom;
				}
			}

			if ( isset( $vc_state['row']['width'] ) ) {

				$_explode = explode( '/', $vc_state['row']['width'] );

				$num   = $_explode[0];
				$denom = isset( $_explode[1] ) ? $_explode[1] : null;

				if ( $num && $denom ) {
					$coefficient *= $num / $denom;
				}
			}

			// $scale = 1 / $coefficient;
		}

		$block_max_width = $available_width * $coefficient;


		if ( $up_or_down === 'down' ) {
			$res = floor( $block_max_width / $round );
		} else {
			$res = ceil( $block_max_width / $round );
		}

		$result              = $round === 100 ? $res : $res * $round;
		$cache[ $cache_key ] = $result;

		return $result;
	}
}


if ( ! function_exists( 'publisher_get_block_size_class' ) ) {

	/**
	 * Get class name which is related to current vc block width size
	 *
	 * @since 3.0.1
	 *
	 * @param int $size
	 *
	 * @return string
	 */
	function publisher_get_block_size_class( $size = 0 ) {

		$output = '';

		if ( ! $size ) {
			$size = publisher_get_block_size();
		}

		if ( $size ) {
			$output = "bsw-$size ";
		}

		return $output;
	}
}


if ( ! function_exists( 'publisher_echo_block_size_class' ) ) {

	/**
	 * Prints class name which is related to current vc block width size
	 *
	 * @since 3.0.1
	 *
	 * @param int $size
	 *
	 * @return string
	 */
	function publisher_echo_block_size_class( $size = 0 ) {

		echo publisher_get_block_size_class( $size );
	}
}
