<?php
/**
 * Responsive menu and header template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

$site_name = get_bloginfo( 'name' );                              // Site name
$logo      = publisher_get_option( 'resp_logo_image' );           // Site logo
$logo2x    = publisher_get_option( 'resp_logo_image_retina' );    // Site 2X logo

// Default logos as fallback for resp logos
if ( $logo == '' ) {
	$logo   = publisher_get_option( 'logo_image' );        // Site logo
	$logo2x = publisher_get_option( 'logo_image_retina' ); // Site 2X logo

	// Custom logo for categories
	if ( is_category() && bf_get_term_meta( 'logo_image' ) != '' ) {
		$logo   = bf_get_term_meta( 'logo_image' );
		$logo2x = bf_get_term_meta( 'logo_image_retina' );
	}
}

// prepare retina logo tags
if ( $logo2x != '' ) {
	$logo2x = ' data-bsrjs="' . esc_url( $logo2x ) . '" ';
}

?>
	<div class="rh-header clearfix <?php publisher_echo_option( 'resp_scheme' ); ?> deferred-block-exclude">
		<div class="rh-container clearfix">

			<div class="menu-container close">
				<span class="menu-handler"><span class="lines"></span></span>
			</div><!-- .menu-container -->

			<div class="logo-container <?php echo empty( $logo ) ? 'rh-text-logo' : 'rh-img-logo' ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php publisher_attr( 'site-url' ); ?>>
					<?php

					// Site logo
					if ( ! empty( $logo ) ) { ?>
						<img src="<?php echo esc_attr( $logo ); ?>"
						     alt="<?php echo esc_attr( $site_name ); ?>" <?php echo $logo2x; // escaped before ?> /><?php
					} // Site title as text logo
					else {
						echo $site_name; // escaped before in top
					}

					?>
				</a>
			</div><!-- .logo-container -->
		</div><!-- .rh-container -->
	</div><!-- .rh-header -->
<?php

if ( ! class_exists( 'publisher_add_resp_header_to_footer' ) ) {

	add_action( 'wp_footer', 'publisher_add_resp_header_to_footer' );

	/**
	 * Adds Responsive Header panel codes to bottom of page
	 */
	function publisher_add_resp_header_to_footer() {


		$settings = publisher_get_option( 'resp_settings' );

		$class = '';
		$attrs = '';

		if ( ! $settings['login'] && ! is_user_logged_in() ) {
			$settings['login'] = false;
		}

		if ( publisher_get_option( 'resp_bg_style' ) === 'gradient' ) {
			$class .= publisher_get_option( 'resp_bg_gradient' );
		} elseif ( publisher_get_option( 'resp_bg_style' ) === 'color' ) {
			if ( publisher_get_option( 'resp_bg_color' ) !== '' ) {
				$attrs = 'style="background-color: ' . publisher_get_option( 'resp_bg_color' ) . '"';
			}
		} else {
			$class .= ' bg-img';
		}

		if ( ! $settings['login'] ) {
			$class .= ' no-login-icon';
		}

		if ( ! $settings['social_icons'] ) {
			$class .= ' no-social-icon';
		}

		if ( ! $settings['topbar_nav'] ) {
			$class .= ' no-top-nav';
		}

		?>
		<div class="rh-cover noscroll <?php echo $class; ?>" <?php echo $attrs; ?>>
			<span class="rh-close"></span>
			<div class="rh-panel rh-pm">
				<div class="rh-p-h">
					<?php

					if ( $settings['login'] ) {

						$type = 'login';
						if ( is_user_logged_in() ) {
							$type = 'profile';
						} elseif ( get_option( 'users_can_register' ) ) {
							$type = 'login-register';
						}

						?>
						<span class="user-login">
						<?php

						if ( $type === 'profile' ) {

							$current_user = wp_get_current_user();

							?>
							<span class="user-avatar user-avatar-image"><?php echo get_avatar( $current_user->ID, 26 ); ?></span>
							<?php
						} else {
							?>
							<span class="user-avatar user-avatar-icon"><i class="fa fa-user-circle"></i></span>
							<?php
						}

						if ( $type === 'login' ) {
							$text = publisher_translation_echo( 'login_login' );
						} elseif ( $type === 'profile' ) {
							$text = publisher_translation_echo( 'login_profile' );
						} elseif ( $type === 'login-register' ) {
							$text = publisher_translation_echo( 'login_register' );
						} else {
							$text = '';
						}

						echo $text;

						?>
						</span><?php

					}

					?>
				</div>

				<div class="rh-p-b">
					<?php

					// Final menu code
					$menu_code = '';

					// Final theme menu location id
					$menu_id = '';

					// If specific menu was defined for responsive header
					if ( has_nav_menu( 'resp-menu' ) ) {
						$menu_id = 'resp-menu';
					} // If main menu is not defined but the top menu is, then get top menu as resp menu
					elseif ( ! has_nav_menu( 'main-menu' ) && has_nav_menu( 'top-menu' ) ) {
						$menu_id = 'top-menu';
					}

					// Create final menu code
					if ( $menu_id != '' ) {

						$menu_args = array(
							'theme_location' => $menu_id,
							'container'      => false,
							'items_wrap'     => '%3$s',
							'fallback_cb'    => 'BF_Menu_Walker',
							'echo'           => false,
						);

						$menu_code = '<ul id="resp-navigation" class="resp-menu menu clearfix">' . wp_nav_menu( $menu_args ) . '</ul>';
					}

					?>
					<div class="rh-c-m clearfix"><?php echo $menu_code; // escaped before in top
						?></div>

					<?php

					if ( $settings['search'] ) {
						?>
						<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
							<input type="search" class="search-field"
							       placeholder="<?php publisher_translation()->_echo_esc_attr( 'search_dot' ); ?>"
							       value="<?php the_search_query() ?>" name="s"
							       title="<?php publisher_translation()->_echo_esc_attr( 'search_for' ); ?>"
							       autocomplete="off">
							<input type="submit" class="search-submit" value="">
						</form>
						<?php
					}

					if ( $settings['social_icons'] && ( publisher_get_option( 'topbar_style' ) === 'hidden' || ( class_exists( 'Better_Social_Counter_Shortcode' ) && publisher_get_option( 'topbar_show_social_icons' ) !== 'show' ) ) ) {
						publisher_get_view( 'header', '_social-icons', 'default' );
					}

					?>
				</div>
			</div>
			<?php

			if ( $settings['login'] ) { ?>
				<div class="rh-panel rh-p-u">
					<div class="rh-p-h">
						<span class="rh-back-menu"><i></i></span>
					</div>

					<div class="rh-p-b">
						<?php

						publisher_set_prop( 'bs-login-hide-title', true );
						publisher_set_prop( 'bs-login-hide-form', true );
						publisher_get_view( 'shortcodes', 'bs-login' );

						?>
					</div>
				</div>
				<?php

			}

			?>
		</div>
		<?php

	} // publisher_add_resp_header_to_footer
}
