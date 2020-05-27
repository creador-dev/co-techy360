<?php
/*
Plugin Name: Better Post Views
Plugin URI: http://betterstudio.com
Description: Enables you to display how many times a post/page had been viewed.
Version: 1.5.3
Author: BetterStudio
Author URI: http://betterstudio.com
License: GPL2
*/

/**
 * Better_Post_Views class wrapper for make changes safe in future
 *
 * @return Better_Post_Views
 */
function Better_Post_Views() {

	return Better_Post_Views::self();
}


// Initialize Better Post Views
Better_Post_Views();


/**
 * Handy function to show post views count
 *
 * @param   bool   $echo     Echo  views count
 * @param   string $prefix   Prefix text to views count text
 * @param   string $postfix  Postfix text to views count text
 * @param   string $display  Display it or not? Use "show", "hide" and "default"
 * @param   string $template Custom template for result
 *
 * @return  string|integer
 */
function The_Better_Views( $echo = TRUE, $prefix = '', $postfix = '', $display = 'default', $template = '' ) {

	if ( $echo ) {
		Better_Post_Views::the_views( $echo, $prefix, $postfix, $display, $template );

		return '';
	} else {
		return Better_Post_Views::the_views( $echo, $prefix, $postfix, $display, $template );
	}
}


/**
 * Handy function get post views count
 *
 * @param int $post_id Post ID
 *
 * @return  string|integer
 */
function The_Better_Views_Count( $post_id = 0 ) {

	return Better_Post_Views::get_views_count( $post_id );
}


/**
 * Class Better_Post_Views
 */
class Better_Post_Views {


	/**
	 * Contains Better_Post_Views version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	private static $version = '1.5.3';


	/**
	 * Contains Better_Post_Views option panel ID
	 *
	 * @var string
	 */
	public static $panel_id = 'better_post_views';


	/**
	 * Contains Better_Post_Views view count meta ID
	 *
	 * @var string
	 */
	public static $meta_id_daily = 'better-views-count';


	/**
	 * Contains Better_Post_Views meta id of last 7 days data
	 *
	 * @var string
	 */
	public static $meta_id_7days_data = 'better-views-7days-data';

	/**
	 * Contains Better_Post_Views meta id of 7 days last day
	 *
	 * @var string
	 */
	public static $meta_id_7days_total = 'better-views-7days-total';


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	function __construct() {

		// make sure following code only one time run
		static $initialized;
		if ( $initialized ) {
			return;
		} else {
			$initialized = TRUE;
		}

		include self::dir_path( 'includes/options/panel.php' );

		include self::dir_path( 'includes/options/metabox.php' );

		// Register text domain
		load_plugin_textdomain( 'better-studio', FALSE, 'better-post-views/languages' );

		// Initialize
		add_action( 'better-framework/after_setup', array( $this, 'init' ) );

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );

		// Register included BF to loader
		add_filter( 'better-framework/loader', array( $this, 'better_framework_loader' ) );

