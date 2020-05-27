<?php
/**
 * The template to show likebox shortcode/widget
 *
 * [bs-likebox] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-likebox-atts' );

$height = 65;
if ( $atts['show_faces'] == true ) {
	$height += 175;
}
if ( $atts['show_posts'] == true ) {
	$height += 350;
}

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
	?> class="bs-shortcode bs-likebox <?php echo esc_attr( $atts['css-class'] ); ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		?>
		<div class="fb-page"
		     data-href="<?php echo esc_attr( $atts['url'] ) ?>"
		     data-small-header="false"
		     data-adapt-container-width="true"
		     data-show-facepile="<?php echo esc_attr( $atts['show_faces'] ); ?>"
		     data-locale="<?php echo esc_attr( $atts['locale'] ); ?>"
		     data-show-posts="<?php echo esc_attr( $atts['show_posts'] ); ?>">
			<div class="fb-xfbml-parse-ignore">
			</div>
		</div><!-- .fb-page -->
	</div><!-- .bs-likebox -->
<?php

unset( $atts );
