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

	$style_id       = 'readmag';
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
						'name'     => 'Android Apps',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Apple',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Creativity',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'Deals',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'Download',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'      => 'Gadgets',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'page_listing',
								'meta_value' => 'mix-4-1',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'disable',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Games',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
							array(
								'meta_key'   => 'page_listing',
								'meta_value' => 'grid-1-3',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'News',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
							array(
								'meta_key'   => 'better_slider_gradient',
								'meta_value' => 'simple-gr',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'     => 'Programming',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Reviews',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.5',
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
						'the_id'            => 'posts.primary.16',
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
						'the_id'            => 'posts.primary.274',
					),
					array(
						'post_title'        => 'PUBG Champs Crowned At First Stadium Event This Weekend',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.76',
					),
					array(
						'post_title'        => 'Hackers Broke Through The IPhone X Face ID With A $150 Mask',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.82',
					),
					array(
						'post_title'        => 'This \'Smart\' Water Cooler Should Absolutely Not Exist',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.80',
					),
					array(
						'post_title'        => 'New PC Sale Discounts 1000-Plus Games Ahead Of Black Friday',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.74',
					),
					array(
						'post_title'        => 'The New Animal Crossing Game Is Out Now, Earlier Than Expected',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.72',
					),
					array(
						'post_title'        => 'Street Fighter 5 Adds Holiday And Nostalgia DLC Costumes Next Week',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.66',
					),
					array(
						'post_title'        => 'Check Out Destiny 2: Curse Of Osiris DLC\'s New Mercury Area',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.68',
					),
					array(
						'post_title'        => 'Destiny 2\'s Version Of Mercury Is Underwhelming So Far',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.70',
					),
					array(
						'post_title'        => 'The Quest For The Best Electric Toothbrush',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.84',
					),
					array(
						'post_title'        => 'Extremely Cool DIY Strobing Glove Seems To Slow Down Time',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=T-ciuqbVG1I',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
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
						'the_id'            => 'posts.primary.88',
					),
					array(
						'post_title'        => 'Five Clever Ways To Reinvent The Zipper by Microsoft',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
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
						'the_id'            => 'posts.primary.96',
					),
					array(
						'post_title'        => 'Microsoft Surface Book 2 Is The Poster Child For Windows 10',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
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
						'the_id'            => 'posts.primary.98',
					),
					array(
						'post_title'        => 'Steam tweaks community reviews to fight spam',
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
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.101',
					),
					array(
						'post_title'        => 'The 7 Best Smart Speakers For Home Or Away',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.94',
					),
					array(
						'post_title'        => 'The iPhone Users Find They Can\'t Type The Letter \'I\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'the_id'            => 'posts.primary.92',
					),
					array(
						'post_title'        => 'Star Wars Battlefront 2\'s Loot Box Controversy Explained',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.64',
					),
					array(
						'post_title'        => 'The Very Best Wireless Headphones You Can Buy',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.90',
					),
					array(
						'post_title'        => 'IBM\'s New Quantum Computer Is The Most Powerful Yet',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.86',
					),
					array(
						'post_title'        => 'PS4 Black Friday 2017 Deal Gets You PS Plus Membership For Cheap Right Now',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.58',
					),
					array(
						'post_title'        => 'Black Friday and Cyber Monday smartphone deals',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.32',
					),
					array(
						'post_title'        => 'Wileyfox Pro quietly unveiled with Windows Phone',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.34',
					),
					array(
						'post_title'        => 'Apple gets in the holiday spirit with latest promo video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.38',
					),
					array(
						'post_title'        => 'Gionee M7 to get new color variants at November 26 event',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.30',
					),
					array(
						'post_title'        => 'OnePlus 5 to bring Face Unlock with Oreo update',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.28',
					),
					array(
						'post_title'        => 'Oppo F5 Youth goes official with 16MP selfie camera',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.22',
					),
					array(
						'post_title'        => 'Google Home Mini deal will last through end of the year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.24',
					),
					array(
						'post_title'        => 'Apple iPhone X now on sale in 14 new countries',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.26',
					),
					array(
						'post_title'        => 'Razer Phone arrives in Asia, Singapore gets it first',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.40',
					),
					array(
						'post_title'        => 'iPhone X is now only 1-2 weeks behind delivery in the US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.42',
					),
					array(
						'post_title'        => 'EA\'s Black Friday 2017 Deals: All The PC Games On Sale At Origin',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
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
						'the_id'            => 'posts.primary.54',
					),
					array(
						'post_title'        => 'Game Deals: All The PS4, Nintendo Switch, Xbox One, 3DS, And PC',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.56',
					),
					array(
						'post_title'        => 'Master & Dynamic’s concrete speaker is equal parts sound',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.103',
					),
					array(
						'post_title'        => 'OnePlus 5T breaks launch day sales record in 6 hours',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.52',
					),
					array(
						'post_title'        => 'Samsung\'s next VR headset will have inside-out tracking',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.48',
					),
					array(
						'post_title'        => 'New leaked image shows the Honor V10 for real',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.44',
					),
					array(
						'post_title'        => 'The iPhone SE sequel tipped to launch in Q1 next year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.46',
					),
					array(
						'post_title'        => 'Assassin\'s Creed Origins Guides, Walkthroughs, And Tips',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.62',
					),
					array(
						'post_title'        => 'GenZe has a commuter e-bike for a connected world',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.107',
					),
					array(
						'post_title'        => 'Amazon\'s warehouse workers strike in Germany and Italy',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.153',
					),
					array(
						'post_title'        => 'Google Developers, we need to talk about your desktop problem.',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_title'        => 'The best smartwatches and fitness trackers to give as gifts',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'The best smartwatches and fitness trackers to give as gifts',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '4',
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
										'label' => 'Strange',
										'rate'  => '10',
										'icon'  => array(
											'icon'      => 'fa-beer',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0fc',
										),
										'color' => '',
									),
									array(
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.157',
					),
					array(
						'post_title'        => 'NASA goes back to the middle ages for its rover tire design',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.151',
					),
					array(
						'post_title'        => 'Five state attorneys general are investigating Uber breach',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.149',
					),
					array(
						'post_title'        => 'How Design-Driven Innovation Will Surpass Technology in 2018',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=sOSAWXBgykg',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						'the_id'            => 'posts.primary.105',
					),
					array(
						'post_title'        => 'Image-sharing site Imgur was hacked in 2014',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.147',
					),
					array(
						'post_title'        => 'Which Is Scarier? Riding In A Driverless Taxi Or Investing In General Motors?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'The Morning After: Friday, November 24th 2017',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
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
										'label' => 'Strange',
										'rate'  => '4',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.159',
					),
					array(
						'post_title'        => 'The Attention Economy is the Addiction Economy: A Call for Emerging Tech for Good',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'The FTC is looking into Uber\'s latest data breach',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
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
										'label' => 'strange',
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
										'label' => 'color',
										'rate'  => '4',
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
						'the_id'            => 'posts.primary.161',
					),
					array(
						'post_title'        => 'Samsung may follow Apple’s lead and ditch the headphone jack removed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt-2.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.50',
					),
					array(
						'post_title'        => 'Apple\'s Heart Study app can identify irregular heart rhythms',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt-2.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.141',
					),
					array(
						'post_title'        => 'Amazon Cloud Cam review: A Nest Cam rival with Alexa smarts',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Amazon Cloud Cam review: A Nest Cam rival with Alexa smarts',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
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
										'label' => 'Power',
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
										'label' => 'Physical',
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
										'label' => 'OS',
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
						'the_id'            => 'posts.primary.109',
					),
					array(
						'post_title'        => 'Here’s Your First Look at the Star Wars AR Experience in Nissan Showrooms',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'iPhone X review: Embrace the new normal',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Physical',
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
										'label' => 'Power',
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
						),
						'the_id'            => 'posts.primary.111',
					),
					array(
						'post_title'        => 'How Far Cry 5 Handles Cults And Small-Town America',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.60',
					),
					array(
						'post_title'        => 'How I hacked Google’s bug tracking system itself for $15,600 in bounties',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
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
						'the_id'            => 'posts.primary.36',
					),
					array(
						'post_title'        => 'Snapchat\'s new ad formats are designed to keep you watching',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
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
						'the_id'            => 'posts.primary.143',
					),
					array(
						'post_title'        => 'Best Buy will have Nintendo\'s SNES Classic in stores Saturday',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.145',
					),
					array(
						'post_title'        => 'Mimoco Hello Kitty MIMOBOT Apple',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.139',
					),
					array(
						'post_title'        => 'Apple research gives a peek at its self-driving car plans',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.123',
					),
					array(
						'post_title'        => 'Amazon vs. Roku: Which $70 4K streaming device is best?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Amazon vs. Roku: Which $70 4K streaming device is best?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Power',
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
										'label' => 'Battry',
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
										'label' => 'System',
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
						'the_id'            => 'posts.primary.119',
					),
					array(
						'post_title'        => 'LG V30 review: LG’s latest flagship needs more polish',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.117',
					),
					array(
						'post_title'        => 'Xbox One X review: A console that keeps up with gaming PCs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.113',
					),
					array(
						'post_title'        => 'Amazon Echo Plus review: Alexa, is this all you\'ve got?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Which game controllers are worth buying?',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Strange',
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
										'label' => 'Color',
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
						),
						'the_id'            => 'posts.primary.115',
					),
					array(
						'post_title'        => 'Apple buys the creator of a \'seamless\' mixed reality headset',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.125',
					),
					array(
						'post_title'        => 'New Free Xbox One Games With Gold November Titles Out Now',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=66I8xyPFbaY',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'New Free Xbox One Games With Gold November Titles Out Now',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Let\'s get right down to it: if Apple had launched the iPhone 7 in place of the iPhone 6S last year, it would probably have been the phone of the year.',
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
									array(
										'label' => 'Power',
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
										'label' => 'Physical',
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
										'label' => 'Battry',
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
						'the_id'            => 'posts.primary.121',
					),
					array(
						'post_title'        => 'Apple PowerBook G4 15-inch Titanium',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.135',
					),
					array(
						'post_title'        => 'Apple\'s HomePod has been in and out of development since 2012',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.127',
					),
					array(
						'post_title'        => 'Apple In-Ear Headphones with Remote and Mic',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.133',
					),
					array(
						'post_title'        => 'YouTube TV app arrives for newer Samsung smart TVs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.137',
					),
					array(
						'post_title'        => 'Apple Music’s Major Lazer documentary is streaming now',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.131',
					),
					array(
						'post_title'        => 'Apple\'s iMac Pro may have hands-free Siri voice control',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=CLZfufITOs4',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Mashable',
							),
							array(
								'meta_key'   => '_bs_via_name',
								'meta_value' => 'Apple',
							),
							array(
								'meta_key'   => '_bs_via_name_2',
								'meta_value' => 'Endgadget',
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
						'the_id'            => 'posts.primary.129',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300 x 250 - Sidebar',
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
						'the_id'     => 'posts.primary.265',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '970 x 250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-970x250-index}:\'full\'%%',
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
						'the_id'     => 'posts.primary.319',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '728 x 90',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-728x90-index}:\'full\'%%',
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
						'the_id'     => 'posts.primary.167',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => '300x250 - inPost',
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
						'the_id'     => 'posts.primary.325',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'newsletter',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'mailchimp',
							),
							array(
								'meta_key'   => 'mailchimp_code',
								'meta_value' => '<form action="//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b" method="post"',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-5',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#e80028',
							),
						),
						'the_id'     => 'posts.primary.163',
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
						'option_value' => '%%posts.primary.16%%',
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
							'ad_post_inline' => array(
								array(
									'type'      => 'banner',
									'campaign'  => 'none',
									'banner'    => '325',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'left',
									'paragraph' => '11',
								),
							),
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
							'widget_id'       => 'bs-thumbnail-listing-2',
							'widget_settings' => array(
								'title'                 => 'popular posts',
								'order_by'              => 'popular',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'after-title',
									'format-icon'       => '1',
									'term-badge'        => '0',
									'term-badge-count'  => '1',
									'term-badge-tax'    => 'category',
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
								'columns'               => '2',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.265%%',
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
							'widget_id'       => 'bs-mix-listing-3-4',
							'widget_settings' => array(
								'title'                 => 'LASTEST REVIEWS',
								'category'              => '%%taxonomy.primary.5%%',
								'count'                 => '3',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'big-title-limit'         => '82',
									'big-format-icon'         => '1',
									'big-term-badge'          => '1',
									'big-term-badge-count'    => '1',
									'big-term-badge-tax'      => 'category',
									'big-meta'                => array(
										'show'        => '1',
										'author'      => '0',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '1',
									),
									'small-title-limit'       => '70',
									'small-subtitle'          => '0',
									'small-subtitle-limit'    => '0',
									'small-subtitle-location' => 'before-meta',
									'small-meta'              => array(
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
								'columns'               => 1,
							),
						),
						array(
							'widget_id'       => 'newsletter-pack',
							'widget_settings' => array(
								'newsletter'           => '%%posts.primary.163%%',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'FEATURED STORIES',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '60',
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
								'bf-widget-title-style' => 't5-s1',
								'paginate'              => 'none',
							),
						),
					),
					'footer-2'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'LATEST VIDEOS',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '60',
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
								'bf-widget-title-style' => 't5-s1',
								'paginate'              => 'none',
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-popular-categories',
							'widget_settings' => array(
								'title'                 => 'POPULAR CATEGORIES',
								'exclude'               => array(
									'',
								),
								'bf-widget-title-icon'  => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'bf-widget-title-style' => 't5-s1',
							),
						),
					),
					'footer-4'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'better-social-counter',
							'widget_settings' => array(
								'title'                 => 'SOCIAL MEIDA',
								'style'                 => 'clean',
								'colored'               => '0',
								'columns'               => '2',
								'order'                 => array(
									'facebook'  => '1',
									'twitter'   => '1',
									'google'    => '1',
									'youtube'   => '1',
									'dribbble'  => '1',
									'vimeo'     => '1',
									'github'    => '1',
									'pinterest' => '1',
								),
								'bf-widget-title-icon'  => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'bf-widget-title-style' => 't5-s1',
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
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
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
								'the_id'    => 'posts.primary.14',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-flash',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0e7',
										),
									),
								),
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-gamepad',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f11b',
										),
									),
								),
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-mobile',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f10b',
										),
									),
								),
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
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
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-shopping-basket',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f291',
										),
									),
									16 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'WOW',
									),
									18 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#e23e3d',
									),
									23 => array(
										'meta_key'   => 'badge_font_color',
										'meta_value' => '#ffffff',
									),
								),
								'the_id'    => 'posts.primary.10',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Contact us',
								'page_id'   => '%%posts.primary.274%%',
								'the_id'    => 'posts.primary.276',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.368',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.370',
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
								'item_meta' => array(
									14 => array(
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
								'the_id'    => 'posts.primary.178',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-flash',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f0e7',
										),
									),
								),
								'the_id'    => 'posts.primary.177',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-gamepad',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f11b',
										),
									),
								),
								'the_id'    => 'posts.primary.176',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-mobile-phone',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f10b',
										),
									),
								),
								'the_id'    => 'posts.primary.175',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-shopping-basket',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f291',
										),
									),
								),
								'the_id'    => 'posts.primary.174',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
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
								'the_id'    => 'posts.primary.173',
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
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . '300x250-post.jpg',
					'the_id' => 'media.primary.ad-300x250-post',
				),
				array(
					'file'   => $demo_image_url . $prefix . '970x250-index.jpg',
					'the_id' => 'media.primary.ad-970x250-index',
				),
				array(
					'file'   => $demo_image_url . $prefix . '336x280-sidebar.jpg',
					'the_id' => 'media.primary.ad-336x280-sidebar',
				),
				array(
					'file'   => $demo_image_url . $prefix . '728x90-index.jpg',
					'the_id' => 'media.primary.ad-728x90-index',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.jpg',
					'the_id' => 'media.primary.quote-avatar',
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
