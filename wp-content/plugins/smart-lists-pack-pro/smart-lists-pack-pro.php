<?php
/*
Plugin Name: Smart Lists Pack Pro
Plugin URI: http://betterstudio.com
Description: The best way to show lists and paged posts!
Version: 1.4.1
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/

/***
 *   _____                      _     _     _     _        ______          _
 *  /  ___|                    | |   | |   (_)   | |       | ___ \        | |
 *  \ `--. _ __ ___   __ _ _ __| |_  | |    _ ___| |_ ___  | |_/ /_ _  ___| | __
 *   `--. \ '_ ` _ \ / _` | '__| __| | |   | / __| __/ __| |  __/ _` |/ __| |/ /
 *  /\__/ / | | | | | (_| | |  | |_  | |___| \__ \ |_\__ \ | | | (_| | (__|   <
 *  \____/|_| |_| |_|\__,_|_|   \__| \_____/_|___/\__|___/ \_|  \__,_|\___|_|\_\
 *
 *
 * \--> BetterStudio, 2017 <--/
 *
 * Thanks for using our plugin!
 *
 * Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 */


/**
 * BS_Smart_Lists_Pack_Pro class wrapper
 *
 * @return BS_Smart_Lists_Pack_Pro
 */
function BS_Smart_Lists_Pack_Pro() {

	return BS_Smart_Lists_Pack_Pro::self();
}

// Fire up Smart Lists Pack
BS_Smart_Lists_Pack_Pro();


/**
 * Smart Lists Pack Functionality
 */
class BS_Smart_Lists_Pack_Pro {

	/**
	 * Contains BP version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	public static $version = '1.4.1';


	/**
	 * Contains BR option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'bs_smart_lists_pack';


	/**
	 * Default supported post types
	 *
	 * @var array
	 */
	public static $post_types = array( 'post', 'page' );


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 * Initialize!
	 */
	function __construct() {

		// make sure following code only one time run
		static $initialized;
		if ( $initialized ) {
			return;
		} else {
			$initialized = TRUE;
		}

		// Includes functions
		include $this->dir_path( 'includes/functions.php' );
		include $this->dir_path( 'includes/content-parser.php' );

		// Ads
		include $this->dir_path( 'includes/ads/functions.php' );
		include $this->dir_path( 'includes/ads/locations.php' );

		// Register panel
		include $this->dir_path( 'includes/options/panel.php' );

		// Register metabox
		include $this->dir_path( 'includes/options/metabox.php' );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 50 );

		// Initialize after bf init
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		// Add custom items to editor shortcodes menu
		add_filter( 'better-framework/editor-shortcodes/shortcodes-array', array(
			$this,
			'register_shortcode_to_editor'
		), 15 );

		// Configs "BF Editor Shortcodes" library
		add_filter( 'better-framework/editor-shortcodes/config', array( $this, 'editor_shortcodes_config' ), 8 );

