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

	$style_id       = 'car-news';
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
						'name'      => 'Bikes',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'     => 'Buyer Guide',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Cars',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Design',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'Ferrari',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'Gallery',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.22',
					),
					array(
						'name'      => 'News',
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
						'name'     => 'Pagani',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Photos',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Porsche',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Gallery',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.20',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.21',
					),
					array(
						'name'     => 'Review',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'      => 'Reviews',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Shop',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'Sports',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'     => 'Videos',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
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
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.215',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.212',
					),
					array(
						'post_title'        => 'The 2019 BMW M2 Competition arrives with 405 hp on tap',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.317',
					),
					array(
						'post_title'        => 'Scale Model Kit of the Week: Cobra Tee Way-Out Rod',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.319',
					),
					array(
						'post_title'        => 'VW promises cars with autonomous parking tech in 2020',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'Polestar 1 hybrid coupe completes cold-weather test',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.316',
					),
					array(
						'post_title'        => 'Is your Audi part of the global 1.16 million vehicle recall?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.290',
					),
					array(
						'post_title'        => 'Seatmaker Recaro has its roots in building Porsches',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.312',
					),
					array(
						'post_title'        => 'Watch the 2019 Chevrolet Corvette ZR1 hit its top speed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.313',
					),
					array(
						'post_title'        => '2018 Infiniti Q60 Red Sport essentials: Too clever by half',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.315',
					),
					array(
						'post_title'        => '1974 AMC Gremlin 401-XR tribute review: Malaise-era muscle',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.348',
					),
					array(
						'post_title'        => 'Autoweek in review: Everything you missed April 23-27',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.343',
					),
					array(
						'post_title'        => '2018 Honda Africa Twin launched in India at Rs 13.23 lakhs',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.385',
					),
					array(
						'post_title'        => 'Royal Enfield Classic 350 Redditch now gets rear disc brake',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.384',
					),
					array(
						'post_title'        => '5 differences between TVS NTorq 125 and rally-spec NTorq SXR',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.382',
					),
					array(
						'post_title'        => 'Moto Guzzi V85 production design revealed in patent filings',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.386',
					),
					array(
						'post_title'        => 'Ducati Monster 797 Plus launched in India at Rs 8.03 lakhs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.388',
					),
					array(
						'post_title'        => '1974: No need to lock those hubs with Jeep Quadra-Trac',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.289',
					),
					array(
						'post_title'        => '2019 Mercedes-Benz CLS first drive: The Master of Benz Bling',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.339',
					),
					array(
						'post_title'        => 'Stingers on ice! Spending the day stuffing Kias into snowbanks',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.342',
					),
					array(
						'post_title'        => 'Honda S2000 CR and ancient Prelude: The Day of the Manuals',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.345',
					),
					array(
						'post_title'        => 'Certified pre-owned-vehicle sales set a record last year',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.287',
					),
					array(
						'post_title'        => 'Porsche \'Tech Live Look\' turns car repair into a cool VR challenge',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.239',
					),
					array(
						'post_title'        => '2018 Mazda 6 Signature first drive: Still the driver\'s choice',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.241',
					),
					array(
						'post_title'        => 'Lamborghini passes on Paris for the second time in a row',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.253',
					),
					array(
						'post_title'        => '2019 Acura RDX gets a new price tag to go with its new looks',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.240',
					),
					array(
						'post_title'        => 'Here\'s what the Brabham BT62 looks like ripping around a track',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => '4 design elements that set the 2019 Audi Q8 apart from the crowd',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => '2018 Jaguar XF Sportbrake review: Leap away from the pack',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Mercedes-AMG GT R vs Acura NSX - brute force vs hybrid',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.237',
					),
					array(
						'post_title'        => '2019 Crosstrek Hybrid will be the next Subaru/Toyota mashup',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'Ferrari SP38 one-off is a mashup of 308, F40 and 488 cues',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => 'You can LARP \'Charlie\'s Angels\' with this perfect Pinto',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.276',
					),
					array(
						'post_title'        => 'Is this motorcycle/car hybrid next in Ford\'s future plans?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.285',
					),
					array(
						'post_title'        => 'Royal Enfield Thunderbird 350X and 500X accessories launched',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.381',
					),
					array(
						'post_title'        => 'The Aston Martin DB11 AMR is your grand touring supercar',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'Report: Repo men are betting on big data, not big tow trucks',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => '2019 Hyundai Veloster first drive: Second time\'s the charm',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => 'Smaller engines will be a test for new GM full-size pickups',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => 'Autoweek in review: Everything you missed Apr. 30-May 4',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.288',
					),
					array(
						'post_title'        => 'Royal Enfield may set up assembly plant in South East Asia',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.389',
					),
					array(
						'post_title'        => '1959: GMC Crackerbox hauls max payload in every state',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.279',
					),
					array(
						'post_title'        => '2018 Mazda 6 Signature first drive: Still the driver\'s choice',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.251',
					),
					array(
						'post_title'        => '2018 Nissan Murano essentials: Convenient and expensive',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_rating_type',
								'meta_value' => 'points',
							),
							array(
								'meta_key'   => '_bs_readers_rating',
								'meta_value' => 'enable',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Nissan Murano',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'The GTI badge may be most synonymous with sporty Volkswagen Golfs, but hot Polos have worn these famous three letters for more than two decades.',
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
										'label' => 'Price',
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
										'label' => 'CO2 EMISSIONS',
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
									array(
										'label' => 'Boot Capacity',
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
										'label' => 'HP',
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
										'label' => 'Noise',
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
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => '2018 Rolls-Royce Phantom first drive: Large barge in charge',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.378',
					),
					array(
						'post_title'        => 'At Speed: Pirelli’s new Scorpion All Terrain Plus tire review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_rating_type',
								'meta_value' => 'points',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Pirelli’s new Scorpion',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'The GTI badge may be most synonymous with sporty Volkswagen Golfs, but hot Polos have worn these famous three letters for more than two decades.',
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
										'label' => 'Price',
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
										'label' => 'Boot Capacity',
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
										'label' => 'Noise',
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
						'the_id'            => 'posts.primary.337',
					),
					array(
						'post_title'        => 'Hero Xtreme 200R vs TVS Apache RTR 200 4V – Spec Comparison',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.380',
					),
					array(
						'post_title'        => 'These are the cars with the lowest and highest recall rates',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => '2018 Ford F-150 Power Stroke Diesel first drive: Tow machine',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.11%%',
						),
						'the_id'            => 'posts.primary.284',
					),
					array(
						'post_title'        => 'Official: The Production Porsche Mission E Will Be Called Taycan',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => '2019 Subaru Ascent First Drive: Going mainstream in a big way',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.260',
					),
					array(
						'post_title'        => '1972: The new Ranchero is one of the best-looking cartrucks ever',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => '2019 Volkswagen Jetta first drive: Better Jetta, lower price',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_review_enabled',
								'meta_value' => '1',
							),
							array(
								'meta_key'   => '_bs_review_rating_type',
								'meta_value' => 'points',
							),
							array(
								'meta_key'   => '_bs_readers_rating',
								'meta_value' => 'enable',
							),
							array(
								'meta_key'   => '_bs_review_heading',
								'meta_value' => 'Volkswagen Jetta first drive',
							),
							array(
								'meta_key'   => '_bs_review_verdict_summary',
								'meta_value' => 'The GTI badge may be most synonymous with sporty Volkswagen Golfs, but hot Polos have worn these famous three letters for more than two decades.',
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
										'label' => 'Price',
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
										'label' => 'CO2 EMISSIONS',
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
										'label' => 'BOOT CAPACITY',
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
										'label' => 'HP',
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
										'label' => 'Noise',
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
						'post_title'        => '2019 Acura RDX gets a new price tag to go with its new looks',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.242',
					),
					array(
						'post_title'        => 'review: Everything you missed March 5-9, 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.375',
					),
					array(
						'post_title'        => 'VTEC changed engine design forever here\'s how it works',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.305',
					),
					array(
						'post_title'        => 'Meet the AMG GT 63 S Edition 1: The special AMG GT sedan',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.283',
					),
					array(
						'post_title'        => 'Attention Bond villains: Aston Martin now offers a submarine',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.281',
					),
					array(
						'post_title'        => '2019 Porsche Cayenne Hybrid first drive: More power, less fuel',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.346',
					),
					array(
						'post_title'        => '2018 Toyota Corolla iM essentials: A Scion by any other name',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.347',
					),
					array(
						'post_title'        => 'Subaru is getting back into hybrids: Crosstrek PHEV is coming',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'Watch the Polestar 1 hybrid coupe shred ice in Sweden',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.314',
					),
					array(
						'post_title'        => 'Honda ropes in Lorenzo; Ducati promotes Petrucci for 2019',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.387',
					),
					array(
						'post_title'        => 'Porsche\'s 911 Speedster Concept Is A 500-hp Birthday Present',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'Will the next Flying Spur be Bentley’s last gas burner?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Royal Enfield Classic 500 Pegasus – What else can you buy?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.383',
					),
					array(
						'post_title'        => 'Here\'s why Retromobile is the Frenchest car show in the world',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'Buick Enspire electric SUV concept touts 370-mile range',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => '2019 Acura RDX first drive: Desperately seeking emotion',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.340',
					),
					array(
						'post_title'        => 'Nissan Pocket-size Vans Are Suited For Camping Duty, It Turns Out',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'Rolls-Royce Black Badge Adamas collection gets darker',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.311',
					),
					array(
						'post_title'        => 'This Porsche V8-engined Aurus is Vladimir Putin\'s new limo',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.15%%',
							'post_format' => '%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=0WLAXrZCyCg',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.282',
					),
					array(
						'post_title'        => '2018 Chevrolet Tahoe RST essentials: May as well call it the SS',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.11%%',
							'post_format' => '%%taxonomy.primary.22%%',
						),
						'the_id'            => 'posts.primary.344',
					),
					array(
						'post_title'        => 'Meet the BMW Concept iX3: BMW\'s all-electric crossover',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Well, hasn’t Toronto’s city council created the proverbial ...',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.309',
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
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-single-300x250}:\'full\'%%',
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
						'the_id'     => 'posts.primary.188',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner 2',
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
						'the_id'     => 'posts.primary.86',
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
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.74',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner 1',
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
						'the_id'     => 'posts.primary.83',
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
								'meta_value' => 'style-3',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#fe0724',
							),
						),
						'the_id'     => 'posts.primary.192',
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
						'option_value' => '%%posts.primary.212%%',
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
							'ad_post_inline'           => array(
								array(
									'type'      => 'banner',
									'campaign'  => 'none',
									'banner'    => '188',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'left',
									'paragraph' => '3',
								),
							),
							'header_aside_logo_type'   => 'banner',
							'header_aside_logo_banner' => '%%posts.primary.74%%',
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
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                => 'Browse By Brand',
								'nav_menu'             => 17,
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
								'banner'               => '%%posts.primary.86%%',
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
					'secondary-sidebar' => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular News',
								'count'                 => '12',
								'order_by'              => 'popular',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
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
								'paginate'              => 'none',
							),
						),
					),
					'footer-1'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper , Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         Contact Us: <a href="mailto:info@yoursite.com
         ">info@yoursite.com</a>',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.about-avatar}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
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
					'footer-2'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Latest News',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
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
								'paginate'              => 'none',
							),
						),
					),
					'footer-3'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular News',
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
								'paginate'              => 'none',
								'pagination-show-label' => '0',
							),
						),
					),
					'footer-4'          => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'LATEST REVIEWS',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
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
								'page_id'   => '%%posts.primary.212%%',
								'the_id'    => 'posts.primary.395',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.200',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.199',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.197',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.201',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.198',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.203',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.204',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.202',
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
								'page_id'   => '%%posts.primary.212%%',
								'the_id'    => 'posts.primary.392',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
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
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.193',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.194',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.14',
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
								'page_id'   => '%%posts.primary.212%%',
								'the_id'    => 'posts.primary.393',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.195',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact Us',
								'page_id'   => '%%posts.primary.215%%',
								'the_id'    => 'posts.primary.394',
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
					'file'   => $demo_image_url . $prefix . 'ad-single-300x250.jpg',
					'the_id' => 'media.primary.ad-single-300x250',
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
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.png',
					'the_id' => 'media.primary.quote-avatar',
				),
			),
	);
}
