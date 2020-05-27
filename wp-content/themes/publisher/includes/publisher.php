<?php
/**
 * publisher.php
 *---------------------------
 * The Publisher class that handles main functionality of theme.
 *
 */


/**
 * Publisher Theme Class
 */
class Publisher {

	/**
	 * Inner array of objects live instances like generator
	 *
	 * @var array
	 */
	protected static $instances = array();

	/**
	 * Store post thumbnail ID
	 *
	 * @var int
	 * @since 1.8.0
	 */
	public static $featured_image_ID = 0;


	/**
	 *
	 */
	function __construct() {

		// Performs the Bf setup
		add_action( 'better-framework/after_setup', array( $this, 'theme_init' ) );

		// Clears BF caches
		add_action( 'after_switch_theme', array( $this, 'after_theme_switch' ) );
		add_action( 'switch_theme', array( $this, 'theme_switch' ) );

		add_action( 'wp_ajax_ajax-get-post', array( $this, 'handle_ajaxified_load_post' ) );
		add_action( 'wp_ajax_nopriv_ajax-get-post', array( $this, 'handle_ajaxified_load_post' ) );

		/**
		 * Fix for Better AMP Auto update
		 */
		if ( class_exists( 'Better_AMP' ) ) {
			$is_bundled_plugin = ! defined( 'BETTER_AMP_INC' ); // is old better amp plugin?

			if ( $is_bundled_plugin ) {
				add_filter( 'plugins_update_check_locales', array( $this, 'enable_wp2update_better_amp' ), 1 );
			}
		}

		// Setup continue reading
		add_action( 'template_redirect', 'Publisher::init_continue_reading' );
		add_action( 'template_redirect', 'Publisher::handle_ajaxified_load_post_template_redirect', 99 );

		// Active and new shortcodes
		add_filter( 'better-framework/shortcodes/heading-fields', array( $this, 'heading_fields' ), 10, 2 );

		// Gutenberg compatibility
		add_filter( 'better-framework/gutenberg/block-type-args', array(
			$this,
			'gutenberg_block_editor_assets'
		), 12, 2 );

	} // __construct


	/**
	 * Callback: delete cache and temp data after theme disabled
	 * action  : switch_theme
	 */
	public function theme_switch() {

		$this->after_theme_switch();

		// Remove theme notices after publisher disabled
		if ( $notices = Better_Framework()->admin_notices()->get_notices() ) {
			delete_option( 'bs-require-plugin-install' );

			foreach ( $notices as $idx => $notice ) {
				if ( isset( $notice['product'] ) && $notice['product'] === 'theme:publisher' ) {
					unset( $notices[ $idx ] );
				}
			}
			Better_Framework()->admin_notices()->set_notices( $notices );
		}
	}


	/**
	 * clears last BF caches for avoiding conflict
	 */
	function after_theme_switch() {

		// Clears BF transients for preventing of happening any problem
		delete_transient( '__better_framework__widgets_css' );
		delete_transient( '__better_framework__panel_css' );
		delete_transient( '__better_framework__menu_css' );
		delete_transient( '__better_framework__terms_css' );
		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );
		delete_transient( '__better_framework__backend_css' );

