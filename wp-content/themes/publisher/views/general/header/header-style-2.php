<?php
/**
 * Header style 2 template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    5.0.0
 */

$ad = publisher_get_ad_location_data( 'header_aside_logo', array( 'show_mobile' => 'hide' ), true );

?>
	<header <?php publisher_attr( 'header', 'site-header header-style-2 ' . publisher_get_header_layout_class() ); ?>>

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
					<div class="row">
						<div class="row-height">
							<div class="logo-col <?php echo $ad['active_location'] ? 'col-xs-4' : 'col-xs-12'; ?>">
								<div class="col-inside">
									<?php publisher_get_view( 'header', '_brand', 'default' ); ?>
								</div>
							</div>
							<?php

							if ( $ad['active_location'] ) {
								?>
								<div class="sidebar-col col-xs-8">
									<div class="col-inside">
										<aside <?php publisher_attr( 'sidebar', '' ) ?>>
											<?php publisher_show_ad_location( 'header_aside_logo', array( 'ad-data' => $ad ) ); ?>
										</aside>
									</div>
								</div>
								<?php
							}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php publisher_get_view( 'menu', 'main', 'default' ); ?>

	</header><!-- .header -->
<?php

publisher_get_view( 'header', '_mobile-header', 'default' );
