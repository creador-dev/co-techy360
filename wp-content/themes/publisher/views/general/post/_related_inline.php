<?php
/**
 * Inline related posts
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

$inline_posts_listing   = publisher_get_prop( 'inline-posts-listing' );
$inline_posts_align     = publisher_get_prop( 'inline-posts-align' );
$inline_posts_count     = publisher_get_prop( 'inline-posts-count' );
$inline_posts_offset    = publisher_get_prop( 'inline-posts-offset' );
$inline_posts_type      = publisher_get_prop( 'inline-posts-type' );
$inline_posts_pagin     = publisher_get_prop( 'inline-posts-pagination' );
$inline_posts_pagin_lbl = publisher_get_prop( 'inline-posts-pagination-label' );
$inline_posts_column    = 1;
$query_args             = array(); // Extra query args

$container_class = bf_reverse_direction( sanitize_html_class( $inline_posts_align ) );
$container_class .= ' bs-irp-' . $inline_posts_listing;

$heading = publisher_get_prop( 'inline-posts-heading' );
if ( empty( $heading ) ) {
	$heading = publisher_translation_get( 'related_posts' );
}

if ( $inline_posts_offset !== '' ) {
	$query_args['offset'] = $inline_posts_offset;
}


if ( $inline_posts_keyword = publisher_get_prop( 'inline-posts-keyword' ) ) {
	$query_args['s']   = $inline_posts_keyword;
	$inline_posts_type = '';
}


//
// Listing Fix
//
{
	$_check = array(
		'thumbnail-1-full' => array(
			'listing' => 'thumbnail-1',
			'columns' => 2,
			'count'   => 2,
		),
		'thumbnail-2'      => array(
			'listing' => 'thumbnail-2',
			'columns' => 2,
			'count'   => 4,
		),
		'thumbnail-2-full' => array(
			'listing' => 'thumbnail-2',
			'columns' => '4',
			'count'   => 4,
		),
		'thumbnail-3-full' => array(
			'listing' => 'thumbnail-3',
			'columns' => '2',
			'count'   => 2,
		),
		'text-1'           => array(
			'listing' => 'text-1',
			'columns' => 1,
			'count'   => 2,
		),
		'text-1-full'      => array(
			'listing' => 'text-1',
			'columns' => '2',
			'count'   => 2,
		),
		'text-2-full'      => array(
			'listing' => 'text-2',
			'columns' => '2',
			'count'   => 2,
		),
		'text-3-full'      => array(
			'listing' => 'text-3',
			'columns' => '2',
			'count'   => 2,
		),
		'text-4-full'      => array(
			'listing' => 'text-4',
			'columns' => '2',
			'count'   => 2,
		),
	);

	if ( isset( $_check[ $inline_posts_listing ] ) ) {

		// Post count
		if ( intval( $inline_posts_count ) < 1 && isset( $_check[ $inline_posts_listing ]['count'] ) ) {
			$inline_posts_count = $_check[ $inline_posts_listing ]['count'];
		}

		$inline_posts_column  = $_check[ $inline_posts_listing ]['columns'];
		$inline_posts_listing = $_check[ $inline_posts_listing ]['listing'];
	}

	unset( $_check );
}

//
// Post count
//
if ( intval( $inline_posts_count ) < 1 ) {
	$inline_posts_count = 3;
}

$query_args = publisher_get_related_posts_args( $inline_posts_count, $inline_posts_type, NULL, $query_args );

if ( $inline_posts_type === 'selected-cat' ) {
	if ( $cats_id = publisher_get_prop( 'inline-posts-selected-cats' ) ) {
		$query_args['cat'] = $cats_id;
	}
} elseif ( $inline_posts_type === 'selected-tag' ) {
	if ( $tags_id = publisher_get_prop( 'inline-posts-selected-tags' ) ) {
		$query_args['tag__in'] = explode( ',', $tags_id );
	}
} elseif ( $inline_posts_type === 'selected-posts' ) {
	if ( $posts_id = publisher_get_prop( 'inline-posts-posts-id' ) ) {
		$query_args['post__in'] = explode( ',', $posts_id );
	}
}

$inline_posts_query = new WP_Query( $query_args );
publisher_set_query( $inline_posts_query );

if ( ! publisher_have_posts() ) {

	publisher_clear_query();
	publisher_clear_props();

	return;
}

?>
<div class="bs-irp <?php echo $container_class; // escaped before ?>">

	<div class="bs-irp-heading">
		<span class="h-text heading-typo"><?php echo $heading; // escaped before  ?></span>
	</div>

	<?php

	$atts = array(
		'count'                 => $inline_posts_count,
		'paginate'              => $inline_posts_pagin,
		'have_pagination'       => $inline_posts_pagin && $inline_posts_pagin !== 'none',
		'pagination-show-label' => $inline_posts_pagin_lbl,
		//
		'data'                  => array(
			'listing'              => $inline_posts_listing,
			'columns'              => $inline_posts_column,
			'item-heading-tag'     => 'p',
			'item-sub-heading-tag' => 'p',
			'item-tag'             => 'div',
		),
	);

	$related_atts = $atts + $query_args;

	$view = 'Publisher::listing_ajax_handler';
	$type = 'wp_query';

	Publisher::list_posts( $inline_posts_query, $view, $type, $related_atts );

	publisher_theme_pagin_manager()->display_pagination( $related_atts, $inline_posts_query, $view, $type );

	publisher_clear_query();

	?>
</div>