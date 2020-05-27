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
 * Functions for loading template parts.
 *
 * @package    BS Theme Core
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2017, BetterStudio
 */

if ( ! function_exists( 'publisher_get_content_template' ) ) {
	/**
	 * Loads a post content template based off the post type and/or the post format.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	function publisher_get_content_template() {

		// Set up an empty array and get the post type.
		$templates = array();
		$post_type = get_post_type();

		$style = publisher_get_style();

		// fix for new structure
		if ( $style == 'default' ) {
			$style = 'general';
		}

		// Fix for bbPress views & custom views.
		// bbPress does not sets 'post type' for views, replies, reply edit...!
		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			$post_type = 'forum';
		}

		// Template based on the format if post type supports the post format.
		if ( post_type_supports( $post_type, 'post-formats' ) ) {

			if ( ! $post_format = publisher_get_post_format() ) {
				$post_format = 'standard';
			}

			// Template based off the post format.
			$templates[] = "views/{$style}/{$post_type}/content-{$post_format}.php";

			// Fallback to general template
			if ( $style != 'general' ) {
				$templates[] = "views/general/{$post_type}/content-{$post_format}.php";
			}
		}

		// Custom page template support
		if ( is_singular( 'page' ) && basename( get_page_template_slug() ) != '' ) {
			$templates[] = "views/{$style}/{$post_type}/template-" . basename( get_page_template_slug() );
		}

		$templates[] = "views/{$style}/{$post_type}/content-" . get_the_ID() . ".php";

		// Fallback to 'content.php' template.
		$templates[] = "views/{$style}/{$post_type}/content.php";

		if ( $style != 'general' ) {
			// Fallback to 'content.php' template.
			$templates[] = "views/general/{$post_type}/content.php";
		}

		if ( $post_type != 'post' ) {
			$templates[] = "views/{$style}/post/content.php";
		}

		if ( $style != 'general' ) {
			$templates[] = 'views/general/post/content.php';
		}


		// Allow developers to filter the content template hierarchy.
		$templates = apply_filters( 'publisher-theme-core/content-template', $templates );

		// Return the found content template.
		include locate_template( $templates, false, false );

	} // publisher_get_content_template
} // if


if ( ! function_exists( 'publisher_the_excerpt' ) ) {
	/**
	 * Used to get excerpt of post, Supports word truncation on custom excerpts
	 *
	 * @param   integer|null $length       Length of final excerpt words
	 * @param   string|null  $text         Excerpt manual text
	 * @param   bool         $echo         Echo or return
	 * @param   bool         $post_formats Exception handler to show full content of post formats
	 *
	 * @return string
	 */
	function publisher_the_excerpt( $length = 115, $text = NULL, $echo = true, $post_formats = false ) {

		// Post format exception to show post full content
		if ( $post_formats ) {

			$_check = array(
				'quote' => '',
				'chat'  => '',
			);

			if ( isset( $_check[ publisher_get_post_format() ] ) ) {

				if ( in_the_loop() ) {
					$text = get_the_content( '' );
				} else {
					global $post;
					$text = apply_filters( 'the_content', $post->post_content );
				}

				if ( $echo ) {
					echo $text;

					return;
				} else {
					return $text;
				}
			}
		}

		// If text not defined get excerpt
		if ( ! $text ) {


			// Manual excerpt should be contracted or not?
			if ( $length <= 0 ) {

				$text = get_the_excerpt();

				if ( empty( $text ) ) {

					if ( in_the_loop() ) {
						$text = get_the_content( '' );
					} else {
						global $post;
						$text = $post->post_content;
					}

					if ( $length <= 0 ) {
						$length = 115;
					}

				} else {
					if ( $echo ) {

						echo $text;

						return;
					} else {
						return apply_filters( 'the_excerpt', $text );
					}
				}

			} else {


				global $post;

				if ( ! empty( $post->post_excerpt ) ) {
					$text = $post->post_excerpt;
				} else {

					if ( in_the_loop() ) {
						$text = get_the_content( '' );
					} else {
						global $post;
						$text = $post->post_content;
					}
				}

			}
		}


		$text = preg_replace( '/\[caption(.*)\[\/caption\]/i', '', $text );
		$text = preg_replace( '/\[[^\]]*\]/', '', $text );
		$text = wp_kses( $text, 'strip' );

		// get plaintext excerpt trimmed to right length
		if ( $length > 0 ) {
			$excerpt = publisher_html_limit_words( $text, $length, '&hellip;' );
		} else {
			$excerpt = $text;
		}

		// fix extra spaces
		$excerpt = str_replace( '&nbsp;', ' ', $excerpt );

		if ( $echo ) {
			echo $excerpt;
		} else {
			return $excerpt;
		}
	} // publisher_the_excerpt
} // if


