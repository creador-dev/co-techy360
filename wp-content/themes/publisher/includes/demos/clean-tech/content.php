<?php

/**
 * Returns content for default demo
 *
 * ->Taxonomies
 * ->Medias
 * ->Posts
 * ->Options
 * ->Widgets
 * ->Menus
 *
 * @return array
 */
function publisher_demo_raw_content() {

	$style_id       = 'clean-tech';
	$prefix         = $style_id . '-'; // prevent caching when user installs multiple demos continuously
	$demo_path      = PUBLISHER_THEME_PATH . 'includes/demos/' . $style_id . '/';
	$demo_image_url = publisher_get_demo_images_url( $style_id );

	return array(

		//
		// ->Taxonomies
		//
		'taxonomy' => array(
			'multi_steps' => false,
			array(

				//
				// Gadgets
				//
				array(
					'the_id'    => 'bs-gadgets',
					'name'      => 'Gadgets',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0a9e01',
						),
					),
				),


				//
				// Mobile cats
				//
				array(
					'the_id'    => 'bs-mobile',
					'name'      => 'Mobile',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0a9e01',
						),
					),
				),
				array(
					'the_id'    => 'bs-android',
					'name'      => 'Android',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-mobile%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#85ab21',
						),
					),
				),
				array(
					'the_id'    => 'bs-applications',
					'name'      => 'Applications',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-mobile%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#4987b9',
						),
					),
				),
				array(
					'the_id'   => 'bs-iphone',
					'name'     => 'iPhone',
					'taxonomy' => 'category',
					'parent'   => '%%bs-mobile%%',
				),
				array(
					'the_id'    => 'bs-windows-phone',
					'name'      => 'Windows Phone',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-mobile%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#02a2f6',
						),
					),
				),


				//
				// Reviews cat
				//
				array(
					'the_id'    => 'bs-reviews',
					'name'      => 'Reviews',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'slider_type',
							'meta_value' => 'disable',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0a9e01',
						),
					),
				),


				//
				// Video cat
				//
				array(
					'the_id'    => 'bs-video',
					'name'      => 'Video',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1-3',
						),
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => 'slider_type',
							'meta_value' => 'style-5',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#dd3333',
						),
					),
				),

			)
		), // taxonomies


		//
		// ->Medias
		//
		'media'    => array(

			'multi_steps'           => true,
			'uninstall_multi_steps' => false,

			array(
				'the_id' => 'bs-media-email',
				'file'   => $demo_image_url . $prefix . 'email-illustration.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-logo',
				'file'   => $demo_image_url . $prefix . 'logo.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-940x160',
				'file'   => $demo_image_url . $prefix . 'ad-940x160.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-180x480',
				'file'   => $demo_image_url . $prefix . 'ad-180x480.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-728x90',
				'file'   => $demo_image_url . $prefix . 'ad-728x90.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-300x250',
				'file'   => $demo_image_url . $prefix . 'ad-300x250.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-120x240',
				'file'   => $demo_image_url . $prefix . 'ad-120x240.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-post-content-1',
				'file'   => $demo_image_url . $prefix . 'post-content-1.jpg',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-1',
				'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-4',
				'file'   => $demo_image_url . $prefix . 'thumb-4.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-8',
				'file'   => $demo_image_url . $prefix . 'thumb-8.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-12',
				'file'   => $demo_image_url . $prefix . 'thumb-12.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-16',
				'file'   => $demo_image_url . $prefix . 'thumb-16.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-20',
				'file'   => $demo_image_url . $prefix . 'thumb-20.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-21',
				'file'   => $demo_image_url . $prefix . 'thumb-21.jpg',
				'resize' => true,
			),
		), // media


		//
		// ->Posts
		//
		'posts'    => array(
			'multi_steps' => false,
			array(

				//
				// Homepage
				//
				- 1 => array(
					'the_id'            => 'bs-front-page',
					'post_title'        => 'Front page',
					'post_content_file' => $demo_path . 'front-page.txt',
					'post_type'         => 'page',
					'prepare_vc_css'    => true,
					'post_meta'         => array(
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => '_hide_title',
							'meta_value' => 1,
						),
						array(
							'meta_key'   => 'post_breadcrumb',
							'meta_value' => 'hide',
						),
					),
				),


				//
				// Gadgets
				//
				// 1
				// gadgets
				2   => array(
					'post_title'        => 'Do we really need separate smartphone designs for men and women? Cyrcle thinks',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 2
				// gadgets
				array(
					'post_title'        => 'Watch a cancer operation live in virtual reality this week',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 3
				// gadgets
				array(
					'post_title'        => 'US Army hopes a new app will prevent attacks on military bases',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 4
				// gadgets
				array(
					'post_title'        => 'Watch: IBM Watson creates the first AI-made movie trailer - and it&#x2019;s really eerie',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'post_content_file' => $demo_path . 'post-content-1.txt',
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 5
				// gadgets
				array(
					'post_title'        => 'Lookback gives you iOS and Apple TV screen recording that&#x2019;s better than QuickTime',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 6
				// gadgets
				array(
					'post_title'        => 'Take calls from your fingertip with this amazing device',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 7
				// gadgets
				array(
					'post_title'        => 'Apple and Google join &#x2018;strike force&#x2019; to crack down on robocalls',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 8
				// gadgets
				array(
					'post_title'        => 'These are the iPhone 7-ready Lightning headphones you can buy right now if you have no chill',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 9
				// gadgets
				array(
					'post_title'        => 'Amazon is expanding its retail operation to 100 pop-up stores around the US',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 10
				// gadgets
				array(
					'post_title'        => 'Amazon makes it easier to put Alexa in every room with Dot multipacks and ESP',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 11
				// gadgets
				array(
					'post_title'        => 'Introducing MOTI, your smart companion and life coach',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 12
				// gadgets
				array(
					'post_title'        => 'Google wants to teach computers to create art from scratch',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 13
				// gadgets
				array(
					'post_title'        => 'Facebook might soon let you earn money from your posts',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 14
				// gadgets
				array(
					'post_title'        => 'Samsung may follow Apple&#x2019;s lead and ditch the headphone jack',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),


				//
				// Mobile cats
				//
				// 1
				// android
				3   => array(
					'post_title'        => 'Microsoft and Autodesk help industrial designers collaborating in mixed reality with HoloLens',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 2
				// android
				array(
					'post_title'        => 'Cinemax and HBO are coming to PlayStation',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 3
				// android
				array(
					'post_title'        => 'Apple releases iOS 10 Gold Master to beta testers five days early',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 4
				// android
				array(
					'post_title'        => 'Apple&#x2019;s court win could force Samsung to change its smartphone features',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 5
				// android
				array(
					'post_title'        => 'Apple execs defend removal of &#x2018;dinosaur&#x2019; headphone jack',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 6
				// android
				array(
					'post_title'        => 'Apple&#x2019;s iPhone 7 recap video will make your heart beat and your eyes blink',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 7
				// android
				array(
					'post_title'        => 'Why you can&#x2019;t get an iPhone 7 Plus on launch day',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 8
				// android
				array(
					'post_title'        => 'Apple can do better than this lame ad with James Corden',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 9
				// android
				array(
					'post_title'        => 'The case for cases: Why I&#x2019;m wrapping my iPhone 7 in leather',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 10
				// android
				array(
					'post_title'        => 'T-Mobile offers 100% refund on Samsung Galaxy Note 7 amid explosion recall',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),


				// 11
				// applications
				4   => array(
					'post_title'        => 'Google might launch its AI-powered Allo messaging app thisweek',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 12
				// applications
				array(
					'post_title'        => 'Samsung will mark replacement Note 7 devices with a blue S on the box',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 13
				// applications
				array(
					'post_title'        => 'The case for cases: Why I&#x2019;m wrapping my iPhone 7 in leather',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 14
				// applications
				array(
					'post_title'        => 'Trulia&#x2019;s new Facebook Messenger bot helps find you a place to live',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 15
				// applications
				array(
					'post_title'        => 'Google&#x2019;s AI-powered Allo messaging app is now available',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 16
				// applications
				array(
					'post_title'        => 'Google is teasing Android users over the name of its newest OS',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 17
				// applications
				array(
					'post_title'        => 'Quip has integrated its conversations and &#x2018;living documents&#x2019; with Slack',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 18
				// applications
				array(
					'post_title'        => 'Spotify is punishing artists with Apple exclusives by decreasing their visibility',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 19
				// applications
				array(
					'post_title'        => 'YouTube is now 97% encrypted so you can watch your cat videos in peace',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 20
				// applications
				array(
					'post_title'        => 'Kim Dotcom has big plans for cloud storage and Bitcoin in 2017',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),


				// 21
				// iphone
				1   => array(
					'post_title'        => 'Warning: iOS 10 is reportedly screwing up people&#x2019;s phones',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 22
				// iphone
				array(
					'post_title'        => 'Microsoft may kill the Lumia brand in favor of a new Surface Phone',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 23
				// iphone
				array(
					'post_title'        => 'Missed the Windows Phone update deadline? You can still upgrade for free',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 24
				// iphone
				array(
					'post_title'        => 'Urban Airship Reach pushes Windows Phone Pay to the next level',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 25
				// iphone
				array(
					'post_title'        => 'How to force Windows 10 to save data on tethered or weak networks',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 26
				// iphone
				array(
					'post_title'        => 'Real users don&#x2019;t care about Apple Pay and contactless mobile payments',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 27
				// iphone
				array(
					'post_title'        => 'Microsoft&#x2019;s deep learning toolkit for speech recognition is now on GitHub',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 28
				// iphone
				array(
					'post_title'        => 'You&#x2019;ll get more out of WWDC with the new Stanford course on developing iOS apps in Swift',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 29
				// iphone
				array(
					'post_title'        => 'KFC &#x2018;Watt a Box&#x2019; lets you charge your devices and nosh on greasy goodness',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 30
				// iphone
				array(
					'post_title'        => 'Nest is working on a smart baby crib for dumb parents',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'Twitter&#x2019;s new relaxed character count limits have finally arrived',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'Sony&#x2019;s Xperia Ear wireless earbud is coming in November',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'Android developers can now apply to put public betas in the Google Play store',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'MegaBots builds up to giant robot duel with new YouTube series',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'Microsoft renames Health app to Band after rumors of the wearable&#x2019;s demise',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'Uber&#x2019;s Scheduled Rides launches in Australia, but drivers won&#x2019;t get more pay',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),


				// 31
				// windows-phone
				5   => array(
					'post_title'        => 'This setting prevents you from using the sweet Message effects in iOS 10',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 32
				// windows-phone
				array(
					'post_title'        => 'Oculus and the NBA just made the best VR footage I&#x2019;ve seen',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 33
				// windows-phone
				array(
					'post_title'        => 'Watch how the iPhone 7 handles knife scratches and intense bending',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 34
				// windows-phone
				array(
					'post_title'        => 'This is how Windows Phone users are reacting to Pok&#xE9;mon Go',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 35
				// windows-phone
				array(
					'post_title'        => 'Disney just filed a patent for real lightsabers (sorta)',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 36
				// windows-phone
				array(
					'post_title'        => 'A two-year-old offers a creative (but non-ideal) solution to &#x2018;The Trolley Problem&#x2019;',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 37
				// windows-phone
				array(
					'post_title'        => '5 personality traits of a successful freelance developer',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 38
				// windows-phone
				array(
					'post_title'        => 'The new Australian $5 bills look like they&#x2019;re from the future',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 39
				// windows-phone
				array(
					'post_title'        => 'Apple&#x2019;s set to drop macOS &#x2018;Sierra&#x2019; on the world later this month',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 40
				// windows-phone
				array(
					'post_title'        => 'A lifetime of Droplr Pro&#x2019;s premium file sharing service is now just $29.99',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),


				// 1
				// video
				array(
					'post_title'        => 'Apple and Samsung are the only companies making money from smartphones',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 2
				// video
				array(
					'post_title'        => 'Windows cameras are finally getting a panorama mode because it&#x2019;s 2017',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 3
				// video
				array(
					'post_title'        => 'Google will give discounted Uber rides to anyone using Android Pay',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 4
				// video
				array(
					'post_title'        => '$200M acquisition of Turi proves Apple&#x2019;s dead serious about AI',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 5
				// video
				array(
					'post_title'        => 'A Tesla saved its owners life by using autopilot to get him to the hospital',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 6
				// video
				array(
					'post_title'        => 'Facebook might be bringing public chat rooms to Messenger',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
				),
				// 7
				// video
				array(
					'post_title'        => 'he Complete Web Developer Course is your fast track to a programming career (92% off)',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 8
				// video
				array(
					'post_title'        => 'Woman shot while &#x201C;playing Pok&#xE9;mon Go&#x201D; didn&#x2019;t have a phone',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 9
				// video
				array(
					'post_title'        => 'The Apple Watch Series 2 has GPS and a bigger battery',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 10
				// video
				array(
					'post_title'        => 'Kobo is back with a large waterproof e-reader to take on the Kindle Oasis',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),


				// 1
				// review
				0   => array(
					'post_title'        => 'iPhone 7 Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '4',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '7',
								),
							),
						),
					),
				),
				// 2
				// review
				array(
					'post_title'        => 'Galaxy Note Bomb Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '4',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '1',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '2',
								),
							),
						),
					),
				),
				// 3
				// review
				array(
					'post_title'        => 'iPad Pro review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '3',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '2',
								),
							),
						),
					),
				),
				// 4
				// review
				array(
					'post_title'        => 'Oculus Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '2',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '4',
								),
							),
						),
					),
				),
				// 5
				// review
				array(
					'post_title'        => 'Sony PS4 review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '3',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '5',
								),
							),
						),
					),
				),
				// 6
				// review
				array(
					'post_title'        => 'Apple Watch Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '3',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '6',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '4',
								),
							),
						),
					),
				),
				// 7
				// review
				array(
					'post_title'        => 'Themeforest Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '4',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '7',
								),
							),
						),
					),
				),
				// 8
				// review
				array(
					'post_title'        => 'BetterStudio Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '4',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '7',
								),
							),
						),
					),
				),
				// 9
				// review
				array(
					'post_title'        => 'Publisher Theme Review',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '4',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '7',
								),
							),
						),
					),
				),
				// 10
				// review
				array(
					'post_title'        => 'The Best Rewiew',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-1'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'Custom Title For Review?',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'Criteria 1',
									'rate'  => '8',
								),
								array(
									'label' => 'Criteria 2',
									'rate'  => '5',
								),
								array(
									'label' => 'Criteria 3',
									'rate'  => '4',
								),
								array(
									'label' => 'Criteria 4',
									'rate'  => '9',
								),
								array(
									'label' => 'Criteria 5',
									'rate'  => '7',
								),
							),
						),
					),
				),


				//
				// BetterAds posts
				//
				array(
					'the_id'     => 'bs-post-ad-940x160',
					'post_title' => '940x180 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-940x180}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-180x480',
					'post_title' => '180x480 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-180x480}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-728x90',
					'post_title' => '728x90 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-728x90}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-300x250',
					'post_title' => '300x250 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-300x250}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-120x240-2',
					'post_title' => '120x240 Banner - 2',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-120x240}:\'full\'%%'
						),
						array(
							'meta_key'   => 'campaign',
							'meta_value' => '%%bs-post-ad-campaign-1%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-120x240-1',
					'post_title' => '120x240 Banner - 1',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- Advertisement -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-120x240}:\'full\'%%'
						),
						array(
							'meta_key'   => 'campaign',
							'meta_value' => '%%bs-post-ad-campaign-1%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-campaign-1',
					'post_title' => '120 Banners Campaign',
					'post_type'  => 'better-campaign',
				),
			),
		), // post


		//
		// ->Options
		//
		'options'  => array(

			'multi_steps' => false,

			//step one
			array(
				//
				// Panel options
				//
				array(
					'type'              => 'option',
					'option_name'       => publisher_get_theme_panel_id(),
					'option_value_file' => $demo_path . 'options.json',
				),
				array(
					'type'          => 'option',
					'option_name'   => publisher_get_theme_panel_id(),
					'option_value'  => array(
						'logo_text'         => 'Publisher',
						'logo_image'        => '%%bf_product_demo_media_url:{bs-logo}:\'full\'%%',
						'logo_image_retina' => '',
					),
					'merge_options' => true,
				),

				// Theme Style
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_style',
					'option_value' => $style_id,
				),

				// Theme Demo
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_demo',
					'option_value' => $style_id,
				),


				//
				// Update front page
				//
				array(
					'type'         => 'option',
					'option_name'  => 'page_on_front',
					'option_value' => '%%bs-front-page%%',
				),
				array(
					'type'         => 'option',
					'option_name'  => 'show_on_front',
					'option_value' => 'page',
				),


				//
				// Aside Ad
				//
				array(
					'type'          => 'option',
					'merge_options' => true,
					'option_name'   => 'better_ads_manager',
					'option_value'  => array(
						'header_aside_logo_type'   => 'banner',
						'header_aside_logo_banner' => '%%bs-post-ad-728x90%%',
						'header_aside_logo_align'  => is_rtl() ? 'left' : 'right',
					),
				),

			)
		), // options


		//
		// ->Widgets
		//
		'widgets'  => array(
			'multi_steps' => false,
			array(

				//
				// Primary sidebar
				//
				'primary-sidebar'   => array(
					'remove_all_widgets' => true,
					array(
						'widget_id'       => 'better-social-counter',
						'widget_settings' => array(
							'title' => 'Stay With Us',
							'order' => 'facebook,twitter,google,youtube,instagram,vimeo,pinterest,envato',
						)
					),
					array(
						'widget_id'       => 'bs-mix-listing-3-4',
						'widget_settings' => array(
							'category' => '%%bs-gadgets%%',
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'  => '',
							'type'   => 'banner',
							'banner' => '%%bs-post-ad-300x250%%',
						)
					),
					array(
						'widget_id'       => 'bs-text-listing-1',
						'widget_settings' => array(
							'title' => 'Latest News',
							'count' => 3,
						)
					),
					array(
						'widget_id'       => 'bs-newsletter-mailchimp',
						'widget_settings' => array(
							'title'          => 'Newsletter',
							'mailchimp-code' => '<form action="//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b" method="post"',
							'mailchimp-url'  => '//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b',
							'msg'            => 'Subscribe our newsletter to stay updated.',
							'image'          => '%%bf_product_demo_media_url:{bs-media-email}:\'full\'%%',
						)
					),
				),

				//
				// Secondary sidebar
				//
				'secondary-sidebar' => array(
					'remove_all_widgets' => true,

					array(
						'widget_id'       => 'bs-text-listing-4',
						'widget_settings' => array(
							'title'                    => 'News',
							'count'                    => 8,
							'paginate'                 => 'slider',
							'slider-control-dots'      => 'style-1',
							'slider-control-next-prev' => 'off',
							'bf-widget-title-icon'     => array(
								'type' => 'fontawesome',
								'icon' => 'fa-rss',
							),
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'  => '',
							'type'   => 'banner',
							'banner' => '%%bs-post-ad-180x480%%',
						)
					),
				),
			),
		), // widgets


		//
		// ->Menus
		//
		'menus'    => array(
			'multi_step' => false,

			array(
				//
				// Main navigation
				//
				array(
					'menu-name'     => 'Main Navigation',
					'menu-location' => 'main-menu',
					'recently-edit' => true,
					'items'         => array(
						array(
							'the_id'    => 'bs-menu-main-home',
							'item_type' => 'page',
							'page_id'   => '%%bs-front-page%%',
							'title'     => 'Home',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-home',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-mobile%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-mobile-phone',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
								array(
									'meta_key'   => 'mega_menu',
									'meta_value' => 'tabbed-grid-posts',
								),
								array(
									'meta_key'   => 'drop_menu_anim',
									'meta_value' => 'slide-bottom-in',
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-gadgets%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-cubes',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-video%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-play-circle',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
								array(
									'meta_key'   => 'mega_menu',
									'meta_value' => 'grid-posts',
								),
								array(
									'meta_key'   => 'drop_menu_anim',
									'meta_value' => 'slide-fade',
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-reviews%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-star-half-empty',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-android%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-android',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-iphone%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-apple',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),

					)
				),

				//
				// Topbar navigation
				//
				array(
					'menu-name'     => 'Topbar Navigation',
					'menu-location' => 'top-menu',
					'items'         => array(
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-gadgets%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-mobile%%',
							'taxonomy'  => 'category',
						),
					)
				),

				//
				// Footer navigation
				//
				array(
					'menu-name'     => 'Footer Navigation',
					'menu-location' => 'footer-menu',
					'items'         => array(
						array(
							'item_type' => 'page',
							'page_id'   => '%%bs-front-page%%',
							'title'     => 'Home',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-home',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-mobile%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-mobile-phone',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-android%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-android',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-iphone%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-apple',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
					)
				),
			),

		), // menus

	);
}