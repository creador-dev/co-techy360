<?php
/**
 * Grid listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// Image sizes
$big_item_img   = 'publisher-lg';
$small_item_img = 'publisher-md';


$block_settings = false;
if ( ! publisher_get_prop( 'block-customized', false ) && publisher_have_posts() ) {

	$block_settings = publisher_get_option( 'listing-modern-grid-7' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = NULL;

	publisher_set_prop( 'show-subtitle', $block_settings['big-subtitle'] );

	if ( $block_settings['big-subtitle'] ) {
		publisher_set_prop( 'subtitle-limit', $block_settings['big-subtitle-limit'] );
		publisher_set_prop( 'subtitle-location', $block_settings['big-subtitle-location'] );
	}

	publisher_set_prop( 'title-limit', $block_settings['big-title-limit'] );
	publisher_set_prop( 'show-term-badge', $block_settings['big-term-badge'] );
	publisher_set_prop( 'term-badge-count', $block_settings['big-term-badge-count'] );
	publisher_set_prop( 'term-badge-tax', $block_settings['big-term-badge-tax'] );
	publisher_set_prop( 'show-format-icon', $block_settings['big-format-icon'] );
	publisher_set_prop( 'show-meta', $block_settings['big-meta']['show'] );

	if ( $block_settings['big-meta']['show'] ) {
		publisher_set_prop( 'hide-meta-author', ! $block_settings['big-meta']['author'] );
		publisher_set_prop( 'hide-meta-date', ! $block_settings['big-meta']['date'] );
		publisher_set_prop( 'meta-date-format', $block_settings['big-meta']['date-format'] );
		publisher_set_prop( 'hide-meta-view', empty( $block_settings['big-meta']['view'] ) );
		publisher_set_prop( 'hide-meta-share', empty( $block_settings['big-meta']['share'] ) );
		publisher_set_prop( 'hide-meta-comment', ! $block_settings['big-meta']['comment'] );
		publisher_set_prop( 'hide-meta-review', ! $block_settings['big-meta']['review'] );
	}
}

?>
	<div class="listing listing-modern-grid listing-modern-grid-7 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">
		<div class="mg-row mg-row-1 clearfix">
			<div class="mg-col mg-col-1">
				<?php

				$counter = 1;

				if ( publisher_have_posts() ) {
					publisher_the_post();
					publisher_set_prop_class( 'listing-item-' . $counter, true );
					publisher_set_prop_thumbnail_size( $big_item_img );
					publisher_get_view( 'loop', 'listing-modern-grid-7-item' );

					$counter ++;
				}

				?>
			</div>
			<div class="mg-col mg-col-2">
				<?php

				if ( publisher_have_posts() ) {
					publisher_the_post();
					publisher_set_prop_class( 'listing-item-' . $counter, true );
					publisher_set_prop_thumbnail_size( $big_item_img );
					publisher_get_view( 'loop', 'listing-modern-grid-7-item' );

					$counter ++;
				}

				?>
			</div>
		</div>
		<?php

		if ( ! publisher_get_prop( 'block-customized', false ) && publisher_have_posts() ) {

			publisher_set_prop( 'title-limit', $block_settings['small-title-limit'] );
			publisher_set_prop( 'show-subtitle', $block_settings['small-subtitle'] );

			if ( $block_settings['small-subtitle'] ) {
				publisher_set_prop( 'subtitle-limit', $block_settings['small-subtitle-limit'] );
				publisher_set_prop( 'subtitle-location', $block_settings['small-subtitle-location'] );
			}

			publisher_set_prop( 'show-term-badge', $block_settings['small-term-badge'] );
			publisher_set_prop( 'term-badge-count', $block_settings['small-term-badge-count'] );
			publisher_set_prop( 'term-badge-tax', $block_settings['small-term-badge-tax'] );
			publisher_set_prop( 'show-format-icon', $block_settings['small-format-icon'] );
			publisher_set_prop( 'show-meta', $block_settings['small-meta']['show'] );

			if ( $block_settings['small-meta']['show'] ) {
				publisher_set_prop( 'hide-meta-author', ! $block_settings['small-meta']['author'] );
				publisher_set_prop( 'hide-meta-date', ! $block_settings['small-meta']['date'] );
				publisher_set_prop( 'meta-date-format', $block_settings['small-meta']['date-format'] );
				publisher_set_prop( 'hide-meta-comment', ! $block_settings['small-meta']['comment'] );
				publisher_set_prop( 'hide-meta-review', ! $block_settings['small-meta']['review'] );
			}
		}

		?>
		<div class="mg-row mg-row-2 clearfix">
			<div class="mg-col mg-col-1">
				<?php

				if ( publisher_have_posts() ) {
					publisher_the_post();
					publisher_set_prop_class( 'listing-item-' . $counter, true );
					publisher_set_prop_thumbnail_size( $small_item_img );
					publisher_get_view( 'loop', 'listing-modern-grid-7-item' );

					$counter ++;
				}

				?>
			</div>
			<div class="mg-col mg-col-2">
				<?php

				if ( publisher_have_posts() ) {
					publisher_the_post();
					publisher_set_prop_class( 'listing-item-' . $counter, true );
					publisher_set_prop_thumbnail_size( $small_item_img );
					publisher_get_view( 'loop', 'listing-modern-grid-7-item' );

					$counter ++;
				}

				?>
			</div>
			<div class="mg-col mg-col-3">
				<?php

				if ( publisher_have_posts() ) {
					publisher_the_post();
					publisher_set_prop_class( 'listing-item-' . $counter, true );
					publisher_set_prop_thumbnail_size( $small_item_img );
					publisher_get_view( 'loop', 'listing-modern-grid-7-item' );

					$counter ++;
				}

				?>
			</div>
		</div>
	</div>
<?php

unset( $item1_img );
unset( $item2_img );
unset( $item3_img );
unset( $item4_img );
unset( $block_settings );
unset( $col_1 );
unset( $col_2 );
