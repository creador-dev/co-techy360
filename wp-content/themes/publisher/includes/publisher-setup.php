<?php


/**
 * Publisher Setup
 */
class Publisher_Setup {

	/**
	 * Envato marketplace item ID
	 */
	const item_id = 15801051;


	function __construct() {

		// Register included BF to loader ( After Plugins )
		add_filter( 'better-framework/loader', array( $this, 'register_better_framework' ), 100 );

		add_filter( 'better-framework/oculus/loader', array( $this, 'register_oculus' ), 90 );

		if ( is_admin() ) {
			add_filter( 'better-framework/product-updater/loader', array( $this, 'register_updater' ), 90 );

			//TODO: display update notice  after plugins.php page update checking process completed
			add_action( 'better-framework/product-pages/plugin-update-check', 'Publisher_Setup::add_update_notice' );
			add_action( 'better-framework/product-pages/product-update-check', 'Publisher_Setup::add_update_notice' );
		}

		// Enable needed sections
		add_filter( 'better-framework/sections', array( $this, 'setup_bf_features' ), 100 );

		// Configs "BF Editor Shortcodes" library
		add_filter( 'better-framework/editor-shortcodes/config', array( $this, 'editor_shortcodes_config' ), 100 );

		// Config Version Compatibility library
		include PUBLISHER_THEME_PATH . 'includes/version-compatibilities.php';
		add_filter( 'better-framework/version-compatibility/config', array(
			$this,
			'config_version_compatibility'
		) );
		add_filter( 'better-framework/version-compatibility/checked', 'Publisher_Setup::after_theme_updated' );


		if ( is_admin() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
			/*
			 * i18n
			 */
			load_theme_textdomain( 'publisher', get_template_directory() . '/languages' );
		} else {

			if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
				add_action( 'admin_bar_menu', array( 'Publisher_Setup', 'append_theme_admin_bar_menu' ), 99 );
			}

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_admin_icons' ), 99 );
		}

		// Option options
		include PUBLISHER_THEME_PATH . 'includes/options/panel.php';


		// Meta box options
		include PUBLISHER_THEME_PATH . 'includes/options/metabox.php';

		// Category meta box
		include PUBLISHER_THEME_PATH . 'includes/options/category.php';

		// User Meta box options
		include PUBLISHER_THEME_PATH . 'includes/options/user.php';

		// Tag options
		include PUBLISHER_THEME_PATH . 'includes/options/tag.php';

		// Menus options
		include PUBLISHER_THEME_PATH . 'includes/options/menu.php';

		// Widgets options
		include PUBLISHER_THEME_PATH . 'includes/options/widget.php';

		// Init translation texts
		include PUBLISHER_THEME_PATH . 'includes/options/translation.php';

		// Init Ad Locations
		include PUBLISHER_THEME_PATH . 'includes/ads/ads.php';

		// Init Newsletter Location
		include PUBLISHER_THEME_PATH . 'includes/newsletters/init.php';

		// Active and new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 100 );

		// Add custom items to editor shortcodes menu
		add_filter( 'better-framework/editor-shortcodes/shortcodes-array', array(
			$this,
			'setup_editor_shortcodes_menu'
		), 10 );

		// Initialize no duplicate posts option
		add_action( 'publisher-theme-core/duplicate-posts/config', array( $this, 'setup_no_duplicate_posts' ) );

		// Config shortcodes placeholder
		add_filter( 'publisher-theme-core/shortcodes-placeholder/config', array( $this, 'shortcodes_placeholder' ) );

		// Inits WooCommerce functionality
		if ( function_exists( 'is_woocommerce' ) ) {
			include PUBLISHER_THEME_PATH . 'includes/woocommerce/publisher-wc.php';
		}

		if ( is_user_logged_in() ) {
			add_action( 'better-framework/product-pages/register-menu/params', array(
				$this,
				'set_adminbar_visibility'
			) );
		}

		// Breadcrumb config
		add_filter( 'better-framework/breadcrumb/options', array( $this, 'bf_breadcrumb_config' ), 100 );

		// Register multi level mega menus
		add_action( 'better-framework/menu/walker/init', 'Publisher_Setup::setup_mega_menus', 1, 2 );

		add_filter( 'better-framework/template-compatibility/config', 'Publisher_Setup::enable_template_compatibility' );
		add_filter( 'better-framework/product-pages/system-report/theme-compatibility', 'Publisher_Setup::enable_template_compatibility' );
		add_action( 'better-framework/template-compatibility/done', 'Publisher_Setup::add_template_compatibility_up2date_message' );

		// Config widget & mega-menu cache in booster
		add_filter( 'better-framework/booster/widgets/config', 'Publisher_Setup::widgets_list2cache', 1 );
		add_filter( 'better-framework/booster/mega-menu/config', 'Publisher_Setup::mega_menus_list2cache', 1 );
		add_filter( 'better-framework/booster/shortcodes/config', 'Publisher_Setup::shortcodes_list2cache', 1 );

		add_filter( 'better-framework/booster/widgets/cache', 'Publisher_Setup::disable_widget_caching', 15, 4 );
		add_filter( 'better-framework/booster/shortcodes/cache', 'Publisher_Setup::disable_shortcode_caching', 15, 2 );

		//
		add_filter( 'better-framework/gutenberg/sticky-fields', array( $this, 'append_gutenberg_shared_fields_list' ) );
		add_filter( 'better-framework/gutenberg/sticky-stds', array( $this, 'append_gutenberg_shared_fields_std' ) );

