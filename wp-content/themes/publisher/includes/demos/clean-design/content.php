<?php

/**
 * Returns content for default demo
 *
 * ->Taxonomies
 * ->Medias
 * ->Posts
 * ->Options
 * ->Widgets
 * ->Menus
 *
 * @return array
 */
function publisher_demo_raw_content() {

	$style_id       = 'clean-design';
	$prefix         = $style_id . '-'; // prevent caching when user installs multiple demos continuously
	$demo_path      = PUBLISHER_THEME_PATH . 'includes/demos/' . $style_id . '/';
	$demo_image_url = publisher_get_demo_images_url( $style_id );

	return array(

		//
		// ->Taxonomies
		//
		'taxonomy' => array(
			'multi_steps' => false,
			array(
				//
				// Architecture cats
				//
				array(
					'the_id'    => 'bs-architecture',
					'name'      => 'Architecture',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 6,
						),
					),
				),
				array(
					'the_id'    => 'bs-cultural',
					'name'      => 'Cultural',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-architecture%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),
				array(
					'the_id'    => 'bs-industrial',
					'name'      => 'Industrial',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-architecture%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),
				array(
					'the_id'    => 'bs-offices',
					'name'      => 'Offices',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-architecture%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),
				array(
					'the_id'    => 'bs-hotels',
					'name'      => 'Hotels',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-architecture%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),


				//
				// Interiors cats
				//
				array(
					'the_id'    => 'bs-interiors',
					'name'      => 'Interiors',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#be5f1d',
						),
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-1',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-7',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),
				array(
					'the_id'    => 'bs-home',
					'name'      => 'Home',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-interiors%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#be5f1d',
						),
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-1',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-7',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),
				array(
					'the_id'    => 'bs-restaurants',
					'name'      => 'Restaurants and bars',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-interiors%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#be5f1d',
						),
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-1',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-7',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),
				array(
					'the_id'    => 'bs-retail',
					'name'      => 'Retail',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-interiors%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#be5f1d',
						),
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-1',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-7',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),

				//
				// Art
				//
				array(
					'the_id'    => 'bs-art',
					'name'      => 'Art',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#07ab03',
						),
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-5',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
					),
				),


			)
		), // taxonomies


		//
		// ->Medias
		//
		'media'    => array(

			'multi_steps'           => true,
			'uninstall_multi_steps' => false,

			array(
				'the_id' => 'bs-media-email',
				'file'   => $demo_image_url . $prefix . 'email-illustration.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-profile',
				'file'   => $demo_image_url . $prefix . 'profile.jpg',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-logo',
				'file'   => $demo_image_url . $prefix . 'logo.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-940x160',
				'file'   => $demo_image_url . $prefix . 'ad-940x160.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-180x480',
				'file'   => $demo_image_url . $prefix . 'ad-180x480.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-728x90',
				'file'   => $demo_image_url . $prefix . 'ad-728x90.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-300x250',
				'file'   => $demo_image_url . $prefix . 'ad-300x250.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-120x240',
				'file'   => $demo_image_url . $prefix . 'ad-120x240.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-1',
				'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-2',
				'file'   => $demo_image_url . $prefix . 'thumb-2.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-3',
				'file'   => $demo_image_url . $prefix . 'thumb-3.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-4',
				'file'   => $demo_image_url . $prefix . 'thumb-4.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-5',
				'file'   => $demo_image_url . $prefix . 'thumb-5.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-6',
				'file'   => $demo_image_url . $prefix . 'thumb-6.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-7',
				'file'   => $demo_image_url . $prefix . 'thumb-7.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-8',
				'file'   => $demo_image_url . $prefix . 'thumb-8.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-9',
				'file'   => $demo_image_url . $prefix . 'thumb-9.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-10',
				'file'   => $demo_image_url . $prefix . 'thumb-10.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-11',
				'file'   => $demo_image_url . $prefix . 'thumb-11.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-12',
				'file'   => $demo_image_url . $prefix . 'thumb-12.jpg',
				'resize' => true
			),
			array(
				'the_id'      => 'bs-media-13',
				'file'        => $demo_image_url . $prefix . 'thumb-13.jpg',
				'resize'      => true,
				'description' => 'Photo credit: photographed by Pressfoto on Freepik.com',
			),
			array(
				'the_id'      => 'bs-media-14',
				'file'        => $demo_image_url . $prefix . 'thumb-14.jpg',
				'resize'      => true,
				'description' => 'Photo credit: photographed by Pressfoto on Freepik.com',
			),
			array(
				'the_id'      => 'bs-media-15',
				'file'        => $demo_image_url . $prefix . 'thumb-15.jpg',
				'resize'      => true,
				'description' => 'Photo credit: photographed by Pressfoto on Freepik.com',
			),
			array(
				'the_id'      => 'bs-media-16',
				'file'        => $demo_image_url . $prefix . 'thumb-16.jpg',
				'resize'      => true,
				'description' => 'Photo credit: photographed by Pressfoto on Freepik.com',
			),
			array(
				'the_id'      => 'bs-media-17',
				'file'        => $demo_image_url . $prefix . 'thumb-17.jpg',
				'resize'      => true,
				'description' => 'Photo credit: photographed by Pressfoto on Freepik.com',
			),
			array(
				'the_id'      => 'bs-media-18',
				'file'        => $demo_image_url . $prefix . 'thumb-18.jpg',
				'resize'      => true,
				'description' => 'Photo credit: photographed by Pressfoto on Freepik.com',
			),
			array(
				'the_id' => 'bs-media-post-content-1',
				'file'   => $demo_image_url . $prefix . 'post-content-1.jpg',
				'resize' => false,
			),

		), // media


		// 
		// ->Posts
		//
		'posts'    => array(
			'multi_steps' => false,
			array(

				//
				// Homepage
				//
				array(
					'the_id'            => 'bs-front-page',
					'post_title'        => 'Homepage 1 - Default',
					'post_content_file' => $demo_path . 'front-page.txt',
					'post_type'         => 'page',
					'prepare_vc_css'    => true,
					'post_meta'         => array(
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => '_hide_title',
							'meta_value' => 1,
						),
						array(
							'meta_key'   => 'post_breadcrumb',
							'meta_value' => 'hide',
						),
					),
				),


				// 
				// Top posts
				//
				array(
					'the_id'            => 'bs-post-architecture-2',
					'post_title'        => '7 Little Known Facts About the Costumes on <em>UnReal</em>',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-industrial%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-interiors-1',
					'post_title'        => 'Historic home is both preserved and modernized',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-11%%',
					'post_terms'        => array(
						'category' => '%%bs-retail%%,%%bs-makeup%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-architecture-1',
					'post_title'        => 'A guest house with accessibility and mobility',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-home%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),

				//
				// Architecture posts
				//
				array(
					'the_id'            => 'bs-post-architecture-3',
					'post_title'        => 'Nail Art Know How: Dotted Half Moon Manicure',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-7%%',
					'post_terms'        => array(
						'category' => '%%bs-offices%%,%%bs-art%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-4',
					'post_title'        => 'A modern toy block collection by MonoGoto',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-industrial%%,%%bs-offices%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-5',
					'post_title'        => 'An amagansett home that focuses on acoustics',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-industrial%%,%%bs-cultural%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-6',
					'post_title'        => 'A bauhaus apartment in Tel Aviv by Raanan Stern',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-2%%',
					'post_terms'        => array(
						'category' => '%%bs-cultural%%,%%bs-art%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-7',
					'post_title'        => 'A modest house for a young family in Sydney',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-3%%',
					'post_terms'        => array(
						'category' => '%%bs-industrial%%,%%bs-offices%%,%%bs-cultural%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-8',
					'post_title'        => '14 Sporty Sandals that Can Take You from Day to Night',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-1'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-cultural%%,%%bs-offices%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-9',
					'post_title'        => 'A dark house in sydney gets tall, sculpted roof',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-11%%',
					'post_terms'        => array(
						'category' => '%%bs-industrial%%,%%bs-cultural%%',
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-10',
					'post_title'        => 'A Guide to the Best Jeans for Flat Butts ',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-offices%%,%%bs-cultural%%',
					),
				),
				array(
					'the_id'            => 'bs-post-architecture-10',
					'post_title'        => '10 modern outdoor spaces with swings for relaxing',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-5%%',
					'post_terms'        => array(
						'category' => '%%bs-offices%%,%%bs-cultural%%,%%bs-art%%',
					),
				),


				//
				// Interiors posts
				//

				array(
					'the_id'            => 'bs-post-interiors-2',
					'post_title'        => '7 Gorgeous Greige Lipsticks You Need, Stat',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-13%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-restaurants%%,%%bs-home%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-interiors-3',
					'post_title'        => 'A house on the deschutes river in bend, oregon',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-14%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-retail%%,%%bs-home%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						),
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://soundcloud.com/lifeofdesiigner/desiigner-panda',
						)
					),
					'post_format'       => 'audio',
				),
				array(
					'the_id'            => 'bs-post-interiors-4',
					'post_title'        => 'So you want to buy a modern house? start here',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-restaurants%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-interiors-5',
					'post_title'        => 'An apartment in valencia gets an airy renovation',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-retail%%,%%bs-home%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-interiors-6',
					'post_title'        => 'A sushi restaurant inspired by the colors of sushi rolls',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-18%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-restaurants%%,%%bs-home%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-interiors-7',
					'post_title'        => 'Shou Sugi ban house by Schwartz and architecture',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-retail%%,%%bs-art%%',
					),
				),
				array(
					'the_id'            => 'bs-post-interiors-8',
					'post_title'        => 'A modular apartment in tel aviv with a cool staircase',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-6%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-home%%,%%bs-restaurants%%',
					),
				),
				array(
					'the_id'            => 'bs-post-interiors-9',
					'post_title'        => '6 Products You&#x2019;ve Seen on Instagram That You Need IRL',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-14%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-retail%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-interiors-10',
					'post_title'        => 'A renewed classic eichler by Klopf Architecture',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-11%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-restaurants%%',
					),
				),
				array(
					'the_id'            => 'bs-post-interiors-11',
					'post_title'        => 'Nail Art Know How: The Dotted French Manicure',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-home%%,%%bs-retail%%',
					),
				),
				array(
					'the_id'            => 'bs-post-interiors-12',
					'post_title'        => '5 Perfect Mani-Pedi Combos for Every Summer Occasion',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-design-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-interiors%%,%%bs-home%%,%%bs-restaurants%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),


				//
				// BetterAds posts
				//
				array(
					'the_id'     => 'bs-post-ad-940x160',
					'post_title' => '940x180 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-940x180}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-180x480',
					'post_title' => '180x480 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-180x480}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-728x90',
					'post_title' => '728x90 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-728x90}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-300x250',
					'post_title' => '300x250 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-300x250}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-120x240-2',
					'post_title' => '120x240 Banner - 2',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-120x240}:\'full\'%%'
						),
						array(
							'meta_key'   => 'campaign',
							'meta_value' => '%%bs-post-ad-campaign-1%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-120x240-1',
					'post_title' => '120x240 Banner - 1',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-120x240}:\'full\'%%'
						),
						array(
							'meta_key'   => 'campaign',
							'meta_value' => '%%bs-post-ad-campaign-1%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-campaign-1',
					'post_title' => '120 Banners Campaign',
					'post_type'  => 'better-campaign',
				),

			)
		), // post


		//
		// ->Options
		//
		'options'  => array(

			'multi_steps' => false,

			//step one
			array(
				//
				// Panel options
				//
				array(
					'type'              => 'option',
					'option_name'       => publisher_get_theme_panel_id(),
					'option_value_file' => $demo_path . 'options.json',
				),
				array(
					'type'          => 'option',
					'option_name'   => publisher_get_theme_panel_id(),
					'option_value'  => array(
						'logo_text'         => 'Publisher',
						'logo_image'        => '%%bf_product_demo_media_url:{bs-logo}:\'full\'%%',
						'logo_image_retina' => '',
					),
					'merge_options' => true,
				),

				// Theme Style
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_style',
					'option_value' => $style_id,
				),

				// Theme Demo
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_demo',
					'option_value' => $style_id,
				),


				//
				// Update front page
				//
				array(
					'type'         => 'option',
					'option_name'  => 'page_on_front',
					'option_value' => '%%bs-front-page%%',
				),
				array(
					'type'         => 'option',
					'option_name'  => 'show_on_front',
					'option_value' => 'page',
				),


				//
				// Aside Ad
				//
				array(
					'type'          => 'option',
					'merge_options' => true,
					'option_name'   => 'better_ads_manager',
					'option_value'  => array(
						'header_aside_logo_type'   => 'banner',
						'header_aside_logo_banner' => '%%bs-post-ad-728x90%%',
						'header_aside_logo_align'  => is_rtl() ? 'left' : 'right',
					),
				),
			)
		), // options


		//
		// ->Widgets
		//
		'widgets'  => array(
			'multi_steps' => false,
			array(

				//
				// Primary sidebar
				//
				'primary-sidebar'   => array(
					'remove_all_widgets' => true,
					array(
						'widget_id'       => 'better-social-counter',
						'widget_settings' => array(
							'title' => 'Stay With Us',
							'order' => 'facebook,twitter,google,youtube,instagram,vimeo,pinterest,envato',
						)
					),
					array(
						'widget_id'       => 'bs-mix-listing-3-4',
						'widget_settings' => array(
							'category' => '%%bs-offices%%',
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'   => '',
							'type'    => 'banner',
							'banner'  => '%%bs-post-ad-300x250%%',
							'count'   => 4,
							'columns' => 2,
						)
					),
					array(
						'widget_id'       => 'bs-text-listing-1',
						'widget_settings' => array(
							'title' => 'Latest News',
							'count' => 3,
						)
					),
					array(
						'widget_id'       => 'bs-newsletter-mailchimp',
						'widget_settings' => array(
							'title'          => 'Newsletter',
							'mailchimp-code' => '<form action="//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b" method="post"',
							'mailchimp-url'  => '//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b',
							'msg'            => 'Subscribe our newsletter to stay updated.',
							'image'          => '%%bf_product_demo_media_url:{bs-media-email}:\'full\'%%',
						)
					),
				),

				//
				// Secondary sidebar
				//
				'secondary-sidebar' => array(
					'remove_all_widgets' => true,

					array(
						'widget_id'       => 'bs-text-listing-4',
						'widget_settings' => array(
							'title'                    => 'News',
							'count'                    => 8,
							'paginate'                 => 'slider',
							'slider-control-dots'      => 'style-1',
							'slider-control-next-prev' => 'off',
							'bf-widget-title-icon'     => array(
								'type' => 'fontawesome',
								'icon' => 'fa-rss',
							),
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'  => '',
							'type'   => 'banner',
							'banner' => '%%bs-post-ad-180x480%%',
						)
					),
				),
			),
		), // widgets


		//
		// ->Menus
		//
		'menus'    => array(
			'multi_step' => false,

			array(

				//
				// Topbar navigation
				//
				array(
					'menu-name'     => 'Topbar Navigation',
					'menu-location' => 'top-menu',
					'items'         => array(
						array(
							'the_id'    => 'bs-menu-top-lifestyle',
							'item_type' => 'term',
							'term_id'   => '%%bs-interiors%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-restaurants%%',
							'taxonomy'  => 'category',
							'parent-id' => '%%bs-menu-top-lifestyle%%',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-home%%',
							'taxonomy'  => 'category',
							'parent-id' => '%%bs-menu-top-lifestyle%%',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-retail%%',
							'taxonomy'  => 'category',
							'parent-id' => '%%bs-menu-top-lifestyle%%',
						),
					)
				),

				//
				// Footer navigation
				//
				array(
					'menu-name'     => 'Footer Navigation',
					'menu-location' => 'footer-menu',
					'items'         => array(
						array(
							'item_type' => 'page',
							'page_id'   => '%%bs-front-page%%',
							'title'     => 'Home',
						),
						array(
							'the_id'    => 'bs-menu-top-lifestyle',
							'item_type' => 'term',
							'term_id'   => '%%bs-interiors%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-architecture%%',
							'taxonomy'  => 'category',
						),
					)
				),


				//
				// Main navigation
				//
				array(
					'menu-name'     => 'Main Navigation',
					'menu-location' => 'main-menu',
					'recently-edit' => true,
					'items'         => array(
						array(
							'the_id'    => 'bs-menu-main-home',
							'item_type' => 'page',
							'page_id'   => '%%bs-front-page%%',
							'title'     => 'Home',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-architecture%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'mega_menu',
									'meta_value' => 'tabbed-grid-posts',
								),
								array(
									'meta_key'   => 'drop_menu_anim',
									'meta_value' => 'slide-bottom-in',
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-interiors%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'mega_menu',
									'meta_value' => 'grid-posts',
								),
								array(
									'meta_key'   => 'drop_menu_anim',
									'meta_value' => 'slide-fade',
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-art%%',
							'taxonomy'  => 'category',
						),
					)
				),

			),

		), // menus

	);
}