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

	$style_id       = 'adventure-blog';
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
						'name'     => 'amsterdam',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'     => 'bangkok',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.24',
					),
					array(
						'name'     => 'Destinations',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Food',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'hong kong',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.25',
					),
					array(
						'name'     => 'paris',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.26',
					),
					array(
						'name'      => 'Photography',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'stockholm',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.27',
					),
					array(
						'name'     => 'thailand',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.28',
					),
					array(
						'name'     => 'the virgin islands',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.29',
					),
					array(
						'name'     => 'Travel',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.14',
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
						'post_title'        => 'Contact me',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.80',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front page',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
							array(
								'meta_key'   => 'post_breadcrumb',
								'meta_value' => 'hide',
							),
							array(
								'meta_key'   => '_hide_title',
								'meta_value' => '1',
							),
						),
						'the_id'            => 'posts.primary.61',
					),
					array(
						'post_title'        => 'Next year\'s travel trends: destination races',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'Culture trip: discover 10 of the world’s top cultural enclaves',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => 'Places that pop: 10 of Europe\'s most colourful destinations',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'Beyond the Giant\'s Causeway: exploring Northern Ireland\'s dramatic Causeway Coast',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Next year\'s travel trends: cross-generational travel',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'Best new places for travellers to stay in 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.185',
					),
					array(
						'post_title'        => 'THIS \'KOREAN BISQUICK\' MAKES RESTAURANT-QUALITY PAJEON AT HOME',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'Beyond the golden domes: a guide to Kyiv’s neighbourhoods',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.200',
					),
					array(
						'post_title'        => '50 Best Places to Travel in 2017',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.183',
					),
					array(
						'post_title'        => 'Rome\'s top dishes and where to try them',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.204',
					),
					array(
						'post_title'        => 'The experts\' advice on how to lead an adventurous life',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.212',
					),
					array(
						'post_title'        => 'Walking the Camino de Santiago: highlights of the Camino Francés',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.214',
					),
					array(
						'post_title'        => 'Belgrade boroughs: a tour of the top neighbourhoods',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.218',
					),
					array(
						'post_title'        => 'English exotica: exploring the Isles of Scilly',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.210',
					),
					array(
						'post_title'        => 'Florence\'s best gelato: how to spot the real deal',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.208',
					),
					array(
						'post_title'        => 'HOW TO MAKE THE BEST ULTRA-BUTTERY CROISSANTS',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'Plan your perfect Croatian island-hopping adventure',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.206',
					),
					array(
						'post_title'        => 'From the city to the slopes: skiing in Germany and Austria',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.202',
					),
					array(
						'post_title'        => 'WHAT TO COOK THIS WEEKEND: FILIPINO COMFORT FOOD',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.147',
					),
					array(
						'post_title'        => 'WHY YOUR NEXT ADVENTURE NEEDS TO BE IN TANZANIA',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.117',
					),
					array(
						'post_title'        => '5 UNMISSABLE ACTIVITIES THAT MAKE VISITING RAS AL KHAIMAH A NO BRAINER',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.122',
					),
					array(
						'post_title'        => 'BLENCATHRA: HIKING SOME OF THE LAKE DISTRICT’S FINEST RIDGES',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.126',
					),
					array(
						'post_title'        => 'FAMILY CAMPING: 5 TIPS TO A SUCCESSFUL TRIP',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.115',
					),
					array(
						'post_title'        => 'BRITISH EXPLORER BENEDICT ALLEN MISSING IN PAPUA NEW GUINEA',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.113',
					),
					array(
						'post_title'        => 'HIKING THE SPECTACULAR BESSEGGEN RIDGE',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.107',
					),
					array(
						'post_title'        => '‘MISSING’ BRITISH EXPLORER BENEDICT ALLEN FOUND IN PAPUA NEW GUINEA',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.111',
					),
					array(
						'post_title'        => 'EMBARKING ON AN UNFORGETTABLE ADVENTURE TO ANTARCTICA',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.128',
					),
					array(
						'post_title'        => 'BEST HIKES IN THE WORLD: THE FISH RIVER GORGE, NAMIBIA',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => '9 ADVENTURE CATS YOU NEED TO FOLLOW ON INSTAGRAM',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.140',
					),
					array(
						'post_title'        => 'HOW TO PREPARE FOR WINTER WITH TOMATO PASTE',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.144',
					),
					array(
						'post_title'        => 'Where to go in January for relaxation',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.220',
					),
					array(
						'post_title'        => '6-delige messenset van Forged',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.138',
					),
					array(
						'post_title'        => 'HOW TO HIKE THE CHALLENGING TRANTER’S ROUND ROUTE IN SCOTLAND',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.136',
					),
					array(
						'post_title'        => 'DOUG SCOTT AUTUMN LECTURE TOUR: A CRAWL DOWN THE OGRE',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.132',
					),
					array(
						'post_title'        => '11 OF THE MOST INSPIRING ADVENTURE PHOTOS YOU’LL SEE THIS WEEK',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.134',
					),
					array(
						'post_title'        => 'HOW TO MAKE THE FLUFFIEST WHITE BREAD IN THE WORLD',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.146',
					),
					array(
						'post_title'        => 'Where to go in December for wildlife and nature',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Love at first bite: our unforgettable meals from the road',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.274',
					),
					array(
						'post_title'        => 'The vinyl frontier: a crate digger’s guide to Paris',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.270',
					),
					array(
						'post_title'        => 'Next year\'s travel trends: private islands for all',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Secret marvels: eyewitnesses of the weird and wonderful',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.272',
					),
					array(
						'post_title'        => 'Open road adventures: six epic drives of the world',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.268',
					),
					array(
						'post_title'        => 'Where to go in December for food and drink',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.222',
					),
					array(
						'post_title'        => 'Up Helly Aa: Shetland’s Viking fire festival',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'A BEGINNER\'S GUIDE TO JOLLOF RICE, THE ESSENTIAL DISH OF WEST AFRICA',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.142',
					),
					array(
						'post_title'        => 'Incredible activities you simply can’t miss in the italian dolomites',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_title'        => 'Shimmering strands and hidden coves: Croatia’s 10 best beaches',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => 'Swimming with the locals: 10 of Iceland\'s best pools',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.266',
					),
					array(
						'post_title'        => 'Black cabs to buzzing bars: an insider\'s guide to Belfast',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'Where to go in January for wildlife and nature',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%,%%taxonomy.primary.1%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.216',
					),
					array(
						'post_title'        => 'THE CORFU TRAIL: HOW TO HIKE ONE OF GREECE’S BEST KEPT SECRETS',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.119',
					),
					array(
						'post_title'        => 'Where to go in November for relaxation',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Winding through the wilds: road-tripping Norway’s west coast',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.260',
					),
					array(
						'post_title'        => 'A sun-drenched guide to Brussels in the summer',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'The best things in Schweiz are free: Switzerland on a budget',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => 'Up all night: the best rooftop bars in Seville',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => 'From mountain bikes to the grail church: nine great Edinburgh day trips',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Electric dreams: how to tour Switzerland by e-car',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'Is Antwerp the most continuously cool city on Earth?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Matera’s renaissance: new life in Italy’s ancient cave city',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'Manrique and beyond: the natural art of Lanzarote',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => 'Route AD 66: road-tripping the Roman ruins of southern France',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'Unmissable adventures around the world',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.244',
					),
					array(
						'post_title'        => 'Berlin\'s 10 best vegan restaurants (that carnivores will love too)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => '10 of the world’s coolest neighbour hoods to visit right now',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Where to go in October for food and drink',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'The Serra da Estrela: exploring Portugal’s ‘star mountain’',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => 'Alternative adventures and where to have them',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
							'post_tag' => '%%taxonomy.primary.23%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.26%%,%%taxonomy.primary.27%%,%%taxonomy.primary.28%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.246',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 InFeed',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad300x250-infeed}:\'full\'%%',
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
						'the_id'     => 'posts.primary.368',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 Post',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad300x250-post}:\'full\'%%',
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
						'the_id'     => 'posts.primary.371',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 Sidebar',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad300x250-sidebar}:\'full\'%%',
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
								'meta_value' => 'dsfsdf',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-7',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#8c9a78',
							),
							array(
								'meta_key'   => 'text_title',
								'meta_value' => '',
							),
							array(
								'meta_key'   => 'text_desc',
								'meta_value' => 'Subscribe my Newsletter for new blog posts, tips & new photos. ',
							),
							array(
								'meta_key'   => 'text_after',
								'meta_value' => '',
							),
							array(
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'     => 'posts.primary.177',
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
							'site_bg_image'     => array(
								'type' => 'top-center',
								'img'  => '%%bf_product_demo_media_url:{media.primary.bg}:\'full\'%%',
							),
							'site_bg_image_2'   => array(
								'type' => 'repeat',
								'img'  => '%%bf_product_demo_media_url:{media.primary.bg2}:\'full\'%%',
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
						'option_value' => '%%posts.primary.61%%',
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
							'ad_post_top_type'        => 'banner',
							'ad_post_top_banner'      => '%%posts.primary.371%%',
							'ad_post_top_align'       => 'left',
							'header_aside_logo_type'  => 'banner',
							'after_x_post_after_each' => '5',
							'after_x_post_type'       => 'banner',
							'after_x_post_banner'     => '368',
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
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper , Magazine and Blog theme with great attention to details...',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.about-avatar}:\'full\'%%',
								'about_link_url'       => '#',
								'about_link_text'      => 'Read More',
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
								'title'                 => 'popular posts',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '51',
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
									'icon'      => 'fa-star',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f005',
								),
								'paginate'              => 'next_prev',
							),
						),
						array(
							'widget_id'       => 'bs-popular-categories',
							'widget_settings' => array(
								'exclude'              => array(
									'',
								),
								'bf-widget-title-icon' => array(
									'icon'      => 'fa-folder-open',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f07c',
								),
							),
						),
						array(
							'widget_id'       => 'bs-instagram',
							'widget_settings' => array(
								'user_id'              => 'adventure_blog_publisher',
								'photo_count'          => '5',
								'style'                => 'slider',
								'bf-widget-title-icon' => array(
									'icon'      => 'fa-instagram',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f16d',
								),
							),
						),
						array(
							'widget_id'       => 'bs-newsletter-mailchimp',
							'widget_settings' => array(
								'mailchimp-code'       => '<form action="//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b" method="post"',
								'msg'                  => 'Subscribe my Newsletter for new blog posts, tips & new photos. ',
								'image'                => '%%bf_product_demo_media_url:{media.primary.newsletter}:\'full\'%%',
								'show-powered'         => '0',
								'bf-widget-title-icon' => array(
									'icon'      => 'fa-envelope',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f0e0',
								),
							),
						),
					),
					'secondary-sidebar' => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-text-listing-4',
							'widget_settings' => array(
								'title'                    => 'News',
								'count'                    => '8',
								'slider-control-dots'      => 'style-1',
								'slider-control-next-prev' => 'off',
								'paginate'                 => 'slider',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'   => 'banner',
								'banner' => '%%posts.primary.36%%',
							),
						),
					),
					'footer-1'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-2',
							'widget_settings' => array(
								'heading'              => 'About Me',
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
					'footer-2'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-2',
							'widget_settings' => array(
								'heading'              => 'My Travels',
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
					'footer-3'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-box-2',
							'widget_settings' => array(
								'heading'              => 'Contact Me',
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
						'menu-name'     => 'Main Navigation',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.61%%',
								'the_id'    => 'posts.primary.62',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.79',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.23%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.395',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.24%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.396',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.25%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.397',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.26%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.398',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.27%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.399',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.28%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.400',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.29%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.79%%',
								'the_id'    => 'posts.primary.401',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.78',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.76',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.77',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact me',
								'page_id'   => '%%posts.primary.80%%',
								'the_id'    => 'posts.primary.82',
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
								'page_id'   => '%%posts.primary.61%%',
								'the_id'    => 'posts.primary.70',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.325',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.323',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.324',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.327',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact me',
								'page_id'   => '%%posts.primary.80%%',
								'the_id'    => 'posts.primary.326',
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
					'file'   => $demo_image_url . $prefix . 'about-avatar.png',
					'the_id' => 'media.primary.about-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bad300x250-post.jpg',
					'the_id' => 'media.primary.ad300x250-post',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bad300x250-infeed.jpg',
					'the_id' => 'media.primary.ad300x250-infeed',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bad300x250-sidebar.jpg',
					'the_id' => 'media.primary.ad300x250-sidebar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'newsletter.png',
					'the_id' => 'media.primary.newsletter',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'header-bg.jpg',
					'the_id' => 'media.primary.bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bg-pattern.jpg',
					'the_id' => 'media.primary.bg2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'box-1.jpg',
					'the_id' => 'media.primary.box-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'box-2.jpg',
					'the_id' => 'media.primary.box-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'box-3.jpg',
					'the_id' => 'media.primary.box-3',
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