if ( ! function_exists( 'publisher_the_content' ) ) {
	/**
	 * Used to get excerpt of post, Supports word truncation on custom excerpts
	 *
	 * @param   string $more_link_text Optional. Content for when there is more text.
	 * @param   bool   $strip_teaser   Optional. Strip teaser content before the more text. Default is false.
	 * @param   bool   $echo           Echo or return
	 *
	 * @return string
	 */
	function publisher_the_content( $more_link_text = NULL, $strip_teaser = false, $echo = true ) {

		// Post Links
		$post_links_attr = array(
			'before'   => '<div class="pagination bs-numbered-pagination bs-post-pagination" itemprop="pagination"><span class="span pages">' . publisher_translation_get( 'post_pages' ) . ' </span>',
			'after'    => '</div>',
			'echo'     => 0,
			'pagelink' => '<span>%</span>',
		);

		// Gallery post format
		if ( publisher_get_post_format() == 'gallery' ) {

			$content = get_the_content( $more_link_text, $strip_teaser );

			$content = publisher_strip_first_shortcode_gallery( $content );

			$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );

		} // All Post Formats
		else {

			$content = '';
			$content .= apply_filters( 'the_content', get_the_content( $more_link_text, $strip_teaser ) );
		}

		global $multipage;

		if ( $multipage ) {

			$pagination = wp_link_pages( $post_links_attr );

			$pagination_position = publisher_get_option( 'post_pagination_position' );

			if ( is_null( $pagination_position ) ) {
				$pagination_position = 'bottom';
			}

			if ( $pagination_position === 'top' || $pagination_position === 'both' ) {
				$content = $pagination . $content;
			}

			if ( $pagination_position === 'bottom' || $pagination_position === 'both' ) {
				$content .= $pagination;
			}
		}

		if ( $echo ) {
			echo $content; // escaped before
		} else {
			return $content;
		}
	} // publisher_the_content
} // if


if ( ! function_exists( 'publisher_get_related_posts_args' ) ) {
	/**
	 * Get Related Posts
	 *
	 * @param integer      $count  number of posts to return
	 * @param string       $type
	 * @param integer|null $post_id
	 * @param array        $params query extra arguments
	 *
	 * @return array  query args array
	 */
	function publisher_get_related_posts_args( $count = 5, $type = 'cat', $post_id = NULL, $params = array() ) {

		$post = get_post( $post_id );

		if ( ! $post_id && isset( $post->ID ) ) {
			$post_id = $post->ID;
		}

		$args = array(
			'post_type'           => $post->post_type,
			'posts_per_page'      => $count,
			'post__not_in'        => array( $post_id ),
			'ignore_sticky_posts' => true,
		);

		switch ( $type ) {

			case 'cat':
				$args['category__in'] = wp_get_post_categories( $post_id );
				break;

			case 'tag':
				$tag_in = wp_get_object_terms( $post_id, 'post_tag', array( 'fields' => 'ids' ) );
				if ( $tag_in && ! is_wp_error( $tag_in ) ) {

					$args['tag__in'] = $tag_in;
				}
				break;

			case 'author':
				if ( isset( $post->post_author ) ) {
					$args['author'] = $post->post_author;
				}
				break;

			case 'cat-tag':
				$args['category__in'] = wp_get_post_categories( $post_id );
				$args['tag__in']      = wp_get_object_terms( $post_id, 'post_tag', array( 'fields' => 'ids' ) );
				break;

			case 'cat-tag-author':
				$args['category__in'] = wp_get_post_categories( $post_id );

				if ( isset( $post->post_author ) ) {
					$args['author'] = $post->post_author;
				}

				$tag_in = wp_get_object_terms( $post_id, 'post_tag', array( 'fields' => 'ids' ) );

				if ( $tag_in && ! is_wp_error( $tag_in ) ) {
					$args['tag__in'] = $tag_in;
				}
				break;

			case 'rand':
			case 'random':
			case 'randomly':
				$args['orderby'] = 'rand';
				break;

		}

		if ( $params ) {
			$args = array_merge( $args, $params );
		}

		return apply_filters( 'publisher-theme-core/related-posts/args', $args );

	} // publisher_get_related_posts_args
} // if


