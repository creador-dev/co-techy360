<?php
/**
 * Mix listing 1-1 template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    5.0.0
 */

$block_settings = false;

if ( ! publisher_get_prop( 'block-customized', false ) ) {
	$block_settings = publisher_get_option( 'listing-mix-1-1' );

	if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
		$block_settings = array_merge( $block_settings, $block_settings_override );
	}
	$block_settings_override = NULL;
}

if ( publisher_get_prop( 'block-ad', false ) ) {
	publisher_set_prop( 'block-ad-class', 'listing-item-grid listing-item-grid-1' );
}

?>
	<div class="listing listing-mix-1-1  <?php publisher_echo_prop( 'listing-class' ); ?>">
		<div class="item-inner clearfix">
			<div class="column-1">
				<?php

				if ( publisher_have_posts() ) {

					if ( $block_settings ) {

						publisher_set_prop( 'title-limit', $block_settings['big-title-limit'] );
						publisher_set_prop( 'show-excerpt', $block_settings['big-excerpt'] );
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

					}

					publisher_the_post();
					publisher_get_view( 'loop', 'listing-grid-1-item' );
				}

				?>
			</div>
			<div class="column-2">
				<?php

				if ( publisher_have_posts() ) {

					if ( $block_settings ) {

						publisher_set_prop( 'thumbnail-type', $block_settings['small-thumbnail-type'] );
						publisher_set_prop( 'title-limit', $block_settings['small-title-limit'] );
						publisher_set_prop( 'show-subtitle', $block_settings['small-subtitle'] );

						if ( $block_settings['small-subtitle'] ) {
							publisher_set_prop( 'subtitle-limit', $block_settings['small-subtitle-limit'] );
							publisher_set_prop( 'subtitle-location', $block_settings['small-subtitle-location'] );
						}

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

					publisher_set_prop( 'listing-class', 'columns-1' );
					publisher_get_view( 'loop', 'listing-thumbnail-1' );
				}

				?>
			</div>
		</div>
	</div>
<?php

unset( $block_settings );
