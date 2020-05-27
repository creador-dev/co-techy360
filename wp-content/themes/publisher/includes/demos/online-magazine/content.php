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

	$style_id       = 'online-magazine';
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
						'name'      => 'Beauty',
						'parent'    => '%%taxonomy.primary.2%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#8444a9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Bitcoin',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.27',
					),
					array(
						'name'      => 'Business',
						'parent'    => '%%taxonomy.primary.3%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#079741',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.15',
					),
					array(
						'name'      => 'Cakes',
						'parent'    => '%%taxonomy.primary.4%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f0512d',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'CES',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.28',
					),
					array(
						'name'      => 'Cruises',
						'parent'    => '%%taxonomy.primary.10%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#08abc9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.17',
					),
					array(
						'name'      => 'Cryptocurrencies',
						'parent'    => '%%taxonomy.primary.3%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#079741',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.18',
					),
					array(
						'name'      => 'Culture',
						'parent'    => '%%taxonomy.primary.5%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#c01d5a',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.19',
					),
					array(
						'name'      => 'Dishes',
						'parent'    => '%%taxonomy.primary.4%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f0512d',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.20',
					),
					array(
						'name'      => 'Drinks',
						'parent'    => '%%taxonomy.primary.4%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f0512d',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.21',
					),
					array(
						'name'      => 'Economy',
						'parent'    => '%%taxonomy.primary.3%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#079741',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.22',
					),
					array(
						'name'      => 'Entertainment',
						'parent'    => '%%taxonomy.primary.5%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#c01d5a',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.23',
					),
					array(
						'name'      => 'Fashion',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#8444a9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Finance',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#079741',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Hotels + Resorts',
						'parent'    => '%%taxonomy.primary.10%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#08abc9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.24',
					),
					array(
						'name'      => 'Ideas',
						'parent'    => '%%taxonomy.primary.4%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f0512d',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.25',
					),
					array(
						'name'     => 'iPhone X',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.29',
					),
					array(
						'name'      => 'Kitchen',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f0512d',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-4',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Lifestyle',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#c01d5a',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'      => 'Luxury',
						'parent'    => '%%taxonomy.primary.10%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#08abc9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.26',
					),
					array(
						'name'      => 'Men',
						'parent'    => '%%taxonomy.primary.2%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#8444a9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Music',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.30',
					),
					array(
						'name'     => 'Personal',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.31',
					),
					array(
						'name'      => 'Personal Finance',
						'parent'    => '%%taxonomy.primary.3%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#079741',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'RSS',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.32',
					),
					array(
						'name'      => 'Sports',
						'parent'    => '%%taxonomy.primary.5%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#c01d5a',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'Success',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.33',
					),
					array(
						'name'      => 'Tech',
						'parent'    => '%%taxonomy.primary.5%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#c01d5a',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.9',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#08abc9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.10',
					),
					array(
						'name'      => 'Trip Ideas',
						'parent'    => '%%taxonomy.primary.10%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#08abc9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.34',
					),
					array(
						'name'      => 'Wedding',
						'parent'    => '%%taxonomy.primary.2%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#8444a9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.12',
					),
					array(
						'name'      => 'Women',
						'parent'    => '%%taxonomy.primary.2%%',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#8444a9',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.13',
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
						'post_title'        => 'Contact Us',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.512',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.491',
					),
					array(
						'post_title'        => 'How Merit Kitchens Can Help You Freshen Up A Traditional Kitchen Design In Your Home',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.21%%',
						),
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => 'Before and after: from jumbled layout to open-plan extension, take a look at this stunning modern kitchen makeover',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.21%%',
						),
						'the_id'            => 'posts.primary.345',
					),
					array(
						'post_title'        => 'Before and after: from dark and dated to light and super-stylish, take a look at this amazing kitchen makeover',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.25%%',
						),
						'the_id'            => 'posts.primary.350',
					),
					array(
						'post_title'        => 'Lightweight, Waterproof and Superior Traction, this Boot is the Ultimate Urban Explorer',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.25%%',
						),
						'the_id'            => 'posts.primary.352',
					),
					array(
						'post_title'        => 'American Standard Partners with Plumber and Elite Snowboarder Jonathan Cheever',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.21%%',
						),
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'What’s for dinner, darling? Meet the brainy fridge that keeps track of your groceries and tells you what to cook',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%',
						),
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => 'How to plan the perfect kitchen How to plan a kitchen – your step-by-step guide to the perfect space',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.303',
					),
					array(
						'post_title'        => 'The Natural History Museum has summer barbecues sorted with its Bamboo Kitchen Collection',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.298',
					),
					array(
						'post_title'        => 'Everything you wanted to know about food mixers, blenders and juicers (but were afraid to ask…)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.306',
					),
					array(
						'post_title'        => '17 of the best UK architectural salvage shops for sourcing individual home buys',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.311',
					),
					array(
						'post_title'        => 'A place to sit: which booths and integrated kitchen seating are best for your kitchen?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.313',
					),
					array(
						'post_title'        => 'Dishwasher buying guide: Everything you need to know about finding the best dishwasher for your kitchen',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%',
						),
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'COMPAC, The Surfaces Company, Debuts Two New Collections at KBIS 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.25%%',
						),
						'the_id'            => 'posts.primary.354',
					),
					array(
						'post_title'        => 'The Ultimate Guide to Choosing a Yoga Teacher Training: What You Need to Know Before Choosing an Instructor Certification Course',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.386',
					),
					array(
						'post_title'        => 'Natural Remedies for Menopause: 17 Soothing Herbs and Supplements to Help You Feel Great at the End of Your Menstrual Cycle',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.382',
					),
					array(
						'post_title'        => 'Leicester City FC news: Where next for the Foxes after their Premier League miracle?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.405',
					),
					array(
						'post_title'        => 'Donovan McNabb and Eric Davis Dismissed From ESPN After Sexual Misconduct Probe',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.407',
					),
					array(
						'post_title'        => 'Apple Confirms All Macs and iOS Devices Are Affected by \'Meltdown\' Chip Flaw',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.419',
					),
					array(
						'post_title'        => '5 Things to Know About Lindsey Vonn as She Goes for the Gold at the 2018 Winter Olympics',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.409',
					),
					array(
						'post_title'        => 'Motherhood, Pregnancy and Meditation: 15 Amazing Health Benefits of a Mindful Birth For Mother and Child',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.379',
					),
					array(
						'post_title'        => 'Psychedelic Explorers Guide: The 6 Keys to Safely Tripping on Psychedelics for Deep Insight and Expansion of Consciousness',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.375',
					),
					array(
						'post_title'        => 'Unbot by Prism Design Consulting Shanghai Co.: 2017 Best of Year Winner for Extra-Small Office',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.25%%',
						),
						'the_id'            => 'posts.primary.358',
					),
					array(
						'post_title'        => 'Chroma by Savannah College of Art and Design: 2017 Best of Year Winner for Exhibition',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.25%%',
						),
						'the_id'            => 'posts.primary.356',
					),
					array(
						'post_title'        => 'Nestle Has Been Extracting Millions of Gallons of Water Without Proper Permits, Says California',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%',
						),
						'the_id'            => 'posts.primary.364',
					),
					array(
						'post_title'        => 'Sugar Leads to Depression – World’s First Trial Proves Gut and Brain are Linked (Protocol Included)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%',
						),
						'the_id'            => 'posts.primary.371',
					),
					array(
						'post_title'        => 'President Trump Has Nominated A Pro-Vaccine Exec to Secretary of the Health and Human Services',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.373',
					),
					array(
						'post_title'        => 'Gearing Up: When Will Robots Finally Take Over the Fast-Food Business?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.296',
					),
					array(
						'post_title'        => 'Where I Live, Entrepreneurs Are Afraid To Talk About Failure -- And It\'s Hurting Their Businesses',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.292',
					),
					array(
						'post_title'        => 'WIN £600 Towards Your Wedding Photographer AND A Photo booth worth £450!',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => '12 Days of Wedding Planning: Everything You Need To Know About Planning Your Honeymoon!',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'What Happened When This Bride Had No Wedding Dress On The Morning Of Her Big Day',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
						),
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => '16 Statement Coats: Street Style Shots To Get You Ready For The Cold',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.13%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'Toronto Fashion Week is Teaming Up With RESET Collections in February 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.13%%',
						),
						'the_id'            => 'posts.primary.260',
					),
					array(
						'post_title'        => 'GQ\'s Creative Director Tried a Different Moisturizer Every Day for a Month So You Don\'t Have To',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => '8 Shower Upgrades That Will Turn Your Bathroom Into the Sanctuary You Deserve',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => '10 Makeup Artists to Follow in 2018 if You Want to See More Than Cut Creases on Your Feed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.215',
					),
					array(
						'post_title'        => 'The Key to Wearing a Sparkly Headband (Without Looking Cheesy) is a Chic Updo',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.209',
					),
					array(
						'post_title'        => '5 Hair Brands That Cater to Women of Colour With Great Products (And Even Better Marketing)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Timothée Chalamet and Armie Hammer Will Make You Question Your Dedication to Navy Suits',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'Terry Richardson Is Reportedly Under Investigation by the NYPD After Accusations of Sexual Assault',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'McLaren reports another record year of growth – with 20 cars built each day',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'Smart door handle that sanitises hands launched to help fight against superbugs and other infections',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'How Dollar Shave Club\'s Founder Built a $1 Billion Company That Changed the Industry',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.284',
					),
					array(
						'post_title'        => 'The 153 Best Company Cultures in America (and What You Can Learn From Them)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.282',
					),
					array(
						'post_title'        => 'After Years of Challenges, Foursquare Has Found its Purpose -- and Profits',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Reid Hoffman: To Successfully Grow A Business, You Must \'Expect Chaos\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.290',
					),
					array(
						'post_title'        => 'YouTube Star Logan Paul Under Fire After Filming Apparent Suicide Victim in Japanese Forest',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.422',
					),
					array(
						'post_title'        => 'Where I Live, Entrepreneurs Are Afraid To Talk About Failure -- And It\'s Hurting Their Businesses',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.278',
					),
					array(
						'post_title'        => 'Ken Burns Talks About Leadership, Productivity and Achieving Immortality Through Storytelling',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.276',
					),
					array(
						'post_title'        => 'Maidenhead: SDL predicts 2018 trends on artificial intelligence and machine learning',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.266',
					),
					array(
						'post_title'        => 'Tim Ferriss, Gary Vaynerchuk and More Share What Will Make Businesses Successful in 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.268',
					),
					array(
						'post_title'        => 'From Branding to Recruiting, Check Out the 10 Business Trends to Make Next Year a Success',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.270',
					),
					array(
						'post_title'        => 'Despite the Dangers, This Founder Is Staying in War-Torn Syria to Help Entrepreneurs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.272',
					),
					array(
						'post_title'        => 'How Patience, Grit and Beer Helped This Entrepreneur Finally Find Success',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.294',
					),
					array(
						'post_title'        => 'A Christmas Snowstorm Could Wreak Havoc on Holiday Travel. Here\'s What to Know',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.435',
					),
					array(
						'post_title'        => 'Why Superchef David Chang Is Risking His Perfect Restaurant Record for a Delivery Startup',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.274',
					),
					array(
						'post_title'        => 'Australian Beachgoers Stood Around and Watched While a Man Drowned, Rescuers Say',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.433',
					),
					array(
						'post_title'        => 'She’s Gotta Have It Failed In Its Representation of Black Women’s Bodies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.211',
					),
					array(
						'post_title'        => 'Here’s What We Should Be Asking Actors on the Red Carpet Tomorrow Night',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.13%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'From lacklustre units to walls with the wow-factor, this kitchen transformation will leave you speechless',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.309',
					),
					array(
						'post_title'        => 'Before and after: from three small rooms to a characterful kitchen with upcycled furniture',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.21%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.339',
					),
					array(
						'post_title'        => 'How \'Chelsea Lately\' Comedian Sarah Colonna Is Planning Her Wedding (Hint With a Sense of Humor)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.246',
					),
					array(
						'post_title'        => 'For American Franchisors to Succeed Overseas, They Have to Be Open to Change',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.300',
					),
					array(
						'post_title'        => 'Swatting Led to an Innocent Mans Death in Kansas Here\'s What to Know About It',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.424',
					),
					array(
						'post_title'        => 'America\'s Best National Parks Could Raise Their Entry Fees to $70. Here\'s What You Can Do',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.24%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.445',
					),
					array(
						'post_title'        => 'Quieting Your Thoughts: Effortless Meditation Techniques For Busy People With Busy Minds',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.377',
					),
					array(
						'post_title'        => 'Tottenham Hotspur: The special story behind Pochettinos rise and how Spurs are close to achieving big things',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.403',
					),
					array(
						'post_title'        => 'RD Henry Company Boosts Midwest Region Coverage with Strategic Addition',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.21%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.331',
					),
					array(
						'post_title'        => 'A United Flight Had to Land After a Passenger Spread Poop All Over the Bathrooms',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.429',
					),
					array(
						'post_title'        => 'Mark Zuckerberg\'s New Year\'s Resolution Is a Huge Deal for Facebook — and the World',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.417',
					),
					array(
						'post_title'        => 'Kallista and Ann Sacks Receive Chicago Athenaeum Good Design Awards',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.326',
					),
					array(
						'post_title'        => 'University of Arizona Football Coach Fired Days After Sexual Harassment Investigation',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.411',
					),
					array(
						'post_title'        => 'What the Stars of Impractical Jokers Can Teach You About Teamwork and Risk',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.280',
					),
					array(
						'post_title'        => '3 Founders With Booming Businesses Share Stories About Their Difficult Early Days',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.22%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.288',
					),
					array(
						'post_title'        => 'Every Single Time Tom Hiddleston, 2017\'s Most Stylish Man, Looked Awesome Wearing A Suit',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'The Beauty Products You Should Try in 2018, According to Your New Year’s Resolutions',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.217',
					),
					array(
						'post_title'        => 'Our 2017 Kitchen of the Year Combines the Best of Something Old and Something New',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.322',
					),
					array(
						'post_title'        => 'Just Got a Drone for the Holidays? Check Out These Important Safety Tips First',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.426',
					),
					array(
						'post_title'        => 'Exuberant Dancing Airport Employee Will Instantly Make Your Day More Enjoyable',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.451',
					),
					array(
						'post_title'        => '14 Benefits of Squatting, Why We Should All Be Doing It, and How to Squat Right',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.360',
					),
					array(
						'post_title'        => 'Why You Should Think Twice Before Drinking Tap Water on a Plane, According to a Flight Attendant',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.455',
					),
					array(
						'post_title'        => 'Southwest Airlines Is Sorry That a Passenger Was Forcibly Removed From a Flight',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.457',
					),
					array(
						'post_title'        => '\'We Do Not Tolerate Discrimination.\' American Airlines CEO Responds to NAACP Warning for Black Passengers',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.449',
					),
					array(
						'post_title'        => 'Meet the 29-Year-Old Data Scientist Who Ditched Her Job to Become a Full-Time Rock Climber',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.24%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.447',
					),
					array(
						'post_title'        => 'How to Get Engagement Photos that Look As Good As Meghan Markle’s',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.13%%',
							'post_tag' => '%%taxonomy.primary.27%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => '4,000 Flights Have Been Canceled Due to Winter Storm Grayson. Here’s What to Do If Yours Was One',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.437',
					),
					array(
						'post_title'        => 'A \'Happy Place\' Is Popping Up in Los Angeles Because Even Californians Get Sad',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.24%%',
							'post_tag' => '%%taxonomy.primary.34%%',
						),
						'the_id'            => 'posts.primary.441',
					),
					array(
						'post_title'        => '\'Horrific.\' 2 Women Lost at Sea for 5 Months Survived Shark Attacks and Storms',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.24%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.443',
					),
					array(
						'post_title'        => 'This Woman Gets Paid $10,000 a Month to Travel the World and Stay in Luxury Homes',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.459',
					),
					array(
						'post_title'        => 'Reminder: These States May Not Let You Use Your Driver’s License to Fly Domestically Next Year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.453',
					),
					array(
						'post_title'        => 'Our 2017 Kitchen of the Year Will Make You Fall in Love With Neutrals All Over Again',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.324',
					),
					array(
						'post_title'        => 'How to Deal With a Rude Seat Recliner on a Plane According to an Etiquette Expert',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.461',
					),
					array(
						'post_title'        => 'Paris Hilton’s Engagement Ring is Shockingly Smaller Than Her First One',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.13%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'One Million Receive Faulty Dengvaxia Vaccine Which May Cause Dengue Rather Than Prevent it',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.368',
					),
					array(
						'post_title'        => 'Japanese Train Line Apologizes for ‘Inconvenience’ After Departing 20 Seconds Early',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.24%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.439',
					),
					array(
						'post_title'        => 'Win VIP Tickets to The Liverpool and North West Wedding Show AND Afternoon Tea At Inglewood Manor!',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => 'The 22 Best Tricks to Make Traveling Less Painful, According to Airline Professionals',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.463',
					),
					array(
						'post_title'        => 'Why Flight Attendants Don’t Really Want You to Stop Ordering Diet Coke on Your Flight',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'the_id'            => 'posts.primary.466',
					),
					array(
						'post_title'        => 'Unnecessary and Unacceptable Delta Responds to Ann Coulter After Twitter Tirade',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%',
							'post_tag' => '%%taxonomy.primary.31%%,%%taxonomy.primary.33%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=22cdBDK-8hk',
							),
						),
						'the_id'            => 'posts.primary.469',
					),
					array(
						'post_title'        => 'World Cruising Destinations: An inspirational guide to every cruising destination in the world',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.29%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.431',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Single Post in Content',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250}:\'full\'%%',
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
						'the_id'     => 'posts.primary.194',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Sidebar 2 - 300 x 250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-2}:\'full\'%%',
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
						'the_id'     => 'posts.primary.183',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Header',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-728x90-2}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.118',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Home Sidebar - 300 x 250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-3}:\'full\'%%',
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
						'the_id'     => 'posts.primary.105',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Banner Index Page - 728 x 90',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-728x90}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.128',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Sidebar Index - 270 x 600',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-270x600}:\'full\'%%',
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
						'the_id'     => 'posts.primary.152',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Sidebar Single Page - 300 x 600',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x600}:\'full\'%%',
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
						'the_id'     => 'posts.primary.185',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'Newsletter Single Post',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'feedburner',
							),
							array(
								'meta_key'   => 'feedburner_id',
								'meta_value' => 'Publisher',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-3',
							),
							array(
								'meta_key'   => 'social_icons_sites',
								'meta_value' => array(
									'facebook'  => '1',
									'twitter'   => '1',
									'google'    => '1',
									'instagram' => '1',
									'vimeo'     => '1',
								),
							),
						),
						'the_id'     => 'posts.primary.471',
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
						'option_value' => '%%posts.primary.491%%',
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
							'header_aside_logo_banner' => '%%posts.primary.118%%',
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
					'primary-sidebar'   => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                    => 'Most Popular',
								'count'                    => '5',
								'order_by'                 => 'popular',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'slider-autoplay'          => '0',
								'listing-settings'         => array(
									'title-limit'       => '67',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '0',
										'author'      => '0',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '1',
									),
								),
								'disable_duplicate'        => '0',
								'bf-widget-title-color'    => '#000000',
								'bf-widget-title-bg-color' => '#000000',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'slider',
							),
						),
						array(
							'widget_id'       => 'bs-subscribe-newsletter',
							'widget_settings' => array(
								'title'                 => 'Join Newsletter',
								'feedburner-id'         => 'dsf',
								'image'                 => '%%bf_product_demo_media_url:{media.primary.newsletter}:\'full\'%%',
								'show-powered'          => '0',
								'bf-widget-bg-color'    => '#ffffff',
								'bf-widget-title-icon'  => array(
									'icon'      => 'fa-envelope-o',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f003',
								),
								'bf-widget-title-style' => 't1-s4',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.185%%',
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
					),
					'secondary-sidebar' => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-text-listing-3',
							'widget_settings' => array(
								'title'                 => 'Latest Posts',
								'count'                 => '10',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '70',
									'excerpt-limit'     => '200',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '0',
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
								'paginate'              => 'next_prev',
								'columns'               => 1,
							),
						),
						array(
							'widget_id'       => 'bs-popular-categories',
							'widget_settings' => array(
								'title'                => 'Top Categories',
								'exclude'              => array(
									'2',
									'3',
									'4',
									'5',
									'10',
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
							'widget_id'       => 'better-social-counter',
							'widget_settings' => array(
								'title'                => '',
								'style'                => 'style-11',
								'columns'              => '1',
								'order'                => array(
									'facebook'  => '1',
									'twitter'   => '1',
									'vimeo'     => '1',
									'instagram' => '1',
									'pinterest' => '1',
									'rss'       => '1',
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
					),
					'footer-1'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'title'                => '',
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         • Email: info@yoursite.com
         • Phone: 844-698-6394',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
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
					'footer-2'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Most Viewed',
								'count'                 => '3',
								'order_by'              => 'rand',
								'columns'               => 1,
								'listing-settings'      => array(
									'title-limit'       => '67',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '0',
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
								'paginate'              => 'none',
								'pagination-show-label' => '0',
							),
						),
					),
					'footer-3'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Editors\' Picks',
								'count'                 => '3',
								'order_by'              => 'rand',
								'columns'               => 1,
								'listing-settings'      => array(
									'title-limit'       => '67',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '0',
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
								'paginate'              => 'none',
								'pagination-show-label' => '0',
							),
						),
					),
					'footer-4'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Opinion',
								'count'                 => '3',
								'order_by'              => 'rand',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '67',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '0',
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
								'paginate'              => 'none',
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
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.491%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-newspaper-o',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f1ea',
										),
									),
								),
								'the_id'    => 'posts.primary.509',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-diamond',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f219',
										),
									),
								),
								'the_id'    => 'posts.primary.504',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-coffee',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0f4',
										),
									),
								),
								'the_id'    => 'posts.primary.507',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.10%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-plane',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f072',
										),
									),
								),
								'the_id'    => 'posts.primary.508',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-bar-chart-o',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f080',
										),
									),
								),
								'the_id'    => 'posts.primary.505',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-cutlery',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0f5',
										),
									),
								),
								'the_id'    => 'posts.primary.506',
							),
						),
					),
					array(
						'menu-location' => 'main-menu',
						'menu-name'     => 'Main Navigation',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.491%%',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-newspaper-o',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f1ea',
										),
									),
								),
								'the_id'    => 'posts.primary.515',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.27%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-hashtag',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f292',
										),
									),
								),
								'the_id'    => 'posts.primary.474',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.28%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-hashtag',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f292',
										),
									),
								),
								'the_id'    => 'posts.primary.475',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.33%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-hashtag',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f292',
										),
									),
								),
								'the_id'    => 'posts.primary.479',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.31%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-hashtag',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f292',
										),
									),
								),
								'the_id'    => 'posts.primary.478',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.30%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-hashtag',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f292',
										),
									),
								),
								'the_id'    => 'posts.primary.477',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.29%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-apple',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f179',
										),
									),
								),
								'the_id'    => 'posts.primary.476',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.34%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
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
								'the_id'    => 'posts.primary.480',
							),
							array(
								'item_type' => 'custom',
								'target'    => '',
								'title'     => 'RSS',
								'url'       => '/feed/',
								'parent-id' => '%%posts.primary.515%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-rss',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f09e',
										),
									),
								),
								'the_id'    => 'posts.primary.481',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-diamond',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f219',
										),
									),
								),
								'the_id'    => 'posts.primary.22',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.13%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.22%%',
								'the_id'    => 'posts.primary.485',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.22%%',
								'the_id'    => 'posts.primary.483',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.22%%',
								'the_id'    => 'posts.primary.482',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.12%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.22%%',
								'the_id'    => 'posts.primary.484',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-coffee',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0f4',
										),
									),
								),
								'the_id'    => 'posts.primary.25',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.19%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.25%%',
								'the_id'    => 'posts.primary.486',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.23%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.25%%',
								'the_id'    => 'posts.primary.487',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.25%%',
								'the_id'    => 'posts.primary.489',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.25%%',
								'the_id'    => 'posts.primary.488',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.10%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-plane',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f072',
										),
									),
								),
								'the_id'    => 'posts.primary.26',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.26%%',
								'the_id'    => 'posts.primary.495',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.24%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.26%%',
								'the_id'    => 'posts.primary.493',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.26%%',
								'the_id'    => 'posts.primary.490',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.26%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.26%%',
								'the_id'    => 'posts.primary.494',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-bar-chart-o',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f080',
										),
									),
								),
								'the_id'    => 'posts.primary.23',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.23%%',
								'the_id'    => 'posts.primary.499',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.22%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.23%%',
								'the_id'    => 'posts.primary.498',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.23%%',
								'the_id'    => 'posts.primary.496',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.18%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.23%%',
								'the_id'    => 'posts.primary.497',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-cutlery',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0f5',
										),
									),
								),
								'the_id'    => 'posts.primary.24',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.20%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.24%%',
								'the_id'    => 'posts.primary.501',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.21%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.24%%',
								'the_id'    => 'posts.primary.502',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.24%%',
								'the_id'    => 'posts.primary.500',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.25%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.24%%',
								'the_id'    => 'posts.primary.503',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.472',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact Us',
								'page_id'   => '%%posts.primary.512%%',
								'the_id'    => 'posts.primary.516',
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
					'file'   => $demo_image_url . $prefix . 'logo-footer.png',
					'the_id' => 'media.primary.logo-footer',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'newsletter.png',
					'the_id' => 'media.primary.newsletter',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-mobile.png',
					'the_id' => 'media.primary.logo-mobile',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.png',
					'the_id' => 'media.primary.quote-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x600.jpg',
					'the_id' => 'media.primary.ad-300x600',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-2.jpg',
					'the_id' => 'media.primary.ad-300x250-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-270x600.jpg',
					'the_id' => 'media.primary.ad-270x600',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-728x90-2.jpg',
					'the_id' => 'media.primary.ad-728x90-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-3.jpg',
					'the_id' => 'media.primary.ad-300x250-3',
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
			),
	);
}
