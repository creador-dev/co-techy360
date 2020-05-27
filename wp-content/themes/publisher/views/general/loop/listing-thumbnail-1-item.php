<?php
/**
 * Thumbnail listing item template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    5.0.0
 */

$thumbnail_type  = publisher_get_prop( 'thumbnail-type', 'featured-image' );
$thumbnail_size  = publisher_get_prop_thumbnail_size( 'publisher-tb1' );
$thumbnail       = publisher_get_thumbnail( $thumbnail_size );
$section_tag     = publisher_get_prop( 'item-tag', 'article' ) . ' ';
$heading_tag     = publisher_get_prop( 'item-heading-tag', 'h2' );
$sub_heading_tag = publisher_get_prop( 'item-sub-heading-tag', 'h3' );
$subtitle        = publisher_prop_is( 'show-subtitle', 1 );
$ranking         = publisher_get_prop( 'post-counter-number' );
$thumbnail_args  = array(
	'size' => $thumbnail_size,
);


// Creates main term ID that used for custom category color style
$main_term = publisher_get_post_primary_cat();
if ( ! is_wp_error( $main_term ) && is_object( $main_term ) ) {
	$main_term_class = 'main-term-' . $main_term->term_id;
} else {
	$main_term_class = 'main-term-none';
}

//
// Replace post thumbnail with user avatar
//
if ( $thumbnail_type == 'author-avatar' ) {

	$author_ID = get_the_author_meta( 'ID' );

	$thumbnail['src'] = get_avatar_url( $author_ID );

	$thumbnail_args['attachment_data'] = array(
		'src' => $thumbnail['src'],
		'alt' => get_the_author_meta( 'display_name' ),
	);
}

?>
	<<?php echo $section_tag; ?>
<?php publisher_attr( 'post', publisher_get_prop_class() . ' listing-item listing-item-thumbnail listing-item-tb-1 ' . $main_term_class ); ?>>
	<div class="item-inner clearfix">
		<?php

		if ( $ranking = publisher_get_prop( 'post-counter-number' ) ) {
			publisher_listing_rank_badge( $ranking, 't1-s1' );
		}

		if ( ! empty( $thumbnail['src'] ) ) { ?>
			<div class="featured featured-type-<?php echo $thumbnail_type; ?>">
				<a <?php publisher_the_thumbnail_attr( $thumbnail_args ); ?>
						class="img-holder" href="<?php publisher_the_permalink(); ?>"></a>
				<?php publisher_edit_post_link(); ?>
			</div>
		<?php }

		if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-title' ) ) {
			$subtitle = false;
			publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
		}

		echo '<', $heading_tag, ' class="title">'; ?>
		<a href="<?php publisher_the_permalink(); ?>" class="post-url post-title">
			<?php publisher_echo_html_limit_words( publisher_get_the_title(), publisher_get_prop( 'title-limit', 60 ) ); ?>
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

		?>
	</div>
	</<?php echo $section_tag; ?>>
<?php

$subtitle        = NULL;
$thumbnail_size  = NULL;
$thumbnail       = NULL;
$main_term       = NULL;
$main_term_class = NULL;
$heading_tag     = NULL;
$sub_heading_tag = NULL;
