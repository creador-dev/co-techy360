<?php
/**
 * Top menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$menu_args = array(
	'theme_location' => 'top-menu',
	'container'      => false,
	'items_wrap'     => '%3$s',
	'fallback_cb'    => 'BF_Menu_Walker',
);

?>
	<div <?php publisher_attr( 'menu', 'top-menu-wrapper', 'top' ); ?>>
		<nav class="top-menu-container">

			<ul id="top-navigation" class="top-menu menu clearfix bsm-pure">
				<?php

				if ( publisher_get_option( 'topbar_show_date' ) == 'show' ) {
					?>
					<li id="topbar-date" class="menu-item menu-item-date">
					<span
						class="topbar-date"><?php echo date_i18n( publisher_translation_get( 'topbar_date_format' ), current_time( 'timestamp' ) ); ?></span>
					</li>
					<?php
				}

				if ( has_nav_menu( 'top-menu' ) ) {

					wp_nav_menu( $menu_args );

				} elseif ( is_user_logged_in() ) {

					if ( is_user_logged_in() ) {
						?>
						<li>
							<a href="<?php echo admin_url( '/nav-menus.php?action=locations' ); ?>"><?php publisher_translation_echo( 'select_top_nav' ); ?></a>
						</li>
						<?php
					} else {
						?>
						<li><?php publisher_translation_echo( 'select_top_nav' ); ?></li>
						<?php
					}

				}

				?>
			</ul>

		</nav>
	</div>
<?php

unset( $menu_args );
