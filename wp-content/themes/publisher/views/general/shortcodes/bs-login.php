<?php
/**
 * The template to show box 4 shortcode/widget
 *
 * [bs-login] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.5.5
 */

$atts = publisher_get_prop( 'shortcode-bs-login-atts', array() );

if ( empty( $atts['css-class'] ) ) {
	$atts['css-class'] = '';
}

if ( ! empty( $atts['custom-css-class'] ) ) {
	$atts['css-class'] .= ' ' . sanitize_html_class( $atts['custom-css-class'] );
}

$form_id = empty( $atts['custom-id'] ) ? 'form_' . mt_rand( 10, 100000 ) . '_' : sanitize_html_class( $atts['custom-id'] );

$type = 'login';
if ( is_user_logged_in() ) {
	$type = 'profile';
} elseif ( get_option( 'users_can_register' ) ) {
	$type = 'login-register';
}

if ( bf_get_current_sidebar() == '' && publisher_get_prop( 'bs-login-hide-title', false ) === false ) {
	if ( is_user_logged_in() ) {
		$atts['title'] = publisher_translation_get( 'login_profile' );
	} else {
		$atts['title'] = publisher_translation_get( 'login_login' );
	}
}

?>
<div <?php
if ( $form_id ) {
	echo 'id="', $form_id, '"';
}
?> class="bs-shortcode bs-login-shortcode <?php echo esc_attr( $atts['css-class'] ); ?>">
	<?php

	bf_shortcode_show_title( $atts );

	// Custom and Auto Generated CSS Codes
	if ( ! empty( $atts['css-code'] ) ) {
		bf_add_css( $atts['css-code'], true, true );
	}

	// Retrieve from cache
	$login_form    = publisher_get_global( 'login-form', '' );
	$login_form_id = publisher_get_global( 'login-form-id', '' );

	if ( $login_form ) {

		// Change the form ID to prevent the console error about duplicate ID's
		$login_form = str_replace( $login_form_id, $form_id, $login_form );

		echo $login_form;
		unset( $login_form );
		echo '</div>'; // close for shortcode

		return;
	}

	ob_start();

	$attr = '';

	if ( publisher_get_prop( 'bs-login-hide-form', false ) ) {
		$attr = ' style="display:none"';
	}

	?>
	<div class="bs-login bs-type-<?php echo $type; ?>" <?php echo $attr; ?>>

		<?php if ( $type === 'login' || $type === 'login-register' ) { ?>
			<div class="bs-login-panel bs-login-sign-panel bs-current-login-panel">
				<?php

				$args = array(
					'echo'           => true,
					'redirect'       => apply_filters( 'publisher/login/redirect', ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ),
					'form_id'        => 'loginform',
					'label_username' => publisher_translation_get( 'login_username' ),
					'label_password' => publisher_translation_get( 'login_password' ),
					'label_remember' => publisher_translation_get( 'login_remember' ),
					'label_log_in'   => publisher_translation_get( 'login_button' ),
					'id_username'    => $form_id . 'user_login',
					'id_password'    => $form_id . 'user_pass',
					'id_remember'    => $form_id . 'rememberme',
					'id_submit'      => 'wp-submit',
					'remember'       => true,
					'value_username' => '',
					'value_remember' => false,
				);

				$login_form_top    = apply_filters( 'login_form_top', '', $args );
				$login_form_middle = apply_filters( 'login_form_middle', '', $args );
				$login_form_bottom = apply_filters( 'login_form_bottom', '', $args );

				?>
				<form name="<?php echo $args['form_id']; ?>"
				      action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">

					<?php echo $login_form_top; ?>

					<div class="login-header">
						<span class="login-icon fa fa-user-circle main-color"></span>
						<p><?php publisher_translation_echo( 'login_message' ) ?></p>
					</div>
					<?php if ( $social_login = publisher_social_login_providers() ) { ?>
						<div class="login-field social-login-buttons clearfix">
							<?php

							$counter = 1;
							$count   = bf_count( $social_login );

							?>
							<ul class="items-count-<?php echo $count; ?>">
								<?php

								foreach ( $social_login as $site_id => $url ) {

									$label = false;

									if ( $count === 2 || $count === 1 ) {
										$label = true;
									} elseif ( $counter === 1 ) {
										$label = true;
									}

									?>
									<li class="item-<?php echo $counter; ?>">
										<?php publisher_wsl_get_button( $site_id, $site_id, $url, $label ); ?>
									</li>
									<?php

									$counter ++;
								}

								?>
							</ul>
							<div class="or-wrapper"><span
										class="or-text"><?php publisher_translation_echo( 'login_or' ); ?></span></div>
						</div>
					<?php } ?>

					<div class="login-field login-username">
						<input type="text" name="log" id="<?php echo esc_attr( $args['id_username'] ); ?>" class="input"
						       value="<?php echo esc_attr( $args['value_username'] ); ?>" size="20"
						       placeholder="<?php echo esc_html( $args['label_username'] ) ?>" required/>
					</div>

					<div class="login-field login-password">
						<input type="password" name="pwd" id="<?php echo esc_attr( $args['id_password'] ); ?>"
						       class="input"
						       value="" size="20" placeholder="<?php echo esc_attr( $args['label_password'] ); ?>"
						       required/>
					</div>

					<?php echo $login_form_middle; ?>

					<div class="login-field">
						<a href="<?php echo wp_lostpassword_url( $args['redirect'] ); ?>"
						   class="go-reset-panel"><?php publisher_translation_echo( 'login_forget_pass_btn' ) ?></a>

						<?php if ( $args['remember'] ) { ?>
							<span class="login-remember">
							<input class="remember-checkbox" name="rememberme" type="checkbox"
							       id="<?php echo esc_attr( $args['id_remember'] ); ?>"
							       value="forever" <?php echo( $args['value_remember'] ? ' checked="checked"' : '' ); ?> />
							<label class="remember-label"><?php echo esc_html( $args['label_remember'] ); ?></label>
						</span>
						<?php } ?>
					</div>

					<?php

					// hide social login buttons!
					add_filter( 'pre_option_wsl_settings_bouncer_authentication_enabled', 'publisher_wsl_disable_for_login_form', 100 );

					do_action( 'login_form' );

					remove_filter( 'pre_option_wsl_settings_bouncer_authentication_enabled', 'publisher_wsl_disable_for_login_form', 100 );

					?>

					<div class="login-field login-submit">
						<input type="submit" name="wp-submit"
						       class="button-primary login-btn"
						       value="<?php echo esc_attr( $args['label_log_in'] ); ?>"/>
						<input type="hidden" name="redirect_to" value="<?php echo esc_url( $args['redirect'] ); ?>"/>
					</div>

					<?php if ( $type === 'login-register' ) { ?>
						<div class="login-field login-signup">
							<span><?php publisher_translation_echo( 'login_no_account' ); ?> <a
										href="<?php echo wp_registration_url(); ?>"><?php publisher_translation_echo( 'login_signup' ); ?></a></span>
						</div>
					<?php }

					echo $login_form_bottom;

					?>
				</form>
			</div>

			<div class="bs-login-panel bs-login-reset-panel">

				<span class="go-login-panel"><i
							class="fa fa-angle-<?php echo is_rtl() ? 'right' : 'left' ?>"></i> <?php publisher_translation_echo( 'login_login' ); ?></span>

				<div class="bs-login-reset-panel-inner">
					<div class="login-header">
						<span class="login-icon fa fa-support"></span>
						<p><?php publisher_translation_echo( 'login_reset_msg_1' ); ?></p>
						<p><?php publisher_translation_echo( 'login_reset_msg_2' ) ?></p>
					</div>
					<?php

					$redirect_to = apply_filters( 'lostpassword_redirect', '' );

					?>
					<form name="lostpasswordform" id="<?php echo $form_id; ?>lostpasswordform"
					      action="<?php echo esc_url( network_site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ); ?>"
					      method="post">

						<div class="login-field reset-username">
							<input type="text" name="user_login" class="input" value=""
							       placeholder="<?php publisher_translation_echo_esc_attr( 'login_reset_username' ); ?>"
							       required/>
						</div>

						<?php
						/**
						 * Fires inside the lostpassword form tags, before the hidden fields.
						 *
						 * @since 2.1.0
						 */
						do_action( 'lostpassword_form' ); ?>

						<div class="login-field reset-submit">

							<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>"/>
							<input type="submit" name="wp-submit" class="login-btn"
							       value="<?php publisher_translation_echo_esc_attr( 'login_reset_send' ); ?>"/>

						</div>
					</form>
				</div>
			</div>
		<?php } else {

			$current_user = wp_get_current_user();

			?>
			<div class="bs-login-panel bs-login-user-panel bs-current-login-panel">

				<div class="login-header">
					<span class="login-icon">
						<?php echo get_avatar( $current_user->ID, 80 ); ?>
					</span>
					<p><?php echo sprintf( publisher_translation_get( 'login_welcome_back' ), $current_user->display_name ); ?></p>
				</div>

				<ul class="user-links">
					<?php

					do_action( 'publisher/user-profile/links' );

					if ( class_exists( 'bbpress' ) ) {
						$profile_url = bbp_get_user_profile_url( bbp_get_current_user_id() );
					} else {
						$profile_url = get_edit_user_link();
					}

					?>
					<li>
						<a href="<?php echo $profile_url; ?>" title="profile">
							<i class="fa fa-user-circle"></i> <?php publisher_translation_echo( 'login_profile' ); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo wp_logout_url( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>"
						   title="profile">
							<i class="fa fa-sign-out"></i> <?php publisher_translation_echo( 'login_logout_btn' ); ?>
						</a>
					</li>
				</ul>

			</div>
		<?php } ?>
	</div>
	<?php

	$login_form = ob_get_clean();
	publisher_set_global( 'login-form', $login_form );
	publisher_set_global( 'login-form-id', $form_id );
	echo $login_form;
	unset( $login_form );

	?>
</div>
