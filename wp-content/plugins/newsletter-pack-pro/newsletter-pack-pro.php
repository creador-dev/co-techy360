<?php
/*
Plugin Name: Newsletter Pack Pro
Plugin URI: http://betterstudio.com
Description: Show and manage newsletters easily.
Version: 1.2.1
Author: BetterStudio
Author URI: http://betterstudio.com
License:
*/

/***
 *   _   _                   _      _   _             ______          _
 *  | \ | |                 | |    | | | |            | ___ \        | |
 *  |  \| | _____      _____| | ___| |_| |_ ___ _ __  | |_/ /_ _  ___| | __
 *  | . ` |/ _ \ \ /\ / / __| |/ _ \ __| __/ _ \ '__| |  __/ _` |/ __| |/ /
 *  | |\  |  __/\ V  V /\__ \ |  __/ |_| ||  __/ |    | | | (_| | (__|   <
 *  \_| \_/\___| \_/\_/ |___/_|\___|\__|\__\___|_|    \_|  \__,_|\___|_|\_\
 *
 * \--> BetterStudio, 2017 <--/
 *
 * Thanks for using our plugin!
 *
 * Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 */


/**
 * BS_Newsletter_Pack class wrapper for make changes safe in future
 *
 * @return BS_Newsletter_Pack_Pro
 */
function BS_Newsletter_Pack_Pro() {

	return BS_Newsletter_Pack_Pro::self();
}


// Initialize Newsletter Pack
BS_Newsletter_Pack_Pro();


/**
 * Class BS_Newsletter_Pack
 */
class BS_Newsletter_Pack_Pro {


	/**
	 * Contains plugin version number that used for assets for preventing cache mechanism
	 *
	 * @var string
	 */
	private static $version = '1.2.1';


	/**
	 * Contains plugin option panel ID
	 *
	 * @var string
	 */
	public static $panel_id = 'bs-newsletter-pack';


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 * Plugin initialize
	 */
	function __construct() {

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

		// Activate and add new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 100 );

		// Initialize after bf init
		add_action( 'better-framework/after_setup', array( $this, 'bf_init' ) );

		// Do some stuff after WP init
		add_action( 'init', array( $this, 'init' ) );

		// Includes BF loader if not included before
		require_once $this->dir_path( '/includes/libs/bf/init.php' );

		// Ads plugin textdomain
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		// Ajax callback for rebuilding image from front end
		add_action( 'wp_ajax_nopriv_bsnp_manager_blocked_fallback', array( $this, 'callback_blocked_ads' ) );
		add_action( 'wp_ajax_bsnp_manager_blocked_fallback', array( $this, 'callback_blocked_ads' ) );

		add_filter( 'better-framework/oculus/logger/turn-off', array( $this, 'oculus_logger' ), 22, 3 );

		// Add custom items to editor shortcodes menu
		add_filter( 'better-framework/editor-shortcodes/shortcodes-array', 'BS_Newsletter_Pack_Pro::inject_editor_shortcode_menu_items', 15, 2 );
	}


	/**
	 * Load plugin textdomain.
	 *
	 * @since 1.0.0
	 */
	function load_textdomain() {

		load_plugin_textdomain( 'better-studio', false, 'newsletter-pack/languages' );
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
	 * @return  BS_Newsletter_Pack_Pro|null
	 */
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main BS_Newsletter_Pack Class
			 */
			case 'self':
				$class = 'BS_Newsletter_Pack_Pro';
				break;

			default:
				return null;
		}


		// Just prepare/includes files
		if ( $just_include ) {
			return null;
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
	 * @return BS_Newsletter_Pack_Pro
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
			'version' => '3.10.14',
			'path'    => $this->dir_path( 'includes/libs/bf/' ),
			'uri'     => $this->dir_url( 'includes/libs/bf/' ),
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

		$features['admin_panel']      = true;
		$features['meta_box']         = true;
		$features['minify']           = true;
		$features['content-injector'] = true;

		return $features;
	}


	/**
	 *  Init the plugin
	 */
	function bf_init() {

		// Enqueue assets
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts' ) );

		// Enqueue admin assets
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		// Post newsletter's
		add_action( 'the_content', array( $this, 'setup_post_content_newsletter' ), 5 );

		// Adds custom columns for newsletters
		if ( is_admin() && ! bf_is_doing_ajax() ) {
			add_filter( 'manage_edit-bsnp-newsletter_columns', array( $this, 'newsletter_columns' ) );
			add_action( 'manage_bsnp-newsletter_posts_custom_column', array(
				$this,
				'newsletter_columns_content'
			), 10, 2 );
			add_action( 'admin_head', array( $this, 'admin_styles' ) );
		}

		// used to collect and finalize newsletter data for performance improvement.
		add_action( 'save_post', array( $this, 'save_newsletter_post' ), 10, 3 );

	}


