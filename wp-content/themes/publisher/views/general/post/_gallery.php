<?php
/**
 * Gallery post formats top featured gallery template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$gallery_images_ids = publisher_get_first_gallery_ids();

$post_thumbnail_id = get_post_thumbnail_id();

// Ads featured image to first item of gallery image
if ( $gallery_images_ids ) {
	$gallery_images_ids = array_flip( $gallery_images_ids );
	$gallery_images_ids = array_keys( array( $post_thumbnail_id => $post_thumbnail_id ) + $gallery_images_ids );
} else {
	$gallery_images_ids = array( $post_thumbnail_id );
}

if ( ! $gallery_images_ids ) {
	return;
}

$gallery_images = new WP_Query( array(
	'post_type'      => 'attachment',
	'post_status'    => 'inherit',
	'post__in'       => $gallery_images_ids,
	'orderby'        => 'post__in',
	'posts_per_page' => - 1
) );


?>
<div class="gallery-slider">
	<div class="better-slider">
		<ul class="slides">
			<?php foreach ( $gallery_images->posts as $attachment ) { ?>

				<li>
					<a href="<?php echo esc_url( wp_get_attachment_url( $attachment->ID ) ); ?>"
					   title="<?php echo esc_attr( $attachment->post_excerpt ? $attachment->post_excerpt : '' ); ?>"
					   rel="prettyPhoto[featured-gallery]">
						<?php

						echo wp_get_attachment_image( $attachment->ID, 'publisher-lg', false ); // escaped before

						// caption
						if ( $attachment->post_excerpt ) {
							?>
							<p class="caption"><?php echo $attachment->post_excerpt; // escaped before in WP ?></p><?php
						} ?>
					</a>
				</li>

			<?php } // No Reset Query Needed; We Used WP_Query->posts result directly as object ?>
		</ul>
	</div><!-- .better-slider -->
</div><!-- .gallery-slider -->
