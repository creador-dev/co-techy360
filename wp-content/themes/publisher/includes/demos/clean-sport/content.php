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

	$style_id       = 'clean-sport';
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
				// Rugby cats
				//
				array(
					'the_id'    => 'bs-rugby',
					'name'      => 'Rugby',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-1',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#bf1a2c',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 6,
						),
					),
				),
				array(
					'the_id'    => 'bs-rugby-union',
					'name'      => 'Rugby Union',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-rugby%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-1',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#bf1a2c',
						),
					),
				),
				array(
					'the_id'    => 'bs-rugby-league',
					'name'      => 'Rugby League',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-rugby%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-1',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#bf1a2c',
						),
					),
				),
				array(
					'the_id'    => 'bs-nfl',
					'name'      => 'NFL',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-rugby%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-1',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#bf1a2c',
						),
					),
				),


				//
				// Soccer cat
				//
				array(
					'the_id'    => 'bs-soccer',
					'name'      => 'Soccer',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'classic-1',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 6,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-5',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#15b842',
						),
					),
				),

				//
				// Baseball cat
				//
				array(
					'the_id'    => 'bs-baseball',
					'name'      => 'Baseball',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-3',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#8ea907',
						),
					),
				),

				//
				// Basketball cat
				//
				array(
					'the_id'    => 'bs-basketball',
					'name'      => 'Basketball',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'default',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-3',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#dc461c',
						),
					),
				),

				//
				// Hockey cat
				//
				array(
					'the_id'    => 'bs-hockey',
					'name'      => 'Hockey',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'default',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-3',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#30bde8',
						),
					),
				),


				//
				// Golf cat
				//
				array(
					'the_id'    => 'bs-golf',
					'name'      => 'Golf',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'default',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-3',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#006c02',
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
				'the_id' => 'bs-media-bg',
				'file'   => $demo_image_url . $prefix . 'bg.jpg',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-logo',
				'file'   => $demo_image_url . $prefix . 'logo.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-email',
				'file'   => $demo_image_url . $prefix . 'email-illustration.png',
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
				'the_id' => 'bs-media-icon-rugby',
				'file'   => $demo_image_url . $prefix . 'icon-rugby.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-icon-soccer',
				'file'   => $demo_image_url . $prefix . 'icon-soccer.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-icon-baseball',
				'file'   => $demo_image_url . $prefix . 'icon-baseball.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-icon-basketball',
				'file'   => $demo_image_url . $prefix . 'icon-basketball.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-icon-hockey',
				'file'   => $demo_image_url . $prefix . 'icon-hockey.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-icon-golf',
				'file'   => $demo_image_url . $prefix . 'icon-golf.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-icon-more',
				'file'   => $demo_image_url . $prefix . 'icon-more.png',
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
				'the_id' => 'bs-media-19',
				'file'   => $demo_image_url . $prefix . 'thumb-19.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-20',
				'file'   => $demo_image_url . $prefix . 'thumb-20.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-21',
				'file'   => $demo_image_url . $prefix . 'thumb-21.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-22',
				'file'   => $demo_image_url . $prefix . 'thumb-22.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-23',
				'file'   => $demo_image_url . $prefix . 'thumb-23.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-24',
				'file'   => $demo_image_url . $prefix . 'thumb-24.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-25',
				'file'   => $demo_image_url . $prefix . 'thumb-25.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-26',
				'file'   => $demo_image_url . $prefix . 'thumb-26.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-27',
				'file'   => $demo_image_url . $prefix . 'thumb-27.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-28',
				'file'   => $demo_image_url . $prefix . 'thumb-28.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-29',
				'file'   => $demo_image_url . $prefix . 'thumb-29.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-30',
				'file'   => $demo_image_url . $prefix . 'thumb-30.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-31',
				'file'   => $demo_image_url . $prefix . 'thumb-31.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-32',
				'file'   => $demo_image_url . $prefix . 'thumb-32.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-33',
				'file'   => $demo_image_url . $prefix . 'thumb-33.jpg',
				'resize' => true,
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
					'post_title'        => 'Front page',
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
				// Posts
				//
				array(
					'the_id'            => 'bs-post-rugby-1',
					'post_title'        => 'Michigan State Quarterback Connor Cook Carves a Legacy With Pluck',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-1'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-union%%,%%bs-nfl%%,%%bs-rugby-league%%',
					),
					'post_format'       => 'video',
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=edyQGxDYIlI',
						)
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-1',
					'post_title'        => 'Croatia Beat Spain, 2-1, but the Notable Score Came From the Orchestra',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-1',
					'post_title'        => 'I can&#x2019;t believe all the features mashed into this micro-apartment',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-14%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
					'post_format'       => 'video',
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=ICYwN3cx_28',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-basketball-1',
					'post_title'        => 'Michael Gbinije, a Piston Recruit, May Play for Nigeria at the Olympics',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-22%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
					'post_format'       => 'video',
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=Yi3CrReo-S0',
						)
					)
				),


				//
				// Rugby posts
				//
				array(
					'the_id'            => 'bs-post-rugby-2',
					'post_title'        => 'Bill Simmons as TV Host: Heavy on Sports and Cursing',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-league%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-3',
					'post_title'        => 'N.F.L. Is Teaming With Cirque du Soleil to Draw New Fans',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-5%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-nfl%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-4',
					'post_title'        => 'Curley Johnson, Punter for Super Bowl-Winning Jets, Dies at 80',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-6%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-union%%,%%bs-rugby-league%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-5',
					'post_title'        => 'For Peyton Manning, the Setting Is Perfect for a Curtain Call',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-3%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-nfl%%,%%bs-rugby-league%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-6',
					'post_title'        => 'Willie Wood Made the Most Memorable Play of Super Bowl I. He Has No Recollection.',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-2%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-league%%,%%bs-rugby-union%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-7',
					'post_title'        => 'Ken Stabler, a Magnetic N.F.L. Star, Was Sapped of Spirit by C.T.E.',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-league%%,%%bs-nfl%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-rugby-8',
					'post_title'        => 'The Town of Colma, Where San Francisco&#x2019;s Dead Live',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-3%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-nfl%%,%%bs-rugby-union%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-9',
					'post_title'        => 'At Blinn College, Cam Newton Plotted a Return to the Big Time',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-union%%,%%bs-rugby-league%%',
					),
				),
				array(
					'the_id'            => 'bs-post-rugby-10',
					'post_title'        => 'Sports Business: As the Olympics Near, Brazil and Rio Let the Bad Times Roll',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-5%%',
					'post_terms'        => array(
						'category' => '%%bs-rugby%%,%%bs-rugby-union%%,%%bs-nfl%%',
					),
				),


				//
				// Soccer posts
				//
				array(
					'the_id'            => 'bs-post-soccer-2',
					'post_title'        => 'A Wild Euros Group Stage Whittles the Field Down to 16',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-7%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-3',
					'post_title'        => 'Copa Am&#xE9;rica: After U.S. Is Thrashed, Coach Asks for More',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-9%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://soundcloud.com/lifeofdesiigner/desiigner-panda',
						)
					),
					'post_format'       => 'audio',
				),
				array(
					'the_id'            => 'bs-post-soccer-4',
					'post_title'        => 'Smaller Copa Am&#xE9;rica So Far Trumps the Bloated Euros',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-10%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-5',
					'post_title'        => 'Jamie Vardy, Rejecting Arsenal&#x2019;s Advances, Agrees to Stay at Leicester City',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-11%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-6',
					'post_title'        => 'Chile Reaches Copa Am&#xE9;rica Final With Shutout of Colombia',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-7',
					'post_title'        => 'Chile Soccer Team Strengthened by Forays Away From Home',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-7%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-8',
					'post_title'        => 'Wales Climbs a Mountain With Bale Leading the Way',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),
				array(
					'the_id'            => 'bs-post-soccer-9',
					'post_title'        => 'A Narrow Loss for Northern Ireland, but a Rewarding One',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-9%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => 'bs_featured_image_credit',
							'meta_value' => 'Photo credit: photographed by Pressfoto on Freepik.com',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-soccer-10',
					'post_title'        => 'Poland Wins but Lewandowski Is Still Without a Goal',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-10%%',
					'post_terms'        => array(
						'category' => '%%bs-soccer%%',
					),
				),


				//
				// Baseball posts
				//
				array(
					'the_id'            => 'bs-post-baseball-2',
					'post_title'        => 'You can squeeze the world&#x2019;s most compact folding pram into a shoulder bag',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-13%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
					'post_format'       => 'video',
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=708mjaHTwKc',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-baseball-3',
					'post_title'        => 'What type of camera do I need? A guide to buying your next one',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-15%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-4',
					'post_title'        => 'The FBI paid at least $1 million to get inside the San Bernardino shooter&#x2019;s iPhone',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
					'post_format'       => 'video',
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=eIpKzWU5Z2s',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-baseball-5',
					'post_title'        => 'A lovely ode to the sounds of a mechanical keyboard',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-6',
					'post_title'        => 'Samsung is trying really hard not to call these phones &#x2018;Rose Gold&#x2019;',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-18%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-7',
					'post_title'        => 'Apple&#x2019;s trying to fix two key issues with wired and wireless headphones',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-13%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-8',
					'post_title'        => 'Upgrade to a high-baseball BBQ with these 7 must-have products',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-14%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-9',
					'post_title'        => 'Motorola&#x2019;s budget Moto G phone: Coming soon in three new flavors',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-15%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-10',
					'post_title'        => 'Xiaomi buys 1,500 Microsoft patents, showing how much it wants the US market',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-11',
					'post_title'        => 'New York&#x2019;s antiquated steering wheel law poses roadblock to driverless cars',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-baseball-12',
					'post_title'        => 'This monstrous battery can charge your phone for 40 days after the apocalypse',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-18%%',
					'post_terms'        => array(
						'category' => '%%bs-baseball%%',
					),
				),


				//
				// Basketball Posts
				//

				array(
					'the_id'            => 'bs-post-basketball-2',
					'post_title'        => 'Derrick Rose Expects to Be Appreciated &#x2018;a Little Bit More&#x2019; as a Knick',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-3',
					'post_title'        => 'Nets Acquire Caris LeVert and Send Thaddeus Young to Pacers',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-19%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-4',
					'post_title'        => 'To Escape N.B.A.&#x2019;s Depths, 76ers Go Down Under and Draft Ben Simmons',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-24%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-5',
					'post_title'        => 'Phil Jackson Outlines the Rewards and the Risks of His Newest Knick',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-23%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-6',
					'post_title'        => 'Ben Simmons Looks to LeBron James as Model as N.B.A. Draft Looms',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-19%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-7',
					'post_title'        => 'Why a Top 3 N.B.A. Draft Pick Is Crucial for Championship Teams',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-8',
					'post_title'        => 'LeBron James, Citing Need for Rest, Will Skip Rio Olympics',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-22%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-9',
					'post_title'        => 'On Pro Basketball: Twenty Years Apart, Signature Moments for LeBron James and Michael Jordan',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-10',
					'post_title'        => 'Open Season on Jeremy Lin? In Video, Fan Highlights Hard Fouls',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-23%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-11',
					'post_title'        => 'Sports Business: As the Olympics Near, Brazil and Rio Let the Bad Times Roll',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-24%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),
				array(
					'the_id'            => 'bs-post-basketball-12',
					'post_title'        => 'Sports of The Times: A Comeback for Gabby Douglas at Age 20. That&#x2019;s Gymnastics',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-basketball%%',
					),
				),


				//
				// Hockey posts
				//
				array(
					'the_id'            => 'bs-post-hockey-1',
					'post_title'        => 'Youth Hockey&#x2019;s Growth in U.S. Reaches First Round of the N.H.L. Draft',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-27%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-2',
					'post_title'        => 'After Draft, Rangers Turn Their Attention to Deals and Free Agency',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-25%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-3',
					'post_title'        => 'Mike Emrick, a Hockey Wordsmith, Prepares for a Transition to the Diamond',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-29%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-4',
					'post_title'        => 'In Detroit, Gordie Howe Is Remembered as a Soft-Spoken Star',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-28%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-5',
					'post_title'        => 'Penguins 3, Sharks 1 | Pittsburgh wins series, 4-2: Penguins Finish Off Sharks to Win Stanley Cup',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-26%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-6',
					'post_title'        => 'Essay: Recalling a Time When Gordie Howe and His Sons Were the Power',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-27%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-7',
					'post_title'        => 'Jaromir Jagr vs. Islanders: A Long, Point-Filled History',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-1'
					),
					'thumbnail_id'      => '%%bs-media-29%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-8',
					'post_title'        => 'On Penalty Kill, Islanders Turn a Weakness Into a Weapon',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-28%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-9',
					'post_title'        => 'Wayne Gretzky Has a Few Points to Make About a Decline in Scoring and Creativity',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-26%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-10',
					'post_title'        => 'Honing Skills in U.S., a Group of Teenagers Is Fueling China&#x2019;s Hockey Shift',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-25%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-11',
					'post_title'        => 'Cleveland Realizes a Championship After All, Thanks to the Monsters',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-1'
					),
					'thumbnail_id'      => '%%bs-media-27%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),
				array(
					'the_id'            => 'bs-post-hockey-12',
					'post_title'        => 'With N.H.L. Expansion, Las Vegas Hits the Jackpot: A Pro Team',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-28%%',
					'post_terms'        => array(
						'category' => '%%bs-hockey%%',
					),
				),


				//
				// Golf posts
				//
				array(
					'the_id'            => 'bs-post-golf-1',
					'post_title'        => 'Rory McIlroy Says He Won&#x2019;t Attend Olympics Over Zika Concerns',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-32%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-2',
					'post_title'        => 'U.S.G.A. Regrets &#x2018;Distraction&#x2019; in Ruling Against Dustin Johnson',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-31%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-3',
					'post_title'        => 'Unfairly Left in the Dark at the U.S. Open While Officials Consider',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-30%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-4',
					'post_title'        => 'Dustin Johnson Wins U.S. Open at Oakmont for First Major Title',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-33%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-5',
					'post_title'        => 'A Common Goal at the Top of the Leaderboard: Winning a First Major',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-32%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-6',
					'post_title'        => 'On Golf: At U.S. Open, an Upstart-Friendly Course Favors Wisdom, for Now, Over Youth',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-31%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-7',
					'post_title'        => 'Rain Stops Play at United States Open, Bringing Some Players Relief',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-30%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-8',
					'post_title'        => 'On Golf: Unseen Violation Prompts a Striking Act From Shane Lowry',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-33%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-9',
					'post_title'        => 'Englishman Rises in the Late-Afternoon Augusta Sun',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-2'
					),
					'thumbnail_id'      => '%%bs-media-32%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
				),
				array(
					'the_id'            => 'bs-post-golf-10',
					'post_title'        => 'Jordan Spieth Absorbs &#x2018;a Tough One&#x2019; With Dignity',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-sport-1'
					),
					'thumbnail_id'      => '%%bs-media-31%%',
					'post_terms'        => array(
						'category' => '%%bs-golf%%',
					),
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
							'category' => '%%bs-gameplay%%',
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'  => '',
							'type'   => 'banner',
							'banner' => '%%bs-post-ad-300x250%%',
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
							'item_type' => 'term',
							'term_id'   => '%%bs-baseball%%',
							'taxonomy'  => 'category',
						),
						array(
							'the_id'    => 'bs-menu-top-soccer',
							'item_type' => 'term',
							'term_id'   => '%%bs-soccer%%',
							'taxonomy'  => 'category',
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
							'the_id'    => 'bs-menu-top-soccer',
							'item_type' => 'term',
							'term_id'   => '%%bs-soccer%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-baseball%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-rugby%%',
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
							'the_id'    => 'bs-homepages-parent',
							'item_type' => 'page',
							'title'     => 'Home',
							'page_id'   => '%%bs-front-page%%',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-more}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-rugby%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-rugby}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
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
							'term_id'   => '%%bs-soccer%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-soccer}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-baseball%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-baseball}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-basketball%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-basketball}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
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
							'term_id'   => '%%bs-hockey%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-hockey}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-golf%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => '%%bf_product_demo_media_url:{bs-media-icon-golf}:\'full\'%%',
										'type'   => 'custom',
										'width'  => '',
										'height' => '18',
									),
								),
							)
						),
					)
				),

			), // step 1

		), // menus

	);
}