if ( ! function_exists( 'publisher_get_post_primary_cat' ) ) {
	/**
	 * Returns post main category object
	 *
	 * @return array|mixed|null|object|\WP_Error
	 */
	function publisher_get_post_primary_cat() {

		return bf_get_post_primary_cat();
	} // publisher_get_post_primary_cat
} // if


if ( ! function_exists( 'publisher_term_badge_items' ) ) {
	/**
	 * Handy function used to get post term badge items
	 *
	 * @param integer $terms_count Terms count, Default only primary or first term
	 * @param string  $taxonomy    Category or custom taxonomy
	 *
	 * @return array
	 */
	function publisher_term_badge_items( $terms_count = 1, $taxonomy = 'category' ) {

		$prim_term   = false;
		$final_terms = array();

		// Current post type supports this  taxonomy
		if ( ! bf_taxonomy_supports_post_type( $taxonomy, get_post_type() ) ) {
			return $final_terms;
		}

		//
		// Prim-category is only for category taxonomy
		//
		if ( $taxonomy === 'category' ) {

			$prim_term = publisher_get_post_primary_cat();

			// Show prim cat at first
			if ( $prim_term && ! is_wp_error( $prim_term ) && has_category( $prim_term ) ) {
				$final_terms[] = $prim_term;
			} else {
				$prim_term = false;
			}
		}

		// lower than 1 means all
		if ( $terms_count < 1 ) {
			$terms_count = 999;
		}

		$_collected = count( $final_terms );

		if ( $_collected < $terms_count ) {

			$terms = get_the_terms( get_the_ID(), $taxonomy );

			foreach ( $terms as $_term ) {

				if ( $_collected >= $terms_count ) {
					break;
				}

				if ( $prim_term && $_term->term_id === $prim_term->term_id ) {
					continue;
				}

				$final_terms[] = $_term;
				$_collected ++;
			}
		}

		return $final_terms;
	} // publisher_term_badge_items
} // if


