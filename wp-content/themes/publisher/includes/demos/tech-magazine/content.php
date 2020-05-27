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

	$style_id       = 'tech-magazine';
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
						'name'      => 'Business',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#1142c1',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Deals',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#b81e87',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Entertainment',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f0237a',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Facebook',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'      => 'Gadget',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#01c1c8',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Industy',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'      => 'Reviews',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f36722',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Science',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#00b898',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'Technology',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Tesla',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'      => 'Video',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f3132d',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
						),
						'the_id'    => 'taxonomy.primary.9',
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
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.165',
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
						'the_id'            => 'posts.primary.17',
					),
					array(
						'post_title'        => 'News Live: Bank of Baroda fails to sell Bhushan Steel, Essar Steel loans',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
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
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'How the experience of living abroad makes you see the world differently',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.326',
					),
					array(
						'post_title'        => 'The journey of Bitcoin in 2017: Cryptocurrency adds yet another zero',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
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
						'the_id'            => 'posts.primary.337',
					),
					array(
						'post_title'        => 'SAIL plans to bid for stressed assets of Essar, Bhushan Steel',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
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
						'the_id'            => 'posts.primary.339',
					),
					array(
						'post_title'        => 'Consolidations done, telecom looks to dial up growth in 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.341',
					),
					array(
						'post_title'        => 'Lewis Hamilton tops Abu Dhabi GP second practice',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.324',
					),
					array(
						'post_title'        => 'Australia v England – first Test scorecard',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.322',
					),
					array(
						'post_title'        => 'Does Jerry Jones Have the Juice to Unseat Roger Goodell?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.312',
					),
					array(
						'post_title'        => 'GOLF’s 2017-18 ranking of the Top 100 Courses in the World',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.308',
					),
					array(
						'post_title'        => 'How is Ohio State Even Mentioned For the Playoff Right Now?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.316',
					),
					array(
						'post_title'        => 'Which Teams Are the Best Fits for Giancarlo Stanton? Summer Use',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => 'For One Night, Scott Frost and UCF Took the Focus off Their Future',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'Russian tankers fuelled North Korea via transfers at sea: Sources',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
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
						'the_id'            => 'posts.primary.345',
					),
					array(
						'post_title'        => 'Most football players who donated their brains to science had traumatic injury',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.381',
					),
					array(
						'post_title'        => 'In marine mammals’ battle of the sexes, vaginal folds can make the difference',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.371',
					),
					array(
						'post_title'        => 'The sun’s outer atmosphere is far more complex than previously thought',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.367',
					),
					array(
						'post_title'        => 'These weather events turned extreme thanks to human-driven climate change',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.373',
					),
					array(
						'post_title'        => 'Saturn’s rings are surprisingly young and may be from shredded moons',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.375',
					),
					array(
						'post_title'        => 'Luhan Yang strives to make pig organs safe for human transplants',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.377',
					),
					array(
						'post_title'        => 'These 2017 discoveries could be big news, if they turn out to be true',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.365',
					),
					array(
						'post_title'        => 'Colliding neutron stars, gene editing, human origins and more top stories of 2017',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.363',
					),
					array(
						'post_title'        => 'Allahabad Bank ties up with National e-Governance Services Limited',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
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
						'the_id'            => 'posts.primary.347',
					),
					array(
						'post_title'        => 'Cobra unveils F8 drivers, woods and one-length irons',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.306',
					),
					array(
						'post_title'        => 'Chhattisgarh signs agreement to lay 32,000 km optical fiber network',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
						'the_id'            => 'posts.primary.349',
					),
					array(
						'post_title'        => 'DTC gets in action over reports of buses not opening gates at stops',
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
						'the_id'            => 'posts.primary.353',
					),
					array(
						'post_title'        => '2017 delivered amazing biology finds from organisms large and small',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.361',
					),
					array(
						'post_title'        => 'Worries grow that climate change will quietly steal nutrients from major food crops',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.379',
					),
					array(
						'post_title'        => 'NBA Draft Dispatch: The Five-Man Race for No. 1',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.302',
					),
					array(
						'post_title'        => 'These are the games you can play for free on Xbox Live Gold this month',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
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
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Stuff\'s Best Games Ever: The 16 best driving games of all time',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'Bonavita Connoisseur',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
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
								'meta_value' => 'Bonavita Connoisseur review',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Bonavita\'s improved coffee maker is its best one yet
         ',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Performance',
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
										'label' => 'Features',
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
										'label' => 'Maintenance',
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
						'the_id'            => 'posts.primary.239',
					),
					array(
						'post_title'        => 'Xiaomi Mi 5 Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
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
								'meta_value' => 'Electrolux EFLW317TIW',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'This basic Electrolux washing machine cleans well for less',
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
										'label' => 'Usability',
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
										'label' => 'Features',
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
										'label' => 'Performance',
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
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'The Attention Economy is the Addiction Economy: A Call for Emerging Tech for Good',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
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
						'the_id'            => 'posts.primary.267',
					),
					array(
						'post_title'        => 'Stuff\'s Best Games Ever: The 25 best Nintendo games of all time',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'Stuff\'s Best Games Ever: The 50 greatest games of all time',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
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
						'the_id'            => 'posts.primary.223',
					),
					array(
						'post_title'        => 'Extremely Cool DIY Strobing Glove Seems To Slow Down Time',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
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
						'the_id'            => 'posts.primary.209',
					),
					array(
						'post_title'        => 'Five Clever Ways To Reinvent The Zipper By Microsoft',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
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
						'the_id'            => 'posts.primary.207',
					),
					array(
						'post_title'        => 'Hackers Broke Through The IPhone X Face ID With A $150 Mask',
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
						'the_id'            => 'posts.primary.213',
					),
					array(
						'post_title'        => 'Apple in 2017: the good, the bad and the painfully inevitable',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.215',
					),
					array(
						'post_title'        => 'miPic lets you turn your Instagram snaps into cold hard cash',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
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
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'BlackBerry Profit Beats Estimates on Enterprise Software Sales, Licensing Revenue',
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
						'the_id'            => 'posts.primary.269',
					),
					array(
						'post_title'        => 'Loapi Trojan Spotted by Kaspersky, Overheats Android Phones by Mining Cryptocurrency',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
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
						'the_id'            => 'posts.primary.271',
					),
					array(
						'post_title'        => 'Apple buys the creator of a ‘seamless’ mixed reality headset',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
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
						'the_id'            => 'posts.primary.296',
					),
					array(
						'post_title'        => 'Apple’s HomePod has been in and out of development since 2012',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
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
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => 'If You Love Fruit, You’ll Love this Summer Nail Art Trend',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.298',
					),
					array(
						'post_title'        => 'GOLF’s 2017-18 Top 100 Courses in the World Speakeasy Cocktail',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.300',
					),
					array(
						'post_title'        => 'Choosing white or whole-grain bread may depend on what lives in your gut',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.383',
					),
					array(
						'post_title'        => 'YouTube TV app arrives for newer Samsung smart TVs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
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
						'the_id'            => 'posts.primary.289',
					),
					array(
						'post_title'        => 'Apple’s Heart Study app can identify irregular heart rhythms',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'the_id'            => 'posts.primary.287',
					),
					array(
						'post_title'        => 'Amazon’s warehouse workers strike in Germany and Italy',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.275',
					),
					array(
						'post_title'        => 'Google Developers, we need to talk about your desktop problem.',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
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
						'the_id'            => 'posts.primary.273',
					),
					array(
						'post_title'        => 'NASA goes back to the middle ages for its rover tire design',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
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
						'the_id'            => 'posts.primary.277',
					),
					array(
						'post_title'        => 'Image-sharing site Imgur was hacked in 2014',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
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
						'the_id'            => 'posts.primary.281',
					),
					array(
						'post_title'        => 'Twitter\'s Two-Factor Authentication No Longer Limited to SMS, Supports Third-Party Apps',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
						'the_id'            => 'posts.primary.283',
					),
					array(
						'post_title'        => '2018 NBA Mock Draft: First-Round Projections',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.304',
					),
					array(
						'post_title'        => 'When tumors fuse with blood vessels, clumps of breast cancer cells can spread',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.387',
					),
					array(
						'post_title'        => 'Facebook Steps Onto YouTube\'s Turf With Universal Deal',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
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
						'the_id'            => 'posts.primary.205',
					),
					array(
						'post_title'        => 'Google Developers, We Need To Talk About Your Desktop',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.285',
					),
					array(
						'post_title'        => 'Magic Leap Shows Off Long  Awaited Headset With Few Details',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
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
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'New Free Xbox One Games With Gold November Titles Out Now',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
						'the_id'            => 'posts.primary.351',
					),
					array(
						'post_title'        => 'It’s a New Game for Uber Drivers If New York Passes This Law',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.409',
					),
					array(
						'post_title'        => 'Snapchat’s New Ad Formats Are Design To Keep You Watching',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.399',
					),
					array(
						'post_title'        => 'Samsung Galaxy S9 Design, Single Rear Camera Tipped by New Phone',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.314',
					),
					array(
						'post_title'        => 'Approval of gene therapies for two blood cancers led to an ‘explosion of interest’ in 2017',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.385',
					),
					array(
						'post_title'        => 'KFC Has Created Less Smelly Fried Chicken Just in Time for the Holidays',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
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
						'the_id'            => 'posts.primary.291',
					),
					array(
						'post_title'        => 'Xiaomi Redmi 5A vs 10.or D: Price in India, Specifications Compared',
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
						'the_id'            => 'posts.primary.343',
					),
					array(
						'post_title'        => 'iPhone X Face ID Not Working for Family Purchases, Users Report',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
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
						'the_id'            => 'posts.primary.355',
					),
					array(
						'post_title'        => 'Tech-Investment Advice From the Star of Silicon Valley',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
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
						'the_id'            => 'posts.primary.359',
					),
					array(
						'post_title'        => 'We\'re Building Great Things and Your Talent',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=f91QitFI9uE',
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
						'the_id'            => 'posts.primary.420',
					),
					array(
						'post_title'        => 'It’s a New Game for Uber Drivers If New York Passes This Law',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
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
						'the_id'            => 'posts.primary.357',
					),
					array(
						'post_title'        => 'Apple Sanctioned in Qualcomm FTC Case Over Withheld Evidence',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.369',
					),
					array(
						'post_title'        => 'How Facebook\'s Political Unit Operates',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
								'meta_value' => 'Amazon Echo Spot',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Alexa\'s touchscreen misses the sweet spot',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '7.5',
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
										'label' => 'Features',
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
										'label' => 'Performance',
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
										'label' => 'Sound quality',
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
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Bitcoin Investors Face Reality Check',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'the_id'            => 'posts.primary.225',
					),
					array(
						'post_title'        => 'Oracle Clinches A$1.56 Billion Deal to Buy Australia\'s Aconex',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Yandex to Expand UberEats Russia With Local Acquisition',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
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
								'meta_value' => 'Motorola Moto X4',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'An awesome midrange Android phone',
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
										'label' => 'Features',
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
										'label' => 'Performance',
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
										'label' => 'Battery',
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
										'label' => 'Camera',
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
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'How to Give Spotify as a Gift for The Holidays',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
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
						'the_id'            => 'posts.primary.279',
					),
					array(
						'post_title'        => 'United Apologizes for Handing Seat to Politician',
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
						'the_id'            => 'posts.primary.331',
					),
					array(
						'post_title'        => 'Flight Attendant Sings \'I\'ll Be Home For Christmas\'',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=545sYAB564M',
							),
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Pilota Ferrari: A classroom like no other',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Ferrari’s driving schools can take you from rookie to racer -- if you have the cash. Join us as we learn how to get the most from the epic Ferrari 488 Challenge.',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => ' Performance',
										'rate'  => '7.5',
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
										'label' => 'Features',
										'rate'  => '8.5',
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
										'label' => 'Design',
										'rate'  => '8.5',
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
										'label' => 'Media & Connectivity',
										'rate'  => '6.5',
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
						'the_id'            => 'posts.primary.237',
					),
					array(
						'post_title'        => '2018 is About to be One of the Hottest Years of All Time',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
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
								'meta_value' => 'Crock-Pot Express Crock Multi-Cooker',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Crock-Pot\'s new multicooker brings the heat to Instant Pot
         ',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Performance',
										'rate'  => '7.5',
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
										'label' => 'Usability',
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
										'label' => 'Features',
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
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'Just Listen: The IRS Is Telling You How to Have a Tax-Free Retirement',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
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
						'the_id'            => 'posts.primary.310',
					),
					array(
						'post_title'        => 'Wendy\'s Amazing Social Media Team Shares The Secrets to its Success',
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
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => 'Based on This Year\'s Trends, These 30 Names Will Be Among the Most Popular of 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.411',
					),
					array(
						'post_title'        => 'Removing These 31 Things From Your Life Will Make You Happier and More Successful ',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.407',
					),
					array(
						'post_title'        => 'British Gas parent Centrica plans to scrap standard variable tariff to energy costs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.422',
					),
					array(
						'post_title'        => 'The best ARKit apps and games for iOS 11 you’ll actually want to use',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'the_id'            => 'posts.primary.217',
					),
					array(
						'post_title'        => '10 steps to protect your money from the next financial crisis',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.426',
					),
					array(
						'post_title'        => 'A Homemade Pumpkin Spice Latte That Rivals Starbucks’s',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.405',
					),
					array(
						'post_title'        => 'We Know How Many Diet Cokes Donald Trump Drinks Every Day',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.403',
					),
					array(
						'post_title'        => 'How the Tax Bill Will Affect Eight American Families',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
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
						'the_id'            => 'posts.primary.211',
					),
					array(
						'post_title'        => 'Brain chemical lost in Parkinson’s may contribute to its own demise',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
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
						'the_id'            => 'posts.primary.389',
					),
					array(
						'post_title'        => 'Meghan Markle Was Actually Written Out of Suits Before She Got Engaged to Prince Harry',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.397',
					),
					array(
						'post_title'        => '12 Beloved Amazon Prime Products That Are Guaranteed to Be a Success This Christmas',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.401',
					),
					array(
						'post_title'        => 'LA Noire Switch review A fantast fun detective-thriller',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.428',
					),
					array(
						'post_title'        => 'Deutsche Bank gets subpoena from Mueller on Trump accounts – source',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.424',
					),
					array(
						'post_title'        => 'Chinese EV start-up WM Motor says to get funding from group led by Baidu Capital',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.430',
					),
					array(
						'post_title'        => 'August Smart Lock Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
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
								'meta_value' => 'Linksys WRT32X AC3200 dual-band Wi-Fi gaming router',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Gaming with this Linksys router is Killer',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Setup',
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
										'label' => 'Features',
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
										'label' => 'Performance',
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
						'the_id'            => 'posts.primary.265',
					),
					array(
						'post_title'        => 'Huawei P8 Lite 2017 Review',
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
								'meta_value' => '2017 Chevrolet Colorado ZR2',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Taking on the seven-day, all off-road Rebelle Rally
         ',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Performance',
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
										'label' => 'Features',
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
										'label' => 'Design',
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
										'label' => 'Media & Connectivity',
										'rate'  => '8.5',
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
						'the_id'            => 'posts.primary.241',
					),
					array(
						'post_title'        => 'Galaxy S8 and S8+ Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
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
								'meta_value' => 'Apple iPhone 8 Plus',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'iPhone X power in a friendly, familiar package',
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
										'label' => 'Features',
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
										'label' => 'Design Performance',
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
										'label' => 'Design Camera',
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
										'label' => 'Battery',
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
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Google Home Mini Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
								'meta_value' => '2018 Porsche 911 Carrera GTS',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Porsche\'s Carrera GTS is the ideal 911 for street and track',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Performance',
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
										'label' => 'Features',
										'rate'  => '8.5',
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
										'label' => 'Design',
										'rate'  => '9.5',
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
										'label' => 'Media & Connectivity',
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
						'the_id'            => 'posts.primary.246',
					),
					array(
						'post_title'        => 'Microsoft Xbox One S Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
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
								'meta_value' => 'Vizio M-Series (2017)',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'The sweetest spot between image quality and affordability',
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
										'label' => 'Features',
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
										'label' => ' Performance',
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
										'label' => 'Design Value',
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
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Euro zone businesses sprinting to year-end after busy November',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
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
						'the_id'            => 'posts.primary.432',
					),
					array(
						'post_title'        => 'Apple AirPods Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
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
								'meta_value' => 'Sony WF-1000X',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Sony\'s AirPods competitor offer better sound -- with lots of \'buts\'',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
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
										'label' => 'Features',
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
										'label' => 'Sound',
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
										'label' => 'Value',
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
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => '2018 Audi A4 Concept Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
								'meta_value' => 'Apple iPhone X review',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'The best iPhone challenges you to think different',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
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
										'label' => 'Features',
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
										'label' => 'Performance',
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
										'label' => 'Design Camera',
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
										'label' => 'Battery',
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
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'Razer Blade Stealth Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
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
								'meta_value' => 'Ultimate Ears Blast',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'A compact wireless speaker that gives you Alexa on the go',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
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
										'label' => 'Features',
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
										'label' => 'Sound',
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
										'label' => 'Value',
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
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => 'Apple iPhone X Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
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
								'meta_value' => 'Asus AC2900 dual-band Wi-Fi router (RT-AC86U',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'Asus has built a fast router with something for everyone',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Setup',
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
										'label' => 'Features',
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
										'label' => 'Performance',
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
						'the_id'            => 'posts.primary.244',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner After X Paragraph - 300 x 250',
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
						'the_id'     => 'posts.primary.144',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner inline Header',
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
						'the_id'     => 'posts.primary.20',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sideba Index - 300 x 600',
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
						'the_id'     => 'posts.primary.76',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner After X Posts',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-650x80}:\'full\'%%',
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
						'the_id'     => 'posts.primary.78',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Single Sidebar Banner - 300 x 250',
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
						'the_id'     => 'posts.primary.140',
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
						'option_value' => '%%posts.primary.17%%',
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
							'header_aside_logo_banner' => '%%posts.primary.20%%',
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
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.140%%',
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
								'title'                 => 'Popular Now',
								'order_by'              => 'popular',
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
							'widget_id'       => 'bs-subscribe-newsletter',
							'widget_settings' => array(
								'title'                    => 'Tech Daily',
								'feedburner-id'            => '53425324',
								'msg'                      => 'Sign up for our Tech Daily newsletter to get the top tech and business news stories delivered to your inbox.',
								'image'                    => '%%bf_product_demo_media_url:\'\':\'full\'%%',
								'show-powered'             => '0',
								'bf-widget-bg-color'       => '#f4f4f4',
								'bf-widget-title-bg-color' => '#000000',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'bf-widget-title-style'    => 't2-s1',
							),
						),
					),
					'secondary-sidebar' => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-2',
							'widget_settings' => array(
								'title'                 => 'Popular Now',
								'count'                 => '7',
								'columns'               => '1',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '50',
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
								'paginate'              => 'none',
							),
						),
					),
					'footer-1'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'title'                => '',
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         • Email: info@yoursite.com
         • Phone: 844-698-6394',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_vimeo'           => '#',
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
								'title'                    => 'Must Read',
								'count'                    => '3',
								'columns'                  => 1,
								'listing-settings'         => array(
									'title-limit'       => '94',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'meta'              => array(
										'show'        => '0',
										'author'      => '0',
										'date'        => '0',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '1',
									),
								),
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#ffffff',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'next_prev',
								'pagination-show-label'    => '0',
							),
						),
					),
					'footer-3'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                    => 'Links',
								'nav_menu'                 => 10,
								'bf-widget-title-bg-color' => '#ffffff',
								'bf-widget-title-icon'     => array(
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
								'page_id'   => '%%posts.primary.17%%',
								'the_id'    => 'posts.primary.168',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									10 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'grid-posts',
									),
								),
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									10 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'grid-posts',
									),
								),
								'the_id'    => 'posts.primary.7',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.8',
							),
							array(
								'item_type' => 'custom',
								'target'    => '',
								'title'     => 'more',
								'url'       => '#',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => 'fa-ellipsis-h',
											'type'      => 'fontawesome',
											'height'    => '',
											'width'     => '',
											'font_code' => '\\f141',
										),
									),
									array(
										'meta_key'   => 'hide_menu_title',
										'meta_value' => '1',
									),
								),
								'the_id'    => 'posts.primary.162',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.165%%',
								'parent-id' => '%%posts.primary.162%%',
								'the_id'    => 'posts.primary.169',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.145',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.165%%',
								'the_id'    => 'posts.primary.167',
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
					'file'   => $demo_image_url . $prefix . 'logo-main.png',
					'the_id' => 'media.primary.logo-main',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-footer.png',
					'the_id' => 'media.primary.logo-footer',
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
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-2.jpg',
					'the_id' => 'media.primary.ad-300x250-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-650x80.jpg',
					'the_id' => 'media.primary.ad-650x80',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x600.jpg',
					'the_id' => 'media.primary.ad-300x600',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
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
