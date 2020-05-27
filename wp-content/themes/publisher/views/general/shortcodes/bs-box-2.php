<?php
/**
 * The template to show box 2 shortcode/widget
 *
 * [bs-box-2] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-box-2-atts' );

?>
	<div class="bs-shortcode bs-box bs-box-2 <?php echo $atts['image'] ? '' : 'box-no-bg'; // escaped before 
	echo ' ' . $atts['css-class']; // escaped before ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		?>
		<div class="bs-box-inner">
			<?php

			$img_src = publisher_get_media_src( $atts['image'], 'publisher-lg' );

			?>
			<div class="box-content">
				<a class="box-image" href="<?php echo esc_url( $atts['link'] ); ?>"
				   style="background-image: url('<?php echo esc_url( $img_src ); ?>')">
				</a>
				<div class="box-text">
					<h3 class="box-title"><?php echo $atts['heading']; ?></h3>
				</div>
			</div>
		</div>
	</div>
<?php

unset( $atts );
unset( $img_src );
