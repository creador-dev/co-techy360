<?php
/**
 * Modern grid listing template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    4.0.0
 */

?>
	<div class="listing listing-modern-grid listing-modern-grid-3 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">
		<?php

		$counter = 0;

		$block_settings = false;
		if ( ! publisher_get_prop( 'block-customized', false ) && publisher_have_posts() ) {

			$block_settings = publisher_get_option( 'listing-modern-grid-3' );

			if ( $block_settings_override = publisher_get_prop( 'block-settings-override' ) ) {
				$block_settings = array_merge( $block_settings, $block_settings_override );
			}
			$block_settings_override = NULL;


			publisher_set_prop( 'title-limit', $block_settings['title-limit'] );
			publisher_set_prop( 'show-term-badge', $block_settings['term-badge'] );
			publisher_set_prop( 'term-badge-count', $block_settings['term-badge-count'] );
			publisher_set_prop( 'term-badge-tax', $block_settings['term-badge-tax'] );
			publisher_set_prop( 'show-format-icon', $block_settings['format-icon'] );
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
		}

		while( publisher_have_posts() ) {
			publisher_the_post();

			$counter ++;
			publisher_set_prop_class( 'listing-item-' . $counter, true );

			publisher_get_view( 'loop', 'listing-modern-grid-3-item' );
		}

		?>
	</div>
<?php

unset( $block_settings );
unset( $counter );
