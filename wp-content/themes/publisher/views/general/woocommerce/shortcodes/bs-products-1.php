<?php
/**
 * Products shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    5.0.0
 */

$atts     = publisher_get_prop( 'shortcode-bs-products-1-atts' );
$products = publisher_get_query();
$columns  = $atts['columns'];
wc_set_loop_prop( 'columns', $columns );

publisher_set_prop( 'woocommerce-columns', $columns );

?>
	<div class="woocommerce columns-<?php echo esc_attr( $columns ); ?>">
		<?php

		if ( publisher_have_posts() ) {
			?>
			<?php woocommerce_product_loop_start(); ?>

			<?php while( publisher_have_posts() ) : publisher_the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
		} else {
			do_action( "woocommerce_shortcode_{$loop_name}_loop_no_results" );
		}

		?>
	</div>
<?php

publisher_unset_prop( 'woocommerce-columns' );
