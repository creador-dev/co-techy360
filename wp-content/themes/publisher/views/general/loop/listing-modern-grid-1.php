<?php
/**
 * Grid listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// Image sizes
$item1_img = 'publisher-lg';
$item2_img = 'publisher-lg';
$item3_img = 'publisher-mg2';
$item4_img = 'publisher-mg2';

$block_settings = publisher_get_option( 'listing-modern-grid-1' );

if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
	$block_settings = array_merge( $block_settings, $block_settings_override );
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
	publisher_set_prop( 'hide-meta-author', empty( $block_settings['meta']['author'] ) );
	publisher_set_prop( 'hide-meta-date', empty( $block_settings['meta']['date'] ) );
	publisher_set_prop( 'meta-date-format', $block_settings['meta']['date-format'] );
	publisher_set_prop( 'hide-meta-view', empty( $block_settings['meta']['view'] ) );
	publisher_set_prop( 'hide-meta-share', empty( $block_settings['meta']['share'] ) );
	publisher_set_prop( 'hide-meta-comment', empty( $block_settings['meta']['comment'] ) );
	publisher_set_prop( 'hide-meta-review', empty( $block_settings['meta']['review'] ) );
}

?>
	<div class="listing listing-modern-grid listing-modern-grid-1 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">
		<div class="mg-col mg-col-1">
			<?php

			if ( publisher_have_posts() ) {
				publisher_the_post();
				publisher_set_prop( 'title-limit', $block_settings['item-1-title-limit'] );
				publisher_set_prop_class( 'listing-item-1', true );
				publisher_set_prop_thumbnail_size( $item1_img );
				publisher_get_view( 'loop', 'listing-modern-grid-1-item' );
			}

			?>
		</div>
		<div class="mg-col mg-col-2">
			<div class="mg-row mg-row-1">
				<?php

				if ( publisher_have_posts() ) {

					// hide subtitle for all other blocks
					publisher_set_prop( 'show-subtitle', false );

					publisher_the_post();
					publisher_set_prop( 'title-limit', $block_settings['item-2-title-limit'] );
					publisher_set_prop_class( 'listing-item-2', true );
					publisher_set_prop_thumbnail_size( $item2_img );
					publisher_get_view( 'loop', 'listing-modern-grid-1-item' );
				}

				?>
			</div>
			<div class="mg-row mg-row-2">
				<div class="item-3-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-3', true );
						publisher_set_prop( 'title-limit', $block_settings['item-3-title-limit'] );
						publisher_set_prop( 'show-term-badge', false );
						publisher_set_prop( 'show-meta', false );
						publisher_set_prop_thumbnail_size( $item3_img );
						publisher_get_view( 'loop', 'listing-modern-grid-1-item' );

					}

					?>
				</div>
				<div class="item-4-cont">
					<?php

					if ( publisher_have_posts() ) {
						publisher_the_post();
						publisher_set_prop_class( 'listing-item-4', true );
						publisher_set_prop( 'title-limit', $block_settings['item-3-title-limit'] );
						publisher_set_prop_thumbnail_size( $item4_img );
						publisher_get_view( 'loop', 'listing-modern-grid-1-item' );
					}

					?>
				</div>
			</div>
		</div>
	</div>
<?php

unset( $item1_img );
unset( $item2_img );
unset( $item3_img );
unset( $item4_img );
unset( $block_settings );
