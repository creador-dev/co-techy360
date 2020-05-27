<?php
/**
 * Footer instagram style 3
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    3.0.0
 */

$username = ltrim( publisher_get_option( 'footer_instagram' ), '@' );

?>
	<div class="footer-instagram footer-instagram-3 clearfix <?php echo publisher_get_footer_layout_class(); ?>">
		<h3 class="footer-instagram-label">
			<span>
				<?php publisher_translation_echo( 'footer_instagram_follow' ); ?> <a
						href="http://instagram.com/<?php echo esc_attr( $username ); ?>"
						target="_blank">@<?php echo esc_html( $username ); ?></a>
			</span>
		</h3>

		<ul class="bs-instagram-photos">
			<?php

			$images_list = publisher_shortcode_instagram_get_data( array(
				'user_id'     => $username,
				'photo_count' => 12,
				'show_title'  => 0,
			) );

			if ( $images_list != false ) {

				// Show error message
				if ( is_wp_error( $images_list ) && is_user_logged_in() ) {
					echo $images_list->get_error_message(); // escaped before
				} // Print images
				elseif ( ! is_wp_error( $images_list ) ) {

					foreach ( $images_list as $image_id => $image ) {

						$img_url = $image['images']['small'];

						echo '<li class="bs-instagram-photo bs-instagram-photo-' . $image_id . '">
					<a class="img-holder" href="' . esc_url( $image['link'] ) . '" target="_blank" ' . publisher_get_image_attr( $img_url ) . ' alt="' . esc_attr( $image['description'] ) . '">
					</a>
				</li>';

					}

				}
			}

			?>
		</ul>
	</div>
<?php

unset( $images_list );
unset( $username );
