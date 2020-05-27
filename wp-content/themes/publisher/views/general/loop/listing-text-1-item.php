<?php
/**
 * Text listing item template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

$subtitle        = publisher_prop_is( 'show-subtitle', 1 );
$section_tag     = publisher_get_prop( 'item-tag', 'article' ) . ' ';
$heading_tag     = publisher_get_prop( 'item-heading-tag', 'h2' );
$sub_heading_tag = publisher_get_prop( 'item-sub-heading-tag', 'h3' );
$ranking         = publisher_get_prop( 'post-counter-number' );

// Creates main term ID that used for custom category color style
$main_term = publisher_get_post_primary_cat();
if ( ! is_wp_error( $main_term ) && is_object( $main_term ) ) {
	$class = 'main-term-' . $main_term->term_id;
} else {
	$class = 'main-term-none';
}

if ( ! publisher_get_prop( 'show-meta', true ) ) {
	$class .= ' no-meta';
}

?>
	<<?php echo $section_tag; ?><?php publisher_attr( 'post', publisher_get_prop_class() . ' listing-item listing-item-text listing-item-text-1 ' . $class ); ?>>
	<div class="item-inner">
		<?php

		if ( publisher_get_prop( 'show-term-badge', true ) ) {
			publisher_cats_badge_code( publisher_get_prop( 'term-badge-count', 1 ), '', false, true, 'floated' );
		}

		if ( $ranking ) {
			publisher_listing_rank_badge( $ranking, 't2-s1' );
		}

		if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-title' ) ) {
			$subtitle = false;
			publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
		}

		echo '<', $heading_tag, ' class="title">'; ?>
		<a href="<?php publisher_the_permalink(); ?>" class="post-title post-url">
			<?php publisher_echo_html_limit_words( publisher_get_the_title(), publisher_get_prop( 'title-limit', 70 ) ); ?>
		</a>
		<?php echo '</', $heading_tag, '>';

		if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-meta' ) ) {
			$subtitle = false;
			publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
		}

		if ( publisher_get_prop( 'show-meta', true ) ) {
			publisher_loop_meta();
		}

		if ( $subtitle && publisher_prop_is( 'subtitle-location', 'after-meta' ) ) {
			publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
		}

		if ( publisher_get_prop( 'show-excerpt', false ) ) { ?>
			<div class="post-summary">
				<?php publisher_the_excerpt( publisher_get_prop( 'excerpt-limit', 200 ), null, true, false ); ?>
			</div>
			<?php
		}

		?>
	</div>
	</<?php echo $section_tag; ?>>
<?php

$subtitle  = null;
$main_term = null;
$class     = null;
