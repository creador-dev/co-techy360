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

	$style_id       = 'foodly';
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
						'name'     => 'Breakfast',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'      => 'Cookbooks',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Drink',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Food',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Food',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'Indian',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'      => 'Living',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Melbourne',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Party',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Pasta',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'Recipes',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'Videos',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
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
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.72',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.73',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'All Blocks',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.75',
					),
					array(
						'post_title'        => 'It’s Already Christmas at Crate And Barrel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.159',
					),
					array(
						'post_title'        => 'Treasured Repast this Holidays at Lung Hin',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.184',
					),
					array(
						'post_title'        => 'Sparkling New Year at Vu’s Sky Bar and Lounge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_title'        => 'Kitsho Welcomes the 2018 Graduates',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.134',
					),
					array(
						'post_title'        => 'Aperitivo at Vu’s Sky Bar and Lounge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.149',
					),
					array(
						'post_title'        => 'Get ready for a magical kiss this February',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.137',
					),
					array(
						'post_title'        => 'Inspire moments of wonder with Tiny Love',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'Crimson Hotel Celebrates Women’s Month',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.135',
					),
					array(
						'post_title'        => 'Diana Stalder Sunscreen Cream SPF35',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.136',
					),
					array(
						'post_title'        => 'New Japanese delights at Katsu Sora',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'La Cornue’s Cornufe is now in the Philippines',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'Twenty Six Delicious years with Dencio’s',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_title'        => 'Taal Vista Hotel: Ghost Hunting at the Ridge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => '“Chef Donita Shares Heart-Healthy Tuna Recipe”',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_title'        => 'Brit Fest at Marco Polo Ortigas Manila',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Conquer the Summer with F1 Hotel Manila',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => 'Liquid Gold debuts in Philippine party scene',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'Christmas at Makati Diamond Residences',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Rest and Relax at Makati Diamond Residences!',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.129',
					),
					array(
						'post_title'        => 'Enchanted Kingdom’s Filipino Favorites!',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.106',
					),
					array(
						'post_title'        => 'EDEN: Providing Comfort Through Food',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.107',
					),
					array(
						'post_title'        => 'Kitsho Celebrates Milestones This July',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.108',
					),
					array(
						'post_title'        => 'Shakey’s on Wheels at Enchanted Kingdom!',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.105',
					),
					array(
						'post_title'        => '“Thai Culinary Delights 2018” in Manila',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.104',
					),
					array(
						'post_title'        => 'Richmonde Hotel Iloilo’s Happy Trilogy',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.99',
					),
					array(
						'post_title'        => 'Pairs run towards a healthy lifestyle',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.101',
					),
					array(
						'post_title'        => 'Sweet 7th anniversary deals from Villa Del Conte',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.103',
					),
					array(
						'post_title'        => 'Plushies from Toys “R” Us and Jack ‘n Jill',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.109',
					),
					array(
						'post_title'        => 'A classic BBQ feast for Papa at Casa Roces',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.110',
					),
					array(
						'post_title'        => 'Mom’s cooking will always be the best',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.128',
					),
					array(
						'post_title'        => 'Perfect holiday with Villa Del Conte gift sets',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'Diana Stalder Triple Action Cream and Lotion',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.133',
					),
					array(
						'post_title'        => 'Kitsho celebrates fatherhood this June',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.126',
					),
					array(
						'post_title'        => 'Get Super Discounts at the Mega Hotel Sale!',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_title'        => 'All The Best For Dad At Diamond Hotel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.111',
					),
					array(
						'post_title'        => 'Celebrate Dad’s Day at Hotel Celeste',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.112',
					),
					array(
						'post_title'        => 'Slide Into Summer at Diamond Hotel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.132',
					),
					array(
						'post_title'        => 'Fast Delivery Service Guaranteed by Lalamove',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Chef Hiro Prepares Kitsho’s Holiday Packages',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.8%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=yshpmsGcJcM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'My Recipes',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.myrecipes.com',
							),
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'Auspicious Lunar New Year Delicacy at Lung Hin',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_title'        => 'Stellar Dining Privileges with Marco Polo Elite',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.243',
					),
					array(
						'post_title'        => 'HANEP Buhay: Entrepreneurship Made Easy',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Welcome 2018 at Richmonde Hotel Ortigas',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.157',
					),
					array(
						'post_title'        => 'Fun-Filled Play Place at Piccolo Kids Club',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => '‘Tis Valentine all month of February at Kitsho',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.151',
					),
					array(
						'post_title'        => 'Delightful Infusion at Marco Polo Ortigas Manila',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'Satiating King Crab cravings at Kitsho',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.8%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=yshpmsGcJcM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'My Recipes',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.myrecipes.com',
							),
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'A Slice of Summer at Diamond Hotel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.253',
					),
					array(
						'post_title'        => 'Stellar Dining Privileges with Marco Polo Elite',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Richmonde Hotel Iloilo is Thankful at Two!',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.225',
					),
					array(
						'post_title'        => 'Meditate Towards Lasting Happiness',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_tag'    => '%%taxonomy.primary.8%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=yshpmsGcJcM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'My Recipes',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.myrecipes.com',
							),
						),
						'the_id'            => 'posts.primary.251',
					),
					array(
						'post_title'        => 'Experience a Trollific Easter at Widus',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => 'Festa Italiana at Marco Polo Ortigas Manila',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => 'Start The Year Right at Manila Pavilion Hotel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.153',
					),
					array(
						'post_title'        => 'It’s a Mexican Fiesta at Diamond Hotel',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.8%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=yshpmsGcJcM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'My Recipes',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.myrecipes.com',
							),
						),
						'the_id'            => 'posts.primary.212',
					),
					array(
						'post_title'        => 'Maura De Leon: Queen of Philippine Stevia',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.131',
					),
					array(
						'post_title'        => 'Create a Healthy Home with Electrolux',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Chef Hiro’s Tasty Summer Treats at Kitsho',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'La Germania: The ideal kitchen helper',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.8%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=yshpmsGcJcM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'My Recipes',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.myrecipes.com',
							),
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'Chef Hiro’s Must-try Ramen Options at Kitsho',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Thrice as Nice with Marco Polo hotels',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.223',
					),
					array(
						'post_title'        => 'BENJARONG: Authentic Thai Flavor Upgraded',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.161',
					),
					array(
						'post_title'        => 'Discover Greece at Manila Pavilion Hotel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'Exquisite Dining Experience at Casa Roces',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_tag'    => '%%taxonomy.primary.8%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=yshpmsGcJcM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'My Recipes',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.myrecipes.com',
							),
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'MIHCA Opens Fifth Campus in the Philippines',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'Leading canning company gives back',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => 'The Sapphire Road A refreshing fusion',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'Rainy Urban Escape at Diamond Hotel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.245',
					),
					array(
						'post_title'        => 'Prosperous Feast this Lunar New Year',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'Chef Hiro Welcomes Celebrants at Kitsho',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.247',
					),
					array(
						'post_title'        => 'Coca-Cola plants a greener future in Hinatuan',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => 'Fun-Filled Play Place at Piccolo Kids Club',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Header Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-header-728x90}:\'full\'%%',
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
						'the_id'     => 'posts.primary.14',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-sidebar-300x250}:\'full\'%%',
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
						'the_id'     => 'posts.primary.69',
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
							'site_bg_image'     => array(
								'type' => 'repeat',
								'img'  => '%%bf_product_demo_media_url:{media.primary.bg}:\'full\'%%',
							),
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
						'option_value' => '%%posts.primary.72%%',
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
							'header_aside_logo_banner' => '%%posts.primary.14%%',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                    => 'Popular Recipes',
								'count'                    => '6',
								'order_by'                 => 'popular',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
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
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#faf9f7',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'none',
							),
						),
						array(
							'widget_id'       => 'bs-likebox',
							'widget_settings' => array(
								'url'                  => 'https://www.facebook.com/bestrecipesau/',
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
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.69%%',
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
								'content'              => 'After proofing overnight in the fridge, these yeast-raised biscuits are ready to bake first thing in the morning, so they\'re an easy ...
         
         • Advertisemnt: ads@yoursite.com
         • Contact Us: info@yoursit.com',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.about-avatar}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_youtube'         => '#',
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
								'title'                    => 'Recipes',
								'category'                 => '%%taxonomy.primary.6%%',
								'count'                    => '3',
								'order_by'                 => 'popular',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
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
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#f37131',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'none',
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                    => 'Food',
								'category'                 => '%%taxonomy.primary.4%%',
								'count'                    => '3',
								'order_by'                 => 'popular',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
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
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#f37131',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'none',
							),
						),
					),
					'footer-4'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                    => 'Drinks',
								'category'                 => '%%taxonomy.primary.3%%',
								'count'                    => '3',
								'order_by'                 => 'popular',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
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
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#f37131',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'none',
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
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.72%%',
								'the_id'    => 'posts.primary.259',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.19',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.17',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.16',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.20',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.18',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.15',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.21',
							),
							array(
								'item_type' => 'page',
								'title'     => 'About',
								'page_id'   => '%%posts.primary.74%%',
								'the_id'    => 'posts.primary.260',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.73%%',
								'the_id'    => 'posts.primary.261',
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
								'page_id'   => '%%posts.primary.72%%',
								'the_id'    => 'posts.primary.262',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.82',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.80',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.79',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.83',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.81',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.78',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.84',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.73%%',
								'the_id'    => 'posts.primary.77',
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
					'file'   => $demo_image_url . $prefix . 'logo-main.png',
					'the_id' => 'media.primary.logo-main',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bg.png',
					'the_id' => 'media.primary.bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-sidebar-300x250.jpg',
					'the_id' => 'media.primary.ad-sidebar-300x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-header-728x90.jpg',
					'the_id' => 'media.primary.ad-header-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'about-avatar.png',
					'the_id' => 'media.primary.about-avatar',
				),
			),
	);
}
