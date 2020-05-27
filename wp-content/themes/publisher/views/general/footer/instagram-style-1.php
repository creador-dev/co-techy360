<?php
/**
 * Footer instagram style-1
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    3.0.0
 */

$username = ltrim( publisher_get_option( 'footer_instagram' ), '@' );

?>
<div class="footer-instagram footer-instagram-1 clearfix <?php echo publisher_get_footer_layout_class(); ?>">
	<h3 class="footer-instagram-label">
			<span>
				<?php publisher_translation_echo( 'footer_instagram_follow' ); ?> <a
						href="http://instagram.com/<?php echo esc_attr( $username ); ?>"
						target="_blank">@<?php echo esc_html( $username ); ?></a>
			</span>
	</h3>
	<?php

	$images_list = publisher_shortcode_instagram_get_data( array(
		'user_id'     => $username,
		'photo_count' => 18,
		'show_title'  => 0,
	) );

	if ( $images_list != false ) {

		// Show error message
		if ( is_wp_error( $images_list ) && is_user_logged_in() ) {
			echo $images_list->get_error_message(); // escaped before
		} // Print images
		elseif ( ! is_wp_error( $images_list ) ) {

			// Cols
			$col_1 = '';
			$col_2 = '';
			$col_3 = '';
			$col_4 = '';
			$col_5 = '';
			$col_6 = '';

			$counter = 1;

			$_check = array( '1' => '', '6' => '', '7' => '', '12' => '', '13' => '', '18' => '' );

			foreach ( $images_list as $image ) {

				$img_url = '';

				// change image size for big and small sizes
				if ( isset( $_check[ $counter ] ) ) {
					$img_url = $image['images']['large'];
				} else {
					$img_url = $image['images']['small'];
				}

				$temp = '<div class="bs-instagram-photo">
					<a href="' . esc_url( $image['link'] ) . '" target="_blank" class="img-holder"
					' . publisher_get_image_attr( $img_url ) . ' alt="' . esc_attr( $image['description'] ) . '">
					<span class="the-hover"></span>
					</a>
				</div>';

				switch ( $counter ) {

					case 1:
					case 2:
					case 3:
						$col_1 .= $temp;
						break;

					case 4:
					case 5:
					case 6:
						$col_2 .= $temp;
						break;

					case 7:
					case 8:
					case 9:
						$col_3 .= $temp;
						break;

					case 10:
					case 11:
					case 12:
						$col_4 .= $temp;
						break;

					case 13:
					case 14:
					case 15:
						$col_5 .= $temp;
						break;

					case 16:
					case 17:
					case 18:
						$col_6 .= $temp;
						break;

				}
				$counter ++;
			}

			?>
			<div class="bs-instagram-cols">
			<div class="bs-instagram-col bs-instagram-col-1 bs-instagram-col-type-1 clearfix">
				<?php echo $col_1; // escaped before ?>
			</div>

			<div class="bs-instagram-col bs-instagram-col-2 bs-instagram-col-type-2 clearfix">
				<?php echo $col_2; // escaped before ?>
			</div>

			<div class="bs-instagram-col bs-instagram-col-3 bs-instagram-col-type-1 clearfix">
				<?php echo $col_3; // escaped before ?>
			</div>

			<div class="bs-instagram-col bs-instagram-col-4 bs-instagram-col-type-2 clearfix">
				<?php echo $col_4; // escaped before ?>
			</div>

			<div class="bs-instagram-col bs-instagram-col-5 bs-instagram-col-type-1 clearfix">
				<?php echo $col_5; // escaped before ?>
			</div>

			<div class="bs-instagram-col bs-instagram-col-6 bs-instagram-col-type-2 clearfix">
				<?php echo $col_6; // escaped before ?>
			</div>
			</div><?php

		}
	}

	?>
</div>