		// Delete all pages css transients
		global $wpdb;
		$wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE meta_key LIKE %s", '_bf_post_css_%' ) );

	} // after_theme_switch


	/**
	 * Handy trick to simplify the ajax load post template to a simple template for improving the speed.
	 */
	public static function handle_ajaxified_load_post_template_redirect() {

		if ( is_single() && ! empty( $_GET['ajax_related_post'] ) ) {
			publisher_the_post();
			// Prints content with layout that is selected in panels.
			// Location: "views/general/post/style-*.php"
			publisher_get_view( 'post', 'content-ajax' );
			exit();
		}
	}


	/**
	 * Ajax callback for printing the data of ajax load post
	 */
	public function handle_ajaxified_load_post() {

		global $withcomments;

		if ( empty( $_REQUEST['post_ID'] ) ) {
			return;
		}
		define( 'PUBLISHER_THEME_AJAXIFIED_LOAD_POST', true );
		$post_id = intval( $_REQUEST['post_ID'] );

		$type = bf_get_post_meta( 'post_related_type', $post_id );
		if ( $type === 'default' || ! $type ) {
			$type = publisher_get_option( 'post_related_type' );
		}

		$query_args = array(); // Extra query args
		if ( $type === 'custom-keyword' ) { // Handle related posts custom query feature
			if ( $custom_query = bf_get_post_meta( 'post_related_keyword', $post_id ) ) {
				$query_args['s'] = $custom_query;
			}
		}

		$posts_count = bf_get_post_meta( 'ajaxified_related_count', $post_id );
		if ( $posts_count === 'default' || ! $posts_count ) {
			$posts_count = publisher_get_option( 'ajaxified_related_count' );
		}

		$posts_offset = bf_get_post_meta( 'ajaxified_related_offset', $post_id );
		if ( $posts_offset === 'default' || $posts_offset === '' ) {
			$posts_offset = publisher_get_option( 'ajaxified_related_offset' );
		}

		if ( $posts_offset ) {
			$query_args['offset'] = $posts_offset;
		}

		$related_args = publisher_get_related_posts_args( $posts_count, $type, $post_id, $query_args );
		$withcomments = true; // enable display post comments

		if ( ! isset( $related_args['post__not_in'] ) ) {
			$related_args['post__not_in'] = array();
		}
		if ( ! empty( $_REQUEST['loaded_posts'] ) && is_array( $_REQUEST['loaded_posts'] ) ) {
			$related_args['post__not_in'] = array_merge(
				$related_args['post__not_in'],
				$_REQUEST['loaded_posts']
			);
			$related_args['post__not_in'] = array_unique( $related_args['post__not_in'] );
		}

		$related_args['post_status'] = 'publish';

		$query = new WP_Query( $related_args );

		publisher_set_query( $query );

		$loaded_posts = array();
		if ( publisher_have_posts() ) {
			$update_post_view = false;
			if ( function_exists( 'Better_Post_Views' ) ) {
				$post_view_cb     = array( Better_Post_Views(), 'increment_views' );
				$update_post_view = is_callable( $post_view_cb );
			}

			$posts_info = array();

			ob_start();
			while( publisher_have_posts() ) {
				publisher_the_post();

				$current_post_ID = get_the_ID();
				$loaded_posts[]  = $current_post_ID;
				$posts_info[]    = array(
					'id'    => $current_post_ID,
					'title' => get_the_title(),
					'link'  => is_ssl() ? set_url_scheme( get_the_permalink(), 'https' ) : get_the_permalink(),
				);

				if ( $update_post_view ) {
					call_user_func( $post_view_cb, $current_post_ID );
				}

				// Handy trick for making sure the_content is working for all plugins
				// because the_content is not working properly in third-party plugins because
				// they are using conditional tags like is_single and all of functions are not working in the
				// ajax calls so we are trying to fetch that posts by making a real request for that post.
				{
					$link   = add_query_arg( 'ajax_related_post', '1', get_the_permalink() );
					$remote = wp_remote_get( $link );

					// validate the ajax call data ba searching for the single-container in the returned
					// if not found means there is a problem!
					if ( wp_remote_retrieve_response_code( $remote ) == 200 && stripos( wp_remote_retrieve_body( $remote ), 'single-container' ) ) {
						echo wp_remote_retrieve_body( $remote );
					} else {
						publisher_get_view( 'post', 'content-ajax', 'default' );
					}
				}

				//
				// Fix inner posts queries
				// the_content filters that uses publisher_set_query()
				publisher_set_query( $query );
			}
			$output = ob_get_clean();
		} else {
			$output = false;
		}

		die( json_encode( array(
			'rawHTML'      => $output,
			'haveNext'     => intval( $query->found_posts ) > 1,
			'loaded_posts' => $loaded_posts,
			'posts_info'   => $posts_info,
		) ) );

	} // handle_ajaxified_load_post


	public function gutenberg_block_editor_assets( $args, $shortcode ) {

		if ( substr( $shortcode, 0, 3 ) === 'bs-' ) {  // is publisher shortcode ?
			$args['editor_style']  = 'gutenberg';
			$args['editor_script'] = 'publisher';
		}

		return $args;
	}


	/**
	 * Initialize theme
	 */
	function theme_init() {

		// Init VC
		if ( function_exists( 'vc_set_as_theme' ) ) {
			$this->initialize_vc_support();
		}


		/*
		 * Enqueue assets (css, js)
		 */

		if ( is_user_logged_in() && function_exists( 'vc_is_inline' ) && vc_is_inline() && 'vc_inline' === vc_action() ) {
			add_action( 'vc_frontend_editor_render_template', 'Publisher::print_vc_frontend_edit_script' );
		}

		// Frontend
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 11 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 11 );

		// Editor
		add_action( 'enqueue_block_editor_assets', array( $this, 'register_assets' ), 11 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_assets' ), 11 );

		remove_action( 'wp_head', 'locale_stylesheet' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Featured images settings
		 */
		add_theme_support( 'post-thumbnails' ); // 150x150
		// rectangles
		add_image_size( 'publisher-tb1', 86, 64, array( 'center', 'center' ) );
		add_image_size( 'publisher-sm', 210, 136, array( 'center', 'center' ) );  // Main Post Image In Full Width
		add_image_size( 'publisher-mg2', 279, 220, array( 'center', 'center' ) );
		add_image_size( 'publisher-md', 357, 210, array( 'center', 'center' ) );  // Main Post Image In Full Width
		add_image_size( 'publisher-lg', 750, 430, array( 'center', 'center' ) );
		// full
		add_image_size( 'publisher-full', 1130, 580, array( 'center', 'center' ) );  // Main Post Image In Full Width
		// tall
		add_image_size( 'publisher-tall-sm', 180, 217, array( 'center', 'center' ) );
		add_image_size( 'publisher-tall-lg', 267, 322, array( 'center', 'center' ) );
		add_image_size( 'publisher-tall-big', 368, 445, array( 'center', 'center' ) );


		/*
		 * Ads theme image sizes to media uploader
		 */
		add_filter( 'image_size_names_choose', array( $this, 'add_image_size_names_choose' ) );


		/*
		 * Post formats ( All )
		 */
		add_theme_support( 'post-formats', array(
			'video',
			'gallery',
			'audio',
			'aside',
			'image',
			'quote',
			'status',
			'chat',
			'link'
		) );

		/*
		 * This feature enables post and comment RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Register menus
		 */
		register_nav_menu( 'main-menu', __( 'Main Navigation', 'publisher' ) );
		register_nav_menu( 'resp-menu', __( 'Responsive Navigation', 'publisher' ) );
		register_nav_menu( 'top-menu', __( 'Topbar Menu', 'publisher' ) );
		register_nav_menu( 'footer-menu', __( 'Footer Menu', 'publisher' ) );
		register_nav_menu( 'off-canvas-menu', __( 'Off-Canvas Navigation', 'publisher' ) );

		// Sets the content width in pixels, based on the theme's design and stylesheet.
		$GLOBALS['content_width'] = 1170;

		// Implements editor styling
		add_editor_style();

		// Add filters to generating custom menus
		add_filter( 'better-framework/menu/mega/end_lvl', array( $this, 'generate_better_menu' ) );

		// enqueue in header
		add_action( 'wp_head', array( $this, 'wp_head' ) );

		// favicon
		add_action( 'admin_head', array( $this, 'print_favicon' ) );
		add_action( 'wp_head', array( $this, 'print_favicon' ) );

		// enqueue in footer
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );

		// add custom classes to body
		add_filter( 'body_class', array( $this, 'filter_body_class' ) );
		add_filter( 'admin_body_class', array( $this, 'filter_admin_body_class' ) );

		// Enqueue admin scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ), 120 );

		// Used for adding order by rand to WP_User_Query
		add_action( 'pre_user_query', array( $this, 'action_pre_user_query' ) );

		/*
		 * Register Sidebars
		 */
		register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'publisher' ),
			'id'            => 'primary-sidebar',
			'description'   => __( 'Widgets in this area will be shown in the default sidebar.', 'publisher' ),
			'before_title'  => '<div class="section-heading"><span class="h-text">',
			'after_title'   => '</span></div>',
			'before_widget' => '<div id="%1$s" class="primary-sidebar-widget widget %2$s">',
			'after_widget'  => '</div>'
		) );
		register_sidebar( array(
			'name'          => __( 'Secondary Sidebar', 'publisher' ),
			'id'            => 'secondary-sidebar',
			'description'   => __( 'Widgets in this area will be shown in the secondary small sidebar.', 'publisher' ),
			'before_title'  => '<div class="section-heading"><span class="h-text">',
			'after_title'   => '</span></div>',
			'before_widget' => '<div id="%1$s" class="secondary-sidebar-widget widget %2$s">',
			'after_widget'  => '</div>'
		) );

		// Footer Larger Sidebars
		register_sidebar( array(
			'name'          => __( 'Footer - Column 1', 'publisher' ),
			'id'            => 'footer-1',
			'description'   => __( 'Widgets in this area will be shown in the footer column 1.', 'publisher' ),
			'before_title'  => '<div class="section-heading"><span class="h-text">',
			'after_title'   => '</span></div>',
			'before_widget' => '<div id="%1$s" class="footer-widget footer-column-1 widget %2$s">',
			'after_widget'  => '</div>'
		) );
		register_sidebar( array(
			'name'          => __( 'Footer - Column 2', 'publisher' ),
			'id'            => 'footer-2',
			'description'   => __( 'Widgets in this area will be shown in the footer column 2.', 'publisher' ),
			'before_title'  => '<div class="section-heading"><span class="h-text">',
			'after_title'   => '</span></div>',
			'before_widget' => '<div id="%1$s" class="footer-widget footer-column-2 widget %2$s">',
			'after_widget'  => '</div>'
		) );
		register_sidebar( array(
			'name'          => __( 'Footer - Column 3', 'publisher' ),
			'id'            => 'footer-3',
			'description'   => __( 'Widgets in this area will be shown in the footer column 3.', 'publisher' ),
			'before_title'  => '<div class="section-heading"><span class="h-text">',
			'after_title'   => '</span></div>',
			'before_widget' => '<div id="%1$s" class="footer-widget footer-column-3 widget %2$s">',
			'after_widget'  => '</div>'
		) );
		register_sidebar( array(
			'name'          => __( 'Footer - Column 4', 'publisher' ),
			'id'            => 'footer-4',
			'description'   => __( 'Widgets in this area will be shown in the footer column 4.', 'publisher' ),
			'before_title'  => '<div class="section-heading"><span class="h-text">',
			'after_title'   => '</span></div>',
			'before_widget' => '<div id="%1$s" class="footer-widget footer-column-4 widget %2$s">',
			'after_widget'  => '</div>'
		) );

		// Filter WP_Query
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );


		// Compatibility with Better Post Views
		add_filter( 'better-post-views/views/ajax', array( $this, 'better_post_views_ajax' ) );

		// Control post advanced fields
		if ( publisher_get_option( 'advanced_post_fields_excerpt' ) == false || publisher_get_option( 'advanced_post_fields_subtitle' ) == false ) {
			add_filter( 'publisher-theme-core/post-fields/config', array(
				$this,
				'customize_post_advanced_fields'
			), 20 );
		}


		// Config BF JSON-LD
		add_filter( 'better-framework/json-ld/config', 'Publisher::config_json_ld' );

		// Config social meta tags generator
		add_filter( 'publisher-theme-core/social-meta-tags/config', 'Publisher::social_meta_tag' );

		// Permalink type for share
		add_filter( 'better-framework/share/permalink/type', 'Publisher::share_permalink_type' );

		// Setup inline related post feature
		if ( bf_is_doing_ajax( 'ajax-get-post' ) ) {
			Publisher::init_inline_related_posts();
		} else {
			add_action( 'template_redirect', 'Publisher::init_inline_related_posts' );
		}

		// Redirect to custom 404 page if is set
		if ( publisher_get_option( 'archive_404_custom' ) !== 'default' && publisher_get_option( 'archive_404_custom' ) != '' ) {
			add_filter( '404_template', 'Publisher::custom_404_template' );
		}

		// config for Facebook APP
		add_filter( 'better-framework/api/token/facebook', 'Publisher::facebook_app_config' );

		// config admin notices
		add_filter( 'better-framework/admin-notices/new', 'Publisher::customize_admin_notices' );

		// Add filter for generating post thumbnail for rss feeds
		add_filter( 'the_excerpt_rss', array( $this, 'add_thumbnail_to_rss' ) );
		add_filter( 'the_content_feed', array( $this, 'add_thumbnail_to_rss' ) );

		// add more codes to BF custom generated CSS
		add_filter( 'better-framework/css/final', array( $this, 'bf_final_front_end_css' ) );

	} // theme_init


	/**
	 * Appends dynamic css codes to the final generated CSS code of BF.
	 *
	 * @param $css
	 *
	 * @return mixed
	 */
	function bf_final_front_end_css( $css ) {

		/**
		 * The custom css codes for Better Ads Manager.
		 * the CSS class need to be updated to the latest css class because that is dynamic to prevent AdBlockers to detect BAM
		 */
		{
			ob_start();
			include bf_append_suffix( PUBLISHER_THEME_PATH . 'css/bam-dynamic', '.css' );
			$code = ob_get_clean();

			// Make it the BAM dynamic class friendly
			if ( BAM_PREFIX != 'bsac' ) {
				$code = str_replace( 'bsac', BAM_PREFIX, $code );
			}

			if ( ! empty( $css['css'] ) ) {
				$css['css'] .= $code;
			}
		}

		return $css;
	}


	/**
	 * Register css and js files
	 */
	public function register_assets() {

		// All Publisher js dependencies
		bf_register_script(
			'theme-libs',
			bf_append_suffix( PUBLISHER_THEME_URI . 'js/theme-libs', '.js' ),
			array( 'jquery' ),
			bf_append_suffix( PUBLISHER_THEME_PATH . 'js/theme-libs', '.js' ),
			PUBLISHER_THEME_VERSION
		);

		// Theme libraries
		bf_register_script(
			'publisher',
			bf_append_suffix( PUBLISHER_THEME_URI . 'js/theme', '.js' ),
			array( 'jquery', 'theme-libs' ),
			bf_append_suffix( PUBLISHER_THEME_PATH . 'js/theme', '.js' ),
			PUBLISHER_THEME_VERSION
		);

		// Theme libraries
		bf_register_style(
			'theme-libs',
			bf_append_suffix( PUBLISHER_THEME_URI . 'css/theme-libs', '.css' ),
			array(),
			bf_append_suffix( PUBLISHER_THEME_PATH . 'css/theme-libs', '.css' ),
			PUBLISHER_THEME_VERSION
		);

		if ( current_action() == 'enqueue_block_editor_assets' ) {
			bf_register_style(
				'publisher',
				bf_append_suffix( PUBLISHER_THEME_URI . 'gutenberg' . ( bf_is( 'dev' ) ? '' : '-' . PUBLISHER_THEME_VERSION ), '.css' ),
				array( 'theme-libs' ),
				bf_append_suffix( PUBLISHER_THEME_PATH . 'gutenberg' . ( bf_is( 'dev' ) ? '' : '-' . PUBLISHER_THEME_VERSION ), '.css' ),
				PUBLISHER_THEME_VERSION
			);
		} else {
			bf_register_style(
				'publisher',
				bf_append_suffix( PUBLISHER_THEME_URI . 'style' . ( bf_is( 'dev' ) ? '' : '-' . PUBLISHER_THEME_VERSION ), '.css' ),
				array( 'theme-libs' ),
				bf_append_suffix( PUBLISHER_THEME_PATH . 'style' . ( bf_is( 'dev' ) ? '' : '-' . PUBLISHER_THEME_VERSION ), '.css' ),
				PUBLISHER_THEME_VERSION
			);
		}

		// If a child theme is active, add the parent theme's style.
		// this is good for performance and cache.
		if ( is_child_theme() ) {

			// adds child theme version to the end of url of child theme style file
			// child have not min version
			wp_register_style(
				'publisher-child',
				bf_get_child_theme_uri( 'style.css' ),
				array(),
				Better_Framework()->theme( false, true, false )->get( 'Version' )
			);

		}

		if ( is_rtl() ) {

			bf_register_style(
				'publisher-rtl',
				bf_append_suffix( PUBLISHER_THEME_URI . 'rtl', '.css' ),
				array( 'publisher' ),
				bf_append_suffix( PUBLISHER_THEME_PATH . 'rtl', '.css' ),
				PUBLISHER_THEME_VERSION
			);

			// Force RTL grid for Visual Composer
			if ( publisher_get_option( 'vc_grid_direction' ) === 'rtl' ) {

				bf_register_style(
					'vc-rtl-grid',
					bf_append_suffix( PUBLISHER_THEME_URI . '/css/vc-rtl-grid', '.css' ),
					array(),
					bf_append_suffix( PUBLISHER_THEME_URI . '/css/vc-rtl-grid', '.css' ),
					PUBLISHER_THEME_VERSION
				);
			}
		}

		/** HTML5 Styles for IE from BF */
		wp_register_script( 'bf-html5shiv', bf_get_uri( 'assets/js/html5shiv.min.js' ), '', Better_Framework()->version );
		wp_script_add_data( 'bf-html5shiv', 'conditional', 'lt IE 9' );
		wp_register_script( 'bf-respond', bf_get_uri( 'assets/js/respond.min.js' ), '', Better_Framework()->version );
		wp_script_add_data( 'bf-respond', 'conditional', 'lt IE 9' );
	}


	/**
	 * Enqueue css and js files
	 *
	 * Action Callback: wp_enqueue_scripts
	 *
	 */
	function enqueue_assets() {

		// Skyscraper banners state
		$skyscraper_info = publisher_ad_skyscraper_info();

		bf_localize_script(
			'publisher',
			'publisher_theme_global_loc',
			apply_filters( 'publisher-theme/localized-items',
				array(
					'page'                 => array(
						'boxed' => publisher_get_page_boxed_layout(),
					),
					'header'               => array(
						'style' => publisher_get_header_style(),
						'boxed' => publisher_get_header_layout(),
					),
					'ajax_url'             => admin_url( 'admin-ajax.php' ),
					'loading'              => '<div class="bs-loading"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
					'translations'         => array(
						'tabs_all'        => publisher_translation_get( 'pretty_tabs_all' ),
						'tabs_more'       => publisher_translation_get( 'pretty_tabs_more' ),
						'lightbox_expand' => publisher_translation_get( 'lightbox_expand' ),
						'lightbox_close'  => publisher_translation_get( 'lightbox_close' ),
					),
					'lightbox'             => array(
						'not_classes' => '',
					),
					'main_menu'            => array(
						'more_menu' => publisher_get_option( 'advanced_collect_more_menu' ) ? 'enable' : 'disable',
					),
					'top_menu'             => array(
						'more_menu' => publisher_get_option( 'advanced_collect_more_top_menu' ) ? 'enable' : 'disable',
					),
					'skyscraper'           => array(
						'sticky_gap' => 30,
						'sticky'     => (bool) $skyscraper_info['sticky'],
						'position'   => $skyscraper_info['position'],
					),
					'share'                => array(
						'more' => publisher_get_option( 'social_share_more' ) === 'yes',
					),
					'refresh_googletagads' => true,
				)
			)
		);


		/**
		 * @see handle_ajaxified_search
		 */
		bf_localize_script(
			'publisher',
			'publisher_theme_ajax_search_loc',
			array(
				'ajax_url'      => admin_url( 'admin-ajax.php' ),
				'previewMarkup' => Publisher_Search::get_ajax_search_template(),
				'full_width'    => Publisher_Search::is_menu_full_width() ? '1' : '0',
			)
		);


		bf_enqueue_script( 'element-query' );
		bf_enqueue_script( 'theme-libs' ); // All Publisher js dependencies

		// PrettyPhoto
		if ( publisher_get_option( 'light_box_images' ) !== 'disable' ) {
			bf_enqueue_script( 'pretty-photo' );
			bf_enqueue_style( 'pretty-photo' );
		}

		bf_enqueue_script( 'publisher' ); // Theme libraries
		bf_enqueue_style( 'bs-icons' ); // Enqueue "BetterStudio Icons" from framework
		bf_enqueue_style( 'theme-libs' ); // Theme libraries
		bf_enqueue_style( 'fontawesome' ); // Fontawesome
		bf_enqueue_style( 'publisher' );

		if ( bf_is_doing_ajax( 'fetch-mce-view-shortcode' ) ) {
			bf_enqueue_tinymce_style( 'registered', array( 'theme-libs', 'publisher' ) );
		}

		// If a child theme is active, add the parent theme's style.
		// this is good for performance and cache.
		if ( is_child_theme() ) {

			// adds child theme version to the end of url of child theme style file
			// child have not min version
			wp_enqueue_style( 'publisher-child' );
		}

		//
		// RTL Styles
		//
		if ( is_rtl() ) {
			bf_enqueue_style( 'publisher-rtl' );

			// Force RTL grid for Visual Composer
			if ( publisher_get_option( 'vc_grid_direction' ) === 'rtl' ) {
				bf_enqueue_style( 'vc-rtl-grid' );
			}
		}

		//
		// Comments script
		//
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/** HTML5 Styles for IE from BF */
		wp_enqueue_script( 'bf-html5shiv' );
		wp_enqueue_script( 'bf-respond' );

	} // enqueue_assets


	/**
	 * Print Visual Composer Front-End Editor Fix Script
	 */
	public static function print_vc_frontend_edit_script() {

		printf( '<script type="text/javascript" src="%s"></script>', bf_append_suffix( PUBLISHER_THEME_URI . 'js/vc-frontend', '.js' ) );
	}


	/**
	 *  Enqueue anything in header
	 */
	function wp_head() {

		// Add custom css and advanced css codes
		$this->add_custom_css();

		// Header HTML Code
		publisher_echo_option( '_custom_header_code' );

	} // wp_head


	/**
	 *  Prints favicon
	 */
	function print_favicon() {

		// Site favicon with fallback for old WP versions
		//if ( ! function_exists( 'has_site_icon' ) ) {
		$favicon_16_16 = publisher_get_option( 'favicon_16_16' );
		if ( $favicon_16_16 ) {
			?>
			<link rel="shortcut icon" href="<?php echo esc_url( $favicon_16_16 ); ?>"><?php
		}

		$favicon_57_57 = publisher_get_option( 'favicon_57_57' );
		if ( $favicon_57_57 ) {
			?>
			<link rel="apple-touch-icon" href="<?php echo esc_url( $favicon_57_57 ); ?>"><?php
		}

		$favicon_114_114 = publisher_get_option( 'favicon_114_114' );
		if ( $favicon_114_114 ) {
			?>
			<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( $favicon_114_114 ); ?>"><?php
		}

		$favicon_72_72 = publisher_get_option( 'favicon_72_72' );
		if ( $favicon_72_72 ) {
			?>
			<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( $favicon_72_72 ); ?>"><?php
		}

		$favicon_144_144 = publisher_get_option( 'favicon_144_144' );
		if ( $favicon_144_144 ) {
			?>
			<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( $favicon_144_144 ); ?>"><?php
		}
		//}

	} // print_favicon


	/**
	 * Used for adding theme custom css and advanced css codes into pages
	 */
	function add_custom_css() {

		/**
		 *
		 * Processes and adds custom css codes that are coming from all panels
		 *
		 */
		bf_process_panel_custom_css_code_fields( array(
			'function' => 'publisher_get_option'
		) );


		// Print reviews section css fix when BetterReview is not active but
		// custom is using one of other active plugins.
		if ( ! function_exists( 'better_reviews_is_review_active' ) && function_exists( 'wp_review_get_post_review_type' ) ) {
			bf_add_css( bf_get_local_file_content( bf_append_suffix( PUBLISHER_THEME_PATH . 'css/reviews-fix', '.css' ) ), true );
		}


	} // add_panel_custom_css


	/**
	 * Callback: Enqueue anything in footer
	 *
	 * Action: wp_footer
	 */
	function wp_footer() {

		// Footer HTML Code
		publisher_echo_option( '_custom_footer_code' );

	} // wp_footer


	/**
	 *  Enqueue admin scripts
	 */
	function admin_enqueue() {

		$version = Better_Framework::theme()->get( 'Version' );

		// Enqueue "BetterStudio Icons" from framework
		bf_enqueue_style( 'bs-icons' );

		wp_enqueue_style( 'jquery-ui-core' );
		wp_enqueue_style( 'jquery-ui-draggable' );

		wp_enqueue_style( 'publisher-admin', bf_get_theme_uri( bf_append_suffix( 'css/admin-style', '.css' ) ), array(), $version );
		wp_enqueue_script( 'publisher-admin', bf_get_theme_uri( bf_append_suffix( 'js/theme-admin', '.js' ) ), array(
			'jquery-ui-resizable',
			'jquery'
		), $version );

		// Admin custom css code
		bf_add_admin_css( publisher_get_option( '_admin_css_code' ) );

		// Force RTL grid for Visual Composer
		if ( is_rtl() && publisher_get_option( 'vc_grid_direction' ) === 'rtl' ) {
			wp_enqueue_style( 'vc-rtl-grid', bf_get_theme_uri( bf_append_suffix( 'css/vc-rtl-grid', '.css' ) ), array(), $version );
		}

	} // admin_enqueue


	/**
	 * Callback: Customize body classes
	 *
	 * Filter: body_class
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function filter_body_class( $classes ) {

		$classes[] = 'bs-theme';
		$classes[] = 'bs-publisher';
		$classes[] = 'bs-publisher-' . publisher_get_style();

		// Activates light box
		if ( publisher_get_option( 'light_box_images' ) !== 'disable' ) {
			$classes[] = 'active-light-box';
		}

		// Body top border
		if ( publisher_get_option( 'header_top_border' ) ) {
			$classes[] = 'active-top-line';
		}

		// Force RTL grid for Visual Composer
		if ( is_rtl() && publisher_get_option( 'vc_grid_direction' ) === 'rtl' ) {
			$classes[] = 'bs-vc-rtl-grid';
		}

		// Body top border
		if ( ! is_rtl() ) {
			$classes[] = 'ltr';
		}

		// close mobile menu
		$classes[] = 'close-rh';

		// Page layout
		$classes[] = 'page-layout-' . publisher_get_page_layout();

		// Page boxed layout
		$classes[] = publisher_get_page_boxed_layout();

		// Activates sticky sidebar
		if ( publisher_get_option( 'sticky_sidebar' ) == 'enable' ) {
			$classes[] = 'active-sticky-sidebar';
		}

		// Activate Sticky Menu
		if ( publisher_get_option( 'menu_sticky' ) != 'no-sticky' ) {
			$classes[] = 'main-menu-sticky' . ( publisher_get_option( 'menu_sticky' ) == 'smart' ? '-smart' : '' );
		}

		// Activate Ajax Search
		if ( publisher_get_option( 'menu_show_search_box' ) == 'show' && publisher_get_option( 'menu_search_type' ) == 'ajax' ) {
			$classes[] = 'active-ajax-search';
		}

		// Infinity load related posts for single posts
		if ( publisher_is_valid_cpt( 'post' ) && publisher_get_related_post_type() == 'infinity-related-post' ) {
			$classes[] = 'infinity-related-post';
		}

		// Adds category class to post
		if ( is_singular() && is_object_in_taxonomy( get_post_type(), 'category' ) ) {

			$main_term = publisher_get_post_primary_cat();

			foreach ( (array) get_the_terms( get_the_ID(), 'category' ) as $term ) {
				if ( ! empty( $term->term_id ) ) {

					if ( ! empty( $main_term->term_id ) && $main_term->term_id == $term->term_id ) {
						$classes[] = sanitize_html_class( 'single-prim-cat-' . $term->term_id );
					}

					$classes[] = sanitize_html_class( 'single-cat-' . $term->term_id );
				}
			}
		} elseif ( publisher_is_valid_tax( 'category' ) ) {
			$classes[] = sanitize_html_class( 'single-prim-cat-' . get_queried_object_id() );
			$classes[] = sanitize_html_class( 'single-cat-' . get_queried_object_id() );
		}

		/**
		 * Processes custom classes that are coming from panels
		 */
		bf_process_panel_custom_css_class_fields( $classes, array(
			'function' => 'publisher_get_option'
		) );


		//
		// Show aside logo ad on mobile and the position of that
		//
		{
			$_check = array(
				'style-2' => 'header_aside_logo',
				'style-3' => 'header_aside_logo',
			);

			if ( isset( $_check[ publisher_get_header_style() ] ) ) {

				$ad = publisher_get_ad_location_data(
					$_check[ publisher_get_header_style() ],
					array(
						'show_mobile' => 'hide', // make sure it will get this custom ID in overridden sections
					),
					true
				);

				//
				// Show aside logo add on mobile or not
				//
				if ( $ad['active_location'] && ! empty( $ad['show_mobile'] ) ) {

					$_check = array(
						'hide'               => 'bs-hide-ha',
						'show-before-header' => 'bs-show-ha bs-show-ha-b',
						'show-after-header'  => 'bs-show-ha bs-show-ha-a',
					);

					if ( isset( $_check[ $ad['show_mobile'] ] ) ) {
						$classes[] = $_check[ $ad['show_mobile'] ];
					}
				}
			}
		}

		return $classes;

	} // filter_body_class


	/**
	 * Callback: Customize admin body classes
	 *
	 * Filter: body_class
	 *
	 * @param $classes
	 *
	 * @return string
	 */
	function filter_admin_body_class( $classes ) {

		// Force RTL grid for Visual Composer
		if ( is_rtl() && publisher_get_option( 'vc_grid_direction' ) === 'rtl' ) {
			$classes .= ' bs-vc-rtl-grid ';
		}

		return $classes;

	} // filter_admin_body_class


	/**
	 * Generate Custom Mega Menu HTML
	 *
	 * @param array $args
	 *
	 * @return string
	 */
	public function generate_better_menu( $args ) {

		if ( empty( $args['output'] ) ) {

			publisher_set_prop( 'mega-menu-args', $args );

			switch ( $args['current-item']->mega_menu ) {

				case 'link-3-column':
				case 'link-2-column':
				case 'link-4-column':
				case 'link-5-column':
					$args['output'] = publisher_get_view( 'menu', 'mega-links-columns', 'general', false );
					break;

				case 'link-list':
					$args['output'] = publisher_get_view( 'menu', 'mega-links-list', 'general', false );
					break;

				case 'grid-posts':
					$args['output'] = publisher_get_view( 'menu', 'mega-grid-posts', 'general', false );
					break;

				case 'tabbed-grid-posts':
					$args['output'] = publisher_get_view( 'menu', 'mega-tabbed-grid-posts', 'general', false );
					break;

				case 'page-builder':
					$args['output'] = publisher_get_view( 'menu', 'mega-page-builder', 'general', false );
					break;

			}
		}

		return $args;

	} // generate_better_menu


	/**
	 * Adds random order by feature to WP_User_Query
	 *
	 * Action: pre_user_query
	 *
	 * @param $class
	 *
	 * @return mixed
	 */
	public function action_pre_user_query( $class ) {

		if ( 'rand' == $class->query_vars['orderby'] ) {
			$class->query_orderby = str_replace( 'user_login', 'RAND()', $class->query_orderby );
		}

		return $class;

	} // action_pre_user_query


	/**
	 * Resets typography options to default
	 *
	 * Callback
	 *
	 * @return array
	 */
	public static function reset_typography_options() {

		$lang = bf_get_current_language_option_code();

		$theme_options = get_option( publisher_get_theme_panel_id() . $lang );

		$fields   = Better_Framework()->options()->load_panel_fields( publisher_get_theme_panel_id() );
		$defaults = Better_Framework()->options()->get_panel_std( publisher_get_theme_panel_id() );

		$all_styles = publisher_styles_config();

		$style = publisher_get_style();

		// if items haven't any option config
		if ( ! isset( $all_styles[ $style ] ) ) {
			$std_id = 'std';
		} else {
			$std_id = 'std-' . $style;
		}

		foreach ( (array) $fields as $field_id => $field ) {

			if ( ! isset( $field['reset-typo'] ) || ! $field['reset-typo'] ) {
				unset( $fields[ $field_id ] );
				continue;
			}

			if ( $std_id == 'std' ) {
				$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
			} else {
				if ( isset( $defaults[ $field['id'] ][ $std_id ] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
				} elseif ( isset( $defaults[ $field['id'] ]['std'] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ]['std'];
				}
			}

			unset( $defaults[ $field_id ] );
		}

		unset( $fields );
		unset( $defaults );

		// Updates option
		update_option( publisher_get_theme_panel_id() . $lang, $theme_options );

		// clear caches
		delete_transient( '__better_framework__panel_css' );
		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );

		Better_Framework()->admin_notices()->add_notice( array(
			'msg'         => __( 'Typography options was restored to default setting.', 'publisher' ),
			'notice-icon' => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
			'product'     => 'theme:publisher'
		) );

		return array(
			'status'  => 'succeed',
			'msg'     => __( 'Typography options was restored to default setting.', 'publisher' ),
			'refresh' => true
		);

	} // reset_typography_options


	/**
	 * Resets advanced options to default
	 *
	 * Callback
	 *
	 * @return array
	 */
	public static function reset_advanced_settings() {

		$lang = bf_get_current_language_option_code();

		$theme_options = get_option( publisher_get_theme_panel_id() . $lang );

		$fields   = Better_Framework()->options()->load_panel_fields( publisher_get_theme_panel_id() );
		$defaults = Better_Framework()->options()->get_panel_std( publisher_get_theme_panel_id() );

		$all_styles = publisher_styles_config();

		$style = publisher_get_style();

		// if items haven't any option config
		if ( ! isset( $all_styles[ $style ] ) ) {
			$std_id = 'std';
		} else {
			$std_id = 'std-' . $style;
		}

		foreach ( (array) $fields as $field_id => $field ) {

			if ( ! isset( $field['reset-advanced'] ) || ! $field['reset-advanced'] ) {
				unset( $fields[ $field_id ] );
				continue;
			}

			if ( $std_id == 'std' ) {
				$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
			} else {
				if ( isset( $defaults[ $field['id'] ][ $std_id ] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
				} elseif ( isset( $defaults[ $field['id'] ]['std'] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ]['std'];
				}
			}

			unset( $defaults[ $field_id ] );
		}

		unset( $fields );
		unset( $defaults );

		// Updates option
		update_option( publisher_get_theme_panel_id() . $lang, $theme_options );

		// clear caches
		delete_transient( '__better_framework__panel_css' );
		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );

		Better_Framework()->admin_notices()->add_notice( array(
			'msg'         => __( 'Advanced options was restored to default setting.', 'publisher' ),
			'notice-icon' => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
			'product'     => 'theme:publisher'
		) );

		return array(
			'status'  => 'succeed',
			'msg'     => __( 'Advanced options was restored to default setting.', 'publisher' ),
			'refresh' => true
		);

	} // reset_typography_options


	/**
	 * Resets blocks settings to default
	 *
	 * Callback
	 *
	 * @return array
	 */
	public static function reset_blocks_options() {

		$lang = bf_get_current_language_option_code();

		$theme_options = get_option( publisher_get_theme_panel_id() . $lang );

		$fields   = Better_Framework()->options()->load_panel_fields( publisher_get_theme_panel_id() );
		$defaults = Better_Framework()->options()->get_panel_std( publisher_get_theme_panel_id() );

		$all_styles = publisher_styles_config();

		$style = publisher_get_style();

		// if items haven't any option config
		if ( ! isset( $all_styles[ $style ] ) ) {
			$std_id = 'std';
		} else {
			$std_id = 'std-' . $style;
		}

		foreach ( (array) $fields as $field ) {
			if ( ! isset( $field['reset-blocks'] ) || ! $field['reset-blocks'] ) {
				continue;
			}

			if ( $std_id == 'std' ) {
				$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
			} else {
				if ( isset( $defaults[ $field['id'] ][ $std_id ] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
				} elseif ( isset( $defaults[ $field['id'] ]['std'] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ]['std'];
				}
			}
		}

		unset( $fields );
		unset( $defaults );

		// Updates option
		update_option( publisher_get_theme_panel_id() . $lang, $theme_options );

		Better_Framework()->admin_notices()->add_notice( array(
			'msg'         => __( 'Blocks settings resets to default.', 'publisher' ),
			'notice-icon' => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
			'product'     => 'theme:publisher'
		) );

		return array(
			'status'  => 'succeed',
			'msg'     => __( 'Blocks settings was restored to default setting.', 'publisher' ),
			'refresh' => true
		);

	} // reset_blocks_options


	/**
	 * Resets color options to default
	 *
	 * Callback
	 *
	 * @return array
	 */
	public static function reset_color_options() {

		$lang = bf_get_current_language_option_code();

		$theme_options = get_option( publisher_get_theme_panel_id() . $lang );

		$fields   = Better_Framework()->options()->load_panel_fields( publisher_get_theme_panel_id() );
		$defaults = Better_Framework()->options()->get_panel_std( publisher_get_theme_panel_id() );

		$all_styles = publisher_styles_config();

		$style = publisher_get_style();

		// if items haven't any option config
		if ( ! isset( $all_styles[ $style ] ) ) {
			$std_id = 'std';
		} else {
			$std_id = 'std-' . $style;
		}

		foreach ( (array) $fields as $field_id => $field ) {
			if ( ! isset( $field['reset-color'] ) || ! $field['reset-color'] ) {
				continue;
			}

			if ( $std_id == 'std' ) {
				$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
			} else {
				if ( isset( $defaults[ $field['id'] ][ $std_id ] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ][ $std_id ];
				} elseif ( isset( $defaults[ $field['id'] ]['std'] ) ) {
					$theme_options[ $field['id'] ] = $defaults[ $field['id'] ]['std'];
				}
			}
		}

		unset( $fields );
		unset( $defaults );

		// Updates option
		update_option( publisher_get_theme_panel_id() . $lang, $theme_options );

		// clear caches
		delete_transient( '__better_framework__panel_css' );
		delete_transient( '__better_framework__final_fe_css' );
		delete_transient( '__better_framework__final_fe_css_version' );

		Better_Framework()->admin_notices()->add_notice( array(
			'msg'         => __( 'All color options resets to default.', 'publisher' ),
			'notice-icon' => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
			'product'     => 'theme:publisher'
		) );

		return array(
			'status'  => 'succeed',
			'msg'     => __( 'Color options resets to default.', 'publisher' ),
			'refresh' => true
		);

	} // reset_color_options


	/**
	 * Callback: Used for changing WP_Query, specifically for posts per page in archives
	 *
	 * @param   WP_Query $query WP_Query instance
	 */
	function pre_get_posts( $query ) {

		// This is only for front end and main query
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		//
		// Cache the queried_object and queried_object_id values to return back them at the end of function
		// because when we call the $query->get_queried_object() it will cache the value in the WP_Query
		// but it's so soon to cache it and it will be changed after "pre_get_posts".
		// we will returns this values at the end.
		// There is no need to do this but i added to make sure there will not be any issue!
		//
		{
			$_queried_object    = $query->queried_object;
			$_queried_object_id = $query->queried_object_id;
		}

		// Homepage customize query
		if ( $query->is_home() ) {

			$paged = bf_get_query_var_paged();
			$limit = get_option( 'posts_per_page' );

			// Home posts count
			if ( publisher_get_option( 'home_posts_count' ) != '' ) {
				$limit = publisher_get_option( 'home_posts_count' );
				$query->set( 'posts_per_page', $limit );
				$query->set( 'paged', $paged );
			}

			// Home category filters
			if ( $temp = publisher_get_option( 'home_cat_include' ) ) {
				$query->set( 'cat', $temp );
			}

			// Home exclude category filters
			if ( $temp = publisher_get_option( 'home_cat_exclude' ) ) {
				$query->set( 'category__not_in', $temp );
			}

			// Home tag filters
			if ( $temp = publisher_get_option( 'home_tag_include' ) ) {
				$query->set( 'tag__in', $temp );
			}

			// Home post type
			if ( publisher_get_option( 'home_custom_post_type' ) != '' ) {
				$query->set( 'post_type', explode( ',', publisher_get_option( 'home_custom_post_type' ) ) );
			}

			// exclude first
			$slider_config = publisher_main_slider_config( array(
					'type' => 'home',
				)
			);

			if ( $slider_config['show'] && $slider_config['type'] == 'custom-blocks' && empty( $query->is_feed ) && publisher_get_option( 'home_top_posts_query' ) === 'default' ) {
				if ( $paged > 1 ) {
					$query->set( 'offset', intval( $slider_config['posts'] ) + ( ( $paged - 1 ) * $limit ) );
					$query->set( 'original_offset', intval( $slider_config['posts'] ) );
				} else {
					$query->set( 'offset', intval( $slider_config['posts'] ) );
				}
			}

		} // Posts per page for categories
		elseif ( $query->get_queried_object_id() > 0 && publisher_is_valid_tax( 'category', $query->get_queried_object() ) ) {

			/**
			 * @type $term WP_Term
			 */
			$term = $query->get_queried_object_id();

			$paged = get_query_var( 'paged' );
			$limit = get_option( 'posts_per_page' );

			// Custom count per category
			if ( bf_get_term_meta( 'term_posts_count', $term, '' ) != '' ) {
				$limit = bf_get_term_meta( 'term_posts_count', $term, '' );

			} // Custom count for all categories
			elseif ( publisher_get_option( 'cat_posts_count' ) != '' && intval( publisher_get_option( 'cat_posts_count' ) ) > 0 ) {
				$limit = publisher_get_option( 'cat_posts_count' );
			}

			$query->set( 'posts_per_page', $limit );

			// exclude first
			$slider_config = publisher_main_slider_config( array(
					'type'    => 'term',
					'term_id' => $term
				)
			);
			if ( $slider_config['show'] && $slider_config['type'] == 'custom-blocks' && empty( $query->is_feed ) ) {
				if ( $paged > 1 ) {
					$query->set( 'offset', intval( $slider_config['posts'] ) + ( ( $paged - 1 ) * $limit ) );
					$query->set( 'original_offset', intval( $slider_config['posts'] ) );
				} else {
					$query->set( 'offset', intval( $slider_config['posts'] ) );
				}
			}

		} // Posts per page for tags
		elseif ( $query->get_queried_object_id() > 0 && publisher_is_valid_tax( 'tag', $query->get_queried_object() ) ) {

			/**
			 * @type $term WP_Term
			 */
			$term = $query->get_queried_object();

			// Custom count per tag
			if ( bf_get_term_meta( 'term_posts_count', $term, '' ) != '' ) {

				$query->set( 'posts_per_page', bf_get_term_meta( 'term_posts_count', $term, '' ) );
				$query->set( 'paged', bf_get_query_var_paged() );

			} // Custom count for all tags
			elseif ( publisher_get_option( 'tag_posts_count' ) != '' && intval( publisher_get_option( 'tag_posts_count' ) ) > 0 ) {

				$query->set( 'posts_per_page', publisher_get_option( 'tag_posts_count' ) );
				$query->set( 'paged', bf_get_query_var_paged() );

			}

		} // Posts per page for authors
		elseif ( $query->is_author() ) {

			$current_user = $query->query_vars['author_name'];
			$current_user = get_user_by( 'slug', $current_user );

			// Custom count per author
			if ( bf_get_user_meta( 'author_posts_count', $current_user, '' ) != '' && intval( bf_get_user_meta( 'author_posts_count', $current_user, '' ) ) > 0 ) {

				$query->set( 'posts_per_page', bf_get_user_meta( 'author_posts_count', $current_user, '' ) );
				$query->set( 'paged', bf_get_query_var_paged() );

			} // Custom count for all tags
			elseif ( publisher_get_option( 'author_posts_count' ) != '' && intval( publisher_get_option( 'author_posts_count' ) ) > 0 ) {

				$query->set( 'posts_per_page', publisher_get_option( 'author_posts_count' ) );
				$query->set( 'paged', bf_get_query_var_paged() );

			}

		}

		//
		// Return back the data that cached at first
		//
		{
			$query->queried_object = $_queried_object;
			unset( $_queried_object );
			$query->queried_object_id = $_queried_object_id;
			unset( $_queried_object_id );
		}

	} // pre_get_posts


	/**
	 * Adds custom image sizes to WP media uploader
	 *
	 * @param $sizes
	 *
	 * @return array
	 */
	function add_image_size_names_choose( $sizes ) {

		$new_sizes = array(
			'publisher-sm' => sprintf( __( '%s - Small', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			'publisher-md' => sprintf( __( '%s - Middle', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			'publisher-lg' => sprintf( __( '%s - Large', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
		);

		$sizes = array_merge( $sizes, $new_sizes );

		return $sizes;

	}


	//
	// BS-Pagination Ajax
	//


	/**
	 * Custom function used to return mega menu posts from bs_pagin ajax
	 */
	public static function bs_pagin_ajax_mega_grid_posts() {

		publisher_get_view( 'menu', 'mega-grid-posts-content' );
	}


	/**
	 * Custom function used to return tabbed mega menu posts from bs_pagin ajax
	 */
	public static function bs_pagin_ajax_tabbed_mega_grid_posts( $res, $wp_query, $view, $type, $atts ) {

		// only display pagination on defer loading [ paged=1 ]
		if ( isset( $atts['cat'] ) ) {
			publisher_set_prop( 'listing-main-term', $atts['cat'] );
		}
		$display_pagination      = ! ( isset( $atts['paged'] ) && $atts['paged'] > 1 );
		$atts['have_pagination'] = ! empty( $atts['paginate'] );

		if ( $display_pagination ) {
			publisher_theme_pagin_manager()->wrapper_start( $atts );
		}
		publisher_get_view( 'menu', 'mega-tabbed-grid-posts-content' );
		if ( $display_pagination ) {
			publisher_theme_pagin_manager()->wrapper_end();
		}

		if ( $display_pagination ) {
			publisher_theme_pagin_manager()->display_pagination( $atts, $wp_query, $view, $type );
		}
	}


	/**
	 * Display related posts
	 *
	 * @see path: views/general/post/_related.php
	 *
	 * @param array $atts
	 */
	protected static function _display_related_posts( $atts ) {

		publisher_theme_pagin_manager()->wrapper_start( $atts );

		$related_posts_query = publisher_get_query();
		$column              = $related_posts_query->post_count === 2 ? 2 : 3;
		$listing_class       = " scolumns-{$column}";

		$_check = array(
			4  => '',
			7  => '',
			10 => '',
		);

		if ( isset( $_check[ $related_posts_query->post_count ] ) ) {
			$listing_class .= ' include-last-mobile';
		}

		$block_settings = publisher_get_option( 'blocks-related-posts' );
		publisher_set_prop( 'title-limit', $block_settings['title-limit'] );
		publisher_set_prop( 'show-subtitle', $block_settings['subtitle'] );


		if ( $block_settings['subtitle'] ) {
			publisher_set_prop( 'subtitle-limit', $block_settings['subtitle-limit'] );
			publisher_set_prop( 'subtitle-location', $block_settings['subtitle-location'] );
		}

		// Change title tag to p for adding more priority to content heading tags.
		publisher_set_blocks_title_tag( 'p' );

		publisher_set_prop( 'show-term-badge', $block_settings['term-badge'] );
		publisher_set_prop( 'term-badge-count', $block_settings['term-badge-count'] );
		publisher_set_prop( 'term-badge-tax', $block_settings['term-badge-tax'] );
		publisher_set_prop( 'show-format-icon', $block_settings['format-icon'] );
		publisher_set_prop( 'show-excerpt', false );
		publisher_set_prop( 'show-meta', false );
		publisher_set_prop( 'listing-class', $listing_class );
		publisher_set_prop( 'block-customized', true );
		publisher_set_prop_class( 'simple-grid' );
		publisher_get_view( 'loop', 'listing-thumbnail-2' );

		publisher_theme_pagin_manager()->wrapper_end();
	}


	/**
	 * Author related posts ajax deferred loading & pagination handler
	 *
	 * @see path: views/general/post/_related.php
	 *
	 * @param array    $res
	 * @param WP_Query $wp_query
	 * @param string   $view
	 * @param string   $type
	 * @param array    $atts
	 */
	public static function fetch_other_related_posts( $res, $wp_query, $view, $type, $atts ) {

		// only display pagination on defer loading [ paged=1 ]
		$display_pagination      = ! ( isset( $atts['paged'] ) && $atts['paged'] > 1 );
		$atts['have_pagination'] = ! empty( $atts['paginate'] );

		if ( $display_pagination ) {
			publisher_theme_pagin_manager()->wrapper_start( $atts );
		}
		self::_display_related_posts( $atts );
		if ( $display_pagination ) {
			publisher_theme_pagin_manager()->wrapper_end();
			publisher_theme_pagin_manager()->display_pagination( $atts, $wp_query, $view, $type );
		}
	}


	/**
	 * Related posts pagination ajax handler
	 *
	 * @see path: views/general/post/_related.php
	 *
	 * @param array    $res
	 * @param WP_Query $wp_query
	 * @param string   $view
	 * @param string   $type
	 * @param array    $atts
	 */
	public static function fetch_related_posts( $res, $wp_query, $view, $type, $atts ) {

		self::_display_related_posts( $atts );
	}


	/**
	 * Custom function used to return mega menu posts from bs_pagin ajax
	 */
	public static function bs_pagin_ajax_archive( &$response ) {

		// if request is not valid
		if ( empty( $_REQUEST['query']['query_vars'] ) ) {
			wp_send_json( array( 'error' => __( 'Invalid Request', 'publisher' ) ) );

			return;
		}

		$args = $_REQUEST['query']['query_vars'];

		// Show/hide excerpt
		if ( isset( $_REQUEST['query']['show_excerpt'] ) ) {
			publisher_set_prop( 'show-excerpt', $_REQUEST['query']['show_excerpt'] );
		}

		// update query for current page (paged)
		$args['paged'] = $paged = max( intval( $_REQUEST['current_page'] ), 1 );

		// fix offset of query
		if ( ! empty( $args['offset'] ) ) {
			$args['offset'] = ( max( $paged - 1, 1 ) * intval( $args['posts_per_page'] ) ) + ( $args['offset'] );
		}

		$args['post_status'] = 'publish';

		$wp_query = new WP_Query( $args );
		publisher_set_query( $wp_query );

		// total pages and next page with fix for offset
		if ( ! empty( $args['offset'] ) ) {
			// uses $_REQUEST because $args offset was changed for query fix
			$response['pages']     = bf_get_wp_query_total_pages( $wp_query, $_REQUEST['query']['query_vars']['offset'], $args['posts_per_page'] );
			$response['have_next'] = $response['pages'] > $paged;
			$response['have_prev'] = $paged > 1;
		} else {
			$response['pages']     = $wp_query->max_num_pages;
			$response['have_next'] = $wp_query->max_num_pages > $paged;
			$response['have_prev'] = $paged > 1;
		}

		$response['label'] = publisher_theme_pagin_manager()->get_pagination_label( $paged, $response['pages'] );

		// Add response to .listing for better UX
		if ( isset( $_REQUEST['pagin_type'] ) ) {

			$_check = array(
				'more_btn'          => '',
				'infinity'          => '',
				'more_btn_infinity' => '',
			);

			$listing = publisher_get_page_listing( $wp_query );

			if ( isset( $_check[ $_REQUEST['pagin_type'] ] ) ) {

				$_check = array(
					'listing-mix-4-1' => '',
					'listing-mix-4-2' => '',
					'listing-mix-4-3' => '',
					'listing-mix-4-4' => '',
					'listing-mix-4-5' => '',
					'listing-mix-4-6' => '',
					'listing-mix-4-7' => '',
					'listing-mix-4-8' => '',
				);

				if ( ! isset( $_check[ $listing ] ) ) {
					publisher_set_prop( 'show-listing-wrapper', false );
					$response['add-to']   = '.listing';
					$response['add-type'] = 'append';
				}
			}

			unset( $_check ); // clear memory
		}

		// Prints posts base of listing that was selected in panels.
		// Location: "views/general/loop/listing-*.php"
		publisher_get_view( 'loop', publisher_get_page_listing( $wp_query ) );

	} // bs_pagin_ajax_archive


	/**
	 * Compatibility of Publisher with Better Post Views plugin in ajax callback.
	 *
	 * @param string $count
	 *
	 * @return string
	 */
	function better_post_views_ajax( $count = '' ) {

		$rank = publisher_get_ranking_icon( $count, 'views_ranking', 'fa-eye', true );

		if ( isset( $rank['show'] ) && $rank['show'] ) {
			return $rank['icon'] . ' <b class="number">' . bf_human_number_format( $count ) . '</b>';
		} else {
			return '';
		}

	}


	/**
	 * Changes the default config of post advanced fields
	 *
	 * @param $config
	 *
	 * @return mixed
	 */
	function customize_post_advanced_fields( $config ) {

		$config['excerpt']  = publisher_get_option( 'advanced_post_fields_excerpt' );
		$config['subtitle'] = publisher_get_option( 'advanced_post_fields_subtitle' );

		return $config;
	}


	/**
	 * Trick for sending update for lower version number!
	 *
	 * @param $return
	 *
	 * @return mixed
	 */
	public function enable_wp2update_better_amp( $return ) {

		// filter the request params!
		add_filter( 'http_request_args', array( $this, 'make_better_amp_updatable' ), 9, 2 );

		return $return;
	}


	/**
	 * Sends update for v1.1 because we reverted the base version of new plugin is starting from v1.0
	 *
	 * @param $args
	 * @param $url
	 *
	 * @return mixed
	 */
	public function make_better_amp_updatable( $args, $url ) {

		if ( ! preg_match( '#^https?://api.wordpress.org/+plugins/+update-check#i', $url ) ) {
			return $args;
		}

		if ( empty( $args['body']['plugins'] ) ) {
			return $args;
		}

		$plugins = json_decode( $args['body']['plugins'], true );

		if ( isset( $plugins['plugins']['better-amp/better-amp.php'] ) ) {
			$plugins['plugins']['better-amp/better-amp.php']['Version'] = '0.9';
		}

		$args['body']['plugins'] = json_encode( $plugins );

		return $args;
	}


	/**
	 * Print more stories posts
	 *
	 * @param array $atts
	 *
	 * @since 1.8.0
	 */
	public static function list_posts( &$wp_query, &$view, &$type, &$atts ) {

		publisher_theme_pagin_manager()->wrapper_start( $atts );

		if ( publisher_have_posts() ) {

			{
				if ( ! isset( $atts['data']['columns'] ) ) {
					$atts['data']['columns'] = 1;
				}

				publisher_set_prop( 'listing-columns', $atts['data']['columns'] );
				publisher_set_prop( 'listing-class', 'columns-' . $atts['data']['columns'] );
			}

			if ( isset( $atts['data']['item-heading-tag'] ) ) {
				publisher_set_prop( 'item-heading-tag', $atts['data']['item-heading-tag'] );
			}

			if ( isset( $atts['data']['item-tag'] ) ) {
				publisher_set_prop( 'item-tag', $atts['data']['item-tag'] );
			}

			publisher_get_view( 'loop', 'listing-' . $atts['data']['listing'] );

			publisher_clear_props();
		}

		publisher_theme_pagin_manager()->wrapper_end();
	}


	/**
	 * More stories pagination ajax handle
	 *
	 * @param array $atts
	 *
	 * @see   list_posts
	 * @since 1.8.0
	 */
	public static function listing_ajax_handler( &$response, &$wp_query, &$view, &$type, &$atts ) {

		self::list_posts( $wp_query, $view, $type, $atts );
	}


	/**
	 * Handle 'Continue Reading' button
	 *
	 * @since 1.8.0
	 */
	public static function init_continue_reading() {

		if ( ! publisher_get_option( 'post_continue_reading' ) ) {
			return;
		}

		if ( ! publisher_is_valid_cpt( 'post' ) || is_home() || is_front_page() ) {
			return;
		}

		// BetterAMP or Official AMP plugins
		// or FIA
		if ( bf_is_amp() || bf_is_fia() ) {
			return;
		}

		// RSS
		if ( is_feed() ) {
			return;
		}

		bf_content_inject( array(
			'priority' => 10, // low Priority [ in our standards ;)) ]
			'position' => 'top',
			'content'  => '<div class="continue-reading-content close">',
			'config'   => 'publisher',
		) );

		bf_content_inject( array(
			'priority' => 1000, // High Priority [ again in our standards ;)) ]
			'position' => 'bottom',
			'content'  => '</div><div class="continue-reading-container"><a href="#" class="continue-reading-btn btn">' .
			              publisher_translation_get( 'continue_reading_mobile' )
			              . '</a></div>',
			'config'   => 'publisher',
		) );
	}


	/**
	 * Setup inline related posts
	 *
	 * @since 1.8.0
	 */
	public static function init_inline_related_posts() {

		if ( is_feed() ) {
			return;
		}

		if ( ! bf_is_doing_ajax( 'ajax-get-post' ) ) {
			if ( ! publisher_is_valid_cpt( 'post' ) || is_home() || is_front_page() ) {
				return;
			}
		}

		// BetterAMP or Official AMP plugins
		if ( bf_is_amp() ) {
			return;
		}

		$post_id      = get_queried_object_id();
		$inline_posts = array();

		if ( bf_get_post_meta( 'inline_related_posts_override', $post_id ) ) {

			if ( bf_get_post_meta( 'inline_related_posts_status', $post_id ) === 'show' ) {

				$inline_posts = bf_get_post_meta( 'inline_related_posts', $post_id );
			}
		} else {

			if ( publisher_get_option( 'inline_related_posts_status' ) === 'show' ) {
				$inline_posts = publisher_get_option( 'inline_related_posts' );
			}
		}

		foreach ( $inline_posts as $inline ) {

			bf_content_inject( array(
				'position'   => $inline['position'] === 'custom' ? intval( $inline['paragraph'] ) : $inline['position'],
				'content_cb' => 'Publisher::inline_related_posts_callback',
				'args'       => $inline,
				'config'     => 'publisher',
			) );

			publisher_clear_props();

			if ( $block_elements = publisher_get_option( 'inline_related_posts_html_blocks' ) ) {
				bf_content_inject_config( 'publisher', array(
					'blocks_elements' => explode( ',', $block_elements ),
				) );
			}
		}
	} // init_inline_related_posts


	/**
	 * Display inline related posts
	 *
	 * @see   init_inline_related_posts
	 *
	 * @param array $inject bf_content_inject data
	 *
	 * @since 1.8.0
	 * @return string
	 */
	public static function inline_related_posts_callback( $inject ) {

		if ( empty( $inject['args'] ) ) {
			return '';
		}

		// Cache current post because wp_reset_postdata() does not works in Ajax
		if ( bf_is_doing_ajax() ) {
			$post_cache = get_post();
		}

		publisher_set_props( array(
			'inline-posts-heading'          => $inject['args']['heading'],
			//
			'inline-posts-keyword'          => isset( $inject['args']['keyword'] ) ? $inject['args']['keyword'] : '',
			'inline-posts-listing'          => $inject['args']['listing'],
			'inline-posts-align'            => $inject['args']['align'],
			'inline-posts-count'            => $inject['args']['count'],
			'inline-posts-type'             => $inject['args']['type'],
			'inline-posts-offset'           => $inject['args']['offset'],
			//
			'inline-posts-pagination'       => $inject['args']['pagination'],
			'inline-posts-pagination-label' => $inject['args']['pagination_label'],
			//
			'inline-posts-selected-cats'    => isset( $inject['args']['selected-cats'] ) ? $inject['args']['selected-cats'] : '',
			'inline-posts-selected-tags'    => isset( $inject['args']['selected-tags'] ) ? $inject['args']['selected-tags'] : '',
			'inline-posts-posts-id'         => isset( $inject['args']['posts-id'] ) ? $inject['args']['posts-id'] : '',
		) );

		$output = publisher_get_view( 'post', '_related_inline', '', false );

		publisher_clear_props();
		publisher_clear_query();

		// Return back cached post because wp_reset_postdata() does not works in Ajax
		if ( bf_is_doing_ajax() ) {
			$GLOBALS['post'] = $post_cache;
		}

		return $output;
	} // inline_related_posts_callback


	/**
	 * Configurations for BF JSON-LD
	 *
	 * @param $config
	 *
	 * @return array
	 */
	public static function config_json_ld( $config ) {

		$config['active'] = publisher_get_option( 'json_ld' );

		$config['logo'] = publisher_get_option( 'logo_image' );

		$config['posts_type'] = publisher_get_option( 'json_ld_post_type' );

		return $config;
	}


	/**
	 * Configurations for social meta tag generator
	 *
	 * @param $config
	 *
	 * @return array
	 */
	public static function social_meta_tag( $config ) {

		$config['active'] = publisher_get_option( 'social_meta_tag' );

		return $config;
	}


	/**
	 * Changes permalink type of share buttons
	 *
	 * @param $type
	 *
	 * @return mixed|null
	 */
	public static function share_permalink_type( $type ) {

		return publisher_get_option( 'social_share_permalink_type' );
	}


	/**
	 * Redirects 404 page to custom page
	 *
	 * @hooked 404_template
	 */
	public static function custom_404_template() {

		wp_redirect( get_permalink( publisher_get_option( 'archive_404_custom' ) ), 301 );
	}


	/**
	 * Prepares base config for Facebook
	 * This can be used in many sections.
	 *
	 * @param $config
	 *
	 * @return mixed
	 */
	public static function facebook_app_config( $config ) {

		if ( publisher_get_option( 'facebook_app_id' ) && publisher_get_option( 'facebook_app_secret' ) ) {
			$config['id']     = publisher_get_option( 'facebook_app_id' );
			$config['secret'] = publisher_get_option( 'facebook_app_secret' );
		}

		return $config;
	}


	/**
	 * Customizes admin notices
	 *
	 * @param $notice
	 *
	 * @return mixed
	 */
	public static function customize_admin_notices( $notice ) {

		$_check = array(
			'share-facebook-rate-limit' => '',
		);

		if ( ( isset( $notice['id'] ) && isset( $_check[ $notice['id'] ] ) ) || $notice['product'] == 'theme:publisher' ) {
			$notice['product']   = 'theme:publisher';
			$notice['thumbnail'] = PUBLISHER_THEME_URI . 'images/admin/notice-logo.png';
		}

		if ( isset( $notice['id'] ) && $notice['id'] === 'share-facebook-rate-limit' ) {
			$notice['msg'] = sprintf( __( 'Facebook API rate limitation was reached. You have to <a href="%s" >enter App ID & App Secret</a> in social share settings.', 'publisher' ), admin_url( 'admin.php?page=better-studio/' . publisher_white_label_get_option( 'theme_slug' ) ) );
		}

		return $notice;
	}


	/**
	 * Post thumbnail on rss page options
	 *
	 * @param $content
	 *
	 * @return string
	 */
	public function add_thumbnail_to_rss( $content ) {

		if ( publisher_get_option( 'post_thumbnail_rss' ) != 'enable' ) {
			return $content;
		}

		global $post;

		if ( has_post_thumbnail( $post->ID ) ) {
			$content = '<div style="margin-bottom:20px;">' . get_the_post_thumbnail( $post->ID ) . '</div>' . $content;
		}

		return $content;
	}


	/**
	 * Adds custom support for Visual Composer (WP Bakery Page Builder)
	 */
	public function initialize_vc_support() {

		vc_set_as_theme();

		//
		vc_add_param( 'vc_column', array(
			'type'       => 'checkbox',
			'heading'    => __( 'Enable Sticky Sidebar', 'publisher' ),
			'param_name' => 'sticky_sidebar',
			'value'      => false,
		) );

		//
		vc_add_param( 'vc_column', array(
			'type'       => 'checkbox',
			'heading'    => __( 'Use widgets section heading for this column', 'publisher' ),
			'param_name' => 'is_sidebar',
			'value'      => false,
		) );

		// Use custom panel sidebar size for this column
		vc_add_param( 'vc_column', array(
			'type'       => 'bf_select',
			'heading'    => __( 'Use Publisher Pre-defined Column Size for This Column', 'publisher' ),
			'param_name' => 'column_custom_size',
			'options'    => array(
				'' => '-- Default --',
				array(
					'label'   => '2 Column Layout',
					'options' => array(
						'2-main-column'    => 'Main Column Width',
						'2-primary-column' => 'Primary Sidebar Width',
					),
				),
				array(
					'label'   => '3 Column Layout',
					'options' => array(
						'3-main-column'      => 'Main Column Width',
						'3-primary-column'   => 'Primary Sidebar Width',
						'3-secondary-column' => 'Secondary Sidebar Width',
					),
				),
			),
			'value'      => '',
		) );

	}


	/**
	 * General heading fields
	 *
	 * @param array  $fields
	 * @param string $shortcode_id
	 *
	 * @return array
	 */
	public function heading_fields( $fields = array(), $shortcode_id = '' ) {

		$fields['heading_tab']   = array(
			'name'           => __( 'Heading', 'publisher' ),
			'id'             => 'heading_tab',
			'type'           => 'tab',
			//
			'vc_admin_label' => false,
		);
		$fields['title']         = array(
			'name'           => __( 'Title', 'publisher' ),
			'id'             => 'title',
			'type'           => 'text',
			//
			'vc_admin_label' => true,
		);
		$fields['show_title']    = array(
			'name'           => __( 'Show Title?', 'publisher' ),
			'id'             => 'show_title',
			'type'           => 'switch',
			//
			'vc_admin_label' => false,
		);
		$fields['icon']          = array(
			'desc'           => __( 'Select custom icon for widget.', 'publisher' ),
			'name'           => __( 'Title Icon (Optional)', 'publisher' ),
			'type'           => 'icon_select',
			'id'             => 'icon',
			'std'            => '',
			//
			'vc_admin_label' => false,
		);
		$fields['heading_color'] = array(
			'name'           => __( 'Heading Custom Color', 'publisher' ),
			'desc'           => __( 'Change block heading color.', 'publisher' ),
			'id'             => 'heading_color',
			'std'            => '',
			'type'           => 'color',
			//
			'vc_admin_label' => false,
		);
		$fields['heading_style'] = array(
			'name'             => __( 'Custom Heading Style', 'publisher' ),
			'desc'             => __( 'Specialize this block with custom heading.', 'publisher' ),
			'id'               => 'heading_style',
			'type'             => 'select_popup',
			'std'              => 'default',
			'deferred-options' => array(
				'callback' => 'publisher_cb_heading_option_list',
				'args'     => array(
					true
				),
			),
			'column_class'     => 'one-column',
			//
			'vc_admin_label'   => false,
		);
		$fields['title_link']    = array(
			'name'           => __( 'Custom link (Optional)', 'publisher' ),
			'desc'           => __( 'Title will be linked to this URL.', 'publisher' ),
			'id'             => 'title_link',
			'type'           => 'text',
			//
			'vc_admin_label' => false,
		);

		return $fields;
	} // heading_fields

} // Publisher
