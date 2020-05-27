<?php
/**
 * Demo Installer Configuration
 */

add_filter( 'better-framework/product-pages/install-demo/config', 'publisher_demos_config' );

if ( ! function_exists( 'publisher_demos_config' ) ) {
	/**
	 * Adds active demos to BS Product Pages with correct config to install
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	function publisher_demos_config( $data = array() ) {

		$data['pure-magazine']   = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/pure-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Pure Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/',
			'options'     => true,
		);
		$data['online-magazine'] = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/online-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Online Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/online-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['clean-tech']      = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-tech/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Tech', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-tech/',
			'options'     => true,
		);
		$data['the-online-post'] = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/the-online-post/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'The Online Post', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/the-online-post/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['crypto-news']     = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Crypto News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/crypto-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['newswatch']       = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/newswatch/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Market News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/market-news/',
			'options'     => true,
		);
		$data['tech-magazine']   = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/tech-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Tech Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/tech-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['dark-magazine']   = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/dark-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Dark Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/dark-mag/',
			'options'     => true,
		);
		$data['top-news']        = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/top-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Top News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/top-news/',
			'options'     => true,
		);
		$data['business-times']  = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/business-times/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Business Times', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/business-times/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);

		$data['luxury-magazine'] = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/luxury-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Luxury Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/luxury-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['brilliance']      = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/brilliance/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Brilliance', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/brilliance/',
			'options'     => true,
		);
		$data['readmag']         = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/readmag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Read Mag', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/read-mag/',
			'options'     => true,
		);
		$data['celebrity-news']  = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/celebrity-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Celebrity News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/celebrity-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['gamers']          = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/gamers/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Gamers', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/gamers/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['newspaper']       = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/newspaper/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Newspaper', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/newspaper/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['travel-guides']   = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/travel-guides/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Travel Guides', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/travel-guides/',
			'options'     => true,
		);

		$data['adventure-blog'] = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/adventure-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Adventure Blog', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/adventure-blog/',
			'options'     => true,
		);

		$data['the-prime']     = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/the-prime/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'The Prime', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/the-prime/',
			'options'     => true,
		);
		$data['wonderful']     = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/wonderful/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Wonderful', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/wonderful/',
			'options'     => true,
		);
		$data['designer-blog'] = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/designer-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Designer Blog', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/designer-blog/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['better-mag']    = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/better-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Better Mag', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/better-mag/',
			'options'     => true,
		);

		$data['classic-magazine']         = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/classic-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Classic Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/classic-mag/',
			'options'     => true,
		);
		$data['clean-blog']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Blog', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-blog/',
			'options'     => true,
		);
		$data['clean-fashion']            = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-fashion/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Fashion', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-fashion/',
			'options'     => true,
		);
		$data['travel-blog']              = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/travel-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Traveler Blog', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/traveler-blog/',
			'options'     => true,
		);
		$data['clean-magazine']           = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-mag/',
			'options'     => true,
		);
		$data['clean-design']             = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-design/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Design', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-design/',
			'options'     => true,
		);
		$data['clean-sport']              = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-sport/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Sport', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-sport/',
			'options'     => true,
		);
		$data['classic-blog']             = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/classic-blog/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Classic Blog', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/classic-blog/',
			'options'     => true,
		);
		$data['clean-video']              = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-video/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Clean Video', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/clean-video/',
			'options'     => true,
		);
		$data['life-mag']                 = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/life-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Life Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/life-mag/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['clean-tech-rtl-arabic']    = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/clean-tech-rtl-arabic/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'RTL - Clean Tech', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/rtl/',
			'badges'      => array(
				'RTL',
			),
			'options'     => true,
		);
		$data['pure-magazine-rtl-arabic'] = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/pure-magazine-rtl-arabic/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'RTL - Pure Mag', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/rtl-clean-mag/',
			'badges'      => array(
				'RTL',
			),
			'options'     => true,
		);
		$data['bold-mag']                 = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/bold-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Bold Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/bold-mag/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['retro-magazine']           = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/retro-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Retro Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/retro-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['colorful-magazine']        = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/colorful-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Colorful Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/colorful-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['seo-news']                 = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/seo-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'SEO News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/seo-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['music-news']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/music-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Music News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/music-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['crypcoin']                 = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/crypcoin/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Crypcoin', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/crypcoin/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['crypto-coiners']           = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-coiners/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Crypto Coiners', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/crypto-coiners/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['world-news']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/world-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'World News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/world-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['crypto-press']             = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-press/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Crypto Press', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/crypto-press/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['financial-news']           = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/financial-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Financial News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/financial-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['news-insider']             = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/news-insider/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'News Insider', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/news-insider/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['android-news']             = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/android-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Android News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/android-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['game-news']                = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/game-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Game News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/game-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['view-magazine']            = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/view-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'View Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/view-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['daily-mag']                = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/daily-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Daily Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/daily-mag/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['funny-mag']                = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/funny-mag/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Funny Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/funny-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['people-magazine']          = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/people-magazine/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'People Magazine', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/people-magazine/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['world-cup-news']           = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/world-cup-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'World Cup News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/world-cup-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['life-daily']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/life-daily/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Life Daily', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/life-daily/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['car-news']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/car-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Car News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/car-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['coach']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/coach/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Coach', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/coach/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['cryptocurrency-news']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/cryptocurrency-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Cryptocurrency News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/cryptocurrency-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['crypto-list']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/crypto-list/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Crypto List', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/crypto-list/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['newspaper-daily']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/newspaper-daily/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Newspaper Daily', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/newspaper-daily/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['foodly']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/foodly/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Foodly', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/foodly/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);
		$data['tech-news']               = array(
			'thumbnail'   => PUBLISHER_THEME_URI . 'includes/demos/tech-news/thumbnail.png?v=' . PUBLISHER_THEME_VERSION,
			'name'        => __( 'Tech News', 'publisher' ),
			'preview_url' => 'http://demo.betterstudio.com/publisher/tech-news/',
			'options'     => true,
			'badges'      => array(
				'New',
			),
		);

		return $data;
	} // publisher_demos_config
}


if ( ! function_exists( 'publisher_get_demo_id' ) ) {
	/**
	 *
	 * @return mixed
	 */
	function publisher_get_demo_id() {

		global $publisher_theme_core_globals_cache;

		// return from cache
		if ( isset( $publisher_theme_core_globals_cache['theme-demo'] ) ) {
			return $publisher_theme_core_globals_cache['theme-demo'];
		}

		$demo = get_option( publisher_get_theme_panel_id() . '_current_demo' );

		// cache it
		$publisher_theme_core_globals_cache['theme-demo'] = $demo;

		return $demo;

	} // publisher_get_demo_id
}


