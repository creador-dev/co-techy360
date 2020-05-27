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

	$style_id       = 'world-cup-news';
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
						'name'     => 'Argentina',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'Brazil',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'Champions League',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.10',
					),
					array(
						'name'     => 'Championship',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.26',
					),
					array(
						'name'      => 'Coaches',
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
						'name'     => 'England',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.11',
					),
					array(
						'name'     => 'Europa League',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Football',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.27',
					),
					array(
						'name'     => 'France',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'     => 'Friendlies',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Germany',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Group A',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Group B',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'Group C',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.18',
					),
					array(
						'name'     => 'Group D',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.19',
					),
					array(
						'name'     => 'Group E',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.20',
					),
					array(
						'name'     => 'Group F',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.21',
					),
					array(
						'name'     => 'Group G',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.22',
					),
					array(
						'name'     => 'Group H',
						'parent'   => '%%taxonomy.primary.3%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.23',
					),
					array(
						'name'      => 'Groups',
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
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'Japan',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.24',
					),
					array(
						'name'      => 'Matches',
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
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Premier League',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Russian World Cup',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.28',
					),
					array(
						'name'     => 'Soccer',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.29',
					),
					array(
						'name'     => 'Spain',
						'parent'   => '%%taxonomy.primary.6%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.25',
					),
					array(
						'name'      => 'Teams',
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
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'videos',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.30',
					),
					array(
						'name'     => 'World Cup',
						'parent'   => '%%taxonomy.primary.4%%',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'World Cup',
						'taxonomy' => 'post_tag',
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
						'post_title'        => 'Photos',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.412',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Latest News',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.372',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Newsticker Injection',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.15',
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
						'the_id'            => 'posts.primary.186',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Newsletter',
						'post_content_file' => $demo_path . 'post-content-4.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.419',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Top News',
						'post_content_file' => $demo_path . 'post-content-5.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.361',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'LiveScore',
						'post_content_file' => $demo_path . 'post-content-6.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.421',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Reaction',
						'post_content_file' => $demo_path . 'post-content-7.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.446',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Contact Us',
						'post_content_file' => $demo_path . 'post-content-8.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.451',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Results',
						'post_content_file' => $demo_path . 'post-content-9.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.425',
					),
					array(
						'post_title'        => 'Zinedine Zidane coy, respectful of Liverpool ahead of Champions League final',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%,%%taxonomy.primary.15%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.286',
					),
					array(
						'post_title'        => 'Transfer Talk: Tottenham optimistic over Martial move, Lewandowski to Chelsea?',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.10%%,%%taxonomy.primary.4%%,%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.287',
					),
					array(
						'post_title'        => 'Zinedine Zidane coy, respectful of Liverpool ahead of Champions League final',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.10%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.284',
					),
					array(
						'post_title'        => 'Arsenal need Unai Emery\'s pragmatism more than Wenger\'s idealism',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.279',
					),
					array(
						'post_title'        => 'Liga MX end-of-season brief: Santos worthy champions, Chivas disappoint',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%,%%taxonomy.primary.21%%,%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.290',
					),
					array(
						'post_title'        => 'Carlo Ancelotti won\'t be shaken, passions will be stirred by Napoli challenge',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.259',
					),
					array(
						'post_title'        => 'Carlo Ancelotti to Napoli leaves journalist facing 500 mile trek after losing bet',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.260',
					),
					array(
						'post_title'        => 'Shaw replacement, Pogba partner and Willian among Mourinho targets at United',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.282',
					),
					array(
						'post_title'        => 'Barcelona overtake Real as top Europe\'s top club - new data',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.316',
					),
					array(
						'post_title'        => 'Watch: Liverpool coach Klopp joins fans\' defiant song after final defeat',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.320',
					),
					array(
						'post_title'        => 'Liverpool wanted everything & got minus something - Klopp',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.319',
					),
					array(
						'post_title'        => 'Going to the European Cup final - and risking the teacher\'s cane',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.318',
					),
					array(
						'post_title'        => 'Chelsea owner Abramovich \'eligible to become Israeli\' after UK visa delay',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.15%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.317',
					),
					array(
						'post_title'        => 'Bayern Munich\'s James Rodriguez launches own branded cryptocurrency',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.5%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.258',
					),
					array(
						'post_title'        => 'Messi \'increasingly sure\' he will not play for another European club',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.11%%,%%taxonomy.primary.15%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.310',
					),
					array(
						'post_title'        => 'Balotelli\'s first international goal in four years sees Italy beat Saudi Arabia',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.15%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.314',
					),
					array(
						'post_title'        => 'The Warm-Up: Death, taxes and Real Madrid winning the Champions League',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%,%%taxonomy.primary.21%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.293',
					),
					array(
						'post_title'        => 'Tom Rogić',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%,%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.228',
					),
					array(
						'post_title'        => 'FIFA vs. UEFA: Tensions escalate over Club World Cup and Global Nations League',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.458',
					),
					array(
						'post_title'        => 'Liverpool boss Jurgen Klopp sings with fans after Champions League defeat',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.460',
					),
					array(
						'post_title'        => 'Liverpool making progress under Jurgen Klopp but need a trophy to show it',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.461',
					),
					array(
						'post_title'        => 'Christian Pulisic back; USMNT retooling to continue in friendly against Bolivia',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.457',
					),
					array(
						'post_title'        => 'Michael Bradley',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.456',
					),
					array(
						'post_title'        => 'Adam Taggart',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.189',
					),
					array(
						'post_title'        => 'Bernard Parker',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.454',
					),
					array(
						'post_title'        => 'Real Madrid show no signs of slowing down in Champions League celebrations',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%,%%taxonomy.primary.20%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.191',
					),
					array(
						'post_title'        => 'Moeneeb Josephs',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.20%%,%%taxonomy.primary.23%%,%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.224',
					),
					array(
						'post_title'        => 'Son Heung-min',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%,%%taxonomy.primary.23%%,%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.230',
					),
					array(
						'post_title'        => 'FIFA World Cup song released: Will Smith, Nicky Jam, Era Istrefi perform \'Live it Up\'',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%,%%taxonomy.primary.22%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.231',
					),
					array(
						'post_title'        => 'Ex-Atletico Madrid star Paulo Futre eager for Liverpool win in Champions League final',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%,%%taxonomy.primary.21%%,%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.235',
					),
					array(
						'post_title'        => 'Tsepo Masilela',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%,%%taxonomy.primary.19%%,%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.229',
					),
					array(
						'post_title'        => 'Cooper a privilege to play with - McLeish pays tribute to late friend',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.322',
					),
					array(
						'post_title'        => 'Pawel Cibicki',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%,%%taxonomy.primary.23%%,%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.226',
					),
					array(
						'post_title'        => 'Premier League-bound Fulham have the players, style to compete at a higher level',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.19%%,%%taxonomy.primary.23%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.227',
					),
					array(
						'post_title'        => 'Mexico will miss Nestor Araujo at World Cup but top defender will return',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.257',
					),
					array(
						'post_title'        => 'Copa Libertadores knockout rounds: Brazilian clubs primed to rule Argentina',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.255',
					),
					array(
						'post_title'        => 'Transfer Rater: Douglas Costa to Man United, Lorenzo Pellegrini to Arsenal',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%,%%taxonomy.primary.22%%,%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.234',
					),
					array(
						'post_title'        => 'Titans Add Five, Release Four Following Rookie Minicamp',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.263',
					),
					array(
						'post_title'        => 'Denmark\'s Nicklas Bendtner faces \'race against time\' to be fit for World Cup',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.190',
					),
					array(
						'post_title'        => 'Who made your combined Chelsea-Man Utd FA Cup final XI?',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.11%%,%%taxonomy.primary.15%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.345',
					),
					array(
						'post_title'        => 'Chelsea need to show patience, give Alvaro Morata another shot to prove his worth',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.265',
					),
					array(
						'post_title'        => 'Britain\'s Norrie played his best tennis in French Open debut win',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.13%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.325',
					),
					array(
						'post_title'        => 'Arsenal\'s new head coach, Unai Emery, impresses at first news conference',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.12%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.262',
					),
					array(
						'post_title'        => 'Gareth Bale banishes to win the Champions League',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.10%%,%%taxonomy.primary.4%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.285',
					),
					array(
						'post_title'        => 'Neymar gets signed Los Angeles Lakers\' Lonzo Ball jersey at Brazil training',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.252',
					),
					array(
						'post_title'        => 'Karius Horror Show and Goal for the Ages Seal Real Treble',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.17%%,%%taxonomy.primary.22%%,%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.233',
					),
					array(
						'post_title'        => 'Which players are going to the World Cup? All confirmed squads',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%,%%taxonomy.primary.13%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.323',
					),
					array(
						'post_title'        => 'LIVE Transfer Talk: Man United keen on Gareth Bale, but price is now £200m',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.459',
					),
					array(
						'post_title'        => 'Unai Emery\'s Arsenal staff: Meet coaches set to bring new era to Emirates',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%,%%taxonomy.primary.4%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.264',
					),
					array(
						'post_title'        => 'PSG\'s Dani Alves appears at Brazil\'s MTV awards dressed as sharp as ever',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.18%%,%%taxonomy.primary.22%%,%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.232',
					),
					array(
						'post_title'        => 'Star striker\'s World Cup drug ban enrages South American nation',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%,%%taxonomy.primary.21%%,%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.289',
					),
					array(
						'post_title'        => 'FIFA not transparent on \'surprise\' competitions revamp - UEFA president',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.455',
					),
					array(
						'post_title'        => 'Liga MX end-of-season brief: Santos worthy champions, Chivas disappoint',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.10%%,%%taxonomy.primary.4%%,%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.288',
					),
					array(
						'post_title'        => 'World Cup Top Tenner: Hand of God, Suarez\'s bite, Banks\' save, best matches',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%,%%taxonomy.primary.7%%',
						),
						'the_id'            => 'posts.primary.250',
					),
					array(
						'post_title'        => 'Manchester United\'s Eric Bailly offers his support to Liverpool\'s Loris Karius',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.453',
					),
					array(
						'post_title'        => 'Absolutely unbelievable - FA People\'s Cup winners crowned',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.11%%,%%taxonomy.primary.15%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.347',
					),
					array(
						'post_title'        => 'Paper Round: Man Utd lead Bale chase, Liverpool to move for Alisson',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%,%%taxonomy.primary.20%%,%%taxonomy.primary.3%%',
							'post_tag' => '%%taxonomy.primary.30%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=ox3FDz3qTho',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.291',
					),
					array(
						'post_title'        => 'Barcelona legend Andres Iniesta\'s arrival a massive boost for J.League and Asia',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.14%%,%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.261',
					),
					array(
						'post_title'        => 'England\'s batting: Why is it so bad and what can they do about it?',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.11%%,%%taxonomy.primary.15%%,%%taxonomy.primary.25%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.349',
					),
					array(
						'post_title'        => 'Ahmed Kryukov',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.11%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.346',
					),
					array(
						'post_title'        => 'Referee was right not to use VAR on Young handball - Shearer',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.11%%,%%taxonomy.primary.15%%,%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.348',
					),
					array(
						'post_title'        => 'Mike Nordin',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.11%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.324',
					),
					array(
						'post_title'        => 'Barcelona\'s Lionel Messi would swap club title for Argentina World Cup success',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.188',
					),
					array(
						'post_title'        => 'Auriville Lanctot',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.16%%,%%taxonomy.primary.20%%,%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.292',
					),
					array(
						'post_title'        => 'Arad Khakbaz',
						'post_content_file' => $demo_path . 'post-content-10.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.8%%,%%taxonomy.primary.13%%,%%taxonomy.primary.24%%,%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'The Guardian',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.theguardian.com/football/2018',
							),
						),
						'the_id'            => 'posts.primary.321',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index banner',
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
						'the_id'     => 'posts.primary.69',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Single X Paragraph',
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
						'the_id'     => 'posts.primary.153',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'X Post Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-468x60}:\'full\'%%',
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
						'the_id'     => 'posts.primary.64',
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
						'the_id'     => 'posts.primary.68',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Header Inline Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-728x90-2}:\'full\'%%',
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
						'the_id'     => 'posts.primary.61',
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
								'meta_value' => '#e2081d',
							),
						),
						'the_id'     => 'posts.primary.76',
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
							'off_canvas_logo'         => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
							'site_bg_image_2'         => array(
								'type' => 'parallax',
								'img'  => '%%bf_product_demo_media_url:{media.primary.bg2}:\'full\'%%',
							),
							'injection_before_header' => '%%posts.primary.15%%',
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
						'option_value' => '%%posts.primary.186%%',
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
							'header_aside_logo_banner' => '%%posts.primary.61%%',
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
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.68%%',
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
						array(
							'widget_id'       => 'bs-text-listing-1',
							'widget_settings' => array(
								'title'                 => 'Most viewed',
								'count'                 => '4',
								'order_by'              => 'popular',
								'listing-settings'      => array(
									'title-limit'       => '56',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'term-badge'        => '1',
									'term-badge-count'  => '1',
									'term-badge-tax'    => 'category',
									'show-ranking'      => '',
									'meta'              => array(
										'show'        => '1',
										'author'      => '1',
										'date'        => '1',
										'date-format' => 'readable',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '1',
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
								'columns'               => 1,
							),
						),
					),
					'footer-1'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'content'              => 'Contact us: <a href="mailto:info@yoursite.com" target="_blank">info@yoursite.com</a>',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_email'           => '#',
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
								'title'                 => 'Trending now',
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '55',
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
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.186%%',
								'item_meta' => array(
									10 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.464',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Latest Post',
								'page_id'   => '%%posts.primary.186%%',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.473',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Reaction',
								'page_id'   => '%%posts.primary.446%%',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.447',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Results',
								'page_id'   => '%%posts.primary.425%%',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.471',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Pictures',
								'page_id'   => '%%posts.primary.412%%',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.472',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.30%%',
								'taxonomy'  => 'post_tag',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.183',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Newsletter',
								'page_id'   => '%%posts.primary.419%%',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.470',
							),
							array(
								'item_type' => 'page',
								'title'     => 'LiveScore',
								'page_id'   => '%%posts.primary.421%%',
								'parent-id' => '%%posts.primary.464%%',
								'the_id'    => 'posts.primary.469',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									10 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.156',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Top News',
								'page_id'   => '%%posts.primary.361%%',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.466',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.8%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.158',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.159',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.11%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.160',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.13%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.161',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.15%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.162',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.24%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.163',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.25%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.156%%',
								'the_id'    => 'posts.primary.164',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									10 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.155',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Latest News',
								'page_id'   => '%%posts.primary.372%%',
								'parent-id' => '%%posts.primary.155%%',
								'the_id'    => 'posts.primary.467',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.10%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.155%%',
								'the_id'    => 'posts.primary.170',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.12%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.155%%',
								'the_id'    => 'posts.primary.171',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.14%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.155%%',
								'the_id'    => 'posts.primary.172',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.155%%',
								'the_id'    => 'posts.primary.173',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.7%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.155%%',
								'the_id'    => 'posts.primary.174',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'item_meta' => array(
									10 => array(
										'meta_key'   => 'mega_menu',
										'meta_value' => 'link-list',
									),
								),
								'the_id'    => 'posts.primary.7',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.16%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.175',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.17%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.176',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.18%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.177',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.19%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.178',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.20%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.179',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.21%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.180',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.22%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.181',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.23%%',
								'taxonomy'  => 'category',
								'parent-id' => '%%posts.primary.7%%',
								'the_id'    => 'posts.primary.182',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.154',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Photos',
								'page_id'   => '%%posts.primary.412%%',
								'the_id'    => 'posts.primary.468',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.30%%',
								'taxonomy'  => 'post_tag',
								'item_meta' => array(
									16 => array(
										'meta_key'   => 'badge_label',
										'meta_value' => 'NEW',
									),
									18 => array(
										'meta_key'   => 'badge_bg_color',
										'meta_value' => '#e2081d',
									),
								),
								'the_id'    => 'posts.primary.157',
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
								'page_id'   => '%%posts.primary.186%%',
								'the_id'    => 'posts.primary.465',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.168',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.167',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.166',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
								'the_id'    => 'posts.primary.165',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.30%%',
								'taxonomy'  => 'post_tag',
								'the_id'    => 'posts.primary.169',
							),
							array(
								'item_type' => 'page',
								'title'     => 'Contact Us',
								'page_id'   => '%%posts.primary.451%%',
								'the_id'    => 'posts.primary.452',
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
					'file'   => $demo_image_url . $prefix . 'logo-off-canvas.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'logo-footer.png',
					'the_id' => 'media.primary.logo-footer',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'quote-avatar.jpg',
					'the_id' => 'media.primary.quote-avatar',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250.jpg',
					'the_id' => 'media.primary.ad-300x250-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-728x90.jpg',
					'the_id' => 'media.primary.ad-728x90',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-300x250-2.jpg',
					'the_id' => 'media.primary.ad-300x250-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-468x60.jpg',
					'the_id' => 'media.primary.ad-468x60',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'ad-728x90-2.jpg',
					'the_id' => 'media.primary.ad-728x90-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'bg2.jpg',
					'the_id' => 'media.primary.bg2',
				),
			),
	);
}
