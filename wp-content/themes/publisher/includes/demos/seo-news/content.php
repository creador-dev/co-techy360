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

	$style_id       = 'seo-news';
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
						'name'      => 'Content Marketing',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#ed4334',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Keyword Research',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#fe9d00',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-2',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Link Building',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#14bf3f',
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
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'SEO Basics',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#4b81ee',
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
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'      => 'Social Media',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#01ceaf',
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
						'the_id'    => 'taxonomy.primary.6',
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
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.15',
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
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.14',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'After  Header Injection',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.35',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Before Footer Injection',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'The One-to-One Ideal: A Roadmap to Effective Content Personalization',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.289',
					),
					array(
						'post_title'        => '5 Google Analytics Strategies To Measure SEO Success',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.297',
					),
					array(
						'post_title'        => 'Save Your Rankings When Launching a New Site With A Content Migration Strategy',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.298',
					),
					array(
						'post_title'        => '10 Things Content Marketers Need To Know About Wikipedia',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.294',
					),
					array(
						'post_title'        => '4 Keys to Achieving a Unified Approach to Content and SEO Strategies',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.292',
					),
					array(
						'post_title'        => '6 Tips to Create Out of This World Content That Will Be Shared',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => '5 Ways Interactive Content Helps Publishers Pump Up Web Revenues',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.291',
					),
					array(
						'post_title'        => 'Back to Basics – Why \'Panda\' Promotes and Penalizes Content',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.290',
					),
					array(
						'post_title'        => 'How to Choose the Right SEO Agency: 5 Considerations',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.330',
					),
					array(
						'post_title'        => '3 Free And Easy Tips To Make Your Website More Productive!',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'How Do I Remove My name and Information from Google and YouTube?',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.334',
					),
					array(
						'post_title'        => 'How to Sell SEO Services to Small Businesses with a Small Budget',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.332',
					),
					array(
						'post_title'        => 'SEO How to Sell SEO: A Lack of Buy-In from Management',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.331',
					),
					array(
						'post_title'        => 'Get Your Business Listed In 3 Sections Of The Search Engine Results Page',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.328',
					),
					array(
						'post_title'        => '6 Ways to Keep Readers Interested and Improve Content Readability',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.295',
					),
					array(
						'post_title'        => 'Reaching Consumers at Every Stage of the Buyer’s Journey',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.324',
					),
					array(
						'post_title'        => 'How to Sell SEO Services to Small Businesses with a Small Budget',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.283',
					),
					array(
						'post_title'        => 'SOCIAL How Social Media Can Maximize ROI on your Marketing Investment',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => 'Why Brands Should Care About Social Search Optimization',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'Facebook Marketing Strategy How To Drive Sales Through Facebook',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => '7 Ways Freelancers Can Use Social Media To Get More Clients',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => '8 Virtual Reality Stats To Influence Your Business Strategy in 2018',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'Twitter + Customer Service: Why YOU Should Be on Twitter',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.245',
					),
					array(
						'post_title'        => 'SOCIAL 5 Must-Have Features in Your Next Social Media Marketing Platform',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => 'Increase Your Audience Reach With Facebook Ad Targeting',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.251',
					),
					array(
						'post_title'        => 'PR Crisis? Online Reputation Management Is The Answer',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.336',
					),
					array(
						'post_title'        => '4 Reasons Why Your Content Marketing Campaign Failed',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Twitter Removes 140 Character Limit—Why This is Good for Business',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.247',
					),
					array(
						'post_title'        => 'SOCIAL What Yelp’s Evolution Means for Business Reputation Management',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => 'Facebook Announces Major Profile Changes, Starting With Mobile',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => '2 Ways to Target Your Audience Accurately Using Facebook Ads',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.249',
					),
					array(
						'post_title'        => 'How Can I Get My Business To Show Up on Local Search?',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.296',
					),
					array(
						'post_title'        => 'The Right Approach to Landing Page Optimization? Just Do It!',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.373',
					),
					array(
						'post_title'        => 'Recent Oil Spill Underlines Need for Online Reputation Management',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.326',
					),
					array(
						'post_title'        => 'Optimize and Localize: Five Essential Parts of a Mobile Strategy',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.423',
					),
					array(
						'post_title'        => 'Detect & Diminish: How to Deal with Damaging Search Results',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.428',
					),
					array(
						'post_title'        => 'How Much Transparency Is Too Much? How to Find the Right Balance',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.420',
					),
					array(
						'post_title'        => 'Web Design Engineered for End Users and Search Engines',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.368',
					),
					array(
						'post_title'        => 'Become More Visible: Combine Local and Universal Search',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.421',
					),
					array(
						'post_title'        => 'Post-click Optimizate Squeeze the Most Out of Every Click',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.425',
					),
					array(
						'post_title'        => '6 Common Marketing Challenges and How to Overcome Them',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.329',
					),
					array(
						'post_title'        => 'Lost and Found: Why Google+ is Essential for Your Business',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.369',
					),
					array(
						'post_title'        => 'Writing Effective Pay-Per-Click (PPC) Ads: Tips to Increase CTR and Conversions',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.424',
					),
					array(
						'post_title'        => 'Trends Toward Google Secure Search Affects Google Analytics Results',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.387',
					),
					array(
						'post_title'        => 'Selling Your SEO Services to Businesses with Limited Time',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.321',
					),
					array(
						'post_title'        => 'Guest Blogging Can Drastically Improve Your Website\'s SEO',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.385',
					),
					array(
						'post_title'        => 'From Tanking to Ranking - 3 Steps to Improve Your Website\'s SEO',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.366',
					),
					array(
						'post_title'        => 'What Can You Gain From Outsourcing Your SEO Services?',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.362',
					),
					array(
						'post_title'        => 'The Hard Freakonomics of Search Marketing for Small Business',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.379',
					),
					array(
						'post_title'        => 'Read All About It! Content Marketing Strategy Gets Blog Noticed!',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.327',
					),
					array(
						'post_title'        => 'How to Create an effective Location-Based CRM Strategy',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.380',
					),
					array(
						'post_title'        => 'Five Tips for Boosting the SEO Value of Your Video Content',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.376',
					),
					array(
						'post_title'        => 'The Online Marketing Trifecta: Web, Content, and Social Media',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.371',
					),
					array(
						'post_title'        => '2018 Holiday Marketing Stats You Won\'t Want To Miss',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.393',
					),
					array(
						'post_title'        => 'Best Tools for Jumpstarting Your Online Video Marketing',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.383',
					),
					array(
						'post_title'        => 'Testing Video to Improve Search Campaign Conversions',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.427',
					),
					array(
						'post_title'        => 'PPC Smart Search Marketing: Using the Same Firm for PPC & SEO',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.417',
					),
					array(
						'post_title'        => 'Paid Search Marketing: Can It Learn From Database Marketing?',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.426',
					),
					array(
						'post_title'        => 'When it Comes to Online Business Search: Local is Social is Mobile',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=UAQvhW0jXLo',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.422',
					),
					array(
						'post_title'        => 'Reputation Management How to Flag & Remove Fake Reviews from Google, Yelp, & Facebook',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Backlinko',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://backlinko.com and https://moz.com',
							),
						),
						'the_id'            => 'posts.primary.419',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner - 300x250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-336x280}:\'full\'%%',
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
						'the_id'     => 'posts.primary.543',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Banner Index - 728x90',
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
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.539',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Post X Paragraph - 300x250',
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
						'the_id'     => 'posts.primary.544',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'Newsletter',
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
								'meta_value' => 'style-6',
							),
						),
						'the_id'     => 'posts.primary.576',
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
							'injection_before_header' => '%%posts.primary.35%%',
							'injection_after_header' => '%%posts.primary.194%%',
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
						'option_value' => '%%posts.primary.14%%',
					),
					array(
						'type'         => 'option',
						'option_name'  => 'show_on_front',
						'option_value' => 'page',
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
							'widget_id'       => 'bs-subscribe-newsletter',
							'widget_settings' => array(
								'title'                 => 'Free Ebook: The Beginners Guide to SEO',
								'feedburner-id'         => '#Publisher',
								'msg'                   => 'This amazing course will teach you, step by step, how to double if not triple your traffic over the next 30 days.',
								'image'                 => '%%bf_product_demo_media_url:{media.primary.logo-widget}:\'full\'%%',
								'show-powered'          => '0',
								'bf-widget-title-color' => '#000000',
								'bf-widget-title-icon'  => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'bf-widget-title-style' => 't1-s4',
							),
						),
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular Posts',
								'count'                 => '5',
								'order_by'              => 'popular',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '70',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
									'meta'              => array(
										'show'        => '1',
										'author'      => '1',
										'date'        => '0',
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
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.543%%',
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
					'footer-1'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'title'                => '',
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         <li>Email: info@yoursite.com</li>
         <li>Phone: 1 (888) 222-4433 </li>',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_youtube'         => '#',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Link Building',
								'category'              => '%%taxonomy.primary.4%%',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '70',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '1',
										'author'      => '1',
										'date'        => '0',
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
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular Post',
								'count'                 => '3',
								'order_by'              => 'rand',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '70',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
									'meta'              => array(
										'show'        => '1',
										'author'      => '1',
										'date'        => '0',
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
								'page_id'   => '%%posts.primary.14%%',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
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
								'page_id'   => '%%posts.primary.14%%',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									16 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'NEW',
									),
									18 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#23bf5a',
									),
									array(
										'meta_key'   => 'badge_font_color',
										'meta_value' => '#ffffff',
									),
								),
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
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
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact Us',
								'page_id'   => '%%posts.primary.15%%',
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
					'file'   => $demo_image_url . $prefix . 'logo-widget.png',
					'the_id' => 'media.primary.logo-widget',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.png',
					'the_id' => 'media.primary.quote-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-336x280.jpg',
					'the_id' => 'media.primary.ad-336x280',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
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
			),
	);
}
