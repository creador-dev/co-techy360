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

	$style_id       = 'coach';
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
                     'name' => 'Books',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'slider_type',
                             'meta_value' => 'disable',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.2',
                 ),
                 array(
                     'name' => 'Brain',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.16',
                 ),
                 array(
                     'name' => 'Courses',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'slider_type',
                             'meta_value' => 'disable',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.3',
                 ),
                 array(
                     'name' => 'Entrepreneurs',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.4',
                 ),
                 array(
                     'name' => 'Grow',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.18',
                 ),
                 array(
                     'name' => 'Lifestyle',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.5',
                 ),
                 array(
                     'name' => 'Motivation',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.6',
                 ),
                 array(
                     'name' => 'Video',
                     'taxonomy' => 'post_format',
                     'the_id' => 'taxonomy.primary.20',
                 ),
                 array(
                     'name' => 'Power',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.19',
                 ),
                 array(
                     'name' => 'Resources',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.8',
                 ),
                 array(
                     'name' => 'Speaking',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.9',
                 ),
                 array(
                     'name' => 'Startup',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.15',
                 ),
                 array(
                     'name' => 'Success',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.7',
                 ),
                 array(
                     'name' => 'Successful',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.14',
                 ),
                 array(
                     'name' => 'Think',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.17',
                 ),
                 array(
                     'name' => 'Video',
                     'taxonomy' => 'post_format',
                     'the_id' => 'taxonomy.primary.21',
                 ),
                 array(
                     'name' => 'Videos',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.10',
                 ),
             ),
         ),
      //
      // ->Posts
      //
      'posts' => 
         array(
           'multi_steps' => false,
           array(
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Books',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                         array(
                             'meta_key' => 'injection_before_footer',
                             'meta_value' => '1',
                         ),
                     ),
                     'the_id' => 'posts.primary.35',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Newsletter',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '2-col-right',
                         ),
                     ),
                     'the_id' => 'posts.primary.37',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Resources',
                     'post_content_file' => $demo_path . 'post-content-2.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.31',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Contact',
                     'post_content_file' => $demo_path . 'post-content-3.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.10',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Front page',
                     'post_content_file' => $demo_path . 'post-content-4.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'prepare_vc_css' => true,
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.8',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Blog',
                     'post_content_file' => $demo_path . 'post-content-5.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.62',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Videos',
                     'post_content_file' => $demo_path . 'post-content-6.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'the_id' => 'posts.primary.29',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Content Injection - Before Footer',
                     'post_content_file' => $demo_path . 'post-content-7.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'prepare_vc_css' => true,
                     'the_id' => 'posts.primary.207',
                 ),
                 array(
                     'post_title' => 'Want to Change Your Business Model? Answer These 3 Questions.',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.292',
                 ),
                 array(
                     'post_title' => '15 Scientifically Proven Ways to Work Smarter, Not Just More',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.293',
                 ),
                 array(
                     'post_title' => 'Why Business Leaders Are No Longer Afraid to Get Political',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.291',
                 ),
                 array(
                     'post_title' => '25 Innovative IoT Companies and Products You Need to Know',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.289',
                 ),
                 array(
                     'post_title' => '4 Steps to Quintuple Your Business in the Next 12 Months',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.270',
                 ),
                 array(
                     'post_title' => 'Tesla Will Start Enabling Full Self-Driving Features in August',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.283',
                 ),
                 array(
                     'post_title' => 'The Art of Knowing When to Hire and When to Contract',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.286',
                 ),
                 array(
                     'post_title' => 'How to Scale Your Marketing Without a Marketing Budget',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.296',
                 ),
                 array(
                     'post_title' => '7 Tips to Get the Most Bang for Your Buck When Buying Ads',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.297',
                 ),
                 array(
                     'post_title' => '8 Inspirational Quotes From Movie Mogul Steven Spielberg',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.314',
                 ),
                 array(
                     'post_title' => 'Why Startups Should Look for Opportunity Between the Coasts',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.312',
                 ),
                 array(
                     'post_title' => '8 Ways to Overcome the Fears Blocking Your Path to Success',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.316',
                 ),
                 array(
                     'post_title' => 'How To Convince Cannabis Investors to Give You Money',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.269',
                 ),
                 array(
                     'post_title' => 'Hate Is a Cancer, Apple CEO Writes in Email to Employees',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.298',
                 ),
                 array(
                     'post_title' => 'How to Set Goals That Will Turn an Average Team Into All-Stars',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.319',
                 ),
                 array(
                     'post_title' => 'Let\'s Be Friends: Bad Idea When That Person is Your Employee?',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.299',
                 ),
                 array(
                     'post_title' => 'Your Odds of Succeeding Improve When You Create a Success Plan',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.260',
                 ),
                 array(
                     'post_title' => 'Walking With AI: How to Spot, Store and Clean the Data You Need',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.229',
                 ),
                 array(
                     'post_title' => 'How to Gain an Edge in the Ecommerce Marketplace',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.231',
                 ),
                 array(
                     'post_title' => 'Successful Networking Is All About Having the Right Energy',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.232',
                 ),
                 array(
                     'post_title' => 'New Research Shows Bitcoin\'s Meteoric Rise Was a Scam',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.230',
                 ),
                 array(
                     'post_title' => '4 Pitfalls to Avoid When Choosing Tech for Your Business',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.228',
                 ),
                 array(
                     'post_title' => 'How to Use the “Small Victories” Method to Avoid Burning Out',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.222',
                 ),
                 array(
                     'post_title' => 'How This Canna-Couple Learned to Think Inside the Box',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.226',
                 ),
                 array(
                     'post_title' => 'How Reddit\'s Alexis Ohanian Balances Work and Family',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.235',
                 ),
                 array(
                     'post_title' => 'Why Dippin\' Dots Is Teaming Up With a Popcorn Brand',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.236',
                 ),
                 array(
                     'post_title' => 'Collaboration, Not Competition, Is Key for Fintech Companies',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.266',
                 ),
                 array(
                     'post_title' => 'The Secret to Making Facebook Ads Work for Your Business',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.267',
                 ),
                 array(
                     'post_title' => 'New Research Shows Bitcoin\'s Meteoric Rise Was a Scam',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.265',
                 ),
                 array(
                     'post_title' => '13 Expert Tips to Help You Build Your Instagram Following',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.320',
                 ),
                 array(
                     'post_title' => '4 Tools for Automating and Recycling Social Media Posts',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.255',
                 ),
                 array(
                     'post_title' => 'Want to Join a Women-Only Accelerator? Read This First.',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.257',
                 ),
                 array(
                     'post_title' => '10 Psychological Tricks to Boost Your Website\'s Sales',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.268',
                 ),
                 array(
                     'post_title' => 'The Seasons of Life by Jim Rohn',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.348',
                 ),
                 array(
                     'post_title' => 'Successful Networking Is All About Having the Right Energy',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.233',
                 ),
                 array(
                     'post_title' => 'Alan Alda Reveals His Top Communication Techniques',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.321',
                 ),
                 array(
                     'post_title' => 'Don\'t Hire Like Amazon: How to Hire Right and Avoid Layoffs',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.237',
                 ),
                 array(
                     'post_title' => 'Why Digital Marketers Should Be More Like Personal Shoppers',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.259',
                 ),
                 array(
                     'post_title' => 'Building Trust, Blazing New Trails and Inspiring Others',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.322',
                 ),
                 array(
                     'post_title' => 'Start Your Own Business, 6th Edition',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.346',
                 ),
                 array(
                     'post_title' => 'Finding Your \'Stress Sweet Spot\' to Perform at Your Best',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.317',
                 ),
                 array(
                     'post_title' => 'How to Write Email Subject Lines That Will Actually Be Opened',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.300',
                 ),
                 array(
                     'post_title' => 'Discover Untapped Talent, Find Fresh Branding Ideas',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.325',
                 ),
                 array(
                     'post_title' => 'How This Husband-and-Wife Team Grew a B&B Empire',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.264',
                 ),
                 array(
                     'post_title' => 'Being a Boss Entrepreneur Doesn\'t Mean You Have to Be Selfish',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.295',
                 ),
                 array(
                     'post_title' => 'When Writing Your Business Plan, Be Sure to Include This',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.234',
                 ),
                 array(
                     'post_title' => '5 Ways to Write About an App\'s Benefits -- Not Features',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.261',
                 ),
                 array(
                     'post_title' => 'The Greatest Salesman in the World',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.358',
                 ),
                 array(
                     'post_title' => 'Start Your Own Cannabis Business',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.342',
                 ),
                 array(
                     'post_title' => 'Don\'t Breakdown, Breakthrough with Joe Apfelbaum',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.327',
                 ),
                 array(
                     'post_title' => 'The Magic of Thinking Big',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.352',
                 ),
                 array(
                     'post_title' => 'Entrepreneur Voices on Growth Hacking',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.344',
                 ),
                 array(
                     'post_title' => 'Harness the Law of Attraction to Improve Networking',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                         'post_tag' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.21%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=B9XGUpQZY38',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.326',
                 ),
                 array(
                     'post_title' => 'The Journey to Success is Paved with Self-Discovery',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.324',
                 ),
                 array(
                     'post_title' => 'Developing the Leader Within You',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.360',
                 ),
                 array(
                     'post_title' => 'Chicken Soup for the Soul Series',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.356',
                 ),
                 array(
                     'post_title' => 'The 7 Habits of Highly Effective People',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.362',
                 ),
                 array(
                     'post_title' => 'The Power of Positive Thinking',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.354',
                 ),
                 array(
                     'post_title' => 'Speaking with Your Partner',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.433',
                 ),
                 array(
                     'post_title' => 'Find the Path of Life',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.434',
                 ),
                 array(
                     'post_title' => 'Improving Communication',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.428',
                 ),
                 array(
                     'post_title' => 'Implementing Your Values',
                     'post_content_file' => $demo_path . 'post-content-8.txt',
                     'post_excerpt' => 'Have you had a goal you begin to work toward only to run out of steam? Do you know what you need to do to get to where you want to be ...',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.425',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Banner Sidebar',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-336x280-sidebar}:\'full\'%%',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => '#',
                         ),
                         array(
                             'meta_key' => 'caption',
                             'meta_value' => '- Advertisement -',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.144',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Banner X Post',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-728x90-x-post}:\'full\'%%',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => '#',
                         ),
                         array(
                             'meta_key' => 'caption',
                             'meta_value' => '- Advertisement -',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.136',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Header Inline Banner',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.ad-180x83-header}:\'full\'%%',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => '#',
                         ),
                         array(
                             'meta_key' => 'caption',
                             'meta_value' => '- Advertisement -',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.79',
                 ),
                 array(
                     'post_type' => 'bsnp-newsletter',
                     'post_title' => 'newsletter',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'feedburner',
                         ),
                         array(
                             'meta_key' => 'feedburner_id',
                             'meta_value' => '#',
                         ),
                         array(
                             'meta_key' => 'style',
                             'meta_value' => 'style-2',
                         ),
                     ),
                     'the_id' => 'posts.primary.200',
                 ),
             ),
         ),
      //
      // ->Options
      //
      'options' => 
         array(
           'multi_steps' => false,
           array(
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options',
                     'option_value_file' => $demo_path . 'options.json',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options',
                     'option_value' => array(
                         'logo_image' => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
                         'logo_image_retina' => '',
                         'off_canvas_logo' => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
                         'injection_before_footer' => '%%posts.primary.207%%',
                     ),
                     'merge_options' => true,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options_current_style',
                     'option_value' => $style_id,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options_current_demo',
                     'option_value' => $style_id,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'page_on_front',
                     'option_value' => '%%posts.primary.8%%',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'show_on_front',
                     'option_value' => 'page',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'better_ads_manager',
                     'option_value' => array(
                         'header_aside_logo_type' => 'banner',
                         'header_aside_logo_banner' => '%%posts.primary.79%%',
                     ),
                     'merge_options' => true,
                 ),
             ),
         ),
      //
      // ->Widgets
      //
      'widgets' => 
         array(
           'multi_steps' => false,
           array(
                 'primary-sidebar' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-thumbnail-listing-1',
                         'widget_settings' => array(
                             'title' => 'Popular',
                             'count' => '5',
                             'columns' => 1,
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'thumbnail-type' => 'featured-image',
                                 'title-limit' => '60',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'before-meta',
                                 'show-ranking' => '1',
                                 'meta' => array(
                                     'show' => '0',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'none',
                         ),
                     ),
                     array(
                         'widget_id' => 'bs-likebox',
                         'widget_settings' => array(
                             'url' => 'https://www.facebook.com/etthehiphoppreacher/',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                         ),
                     ),
                     array(
                         'widget_id' => 'better-ads',
                         'widget_settings' => array(
                             'type' => 'banner',
                             'banner' => '%%posts.primary.144%%',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'columns' => '1',
                         ),
                     ),
                 ),
                 'footer-1' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-about',
                         'widget_settings' => array(
                             'content' => '<p>+123-333-456<p>
         <p>info@yoursite.com</p>
         <p>3882 Rose Street Westchester,
         IL 60154</p>',
                             'link_facebook' => '#',
                             'link_twitter' => '#',
                             'link_google' => '#',
                             'link_instagram' => '#',
                             'link_youtube' => '#',
                             'title' => 'contact me',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                         ),
                     ),
                 ),
                 'footer-2' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-text-listing-3',
                         'widget_settings' => array(
                             'title' => 'Courses',
                             'category' => '%%taxonomy.primary.-2%%',
                             'count' => '3',
                             'order_by' => 'rand',
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'title-limit' => '120',
                                 'excerpt-limit' => '200',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'before-meta',
                                 'show-ranking' => '',
                                 'meta' => array(
                                     'show' => '1',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'none',
                             'columns' => 1,
                         ),
                     ),
                 ),
                 'footer-3' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-text-listing-3',
                         'widget_settings' => array(
                             'title' => 'Books',
                             'category' => '%%taxonomy.primary.-2%%',
                             'count' => '3',
                             'order_by' => 'title',
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'title-limit' => '120',
                                 'excerpt-limit' => '200',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'before-meta',
                                 'show-ranking' => '',
                                 'meta' => array(
                                     'show' => '0',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'none',
                             'columns' => 1,
                         ),
                     ),
                 ),
                 'footer-4' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-text-listing-3',
                         'widget_settings' => array(
                             'title' => 'Blog',
                             'category' => '%%taxonomy.primary.-2%%',
                             'count' => '3',
                             'order_by' => 'popular',
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'title-limit' => '120',
                                 'excerpt-limit' => '200',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'before-meta',
                                 'show-ranking' => '',
                                 'meta' => array(
                                     'show' => '0',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'none',
                             'columns' => 1,
                         ),
                     ),
                 ),
             ),
         ),
      //
      // ->Menus
      //
      'menus' => 
         array(
           'multi_steps' => false,
           array(
                 array(
                     'menu-location' => 'footer-menu',
                     'menu-name' => 'Footer Navigation',
                     'items' => array(
                         array(
                             'item_type' => 'page',
                             'title' => 'Home',
                             'page_id' => '%%posts.primary.8%%',
                             'the_id' => 'posts.primary.153',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Blog',
                             'page_id' => '%%posts.primary.62%%',
                             'the_id' => 'posts.primary.172',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.3%%',
                             'taxonomy' => 'category',
                             'the_id' => 'posts.primary.157',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Books',
                             'page_id' => '%%posts.primary.35%%',
                             'the_id' => 'posts.primary.173',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Videos',
                             'page_id' => '%%posts.primary.29%%',
                             'the_id' => 'posts.primary.156',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Resources',
                             'page_id' => '%%posts.primary.31%%',
                             'the_id' => 'posts.primary.155',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Contact',
                             'page_id' => '%%posts.primary.10%%',
                             'the_id' => 'posts.primary.154',
                         ),
                     ),
                 ),
                 array(
                     'menu-location' => 'main-menu',
                     'menu-name' => 'Main Navigation',
                     'recently-edit' => true,
                     'items' => array(
                         array(
                             'item_type' => 'page',
                             'title' => 'Home',
                             'page_id' => '%%posts.primary.8%%',
                             'the_id' => 'posts.primary.161',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Blog',
                             'page_id' => '%%posts.primary.62%%',
                             'item_meta' => array(
                                 10 => array(
                                     'meta_key' => 'mega_menu',
                                     'meta_value' => 'link-list',
                                 ),
                             ),
                             'the_id' => 'posts.primary.168',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.7%%',
                             'taxonomy' => 'category',
                             'parent-id' => '%%posts.primary.168%%',
                             'the_id' => 'posts.primary.151',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.5%%',
                             'taxonomy' => 'category',
                             'parent-id' => '%%posts.primary.168%%',
                             'the_id' => 'posts.primary.149',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.6%%',
                             'taxonomy' => 'category',
                             'parent-id' => '%%posts.primary.168%%',
                             'the_id' => 'posts.primary.150',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.4%%',
                             'taxonomy' => 'category',
                             'parent-id' => '%%posts.primary.168%%',
                             'the_id' => 'posts.primary.148',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.3%%',
                             'taxonomy' => 'category',
                             'the_id' => 'posts.primary.145',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Books',
                             'page_id' => '%%posts.primary.35%%',
                             'item_meta' => array(
                                 16 => array(
                                     'meta_key' => 'badge_label',
                                     'meta_value' => 'NEW',
                                 ),
                                 18 => array(
                                     'meta_key' => 'badge_bg_color',
                                     'meta_value' => '#41979e',
                                 ),
                             ),
                             'the_id' => 'posts.primary.162',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Videos',
                             'page_id' => '%%posts.primary.29%%',
                             'the_id' => 'posts.primary.166',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Resources',
                             'page_id' => '%%posts.primary.31%%',
                             'the_id' => 'posts.primary.164',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Contact',
                             'page_id' => '%%posts.primary.10%%',
                             'the_id' => 'posts.primary.163',
                         ),
                     ),
                 ),
                 array(
                     'menu-location' => 'top-menu',
                     'menu-name' => 'Topbar Navigation',
                     'items' => array(
                         array(
                             'item_type' => 'page',
                             'title' => 'Start Here',
                             'page_id' => '%%posts.primary.8%%',
                             'the_id' => 'posts.primary.152',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Blog',
                             'page_id' => '%%posts.primary.62%%',
                             'the_id' => 'posts.primary.170',
                         ),
                         array(
                             'item_type' => 'custom',
                             'target' => '',
                             'title' => 'RTL [no-link]',
                             'url' => '#',
                             'the_id' => 'posts.primary.147',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Newsletter',
                             'page_id' => '%%posts.primary.37%%',
                             'the_id' => 'posts.primary.169',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Contact Us',
                             'page_id' => '%%posts.primary.10%%',
                             'the_id' => 'posts.primary.171',
                         ),
                     ),
                 ),
             ),
         ),
      //
      // ->Media
      //
      'media' => 
         array(
           'multi_steps' => true,
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-1.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-1',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-2.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-2',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-3.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-3',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-4.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-4',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-5.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-5',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-6.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-6',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-7.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-7',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-8.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-8',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-9.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-9',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-10.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-10',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-11.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-11',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-12.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-12',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'logo-main.png',
                 'the_id' => 'media.primary.logo-main',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'logo-off-canvas.png',
                 'the_id' => 'media.primary.logo-off-canvas',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'ad-336x280-sidebar.jpg',
                 'the_id' => 'media.primary.ad-336x280-sidebar',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'ad-728x90-x-post.jpg',
                 'the_id' => 'media.primary.ad-728x90-x-post',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'ad-180x83-header.jpg',
                 'the_id' => 'media.primary.ad-180x83-header',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'quote-avatar.png',
                 'the_id' => 'media.primary.quote-avatar',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-1.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-1',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-2.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-2',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-3.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-3',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-4.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-4',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-5.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-5',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-6.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-6',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-7.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-7',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-8.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-8',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-9.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-9',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-10.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-10',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-11.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-11',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'thumb-12.jpg',
                 'resize' => true,
                 'the_id' => 'media.primary.thumb-12',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'logo-main.png',
                 'the_id' => 'media.primary.logo-main',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'logo-off-canvas.png',
                 'the_id' => 'media.primary.logo-off-canvas',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'ad-336x280-sidebar.jpg',
                 'the_id' => 'media.primary.ad-336x280-sidebar',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'ad-728x90-x-post.jpg',
                 'the_id' => 'media.primary.ad-728x90-x-post',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'ad-180x83-header.jpg',
                 'the_id' => 'media.primary.ad-180x83-header',
             ),
           array(
                 'file' => $demo_image_url . $prefix . 'quote-avatar.png',
                 'the_id' => 'media.primary.quote-avatar',
             ),
         ),	);
}