		// bbPress customizations
		if ( class_exists( 'bbpress' ) ) {
			include PUBLISHER_THEME_PATH . 'includes/bbpress/class-publisher-bbpress.php';
			new Publisher_bbPress();
		}

	} // __construct


	public function enqueue_admin_icons() {

		if ( ! is_user_logged_in() ) {
			return;
		}

		bf_enqueue_style( 'better-studio-admin-icon' );
	}


	/**
	 * Set publisher admin bar menu visibility status
	 *
	 * @param array $menu
	 *
	 * @return array
	 */
	public function set_adminbar_visibility( $menu ) {

		if ( $menu['on_admin_bar'] ) {
			$menu['on_admin_bar'] = publisher_get_option( 'display_themename_adminbar_menu' );
		}

		return $menu;
	}


	/**
	 * Adds Publisher menu to WP Navbar
	 *
	 * @param $wp_admin_bar
	 */
	public static function append_theme_admin_bar_menu( $wp_admin_bar ) {

		if ( ! publisher_get_option( 'display_themename_adminbar_menu' ) ) {
			return;
		}


		/**
		 * @var WP_Admin_Bar $wp_admin_bar
		 */
		$plugins_update_badge = '';
		$update_status        = get_option( 'bs-product-plugins-status' );
		if ( ! empty( $update_status->number ) ) {
			$plugins_update_badge = '&nbsp;<span class="bs-admin-menu-badge"><span class="plugin-count">'
			                        . number_format_i18n( $update_status->number ) .
			                        '</span></span>';
		}

		{
			$icon       = publisher_white_label_get_option( 'theme_icon' );
			$icon_class = '';

			switch ( $icon['type'] ) {

				case 'bs-icons':
					$icon_class = 'bsfii';
					break;

				case 'fontawesome':
					$icon_class = 'fai';
					break;
			}
		}

		$wp_admin_bar->add_node( array(
				'id'     => 'bs-product-pages-welcome-parent',
				'title'  => '<p class="bf-admin-bar-icon-bs-product-pages-welcome" style="margin-' . ( is_rtl() ? 'left' : 'right' ) . ': 6px;vertical-align: middle;line-height: 21px;display: inline-block;">' . bf_get_icon_tag( $icon, $icon_class ) . '</p>' .
				            publisher_white_label_get_option( 'publisher' ) . $plugins_update_badge,
				'href'   => admin_url( 'admin.php?page=bs-product-pages-welcome' ),
				'parent' => false,
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'bs-product-pages-welcome',
				'title'  => __( 'Welcome', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=bs-product-pages-welcome' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'bs-product-pages-install-plugin',
				'title'  => __( 'Plugins', 'publisher' ) . $plugins_update_badge,
				'href'   => admin_url( 'admin.php?page=bs-product-pages-install-plugin' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'bs-product-pages-install-demo',
				'title'  => __( 'Install Demos', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=bs-product-pages-install-demo' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'publisher-page-templates',
				'title'  => __( 'Page Templates', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=better-studio/page-templates' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'better-studio/' . publisher_white_label_get_option( 'theme_slug' ),
				'title'  => __( 'Theme Options', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=' . 'better-studio/' . publisher_white_label_get_option( 'theme_slug' ) ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'better-studio/translations/theme-translation',
				'title'  => __( 'Theme Translation', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=better-studio/translations/theme-translation' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'bs-product-pages-support',
				'title'  => __( 'Support', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=bs-product-pages-support' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);
		$wp_admin_bar->add_node( array(
				'id'     => 'bs-product-pages-report',
				'title'  => __( 'System Report', 'publisher' ),
				'href'   => admin_url( 'admin.php?page=bs-product-pages-report' ),
				'parent' => 'bs-product-pages-welcome-parent',
			)
		);

	}


	/**
	 * Get a WP_Theme object for a theme
	 *
	 * @return WP_Theme
	 */
	public static function get_wp_theme_object() {

		$theme = wp_get_theme();
		if ( '' != $theme->get( 'Template' ) ) {
			$theme = wp_get_theme( $theme->get( 'Template' ) );
		}

		return $theme;
	}


	/**
	 * Get active theme version number
	 *
	 * @param array $config
	 *
	 * @return array
	 */
	public function config_version_compatibility( $config ) {

		$config['products']['publisher'] = array(
			'active-version' => self::get_wp_theme_object()->get( 'Version' )
		);

		$config['compatibility-actions']['publisher'] = array(
			'1.1'   => 'publisher_version_1_1_compatibility',
			'1.4'   => 'publisher_version_1_4_compatibility',
			'1.5'   => 'publisher_version_1_5_compatibility',
			'1.6'   => 'publisher_version_1_6_compatibility',
			'1.7.0' => 'publisher_version_1_7_compatibility',
			'1.7.1' => 'publisher_version_1_7_1_compatibility',
			'1.7.5' => 'publisher_version_1_7_5_compatibility',
			'1.8.0' => 'publisher_version_1_8_0_compatibility',
			'1.8.4' => 'publisher_version_1_8_4_compatibility',
			'1.9.0' => 'publisher_version_1_9_0_compatibility',
			'3.0.1' => 'publisher_version_3_0_1_compatibility',
			'5.0.0' => 'publisher_version_5_0_compatibility',
			'7.5.0' => 'publisher_version_7_5_0_compatibility',
			'7.5.1' => 'publisher_version_7_5_1_compatibility',
			'7.6.0' => 'publisher_version_7_6_0_compatibility',
		);

		return $config;
	}


	/**
	 * Registers included version of BF to BF loader
	 *
	 * @param $frameworks
	 *
	 * @return array
	 */
	function register_better_framework( $frameworks ) {

		$frameworks[] = array(
			'version' => '3.10.15',
			'path'    => PUBLISHER_THEME_PATH . 'includes/libs/better-framework/',
			'uri'     => PUBLISHER_THEME_URI . 'includes/libs/better-framework/',
		);

		return $frameworks;
	}


	/**
	 * Register oculus library
	 *
	 * @param array $libs
	 *
	 * @return array
	 */
	function register_oculus( $libs ) {

		$libs[] = array(
			'version' => '1.2.0',
			'path'    => PUBLISHER_THEME_PATH . 'includes/libs/better-framework/oculus/',
			'uri'     => PUBLISHER_THEME_URI . 'includes/libs/better-framework/oculus/',
		);

		return $libs;
	}


	/**
	 * Register updater library
	 *
	 * @param array $libs
	 *
	 * @return array
	 */
	function register_updater( $libs ) {

		$libs[] = array(
			'version' => '1.0.1',
			'path'    => PUBLISHER_THEME_PATH . 'includes/libs/better-product-updater/',
			'uri'     => PUBLISHER_THEME_URI . 'includes/libs/better-product-updater/'
		);

		return $libs;
	}


	/**
	 * Setups features of BetterFramework
	 *
	 * @param $features
	 *
	 * @return array
	 */
	function setup_bf_features( $features ) {

		/**
		 * 1. => BetterFramework Features
		 */
		$features['admin_panel']            = true;
		$features['meta_box']               = true;
		$features['taxonomy_meta_box']      = true;
		$features['load_in_frontend']       = false;
		$features['better-menu']            = true;
		$features['custom-css-pages']       = true;
		$features['user-meta-box']          = true;
		$features['custom-css-users']       = true;
		$features['vc-extender']            = true;
		$features['booster']                = true;
		$features['content-injector']       = true;
		$features['json-ld']                = true;
		$features['product-pages']          = is_admin();
		$features['product-updater']        = is_admin();
		$features['version-compatibility']  = true;
		$features['template-compatibility'] = is_admin();
		$features['editor-shortcodes']      = true;
		$features['fonts-manager']          = true;

		return $features;
	}


	/**
	 * Setups Shortcodes
	 *
	 * 6. => Setup Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	function setup_shortcodes( $shortcodes ) {

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-highlight-colors.php';
		$shortcodes['bs-highlight-bg']    = array(
			'shortcode_class' => 'Publisher_Highlight_BG_Shortcode',
		);
		$shortcodes['bs-highlight-color'] = array(
			'shortcode_class' => 'Publisher_Highlight_Color_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-modern-grid-listings.php';
		$shortcodes['bs-modern-grid-listing-1']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_1_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-2']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_2_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-3']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_3_Shortcode',
			'widget_class'    => 'Publisher_Modern_Grid_Listing_3_Widget',
		);
		$shortcodes['bs-modern-grid-listing-4']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_4_Shortcode',
			'widget_class'    => 'Publisher_Modern_Grid_Listing_4_Widget',
		);
		$shortcodes['bs-modern-grid-listing-5']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_5_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-6']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_6_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-7']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_7_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-8']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_8_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-9']  = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_9_Shortcode',
		);
		$shortcodes['bs-modern-grid-listing-10'] = array(
			'shortcode_class' => 'Publisher_Modern_Grid_Listing_10_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-mix-listings.php';
		$shortcodes['bs-mix-listing-1-1'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_1_1_Shortcode',
		);
		$shortcodes['bs-mix-listing-1-2'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_1_2_Shortcode',
		);
		$shortcodes['bs-mix-listing-1-3'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_1_3_Shortcode',
		);
		$shortcodes['bs-mix-listing-1-4'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_1_4_Shortcode',
		);
		$shortcodes['bs-mix-listing-2-1'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_2_1_Shortcode',
		);
		$shortcodes['bs-mix-listing-2-2'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_2_2_Shortcode',
		);
		$shortcodes['bs-mix-listing-3-1'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_3_1_Shortcode',
			'widget_class'    => 'Publisher_Mix_Listing_3_1_Widget',
		);
		$shortcodes['bs-mix-listing-3-2'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_3_2_Shortcode',
			'widget_class'    => 'Publisher_Mix_Listing_3_2_Widget',
		);
		$shortcodes['bs-mix-listing-3-3'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_3_3_Shortcode',
			'widget_class'    => 'Publisher_Mix_Listing_3_3_Widget',
		);
		$shortcodes['bs-mix-listing-3-4'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_3_4_Shortcode',
			'widget_class'    => 'Publisher_Mix_Listing_3_4_Widget',
		);
		$shortcodes['bs-mix-listing-4-1'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_1_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-2'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_2_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-3'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_3_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-4'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_4_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-5'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_5_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-6'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_6_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-7'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_7_Shortcode',
		);
		$shortcodes['bs-mix-listing-4-8'] = array(
			'shortcode_class' => 'Publisher_Mix_Listing_4_8_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-blog-listings.php';
		$shortcodes['bs-blog-listing-1'] = array(
			'shortcode_class' => 'Publisher_Blog_Listing_1_Shortcode',
		);
		$shortcodes['bs-blog-listing-2'] = array(
			'shortcode_class' => 'Publisher_Blog_Listing_2_Shortcode',
		);
		$shortcodes['bs-blog-listing-3'] = array(
			'shortcode_class' => 'Publisher_Blog_Listing_3_Shortcode',
		);
		$shortcodes['bs-blog-listing-4'] = array(
			'shortcode_class' => 'Publisher_Blog_Listing_4_Shortcode',
		);
		$shortcodes['bs-blog-listing-5'] = array(
			'shortcode_class' => 'Publisher_Blog_Listing_5_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-classic-listings.php';
		$shortcodes['bs-classic-listing-1'] = array(
			'shortcode_class' => 'Publisher_Classic_Listing_1_Shortcode',
		);
		$shortcodes['bs-classic-listing-2'] = array(
			'shortcode_class' => 'Publisher_Classic_Listing_2_Shortcode',
		);
		$shortcodes['bs-classic-listing-3'] = array(
			'shortcode_class' => 'Publisher_Classic_Listing_3_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-grid-listings.php';
		$shortcodes['bs-grid-listing-1'] = array(
			'shortcode_class' => 'Publisher_Grid_Listing_1_Shortcode',
		);
		$shortcodes['bs-grid-listing-2'] = array(
			'shortcode_class' => 'Publisher_Grid_Listing_2_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-thumbnail-listings.php';
		$shortcodes['bs-thumbnail-listing-1'] = array(
			'shortcode_class' => 'Publisher_Thumbnail_Listing_1_Shortcode',
			'widget_class'    => 'Publisher_Thumbnail_Listing_1_Widget',
		);
		$shortcodes['bs-thumbnail-listing-2'] = array(
			'shortcode_class' => 'Publisher_Thumbnail_Listing_2_Shortcode',
			'widget_class'    => 'Publisher_Thumbnail_Listing_2_Widget',
		);
		$shortcodes['bs-thumbnail-listing-3'] = array(
			'shortcode_class' => 'Publisher_Thumbnail_Listing_3_Shortcode',
			'widget_class'    => 'Publisher_Thumbnail_Listing_3_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-text-listings.php';
		$shortcodes['bs-text-listing-1'] = array(
			'shortcode_class' => 'Publisher_Text_Listing_1_Shortcode',
			'widget_class'    => 'Publisher_Text_Listing_1_Widget',
		);
		$shortcodes['bs-text-listing-2'] = array(
			'shortcode_class' => 'Publisher_Text_Listing_2_Shortcode',
			'widget_class'    => 'Publisher_Text_Listing_2_Widget',
		);
		$shortcodes['bs-text-listing-3'] = array(
			'shortcode_class' => 'Publisher_Text_Listing_3_Shortcode',
			'widget_class'    => 'Publisher_Text_Listing_3_Widget',
		);
		$shortcodes['bs-text-listing-4'] = array(
			'shortcode_class' => 'Publisher_Text_Listing_4_Shortcode',
			'widget_class'    => 'Publisher_Text_Listing_4_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-tall-listings.php';
		$shortcodes['bs-tall-listing-1'] = array(
			'shortcode_class' => 'Publisher_Tall_Listing_1_Shortcode',
		);
		$shortcodes['bs-tall-listing-2'] = array(
			'shortcode_class' => 'Publisher_Tall_Listing_2_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-sliders.php';
		$shortcodes['bs-slider-1'] = array(
			'shortcode_class' => 'Publisher_Slider_1_Shortcode',
		);
		$shortcodes['bs-slider-2'] = array(
			'shortcode_class' => 'Publisher_Slider_2_Shortcode',
		);
		$shortcodes['bs-slider-3'] = array(
			'shortcode_class' => 'Publisher_Slider_3_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-boxes.php';
		$shortcodes['bs-box-1'] = array(
			'shortcode_class' => 'Publisher_Box_1_Shortcode',
			'widget_class'    => 'Publisher_Box_1_Widget',
		);
		$shortcodes['bs-box-2'] = array(
			'shortcode_class' => 'Publisher_Box_2_Shortcode',
			'widget_class'    => 'Publisher_Box_2_Widget',
		);
		$shortcodes['bs-box-3'] = array(
			'shortcode_class' => 'Publisher_Box_3_Shortcode',
			'widget_class'    => 'Publisher_Box_3_Widget',
		);
		$shortcodes['bs-box-4'] = array(
			'shortcode_class' => 'Publisher_Box_4_Shortcode',
			'widget_class'    => 'Publisher_Box_4_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-social-share.php';
		$shortcodes['bs-social-share'] = array(
			'shortcode_class' => 'Publisher_Social_Share_Shortcode',
			'widget_class'    => 'Publisher_Social_Share_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-recent-posts.php';
		$shortcodes['bs-recent-posts'] = array(
			'shortcode_class' => 'Publisher_Recent_Posts_Shortcode',
			'widget_class'    => 'Publisher_Recent_Posts_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-about.php';
		$shortcodes['bs-about'] = array(
			'shortcode_class' => 'Publisher_About_Shortcode',
			'widget_class'    => 'Publisher_About_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-popular-categories.php';
		$shortcodes['bs-popular-categories'] = array(
			'shortcode_class' => 'Publisher_Popular_Categories_Shortcode',
			'widget_class'    => 'Publisher_Popular_Categories_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-newsletter-mailchimp.php';
		$shortcodes['bs-newsletter-mailchimp'] = array(
			'shortcode_class' => 'Publisher_Newsletter_MailChimp_Shortcode',
			'widget_class'    => 'Publisher_Newsletter_MailChimp_Widget',
		);

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-newsletter-feedburner.php';
		$shortcodes['bs-subscribe-newsletter'] = array(
			'shortcode_class' => 'Publisher_Subscribe_Newsletter_Shortcode',
			'widget_class'    => 'Publisher_Subscribe_Newsletter_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-flickr.php';
		$shortcodes['bs-flickr'] = array(
			'shortcode_class' => 'Publisher_Flickr_Shortcode',
			'widget_class'    => 'Publisher_Flickr_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-likebox.php';
		$shortcodes['bs-likebox'] = array(
			'shortcode_class' => 'Publisher_Likebox_Shortcode',
			'widget_class'    => 'Publisher_Likebox_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-dribbble.php';
		$shortcodes['bs-dribbble'] = array(
			'shortcode_class' => 'Publisher_Dribbble_Shortcode',
			'widget_class'    => 'Publisher_Dribbble_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-google-plus.php';
		$shortcodes['bs-google-plus'] = array(
			'shortcode_class' => 'Publisher_Google_Plus_Shortcode',
			'widget_class'    => 'Publisher_Google_Plus_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-embed.php';
		$shortcodes['bs-embed'] = array(
			'shortcode_class' => 'Publisher_Embed_Shortcode',
			'widget_class'    => 'Publisher_Embed_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-instagram.php';
		$shortcodes['bs-instagram'] = array(
			'shortcode_class' => 'Publisher_Instagram_Shortcode',
			'widget_class'    => 'Publisher_Instagram_Widget',
		);

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-login.php';
		$shortcodes['bs-login'] = array(
			'shortcode_class' => 'Publisher_Login_Shortcode',
			'widget_class'    => 'Publisher_Login_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/better-newsticker.php';
		$shortcodes['better-newsticker'] = array(
			'shortcode_class' => 'Better_Newsticker_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-text.php';
		$shortcodes['bs-text'] = array(
			'shortcode_class' => 'Publisher_Text_Shortcode',
		);

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-heading.php';
		$shortcodes['bs-heading'] = array(
			'shortcode_class' => 'Publisher_Heading_Shortcode',
		);

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/tabs.php';
		$shortcodes['tab']  = array(
			'shortcode_class'   => 'Publisher_Tab_Shortcode',
			'skip_page_builder' => true,
		);
		$shortcodes['tabs'] = array(
			'shortcode_class' => 'Publisher_Tabs_Shortcode',
		);

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/accordions.php';
		$shortcodes['accordion']  = array(
			'shortcode_class'   => 'Publisher_Accordion_Panel_Shortcode',
			'skip_page_builder' => true,
		);
		$shortcodes['accordions'] = array(
			'shortcode_class' => 'Publisher_Accordions_Shortcode',
		);

		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-white-space.php';
		$shortcodes['bs-white-space'] = array(
			'shortcode_class' => 'Publisher_White_Space_Shortcode',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/listing-shortcodes/bs-user-listing.php';
		$shortcodes['bs-user-listing-1'] = array(
			'shortcode_class' => 'Publisher_User_Listing_1_Shortcode',
			'widget_class'    => 'Publisher_User_Listing_1_Widget',
		);
		$shortcodes['bs-user-listing-2'] = array(
			'shortcode_class' => 'Publisher_User_Listing_2_Shortcode',
			'widget_class'    => 'Publisher_User_Listing_2_Widget',
		);
		$shortcodes['bs-user-listing-3'] = array(
			'shortcode_class' => 'Publisher_User_Listing_3_Shortcode',
			'widget_class'    => 'Publisher_User_Listing_3_Widget',
		);
		$shortcodes['bs-user-listing-4'] = array(
			'shortcode_class' => 'Publisher_User_Listing_4_Shortcode',
			'widget_class'    => 'Publisher_User_Listing_4_Widget',
		);
		$shortcodes['bs-user-listing-5'] = array(
			'shortcode_class' => 'Publisher_User_Listing_5_Shortcode',
			'widget_class'    => 'Publisher_User_Listing_5_Widget',
		);


		include PUBLISHER_THEME_PATH . 'includes/shortcodes/bs-push-notification.php';
		$shortcodes['bs-push-notification'] = array(
			'shortcode_class' => 'Publisher_Push_Notification_Shortcode',
			'widget_class'    => 'Publisher_Push_Notification_Widget',
		);


		return $shortcodes;
	}


	/**
	 * Callback: Activate BetterStudio Duplicate Posts
	 *
	 * @param $active_pages
	 *
	 * @return array
	 */
	function setup_no_duplicate_posts( $active_pages ) {

		if ( publisher_get_option( 'bs_remove_duplicate_posts_full' ) ) {
			$active_pages[] = 'full';
		} else {

			if ( publisher_get_option( 'bs_remove_duplicate_posts' ) ) {
				$active_pages[] = 'home';
			}

			if ( publisher_get_option( 'bs_remove_duplicate_posts_categories' ) ) {
				$active_pages[] = 'categories';
			}

			if ( publisher_get_option( 'bs_remove_duplicate_posts_tags' ) ) {
				$active_pages[] = 'tags';
			}

		}

		return $active_pages;
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
		$config['editor-dynamic-style'][] = PUBLISHER_THEME_PATH . 'includes/dynamics/style-dynamic-init.php';

		// Publisher icon
		$config['icon']       = publisher_white_label_get_option( 'theme_icon' );
		$config['icon-color'] = publisher_get_option( 'theme_color' );

		// name
		$config['name'] = publisher_white_label_get_option( 'publisher' );

		// Sizes
		$config['layout-2-col'] = publisher_get_option( 'layout-2-col' );
		$config['layout-3-col'] = publisher_get_option( 'layout-3-col' );

		// Show sidebars
		$config['layouts'] = publisher_get_option( 'advanced_post_editor_sidebars' );

		return $config;

	}


	/**
	 * Callback: configs shortcodes placeholder for theme
	 * Filter: better-template/shortcodes-placeholder/config
	 *
	 * @param $config
	 *
	 * @return array
	 */
	public function shortcodes_placeholder( $config ) {

		$plugins_url = admin_url( 'admin.php?page=bs-product-pages-install-plugin' );

		$notice = __( 'Please install "<b>%s</b>" Plugin from <a href="%s">Plugin Installer</a> to show this shortcode.', 'publisher' );

		$special_sidebars = array();


		$config['better-social-counter'] = array(
			'id'               => 'better-social-counter',
			'notice_long'      => sprintf( $notice, __( 'Better Social Counter', 'publisher' ), $plugins_url ),
			bf_trans_allowed_html(),
			'special_sidebars' => $special_sidebars,
		);
		$config['better-social-banner']  = array(
			'id'               => 'better-social-banner',
			'notice_long'      => sprintf( $notice, __( 'Better Social Counter', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);


		$config['BetterWeather']        = array(
			'id'               => 'BetterWeather',
			'notice_long'      => sprintf( $notice, __( 'Better Weather', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['BetterWeather-inline'] = array(
			'id'               => 'BetterWeather-inline',
			'notice_long'      => sprintf( $notice, __( 'Better Weather', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);


		$config['better-ads'] = array(
			'id'               => 'better-ads',
			'notice_long'      => sprintf( $notice, __( 'Better Ads Manager', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);


		$config['better-post-views'] = array(
			'id'               => 'better-post-views',
			'notice_long'      => sprintf( $notice, __( 'Better Post Views', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);


		$config['bs-youtube-playlist-1'] = array(
			'id'               => 'bs-youtube-playlist-1',
			'notice_long'      => sprintf( $notice, __( 'Better Playlist', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bs-youtube-playlist-2'] = array(
			'id'               => 'bs-youtube-playlist-2',
			'notice_long'      => sprintf( $notice, __( 'Better Playlist', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bs-vimeo-playlist-1']   = array(
			'id'               => 'bs-vimeo-album-1',
			'notice_long'      => sprintf( $notice, __( 'Better Playlist', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bs-vimeo-playlist-2']   = array(
			'id'               => 'bs-vimeo-album-2',
			'notice_long'      => sprintf( $notice, __( 'Better Playlist', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);

		$config['bs-products-1'] = array(
			'id'               => 'bs-products-1',
			'notice_long'      => sprintf( $notice, __( 'WooCommerce', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);

		$config['bsfp-cryptocurrency']           = array(
			'id'               => 'bsfp-cryptocurrency',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-cryptocurrency-table']     = array(
			'id'               => 'bsfp-cryptocurrency-table',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-cryptocurrency-events']    = array(
			'id'               => 'bsfp-cryptocurrency-events',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-cryptocurrency-converter'] = array(
			'id'               => 'bsfp-cryptocurrency-converter',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-stockmarket']              = array(
			'id'               => 'bsfp-stockmarket',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-stockmarket-table']        = array(
			'id'               => 'bsfp-stockmarket-table',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-currency']                 = array(
			'id'               => 'bsfp-currency',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);
		$config['bsfp-currency-converter']       = array(
			'id'               => 'bsfp-currency-converter',
			'notice_long'      => sprintf( $notice, __( 'Financial Pack', 'publisher' ), $plugins_url ),
			'special_sidebars' => $special_sidebars,
		);

		return $config;
	}


	/**
	 * Configouration for BF Breadcrumb
	 *
	 * @hooked better-framework/breadcrumb/options
	 *
	 * @param $options
	 *
	 * @return array
	 */
	public function bf_breadcrumb_config( $options ) {

		$options['labels'] = array(
			'aria_label'          => 'Breadcrumbs',
			'home'                => publisher_translation_get( 'bc_home' ),
			'error_404'           => publisher_translation_get( 'bc_404' ),
			'archives'            => publisher_translation_get( 'bc_archives' ),
			'search'              => publisher_translation_get( 'bc_search' ),
			'paged'               => publisher_translation_get( 'bc_paged' ),
			'archive_minute'      => publisher_translation_get( 'bc_archive_minute' ),
			'archive_week'        => publisher_translation_get( 'bc_archive_week' ),
			'archive_minute_hour' => '%s',
			'archive_hour'        => '%s',
			'archive_day'         => '%s',
			'archive_month'       => '%s',
			'archive_year'        => '%s',
		);

		$options['show_date_in_post'] = publisher_get_option( 'breadcrumb_date_in_post' ) !== 'hide';

		if ( publisher_get_option( 'breadcrumb_post_categories' ) !== 'hide' ) {

			$taxonomies = array();

			if ( bf_taxonomy_supports_post_type( 'category', 'post' ) ) {
				$taxonomies['post'] = 'category';
			}

			if ( bf_taxonomy_supports_post_type( 'category', 'page' ) ) {
				$taxonomies['page'] = 'category';
			}

			$options['post_taxonomy'] = $taxonomies;
			unset( $taxonomies );
		}

		return $options;

	} // bf_breadcrumb_config


	/**
	 * Register list of Publisher mega-menus
	 *
	 * @param BF_Menu_Walker $walker
	 *
	 * @since 1.8.0
	 * @return BF_Menu_Walker
	 */
	public static function setup_mega_menus( &$walker ) {

		if ( $walker instanceof BF_Menu_Walker ) {
			$fields = $walker->get_mega_menu_fields_id();

			if ( isset( $fields['mega_menu'] ) ) {

				$fields['mega_menu']['options'] = publisher_mega_menus_list();

				$walker->set_mega_menu_fields_id( $fields );
			}
		}

		return $walker;
	}


	/**
	 * Active template compatibility analyzer
	 *
	 * @param array $config
	 *
	 * @since 1.8.4
	 * @return array
	 */
	public static function enable_template_compatibility( $config ) {

		$force = ! empty( $_GET['template-compatibility'] ) // Handle check again requests
		         || current_filter() === 'better-framework/product-pages/system-report/theme-compatibility';

		$version     = self::get_wp_theme_object()->get( 'Version' );
		$stylesheet  = trailingslashit( get_stylesheet_directory() );
		$template    = trailingslashit( get_template_directory() );
		$callback    = 'Publisher_Setup::check_template_compatibility';
		$directories = array( 'views', 'vc_templates', 'bbpress' ); // override directories

		// TODO: Refactor template compatibility library to use single callback call for all following directories
		foreach ( $directories as $directory ) {

			$config['scan_dir'][] = array(
				'version'  => $version,
				'override' => $stylesheet . $directory,
				'parent'   => $template . $directory,
				'callback' => $callback,
				'options'  => array(
					'recursive'        => true,
					'valid_extensions' => array( 'php' ),
				),
				'force'    => $force,
			);
		}

		$config['scan_dir'][] = array(
			'version'  => $version,
			'override' => $stylesheet,
			'parent'   => $template,
			'callback' => $callback,
			'options'  => array(
				'exclude'          => array( 'functions.php' ),
				'recursive'        => false,
				'valid_extensions' => array( 'php' ),
			),
			'force'    => $force,
		);

		return $config;
	}


	/**
	 * Display notice about child-theme outdated files
	 *
	 * @param array $outdated_files
	 *
	 * @since 1.8.4
	 * @return bool
	 */
	public static function check_template_compatibility( $outdated_files ) {

		static $get_options = false;

		if ( $get_options ) {
			$incompatible_files = get_option( 'publisher-incompatible-files', array() );
		} else {
			$get_options        = true;
			$incompatible_files = array();
		}
		$incompatible_files = array_merge( $outdated_files, $incompatible_files );
		update_option( 'publisher-incompatible-files', $incompatible_files );

		bf_add_notice( array(
			'msg'            => array( 'Publisher_Setup', 'update_notice_message' ),
			'notice-icon'    => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
			'product'        => 'theme:publisher',
			'type'           => 'fixed',
			'class'          => 'publisher-override-notice',
			'state'          => 'danger',
			'id'             => 'publisher-v' . self::get_wp_theme_object()->get( 'Version' ),
			'show_all_label' => __( '… See all outdated files', 'publisher' ),
			'_message_type'  => 'template',
		) );

		return true;
	}


	/**
	 * Display up to date message after checking if no outdated file was found
	 *
	 * @param array $all_outdated_files
	 *
	 * @since 1.8.5
	 */
	public static function add_template_compatibility_up2date_message( $all_outdated_files ) {

		if ( is_child_theme() && ! array_filter( $all_outdated_files ) ) {

			delete_option( 'publisher-incompatible-files' );

			bf_add_notice( array(
				'msg'         => __( 'Done! all child-theme files are up to date', 'publisher' ),
				'notice-icon' => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
				'product'     => 'theme:publisher',
				'state'       => 'success',
				'id'          => 'publisher-up2date-v' . self::get_wp_theme_object()->get( 'Version' ),
			) );
		}
	}


	/**
	 * Add notice for theme/plugin updates
	 *
	 * @since 1.8.4
	 *
	 * @param array $update_status
	 */
	public static function add_update_notice( $update_status = array() ) {

		if ( ! $update_status ) {
			return;
		}

		//
		// Theme Update Notice
		//

		if ( ! empty( $update_status->themes ) ) {

			$product_params = publisher_bs_register_product_params();
			$item_id        = $product_params['item_id'];

			if ( ! empty( $update_status->themes[ $item_id ] ) ) {

				bf_add_notice( array(
					'msg'            => array( 'Publisher_Setup', 'update_notice_message' ),
					//
					'notice-icon'    => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
					'product'        => 'theme:publisher',
					'type'           => 'fixed',
					'class'          => 'publisher-update-notice',
					'state'          => 'success',
					'id'             => 'publisher-new-version',
					'show_all_label' => __( '… See all plugins', 'publisher' ),
					'_message_type'  => 'theme-update',
				) );
			}
		}

		//
		// Plugin Update Notice
		//
		if ( ! empty( $update_status->remote_plugins ) ) {

			foreach ( $update_status->remote_plugins as $plugin_path => $plugin ) {

				if ( ! class_exists( 'BF_Product_Plugin_Installer' ) ) {
					Better_Framework::factory( 'product-pages' );
					require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
				}

				// Skip inactivate plugins
				if ( ! isset( $plugin['slug'] ) ||
				     ! BF_Product_Plugin_Installer::is_plugin_installed( $plugin['slug'] ) ||
				     ! BF_Product_Plugin_Installer::is_plugin_active( $plugin['slug'] )
				) {
					continue;
				}

				bf_add_notice( array(
					'msg'            => array( 'Publisher_Setup', 'update_notice_message' ),
					//
					'notice-icon'    => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
					'product'        => 'theme:publisher',
					'type'           => 'fixed',
					'class'          => 'publisher-plugin-update-notice',
					'state'          => 'success',
					'id'             => 'publisher-plugin-update',
					'show_all_label' => __( '… See all plugins', 'publisher' ),
					'_message_type'  => 'plugin',
				) );


				break;
			}
		}
	}


	/**
	 *
	 *
	 * @param array            $notice
	 * @param BF_Admin_Notices $self
	 *
	 * @return string
	 */
	public static function update_notice_message( $notice, $self ) {

		if ( empty( $notice['_message_type'] ) ) {
			$self->remove_notice( $notice );

			return '';
		}

		if ( $notice['_message_type'] === 'theme-update' ) {
			global $pagenow;

			// Do not show theme update notice in appearance and updates pages
			if ( $pagenow === 'themes.php' || $pagenow === 'update-core.php' ) {
				return '';
			}

			$product_updates = get_option( 'bf-product-items-status' );

			if ( empty( $product_updates->themes[ Publisher_Setup::item_id ] ) ) {

				$self->remove_notice( $notice );

				return '';
			}

			$theme_update_info = $product_updates->themes[ Publisher_Setup::item_id ];

			$new_version   = $theme_update_info['new_version'];
			$title         = sprintf( __( '%s v%s update is available.', 'publisher' ), publisher_white_label_get_option( 'publisher' ), $new_version );
			$changelog_btn = '';

			if ( ! empty( $theme_update_info['changelog'] ) ) {
				$changelog_btn = sprintf(
					'<a href="%s" class="button button-secondary thickbox">%s</a>',
					add_query_arg( array(
						'TB_iframe' => 'true',
						'width'     => 763,
						'height'    => 1323,
					), $theme_update_info['changelog'] ),
					sprintf( __( 'View v%s Changelog', 'publisher' ), $new_version )
				);
			}

			$text = sprintf( __( 'Update %s', 'publisher' ), publisher_white_label_get_option( 'publisher' ) );

			return sprintf( '<h3 class="title">%s</h3> <a href="%s" class="button button-primary">%s</a> %s',
				$title, get_admin_url( null, 'update-core.php' ), $text, $changelog_btn );


		} elseif ( $notice['_message_type'] === 'template' ) {

			//
			// notice message about child-theme outdated files
			//
			$outdated_files = get_option( 'publisher-incompatible-files' );

			if ( empty( $outdated_files ) ) {
				$self->remove_notice( $notice );

				return '';
			}


			$files = '';
			$label = __( 'current version: %s - updated version: %s', 'publisher' );

			foreach ( $outdated_files as $info ) {

				if ( empty( $info['override_version'] ) ) {
					$info['override_version'] = __( 'undefined', 'publisher' );
				}

				$files .= "\n\t<li>";
				$files .= $info['path'];
				$files .= sprintf( ' <span> (' . $label . ')</span>', $info['override_version'], $info['parent_version'] );
				$files .= '</li>';
			}


			$text = sprintf( __( '%s overrided files in child theme should be updated to latest version:', 'publisher' ), publisher_white_label_get_option( 'publisher' ) );

			return sprintf( '<h3 class="title">%s</h3> <div class="detail"><ul>%s</ul> <a href="%s" class="button button-primary">%s</a></div>', $text, $files,
				add_query_arg( 'template-compatibility', 'check' ), __( 'Check Again', 'publisher' ) );

		} elseif ( $notice['_message_type'] === 'plugin' ) {
			global $pagenow;

			// Do not show plugin update notice in plugins page
			if ( $pagenow === 'admin.php' && isset( $_GET['page'] ) && 'bs-product-pages-install-plugin' === $_GET['page'] ) {
				return;
			}

			//
			// notice message about theme/plugin updates
			//
			$plugins = get_option( 'bs-product-plugins-status' );

			if ( ! $plugins || empty( $plugins->remote_plugins ) ) {

				$self->remove_notice( $notice );

				return '';
			}

			if ( ! function_exists( '_get_plugin_data_markup_translate' ) ) {
				include_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugin2update = '';
			foreach ( $plugins->remote_plugins as $plugin_path => $plugin ) {

				if ( ! class_exists( 'BF_Product_Plugin_Installer' ) ) {
					Better_Framework::factory( 'product-pages' );
					require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
				}

				// Skip inactivate plugins
				if ( ! isset( $plugin['slug'] ) ||
				     ! BF_Product_Plugin_Installer::is_plugin_installed( $plugin['slug'] ) ||
				     ! BF_Product_Plugin_Installer::is_plugin_active( $plugin['slug'] )
				) {
					continue;
				}

				// Get plugin name
				$plugin_file = WP_PLUGIN_DIR . '/' . $plugin_path;
				$plugin_data = _get_plugin_data_markup_translate( $plugin_file, get_plugin_data( $plugin_file ) );
				$plugin_name = $plugin_data['Name'];

				$plugin2update .= sprintf( "<li>\n\t %s v%s</li>", $plugin_name, $plugin['new_version'] );
			}

			if ( $plugin2update ) {

				$msg = sprintf( __( 'Update Available for %s Plugins', 'publisher' ), publisher_white_label_get_option( 'publisher' ) );
				$msg = sprintf( '<h3 class="title">%s</h3> <div class="detail"><ul>%s</ul> ', $msg, $plugin2update );

				$msg .= sprintf(
					'<a href="%s" class="button button-primary">%s</a>',
					get_admin_url( null, 'admin.php?page=bs-product-pages-install-plugin' ), __( 'Update Plugins', 'publisher' )
				);

				$msg .= '</div>';

				return $msg;
			}

			$self->remove_notice( $notice );
		}

		return '';
	}


	/**
	 * List of the Publisher widget which is available for cache
	 *
	 * @since 1.9.0
	 */
	public static function widgets_list2cache() {

		return array(
			'bs-modern-grid-listing-3' => 'long',
			'bs-modern-grid-listing-4' => 'long',
			'bs-subscribe-newsletter'  => 'long',
			'bs-newsletter-mailchimp'  => 'long',
			'bs-thumbnail-listing-1'   => 'long',
			'bs-thumbnail-listing-2'   => 'long',
			'bs-thumbnail-listing-3'   => 'long',
			'better_weather_widget'    => 'long',
			'bs-popular-categories'    => 'long',
			'betterweather-inline'     => 'long',
			'bs-mix-listing-3-4'       => 'long',
			'bs-mix-listing-3-3'       => 'long',
			'bs-mix-listing-3-2'       => 'long',
			'bs-mix-listing-3-1'       => 'long',
			'bs-text-listing-4'        => 'long',
			'bs-text-listing-3'        => 'long',
			'bs-text-listing-2'        => 'long',
			'bs-text-listing-1'        => 'long',
			'bs-user-listing-5'        => 'long',
			'bs-user-listing-4'        => 'long',
			'bs-user-listing-3'        => 'long',
			'bs-user-listing-2'        => 'long',
			'bs-user-listing-1'        => 'long',
			'bs-social-share'          => 'long',
			'bs-recent-posts'          => 'long',
			'recent-comments'          => 'long',
			'bs-google-plus'           => 'short',
			'bs-instagram'             => 'short',
			'media_video'              => 'long',
			'bs-dribbble'              => 'short',
			'tag_cloud'                => 'long',
			'bs-flickr'                => 'short',
			'calendar'                 => 'long',
			'bs-embed'                 => 'long',
			'bs-about'                 => 'long',
			'pages'                    => 'long',
		);
	}


	/**
	 * List of the shortcodes id which is available for cache
	 *
	 * @since 1.9.0
	 * @return array
	 */
	public static function shortcodes_list2cache() {

		return array(
			'bs-modern-grid-listing-10' => 'long',
			'bs-modern-grid-listing-1'  => 'long',
			'bs-modern-grid-listing-2'  => 'long',
			'bs-modern-grid-listing-3'  => 'long',
			'bs-modern-grid-listing-4'  => 'long',
			'bs-modern-grid-listing-5'  => 'long',
			'bs-modern-grid-listing-6'  => 'long',
			'bs-modern-grid-listing-7'  => 'long',
			'bs-modern-grid-listing-8'  => 'long',
			'bs-modern-grid-listing-9'  => 'long',
			'bs-thumbnail-listing-1'    => 'long',
			'bs-thumbnail-listing-2'    => 'long',
			'bs-thumbnail-listing-3'    => 'long',
			'bs-popular-categories'     => 'long',
			'bs-classic-listing-1'      => 'long',
			'bs-classic-listing-2'      => 'long',
			'bs-classic-listing-3'      => 'long',
			'bs-mix-listing-1-1'        => 'long',
			'bs-mix-listing-1-2'        => 'long',
			'bs-mix-listing-1-3'        => 'long',
			'bs-mix-listing-1-4'        => 'long',
			'bs-mix-listing-2-1'        => 'long',
			'bs-mix-listing-2-2'        => 'long',
			'bs-mix-listing-3-1'        => 'long',
			'bs-mix-listing-3-2'        => 'long',
			'bs-mix-listing-3-3'        => 'long',
			'bs-mix-listing-3-4'        => 'long',
			'bs-mix-listing-4-1'        => 'long',
			'bs-mix-listing-4-2'        => 'long',
			'bs-mix-listing-4-3'        => 'long',
			'bs-mix-listing-4-4'        => 'long',
			'bs-mix-listing-4-5'        => 'long',
			'bs-mix-listing-4-6'        => 'long',
			'bs-mix-listing-4-7'        => 'long',
			'bs-mix-listing-4-8'        => 'long',
			'bs-blog-listing-1'         => 'long',
			'bs-blog-listing-2'         => 'long',
			'bs-blog-listing-3'         => 'long',
			'bs-blog-listing-4'         => 'long',
			'bs-blog-listing-5'         => 'long',
			'bs-grid-listing-2'         => 'long',
			'bs-grid-listing-1'         => 'long',
			'bs-tall-listing-1'         => 'long',
			'bs-tall-listing-2'         => 'long',
			'bs-text-listing-1'         => 'long',
			'bs-text-listing-2'         => 'long',
			'bs-text-listing-3'         => 'long',
			'bs-text-listing-4'         => 'long',
			'bs-user-listing-1'         => 'long',
			'bs-user-listing-2'         => 'long',
			'bs-user-listing-3'         => 'long',
			'bs-user-listing-4'         => 'long',
			'bs-user-listing-5'         => 'long',
			'better-newsticker'         => 'long',
			'bs-recent-posts'           => 'long',
			'bs-slider-1'               => 'long',
			'bs-slider-2'               => 'long',
			'bs-slider-3'               => 'long',
			'bs-box-1'                  => 'long',
			'bs-box-2'                  => 'long',
			'bs-box-3'                  => 'long',
			'bs-box-4'                  => 'long',
		);
	}


	/**
	 * Display booster widget caching for specific widget options
	 *
	 * @param bool   $enable
	 * @param array  $instance
	 * @param array  $args
	 * @param string $id_base
	 *
	 * @since 1.9.0
	 * @return bool
	 */
	public static function disable_widget_caching( $enable, $instance, $args, $id_base ) {

		if ( $enable ) {

			if ( 'better_weather_widget' === $id_base ) {

				$enable = empty( $instance['visitorLocation'] ); # Don't cache Weather Widget if 'Show Visitors Location Status' was checked
			} elseif ( stristr( $id_base, '-listing-' ) && isset( $instance['order_by'] ) ) {

				$enable = 'rand' !== strtolower( trim( $instance['order_by'] ) ); # Don't cache listings with random order by
			}
		}

		return $enable;
	}


	/**
	 * Disable caching for some shortcodes with specific option
	 *
	 * @param bool         $enable
	 * @param array|string $atts
	 *
	 * @since 1.9.0
	 * @return bool
	 */
	public static function disable_shortcode_caching( $enable, $atts ) {

		if ( $enable ) {

			// Disable caching for listing shortcode with random order option
			if ( isset( $atts['order_by'] ) ) {
				$enable = 'rand' !== strtolower( trim( $atts['order_by'] ) );
			}

		}

		return $enable;
	}


	/**
	 * List of the Publisher mega-menus which is available for cache
	 *
	 * @since 1.9.0
	 */
	public static function mega_menus_list2cache() {

		return array(
			'tabbed-grid-posts' => 'long',
			'link-3-column'     => 'long',
			'link-2-column'     => 'long',
			'link-4-column'     => 'long',
			'grid-posts'        => 'long',
			'link-list'         => 'long',
		);
	}


	/**
	 * The callback will be fire after theme updated
	 *
	 * @since 1.9.1
	 */
	public static function after_theme_updated() {

		{  # Remove publisher update notice after it updated successfully

			$theme = wp_get_theme();

			if ( '' != $theme->get( 'Template' ) ) { # Do not consider child-theme version as publisher version
				$theme = wp_get_theme( $theme->get( 'Template' ) );
			}

			// Unique notice id where defined in @see Publisher_Setup::add_update_notice
			$message_id = 'publisher-v' . $theme->get( 'Version' );
			bf_remove_notice( $message_id );
		}
	}


	/**
	 * Setups Editor Shortcodes Menu
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	function setup_editor_shortcodes_menu( $shortcodes ) {


		if ( ! empty( $shortcodes ) ) {
			$shortcodes[ 'sep-' . mt_rand() ] = array(
				'type' => 'separator',
			);
		}

		$shortcodes['text-padding'] = array(
			'type'  => 'menu',
			'label' => __( 'Text Padding', 'publisher' ),
			'items' => array(

				'text-padding-right-1' => array(
					'type'              => 'button',
					'label'             => __( 'Text ⇠', 'publisher' ),
					'onclick_raw_js'    => '
								toggleClass("bs-padding-0-1",textPaddingPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-padding-0-1'
					)
				),

				'text-padding-left-1'  => array(
					'type'              => 'button',
					'label'             => __( '⇢ Text', 'publisher' ),
					'onclick_raw_js'    => '
								toggleClass("bs-padding-1-0",textPaddingPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-padding-1-0'
					)
				),
				'text-padding-1'       => array(
					'type'           => 'button',
					'label'          => __( '⇢ Text ⇠', 'publisher' ),
					'onclick_raw_js' => '
							toggleClass("bs-padding-1-1",textPaddingPattern);
							',

					'active_conditions' => array(
						'classes' => 'bs-padding-1-1'
					)
				),
				'text-padding-right-2' => array(
					'type'              => 'button',
					'label'             => __( '⇢ Text ⇠⇠', 'publisher' ),
					'onclick_raw_js'    => '
								toggleClass("bs-padding-1-2",textPaddingPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-padding-1-2'
					)
				),

				'text-padding-left-2' => array(
					'type'              => 'button',
					'label'             => __( '⇢⇢ Text ⇠', 'publisher' ),
					'onclick_raw_js'    => '
							toggleClass("bs-padding-2-1",textPaddingPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-padding-2-1'
					)
				),
				'text-padding-2'      => array(
					'type'              => 'button',
					'label'             => __( '⇢⇢ Text ⇠⇠', 'publisher' ),
					'onclick_raw_js'    => '
							toggleClass("bs-padding-2-2",textPaddingPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-padding-2-2'
					)
				),
				'text-padding-3'      => array(
					'type'              => 'button',
					'label'             => __( '⇢⇢⇢ Text ⇠⇠⇠', 'publisher' ),
					'onclick_raw_js'    => '
							toggleClass("bs-padding-3-3",textPaddingPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-padding-3-3'
					)
				),
			)
		);

		$shortcodes['dropcap'] = array(
			'type'  => 'menu',
			'label' => __( 'Dropcap', 'publisher' ),
			'items' => array(

				'dropcap'                => array(
					'type'              => 'button',
					'label'             => __( 'Dropcap - Simple', 'publisher' ),
					'formatter'         => 'BS_Dropcap_Simple',
					'active_conditions' => array(
						'classes' => 'dropcap dropcap-simple'
					)
				),
				'dropcap-square'         => array(
					'register'          => false,
					'type'              => 'button',
					'label'             => __( 'Dropcap - Square', 'publisher' ),
					'formatter'         => 'BS_Dropcap_Square',
					'active_conditions' => array(
						'classes' => 'dropcap dropcap-square'
					)
				),
				'dropcap-square-outline' => array(
					'register'          => false,
					'type'              => 'button',
					'label'             => __( 'Dropcap - Square Outline', 'publisher' ),
					'formatter'         => 'BS_Dropcap_Square_Outline',
					'active_conditions' => array(
						'classes' => 'dropcap dropcap-square-outline'
					)
				),
				'dropcap-circle'         => array(
					'register'          => false,
					'type'              => 'button',
					'label'             => __( 'Dropcap - Circle', 'publisher' ),
					'formatter'         => 'BS_Dropcap_circle',
					'active_conditions' => array(
						'classes' => 'dropcap dropcap-circle'
					)
				),
				'dropcap-circle-outline' => array(
					'register'          => false,
					'type'              => 'button',
					'label'             => __( 'Dropcap - Circle Outline', 'publisher' ),
					'formatter'         => 'BS_Dropcap_Circle_Outline',
					'active_conditions' => array(
						'classes' => 'dropcap dropcap-circle-outline'
					)
				),
			)
		);

		$shortcodes['intro'] = array(
			'type'  => 'menu',
			'label' => __( 'Intro', 'publisher' ),
			'items' => array(

				'bs-intro'             => array(
					'type'              => 'button',
					'label'             => __( 'Intro', 'publisher' ),
					'onclick_raw_js'    => '
								toggleClass("bs-intro",introClassPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-intro'
					)
				),
				'bs-intro-highlighted' => array(
					'type'              => 'button',
					'label'             => __( 'Highlighted Intro', 'publisher' ),
					'onclick_raw_js'    => '
								toggleClass("bs-intro-highlighted",introClassPattern);
							',
					'active_conditions' => array(
						'classes' => 'bs-intro-highlighted'
					)
				),
			)
		);

		$shortcodes['highlight']    = array(
			'type'  => 'menu',
			'label' => __( 'Highlighted Text', 'publisher' ),
			'items' => array(

				'highlight' => array(
					'type'      => 'button',
					'label'     => __( 'Highlight Yellow', 'publisher' ),
					'formatter' => 'BS_Highlight',
				),

				'highlight-red' => array(
					'register'  => false,
					'type'      => 'button',
					'label'     => __( 'Highlight Red', 'publisher' ),
					'formatter' => 'BS_Highlight_Red',
				),

			)
		);
		$shortcodes['columns']      = array(
			'type'  => 'menu',
			'label' => __( 'Columns', 'publisher' ),
			'items' => array(
				'columns' => array(
					'type'     => 'button',
					'label'    => __( '2 Column', 'publisher' ),
					'callback' => 'columns',
					'command'  => 'BS_Column_2',
				),
				'column'  => array( 'callback' => 'column' ),

				'columns-3' => array(
					'type'     => 'button',
					'register' => false,
					'label'    => __( '3 Column', 'publisher' ),
					'command'  => 'BS_Column_3',
				),

				'columns-4' => array(
					'type'     => 'button',
					'register' => false,
					'label'    => __( '4 Column', 'publisher' ),
					'command'  => 'BS_Column_4',
				),

			)
		);
		$shortcodes['button']       = array(
			'type'  => 'menu',
			'label' => __( 'Buttons', 'publisher' ),
			'items' => array(

				'button' => array(
					'type'           => 'button',
					'label'          => __( 'Button - Large', 'publisher' ),
					'callback'       => 'button',
					'onclick_raw_js' => '
								newButton("lg");
							'
				),

				'button-medium' => array(
					'register'       => false,
					'type'           => 'button',
					'label'          => __( 'Button - Medium', 'publisher' ),
					'callback'       => 'button',
					'onclick_raw_js' => '
								newButton("md");
							'
				),

				'button-small' => array(
					'register'       => false,
					'type'           => 'button',
					'label'          => __( 'Button - Small', 'publisher' ),
					'callback'       => 'button',
					'onclick_raw_js' => '
								newButton("sm");
							'
				),
			)
		);
		$shortcodes['list-drop']    = array(
			'type'  => 'menu',
			'label' => __( 'Custom List', 'publisher' ),
			'items' => array(
				'list' => array(
					'type'              => 'button',
					'label'             => __( 'Check List', 'publisher' ),
					'callback'          => 'list_shortcode',
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-check',
						'parent'  => 'ul'
					),
					'command'           => 'BS_CheckList'
				),
				'li'   => array( 'callback' => 'list_item' ),

				'list-star'     => array(
					'type'              => 'button',
					'register'          => false,
					'label'             => __( 'Star List', 'publisher' ),
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-star',
						'parent'  => 'ul'
					),
					'command'           => 'BS_StarList'
				),
				'list-edit'     => array(
					'type'              => 'button',
					'register'          => false,
					'label'             => __( 'Edit List', 'publisher' ),
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-edit',
						'parent'  => 'ul',
					),
					'command'           => 'BS_EditList'
				),
				'list-folder'   => array(
					'type'              => 'button',
					'register'          => false,
					'label'             => __( 'Folder List', 'publisher' ),
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-folder',
						'parent'  => 'ul'
					),
					'command'           => 'BS_FolderList'
				),
				'list-file'     => array(
					'type'              => 'button',
					'register'          => false,
					'label'             => __( 'File List', 'publisher' ),
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-file',
						'parent'  => 'ul'
					),
					'command'           => 'BS_FileList'
				),
				'list-heart'    => array(
					'type'              => 'button',
					'register'          => false,
					'label'             => __( 'Heart List', 'publisher' ),
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-heart',
						'parent'  => 'ul'
					),
					'command'           => 'BS_HeartList'
				),
				'list-asterisk' => array(
					'type'              => 'button',
					'register'          => false,
					'label'             => __( 'Asterisk List', 'publisher' ),
					'active_conditions' => array(
						'classes' => 'bs-shortcode-list list-style-asterisk',
						'parent'  => 'ul'
					),
					'command'           => 'BS_AsteriskList'
				),
			)
		);
		$shortcodes['divider-drop'] = array(
			'type'  => 'menu',
			'label' => __( 'Dividers', 'publisher' ),
			'items' => array(
				'divider'        => array(
					'type'     => 'button',
					'label'    => __( 'Divider - Full', 'publisher' ),
					'callback' => 'divider',
					'content'  => '<hr class="bs-divider full large">'
				),
				'divider-small'  => array(
					'type'     => 'button',
					'register' => false,
					'label'    => __( 'Divider - Small', 'publisher' ),
					'callback' => 'divider',
					'content'  => '<hr class="bs-divider full small">'
				),
				'divider-tiny'   => array(
					'type'     => 'button',
					'register' => false,
					'label'    => __( 'Divider - Tiny', 'publisher' ),
					'callback' => 'divider',
					'content'  => '<hr class="bs-divider full tiny">'
				),
				'divider-double' => array(
					'type'     => 'button',
					'register' => false,
					'label'    => __( 'Divider - Dashed Line', 'publisher' ),
					'callback' => 'divider',
					'content'  => '<hr class="bs-divider large dashed-line">'
				),

			)
		);
		$shortcodes['alert-drop']   = array(
			'type'  => 'menu',
			'label' => __( 'Alerts', 'publisher' ),
			'items' => array(
				'alert'         => array(
					'type'              => 'button',
					'label'             => __( 'Alert - Simple', 'publisher' ),
					'formatter'         => 'BS_Alert_Simple',
					'active_conditions' => array(
						'classes' => 'bs-shortcode-alert alert-simple'
					)
				),
				'alert-success' => array(
					'type'              => 'button',
					'label'             => __( 'Alert - Success', 'publisher' ),
					'register'          => false,
					'formatter'         => 'BS_Alert_Success',
					'active_conditions' => array(
						'classes' => 'bs-shortcode-alert alert-success'
					)
				),
				'alert-info'    => array(
					'type'              => 'button',
					'label'             => __( 'Alert - Info', 'publisher' ),
					'register'          => false,
					'formatter'         => 'BS_Alert_Info',
					'active_conditions' => array(
						'classes' => 'bs-shortcode-alert alert-info'
					)
				),
				'alert-warning' => array(
					'type'              => 'button',
					'label'             => __( 'Alert - Warning', 'publisher' ),
					'register'          => false,
					'formatter'         => 'BS_Alert_Warning',
					'active_conditions' => array(
						'classes' => 'bs-shortcode-alert alert-warning'
					)
				),
				'alert-danger'  => array(
					'type'              => 'button',
					'label'             => __( 'Alert - Danger', 'publisher' ),
					'register'          => false,
					'formatter'         => 'BS_Alert_Danger',
					'active_conditions' => array(
						'classes' => 'bs-shortcode-alert alert-danger'
					)
				),
			)
		);

		$shortcodes['tabs'] = array(
			'register' => false,
			'type'     => 'button',
			'label'    => __( 'Tabs', 'publisher' ),
			'callback' => 'tabs',
			'content'  => '[tabs]<br />\
                                        [tab title="' . __( 'Tab 1', 'publisher' ) . '"]' . __( 'Tab 1 content...', 'publisher' ) . '[/tab]<br />\
                                        [tab title="' . __( 'Tab 2', 'publisher' ) . '"]' . __( 'Tab 2 content...', 'publisher' ) . '[/tab]<br />\
                                    [/tabs]<br />\ '
		);


		$shortcodes['accordions'] = array(
			'type'     => 'button',
			'label'    => __( 'Accordions', 'publisher' ),
			'callback' => 'accordions',
			'register' => false,
			'content'  => '[accordions ]<br>[accordion title="Accordion 1 Title" load="show"]Accordion 1 content...[/accordion]<br>[accordion title="Accordion 2 Title" load="hide"]Accordion 2 content...[/accordion]<br>[/accordions]'
		);

		$shortcodes['white-space'] = array(
			'type'     => 'button',
			'label'    => __( 'White Space', 'publisher' ),
			'callback' => 'whiteSpace',
			'register' => false,
			'content'  => '[bs-white-space]',
		);

		return $shortcodes;
	}


	/**
	 * @param array $fields
	 */
	public function append_gutenberg_shared_fields_list( &$fields ) {

		$fields[] = array(
			'type'           => 'tab',
			'name'           => __( 'Text Settings', 'publisher' ),
			'id'             => 'general',
			//
			'include_blocks' => array( 'core/paragraph' ),
		);

		$fields[] = array(
			'type'    => 'select',
			'name'    => __( 'Text Padding', 'publisher' ),
			'id'      => 'text-padding',
			//
			'options' => array(
				''               => __( 'No Padding', 'publisher' ),
				'bs-padding-0-1' => __( 'Text ⇠', 'publisher' ),
				'bs-padding-1-0' => __( '⇢ Text', 'publisher' ),
				'bs-padding-1-1' => __( '⇢ Text ⇠', 'publisher' ),
				'bs-padding-1-2' => __( '⇢ Text ⇠⇠', 'publisher' ),
				'bs-padding-2-1' => __( '⇢⇢ Text ⇠', 'publisher' ),
				'bs-padding-2-2' => __( '⇢⇢ Text ⇠⇠', 'publisher' ),
				'bs-padding-3-3' => __( '⇢⇢⇢ Text ⇠⇠⇠', 'publisher' ),
			),
			'action'  => 'add_class',
		);

		$fields[] = array(
			'type'   => 'switch',
			'name'   => __( 'Intro', 'publisher' ),
			'id'     => 'bs-intro',
			//
			'action' => 'add_class',
		);


		$fields[] = array(
			'type'           => 'tab',
			'name'           => __( 'List Settings', 'publisher' ),
			'id'             => 'general',
			//
			'include_blocks' => array( 'core/list' ),
		);
		$fields[] = array(
			'type'        => 'select',
			'name'        => __( 'Custom List', 'publisher' ),
			'id'          => 'custom-list',
			//
			'options'     => array(
				''                    => __( 'Default Style', 'publisher' ),
				'list-style-check'    => __( 'Check List', 'publisher' ),
				'list-style-star'     => __( 'Star List', 'publisher' ),
				'list-style-edit'     => __( 'Edit List', 'publisher' ),
				'list-style-file'     => __( 'File List', 'publisher' ),
				'list-style-heart'    => __( 'Heart List', 'publisher' ),
				'list-style-folder'   => __( 'Folder List', 'publisher' ),
				'list-style-asterisk' => __( 'Asterisk List', 'publisher' ),
			),
			'action'      => 'add_class',
			'fixed_class' => 'bs-shortcode-list',
		);
	}


	public function append_gutenberg_shared_fields_std( &$stds ) {

		$stds['logo_img_sample'] = '';
	}

} // Publisher_Setup
