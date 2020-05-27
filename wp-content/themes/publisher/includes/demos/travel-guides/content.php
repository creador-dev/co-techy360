<?php
/**
 * Returns content for default demo
 *
 * ->Taxonomies
 * ->Posts
 * ->Options
 * ->Widgets
 * ->Menus
 * ->Media
 *
 *
 * @return array
 */
function publisher_demo_raw_content() {

	$style_id       = 'travel-guides';
	$prefix         = $style_id . '-'; // prevent caching when user installs multiple demos continuously
	$demo_path      = PUBLISHER_THEME_PATH . 'includes/demos/' . $style_id . '/';
	$demo_image_url = publisher_get_demo_images_url( $style_id );

	return array(

		//
		// ->Taxonomies
		//
		'taxonomy' =>
			array(
				'multi_steps' => false,
				array(
					array(
						'name'     => 'Amsterdam',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.26',
					),
					array(
						'name'     => 'Asia',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Australia & Pacific',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.19',
					),
					array(
						'name'     => 'Bangkok',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.24',
					),
					array(
						'name'     => 'Canada',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'Caribbean',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Central America',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.18',
					),
					array(
						'name'      => 'Destinations',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
							array(
								'meta_key'   => 'page_listing',
								'meta_value' => 'tall-2-4',
							),
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#01c9ba',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'Europe',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Hong Kong',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.22',
					),
					array(
						'name'      => 'Hotels',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'page_listing',
								'meta_value' => 'grid-1',
							),
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#dc9f51',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-3',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Inspiration',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'page_listing',
								'meta_value' => 'blog-4',
							),
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#d1695a',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Mexico',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'Middle East',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.20',
					),
					array(
						'name'     => 'Paris',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'     => 'South America',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Stockholm',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.25',
					),
					array(
						'name'     => 'Thailand',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.28',
					),
					array(
						'name'     => 'the Virgin Islands',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.27',
					),
					array(
						'name'      => 'Tips + News',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#4ec18c',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Travel Guides',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#109ad2',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'United States',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'      => 'Videos',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#cc56a4',
							),
						),
						'the_id'    => 'taxonomy.primary.8',
					),
				),
			),
		//
		// ->Posts
		//
		'posts'    =>
			array(
				'multi_steps' => false,
				array(
					array(
						'post_type'         => 'page',
						'post_title'        => 'Frontpage',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.4',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact us',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.21',
					),
					array(
						'post_title'        => 'Surfing Siargao: Ocean Ecstasy In The Philippines',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'Scuba Diving With Sharks (No Cage!) In South Africa',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'Inside The West Bank: The Troubled City Of Hebron',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.163',
					),
					array(
						'post_title'        => '11 Secrets To Becoming A Professional Travel Blogger',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.165',
					),
					array(
						'post_title'        => 'Rock Climbing Limestone Cliffs At Railay Beach',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.167',
					),
					array(
						'post_title'        => 'Whitewater Kayaking Down The Pemi River',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'How To Travel To Cuba: A Guide For Americans',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.139',
					),
					array(
						'post_title'        => 'Packing & Planning For The Arctic Circle Trail',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.146',
					),
					array(
						'post_title'        => 'Fantasy Fest: Key West’s Crazy Street Festival',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.148',
					),
					array(
						'post_title'        => 'Trekking The Arctic Circle Trail In Greenland',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.150',
					),
					array(
						'post_title'        => 'Secrets Of The Ring Road: Iceland’s Epic Road Trip',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.173',
					),
					array(
						'post_title'        => 'Climbing The Ancient Mayan Ruins Of Coba',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.143',
					),
					array(
						'post_title'        => 'The Silfra Fissure: Ice Cold Snorkeling In Iceland',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.179',
					),
					array(
						'post_title'        => 'Balloon Safari: Rising With The Sun Over South Africa',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'My Caveman Experience: Squatting With Gypsies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => 'Chasing Snakes In Piedras Blancas National Park',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'What To Do About Laundry While Traveling?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.204',
					),
					array(
						'post_title'        => 'Road Trip! Surfing My Way Through South Africa',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Memorable Adventures With Locals In Thailand',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.187',
					),
					array(
						'post_title'        => 'Hanging Out Of A Helicopter Over Manhattan',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.137',
					),
					array(
						'post_title'        => 'Hiking Through The Holy Land: Israel’s National Trail',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.181',
					),
					array(
						'post_title'        => '50 Best Travel Quotes For Travel Inspiration',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.183',
					),
					array(
						'post_title'        => 'Apex Predator: Cage Diving With Great White Sharks',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.185',
					),
					array(
						'post_title'        => 'Iceland Photography: The Land Of Fire & Ice',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.177',
					),
					array(
						'post_title'        => 'Road Tripping Dartmoor National Park',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => 'The first ever Wyndham Grand/TRYP property is coming to Miami',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.91',
					),
					array(
						'post_title'        => 'Check out the 25 newest additions to Preferred\'s portfolio',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.93',
					),
					array(
						'post_title'        => '\'Real Cancun Chef’s Adventure\' gives guests an inside view',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.95',
					),
					array(
						'post_title'        => 'What designers need to know about adaptive reuse hotels',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.99',
					),
					array(
						'post_title'        => 'Meet the team behind Cachet Hospitality’s first U.S. hotel',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.88',
					),
					array(
						'post_title'        => 'Former Howard Johnson in Indiana signs on with Magnuson',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.85',
					),
					array(
						'post_title'        => 'Vision Hospitality starts work on its first dual-branded hotel',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.71',
					),
					array(
						'post_title'        => 'These three executives just signed on at SLS Brickell',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.74',
					),
					array(
						'post_title'        => 'What IHG learned about design by using the Agile system',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.76',
					),
					array(
						'post_title'        => 'Singapore hotels install Relay autonomous robots',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.81',
					),
					array(
						'post_title'        => 'Can Marriott clear Nigeria\'s hotel development hurdles?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.101',
					),
					array(
						'post_title'        => 'This New Orleans property signs on as the next Hotel RL',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.103',
					),
					array(
						'post_title'        => 'InterContinental Bora Bora Resort & Thalasso Spa is a floating oasis in the South Pacific',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_title'        => 'Surfing Costa Rica: Nicoya Peninsula 4×4 Road Trip',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.126',
					),
					array(
						'post_title'        => 'DJI Mavic Pro: Best Drone For Travel? (Plus Tips & Tricks)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.128',
					),
					array(
						'post_title'        => 'Motorcycle Road Trip In The Canadian Rockies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.206',
					),
					array(
						'post_title'        => 'Cuba Travel Guide: Things To Do, Costs, & Travel Tips',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.120',
					),
					array(
						'post_title'        => '2018 Tour Announcement: Travel With Me To Kamchatka, Russia!',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.118',
					),
					array(
						'post_title'        => 'Icrave designs first new hotel opening in Puerto Rico for 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.105',
					),
					array(
						'post_title'        => 'Travel Vaccination Guide: Which Shots Do You Need?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.109',
					),
					array(
						'post_title'        => '15 Awesome Things To Do In Mexico’s Yucatan Peninsula',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.112',
					),
					array(
						'post_title'        => '17 Best Travel Books To Fuel Your Wanderlust',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.116',
					),
					array(
						'post_title'        => 'Best Travel Gift Ideas For Travelers In 2017',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.133',
					),
					array(
						'post_title'        => 'Hitchhiking America: Surfing Couches In Seattle',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.212',
					),
					array(
						'post_title'        => 'Hitchhiking America: Sexy Stalkers & A Cruise (Part 10)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.202',
					),
					array(
						'post_title'        => 'This is what will happen when you eat breakfast after an hour of waking',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => 'Grand Canyon: 10 Top Attractions, Best Tours, and Where to Stay at the South Rim',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.244',
					),
					array(
						'post_title'        => '9 Top-Rated Tourist Attractions & Things to Do in Noosa Heads',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'The most beautiful country in the world – as voted by you',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.214',
					),
					array(
						'post_title'        => 'Travel News: the new Everest railway & Icelandic volcanoes',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.200',
					),
					array(
						'post_title'        => 'Why You Shouldn’t Ride Elephants In Thailand',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.210',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Asia',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.42',
					),
					array(
						'post_title'        => 'Powder Day: Early Season Snowboarding In Utah',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'Surfing Muizenberg Beach Around Cape Town, Travel Guides',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'This is what will happen when you eat breakfast after an hour of waking',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'Benchmark taps new finance Boston hotels, A Step By Guide',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.83',
					),
					array(
						'post_title'        => 'Travel + Leisure’s 2017 Destination of the Year Readers\' Choice Nominees',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Europe, Travel Guides',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
						),
						'the_id'            => 'posts.primary.50',
					),
					array(
						'post_title'        => 'Everything You Need to Know to See the Northern Lights in Norway',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => 'Man Caught on Video Climbing Through Baggage Carousel and Running',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.97',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the India, Travel Guides',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.52',
					),
					array(
						'post_title'        => 'Travel + Leisure’s 2018 Destination of the Year Readers\' Choice Nominees',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.169',
					),
					array(
						'post_title'        => 'This Stunning Spanish Park Has Gorges, Caves and Almost No Americans',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.141',
					),
					array(
						'post_title'        => 'This Is What Will Happen When You Eat Breakfast After An Hour Of Waking',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => '15 Top Rated 2017 Attractions in the Europe',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
						),
						'the_id'            => 'posts.primary.66',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Caribbean',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.48',
					),
					array(
						'post_title'        => 'Travel Blog Success: Why I Love This Course',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.208',
					),
					array(
						'post_title'        => 'Stunning Scenery On Utah’s Zion Narrows Hike',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Asia',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.64',
					),
					array(
						'post_title'        => 'The Best GoPro Accessories For Traveling',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.218',
					),
					array(
						'post_title'        => 'Waterfalls & Waterslides On Taveuni Island',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Scuba Diving Thailand’s Colorful Similan Islands',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Hitchhiking Across America: One Ride At A Time',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.216',
					),
					array(
						'post_title'        => 'Blessed By A Monk: My Magic Sak Yant Tattoo',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.220',
					),
					array(
						'post_title'        => 'Deep Water Soloing: Climbing Without Ropes',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.222',
					),
					array(
						'post_title'        => 'Swimming With Bulls: Shark Diving In Fiji',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'Meet Petra: The Woman Who Lives In A Cave',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://youtu.be/MtCMtC50gwY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Practical Advice For Students Who Dream Of Traveling',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.135',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the United States',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%',
						),
						'the_id'            => 'posts.primary.58',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the America',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.61',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Middle East',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%',
						),
						'the_id'            => 'posts.primary.54',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the South America',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.56',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Canada',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.13%%',
						),
						'the_id'            => 'posts.primary.46',
					),
					array(
						'post_title'        => 'A Guide To Driving Iceland’s Golden Circle',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.175',
					),
					array(
						'post_title'        => '5 trends in revenue management that need to be on your radar',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.79',
					),
					array(
						'post_title'        => '15 Top Rated 2018 Attractions in the Australia',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%',
						),
						'the_id'            => 'posts.primary.44',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'banner in content',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-post}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.502',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Bannet After  X Count Post',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-970x250-infeed}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.503',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'inline header',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-728x90-header}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.32',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300 x 250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-336x280-sidebar}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.34',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'newsletter',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'feedburner',
							),
							array(
								'meta_key'   => 'feedburner_id',
								'meta_value' => 'dsfgsdfgd',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-7',
							),
							array(
								'meta_key'   => 'text_desc',
								'meta_value' => 'Sign up here to get the latest news and updates delivered directly to your inbox.',
							),
						),
						'the_id'     => 'posts.primary.39',
					),
				),
			),
		//
		// ->Options
		//
		'options'  =>
			array(
				'multi_steps' => false,
				array(
					array(
						'type'              => 'option',
						'option_name'       => 'bs_' . 'publisher_theme_options',
						'option_value_file' => $demo_path . 'options.json',
					),
					array(
						'type'          => 'option',
						'option_name'   => 'bs_' . 'publisher_theme_options',
						'option_value'  => array(
							'logo_image'        => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
							'logo_image_retina' => '',
							'off_canvas_logo'   => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
						),
						'merge_options' => true,
					),
					array(
						'type'         => 'option',
						'option_name'  => 'bs_' . 'publisher_theme_options_current_style',
						'option_value' => $style_id,
					),
					array(
						'type'         => 'option',
						'option_name'  => 'bs_' . 'publisher_theme_options_current_demo',
						'option_value' => $style_id,
					),
					array(
						'type'         => 'option',
						'option_name'  => 'page_on_front',
						'option_value' => '%%posts.primary.4%%',
					),
					array(
						'type'         => 'option',
						'option_name'  => 'show_on_front',
						'option_value' => 'page',
					),
					array(
						'type'          => 'option',
						'option_name'   => 'better_ads_manager',
						'option_value'  => array(
							'header_aside_logo_type'   => 'banner',
							'header_aside_logo_banner' => '%%posts.primary.32%%',
						),
						'merge_options' => true,
					),
				),
			),
		//
		// ->Widgets
		//
		'widgets'  =>
			array(
				'multi_steps' => false,
				array(
					'primary-sidebar' => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.34%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'columns'              => '1',
							),
						),
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Travel News',
								'count'                 => '6',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '1',
										'author'      => '0',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '1',
									),
								),
								'disable_duplicate'     => '0',
								'bf-widget-title-icon'  => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'              => 'more_btn',
							),
						),
						array(
							'widget_id'       => 'better-social-counter',
							'widget_settings' => array(
								'style'                => 'style-6',
								'columns'              => '3',
								'order'                => array(
									'facebook' => '1',
									'twitter'  => '1',
									'google'   => '1',
									'youtube'  => '1',
									'dribbble' => '1',
									'vimeo'    => '1',
								),
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'bs-instagram',
							'widget_settings' => array(
								'user_id'              => 'travel_guides_publisher',
								'photo_count'          => '6',
								'style'                => '2',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'newsletter-pack',
							'widget_settings' => array(
								'newsletter'           => '%%posts.primary.39%%',
								'style'                => 'style-7',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
					'footer-1'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Amsterdam ',
								'link'                 => '#',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Paris',
								'link'                 => '#',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
					'footer-2'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Bali',
								'link'                 => '#',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Rio de Janeiro ',
								'link'                 => '#',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Bangkok ',
								'link'                 => ' #',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Maldive',
								'link'                 => '#',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
					'footer-4'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(),
						),
						array(
							'widget_id'       => 'bs-box-1',
							'widget_settings' => array(
								'heading'              => 'Venice',
								'link'                 => '#',
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
				),
			),
		//
		// ->Menus
		//
		'menus'    =>
			array(
				'multi_steps' => false,
				array(
					array(
						'menu-location' => 'main-menu',
						'menu-name'     => 'Main Menu',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.4%%',
								'the_id'    => 'posts.primary.18',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									11 => array(
										'meta_key'   => 'drop_menu_anim',
										'meta_value' => 'slide-fade',
									),
								),
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.364',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.19%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.365',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.13%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.366',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.367',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.18%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.368',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.12%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.369',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.370',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.20%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.371',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.372',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.373',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.15',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.14',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-youtube-play',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f16a',
										),
									),
								),
								'the_id'    => 'posts.primary.16',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.421',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact us',
								'page_id'   => '%%posts.primary.21%%',
								'the_id'    => 'posts.primary.23',
							),
						),
					),
					array(
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.4%%',
								'the_id'    => 'posts.primary.30',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.24',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.28',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.26',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.27',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.25',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.29',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact us',
								'page_id'   => '%%posts.primary.21%%',
								'the_id'    => 'posts.primary.31',
							),
						),
					),
				),
			),
		//
		// ->Media
		//
		'media'    =>
			array(
				'multi_steps' => true,
				array(
					'file'   => $demo_image_url . $prefix . 'logo-main.png',
					'the_id' => 'media.primary.logo-main',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-main',
				),
				array(
					'file'   => $demo_image_url . $prefix . '970x250-infeed.jpg',
					'the_id' => 'media.primary.ad-970x250-infeed',
				),
				array(
					'file'   => $demo_image_url . $prefix . '300x250-post.jpg',
					'the_id' => 'media.primary.ad-300x250-post',
				),
				array(
					'file'   => $demo_image_url . $prefix . '336x280-sidebar.jpg',
					'the_id' => 'media.primary.ad-336x280-sidebar',
				),
				array(
					'file'   => $demo_image_url . $prefix . '728x90-header.jpg',
					'the_id' => 'media.primary.ad-728x90-header',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bg.jpg',
					'the_id' => 'media.primary.bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-2.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-3.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-3',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-4.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-4',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-5.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-5',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-6.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-6',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-7.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-7',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-8.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-8',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-9.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-9',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-10.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-10',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-11.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-11',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-12.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-12',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.jpg',
					'the_id' => 'media.primary.quote-avatar',
				),
			),
	);
}
