<?php
/**
 * The template to show about shortcode/widget
 *
 * [bs-about] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-about-atts' );

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
?> class="bs-shortcode bs-about <?php echo esc_attr( $atts['css-class'] ); ?>">
	<?php

	bf_shortcode_show_title( $atts ); // show title

	// Custom and Auto Generated CSS Codes
	if ( ! empty( $atts['css-code'] ) ) {
		bf_add_css( $atts['css-code'], true, true );
	}

	?>
	<h4 class="about-title">
		<?php

		if ( $atts['about_link_url'] != '' ){
		?><a href="<?php echo esc_url( $atts['about_link_url'] ); ?>"><?php
			}

			if ( $atts['logo_img'] ) { ?>
				<img class="logo-image" src="<?php echo esc_url( $atts['logo_img'] ); ?>"
				     alt="<?php echo esc_attr( $atts['logo_text'] ); ?>">
			<?php } else {
				echo esc_html( $atts['logo_text'] );
			}

			if ( $atts['about_link_url'] != '' ){
			?></a><?php
	}

	?>
	</h4>
	<div class="about-text">
		<?php echo wpautop( do_shortcode( $atts['content'] ) ); // escaped before ?>
	</div>
	<?php if ( $atts['about_link_url'] != '' ) { ?>
		<div class="about-link heading-typo">
			<a href="<?php echo esc_url( $atts['about_link_url'] ); ?>"><?php echo esc_html( $atts['about_link_text'] ); ?></a>
		</div>
	<?php }

	echo publisher_shortcode_about_get_icons( $atts );  // escaped before 

	?>
</div>
