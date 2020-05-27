<?php
/**
 * Menu cart widget
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

global $woocommerce;

?>
<div class="shop-cart-container close">

	<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-handler">
		<i class="fa fa-shopping-cart"></i> <?php echo $woocommerce->cart->cart_contents_count ? '<span class="cart-count">' . esc_html( $woocommerce->cart->cart_contents_count ) . '</span>' : ''; ?>
	</a>

	<div class="cart-box woocommerce clearfix">
		<?php

		the_widget( 'WC_Widget_Cart', 'title= ',
			array(
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		?>
	</div>
</div>
