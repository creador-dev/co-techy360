<?php
/**
 * The template to show heading shortcode/widget
 *
 * [bs-heading] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-heading-atts' );

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
	?> class="bs-shortcode bs-heading-shortcode <?php echo esc_attr( $atts['css-class'] ); ?>">
		<?php

		if ( ! empty( $atts['heading_tag'] ) ) {
			publisher_set_blocks_title_tag( $atts['heading_tag'], true );
		}

		bf_shortcode_show_title( $atts );

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		?>
	</div>
<?php

unset( $atts );