		// Includes BF loader if not included before
		include self::dir_path( 'includes/libs/better-framework/init.php' );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

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
			'version' => '3.7.0',
			'path'    => self::dir_path( 'includes/libs/better-framework/' ),
			'uri'     => self::dir_url( 'includes/libs/better-framework/' ),
		);

		return $frameworks;
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
	 * Returns Better Post Views current Version
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
	 * @return Better_Post_Views|null
	 */
	public static function factory( $object = 'self', $fresh = FALSE, $just_include = FALSE ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Better_Post_Views Class
			 */
			case 'self':
				$class = 'Better_Post_Views';
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
	 * Used for accessing alive instance of Better_Post_Views
	 *
	 * static
	 *
	 * @since 1.0
	 * @return Better_Post_Views
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
	 *  Init the plugin
	 */
	function init() {

		// Increment post views count
		add_action( 'wp_head', array( $this, 'wp_head' ) );

		// Enqueue admin assets
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		// Post counter support to BetterAMP
		if ( is_ssl() ) {
			add_action( 'better-amp/template/footer', array( $this, 'amp_pixel_for_views' ) );
		} else {
			add_action( 'better-amp/template/head', array( $this, 'wp_head' ) );
		}

		// Add ajax action to do views increment
		add_action( 'wp_ajax_better_post_views', array( $this, 'increment_views_ajax' ) );
		add_action( 'wp_ajax_nopriv_better_post_views', array( $this, 'increment_views_ajax' ) );

		// Registers shortcode
		add_shortcode( 'better-post-views', array( $this, 'views_shortcode' ) );
		add_filter( 'betterstudio-editor-shortcodes', array( $this, 'register_shortcode_to_editor' ) );

		if ( is_admin() ) {

			// adding view count into WP admin columns
			add_action( 'manage_posts_custom_column', array( $this, 'add_views_column_content' ) );
			add_filter( 'manage_posts_columns', array( $this, 'add_views_column' ) );
			add_action( 'manage_pages_custom_column', array( $this, 'add_views_column_content' ) );
			add_filter( 'manage_pages_columns', array( $this, 'add_views_column' ) );

			// Admin sortable columns manager
			add_filter( 'manage_edit-post_sortable_columns', array( $this, 'manage_admin_sortable_columns' ) );
			add_filter( 'manage_edit-page_sortable_columns', array( $this, 'manage_admin_sortable_columns' ) );

			// Handle's admin sortable columns
			add_action( 'pre_get_posts', array( $this, 'handle_admin_sortable_columns' ) );
		}

		// Fix for "WP Fastest Cache" plugin
		if ( class_exists( 'WpFastestCache' ) ) {

			$notice_id = 'post-views-fastest-cache-' . self::$version;

			if ( ! WP_CACHE ) {
				$wp_config = bf_get_local_file_content( ABSPATH . "wp-config.php" );

				preg_match( '/(?<!\/\/|\/\*)(\s[^\/\/|^\/\*]*)define\([\'\"\s].*WP_CACHE[\'\"\s],.*true.*\).*\;/i', $wp_config, $matched );

				if ( empty( $matched ) ) {
					bf_add_notice( array(
						'type'        => 'static',
						'dismissible' => TRUE,
						'id'          => $notice_id,
						'state'       => 'warning',
						'msg'         => __( 'You are using "<strong>WP Fastest Cache</strong>" plugin and you have to add following code into "<strong style="white-space: nowrap;">wp-config.php</strong>" to make sure "<strong>Better Post Views</strong>" will work properly in cached pages. <br> <br> <code>define(\'WP_CACHE\', true);</code>', 'better-studio' ),
						'user_role'   => array( 'administrator' ),
						'thumbnail'   => self::dir_url( 'img/notice-icon.png?v=' . self::$version ),
					) );
				} else {
					bf_remove_notice( $notice_id );
				}
			} else {
				bf_remove_notice( $notice_id );
			}
		}
	}


	/**
	 * Callback: Enqueue css and js files
	 *
	 * Action: wp_enqueue_scripts
	 */
	function enqueue_assets() {

		global $post;

		// Enqueue only when there is active cache plugin
		if ( ! defined( 'WP_CACHE' ) || ! WP_CACHE ) {
			return;
		}

		if ( ! is_singular() || wp_is_post_revision( $post ) && ! self::should_count() ) {
			return;
		}

		if ( is_home() || is_front_page() ) {
			return;
		}

		wp_enqueue_script(
			'better-post-views-cache',
			bf_append_suffix( self::dir_url( 'js/better-post-views' ), '.js' ),
			array( 'jquery' ),
			self::get_version(),
			TRUE
		);

		wp_localize_script(
			'better-post-views-cache',
			'better_post_views_vars',
			apply_filters(
				'better-post-views/js/localized-vars',
				array(
					'admin_ajax_url' => admin_url( 'admin-ajax.php' ),
					'post_id'        => isset( $post->ID ) ? intval( $post->ID ) : 0,
				)
			)
		);

	}


	/**
	 * Callback: Increment post views for posts and pages
	 *
	 * Action: wp_head
	 */
	function wp_head() {

		global $post;

		if ( is_int( $post ) ) {
			$post = get_post( $post );
		}

		// Count only for singulars not published posts
		if ( wp_is_post_revision( $post ) || ! is_singular() ) {
			return;
		}

		if ( is_home() || is_front_page() ) {
			return;
		}

		// Count if no active cache plugin
		if ( ! $this->should_count() || ( defined( 'WP_CACHE' ) && WP_CACHE ) ) {
			return;
		}

		$this->increment_views( $post->ID );
	}


	/**
	 * Callback: Used to increment views count by ajax
	 *
	 * Ajax Action: better_post_views
	 */
	function increment_views_ajax() {

		if ( empty( $_REQUEST['better_post_views_id'] ) ) {
			die();
		}

		$post_id = intval( $_REQUEST['better_post_views_id'] );

		die( json_encode( array(
			'status' => 'succeed',
			'html'   => apply_filters( 'better-post-views/views/ajax', $post_id > 0 ? $this->increment_views( $post_id ) : '' ),
		) ) );
	}


	/**
	 * Increments views count
	 *
	 * @param int|string $post_id
	 *
	 * @return int|bool  false on failure or int if success
	 */
	function increment_views( $post_id ) {

		if ( is_int( $post_id ) ) {
			$post = get_post( $post_id );
		} else {
			global $post;
			$post = get_post( $post );
		}

		if ( ! $post instanceof WP_Post ) {
			return FALSE;
		}


		//
		// Just current day
		//

		// Get post current day view count
		if ( ! $current_day_views = get_post_meta( $post->ID, self::$meta_id_daily, TRUE ) ) {
			$current_day_views = 1;
		} else {
			$current_day_views += 1;
		}

		update_post_meta( $post->ID, self::$meta_id_daily, $current_day_views );

		//
		// Last 7 days views
		//

		// Stop counting if it's not enable to count 7days
		if ( ! $this->is_active( '7days' ) ) {
			return $current_day_views;
		}

		$current_day  = date( 'N' ) - 1;
		$current_date = date( 'U' );

		// Get views data of week
		$last_7day_data = get_post_meta( $post->ID, self::$meta_id_7days_data, TRUE );

		// Check to be initialized before or not
		if ( is_array( $last_7day_data ) && ! empty( $last_7day_data['current_date'] ) ) {

			$current_day_of_the_year   = date( 'z', $current_date );
			$last_7day_day_of_the_year = date( 'z', $last_7day_data['current_date'] );

			// The day was not changed since the last update
			if ( $last_7day_day_of_the_year == $current_day_of_the_year ) {
				$last_7day_data[ $current_day ]['views'] ++;
			} else {

				// Reset the current day to 1
				$last_7day_data[ $current_day ]['views'] = 1;

				// Set the current date
				$last_7day_data[ $current_day ]['date'] = $current_date;

				// Reset entries older than last 7 days
				$one_week_ago = $current_date - 604800;
				foreach ( $last_7day_data as $day => $day_data ) {

					// don't exclude current_date
					if ( $day == 'current_date' ) {
						continue;
					}

					if ( $day_data['date'] < $one_week_ago ) {
						unset( $last_7day_data[ $day ] ); // remove entry
					}
				}

			}

			// Update last day with the current day
			$last_7day_data['current_date'] = $current_date;

			// Sum the 7days total count
			$last_7day_sum = 0;
			foreach ( $last_7day_data as $day => $parameters ) {

				// don't exclude current_date
				if ( $day == 'current_date' ) {
					continue;
				}

				$last_7day_sum += $parameters['views'];

			}

		} // Initialize last 7 days data
		else {

			// base data
			$last_7day_data = array(
				'current_date' => $current_date
			);

			// Set current day and total last 7 days total views to 1
			$last_7day_sum = $last_7day_data[ $current_day ]['views'] = 1;

			// Set the current date
			$last_7day_data[ $current_day ]['date'] = $current_date;

		}

		// Update last 7 days data
		update_post_meta( $post->ID, self::$meta_id_7days_data, $last_7day_data );

		// Update last 7 days total views
		update_post_meta( $post->ID, self::$meta_id_7days_total, $last_7day_sum );

		return $current_day_views;

	}


	/**
	 * Handy function used to detect should count views for current page or not
	 *
	 * @return bool
	 */
	public static function should_count() {

		static $should_count;

		if ( ! is_null( $should_count ) ) {
			return $should_count;
		}

		global $user_ID;

		$should_count = FALSE;

		switch ( self::get_option( 'counts_for' ) ) {

			// Count for all users
			case 'everyone':
				$should_count = TRUE;
				break;

			// Count only for guest users ( non logged in users )
			case 'guest':
				if ( empty( $_COOKIE[ USER_COOKIE ] ) && intval( $user_ID ) === 0 ) {
					$should_count = TRUE;
				}
				break;

			// Count only for logged in users
			case 'registered':
				if ( intval( $user_ID ) > 0 ) {
					$should_count = TRUE;
				}
				break;

			// Count only for logged in subscriber users & guests
			case 'guest_registered':

				$should_count = FALSE;

				if ( empty( $_COOKIE[ USER_COOKIE ] ) && intval( $user_ID ) === 0 ) {
					$should_count = TRUE;
				} else {
					$should_count = current_user_can( 'subscriber' );
				}

				break;
		}


		// Count if this is bot!
		if ( self::get_option( 'exclude_bots' ) && bf_is_crawler() ) {
			$should_count = FALSE;
		}

		return $should_count;
	}


	/**
	 * Handy function to retrieve all identified bots list
	 *
	 * @return array
	 */
	function get_bots() {

		return array(
			'Google Bot'    => 'googlebot',
			'Google Bot2'   => 'google',
			'MSN'           => 'msnbot',
			'Alex'          => 'ia_archiver',
			'Lycos'         => 'lycos',
			'Ask Jeeves'    => 'jeeves',
			'Altavista'     => 'scooter',
			'AllTheWeb'     => 'fast-webcrawler',
			'Inktomi'       => 'slurp@inktomi',
			'Turnitin.com'  => 'turnitinbot',
			'Technorati'    => 'technorati',
			'Yahoo'         => 'yahoo',
			'Findexa'       => 'findexa',
			'NextLinks'     => 'findlinks',
			'Gais'          => 'gaisbo',
			'WiseNut'       => 'zyborg',
			'WhoisSource'   => 'surveybot',
			'Bloglines'     => 'bloglines',
			'BlogSearch'    => 'blogsearch',
			'PubSub'        => 'pubsub',
			'Syndic8'       => 'syndic8',
			'RadioUserland' => 'userland',
			'Gigabot'       => 'gigabot',
			'Become.com'    => 'become.com',
			'Baidu'         => 'baiduspider',
			'so.com'        => '360spider',
			'Sogou'         => 'spider',
			'soso.com'      => 'sosospider',
			'Yandex'        => 'yandex'
		);

	}


	/**
	 * Handy function to show post views count
	 *
	 * @param   bool   $echo     Echo  views count
	 * @param   string $prefix   Prefix text to views count text
	 * @param   string $postfix  Postfix text to views count text
	 * @param   string $display  Display it or not? Use "show", "hide" and "default"
	 * @param   string $template Custom template for result
	 *
	 * @return  string|integer
	 */
	public static function the_views( $echo = TRUE, $prefix = '', $postfix = '', $display = 'default', $template = '' ) {

		switch ( $display ) {

			// Force to show
			case 'show':
				$should_display = TRUE;
				break;

			// Force to hide
			case 'hide':
				$should_display = FALSE;
				break;

			default:
				$should_display = TRUE;

		}

		if ( $should_display ) {

			$output = self::get_views( get_the_ID(), $prefix, $postfix, $template );

			if ( $echo ) {
				echo $output;
			} else {
				return $output;
			}

		} elseif ( ! $echo ) {
			return '';
		}

		return '';
	}


	/**
	 * Used for getting raw text of views count without any filter
	 *
	 * @param int    $post_id  Post ID
	 * @param string $prefix   Counts result prefix
	 * @param string $postfix  Counts result postfix
	 * @param string $template Count result template
	 *
	 * @return string|integer
	 */
	public static function get_views( $post_id = 0, $prefix = '', $postfix = '', $template = '' ) {

		if ( $post_id === 0 ) {
			$post_id = get_the_ID();
		}

		if ( empty( $template ) ) {
			$template = self::get_option( 'views_template' );
		}

		// Get post view count
		if ( ! $post_views = get_post_meta( $post_id, self::$meta_id_daily, TRUE ) ) {
			$post_views = 0;
		}

		return apply_filters( 'better-post-views/views', $prefix . str_replace(
				array(
					'%VIEW_COUNT%',
					'%VIEW_COUNT_ROUNDED%'
				),
				array(
					number_format_i18n( $post_views ),
					self::format_number( $post_views )
				),
				stripslashes( $template )
			) . $postfix
		);

	}


	/**
	 * Used for getting raw count of views
	 *
	 * @param int $post_id Post ID
	 *
	 * @return int
	 */
	public static function get_views_count( $post_id = 0 ) {

		if ( $post_id === 0 ) {
			$post_id = get_the_ID();
		}

		// Get post view count
		if ( ! $post_views = get_post_meta( $post_id, self::$meta_id_daily, TRUE ) ) {
			$post_views = 0;
		}

		return $post_views;
	}


	/**
	 * Callback: display views count with shortcode
	 *
	 * Shortcode Callback: better-post-views
	 *
	 * @param $atts
	 *
	 * @return string|integer
	 */
	function views_shortcode( $atts ) {

		$attributes = shortcode_atts(
			array(
				'id'       => 0,
				'prefix'   => '',
				'postfix'  => '',
				'template' => '',
			),
			$atts
		);

		return self::get_views( $attributes['id'], $attributes['prefix'], $attributes['postfix'], $attributes['template'] );

	}


	/**
	 * Callback: Registers shortcode to BetterStudio Editor Shortcodes Plugin
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	public function register_shortcode_to_editor( $shortcodes ) {

		$_shortcodes = array();

		$_shortcodes[ 'sep' . rand( 0, 9999 ) ] = array(
			'type' => 'separator',
		);

		$_shortcodes['post-views'] = array(
			'type'     => 'menu',
			'label'    => __( 'Better Post Views', 'better-studio' ),
			'register' => FALSE,
			'items'    => array(

				'better-post-views1' => array(
					'type'     => 'button',
					'label'    => __( 'Post Views Count - Simple', 'better-studio' ),
					'register' => FALSE,
					'content'  => '[better-post-views]',
				),

				'better-post-views2' => array(
					'type'     => 'button',
					'label'    => __( 'Post Views Count - Complex', 'better-studio' ),
					'register' => FALSE,
					'content'  => '[better-post-views prefix="Prefix - " postfix=" - Postfix" template=" have %VIEW_COUNT% view "]',
				),

			)
		);

		return $shortcodes + $_shortcodes;
	}


	/**
	 * Format number to human friendly style
	 *
	 * @param $number
	 *
	 * @return string
	 */
	public static function format_number( $number ) {

		if ( ! is_numeric( $number ) ) {
			$number = intval( $number );
		}

		if ( $number >= 1000000 ) {
			return round( ( $number / 1000 ) / 1000, 1 ) . "M";
		} elseif ( $number >= 100000 ) {
			return round( $number / 1000, 0 ) . "k";
		} else {
			return number_format( $number );
		}

	}


	/**
	 * Callback: Used to adding views column to WP columns
	 *
	 * Filter Callback: manage_posts_columns
	 * Filter Callback: manage_pages_columns
	 *
	 * @param   $columns
	 *
	 * @return mixed
	 */
	function add_views_column( $columns ) {

		$columns['better-post-views'] = __( 'Views', 'better-studio' );

		return $columns;
	}


	/**
	 * Callback: Used to handling views column value
	 *
	 * Filter Callback: manage_posts_columns
	 * Filter Callback: manage_pages_columns
	 *
	 * @param   $column
	 *
	 * @return string|void
	 */
	function add_views_column_content( $column ) {

		if ( $column == 'better-post-views' ) {
			echo $this->get_views();
		}
	}


	/**
	 * Callback: Handel's admin sortable columns
	 *
	 * Filter: manage_edit-post_sortable_columns
	 * Filter: manage_edit-page_sortable_columns
	 *
	 * @param $query \WP_Query
	 */
	function handle_admin_sortable_columns( $query ) {

		$orderby = $query->get( 'orderby' );

		if ( 'better-post-views' == $orderby ) {
			$query->set( 'meta_key', self::$meta_id_daily );
			$query->set( 'orderby', 'meta_value_num' );
		}

	}


	/**
	 * Callback: Manages admin sortable columns
	 *
	 * Filter: manage_edit-post_sortable_columns
	 * Filter: manage_edit-page_sortable_columns
	 *
	 * @param $defaults
	 *
	 * @return mixed
	 */
	function manage_admin_sortable_columns( $defaults ) {

		$defaults['better-post-views'] = 'better-post-views';

		return $defaults;
	}


	/**
	 * Use to detect plugins are counting what type of data
	 *
	 * @param string $id ID for checking that type is active or not
	 *
	 * @return mixed
	 */
	function is_active( $id = '' ) {

		$count = self::get_option( 'count' );

		switch ( $id ) {

			case 'daily':
				return ( $count === '7days' || $count === $id ) ? TRUE : FALSE;

			case '7days':
				return $count === $id;
				break;

		}

		return FALSE;
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

		if ( $type_dir === 'plugins' && $product_dir === 'better-post-views' ) {
			return FALSE;
		}

		return $bool;
	}


	/**
	 * Callback: Used for adding JS and CSS files to page
	 *
	 * Action: admin_enqueue_scripts
	 */
	function admin_enqueue_scripts() {

		bf_enqueue_style(
			'better-post-views',
			bf_append_suffix( self::dir_url( 'css/admin' ), '.css' ),
			array(),
			bf_append_suffix( self::dir_path( 'css/admin' ), '.css' ),
			Better_Post_Views::$version
		);

	}


	/**
	 * Counts amp post views views
	 */
	function amp_pixel_for_views() {

		if ( ! is_singular() ) {
			return;
		}

		echo '<amp-pixel src="' . admin_url( 'admin-ajax.php?action=better_post_views&better_post_views_id=' . get_the_ID() ) . '" layout="nodisplay"></amp-pixel>';
	}

}
