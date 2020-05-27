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

	$style_id       = 'crypto-press';
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
						'name'      => 'Bitcoin',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f7931a',
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
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Dash',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#2573c2',
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
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Dogecoin',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#b99a2e',
							),
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Ethereum',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#393939',
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
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'      => 'Litecoin',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#9a9a9a',
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
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Monero',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#f26822',
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
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Ripple',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#0085bd',
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
						'the_id'    => 'taxonomy.primary.8',
					),
					array(
						'name'      => 'Zcash',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'term_color',
								'meta_value' => '#da9530',
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
						'post_title'        => 'Contact us',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.16',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front page',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.14',
					),
					array(
						'post_title'        => 'Brazilian Government Plans to Process Petitions and Write Laws on Ethereum',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Ether Hits New Record Price High Over $900 Following Month of Strong Growth',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'Ripple price LIVE: XRP loses $16.2BILLION today as Ripple, bitcoin and Ethereum plunge',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'Viral Cat Game Responsible for Huge Portion of Ethereum Transactions',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'SECURITY Parity Wallet ‘Continues Investigating’ $300 Mln Lock as Ambisafe Reports No Losses',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Ethereum Cofounder Launches Venture Capital Arm With $50 Mln Investment',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Daily Altcoin Price Analysis: Cryptocurrencies Are Waiting While Dash Skyrockets',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Weekly Altcoin Price Review: The Triumph of Dogecoin in January',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_title'        => 'Daily Altcoin Price Analysis: Sensational Growth of Dogecoin and ETH',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'Altcoin Weekly: Dogecoin, DASH And ETH Are Growing But Neucoin Falls',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_title'        => 'Ethereum Founder Vitalik Buterin One of Bloomberg’s Top 50 Most Influential People',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'Bitcoin’s Less Valuable Spawn: Top Six Most Ridiculous Altcoins',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.200',
					),
					array(
						'post_title'        => 'Ethereum Surges Past $600 on UBS of Ethereum-based Initiative',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => 'Price Analysis, August 11: Bitcoin, Ethereum, Ripple, Litecoin, Ethereum Classic',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.267',
					),
					array(
						'post_title'        => 'ALTCOIN WATCH Litecoin to Become One of The Best Investment Options: Geoffrey Caveney',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.268',
					),
					array(
						'post_title'        => 'Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano: Price Analysis, Jan. 8',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.273',
					),
					array(
						'post_title'        => 'Suddenly, Bitcoin Price Shoots Up To $2500 As Poloniex Halts Litecoin Trading',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.270',
					),
					array(
						'post_title'        => 'Price Analysis, Jan.10: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.266',
					),
					array(
						'post_title'        => 'Price Analysis, Jan 16: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, and Cardano',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.265',
					),
					array(
						'post_title'        => 'Jaxx Says Ethereum Classic’s Rejection By iOS App Store Is “Apple’s Loss”',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.196',
					),
					array(
						'post_title'        => 'Cryptocurrency Market In The Green, Total Market Cap Bounces Back',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.239',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 19: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Julian Assange Urges Donors to Use Cryptocurrencies, Thwart Government',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'CryptoKitties Becomes Largest Ethereum-Based Decentralized Application',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Cryptocurrency Market Cap Up Nearly 800 Percent In 2017, Bitcoin Accounts for Half',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.198',
					),
					array(
						'post_title'        => 'South Korean Card Companies Block Transactions to Overseas Cryptocurrency Exchanges',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.123',
					),
					array(
						'post_title'        => 'Bitcoin tanks more than 10% to below $11,000; South Korea announces details on crypto tax',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_title'        => 'Equity Markets vs. Cryptocurrency Markets: Weekly Performance Review',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.153',
					),
					array(
						'post_title'        => 'US Dollar Will End 2017 as Worst Year Since 2003, While Bitcoin is Up 1,372%',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.165',
					),
					array(
						'post_title'        => 'As Critical Elections Approach, African Youths Gaining Political Voice Through Blockchain',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.163',
					),
					array(
						'post_title'        => '1Rare Pepe Blockchain Cards Have Produced More Value Than Most ICOs',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.128',
					),
					array(
						'post_title'        => 'Trading Column `The Writing on the Wall´– Futures are Almost here, Is This the Right Time to Buy?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.129',
					),
					array(
						'post_title'        => 'Samourai Wallet Introduces Bitcoin via SMS Text Message for Censorship Resistance',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.118',
					),
					array(
						'post_title'        => 'What is Cindicator (CND) and Why is it Up Almost 150%?',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.120',
					),
					array(
						'post_title'        => 'There Are At Least Twice as Many Bitcoin Traders in Brazil as Stock Investors',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.131',
					),
					array(
						'post_title'        => 'Trading Tip The Wall – Absurd Profits from Zclassic a.k.a. Bitcoin Private',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => 'Crypto Market In Red, Total Market Cap Down $100 Bln Since Monday',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.162',
					),
					array(
						'post_title'        => 'The Cream of the Crypto Crop: 10 Best Performing Assets in 2017',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.161',
					),
					array(
						'post_title'        => 'From Memecoin to Billion Dollar Player - Dogecoin Breaks $1 Bln',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Daily Altcoin Price Analysis: Reaction Of Other Cryptocurrencies To Growth Of Bitcoin',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'Cryptoshuffler Proves Bitcoin Owners Susceptible to Malware, Steals $150,000',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.199',
					),
					array(
						'post_title'        => 'Litecoin ‘Milestone’ Trading Sends Price Over $60, Market Cap Hits $3 Bln',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'Avoiding Paralysis: Comparative Analysis of Community Governance in Digital Currencies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.160',
					),
					array(
						'post_title'        => 'Adoption of Bitcoin Up Speed in Venezuela Called Lifesaving Currency',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.159',
					),
					array(
						'post_title'        => 'Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, Dash, Cardano: Price Analysis, Jan.2',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'Record-breaking 2017 Brought Bitcoin, Altcoins Drastically Increased Mainstream Acceptance',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.157',
					),
					array(
						'post_title'        => 'New Sources for News and Data on ICOs, Cryptocurrencies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_title'        => 'Craigslist Enable Sellers to Accept Bitcoin, More Merchants Adopt Cryptocurrencies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'RUCKUS Dogecoin Exchange Founder Ryan Kennedy In Hot Soup Over Theft of Bitcoins, Money Laundering',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.197',
					),
					array(
						'post_title'        => 'Newly Detected Malware Mines Monero, Sends It To North Korean University',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.297',
					),
					array(
						'post_title'        => 'Ethereum Upgrade Byzantium Is Live, Verifies First ZK-Snark Proof',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.380',
					),
					array(
						'post_title'        => 'With ICO Coming Under Attack, Market Participants Still Wary of Govt Regulation',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Ripple Success Tips Chairman For World’s Richest As Zuckerberg Eyes Crypto',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.339',
					),
					array(
						'post_title'        => 'Scalability Privacy And Governance Main Problems For DApps, Says Qtum Co-Founder',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Arizona State University Partners With Dash to Fund Research, Scholarships',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.164',
					),
					array(
						'post_title'        => 'Managing Enormous Risk: Bitcoin and Altcoin Investment Strategies',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY&t=41s',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.304',
					),
					array(
						'post_title'        => 'Zcash CEO to Discuss Post-Blockchain Future at San Francisco Panel',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.375',
					),
					array(
						'post_title'        => 'Price Analysis, August 10: Bitcoin and Ethereum and Litecoin and ZCash',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.376',
					),
					array(
						'post_title'        => 'Zcash Foundation Offers $80,000 in New Grants to Advance the Zcash Ecosystem',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.377',
					),
					array(
						'post_title'        => 'Internet is Communication Platform While Blockchain is Organization Tool: Opinion',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.378',
					),
					array(
						'post_title'        => 'Bitcoin Cash Trading Pairs Open at Cryptocurrency Exchange',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.122',
					),
					array(
						'post_title'        => 'Weekly Altcoin Price Analysis: Crypto currencies Are Ready For New Year\'s Surprises',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.202',
					),
					array(
						'post_title'        => 'ANALYSIS CryptoKitties Sales Hit $12 Million, Could be Ethereum’s Killer App After All',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY&t=41s',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.237',
					),
					array(
						'post_title'        => 'Altcoin EOS Joins Top Crypto League, Surges 321 Percent After ICO Launch',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.330',
					),
					array(
						'post_title'        => 'Julian Assange Urges Donors to Use Cryptocurrencies, Thwart Government',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.366',
					),
					array(
						'post_title'        => 'Ethereum Foundation to Offer Millions in Grants for Scalability Solutions',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.126',
					),
					array(
						'post_title'        => 'Bitcoin price WARNING: US Government will KILL cryptocurrency unless THIS happens',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.125',
					),
					array(
						'post_title'        => 'Bitcoin as an Unstoppable Force: Hyperbitcoinization Theory and Practice',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.127',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 06: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
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
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY&t=41s',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.271',
					),
					array(
						'post_title'        => 'Top 10 Reshuffles On: Ethereum vs. Ripple, Nem vs. Litecoin & More',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => 'Altcoins Use Bitcoin Ecosystem to Leapfrog Forward, Grow Faster',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.379',
					),
					array(
						'post_title'        => 'Newly Detected Malware Uses NSA Exploit To Mine Monero, Over 500K PCs Infected',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.295',
					),
					array(
						'post_title'        => 'Price Analysis, Dec. 26: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, Dash',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.269',
					),
					array(
						'post_title'        => 'Zcash 6-Month Anniversary Special: $100 Mln Market Cap, Vision',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.374',
					),
					array(
						'post_title'        => 'Monero Price Jumps Over 40 Percent on Rumors It Will Soon Debut on Bithumb Exchange',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.300',
					),
					array(
						'post_title'        => 'Europol: Zcash, Monero and Ethereum Follow Bitcoin in Cybercrime',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.305',
					),
					array(
						'post_title'        => 'Bitcoin Exchange ShapeShift Helps Police As WannaCry Attacker Converts To Monero',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.299',
					),
					array(
						'post_title'        => 'Venezuelan Bitcoin Miners Turning to Ethereum After Government Crackdown',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.381',
					),
					array(
						'post_title'        => 'Suddenly, Ethereum Classic Price Explodes 25% on South Korea Rumors',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.301',
					),
					array(
						'post_title'        => 'Russian Hackers Used 9000 computers to Mine Monero, Zcash, Other Cryptocurrencies',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.302',
					),
					array(
						'post_title'        => 'Julian Assange Urges Donors to Use Cryptocurrencies, Thwart Government',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.306',
					),
					array(
						'post_title'        => 'Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, Dash, Monero: Price Analysis, Dec. 30',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.307',
					),
					array(
						'post_title'        => '500 Million Users Affected Every Month By Pirates to Mine Cryptocurrency',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.308',
					),
					array(
						'post_title'        => 'New Sources for News and Data on ICOs, Cryptocurrencies',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.303',
					),
					array(
						'post_title'        => 'Threat of Cryptocurrencies Will Lead to Introduction of State-backed Digital Currencies, Citigroup CEO',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY&t=41s',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.343',
					),
					array(
						'post_title'        => 'Thai Bank, IBM Complete Joint Blockchain Pilot to Augment Contract Management Process',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.342',
					),
					array(
						'post_title'        => 'Ripple Overtakes Ethereum to Become Second Largest Crypto After Japanese Bank Consortium Formed',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.341',
					),
					array(
						'post_title'        => 'Internet Archive Now Accepts Bitcoin Cash and Zcash as Donations',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY&t=41s',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.368',
					),
					array(
						'post_title'        => 'Bitcoin Exchange LocalBitcoins Posts Fourfold Trading Volume Increase in Venezuela',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.370',
					),
					array(
						'post_title'        => 'Europol: Zcash, Monero and Ethereum Follow Bitcoin in Cybercrime',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.372',
					),
					array(
						'post_title'        => 'Irish Retail FX Adds Ripple, Dash and Ethereum Trading Pairs Amidst Growing Demand',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.334',
					),
					array(
						'post_title'        => 'Ethereum Price Hits New All-Time High Led by South Korea, Ripple & Litecoin Surge',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'Former Chairman of Federal Reserve to Speak at Blockchain Conference: Reasons & Trends',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.336',
					),
					array(
						'post_title'        => 'ANALYSIS Coinbase Rejects Ripple Integration Rumors, Currency’s Market Cap Drops $22 Billion',
						'post_format'       => 'gallery',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Desk',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.coindesk.com',
							),
						),
						'the_id'            => 'posts.primary.338',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 06: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.340',
					),
					array(
						'post_title'        => 'China Regulators Visit Coinbase, Others To Discuss ‘Significant’ Crypto Issues: London Scene Roundup',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.337',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Inline 1000x150',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-1000x150}:\'full\'%%',
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
						'the_id'     => 'posts.primary.389',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Sidebar - 300x250',
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
						'the_id'     => 'posts.primary.386',
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
						),
						'the_id'     => 'posts.primary.636',
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
							'footer_bg_image'   => array(
								'type' => 'cover',
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
						'option_value' => '%%posts.primary.14%%',
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
							'widget_id'       => 'bsfp-cryptocurrency',
							'widget_settings' => array(
								'title'                => 'Cryptocurrency Price',
								'style'                => 'widget-5',
								'align'                => 'columned',
								'coins-count'          => '14',
								'bf-widget-title-icon' => array(
									'icon'      => 'fa-bar-chart',
									'type'      => 'fontawesome',
									'height'    => '',
									'width'     => '',
									'font_code' => '\\f080',
								),
								'columns'              => '2',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.386%%',
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
         
         • Address: 4162 Glendale Avenue, CA 91324
         • Email: info@yoursite.com
         • Phone: +1-818-725-1833
         • Mobile:  +1-818-231-1789',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
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
								'bs-text-color-scheme'  => 'light',
								'listing-settings'      => array(
									'title-limit'       => '60',
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
								'page_id'   => '%%posts.primary.14%%',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-home}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
										),
									),
								),
								'the_id'    => 'posts.primary.382',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-bitcoin}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
										),
									),
								),
								'the_id'    => 'posts.primary.6',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-ethereum}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
										),
									),
								),
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-ripple}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
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
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-litecoin}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
										),
									),
								),
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-zcash}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
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
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-dash}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
										),
									),
								),
								'the_id'    => 'posts.primary.7',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'menu_icon',
										'meta_value' => array(
											'icon'      => '%%bf_product_demo_media_url:{media.primary.icon-dogecoin}:"full"%%',
											'type'      => 'custom-icon',
											'height'    => '',
											'width'     => '30',
											'font_code' => '',
										),
									),
								),
								'the_id'    => 'posts.primary.8',
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
								'the_id'    => 'posts.primary.697',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.698',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact us',
								'page_id'   => '%%posts.primary.16%%',
								'the_id'    => 'posts.primary.19',
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
					'file'   => $demo_image_url . $prefix . 'icon-home.png',
					'the_id' => 'media.primary.icon-home',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-bitcoin.png',
					'the_id' => 'media.primary.icon-bitcoin',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-ethereum.png',
					'the_id' => 'media.primary.icon-ethereum',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-ripple.png',
					'the_id' => 'media.primary.icon-ripple',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-litecoin.png',
					'the_id' => 'media.primary.icon-litecoin',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-zcash.png',
					'the_id' => 'media.primary.icon-zcash',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-dash.png',
					'the_id' => 'media.primary.icon-dash',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-dogecoin.png',
					'the_id' => 'media.primary.icon-dogecoin',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'newsletter.png',
					'the_id' => 'media.primary.newsletter',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-monero-d.png',
					'the_id' => 'media.primary.icon-monero-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-bitcoin-d.png',
					'the_id' => 'media.primary.icon-bitcoin-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-etherom-d.png',
					'the_id' => 'media.primary.icon-etherom-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-ripple-d.png',
					'the_id' => 'media.primary.icon-ripple-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-litecoin-d.png',
					'the_id' => 'media.primary.icon-litecoin-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-zcash-d.png',
					'the_id' => 'media.primary.icon-zcash-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-dash-d.png',
					'the_id' => 'media.primary.icon-dash-d',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'icon-dogecoin-d.png',
					'the_id' => 'media.primary.icon-dogecoin-d',
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
					'file'   => $demo_image_url . $prefix . 'footer-bg.jpg',
					'the_id' => 'media.primary.footer-bg',
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
					'file'   => $demo_image_url . $prefix . 'ad-1000x150.jpg',
					'the_id' => 'media.primary.ad-1000x150',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
				),
			),
	);
}
