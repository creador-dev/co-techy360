<?php
/*
Plugin Name: Better Reviews
Plugin URI: http://betterstudio.com
Description: BetterStudio Reviews Plugin
Version: 1.4.8
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/


/**
 * Better_Reviews class wrapper
 *
 * @return Better_Reviews
 */
function Better_Reviews() {

	return Better_Reviews::self();
}

// Fire up Better Reviews
Better_Reviews();


/**
 * Better Reviews Functionality
 */
class Better_Reviews {

	/**
	 * Contains BR version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	public static $version = '1.4.8';


	/**
	 * Contains BR option panel id
	 *
	 * @var string
	 */
	public static $panel_id = 'better_reviews_options';


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();

	/**
	 * Override Template Directory
	 *
	 * @since 1.3.0
	 */
	const OVERRIDE_TPL_DIR = 'better-review';

	/**
	 * @var array
	 *
	 * @since 1.3.0
	 */
	public static $post_types = array( 'post', 'page' );


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

		// Includes Template Functions
		include $this->dir_path( 'includes/template-functions.php' );

		// Generator Class
		self::generator();

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Register panel
		include $this->dir_path( 'includes/options/panel.php' );

		// Register metabox
		include $this->dir_path( 'includes/options/metabox.php' );

		// Used for adding shortcode
		add_action( 'init', array( $this, 'wp_init' ) );

