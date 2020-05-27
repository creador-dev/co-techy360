<?php
/**
 * The main content of Attachment post type.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.1.0
 */

the_post();

// attachment valid parent or false!
$parent = publisher_get_attachment_parent( get_the_ID() );

// main image size
$thumbnail_size      = 'publisher-lg';
$list_thumbnail_size = 'thumbnail';
if ( publisher_get_page_layout() == '1-col' ) {
	$thumbnail_size      = 'publisher-full';
	$list_thumbnail_size = 'publisher-mg2';
}

?>
	<article <?php publisher_attr( 'post', 'single-attachment-content' ); ?>>
		<?php

		if ( $parent ) {
			?>
			<div class="return-to">
				<a href="<?php echo get_permalink( $parent ); ?>" class="heading-typo"><i
						class="fa fa-angle-<?php echo is_rtl() ? 'right' : 'left'; ?>"></i> <?php

					echo esc_html( sprintf( publisher_translation_get( 'attachment_return_to' ), publisher_html_limit_words( get_the_title( $parent ), 100 ) ) )

					?></a>
			</div>
			<?php
		}

		?>
		<div class="single-featured">
			<?php

			if ( wp_attachment_is( 'image' ) ) {

				?>
				<a <?php publisher_attr( 'post-thumbnail-url', '', 'full' ); ?>>
					<img src="<?php echo esc_url( publisher_get_post_thumbnail_src( $thumbnail_size ) ); ?>"
					     alt="<?php the_title_attribute(); ?>">
				</a>
				<?php

			} elseif ( wp_attachment_is( 'video' ) || wp_attachment_is( 'audio' ) ) {

				$embed = bf_auto_embed_content( wp_get_attachment_url() );

				echo $embed['content'];
			}

			?>
		</div>

		<header class="attachment-header">
			<?php the_title( '<h1 class="attachment-title">', '</h1>' ); ?>
		</header>

		<?php

		if ( get_the_content() != '' ) { ?>
			<div <?php publisher_attr( 'post-lead' ); ?>><?php the_content(); ?></div><?php
		}

		// todo add more info for attachment like size, and download links for other size ...

		if ( is_rtl() ) {
			$older_text = '<i class="fa fa-angle-double-right"></i> ' . publisher_translation_get( 'attachment_prev' );
			$next_text  = publisher_translation_get( 'attachment_next' ) . ' <i class="fa fa-angle-double-left"></i>';
		} else {
			$next_text  = publisher_translation_get( 'attachment_next' ) . ' <i class="fa fa-angle-double-right"></i>';
			$older_text = '<i class="fa fa-angle-double-left"></i> ' . publisher_translation_get( 'attachment_prev' );
		}


		$args = array(
			'orderby' => publisher_get_option( 'attachment_images_orderby' ),
			'order'   => publisher_get_option( 'attachment_images_order' ),
		);


		{
			// Activates duplicate posts removal temporarily to make sure next/pre buttons will works
			publisher_set_global( 'disable-duplicate-posts', true );

			// Attachments with custom order
			$attachments = array_values( bf_get_post_attached_media( 'image', $parent, $args ) );

			// Deactivates duplicate posts removal temporarily
			publisher_unset_global( 'disable-duplicate-posts' );
		}


		$next = '';
		$prev = '';

		if ( ! empty( $attachments ) ) {

			foreach ( $attachments as $k => $attachment ) {
				if ( $attachment->ID == get_the_ID() ) {
					break;
				}
			}

			$prev = $k - 1;
			$next = $k + 1;

			if ( isset( $attachments[ $prev ] ) ) {
				$prev_attachment_id = $attachments[ $prev ]->ID;
				$prev               = wp_get_attachment_link( $prev_attachment_id, false, true, false, $older_text );
			} else {
				$prev = '';
			}

			if ( isset( $attachments[ $next ] ) ) {
				$next_attachment_id = $attachments[ $next ]->ID;
				$next               = wp_get_attachment_link( $next_attachment_id, false, true, false, $next_text );
			} else {
				$next = '';
			}

		}

		if ( ! empty( $next ) || ! empty( $prev ) ) {
			?>
			<div <?php publisher_attr( 'pagination', 'bs-links-pagination clearfix' ); ?>>
				<?php

				if ( ! empty( $next ) ) {
					?>
					<div
						class="newer"><?php echo apply_filters( "next_image_link", $next, $next_attachment_id, false, $next_text ); ?></div>
					<?php
				}

				if ( ! empty( $prev ) ) {
					?>
					<div
						class="older"><?php echo apply_filters( "prev_image_link", $prev, $prev_attachment_id, false, $older_text ); ?></div>
					<?php
				}

				?>
			</div>
			<?php
		}

		// Show all images inside parent post here
		if ( $parent && bf_count( $attachments ) > 1 ) {

			?>
			<div class="parent-images clearfix">
			<ul class="listing listing-attachment-siblings columns-5">
				<?php foreach ( $attachments as $img ) {

					// remove current image from list
					if ( $img->ID == get_the_ID() ) {
						?>
						<li class="listing-item listing-item-current item-<?php echo esc_attr( $img->ID ); ?>">
							<div class="img-holder"
								<?php publisher_the_thumbnail_attr( array(
									'size'          => $list_thumbnail_size,
									'attachment_id' => $img->ID
								) ); ?>>
								<i class="fa fa-eye"></i></div>
						</li>
						<?php
					} else {
						?>
						<li class="listing-item item-<?php echo esc_attr( $img->ID ); ?>">
							<a class="img-holder" itemprop="url" rel="bookmark"
							   href="<?php echo get_permalink( $img->ID ); ?>"
								<?php publisher_the_thumbnail_attr( array(
									'size'          => $list_thumbnail_size,
									'attachment_id' => $img->ID
								) ); ?>>
								<i class="fa fa-eye"></i></a>
						</li>
						<?php
					}

				} ?>
			</ul>
			</div><?php
		}

		?>
	</article>
<?php

unset( $attachments );
unset( $parent );
unset( $thumbnail_size );
unset( $list_thumbnail_size );
