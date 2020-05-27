<?php
/**
 * Grid posts mega menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    2.0.2
 */

$args         = publisher_get_prop( 'mega-menu-args', array() );
$current_term = false;

$is_deferred_load = true;

// Query Args
$query_args = array(
	'order'               => 'date',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => 1,
	'post_type'           => 'post',
);


// Mega category and tag composition
if ( isset( $args['current-item']->mega_menu_cat ) && $args['current-item']->mega_menu_cat != 'auto' && bf_is_a_category( $args['current-item']->mega_menu_cat ) ) {
	$query_args['cat'] = $args['current-item']->mega_menu_cat;
	$current_term      = get_category( $query_args['cat'] );
}

if ( empty( $query_args['cat'] ) && $args['current-item']->object === 'category' ) {
	$query_args['cat'] = $args['current-item']->object_id;
	$current_term      = $args['current-item'];
}

// category term is not valid
if ( empty( $current_term ) || is_wp_error( $current_term ) ) {

	if ( is_user_logged_in() ) {
		?>
		<div class="mega-menu tabbed-grid-posts">
			<div class="content-wrap clearfix">
				<div style="margin: 30px; padding: 30px; text-align: center; color: #000; background: #eeeec3; text-transform: none">
					<?php _e( 'Mega menu selected for a not valid category. Please use mega menu for a category.', 'publisher' ); ?>
				</div>
			</div>
		</div>
		<?php
	}

	publisher_clear_props();

	return;
}

// Prepare query
$wp_query = new WP_Query( $query_args );
publisher_set_query( $wp_query, 'cache_posts=1' );

$menu_id = mt_rand();

$args = array(
	'parent' => $query_args['cat'],
	'number' => publisher_get_option( 'mega_tabbed_cats_count' ),
);

if ( publisher_get_option( 'mega_tabbed_cats_order' ) != 'length' ) {
	$args['orderby'] = publisher_get_option( 'mega_tabbed_cats_order' );

	if ( publisher_get_option( 'mega_tabbed_cats_order' ) === 'count' ) {
		$args['order'] = 'DESC';
	}
}

$sub_cats = get_categories( $args );

// Sorts terms by name length
if ( publisher_get_option( 'mega_tabbed_cats_order' ) === 'length' ) {
	bf_sort_terms( $sub_cats );
}

$tabs = array();
foreach ( $sub_cats as $_sub_cat ) {
	$tabs[] = array(
		'name' => $_sub_cat->name,
		'link' => get_term_link( $_sub_cat, 'category' ),

		'term_id'  => $_sub_cat->term_id,
		'block_id' => mt_rand(),
	);
}

?>
	<div class="mega-menu tabbed-grid-posts">
		<div class="content-wrap clearfix">
			<ul class="tabs-section">
				<?php $angle = is_rtl() ? 'left' : 'right'; ?>
				<li class="active">
					<a href="<?php echo esc_url( $current_term->url ); ?>"
					   data-target="#mtab-<?php echo esc_attr( $menu_id ); ?>-<?php echo esc_attr( $current_term->object_id ); ?>"
					   data-toggle="tab" aria-expanded="true"
					   class="term-<?php echo esc_attr( $current_term->object_id ); ?>">
						<i class="fa fa-angle-<?php echo $angle; ?>"></i> <?php publisher_translation_echo( 'menu_all' ); ?>
					</a>
				</li>
				<?php

				foreach ( $tabs as $tab ) {

					$id = mt_rand();
					?>
					<li>
						<a href="<?php echo esc_url( $tab['link'] ); ?>"
						   data-target="#mtab-<?php echo esc_attr( $menu_id ); ?>-<?php echo esc_attr( $tab['term_id'] ); ?>"
						   data-deferred-init="<?php echo esc_attr( $tab['block_id'] ); ?>"
						   data-toggle="tab" data-deferred-event="mouseenter"
						   class="term-<?php echo esc_attr( $tab['term_id'] ); ?>">
							<i class="fa fa-angle-<?php echo $angle; ?>"></i> <?php echo $tab['name']; // escaped before ?>
						</a>
					</li>
					<?php

				}

				?>
			</ul>
			<div class="tab-content">
				<div class="tab-pane bs-tab-anim bs-tab-animated active"
				     id="mtab-<?php echo esc_attr( $menu_id ); ?>-<?php echo esc_attr( $current_term->object_id ); ?>">
					<?php

					$atts = array(
						'paginate'        => 'next_prev',
						'have_pagination' => true,
						'show_label'      => true,

						'order_by' => 'date',
						'count'    => 3,
						'category' => $current_term->object_id,
					);

					publisher_set_prop( 'listing-main-term', $current_term->object_id );

					publisher_theme_pagin_manager()->wrapper_start( $atts );

					publisher_get_view( 'menu', 'mega-tabbed-grid-posts-content' );

					publisher_theme_pagin_manager()->wrapper_end();

					publisher_theme_pagin_manager()->display_pagination( $atts, $wp_query, 'Publisher::bs_pagin_ajax_tabbed_mega_grid_posts', 'wp_query' );

					?>
				</div>
				<?php

				$view = 'Publisher::bs_pagin_ajax_tabbed_mega_grid_posts';

				$type = 'wp_query';

				foreach ( $tabs as $tab ) {
					?>
					<div class="tab-pane bs-tab-anim<?php echo $is_deferred_load ? ' bs-deferred-container' : '' ?>"
					     id="mtab-<?php echo esc_attr( $menu_id ); ?>-<?php echo esc_attr( $tab['term_id'] ); ?>">
						<?php

						// Prepare query nad atts
						$atts['category'] = $query_args['cat'] = $tab['term_id'];
						publisher_set_prop( 'listing-main-term', $tab['term_id'] );

						if ( $is_deferred_load ) {

							publisher_theme_pagin_manager()->wrapper_start( $atts );
							publisher_theme_pagin_manager()->display_deferred_html( $atts, $view, $type, $tab['block_id'] );
							publisher_theme_pagin_manager()->wrapper_end();

						} else {

							$wp_query = new WP_Query( $query_args );
							publisher_set_query( $wp_query, 'cache_posts=1' );
							publisher_theme_pagin_manager()->wrapper_start( $atts );
							publisher_get_view( 'menu', 'mega-tabbed-grid-posts-content' );
							publisher_theme_pagin_manager()->wrapper_end();
							publisher_theme_pagin_manager()->display_pagination( $atts, $wp_query, $view, $type );

						}

						?>
					</div>
					<?php
				}

				?>
			</div>
		</div>
	</div>
<?php

publisher_clear_props();
//TOOD: @vc_frontend
publisher_clear_query();
