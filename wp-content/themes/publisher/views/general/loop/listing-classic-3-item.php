<?php
/**
 * Classic listing 3 item template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    3.0.0
 */

$thumbnail_size  = publisher_get_prop_thumbnail_size( 'publisher-lg' );
$thumbnail       = publisher_get_thumbnail( $thumbnail_size );
$subtitle        = publisher_prop_is( 'show-subtitle', 1 );
$section_tag     = publisher_get_prop( 'item-tag', 'article' ) . ' ';
$heading_tag     = publisher_get_prop( 'item-heading-tag', 'h2' );
$sub_heading_tag = publisher_get_prop( 'item-sub-heading-tag', 'h3' );
$class           = ' listing-item listing-item-classic listing-item-classic-3';
$columns         = publisher_get_prop( 'listing-columns', 1 );

// Creates main term ID that used for custom category color style
$main_term = publisher_get_post_primary_cat();
if ( ! is_wp_error( $main_term ) && is_object( $main_term ) ) {
	$class .= ' main-term-' . $main_term->term_id;
} else {
	$class .= ' main-term-none';
}

// item width based on parent item columns!
$class .= ' ' . publisher_get_block_size_class( ceil( publisher_get_block_size() / $columns ) );

?>
	<<?php echo $section_tag; ?><?php publisher_attr( 'post', publisher_get_prop_class() . $class ); ?>>
	<div class="item-inner">
		<?php if ( ! empty( $thumbnail['src'] ) ) { ?>
			<div class="featured clearfix">
				<?php

				if ( publisher_get_prop( 'show-term-badge', true ) ) {
					publisher_cats_badge_code( publisher_get_prop( 'term-badge-count', 1 ), '', false, true, 'floated' );
				}

				?>
				<a <?php publisher_the_thumbnail_attr( $thumbnail_size ); ?>
						class="img-holder" href="<?php publisher_the_permalink(); ?>"></a>
				<?php

				if ( publisher_get_prop( 'show-format-icon', true ) ) {
					publisher_format_icon();
				}

				publisher_edit_post_link();

				?>
				<div class="title">
					<?php

					if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-title' ) ) {
						$subtitle = false;
						publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
					}

					echo '<', $heading_tag, ' class="title-tag">'; ?>
					<a href="<?php publisher_the_permalink(); ?>" class="post-title post-url">
						<?php publisher_echo_html_limit_words( publisher_get_the_title(), publisher_get_prop( 'title-limit', - 1 ) ); ?>
					</a>
					<?php echo '</', $heading_tag, '>'; ?>
				</div>
			</div>
		<?php } ?>

		<div class="listing-inner">
			<?php

			if ( empty( $thumbnail['src'] ) ) {

				if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-title' ) ) {
					$subtitle = false;
					publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
				}

				echo '<', $heading_tag, ' class="title-tag">'; ?>
				<a href="<?php publisher_the_permalink(); ?>" class="post-title post-url">
					<?php publisher_echo_html_limit_words( publisher_get_the_title(), publisher_get_prop( 'title-limit', - 1 ) ); ?>
				</a>
				<?php echo '</', $heading_tag, '>';
			}

			if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-meta' ) ) {
				$subtitle = false;
				publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
			}

			if ( publisher_get_prop( 'show-meta', true ) ) {
				publisher_loop_meta();
			}

			if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-excerpt' ) ) {
				publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
			}

			if ( publisher_get_prop( 'show-excerpt', true ) ) { ?>
				<div class="post-summary">
					<?php

					switch ( $columns ) {

						case 1:
							$excerpt_length = publisher_get_prop( 'excerpt-limit', 300 );
							break;

						case 2:
							$excerpt_length = publisher_get_prop( 'excerpt-limit-2col', 150 );
							break;

						case 3:
							$excerpt_length = publisher_get_prop( 'excerpt-limit-3col', 90 );
							break;

						default:
							$excerpt_length = publisher_get_prop( 'excerpt-limit', 300 );

					}

					publisher_the_excerpt( publisher_get_prop( 'excerpt-limit', $excerpt_length ), NULL, true, false );

					?>
				</div>
			<?php }


			if ( publisher_get_prop( 'show-read-more', true ) ) {

				?>
				<a class="read-more"
				   href="<?php publisher_the_permalink(); ?>"><?php publisher_translation_echo( 'continue_reading' ); ?></a>
				<?php

			}

			?>
		</div>
	</div>
	</<?php echo $section_tag; ?>>
<?php

$subtitle       = NULL;
$thumbnail_size = NULL;
$thumbnail      = NULL;
$main_term      = NULL;
$class          = NULL;
$excerpt_length = NULL;
