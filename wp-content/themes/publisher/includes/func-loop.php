<?php


if ( ! function_exists( 'publisher_the_post' ) ) {
	/**
	 * Overrided to support "after x posts ad" automatically.
	 *
	 * Custom the_post for custom counter functionality
	 */
	function publisher_the_post() {

		// If count customized
		if ( publisher_get_prop( 'posts-count', null ) != null ) {
			publisher_set_prop( 'posts-counter', absint( publisher_get_prop( 'posts-counter', 1 ) ) + 1 );
		}


		//
		// Injects ad after x number of posts
		//
		{
			if ( publisher_is_ad_plugin_active() ) {
				$inject_ads = publisher_get_prop( 'block-ad', false );
			} else {
				$inject_ads = false;
			}

			if ( $inject_ads ) {

				//
				// Smart after x post ads in ajax pagination
				///
				if ( bf_is_doing_ajax() ) {
					$paged          = publisher_get_query()->get( 'paged', 2 ) - 1;
					$posts_per_page = publisher_get_query()->get( 'posts_per_page', 1 );
					$current_plus   = ( $paged * $posts_per_page ) + publisher_get_query()->current_post + 1;
				} else {
					$current_plus = publisher_get_query()->current_post + 1;
				}

				$inject_ads_after = $inject_ads['after_each'];

				if ( $inject_ads_after &&
				     $current_plus > 1 &&
				     ( ( $current_plus % $inject_ads_after ) === 0 )
				) {
					publisher_show_after_posts_ad( array(
						'class' => publisher_get_prop( 'block-ad-class', '' ),
						'ad'    => $inject_ads,
					) );
				}
			}
		}


		// Do default the_post
		publisher_get_query()->the_post();

		// Clear post cache for this post
		publisher_clear_post_cache();
	}
}


if ( ! function_exists( 'publisher_is_singular' ) ) {

	/**
	 * Is the query for an existing single post of any post type (post, attachment, page, ... )?
	 *
	 * @param string $post_types
	 *
	 * @since 4.0.0
	 * @return bool Whether the query is for an existing single post of any of the given post types.
	 */
	function publisher_is_singular( $post_types = '' ) {

		$is_singular = is_singular( $post_types );

		if ( ! $is_singular ) {

			$queried_object = get_queried_object();

			// "The Event Calendar" Plugin Hot Fix

			$is_singular =
				$queried_object instanceof WP_Post_Type && 'tribe_events' === $queried_object->name ||  #  WP >= 4.6.0
				$queried_object instanceof WP_Post && 'tribe_events' === $queried_object->post_type;    #  WP < 4.6.0
		}

		return $is_singular;
	}
}


