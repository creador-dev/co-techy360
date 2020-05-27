<?php
/*
Plugin Name: Better Ads Manager
Plugin URI: http://betterstudio.com
Description: Manage your ads in better way!
Version: 1.19.2
Author: BetterStudio
Author URI: http://betterstudio.com
License:
*/


/**
 * Better_Ads_Manager class wrapper for make changes safe in future
 *
 * @return Better_Ads_Manager
 */
function Better_Ads_Manager() {

	return Better_Ads_Manager::self();
}


// Initialize Better Ads Manager 
Better_Ads_Manager();


/**
 * Class Better_Ads_Manager
 */
class Better_Ads_Manager {


	/**
	 * Contains plugin version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	private static $version = '1.19.2';


	/**
	 * Contains plugin option panel ID
	 *
	 * @var string
	 */
	public static $panel_id = 'better_ads_manager';


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 * Flag to detect Adsense js file was printed or not
	 *
	 * @var bool
	 */
	private $is_google_adsence_printed = false;


	/**
	 * Flag to detect Adsense js file was printed or not
	 *
	 * @var bool
	 */
	private $wp_head_finished = false;


	/**
	 * Flag to detect Adsense lazy loading js file was printed or not
	 *
	 * @var bool
	 */
	private $is_google_adsence_lazy_printed = false;


	/**
	 * Used to cache the ad data while saving post
	 *
	 * @var string
	 */
	private $meta_cache_id = 'ad-data-cache';


	/**
	 * Plugin initialize
	 */
	function __construct() {

		// Defines constant to enable BetterAMP for adding ads
		if ( ! defined( 'BETTER_ADS_MANAGER_AMP' ) ) {
			define( 'BETTER_ADS_MANAGER_AMP', true );
		}

		// Defines constant to prevent ad blockers to detect the Better Ads Manager classes!
		// Other plugins and themes can use this for generating custom css codes
		if ( ! defined( 'BAM_PREFIX' ) ) {
			define( 'BAM_PREFIX', $this->get_unique_id() );
		}

		// Register included BF
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 100 );


		// Includes general functions
		include $this->dir_path( 'functions.php' );

		// Add option panel
		include $this->dir_path( 'includes/options/panel.php' );

		// Add metabox
		include $this->dir_path( 'includes/options/metabox.php' );

		// Add taxonomy metabox
		include $this->dir_path( 'includes/options/taxonomy.php' );

		// Add FIA support
		include $this->dir_path( 'includes/fia/bam-fia.php' );

		// Activate and add new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 100 );

		// Initialize after bf init
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		// Do some stuff after WP init
		add_action( 'init', array( $this, 'init' ) );

		// Includes BF loader if not included before
		require_once $this->dir_path( '/includes/libs/better-framework/init.php' );

		// Ads plugin textdomain
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		// Ajax callback for rebuilding image from front end
		add_action( 'wp_ajax_nopriv_better_ads_manager_blocked_fallback', array( $this, 'callback_blocked_ads' ) );
		add_action( 'wp_ajax_better_ads_manager_blocked_fallback', array( $this, 'callback_blocked_ads' ) );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		// Add custom items to editor shortcodes menu
		add_filter( 'better-framework/editor-shortcodes/shortcodes-array', array(
			$this,
			'register_shortcode_to_editor'
		), 15 );

		// Configs "BF Editor Shortcodes" library
		add_filter( 'better-framework/editor-shortcodes/config', array( $this, 'editor_shortcodes_config' ) );

		// Reset unique ID when the BAM panel saved.
		add_filter( 'better-framework/panel/save/result', array( $this, 'callback_panel_save_result' ), 10, 2 );

		// Change the .bsac in the BetterAMP Style files
		add_filter( 'better-amp/style-files/css/ads.css', array( $this, 'make_prefix_undetectable' ), 10 );
		add_filter( 'better-amp/style-files/css/ads.min.css', array( $this, 'make_prefix_undetectable' ), 10 );
		add_filter( 'better-amp/style-files/css/ads.rtl.css', array( $this, 'make_prefix_undetectable' ), 10 );
		add_filter( 'better-amp/style-files/css/ads.rtl.min.css', array( $this, 'make_prefix_undetectable' ), 10 );

		// Change the widget output for ads
		add_filter( 'dynamic_sidebar_params', array( $this, 'dynamic_sidebar_params' ) );

		// Clear BF CSS cache to make sure BAM auto css will be added
		register_activation_hook( __FILE__, array( 'Better_Ads_Manager', 'plugin_activation_hook' ) );

		// used to collect and finalize ads data for performance improvement.
		add_action( 'save_post', array( $this, 'save_ads_post' ), 10, 3 );

