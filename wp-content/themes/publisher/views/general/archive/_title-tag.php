<?php
/**
 * Tags archive title template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

global $wp_query;

$term_id = $wp_query->get_queried_object_id();

// If Term Title is Active
if ( bf_get_term_meta( 'hide_term_title' ) ) {
	return;
}

$container_class = array();

// tag raw name
$term_name = single_term_title( '', false );

// Pre title
if ( bf_get_term_meta( 'term_custom_pre_title' ) != '' ) {
	$pre_title = sprintf( bf_get_term_meta( 'term_custom_pre_title' ), $term_name );
} else {
	$pre_title = sprintf( publisher_translation_get( 'archive_tag_title' ), $term_name );
}

// Custom title
if ( bf_get_term_meta( 'term_custom_title' ) != '' ) {
	$title = sprintf( bf_get_term_meta( 'term_custom_title' ), $term_name );;
} else {
	$title = $term_name;
}

// RSS Link
$rss_link          = get_tag_feed_link( $term_id );
$container_class[] = 'with-action';

// Term Description
$term_desc = '';
if ( ! bf_get_term_meta( 'hide_term_description' ) && term_description() ) {

	$term_desc = '<div class="desc">' . do_shortcode( term_description() ) . '</div>';

	$container_class[] = 'with-desc';
}

?>
<section class="archive-title tag-title <?php echo esc_attr( implode( ' ', $container_class ) ); ?>">
	<div class="pre-title"><span><?php echo $pre_title; // escaped before ?></span></div>

	<div class="actions-container">
		<a class="rss-link" href="<?php echo esc_url( $rss_link ); ?>"><i class="fa fa-rss"></i></a>
	</div>

	<h1 class="page-heading"><span class="h-title"><?php echo $title; // escaped before ?></span></h1>

	<?php echo $term_desc; // escaped before ?>
</section>
