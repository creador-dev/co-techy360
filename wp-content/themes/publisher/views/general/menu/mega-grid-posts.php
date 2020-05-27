<?php
/**
 * Grid posts mega menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$args = publisher_get_prop( 'mega-menu-args', array() );

// Query Args
$query_args = array(
	'order'               => 'date',
	'posts_per_page'      => 4,
	'ignore_sticky_posts' => 1,
	'post_type'           => array( 'post' ),
);

// Mega category and tag composition
if ( isset( $args['current-item']->mega_menu_cat ) && $args['current-item']->mega_menu_cat != 'auto' ) {

	if ( bf_is_a_category( $args['current-item']->mega_menu_cat ) ) {
		$query_args['cat'] = $args['current-item']->mega_menu_cat;
	} elseif ( bf_is_a_tag( $args['current-item']->mega_menu_cat ) ) {
		$query_args['tag_id'] = $args['current-item']->mega_menu_cat;
	}

} else {

	if ( $args['current-item']->object == 'category' ) {
		$query_args['cat'] = $args['current-item']->object_id;
	} elseif ( $args['current-item']->object == 'post_tag' ) {
		$query_args['tag_id'] = $args['current-item']->object_id;
	}

}

// Prepare query
$wp_query = new WP_Query( $query_args );
publisher_set_query( $wp_query, 'cache_posts=1' );

// Slider ID
$slider_id  = 'slider-' . rand( 1, 9999999 );
$_slider_id = str_replace( '-', '_', $slider_id );

?>
	<div class="mega-menu mega-grid-posts">
		<div class="content-wrap bs-tab-anim bs-tab-animated active">
			<?php

			$atts = array(
				'paginate'        => 'next_prev',
				'have_pagination' => true,
				'show_label'      => true,
				'order_by'        => 'date',
				'count'           => 4,
			);

			if ( ! empty( $query_args['cat'] ) ) {
				$atts['category'] = $query_args['cat'];
				publisher_set_prop( 'listing-main-term', $query_args['cat'] );

			} elseif ( ! empty( $query_args['tag_id'] ) ) {
				$atts['tag'] = $query_args['tag_id'];
			}

			publisher_theme_pagin_manager()->wrapper_start( $atts );

			publisher_get_view( 'menu', 'mega-grid-posts-content' );

			publisher_theme_pagin_manager()->wrapper_end();

			publisher_theme_pagin_manager()->display_pagination( $atts, $wp_query, 'Publisher::bs_pagin_ajax_mega_grid_posts', 'wp_query' );

			?>
		</div>
	</div>
<?php

publisher_clear_props();
//TOOD: @vc_frontend
publisher_clear_query();
