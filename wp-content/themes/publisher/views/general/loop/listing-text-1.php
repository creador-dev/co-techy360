<?php
/**
 * Text listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

if ( publisher_get_prop( 'show-listing-wrapper', true ) ) {
	?>
	<div class="listing listing-text listing-text-1 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">
	<?php
}
$initial_ranking_offset = intval( publisher_get_ajax_var( 'post-ranking-offset' ) );
$block_settings         = false;

if ( ! publisher_get_prop( 'block-customized', false ) && publisher_have_posts() ) {

	$block_settings = publisher_get_option( 'listing-text-1' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = null;


	publisher_set_prop( 'title-limit', $block_settings['title-limit'] );
	publisher_set_prop( 'show-subtitle', $block_settings['subtitle'] );

	if ( $block_settings['subtitle'] ) {
		publisher_set_prop( 'subtitle-limit', $block_settings['subtitle-limit'] );
		publisher_set_prop( 'subtitle-location', $block_settings['subtitle-location'] );
	}

	publisher_set_prop( 'show-excerpt', $block_settings['excerpt'] );

	if ( $block_settings['excerpt'] ) {
		publisher_set_prop( 'excerpt-limit', $block_settings['excerpt-limit'] );
	}

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
		publisher_set_prop( 'hide-meta-author-if-review', true );
	}

	if ( publisher_get_prop( 'block-ad', false ) ) {
		publisher_set_prop( 'block-ad-class', 'listing-item-text listing-item-text-1' );
	}

	publisher_set_prop( 'post-counter-number', ! empty( $block_settings['show-ranking'] ) ? $initial_ranking_offset + 1 : 0 );

} else {
	publisher_set_prop( 'hide-meta-author-if-review', true );
}

$i                    = 0;
$initial_post_ranking = publisher_get_prop( 'post-counter-number' );

while( publisher_have_posts() ) {

	if ( $initial_post_ranking ) {
		publisher_set_prop( 'post-counter-number', $initial_post_ranking + $i );
	}

	publisher_the_post();
	publisher_get_view( 'loop', 'listing-text-1-item' );

	$i ++;
}


if ( $block_settings ) {
	publisher_set_ajax_var( 'post-ranking-offset', $i + $initial_ranking_offset );
}

if ( publisher_get_prop( 'show-listing-wrapper', true ) ) {
	?>
	</div>
	<?php
}

unset( $block_settings );
