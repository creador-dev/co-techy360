<?php
/**
 * The template for displaying pages
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    3.0.0
 */

the_post();

$use_page_builder = publisher_is_pagebuilder_used( get_the_ID() );

// Created by Visual Composer
if ( $use_page_builder ) {

	?>
	<div class="single-container bs-vc-content">
		<?php publisher_the_content(); ?>
	</div>
	<?php

	return;
}

?>
	<div class="single-container">
		<article <?php publisher_attr( 'post', 'single-page-content single-page-simple-content' ); ?>>

			<?php if ( publisher_get_option( 'page_featured_image' ) != 'hide' && has_post_thumbnail() ) { ?>
				<div class="featured">
					<a <?php publisher_attr( 'post-thumbnail-url', '', 'full' ); ?>>
						<?php the_post_thumbnail( publisher_get_prop_thumbnail_size( 'publisher-lg' ), array( 'title' => get_the_title() ) ); ?>
					</a>
				</div>
				<?php

				if ( bf_get_post_meta( 'bs_featured_image_credit' ) != '' ) {
					?>
					<span class="image-credit"><?php bf_echo_post_meta( 'bs_featured_image_credit' ); ?></span>
					<?php
				}

			} ?>

			<?php

			if ( ! bf_get_post_meta( '_hide_title' ) ) {
				?>
				<h1 class="section-heading <?php echo publisher_get_block_heading_class(); ?>">
					<span <?php publisher_attr( 'post-title', 'h-text' ); ?>><?php the_title(); ?></span></h1>
				<?php
			}
			?>

			<div <?php publisher_attr( 'post-content', 'clearfix' ); ?>>
				<?php publisher_the_content(); ?>
			</div>

			<?php

			// Social share buttons
			if ( publisher_get_option( 'social_share_page' ) == 'show' ) {
				publisher_listing_social_share( array(
						'type'       => 'single',
						'class'      => 'single-post-share top-share clearfix',
						'show_count' => publisher_get_option( 'social_share_count' ) !== 'hide',
					)
				);
			}

			?>
		</article><!-- .single-page-content -->
	</div>
<?php

// Comments and comment form
publisher_comments_template();
