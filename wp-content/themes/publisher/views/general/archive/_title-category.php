<?php
/**
 * categories title template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.1.0
 */

global $wp_query;

$term_id = $wp_query->get_queried_object_id();

// If Term Title is Active
if ( bf_get_term_meta( 'hide_term_title' ) ) {
	return;
}

$container_class = array(); // temp

// category raw title
$term_name = single_term_title( '', false );

// Pre title
if ( bf_get_term_meta( 'term_custom_pre_title' ) != '' ) {
	$pre_title = sprintf( bf_get_term_meta( 'term_custom_pre_title' ), $term_name );
} else {
	$pre_title = sprintf( publisher_translation_get( 'archive_cat_title' ), $term_name );
}

// Custom title
if ( bf_get_term_meta( 'term_custom_title' ) != '' ) {
	$title = sprintf( bf_get_term_meta( 'term_custom_title' ), $term_name );
} else {
	$title = $term_name;
}

// RSS Link
$rss_link = '';

if ( publisher_get_option( 'cat_archive_show_rss_icon' ) === 'show' ) {

	$rss_link = get_category_feed_link( $term_id );

	// Clear RSS link when the Feed Protection is active in the Content Protector Pack plugin
	if ( class_exists( 'Content_Protector_Pack' ) && Content_Protector_Pack::get_option( 'feed_protection' ) !== '' ) {
		$rss_link = '';
	}

	if ( $rss_link ) {
		$container_class[] = 'with-actions';
	}
}


// Term Description
$term_desc = '';
if ( ! bf_get_term_meta( 'hide_term_description' ) && term_description() ) {

	$term_desc = '<div class="desc">' . do_shortcode( term_description() ) . '</div>';

	$container_class[] = 'with-desc';
}

$show_subcategories = publisher_get_option( 'cat_archive_sub_cats' );
$sub_categories     = array();

if ( $show_subcategories !== 'hide' ) {

	$limit = intval( publisher_get_option( 'cat_archive_sub_cats_limit' ) );

	if ( ! $limit ) {
		$limit = - 1;
	}

	if ( $show_subcategories === 'show' ) {
		$sub_categories = bf_get_child_categories( $wp_query->get_queried_object_id(), $limit, true );
	} elseif ( $show_subcategories === 'sub-categories' ) {
		$sub_categories = bf_get_child_categories( $wp_query->get_queried_object_id(), $limit, false );
	}

	if ( empty( $sub_categories ) ) {
		$show_subcategories = 'hide';
	}
}

if ( $show_subcategories !== 'hide' && bf_count( $sub_categories ) > 0 ) {
	$container_class[] = 'with-terms';
} else {
	$container_class[] = 'without-terms';
}

?>
	<section class="archive-title category-title <?php echo implode( ' ', $container_class ); ?>">
		<div class="pre-title"><span><?php echo $pre_title; // escaped before ?></span></div>

		<?php if ( ! empty( $rss_link ) ) { ?>
			<div class="actions-container">
				<a class="rss-link" href="<?php echo esc_url( $rss_link ); ?>"><i class="fa fa-rss"></i></a>
			</div>
		<?php } ?>

		<h1 class="page-heading"><span class="h-title"><?php echo $title; // escaped before ?></span></h1>
		<?php echo $term_desc; // escaped before inside WP ?>

		<?php

		if ( $show_subcategories && bf_count( $sub_categories ) > 0 ) { ?>
			<div class="term-badges">
				<?php
				foreach ( $sub_categories as $term ) {
					?>
					<span class="term-badge term-<?php echo $term->term_id; ?>">
					<a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
				</span>
					<?php
				}

				?>
			</div>

			<?php
		}

		?>
	</section>
<?php

unset( $title );
unset( $show_subcategories );
unset( $rss_link );
unset( $pre_title );
unset( $sub_categories );
unset( $container_class );
unset( $term_id );
