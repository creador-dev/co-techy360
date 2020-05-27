<?php
/**
 * Topbar style 2 template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    2.0.0
 */

$show_social = class_exists( 'Better_Social_Counter_Shortcode' ) && ( publisher_get_option( 'topbar_show_social_icons' ) == 'show' );
$show_login  = publisher_get_option( 'topbar_show_login' ) == 'show';
$show_links  = $show_social || $show_login;

?>
<section class="topbar topbar-style-2 hidden-xs hidden-xs">
	<div class="content-wrap">
		<div class="container">

			<div class="topbar-inner clearfix">

				<?php if ( $show_links ) { ?>
					<div class="section-links">
						<?php

						if ( $show_social ) {
							publisher_get_view( 'header', '_social-icons', 'default' );
						}

						if ( $show_login ) {

							?>
							<a class="topbar-sign-in <?php echo $show_social ? 'behind-social' : ''; ?>"
							   data-toggle="modal" data-target="#bsLoginModal">
								<i class="fa fa-user-circle"></i> <?php ! is_user_logged_in() ? publisher_translation_echo( 'login_login' ) : publisher_translation_echo( 'login_profile' ) ?>
							</a>

							<div class="modal sign-in-modal fade" id="bsLoginModal" tabindex="-1" role="dialog"
							     style="display: none">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
											<span class="close-modal" data-dismiss="modal" aria-label="Close"><i
														class="fa fa-close"></i></span>
										<div class="modal-body">
											<?php

											publisher_set_prop( 'bs-login-hide-title', true );
											publisher_set_prop( 'bs-login-hide-form', true );
											publisher_get_view( 'shortcodes', 'bs-login' );

											?>
										</div>
									</div>
								</div>
							</div>
							<?php

						}

						?>
					</div>
				<?php } ?>

				<div class="section-menu">
					<?php

					$cat_filter = publisher_get_option( 'topbar_newsticker_cat' );

					// remove + (BF Term selector primary term identifier)
					if ( ! empty( $cat_filter ) ) {
						$cat_filter = str_replace( '+', '', $cat_filter );
					}

					echo do_shortcode( '[better-newsticker cat="' . $cat_filter . '"]' );

					?>
				</div>

			</div>
		</div>
	</div>
</section>
