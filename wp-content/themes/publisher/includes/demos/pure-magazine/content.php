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

	$style_id       = 'pure-magazine';
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

				array(
					'the_id'    => 'bs-fashion',
					'name'      => 'Fashion',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1-3',
						),
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#E20090',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 9,
						),
						array(
							'meta_key'   => 'term_pagination_type',
							'meta_value' => 'ajax_more_btn',
						),
					),
				),
				array(
					'the_id'    => 'bs-street-fashion',
					'name'      => 'Street fashion',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-fashion%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#46965d',
						),
					),
				),
				array(
					'the_id'    => 'bs-vogue',
					'name'      => 'Vogue',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-fashion%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#da1793',
						),
					),
				),

				//
				// Lifestyle cats
				//
				array(
					'the_id'    => 'bs-lifestyle',
					'name'      => 'Lifestyle',
					'taxonomy'  => 'category',
					'term_meta' => array(
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
							'meta_value' => 'style-7',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'simple-gr',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#32b336',
						),
					),
				),
				array(
					'the_id'    => 'bs-family-activity',
					'name'      => 'Family Activities',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-lifestyle%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#00a0ec',
						),
					),
				),
				array(
					'the_id'    => 'bs-motivation',
					'name'      => 'Motivation',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-lifestyle%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#fb8532',
						),
					),
				),
				array(
					'the_id'    => 'bs-food',
					'name'      => 'Food & Drinks',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-lifestyle%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#d9603b',
						),
					),
				),
				array(
					'the_id'    => 'bs-travel',
					'name'      => 'Travel',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-lifestyle%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#e4a211',
						),
					),
				),


				//
				// Tech cats
				//
				array(
					'the_id'    => 'bs-tech-gadget',
					'name'      => 'Tech & Gadget',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-2',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 8,
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-1',
						),
						array(
							'meta_key'   => 'better_slider_gradient',
							'meta_value' => 'colored-anim',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0D88D2',
						),
					),
				),
				array(
					'the_id'    => 'bs-gadgets',
					'name'      => 'Gadgets',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-tech-gadget%%',
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
							'meta_key'   => 'term_color',
							'meta_value' => '#0D88D2',
						),
					),
				),
				array(
					'the_id'    => 'bs-mobile',
					'name'      => 'Mobile and Phones',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-tech-gadget%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'tall-1-4',
						),
						array(
							'meta_key'   => 'term_posts_count',
							'meta_value' => 12,
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0AB3AF',
						),
					),
				),


				//
				// Sport cats
				//
				array(
					'the_id'    => 'bs-sport',
					'name'      => 'Sport',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#ed1c24',
						),
					),
				),
				array(
					'the_id'    => 'bs-racing',
					'name'      => 'Racing',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-sport%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#ed1c24',
						),
					),
				),


				//
				// Design cats
				//
				array(
					'the_id'    => 'bs-design',
					'name'      => 'Design',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#3381af',
						),
					),
				),
				array(
					'the_id'   => 'bs-interior',
					'name'     => 'Interior',
					'taxonomy' => 'category',
					'parent'   => '%%bs-design%%',
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
			array(
				'the_id' => 'bs-media-19',
				'file'   => $demo_image_url . $prefix . 'thumb-19.jpg',
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
				// Tech posts
				//
				array(
					'the_id'            => 'bs-post-tech-1',
					'post_title'        => 'I can&#x2019;t believe all the features mashed into this micro-apartment',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%,%%bs-mobile%%',
					),
					'post_format'       => 'audio',
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://soundcloud.com/lifeofdesiigner/desiigner-panda',
						)
					)
				),
				array(
					'the_id'            => 'bs-post-tech-2',
					'post_title'        => 'You can squeeze the world&#x2019;s most compact folding pram into a shoulder bag',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-2%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
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
					'the_id'            => 'bs-post-tech-3',
					'post_title'        => 'What type of camera do I need? A guide to buying your next one',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-mobile%%,%%bs-gadgets%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-4',
					'post_title'        => 'The FBI paid at least $1 million to get inside the San Bernardino shooter&#x2019;s iPhone',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-7%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
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
					'the_id'            => 'bs-post-tech-6',
					'post_title'        => 'Samsung is trying really hard not to call these phones &#x2018;Rose Gold&#x2019;',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-9%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-7',
					'post_title'        => 'Apple&#x2019;s trying to fix two key issues with wired and wireless headphones',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-10%%',
					'post_terms'        => array(
						'category' => '%%bs-mobile%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-8',
					'post_title'        => 'Upgrade to a high-tech BBQ with these 7 must-have products',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-1'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-9',
					'post_title'        => 'Motorola&#x2019;s budget Moto G phone: Coming soon in three new flavors',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-2%%',
					'post_terms'        => array(
						'category' => '%%bs-mobile%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-10',
					'post_title'        => 'Xiaomi buys 1,500 Microsoft patents, showing how much it wants the US market',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-5%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-11',
					'post_title'        => 'New York&#x2019;s antiquated steering wheel law poses roadblock to driverless cars',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-3%%',
					'post_terms'        => array(
						'category' => '%%bs-mobile%%',
					),
				),
				array(
					'the_id'            => 'bs-post-tech-12',
					'post_title'        => 'This monstrous battery can charge your phone for 40 days after the apocalypse',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-6%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),


				//
				// Fashion posts
				//
				array(
					'the_id'            => 'bs-post-fashion-1',
					'post_title'        => 'A detailed guide to celebrity athleisure lines',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-vogue%%,%%bs-street-fashion%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-2',
					'post_title'        => 'Why self esteem sucks, And why you don&#x2019;t need It',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-9%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-street-fashion%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-3',
					'post_title'        => 'PRINCE see how the fashion world was influenced by Prince&#x2019;s Legendary style',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-vogue%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-4',
					'post_title'        => 'Cindy Crawford&#x2019;s festival style is flawless with a capital F',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-1'
					),
					'thumbnail_id'      => '%%bs-media-10%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-street-fashion%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-5',
					'post_title'        => 'Why it&#x2019;s the year to wear what you like - Not dress for your type',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-6%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-vogue%%,%%bs-street-fashion%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-6',
					'post_title'        => '7 Fashion tips that will make you the center of the room',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-street-fashion%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-7',
					'post_title'        => 'If you only train your chest muscle, You&#x2019;ll end up looking worse',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-15%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-street-fashion%%,%%bs-vogue%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-8',
					'post_title'        => '6 Surprisingly simple tips for successfully renovating your home',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-7%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-vogue%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-9',
					'post_title'        => 'Marilyn Monroe&#x2019;s beauty secrets: The most surprising tips from Hollywood&#x2019;s ultimate icon',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-11%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-street-fashion%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-10',
					'post_title'        => 'Science explains how singing in the car can boost your mental health',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-vogue%%',
					),
				),
				array(
					'the_id'            => 'bs-post-fashion-10',
					'post_title'        => 'Science explains how singing in the car can boost your mental health',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-5%%',
					'post_terms'        => array(
						'category' => '%%bs-fashion%%,%%bs-vogue%%',
					),
				),


				//
				// lifestyle posts
				//
				array(
					'the_id'            => 'bs-post-lifestyle-1',
					'post_title'        => '10 Simple habits that will make lead you to true happiness',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-15%%',
					'post_terms'        => array(
						'category' => '%%bs-motivation%%,%%bs-family-activity%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-2',
					'post_title'        => 'How to use apple cider vinegar for effective weight loss',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-13%%',
					'post_terms'        => array(
						'category' => '%%bs-travel%%,%%bs-family-activity%%,%%bs-food%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-3',
					'post_title'        => 'The difference between looking good and feeling good',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-1'
					),
					'thumbnail_id'      => '%%bs-media-14%%',
					'post_terms'        => array(
						'category' => '%%bs-food%%,%%bs-motivation%%,%%bs-travel%%',
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
					'the_id'            => 'bs-post-lifestyle-4',
					'post_title'        => 'What to wear this spring no matter What you&#x2019;re up to',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-family-activity%%,%%bs-food%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-5',
					'post_title'        => 'The countries facing the greatest skill shortages',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-travel%%,%%bs-motivation%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-6',
					'post_title'        => '6 Surprisingly simple tips for successfully renovating your home',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-18%%',
					'post_terms'        => array(
						'category' => '%%bs-food%%,%%bs-family-activity%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-7',
					'post_title'        => 'The biggest health hurdles entrepreneurs face, and how to combat them',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-motivation%%,%%bs-travel%%,%%bs-food%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-8',
					'post_title'        => '10 Reasons why your dad doesn&#x2019;t actually want your father&#x2019;s day gift',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-6%%',
					'post_terms'        => array(
						'category' => '%%bs-family-activity%%,%%bs-food%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-9',
					'post_title'        => 'This is what will happen when you eat breakfast after an hour of waking',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-14%%',
					'post_terms'        => array(
						'category' => '%%bs-travel%%,%%bs-motivation%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-10',
					'post_title'        => '14 Questions you need to ask yourself before entering a new relationship',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-11%%',
					'post_terms'        => array(
						'category' => '%%bs-food%%,%%bs-family-activity%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-11',
					'post_title'        => 'Neuroscientists explain how running changes our brains and affects our thinking',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-food%%,%%bs-motivation%%,%%bs-travel%%',
					),
				),
				array(
					'the_id'            => 'bs-post-lifestyle-12',
					'post_title'        => 'On average people can only withstand 25 seconds of direct questioning on their life plans',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-17%%',
					'post_terms'        => array(
						'category' => '%%bs-travel%%,%%bs-family-activity%%,%%bs-food%%',
					),
				),


				//
				// Sport posts
				//
				array(
					'the_id'            => 'bs-post-sport-1',
					'post_title'        => 'Murray powers past wawrinka to book french open final',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-1'
					),
					'thumbnail_id'      => '%%bs-media-19%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-2',
					'post_title'        => 'Gibbs goaded over moore remarks',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-2%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-3',
					'post_title'        => 'Rio Olympics: Caster Semenya leaves no doubt in 800',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-4',
					'post_title'        => 'Where one olympic medal is a lot better than none',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-22%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-5',
					'post_title'        => 'Danny higginbotham: how will leicester cope without vardy?',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-7%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-6',
					'post_title'        => 'Paul nicholls and willie mullins title race will at sandown',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-19%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-7',
					'post_title'        => 'An olympic wrap-up show that doesn&#x2019;t quite translate',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-2%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),
				array(
					'the_id'            => 'bs-post-sport-8',
					'post_title'        => 'Paul Nicholls v Willie Mullins: Sandown showdown guide',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-racing%%',
					),
				),


				//
				// Design Posts
				//
				array(
					'the_id'            => 'bs-post-design-1',
					'post_title'        => '20 Light and easy dessert recipes to try this summer that won&#x2019;t weigh you down',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-1'
					),
					'thumbnail_id'      => '%%bs-media-24%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-2',
					'post_title'        => 'New builds in singapore: Innovative office designs attract global companies to asia',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-25%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-3',
					'post_title'        => 'Ferruccio Laviani distorts proportions in Foscarini&#x2019;s spazio soho',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-26%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-4',
					'post_title'        => 'The making of laufen&#x2019;s VAL bathroom collection by Konstantin Grcic',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-27%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-5',
					'post_title'        => 'Three evocatively edgy houses push the notion of indoor/outdoor living to the extreme',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-28%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-6',
					'post_title'        => '25 Simply amazing country houses around the globe and other',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-29%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-7',
					'post_title'        => '5 Things you need to stop doing if you want to be more productive',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-24%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-8',
					'post_title'        => 'Organic touches and sleek minimalism find harmony in an upper west side apartment',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-2'
					),
					'thumbnail_id'      => '%%bs-media-25%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
					),
				),
				array(
					'the_id'            => 'bs-post-design-9',
					'post_title'        => 'Ali Tayar&#x2019;s penultimate project epitomizes his rational yet utterly humanistic vision',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'pure-magazine-1'
					),
					'thumbnail_id'      => '%%bs-media-26%%',
					'post_terms'        => array(
						'category' => '%%bs-interior%%',
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
						'header_aside_logo_align'  => 'right',
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
							'category' => '%%bs-gadgets%%',
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'    => '',
							'type'     => 'campaign',
							'campaign' => '%%bs-post-ad-campaign-1%%',
							'count'    => 4,
							'columns'  => 2,
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
							'term_id'   => '%%bs-lifestyle%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-leaf',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
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
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-fashion%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-bookmark',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-sport%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-trophy',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
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
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-tech-gadget%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-apple',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
					)
				),

				//
				// Topbar navigation
				//
				array(
					'menu-name'     => 'Topbar Navigation',
					'menu-location' => 'top-menu',
					'items'         => array(
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-tech-gadget%%',
							'taxonomy'  => 'category',
						),
						array(
							'the_id'    => 'bs-menu-top-lifestyle',
							'item_type' => 'term',
							'term_id'   => '%%bs-lifestyle%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-family-activity%%',
							'taxonomy'  => 'category',
							'parent-id' => '%%bs-menu-top-lifestyle%%',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-motivation%%',
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
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-home',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'the_id'    => 'bs-menu-top-lifestyle',
							'item_type' => 'term',
							'term_id'   => '%%bs-lifestyle%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-leaf',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-tech-gadget%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-apple',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-fashion%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-child',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
					)
				),
			),

		), // menus

	);
}
