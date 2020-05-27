<?php
/**
 * Footer widgets template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$columns = publisher_get_option( 'footer_widgets' );


if ( $columns === 'hide' ) {
	return;
}

// if widgets are not active
if (
	! is_active_sidebar( 'footer-1' ) &&
	! is_active_sidebar( 'footer-2' ) &&
	! is_active_sidebar( 'footer-3' ) &&
	! is_active_sidebar( 'footer-4' )
) {
	return;
}


?>
<div class="footer-widgets <?php publisher_echo_option( 'footer_widgets_text' ); ?>">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<?php

				switch ( $columns ) {

					case '4-column':
						?>
						<div class="col-sm-3">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-1' ) ?>>
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
						<div class="col-sm-3">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-2' ) ?>>
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
						<div class="col-sm-3">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-3' ) ?>>
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</aside>
						</div>
						<div class="col-sm-3">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-4' ) ?>>
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</aside>
						</div>
						<?php
						break;

					case '3-column':

						?>
						<div class="col-sm-4">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-1' ) ?>>
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
						<div class="col-sm-4">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-2' ) ?>>
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
						<div class="col-sm-4">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-3' ) ?>>
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</aside>
						</div>
						<?php
						break;

					case '2-column':

						?>
						<div class="col-sm-6">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-1' ) ?>>
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
						<div class="col-sm-6">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-2' ) ?>>
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
						<?php
						break;

					case '1-column':

						?>
						<div class="col-sm-12">
							<aside <?php publisher_attr( 'sidebar', '', 'footer-1' ) ?>>
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
						<?php
						break;

				}

				?>
			</div>
		</div>
	</div>
</div>