		// Initialize after bf init
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		add_filter( 'betterstudio-editor-shortcodes', array( $this, 'register_shortcode_to_editor' ) );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );


		// Handle user rating
		add_action( 'wp_ajax_better-review-rating', 'Better_Reviews::handle_user_rating' );
		add_action( 'wp_ajax_nopriv_better-review-rating', 'Better_Reviews::handle_user_rating' );
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
	 * Returns BSC current Version
	 *
	 * @return string
	 */
	public static function get_version() {

		return self::$version;
	}


	/**
	 * Build the required object instance
	 *
	 * @param string $object
	 * @param bool   $fresh
	 * @param bool   $just_include
	 *
	 * @return null
	 */
	public static function factory( $object = 'self', $fresh = FALSE, $just_include = FALSE ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Better_Reviews Class
			 */
			case 'self':
				$class = 'Better_Reviews';
				break;

			/**
			 * Better_Reviews_Generator Class
			 */
			case 'generator':

				if ( ! class_exists( 'Better_Reviews_Generator' ) ) {
					require self::dir_path( 'includes/class-better-reviews-generator.php' );
				}

				$class = 'Better_Reviews_Generator';
				break;


			default:
				return NULL;
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
	 * Used for accessing alive instance of Better_Reviews
	 *
	 * @since 1.0
	 *
	 * @return Better_Reviews
	 */
	public static function self() {

		return self::factory();
	}


	/**
	 * Used for retrieving instance of generator
	 *
	 * @param $fresh
	 *
	 * @return Better_Reviews_Generator
	 */
	public static function generator( $fresh = FALSE ) {

		return self::factory( 'generator', $fresh );
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
	 * Used for retrieving post meta
	 *
	 * @param null   $key
	 * @param string $default
	 * @param null   $post_id
	 *
	 * @return string
	 */
	public static function get_meta( $key = NULL, $default = '', $post_id = NULL ) {

		return bf_get_post_meta( $key, $post_id, $default );
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
			'version' => '3.10.14',
			'path'    => self::dir_path( 'includes/libs/better-framework/' ),
			'uri'     => self::dir_url( 'includes/libs/better-framework/' ),
		);

		return $frameworks;
	}


	/**
	 * Action Callback: WordPress Init
	 */
	public function wp_init() {

		// Registers shortcode
		add_shortcode( 'better-reviews', array( $this, 'better_reviews_shortcode' ) );

	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}


	/**
	 * Callback: Used for registering scripts and styles
	 *
	 * Action: enqueue_scripts
	 */
	function enqueue_scripts() {

		bf_enqueue_style(
			'br-numbers',
			'https://fonts.googleapis.com/css?family=Oswald&text=0123456789./\%',
			array(),
			Better_Reviews::$version
		);

		bf_enqueue_style(
			'better-reviews',
			bf_append_suffix( Better_Reviews::dir_url( 'css/better-reviews' ), '.css' ),
			array(),
			bf_append_suffix( Better_Reviews::dir_path( 'css/better-reviews' ), '.css' ),
			Better_Reviews::$version
		);

		if ( is_rtl() ) {
			bf_enqueue_style(
				'better-reviews-rtl',
				bf_append_suffix( Better_Reviews::dir_url( 'css/better-reviews-rtl' ), '.css' ),
				array(),
				bf_append_suffix( Better_Reviews::dir_path( 'css/better-reviews-rtl' ), '.css' ),
				Better_Reviews::$version
			);
		}


		bf_enqueue_script(
			'better-reviews',
			bf_append_suffix( Better_Reviews::dir_url( 'js/better-reviews' ), '.js' ),
			array(),
			bf_append_suffix( Better_Reviews::dir_path( 'js/better-reviews' ), '.js' ),
			Better_Reviews::$version
		);


		$parsed_url  = parse_url( site_url() );
		$coolie_path = isset( $parsed_url['path'] ) ? $parsed_url['path'] : '/';

		bf_localize_script( 'better-reviews', 'betterReviewsLoc', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'cp'       => $coolie_path,
		) );
	}


	/**
	 * Action Callback: Registers Admin Style
	 */
	public function admin_enqueue_scripts() {

		if ( Better_Framework::self()->get_current_page_type() != 'metabox' ) {
			return;
		}

		$dir_url = self::dir_url();

		wp_enqueue_style(
			'better-reviews-admin',
			bf_append_suffix( $dir_url . 'css/admin-style', '.css' ),
			array(),
			Better_Reviews::$version
		);

		wp_enqueue_script(
			'better-reviews-admin',
			bf_append_suffix( $dir_url . 'js/admin-script', '.js' ),
			array( 'jquery' ),
			Better_Reviews::$version
		);

		wp_localize_script(
			'better-reviews-admin',
			'better_reviews_loc',
			apply_filters(
				'better_reviews_localize_items',
				array(
					'overall_rating' => __( 'Overall Rating', 'better-studio' ),
				)
			)
		);
	}


	/**
	 * Filter Callback: Registers shortcode to BetterStudio Editor Shortcodes Plugin
	 *
	 * todo change this
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	public function register_shortcode_to_editor( $shortcodes ) {

		$_shortcodes = array();

		$_shortcodes[ 'sep' . time() ] = array(
			'type' => 'separator',
		);

		$_shortcodes['reviews'] = array(
			'type'     => 'menu',
			'label'    => __( 'Better Reviews', 'better-studio' ),
			'register' => FALSE,
			'items'    => array(
				'review-stars'      => array(
					'type'     => 'button',
					'label'    => __( 'Review Stars', 'better-studio' ),
					'register' => FALSE,
					'content'  => '[better-reviews type="stars"]',
				),
				'review-percentage' => array(
					'type'     => 'button',
					'label'    => __( 'Review Percentage', 'better-studio' ),
					'register' => FALSE,
					'content'  => '[better-reviews type="percentage"]',
				),
				'review-points'     => array(
					'type'     => 'button',
					'label'    => __( 'Review Points', 'better-studio' ),
					'register' => FALSE,
					'content'  => '[better-reviews type="points"]',
				),
			),
		);

		return $shortcodes + $_shortcodes;
	}


	/**
	 * Shortcode: Review Shortcode Handler
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function better_reviews_shortcode( $atts, $content = NULL ) {

		return self::generator()->generate_block( $atts );
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

		if ( $type_dir === 'plugins' && $product_dir === 'better-reviews' ) {
			return FALSE;
		}

		return $bool;
	}


	/**
	 * @since 1.3.0
	 */
	public static function handle_user_rating() {

		if ( empty( $_REQUEST['post_id'] ) || ! isset( $_REQUEST['rating'] ) ) {
			return FALSE;
		}

		try {

			$post_id     = intval( $_REQUEST['post_id'] );
			$user_rating = intval( $_REQUEST['rating'] ); // in percent

			if ( ! self::post_exits( $post_id ) ) {
				throw new Exception( 'Invalid Post' );
			}

			if ( ! get_post_meta( $post_id, '_bs_review_enabled', TRUE ) ) {
				throw new Exception( 'Invalid Request' );
			}

			if ( ! ( $user_rating >= 0 && $user_rating <= 100 ) ) {
				throw new Exception( 'Invalid Rating' );
			}

			if ( ! empty( $_COOKIE['better-review-user-rating'] ) ) {
				$voted_posts = explode( ',', $_COOKIE['better-review-user-rating'] );

				if ( in_array( $post_id, $voted_posts ) ) {
					throw new Exception( 'Duplicate Vote!' );
				}
			}

			// save rating
			$total_votes = (int) get_post_meta( $post_id, '_bs_review_total_user_votes', TRUE );

			if ( $total_votes ) {

				$current_rating = (int) get_post_meta( $post_id, '_bs_review_user_votes', TRUE );
				$new_rating     = $current_rating + $user_rating;

			} else {

				$new_rating = $user_rating;
			}

			$total_votes ++;

			update_post_meta( $post_id, '_bs_review_user_votes', $new_rating );
			update_post_meta( $post_id, '_bs_review_total_user_votes', $total_votes );

			$average = $new_rating / $total_votes;

			wp_send_json_success( array(
				'vote'        => round( $average, 0, PHP_ROUND_HALF_DOWN ),
				'votes_count' => $total_votes,
			) );

		} catch( Exception $e ) {

			wp_send_json_error( array( 'message' => $e->getMessage() ) );
		}
	}


	/**
	 * Check whether post exits
	 *
	 * @param int|string $post_id
	 *
	 * @return bool
	 */
	public static function post_exits( $post_id ) {

		global $wpdb;

		$post_types = "'" . implode( "', '", self::$post_types ) . "'";
		$sql        = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE ID = ' . intval( $post_id ) .
		              ' AND post_status = \'publish\' AND post_type IN(' . $post_types . ')';

		return (bool) $wpdb->get_var( $sql );
	}
}