		// Detect the WP_Head was finished or not
		add_action( 'wp_head', array( $this, 'wp_head' ), 1000 );
		add_action( 'better-amp/template/head', array( $this, 'wp_head' ), 1000 );

	}


	/**
	 * Load plugin textdomain.
	 *
	 * @since 1.0.0
	 */
	function load_textdomain() {

		// Register text domain
		load_plugin_textdomain( 'better-studio', false, 'better-ads-manager/languages' );

	}


	/**
	 * Used for accessing plugin directory URL
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_url( $address = '' ) {

		return plugin_dir_url( __FILE__ ) . $address;

	}


	/**
	 * Used for accessing plugin directory Path
	 *
	 * @param string $address
	 *
	 * @return string
	 */
	public static function dir_path( $address = '' ) {

		return plugin_dir_path( __FILE__ ) . $address;

	}


	/**
	 * Returns plugin current Version
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;

	}


	/**
	 * Build the required object instance
	 *
	 * @param   string $object
	 * @param   bool   $fresh
	 * @param   bool   $just_include
	 *
	 * @return  Better_Ads_Manager|null
	 */
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Better_Ads_Manager Class
			 */
			case 'self':
				$class = 'Better_Ads_Manager';
				break;

			default:
				return null;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return;
		}

		// don't cache fresh objects
		if ( $fresh ) {
			return new $class;
		}

		self::$instances[ $object ] = new $class;

		return self::$instances[ $object ];
	}


	/**
	 * Used for accessing alive instance of plugin
	 *
	 * @since 1.0
	 *
	 * @return Better_Ads_Manager
	 */
	public static function self() {

		return self::factory();

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
	 * Callback: Adds included BetterFramework to BF loader
	 *
	 * Filter: better-framework/loader
	 *
	 * @param $frameworks
	 *
	 * @return array
	 */
	function better_framework_loader( $frameworks ) {

		$frameworks[] = array(
			'version' => '3.10.16',
			'path'    => $this->dir_path( 'includes/libs/better-framework/' ),
			'uri'     => $this->dir_url( 'includes/libs/better-framework/' ),
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

		$features['admin_panel']       = true;
		$features['meta_box']          = true;
		$features['taxonomy_meta_box'] = true;
		$features['minify']            = true;
		$features['content-injector']  = true;
		$features['editor-shortcodes'] = true;
		$features['booster']           = true;


		return $features;
	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		// Enqueue assets
		add_action( 'wp_footer', array( $this, 'enqueue_scripts' ), 99 );

		// Enqueue admin assets
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		// Post ads
		add_action( 'the_content', array( $this, 'setup_post_content_ads' ), 5 );

		// Adds custom columns for banners
		if ( is_admin() && ! bf_is_doing_ajax() ) {
			add_filter( 'manage_edit-better-banner_columns', array( $this, 'banner_columns' ) );
			add_action( 'manage_better-banner_posts_custom_column', array( $this, 'banner_columns_content' ), 10, 2 );
			add_action( 'admin_head', array( $this, 'admin_styles' ) );
		}

		// print header codes (FTP...)
		add_action( 'wp_head', array( $this, 'print_wp_head' ) );

		// print css codes for Gutenberg
		add_action( 'admin_head', array( $this, 'print_admin_head' ) );

		// Handles save for override fields
		add_filter( 'better-framework/panel/save', 'Better_Ads_Manager::handle_ads_manager_override_save', 1 );

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
			include bf_append_suffix( self::dir_path( 'css/bam' ), '.css' );
			$code = ob_get_clean();

			$code = $this->make_prefix_undetectable( $code );

			if ( ! empty( $css['css'] ) ) {
				$css['css'] .= $code;
			}
		}

		return $css;
	}


	/**
	 * Callback: Used for registering scripts and styles
	 *
	 * Action: enqueue_scripts
	 */
	function enqueue_scripts() {

		// Dynamic JS codes.
		// We are making it undetectable so the AdBlockers can not find a pattern to detect it.
		{
			ob_start();
			include bf_append_suffix( self::dir_path( 'js/bam' ), '.js' );
			$code = ob_get_clean();

			$code = $this->make_prefix_undetectable( $code );

			bf_add_js( $code, true, true );
		}
	}


	/**
	 * Adds advertising.js to page
	 */
	function enqueue_adblocker_detector() {

		static $printed;

		if ( ! is_null( $printed ) ) {
			return;
		}

		wp_enqueue_script(
			'better-advertising',
			bf_append_suffix( self::dir_url() . 'js/advertising', '.js' ),
			array(),
			Better_Ads_Manager::$version,
			false
		);

		$printed = true;
	}


	/**
	 * Callback: Used for adding JS and CSS files to page
	 *
	 * Action: admin_enqueue_scripts
	 */
	function admin_enqueue_scripts() {

		$dir_url  = self::dir_url();
		$dir_path = self::dir_path();

		bf_enqueue_style(
			'better-adsmanager',
			bf_append_suffix( $dir_url . 'css/better-ads-manager-admin', '.css' ),
			array(),
			bf_append_suffix( $dir_path . 'css/better-ads-manager-admin', '.css' ),
			Better_Ads_Manager::$version
		);

		bf_enqueue_script(
			'better-adsmanager',
			bf_append_suffix( $dir_url . 'js/bam-admin', '.js' ),
			array(),
			bf_append_suffix( $dir_path . 'js/bam-admin', '.js' ),
			Better_Ads_Manager::$version
		);

		bf_localize_script(
			'better-adsmanager',
			'better_adsmanager_loc',
			array(
				'ajax_url'    => admin_url( 'admin-ajax.php' ),
				'arrow'       => is_rtl() ? '←' : '→',
				'translation' => array(
					'inactive'           => __( 'Inactive Ad', 'better-studio' ),
					'banner'             => __( 'Banner', 'better-studio' ),
					'in_active_banner'   => __( 'Banner', 'better-studio' ),
					'campaign'           => __( 'Campaign', 'better-studio' ),
					'in_active_campaign' => __( 'Inactive Campaign', 'better-studio' ),
					'after_x_paragraph'  => array(
						__( 'After 1st p', 'better-studio' ),
						__( 'After 2nd p', 'better-studio' ),
						__( 'After 3rd p', 'better-studio' ),
						__( 'After %sth p', 'better-studio' ),
					),
				),
			)
		);
	}


	/**
	 * Get Campaigns
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	public static function get_campaigns( $extra = array() ) {

		/*
			Extra Usage:

			array(
				'posts_per_page'  => 5,
				'offset'          => 0,
				'category'        => '',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'include'         => '',
				'exclude'         => '',
				'meta_key'        => '',
				'meta_value'      => '',
				'post_type'       => 'post',
				'post_mime_type'  => '',
				'post_parent'     => '',
				'post_status'     => 'publish',
				'suppress_filters' => true
			)
		*/


		$extra = wp_parse_args( $extra, array(
			'post_type'      => array( 'better-campaign' ),
			'posts_per_page' => 400,
		) );

		$output = array();

		$query = get_posts( $extra );

		foreach ( $query as $post ) {
			$output[ $post->ID ] = $post->post_title;
		}

		return $output;

	}


	/**
	 * Get Banners
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	public static function get_banners( $extra = array() ) {

		/*
			Extra Usage:

			array(
				'posts_per_page'  => 5,
				'offset'          => 0,
				'category'        => '',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'include'         => '',
				'exclude'         => '',
				'meta_key'        => '',
				'meta_value'      => '',
				'post_type'       => 'post',
				'post_mime_type'  => '',
				'post_parent'     => '',
				'post_status'     => 'publish',
				'suppress_filters' => true
			)
		*/

		$label_type = '';

		if ( isset( $extra['label_type'] ) ) {
			$label_type = $extra['label_type'];
			unset( $extra['label_type'] );
		}


		$extra = bf_merge_args( $extra, array(
			'post_type'      => array( 'better-banner' ),
			'posts_per_page' => - 1,
		) );

		$output = array();

		$query = get_posts( $extra );

		foreach ( $query as $post ) {

			$desc = array();

			if ( ! empty( $label_type ) ) {

				if ( $label_type === 'both' || $label_type === 'format' ) {
					$format = get_post_meta( $post->ID, 'format', true );
					if ( $format === 'normal' || empty( $format ) ) {
						$desc[] = 'Normal';
					} elseif ( $format === 'amp' ) {
						$desc[] = 'AMP';
					}
				}

				if ( $label_type === 'both' || $label_type === 'type' ) {
					$type = get_post_meta( $post->ID, 'type', true );
					if ( $type === 'code' ) {
						$desc[] = 'Adsense';
					} elseif ( $type === 'image' ) {
						$desc[] = 'Image';
					} elseif ( $type === 'custom_code' ) {
						$desc[] = 'HTML';
					} elseif ( $type === 'dfp' ) {
						$desc[] = 'DFP';
					}
				}

			}


			$output[ $post->ID ] = $post->post_title . ( ! empty( $desc ) ? ' [' . implode( ' - ', $desc ) . ']' : '' );
		}

		return $output;

	}


	/**
	 * Callback: Used to register post types
	 *
	 * Action: init
	 */
	function init() {

		//
		// Campaigns post type
		//
		$labels = array(
			'name'               => _x( 'Campaigns', 'post type general name', 'better-studio' ),
			'singular_name'      => _x( 'Campaign', 'post type singular name', 'better-studio' ),
			'menu_name'          => _x( 'Campaigns', 'admin menu', 'better-studio' ),
			'name_admin_bar'     => _x( 'Campaigns', 'add new on admin bar', 'better-studio' ),
			'add_new'            => _x( 'Add New Campaign', 'campaign', 'better-studio' ),
			'add_new_item'       => __( 'Add New Campaign', 'better-studio' ),
			'new_item'           => __( 'New Campaign', 'better-studio' ),
			'edit_item'          => __( 'Edit Campaign', 'better-studio' ),
			'view_item'          => __( 'View Campaign', 'better-studio' ),
			'all_items'          => __( 'Campaigns', 'better-studio' ),
			'search_items'       => __( 'Search Campaigns', 'better-studio' ),
			'not_found'          => __( 'No campaigns found.', 'better-studio' ),
			'not_found_in_trash' => __( 'No campaigns found in Trash.', 'better-studio' )
		);

		$args = array(
			'public'              => false,
			'labels'              => $labels,
			'show_in_menu'        => 'better-studio/better-ads-manager',
			'show_ui'             => current_user_can( 'manage_options' ),
			'supports'            => array( 'title' ),
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
		);
		register_post_type( 'better-campaign', $args );

		//
		// Banners post type
		//
		$labels = array(
			'name'               => _x( 'Banners', 'post type general name', 'better-studio' ),
			'singular_name'      => _x( 'Banner', 'post type singular name', 'better-studio' ),
			'menu_name'          => _x( 'Banners', 'admin menu', 'better-studio' ),
			'name_admin_bar'     => _x( 'Banners', 'add new on admin bar', 'better-studio' ),
			'add_new'            => _x( 'Add New Banner', 'campaign', 'better-studio' ),
			'add_new_item'       => __( 'Add New Banner', 'better-studio' ),
			'new_item'           => __( 'New Banner', 'better-studio' ),
			'edit_item'          => __( 'Edit Banner', 'better-studio' ),
			'view_item'          => __( 'View Banner', 'better-studio' ),
			'all_items'          => __( 'Banners', 'better-studio' ),
			'search_items'       => __( 'Search Banner', 'better-studio' ),
			'not_found'          => __( 'No banners found.', 'better-studio' ),
			'not_found_in_trash' => __( 'No banners found in Trash.', 'better-studio' )
		);
		$args   = array(
			'public'              => false,
			'labels'              => $labels,
			'show_in_menu'        => 'better-studio/better-ads-manager',
			'show_ui'             => current_user_can( 'manage_options' ),
			'supports'            => array( 'title' ),
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
		);
		register_post_type( 'better-banner', $args );

	}


	/**
	 * Setups Shortcodes
	 *
	 * 6. => Setup Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	function setup_shortcodes( $shortcodes ) {

		require_once $this->dir_path( 'includes/shortcodes/class-better-ads-shortcode.php' );
		require_once $this->dir_path( 'includes/widgets/class-better-ads-widget.php' );

		$shortcodes['better-ads'] = array(
			'shortcode_class' => 'Better_Ads_Shortcode',
			'widget_class'    => 'Better_Ads_Widget',
		);

		return $shortcodes;
	}


	/**
	 * Used for showing add
	 *
	 * @param $ad_data
	 *
	 * @return string
	 */
	function show_ads( $ad_data ) {

		if ( ! $this->wp_head_finished && ! bf_is_doing_ajax() && empty( $_GET['ajax_related_post'] ) ) {
			return '';
		}

		$output = '';

		if ( ! empty( $ad_data['title'] ) && bf_get_current_sidebar() === '' ) {
			$title = apply_filters( 'better-framework/shortcodes/title', $ad_data );

			if ( is_string( $title ) ) {
				$output .= $title;
			}
		}

		// ads css class, it comes from VC design option
		if ( ( $css_class = bf_shortcode_custom_css_class( $ad_data ) ) != '' ) {
			if ( ! empty( $ad_data['container-class'] ) ) {
				$ad_data['container-class'] .= ' ' . $css_class;
			} else {
				$ad_data['container-class'] = $css_class;
			}
		}

		if ( ! isset( $ad_data['type'] ) ) {

			if ( is_user_logged_in() ) {
				return $this->make_prefix_undetectable( $this->show_ads_container( $ad_data, '<div class="bsac-empty-note">' . __( 'Please select type of ad.', 'better-studio' ) . '</div>' ) );
			} else {
				return $this->make_prefix_undetectable( $this->show_ads_container( $ad_data, '' ) );
			}
		}

		// args of ads banners
		$args = array(
			'show-caption' => isset( $ad_data['show-caption'] ) ? $ad_data['show-caption'] : true,
			'lazy-load'    => ! empty( $ad_data['lazy-load'] ) ? $ad_data['lazy-load'] : Better_Ads_Manager::get_option( 'lazy_loading_ads' ),
		);

		if ( bf_is_doing_ajax() ) {
			$ad_item['lazy-load'] = 'disable';
		}

		//
		// Custom args for ads from outside
		if ( isset( $ad_data['banner-custom-config'] ) ) {
			$args = array_merge( $args, $ad_data['banner-custom-config'] );
		}


		switch ( $ad_data['type'] ) {


			case 'campaign':

				if ( ! isset( $ad_data['campaign'] ) || $ad_data['campaign'] == 'none' ) {
					return $this->make_prefix_undetectable( $this->show_ads_empty_note( $ad_data ) );
				}

				if ( empty( $ad_data['count'] ) || intval( $ad_data['count'] ) <= 0 ) {
					$ad_data['count'] = 1;
				}

				$c_query = new WP_Query( array(
					'post_type'      => 'better-banner',
					'order'          => $ad_data['order'],
					'orderby'        => $ad_data['orderby'],
					'posts_per_page' => $ad_data['count'],
					'meta_query'     => array(
						array(
							'key'     => 'campaign',
							'value'   => $ad_data['campaign'],
							'compare' => 'LIKE',
						),
					),
				) );

				if ( $c_query->have_posts() ) {

					if ( isset( $ad_data['count'] ) && intval( $ad_data['count'] ) > 0 ) {

						// count of adds
						$count = $ad_data['count'];
						if ( $count > bf_count( $c_query->posts ) ) {
							$count = bf_count( $c_query->posts );
						}

						$counter = 1;
						foreach ( $c_query->posts as $post ) {

							if ( $counter > $count ) {
								break;
							}

							$output .= $this->show_ad_banner( $post->ID, $args );

							$counter ++;
						}

					} else {
						foreach ( $c_query->posts as $post ) {
							$output .= $this->show_ad_banner( $post->ID, $args );
						}
					}

					return $this->make_prefix_undetectable( $this->show_ads_container( $ad_data, $output ) );

				} else {
					return $this->make_prefix_undetectable( $this->show_ads_empty_note( $ad_data ) );
				}

				break; // /campaign

			case 'banner':

				$ad_data['columns'] = 1;

				if ( ! isset( $ad_data['banner'] ) || $ad_data['banner'] === 'none' ) {
					return $this->show_ads_empty_note( $ad_data );
				}

				$ad_code = $this->show_ad_banner( $ad_data['banner'], $args );

				//
				// Hack: The layout=responsive (data-full-width-responsive="true") needs a class in  AMP to make it
				//        Full width (out of wrapper) by CSS
				//
				if ( stripos( $ad_code, 'layout=responsive' ) ) {
					if ( empty( $ad_data['container-class'] ) ) {
						$ad_data['container-class'] = 'bsac-full-width';
					} else {
						$ad_data['container-class'] .= ' bsac-full-width';
					}
				}


				return $this->make_prefix_undetectable( $this->show_ads_container( $ad_data, $ad_code ) );

				break; // /banner

			default:
				return $this->make_prefix_undetectable( $this->show_ads_empty_note( $ad_data ) );
				break;
		}

	}


	/**
	 * Handy function used to show empty message
	 *
	 * @param        $ad_data
	 * @param string $message
	 * @param string $link
	 *
	 * @return string
	 */
	private function show_ads_empty_note( $ad_data, $message = '', $link = '' ) {

		if ( ! is_user_logged_in() ) {
			return $this->show_ads_container( $ad_data, '' );
		}

		if ( empty( $message ) ) {

			switch ( $ad_data['type'] ) {

				case 'banner':

					$message = __( 'Please select an ad banner.', 'better-studio' );

					if ( empty( $link ) ) {
						if ( bf_get_current_sidebar() ) {
							$link = admin_url( 'widgets.php' );
						} elseif ( is_page() ) {
							if ( current_user_can( 'edit_posts' ) ) {
								$link = get_edit_post_link( get_the_ID() );
							}
						} else {
							$link = admin_url( 'admin.php?page=better-studio/better-ads-manager' );
						}
					}

					break;

				case 'campaign':

					if ( $ad_data['campaign'] !== 'none' ) {

						if ( empty( $link ) ) {
							$link = admin_url( 'edit.php?post_type=better-banner' );
						}

						$message = sprintf(
							__( 'Selected campaign have not any active ad, Select an ad for "%s" campaign.', 'better-studio' ),
							get_the_title( $ad_data['campaign'] )
						);

					} else {

						if ( empty( $link ) ) {
							if ( bf_get_current_sidebar() ) {
								$link = admin_url( 'widgets.php' );
							} elseif ( is_page() ) {
								if ( current_user_can( 'edit_posts' ) ) {
									$link = get_edit_post_link( get_the_ID() );
								}
							} else {
								$link = admin_url( 'admin.php?page=better-studio/better-ads-manager' );
							}
						}

						$message = __( 'Selected a campaign fo this ad banner.', 'better-studio' );
					}

					break;

				default:

					if ( empty( $link ) ) {
						if ( bf_get_current_sidebar() ) {
							$link = admin_url( 'widgets.php' );
						} elseif ( is_page() ) {
							if ( current_user_can( 'edit_posts' ) ) {
								$link = get_edit_post_link( get_the_ID() );
							}
						} else {
							$link = admin_url( 'admin.php?page=better-studio/better-ads-manager' );
						}
					}

					$message = __( 'Please select an ad banner or campaign.', 'better-studio' );

					break;

			}

		}

		if ( $this->get_current_format() === 'amp' ) {
			better_amp_enqueue_ad( 'image' );
		}

		if ( empty( $link ) ) {
			return $this->show_ads_container( $ad_data, '<div class="bsac-empty-note">' . $message . '</div>' );
		} else {
			return $this->show_ads_container( $ad_data, '<div class="bsac-empty-note"><a href="' . $link . '">' . $message . '</a></div>' );
		}
	}


	/**
	 * Handy function used to generate ads container
	 *
	 * @param $ad_data
	 * @param $html
	 *
	 * @return string
	 */
	private function show_ads_container( $ad_data, $html ) {

		if ( ! isset( $ad_data['container-class'] ) ) {
			$ad_data['container-class'] = '';
		}

		if ( empty( $ad_data['align'] ) ) {
			$ad_data['align'] = 'center';
		}

		if ( empty( $ad_data['columns'] ) ) {
			$ad_data['columns'] = 1;
		}

		$ad_data['container-class'] .= ' bsac-align-' . $ad_data['align'];
		$ad_data['container-class'] .= ' bsac-column-' . $ad_data['columns'];

		if ( isset( $ad_data['float'] ) && $ad_data['float'] != 'none' ) {
			$ad_data['container-class'] .= ' bsac-float-' . $ad_data['float'];
		}

		//
		// Hide ads in device classes
		// Should not work for campaigns
		//
		if ( $ad_data['type'] !== 'campaign' ) {
			$_check = array();

			$_device_hidden_classes = array(
				'bsac-hide-on-phone',
				'bsac-hide-on-tablet-portrait',
				'bsac-hide-on-tablet-landscape',
				'bsac-hide-on-desktop',
			);

			foreach ( $_device_hidden_classes as $class ) {
				if ( ! isset( $_check[ $class ] ) && stripos( $html, $class ) ) {
					$ad_data['container-class'] .= " $class";
					$_check[ $class ]           = '';
				}
			}
		}

		$output = '<div class="bsac bsac-clearfix ' . $ad_data['container-class'] . '">' . $html . '</div>';

		return $output;
	}


	/**
	 * Handy function to remove "\n" because some plugins are making problem for this and TinyMCE
	 *
	 * @param string $text
	 *
	 * @return mixed
	 */
	private function _fix_new_lines( $text = '' ) {

		return str_replace( array( "\n", "\t" ), ' ', $text );
	}


	/**
	 * Returns ads current format
	 *
	 * @return string
	 */
	public function get_current_format() {

		static $format;

		if ( $format ) {
			return $format;
		}

		if ( function_exists( 'is_better_amp' ) && is_better_amp() ) {
			$format = 'amp';
		} else {
			$format = 'normal';
		}

		return $format;
	}


	/**
	 * Handy function to return ad file template by ad type
	 *
	 * todo add functionality to override template files in themes
	 *
	 * @param string $ad_type
	 *
	 * @return string
	 */
	public function get_template_file( $ad_type = 'image' ) {

		return Better_Ads_Manager::dir_path( 'templates/' . $this->get_current_format() . '-' . $ad_type . '.php' );
	}


	/**
	 * Handy function used for showing ad banner from post id
	 *
	 * @param $banner_id
	 *
	 * @return string
	 */
	private function show_ad_banner( $banner_id, $args = array() ) {

		// used inside ad template files
		$args = bf_merge_args( $args, array(
			'show-caption' => true
		) );

		$banner_data = array_merge( $this->get_banner_data( $banner_id ), $args );

		$output = '';

		switch ( $banner_data['type'] ) {

			case 'dfp':

				if ( ! self::get_option( 'dfp_code' ) ) {

					$message = __( 'Please enter DFP before &lt;/head&gt; code in Better Ads Manager panel.', 'better-studio' );
					$link    = admin_url( 'admin.php?page=better-studio/better-ads-manager' );

					return $this->show_ads_empty_note( $banner_data, $message, $link );
				}

				if ( empty( $banner_data['dfp_spot'] ) ) {

					$message = __( 'Please select a spot id for this banner or enter custom ad code.', 'better-studio' );
					$link    = '';

					if ( current_user_can( 'edit_posts' ) ) {
						$link = get_edit_post_link( $banner_data['id'] );
					}

					return $this->show_ads_empty_note( $banner_data, $message, $link );

				} elseif ( $banner_data['dfp_spot'] === 'custom' ) {

					if ( empty( $banner_data['custom_dfp_code'] ) ) {
						$message = __( 'Custom DFP was selected but the code was not entered.', 'better-studio' );
						$link    = '';

						if ( current_user_can( 'edit_posts' ) ) {
							$link = get_edit_post_link( $banner_data['id'] );
						}

						return $this->show_ads_empty_note( $banner_data, $message, $link );
					}

				} else {


					//
					// Code examples:
					// Single dimention:
					// googletag.defineSlot('/21719673487/AbruzzoLive/F1', [300, 100], 'div-gpt-ad-1535184030575-0').addService(googletag.pubads());
					//
					//
					// Multiple dimention:
					// googletag.defineSlot('/21719673487/AbruzzoLive/3-Alive-Mobile', [[300, 250], [320, 100]], 'div-gpt-ad-1535361184691-0').addService(googletag.pubads());
					//

					$spot = explode( '--', str_replace( '\'', '', $banner_data['dfp_spot'] ) );

					if ( bf_count( $spot ) < 4 ) {
						$message = __( 'The auto selected spot id is not valid. Please enter custom code.', 'better-studio' );
						$link    = '';

						if ( current_user_can( 'edit_posts' ) ) {
							$link = get_edit_post_link( $banner_data['id'] );
						}

						return $this->show_ads_empty_note( $banner_data, $message, $link );
					}

					$banner_data['dfp_spot_id'] = trim( $spot[0] );

					// If the d spot have multiple size dimensions Google recommends this:
					//    "If using multi-size tags, we recommend either omitting this
					//    (in that case, the size of the element takes the size of the selected creative when rendered) or
					//    making both dimensions large enough to contain the largest eligible creative."
					//    https://support.google.com/admanager/answer/1638622?hl=en
					// The single dimension code only have 4 element in array, more elements means multiple dimensions
					if ( bf_count( $spot ) > 4 ) {
						$banner_data['dfp_spot_width']  = '';
						$banner_data['dfp_spot_height'] = '';
					} else {
						$banner_data['dfp_spot_width']  = str_replace( array( '[', ' ' ), '', $spot[1] );
						$banner_data['dfp_spot_height'] = str_replace( array( ']', ' ' ), '', $spot[2] );
					}

					// The last item is always the ad ID
					$banner_data['dfp_spot_tag'] = trim( end( $spot ) );
				}

				$ad_code = include $this->get_template_file( $banner_data['type'] );
				$output  .= $this->show_ad_banner_container( $banner_data, $ad_code );

				break;

			case 'image':
				$ad_code = include $this->get_template_file( $banner_data['type'] );
				$output  .= $this->show_ad_banner_container( $banner_data, $ad_code );
				break;


			// code is Google Adsense code
			case 'code':

				//
				// Advanced:
				// Changes AdSense banner size from the size detected in code or the size that passed for ad location in themes!
				//
				if ( true ) // to fix the PHPStorm reformat bug!
				{
					$c_width = $c_height = false;

					// ad size extracted from AdSense code
					if ( ! empty( $banner_data['width'] ) && ! empty( $banner_data['height'] ) ) {
						$c_width  = $banner_data['width'];
						$c_height = $banner_data['height'];
					} // ad size passed from parent! (usually we use it in ad location to show specific ad size by default)
					elseif ( ! empty( $banner_data['adsense_default_size'][0] ) && ! empty( $banner_data['adsense_default_size'][1] ) ) {
						$c_width  = $banner_data['adsense_default_size'][0];
						$c_height = $banner_data['adsense_default_size'][1];
					}

					//
					// Detects inline width & height and set's it to default size if was not override!
					//
					if ( $c_width && $c_height && empty( $banner_data['size_desktop'] ) ) {
						$banner_data['size_desktop'] = array(
							$c_width,
							$c_height,
						);
					}
				}


				if ( ! empty( $banner_data['ad-client'] ) && ! empty( $banner_data['ad-slot'] ) ) {
					$ad_code = include $this->get_template_file( 'adsense' );
					$output  .= $this->show_ad_banner_container( $banner_data, $ad_code );
				} else {
					$output .= $this->show_ad_banner_container( $banner_data, str_replace( "\n", '', do_shortcode( $banner_data['code'] ) ) );
				}
				break;

			case 'custom_code':

				Better_Ads_Manager()->enqueue_adblocker_detector();
				$ad = do_shortcode( $banner_data['custom_code'] );

				$caption = ! empty( $banner_data['caption'] ) && $args['show-caption'] ? Better_Ads_Manager::get_option( 'caption_position' ) : false;

				if ( $caption == 'above' ) {
					$ad = "<p class='bsac-caption bsac-caption-above'>{$banner_data['caption']}</p>" . $ad;
				} elseif ( $caption ) {
					$ad .= "<p class='bsac-caption bsac-caption-below'>{$banner_data['caption']}</p>";
				}

				// print general ad style
				if ( bf_is_amp() == 'better' ) {
					better_amp_enqueue_ad();
				}

				$output .= $this->show_ad_banner_container( $banner_data, $ad );

				break;

		}

		return $output;

	}


	/**
	 * Handy function used to create single ad container
	 *
	 * @param $banner_data
	 * @param $html
	 *
	 * @return string
	 */
	private function show_ad_banner_container( $banner_data, $html ) {

		if ( empty( $html ) ) {
			return '';
		}

		$banner_data['custom_class'] = 'bsac-container bsac-type-' . $banner_data['type'] . ' ' . $banner_data['custom_class'];

		if ( ! empty( $banner_data['custom_css'] ) ) {
			Better_Framework()->assets_manager()->add_css( $banner_data['custom_css'], true );
		}

		if ( ! $banner_data['show_desktop'] ) {
			$banner_data['custom_class'] .= ' bsac-hide-on-desktop';
		}

		if ( ! $banner_data['show_tablet_portrait'] ) {
			$banner_data['custom_class'] .= ' bsac-hide-on-tablet-portrait';
		}

		if ( ! $banner_data['show_tablet_landscape'] ) {
			$banner_data['custom_class'] .= ' bsac-hide-on-tablet-landscape';
		}

		if ( ! $banner_data['show_phone'] ) {
			$banner_data['custom_class'] .= ' bsac-hide-on-phone';
		}

		return '<div id="' . $banner_data['element_id'] . '" class="' . $banner_data['custom_class'] . '" itemscope="" itemtype="https://schema.org/WPAdBlock" data-adid="' . $banner_data['id'] . '" data-type="' . $banner_data['type'] . '">' . $html . '</div>';

	}


	/**
	 * Handy function used for safely getting banner data
	 *
	 * @param $id
	 *
	 * @return array
	 */
	function fetch_banner_data( $id ) {

		// Return from saved cache
		if ( $data = get_transient( $this->get_meta_cache_id( $id ) ) ) {

			if ( empty( $data['element_id'] ) ) {
				$data['element_id'] = 'bsac-' . $data['id'] . '-' . mt_rand();
			}

			return $data;
		}

		$data = array(
			'id'       => $id,
			'title'    => get_the_title( $id ),
			'campaign' => bf_get_post_meta( 'campaign', $id ),
			'format'   => bf_get_post_meta( 'format', $id ),
			'type'     => bf_get_post_meta( 'type', $id ),
			'caption'  => bf_get_post_meta( 'caption', $id ),
		);


		if ( $data['format'] === 'normal' ) {

			/**
			 *
			 * Normal Adsense code
			 *
			 */
			if ( $data['type'] === 'code' ) {

				$data['code'] = bf_get_post_meta( 'code', $id, '' );

				//
				// Size fields
				//

				$_size_check = array(
					'vertical'   => '',
					'horizontal' => '',
					'rectangle'  => '',
				);

				$_size_fields = array(
					'size_desktop',
					'size_tablet_portrait',
					'size_tablet_landscape',
					'size_phone',
				);

				foreach ( $_size_fields as $_size_f ) {
					$_size = bf_get_post_meta( $_size_f, $id, '' );

					if ( empty( $_size ) ) {
						$data[ $_size_f ] = '';
						continue;
					}

					if ( isset( $_size_check[ $_size ] ) ) {
						$data[ $_size_f ] = $_size;
					} else {
						$data[ $_size_f ] = explode( '_', $_size );
					}
				}

				if ( ! empty( $data['code'] ) ) {
					$data['active-ad'] = true;
				}

			} /**
			 *
			 * Normal Image Ad
			 *
			 */
			elseif ( $data['type'] == 'image' ) {

				$_fields = array(
					'img'       => '',
					'caption'   => '',
					'url'       => '',
					'target'    => '',
					'no_follow' => '',
				);

				foreach ( $_fields as $k => $v ) {
					$data[ $k ] = bf_get_post_meta( $k, $id, $v );
				}

				if ( ! empty( $data['img'] ) ) {
					$data['active-ad'] = true;
				}

			} /**
			 *
			 * Normal DFP
			 *
			 */
			elseif ( $data['type'] == 'dfp' ) {

				$_fields = array(
					'dfp_spot'        => '',
					'custom_dfp_code' => '',
				);

				foreach ( $_fields as $k => $v ) {
					$data[ $k ] = bf_get_post_meta( $k, $id, $v );
				}

				if ( ! empty( $data['dfp_spot'] ) ) {

					if ( $data['dfp_spot'] === 'custom' && ! empty( $data['custom_dfp_code'] ) ) {
						$data['active-ad'] = true;
					}
				}

			} /**
			 *
			 * Normal Custom Code
			 *
			 */ elseif ( $data['type'] === 'custom_code' ) {
				$data['custom_code'] = bf_get_post_meta( 'custom_code', $id, '' );


				if ( ! empty( $data['custom_code'] ) ) {
					$data['active-ad'] = true;
				}

			}


			/**
			 *
			 * Normal Ad -> Show fields
			 *
			 */
			$_fields = array(
				'show_desktop'          => true,
				'show_tablet_portrait'  => true,
				'show_tablet_landscape' => true,
				'show_phone'            => true,
			);

			foreach ( $_fields as $k => $v ) {
				$data[ $k ] = bf_get_post_meta( $k, $id, $v );
			}

		} elseif ( $data['format'] === 'amp' ) {

			/**
			 *
			 * AMP Adsense code
			 *
			 */
			if ( $data['type'] === 'code' ) {

				$data['code'] = bf_get_post_meta( 'code', $id, '' );
				$data['size'] = bf_get_post_meta( 'amp_size', $id, '' );

				if ( $data['size'] === 'custom' ) {
					$data['size'] = array(
						'width'  => bf_get_post_meta( 'amp_size_width', $id, '' ),
						'height' => bf_get_post_meta( 'amp_size_height', $id, '' ),
					);
				} else {
					$_size = explode( '_', $data['size'] );

					$data['size'] = array(
						'width'  => isset( $_size[0] ) ? $_size[0] : '',
						'height' => isset( $_size[1] ) ? $_size[1] : '',
					);
				}


				if ( ! empty( $data['code'] ) ) {
					$data['active-ad'] = true;
				}

			} /**
			 *
			 * Normal Image Ad
			 *
			 */
			elseif ( $data['type'] == 'image' ) {

				$_fields = array(
					'img'       => '',
					'caption'   => '',
					'url'       => '',
					'target'    => '',
					'no_follow' => '',
				);

				foreach ( $_fields as $k => $v ) {
					$data[ $k ] = bf_get_post_meta( $k, $id, $v );
				}


				if ( ! empty( $data['img'] ) ) {
					$data['active-ad'] = true;
				}

			} /**
			 *
			 * AMP DFP
			 *
			 */
			elseif ( $data['type'] == 'dfp' ) {

				$_fields = array(
					'dfp_spot'        => '',
					'dfp_custom_code' => '',
				);

				foreach ( $_fields as $k => $v ) {
					$data[ $k ] = bf_get_post_meta( $k, $id, $v );
				}

				if ( ! empty( $data['dfp_spot'] ) ) {

					if ( $data['dfp_spot'] === 'custom' && ! empty( $data['custom_dfp_code'] ) ) {
						$data['active-ad'] = true;
					}
				}

			} /**
			 *
			 * Normal Custom Code
			 *
			 */ elseif ( $data['type'] === 'custom_code' ) {

				$data['custom_code'] = bf_get_post_meta( 'custom_code', $id, '' );

				if ( ! empty( $data['custom_code'] ) ) {
					$data['active-ad'] = true;
				}
			}


			/**
			 *
			 * Normal Ad -> Show fields
			 *
			 */
			$_fields = array(
				'show_desktop'          => true,
				'show_tablet_portrait'  => true,
				'show_tablet_landscape' => true,
				'show_phone'            => true,
			);

			foreach ( $_fields as $k => $v ) {
				$data[ $k ] = bf_get_post_meta( $k, $id, $v );
			}

		}

		if ( ! isset( $data['active-ad'] ) ) {
			$data['active-ad'] = false;
		}


		/**
		 *
		 * Advanced custom css/class/id
		 *
		 */
		$_fields = array(
			'custom_class' => '',
			'custom_id'    => '',
			'custom_css'   => '',
		);

		foreach ( $_fields as $k => $v ) {
			if ( $k === 'custom_id' ) {
				$data['element_id'] = bf_get_post_meta( $k, $id, $v );
			} else {
				$data[ $k ] = bf_get_post_meta( $k, $id, $v );
			}
		}

		/**
		 * Extract Adsense data from the code in both normal and AMP ads
		 */
		if ( $data['type'] === 'code' && $data['code'] ) {
			$data = $data + better_ads_extract_google_ad_code_data( $data['code'] );
		}

		// Cache it
		set_transient( $this->get_meta_cache_id( $id ), $data, MONTH_IN_SECONDS );

		if ( empty( $data['element_id'] ) ) {
			$data['element_id'] = 'bsac-' . $data['id'] . '-' . mt_rand();
		}

		return $data;
	}


	/**
	 * Handy function used for safely getting banner data
	 *
	 * @param $id
	 *
	 * @return array
	 */
	function get_banner_data( $id ) {

		$data = $this->fetch_banner_data( $id );

		return $data;
	}


	/**
	 * Handy function used for safely getting banner data
	 *
	 * @param $id
	 *
	 * @return array
	 */
	function get_banner_fallback_data( $id ) {

		$data = array(
			'id'        => $id,
			'title'     => get_the_title( $id ),
			'type'      => 'image',
			'code'      => '',
			'img'       => '',
			'caption'   => '',
			'url'       => '',
			'target'    => '',
			'no_follow' => '',
		);

		if ( get_post_meta( $id, 'fallback_type', true ) != false ) {
			$data['type'] = get_post_meta( $id, 'fallback_type', true );
		}

		if ( get_post_meta( $id, 'fallback_code', true ) != false ) {
			$data['code'] = get_post_meta( $id, 'fallback_code', true );
		}

		if ( get_post_meta( $id, 'fallback_img', true ) != false ) {
			$data['img'] = get_post_meta( $id, 'fallback_img', true );
		}

		if ( get_post_meta( $id, 'fallback_caption', true ) != false ) {
			$data['caption'] = get_post_meta( $id, 'fallback_caption', true );
		}

		if ( get_post_meta( $id, 'fallback_url', true ) != false ) {
			$data['url'] = get_post_meta( $id, 'fallback_url', true );
		}

		if ( get_post_meta( $id, 'fallback_target', true ) != false ) {
			$data['target'] = get_post_meta( $id, 'fallback_target', true );
		}

		if ( bf_count( get_post_meta( $id, 'fallback_no_follow' ) ) > 0 ) {
			$data['no_follow'] = get_post_meta( $id, 'fallback_no_follow', true );
		}

		return $data;

	}


	/**
	 * Used for adding inline ads to post content in frond end
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	function setup_post_content_ads( $content = '' ) {

		// Add post ads only 1 time
		if ( bf_is_doing_ajax() ) {
			static $initialized;

			if ( $initialized ) {
				return $content;
			} else {
				$initialized = true;
			}
		}

		if ( is_feed() ) {
			return $content;
		}

		if ( ! bf_is_doing_ajax() && ( ! is_singular() || is_front_page() ) ) {
			return $content;
		}

		if ( ! $this->wp_head_finished && ! bf_is_doing_ajax() && empty( $_GET['ajax_related_post'] ) ) {
			return $content;
		}

		//
		// Ads added to post before!
		//
		{
			static $processed_posts;

			if ( is_null( $processed_posts ) ) {
				$processed_posts = array();
			}

			if ( isset( $processed_posts[ get_the_ID() ] ) ) {
				return $content;
			} else {
				$processed_posts[ get_the_ID() ] = true;
			}
		}


		//
		// Disable ads
		//
		if ( ! better_ads_ad_can_be_shown( 'shortcode' ) ) {
			return $content;
		}


		//
		// Ad locations
		// todo add RSS ads
		//
		if ( $this->get_current_format() === 'amp' ) {
			$locations = array(
				'amp_post_inline'         => array(
					'type'            => 'paragraph',
					'container-class' => 'bsac-post-inline',
					'add-align'       => true,
					'multiple'        => true,
				),
				'amp_post_content_before' => array(
					'type'            => 'before',
					'container-class' => 'bsac-post-top',
					'add-align'       => true,
				),
				'amp_post_content_middle' => array(
					'type'            => 'middle',
					'container-class' => 'bsac-post-middle',
					'add-align'       => true,
				),
				'amp_post_content_after'  => array(
					'type'            => 'after',
					'container-class' => 'bsac-post-bottom',
					'add-align'       => true,
				),
			);
		} else {
			$locations = array(
				'ad_post_inline' => array(
					'type'            => 'paragraph',
					'container-class' => 'bsac-post-inline',
					'add-align'       => true,
					'multiple'        => true,
				),
				'ad_post_top'    => array(
					'type'            => 'before',
					'container-class' => 'bsac-post-top',
					'add-align'       => true,
				),
				'ad_post_middle' => array(
					'type'            => 'middle',
					'container-class' => 'bsac-post-middle',
					'add-align'       => true,
				),
				'ad_post_bottom' => array(
					'type'            => 'after',
					'container-class' => 'bsac-post-bottom',
					'add-align'       => true,
				),
			);
		}

		foreach ( $locations as $k => $v ) {

			$data = array();

			if ( ! empty( $v['multiple'] ) ) {
				$data = better_ads_get_ad_data( $k, true );
			} else {
				$data[] = better_ads_get_ad_data( $k, false );
			}

			foreach ( $data as $ad_item_k => $ad_item ) {

				if ( empty( $ad_item['active_location'] ) ) {
					continue;
				}

				if ( empty( $ad_item['align'] ) ) {
					$ad_item['align'] = 'center';
				}

				if ( ! empty( $v['container-class'] ) ) {
					$ad_item['container-class'] = $v['container-class'];
				} else {
					$ad_item['container-class'] = '';
				}

				if ( $v['add-align'] ) {
					$ad_item['container-class'] .= ' bsac-float-' . $ad_item['align'];
				}

				// Position of ad
				if ( $v['type'] === 'paragraph' ) {

					$inline_ad['paragraph'] = intval( $ad_item['paragraph'] );

					if ( $inline_ad['paragraph'] <= 0 ) {
						continue;
					}

					$position = $inline_ad['paragraph'];

				} elseif ( $v['type'] === 'before' ) {
					$position = 'top';
				} elseif ( $v['type'] === 'middle' ) {
					$position = 'middle';
				} else {
					$position = 'bottom';
				}

				// inject it
				bf_content_inject( array(
					'priority' => 1100, // High Priority [ again in our standards ;)) ]
					'position' => $position,
					'content'  => $this->show_ads( $ad_item ),
					'config'   => 'better-adsmanager',
				) );

			} // foreach items

		} // foreach locations


		if ( $block_elements = self::get_option( 'html_block_tags' ) ) {
			bf_content_inject_config( 'better-adsmanager', array(
				'blocks_elements' => explode( ',', $block_elements ),
			) );
		}

		return $content;
	}


	/**
	 * Callback: Ajax callback for retrieving blocked ads fallback!
	 */
	function callback_blocked_ads() {

		if ( ! empty( $_POST["ads"] ) ) {
			$ads_list = $_POST["ads"];
		} else {
			$ads_list = array();
		}


		// Create ads fallback code
		foreach ( (array) $ads_list as $ad_id => $ad ) {

			if ( empty( $ad['ad_id'] ) || empty( $ad['element_id'] ) ) {
				continue;
			}

			// prepare data
			$banner_data = $this->get_banner_fallback_data( $ad['ad_id'] );

			$output = '';

			switch ( $banner_data['type'] ) {

				case 'image':

					// custom title
					if ( ! empty( $banner_data['caption'] ) ) {
						$title = $banner_data['caption'];
					} else {
						$title = $banner_data['title'];
					}

					if ( ! empty( $banner_data['url'] ) ) {
						$output .= '<a itemprop="url" class="bsac-link" href="' . $banner_data['url'] . '" target="' . $banner_data['target'] . '" ';
						$output .= $banner_data['no_follow'] ? ' rel="nofollow" >' : '>';
					}


					$output .= '<img class="bsac-image" src="' . $banner_data['img'] . '" alt="' . $title . '" />';

					if ( ! empty( $banner_data['caption'] ) ) {
						$output .= '<span class="bsac-caption">' . $banner_data['caption'] . '</span>';
					}

					if ( ! empty( $banner_data['url'] ) ) {
						$output .= '</a>';
					}

					break;

				case 'code':

					$output .= $banner_data['code'];

					if ( ! empty( $banner_data['caption'] ) ) {
						$output .= '<span class="bsac-caption">' . $banner_data['caption'] . '</span>';
					}

					break;

			}

			$ads_list[ $ad_id ]['code'] = $this->make_prefix_undetectable( $output );
		}

		$result = array(
			'ads' => $ads_list
		);

		die( json_encode( apply_filters( 'better-ads/blocked-ads/fallback', $result ) ) );

	}


	/**
	 * Callback: Enable oculus error logging system for plugin
	 * Filter  : better-framework/oculus/logger/filter
	 *
	 * @access private
	 *
	 * @param boolean $bool previous value
	 * @param string  $product_dir
	 * @param string  $type_dir
	 *
	 * @return bool true if error belongs to theme, previous value otherwise.
	 */
	function oculus_logger( $bool, $product_dir, $type_dir ) {

		if ( $type_dir === 'plugins' && $product_dir === 'better-adsmanager' ) {
			return false;
		}

		return $bool;
	}


	/**
	 * Columns for banners
	 *
	 * @param $columns
	 *
	 * @return array
	 */
	function banner_columns( $columns ) {

		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'format'    => __( 'Ad', 'better-studio' ),
			'title'     => __( 'Ad Name', 'better-studio' ),
			'shortcode' => __( 'Shortcode', 'better-studio' ),
			'date'      => __( 'Date', 'better-studio' ),
			'campaign'  => __( 'Campaign', 'better-studio' ),
		);

		return $columns;
	}


	/**
	 * Content of columns
	 *
	 * @param $column
	 * @param $post_id
	 */
	function banner_columns_content( $column, $post_id ) {

		switch ( $column ) {

			case 'format' :
				$format = bf_get_post_meta( 'format', $post_id );

				if ( $format === 'normal' || empty( $format ) ) {
					echo '<strong class="bsacadformat bsacadformatnormal" title="' . __( 'Normal Ad ', 'better-studio' ) . '"><i class="fa fa-desktop"></i></strong>';
				} else {
					echo '<strong class="bsacadformat bsacadformatamp" title="' . __( 'AMP Ad', 'better-studio' ) . '"><i class="fa fa-mobile"></i></strong>';
				}

				$type = bf_get_post_meta( 'type', $post_id );

				if ( $type == 'code' ) {
					echo '<strong class="bsacadtype bsacadtypeadsense" title="' . __( 'Google AdSense Ad', 'better-studio' ) . '"><i class="fa fa-google" "></i></strong>';
				} elseif ( $type == 'image' ) {
					echo '<strong class="bsacadtype bsacadtypeimage" title="' . __( 'Custom Image Ad', 'better-studio' ) . '"><i class="fa fa-image" "></i></strong>';
				} elseif ( $type == 'dfp' ) {
					echo '<strong class="bsacadtype bsacadtypedfp" title="' . __( 'Google DFP Ad', 'better-studio' ) . '"><i class="fa fa-google" "></i></strong>';
				} else {
					echo '<strong class="bsacadtype bsacadtypecode" title="' . __( 'Custom Code Ad', 'better-studio' ) . '"><i class="fa fa-code" "></i></strong>';
				}

				break;

			case 'shortcode' :


				$banner_data = $this->get_banner_data( $post_id );

				if ( empty( $banner_data['active-ad'] ) ) {
					echo '<strong class="bsacshortcodeempty">' . __( 'Ad configuration is not correct.', 'better-studio' ) . '</strong>';
				} else {
					echo '<strong class="bsacshortcodecopy">' . "[better-ads type='banner' banner='{$post_id}' ]" . '</strong>';
				}

				break;

			case 'campaign' :

				$campaigns = bf_get_post_meta( 'campaign', $post_id );
				$all_camps = better_ads_get_campaigns_option( - 1 );

				if ( $campaigns && $campaigns != 'none' ) {
					foreach ( (array) $campaigns as $camp ) {
						if ( isset( $all_camps[ $camp ] ) ) {
							echo '<strong class="bsacadcamp">' . $all_camps[ $camp ] . '</strong>';
						}
					}
				}
				break;

			default :
				break;
		}

	}


	/**
	 * Fix admin menu margins for better UX
	 */
	public function admin_styles() {

		?>
		<style>
			#adminmenu li#toplevel_page_better-studio-better-ads-manager,
			#adminmenu .toplevel_page_better-amp-translation {
				margin-top: 10px;
				margin-bottom: 10px;
			}

			#adminmenu li[id^="toplevel_page_better-studio"] + li#toplevel_page_better-studio-better-ads-manager,
			#adminmenu li[id^="toplevel_page_better-studio"] + .toplevel_page_better-amp-translation {
				margin-top: -10px;
				margin-bottom: 10px;
			}
		</style>
		<?php
	}


	/**
	 * Prints codes into site header.
	 *
	 * @hooked wp_head
	 *
	 * @since  1.9
	 */
	public function print_wp_head() {

		// FTP code
		if ( $dfp_code = self::get_option( 'dfp_code' ) ) {
			echo $dfp_code;
		}

	}


	/**
	 * Save only active override fields
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	public static function handle_ads_manager_override_save( $args = array() ) {

		if ( $args['id'] !== 'better_ads_manager' ) {
			return $args;
		}

		$fields_list = better_ads_get_override_fields_list();   // All fields
		$sections    = better_ads_get_override_sections_list(); // All sections
		$ad_fields   = array();


		//
		// Collect all active (For performance improvement)
		//
		foreach ( $fields_list as $field ) {
			if ( isset( $field['ad-id'] ) && isset( $field['id'] ) ) {
				$ad_fields[ $field['ad-id'] ][] = $field['id'];
			}
		}

		//
		// All Types
		//
		foreach ( $sections as $type_id => $type ) {

			//
			// Sections
			//
			foreach ( $type['items'] as $section ) {

				//
				// Detected fields
				//
				foreach ( $ad_fields as $field_k => $field ) {

					// Ad condition ID
					$condition_field_id = 'ovr_' . $section['id'] . '-' . $field_k . '-active';

					// IF ad override is active
					if ( ! isset( $args['data'][ $condition_field_id ] ) || ! $args['data'][ $condition_field_id ] ) {

						unset( $args['data'][ $condition_field_id ] );

						foreach ( $field as $_k ) {
							unset( $args['data'][ 'ovr_' . $section['id'] . '-' . $_k ] );
						}
					}
				}

			}

		}

		return $args;

	} // handle_ads_manager_override_save


	/**
	 * Removes all override settings in panel
	 *
	 * @return array
	 */
	public static function reset_panel_override_settings() {

		$lang = bf_get_current_language_option_code();

		$ads_options = get_option( self::$panel_id . $lang );


		//
		// Remove all options that start with "ovr_"
		//
		foreach ( $ads_options as $id => $value ) {
			if ( substr( $id, 0, 3 ) === 'ovr_' ) {
				unset( $ads_options[ $id ] );
			}
		}

		// Updates option
		update_option( self::$panel_id . $lang, $ads_options );

		Better_Framework()->admin_notices()->add_notice( array(
			'msg' => __( 'All ad override settings was removed.', 'better-studio' ),
		) );

		return array(
			'status'  => 'succeed',
			'msg'     => __( 'All ad override settings was removed.', 'better-studio' ),
			'refresh' => true
		);

	}


	/**
	 * Filter Callback: Registers shortcode to BetterStudio Editor Shortcodes Plugin
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	public static function register_shortcode_to_editor( $shortcodes ) {

		$shortcodes['better-ads'] = array(
			'type'     => 'button',
			'label'    => __( 'Better Ads', 'better-studio' ),
			'callback' => 'BetterAds',
			'register' => false,
			'content'  => '[better-ads]<br />'
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
		$config['editor-dynamic-style'][] = Better_Ads_Manager::dir_path( 'includes/dynamics/editor_css.php' );

		// Show sidebars
		$config['layouts'] = false;

		return $config;
	}


	/**
	 * Returns (and generates) the unique ID for BAM codes
	 *
	 * @param bool $reset
	 *
	 * @return string
	 */
	function get_unique_id( $reset = false ) {

		$id  = false;
		$key = 'bam-unique-id';

		if ( ! $reset ) {
			$id = get_option( $key, $id );
		}

		if ( ! $id ) {
			$id = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz" ), 0, mt_rand( 3, 10 ) );
			update_option( $key, $id, true );
		}

		return $id;
	}


	/**
	 * Changes all BAM related classes and texts to the unique ID
	 * This makes BAM completely undetectable.
	 *
	 * @return mixed
	 */
	function make_prefix_undetectable( $code ) {

		return str_replace(
			array(
				'bsac',
				'Better_Ads_Manager_Ajax_URL',
				'Better_Ads_Manager',
				'better-ads',
			),
			array(
				BAM_PREFIX,
				'\'' . admin_url( 'admin-ajax.php' ) . '\'',
				BAM_PREFIX,
				BAM_PREFIX,
			),
			$code
		);
	}


	/**
	 * Filter callback: Used for clearing the unique id on save
	 *
	 * @param $output
	 * @param $args
	 *
	 * @return string
	 */
	function callback_panel_save_result( $output, $args ) {

		// change only for BAM panel
		if ( $args['id'] == self::$panel_id ) {

			// Reset unique ID
			self::get_unique_id( true );
		}

		return $output;
	}


	/**
	 * @hooked admin_head
	 */
	function print_admin_head() {

		// Prints BetterAds CSS codes in the header of Gutenberg pages
		// This css code is dynamic
		if ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {

			$code = '';

			ob_start();
			include bf_append_suffix( self::dir_path( 'css/bam' ), '.css' );
			$code .= ob_get_clean();

			ob_start();
			include bf_append_suffix( self::dir_path( 'css/gutenberg' ), '.css' );
			$code .= ob_get_clean();

			$code = $this->make_prefix_undetectable( $code );

			echo "<!-- Better Ads Dynamic CSS Code --><style>{$code}</style>";
		}
	}


	/**
	 * Changes the output of BetterAds widget to make it not detectable for Ad Blcokers!
	 *
	 * @param $params
	 *
	 * @return mixed
	 */
	function dynamic_sidebar_params( $params ) {

		if ( ! empty( $params[0]['widget_id'] ) && substr( $params[0]['widget_id'], 0, 11 ) === "better-ads-" ) {
			$params[0]['before_widget'] = Better_Ads_Manager()->make_prefix_undetectable( $params[0]['before_widget'] );
		}

		return $params;
	}


	/**
	 * Clear's BF cache to generate it again to make sure the BAM
	 * auto generated CSS codes will be added to BF CSS cache.
	 */
	public static function plugin_activation_hook() {

		global $wpdb;

		delete_transient( '__better_framework__widgets_css' );
		$wpdb->query( $wpdb->prepare( "
                      DELETE
                      FROM $wpdb->options
                      WHERE option_name LIKE %s
                  ", '_transient___better_framework__panel_css%' ) );
		delete_transient( '__better_framework__menu_css' );
		delete_transient( '__better_framework__terms_css' );

		$wpdb->query( $wpdb->prepare( "
                      DELETE
                      FROM $wpdb->options
                      WHERE option_name LIKE %s
                  ", '_transient___better_framework__final_fe_css%' ) );
		$wpdb->query( $wpdb->prepare( "
                      DELETE
                      FROM $wpdb->options
                      WHERE option_name LIKE %s
                  ", '_transient___better_framework__final_fe_css_version%' ) );
	}


	/**
	 * Clear Ad caches while saving
	 *
	 * @param $post_id
	 * @param $post
	 * @param $update
	 */
	function save_ads_post( $post_id, $post, $update ) {

		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		$post_type = get_post_type( $post_id );

		// IS ads post?
		if ( 'better-banner' != $post_type ) {
			return;
		}

		// collect final data
		delete_transient( $this->get_meta_cache_id( $post_id ) );
	}


	/**
	 * Return meta cache ID based for current version of plugin
	 *
	 * @param $post_id
	 *
	 * @return string
	 */
	function get_meta_cache_id( $post_id ) {

		return $this->meta_cache_id . '-' . self::$version . '-' . $post_id . '-';
	}


	/**
	 * hooked to wp_head action
	 */
	function wp_head() {

		// Save this to know the wp_head was finished or not
		// do not show ads on the the_content inside the wp_head
		$this->wp_head_finished = true;

		if ( ! empty( self::get_option( 'custom_css_code' ) ) ) {
			echo '<style>',
			str_replace(
				array(
					'<style>',
					'</style>'
				),
				'',
				self::get_option( 'custom_css_code' )
			),
			'</style>';
		}

		echo self::get_option( 'custom_header_code' );
	}
}