if ( ! function_exists( 'publisher_cats_badge_code' ) ) {
	/**
	 * Handy function used to get post category badge
	 *
	 * @param   integer $cats_count Categories count, Default only primary or first cat
	 * @param   string  $sep        Separator for categories
	 * @param   bool    $show_format
	 * @param   bool    $echo       Echo or return
	 * @param   string  $class
	 * @param   bool    $show_cats
	 *
	 * @return string|void
	 */
	function publisher_cats_badge_code( $cats_count = 1, $sep = '', $show_format = false, $echo = true, $class = '', $show_cats = true ) {

		$output   = '';
		$cat_code = array();

		// Add post format icon
		if ( $show_format ) {

			$format = publisher_get_post_format();

			if ( $format ) {
				$output .= publisher_format_badge_code( false );
			}
		}

		// Taxonomy of terms badge
		$taxonomy = publisher_get_prop( 'term-badge-tax', 'category' );

		if ( $show_cats && bf_taxonomy_supports_post_type( $taxonomy, get_post_type() ) ) {

			$terms = get_the_terms( get_the_ID(), $taxonomy );

			//
			// Prim-category is only for category taxonomy
			//
			if ( $taxonomy === 'category' ) {
				$prim_cat = publisher_get_post_primary_cat();

				// Show prim cat at first
				if ( $prim_cat && ! is_wp_error( $prim_cat ) && has_category( $prim_cat ) ) {
					$prim_category = get_term( $prim_cat, 'category' );
					$cat_code[]    = '<span class="term-badge term-' . $prim_category->term_id . '"><a href="' . esc_url( get_category_link( $prim_category ) ) . '">' . esc_html( $prim_category->name ) . '</a></span>';
				}
			} else {
				$prim_cat = false;
			}

			// lower than 1 means all
			if ( $cats_count < 1 ) {
				$cats_count = 999;
			}

			$_collected = count( $cat_code );

			if ( $_collected < $cats_count && $terms ) {
				foreach ( $terms as $cat_id => $cat ) {

					if ( $_collected > $cats_count ) {
						break;
					} else {
						$_collected ++;
					}

					if ( $prim_cat && ! is_wp_error( $prim_cat ) && $cat->term_id == $prim_cat->term_id ) {
						continue;
					}

					$cat_code[] = '<span class="term-badge term-' . $cat->term_id . '"><a href="' . esc_url( bf_get_term_link( $cat, $taxonomy ) ) . '">' . esc_html( $cat->name ) . '</a></span>';
				}
			}

		} //  if tax support


		if ( ! empty( $cat_code ) ) {
			$output .= implode( $sep, $cat_code );
		}

		if ( ! empty( $output ) ) {
			$output = '<div class="term-badges ' . $class . '">' . $output . '</div>';
		}

		if ( $echo ) {
			echo $output; // escaped before
		} else {
			return $output;
		}

	} // publisher_cats_badge_code

} // if