if ( ! function_exists( 'publisher_loop_meta' ) ) {
	/**
	 * Meta of loops
	 *
	 * @return bool
	 */
	function publisher_loop_meta() {

		$show_comments = true;
		$show_reviews  = publisher_is_review_active();
		$show_author   = true;
		$show_date     = true;
		$show_view     = true;
		$show_share    = true;


		/**
		 *
		 * Single Logic Conditions
		 *
		 */

		if ( publisher_get_prop( 'hide-meta-date', false ) ) {
			$show_date = false;
		}

		if ( ! function_exists( 'The_Better_Views_Count' ) || publisher_get_prop( 'hide-meta-view', false ) ) {
			$show_view = false;
		}

		if ( publisher_get_prop( 'hide-meta-share', false ) ) {
			$show_share = false;
		}

		if ( publisher_get_prop( 'hide-meta-comment', false ) || ! comments_open() ) {
			$show_comments = false;
		}

		if ( publisher_get_prop( 'hide-meta-author', false ) ) {
			$show_author = false;
		}

		if ( $show_reviews && publisher_get_prop( 'hide-meta-review', false ) ) {
			$show_reviews = false;
		}


		/**
		 *
		 * Multiple Logic Conditions
		 *
		 */

		// Hide comments to make space for review
		if ( $show_reviews && $show_comments && publisher_get_prop( 'hide-meta-comment-if-review', false ) ) {
			$show_comments = false;
		}

		// Hide author to make space for review
		if ( $show_reviews && $show_author && publisher_get_prop( 'hide-meta-author-if-review', 0 ) ) {
			$show_author = false;
		}

		?>
		<div class="post-meta">

			<?php if ( $show_author ) { ?>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"
				   title="<?php echo publisher_translation_echo( 'browse_auth_articles' ); ?>"
				   class="post-author-a">
					<i class="post-author author">
						<?php the_author(); ?>
					</i>
				</a>
			<?php }


			if ( $show_date ) {

				global $post;

				$date_type = publisher_get_prop( 'meta-date-format', 'standard' );

				?>
				<span class="time"><time class="post-published updated"
				                         datetime="<?php echo mysql2date( DATE_W3C, $post->post_date, false ); ?>"><?php
						if ( $date_type === 'standard' ) {
							the_time( publisher_translation_get( 'comment_time' ) );
						} else {

							switch ( $date_type ) {

								case 'readable':
									echo publisher_get_readable_date();
									break;

								case 'readable-month':

									if ( strtotime( $post->post_date ) < strtotime( 'first day of this month' ) ) {
										the_time( publisher_translation_get( 'comment_time' ) );
									} else {
										echo publisher_get_readable_date();
									}
									break;

								case 'readable-week':
									if ( strtotime( $post->post_date ) < strtotime( 'this week' ) ) {
										the_time( publisher_translation_get( 'comment_time' ) );
									} else {
										echo publisher_get_readable_date();
									}
									break;

								case 'readable-day':
									if ( strtotime( $post->post_date ) < strtotime( 'today' ) ) {
										the_time( publisher_translation_get( 'comment_time' ) );
									} else {
										echo publisher_get_readable_date();
									}
									break;

								default:
									echo publisher_get_readable_date();
							}

						}

						?></time></span>
				<?php
			}


			if ( $show_view ) {

				$rank = publisher_get_ranking_icon( The_Better_Views_Count(), 'views_ranking', 'fa-eye' );

				if ( isset( $rank['show'] ) && $rank['show'] ) {
					The_Better_Views(
						true,
						'<span class="views post-meta-views ' . $rank['id'] . '" data-bpv-post="' . get_the_ID() . '">' . $rank['icon'],
						'</span>',
						'show',
						'%VIEW_COUNT%'
					);
				}
			}


			if ( $show_share ) {

				$count = array_sum( bf_social_shares_count( publisher_get_option( 'social_share_sites' ) ) );
				$rank  = publisher_get_ranking_icon( $count, 'shares_ranking', 'fa-share-alt' );

				if ( isset( $rank['show'] ) && $rank['show'] ) {

					?>
					<span class="share <?php echo $rank['id']; ?>"><?php echo $rank['icon'], ' ', $count; ?></span>
					<?php

				}
			}


			if ( $show_reviews ) {
				publisher_get_rating();
			}


			if ( $show_comments ) {

				$title  = apply_filters( 'better-studio/theme/meta/comments/title', publisher_get_the_title() );
				$link   = apply_filters( 'better-studio/theme/meta/comments/link', publisher_get_comments_link() );
				$number = apply_filters( 'better-studio/theme/meta/comments/number', publisher_get_comments_number() );

				$text = '<i class="fa fa-comments-o"></i> ' . apply_filters( 'better-studio/themes/meta/comments/text', $number );

				echo sprintf( '<a href="%1$s" title="%2$s" class="comments">%3$s</a>',
					$link,
					esc_attr( sprintf( publisher_translation_get( 'leave_comment_on' ), $title ) ),
					$text
				);

			}

			?>
		</div>
		<?php

	} // publisher_loop_meta
}
