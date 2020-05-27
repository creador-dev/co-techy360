<?php
/**
 * Main menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.1.0
 */

$menu_wrapper_class = 'main-menu-wrapper';

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
	$menu_args['menu'] = bf_get_post_meta( 'main_nav_menu', NULL, 'default' );

	// default -> Retrieve from parent category
	if ( $menu_args['menu'] === 'default' ) {

		$main_term = publisher_get_post_primary_cat();

		if ( ! is_wp_error( $main_term ) && is_object( $main_term ) && bf_get_term_meta( 'override_in_posts', $main_term ) ) {
			$menu_args['menu'] = bf_get_term_meta( 'main_nav_menu', $main_term, 'default' );
		}
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

// remove default from menu!
if ( isset( $menu_args['menu'] ) && $menu_args['menu'] === 'default' ) {
	unset( $menu_args['menu'] );
}

$show_search = publisher_get_option( 'menu_show_search_box' ) == 'show';
if ( $show_search ) {
	$menu_wrapper_class .= ' show-search-item';
}

$show_off_canvas = publisher_get_option( 'off_canvas' );
if ( $show_off_canvas ) {
	$menu_wrapper_class .= ' show-off-canvas';
}

$show_cart = publisher_get_option( 'menu_show_shop_cart' ) == 'show' && function_exists( 'is_woocommerce' ) && ! is_cart() && ! is_checkout();
if ( $show_cart ) {
	$menu_wrapper_class .= ' show-cart-item';
}

// count of buttons in menu actions
$action_buttons_count = intval( $show_search ) + intval( $show_off_canvas ) + intval( $show_cart );

// Add actions button width to menu for left/right padding
if ( $action_buttons_count ) {
	$menu_wrapper_class .= ' menu-actions-btn-width-' . $action_buttons_count;
}

?>
<div <?php publisher_attr( 'menu', $menu_wrapper_class, 'main' ); ?>>
	<div class="main-menu-inner">
		<div class="content-wrap">
			<div class="container">

				<nav class="main-menu-container">
					<ul id="main-navigation" class="main-menu menu bsm-pure clearfix">
						<?php

						if ( has_nav_menu( 'main-menu' ) ) {

							wp_nav_menu( $menu_args );

						} elseif ( is_user_logged_in() ) {

							if ( current_user_can( 'edit_theme_options' ) ) {
								?>
								<li>
									<a href="<?php echo admin_url( '/nav-menus.php?action=locations' ); ?>"><?php publisher_translation_echo( 'select_main_nav' ); ?></a>
								</li>
								<?php
							} else {
								?>
								<li><?php publisher_translation_echo( 'select_main_nav' ); ?></li>
								<?php
							}

						}

						?>
					</ul><!-- #main-navigation -->
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
				</nav><!-- .main-menu-container -->

			</div>
		</div>
	</div>
</div><!-- .menu -->