if ( ! function_exists( 'publisher_listing_rank_badge' ) ) {

	/**
	 * Print raking badge html
	 *
	 * @param int $rank post raking
	 *
	 * @since 1.8.0
	 */
	function publisher_listing_rank_badge( $rank, $style = 't1-s1' ) {

		if ( ! $rank ) {
			return;
		}

		$style = explode( '-', $style );

		?>
		<div class="post-count-badge pcb-<?php echo $style[0]; ?> pcb-<?php echo $style[1]; ?>">
			<?php echo number_format_i18n( $rank ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'publisher_format_badge_code' ) ) {
	/**
	 * Handy function used to get post format badge
	 *
	 * @param   bool $echo Echo or return
	 *
	 * @return string
	 */
	function publisher_format_badge_code( $echo = true ) {

		$output = '';

		if ( get_post_type() == 'post' ) {

			$format = publisher_get_post_format();

			if ( $format ) {

				switch ( $format ) {

					case 'video':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-video-camera"></i> ' . publisher_translation_get( 'format_video' ) . '</a></span>';
						break;

					case 'aside':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-pencil"></i> ' . publisher_translation_get( 'format_aside' ) . '</a></span>';
						break;

					case 'quote':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-quote-left"></i> ' . publisher_translation_get( 'format_quote' ) . '</a></span>';
						break;

					case 'gallery':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-camera"></i> ' . publisher_translation_get( 'format_gallery' ) . '</a></span>';
						break;

					case 'image':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-camera"></i> ' . publisher_translation_get( 'format_image' ) . '</a></span>';
						break;

					case 'status':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-refresh"></i> ' . publisher_translation_get( 'format_status' ) . '</a></span>';
						break;

					case 'audio':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-music"></i> ' . publisher_translation_get( 'format_music' ) . '</a></span>';
						break;

					case 'chat':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-coffee"></i> ' . publisher_translation_get( 'format_chat' ) . '</a></span>';
						break;

					case 'link':
						$output = '<span class="format-badge format-' . $format . '"><a href="' . get_post_format_link( $format ) . '"><i class="fa fa-link"></i> ' . publisher_translation_get( 'format_link' ) . '</a></span>';
						break;

				}

			}

		}

		if ( $echo ) {
			echo $output; // escaped before
		} else {
			return $output;
		}

	} // publisher_format_badge_code
} // if

if ( function_exists( 'publisher_translation_get' ) ) {
	add_filter( 'human_time_diff', 'publisher_human_time_diff_filter', 99, 2 );
}

if ( ! function_exists( 'publisher_human_time_diff_filter' ) ) {
	/**
	 * Function to get readable time of current post with translation panel support
	 *
	 * @param $since
	 * @param $diff
	 *
	 * @return string
	 */
	function publisher_human_time_diff_filter( $since, $diff ) {

		if ( ! function_exists( 'publisher_translation_get' ) ) {
			return $since;
		}

		/**
		 * Todo: Replace following IF's with the _n function -> this is another shit!
		 * but currently we don't this because of following bug in theme-check Plugin
		 * https://github.com/WordPress/theme-check/issues/180
		 */
		if ( $diff < HOUR_IN_SECONDS ) {

			$mins = round( $diff / MINUTE_IN_SECONDS );

			if ( $mins <= 1 ) {
				$mins = 1;
			}

			if ( intval( $mins ) > 1 ) {
				$since = sprintf( publisher_translation_get( 'readable_time_mins' ), $mins );
			} else {
				$since = sprintf( publisher_translation_get( 'readable_time_min' ), $mins );
			}

		} elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {

			$hours = round( $diff / HOUR_IN_SECONDS );

			if ( $hours <= 1 ) {
				$hours = 1;
			}

			if ( intval( $hours ) > 1 ) {
				$since = sprintf( publisher_translation_get( 'readable_time_hours' ), $hours );
			} else {
				$since = sprintf( publisher_translation_get( 'readable_time_hour' ), $hours );
			}

		} elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {

			$days = round( $diff / DAY_IN_SECONDS );

			if ( $days <= 1 ) {
				$days = 1;
			}

			if ( intval( $days ) > 1 ) {
				$since = sprintf( publisher_translation_get( 'readable_time_days' ), $days );
			} else {
				$since = sprintf( publisher_translation_get( 'readable_time_day' ), $days );
			}

		} elseif ( $diff < 30 * DAY_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {

			$weeks = round( $diff / WEEK_IN_SECONDS );

			if ( $weeks <= 1 ) {
				$weeks = 1;
			}

			if ( intval( $weeks ) > 1 ) {
				$since = sprintf( publisher_translation_get( 'readable_time_weeks' ), $weeks );
			} else {
				$since = sprintf( publisher_translation_get( 'readable_time_week' ), $weeks );
			}

		} elseif ( $diff < YEAR_IN_SECONDS && $diff >= 30 * DAY_IN_SECONDS ) {

			$months = round( $diff / ( 30 * DAY_IN_SECONDS ) );

			if ( $months <= 1 ) {
				$months = 1;
			}

			if ( intval( $months ) > 1 ) {
				$since = sprintf( publisher_translation_get( 'readable_time_months' ), $months );
			} else {
				$since = sprintf( publisher_translation_get( 'readable_time_month' ), $months );
			}

		} elseif ( $diff >= YEAR_IN_SECONDS ) {

			$years = round( $diff / YEAR_IN_SECONDS );

			if ( $years <= 1 ) {
				$years = 1;
			}

			if ( intval( $years ) > 1 ) {
				$since = sprintf( publisher_translation_get( 'readable_time_years' ), $years );
			} else {
				$since = sprintf( publisher_translation_get( 'readable_time_year' ), $years );
			}

		}

		return $since;
	} // publisher_human_time_diff_filter

} // if


if ( ! function_exists( 'publisher_get_readable_date' ) ) {
	/**
	 * Used to get readable time
	 *
	 * @param null $date
	 *
	 * @return string
	 */
	function publisher_get_readable_date( $date = NULL ) {

		if ( is_null( $date ) ) {
			$date = get_post_time( 'G', true, NULL, true );
		}

		return sprintf( publisher_translation_get( 'readable_time_ago' ), human_time_diff( $date ) );
	} // publisher_get_readable_date
} // if


if ( ! function_exists( 'publisher_get_first_gallery_ids' ) ) {
	/**
	 * Used For Retrieving Post First Gallery and Return Attachment IDs
	 *
	 * @param null $content
	 *
	 * @return array|bool
	 */
	function publisher_get_first_gallery_ids( $content = NULL ) {

		// when current not defined
		if ( ! $content ) {
			global $post;

			$content = $post->post_content;
		}

		preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

		if ( ! empty( $matches ) ) {

			foreach ( $matches as $shortcode ) {

				if ( 'gallery' === $shortcode[2] ) {

					$atts = shortcode_parse_atts( $shortcode[3] );

					if ( ! empty( $atts['ids'] ) ) {
						$ids = explode( ',', $atts['ids'] );

						return $ids;
					}
				}
			}
		}

		return false;
	} // publisher_get_first_gallery_ids
} // if


if ( ! function_exists( 'publisher_archive_total_badge_code' ) ) {
	/**
	 * prints archive pages badges
	 */
	function publisher_archive_total_badge_code( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'wrapper_before' => '<div class="archive-badges term-badges">',
			'wrapper_after'  => '</div>',
			'before'         => '<span class="archive-badge term-badge">',
			'after'          => '</span>',
			'limit'          => '',
		) );

		// calculate limits and type
		if ( is_year() ) {

			if ( empty( $args['limit'] ) ) {
				$args['limit'] = 10;
			}

			$type = 'yearly';

		} elseif ( is_month() ) {

			if ( empty( $args['limit'] ) ) {
				$args['limit'] = 7;
			}

			$type = 'monthly';

		} elseif ( is_day() ) {

			if ( empty( $args['limit'] ) ) {
				$args['limit'] = 5;
			}

			$type = 'daily';

		} else {
			return;
		}

		$post_type      = 'post';
		$queried_object = get_queried_object();

		if ( $queried_object instanceof WP_Post_Type ) { #  WP >= 4.6.0

			$post_type = $queried_object->name;

		} elseif ( $queried_object instanceof WP_Post ) { #  WP < 4.6.0

			$post_type = $queried_object->post_type;
		}

		echo $args['wrapper_before']; // escaped before

		wp_get_archives( array(
			'limit'     => $args['limit'],
			'type'      => $type,
			'format'    => 'anchor',
			'before'    => $args['before'],
			'after'     => $args['after'],
			'post_type' => $post_type,
		) );

		echo $args['wrapper_after']; // escaped before

	}
} // if


