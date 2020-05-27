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

	$style_id       = 'life-mag';
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
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'     => 'Entrepreneurship',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Fitness',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Food',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#d16536',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Health',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#19a0de',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Life',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'      => 'Lifestyle',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Salary',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Success',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#2fbcad',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
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
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
							array(
								'meta_key'   => 'post_breadcrumb',
								'meta_value' => 'hide',
							),
						),
						'the_id'            => 'posts.primary.8',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.6',
					),
					array(
						'post_title'        => 'Las Vegas Victim, 27, Wakes from Coma and Takes First Steps After Being Shot in the Head',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.210',
					),
					array(
						'post_title'        => 'Hugh Hefner Had a Drug-Resistant E. Coli Infection. Here’s What You Should Know',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.214',
					),
					array(
						'post_title'        => 'Personal Trainer Needs Help for Her Life-Threatening Illegal Butt Implants: \'It\'s Just Rock-Hard\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.204',
					),
					array(
						'post_title'        => 'Danielle Brooks on Lack of Diversity in Fashion: Ashley Graham \'Isn\'t the Only Plus-Size Model\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'Harry Takes a Style Cue from Meghan—See Which One (And How You Can Get the Look on Sale!)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.184',
					),
					array(
						'post_title'        => 'Woman Slams People Who Say She\'s Too Heavy for Her Boyfriend: Love Comes in All Shapes and Sizes',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'What It’s Really Like to Be a Plus-Size Woman at the Gym—and Why Losing Weight Isn’t My Goal',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Clothing Company Criticized for Product Shots of \'Plus-Size\' Tights: \'How Is This an Actual Ad\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.200',
					),
					array(
						'post_title'        => 'Eat This Nutritionist\'s Go-To Breakfast, Lunch, and Dinner to Start 2018 Right',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'Your Seemingly Innocent Amazon Order Could Get You in Trouble With Border Control (Video)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.247',
					),
					array(
						'post_title'        => 'These Gorgeous, Giant Lily Pads Are Back 10 Years After Everyone Thought They Went Extinct',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Pilot Who Scammed Air Canada Out of $30,000 in Free Flights Forced to Pay It All Back',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'Why This Year’s Flu Season Could Be Especially Deadly — and What You Can Do About It',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => 'Americas Secret Airline Is Hiring Flight Attendants Willing to Fly to Area 51',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.244',
					),
					array(
						'post_title'        => '7 Infused Water Recipes That Will Make Your H20 Much Tastier and Even Healthier',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Servers Around the World Share the Most Annoying Things Americans Do in Restaurants',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.223',
					),
					array(
						'post_title'        => 'Here Is Every Starbucks Holiday Beverage, Ranked from Least to Most Calories',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'The Ketogenic Diet Is the Latest Buzzy Weight-Loss Plan Here’s What a Day of Eating Actually Looks Like',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Jennifer Garner Shares the Healthy Smoothie She Makes \'Every Day for Breakfast\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.182',
					),
					array(
						'post_title'        => 'Ditch the Fitness Excuses: How I Hope America Moves Forward in A Nation of Obesity',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.172',
					),
					array(
						'post_title'        => 'A Shocking Number of Women Avoid the Gym for Fear of Being Judged',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.139',
					),
					array(
						'post_title'        => 'Nike Just Revealed What Team USA Will Be Wearing When They Collect Their Medals',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.142',
					),
					array(
						'post_title'        => 'This Woman Stood Up For Herself After Instagram Deleted Her Transformation Photo',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.146',
					),
					array(
						'post_title'        => 'Toronto Fashion Week Is Teaming Up With RESET Collections In February 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.133',
					),
					array(
						'post_title'        => 'She’s Gotta Have It Failed In Its Representation Of Black Women’s Bodies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.129',
					),
					array(
						'post_title'        => 'Amy Schumer Stands Up to Body Shamers with a Series of Bikini Photos',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.119',
					),
					array(
						'post_title'        => 'The Beauty Products You Should Try In 2018, According To Your New Year’s Resolutions',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.123',
					),
					array(
						'post_title'        => 'Every Single Time Tom Hiddleston, 2017’S Most Stylish Man, Looked Awesome Wearing A Suit',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.125',
					),
					array(
						'post_title'        => 'Michael Phelps Reveals the Song He was Listening to While Making the #PhelpsFace',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'The Almond Ginger Monkey Smoothie That\'ll Make You a Breakfast Devotee',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'There\'s A New-Age Sunscreen Compound That Could Change the Skin Cancer Game',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.168',
					),
					array(
						'post_title'        => 'Knock \'em Out with These Kardashian-Inspired Dutch Braids (AKA Boxer Braids)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.170',
					),
					array(
						'post_title'        => 'This Remote Scottish Island Really Wants Frustrated City Dwellers to Move There',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => 'This Cucumber Coconut Water Smoothie Just Might Be the Most Refreshing Drink Ever',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.166',
					),
					array(
						'post_title'        => 'The Almond Ginger Monkey Smoothie That\'ll Make You a Breakfast Devotee',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.164',
					),
					array(
						'post_title'        => 'This Green Smoothie Recipe Is Loaded with Kale, Peanut Butter, and Pure Joy',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'This Cucumber Coconut Water Smoothie Just Might Be the Most Refreshing Drink Ever',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.162',
					),
					array(
						'post_title'        => '12-Hour Trip: See This Stylist\'s Curated Itinerary As She Safely Travels L.A. With Uber',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.180',
					),
					array(
						'post_title'        => 'This Picturesque Japanese Village Is One of the Snowiest Places on the Planet (Photos)',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.266',
					),
					array(
						'post_title'        => 'This ‘Game Of Thrones’ Ice Hotel Will Make Anyone Feel Like They’re in Winterfell',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => 'WIN £600 Towards Your Wedding Photographer AND A Photo Booth Worth £450!',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.135',
					),
					array(
						'post_title'        => '9 Healthy Snacks Celebrities Love Plus How to Make Them Even More Nutritious',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=BDOERbjq1AE',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'This Woman\'s Photo with and Without Shapewear Is Taking Over the Internet',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.121',
					),
					array(
						'post_title'        => 'This New Podcast Digs Into All the Drama Behind Prince Harry and Meghan\'s Wedding',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'The Best Places to Travel in Mexico and Central & South America in January',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'This ‘Game Of Thrones’ Ice Hotel Will Make Anyone Feel Like They’re in Winterfell',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => '\'Plus-Size\' Resort Provides a Sanctuary for Curvy Beach-Goers: \'The Stigmas Are Gone\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.206',
					),
					array(
						'post_title'        => 'These Best Friends Had a Photoshoot to Make an Important Point About Body Positivity',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'Chew On This: Your Thoughts, Behaviours Get You To A Healthier Body Weight',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.148',
					),
					array(
						'post_title'        => 'Lee Trusts Uber to Get Her Safely Around Johannesburg During Her International Travels',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.217',
					),
					array(
						'post_title'        => 'Jazz Jennings Is \'Absolutely Horrified\' She Might Not Be Able to Get Gender Confirmation Surgery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_title'        => 'Olympians Jordyn Wieber & Nastia Liukin Open Up About Pressure to Stay Thin After Gymnastics Careers',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.208',
					),
					array(
						'post_title'        => 'Ina Garten Reveals the Only Fast Food She\'ll Eat: \'It Was Julia Child\'s Favorite Too\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'This New Treadmill Could Change the Way You Look at Indoor Running Forever',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.144',
					),
					array(
						'post_title'        => 'Here’s What to Eat for Lunch If You’re Trying to Slim Down, According to a Nutritionist',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.176',
					),
					array(
						'post_title'        => 'Hey Chrissy Teigen, This Is the Secret Ingredient You Actually Need for Amazing Banana Bread',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => '#MeToo Creator Tarana Burke Will Kick Off the Countdown to New Year in Times Square',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=RcmrbNRK-jY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => 'WWE Diva Natalie Eva Marie\'s Rise-and-Grind Workout Playlist Is Totally Worth Stealing',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'How to Make the Protein-Packed Breakfast Mindy Kaling and Jessica Alba Love',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Xh_Neg-Hp84',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'A Bomb Cyclone Forming off the East Coast Could Bring the Coldest Temperatures in 100 Years',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=R6gSetttzgA',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Women Pose Nude in Glittery Body Paint for Body Positivity: \'They Feel Freed of Their Shame\'',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=OUB6zKc-Tos',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.202',
					),
					array(
						'post_title'        => 'Kim Kardashian Says She Has Body Dysmorphia, but What Does That Really Mean?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.212',
					),
					array(
						'post_title'        => 'Win VIP Tickets To The Liverpool And North West Wedding Show AND Afternoon Tea At Inglewood Manor!',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=5hRkkcBB7dE',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.131',
					),
					array(
						'post_title'        => 'How To Get Engagement Photos That Look As Good As Meghan Markle’s',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=2BnoqDY5H9k',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.112',
					),
					array(
						'post_title'        => 'These 3 Quotes from Shaun T Will Change How You Look at Your Resolution',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=eAfyFTzZDMM',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.117',
					),
					array(
						'post_title'        => 'A Woman Died From \'Flesh-Eating\' Bacteria After Eating Raw Oysters. Here\'s What You Need to Know',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Your Guests Will Love This Sweet, Spiked Holiday Punch That\'s Packed With Superfoods',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.225',
					),
					array(
						'post_title'        => 'Here’s What We Should Be Asking Actors On The Red Carpet Tomorrow Night',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.127',
					),
					array(
						'post_title'        => 'Life Time Gyms Ban Cable News from Their Televisions After Many Member Requests',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.178',
					),
					array(
						'post_title'        => 'JFK Airport Is Still Recovering From Its Disastrous Weekend  Here\'s What Travelers Need to Know',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.260',
					),
					array(
						'post_title'        => 'This Quick Bootcamp Workout Will Tone Your Abs and Amp Up Your Endurance',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.150',
					),
					array(
						'post_title'        => 'Watch This Fit Mom Do a Post-Pregnancy Workout While Wrangling Two Kids',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Powder nails are known for their quick and easy application process, making them a popular choice when visiting ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.115',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Sidebar Single Page - 300 x 250',
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
						'the_id'     => 'posts.primary.278',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner index Sidebar - 160 x 670',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-160x670}:\'full\'%%',
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
						'the_id'     => 'posts.primary.31',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Banner Index - 728 x 90',
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
						'the_id'     => 'posts.primary.101',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Content Single - 300 x 250',
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
						'the_id'     => 'posts.primary.299',
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
								'meta_value' => 'sdaf',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-5',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#992556',
							),
						),
						'the_id'     => 'posts.primary.467',
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
						'option_value' => '%%posts.primary.6%%',
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
							'widget_id'       => 'bs-mix-listing-3-3',
							'widget_settings' => array(
								'title'                 => 'Trending Now',
								'count'                 => '4',
								'order_by'              => 'popular',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'big-title-limit'         => '82',
									'big-excerpt'             => '1',
									'big-excerpt-limit'       => '115',
									'big-subtitle'            => '0',
									'big-subtitle-limit'      => '0',
									'big-subtitle-location'   => 'before-meta',
									'big-format-icon'         => '1',
									'big-term-badge'          => '1',
									'big-term-badge-count'    => '1',
									'big-term-badge-tax'      => 'category',
									'big-meta'                => array(
										'show'        => '1',
										'author'      => '1',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '1',
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
								'bf-widget-bg-color'    => '#f2f2f4',
								'bf-widget-title-icon'  => array(
									'icon'      => 'fa-line-chart',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f201',
								),
								'paginate'              => 'none',
								'columns'               => 1,
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.278%%',
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
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites. It does not matter if you want to create news website, online magazine or personal blog, review website ...
         
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
					'footer-2'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Most Viewed',
								'count'                 => '3',
								'order_by'              => 'popular',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '65',
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
								'paginate'              => 'none',
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
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
								'page_id'   => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.292',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.283',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.284',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.282',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.36',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.281',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.280',
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
								'the_id'    => 'posts.primary.472',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.285',
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
								'page_id'   => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.290',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.473',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.474',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.475',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact Form',
								'page_id'   => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.291',
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
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-160x670.jpg',
					'the_id' => 'media.primary.ad-160x670',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
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
