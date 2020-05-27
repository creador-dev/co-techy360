<?php
/**
 * Modern grid listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// Image Sizes
$item_big_img   = 'publisher-lg';
$item_small_img = 'publisher-mg2';

$block_settings = false;
if ( ! publisher_get_prop( 'block-customized', false ) && publisher_have_posts() ) {
	$block_settings = publisher_get_option( 'listing-modern-grid-9' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = NULL;

	// minor fix
	if ( ! isset( $block_settings['item-6-title-limit'] ) ) {
		$block_settings['item-6-title-limit'] = 70;
	}

	// minor fix
	if ( ! isset( $block_settings['item-7-title-limit'] ) ) {
		$block_settings['item-7-title-limit'] = 70;
	}

	publisher_set_prop( 'show-subtitle', $block_settings['subtitle'] );

	if ( $block_settings['subtitle'] ) {
		publisher_set_prop( 'subtitle-limit', $block_settings['subtitle-limit'] );
		publisher_set_prop( 'subtitle-location', $block_settings['subtitle-location'] );
	}

	publisher_set_prop( 'show-format-icon', $block_settings['format-icon'] );
	publisher_set_prop( 'show-term-badge', $block_settings['term-badge'] );
	publisher_set_prop( 'term-badge-count', $block_settings['term-badge-count'] );
	publisher_set_prop( 'term-badge-tax', $block_settings['term-badge-tax'] );
	publisher_set_prop( 'show-meta', $block_settings['meta']['show'] );

	if ( $block_settings['meta']['show'] ) {
		publisher_set_prop( 'hide-meta-author', ! $block_settings['meta']['author'] );
		publisher_set_prop( 'hide-meta-date', ! $block_settings['meta']['date'] );
		publisher_set_prop( 'meta-date-format', $block_settings['meta']['date-format'] );
		publisher_set_prop( 'hide-meta-view', ! $block_settings['meta']['view'] );
		publisher_set_prop( 'hide-meta-share', ! $block_settings['meta']['share'] );
		publisher_set_prop( 'hide-meta-comment', ! $block_settings['meta']['comment'] );
		publisher_set_prop( 'hide-meta-review', ! $block_settings['meta']['review'] );
	}
}


?>
	<div class="listing listing-modern-grid listing-modern-grid-9 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">
		<div class="mg-col mg-col-1">
			<?php

			if ( publisher_have_posts() ) {
				publisher_the_post();

				if ( $block_settings ) {
					publisher_set_prop( 'title-limit', $block_settings['item-1-title-limit'] );
				}

				publisher_set_prop_class( 'listing-item-1', true );
				publisher_set_prop_thumbnail_size( $item_big_img );
				publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
			}

			?>
		</div>
		<div class="mg-col mg-col-2">
			<div class="mg-row mg-row-1 clearfix">
				<div class="item-2-cont">
					<?php

					// hide subtitle in all next posts
					publisher_set_prop( 'show-subtitle', false );

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-2', true );
						publisher_set_prop( 'show-meta', false );

						if ( $block_settings ) {
							publisher_set_prop( 'title-limit', $block_settings['item-2-title-limit'] );
						}

						publisher_set_prop_thumbnail_size( $item_small_img );
						publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
					}

					?>
				</div>
				<div class="item-3-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-3', true );

						if ( $block_settings ) {
							publisher_set_prop( 'title-limit', $block_settings['item-3-title-limit'] );
						}

						publisher_set_prop_thumbnail_size( $item_small_img );
						publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
					}

					?>
				</div>
			</div>
			<div class="mg-row mg-row-2 clearfix">
				<div class="item-4-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-4', true );

						if ( $block_settings ) {
							publisher_set_prop( 'title-limit', $block_settings['item-4-title-limit'] );
						}

						publisher_set_prop_thumbnail_size( $item_small_img );
						publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
					}

					?>
				</div>
				<div class="item-5-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-5', true );

						if ( $block_settings ) {
							publisher_set_prop( 'title-limit', $block_settings['item-5-title-limit'] );
						}

						publisher_set_prop_thumbnail_size( $item_small_img );
						publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
					}

					?>
				</div>
			</div>
		</div>
		<div class="mg-col mg-col-3">
			<div class="mg-row mg-row-1 clearfix">
				<div class="item-6-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-6', true );

						if ( $block_settings ) {
							publisher_set_prop( 'title-limit', $block_settings['item-6-title-limit'] );
						}

						publisher_set_prop_thumbnail_size( $item_small_img );
						publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
					}

					?>
				</div>
			</div>
			<div class="mg-row mg-row-2 clearfix">
				<div class="item-7-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-7', true );

						if ( $block_settings ) {
							publisher_set_prop( 'title-limit', $block_settings['item-7-title-limit'] );
						}

						publisher_set_prop_thumbnail_size( $item_small_img );
						publisher_get_view( 'loop', 'listing-modern-grid-9-item' );
					}

					?>
				</div>
			</div>
		</div>
	</div>
<?php

unset( $block_settings );
unset( $item_big_img );
unset( $item_small_img );