if ( ! function_exists( 'publisher_strip_first_shortcode_gallery' ) ) {
	/**
	 * Deletes First Gallery Shortcode and Returns Content
	 *
	 * @param string $content
	 *
	 * @return mixed|string
	 */
	function publisher_strip_first_shortcode_gallery( $content = '' ) {

		preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

		if ( ! empty( $matches ) ) {

			foreach ( $matches as $shortcode ) {

				if ( $shortcode[2] === 'gallery' ) {

					$pos = strpos( $content, $shortcode[0] );

					if ( $pos !== false ) {
						return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
					}
				}
			}
		}

		return $content;

	} // publisher_strip_first_shortcode_gallery
} // if


if ( ! function_exists( 'publisher_get_post_thumbnail_src' ) ) {
	/**
	 * Handy function to get post thumbnail src
	 *
	 * @param string $size    Featured image size
	 *
	 * @param null   $post_id Post ID
	 * @param null   $thumbnail_id
	 *
	 * @return string
	 */
	function publisher_get_post_thumbnail_src( $size = 'thumbnail', $post_id = NULL, $thumbnail_id = NULL ) {

		$post_id = ( NULL === $post_id ) ? get_the_ID() : $post_id;

		if ( is_null( $thumbnail_id ) ) {
			$thumbnail_id = get_post_thumbnail_id( $post_id );
		}

		if ( $attachment = wp_get_attachment_image_src( $thumbnail_id, $size ) ) {
			return $attachment[0];
		}

		return '';
	}
} // if


