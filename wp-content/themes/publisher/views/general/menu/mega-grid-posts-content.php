<?php
/**
 * the content part of mega-grid-posts.php
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

$block_settings = publisher_get_option( 'blocks-mega-menu' );
publisher_set_prop( 'title-limit', $block_settings['title-limit'] );
publisher_set_prop( 'show-subtitle', $block_settings['subtitle'] );

if ( $block_settings['subtitle'] ) {
	publisher_set_prop( 'subtitle-limit', $block_settings['subtitle-limit'] );
	publisher_set_prop( 'subtitle-location', $block_settings['subtitle-location'] );
}

// Change title tag to p for adding more priority to content heading tags.
publisher_set_blocks_title_tag( 'p' );

publisher_set_prop( 'show-term-badge', $block_settings['term-badge'] );
publisher_set_prop( 'term-badge-count', $block_settings['term-badge-count'] );
publisher_set_prop( 'term-badge-tax', $block_settings['term-badge-tax'] );
publisher_set_prop( 'show-format-icon', $block_settings['format-icon'] );
publisher_set_prop( 'show-excerpt', false );
publisher_set_prop( 'show-meta', false );
publisher_set_prop( 'listing-class', 'columns-4' );
publisher_set_prop( 'block-customized', true );
publisher_set_prop_class( 'simple-grid' );
publisher_get_view( 'loop', 'listing-grid-1' );
