<?php
/**
 * Single posts meta section
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$show_comments      = true;
$show_author        = true;
$show_author_avatar = true;
$show_date          = true;
$show_views         = true;

if ( publisher_get_prop( 'hide-meta-date', false ) ) {
	$show_date = false;
}

if ( publisher_get_prop( 'hide-meta-comment', false ) || ! comments_open() ) {
	$show_comments = false;
}

if ( publisher_get_prop( 'hide-meta-author', false ) ) {
	$show_author = false;
}

if ( publisher_get_prop( 'hide-meta-author-avatar', false ) ) {
	$show_author_avatar = false;
}

if ( publisher_get_prop( 'hide-meta-views', false ) ) {
	$show_views = false;
}

?>
<div <?php publisher_attr( 'post-meta', 'single-post-meta' ); ?>>
	<?php

	if ( $show_author || $show_author_avatar ) {

		$author_ID = get_the_author_meta( 'ID' );

		?>
		<a href="<?php echo esc_url( get_author_posts_url( $author_ID ) ); ?>"
		   title="<?php echo publisher_translation_esc_attr( 'browse_auth_articles' ); ?>"
		   class="post-author-a post-author-avatar">
			<?php

			if ( $show_author_avatar ) {
				echo get_avatar( $author_ID, 26 );
			}

			if ( $show_author ) {

				?><span class="post-author-name"><?php

				$by_label = str_replace( '%s', '<b>%s</b>', publisher_translation_get( 'pm_by' ) );

				printf( $by_label, get_the_author() );

				?></span><?php
			}

			?>
		</a>
		<?php

	}


	if ( $show_date ) {

		global $post;

		$post_settings = publisher_get_option( 'post-page-settings' );

		if ( ! isset( $post_settings['meta']['date_type'] ) ) {
			$post_settings['meta']['date_type'] = 'one';
		}

		// date fields
		if ( $post_settings['meta']['date_type'] === 'one' ) {
			$date = array(
				'one' => '',
			);
		} elseif ( $post_settings['meta']['date_type'] === 'both' ) {
			$date = array(
				'created' => '',
				'updated' => '',
			);
		} else {
			$date = array(
				'created' => '',
			);
		}

		foreach ( $date as $_date => $date_v ) {

			if ( $_date === 'one' ) {

				// Detecting post edit
				if ( $post->post_date === $post->post_modified ) {
					$label    = str_replace( '%s', '<b>%s</b>', publisher_translation_get( 'pm_on' ) );
					$time_raw = $post->post_date;
					$time     = get_the_time( publisher_translation_get( 'post_time' ) );
				} else {
					$label    = str_replace( '%s', '<b>%s</b>', publisher_translation_get( 'pm_last_updated' ) );
					$time_raw = $post->post_modified;
					$time     = get_post_modified_time( publisher_translation_get( 'post_time' ), false, NULL, true );
				}

			} elseif ( $_date == 'created' ) {

				$label    = str_replace( '%s', '<b>%s</b>', publisher_translation_get( 'pm_on' ) );
				$time_raw = $post->post_date;
				$time     = get_the_time( publisher_translation_get( 'post_time' ) );

			} else {

				// don't show if update time is not available
				if ( $post->post_date === $post->post_modified ) {
					continue;
				} else {
					$label    = str_replace( '%s', '<b>%s</b>', publisher_translation_get( 'pm_last_updated' ) );
					$time_raw = $post->post_modified;
					$time     = get_post_modified_time( publisher_translation_get( 'post_time' ), false, NULL, true );
				}
			}

			?>
			<span class="time"><time class="post-published updated"
			                         datetime="<?php echo mysql2date( DATE_W3C, $time_raw, false ); ?>"><?php

					printf( $label, $time );

					?></time></span>
			<?php

		} // foreach

	}


	if ( $show_views && function_exists( 'The_Better_Views_Count' ) ) {

		$rank = publisher_get_ranking_icon( The_Better_Views_Count(), 'views_ranking', 'fa-eye', true );

		if ( isset( $rank['show'] ) && $rank['show'] ) {

			$id = isset( $rank['id'] ) ? $rank['id'] : '';

			The_Better_Views(
				true,
				'<span class="views post-meta-views ' . $id . '" data-bpv-post="' . get_the_ID() . '">' . $rank['icon'] . ' ',
				'</span>',
				'show',
				'%VIEW_COUNT%'
			);
		}
	}


	if ( $show_comments && comments_open() ) {

		$title  = apply_filters( 'better-studio/theme/meta/comments/title', publisher_get_the_title() );
		$link   = apply_filters( 'better-studio/theme/meta/comments/link', publisher_get_comments_link() );
		$number = apply_filters( 'better-studio/theme/meta/comments/number', publisher_get_comments_number() );

		$text = '<i class="fa fa-comments-o"></i> ' . apply_filters( 'better-studio/themes/meta/comments/text', $number );

		echo sprintf( '<a href="%1$s" title="%2$s" class="comments">%3$s</a>',
			esc_url( $link ),
			esc_attr( sprintf( publisher_translation_get( 'leave_comment_on' ), $title ) ),
			$text
		);

	}

	?>
</div>