if ( ! function_exists( 'publisher_get_media_src' ) ) {
	/**
	 * Handy function to media src
	 *
	 * @param null   $media_id
	 * @param string $size Featured image size
	 *
	 * @return string
	 */
	function publisher_get_media_src( $media_id = NULL, $size = 'thumbnail' ) {

		$media_id = ( NULL === $media_id ) ? get_the_ID() : $media_id;

		if ( is_null( $media_id ) ) {
			return publisher_get_post_thumbnail_src( $size ); // return current post thumbnail src for size!
		}

		if ( $attachment = wp_get_attachment_image_src( $media_id, $size ) ) {
			return $attachment[0];
		}

		return '';
	} // publisher_get_media_src
} // if


if ( ! function_exists( 'publisher_has_tag' ) ) {
	/**
	 * Wrapper function for WP has_tag for enable it to be customized from theme or child theme
	 *
	 * @return string
	 */
	function publisher_has_tag() {

		return has_tag();
	}
}


if ( ! function_exists( 'publisher_has_category' ) ) {
	/**
	 * Wrapper function for WP has_category for enable it to be customized from theme or child theme
	 *
	 * @return string
	 */
	function publisher_has_category() {

		return has_category();
	}
}


if ( ! function_exists( 'publisher_is_thumbnail_placeholder_active' ) ) {
	/**
	 * Handy function used to check thumbnails placeholder is active or not!
	 * This can be override in theme for more functionality
	 *
	 * @return bool
	 */
	function publisher_is_thumbnail_placeholder_active() {

		static $active;

		if ( is_null( $active ) ) {
			$active = (bool) publisher_get_option( 'bsbt_thumbnail_placeholder' );
		}

		return $active;
	}
}


if ( ! function_exists( 'publisher_is_thumbnail_first_img_active' ) ) {
	/**
	 * Handy function used to check thumbnails first image is active or not!
	 * This can be override in theme for more functionality
	 *
	 * @return bool
	 */
	function publisher_is_thumbnail_first_img_active() {

		static $active;

		if ( is_null( $active ) ) {
			$active = (bool) publisher_get_option( 'bsbt_thumbnail_first_img' );
		}

		return $active;
	}
}


if ( ! function_exists( 'publisher_has_post_thumbnail' ) ) {
	/**
	 * Handy function fo checking to post have post thumbnail or not
	 *
	 * @param null $post_id
	 *
	 * @return bool
	 */
	function publisher_has_post_thumbnail( $post_id = NULL ) {

		if ( is_null( $post_id ) ) {
			$post    = get_post();
			$post_id = $post->ID;
		}

		if ( has_post_thumbnail( $post_id ) ) {
			return true;
		}

		return (bool) publisher_is_thumbnail_placeholder_active();
	}
}


