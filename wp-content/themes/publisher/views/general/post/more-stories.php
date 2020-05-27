<?php
/**
 * More stories
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

$have_more_stories = bf_get_post_meta( 'more_stories' );
if ( $have_more_stories === 'default' || ! $have_more_stories ) {
	$have_more_stories = publisher_get_option( 'more_stories' );
}

if ( $have_more_stories !== 'show' ) {
	return;
}

$more_stories_position = publisher_get_option( 'more_stories_position' );

$more_stories_close = publisher_get_option( 'more_stories_close' );

$more_stories_scroll_top = publisher_get_option( 'more_stories_scroll_top' );

$parsed_url = parse_url( site_url() );

// Close settings
$close_settings = $more_stories_close . ';';
if ( isset( $parsed_url['path'] ) ) {
	$close_settings .= $parsed_url['path'];
}

// Main container class
$container_class = bf_reverse_direction( sanitize_html_class( $more_stories_position ) );

$listing = bf_get_post_meta( 'more_stories_listing' );
if ( $listing === 'default' || ! $listing ) {
	$listing = publisher_get_option( 'more_stories_listing' );
}

$container_class .= ' more-stories-' . $listing;


// Pagination
$pagination       = publisher_get_option( 'more_stories_pagination' );
$pagination_label = publisher_get_option( 'more_stories_pagination_label' );

$count = bf_get_post_meta( 'more_stories_count' );
if ( $count === 'default' || ! $count ) {
	$count = publisher_get_option( 'more_stories_count' );
}

$offset = bf_get_post_meta( 'more_stories_offset' );
if ( $offset === 'default' || $offset === '' ) {
	$offset = publisher_get_option( 'more_stories_offset' );
}

$algorithm_type = bf_get_post_meta( 'more_stories_type' );
if ( $algorithm_type === 'default' || ! $algorithm_type ) {
	$algorithm_type = publisher_get_option( 'more_stories_type' );
}

$query_args = array(); // Extra query args

// Handle related posts custom query feature
if ( is_singular() && $custom_query = bf_get_post_meta( 'more_stories_keyword' ) ) {
	$query_args['s'] = $custom_query;
}

if ( $offset ) {
	$query_args['offset'] = $offset;
}

$_atts      = array(
	'count'                 => $count,
	'paginate'              => $pagination,
	'have_pagination'       => $pagination && $pagination !== 'none',
	'pagination-show-label' => $pagination_label,
);
$query_args = publisher_get_related_posts_args( $count, $algorithm_type, NULL, $query_args );

if ( empty( $query_args['s'] ) ) {

	if ( $algorithm_type === 'selected-posts' ) {

		if ( $posts_id = bf_get_post_meta( 'more_stories_posts_id' ) ) {
			$query_args['post__in'] = explode( ',', $posts_id );
		}
	} elseif ( $algorithm_type === 'selected-tag' ) {
		if ( $tags_id = bf_get_post_meta( 'more_stories_selected_tags' ) ) {
			$query_args['tag__in'] = explode( ',', $tags_id );
		}
	} elseif ( $algorithm_type === 'selected-cat' ) {
		if ( $cats_id = bf_get_post_meta( 'more_stories_selected_cats' ) ) {
			$query_args['cat'] = $cats_id;
		}
	}
}

$more_stories_query = new WP_Query( $query_args );
publisher_set_query( $more_stories_query );

if ( ! publisher_have_posts() ) {

	publisher_clear_query();
	publisher_clear_props();

	return;
}

?>
<div class="more-stories <?php echo $container_class; // escaped before ?>"
     data-scroll-top="<?php echo intval( $more_stories_scroll_top ); // no need to escape ?>"
     data-close-settings="<?php echo esc_attr( $close_settings ); ?>">

	<div class="more-stories-title">
		<?php publisher_translation_echo( 'more_stories' ); ?>

		<a href="#" class="more-stories-close">
			<i class="fa fa-close"></i>
		</a>
	</div>
	<?php

	$atts = $_atts + $query_args;

	$view = 'Publisher::listing_ajax_handler';
	$type = 'wp_query';

	$atts['data']['listing']              = $listing;
	$atts['data']['item-heading-tag']     = 'p';
	$atts['data']['item-sub-heading-tag'] = 'p';
	$atts['data']['item-tag']             = 'div';

	$response = array();

	Publisher::list_posts( $more_stories_query, $view, $type, $atts );

	publisher_theme_pagin_manager()->display_pagination( $atts, $more_stories_query, $view, $type );

	?>
</div>