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

	$style_id       = 'travel-blog';
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
						'name'      => 'Destinations',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#8e8466',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.16',
					),
					array(
						'name'      => 'Food',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#87989a',
							),
						),
						'the_id'    => 'taxonomy.primary.17',
					),
					array(
						'name'      => 'Photography',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#ad8b70',
							),
						),
						'the_id'    => 'taxonomy.primary.15',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#b18b54',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-3',
							),
						),
						'the_id'    => 'taxonomy.primary.14',
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
						'post_title'        => 'Contact',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.111',
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
						'the_id'            => 'posts.primary.56',
					),
					array(
						'post_title'        => '10 spectacular sunset spots in Dubrovnik',
						'post_format'       => 'image',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.173',
					),
					array(
						'post_title'        => 'The heart of the Urals: exploring Yekaterinburg',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.175',
					),
					array(
						'post_title'        => 'Where to expand your horizons this',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.177',
					),
					array(
						'post_title'        => 'New in Travel: the best new openings of 2017',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.169',
					),
					array(
						'post_title'        => 'Cream of the crop: Seville’s top 10',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.166',
					),
					array(
						'post_title'        => 'Nine travel resolutions and how',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.164',
					),
					array(
						'post_title'        => 'New in Travel: the best new openings of 2017',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'Best free things to do in St Petersburg',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.179',
					),
					array(
						'post_title'        => 'New in Travel: where our globetrotters',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.162',
					),
					array(
						'post_title'        => 'Brunch in Brussels: 10 best spots to indulge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.183',
					),
					array(
						'post_title'        => 'Sustainable travel: making the right',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_title'        => 'The world is your office: remote',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'Beyond the high-rises: rediscovering',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.200',
					),
					array(
						'post_title'        => 'Exploring the first forest: Białowieża National Park',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_title'        => 'Hiking across Macedonia: finding',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'Where to find 10 of Lisbon\'s best views',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'Secrets of Corfu: the hidden depths of',
						'post_format'       => 'image',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.187',
					),
					array(
						'post_title'        => 'Grape expectations: on the English wine trail',
						'post_format'       => 'image',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Macedonia’s top five foodie destinations',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.181',
					),
					array(
						'post_title'        => 'Unpronounceable ales and local whisky: 10 of Reykjavík’s best bars',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'St Patrick’s Day 2017: a local\'s guide to Dublin\'s',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_title'        => 'From Hogwarts to Christ Church: Britain\'s best',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.128',
					),
					array(
						'post_title'        => 'Wild things: safari alternatives for nature lovers',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => 'Ten tips for tackling your first bike tour',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.122',
					),
					array(
						'post_title'        => 'Exploring Norway’s north on the Nordlandsbanen',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.120',
					),
					array(
						'post_title'        => 'Going underground: exploring the best sights below London',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.105',
					),
					array(
						'post_title'        => 'Where to go in March for adventure',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.116',
					),
					array(
						'post_title'        => 'King Arthur in Britain: where to find the truth behind the legend',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.118',
					),
					array(
						'post_title'        => 'Architecture for travellers: a novice\'s guide',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.134',
					),
					array(
						'post_title'        => 'Tasting Bucharest: new trends for foodies',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.138',
					),
					array(
						'post_title'        => 'Where to go in February for adventure',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.148',
					),
					array(
						'post_title'        => 'Best places for vegetarians in Belgrade',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.150',
					),
					array(
						'post_title'        => 'Want a sunset with that? 10 aperitif',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.202',
					),
					array(
						'post_title'        => 'Staging nature: the architectural highlights of Norway\'s',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.146',
					),
					array(
						'post_title'        => 'Museum-hopping in Belgrade: where to get your culture fix',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.144',
					),
					array(
						'post_title'        => 'Meet a traveller: Mike and Anne, the eternal',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.140',
					),
					array(
						'post_title'        => 'Peak practice: walking in Snowdonia',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.142',
					),
					array(
						'post_title'        => 'Spooky crypts and sparkling metro stations',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'Travel addicts: where we\'ve been',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.206',
					),
					array(
						'post_title'        => 'A guide to Copenhagen\'s neighbourhoods',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.132',
					),
					array(
						'post_title'        => 'The 10 coolest bars to drink at in Porto',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'Mountains, quarries and surf lagoons',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.211',
					),
					array(
						'post_title'        => 'Get your caffeine fixie: Europe’s',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Malta’s top foodie experiences',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Road trip: Toulouse and the architecture of southwest France',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.204',
					),
					array(
						'post_title'        => 'Masters of marzipan: Lübeck\'s sweet success',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => 'How to drink coffee like a true Italian',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'Two days in Bucharest: ‘little Paris’',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.213',
					),
					array(
						'post_title'        => 'After dark: nocturnal adventures with kids',
						'post_format'       => 'image',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.185',
					),
					array(
						'post_title'        => 'Beyond Temple Bar: 10 of Dublin’s best pubs two days in Buchares',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.243',
					),
					array(
						'post_title'        => 'Does size matter? Measuring up Austria’s',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%',
						),
						'the_id'            => 'posts.primary.136',
					),
					array(
						'post_title'        => 'The ultimate foodie tour of Tuscany',
						'post_format'       => 'image',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.265',
					),
					array(
						'post_title'        => 'New in Travel: the best new openings of 2017',
						'post_format'       => 'image',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.171',
					),
					array(
						'post_title'        => 'Seven reasons to visit Pistoia a Florence',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'A flavour of the world’s tastiest',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.253',
					),
					array(
						'post_title'        => 'Gourmet on the go: Parisian street eats',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'On the grapevine: five must-try Sicilian',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.222',
					),
					array(
						'post_title'        => 'A coffee fanatic\'s ultimate world tour',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.251',
					),
					array(
						'post_title'        => 'Top experiences in Montenegro’s',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Lapland’s gold: foraging for',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.217',
					),
					array(
						'post_title'        => 'Meet a traveller: Debbie Campbell, the',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.208',
					),
					array(
						'post_title'        => '5000 years in 5 days: a historical trip',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.215',
					),
					array(
						'post_title'        => 'Belgium\'s 10 best dishes - and where to eat them',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Bikepacker tales: how to see the world',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Get stuffed: a world tour of Christmas',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'On the hop: Lisbon\'s exploding',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.249',
					),
					array(
						'post_title'        => 'How to live like a local in Rotterdam',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'An afternoon with Lyon\'s maverick ice cream makers',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.246',
					),
					array(
						'post_title'        => 'Causing a stir: the 10 best cocktail',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Cutting-edge Florence: the city’s trendiest',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'Must-know travel tips for first-timers in Italy',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.237',
					),
					array(
						'post_type'  => 'better-campaign',
						'post_title' => '120 Banners Campaign',
						'the_id'     => 'posts.primary.26',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 - InFeed',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-infeed}:\'full\'%%',
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
						'the_id'     => 'posts.primary.394',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 - Sidebar',
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
						'the_id'     => 'posts.primary.29',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 - Post',
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
						'the_id'     => 'posts.primary.390',
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
								'meta_value' => 'dfgs',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-9',
							),
							array(
								'meta_key'   => 'text_title',
								'meta_value' => 'Subscribe to our newslette',
							),
							array(
								'meta_key'   => 'text_desc',
								'meta_value' => 'Subscribe my Newsletter for new blog posts, tips & new photos. Let\'s stay updated!',
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
						'the_id'     => 'posts.primary.267',
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
							'header_bg_image'   => array(
								'type' => 'top-center',
								'img'  => '%%bf_product_demo_media_url:{media.primary.header-bg}:\'full\'%%',
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
						'option_value' => '%%posts.primary.56%%',
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
							'ad_post_inline'          => array(
								array(
									'type'      => 'banner',
									'campaign'  => 'none',
									'banner'    => '390',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'right',
									'paragraph' => '6',
								),
							),
							'header_aside_logo_type'  => 'banner',
							'after_x_post_after_each' => '5',
							'after_x_post_type'       => 'banner',
							'after_x_post_banner'     => '29',
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
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'title'                => 'About Me',
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper , Magazine and Blog theme with great attention to details...',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-widget}:\'full\'%%',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular Posts',
								'count'                 => '3',
								'columns'               => 1,
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
								'paginate'              => 'next_prev',
								'pagination-show-label' => '0',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.29%%',
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
							'widget_id'       => 'bs-popular-categories',
							'widget_settings' => array(
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
						array(
							'widget_id'       => 'bs-instagram',
							'widget_settings' => array(
								'title'                => 'Instagram Photos',
								'user_id'              => 'traveler_blog_publisher',
								'photo_count'          => '9',
								'style'                => '3',
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
							'widget_id'       => 'bs-newsletter-mailchimp',
							'widget_settings' => array(
								'mailchimp-code'       => '<form action="//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b" method="post"',
								'msg'                  => 'Subscribe my Newsletter for new blog posts, tips & new photos.',
								'image'                => '%%bf_product_demo_media_url:{media.primary.newsletter}:\'full\'%%',
								'show-powered'         => '0',
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
							'widget_id'       => 'bs-recent-posts',
							'widget_settings' => array(
								'listing' => 'simple-thumbnail-readable-meta',
								'count'   => '4',
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-subscribe-newsletter',
							'widget_settings' => array(
								'feedburner-id'            => '#test',
								'msg'                      => 'Subscribe to my newsletter',
								'image'                    => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'bf-widget-bg-color'       => '#494949',
								'bf-widget-title-bg-color' => '#2d2d2d',
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
								'page_id'   => '%%posts.primary.56%%',
								'the_id'    => 'posts.primary.57',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.109',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.108',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									12 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-map-marker',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f041',
										),
									),
								),
								'the_id'    => 'posts.primary.106',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.107',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.111%%',
								'the_id'    => 'posts.primary.113',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.56%%',
								'the_id'    => 'posts.primary.63',
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
								'page_id'   => '%%posts.primary.56%%',
								'the_id'    => 'posts.primary.69',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.305',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.304',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-map-marker',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f041',
										),
									),
								),
								'the_id'    => 'posts.primary.302',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.303',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.111%%',
								'the_id'    => 'posts.primary.306',
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
					'the_id' => 'media.primary.log-logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'newsletter.png',
					'the_id' => 'media.primary.newsletter',
				),
				array(
					'file'   => $demo_image_url . $prefix . '300x250-infeed.jpg',
					'the_id' => 'media.primary.ad-300x250-infeed',
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
					'file'   => $demo_image_url . $prefix . 'quote-avatar.jpg',
					'the_id' => 'media.primary.quote-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-widget.png',
					'the_id' => 'media.primary.logo-widget',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'header-bg.jpg',
					'the_id' => 'media.primary.header-bg',
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
			),
	);
}
