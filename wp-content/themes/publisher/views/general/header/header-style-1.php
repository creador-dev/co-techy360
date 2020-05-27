<?php
/**
 * Header style 1 template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$class    = 'site-header header-style-1 ' . publisher_get_header_layout_class();
$ad_left  = publisher_get_ad_location_data( 'header_aside_logo_left' );
$ad_right = publisher_get_ad_location_data( 'header_aside_logo_right' );

if ( $ad_left['active_location'] || $ad_right['active_location'] ) {
	$class .= ' h-a-ad';
}

?>
	<header <?php publisher_attr( 'header', $class ); ?>>
		<?php

		// Show Topbar if is active
		if ( publisher_get_option( 'topbar_style' ) != 'hidden' ) {

			// Prints topbar code base the style was selected in panel.
			// Location: "views/general/header/topbar-*.php"
			publisher_get_view( 'header', 'topbar-' . publisher_get_option( 'topbar_style' ) );

		}

		?>
		<div class="header-inner">
			<div class="content-wrap">
				<div class="container">
					<?php

					if ( $ad_left['active_location'] || $ad_right['active_location'] ) {

						?>
						<div class="row">
							<div class="row-height">

								<div class="sidebar-col sidebar-col-ad-left col-xs-4">
									<div class="col-inside">
										<?php

										if ( $ad_left['active_location'] ) {
											?>

											<aside <?php publisher_attr( 'sidebar', '' ) ?>>
												<?php publisher_show_ad_location( 'header_aside_logo_left', array( 'ad-data' => $ad_left ) ); ?>
											</aside>
											<?php
										}

										?>
									</div>
								</div>

								<div class="logo-col col-xs-4">
									<div class="col-inside">
										<?php publisher_get_view( 'header', '_brand', 'default' ); ?>
									</div>
								</div>

								<div class="sidebar-col sidebar-col-ad-right col-xs-4">
									<div class="col-inside">
										<?php

										if ( $ad_right['active_location'] ) {
											?>

											<aside <?php publisher_attr( 'sidebar', '' ) ?>>
												<?php publisher_show_ad_location( 'header_aside_logo_right', array( 'ad-data' => $ad_right ) ); ?>
											</aside>
											<?php
										}

										?>
									</div>
								</div>

							</div>
						</div>
						<?php

					} else {
						publisher_get_view( 'header', '_brand', 'default' );
					}

					?>
				</div>

			</div>
		</div>
		<?php publisher_get_view( 'menu', 'main', 'default' ); ?>
	</header><!-- .header -->
<?php

publisher_get_view( 'header', '_mobile-header', 'default' );
