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

	$style_id       = 'funny-mag';
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
						'the_id'   => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Celebrity',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#e50ba5',
							),
							array(
								'meta_key'   => 'override_in_posts',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Entertainment',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#00d523',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Food',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#e03f1f',
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
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'      => 'Lifestyle',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#6c00ff',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-9',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'People',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'      => 'Sports',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f9d000',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Successful',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Think',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
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
						'post_title'        => 'Contact us',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.99',
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
						'the_id'            => 'posts.primary.97',
					),
					array(
						'post_title'        => 'Fostering Leadership Skills Through the Academy Student Liaison Program',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.280',
					),
					array(
						'post_title'        => 'I can’t believe all the features mashed into this micro-apartment',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.317',
					),
					array(
						'post_title'        => 'Lamb, Feta and Black Bean Burgers with Greek Yogurt Tzatziki Sauce',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.276',
					),
					array(
						'post_title'        => '3 Things We Learned from the New Ruth Bader Ginsburg Documentary',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.246',
					),
					array(
						'post_title'        => 'China’s dissident artist Ai Weiwei highlights plight of refugees',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.237',
					),
					array(
						'post_title'        => 'Cannes Review: Jean-Luc Godard\'s The Image Book Confounds and Dazzles',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.241',
					),
					array(
						'post_title'        => 'Westworld Has Delivered a Beautiful New Dance Meme-in-the-Making',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => 'Video:Croatia Beat Spain, 2-1, but the Notable Score Came From the Orchestra',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => 'Creamy Oats and Lentils with Sweetly Spiced Apples: A Healthy Breakfast',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.290',
					),
					array(
						'post_title'        => 'Margot Kidder, Known For Lois Lane in Superman Movies, Dies at 69',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'Remembering Former Men’s FASHION Editor-In-Chief David Livingstone',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'Rihanna stalker case: Man charged with breaking into singer’s home',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.351',
					),
					array(
						'post_title'        => 'Mike Emrick, a Hockey Wordsmith, Prepares for a Transition to the Diamond',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.326',
					),
					array(
						'post_title'        => 'Apple’s trying to fix two key issues with wired and wireless headphones',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.322',
					),
					array(
						'post_title'        => 'Michael Gbinije, a Piston Recruit, May Play for Nigeria there Olympics',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.325',
					),
					array(
						'post_title'        => 'Charlie Puth Finds a Mature New Sound on Sophomore Album Voicenotes',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'This woman built a multimillion-dollar company in her own backyard',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Untreatable, Antibiotic-Resistant Gonorrhea Is On The Rise, Warns WHO',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.147',
					),
					array(
						'post_title'        => 'A Guy Said Menstrual Cramps Are A ‘Myth,’ And Twitter Is NOT Having It',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.148',
					),
					array(
						'post_title'        => 'Move Over, IPhone 7! Everything You Need To Know About The IPhone 8',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.145',
					),
					array(
						'post_title'        => 'I Test Drove The First-Ever Video-Dating App And This Is What Happened',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.144',
					),
					array(
						'post_title'        => 'The Butt Workout That Prevented Me From Walking Down The Stairs For 3 Days',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.140',
					),
					array(
						'post_title'        => 'What Happens When You Train To Avoid Injury, Then Get Injured Again?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.143',
					),
					array(
						'post_title'        => 'Legendary Couturier And Audrey Hepburn Collaborator Hubert De Givenchy',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.181',
					),
					array(
						'post_title'        => 'David: Social Media Tributes To The Former Men’s FASHION Editor',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.183',
					),
					array(
						'post_title'        => 'Gigi Hadid’s Second Collab With Stuart Weitzman Stars In Tory Burch',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'Sports Business: As the Olympics Near, Brazil and Rio Let the Bad Times Roll',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.319',
					),
					array(
						'post_title'        => 'Gigi And Bella Cousin Lands Modelling Contract To Launch Swimsuit Line',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Lagerfeld Sketches Weinstein As Pig, Campbell Writes Open Letter',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Hillary Clinton Is Back And Wore A Black Leather Jacket To Prove It',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.184',
					),
					array(
						'post_title'        => 'Givenchy Unveils Its Debut Children’s Collection And It Kid Written All Over It',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.187',
					),
					array(
						'post_title'        => '6 Tips on Securing Preceptors for Distance Dietetic Internships',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Ben Simmons Looks to LeBron James as Model as N.B.A. Draft Looms',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'Why Are People So About The New Holi-Inspired Pharrell X Adidas Collab?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=f-9ijiN31LI',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.120',
					),
					array(
						'post_title'        => 'Taking Risks in Your Dietetics Career Path Can Open New Doors',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Grab Some Tissues, Because Zayn Malik And Gigi Hadid Are Officially Broken Up',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_title'        => 'Technology in Global Malnutrition: A Perspective from the Front Lines',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.287',
					),
					array(
						'post_title'        => 'At Euro 2016 Final, Portugal Loses Ronaldo but Defeats France',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.311',
					),
					array(
						'post_title'        => 'NBC Picks Up Brooklyn Nine-Nine After Fox Cancels Fan-Favorite Show',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.243',
					),
					array(
						'post_title'        => 'How Hurricane Maria Helped Me Use Devastation as Motivation',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=f-9ijiN31LI',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.289',
					),
					array(
						'post_title'        => 'Radical Make Up Artist Behind Tom Ford\'s Show',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.179',
					),
					array(
						'post_title'        => 'Ryan Reynolds adorably gushes that being Mr. Lively is the best gig',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.352',
					),
					array(
						'post_title'        => 'Peace Out, Thanksgiving Food Baby!',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.151',
					),
					array(
						'post_title'        => 'Instagram’s New Campaign Encourages Users To Talk About Mental Health',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.142',
					),
					array(
						'post_title'        => 'Star Wars Fans Camped Out With the Millennium Falcon for the Solo Premiere',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.244',
					),
					array(
						'post_title'        => 'How to Pick Perfect Toppings: What to Choose and Why They Matter',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.285',
					),
					array(
						'post_title'        => 'New York’s antiquated steering wheel law poses roadblock to driverless cars',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.321',
					),
					array(
						'post_title'        => '1Celeb Trainer Taryn Toomey Teaches The Class In Vancouver To Launch Collab',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.146',
					),
					array(
						'post_title'        => 'The Non-Traditional Student and DICAS: What Makes You Special',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=f-9ijiN31LI',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.288',
					),
					array(
						'post_title'        => 'Hey (Insert Name of Smart Technology), How Long Do I Roast a Turkey?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.284',
					),
					array(
						'post_title'        => 'The Dietetic Internship: Self-Care Strategies to Get You to the Finish Line',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.283',
					),
					array(
						'post_title'        => 'Celebrate Valentine’s Day With Black Mirror’s Relationship Expiry Date App',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.149',
					),
					array(
						'post_title'        => 'Michigan State Quarterback Connor Cook Carves a Legacy With Plunk',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.313',
					),
					array(
						'post_title'        => 'VS Fashion Show Performers, Gucci Garden, Trying On Glasses With IPhone X',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.185',
					),
					array(
						'post_title'        => 'What 2 Professors Learned After Devoting A Year To Self-Improvement',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.150',
					),
					array(
						'post_title'        => 'Here\'s Your First Look at Tig Notaro\'s New Netflix Special Happy to Be Here',
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
								'meta_value' => 'https://www.youtube.com/watch?v=f-9ijiN31LI',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Eonline',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.eonline.com',
							),
						),
						'the_id'            => 'posts.primary.245',
					),
					array(
						'post_title'        => 'Winter Salad with Yellow Beet, Blood Orange, Fennel and Chèvre',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.282',
					),
					array(
						'post_title'        => 'Jamie Vardy, Rejecting Arsenal’s Advances, Agrees to Stay at Leicester City',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.323',
					),
					array(
						'post_title'        => 'After This Past Year’s Activism, Are Spring’s Feminine Designs?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Washington DC team to enter Major League Rugby \'no later\' than 2020',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.393',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner X Paragraph 468x60',
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
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.79',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner 300x600',
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
						'the_id'     => 'posts.primary.77',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index Banner 728x90',
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
						'the_id'     => 'posts.primary.49',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index Banner 300*250 X Post',
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
						'the_id'     => 'posts.primary.75',
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
								'meta_value' => 'style-5',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#f8db3b',
							),
							array(
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'     => 'posts.primary.95',
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
							'header_bg_image'   => array(
								'type' => 'repeat-x',
								'img'  => '%%bf_product_demo_media_url:{media.primary.header-bg}:\'full\'%%',
							),
							'footer_bg_image'   => array(
								'type' => 'top-center',
								'img'  => '%%bf_product_demo_media_url:{media.primary.footer-bg}:\'full\'%%',
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
						'option_value' => '%%posts.primary.97%%',
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
								'title'                    => 'Trending Now',
								'count'                    => '5',
								'order_by'                 => 'popular',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '1',
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
								'bf-widget-bg-color'       => '#ebebeb',
								'bf-widget-title-color'    => '#ffffff',
								'bf-widget-title-bg-color' => '#e0002f',
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
					'footer-1'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Featured Posts',
								'count'                 => '3',
								'columns'               => 1,
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
									'meta'              => array(
										'show'        => '1',
										'author'      => '1',
										'date'        => '1',
										'date-format' => 'readable',
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
								'pagination-show-label' => '0',
							),
						),
					),
					'footer-2'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-subscribe-newsletter',
							'widget_settings' => array(
								'feedburner-id'        => '#',
								'msg'                  => 'Publisher is the useful and powerful WordPress Newspaper , Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         ',
								'image'                => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'show-powered'         => '0',
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
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'better-social-counter',
							'widget_settings' => array(
								'title'                => 'Follow Us',
								'style'                => 'style-6',
								'columns'              => '3',
								'order'                => array(
									'facebook'   => '1',
									'twitter'    => '1',
									'google'     => '1',
									'youtube'    => '1',
									'dribbble'   => '1',
									'vimeo'      => '1',
									'soundcloud' => '1',
									'instagram'  => '1',
									'rss'        => '1',
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
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.97%%',
								'the_id'    => 'posts.primary.110',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.105',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.106',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.107',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.108',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.109',
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
								'page_id'   => '%%posts.primary.97%%',
								'the_id'    => 'posts.primary.327',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.101',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.100',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.489',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.490',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.99%%',
								'the_id'    => 'posts.primary.102',
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
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-336x280.jpg',
					'the_id' => 'media.primary.ad-336x280',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x600.jpg',
					'the_id' => 'media.primary.ad-300x600',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-468x60.jpg',
					'the_id' => 'media.primary.ad-468x60',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-pattern.png',
					'the_id' => 'media.primary.ad-pattern',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'header-bg.png',
					'the_id' => 'media.primary.header-bg',
				),
			),
	);
}
