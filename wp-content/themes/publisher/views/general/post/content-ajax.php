<?php
/**
 * The template for displaying posts
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

global $post;

$post_format = publisher_get_post_format();



$thumbnail_size = 'publisher-lg';
if ( publisher_get_option( 'post_featured_image_cut' ) === 'full' ) {
	$thumbnail_size = 'full';
} elseif ( publisher_get_page_layout() == '1-col' ) {
	$thumbnail_size = 'publisher-full';
}

$img = publisher_get_thumbnail( $thumbnail_size );

$post_settings = publisher_get_option( 'post-page-settings' );

if ( empty( $post_settings['featured'] ) ) {
	$img['src'] = '';
}

$social_share               = publisher_get_option( 'social_share_single' );
$is_top_social_share_active = $social_share == 'show' || $social_share == 'top-bottom';

// Show post excerpt ? Where?
if ( $show_excerpt = ! empty( $post->post_excerpt ) ) {
	$show_excerpt = bf_get_post_meta( 'single_excerpt_type', get_the_ID(), 'default' );
	if ( $show_excerpt === 'default' ) {
		if ( $post_settings['excerpt'] ) {
			$show_excerpt = $post_settings['excerpt_type'];
		} else {
			$show_excerpt = false;
		}
	}
}

?>
<div class="ajax-post-content">

	<div class="single-container">
		<article <?php publisher_attr( 'post', 'post single-post-content ' . ( ! empty( $img['src'] ) ? 'has-thumbnail' : '' ) ); ?>>
			<div class="single-featured">
				<?php

				$featured_printed = false;
				$_after_featured  = ''; // temp used to move embed after featured image

				// Gallery Post Format
				if ( $post_format === 'gallery' ) {
					publisher_get_view( 'post', '_gallery' );
					$featured_printed = true;
				} // Video/Audio Post Format
				elseif ( $post_format === 'video' || $post_format === 'audio' ) {

					$embed = bf_auto_embed_content( bf_get_post_meta( '_featured_embed_code' ) );

					if ( $embed['type'] !== 'external-audio' ) {
						$featured_printed = true;
					}

					$_after_featured = do_shortcode( $embed['content'] );
					unset( $embed );
				}

				// Simple Thumbnail
				if ( ! $featured_printed && ! empty( $img['src'] ) ) {

					if ( ! empty( $img['caption'] ) ) {
						?><figure><?php
					}

				if ( publisher_get_option( 'post_featured_image_link' ) != 'none' ) {
					?><a <?php
					publisher_attr(
						'post-thumbnail-url',
						publisher_get_option( 'post_featured_image_link' ) === 'lightbox' ? 'open-lightbox' : '',
						'full'
					); ?>><?php
				}

					publisher_the_image_tag( array(
						'src' => $img['src'],
						'alt' => $img['alt']
					) );

				if ( publisher_get_option( 'post_featured_image_link' ) != 'none' ) {
					?></a><?php
				}

					if ( ! empty( $img['caption'] ) ) {
						?>
						<figcaption
							class="wp-caption-text"><?php echo $img['caption']; ?></figcaption>
						</figure>
						<?php
					}

				}

				// temp embed code
				echo $_after_featured;

				if ( bf_get_post_meta( 'bs_featured_image_credit' ) != '' ) {
					?>
					<span class="image-credit"><?php bf_echo_post_meta( 'bs_featured_image_credit' ); ?></span>
					<?php
				}

				?>
			</div>
			<?php

			// Between Featured image and post title ad
			publisher_show_ad_location( 'post_between_featured_title', array( 'container-class' => 'better-ads-between-thumbnail-title' ) );

			?>
			<div class="post-header-inner">
				<div class="post-header-title">
					<?php

					if ( $post_settings['term'] || $post_settings['format-icon'] ) {
						publisher_set_prop( 'term-badge-tax', $post_settings['term-tax'] );
						publisher_cats_badge_code(
							$post_settings['term-count'],
							'',
							$post_settings['format-icon'],
							true,
							'floated',
							$post_settings['term']
						);
					}

					?>
					<h1 class="single-post-title">
						<span <?php publisher_attr( 'post-title' ); ?>><?php the_title(); ?></span>
					</h1>
					<?php

					if ( function_exists( 'publisher_the_subtitle' ) ) {
						publisher_the_subtitle( '<h2 class="post-subtitle">', '</h2>' );
					}

					if ( $show_excerpt === 'after-title' ) { ?>
						<div class="single-post-excerpt post-excerpt-at"><?php the_excerpt(); ?></div><?php
					}

					if ( $post_settings['meta']['show'] ) {
						publisher_set_prop( 'hide-meta-author', ! $post_settings['meta']['author'] );
						publisher_set_prop( 'hide-meta-author-avatar', ! $post_settings['meta']['author_avatar'] );
						publisher_set_prop( 'hide-meta-date', ! $post_settings['meta']['date'] );
						publisher_set_prop( 'hide-meta-views', $is_top_social_share_active || ! $post_settings['meta']['views'] );
						publisher_set_prop( 'hide-meta-comment', $is_top_social_share_active || ! $post_settings['meta']['comment'] );
						publisher_set_prop( 'hide-meta-review', ! $post_settings['meta']['review'] );
						publisher_get_view( 'post', '_meta' );
					}

					?>
				</div>
			</div>
			<?php

			// Social share buttons
			if ( $social_share == 'show' || $social_share == 'top-bottom' ) {
				publisher_listing_social_share( array(
						'style'         => publisher_get_top_share_style(),
						'type'          => 'single',
						'class'         => 'single-post-share top-share clearfix',
						'show_count'    => publisher_get_option( 'social_share_count' ) !== 'hide',
						'show_views'    => $post_settings['meta']['views'],
						'show_comments' => $post_settings['meta']['comment'],
					)
				);
			}

			if ( $show_excerpt === 'before-content' ) { ?>
				<div
					class="single-post-excerpt post-excerpt-bc"><?php the_excerpt(); ?></div><?php
			}

			?>
			<div <?php publisher_attr( 'post-content', 'clearfix single-post-content' ); ?>>
				<?php publisher_the_content(); ?>
			</div>
			<?php

			// Shows source
			if ( bf_get_post_meta( '_bs_source_url' ) || bf_get_post_meta( '_bs_source_url_2' ) || bf_get_post_meta( '_bs_source_url_3' ) ) {
				publisher_get_view( 'post', '_source', 'default' );
			}

			// Shows via
			if ( bf_get_post_meta( '_bs_via_url' ) || bf_get_post_meta( '_bs_via_url_2' ) || bf_get_post_meta( '_bs_via_url_3' ) ) {
				publisher_get_view( 'post', '_via', 'default' );
			}

			// Shows post tags
			if ( $post_settings['tag'] && publisher_has_tag() ) {
				publisher_get_view( 'post', '_tags', 'default' );
			}

			// Social share buttons
			if ( $social_share == 'bottom' || $social_share == 'top-bottom' ) {
				publisher_listing_social_share( array(
						'style'         => publisher_get_bottom_share_style(),
						'type'          => 'single',
						'class'         => 'single-post-share bottom-share clearfix',
						'show_count'    => publisher_get_option( 'social_share_count' ) !== 'hide',
						'show_views'    => $post_settings['meta']['views'],
						'show_comments' => $post_settings['meta']['comment'],
					)
				);
			}

			?>
		</article>
		<?php

		// Author box
		if ( publisher_get_option( 'post_author_box' ) == 'show' ) {
			publisher_get_view( 'post', '_author' );
		}

		?>
	</div>
	<?php

	// Comments and comment form
	publisher_comments_template();

	// After ajaxed post
	publisher_show_ad_location( 'post_ajax_related', array( 'container-class' => 'better-ads-ajaxed-related' ) );

	?>
</div>
