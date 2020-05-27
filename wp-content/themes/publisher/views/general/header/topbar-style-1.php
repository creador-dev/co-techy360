<?php
/**
 * Topbar style 1 template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

$show_social = class_exists( 'Better_Social_Counter_Shortcode' ) && ( publisher_get_option( 'topbar_show_social_icons' ) == 'show' );
$show_login  = publisher_get_option( 'topbar_show_login' ) == 'show';
$show_links  = $show_social || $show_login;

?>
<section class="topbar topbar-style-1 hidden-xs hidden-xs">
	<div class="content-wrap">
		<div class="container">
			<div class="topbar-inner clearfix">

				<?php if ( $show_links ) {

					?>
					<div class="section-links">
						<?php

						if ( $show_social ) {
							publisher_get_view( 'header', '_social-icons', 'default' );
						}

						if ( $show_login ) {

							$type = 'login';
							if ( is_user_logged_in() ) {
								$type = 'profile';
							} elseif ( get_option( 'users_can_register' ) ) {
								$type = 'login-register';
							}

							?>
							<a class="topbar-sign-in <?php echo $show_social ? 'behind-social' : ''; ?>"
							   data-toggle="modal" data-target="#bsLoginModal">
								<i class="fa fa-user-circle"></i> <?php

								if ( $type === 'login' ) {
									$text = publisher_translation_echo( 'login_login' );
								} elseif ( $type === 'profile' ) {
									$text = publisher_translation_echo( 'login_profile' );
								} elseif ( $type === 'login-register' ) {
									$text = publisher_translation_echo( 'login_register' );
								}

								echo $text;

								?>
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
					<?php publisher_get_view( 'menu', 'top', 'default' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
