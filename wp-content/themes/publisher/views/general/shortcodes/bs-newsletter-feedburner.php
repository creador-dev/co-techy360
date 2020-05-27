<?php
/**
 * The template to show FeedBurner newsletter shortcode/widget
 *
 * [bs-subscribe-newsletter] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-newsletter-feedburner-atts' );

if ( empty( $atts['css-class'] ) ) {
	$atts['css-class'] = '';
}

if ( ! empty( $atts['custom-css-class'] ) ) {
	$atts['css-class'] .= ' ' . sanitize_html_class( $atts['custom-css-class'] );
}

$custom_id = empty( $atts['custom-id'] ) ? '' : sanitize_html_class( $atts['custom-id'] );

?>
    <div <?php
	if ( $custom_id ) {
		echo 'id="', $custom_id, '"';
	}
	?> class="bs-shortcode bs-subscribe-newsletter bs-feedburner-newsletter <?php echo $atts['css-class']; ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		if ( ! empty( $atts['image'] ) ) {

			// Changes dark icon to white for Dark Style
			if ( publisher_get_style() === 'dark-magazine' && bf_get_theme_uri( 'images/other/email-illustration.png' ) == $atts['image'] ) {
				$atts['image'] = bf_get_theme_uri( 'images/other/email-illustration-white.png' );
			}

			?>
            <div class="subscribe-image">
                <img src="<?php echo $atts['image']; ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
            </div>
		<?php } ?>

        <div class="subscribe-message">
			<?php echo wpautop( $atts['msg'] ); ?>
        </div>

        <form method="post" action="//feedburner.google.com/fb/a/mailverify" class="bs-subscribe-feedburner clearfix"
              target="_blank">
            <input type="hidden" value="<?php echo esc_attr( $atts['feedburner-id'] ); ?>" name="uri"/>
            <input type="hidden" name="loc" value="<?php echo get_locale(); ?>"/>
            <input type="text" id="feedburner-email" name="email" class="newsletter-email"
                   placeholder="<?php publisher_translation_echo_esc_attr( 'widget_enter_email' ); ?>"/>
            <button class="newsletter-subscribe" name="submit"
                    type="submit"><?php publisher_translation_echo( 'widget_subscribe' ); ?></button>

			<?php

			if ( publisher_get_style() === 'dark-magazine' ) {
				$logo = array(
					'1x' => PUBLISHER_THEME_URI . 'images/other/feedburner-white.png',
					'2x' => PUBLISHER_THEME_URI . 'images/other/feedburner-white@2x.png',
				);
			} else {
				$logo = array(
					'1x' => PUBLISHER_THEME_URI . 'images/other/feedburner.png',
					'2x' => PUBLISHER_THEME_URI . 'images/other/feedburner@2x.png',
				);
			}

			if ( $atts['show-powered'] ) { ?>
                <p class="powered-by"><?php publisher_translation_echo( 'widget_newsletter_powered' ); ?> <img
                            src="<?php echo $logo['1x']; ?>" data-bsrjs="<?php echo $logo['2x']; ?>" alt="MailChimp"/>
                </p>
			<?php } ?>
        </form>

    </div>
<?php

unset( $atts );
