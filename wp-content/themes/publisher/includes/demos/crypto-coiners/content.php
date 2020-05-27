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

	$style_id       = 'crypto-coiners';
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
						'name'     => 'Bitcoin',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.2',
					),
					array(
						'name'      => 'Ethereum',
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
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'      => 'Guides & Analytics',
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
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Invesment',
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
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'      => 'Litecoin',
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
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Mining',
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
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Ripple',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'slider_type',
								'meta_value' => 'custom-blocks',
							),
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-22',
							),
						),
						'the_id'    => 'taxonomy.primary.8',
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
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.371',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Before Header Injection',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'post_status'       => 'private',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.581',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.369',
					),
					array(
						'post_title'        => 'Tom Lee Says BTC Will Hit $25,000 in 2018, Advises ‘Aggressive’ Buying At Market Low',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.223',
					),
					array(
						'post_title'        => 'Exponential Growth: Cryptocurrency Exchanges Are Adding 100,000+ Users Per Day',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.225',
					),
					array(
						'post_title'        => 'Study: 22% of Bitcoin Investors Used Borrowed Money For Trading, Not Recommended',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'NBA’s Dallas Mavericks Will Accept Bitcoin For Tickets, Mark Cuban Promises',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Most Cryptocurrencies Are Doomed to Fail, But There’s Money to Be Made, Says Credo CIO',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.222',
					),
					array(
						'post_title'        => 'St. Louis Fed Sees Future in Crypto As Important Asset Class, Bitcoin As Digital Gold',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Samsung Founder to Be Fined For Storing Billions in 200 Offshore Accounts, Bitcoin\'s Merit',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Bitcoin and Ethereum and Bitcoin Cash and Ripple and IOTA and Litecoin and Dash and Monero: Price Analysis, Dec.28',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Morgan Stanley Now Clearing Bitcoin Futures for Clients, Helping Institutions Gain Exposure',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'South Korean Government Stressing Over Irrationally Overheated Bitcoin Market',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 19: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.267',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 06: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano: Price Analysis, Jan. 8',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'Price Analysis, Jan.10: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'Price Analysis, August: Bitcoin, Ethereum, Ripple, Litecoin, Ethereum Classic',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.260',
					),
					array(
						'post_title'        => 'Suddenly, Bitcoin Price Shoots Up To $2500 As Poloniex Halts Litecoin Trading',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'Price Analysis, Dec. 26: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, Dash',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.265',
					),
					array(
						'post_title'        => 'With ICO Coming Under Attack, Market Participants Still Wary of Govt Regulation',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'BLOCKCHAIN Ethereum Signs Key Deal with Russian State-Owned Bank For Blockchain Adoption',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_title'        => 'Litecoin ‘Milestone’ Trading Sends Price Over $60, Market Cap Hits $3 Bln',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.266',
					),
					array(
						'post_title'        => 'What the Fork? New SegWit2x Launches With Massive Premine, Unknown Development Team',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'Ethereum Price Temporarily Affected as China, South Korea Crack Down on ICOs',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.192',
					),
					array(
						'post_title'        => 'Bitcoin Cash Trading Pairs Open at Cryptocurrency Exchange',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.113',
					),
					array(
						'post_title'        => 'Scalability, Privacy And Governance - Main Problems For DApps, Says Qtum Co-Founder',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.158',
					),
					array(
						'post_title'        => 'Viral Cat Game Responsible for Huge Portion of Ethereum Transactions',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.155',
					),
					array(
						'post_title'        => 'CryptoKitties Becomes Largest Ethereum-Based Decentralized Application',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.153',
					),
					array(
						'post_title'        => 'Bitcoin price WARNING: US Government will KILL cryptocurrency unless THIS happens',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.116',
					),
					array(
						'post_title'        => 'Bitcoin as an Unstoppable Force: Hyperbitcoinization Theory and Practice',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.118',
					),
					array(
						'post_title'        => 'What is Cindicator (CND) and Why is it Up Almost 150%?',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.112',
					),
					array(
						'post_title'        => 'There Are At Least Twice as Many Bitcoin Traders in Brazil as Stock Investors',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.122',
					),
					array(
						'post_title'        => 'Trading Tip The Wall – Absurd Profits from Zclassic a.k.a. Bitcoin Private',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.121',
					),
					array(
						'post_title'        => 'Trading Column `The Writing on the Wall´– Futures are Almost here, Is This the Right Time to Buy?',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.120',
					),
					array(
						'post_title'        => 'ANALYSIS CryptoKitties Sales Hit $12 Million, Could be Ethereum’s Killer App After All',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.152',
					),
					array(
						'post_title'        => 'Ethereum Surges Past $600 on UBS Announcement of Ethereum-based Initiative',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.151',
					),
					array(
						'post_title'        => 'Ethereum Miners Opt for Leasing Boeing 747s to Ship Critical Amount of GPUS',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.187',
					),
					array(
						'post_title'        => 'New Report: North Korean Hackers Stole Funds From South Korean Cryptocurrency Exchanges',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Lightning Network’s Pizza Day? First Ever Physical Purchase On Lightning Network',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'ALTCOIN WATCH Litecoin to Become One of The Best Investment Options: Geoffrey Caveney',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Entrepreneur Mark Cuban’s Team Launches Ethereum-based Mercury Protocol',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_title'        => 'Trust But Verify: First Ethereum Decompiler Launched With JP Morgan Project',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.183',
					),
					array(
						'post_title'        => 'Ether Hits New Record Price High Over $900 Following Month of Strong Growth',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.150',
					),
					array(
						'post_title'        => 'Brazilian Government Plans to Process Petitions and Write Laws on Ethereum',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.149',
					),
					array(
						'post_title'        => 'Ethereum Cofounder Launches Venture Capital Arm With $50 Mln Investment',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.159',
					),
					array(
						'post_title'        => 'Cyber Criminals Have Stolen $225 Mln Worth of Ethereum Through Phishing This Year',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.194',
					),
					array(
						'post_title'        => 'Blockchain Tech May Allow Developing World to Leapfrog Developed World: Brock Pierce',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => 'China Regulators Visit Coinbase, Others To Discuss Significant Crypto Issues: London Scene Roundup',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.336',
					),
					array(
						'post_title'        => 'Current State of Bitcoin, Ethereum Market - Tips for Classic Traders, Crypto Businesses',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_title'        => 'Bitcoin tanks more than 10% to below $11,000; South Korea announces details',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.115',
					),
					array(
						'post_title'        => 'Bitcoin Anarchist Amir Taaki Talks Technology’s Purpose and Altcoins (Interview part 2)',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.117',
					),
					array(
						'post_title'        => 'Bitcoin’s Correction Could Well Have Shaken Out Potentially Damaging Investors',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.185',
					),
					array(
						'post_title'        => 'Price Analysis, Jan 16: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, and Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => 'China’s Alibaba Launches Crypto Mining Platform Despite Restrictions, Say Local Sources',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.308',
					),
					array(
						'post_title'        => 'LightningAsic Presents Unit for Parallel Bitcoin and Litecoin Mining Outstripping Gridseed',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.310',
					),
					array(
						'post_title'        => 'Ethereum Founder Vitalik Buterin One of Bloomberg’s Top 50 Most Influential People',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.154',
					),
					array(
						'post_title'        => 'Opera Browser Addresses Crypto jacking, Adds Anti-Crypto Mining For Mobile',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.311',
					),
					array(
						'post_title'        => 'Coinbase Overshoots 2017 Revenue Goal By 66% Making $1 Bln, Rejects Further VC Funding',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Without Bitcoin, There Would Be No Blockchain: CFTC Chairman Tells US Senate',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.147',
					),
					array(
						'post_title'        => 'Samourai Wallet Introduces Bitcoin via SMS Text Message for Censorship Resistance',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.110',
					),
					array(
						'post_title'        => 'Get ‘Em While They’re Cheap? Two-Day Crypto Market Slump Offers Steep Discounts',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'Crypto’s Positive Story Remains Intact: Wall Street Strategist Undeterred by Bitcoin Price',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => 'Ripple price LIVE: XRP loses $16.2 BILLION today as Ripple, bitcoin and Ethereum plunge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.157',
					),
					array(
						'post_title'        => 'Ripple Success Tips Chairman For World’s Richest As Zuckerberg Eyes Crypto',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.334',
					),
					array(
						'post_title'        => 'Bitcoin Price Slump Merely “Growing Pains”: Cryptocurrency Brokerage Executive',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Coin Market Cap',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://coinmarketcap.com/',
							),
						),
						'the_id'            => 'posts.primary.301',
					),
					array(
						'post_title'        => 'Enterprise Ethereum Alliance Joined by 34 More Organizations, Including Mastercard and Cisco',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'SECURITY Parity Wallet ‘Continues Investigating’ $300 Mln Lock as Ambisafe Reports No Losses',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.156',
					),
					array(
						'post_title'        => 'Starbucks Buenos Aires Accused of Cryptocurrency Mining Using Customer\'s Laptop',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.307',
					),
					array(
						'post_title'        => 'Artemine Creates Major Technical Breakthrough, Introduces Public Mining',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.309',
					),
					array(
						'post_title'        => 'Rare Pepe Blockchain Cards Have Produced More Value Than Most ICOs',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.119',
					),
					array(
						'post_title'        => 'International Mining Consortium Makes Gold Coins Available to Everyone in its First ICO',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.306',
					),
					array(
						'post_title'        => 'The Involved The Investor The Miner Who Benefits in the New Cryptocurrency Economy?',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.304',
					),
					array(
						'post_title'        => 'BitPay Integrates With ShapeShift to Enable Instant BTC-BCH Exchange',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.291',
					),
					array(
						'post_title'        => 'Ether Slumps, Ethereum Classic Surges 300%, Finds Support With Exchanges, Miners',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.295',
					),
					array(
						'post_title'        => 'Mere Coincidence? Miners Meet Core Developers, Bitcoin Price Plummets',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.299',
					),
					array(
						'post_title'        => 'ANALYSIS Coinbase Rejects Ripple Integration Rumors, Currency’s Market Cap Drops $22 Billion',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.337',
					),
					array(
						'post_title'        => 'Ripple Overtakes Ethereum to Become Second Largest Crypto After Japanese Bank Consortium Formed',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.325',
					),
					array(
						'post_title'        => 'Price Analysis, Jan: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => 'NaPoleonX Will Officially Launch Its ICO The 22nd Of January',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.481',
					),
					array(
						'post_title'        => 'South Korean Card Companies Block Transactions to Overseas Cryptocurrency Exchanges',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.114',
					),
					array(
						'post_title'        => 'Top 10 Reshuffles On CoinMarketCap: Ethereum vs. Ripple, Nem vs. Litecoin & More',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.332',
					),
					array(
						'post_title'        => 'Former Chairman of Federal Reserve to Speak at Blockchain Conference: Reasons & Trends',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'Thai Bank, IBM Complete Joint Blockchain Pilot to Augment Contract Management Process',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.327',
					),
					array(
						'post_title'        => 'Irish Retail FX Adds Ripple, Dash and Ethereum Trading Pairs Amidst Growing Demand',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.330',
					),
					array(
						'post_title'        => 'Threat of Cryptocurrencies Will Lead to Introduction of State-backed Digital Currencies, Citigroup CEO',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.328',
					),
					array(
						'post_title'        => 'Ethereum Price Hits New All-Time High Led by South Korea, Ripple & Litecoin Surge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'Hyperledger is a collaborative cross-industry effort to advance blockchain technology that is hosted by The Linux Foundation.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=daWcwWn-jOY',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
						),
						'the_id'            => 'posts.primary.329',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner After X Paragraph - 300x250',
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
						'the_id'     => 'posts.primary.367',
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
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.aad-336x280}:\'full\'%%',
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
						'the_id'     => 'posts.primary.391',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner After X Post',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-infeed}:\'full\'%%',
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
						'post_title' => 'Inline Banner Index - 970x90',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-970x90}:\'full\'%%',
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
						'the_id'     => 'posts.primary.23',
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
								'meta_value' => 'dfsg',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-4',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#3cbc98',
							),
						),
						'the_id'     => 'posts.primary.109',
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
							'logo_image'              => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
							'logo_image_retina'       => '',
							'injection_before_header' => '%%posts.primary.581%%',
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
						'option_value' => '%%posts.primary.369%%',
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
							'widget_id'       => 'bsfp-cryptocurrency-converter',
							'widget_settings' => array(
								'style'                => 'style-4',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Latest Posts',
								'count'                 => '5',
								'columns'               => 1,
								'listing-settings'      => array(
									'title-limit'       => '86',
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
								'pagination-show-label' => '0',
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.391%%',
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
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_email'           => '#',
								'link_youtube'         => '#',
								'link_pinterest'       => '#',
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
								'page_id'   => '%%posts.primary.369%%',
								'the_id'    => 'posts.primary.379',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.24',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.373',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.378',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.376',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.377',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.375',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.374',
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
								'title'     => 'News',
								'page_id'   => '%%posts.primary.369%%',
								'the_id'    => 'posts.primary.381',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.6',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
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
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
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
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.9',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									14 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'NEW',
									),
									16 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#ff4461',
									),
								),
								'the_id'    => 'posts.primary.8',
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
					'file'   => $demo_image_url . $prefix . 'ad-970x90.jpg',
					'the_id' => 'media.primary.ad-970x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-infeed.jpg',
					'the_id' => 'media.primary.ad-infeed',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-336x280.jpg',
					'the_id' => 'media.primary.aad-336x280',
				),
			),
	);
}
