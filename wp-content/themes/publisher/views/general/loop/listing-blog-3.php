<?php
/**
 * Blog listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    2.0
 */


if ( publisher_get_prop( 'show-listing-wrapper', true ) ) {
	?>
	<div class="listing listing-blog listing-blog-3 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">
	<?php
}


$block_settings = false;
if ( ! publisher_get_prop( 'block-customized', false ) && publisher_have_posts() ) {


	$block_settings = publisher_get_option( 'listing-blog-3' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = NULL;

	publisher_set_prop( 'title-limit', $block_settings['title-limit'] );
	publisher_set_prop( 'excerpt-limit', $block_settings['excerpt-limit'] );
	publisher_set_prop( 'show-term-badge', $block_settings['term-badge'] );
	publisher_set_prop( 'show-subtitle', $block_settings['subtitle'] );

	if ( $block_settings['subtitle'] ) {
		publisher_set_prop( 'subtitle-limit', $block_settings['subtitle-limit'] );
		publisher_set_prop( 'subtitle-location', $block_settings['subtitle-location'] );
	}

	publisher_set_prop( 'term-badge-count', $block_settings['term-badge-count'] );
	publisher_set_prop( 'term-badge-tax', $block_settings['term-badge-tax'] );
	publisher_set_prop( 'show-format-icon', $block_settings['format-icon'] );
	publisher_set_prop( 'show-meta', $block_settings['meta']['show'] );

	if ( $block_settings['meta']['show'] ) {
		publisher_set_prop( 'hide-meta-author', ! $block_settings['meta']['author'] );
		publisher_set_prop( 'hide-meta-date', ! $block_settings['meta']['date'] );
		publisher_set_prop( 'meta-date-format', $block_settings['meta']['date-format'] );
		publisher_set_prop( 'hide-meta-view', empty( $block_settings['meta']['view'] ) );
		publisher_set_prop( 'hide-meta-share', empty( $block_settings['meta']['share'] ) );
		publisher_set_prop( 'hide-meta-comment', ! $block_settings['meta']['comment'] );
		publisher_set_prop( 'hide-meta-review', ! $block_settings['meta']['review'] );
	}

	if ( publisher_get_prop( 'block-ad', false ) ) {
		publisher_set_prop( 'block-ad-class', 'listing-item-blog listing-item-blog-3' );
	}

	unset( $block_settings );
}


while( publisher_have_posts() ) {
	publisher_the_post();
	publisher_get_view( 'loop', 'listing-blog-3-item' );
}


if ( publisher_get_prop( 'show-listing-wrapper', true ) ) {
	?>
	</div>
	<?php
}
