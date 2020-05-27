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

	$style_id       = 'world-news';
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
						'name'     => 'Advice',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.58',
					),
					array(
						'name'     => 'America',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'Asia Pacific',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'     => 'Baseball',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.42',
					),
					array(
						'name'     => 'Basketball',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.45',
					),
					array(
						'name'     => 'Beach on a budget',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.70',
					),
					array(
						'name'     => 'Biology',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.52',
					),
					array(
						'name'     => 'Blog network',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.46',
					),
					array(
						'name'     => 'Business',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.80',
					),
					array(
						'name'     => 'Celebrity',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.62',
					),
					array(
						'name'     => 'Cities',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.27',
					),
					array(
						'name'     => 'City breaks',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.75',
					),
					array(
						'name'     => 'Classics',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.66',
					),
					array(
						'name'     => 'Clinton',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Couples',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.64',
					),
					array(
						'name'     => 'Departed',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.69',
					),
					array(
						'name'      => 'Entertainment',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#4589b9',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'     => 'Europe',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.22',
					),
					array(
						'name'     => 'Family',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.61',
					),
					array(
						'name'     => 'Feud',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.68',
					),
					array(
						'name'     => 'Fitness',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.56',
					),
					array(
						'name'     => 'Food & drink',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.60',
					),
					array(
						'name'     => 'Food and drink',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.74',
					),
					array(
						'name'     => 'Gadget reviews',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.32',
					),
					array(
						'name'     => 'Games',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.34',
					),
					array(
						'name'     => 'Golf',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.44',
					),
					array(
						'name'      => 'Health',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#9f46b5',
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
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'Health',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.81',
					),
					array(
						'name'     => 'Health dilemmas',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.57',
					),
					array(
						'name'     => 'Hockey',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.43',
					),
					array(
						'name'     => 'Holiday guides',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.71',
					),
					array(
						'name'     => 'Hotels',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.76',
					),
					array(
						'name'     => 'How to …',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.29',
					),
					array(
						'name'     => 'In depth',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.30',
					),
					array(
						'name'     => 'In depth',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.48',
					),
					array(
						'name'     => 'Inside Silicon Valley',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.33',
					),
					array(
						'name'     => 'Investigations',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.82',
					),
					array(
						'name'     => 'Key issues',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.47',
					),
					array(
						'name'     => 'Lifestyle',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.83',
					),
					array(
						'name'     => 'Local',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.79',
					),
					array(
						'name'     => 'Opinion & analysis',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.26',
					),
					array(
						'name'     => 'Phone picks',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.31',
					),
					array(
						'name'     => 'Physics',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.54',
					),
					array(
						'name'     => 'Pictures',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.24',
					),
					array(
						'name'     => 'Pictures',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.35',
					),
					array(
						'name'     => 'Pictures',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.50',
					),
					array(
						'name'     => 'Politics',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Pop Culture',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.84',
					),
					array(
						'name'     => 'President',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Readers\' tips',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.73',
					),
					array(
						'name'     => 'Regulars',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.37',
					),
					array(
						'name'     => 'Relationships',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.59',
					),
					array(
						'name'     => 'RUGBY',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.41',
					),
					array(
						'name'     => 'Running & biking',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.55',
					),
					array(
						'name'     => 'Scandal',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.67',
					),
					array(
						'name'     => 'Science',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.85',
					),
					array(
						'name'      => 'Sciens',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#c84668',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Soccer',
						'parent'   => '%%taxonomy.primary.5%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.38',
					),
					array(
						'name'     => 'Space',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.53',
					),
					array(
						'name'      => 'Sport',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#3cad49',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Sports',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.87',
					),
					array(
						'name'     => 'Spotlight',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.28',
					),
					array(
						'name'     => 'Style',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.65',
					),
					array(
						'name'     => 'Tech',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.86',
					),
					array(
						'name'      => 'Technology',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#1e9188',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-9',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#bb9346',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'Trump',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'U.S',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.77',
					),
					array(
						'name'     => 'US politics',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.20',
					),
					array(
						'name'     => 'USA',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Video',
						'parent'   => '%%taxonomy.primary.8%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.25',
					),
					array(
						'name'     => 'video',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.51',
					),
					array(
						'name'     => 'Video',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.63',
					),
					array(
						'name'     => 'Videos',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.36',
					),
					array(
						'name'     => 'Voting',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Where to stay',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.72',
					),
					array(
						'name'      => 'World',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#3a4dd5',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-19',
							),
						),
						'the_id'    => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'World',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.78',
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
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.40',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Cryptocurrency Shortcode',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.762',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact Us',
						'post_content_file' => $demo_path . 'post-content-2.txt',
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
						'post_title'        => 'Watch this little boy dance to \'I\'ve Loved You Since Forever\'',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.48%%,%%taxonomy.primary.47%%,%%taxonomy.primary.4%%,%%taxonomy.primary.51%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.283',
					),
					array(
						'post_title'        => 'Japan foreign minister says Korean peninsula situation is a near \'miracle\': South Korea',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.54%%,%%taxonomy.primary.50%%,%%taxonomy.primary.4%%,%%taxonomy.primary.53%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.292',
					),
					array(
						'post_title'        => 'North Korean \'caution\' seen in announcing stance on upcoming summits: Seoul',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.48%%,%%taxonomy.primary.47%%,%%taxonomy.primary.4%%,%%taxonomy.primary.51%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => 'Kathie Lee Gifford opens up about her faith and her new book',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.48%%,%%taxonomy.primary.47%%,%%taxonomy.primary.4%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.284',
					),
					array(
						'post_title'        => 'Carson Daly describes the tools he uses to cope with anxiety disorder',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.52%%,%%taxonomy.primary.46%%,%%taxonomy.primary.4%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.285',
					),
					array(
						'post_title'        => 'For mouthwatering meatballs, don\'t use breadcrumbs — use this instead',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.52%%,%%taxonomy.primary.46%%,%%taxonomy.primary.4%%,%%taxonomy.primary.51%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.287',
					),
					array(
						'post_title'        => 'Here\'s your 1st look at Amazon\'s new handmade ceramics collection',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.54%%,%%taxonomy.primary.50%%,%%taxonomy.primary.4%%,%%taxonomy.primary.53%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.291',
					),
					array(
						'post_title'        => '11 drugstore products that\'ll give you the best brows of your life',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.54%%,%%taxonomy.primary.50%%,%%taxonomy.primary.4%%,%%taxonomy.primary.53%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.290',
					),
					array(
						'post_title'        => 'British PM May weighs response to nerve attack on Russian double agent',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.48%%,%%taxonomy.primary.47%%,%%taxonomy.primary.4%%,%%taxonomy.primary.51%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.289',
					),
					array(
						'post_title'        => 'This is what Milo Ventimiglia wants you to take away from his TV death',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.52%%,%%taxonomy.primary.46%%,%%taxonomy.primary.4%%,%%taxonomy.primary.51%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.288',
					),
					array(
						'post_title'        => 'Japan, South Korea agree to maintain \'maximum pressure\' on North Korea: minister',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.37%%,%%taxonomy.primary.41%%,%%taxonomy.primary.38%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.322',
					),
					array(
						'post_title'        => 'Explainer: Altered documents turn up heat on Japanese leader in cronyism scandal',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.37%%,%%taxonomy.primary.41%%,%%taxonomy.primary.38%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.325',
					),
					array(
						'post_title'        => 'Monsoon floods and landslides threaten 100,000 Rohingya refugees in Bangladesh',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.37%%,%%taxonomy.primary.41%%,%%taxonomy.primary.38%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.332',
					),
					array(
						'post_title'        => 'China\'s top diplomat says positive changes emerge on Korean Peninsula',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.37%%,%%taxonomy.primary.41%%,%%taxonomy.primary.38%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.331',
					),
					array(
						'post_title'        => 'UK PM May expected to blame Russia for poisoning of spy - British lawmaker',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.44%%,%%taxonomy.primary.43%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.330',
					),
					array(
						'post_title'        => 'South Korea\'s ruling party reels from more sex abuse allegations, vows \'zero tolerance\'',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.44%%,%%taxonomy.primary.43%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%,%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.329',
					),
					array(
						'post_title'        => 'Xi says China, South Korea on the same page over Korean peninsula issues: Seoul',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.44%%,%%taxonomy.primary.43%%,%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'Britain still confident on winning transition deal at EU summit: spokesman',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.42%%,%%taxonomy.primary.45%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => 'Demi Lovato removes her makeup in powerful video for Vogue',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.54%%,%%taxonomy.primary.50%%,%%taxonomy.primary.4%%,%%taxonomy.primary.53%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.281',
					),
					array(
						'post_title'        => 'Hong Kong democratic opposition fails to regain veto power in legislature',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.42%%,%%taxonomy.primary.45%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.327',
					),
					array(
						'post_title'        => 'Colombians pick candidates in two primaries for May presidential election',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.42%%,%%taxonomy.primary.45%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%,%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.336',
					),
					array(
						'post_title'        => 'China to revise criminal law to accommodate powerful anti-graft commission',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.42%%,%%taxonomy.primary.45%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'the_id'            => 'posts.primary.328',
					),
					array(
						'post_title'        => '\'This Is Us\' leads to much confusion in Sterling K. Brown \'SNL\' promo',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.60%%,%%taxonomy.primary.3%%,%%taxonomy.primary.57%%,%%taxonomy.primary.59%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => 'What\'s new at the Geneva Auto Show: A Croatian hypercar, an electric Porsche',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.66%%,%%taxonomy.primary.2%%,%%taxonomy.primary.63%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'China’s dissident artist Ai Weiwei highlights plight of refugees',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.66%%,%%taxonomy.primary.2%%,%%taxonomy.primary.63%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Dozens feared dead as plane crashes, bursts into flames on landing in Nepal',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.62%%,%%taxonomy.primary.2%%,%%taxonomy.primary.67%%,%%taxonomy.primary.65%%',
						),
						'the_id'            => 'posts.primary.225',
					),
					array(
						'post_title'        => 'Would Australia\'s mandatory gun buyback program work in the U.S.?',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.62%%,%%taxonomy.primary.2%%,%%taxonomy.primary.67%%,%%taxonomy.primary.65%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Betsy DeVos on Trump’s rally vulgarity: ‘I would probably use different language’',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.64%%,%%taxonomy.primary.69%%,%%taxonomy.primary.2%%,%%taxonomy.primary.68%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'This woman built a multimillion-dollar company in her own backyard',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.64%%,%%taxonomy.primary.69%%,%%taxonomy.primary.2%%,%%taxonomy.primary.68%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'China’s dissident artist Ai Weiwei highlights plight of refugees',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.64%%,%%taxonomy.primary.2%%,%%taxonomy.primary.63%%',
						),
						'the_id'            => 'posts.primary.222',
					),
					array(
						'post_title'        => 'Meghan Markle to appear at her first official event with Queen Elizabeth',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.64%%,%%taxonomy.primary.69%%,%%taxonomy.primary.2%%,%%taxonomy.primary.68%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'East Coast braces for possible 3rd nor\'easter in 10 days',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.66%%,%%taxonomy.primary.2%%,%%taxonomy.primary.67%%,%%taxonomy.primary.65%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'New fertility clinic failure puts more eggs and embryos at risk',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.66%%,%%taxonomy.primary.2%%,%%taxonomy.primary.63%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Qataris opted not to give info on Kushner, secret meetings to Mueller',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.62%%,%%taxonomy.primary.2%%,%%taxonomy.primary.67%%,%%taxonomy.primary.65%%',
						),
						'the_id'            => 'posts.primary.223',
					),
					array(
						'post_title'        => 'An open letter to pushy sports parents everywhere',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%,%%taxonomy.primary.55%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.256',
					),
					array(
						'post_title'        => 'Meet the next generation of Paralympic athletes',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%,%%taxonomy.primary.55%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'This is what Milo Ventimiglia wants you to take away from his TV death',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.60%%,%%taxonomy.primary.3%%,%%taxonomy.primary.57%%,%%taxonomy.primary.59%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.251',
					),
					array(
						'post_title'        => 'How to stay safe if you\'re stranded in your car buried in snow',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.60%%,%%taxonomy.primary.3%%,%%taxonomy.primary.57%%,%%taxonomy.primary.59%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.249',
					),
					array(
						'post_title'        => 'Japan finance ministry explains suspected cronyism case to ruling party: source',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.6%%,%%taxonomy.primary.36%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.358',
					),
					array(
						'post_title'        => 'Chef Sunny Anderson swears by these three tools for Southern cooking',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.60%%,%%taxonomy.primary.3%%,%%taxonomy.primary.57%%,%%taxonomy.primary.59%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'How being body-shamed led this woman to start a beauty empire',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.61%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'Wisconsin politic breastfeeds in campaign ad, goes viral',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%,%%taxonomy.primary.55%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => 'Campaign wants one million people to stop using the R-word',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.61%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.253',
					),
					array(
						'post_title'        => 'New Father Chronicles: What have you given ME, baby girl?!',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.61%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => 'End of an era? Claire\'s will reportedly file for bankruptcy',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.61%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'the_id'            => 'posts.primary.247',
					),
					array(
						'post_title'        => 'South Africa gold miners\' silicosis lawsuit settlement expected within six weeks',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.30%%,%%taxonomy.primary.33%%,%%taxonomy.primary.31%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.365',
					),
					array(
						'post_title'        => 'SEAL Team 6 was reportedly ready to act if Pakistan failed to free family',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%,%%taxonomy.primary.25%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Mf6SzCHXgmU',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.445',
					),
					array(
						'post_title'        => 'Trump agreed to meet Kim because he is North Korea\'s decision-maker: official',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%,%%taxonomy.primary.24%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.442',
					),
					array(
						'post_title'        => 'Watch Hoda Kotb tell this couple their adoption dream has come true',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.58%%,%%taxonomy.primary.56%%,%%taxonomy.primary.3%%,%%taxonomy.primary.55%%',
							'post_tag' => '%%taxonomy.primary.15%%,%%taxonomy.primary.78%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Mf6SzCHXgmU',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.245',
					),
					array(
						'post_title'        => 'Japan probes possible suicide of finance official amid cronyism scandal: media',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%,%%taxonomy.primary.24%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.435',
					),
					array(
						'post_title'        => 'Britain will respond if it identifies who was behind spy attack: May\'s spokesman',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.44%%,%%taxonomy.primary.43%%,%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.334',
					),
					array(
						'post_title'        => 'China allows Xi to remain president indefinitely, tightening his grip on power',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.30%%,%%taxonomy.primary.33%%,%%taxonomy.primary.31%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.366',
					),
					array(
						'post_title'        => 'Putin order for bomb threat plane to be downed in 2014 canceled after false alarm',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.30%%,%%taxonomy.primary.33%%,%%taxonomy.primary.31%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.368',
					),
					array(
						'post_title'        => 'Myanmar monk returns to preaching after ban, denies fuelling Rakhine violence',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.6%%,%%taxonomy.primary.36%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.370',
					),
					array(
						'post_title'        => 'Japan PM says he and Trump agree maximum pressure needed on North Korea',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%,%%taxonomy.primary.24%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.443',
					),
					array(
						'post_title'        => 'U.N. investigator: human rights must be part of any talks with North Korea',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.52%%,%%taxonomy.primary.46%%,%%taxonomy.primary.4%%',
							'post_tag' => '%%taxonomy.primary.85%%,%%taxonomy.primary.87%%,%%taxonomy.primary.86%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Mf6SzCHXgmU',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Metrorail needs federal money to expand. Trump’s transit chief',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.27%%,%%taxonomy.primary.22%%,%%taxonomy.primary.28%%,%%taxonomy.primary.20%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.438',
					),
					array(
						'post_title'        => 'FBI uncovers 2,800 government docs on Weiner laptop, report says',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%,%%taxonomy.primary.25%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.444',
					),
					array(
						'post_title'        => 'He Knew What he Signed up for Trump Says to Widow of Fallen Miami Gardens Soldier',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.528',
					),
					array(
						'post_title'        => 'UK\'s May defends Saudi ties as crown prince gets royal welcome in London',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%,%%taxonomy.primary.28%%,%%taxonomy.primary.20%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.437',
					),
					array(
						'post_title'        => 'South Korea official\'s speech on Trump-North Korea leader meeting',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.27%%,%%taxonomy.primary.22%%,%%taxonomy.primary.25%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Mf6SzCHXgmU',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.441',
					),
					array(
						'post_title'        => 'Massive Anti-Gun Rally Bumped From National Mall For Talent Show',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.27%%,%%taxonomy.primary.22%%,%%taxonomy.primary.28%%,%%taxonomy.primary.20%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.439',
					),
					array(
						'post_title'        => 'Meghan Markle baptized by archbishop ahead of wedding to UK\'s Prince Harry',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.26%%,%%taxonomy.primary.24%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Mf6SzCHXgmU',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.usatoday.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'http://www.usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.447',
					),
					array(
						'post_title'        => '\'No one above law\' in Mexico graft fight, says presidential hopeful Meade',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.34%%,%%taxonomy.primary.29%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.363',
					),
					array(
						'post_title'        => 'Myanmar builds military bases where Rohingya once lived and prayed: Amnesty',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.6%%,%%taxonomy.primary.36%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.369',
					),
					array(
						'post_title'        => 'Long sought by North Korea, summit holds risks for Trump administration',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.34%%,%%taxonomy.primary.29%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.360',
					),
					array(
						'post_title'        => 'Syrian army effectively surrounds two eastern Ghouta towns - Observatory',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.34%%,%%taxonomy.primary.29%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.362',
					),
					array(
						'post_title'        => 'Tillerson says U.S policy on North Korea executed by State Department has succeeded',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.73%%,%%taxonomy.primary.7%%,%%taxonomy.primary.72%%',
						),
						'the_id'            => 'posts.primary.403',
					),
					array(
						'post_title'        => 'Xi says appreciates Trump\'s desire to resolve North Korea issue politically',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.73%%,%%taxonomy.primary.7%%,%%taxonomy.primary.72%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.402',
					),
					array(
						'post_title'        => 'Britain sends specialist troops to city where Russian double agent poisoned',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.70%%,%%taxonomy.primary.75%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.405',
					),
					array(
						'post_title'        => 'Finland knife attacker was fully aware of his actions: psychiatric assessment',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.70%%,%%taxonomy.primary.75%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%,%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.408',
					),
					array(
						'post_title'        => 'After visiting North Korea, South Korea officials to meet China, Japan leaders',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.30%%,%%taxonomy.primary.33%%,%%taxonomy.primary.31%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.367',
					),
					array(
						'post_title'        => 'Ferry explosion in Mexico resort town caused by homemade explosive: newspaper',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.6%%,%%taxonomy.primary.36%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.364',
					),
					array(
						'post_title'        => 'Syrian rebels in eastern Ghouta agree to evacuate imprisoned Nusra fighters',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.73%%,%%taxonomy.primary.7%%,%%taxonomy.primary.72%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.394',
					),
					array(
						'post_title'        => 'U.N. rights boss wants allegations of crimes against Rohingya referred to ICC',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.401',
					),
					array(
						'post_title'        => 'Nigeria immigration service launches trafficking probe after staff arrests',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.73%%,%%taxonomy.primary.7%%,%%taxonomy.primary.72%%',
						),
						'the_id'            => 'posts.primary.404',
					),
					array(
						'post_title'        => 'U.N. resident coordinator in Syria says shelling puts Ghouta convoy at risk',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.400',
					),
					array(
						'post_title'        => 'Turkish court sentences 25 journalists to jail for links to coup plotters',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.23%%,%%taxonomy.primary.28%%,%%taxonomy.primary.20%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.446',
					),
					array(
						'post_title'        => 'Philippines slams U.N. rights chief for \'disrespectful\' remarks about Duterte',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.34%%,%%taxonomy.primary.29%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.361',
					),
					array(
						'post_title'        => 'Russian double agent still in very serious condition after nerve agent attack',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.70%%,%%taxonomy.primary.75%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.396',
					),
					array(
						'post_title'        => 'South Korean officials deliver letter from Kim Jong Un to White House for Trump',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.27%%,%%taxonomy.primary.22%%,%%taxonomy.primary.25%%,%%taxonomy.primary.8%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.440',
					),
					array(
						'post_title'        => 'Turkey orders 243 detained on suspected links to Gulen network: Anadolu',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.398',
					),
					array(
						'post_title'        => 'South Korean politician who quit over sexual assault accusation apologizes',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.70%%,%%taxonomy.primary.75%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.80%%,%%taxonomy.primary.81%%,%%taxonomy.primary.82%%,%%taxonomy.primary.83%%,%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.397',
					),
					array(
						'post_title'        => 'Hungary\'s ruling Fidesz unlikely to win two-thirds majority in April: party official',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%',
							'post_tag' => '%%taxonomy.primary.79%%,%%taxonomy.primary.11%%,%%taxonomy.primary.84%%',
						),
						'the_id'            => 'posts.primary.399',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner X Paragraph - 300x250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-1}:\'full\'%%',
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
						'the_id'     => 'posts.primary.172',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-715x86}:\'full\'%%',
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
						'the_id'     => 'posts.primary.142',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner 2 - 160x600',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-160x600}:\'full\'%%',
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
						'the_id'     => 'posts.primary.137',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline X Post',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-637x81}:\'full\'%%',
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
						'the_id'     => 'posts.primary.105',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Inline Header - 728x90',
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
						'the_id'     => 'posts.primary.71',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner - 300x250',
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
						'the_id'     => 'posts.primary.93',
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
								'meta_value' => 'Publisher',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'     => 'posts.primary.158',
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
								'type' => 'top-center',
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
						'option_value' => '%%posts.primary.40%%',
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
							'header_aside_logo_banner' => '%%posts.primary.71%%',
							'header_before_type'       => 'banner',
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
								'title'                 => 'trending now',
								'count'                 => '5',
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
								'paginate'              => 'none',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.93%%',
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
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         • Email: <a href="mailto:info@newssite.com">info@newssite.com</a>
         • Phone: 1-484-217-3383',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'about_link_url'       => '#',
								'about_link_text'      => 'Contact',
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
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                => 'Links',
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
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-subscribe-newsletter',
							'widget_settings' => array(
								'image'                => '%%bf_product_demo_media_url:\'\':\'full\'%%',
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
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'title'                => 'Follow Us',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_email'           => '#',
								'link_youtube'         => '#',
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
								'title'     => 'News',
								'page_id'   => '%%posts.primary.40%%',
								'the_id'    => 'posts.primary.453',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.201',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.199',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.198',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.196',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.197',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.200',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.195',
							),
						),
					),
					array(
						'menu-location' => 'main-menu',
						'menu-name'     => 'Main Menu',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'News',
								'page_id'   => '%%posts.primary.40%%',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.452',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.80%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.687',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.81%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.688',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.82%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.689',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.83%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.690',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.79%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.691',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.692',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.84%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.693',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.85%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.694',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.87%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.695',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.86%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.696',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.77%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.697',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.78%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.452%%',
								'the_id'    => 'posts.primary.698',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.5',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.465',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.20%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.462',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.22%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.458',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.28%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.461',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.27%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.457',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.26%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.459',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.23%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.456',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.24%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.460',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.25%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.5%%',
								'the_id'    => 'posts.primary.463',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.177',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.466',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.30%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.470',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.31%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.472',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.34%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.468',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.29%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.469',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.33%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.471',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.32%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.467',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.35%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.473',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.36%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.177%%',
								'the_id'    => 'posts.primary.474',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.176',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.482',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.38%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.481',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.42%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.475',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.45%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.476',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.44%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.477',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.43%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.478',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.37%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.479',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.41%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.176%%',
								'the_id'    => 'posts.primary.480',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.174',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.499',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.60%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.495',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.61%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.493',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.58%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.492',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.56%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.494',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.57%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.496',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.59%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.497',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.55%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.174%%',
								'the_id'    => 'posts.primary.498',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									14 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'HOT',
									),
								),
								'the_id'    => 'posts.primary.175',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.491',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.52%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.483',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.46%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.484',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.48%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.485',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.47%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.486',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.54%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.487',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.50%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.488',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.53%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.489',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.51%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.175%%',
								'the_id'    => 'posts.primary.490',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.173',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.507',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.62%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.500',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.66%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.501',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.64%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.502',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.69%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.503',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.68%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.504',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.67%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.505',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.65%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.173%%',
								'the_id'    => 'posts.primary.506',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.178',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.515',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.74%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.511',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.76%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.513',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.73%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.514',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.75%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.510',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.72%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.508',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.70%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.509',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.71%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.178%%',
								'the_id'    => 'posts.primary.512',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'custom',
								'target'    => '',
								'title'     => 'RTL',
								'url'       => '#',
								'the_id'    => 'posts.primary.179',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact Us',
								'page_id'   => '%%posts.primary.38%%',
								'the_id'    => 'posts.primary.451',
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
					'file'   => $demo_image_url . $prefix . 'header-bg.png',
					'the_id' => 'media.primary.header-bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'footer-bg.png',
					'the_id' => 'media.primary.footer-bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-1.jpg',
					'the_id' => 'media.primary.ad-300x250-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-715x86.jpg',
					'the_id' => 'media.primary.ad-715x86',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-160x600.jpg',
					'the_id' => 'media.primary.ad-160x600',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-637x81.jpg',
					'the_id' => 'media.primary.ad-637x81',
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
					'file'   => $demo_image_url . $prefix . 'quote-avatar.png',
					'the_id' => 'media.primary.quote-avatar',
				),
			),
	);
}
