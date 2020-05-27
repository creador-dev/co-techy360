<?php
/**
 * The template to push notification widget
 *
 * [bs-push-notification] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    5.1.0
 */

$atts = publisher_get_prop( 'shortcode-bs-push-notification-atts' );

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
?> class="better-studio-shortcode bs-push-noti bspn-s1 bspn-t1 clearfix <?php echo ! empty( $atts['location'] ) ? $atts['location'] : '' ?>  <?php echo esc_attr( $atts['css-class'] ); ?>">
	<?php

	bf_shortcode_show_title( $atts ); // show title

	?>
	<div class="bs-push-noti-inner">

		<div class="bs-push-noti-wrapper-icon"><i class="notification-icon bsfi-bell"></i></div>

		<p class="bs-push-noti-message"><?php publisher_translation_echo( 'push_notification_desc' ); ?></p>

		<button class="btn btn-light bs-push-noti-button"><?php publisher_translation_echo( 'push_notification_subscribe' ); ?></button>

		<div class="bs-push-noti-bg"><i class="bsfi-bell"></i></div>
	</div>
</div>
