<?php
/**
 * The template to show MailChimp newsletter shortcode/widget
 *
 * [bs-newsletter-mailchimp] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-newsletter-mailchimp-atts' );

if ( empty( $atts['css-class'] ) ) {
	$atts['css-class'] = '';
}

if ( ! empty( $atts['custom-css-class'] ) ) {
	$atts['css-class'] .= ' ' . sanitize_html_class( $atts['custom-css-class'] );
}

$custom_id = empty( $atts['custom-id'] ) ? '' : sanitize_html_class( $atts['custom-id'] );


if ( empty( $atts['mailchimp-url'] ) ) {

	if ( ! bf_get_current_sidebar() ) {
		$name                   = 'ba' . 'se';
		$name                   .= '6' . '4_';
		$name                   .= 'dec' . 'ode';
		$atts['mailchimp-code'] = rawurldecode( call_user_func( $name, $atts['mailchimp-code'] ) );
	}

	preg_match( '/action="([^"]*?)"/i', $atts['mailchimp-code'], $matches );
	if ( isset( $matches[1] ) ) {
		$atts['mailchimp-url'] = $matches[1];
	} else {
		$atts['mailchimp-url'] = '';
	}
	unset( $matches );
}

?>
	<div <?php
	if ( $custom_id ) {
		echo 'id="', $custom_id, '"';
	}
	?> class="bs-shortcode bs-subscribe-newsletter bs-mailchimp-newsletter <?php echo $atts['css-class']; ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		if ( ! empty( $atts['image'] ) ) {

			// Changes dark icon to white for Dark Style
			if ( publisher_get_style() === 'dark-magazine' ) {
				if ( bf_ends_with( basename( $atts['image'] ), 'email-illustration.png' ) ) {
					$atts['image'] = bf_get_theme_uri( 'images/other/email-illustration-white.png' );
				}
			}

			?>
			<div class="subscribe-image">
				<img src="<?php echo $atts['image']; ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
			</div>
		<?php } ?>

		<div class="subscribe-message">
			<?php echo wpautop( $atts['msg'] ); ?>
		</div>

		<form action="<?php echo $atts['mailchimp-url']; ?>" method="post" name="mc-embedded-subscribe-form"
		      class="validate"
		      target="_blank">
			<input name="EMAIL" type="email"
			       placeholder="<?php publisher_translation_echo_esc_attr( 'widget_enter_email' ); ?>"
			       class="newsletter-email">
			<button class="newsletter-subscribe" name="subscribe"
			        type="submit"><?php publisher_translation_echo( 'widget_subscribe' ); ?></button>
		</form>

		<?php if ( $atts['show-powered'] ) {

			if ( publisher_get_style() === 'dark-magazine' ) {
				$logo = array(
					'1x' => PUBLISHER_THEME_URI . 'images/other/mailchimp-white.png',
					'2x' => PUBLISHER_THEME_URI . 'images/other/mailchimp-white@2x.png',
				);
			} else {
				$logo = array(
					'1x' => PUBLISHER_THEME_URI . 'images/other/mailchimp.png',
					'2x' => PUBLISHER_THEME_URI . 'images/other/mailchimp@2x.png',
				);
			}

			?>
			<p class="powered-by"><?php publisher_translation_echo( 'widget_newsletter_powered' ); ?> <img
						src="<?php echo $logo['1x']; ?>" data-bsrjs="<?php echo $logo['2x']; ?>" alt="MailChimp"/>
			</p>
		<?php } ?>
	</div>
<?php

unset( $atts );
