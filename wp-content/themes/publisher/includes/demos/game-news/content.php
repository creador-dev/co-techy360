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

	$style_id       = 'game-news';
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
						'name'     => 'Cory Barlog',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'God of War',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'News',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'      => 'Nintendo',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#e40b20',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'PC',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#5e22e5',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'PS3',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#009ef8',
							),
						),
						'the_id'    => 'taxonomy.primary.17',
					),
					array(
						'name'      => 'PS4',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#003791',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'PS4',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'      => 'Reviews',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f41a5d',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'      => 'Smart Phone',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#a20035',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Sony Entertainment',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'      => 'WII U',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#00b1c6',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-22',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Xbox 360',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#60ba00',
							),
						),
						'the_id'    => 'taxonomy.primary.18',
					),
					array(
						'name'      => 'Xbox One',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#129e11',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
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
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.96',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact us',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.97',
					),
					array(
						'post_title'        => 'More Free 3DS And Wii U Games Added To My Nintendo Rewards Program',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.277',
					),
					array(
						'post_title'        => 'New Zelda: Breath Of The Wild Update Out Now, Here\'s What It Does',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.278',
					),
					array(
						'post_title'        => 'Nintendo Switch Maintenance Taking Place This Week, Here\'s When',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.276',
					),
					array(
						'post_title'        => 'New My Nintendo Rewards Include Discounts On Some Great Mario Games',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.272',
					),
					array(
						'post_title'        => 'Last Day To Buy Wii Shop Channel Games Before It Shuts Down',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.279',
					),
					array(
						'post_title'        => 'Future Zelda Games Will Also Offer "Freedom" Like Breath Of The Wild',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.273',
					),
					array(
						'post_title'        => 'Hyrule\'s Funniest Home Videos -- Best Of Zelda: Breath Of The Wild',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.269',
					),
					array(
						'post_title'        => 'Nintendo\'s First Smartphone Game, Miitomo, Is Proving Popular',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Google Going Head-to-Head Against Apple/iPhone With Its Own Smartphone',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.239',
					),
					array(
						'post_title'        => 'Nintendo\'s First Smartphone Game, Miitomo, Has Arrived Worldwide',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'Nintendo\'s Next Smartphone Game Will Star Well-Known Character',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Big New Zelda: Breath Of The Wild Update Out Now, Here\'s What It Does',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.271',
					),
					array(
						'post_title'        => 'What "Dark Nintendo" Means, According To Splatoon\'s Producer',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.280',
					),
					array(
						'post_title'        => 'Why Overwatch\'s Retribution Mode Is Only Available For A Limited Time',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.314',
					),
					array(
						'post_title'        => 'Spyro\'s Remastered Graphics Showcased In Reignited Trilogy Images',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.311',
					),
					array(
						'post_title'        => 'We Absolutely Wrecked Far Cry 5\'s Graphics And Created A Trippy Mess',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.312',
					),
					array(
						'post_title'        => 'Splinter Cell\'s Sam Fisher Teased For New Ghost Recon Wildlands Update',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.310',
					),
					array(
						'post_title'        => 'God Of War Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_box_style',
								'meta_value' => 'big-3',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'God Of War',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Kratos makes an epic comeback as The Nine Realms\' greatest dad.',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Game Play',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Graphics',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Story',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Characters',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Action',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
							array(
								'meta_key'   => '_pros',
								'meta_value' => array(
									array(
										'label' => 'Impeccable presentation',
									),
									array(
										'label' => 'An incredible spectacle of combat and action',
									),
									array(
										'label' => 'So much to see, investigate and do',
									),
								),
							),
							array(
								'meta_key'   => '_cons',
								'meta_value' => array(
									array(
										'label' => 'N/A',
									),
								),
							),
						),
						'the_id'            => 'posts.primary.347',
					),
					array(
						'post_title'        => 'Sea Of Thieves Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.361',
					),
					array(
						'post_title'        => 'Call Of Duty: WW2s Divisions Being Overhauled-Heres What\'s Changing',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.313',
					),
					array(
						'post_title'        => 'PUBG, Fortnite Have New Battle Royale Competition - GameSpot Daily',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.315',
					),
					array(
						'post_title'        => 'PS4 Vs Xbox One - Which Console Has The Best Exclusive Games?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => 'Blizzard CEO Wants Warcraft 4, Says Smartphone Game Market\'s Potential',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.241',
					),
					array(
						'post_title'        => 'New Xbox One Games Sale Includes Discounts On Many Add-Ons',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.319',
					),
					array(
						'post_title'        => 'Fortnite Challenges For Week 4: All Ice Cream Truck Locations And More',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.317',
					),
					array(
						'post_title'        => 'Top 10 UK Games Chart: Far Cry 5, Sea Of Thieves, FIFA 18 Remain At Top',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.316',
					),
					array(
						'post_title'        => 'New My Nintendo Rewards Include More Free 3DS And Wii U Games',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.274',
					),
					array(
						'post_title'        => 'Commodore Making Comeback With Smartphone That Runs Classic Games',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => '3 5 Top New Games Out This Week On Switch, PS4, Xbox One, And PC',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.118',
					),
					array(
						'post_title'        => 'New Game Release Dates Of 2018: God of War, Super Smash Bros.',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.109',
					),
					array(
						'post_title'        => 'Wolfenstein 2 On Nintendo Switch Requires An Internet Download',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.110',
					),
					array(
						'post_title'        => 'Game Release Dates In April 2018 For Nintendo Switch, PS4, Xbox One',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.111',
					),
					array(
						'post_title'        => 'Top 10 UK Games Chart: God Of War PS4 Claims No.1 And Breaks Series Record',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.112',
					),
					array(
						'post_title'        => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.113',
					),
					array(
						'post_title'        => 'Nintendo Switch Adding South Park And 15 More Games This Coming Week',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.114',
					),
					array(
						'post_title'        => 'Switch Weekly Roundup: Sneak Peek at Dark Souls Remastered Footage',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.119',
					),
					array(
						'post_title'        => 'Nintendo Switch\'s Labo Is Already Letting People Do Some Cool Stuff',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.107',
					),
					array(
						'post_title'        => 'Donkey Kong Plays Nintendo Switch When You Go Idle In Tropical Freeze',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.117',
					),
					array(
						'post_title'        => 'Super Meat Boy Forever Brings Big Changes, But It\'s Still Hard As Hell',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.116',
					),
					array(
						'post_title'        => 'GameStop: Get More Cash For Trade-Ins For A Limited Time In The US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.115',
					),
					array(
						'post_title'        => 'Overwatch PTR Patch Notes Reveal New Update\'s Big Hero Changes',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.149',
					),
					array(
						'post_title'        => 'Fortnite Week 10 Challenges Leaked: Skydive Through Floating Rings',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'Fortnite Players Get Free Pickaxe And Skin Available With Amazon',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'Free Monster Hunter-Like RPG Dauntless Gets Open Beta Next Month',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.199',
					),
					array(
						'post_title'        => 'GTA 5: What\'s New For GTA Online On PS4, Xbox One, And PC This Week',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => 'Which Baseball Video Game Is Right For You? Here\'s All The Key Info',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_title'        => 'Surviving Mars Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.356',
					),
					array(
						'post_title'        => 'Steam PC Game Sale: Save On Darkest Dungeon, Dying Light, And More',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.201',
					),
					array(
						'post_title'        => 'Fortnite v3.5.2 Update Introduces 50v50 Mode; Read Patch Notes Here',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'New Fortnite Freebies Available Now To Make Up For Recent Server',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_title'        => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'God Of War PS4 Director Reacts To High Scores In Emotional Video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'Call of Duty: WW2 Adds Free Coaching And Feedback Through Alexa',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'God Of War PS4 Almost Didn\'t Have One Of Its Best, Most Important Characters',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'Smartphone Game Final Fantasy Agito Hitting Vita In Japan Next Year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => 'H1Z1 Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.353',
					),
					array(
						'post_title'        => 'Attack on Titan 2 Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.355',
					),
					array(
						'post_title'        => 'The Witcher 3\'s Geralt Gets A New Figure, And It Comes With His Bathtub',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.151',
					),
					array(
						'post_title'        => 'Nintendo\'s First Smartphone Game, Miitomo, Reaches 10 Million Users',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.237',
					),
					array(
						'post_title'        => 'Google Announces $80 VR Headset, New Smartphone, Better Wifi System',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'We’re Giving Away A Limited Edition God Of War PS4 Pro For Free',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'IGN',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.ign.com',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.159',
					),
					array(
						'post_title'        => 'Here Is When God Of War PS4 Pre-Loading Begins; Unlock Time Confirmed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.153',
					),
					array(
						'post_title'        => 'Far Cry 5 Last Of Us-Inspired Map Headlines Arcades Best Of The Week',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'Big Call Of Duty: WW2 Update Is Out Now On PS4, Xbox One, And PC',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.308',
					),
					array(
						'post_title'        => 'Last Chance To Get October\'s Free PS Plus Games For PS4, PS3, And Vita',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.499',
					),
					array(
						'post_title'        => 'Top 10 Australia/New Zealand Charts Reveal The Week\'s Best Sellers',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.275',
					),
					array(
						'post_title'        => 'Some GTA 4 Songs Being Removed, But New Ones Will Take Their Place',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_title'        => 'God Of War PS4 Guide: How Armor, Skills, And Enchantments Work',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.171',
					),
					array(
						'post_title'        => 'A Tomb Raider Barbie Doll Arrives Next March With The New Movie',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.504',
					),
					array(
						'post_title'        => 'Nintendo\'s First Smartphone Game Launches This Week in the US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'Splinter Cell\'s Sam Fisher Comes To Ghost Recon Wildlands Update This Week',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.203',
					),
					array(
						'post_title'        => 'Ghost Recon Wildlands Update Is Out With Splinter Cell Mission And More',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'Star Wars Battlefront 2 Taught EA A Lesson It Says It Won\'t Forget',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.157',
					),
					array(
						'post_title'        => 'PES 2018 Data Pack 2 Update Revealed, Release Date Announced',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.496',
					),
					array(
						'post_title'        => 'Final Fantasy 15, Shadow Of The Tomb Raider Crossover Announced',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'This Week\'s Xbox One and Xbox 360 Deals With Gold Revealed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.461',
					),
					array(
						'post_title'        => 'Fallout 4 Gets Official Emojis, GIFs, and More for Your Smartphone',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.243',
					),
					array(
						'post_title'        => 'Why Nintendo Chose Animal Crossing and Fire Emblem for Next Smartphone',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => 'MGS 5 For $5, And More PC Games On Sale At The Humble Store In The US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.200',
					),
					array(
						'post_title'        => 'Zelda: Breath Of The Wild Update Adds Free Xenoblade Chronicles 2 DLC Armor',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.282',
					),
					array(
						'post_title'        => 'After Fortnite Update, Freebies Now Available To Make Up For Server Problems',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.197',
					),
					array(
						'post_title'        => 'PS Plus: Free PS4 Games For February 2018 Are Still Available',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.506',
					),
					array(
						'post_title'        => 'MechWarrior 5: Mercenaries Gets New Trailer, and it\'s All About Destruction',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.497',
					),
					array(
						'post_title'        => 'Free Xbox One/360 Games With Gold For February 2017 Revealed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.465',
					),
					array(
						'post_title'        => 'This Week\'s Xbox One and Xbox 360 Deals With Gold Revealed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.456',
					),
					array(
						'post_title'        => 'Splinter Cell Movie: "It\'s Going To Be Bad Ass," Producer Says',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.466',
					),
					array(
						'post_title'        => 'Last Chance To Get These Free Xbox One And Xbox 360 Games',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.468',
					),
					array(
						'post_title'        => 'This Week\'s Xbox One and Xbox 360 Deals With Gold Revealed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.467',
					),
					array(
						'post_title'        => 'Far Cry 5 Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_box_style',
								'meta_value' => 'big-5',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Far Cry 5',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'ALWAYS REWARDING, IT WILL EAT YOUR WEEKENDS AND SNACK ON THE EVENINGS',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Gameplay',
										'rate'  => '9',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Story',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Characters',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Action',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
							array(
								'meta_key'   => '_pros',
								'meta_value' => array(
									array(
										'label' => 'More focused and less cluttered gameplay',
									),
									array(
										'label' => 'Great location to explore',
									),
									array(
										'label' => 'Interesting and varied side missions',
									),
								),
							),
							array(
								'meta_key'   => '_cons',
								'meta_value' => array(
									array(
										'label' => 'Lackluster bad guys',
									),
									array(
										'label' => 'Few too many hostange missions',
									),
									array(
										'label' => 'Wolverines (so much worse than honey badgers)',
									),
								),
							),
						),
						'the_id'            => 'posts.primary.349',
					),
					array(
						'post_title'        => 'Need for Speed Payback',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'IGN',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.ign.com',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_box_style',
								'meta_value' => 'big-5',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Need for Speed Payback',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Life as a pirate starts strong ... and then you enter the doldrums',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Game Play',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Story',
										'rate'  => '7',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Characters',
										'rate'  => '6',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Action',
										'rate'  => '9',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.350',
					),
					array(
						'post_title'        => 'Extinction Review - A Giant Mess',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.358',
					),
					array(
						'post_title'        => 'MLB The Show 18',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.357',
					),
					array(
						'post_title'        => 'Fortnite: Battle Royale Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.352',
					),
					array(
						'post_title'        => 'Assassin\'s Creed Origins',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'IGN',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.ign.com',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Assassin\'s Creed Origins',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Game Play',
										'rate'  => '7',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Story',
										'rate'  => '6',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Characters',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
									array(
										'label' => 'Adrenaline',
										'rate'  => '5',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.351',
					),
					array(
						'post_title'        => 'Detective Pikachu Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.354',
					),
					array(
						'post_title'        => 'Xbox: Get Rewards for Spending Money on Free-to-Play Games',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.464',
					),
					array(
						'post_title'        => 'Limited Time PS4 Flash Sale Happening Now On PSN In The US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.502',
					),
					array(
						'post_title'        => 'Persona 5 Anime Gets English Sub Trailer, US Release Details',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.505',
					),
					array(
						'post_title'        => 'PlayStation Now Adds 12 More Games On PS4 And PC This Month',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.501',
					),
					array(
						'post_title'        => 'Last Chance For This Week\'s PS4, PS3, And PS Vita Game Deals',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.500',
					),
					array(
						'post_title'        => 'Last Chance For This Week\'s PS4, PS3, PlayStation Vita Deals',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.498',
					),
					array(
						'post_title'        => 'This Week\'s Xbox One and Xbox 360 Deals With Gold Revealed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.463',
					),
					array(
						'post_title'        => 'PS Plus Free PS4 Games For March Available For A Few More Days',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.503',
					),
					array(
						'post_title'        => 'Last Chance to Get These Free Xbox One and Xbox 360 Games',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.462',
					),
					array(
						'post_title'        => 'This Week\'s PS4 Games On Sale At PlayStation Store In The US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.494',
					),
					array(
						'post_title'        => 'This Week\'s Xbox One and Xbox 360 Deals With Gold Revealed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.459',
					),
					array(
						'post_title'        => 'Minecraft Update Brings New Mobs, Blocks, and Wings to Consoles',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.458',
					),
					array(
						'post_title'        => 'Last Chance to Get These Free Xbox One and Xbox 360 Games on 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.460',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner - 300 x 250',
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
						'the_id'     => 'posts.primary.651',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Header Banner - 728 x 90',
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
						'the_id'     => 'posts.primary.94',
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
						'option_value' => '%%posts.primary.96%%',
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
							'header_aside_logo_banner' => '%%posts.primary.94%%',
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
							'widget_id'       => 'bs-modern-grid-listing-3',
							'widget_settings' => array(
								'title'                    => 'LATEST REVIEWS',
								'category'                 => '%%taxonomy.primary.5%%',
								'count'                    => '4',
								'columns'                  => 1,
								'pagination-slides-count'  => '5',
								'slider-control-dots'      => 'style-1',
								'slider-control-next-prev' => 'off',
								'listing-settings'         => array(
									'title-limit'      => '50',
									'format-icon'      => '1',
									'term-badge'       => '0',
									'term-badge-count' => '1',
									'term-badge-tax'   => 'category',
									'meta'             => array(
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
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#d50b36',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'none',
								'pagination-show-label'    => '0',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.651%%',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular Right Now',
								'count'                 => '9',
								'order_by'              => 'popular',
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
										'date'        => '0',
										'date-format' => 'standard',
										'view'        => '1',
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
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-widget}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
								'link_youtube'         => '#',
								'link_pinterest'       => '#',
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
								'title'     => 'News',
								'page_id'   => '%%posts.primary.96%%',
								'the_id'    => 'posts.primary.362',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.14',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.8',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.12',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Latest Post',
								'page_id'   => '%%posts.primary.96%%',
								'the_id'    => 'posts.primary.363',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.97%%',
								'the_id'    => 'posts.primary.364',
							),
						),
					),
					array(
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.100',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.81',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.103',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.80',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.79',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.102',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.101',
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
					'file'   => $demo_image_url . $prefix . 'logo-widget.png',
					'the_id' => 'media.primary.logo-widget',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-off-canvas',
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
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
				),
			),
	);
}