if ( ! function_exists( 'publisher_get_thumbnail' ) ) {
	/**
	 * Used to get thumbnail image for posts with support of default thumbnail image
	 *
	 * @param string $thumbnail_size
	 * @param null   $post_id
	 * @param bool   $animated_thumbnail
	 *
	 * @return string
	 */
	function publisher_get_thumbnail( $thumbnail_size = 'thumbnail', $post_id = NULL, $animated_thumbnail = true ) {

		$cache_id = 'thumbnail_' . $thumbnail_size;

		$data = publisher_get_post_cache( $cache_id );

		if ( ! is_null( $data ) ) {
			return $data;
		}

		if ( is_null( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

		if ( $thumbnail_id ) {

			$img = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size );

			$thumbnail = array(
				'id'          => $thumbnail_id,
				'src'         => $img[0],
				'width'       => $img[1],
				'height'      => $img[2],
				'alt'         => '',
				'caption'     => '',
				'description' => '',
				'title'       => publisher_the_title_attribute( '', '', false ),
			);

			// Full size of animated image for thumbnail
			// todo add gif resize for this to don't load full image
			if ( $animated_thumbnail && publisher_is_animated_thumbnail_active() ) {

				$check = wp_check_filetype( $img[0] );

				if ( $check['ext'] == 'gif' ) {
					$img                          = wp_get_attachment_image_src( $thumbnail_id, 'full' );
					$thumbnail['src']             = $img[0];
					$thumbnail['width']           = $img[1];
					$thumbnail['height']          = $img[2];
					$thumbnail['skip_smart_lazy'] = true;
				}
			}

			$img_post = get_post( $thumbnail_id );

			if ( ! is_null( $img_post ) ) {
				$thumbnail['alt']         = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
				$thumbnail['caption']     = $img_post->post_excerpt;
				$thumbnail['description'] = $img_post->post_content;
			}

			publisher_set_post_cache( $cache_id, $thumbnail );

			return $thumbnail;
		}

		$img = array(
			'id'          => '',
			'src'         => '',
			'width'       => '',
			'height'      => '',
			'alt'         => '',
			'caption'     => '',
			'description' => '',
			'title'       => publisher_the_title_attribute( '', '', false ),
		);

		if ( publisher_is_thumbnail_first_img_active() ) {
			global $post;
			if ( isset( $post->post_content ) ) {
				if ( preg_match( "'<\s*img\s.*?src\s*=\s*
						([\"\'])?
						(?(1) (.*?)\\1 | ([^\s\>]+))'isx", $post->post_content, $matched ) ) {

					$img['src'] = esc_url( $matched[2] );

					publisher_set_post_cache( $cache_id, $img );

					return $img;
				}
			}
		}

		if ( ! publisher_is_thumbnail_placeholder_active() ) {

			publisher_set_post_cache( $cache_id, $img );

			return $img;
		}

		global $_wp_additional_image_sizes;

		if ( isset( $_wp_additional_image_sizes[ $thumbnail_size ] ) ) {
			$img['width']  = $_wp_additional_image_sizes[ $thumbnail_size ]['width'];
			$img['height'] = $_wp_additional_image_sizes[ $thumbnail_size ]['height'];
		}

		// Default image from panel
		if ( publisher_get_option( 'bsbt_default_thumbnail' ) ) {
			$img['src'] = publisher_get_post_thumbnail_src( $thumbnail_size, $post_id, publisher_get_option( 'bsbt_default_thumbnail' ) );
			if ( ! empty( $img['src'] ) ) // check for valid size!
			{
				// return thumbnail id
				$img['id'] = publisher_get_option( 'bsbt_default_thumbnail' );

				// Full size of animated image for thumbnail
				if ( $animated_thumbnail && publisher_is_animated_thumbnail_active() ) {

					$check = wp_check_filetype( $img['src'] );

					if ( $check['ext'] == 'gif' ) {
						$img['src'] = publisher_get_post_thumbnail_src( 'full', $post_id, publisher_get_option( 'bsbt_default_thumbnail' ) );
					}
				}

				publisher_set_post_cache( $cache_id, $img );

				return $img;
			}
		}

		$img['src'] = PUBLISHER_THEME_URI . 'images/default-thumb/' . $thumbnail_size . '.png';

		publisher_set_post_cache( $cache_id, $img );

		return $img;

	} // publisher_get_thumbnail
} // if


if ( ! function_exists( 'publisher_is_animated_thumbnail_active' ) ) {
	/**
	 * Returns the condition of animated thumbnail activation
	 *
	 * @return bool
	 */
	function publisher_is_animated_thumbnail_active() {

		return false;
	}
}


if ( ! function_exists( 'publisher_get_attachment_parent' ) ) {
	/**
	 * Used to get attachment valid parent post ID
	 *
	 * @return int
	 */
	function publisher_get_attachment_parent( $attachment_id = NULL ) {

		if ( empty( $attachment_id ) && isset( $GLOBALS['post'] ) ) {
			$attachment = $GLOBALS['post'];
		} else {
			$attachment = get_post( $attachment_id );
		}

		// validate attachment
		if ( ! $attachment || is_wp_error( $attachment ) ) {
			return false;
		}

		$parent = false;

		if ( ! empty( $attachment->post_parent ) ) {
			$parent = get_post( $attachment->post_parent );
			if ( ! $parent || is_wp_error( $parent ) ) {
				$parent = false;
			}
		}

		return $parent;
	}
} // publisher_get_attachment_parent

