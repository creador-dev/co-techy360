<?php
/**
 * Footer menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$menu_args = array(
	'theme_location' => 'footer-menu',
	'container'      => false,
	'items_wrap'     => '%3$s',
	'fallback_cb'    => 'BF_Menu_Walker',
);

?>
	<div class="row">
		<div class="col-lg-12">
			<div <?php publisher_attr( 'menu', 'footer-menu-wrapper', 'footer' ); ?>>
				<nav class="footer-menu-container">
					<ul id="footer-navigation" class="footer-menu menu clearfix">
						<?php wp_nav_menu( $menu_args ); ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
<?php

unset( $menu_args );