	/**
	 * Callback: Used for registering scripts and styles
	 *
	 * Action: enqueue_scripts
	 */
	function enqueue_scripts() {

		bf_enqueue_style(
			'newsletter-pack',
			bf_append_suffix( self::dir_url() . 'css/newsletter-pack', '.css' ),
			array(),
			bf_append_suffix( self::dir_path() . 'css/newsletter-pack', '.css' ),
			BS_Newsletter_Pack_Pro::$version
		);

		if ( is_rtl() ) {
			bf_enqueue_style(
				'newsletter-pack-rtl',
				bf_append_suffix( self::dir_url() . 'css/newsletter-pack.rtl', '.css' ),
				array(),
				bf_append_suffix( self::dir_path() . 'css/newsletter-pack.rtl', '.css' ),
				BS_Newsletter_Pack_Pro::$version
			);
		}
	}


	/**
	 * Callback: Used for adding JS and CSS files to page
	 *
	 * Action: admin_enqueue_scripts
	 */
	function admin_enqueue_scripts() {

		bf_enqueue_style(
			'newsletter-pack',
			bf_append_suffix( self::dir_url() . 'css/newsletter-pack-admin', '.css' ),
			array(),
			bf_append_suffix( self::dir_path() . 'css/newsletter-pack-admin', '.css' ),
			BS_Newsletter_Pack_Pro::$version
		);

	}


	/**
	 * Get Newsletters
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	public static function query_newsletters( $extra = array() ) {

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
		$extra = bf_merge_args( $extra, array(
			'post_type'      => array( 'bsnp-newsletter' ),
			'posts_per_page' => - 1,
		) );

		$output = array();

		$query = get_posts( $extra );

		foreach ( $query as $post ) {
			$output[ $post->ID ] = $post->post_title;
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
		// Newsletter post type
		//
		$labels = array(
			'name'               => _x( 'Newsletters', 'post type general name', 'better-studio' ),
			'singular_name'      => _x( 'Newsletter', 'post type singular name', 'better-studio' ),
			'menu_name'          => _x( 'Newsletters', 'admin menu', 'better-studio' ),
			'name_admin_bar'     => _x( 'Newsletters', 'add new on admin bar', 'better-studio' ),
			'add_new'            => _x( 'Add New Newsletter', 'campaign', 'better-studio' ),
			'add_new_item'       => __( 'Add New Newsletter', 'better-studio' ),
			'new_item'           => __( 'New Newsletter', 'better-studio' ),
			'edit_item'          => __( 'Edit Newsletter', 'better-studio' ),
			'view_item'          => __( 'View Newsletter', 'better-studio' ),
			'all_items'          => __( 'Newsletter Forms', 'better-studio' ),
			'search_items'       => __( 'Search Newsletter', 'better-studio' ),
			'not_found'          => __( 'No Newsletter found.', 'better-studio' ),
			'not_found_in_trash' => __( 'No Newsletter found in Trash.', 'better-studio' )
		);

		$args = array(
			'public'              => false,
			'labels'              => $labels,
			'show_in_menu'        => 'better-studio/newsletter-pack',
			'show_ui'             => true,
			'supports'            => array( 'title' ),
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
		);

		register_post_type( 'bsnp-newsletter', $args );

	}


	/**
	 * Setups Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return mixed
	 */
	function setup_shortcodes( $shortcodes ) {

		require_once $this->dir_path( 'includes/shortcodes/class-bs-newsletter-pack-shortcode.php' );
		require_once $this->dir_path( 'includes/widgets/class-bs-newsletter-pack-widget.php' );

		$shortcodes['newsletter-pack'] = array(
			'shortcode_class' => 'BS_Newsletter_Pack_Shortcode',
			'widget_class'    => 'BS_Newsletter_Pack_Widget',
		);

		return $shortcodes;
	}


