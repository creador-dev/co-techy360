<?php
/**
 * The template to show flickr shortcode/widget
 *
 * [bs-flickr] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-flickr-atts' );

$style = '';
switch ( $atts['style'] ) {

	case 2:
	case 3:
		$style = 'columns-' . $atts['style'];
		break;

	case 'list':
		$style = 'list-photos';
		break;

	case 'slider':
		$style = 'slider';
		break;

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
	?> class="bs-shortcode bs-flickr clearfix <?php echo esc_attr( $atts['css-class'] ); ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		if ( ! empty( $atts['user_id'] ) ) {

			$images_list = publisher_shortcode_flickr_get_data( $atts );

			if ( is_wp_error( $images_list ) ) {
				if ( is_user_logged_in() ) {
					echo $images_list->get_error_message(); // escaped before
				}

			} elseif ( $images_list != false ) {

				$images_list = array_slice( $images_list, 0, $atts['photo_count'] );

				switch ( $style ) {

					// Simple Grid
					case 'columns-3':
					case 'columns-2':
					case 'list-photos':

						?>
						<ul class="bs-flickr-photo-list <?php echo esc_attr( $style ); ?> clearfix"><?php

						foreach ( (array) $images_list as $index => $item ) {

							?>
							<li class="bs-flickr-photo">
								<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" class="img-holder"
									<?php publisher_the_image_attr( $item['media']['s'] ) ?>
                                   title="<?php echo esc_attr( $item['title'] ); ?>">
								</a>
							</li>
							<?php
						}

						?></ul><?php

						break;

					// Slider
					case 'slider':

						// Slider ID
						$slider_id = 'inst-slider-' . mt_rand();

						?>
						<div class="better-slider" id="<?php echo esc_attr( $slider_id ); ?>" data-animation="slide"
						     data-slideshowSpeed="6000" data-animationSpeed="500">
							<ul class="slides">
								<?php

								foreach ( $images_list as $item ) {

									?>
									<li class="bs-flickr-photo">
										<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"
										   class="img-holder"
											<?php publisher_the_image_attr( $item['media']['s'] ) ?>
                                           title="<?php echo esc_attr( $item['title'] ); ?>">
										</a>
									</li>
									<?php

								}

								?>
							</ul>
						</div><!-- /better-slider -->
						<?php
						break;
				} // switch
			}
		}

		?>
	</div><!-- .bs-flickr -->
<?php

unset( $atts );
unset( $images_list );
