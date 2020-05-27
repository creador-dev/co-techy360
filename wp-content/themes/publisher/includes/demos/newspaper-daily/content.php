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

	$style_id       = 'newspaper-daily';
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
						'name'      => 'Business',
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
						'name'      => 'Health',
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
						'name'     => 'Mueller',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.21',
					),
					array(
						'name'     => 'Olson',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.18',
					),
					array(
						'name'     => 'Politics',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.24',
					),
					array(
						'name'      => 'Sports',
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
						'name'      => 'Style',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'Tech',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-21',
							),
						),
						'the_id'    => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'Travel',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-22',
							),
						),
						'the_id'    => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'Trump',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.19',
					),
					array(
						'name'     => 'US',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.20',
					),
					array(
						'name'     => 'Videos',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'     => 'Wall Street',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.22',
					),
					array(
						'name'     => 'Washington',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'      => 'World',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'World',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
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
						'post_title'        => 'Newsletter',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '2-col-right',
							),
						),
						'the_id'            => 'posts.primary.103',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.124',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Header Injection',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'the_id'            => 'posts.primary.23',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.179',
					),
					array(
						'post_title'        => 'Golf: Weary Spieth rues not sticking to \'game plan\' at Travelers',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.275',
					),
					array(
						'post_title'        => 'Argentina asks Russia to deport fans filmed fighting at World Cup',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.277',
					),
					array(
						'post_title'        => 'Do you speak Belgium? English bonds Martinez\'s \'boring\' squad',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.278',
					),
					array(
						'post_title'        => 'Technology, homework narrow talent gap, says Belgium\'s Martinez',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.280',
					),
					array(
						'post_title'        => 'Mexico keeping a level head for match against \'robust\' South Koreans',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.279',
					),
					array(
						'post_title'        => 'Rhode Island legalizes sports betting, gets 51 percent of revenues',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.273',
					),
					array(
						'post_title'        => 'NBA notebook: Cavs GM optimistic after talks with Team LeBron',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.272',
					),
					array(
						'post_title'        => 'House conservatives: unlikely any immigration bill will pass',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.251',
					),
					array(
						'post_title'        => 'Trump to meet Jordan\'s King Abdullah at White House June 25',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'Athletics: Thompson overhauls Fraser-Pryce to claim Jamaican title',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.267',
					),
					array(
						'post_title'        => 'Pair of ex-NHL players sues league for lack of concussion warnings',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.269',
					),
					array(
						'post_title'        => 'Teens with eczema may not follow prescribed treatment regimen',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => 'Key marijuana drug approval looms as cannabis goes mainstream',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.298',
					),
					array(
						'post_title'        => 'Gaming addiction classified as mental health disorder by WHO',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.303',
					),
					array(
						'post_title'        => 'Marriage tied to lower risk of fatal heart attacks and strokes',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.304',
					),
					array(
						'post_title'        => 'Roche SMA drug shines in study as costly new therapies advance',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.302',
					),
					array(
						'post_title'        => 'China\'s ZTE expected to take last step to lift ban: U.S. official',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.335',
					),
					array(
						'post_title'        => 'Intel CEO resigns after probe of relationship with employee',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.338',
					),
					array(
						'post_title'        => 'Stigma may keep women from using HIV-prevention drugs',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.308',
					),
					array(
						'post_title'        => 'Botswana notifies WTO of foot and mouth disease outbreak',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.305',
					),
					array(
						'post_title'        => 'Latecomer Sanofi looks to catch next wave of cancer therapies',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.297',
					),
					array(
						'post_title'        => 'SEC judge appointments unconstitutional, U.S. high court says',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.247',
					),
					array(
						'post_title'        => 'Sarepta shares soar as Duchenne gene therapy shows promise',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.300',
					),
					array(
						'post_title'        => 'Fathers\' antidepressant use doesn\'t worsen babies\' health risks',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.301',
					),
					array(
						'post_title'        => 'U.S. medical device firm electroCore IPO price set at $15 per share',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.295',
					),
					array(
						'post_title'        => 'Mexican airline Volaris offers free flights for separated children',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Hyundai teams up with Volkswagen\'s Audi to boost hydrogen cars',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.436',
					),
					array(
						'post_title'        => 'Chinese media denounces Trump trade moves as Beijing touts sincerity',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.435',
					),
					array(
						'post_title'        => 'Canada sets October start for legal recreational marijuana sales',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.214',
					),
					array(
						'post_title'        => 'GSK takes billion-dollar drug fight with Gilead to top AIDS meeting',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.219',
					),
					array(
						'post_title'        => 'Trump administration puts skimpy health insurance plans in place',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.221',
					),
					array(
						'post_title'        => 'U.S. court revives Dr Pepper challenge to Coca-Cola \'zero\' drinks',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.432',
					),
					array(
						'post_title'        => 'Tesla accuses former employee of hacking and transferring data',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.431',
					),
					array(
						'post_title'        => 'Global shares edge up, China pulls Asia down, oil subdued pre: OPEC',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.426',
					),
					array(
						'post_title'        => 'China could strike back at Dow-listed firms over trade: Global Times',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.427',
					),
					array(
						'post_title'        => 'Volvo Cars CEO says auto tariffs threaten jobs at new U.S. plant',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.428',
					),
					array(
						'post_title'        => 'Global stocks rise after sell-off; yields up on comments by Fed chair',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.429',
					),
					array(
						'post_title'        => 'Britain\'s May pledges 20 billion extra pounds for healthcare post-Brexit',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.222',
					),
					array(
						'post_title'        => 'After law change, Greek medicinal users hope to enter cannabis business',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.223',
					),
					array(
						'post_title'        => 'Top U.S., Russia energy officials to meet on Tuesday: source',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.244',
					),
					array(
						'post_title'        => 'Conservative U.S. commentator Charles Krauthammer dies',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.246',
					),
					array(
						'post_title'        => 'YouTube pushes memberships, merchandise as alternatives to ads',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.342',
					),
					array(
						'post_title'        => 'Trump on Twitter (June 22): Jeanine Pirro, Immigration Bill',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.249',
					),
					array(
						'post_title'        => 'In age of Trump, evangelicals back self-styled top U.S. pimp',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.241',
					),
					array(
						'post_title'        => 'Theranos founder Holmes, former president indicted for fraud',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.239',
					),
					array(
						'post_title'        => 'Roche pays $2.4 billion for rest of cancer expert Foundation Medicine',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'NIH to end alcohol consumption study due to concerns over funding',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.225',
					),
					array(
						'post_title'        => 'Research on dogs might shed light on human responses to food: study',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'UK authorities release confiscated cannabis after boy hospitalized',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'U.S. House Republicans delay immigration vote until next week',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.248',
					),
					array(
						'post_title'        => 'Norway\'s Telenor fined $96 million by competition watchdog',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.343',
					),
					array(
						'post_title'        => 'London court chides FCA as it rejects former UBS trader\'s appeal',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.430',
					),
					array(
						'post_title'        => 'Ex-Vatican diplomat admits guilt at trial for child pornography',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.8%%',
							'post_tag'    => '%%taxonomy.primary.23%%',
							'post_format' => '%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=qfZm_lwJaD8',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Usatoday',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.368',
					),
					array(
						'post_title'        => 'Walking ability before heart surgery tied to brain function afterward',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.217',
					),
					array(
						'post_title'        => 'Ericsson needs industries to embrace 5G to underpin its recovery',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.345',
					),
					array(
						'post_title'        => 'Philippines plans to take drug war to schools with searches, testing',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.403',
					),
					array(
						'post_title'        => 'Tent city for migrant children puts Texas border town in limelight',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.23%%',
							'post_format' => '%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=qfZm_lwJaD8',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Usatoday',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'Index provider MSCI delays decision on unequal voting rights stocks',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.341',
					),
					array(
						'post_title'        => 'We want to say yes - UK unveils Brexit residency rules for EU citizens',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.9%%',
							'post_tag'    => '%%taxonomy.primary.23%%',
							'post_format' => '%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=qfZm_lwJaD8',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Usatoday',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.404',
					),
					array(
						'post_title'        => 'Chicago Cubs owners interested in controlling stake in AC Milan',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.276',
					),
					array(
						'post_title'        => 'Iran rules out OPEC deal as Russia, Saudi push for oil output hike',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.433',
					),
					array(
						'post_title'        => 'Russia\'s Kadyrov honors Egypt\'s Salah at gala dinner: press service',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.23%%',
							'post_format' => '%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=qfZm_lwJaD8',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Usatoday',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.274',
					),
					array(
						'post_title'        => 'Taliban kill 16 Afghan soldiers, kidnap engineers after ceasefire ends',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.397',
					),
					array(
						'post_title'        => 'Implantable defibrillators may cause dilemmas for older patients',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'Paris ends Autolib electric car sharing contract with Bollore',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.346',
					),
					array(
						'post_title'        => 'Ex-Airbus boss urges UK-French defense industry ties after Brexit',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.425',
					),
					array(
						'post_title'        => 'Kushner meets with Egypt, Qatar leaders about Mideast plan',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.253',
					),
					array(
						'post_title'        => 'Release of \'Wolf Pack\' behind Spanish sex assault sparks protests',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.372',
					),
					array(
						'post_title'        => 'Saudi-led coalition faces tough battle for Yemen\'s Hodeidah port',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.402',
					),
					array(
						'post_title'        => 'White House proposes merging Labor, Education departments',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_tag'    => '%%taxonomy.primary.23%%',
							'post_format' => '%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=qfZm_lwJaD8',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Usatoday',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.254',
					),
					array(
						'post_title'        => 'Equity Office embraces flexible workspace, adopts EQ Office name',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.434',
					),
					array(
						'post_title'        => 'Major League Baseball notebook: MLB suspends Osuna 75 games',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.271',
					),
					array(
						'post_title'        => 'Israel\'s DreaMed gets FDA ok for diabetes management software',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_tag'    => '%%taxonomy.primary.23%%',
							'post_format' => '%%taxonomy.primary.24%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=qfZm_lwJaD8',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Usatoday',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'usatoday.com',
							),
						),
						'the_id'            => 'posts.primary.299',
					),
					array(
						'post_title'        => 'Turkey\'s Erdogan says to slash number of ministries, speed up decisions',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.400',
					),
					array(
						'post_title'        => 'British milestones in Holy Land set traditional foundation for royal visit',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.401',
					),
					array(
						'post_title'        => 'Parted at U.S. border by Trump policy, migrants seek their children',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.363',
					),
					array(
						'post_title'        => 'Assad defies United States, presses assault in southwest Syria',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.365',
					),
					array(
						'post_title'        => 'Thirty-three pregnant Cambodian women discovered in surrogacy raid',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.367',
					),
					array(
						'post_title'        => 'Hundreds block Pittsburgh interstate in police shooting protest',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.399',
					),
					array(
						'post_title'        => 'Instagram expands into long videos, will compete with YouTube',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.347',
					),
					array(
						'post_title'        => 'U.S. lawmakers want Google to reconsider links to China\'s Huawei',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.348',
					),
					array(
						'post_title'        => 'Supreme Court lets states force online retailers to collect sales tax',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.340',
					),
					array(
						'post_title'        => 'Silicon Valley-style coding boot camp seeks to reset Japan Inc',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.344',
					),
					array(
						'post_title'        => 'Altice selling stakes in French, Portuguese telecom towers to cut debt',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.350',
					),
					array(
						'post_title'        => 'Mexican airline Volaris offers free flights for separated children',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.370',
					),
					array(
						'post_title'        => 'U.S. judge says may rule next week on reuniting migrant children',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.369',
					),
					array(
						'post_title'        => 'Prison shares rise as U.S. eyes more migrant family detention space',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.371',
					),
					array(
						'post_title'        => 'Bulgaria to propose immediate closure of EU borders to migrants',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.395',
					),
					array(
						'post_title'        => 'After immigration scandal, Britain remembers Windrush 70 years on',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.396',
					),
					array(
						'post_title'        => 'New Zealand Prime Minister Jacinda Ardern gives birth to first child',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.398',
					),
					array(
						'post_title'        => 'Merkel\'s CSU allies to gauge EU migrant deal on July 1: sources',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.375',
					),
					array(
						'post_title'        => 'Germany\'s Merkel: Syria must be more secure before refugees return',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.393',
					),
					array(
						'post_title'        => 'Pope to make Vatican changes in push for reform, transparency',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.376',
					),
					array(
						'post_title'        => 'Seven Argentinians detained after fighting at World Cup match: official',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.373',
					),
					array(
						'post_title'        => 'Firefighters quell big blaze near London\'s Euston train station',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.374',
					),
					array(
						'post_title'        => 'Turkish air strikes kill 15 Kurdish militants in northern Iraq',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%',
						),
						'the_id'            => 'posts.primary.377',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Post',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-post}:\'full\'%%',
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
						'the_id'     => 'posts.primary.453',
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
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-300x250-sidebar}:\'full\'%%',
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
						'the_id'     => 'posts.primary.62',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'Newsletter on Page',
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
								'meta_value' => 'style-4',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#2c5795',
							),
						),
						'the_id'     => 'posts.primary.666',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'newsletter',
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
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'     => 'posts.primary.105',
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
							'injection_after_header' => '%%posts.primary.23%%',
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
						'option_value' => '%%posts.primary.179%%',
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
									'banner'    => '453',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'left',
									'paragraph' => '5',
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
							'widget_id'       => 'bs-thumbnail-listing-3',
							'widget_settings' => array(
								'title'                 => 'Most Popular',
								'count'                 => '6',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '',
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
								'banner'               => '%%posts.primary.62%%',
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
								'content'              => '• Email: info@yoursite.com
         • Phone: 844-698-6394',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.about-avatar}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
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
							'widget_id'       => 'nav_menu',
							'widget_settings' => array(
								'title'                => 'Company',
								'nav_menu'             => 11,
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
								'title'                => 'Ads',
								'nav_menu'             => 10,
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
								'nav_menu'             => 13,
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
								'title'     => 'News',
								'page_id'   => '%%posts.primary.179%%',
								'the_id'    => 'posts.primary.443',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.10',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.11',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.12',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.13',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.14',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.15',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.16',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.17',
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
								'page_id'   => '%%posts.primary.179%%',
								'the_id'    => 'posts.primary.444',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.164',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.108',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.106',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.162',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.107',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.109',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.110',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.163',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Topbar Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'News',
								'page_id'   => '%%posts.primary.179%%',
								'the_id'    => 'posts.primary.445',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Newsletter',
								'page_id'   => '%%posts.primary.103%%',
								'the_id'    => 'posts.primary.446',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact',
								'page_id'   => '%%posts.primary.124%%',
								'the_id'    => 'posts.primary.448',
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
					'file'   => $demo_image_url . $prefix . 'ad-300x250-post.jpg',
					'the_id' => 'media.primary.ad-300x250-post',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-sidebar.jpg',
					'the_id' => 'media.primary.ad-300x250-sidebar',
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