	/**
	 * Used for showing newsletter
	 *
	 * @param $newsletter_data
	 *
	 * @return string
	 */
	function show_newsletter( $newsletter_data ) {

		$show_error = true;

		if ( isset( $newsletter_data['show-error'] ) ) {
			$show_error = $newsletter_data['show-error'];
		}

		$output = '';

		if ( ! empty( $newsletter_data['title'] ) && bf_get_current_sidebar() === '' ) {
			$title = apply_filters( 'better-framework/shortcodes/title', $newsletter_data );

			if ( is_string( $title ) ) {
				$output .= $title;
			}
		}


		if ( empty( $newsletter_data['newsletter'] ) ) {

			if ( $show_error && is_user_logged_in() ) {
				return '<div class="bsnp-empty-note">' . __( 'Please select an newsletter.', 'better-studio' ) . '</div>';
			} else {
				return '';
			}
		} else {

			// ads css class, it comes from VC design option
			if ( ( $css_class = bf_shortcode_custom_css_class( $newsletter_data ) ) != '' ) {
				if ( ! empty( $newsletter_data['css-class'] ) ) {
					$newsletter_data['css-class'] .= ' ' . $css_class;
				} else {
					$newsletter_data['css-class'] = $css_class;
				}
			}
		}


		{
			$_fields_list = array(
				'custom-css-class',
				'css-class',
				'css',
				'custom-id',
				'css-code',
				'title',
				'show_title',
				'icon',
				'heading_style',
				'heading_color',
			);

			foreach ( $_fields_list as $field ) {

				if ( ! isset( $newsletter_data[ $field ] ) ) {
					continue;
				}

				if ( ! empty( $newsletter_data['newsletter-data'][ $field ] ) ) {
					$newsletter_data['newsletter-data'][ $field ] .= $newsletter_data[ $field ];
				} else {
					$newsletter_data['newsletter-data'][ $field ] = $newsletter_data[ $field ];
				}
			}
		}


		// args of newsletter
		$args = array();

		// Custom args for ads from outside
		if ( isset( $newsletter_data['newsletter-custom-config'] ) ) {
			$args = array_merge( $args, $newsletter_data['newsletter-custom-config'] );
		}

		return $this->show_newsletter_by_data( $newsletter_data['newsletter-data'], $args );
	}