// Adds filter for all demos content
foreach ( publisher_demos_config() as $demo_id => $demo_config ) {
	add_filter( 'better-framework/product-pages/install-demo/' . $demo_id . '/content', 'publisher_init_demo_content', 10, 2 );
	add_filter( 'better-framework/product-pages/install-demo/' . $demo_id . '/setting', 'publisher_init_demo_setting', 10, 2 );
}

if ( ! function_exists( 'publisher_init_demo_content' ) ) {
	/**
	 * Pulls selected demo data from its directory and send it to BS Product Pages demo installer
	 *
	 * @param array  $content
	 * @param string $demo_id
	 *
	 * @return array
	 */
	function publisher_init_demo_content( $content = array(), $demo_id = '' ) {

		$demos_list = publisher_demos_config();

		$theme_dir = get_template_directory() . '/';

		// check if its valid, get value from its directory
		if ( ! empty( $demos_list[ $demo_id ] ) ) {

			include $theme_dir . 'includes/demos/' . $demo_id . '/content.php';

			$content = call_user_func( 'publisher_demo_raw_content' );

		}

		return $content;
	} // publisher_init_demo_content
}

if ( ! function_exists( 'publisher_init_demo_setting' ) ) {
	/**
	 * Pulls selected demo data from its directory and send it to BS Product Pages demo installer
	 *
	 * @param array  $content
	 * @param string $demo_id
	 *
	 * @return array
	 */
	function publisher_init_demo_setting( $content = array(), $demo_id = '' ) {

		$demos_list = publisher_demos_config();

		$theme_dir = get_template_directory() . '/';

		// check if its valid, get value from its directory
		if ( ! empty( $demos_list[ $demo_id ] ) ) {

			include $theme_dir . 'includes/demos/' . $demo_id . '/options.php';

			$content = call_user_func( 'publisher_demo_raw_options' );

		}

		return $content;
	} // publisher_init_demo_setting
}


if ( ! function_exists( 'publisher_get_demo_images_url' ) ) {
	/**
	 * Used to get demo images url
	 *
	 * @param string $style_id
	 * @param string $demo_id
	 *
	 * @return array
	 */
	function publisher_get_demo_images_url( $style_id = '', $demo_id = '' ) {

		if ( bf_is( 'demo-dev' ) ) {

			$demo_image_url = home_url( 'demo-images/v1/' . $style_id . '/' );

		} else {

			$demo_image_url = publisher_get_demo_contents_url();
			$demo_image_url .= '/themes/publisher/v1/' . $style_id . '/';
		}

		return $demo_image_url;
	} // publisher_get_demo_images_url
}

if ( ! function_exists( 'publisher_get_demo_contents_url' ) ) {

	/**
	 * Choose accessible demo content server
	 *
	 * @since 5.0.0
	 * @return string
	 */
	function publisher_get_demo_contents_url() {

		static $url;

		if ( isset( $url ) ) {

			return $url;
		}

		$servers = array(
			'http://demo-contents.betterstudio.com',
			'http://demo-contents-cf.betterstudio.com',
		);

		do {

			$url = current( $servers );

			if ( BetterFramework_Oculus::is_host_accessible( $url ) ) {

				break;
			}

		} while( next( $servers ) !== false );

		return $url;
	} // publisher_get_demo_contents_url
}
