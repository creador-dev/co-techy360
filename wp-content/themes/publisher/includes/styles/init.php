<?php

// include it manually earlier to get styles work!
include PUBLISHER_THEME_PATH . 'includes/libs/better-framework/functions/multilingual.php';

// Init style manager
include PUBLISHER_THEME_PATH . 'includes/styles/publisher-theme-style.php';
include PUBLISHER_THEME_PATH . 'includes/styles/publisher-theme-styles-manager.php';

if ( ! function_exists( 'publisher_styles_config' ) ) {
	/**
	 * List of all styles with configuration
	 *
	 * @return array
	 */
	function publisher_styles_config() {

		/*
		 * attrs for styles:
		 * - img
		 * - label
		 * - views
		 * - options
		 * - functions
		 * - css
		 * - js
		 */

		return array(
			'pure-magazine'     => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/pure-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Pure Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'online-magazine'   => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/online-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Online Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Technology', 'publisher' ),
					),
				)
			),
			'clean-tech'        => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-tech/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Tech', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
						__( 'Technology', 'publisher' ),
					),
				)
			),
			'the-online-post'   => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/the-online-post/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'The Online Post', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'Newspaper', 'publisher' ),
					),
				)
			),
			'crypto-news'       => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Crypto News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Cryptocurrency', 'publisher' ),
					),
				)
			),
			'newswatch'         => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/newswatch/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Market News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'Business', 'publisher' ),
					),
				)
			),
			'tech-magazine'     => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/tech-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Tech Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Technology', 'publisher' ),
					),
				)
			),
			'dark-magazine'     => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/dark-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Dark Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
						__( 'Dark', 'publisher' ),
					),
				)
			),
			'top-news'          => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/top-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Top News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'life-mag'          => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/life-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Life Mag', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'business-times'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/business-times/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Business Times', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
						__( 'Business', 'publisher' ),
					),
				)
			),
			'luxury-magazine'   => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/luxury-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Luxury Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
						__( 'Luxury', 'publisher' ),
					),
				)
			),
			'brilliance'        => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/brilliance/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Brilliance', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'readmag'           => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/readmag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Read Mag', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'celebrity-news'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/celebrity-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Celebrity News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Fashion', 'publisher' ),
					),
				)
			),
			'gamers'            => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/gamers/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Gamers', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Gaming', 'publisher' ),
					),
				)
			),
			'newspaper'         => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/newspaper/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Newspaper', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'Newspaper', 'publisher' ),
					),
				)
			),
			'travel-guides'     => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/travel-guides/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Travel Guides', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Travel', 'publisher' ),
					),
				)
			),
			'designer-blog'     => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/designer-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Designer blog', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'Lifestyle', 'publisher' ),
					),
				)
			),
			'better-mag'        => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/better-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Better Mag', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'adventure-blog'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/adventure-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Adventure Blog', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'Travel', 'publisher' ),
					),
				)
			),
			'the-prime'         => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/the-prime/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'The Prime', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'Fashion', 'publisher' ),
					),
				)
			),
			'wonderful'         => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/wonderful/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Wonderful', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'travel-blog'       => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/travel-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Travel Blog', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'Travel', 'publisher' ),
					),
				)
			),
			'classic-magazine'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/classic-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Classic Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'clean-blog'        => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Blog', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'clean-fashion'     => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-fashion/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Fashion', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Fashion', 'publisher' ),
					),
				)
			),
			'clean-magazine'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'clean-design'      => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-design/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Design', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
						__( 'Interior', 'publisher' ),
					),
				)
			),
			'clean-sport'       => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-sport/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Sport', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Sport', 'publisher' ),
					),
				)
			),
			'classic-blog'      => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/classic-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Classic Blog', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Blog', 'publisher' ),
					),
					'type' => array(
						__( 'General', 'publisher' ),
					),
				)
			),
			'clean-video'       => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/clean-video/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Clean Video', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Video', 'publisher' ),
					),
				)
			),
			'colorful-magazine' => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/colorful-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Colorful magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'crypto-press'      => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-press/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Crypto Press', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'crypcoin'          => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/crypcoin/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Crypcoin', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'financial-news'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/financial-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Financial News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'crypto-coiners'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-coiners/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Crypto Coiners', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'seo-news'          => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/seo-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Seo News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'music-news'        => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/music-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Music News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
					),
				)
			),
			'world-news'        => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/world-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'World News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
					),
				)
			),
			'bold-mag'          => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/bold-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Bold Mag', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'retro-magazine'    => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/retro-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Retro Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'news-insider'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/news-insider/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'News Insider', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
					),
				)
			),
			'android-news'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/android-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Android News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
					),
				)
			),
			'game-news'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/game-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Game News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'News', 'publisher' ),
					),
					'type' => array(
						__( 'News', 'publisher' ),
					),
				)
			),
			'view-magazine'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/view-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'View Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'daily-mag'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/daily-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Daily Mag', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'funny-mag'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/funny-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Funny Mag', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'people-magazine'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/people-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'People Magazine', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'life-daily'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/life-daily/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Life Daily', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'world-cup-news'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/world-cup-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'World Cup News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'car-news'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/car-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Car News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'coach'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/coach/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Coach', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'crypto-list'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-list/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Crypto List', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'cryptocurrency-news'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/cryptocurrency-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Cryptocurrency News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'foodly'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/foodly/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Foodly', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'newspaper-daily'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/newspaper-daily/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Newspaper Daily', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),
			'tech-news'  => array(
				'img'   => PUBLISHER_THEME_URI . 'includes/demos/tech-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Tech News', 'publisher' ),
				'views' => false,
				'info'  => array(
					'cat'  => array(
						__( 'Magazine', 'publisher' ),
					),
					'type' => array(
						__( 'Magazine', 'publisher' ),
					),
				)
			),

		);
	} // publisher_styles_config
}


if ( ! function_exists( 'bf_get_panel_default_style' ) ) {
	/**
	 * Handy function to get panels default style field id
	 *
	 * @param string $panel_id
	 *
	 * @return string
	 */
	function bf_get_panel_default_style( $panel_id = '' ) {

		if ( $panel_id == publisher_get_theme_panel_id() ) {
			return publisher_get_style() === 'default' ? 'clean-magazine' : publisher_get_style();
		}

		return 'default';
	}
}


if ( ! function_exists( 'publisher_get_style' ) ) {
	/**
	 * Used to get current active style.
	 *
	 * Default style: general
	 *
	 * @return  string
	 */
	function publisher_get_style() {

		static $style;

		if ( $style ) {
			return $style;
		}

		$lang = bf_get_current_language_option_code();

		// current lang style or default none lang
		$style = get_option( publisher_get_theme_panel_id() . $lang . '_current_style' );

		// check
		if ( $style === false && ! empty( $lang ) ) {
			$style = get_option( publisher_get_theme_panel_id() . '_current_style' );
		}

		if ( $style === false || empty( $style ) ) {
			$style = 'clean-magazine';
		}

		return $style;
	}
}

// Init styles
if ( class_exists( 'Publisher_Theme_Styles_Manager' ) ) {
	new Publisher_Theme_Styles_Manager();
}
