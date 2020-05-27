<?php
/**
 * Main menu inline mode template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.1.0
 */

$menu_args = array(
	'theme_location' => 'main-menu',
	'container'      => false,
	'items_wrap'     => '%3$s',
	'fallback_cb'    => 'BF_Menu_Walker',
);

// Custom menu for category
if ( is_category() ) {
	if ( bf_get_term_meta( 'main_nav_menu' ) != 'default' ) {
		$menu_args['menu'] = bf_get_term_meta( 'main_nav_menu' );
	}
} // Custom menu for page
elseif ( is_singular() ) {
	if ( bf_get_post_meta( 'main_nav_menu' ) != 'default' ) {
		$menu_args['menu'] = bf_get_post_meta( 'main_nav_menu' );
	}
} // Custom menu for search page
elseif ( is_search() ) {
	if ( publisher_get_option( 'search_menu' ) != 'default' ) {
		$menu_args['menu'] = publisher_get_option( 'search_menu' );
	}
} // custom menu for 404 page
elseif ( is_404() ) {
	if ( publisher_get_option( 'archive_404_menu' ) != 'default' ) {
		$menu_args['menu'] = publisher_get_option( 'archive_404_menu' );
	}
}

$menu_container_class = 'main-menu-container ';

$show_search = publisher_get_option( 'menu_show_search_box' ) == 'show';
if ( $show_search ) {
	$menu_container_class .= ' show-search-item';
}

$show_cart = publisher_get_option( 'menu_show_shop_cart' ) == 'show' && function_exists( 'is_woocommerce' ) && ! is_cart() && ! is_checkout();
if ( $show_cart ) {
	$menu_container_class .= ' show-cart-item';
}

$show_off_canvas = publisher_get_option( 'off_canvas' );
if ( $show_off_canvas ) {
	$menu_container_class .= ' show-off-canvas';
}

// count of buttons in menu actions
$action_buttons_count = intval( $show_search ) + intval( $show_off_canvas ) + intval( $show_cart );

// Add actions button width to menu for left/right padding
if ( $action_buttons_count ) {
	$menu_container_class .= ' menu-actions-btn-width-' . $action_buttons_count;
}

?>
<nav <?php publisher_attr( 'menu', $menu_container_class, 'main' ); ?>>
	<?php

	if ( $action_buttons_count ) {

		?>
		<div class="menu-action-buttons width-<?php echo $action_buttons_count; ?>">
			<?php

			if ( $show_off_canvas ) {

				$off_canvas_dir = sanitize_html_class( publisher_get_option( 'off_canvas_position' ) );
				if ( is_rtl() ) {
					$off_canvas_dir = $off_canvas_dir === 'right' ? 'left' : 'right';
				}

				?>
				<div class="off-canvas-menu-icon-container off-icon-<?php echo $off_canvas_dir; ?>">
					<div class="off-canvas-menu-icon">
						<div class="off-canvas-menu-icon-el"></div>
					</div>
				</div>
				<?php
			}


			if ( $show_search ) {
				?>
				<div class="search-container close">
					<span class="search-handler"><i class="fa fa-search"></i></span>

					<div class="search-box clearfix">
						<?php publisher_get_view( 'wp', 'searchform', 'default' ); ?>
					</div>
				</div>
				<?php
			}


			if ( $show_cart ) {
				publisher_get_view( 'woocommerce', 'menu-cart', 'default' );
			}


			?>
		</div>
		<?php
	}

	?>
	<ul id="main-navigation" class="main-menu menu bsm-pure clearfix">
		<?php

		if ( has_nav_menu( 'main-menu' ) ) {

			wp_nav_menu( $menu_args );

		} elseif ( is_user_logged_in() ) {

			?>
			<li><?php publisher_translation_echo( 'select_main_nav' ); ?></li>
			<?php

		}

		?>
	</ul><!-- #main-navigation -->
</nav><!-- .main-menu-container -->
