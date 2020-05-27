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

	$style_id       = 'view-magazine';
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
						'name'     => 'Business',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'      => 'Celebs',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#ee01d5',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Culture',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f90d3f',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Fashion',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#a014f9',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Grow',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'      => 'Health',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#0085eb',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'      => 'Lifestyle',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#00cc56',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'People',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Successful',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Think',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#00bccd',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-22',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.17',
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
						'post_title'        => 'Header Injection',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.45',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Hotest',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.38',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Popular',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.36',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.139',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.618',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Latest',
						'post_content_file' => $demo_path . 'post-content-5.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.34',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Mega Menu',
						'post_content_file' => $demo_path . 'post-content-6.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.577',
					),
					array(
						'post_title'        => '4 Tips to selecting the best dress for a casual event',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => 'How to Improve Your Style Without Overspending',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Philipp Plein sets the bar at New York Fashion Week',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => '4 Things to Consider Before Investing in a New Watch',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => '6 Handbags That Will Complement Your Office Outfit',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.253',
					),
					array(
						'post_title'        => 'L’Oréal Middle East puts sustainable beauty in the spotlight',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.212',
					),
					array(
						'post_title'        => 'The 3 Fashion Trends Dominating San Francisco',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.247',
					),
					array(
						'post_title'        => 'Six Super Easy Ways to Casually Accessorize Outfits',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => '5 Ways To Add Vintage Details To Your Modern Style',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'Is Sugar the Cause of Your Weight Gain? Tips to Cut Back',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Industry Kitchen – A Favorite Place to Eat in the Seaport',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.358',
					),
					array(
						'post_title'        => 'Coffee Can Be Good or Bad for Your Health: What to Know',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.298',
					),
					array(
						'post_title'        => 'Why Dr. Edward Alvarez Is Leading in Dental Innovation',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.295',
					),
					array(
						'post_title'        => 'The Perfectly Aged Steak: Ben & Jacks Steakhouse',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.357',
					),
					array(
						'post_title'        => '5 ways to take your holiday party to the next level',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.356',
					),
					array(
						'post_title'        => 'How to Eat Your Way to Natural Breast Enhancement',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.291',
					),
					array(
						'post_title'        => 'Can Donald Trump Disappear from his Twitter Photo?',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.214',
					),
					array(
						'post_title'        => 'Smart food swaps mean more nutrition and less ‘giving up’',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => 'The Esoteric Mind of Art Collector, Aaron Von Ossko',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.213',
					),
					array(
						'post_title'        => 'Matt Damon Legit "Can\'t Stand" Ben Affleck\'s New Girlfriend',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.151',
					),
					array(
						'post_title'        => 'Melania Trump\'s Wax Figure Has Officially Been Unveiled and It Can Talk!',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.150',
					),
					array(
						'post_title'        => 'Kim Kardashian Says North West Hardly Talks to Her Little Bro Saint West',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.148',
					),
					array(
						'post_title'        => 'Kylie Jenner Shared a Video of Stormi Smiling and It\'s Too Cute for Words',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'Mariah Carey Is Accused of Sexual Harassment by Former Manager',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'Luna Is Already the Best Big Sister Ever Thanks to Dad John Legend!',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.144',
					),
					array(
						'post_title'        => 'Cardi B Said She Kinda, Sort of Contemplated Having an Abortion',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.146',
					),
					array(
						'post_title'        => 'Khloé Kardashian\'s Baby Pics Prove Her Daughter Will Be Cute AF',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'Brandi Glanville and LeAnn Rimes End Years-Long Feud With a Selfie',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_title'        => 'Microsoft MCSE Certification Courses: Complete Guide',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_title'        => '5 nutritionist-approved tips for better holiday baking',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.355',
					),
					array(
						'post_title'        => 'Singapore | Curatorial Exhibition Art From The Streets',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.217',
					),
					array(
						'post_title'        => 'Rubin Creative: How to Build your Brand in Today’s Market',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.216',
					),
					array(
						'post_title'        => '5 Things to Put Right Before You Welcome the New Year',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'How This Technology Will Change Politics For The Next 20 Years',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Nello Petrucci Showcasing Latest Collection at Artexpo New York',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.210',
					),
					array(
						'post_title'        => 'Interview with American Crime Story actress: Fabiana Pascali',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.218',
					),
					array(
						'post_title'        => 'Rev Al Sharpton talks Tupac Shakur, Donald Trump & Mike Tyson',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.215',
					),
					array(
						'post_title'        => 'This App\'s Secret Fares Could Save You $500 on Flights',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.396',
					),
					array(
						'post_title'        => 'Jessica Simpson Proves She\'s Not Pregnant With Sexy Bikini Pic!',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.149',
					),
					array(
						'post_title'        => 'Anne Heche Is Dating Nurse Jacki Co-Creator Liz Brixius (EXCLUSIVE)',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.145',
					),
					array(
						'post_title'        => 'Enjoy the Sights of New York from the Luxury of a Limo',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.387',
					),
					array(
						'post_title'        => 'You need more fruits and veggies: 5 easy ways to get there',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.326',
					),
					array(
						'post_title'        => 'Rachel Weisz Is Pregnant, Expecting Baby No. 1 With Daniel Craig!',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.153',
					),
					array(
						'post_title'        => 'Top Kitchen Tips for Baking the Perfect Loaf of Bread',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.354',
					),
					array(
						'post_title'        => '5 Reasons TYLT’s Power Bag Is an Everyday Essential',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.384',
					),
					array(
						'post_title'        => 'Make Lasting Healthful Changes to Your Eating Habits',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.297',
					),
					array(
						'post_title'        => 'Here\'s Why Leipzig Is Germany’s Most Fascinating City',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.389',
					),
					array(
						'post_title'        => '5 ‘Healthy’ New Year’s Resolutions Worth Giving Up',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.301',
					),
					array(
						'post_title'        => 'Organic is always non-GMO, but is non-GMO organic?',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.300',
					),
					array(
						'post_title'        => 'This Popular Ice Cream Chain Is Coming to Disneyland',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.391',
					),
					array(
						'post_title'        => '13 Affordable Family Vacations to Take This Summer',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.394',
					),
					array(
						'post_title'        => 'Modern dining on the East River – Industry Kitchen',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.348',
					),
					array(
						'post_title'        => 'Must Have Fabulous & Luxurious Fursan Handbags',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => '10 smart swaps to make baking and cooking healthier',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.359',
					),
					array(
						'post_title'        => 'The Way to Their heart: Caramel Apple Pots de Creme',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.350',
					),
					array(
						'post_title'        => 'Immune Boosting Tips for a Healthy Holiday Season',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=P2WBmrh_VCY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.299',
					),
					array(
						'post_title'        => 'This $25 Device Helps Me Avoid Getting Sick While Traveling',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.392',
					),
					array(
						'post_title'        => 'This Is the Most Instagrammable Resort in the World',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=P2WBmrh_VCY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.390',
					),
					array(
						'post_title'        => 'The Future of Fashion: The Denibi Spring 2018 Collection',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'The Most Instagrammed Beaches From Thailand to Australia',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.393',
					),
					array(
						'post_title'        => '5 Most Common Myths About Visiting The States',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.398',
					),
					array(
						'post_title'        => 'Lamb Chops and Red Wine: A Perfect Easter Pairing',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.352',
					),
					array(
						'post_title'        => 'Cover your nutrition bases with this popular vegetable',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.351',
					),
					array(
						'post_title'        => '5 Ways to Increase Your Protein Intake Without Meat',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.296',
					),
					array(
						'post_title'        => '10 Spring Reads That Will Make Winter a Distant Memory',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.399',
					),
					array(
						'post_title'        => 'Interview with Anti-Aging Expert Dr. Lionel Bissoon',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=P2WBmrh_VCY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.294',
					),
					array(
						'post_title'        => 'The Dos and Don’ts of Attending a Fashion Show',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Fiber: What it is and why you need more of it in your diet',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.302',
					),
					array(
						'post_title'        => 'Vivica A. Fox is Hotter Than Ever, and Disarmingly Real',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=P2WBmrh_VCY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.220',
					),
					array(
						'post_title'        => 'Gift Ideas on Father’s Day: Best-selling Omega Watches',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=P2WBmrh_VCY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Health Line',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.healthline.com/',
							),
						),
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Looking at the world’s most luxurious holiday destinations',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.397',
					),
					array(
						'post_title'        => 'Dinner in 15 Minutes by The Beautiful Chef Taylor Erickson',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.353',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner X Paragraph',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-468x60}:\'full\'%%',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => 'Advertisement',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.137',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner - Index',
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
						'the_id'     => 'posts.primary.92',
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
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-11',
							),
						),
						'the_id'     => 'posts.primary.96',
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
							'logo_image'             => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
							'logo_image_retina'      => '',
							'off_canvas_logo'        => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
							'injection_after_header' => '%%posts.primary.45%%',
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
						'option_value' => '%%posts.primary.139%%',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular Now',
								'count'                 => '6',
								'order_by'              => 'popular',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '50',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '1',
									'meta'              => array(
										'show'        => '1',
										'author'      => '0',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '0',
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
								'banner'               => '%%posts.primary.92%%',
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
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'about_link_url'       => '#',
								'about_link_text'      => 'Read More',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
								'link_youtube'         => '#',
								'link_vimeo'           => '#',
								'title'                => '',
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
								'title'                 => 'Popular Posts',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '50',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
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
								'paginate'              => 'none',
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-popular-categories',
							'widget_settings' => array(
								'count'                => '7',
								'exclude'              => array(
									'',
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
						'menu-name'     => 'Main Navigation',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Latest',
								'page_id'   => '%%posts.primary.34%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-clock-o',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f017',
										),
									),
								),
								'the_id'    => 'posts.primary.401',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Popular',
								'page_id'   => '%%posts.primary.36%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-star',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f005',
										),
									),
								),
								'the_id'    => 'posts.primary.402',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Hotest',
								'page_id'   => '%%posts.primary.38%%',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'bsfi-fire-2',
											'type'      => 'bs-icons',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\b023',
										),
									),
								),
								'the_id'    => 'posts.primary.400',
							),
							array(
								'item_type' => 'custom',
								'target'    => '',
								'title'     => 'Categories',
								'url'       => '#',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'page-builder',
									),
									array(
										'meta_key'   => 'drop_menu_anim',
										'meta_value' => 'slide-top-in',
									),
									11 => array(
										'meta_key'   => 'custom_menu_page_content',
										'meta_value' => '577',
									),
									array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-th-large',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f009',
										),
									),
								),
								'the_id'    => 'posts.primary.8',
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
								'page_id'   => '%%posts.primary.139%%',
								'the_id'    => 'posts.primary.403',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.97',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.98',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.140',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.141',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.142',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.143',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.618%%',
								'the_id'    => 'posts.primary.620',
							),
						),
					),
					array(
						'menu-location' => 'off-canvas-menu',
						'menu-name'     => 'Off Canvas',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.492',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.493',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.494',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.495',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.496',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.497',
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
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-footer.png',
					'the_id' => 'media.primary.logo-footer',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.png',
					'the_id' => 'media.primary.quote-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-468x60.jpg',
					'the_id' => 'media.primary.ad-468x60',
				),
			),
	);
}
