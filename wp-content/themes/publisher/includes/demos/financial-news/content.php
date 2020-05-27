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

	$style_id       = 'financial-news';
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
						'name'     => 'Ahead',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.32',
					),
					array(
						'name'     => 'Amazon',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.33',
					),
					array(
						'name'      => 'Analysis',
						'taxonomy'  => 'category',
						'term_meta' => array(
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
						'name'     => 'Apple',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.34',
					),
					array(
						'name'     => 'Apple',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.63',
					),
					array(
						'name'     => 'Asus',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.88',
					),
					array(
						'name'     => 'Banking',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.76',
					),
					array(
						'name'     => 'Binance Coin',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.74',
					),
					array(
						'name'     => 'Bitcoin',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.35',
					),
					array(
						'name'     => 'Bitcoin',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.36',
					),
					array(
						'name'     => 'Bitcoin',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.64',
					),
					array(
						'name'     => 'Blockchain',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.37',
					),
					array(
						'name'     => 'Bonds',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'Bonds',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.38',
					),
					array(
						'name'      => 'Business',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-3',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Cardano',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.71',
					),
					array(
						'name'     => 'Careers',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.39',
					),
					array(
						'name'     => 'Commodities',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Commodities',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.40',
					),
					array(
						'name'     => 'Companies',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Companies',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.41',
					),
					array(
						'name'      => 'Crypto',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'Cryptocurrency',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'Cryptocurrency',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.42',
					),
					array(
						'name'     => 'Custom Builder',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.81',
					),
					array(
						'name'     => 'Deals',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.84',
					),
					array(
						'name'     => 'Entrepreneurship',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'Entrepreneurship',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.43',
					),
					array(
						'name'     => 'ETFs',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.44',
					),
					array(
						'name'     => 'Ethereum',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Farex',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.66',
					),
					array(
						'name'     => 'Fast Company',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.82',
					),
					array(
						'name'     => 'Finance',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Finance',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.45',
					),
					array(
						'name'     => 'Finance Discounts',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.85',
					),
					array(
						'name'     => 'Fintech',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.46',
					),
					array(
						'name'     => 'Forex',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Forex',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.47',
					),
					array(
						'name'     => 'Funds',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.48',
					),
					array(
						'name'     => 'Global Trade',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'Global Trade',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.49',
					),
					array(
						'name'     => 'Google',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.50',
					),
					array(
						'name'     => 'Indices',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.51',
					),
					array(
						'name'     => 'Industries',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Industries',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.52',
					),
					array(
						'name'     => 'Intel',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.53',
					),
					array(
						'name'     => 'Litecoin',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Managment',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.78',
					),
					array(
						'name'     => 'Market',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.65',
					),
					array(
						'name'     => 'Market Overview',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'      => 'Markets',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'Markets',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.18',
					),
					array(
						'name'     => 'Markets',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.54',
					),
					array(
						'name'     => 'Microsoft',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.55',
					),
					array(
						'name'     => 'Millennials & Money',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.56',
					),
					array(
						'name'     => 'Mining',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.19',
					),
					array(
						'name'     => 'Money',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.67',
					),
					array(
						'name'     => 'News',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.68',
					),
					array(
						'name'      => 'Opinion',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.20',
					),
					array(
						'name'      => 'Personal Finance',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.21',
					),
					array(
						'name'     => 'Qualcomm',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.57',
					),
					array(
						'name'     => 'Real Estate',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.22',
					),
					array(
						'name'     => 'Ripple',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'     => 'Save',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.24',
					),
					array(
						'name'     => 'Sony',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.87',
					),
					array(
						'name'     => 'Spend',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.25',
					),
					array(
						'name'     => 'Stellar',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.72',
					),
					array(
						'name'     => 'Stock Markets',
						'parent'   => '%%taxonomy.primary.2%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.26',
					),
					array(
						'name'     => 'Stocks',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.27',
					),
					array(
						'name'     => 'Strategy',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.83',
					),
					array(
						'name'     => 'Success',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.80',
					),
					array(
						'name'     => 'Sumsung',
						'parent'   => '%%taxonomy.primary.28%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.86',
					),
					array(
						'name'      => 'Technology',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-11',
							),
						),
						'the_id'    => 'taxonomy.primary.28',
					),
					array(
						'name'     => 'Technology',
						'parent'   => '%%taxonomy.primary.20%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.29',
					),
					array(
						'name'     => 'Technology of Business',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.30',
					),
					array(
						'name'     => 'Veritaseum',
						'parent'   => '%%taxonomy.primary.7%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.75',
					),
					array(
						'name'     => 'Videos',
						'parent'   => '%%taxonomy.primary.17%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.77',
					),
					array(
						'name'     => 'Wheels',
						'parent'   => '%%taxonomy.primary.21%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.31',
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
						'the_id'            => 'posts.primary.346',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'After Header Injection',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.1111',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.345',
					),
					array(
						'post_title'        => 'ANALYSIS CryptoKitties Sales Hit $12 Million, Could be Ethereum’s Killer App After All',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.37%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.19%%,%%taxonomy.primary.23%%',
						),
						'the_id'            => 'posts.primary.389',
					),
					array(
						'post_title'        => 'Bitcoin Anarchist Amir Taaki Talks Technology’s Purpose and Altcoins (Interview part 2)',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.37%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.23%%',
						),
						'the_id'            => 'posts.primary.388',
					),
					array(
						'post_title'        => 'Tom Lee Says BTC Will Hit $25,000 in 2018, Advises ‘Aggressive’ Buying At Market Low',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.10%%,%%taxonomy.primary.19%%,%%taxonomy.primary.23%%',
						),
						'the_id'            => 'posts.primary.390',
					),
					array(
						'post_title'        => 'The Bitcoin Rival Whose Price Has Risen Five Times Faster Than its Big Brother',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.35%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%',
						),
						'the_id'            => 'posts.primary.386',
					),
					array(
						'post_title'        => 'Wall Street is getting worried social media outrage over EA\'s ‘Star Wars’ game may hurt sales',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.42%%,%%taxonomy.primary.47%%,%%taxonomy.primary.51%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.446',
					),
					array(
						'post_title'        => 'State legislators call EAs game a Star Wars-themed online casino preying on kids vow action',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.42%%,%%taxonomy.primary.47%%,%%taxonomy.primary.51%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.433',
					),
					array(
						'post_title'        => 'Bitcoin tanks more than 10% to below $11,000; South Korea announces details on crypto tax',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.37%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.23%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.387',
					),
					array(
						'post_title'        => 'Coincheck To Refund All Customers Affected By Hack, Faced By Community',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.35%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.385',
					),
					array(
						'post_title'        => 'What the Fork? New SegWit2x Launches With Massive Premine, Unknown Development Team',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.10%%,%%taxonomy.primary.19%%,%%taxonomy.primary.23%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.393',
					),
					array(
						'post_title'        => 'There Are At Least Twice as Many Bitcoin Traders in Brazil as Stock Investors',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.395',
					),
					array(
						'post_title'        => 'Bitcoin and Ethereum and Bitcoin Cash and Ripple and IOTA and Litecoin and Dash and Monero: Price Analysis',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.10%%,%%taxonomy.primary.19%%,%%taxonomy.primary.23%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.392',
					),
					array(
						'post_title'        => 'South Korean Card Companies Block Transactions to Overseas Cryptocurrency Exchanges',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.23%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.397',
					),
					array(
						'post_title'        => 'Billionaire hedge fund manager Ken Griffin says bitcoin has elements of the tulip bulb mania',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.38%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.436',
					),
					array(
						'post_title'        => 'Samourai Wallet Introduces Bitcoin via SMS Text Message for Censorship Resistance',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.35%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.396',
					),
					array(
						'post_title'        => 'Justice Department’s action against AT&T and Time Warner’s deal could put a chill on media stocks',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.40%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.438',
					),
					array(
						'post_title'        => 'When the unexpected strikes, here are 5 ways to avoid financial disaster during a disability',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.43%%,%%taxonomy.primary.49%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.496',
					),
					array(
						'post_title'        => 'The student loan interest deduction is on the block. Here’s what that will cost you',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.43%%,%%taxonomy.primary.49%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.497',
					),
					array(
						'post_title'        => 'Get ready for a ‘substantial’ slowdown in the US economy, investment bank predicts',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.41%%,%%taxonomy.primary.49%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.494',
					),
					array(
						'post_title'        => 'Exclusive: EU antitrust regulators to fine NYK, Wilhelmsen, other car shipping firms - sources',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.41%%,%%taxonomy.primary.49%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.493',
					),
					array(
						'post_title'        => 'Trump reportedly prepped executive order that could gut Obamacare’s individual mandate',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.45%%,%%taxonomy.primary.52%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.491',
					),
					array(
						'post_title'        => 'This Amazon seller lost $400,000 in sales after being attacked by self-proclaimed virus of Amazon',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.40%%,%%taxonomy.primary.47%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%',
						),
						'the_id'            => 'posts.primary.440',
					),
					array(
						'post_title'        => 'Profits don’t matter for investors anymore, only whether a company can beat Amazon or Netflix',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.40%%,%%taxonomy.primary.47%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%',
						),
						'the_id'            => 'posts.primary.441',
					),
					array(
						'post_title'        => 'Amazon\'s cloud is about to announce a huge deal with health technology company Cerner',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.40%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.448',
					),
					array(
						'post_title'        => 'Bitcoin price WARNING: US Government will KILL unless THIS happens',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.37%%,%%taxonomy.primary.7%%,%%taxonomy.primary.15%%,%%taxonomy.primary.23%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.398',
					),
					array(
						'post_title'        => 'Paul Ryan: Senate will have to take lead on scrapping Obamacare individual mandate in the tax bill',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.42%%,%%taxonomy.primary.47%%,%%taxonomy.primary.51%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.444',
					),
					array(
						'post_title'        => 'US airline passengers like ‘spoiled brats,’ says veteran investor after near $50 billion Airbus deal',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.42%%,%%taxonomy.primary.47%%,%%taxonomy.primary.51%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%',
						),
						'the_id'            => 'posts.primary.443',
					),
					array(
						'post_title'        => 'Apple could be a $1 trillion company within the next year thanks to the iPhone X, analyst says',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.42%%,%%taxonomy.primary.47%%,%%taxonomy.primary.51%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%',
						),
						'the_id'            => 'posts.primary.442',
					),
					array(
						'post_title'        => 'Instant Pot is selling like crazy on Amazon—and its PhD inventor says he’s read all 39,000 reviews',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.38%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%,%%taxonomy.primary.77%%',
						),
						'the_id'            => 'posts.primary.437',
					),
					array(
						'post_title'        => 'China Regulators Visit Coinbase, Others To Discuss ‘Significant’ Crypto Issues: London Scene Roundup',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%,%%taxonomy.primary.10%%,%%taxonomy.primary.19%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.383',
					),
					array(
						'post_title'        => 'Goldman expects another calm and rising market next year and has a strategy to capitalize on it',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.5%%,%%taxonomy.primary.84%%,%%taxonomy.primary.12%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.642',
					),
					array(
						'post_title'        => 'Exclusive: Bank of America Merrill Lynch to pay $26 million for allegedly failing to report suspicious transactions',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.5%%,%%taxonomy.primary.8%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.644',
					),
					array(
						'post_title'        => 'When $8 billion is yours to lose: How Uber’s top investor suffered through the wildest tech drama of the year',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.5%%,%%taxonomy.primary.84%%,%%taxonomy.primary.12%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.640',
					),
					array(
						'post_title'        => 'Gallery:Bitcoin is the most crowded investment in the world according to widely followed investor survey',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.3%%,%%taxonomy.primary.84%%,%%taxonomy.primary.12%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.639',
					),
					array(
						'post_title'        => 'GM to shut one South Korea plant, decide on fate of others within weeks',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.3%%,%%taxonomy.primary.84%%,%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.637',
					),
					array(
						'post_title'        => 'Gallery:Meet the home design company that gives full service interior design for as little as $79',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.3%%,%%taxonomy.primary.84%%,%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.638',
					),
					array(
						'post_title'        => 'US foreign policy prompted Russia to become ‘masters’ of cyberwarfare, Blackstone’s Studzinski says',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.8%%,%%taxonomy.primary.85%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.645',
					),
					array(
						'post_title'        => 'Top VC deals this week: Amazon buys Blink, Daimler backs an Uber competitor, Didi raises billions',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.8%%,%%taxonomy.primary.85%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.646',
					),
					array(
						'post_title'        => 'What Amazon’s HQ2 means for homeowners, home buyers and renters in the chosen city',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.8%%,%%taxonomy.primary.85%%',
						),
						'the_id'            => 'posts.primary.636',
					),
					array(
						'post_title'        => 'Federal Reserve set to hike rates to 1.5pc but weak inflation knocks hopes of quickenin',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.8%%,%%taxonomy.primary.85%%',
						),
						'the_id'            => 'posts.primary.635',
					),
					array(
						'post_title'        => 'Obamacare enrollment blows away expectations at nearly 9 million, despite short sign-up window',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.5%%,%%taxonomy.primary.85%%,%%taxonomy.primary.12%%,%%taxonomy.primary.26%%',
						),
						'the_id'            => 'posts.primary.650',
					),
					array(
						'post_title'        => 'SpaceX and Iridium launching satellites that could someday revolutionize international air travel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.3%%,%%taxonomy.primary.85%%,%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.649',
					),
					array(
						'post_title'        => 'Here’s a look at the massive new campus Google wants to build a few miles from its headquarters',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.3%%,%%taxonomy.primary.85%%,%%taxonomy.primary.16%%',
						),
						'the_id'            => 'posts.primary.648',
					),
					array(
						'post_title'        => 'Questor: Both share prices and yields have been climbing – the outlook for 2018 is bright',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.14%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.651',
					),
					array(
						'post_title'        => 'Trump administration plans temporary shutdown of petition function on WhiteHouse website',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.14%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.666',
					),
					array(
						'post_title'        => 'Druckenmiller: Central banks are financial world’s Darth Vader creating exploding asset bubbles',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.6%%,%%taxonomy.primary.14%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.658',
					),
					array(
						'post_title'        => 'GOP plan would stick millions with bigger tax bills—this chart shows your odds of getting hit',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.9%%,%%taxonomy.primary.14%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.659',
					),
					array(
						'post_title'        => 'Republicans reach a tentative tax deal; Trump says he\'d sign a bill with 21% corporate rate',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.6%%,%%taxonomy.primary.13%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.657',
					),
					array(
						'post_title'        => 'HR Confidential: I fired her. Then she revealed all of the office\'s sordid sex-and-drugs stories',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.6%%,%%taxonomy.primary.13%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.656',
					),
					array(
						'post_title'        => 'Tax cut-driven economic growth alone won’t wipe out the deficit, top House tax writer Brady admits',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.45%%,%%taxonomy.primary.52%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.489',
					),
					array(
						'post_title'        => 'There’s a one-bedroom condo for sale in Miami — and the seller will only accept bitcoin',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.6%%,%%taxonomy.primary.13%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.655',
					),
					array(
						'post_title'        => 'Facebook slams former exec Palihapitiya, saying it was a very different company back then',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.9%%,%%taxonomy.primary.14%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.660',
					),
					array(
						'post_title'        => 'Companies are paying a shockingly low ‘effective’ tax rate of just 13% right now, calculates Wall Street economist',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.661',
					),
					array(
						'post_title'        => 'In Pictures: Protests erupt in Middle East after Trump recognizes Jerusalem as Israeli capital',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.14%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.653',
					),
					array(
						'post_title'        => 'Gallery:Disney deal with Fox would be a ‘home run’ in battle against Netflix and Amazon, analyst Ives says',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.14%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.654',
					),
					array(
						'post_title'        => 'Shaq once spent $1 million in an hour—here are 3 other NBA stars who lost thousands',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.14%%,%%taxonomy.primary.18%%',
						),
						'the_id'            => 'posts.primary.652',
					),
					array(
						'post_title'        => 'HNA unit shares set to jump 15 percent after it sells HK sites for $2 billion',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.6%%,%%taxonomy.primary.13%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.665',
					),
					array(
						'post_title'        => 'Warren Buffett called bitcoin ‘a mirage’ in 2014—here’s where he says you should invest your money',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.13%%,%%taxonomy.primary.30%%',
						),
						'the_id'            => 'posts.primary.663',
					),
					array(
						'post_title'        => 'SECURITY Parity Wallet ‘Continues Investigating’ $300 Mln Lock as Ambisafe Reports No Losses',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.37%%,%%taxonomy.primary.7%%,%%taxonomy.primary.19%%,%%taxonomy.primary.23%%,%%taxonomy.primary.72%%,%%taxonomy.primary.75%%',
						),
						'the_id'            => 'posts.primary.399',
					),
					array(
						'post_title'        => 'South Korea, a critical US ally, is feeling left out and Trump has a chance to fix things',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.81%%,%%taxonomy.primary.43%%,%%taxonomy.primary.49%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.486',
					),
					array(
						'post_title'        => 'Samsung Founder to Be Fined For Storing Billions in 200 Offshore Accounts, Bitcoin’s Merit',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.10%%,%%taxonomy.primary.19%%,%%taxonomy.primary.23%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.391',
					),
					array(
						'post_title'        => 'Fingerlings are selling out everywhere—here’s how a 28-year-old engineered the viral toy frenzy',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.5%%,%%taxonomy.primary.12%%,%%taxonomy.primary.26%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.641',
					),
					array(
						'post_title'        => 'Goldman says the economy is doing so well the Fed will need to stop it from overheating next year',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.40%%,%%taxonomy.primary.47%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.439',
					),
					array(
						'post_title'        => 'Best gadgets for shoppers on a budget, from Bluetooth headphones to a Fire TV stick',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.38%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=QQgOJoZduRc',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.435',
					),
					array(
						'post_title'        => 'Indonesia stocks lower at close of trade; IDX Composite Index down 0.59%',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.42%%,%%taxonomy.primary.47%%,%%taxonomy.primary.51%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.449',
					),
					array(
						'post_title'        => 'Coinbase Overshoots 2017 Revenue Goal By 66% Making $1 Bln, Rejects Further VC Funding',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.34%%,%%taxonomy.primary.50%%,%%taxonomy.primary.55%%,%%taxonomy.primary.87%%,%%taxonomy.primary.28%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=QQgOJoZduRc',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.584',
					),
					array(
						'post_title'        => 'Chinese drone maker wants to fly people around, and it says it will turn a profit in two years',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.662',
					),
					array(
						'post_title'        => 'Ethereum Miners Opt for Leasing Boeing 747s to Ship Critical Amount of GPUS',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.34%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.55%%,%%taxonomy.primary.57%%,%%taxonomy.primary.87%%,%%taxonomy.primary.28%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.583',
					),
					array(
						'post_title'        => 'How science is moving toward diagnosing and treating the NFL’s biggest problem: Brain injuries',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.43%%,%%taxonomy.primary.52%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.488',
					),
					array(
						'post_title'        => 'Morgan Stanley Now Clearing Bitcoin Futures for Clients, Helping Institutions Gain Exposure',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.33%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.87%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.580',
					),
					array(
						'post_title'        => 'What the Fork? New SegWit2x Launches With Massive Premine, Unknown Development Team',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.33%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.57%%,%%taxonomy.primary.87%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.581',
					),
					array(
						'post_title'        => 'Defense stocks are a top trade since Trump’s election — here are the other winners and losers',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.82%%,%%taxonomy.primary.56%%,%%taxonomy.primary.21%%,%%taxonomy.primary.25%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.546',
					),
					array(
						'post_title'        => 'Panasonic third operating profit jumps 23 percent',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.5%%,%%taxonomy.primary.12%%,%%taxonomy.primary.26%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.643',
					),
					array(
						'post_title'        => 'Lloyds Banking Group bans credit purchases of Bitcoin',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.41%%,%%taxonomy.primary.81%%,%%taxonomy.primary.49%%,%%taxonomy.primary.20%%,%%taxonomy.primary.29%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.495',
					),
					array(
						'post_title'        => 'Forex -Dollar Weakens Further Against Yen, Aussie Gains Services',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.38%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=QQgOJoZduRc',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.445',
					),
					array(
						'post_title'        => 'Crude Oil Prices Fall In Asia As Risk Sentiment Weighs On Markets',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.74%%,%%taxonomy.primary.71%%,%%taxonomy.primary.7%%,%%taxonomy.primary.10%%,%%taxonomy.primary.19%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.394',
					),
					array(
						'post_title'        => 'Gold Dips In Asia As Dollar Direction Eyed With Steeper Yield Curve',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.34%%,%%taxonomy.primary.50%%,%%taxonomy.primary.55%%,%%taxonomy.primary.87%%,%%taxonomy.primary.28%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.596',
					),
					array(
						'post_title'        => 'Bitcoin Futures’ Future: Slow, Measured, No Mom and Pop Investors',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.81%%,%%taxonomy.primary.45%%,%%taxonomy.primary.52%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.29%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.490',
					),
					array(
						'post_title'        => 'How Two Unexpected Factors Will Drive What\'s Next In Cryptocurrency Trends',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%,%%taxonomy.primary.39%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.542',
					),
					array(
						'post_title'        => 'Nasdaq and Palestine Exchange Sign New Market Technology',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.76%%,%%taxonomy.primary.38%%,%%taxonomy.primary.44%%,%%taxonomy.primary.48%%,%%taxonomy.primary.78%%,%%taxonomy.primary.17%%,%%taxonomy.primary.27%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.447',
					),
					array(
						'post_title'        => 'Scammers Steal Over $1.8 Mln By Posing As Admins of Steele',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.81%%,%%taxonomy.primary.45%%,%%taxonomy.primary.52%%,%%taxonomy.primary.20%%,%%taxonomy.primary.29%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=QQgOJoZduRc',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.492',
					),
					array(
						'post_title'        => 'Resolution of Kashmir issue must for peace, says Pakistan',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.81%%,%%taxonomy.primary.45%%,%%taxonomy.primary.52%%,%%taxonomy.primary.20%%,%%taxonomy.primary.29%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=QQgOJoZduRc',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.481',
					),
					array(
						'post_title'        => 'Crude Oil, Gold Prices Look to US Dollar for Direction Cues',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.11%%,%%taxonomy.primary.13%%,%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.664',
					),
					array(
						'post_title'        => 'Italy\'s Leonardo to step up Asia sales under new business plan',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.36%%,%%taxonomy.primary.50%%,%%taxonomy.primary.55%%,%%taxonomy.primary.87%%,%%taxonomy.primary.28%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.585',
					),
					array(
						'post_title'        => 'U.S. stocks set up for selloff; Dow futures down 140 pts',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%,%%taxonomy.primary.3%%,%%taxonomy.primary.16%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.647',
					),
					array(
						'post_title'        => 'Ethereum Price Temporarily Affected as China, South Korea Crack Down on ICOs',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.36%%,%%taxonomy.primary.50%%,%%taxonomy.primary.55%%,%%taxonomy.primary.86%%,%%taxonomy.primary.28%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Investing',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.investing.com/',
							),
						),
						'the_id'            => 'posts.primary.587',
					),
					array(
						'post_title'        => 'Lightning Network’s Pizza Day? First Ever Physical Purchase On Lightning Network',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.36%%,%%taxonomy.primary.50%%,%%taxonomy.primary.55%%,%%taxonomy.primary.86%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.586',
					),
					array(
						'post_title'        => 'Twitter CEO Jack Dorsey says the deactivation of Trump’s Twitter should never have been possible',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%,%%taxonomy.primary.39%%,%%taxonomy.primary.84%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.541',
					),
					array(
						'post_title'        => 'Millennials who bought into Snap’s IPO are frustrated, but have ideas on how to fix the company',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%,%%taxonomy.primary.84%%,%%taxonomy.primary.56%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%,%%taxonomy.primary.25%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.543',
					),
					array(
						'post_title'        => 'Any patient investor can turn $5,000 a year into nearly $1 million, says billionaire Ron Baron',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%,%%taxonomy.primary.39%%,%%taxonomy.primary.84%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.540',
					),
					array(
						'post_title'        => 'Current State of Bitcoin, Ethereum Market – Tips for Classic Traders, Crypto Businesses',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.36%%,%%taxonomy.primary.50%%,%%taxonomy.primary.55%%,%%taxonomy.primary.86%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.588',
					),
					array(
						'post_title'        => 'EA’s new ‘Star Wars’ game is so unpopular a developer is apparently getting death threats',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%,%%taxonomy.primary.39%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.538',
					),
					array(
						'post_title'        => 'Trump’s China trip is a test for US natural gas exports and his America First Energy Plan',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.56%%,%%taxonomy.primary.21%%,%%taxonomy.primary.25%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.544',
					),
					array(
						'post_title'        => 'A quarter of all taxpayers would owe more in 10 years under GOP tax plan: Revised report',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.56%%,%%taxonomy.primary.21%%,%%taxonomy.primary.25%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.545',
					),
					array(
						'post_title'        => 'Why an ex-NFL player and actor worth millions still drives the 20-year-old car he took to prom',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.41%%,%%taxonomy.primary.81%%,%%taxonomy.primary.49%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.485',
					),
					array(
						'post_title'        => 'How 2 New Yorkers created a ’19th Hole’ for men’s fashion all the way down in Austin, Texas',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.81%%,%%taxonomy.primary.43%%,%%taxonomy.primary.52%%,%%taxonomy.primary.54%%,%%taxonomy.primary.20%%,%%taxonomy.primary.80%%',
						),
						'the_id'            => 'posts.primary.487',
					),
					array(
						'post_title'        => 'Senate Obamacare fix would cut deficit, not reduce number with health insurance: CBO',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.41%%,%%taxonomy.primary.81%%,%%taxonomy.primary.49%%,%%taxonomy.primary.20%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.484',
					),
					array(
						'post_title'        => 'Trump asked Senate GOP who he should make Fed chair, and it looks like John Taylor won',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.41%%,%%taxonomy.primary.81%%,%%taxonomy.primary.49%%,%%taxonomy.primary.20%%,%%taxonomy.primary.29%%',
						),
						'the_id'            => 'posts.primary.483',
					),
					array(
						'post_title'        => 'A.I. could produce a new sector that we probably dont know about yet Nasdaq vice chair says',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.56%%,%%taxonomy.primary.21%%,%%taxonomy.primary.25%%,%%taxonomy.primary.83%%',
						),
						'the_id'            => 'posts.primary.530',
					),
					array(
						'post_title'        => 'The first digital pill has just been approved here’s how it could revolutionize health care',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.22%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.536',
					),
					array(
						'post_title'        => 'Here’s the new photo app that Shaq, Alicia Keys and Kourtney Kardashian can’t get enough',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%,%%taxonomy.primary.39%%,%%taxonomy.primary.84%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%,%%taxonomy.primary.83%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.539',
					),
					array(
						'post_title'        => 'How two moms came up with a million-dollar invention to keep guacamole from browning',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.22%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.535',
					),
					array(
						'post_title'        => 'St. Louis Fed Sees Future in Crypto As Important Asset Class, Bitcoin As Digital Gold',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.33%%,%%taxonomy.primary.88%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.57%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.591',
					),
					array(
						'post_title'        => 'Entrepreneur Mark Cuban’s Team Launches Ethereum-based Mercury Protocol',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.34%%,%%taxonomy.primary.88%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.57%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.595',
					),
					array(
						'post_title'        => 'Venezuelan Bitcoin Miners Turning to Ethereum After Government Crackdown',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.34%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.57%%,%%taxonomy.primary.86%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.582',
					),
					array(
						'post_title'        => 'Cyber Criminals Have Stolen $225 Mln Worth of Ethereum Through Phishing This Year',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.36%%,%%taxonomy.primary.5%%,%%taxonomy.primary.50%%,%%taxonomy.primary.57%%,%%taxonomy.primary.86%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.589',
					),
					array(
						'post_title'        => 'Bitcoin and Ethereum and Bitcoin Cash and Ripple and IOTA and Litecoin and Dash and Monero',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.33%%,%%taxonomy.primary.88%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.57%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.590',
					),
					array(
						'post_title'        => 'BLOCKCHAIN Ethereum Signs Key Deal with Russian State-Owned Bank For Blockchain Adoption',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.33%%,%%taxonomy.primary.88%%,%%taxonomy.primary.5%%,%%taxonomy.primary.46%%,%%taxonomy.primary.53%%,%%taxonomy.primary.57%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.594',
					),
					array(
						'post_title'        => 'Trust But Verify: First Ethereum Decompiler Launched With JP Morgan Project',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.88%%,%%taxonomy.primary.36%%,%%taxonomy.primary.5%%,%%taxonomy.primary.50%%,%%taxonomy.primary.57%%,%%taxonomy.primary.28%%',
						),
						'the_id'            => 'posts.primary.578',
					),
					array(
						'post_title'        => 'A jittery mood creeps into the market as weird warning signs in the bond market appear',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.22%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.534',
					),
					array(
						'post_title'        => 'Latest estimate shows Senate tax plan would leave low-income households with higher tax bills',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.22%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.533',
					),
					array(
						'post_title'        => 'Fierce competition, cheap money pressure aircraft lease rates: StanChart',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.22%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.532',
					),
					array(
						'post_title'        => 'Apple is launching three iPhones next year, including one with a huge 6.5-inch screen, KGI says',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.32%%,%%taxonomy.primary.3%%,%%taxonomy.primary.82%%,%%taxonomy.primary.21%%,%%taxonomy.primary.24%%,%%taxonomy.primary.31%%',
						),
						'the_id'            => 'posts.primary.537',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Post - 300x250',
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
						'the_id'     => 'posts.primary.265',
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
						'the_id'     => 'posts.primary.49',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner - 300x600',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-600x300}:\'full\'%%',
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
						'the_id'     => 'posts.primary.151',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline Banner - 970x250',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-970x250}:\'full\'%%',
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
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'Newsletter',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'feedburner',
							),
							array(
								'meta_key'   => 'feedburner_id',
								'meta_value' => 'dasf',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-3',
							),
						),
						'the_id'     => 'posts.primary.940',
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
							'logo_image'             => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
							'logo_image_retina'      => '',
							'off_canvas_logo'        => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
							'injection_after_header' => '%%posts.primary.1111%%',
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
						'option_value' => '%%posts.primary.345%%',
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
							'widget_id'       => 'bs-text-listing-3',
							'widget_settings' => array(
								'title'                 => 'Most Popular',
								'count'                 => '6',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'title-limit'       => '120',
									'excerpt-limit'     => '200',
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
								'columns'               => 1,
							),
						),
						array(
							'widget_id'       => 'bsfp-cryptocurrency',
							'widget_settings' => array(
								'title'                => 'Stock Market',
								'style'                => 'widget-27',
								'coins-count'          => '7',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'columns'              => '2',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.49%%',
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
								'content'              => 'Publisher Theme Best Choice for Financial and Cryptocurrency Sites.',
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
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                => 'Topics',
								'nav_menu'             => 62,
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
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                => 'About Us',
								'nav_menu'             => 58,
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
					'footer-4'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                => 'Links',
								'nav_menu'             => 59,
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
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.1138',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.1139',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.1140',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact us',
								'page_id'   => '%%posts.primary.346%%',
								'the_id'    => 'posts.primary.670',
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
								'page_id'   => '%%posts.primary.345%%',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.669',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Most Popular',
								'page_id'   => '%%posts.primary.345%%',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.671',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.42%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.325',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.26%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.326',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.327',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.12%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.316',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.24%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.329',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.28%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.328',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.21%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.274',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.72%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.959',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.77%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.961',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.27%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.669%%',
								'the_id'    => 'posts.primary.960',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.290',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.40%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.292',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.51%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.297',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.47%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.295',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.27%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.298',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.44%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.294',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.48%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.296',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.38%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.291',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.42%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.293',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.76%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.956',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.78%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.957',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.77%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.9%%',
								'the_id'    => 'posts.primary.958',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8  => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
									14 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'NEW',
									),
									16 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#c41515',
									),
								),
								'the_id'    => 'posts.primary.8',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.283',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.35%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.284',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.10%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.286',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.23%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.289',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.287',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.19%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.288',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.37%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.285',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.72%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.953',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.71%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.952',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.74%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.954',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.75%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.8%%',
								'the_id'    => 'posts.primary.955',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.20%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.20%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.299',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.52%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.304',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.45%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.302',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.54%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.305',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.49%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.303',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.41%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.300',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.43%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.301',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.29%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.306',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.81%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.962',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.80%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.10%%',
								'the_id'    => 'posts.primary.963',
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
								'the_id'    => 'posts.primary.6',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.273',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.271',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.267',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.268',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.269',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.12%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.270',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.26%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.272',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.84%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.966',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.85%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.6%%',
								'the_id'    => 'posts.primary.967',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.7',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.282',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.279',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.277',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.18%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.280',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.13%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.278',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.275',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.276',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.30%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.281',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.28%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.28%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.307',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.46%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.311',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.34%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.309',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.33%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.308',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.88%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.970',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.50%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.312',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.55%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.314',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.53%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.313',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.57%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.315',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.36%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.310',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.87%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.968',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.86%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.12%%',
								'the_id'    => 'posts.primary.969',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.21%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									8 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.21%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.317',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.24%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.322',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.25%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.323',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.32%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.318',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.31%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.324',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.22%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.321',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.39%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.319',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.56%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.320',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.82%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.964',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.83%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.11%%',
								'the_id'    => 'posts.primary.965',
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
					'file'   => $demo_image_url . $prefix . 'quote-avatar.png',
					'the_id' => 'media.primary.quote-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-1.jpg',
					'the_id' => 'media.primary.ad-300x250-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-970x250.jpg',
					'the_id' => 'media.primary.ad-970x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-600x300.jpg',
					'the_id' => 'media.primary.ad-600x300',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-2.jpg',
					'the_id' => 'media.primary.ad-300x250-2',
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
