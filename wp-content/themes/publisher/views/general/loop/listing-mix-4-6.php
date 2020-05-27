<?php
/**
 * Mix listing 4-6 template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    3.0.0
 */

$_posts_count = publisher_get_prop( 'posts-count', 0 );

$block_settings = false;
if ( ! publisher_get_prop( 'block-customized', false ) ) {
	$block_settings = publisher_get_option( 'listing-mix-4-6' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = NULL;

}

//
// Base block level ad insertion check.
//
{
	$block_ad = publisher_get_prop( 'block-ad', false );

	if ( $block_ad['active_location'] ) {
		publisher_unset_prop( 'block-ad' ); // remove it to prevent auto ad insertion
		$inject_ads       = true;
		$inject_ads_after = $block_ad['after_each'];
	} else {
		$inject_ads       = false;
		$inject_ads_after = 0;
	}
}

?>
	<div class="listing listing-mix-4-6 <?php publisher_echo_prop( 'listing-class' ); ?>">
		<div class="item-inner clearfix">
			<?php

			publisher_set_prop( 'show-excerpt', true );

			$_counter = 0;
			while( publisher_have_posts() ) {

				publisher_set_prop( 'posts-count', 1 );

				if ( publisher_have_posts() ) {

					if ( $block_settings ) {

						publisher_set_prop( 'title-limit', $block_settings['big-title-limit'] );
						publisher_set_prop( 'excerpt-limit', $block_settings['big-excerpt-limit'] );
						publisher_set_prop( 'show-subtitle', $block_settings['big-subtitle'] );

						if ( $block_settings['big-subtitle'] ) {
							publisher_set_prop( 'subtitle-limit', $block_settings['big-subtitle-limit'] );
							publisher_set_prop( 'subtitle-location', $block_settings['big-subtitle-location'] );
						}

						publisher_set_prop( 'show-term-badge', $block_settings['big-term-badge'] );
						publisher_set_prop( 'term-badge-count', $block_settings['big-term-badge-count'] );
						publisher_set_prop( 'term-badge-tax', $block_settings['big-term-badge-tax'] );
						publisher_set_prop( 'show-format-icon', $block_settings['big-format-icon'] );
						publisher_set_prop( 'show-read-more', $block_settings['big-read-more'] );
						publisher_set_prop( 'show-meta', $block_settings['big-meta']['show'] );

						if ( $block_settings['big-meta']['show'] ) {
							publisher_set_prop( 'hide-meta-author', empty( $block_settings['big-meta']['author'] ) );
							publisher_set_prop( 'hide-meta-date', empty( $block_settings['big-meta']['date'] ) );
							publisher_set_prop( 'meta-date-format', $block_settings['big-meta']['date-format'] );
							publisher_set_prop( 'hide-meta-view', empty( $block_settings['big-meta']['view'] ) );
							publisher_set_prop( 'hide-meta-share', empty( $block_settings['big-meta']['share'] ) );
							publisher_set_prop( 'hide-meta-comment', empty( $block_settings['big-meta']['comment'] ) );
							publisher_set_prop( 'hide-meta-review', empty( $block_settings['big-meta']['review'] ) );
						}

						publisher_set_prop( 'block-customized', true );
					}

					publisher_set_prop_thumbnail_size( 'publisher-lg' );
					publisher_set_prop( 'show-excerpt', publisher_get_prop( 'show-excerpt-big', true ) );

					?>
					<div class="listing listing-classic listing-classic-2 clearfix columns-1">
						<?php

						$_skip_ad = false;

						while( publisher_have_posts() ) {

							if ( $inject_ads ) {
								if ( $_counter && $inject_ads_after && ( ( $_counter % $inject_ads_after ) == 0 ) ) {

									publisher_show_after_posts_ad( array(
										'class' => 'listing-item-classic listing-item-classic-2',
										'ad'    => $block_ad,
									) );

									publisher_set_prop( 'posts-counter', absint( publisher_get_prop( 'posts-counter', 1 ) ) + 1 );
								}
							}

							$_counter ++;
							publisher_the_post();
							publisher_get_view( 'loop', 'listing-classic-2-item' );
						}

						?>
					</div>
					<?php

				}

				publisher_unset_prop( 'posts-counter' );

				publisher_set_prop( 'posts-count', 2 );

				if ( publisher_have_posts() ) {

					if ( $block_settings ) {

						publisher_set_prop( 'title-limit', $block_settings['small-title-limit'] );
						publisher_set_prop( 'excerpt-limit', $block_settings['small-excerpt-limit'] );
						publisher_set_prop( 'show-subtitle', $block_settings['small-subtitle'] );

						if ( $block_settings['small-subtitle'] ) {
							publisher_set_prop( 'subtitle-limit', $block_settings['small-subtitle-limit'] );
							publisher_set_prop( 'subtitle-location', $block_settings['small-subtitle-location'] );
						}

						publisher_set_prop( 'show-term-badge', $block_settings['small-term-badge'] );
						publisher_set_prop( 'term-badge-count', $block_settings['small-term-badge-count'] );
						publisher_set_prop( 'term-badge-tax', $block_settings['small-term-badge-tax'] );
						publisher_set_prop( 'show-format-icon', $block_settings['small-format-icon'] );
						publisher_set_prop( 'show-read-more', $block_settings['small-read-more'] );
						publisher_set_prop( 'show-meta', $block_settings['small-meta']['show'] );

						if ( $block_settings['small-meta']['show'] ) {
							publisher_set_prop( 'hide-meta-author', empty( $block_settings['small-meta']['author'] ) );
							publisher_set_prop( 'hide-meta-date', empty( $block_settings['small-meta']['date'] ) );
							publisher_set_prop( 'meta-date-format', $block_settings['small-meta']['date-format'] );
							publisher_set_prop( 'hide-meta-view', empty( $block_settings['small-meta']['view'] ) );
							publisher_set_prop( 'hide-meta-share', empty( $block_settings['small-meta']['share'] ) );
							publisher_set_prop( 'hide-meta-comment', empty( $block_settings['small-meta']['comment'] ) );
							publisher_set_prop( 'hide-meta-review', empty( $block_settings['small-meta']['review'] ) );
						}

						publisher_set_prop( 'block-customized', true );
					}

					publisher_set_prop_thumbnail_size( 'publisher-md' );
					publisher_set_prop( 'show-excerpt', publisher_get_prop( 'show-excerpt-small', true ) );

					?>
					<div class="listing listing-classic listing-classic-2 clearfix columns-2">
						<?php

						$_skip_ad = false;

						while( publisher_have_posts() ) {


							if ( $inject_ads && ! $_skip_ad ) {
								if ( $_counter && $inject_ads_after && ( ( $_counter % $inject_ads_after ) == 0 ) ) {

									publisher_show_after_posts_ad( array(
										'class' => 'listing-item-classic listing-item-classic-2',
										'ad'    => $block_ad,
									) );

									$_skip_ad = true;
									publisher_set_prop( 'posts-counter', absint( publisher_get_prop( 'posts-counter', 1 ) ) + 1 );
									continue;
								}
							}

							$_skip_ad = false;
							$_counter ++;
							publisher_the_post();
							publisher_get_view( 'loop', 'listing-classic-2-item' );
						}

						?>
					</div>
					<?php

				}

				publisher_unset_prop( 'posts-counter' );
				if ( $_posts_count && $_counter >= $_posts_count ) {
					break;
				}
			}

			?>
		</div>
	</div>
<?php

unset( $block_settings );
unset( $_posts_count );
unset( $_counter );
