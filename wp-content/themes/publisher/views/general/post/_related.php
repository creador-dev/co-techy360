<?php
/**
 * Post related posts template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.0.0
 */

$listing_class = '';

$type = bf_get_post_meta( 'post_related_type' );
if ( $type === 'default' || ! $type ) {
	$type = publisher_get_option( 'post_related_type' );
}

$query_args = array(); // Extra query args
if ( $custom_query = bf_get_post_meta( 'post_related_keyword' ) ) {
	$query_args['s'] = $custom_query;
}

$count = bf_get_post_meta( 'post_related_count' );
if ( $count === 'default' || ! $count ) {
	$count = publisher_get_option( 'post_related_count' );
}

if ( $count % 2 ) {
	$count ++;
}

$offset = bf_get_post_meta( 'post_related_offset' );

if ( $offset === 'default' || $offset === '' ) {
	$offset = publisher_get_option( 'post_related_offset' );
}

if ( $offset ) {
	$query_args['offset'] = $offset;
}

$related_args = publisher_get_related_posts_args( $count, $type, NULL, $query_args );
$author_id    = get_the_author_meta( 'ID' );

if ( ! $custom_query ) {

	if ( $type === 'selected-posts' ) {
		if ( $posts_id = bf_get_post_meta( 'post_related_posts_id' ) ) {
			$related_args['post__in'] = explode( ',', $posts_id );
		}
	} elseif ( $type === 'selected-tag' ) {
		if ( $tags_id = bf_get_post_meta( 'post_related_selected_tags' ) ) {
			$related_args['tag__in'] = explode( ',', $tags_id );
		}
	} elseif ( $type === 'selected-cat' ) {
		if ( $cats_id = bf_get_post_meta( 'post_related_selected_cats' ) ) {
			$related_args['cat'] = $cats_id;
		}
	}
}

$related_posts_query = new WP_Query( $related_args );
$show_author_posts   = publisher_get_option( 'post_related_author_posts' ) === 'show';

$column        = $related_posts_query->post_count === 2 ? 2 : 3;
$listing_class .= " scolumns-{$column} simple-grid";

$_check = array(
	4  => '',
	7  => '',
	10 => '',
);

if ( isset( $_check[ $related_posts_query->post_count ] ) ) {
	$listing_class .= ' include-last-mobile';
}

publisher_set_query( $related_posts_query );

if ( ! publisher_have_posts() ) {
	return;
}

$pagination_type = publisher_get_option( 'post_related_pagination' );

$atts = array(
	'paginate'        => $pagination_type,
	'have_pagination' => true,
	'count'           => $count
);

$related_atts = $atts + $related_args;

if ( $show_author_posts ) {
	$mt_rand           = mt_rand();
	$deferred_block_id = 'relatedposts_' . $mt_rand . '_2';
}

?>
<div class="post-related">

	<div class="section-heading <?php echo publisher_get_block_heading_class(); ?> <?php echo $show_author_posts ? 'multi-tab' : ''; ?>">

		<?php if ( $show_author_posts ) { ?>
			<a href="#relatedposts_<?php echo $mt_rand; // escaped before  ?>_1" class="main-link active"
			   data-toggle="tab">
				<span
						class="h-text related-posts-heading"><?php publisher_translation_echo( 'related_heading' ); ?></span>
			</a>
			<a href="#<?php echo esc_attr( $deferred_block_id ); ?>" class="other-link" data-toggle="tab"
			   data-deferred-event="shown.bs.tab"
			   data-deferred-init="<?php echo esc_attr( $deferred_block_id ); ?>">
				<span
						class="h-text related-posts-heading"><?php publisher_translation_echo( 'this_author_posts' ); ?></span>
			</a>
		<?php } else { ?>
			<span class="h-text related-posts-heading"><?php publisher_translation_echo( 'related_heading' ); ?></span>
		<?php } ?>

	</div>

	<?php if ( $show_author_posts ) { ?>
	<div class="tab-content">
		<div class="tab-pane bs-tab-anim bs-tab-animated active"
		     id="relatedposts_<?php echo $mt_rand; // escaped before ?>_1">
			<?php } ?>

			<?php

			$atts = array(
				'paginate'        => $pagination_type,
				'have_pagination' => true,
				'data'            => array(
					'item-tag'             => 'div',
					'item-heading-tag'     => 'p',
					'item-sub-heading-tag' => 'p',
				),
			);

			$view = 'Publisher::fetch_related_posts';
			$type = 'wp_query';

			publisher_theme_pagin_manager()->wrapper_start( $related_atts );

			$block_settings = publisher_get_option( 'blocks-related-posts' );
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
			publisher_set_prop( 'listing-class', $listing_class );
			publisher_set_prop( 'block-customized', true );

			publisher_get_view( 'loop', 'listing-thumbnail-2' );

			publisher_clear_props();
			publisher_clear_query();

			publisher_theme_pagin_manager()->wrapper_end();
			publisher_theme_pagin_manager()->display_pagination( $related_atts, $related_posts_query, $view, $type );

			if ( $show_author_posts ) { ?>

		</div>

		<div class="tab-pane bs-tab-anim bs-tab-animated bs-deferred-container"
		     id="<?php echo esc_attr( $deferred_block_id ); ?>">
			<?php

			// Activates duplicate posts removal temporarily for not counting posts inside mega menu
			publisher_set_global( 'disable-duplicate-posts', true );

			$author_related_atts = array(
				'paginate'        => $pagination_type,
				'have_pagination' => true,
				'count'           => $count,
				'author'          => $author_id,
				'post_type'       => 'post',
			);

			$view = 'Publisher::fetch_other_related_posts';
			$type = 'wp_query';

			publisher_theme_pagin_manager()->wrapper_start( $author_related_atts );
			publisher_theme_pagin_manager()->display_deferred_html( $author_related_atts, $view, $type, $deferred_block_id );
			publisher_theme_pagin_manager()->wrapper_end();

			// Deactivates duplicate posts removal temporarily
			publisher_unset_global( 'disable-duplicate-posts' );

			?>
		</div>
	</div>
<?php } ?>
</div>