	/**
	 * Handy function used for showing newsletter from data
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	private function show_newsletter_by_data( $atts = array() ) {

		$output = '';

		// check newsletter state
		if ( empty( $atts['active-newsletter'] ) ) {

			if ( bf_is_user_logged_in() ) {
				return '<div class="bsnp-empty-note">' . __( 'Newsletter configuration is not correct.', 'better-studio' ) . '</div>';
			} else {
				return $output;
			}
		}

		// default style type
		if ( ! isset( $atts['style-type'] ) ) {
			if ( bf_get_current_sidebar() ) {
				$atts['style-type'] = 'widget';
			} else {
				$atts['style-type'] = 'wide';
			}
		}

		// include view template
		ob_start();

		include BS_Newsletter_Pack_Pro::dir_path( "templates/{$atts['style']}.php" );

		$newsletter_code = ob_get_clean();

		return $newsletter_code;

	}


	/**
	 * Used for adding inline ads to post content in frond end
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	function setup_post_content_newsletter( $content = '' ) {

		// Add post ads only 1 time
		if ( bf_is_doing_ajax() ) {
			static $initialized;

			if ( $initialized ) {
				return $content;
			} else {
				$initialized = true;
			}
		}

		if ( is_feed() || bf_is_doing_ajax() || ! is_singular( 'post' ) ) {
			return $content;
		}

		// Don't convert to custom gallery in FIA
		if ( bf_is_fia() ) {
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
		if ( bf_get_post_meta( 'bsnp_disable_all' ) ) {
			return $content;
		}


		//
		// Newsletter locations
		//
		$locations = array(
			'post_top'    => array(
				'type'            => 'before',
				'container-class' => 'bsnp-post-top',
				'add-align'       => true,
			),
			'post_inline' => array(
				'type'            => 'paragraph',
				'container-class' => 'bsnp-post-inline',
				'add-align'       => true,
				'multiple'        => true,
			),
			'post_middle' => array(
				'type'            => 'middle',
				'container-class' => 'bsnp-post-middle',
				'add-align'       => true,
			),
			'post_bottom' => array(
				'type'            => 'after',
				'container-class' => 'bsnp-post-bottom',
				'add-align'       => true,
			),
		);


		foreach ( $locations as $k => $v ) {

			$data = array();

			if ( ! empty( $v['multiple'] ) ) {
				$data = bsnp_get_location_data( $k, true, array(
					'align'     => 'left',
					'paragraph' => 3,
				) );
			} else {
				$data[] = bsnp_get_location_data( $k, false, array(
					'align'     => 'left',
					'paragraph' => 3,
				) );
			}

			foreach ( $data as $ad_item_k => $ad_item ) {

				if ( empty( $ad_item['active_location'] ) || empty( $ad_item['newsletter-data']['active-newsletter'] ) ) {
					continue;
				}

				if ( empty( $ad_item['align'] ) ) {
					$ad_item['align'] = 'left';
				}

				$ad_item['newsletter-data']['css-class']  = 'bsnp-float-' . $ad_item['align'];
				$ad_item['newsletter-data']['style-type'] = 'inline';

				// Position of newsletter
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
					'content'  => $this->show_newsletter( $ad_item ),
					'config'   => 'newsletter-pack',
				) );

			} // foreach items

		} // foreach locations


		if ( $block_elements = self::get_option( 'html_block_tags' ) ) {
			bf_content_inject_config( 'newsletter-pack', array(
				'blocks_elements' => explode( ',', $block_elements ),
			) );
		}

		return $content;
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

		if ( $type_dir === 'plugins' && $product_dir === 'newsletter-pack' ) {
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
	function newsletter_columns( $columns ) {

		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'title'     => __( 'Newsletter Name', 'better-studio' ),
			'type'      => __( 'Type', 'better-studio' ),
			'shortcode' => __( 'Shortcode', 'better-studio' ),
			'date'      => __( 'Date', 'better-studio' )
		);

		return $columns;
	}


	/**
	 * Content of columns
	 *
	 * @param $column
	 * @param $post_id
	 */
	function newsletter_columns_content( $column, $post_id ) {

		switch ( $column ) {

			case 'shortcode' :

				$newsletter_data = bsnp_get_newsletter_data( $post_id );

				if ( isset( $newsletter_data['active-newsletter'] ) ) {
					if ( empty( $newsletter_data['active-newsletter'] ) ) {
						echo '<strong class="bsnp-shortcode-empty">' . __( 'Configuration is not correct.', 'better-studio' ) . '</strong>';
					} else {
						echo '<strong class="bsnp-shortcode-copy">' . "[newsletter-pack newsletter='$post_id']" . '</strong>';
					}
				}

				break;

			case 'type' :

				$newsletter_data = bsnp_get_newsletter_data( $post_id );

				if ( isset( $newsletter_data['type'] ) ) {
					if ( $newsletter_data['type'] == 'mailchimp' ) {
						echo '<strong class="bsnp-newsletter-type bsnp-newsletter-type-mailchimp">' . __( 'Milchimp', 'better-studio' ) . '</strong>';
					} elseif ( $newsletter_data['type'] == 'feedburner' ) {
						echo '<strong class="bsnp-newsletter-type bsnp-newsletter-type-feedburner">' . __( 'Feedburner', 'better-studio' ) . '</strong>';
					} elseif ( $newsletter_data['type'] == 'mailerlite' ) {
						echo '<strong class="bsnp-newsletter-type bsnp-newsletter-type-mailerlite">' . __( 'MailerLite', 'better-studio' ) . '</strong>';
					} else {
						echo '<strong class="bsnp-newsletter-type bsnp-newsletter-type-unknown">' . __( 'Unknown', 'better-studio' ) . '</strong>';
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
			#adminmenu li#toplevel_page_better-studio-newsletter-pack,
			#adminmenu .toplevel_page_better-amp-translation {
				margin-top: 10px;
				margin-bottom: 10px;
			}

			#adminmenu li[id^="toplevel_page_better-studio"] + li#toplevel_page_better-studio-newsletter-pack,
			#adminmenu li[id^="toplevel_page_better-studio"] + .toplevel_page_better-amp-translation {
				margin-top: -10px;
				margin-bottom: 10px;
			}
		</style>
		<?php
	}


	/**
	 * Caches newsletter data while saving
	 *
	 * @param $post_id
	 * @param $post
	 * @param $update
	 */
	function save_newsletter_post( $post_id, $post, $update ) {

		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		$post_type = get_post_type( $post_id );

		// IS newsletter post?
		if ( 'bsnp-newsletter' != $post_type ) {
			return;
		}

		// collect final data
		$newsletter_data = bsnp_fetch_newsletter_data( $post_id );

		// cache it
		update_post_meta( $post_id, 'newsletter-data-cache', $newsletter_data );
	}


	/**
	 * Adds theme custom items into editor shortcode menu
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	public static function inject_editor_shortcode_menu_items( $shortcodes = array() ) {

		$shortcodes['newsletter-pack'] = array(
			'type'     => 'button',
			'label'    => __( 'Newsletter Pack', 'better-studio' ),
			'callback' => 'newsletterPack',
			'register' => false,
			'content'  => '[newsletter-pack]'
		);

		return $shortcodes;
	} // inject_editor_shortcode_menu_items

}
