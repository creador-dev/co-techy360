<?php
/**
 * The template to show google+ shortcode/widget
 *
 * [bs-google-plus] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-google-plus-atts' );

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
	?> class="bs-shortcode bs-google-plus clearfix <?php echo esc_attr( $atts['css-class'] ); ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		if ( ! empty( $atts['url'] ) ) {

			switch ( $atts['type'] ) {

				case 'page':
					$type = 'g-page';
					break;

				case 'community':
					$type = 'g-community';
					break;

				default:
					$type = 'g-person';
					break;

			}

			?>
			<div class="<?php echo esc_attr( $type ); ?> google-plus-block" data-width="<?php echo esc_attr( $atts['width'] ); ?>"
			     data-href="<?php echo esc_url( $atts['url'] ); ?>"
			     data-layout="<?php echo esc_attr( $atts['layout'] ); ?>"
			     data-theme="<?php echo esc_attr( $atts['scheme'] ); ?>" data-rel="publisher"
			     data-showtagline="<?php echo $atts['tagline'] == 'show' ? 'true' : 'false'; ?>"
			     data-lang="<?php echo esc_attr( $atts['lang'] ); ?>"
			     data-showcoverphoto="<?php echo $atts['cover'] == 'show' ? 'true' : 'false'; ?>"></div>
			<?php

		}
		?>
	</div><!-- .bs-google-plus -->
<?php

unset( $atts );
