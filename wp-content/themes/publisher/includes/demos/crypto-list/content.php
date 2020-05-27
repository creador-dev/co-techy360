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

	$style_id       = 'crypto-list';
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
						'name'     => 'Bitcoin',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'Blockchain',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Cryptocurrency',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'      => 'Ethereum',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'Gallery',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'Gram',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'      => 'Litecoin',
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
						'name'      => 'Monero',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.19',
					),
					array(
						'name'      => 'Ripple',
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
						'name'     => 'Telegram',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'TON',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.18',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'      => 'Zcash',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
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
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.470',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.472',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Header Content Injection',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.424',
					),
					array(
						'post_title'        => 'Russian Hackers Used 9000 computers to Mine Monero, Zcash, Other Cryptocurrencies',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
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
						'the_id'            => 'posts.primary.302',
					),
					array(
						'post_title'        => 'Suddenly, Ethereum Classic Price Explodes 25% on South Korea Rumors',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.301',
					),
					array(
						'post_title'        => 'Monero Price Jumps Over 40 Percent on Rumors It Will Soon Debut on Bithumb Exchange',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.300',
					),
					array(
						'post_title'        => '500 Million Users Affected Every Month By Pirates to Mine Cryptocurrency',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.308',
					),
					array(
						'post_title'        => 'Litecoin ‘Milestone’ Trading Sends Price Over $60, Market Cap Hits $3 Bln',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, Dash, Monero: Price Analysis, Dec. 30',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.307',
					),
					array(
						'post_title'        => 'Europol: Zcash, Monero and Ethereum Follow Bitcoin in Cybercrime',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.305',
					),
					array(
						'post_title'        => 'Price Analysis, Dec. 26: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, Dash',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.269',
					),
					array(
						'post_title'        => 'Julian Assange Urges Donors to Use Cryptocurrencies, Thwart Government',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.306',
					),
					array(
						'post_title'        => 'Threat of Cryptocurrencies Will Lead to Introduction of State-backed Digital Currencies, Citigroup CEO',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.343',
					),
					array(
						'post_title'        => 'Former Chairman of Federal Reserve to Speak at Blockchain Conference: Reasons & Trends',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.336',
					),
					array(
						'post_title'        => 'Ethereum Price Hits New All-Time High Led by South Korea, Ripple & Litecoin Surge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.333',
					),
					array(
						'post_title'        => 'Internet Archive Now Accepts Bitcoin Cash and Zcash as Donations',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
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
						'the_id'            => 'posts.primary.368',
					),
					array(
						'post_title'        => 'China Regulators Visit Coinbase, Others To Discuss ‘Significant’ Crypto Issues: London Scene Roundup',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.337',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 06: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.340',
					),
					array(
						'post_title'        => 'Thai Bank, IBM Complete Joint Blockchain Pilot to Augment Contract Management Process',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.342',
					),
					array(
						'post_title'        => 'Price Analysis, August 11: Bitcoin, Ethereum, Ripple, Litecoin, Ethereum Classic',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.267',
					),
					array(
						'post_title'        => 'Ripple Overtakes Ethereum to Become Second Largest Crypto After Japanese Bank Consortium Formed',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.341',
					),
					array(
						'post_title'        => 'Bitcoin Exchange ShapeShift Helps Police As WannaCry Attacker Converts To Monero',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.299',
					),
					array(
						'post_title'        => 'Julian Assange Urges Donors to Use Cryptocurrencies, Thwart Government',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'South Korean Card Companies Block Transactions to Overseas Cryptocurrency Exchanges',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.123',
					),
					array(
						'post_title'        => 'Ethereum Cofounder Launches Venture Capital Arm With $50 Mln Investment',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Brazilian Government Plans to Process Petitions and Write Laws on Ethereum',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => '1Rare Pepe Blockchain Cards Have Produced More Value Than Most ICOs',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.128',
					),
					array(
						'post_title'        => 'Trading Column `The Writing on the Wall´– Futures are Almost here, Is This the Right Time to Buy?',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.129',
					),
					array(
						'post_title'        => 'Samourai Wallet Introduces Bitcoin via SMS Text Message for Censorship Resistance',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.118',
					),
					array(
						'post_title'        => 'What is Cindicator (CND) and Why is it Up Almost 150%?',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.120',
					),
					array(
						'post_title'        => 'There Are At Least Twice as Many Bitcoin Traders in Brazil as Stock Investors',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.131',
					),
					array(
						'post_title'        => 'Ether Hits New Record Price High Over $900 Following Month of Strong Growth',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'Ripple price LIVE: XRP loses $16.2BILLION today as Ripple, bitcoin and Ethereum plunge',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'Ethereum Surges Past $600 on UBS of Ethereum-based Initiative',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.238',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 19: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Bitcoin Exchange LocalBitcoins Posts Fourfold Trading Volume Increase in Venezuela',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.370',
					),
					array(
						'post_title'        => 'CryptoKitties Becomes Largest Ethereum-Based Decentralized Application',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.236',
					),
					array(
						'post_title'        => 'Ethereum Founder Vitalik Buterin One of Bloomberg’s Top 50 Most Influential People',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'SECURITY Parity Wallet ‘Continues Investigating’ $300 Mln Lock as Ambisafe Reports No Losses',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Viral Cat Game Responsible for Huge Portion of Ethereum Transactions',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'Price Analysis, Jan.10: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.266',
					),
					array(
						'post_title'        => 'Venezuelan Bitcoin Miners Turning to Ethereum After Government Crackdown',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_format' => '%%taxonomy.primary.19%%',
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
						'the_id'            => 'posts.primary.381',
					),
					array(
						'post_title'        => 'Price Analysis, Jan 16: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, and Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.265',
					),
					array(
						'post_title'        => 'Irish Retail FX Adds Ripple, Dash and Ethereum Trading Pairs Amidst Growing Demand',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.334',
					),
					array(
						'post_title'        => 'Bitcoin tanks more than 10% to below $11,000; South Korea announces details on crypto tax',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_title'        => 'New Sources for News and Data on ICOs, Cryptocurrencies',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.303',
					),
					array(
						'post_title'        => 'Ethereum Foundation to Offer Millions in Grants for Scalability Solutions',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'post_title'        => 'Europol: Zcash, Monero and Ethereum Follow Bitcoin in Cybercrime',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.372',
					),
					array(
						'post_title'        => 'Altcoin EOS Joins Top Crypto League, Surges 321 Percent After ICO Launch',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.330',
					),
					array(
						'post_title'        => 'ANALYSIS Coinbase Rejects Ripple Integration Rumors, Currency’s Market Cap Drops $22 Billion',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
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
						'post_title'        => 'Suddenly, Bitcoin Price Shoots Up To $2500 As Poloniex Halts Litecoin Trading',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.270',
					),
					array(
						'post_title'        => 'Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano: Price Analysis, Jan. 8',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.273',
					),
					array(
						'post_title'        => 'ALTCOIN WATCH Litecoin to Become One of The Best Investment Options: Geoffrey Caveney',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.268',
					),
					array(
						'post_title'        => 'Altcoins Use Bitcoin Ecosystem to Leapfrog Forward, Grow Faster',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.379',
					),
					array(
						'post_title'        => 'Cryptocurrency Market In The Green, Total Market Cap Bounces Back',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.239',
					),
					array(
						'post_title'        => 'Newly Detected Malware Mines Monero, Sends It To North Korean University',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.297',
					),
					array(
						'post_title'        => 'Julian Assange Urges Donors to Use Cryptocurrencies, Thwart Government',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.366',
					),
					array(
						'post_title'        => 'Bitcoin price WARNING: US Government will KILL cryptocurrency unless THIS happens',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_format' => '%%taxonomy.primary.19%%',
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
						'the_id'            => 'posts.primary.125',
					),
					array(
						'post_title'        => 'ANALYSIS CryptoKitties Sales Hit $12 Million, Could be Ethereum’s Killer App After All',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
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
						'post_title'        => 'Zcash Foundation Offers $80,000 in New Grants to Advance the Zcash Ecosystem',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_format' => '%%taxonomy.primary.19%%',
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
						'the_id'            => 'posts.primary.377',
					),
					array(
						'post_title'        => 'Internet is Communication Platform While Blockchain is Organization Tool: Opinion',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.378',
					),
					array(
						'post_title'        => 'Bitcoin as an Unstoppable Force: Hyperbitcoinization Theory and Practice',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.127',
					),
					array(
						'post_title'        => 'Price Analysis, August 10: Bitcoin and Ethereum and Litecoin and ZCash',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
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
						'the_id'            => 'posts.primary.376',
					),
					array(
						'post_title'        => 'Zcash CEO to Discuss Post-Blockchain Future at San Francisco Panel',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.375',
					),
					array(
						'post_title'        => 'Trading Tip The Wall – Absurd Profits from Zclassic a.k.a. Bitcoin Private',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.130',
					),
					array(
						'post_title'        => 'Zcash 6-Month Anniversary Special: $100 Mln Market Cap, Vision',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.374',
					),
					array(
						'post_title'        => 'Ethereum Upgrade Byzantium Is Live, Verifies First ZK-Snark Proof',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.7%%',
							'post_format' => '%%taxonomy.primary.19%%',
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
						'post_title'        => 'Managing Enormous Risk: Bitcoin and Altcoin Investment Strategies',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
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
						'the_id'            => 'posts.primary.304',
					),
					array(
						'post_title'        => 'With ICO Coming Under Attack, Market Participants Still Wary of Govt Regulation',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Newly Detected Malware Uses NSA Exploit To Mine Monero, Over 500K PCs Infected',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
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
						'the_id'            => 'posts.primary.295',
					),
					array(
						'post_title'        => 'Price Analysis, Jan. 06: Bitcoin, Ethereum, Bitcoin Cash, Ripple, IOTA, Litecoin, NEM, Cardano',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
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
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_format' => '%%taxonomy.primary.19%%',
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
						'post_title'        => 'Bitcoin Cash Trading Pairs Open at Cryptocurrency Exchange',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.122',
					),
					array(
						'post_title'        => 'Ripple Success Tips Chairman For World’s Richest As Zuckerberg Eyes Crypto',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.339',
					),
					array(
						'post_title'        => 'Scalability Privacy And Governance Main Problems For DApps, Says Qtum Co-Founder',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt'      => 'A group of companies piloting a blockchain-based insurance platform for global shipping industry said the technology is now live in commercial use.',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
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
						'post_type'  => 'better-banner',
						'post_title' => 'Single Post',
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
						'the_id'     => 'posts.primary.488',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-336x280-sidebar}:\'full\'%%',
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
						'the_id'     => 'posts.primary.467',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index Banner - 970 x 90',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-index-970x90}:\'full\'%%',
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
						'the_id'     => 'posts.primary.443',
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
								'meta_value' => '#23cc6a',
							),
						),
						'the_id'     => 'posts.primary.459',
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
							'injection_after_header' => '%%posts.primary.424%%',
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
						'option_value' => '%%posts.primary.470%%',
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
							'ad_post_inline' => array(
								array(
									'type'      => 'banner',
									'campaign'  => 'none',
									'banner'    => '488',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'left',
									'paragraph' => '3',
								),
							),
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
								'title'                    => 'Popular Posts',
								'count'                    => '5',
								'order_by'                 => 'rand',
								'columns'                  => 1,
								'pagination-show-label'    => '1',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
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
								'disable_duplicate'        => '0',
								'bf-widget-title-bg-color' => '#23cc6a',
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
						array(
							'widget_id'       => 'bsfp-cryptocurrency-converter',
							'widget_settings' => array(
								'style'                    => 'style-2',
								'title'                    => 'Exchange',
								'bf-widget-title-bg-color' => '#23cc6a',
								'bf-widget-title-icon'     => array(
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
								'banner'               => '%%posts.primary.467%%',
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
								'content'              => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites. Publisher supports RTL style and RTL languages completely. Thousands of Arabic, Hebrew and Persian sites are using it in their magazine and news sites to publish contents and make money. 
         ',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
								'link_email'           => '#',
								'link_youtube'         => '#',
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
								'title'                    => 'Latest Videos',
								'count'                    => '2',
								'order_by'                 => 'rand',
								'pagination-show-label'    => '1',
								'slider-control-dots'      => 'style-1',
								'slider-control-next-prev' => 'off',
								'listing-settings'         => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '44',
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
								'disable_duplicate'        => '0',
								'bf-widget-title-icon'     => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'                 => 'slider',
								'columns'                  => '2',
							),
						),
					),
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Popular Posts',
								'count'                 => '3',
								'order_by'              => 'rand',
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
								'page_id'   => '%%posts.primary.470%%',
								'the_id'    => 'posts.primary.474',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.475',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.476',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.477',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.478',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									16 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'NEW',
									),
									18 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#008aff',
									),
									array(
										'meta_key'   => 'badge_font_color',
										'meta_value' => '#ffffff',
									),
								),
								'the_id'    => 'posts.primary.479',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.480',
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
								'page_id'   => '%%posts.primary.470%%',
								'the_id'    => 'posts.primary.481',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.472%%',
								'the_id'    => 'posts.primary.482',
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
								'page_id'   => '%%posts.primary.470%%',
								'the_id'    => 'posts.primary.483',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.14',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.15',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.16',
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
					'file'   => $demo_image_url . $prefix . 'ad-336x280-sidebar.jpg',
					'the_id' => 'media.primary.ad-336x280-sidebar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-index-970x90.jpg',
					'the_id' => 'media.primary.ad-index-970x90',
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