		// Active and new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 100 );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		// add more codes to BF custom generated CSS
		add_filter( 'better-framework/css/final', array( $this, 'bf_final_front_end_css' ) );

	}


	/**
	 * Appends dynamic css codes to the final generated CSS code of BF.
	 *
	 * @param $css
	 *
	 * @return mixed
	 */
	function bf_final_front_end_css( $css ) {

		/**
		 * This css codes will be printed dynamically at the header of site.
		 */
		{
			ob_start();
			include bf_append_suffix( self::dir_path( 'css/styles/ads' ), '.css' );
			$code = ob_get_clean();

			$bsac = 'bsac';

			if ( defined( 'BAM_PREFIX' ) ) {
				$bsac = BAM_PREFIX;
			}

			// Make it the BAM dynamic class friendly
			if ( $bsac != 'bsac' ) {
				$code = str_replace( 'bsac', $bsac, $code );
			}

			if ( ! empty( $css['css'] ) ) {
				$css['css'] .= $code;
			}
		}

		return $css;
	}


	/**
	 * Used for accessing plugin directory URL
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_url( $address = '' ) {

		static $url;

		if ( is_null( $url ) ) {
			$url = plugin_dir_url( __FILE__ );
		}

		return $url . $address;
	}


	/**
	 * Used for accessing plugin directory path
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_path( $address = '' ) {

		static $path;

		if ( is_null( $path ) ) {
			$path = plugin_dir_path( __FILE__ );
		}

		return $path . $address;
	}


	/**
	 * Returns current version
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;
	}


	/**
	 * Used for retrieving options simply and safely for next versions
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	public static function get_option( $option_key ) {

		return bf_get_option( $option_key, self::$panel_id );
	}


	/**
	 * Build the required object instance
	 *
	 * @param string $object
	 * @param bool   $fresh
	 * @param bool   $just_include
	 *
	 * @return BS_Smart_Lists_Pack_Pro|null
	 */
	public static function factory( $object = 'self', $fresh = FALSE, $just_include = FALSE ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main BS_Smart_Lists_Pack_Pro Class
			 */
			case 'self':
				$class = 'BS_Smart_Lists_Pack_Pro';
				break;

			default:
				return NULL;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return NULL;
		}

		// don't cache fresh objects
		if ( $fresh ) {
			return new $class;
		}

		self::$instances[ $object ] = new $class;

		return self::$instances[ $object ];
	}


	/**
	 * Used for accessing alive instance class
	 *
	 * @since 1.0
	 *
	 * @return BS_Smart_Lists_Pack_Pro
	 */
	public static function self() {

		return self::factory();
	}


	/**
	 * Adds included BetterFramework to loader
	 *
	 * @param $frameworks
	 *
	 * @return array
	 */
	function better_framework_loader( $frameworks ) {

		$frameworks[] = array(
			'version' => '3.10.6',
			'path'    => self::dir_path( 'includes/libs/better-framework/' ),
			'uri'     => self::dir_url( 'includes/libs/better-framework/' ),
		);

		return $frameworks;
	}


	/**
	 * Setups features of BetterFramework
	 *
	 * @param $features
	 *
	 * @return array
	 */
	function setup_bf_features( $features ) {

		$features['admin_panel']       = TRUE;
		$features['metabox']           = TRUE;
		$features['editor-shortcodes'] = TRUE;

		return $features;
	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		self::$post_types = apply_filters( 'bs-smart-lists-pack/post-types', self::$post_types );

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Enqueue Editor assets
		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_enqueue_scripts' ) );

		// Lazy the content binding trick
		add_action( 'wp_head', array( $this, 'lazy_the_content_attachment' ), 10000 );
	}


	/**
	 * Hooks a filter to the_content after making sure all SEO plugins did their job on wp_head
	 *
	 * @hooked wp_head
	 */
	public function lazy_the_content_attachment() {

		// Content of smart lists
		add_filter( 'the_content', array( $this, 'the_content' ), 11 );
	}


	/**
	 * Callback: Used for registering styles for the editor
	 *
	 * Action: enqueue_block_editor_assets
	 */
	function editor_enqueue_scripts() {
		
		bf_enqueue_style(
			'smart-lists-pack-pro-gutenberg',
			bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_url( 'css/gutenberg' ), '.css' ),
			array(),
			bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( 'css/gutenberg' ), '.css' ),
			BS_Smart_Lists_Pack_Pro::$version
		);
	}


	/**
	 * Callback: Used for registering scripts and styles
	 *
	 * Action: enqueue_scripts
	 */
	function enqueue_scripts() {

		//enqueue slick carousel
		bf_enqueue_script( 'bf-slick' );
		bf_enqueue_style( 'bf-slick' );

		bf_enqueue_style( 'bs-icons' ); // Enqueue "BetterStudio Icons" from framework

		bf_enqueue_style(
			'smart-lists-pack-pro',
			bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_url( 'css/smart-lists-pack' ), '.css' ),
			array( 'bf-slick' ),
			bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( 'css/smart-lists-pack' ), '.css' ),
			BS_Smart_Lists_Pack_Pro::$version
		);

		if ( is_rtl() ) {
			bf_enqueue_style(
				'smart-lists-pack-rtl',
				bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_url( 'css/smart-lists-pack-rtl' ), '.css' ),
				array(),
				bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( 'css/smart-lists-pack-rtl' ), '.css' ),
				BS_Smart_Lists_Pack_Pro::$version
			);
		}

		bf_enqueue_script(
			'smart-lists-pack-pro',
			bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_url( 'js/smart-lists-pack' ), '.js' ),
			array( 'bf-slick' ),
			bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( 'js/smart-lists-pack' ), '.js' ),
			BS_Smart_Lists_Pack_Pro::$version
		);

		bf_localize_script(
			'smart-lists-pack-pro',
			'bs_smart_lists_loc',
			array(
				'translations' => array(
					'nav_next'          => BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_next' ),
					'nav_prev'          => BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_prev' ),
					'trans_x_of_y'      => BS_Smart_Lists_Pack_Pro::get_option( 'trans_x_of_y' ),
					'trans_page_x_of_y' => BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_x_of_y' ),
				),
			)
		);

	}


	/**
	 * Callback: Enable Oculus error logging system for plugin
	 * Filter  : better-framework/oculus/logger/filter
	 *
	 * @access private
	 *
	 * @param boolean $bool previous value
	 * @param string  $product_dir
	 * @param string  $type_dir
	 *
	 * @return bool true if error belongs to plugin, previous value otherwise.
	 */
	function oculus_logger( $bool, $product_dir, $type_dir ) {

		if ( $type_dir === 'plugins' && $product_dir === 'smart-lists-pack-pro' ) {
			return FALSE;
		}

		return $bool;
	}


	/**
	 * Prepare the final smart list content
	 *
	 * @param int    $post_id
	 * @param string $content
	 *
	 * @return mixed
	 */
	function get_parsed_content( $post_id = 0, $content = '' ) {

		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}


		// If not active
		if ( ! bf_get_post_meta( '_bs_smart_lists_enabled', $post_id, FALSE ) ) {
			return array(
				'enable' => FALSE,
			);
		}


		// Parse content
		{
			$config = array( 'title_tag' => bf_get_post_meta( '_bs_smart_lists_title_tag', $post_id, 'h3' ), );
			$parser = new BS_SLP_Content_Parser( $config );
			$output = $parser->parse_html( $content );
		}


		// If list is empty -> no valid items
		if ( empty( $output['items'] ) ) {
			return array(
				'enable' => FALSE,
			);
		} else {
			$output['enable']      = TRUE;
			$output['items-count'] = count( $output['items'] );
		}


		// Items order
		{
			$output['order'] = bf_get_post_meta( '_bs_smart_lists_sort', $post_id, 'asc' );

			if ( $output['order'] === 'desc' ) {
				$output['items'] = array_reverse( $output['items'] );
			}
		}


		// Style
		{
			$_check = array(
				''        => '',
				'default' => '',
			);

			$output['style'] = bf_get_post_meta( '_bs_smart_lists_style', $post_id );

			if ( isset( $_check[ $output['style'] ] ) ) {
				$output['style'] = BS_Smart_Lists_Pack_Pro::get_option( 'list-style' );
			}

			if ( isset( $_check[ $output['style'] ] ) ) {
				$output['style'] = 'style-1';
			}
		}

		return $output;
	}


	/**
	 * Parses and replaces the content for smart list
	 *
	 * @param $content
	 *
	 * @hooked the_content
	 *
	 * @return mixed
	 */
	function the_content( $content ) {

		// Don't convert to custom gallery in FIA
		if ( bf_is_fia() ) {
			return $content;
		}

		$post_id = get_the_ID(); // performance tip

		// Only for content of current single page
		if ( ! is_single( $post_id ) ) {
			return $content;
		}

		// Post type does not supported.
		if ( ! in_array( get_post_type( $post_id ), self::$post_types ) ) {
			return $content;
		}

		$smart_list = $this->get_parsed_content( $post_id, $content );

		// smart list is not active
		if ( ! $smart_list['enable'] ) {
			return $content;
		}

		ob_start();

		include BS_Smart_Lists_Pack_Pro::dir_path( "template/{$smart_list['style']}.php" );

		// BetterAMP plugins
		if ( bf_is_amp() === 'better' ) {

			// Get style -> Do not prints duplicate styles
			{
				ob_start();
				echo $this->get_amp_inline_style( $smart_list['style'] );
				$code = ob_get_clean();
			}

			if ( ! empty( $code ) ) {
				better_amp_add_inline_style( better_amp_css_sanitizer( $code ), 'smart-lists-pack' );
			}
		}

		$new_content = ob_get_clean();

		if ( isset( $smart_list['before'] ) ) {
			$new_content = $smart_list['before'] . $new_content;
		}

		if ( isset( $smart_list['after'] ) ) {
			$new_content .= $smart_list['after'];
		}

		return $new_content;
	}


	/**
	 * Handy function used to get inline and exact css codes of each style
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function get_amp_inline_style( $style = 'style-1' ) {

		static $cache;

		if ( isset( $cache[ $style ] ) ) {
			return '';
		}

		ob_start();

		include bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( "css/styles/general" ), '.css' );
		include bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( "css/styles/type-1-$style" ), '.css' );

		if ( is_rtl() ) {
			include bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( "css/styles/general-rtl" ), '.css' );
			include bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( "css/styles/type-1-$style-rtl" ), '.css' );
		}

		//
		// AMP Exclusive styles.
		//
		include bf_append_suffix( BS_Smart_Lists_Pack_Pro::dir_path( "css/styles/amp" ), '.css' );

		return ob_get_clean();
	}


	/**
	 * Filter Callback: Registers shortcode to BetterStudio Editor Shortcodes Plugin
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	public static function register_shortcode_to_editor( $shortcodes ) {

		$shortcodes['smart-list'] = array(
			'type'  => 'menu',
			'label' => __( 'Smart List', 'better-studio' ),
			'items' => array(
				'bs_smart_list_pack_start' => array(
					'type'    => 'button',
					'label'   => __( 'List Start', 'better-studio' ),
					'content' => '[bs_smart_list_pack_start][/bs_smart_list_pack_start]'
				),
				'bs_smart_list_pack_end'   => array(
					'type'    => 'button',
					'label'   => __( 'List End', 'better-studio' ),
					'content' => '[bs_smart_list_pack_end][/bs_smart_list_pack_end]'
				),
			)
		);

		return $shortcodes;
	}


	/**
	 * Setups Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	function setup_shortcodes( $shortcodes ) {

		include BS_Smart_Lists_Pack_Pro::dir_path( 'includes/shortcodes/bs-smart-list-shortcodes.php' );

		$shortcodes['bs_smart_list_pack_start'] = array(
			'shortcode_class' => 'BS_Smart_List_Start_Shortcode',
		);
		$shortcodes['bs_smart_list_pack_end']   = array(
			'shortcode_class' => 'BS_Smart_List_End_Shortcode',
		);

		return $shortcodes;
	}


	/**
	 * Configs BF Editor Shortcodes library
	 *
	 * @param $config
	 *
	 * @return array
	 */
	public function editor_shortcodes_config( $config ) {

		// dynamic styles
		$config['editor-dynamic-style'][] = BS_Smart_Lists_Pack_Pro::dir_path( 'includes/dynamics/editor_css.php' );

		// Show sidebars
		$config['layouts'] = FALSE;

		return $config;
	}
}
