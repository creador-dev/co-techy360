<?php
/**
 * Post template style 13.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

global $post;

$layout = publisher_get_page_layout();

$container_class = 'container layout-1-col layout-no-sidebar post-template-13';

$post_settings = publisher_get_option( 'post-page-settings' );

$social_share               = publisher_get_option( 'social_share_single' );
$is_top_social_share_active = $social_share == 'show' || $social_share == 'top-bottom';

$img = publisher_get_thumbnail( publisher_get_prop_thumbnail_size( 'publisher-full' ) );

if ( empty( $post_settings['featured'] ) ) {
	$img['src'] = '';
}

$post_format = publisher_get_post_format();

if ( publisher_get_header_style() !== 'disable' ) {
	// After header Ad
	publisher_show_ad_location( 'header_after', array(
			'container-class' => 'better-ads-after-header',
			'before'          => '<div class="container adcontainer">',
			'after'           => '</div>',
		)
	);
}

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

/**
 * Fires before ".content-wrap" start
 *
 * @since 1.9.0
 */
do_action( 'publisher/content-wrap/before' );

?>
<div class="content-wrap">
	<?php

	/**
	 * Fires in start of".content-wrap"
	 *
	 * @since 1.9.0
	 */
	do_action( 'publisher/content-wrap/start' );

	?>
	<main <?php publisher_attr( 'content', '' ); ?>>

		<div class="container <?php echo $container_class; // escaped before ?>">
			<div class="row main-section">
				<div class="col-sm-10 col-sm-push-1 content-column">
					<div class="single-container">
						<article <?php publisher_attr( 'post', 'single-post-content ' . ( ! empty( $img['src'] ) ? 'has-thumbnail' : '' ) ); ?>>
							<?php

							// Above Post Ad
							publisher_show_ad_location( 'post_box_above', array( 'container-class' => 'better-ads-above-post-box better-ads-above-post-box-tmargine3' ) );

							?>
							<div class="post-header post-tp-13-header">
								<?php

								// Shows breadcrumb
								if ( publisher_show_breadcrumb() ) {
									Better_Framework()->breadcrumb()->generate( array(
										'custom_class' => 'bc-align-center'
									) );
								}

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

								if ( has_post_format( 'link' ) ) {
									?>
									<h1 class="single-post-title">
										<a <?php publisher_attr( 'post-url' ); ?>><span <?php publisher_attr( 'post-title' ); ?>><?php the_title(); ?></span></a>
									</h1>
									<?php
								} else {
									?>
									<h1 class="single-post-title">
										<span <?php publisher_attr( 'post-title' ); ?>><?php the_title(); ?></span></h1>
									<?php
								}

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
									publisher_set_prop( 'hide-meta-views', ! $post_settings['meta']['views'] );
									publisher_set_prop( 'hide-meta-comment', ! $post_settings['meta']['comment'] );
									publisher_set_prop( 'hide-meta-review', ! $post_settings['meta']['review'] );

									?>
									<div class="post-meta-wrap clearfix">
										<?php publisher_get_view( 'post', '_meta' ); ?>
									</div>
									<?php
								}

								// Between Featured image and post title ad
								publisher_show_ad_location( 'post_between_featured_title', array( 'container-class' => 'better-ads-between-thumbnail-title' ) );

								?>
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

									}

									// temp embed code
									echo $_after_featured;

									if ( ! empty( $img['src'] ) ) {

										$credit = bf_get_post_meta( 'bs_featured_image_credit' );

										if ( empty( $credit ) ) {
											$credit = $img['caption'];
										}

										if ( ! empty( $credit ) ) {
											?>
											<span class="image-credit"><?php echo $credit; ?></span>
											<?php
										}
									}

									?>
								</div>
								<?php

								// Social share buttons
								if ( $is_top_social_share_active ) {
									publisher_listing_social_share( array(
											'style'         => publisher_get_top_share_style(),
											'type'          => 'single',
											'class'         => 'single-post-share top-share clearfix',
											'show_count'    => publisher_get_option( 'social_share_count' ) !== 'hide',
											'show_views'    => false,
											'show_comments' => false,
										)
									);
								}

								?>
							</div>
							<?php

							// Push-notification message
							publisher_print_push_notification_widget( 'post-top' );

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

						// Newsletter before author box
						publisher_show_newsletter_location( 'post_before_author', array(
							'custom-data' => array(
								'style-type' => 'wide'
							),
							'show-error'  => false,
						) );

						// Push-notification message
						publisher_print_push_notification_widget( 'post-bottom' );


						// Before author box ads
						publisher_show_ad_location( 'post_before_author_box', array( 'container-class' => 'better-ads-post-before-author' ) );

						// Author box
						if ( publisher_get_option( 'post_author_box' ) == 'show' ) {
							publisher_get_view( 'post', '_author' );
						}

						// Newsletter before nex/prev
						publisher_show_newsletter_location( 'post_before_nextprev', array(
							'custom-data' => array(
								'style-type' => 'wide'
							),
							'show-error'  => false,
						) );

						// Next/Prev posts link
						if ( publisher_get_option( 'post_next_prev' ) !== 'hide' ) {
							publisher_get_view( 'post', '_next_prev_post' );
						}

						?>
					</div>
					<?php

					// Newsletter before related
					publisher_show_newsletter_location( 'post_before_related', array(
						'custom-data' => array(
							'style-type' => 'wide'
						),
						'show-error'  => false,
					) );

					// Related posts
					if ( publisher_get_related_post_type() == 'show' ) {
						publisher_get_view( 'post', '_related' );
					}

					// After Related Posts
					publisher_show_ad_location( 'post_after_related', array(
							'container-class' => 'better-ads-after-related',
						)
					);

					// Newsletter before comment
					publisher_show_newsletter_location( 'post_before_comment', array(
						'custom-data' => array(
							'style-type' => 'wide'
						),
						'show-error'  => false,
					) );

					// Comments and comment form
					publisher_comments_template();

					// Newsletter after comment
					publisher_show_newsletter_location( 'post_after_comment', array(
						'custom-data' => array(
							'style-type' => 'wide'
						),
						'show-error'  => false,
					) );

					// Ad after first post for related posts
					if ( publisher_get_related_post_type() == 'infinity-related-post' ) {
						publisher_show_ad_location( 'post_ajax_related', array( 'container-class' => 'better-ads-ajaxed-related' ) );
					}

					?>
				</div><!-- .content-column -->

			</div><!-- .main-section -->
		</div><!-- .layout-2-col -->

	</main><!-- main -->
	<?php

	/**
	 * Fires before close of".content-wrap"
	 *
	 * @since 1.9.0
	 */
	do_action( 'publisher/content-wrap/end' );

	?>
</div><!-- .content-wrap -->
<?php

/**
 * Fires after close of".content-wrap"
 *
 * @since 1.9.0
 */
do_action( 'publisher/content-wrap/after' );


publisher_get_view( 'post', 'more-stories' );

?>
