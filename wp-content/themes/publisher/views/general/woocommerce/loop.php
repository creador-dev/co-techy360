<?php
/**
 * Loop of WooCommerce
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

if ( is_singular( 'product' ) ) {

	while( have_posts() ) : the_post();

		wc_get_template_part( 'content', 'single-product' );

	endwhile;

} else {

	$use_page_builder = false;

	$post_id = false;

	switch ( true ) {
		case is_shop():
			$post_id = wc_get_page_id( 'shop' );
			break;

		case is_cart():
			$post_id = wc_get_page_id( 'cart' );
			break;

		case is_checkout():
			$post_id = wc_get_page_id( 'checkout' );
			break;

		case is_account_page():
			$post_id = wc_get_page_id( 'myaccount' );
			break;
	}

	// Fix search page bug when there is VC blocks
	if ( is_search() ) {

		$use_page_builder = false;
		if ( is_search() ) {
			remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );
			remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
		}
	} elseif ( $post_id ) {
		$use_page_builder = publisher_is_pagebuilder_used( $post_id );
	}

	if ( $use_page_builder ) {

		$post = get_post( $post_id );
		echo apply_filters( 'the_content', $post->post_content ); // escaped before

	} else {

		?>
		<div class="wc-loop-heading clearfix">
			<?php

			if ( apply_filters( 'woocommerce_show_page_title', true ) ) :

				$page_title = woocommerce_page_title( false );

				if ( ! empty( $page_title ) ) {
					?>
					<h1 class="section-heading wc-section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
								class="h-text"><?php echo wp_kses( $page_title, bf_trans_allowed_html() ); ?></span>
					</h1>
					<?php
				}

			endif; ?>
		</div>

		<div class="wc-loop-body clearfix">

			<?php if ( have_posts() ) : ?>

				<?php do_action( 'woocommerce_before_shop_loop' ); ?>

			<?php endif; ?>

			<?php do_action( 'woocommerce_archive_description' ); ?>

			<?php if ( have_posts() ) { ?>

				<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php do_action( 'woocommerce_after_shop_loop' ); ?>

			<?php } elseif ( ! woocommerce_product_subcategories( array(
					'before' => woocommerce_product_loop_start( false ),
					'after'  => woocommerce_product_loop_end( false )
				)
			)
			) {
				wc_get_template( 'loop/no-products-found.php' );
			}

			?>
		</div>
		<?php

	}

}
