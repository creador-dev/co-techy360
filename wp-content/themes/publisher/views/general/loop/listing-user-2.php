<?php
/**
 * Thumbnail listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

if ( ! publisher_get_prop( 'block-customized', false ) ) {

	$block_settings = publisher_get_option( 'listing-user-2' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = NULL;

	publisher_set_prop( 'title-limit', $block_settings['title-limit'] );
	publisher_set_prop( 'social-icons', $block_settings['social-icons'] );
	publisher_set_prop( 'social-icons-limit', $block_settings['social-icons-limit'] );
	publisher_set_prop( 'show-biography', $block_settings['show-biography'] );
	publisher_set_prop( 'biography-limit', $block_settings['biography-limit'] );
	publisher_set_prop( 'show-posts-url', $block_settings['show-posts-url'] );
	publisher_set_prop( 'show-ranking', $block_settings['show-ranking'] );

}

$start_from     = publisher_get_prop( 'user-query-loop-offset', 0 );
$max_loop_count = publisher_get_prop( 'user-query-loop-count', - 1 );

$rank_init_offset = intval( publisher_get_ajax_var( 'user-rank-offset' ) );

/**
 * @var WP_User_Query $query
 */
$query        = publisher_get_prop( 'user-query' );
$show_ranking = publisher_get_prop( 'show-ranking' );

?>

	<div class="listing listing-user type-1 style-2 <?php publisher_echo_prop( 'listing-class' ); ?> clearfix">
		<?php

		$index   = - 1;
		$printed = 0;

		foreach ( $query->get_results() as $user ) {
			$index ++;

			if ( $index < $start_from ) {
				continue;
			}

			if ( $max_loop_count > 0 && $printed >= $max_loop_count ) {
				break;
			}

			if ( $show_ranking ) {
				publisher_set_prop( 'user-rank', $rank_init_offset + $index + 1 );
			}

			publisher_set_prop( 'user-object', $user );

			publisher_get_view( 'loop', 'listing-user-2-item' );
			$printed ++;
		}

		if ( $show_ranking ) {
			publisher_set_ajax_var( 'user-rank-offset', $rank_init_offset + $index + 1 );
		}
		?>
	</div>
<?php
