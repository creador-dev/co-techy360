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

	$style_id       = 'android-news';
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
						'name'     => 'Android',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'      => 'Apps',
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
						'name'      => 'Deals',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Downloads',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Games',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-19',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Google',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'Oreo',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Phones',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'      => 'Reviews',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Samsung',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'video',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Watches',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
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
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.18',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.468',
					),
					array(
						'post_title'        => 'Dual-camera BlackBerry with QWERTY appears in renders',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.288',
					),
					array(
						'post_title'        => 'Sunday debate: What matters more - performance or efficiency',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.312',
					),
					array(
						'post_title'        => 'Oppo A3 leaks with a notch and an affordable price tag',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.285',
					),
					array(
						'post_title'        => 'Motorola offers a permanent price cut on the Moto G5s in India',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.284',
					),
					array(
						'post_title'        => 'Mystery Nubia NX617J is revealed by TENAA and Geekbench',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.278',
					),
					array(
						'post_title'        => 'nubia\'s Red Magic gaming smartphone leaks in blurry images',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.280',
					),
					array(
						'post_title'        => 'Samsung explains how it brought Super Slo-mo to the Galaxy S9',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.314',
					),
					array(
						'post_title'        => 'LG expects record-breaking Q1 2018 revenue and operating profit',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.315',
					),
					array(
						'post_title'        => 'MIUI 9.5 Global ROM now rolling out to the Redmi Note 5 in India',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.322',
					),
					array(
						'post_title'        => 'Praising the sun: Dark Souls on Switch delayed until \'summer\'',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'ZTE Tempo Go becomes first Android Go phone to be available in US',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.321',
					),
					array(
						'post_title'        => 'New Samsung Galaxy S9/S9+ update improves call stability',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'Google Chrome will offer easy way to insert emoji on desktops',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.317',
					),
					array(
						'post_title'        => 'Check out our first Huawei P20 Pro benchmark results',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.319',
					),
					array(
						'post_title'        => 'Apple slashes HomePod production after under whelming sales',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'Best Garmin watch 2018: how do you find the right one for you?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Best iPad games: the top free and paid-for titles around',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.181',
					),
					array(
						'post_title'        => 'Google Chrome gives Oculus Rift users native VR support',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'iZettle makes it easier than ever to start an online store',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Mobile industry and tech channel moves for April 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.165',
					),
					array(
						'post_title'        => 'Honor 10 arrives in China ahead of May 15 London launch',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.161',
					),
					array(
						'post_title'        => 'Huawei plans to make its digital assistant better at emotions',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => 'The cheapest places to buy God of War on PlayStation 4',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.157',
					),
					array(
						'post_title'        => 'BT Enterprise combines Business and Wholesale divisions',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Best PC case 2018: top cases for your desktop computer',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Swollen Apple Watch 2 battery? You can get it fixed for free',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'The best BT broadband and Infinity deals in April 2018',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_title'        => 'Sega goes retro with the Genesis Mini and Shenmue I & II reissues',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'New Office Insider build adds some handy features to Office 2016',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'Best free games 2018: the top free games to download on PC',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Best fitness tracker 2018: the top 10 activity bands on the planet',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Microsoft: Qualcomm is just the beginning of Always Connected PC',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Moto G6 and G6 Plus image leaks show phones in cases',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'Xiaomi-backed gaming phone isn’t quite a Razer Phone-killer',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'US bans ZTE from buying Qualcomm chipsets for seven years',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.282',
					),
					array(
						'post_title'        => 'Here are all the Android devices updated with Treble support',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.323',
					),
					array(
						'post_title'        => 'Best phone for gaming 2018: the top 10 mobile game performers',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.133',
					),
					array(
						'post_title'        => 'The best e-commerce platform of 2018: get an online store now!',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Wireless support for Android Auto is now officially available',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Leaked Intel documents reveal octa-core Coffee Lake S chips',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.197',
					),
					array(
						'post_title'        => 'eBay just made creating product listings heaps easier',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.164',
					),
					array(
						'post_title'        => 'Animal Crossing on Nintendo Switch: everything we want to see',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => '10 best music streaming apps  for Android',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.163',
					),
					array(
						'post_title'        => 'Google Lens Now Rolling Out to iOS Devices',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'This is the best Now TV deal around - save 40% on Sky Cinema',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.273',
					),
					array(
						'post_title'        => 'The best PS4 Pro games: push your console to its 4K HDR limits',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Sigma\'s Sony E-mount Art lenses will start shipping in May',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => 'Samsung Galaxy Note 9 release date, price, news and leaks',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_title'        => 'Essential promises it will improve the camera on PH-1 successor',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => 'The best cheap TV deals in April 2018: 4K TVs for less',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'Mobile Power 50: 5 more nominees added to the 2018 list',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.159',
					),
					array(
						'post_title'        => 'Axon 9 and 9 Pro trademarked by ZTE, several Blade phones too',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.309',
					),
					array(
						'post_title'        => 'Samsung launches Orchid Gray color for the Galaxy Note8 in India',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.283',
					),
					array(
						'post_title'        => 'Nokia 6 (2018) starts its pre-orders in the US, ships on April 24',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.281',
					),
					array(
						'post_title'        => 'Best hard drives 2018: the top HDD for desktops and laptops',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.276',
					),
					array(
						'post_title'        => 'Honor 10\'s back surfaces in leaked poster, specs outed too',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.316',
					),
					array(
						'post_title'        => 'Best movies on Netflix UK (April 2018): 150 films to choose from',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.162',
					),
					array(
						'post_title'        => 'Moto G6 and G6 Plus leak inside cases and in real-life photos',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.279',
					),
					array(
						'post_title'        => 'Sonos One’s new color options will brighten up your day',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_title'        => 'Death Stranding: release date, trailers and news',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Samsung doesn’t need to revolutionize the smartphone industry in 2018  it needs to iterate on all the hard work it',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_tag'    => '%%taxonomy.primary.16%%',
							'post_format' => '%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=Fn57JS9WnAQ',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Android',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.android.com/',
							),
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner 728 x 80',
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
						'the_id'     => 'posts.primary.50',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner - Sidebar 300 x 250',
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
						'the_id'     => 'posts.primary.56',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner- Inline 970 x 250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-70x250}:\'full\'%%',
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
						'post_title' => 'Banner X Paragraph - 300 x 250',
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
						'the_id'     => 'posts.primary.107',
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
								'meta_value' => '#2ccc6c',
							),
						),
						'the_id'     => 'posts.primary.436',
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
						'option_value' => '%%posts.primary.18%%',
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
								'title'                 => 'Popular Posts',
								'count'                 => '7',
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
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.56%%',
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
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper , Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites. It does not matter if you want to create news website, online magazine or personal blog, review website Publisher offers ...',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-widget}:\'full\'%%',
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
					'footer-2'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-2',
							'widget_settings' => array(
								'title'                 => 'trending now',
								'order_by'              => 'rand',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'excerpt'           => '0',
									'excerpt-limit'     => '115',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'after-title',
									'format-icon'       => '1',
									'term-badge'        => '0',
									'term-badge-count'  => '1',
									'term-badge-tax'    => 'category',
									'show-ranking'      => '',
									'meta'              => array(
										'show'        => '0',
										'author'      => '1',
										'date'        => '1',
										'date-format' => 'standard',
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
								'columns'               => '2',
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
								'page_id'   => '%%posts.primary.18%%',
								'the_id'    => 'posts.primary.112',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.6',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.110',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.5',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									16 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'NEW',
									),
									18 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#2662dc',
									),
								),
								'the_id'    => 'posts.primary.109',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.7',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.466',
							),
						),
					),
					array(
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'News',
								'page_id'   => '%%posts.primary.18%%',
								'the_id'    => 'posts.primary.119',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.114',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.117',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.113',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.116',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.115',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.467',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.468%%',
								'the_id'    => 'posts.primary.470',
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
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-1.jpg',
					'the_id' => 'media.primary.ad-300x250-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-70x250.jpg',
					'the_id' => 'media.primary.ad-70x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-2.jpg',
					'the_id' => 'media.primary.ad-300x250-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
			),
	);
}
