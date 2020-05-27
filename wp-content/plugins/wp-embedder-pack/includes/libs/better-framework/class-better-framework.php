<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */

// Load general handy functions
include BF_PATH . 'functions/path.php';
include BF_PATH . 'functions/query.php';
include BF_PATH . 'functions/content.php';
include BF_PATH . 'functions/other.php';
include BF_PATH . 'functions/enqueue.php';
include BF_PATH . 'functions/shortcodes.php';
include BF_PATH . 'functions/archive.php';
include BF_PATH . 'functions/sidebar.php';
include BF_PATH . 'functions/menu.php';
include BF_PATH . 'functions/options.php';
include BF_PATH . 'functions/multilingual.php';


/**
 * Handy Function for accessing to BetterFramework
 *
 * @return Better_Framework
 */
function Better_Framework() {

	return Better_Framework::self();
}

// Fire Up BetterFramework
Better_Framework();


/**
 * Class Better_Framework
 */
class Better_Framework {


	/**
	 * Version of BF
	 *
	 * @var string
	 */
	public $version = '3.10.14';


	/**
	 * Defines which sections should be include in BF
	 *
	 * @since  1.0
	 * @access public
	 * @var array
	 */
	public $sections = array(
		'admin_panel'            => true,    // Theme option panel generator
		'admin-page'             => true,    // Theme option panel generator
		'admin-menus'            => true,    // Theme option panel generator
		'meta_box'               => true,    // Meta box generator
		'user-meta-box'          => true,    // User meta box generator
		'taxonomy_meta_box'      => false,   // Taxonomy meta box generator
		'load_in_frontend'       => false,   // For loading all BF in frontend, disable this for better performance
		'better-menu'            => false,   // Includes better menu
		'custom-css-fe'          => true,    // BF Front End Custom CSS Generator
		'custom-css-be'          => true,    // BF Back End ( WP Admin ) Custom CSS Generator
		'custom-css-pages'       => false,   // BF Pages Custom CSS
		'custom-css-users'       => true,    // BF Users Custom CSS
		'assets_manager'         => true,    // BF custom css generator
		'page-builder'           => false,   // Page builder functionality extender
		'vc-extender'            => false,   // Deprecated: for backward compatibility
		'woocommerce'            => false,   // WooCommerce functionality
		'bbpress'                => false,   // bbPress functionality
		'product-pages'          => false,   // Products Page
		'product-updater'        => false,   // Products Updater
		'booster'                => false,    // BS Booster
		'fonts-manager'          => false,    // Fonts manager
		'content-injector'       => false,   // Post content injection
		'json-ld'                => false,   // JSON-LD schema generator
		'version-compatibility'  => false,   // Version compatibility manager
		'template-compatibility' => false,   // Files compatibility manager
		'editor-shortcodes'      => false,   // Editor shortcodes
	);


	/**
	 * Inner array of instances
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 * PHP Constructor Function
	 *
	 * @param array $sections default features
	 *
	 * @since  1.0
	 * @access public
	 */
	public function __construct( $sections = array() ) {

		do_action( 'better-framework/before-init' );

		// define features of BF
		$this->sections = bf_merge_args( $sections, $this->sections );
		$this->sections = apply_filters( 'better-framework/sections', $this->sections );

		/**
		 * Booster
		 */
		if ( $this->sections['booster'] === true ) {
			self::factory( 'booster' );
		}

		/**
		 * Fonts Manager
		 */
		if ( $this->sections['fonts-manager'] === true ) {
			self::factory( 'fonts-manager' );
		}
		/**
		 * BF General Functionality For Both Front End and Back End
		 */
		self::factory( 'general' );

		self::factory( 'assets-manager' );


		/**
		 * Content Injector
		 */
		if ( $this->sections['content-injector'] === true ) {
			self::factory( 'content-injector' );
		}

		/**
		 * BF BetterMenu For Improving WP Menu Features
		 */
		if ( $this->sections['better-menu'] === true ) {
			self::factory( 'better-menu' );
		}


		/**
		 * BF Widgets Manager
		 */
		self::factory( 'widgets-manager' );


		/**
		 * BF Shortcodes Manager
		 */
		if ( $this->sections['vc-extender'] === true ||
		     $this->sections['page-builder'] === true
		) {

			self::factory( 'shortcodes-manager' );

			self::factory( 'page-builder-widget-wrapper' );
		}


		/**
		 * Editor Shortcodes
		 */
		if ( $this->sections['editor-shortcodes'] === true ) {
			self::factory( 'editor-shortcodes' );
		}


		/**
		 * BF Custom Generator For Front End
		 */
		if ( $this->sections['custom-css-fe'] ) {
			self::factory( 'custom-css-fe' );
		}

		/**
		 * BF Pages and Posts Front End Custom Generator
		 */
		if ( $this->sections['custom-css-pages'] ) {
			self::factory( 'custom-css-pages' );
		}

		/**
		 * BF Users Front End Custom Generator
		 */
		if ( $this->sections['custom-css-users'] ) {
			self::factory( 'custom-css-users' );
		}


		/**
		 * BF Custom Generator For Back End
		 */
		if ( $this->sections['custom-css-be'] ) {
			self::factory( 'custom-css-be' );
		}


		/**
		 * BF WooCommerce
		 */
		if ( $this->sections['woocommerce'] === true && function_exists( 'is_woocommerce' ) ) {
			self::factory( 'woocommerce' );
		}


		/**
		 * BF bbPress
		 */
		if ( $this->sections['bbpress'] === true && class_exists( 'bbpress' ) ) {
			self::factory( 'bbpress' );
		}


		/**
		 * BF Admin Page
		 */
		if ( $this->sections['admin-page'] === true ) {
			self::factory( 'admin-page', false, true );
		}


		/**
		 * BF Admin Panel Generator
		 */
		if ( $this->sections['admin_panel'] === true ) {
			self::factory( 'admin-panel' );
		}


		/**
		 * Products Page
		 */
		if ( $this->sections['product-pages'] === true ) {
			self::factory( 'product-pages' );
		}


		/**
		 * Products Updater
		 */
		if ( $this->sections['product-updater'] === true ) {
			self::factory( 'product-updater' );
		}

		/**
		 * Json-LD Schema Generator
		 */
		if ( $this->sections['json-ld'] === true ) {
			self::factory( 'json-ld' );
		}

		$hook = is_admin() ? 'admin_enqueue_scripts' : 'wp_enqueue_scripts';
		add_action( $hook, 'Better_Framework::register_assets', 1 );


		/**
		 * Version compatibility manager
		 */
		if ( $this->sections['version-compatibility'] === true ) {
			self::factory( 'version-compatibility' );
		}

		/**
		 * Files compatibility manager
		 */
		if ( $this->sections['template-compatibility'] === true ) {
			self::factory( 'template-compatibility' );
		}

		/**
		 * Disable Loading BF Fully in Front End
		 */
		if ( ! is_admin() && $this->sections['load_in_frontend'] === false ) {
			return;
		}

		/**
		 * BF Admin Menus
		 */
		if ( $this->sections['admin-menus'] === true ) {
			self::factory( 'admin-menus' );
		}

		/**
		 * BF Core Functionality That Used in Back End
		 */
		self::factory( 'admin-notice' );
		self::factory( 'core', false, true );
		self::factory( 'color' );
		self::factory( 'icon-factory' );


		/**
		 * BF Taxonomy Meta Box Generator
		 */
		if ( $this->sections['taxonomy_meta_box'] === true ) {
			self::factory( 'taxonomy-meta' );
		}


		/**
		 * BF Post & Page Meta Box Generator
		 */
		if ( $this->sections['meta_box'] === true ) {
			self::factory( 'meta-box' );
		}


		/**
		 * BF Post & Page Meta Box Generator
		 */
		if ( $this->sections['user-meta-box'] === true ) {
			self::factory( 'user-meta-box' );
		}


		/**
		 * BF Visual Composer Extender
		 */
		if ( $this->sections['vc-extender'] === true ) {
			self::factory( 'vc-extender' );
		}


		// Admin style and scripts
		if ( is_admin() ) {
			// Hook BF admin assets enqueue
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 100 );
			add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 100 );
			//			add_action( 'elementor/frontend/before_enqueue_styles', array( $this, 'admin_enqueue_scripts' ), 100 );

			// Hook BF admin ajax requests
			add_action( 'wp_ajax_bf_ajax', array( $this, 'admin_ajax' ) );
			add_action( 'better-framework/panel/image-upload', array( $this, 'handle_file_upload' ) );
		}

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
	public static function factory( $object = 'options', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main BetterFramework Class
			 */
			case 'self':
				$class = 'Better_Framework';
				break;

			/**
			 * General Helper Functions
			 */
			case 'helper':
				include BF_PATH . 'core/class-bf-helper.php';

				$class = 'BF_Helper';
				break;

			/**
			 * Query Helper Functions
			 */
			case 'query-helper':
				include BF_PATH . 'core/class-bf-query.php';

				$class = 'BF_Query';
				break;

			/**
			 * Booster
			 */
			case 'booster':

				if ( ! class_exists( '_WP_Dependency' ) ) {
					/** WordPress Dependency Class */
					require( ABSPATH . WPINC . '/class-wp-dependency.php' );
				}

				if ( ! class_exists( 'WP_Dependencies' ) ) {
					/** WordPress Dependencies Class */
					require( ABSPATH . WPINC . '/class.wp-dependencies.php' );
				}

				include BF_PATH . 'booster/class-bf-minify.php';
				include BF_PATH . 'booster/class-bf-scripts.php';
				include BF_PATH . 'booster/class-bf-styles.php';

				// Initializer
				include BF_PATH . 'booster/class-bf-booster.php';

				include BF_PATH . 'booster/functions.php';

				$class = 'BF_Booster';
				break;


			/**
			 * Custom Fonts Manager
			 */
			case 'fonts-manager':
				include BF_PATH . 'core/fonts-manager/class-bf-fonts-manager.php';

				$class = 'BF_Fonts_Manager';

				break;

			/**
			 * BF General Functionality For Both Front End and Back End
			 */
			case 'general':
				self::factory( 'helper' );

				// todo: this file was deprecated and should be removed in v3
				include BF_PATH . 'core/class-bf-query.php';

				include BF_PATH . 'metabox/functions.php';      // Post meta box public functions
				include BF_PATH . 'taxonomy/functions.php';     // Taxonomy public functions
				include BF_PATH . 'user-metabox/functions.php'; // Taxonomy public functions
				include BF_PATH . 'admin-panel/functions.php';  // Admin Panel public functions
				self::factory( 'options' );

				// todo: this file was deprecated and should delete in v3
				include BF_PATH . 'core/class-bf-posts.php';

				return true;
				break;

			/**
			 * BF_Options Used For Retrieving Theme Panel Options
			 */
			case 'options':
				include BF_PATH . 'admin-panel/class-bf-options.php';

				$class = 'BF_Options';
				break;

			/**
			 * BF BetterMenu For Improving WP Menu Features
			 */
			case 'better-menu':
				include BF_PATH . 'menu/class-bf-menus.php';

				$class = 'BF_Menus';
				break;

			/**
			 * BF Page Builders Extender
			 */
			case 'vc-extender':
			case 'page-builder':

				if ( ! class_exists( 'BF_Admin_Fields' ) ) {
					include BF_PATH . 'core/field-generator/class-bf-admin-fields.php';
				}

				if ( ! class_exists( 'BF_Page_Builder_Extender' ) ) {
					include BF_PATH . 'page-builder/class-bf-page-builder-extender.php';
				}

				$class = 'BF_Page_Builder_Extender';
				break;

			/**
			 * BF Post & Page Meta Box Generator
			 */
			case 'meta-box':
				include BF_PATH . 'metabox/class-bf-metabox-core.php';

				$class = 'BF_Metabox_Core';
				break;

			/**
			 * BF Users Meta Box Generator
			 */
			case 'user-meta-box':
				include BF_PATH . 'user-metabox/class-bf-user-metabox-core.php';

				$class = 'BF_User_Metabox_Core';
				break;

			/**
			 * BF Taxonomy Meta Box Generator
			 */
			case 'taxonomy-meta':
				if ( ! class_exists( 'BF_Admin_Fields' ) ) {
					include BF_PATH . 'core/field-generator/class-bf-admin-fields.php';
				}

				include BF_PATH . 'taxonomy/class-bf-taxonomy-front-end-generator.php';
				include BF_PATH . 'taxonomy/class-bf-taxonomy-meta-field.php';
				include BF_PATH . 'taxonomy/class-bf-taxonomy-core.php';

				$class = 'BF_Taxonomy_Core';
				break;

			/**
			 * BF Admin Panel Generator
			 */
			case 'admin-panel':
				self::factory( 'admin-menus' );
				include BF_PATH . 'admin-panel/class-bf-admin-panel.php';

				$class = 'BF_Admin_Panel';
				break;

			/**
			 * BF Admin Page
			 */
			case 'admin-page':
				self::factory( 'admin-menus' );
				include BF_PATH . 'admin-page/class-bf-admin-page.php';

				$class = 'BF_Admin_Page';
				break;


			/**
			 * BF Admin Menus
			 */
			case 'admin-menus':
				include BF_PATH . 'admin-menus/class-bf-admin-menus.php';

				$class = 'BF_Admin_Menus';
				break;


			/**
			 * BF Shortcodes Manager
			 */
			case 'shortcodes-manager':
				include BF_PATH . 'shortcode/class-bf-shortcodes-manager.php';

				$class = 'BF_Shortcodes_Manager';
				break;

			/**
			 * BF Widgets
			 */
			case 'widgets-manager':

				include BF_PATH . 'widget/class-bf-widget.php';
				include BF_PATH . 'widget/class-bf-widgets-manager.php';

				$class = 'BF_Widgets_Manager';
				break;

			case 'page-builder-widget-wrapper':

				include BF_PATH . 'page-builder/wrappers/class-bf-page-builder-widget-wrapper.php';

				$class = 'BF_Page_Builder_Widget_Wrapper';

				break;

			/**
			 * BF Widgets Field Generator
			 */
			case 'widgets-field-generator':

				if ( ! class_exists( 'BF_Admin_Fields' ) ) {
					include BF_PATH . 'core/field-generator/class-bf-admin-fields.php';
				}

				if ( ! class_exists( 'BF_Widgets_Field_Generator' ) ) {
					include BF_PATH . 'widget/class-bf-widgets-field-generator.php';
				}

				return true;
				break;

			/**
			 * BF Core Functionality That Used in Back End
			 */
			case 'admin-notice':
				include BF_PATH . 'core/class-bf-admin-notices.php';

				$class = 'BF_Admin_Notices';
				break;

			/**
			 * BF Core Functionality That Used in Back End
			 */
			case 'core':

				include BF_PATH . 'core/field-generator/functions.php';

				include BF_PATH . 'core/walkers/class-walker-better-categorydropdown.php';
				include BF_PATH . 'core/field-generator/class-bf-ajax-select-callbacks.php';

				if ( ! class_exists( 'BF_Admin_Fields' ) ) {
					include BF_PATH . 'core/field-generator/class-bf-admin-fields.php';
				}

				include BF_PATH . 'core/class-bf-html-generator.php';

				return true;
				break;

			/**
			 * BF Custom Generator For Front End
			 */
			case 'custom-css':

				if ( ! class_exists( 'BF_Custom_CSS' ) ) {
					include BF_PATH . 'core/custom-css/class-bf-custom-css.php';
				}

				return true;
				break;


			/**
			 * BF Custom Generator For Front End
			 */
			case 'custom-css-fe':
				self::factory( 'custom-css' );
				include BF_PATH . 'core/custom-css/class-bf-front-end-css.php';

				$class = 'BF_Front_End_CSS';
				break;

			/**
			 * BF Custom Generator For Back End
			 */
			case 'custom-css-be':
				self::factory( 'custom-css' );
				include BF_PATH . 'core/custom-css/class-bf-back-end-css.php';

				$class = 'BF_Back_End_CSS';
				break;

			/**
			 * BF Custom Generator Pages and Posts in Front end
			 */
			case 'custom-css-pages':
				self::factory( 'custom-css' );
				include BF_PATH . 'core/custom-css/class-bf-pages-css.php';

				$class = 'BF_Pages_CSS';
				break;

			/**
			 * BF Custom Generator Pages and Posts in Front end
			 */
			case 'custom-css-users':
				self::factory( 'custom-css' );
				include BF_PATH . 'core/custom-css/class-bf-users-css.php';

				$class = 'BF_Users_CSS';
				break;


			/**
			 * BF Color Used For Retrieving User Color Schema and Some Helper Functions For Changing Colors
			 */
			case 'color':
				include BF_PATH . 'libs/class-bf-color.php';

				$class = 'BF_Color';
				break;

			/**
			 * BF Color Used For Retrieving User Color Schema and Some Helper Functions For Changing Colors
			 */
			case 'breadcrumb':
				include BF_PATH . 'libs/class-bf-breadcrumb.php';

				$class = 'BF_Breadcrumb';
				break;

			/**
			 * BF Icon Factory Used For Handling FontIcons Actions
			 */
			case 'icon-factory':
				include BF_PATH . 'libs/icons/class-bf-icons-factory.php';

				$class = 'BF_Icons_Factory';
				break;

			/**
			 * BF WooCommerce
			 */
			case 'woocommerce':
				include BF_PATH . 'woocommerce/abstract-class-bf-woocommerce.php';

				return true;

			/**
			 * BF bbPress
			 */
			case 'bbpress':
				include BF_PATH . 'bbpress/abstract-class-bf-bbpress.php';

				return true;

			/**
			 * Assets Manager
			 */
			case 'assets-manager':
				include BF_PATH . 'core/class-bf-assets-manager.php';

				$class = 'BF_Assets_Manager';
				break;

			/**
			 * Products Manager
			 */
			case 'product-pages':
				include BF_PATH . 'product-pages/init.php';

				return true;

				break;


			/**
			 * Products Updater
			 */
			case 'product-updater':
				include BF_PATH . 'product-updater/init.php';

				return true;

				break;


			/**
			 * editor-shortcodes
			 */
			case 'editor-shortcodes':
				include BF_PATH . 'editor-shortcodes/init.php';

				return true;

				break;

			/**
			 * Content Injector
			 */
			case 'content-injector':
				include BF_PATH . 'content-injector/bf-content-inject.php';

				$class = 'BF_Content_Inject';

				break;

			/**
			 * Json-LD
			 */
			case 'json-ld':
				include BF_PATH . 'json-ld/class-bf-json-ld-generator.php';

				$class = 'BF_Json_LD_Generator';

				break;

			case 'version-compatibility':

				if ( ! class_exists( 'BF_Version_Compatibility' ) ) {
					include BF_PATH . 'compatibility/class-bf-version-compatibility.php';
				}

				$class = 'BF_Version_Compatibility';

				break;

			case 'template-compatibility':

				if ( ! class_exists( 'BF_Template_Compatibility' ) ) {
					include BF_PATH . 'compatibility/class-bf-template-compatibility.php';
				}

				$class = 'BF_Template_Compatibility';

				break;

			case 'htaccess-editor':

				if ( ! class_exists( 'BF_Htaccess_Editor' ) ) {
					include BF_PATH . 'core/utilities/IO/class-bf-htaccess-editor.php';
				}

				$class = 'BF_Htaccess_Editor';

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
	 * Used for accessing alive instance of Better_Framework
	 *
	 * static
	 *
	 * @since 1.0
	 * @return Better_Framework
	 */
	public static function self() {

		return self::factory( 'self' );
	}


	/**
	 * Used for getting options from BF_Options
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Options
	 */
	public static function options( $fresh = false ) {

		return self::factory( 'options', $fresh );
	}


	/**
	 * Used for accessing shortcodes from BF_Shortcodes_Manager
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Shortcodes_Manager
	 */
	public static function shortcodes( $fresh = false ) {

		return self::factory( 'shortcodes-manager', $fresh );
	}


	/**
	 * Used for accessing taxonomy meta from BF_Taxonomy_Core
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Taxonomy_Core
	 */
	public static function taxonomy_meta( $fresh = false ) {

		return self::factory( 'taxonomy-meta', $fresh );
	}


	/**
	 * Used for accessing post meta from BF_Metabox_Core
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Metabox_Core
	 */
	public static function post_meta( $fresh = false ) {

		return self::factory( 'meta-box', $fresh );
	}


	/**
	 * Used for accessing widget manager from BF_Widgets_Manager
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Widgets_Manager
	 */
	public static function widget_manager( $fresh = false ) {

		return self::factory( 'widgets-manager', $fresh );
	}


	/**
	 * Used for accessing widget manager from BF_Widgets_Manager
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Breadcrumb
	 */
	public static function breadcrumb( $fresh = false ) {

		return self::factory( 'breadcrumb', $fresh );
	}


	/**
	 * Used for accessing BF_Admin_Notices for adding notice to admin panel
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Admin_Notices
	 */
	public static function admin_notices( $fresh = false ) {

		return self::factory( 'admin-notice', $fresh );
	}


	/**
	 * Used for accessing BF_Assets_Manager for enqueue styles and scripts
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Assets_Manager
	 */
	public static function assets_manager( $fresh = false ) {

		return self::factory( 'assets-manager', $fresh );
	}


	/**
	 * Used for accessing BF_Helper
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Helper
	 */
	public static function helper( $fresh = false ) {

		return self::factory( 'helper', $fresh );
	}


	/**
	 * Used for accessing BF_Query
	 *
	 * Deprecated!
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Query
	 */
	public static function helper_query( $fresh = false ) {

		return self::factory( 'query-helper', $fresh );
	}


	/**
	 * Used for accessing BF_Icons_Factory
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Icons_Factory
	 */
	public static function icon_factory( $fresh = false ) {

		return self::factory( 'icon-factory', $fresh );
	}


	/**
	 * Used for accessing BF_Fonts_Manager
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Fonts_Manager
	 */
	public static function fonts_manager( $fresh = false ) {

		return self::factory( 'fonts-manager', $fresh );
	}


	/**
	 * Used for accessing BF_Booster
	 *
	 * @param bool $fresh
	 *
	 * @return \BF_Booster
	 */
	public static function booster( $fresh = false ) {

		return self::factory( 'booster', $fresh );
	}


	/**
	 * Used for accessing BF_User_Metabox_Core
	 *
	 * @param bool $fresh
	 *
	 * @return BF_User_Metabox_Core
	 */
	public static function user_meta( $fresh = false ) {

		return self::factory( 'user-meta-box', $fresh );
	}


	/**
	 * Used for accessing Better_Admin_Panel
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Admin_Panel
	 */
	public static function admin_panel( $fresh = false ) {

		return self::factory( 'admin-panel' );
	}


	/**
	 * Used for accessing Better_Admin_Page
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Admin_Page
	 */
	public static function admin_page( $fresh = false ) {

		return self::factory( 'admin-page' );
	}


	/**
	 * Used for accessing BF_Admin_Menus
	 *
	 * @param bool $fresh
	 *
	 * @return BF_Admin_Menus
	 */
	public static function admin_menus( $fresh = false ) {

		return self::factory( 'admin-menus' );
	}


	/**
	 * Gets a WP_Theme object for a theme.
	 *
	 * @param bool $parent
	 * @param bool $fresh
	 * @param bool $cache_this
	 *
	 * @return  WP_Theme
	 */
	public static function theme( $parent = true, $fresh = false, $cache_this = true ) {

		if ( isset( self::$instances['theme'] ) && ! $fresh ) {
			return self::$instances['theme'];
		}

		$theme = wp_get_theme();

		if ( $parent && ( '' != $theme->get( 'Template' ) ) ) {
			$theme = wp_get_theme( $theme->get( 'Template' ) );
		}

		if ( $cache_this === true ) {
			return self::$instances['theme'] = $theme;
		} else {
			return $theme;
		}

	}


	/**
	 * Reference To HTML Generator Class
	 *
	 * static
	 *
	 * @since 1.0
	 * @return BF_HTML_Generator
	 */
	public static function html() {

		return new BF_HTML_Generator;
	}


	/**
	 * Callback: Handle BF Admin Enqueue's
	 *
	 * Action: admin_enqueue_scripts
	 *
	 * @since   1.0
	 *
	 * @return  object
	 */
	public function admin_enqueue_scripts() {

		if ( stristr( current_filter(), 'elementor' ) ) {

			self::register_assets();
		}

		/*
		 * enqueue admin-scripts in all pages
		 *
		// enqueue scripts if features enabled
		if( $this->sections['admin_panel'] == true  ||
			$this->sections['meta_box'] == true     ||
			$this->sections['better-menu'] == true  ||
			$this->sections['taxonomy_meta_box'] == true
		){
			if( $this->get_current_page_type() != '' ){*/

		// Wordpress 3.5
		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		// BetterFramework Admin scripts
		wp_enqueue_script( 'better-framework-admin' );

		if ( ( $type = $this->get_current_page_type() ) == '' ) {
			$type = '0';
		}

		$better_framework_loc = array(
			'bf_ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'       => wp_create_nonce( 'bf_nonce' ),
			'type'        => $type,
			'lang'        => bf_get_current_lang(),

			// Localized Texts
			'translation' => array(
				'reset_panel'  => array(
					'header'     => __( 'Reset options', 'better-studio' ),
					'title'      => __( 'Are you sure to reset options?', 'better-studio' ),
					'body'       => __( 'With resetting panel all your changes will be lost and will be replaced with default settings.', 'better-studio' ),
					'button_yes' => __( 'Yes, Reset options', 'better-studio' ),
					'button_no'  => __( 'No', 'better-studio' ),
					'resetting'  => __( 'Resetting options', 'better-studio' ),
				),
				'import_panel' => array(
					'prompt' => __( 'Do you really wish to override your current settings?', 'better-studio' ),
				),
				'icon_modal'   => array(
					'custom_icon' => __( 'Custom icon', 'better-studio' ),
				),
				'show_all'     => __( '… See all', 'better-studio' ),
				'widgets'      => array(
					'save' => __( 'Save', 'better-studio' ),
				)
			),

			'loading'     => '<div class="bf-loading-wrapper"><div class="bf-loading-anim"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>',
			'term_select' => array(
				'make_primary' => __( 'Make Primary', 'better-studio' ),
				'excluded'     => __( 'Excluded', 'better-studio' ),
			),

			'on_error' => array(
				'button_ok'       => __( 'Ok', 'better-studio' ),
				'default_message' => __( 'Cannot complete ajax request.', 'better-studio' ),
				'body'            => __( 'please try again several minutes later or contact better studio team support.', 'better-studio' ),
				'header'          => __( 'ajax request failed', 'better-studio' ),
				'title'           => __( 'an error occurred', 'better-studio' ),
				'display_error'   => __( '<div class="bs-pages-error-section">
					<a href="#" class="btn bs-pages-error-copy" data-copied="' . esc_attr__( 'Copied !', 'better-studio' ) . '">
						<i class="fa fa-files-o" aria-hidden="true"></i> Copy</a>  <textarea> Error:  %ERROR_CODE% %ERROR_MSG% </textarea>
				</div>', 'better-studio' ),

				'again' => __( 'Error: please try again', 'better-studio' ),
			),

			'fields' => array(
				'select_popup' => array(
					'header'           => '%%name%%',
					'search'           => __( 'Search...', 'better-studio' ),
					'btn_label'        => __( 'Choose', 'better-studio' ),
					'btn_label_active' => __( 'Current', 'better-studio' ),

					'filter_cat_title' => __( 'Category', 'better-studio' ),
					'categories'       => array(),


					'filter_type_title' => __( 'Type', 'better-studio' ),
					'all_l10n'          => __( 'All', 'better-studio' ),

					'types' => array(),
				),

				'select_popup_confirm' => array(
					'header'        => __( 'Do you want to change %%name%%?', 'better-studio' ),
					'button_ok'     => __( 'Yes, Change', 'better-studio' ),
					'button_cancel' => __( 'Cancel', 'better-studio' ),

					'caption' => '%s',
				),
			)
		);

		if ( $this->sections['page-builder'] || $this->sections['vc-extender'] ) {

			$better_framework_loc['page_builder'] = BF_Page_Builder_Extender::active_page_builders();

			if ( $this->get_current_page_type() === 'widgets' &&
			     'Elementor' === $better_framework_loc['page_builder']
			) {

				$better_framework_loc['shortcodes_id'] = array_keys( BF_Shortcodes_Manager::$shortcodes );
			}
		} else {
			$better_framework_loc['page_builder'] = array();
		}

		wp_localize_script( 'better-framework-admin', 'better_framework_loc', apply_filters( 'better-framework/localized-items', $better_framework_loc ) );

		// BetterFramework admin style
		wp_enqueue_style( 'better-framework-admin' );

		if ( is_rtl() ) {
			wp_enqueue_style( 'better-framework-admin-rtl' );
		}

		if ( $this->get_current_page_type() == 'metabox' ) {
			bf_enqueue_modal( 'icon' ); // safe enqueue for fixing visual composer bug
		}

		bf_enqueue_style( 'better-studio-admin-icon' );
		bf_enqueue_style( 'fontawesome' );
	}


	/**
	 * Used for finding current page type
	 *
	 * @return string
	 */
	public function get_current_page_type() {

		global $pagenow;

		$type = '';

		switch ( $pagenow ) {

			case 'post-new.php':
			case 'post.php':

				if ( isset( $_GET['action'] ) && $_GET['action'] === 'elementor' ) {

					$type = 'widgets';

				} else {

					$type = 'metabox';
				}

				break;

			case 'term.php':
			case 'edit-tags.php':
				$type = 'taxonomy';
				break;

			case 'widgets.php':
				$type = 'widgets';
				break;

			case 'nav-menus.php':
				$type = 'menus';
				break;

			case 'profile.php':
			case 'user-new.php':
			case 'user-edit.php':
				$type = 'users';
				break;

			case 'index.php':
				$type = 'dashboard';
				break;

			default:
				if ( isset( $_GET['page'] ) && ( preg_match( '/^better-studio-/', $_GET['page'] ) || preg_match( '/^better-studio\//', $_GET['page'] ) ) ) {
					$type = 'panel';
				}

		}

		return $type;
	}


	/**
	 * Handle Ajax File Uploads
	 *
	 * @param string $data The variable that includes all options in array
	 *
	 * @since 1.0
	 * @return void
	 */
	public function handle_file_upload( $data ) {

		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		$movefile = wp_handle_upload(
			$data,
			array(
				'test_form' => false
			)
		);

		if ( array_key_exists( 'error', $movefile ) ) {
			$upResults = array(
				'status' => 'error',
				'msg'    => $movefile['error']
			);
		} else {
			$upResults = array(
				'status' => 'succeed',
				'url'    => $movefile['url'],
				'path'   => $movefile['file']
			);
		}

		echo json_encode( $upResults );
		die;

	}


	public static function callback_token( $callback ) {

		return wp_create_nonce( sprintf( 'bf-custom-callback:%s', $callback ) );
	}


	/**
	 * Handle All Ajax Requests in Back-End
	 *
	 * @since 1.0
	 * @return mixed
	 */
	public function admin_ajax() {

		// Check Nonce
		if ( ! isset( $_REQUEST['nonce'] ) || ! isset( $_REQUEST['reqID'] ) ) {
			die(
			json_encode(
				array(
					'status' => 'error',
					'msg'    => __( 'Security Error!', 'better-studio' )
				)
			)
			);
		}

		$_nonce = wp_verify_nonce( $_REQUEST['nonce'], 'bf_nonce' );

		// Check Nonce
		if ( $_nonce === false ) {
			die(
			json_encode(
				array(
					'status' => 'error',
					'msg'    => __( 'Security Error!', 'better-studio' )
				)
			)
			);
		}

		try {

			switch ( $_REQUEST['reqID'] ) {

				// Option Panel, Save Settings
				case( 'save_admin_panel_options' ):

					$options = bf_parse_str( ltrim( rtrim( stripslashes( $_REQUEST['data'] ), '&' ), '&' ) );

					$data = array(
						'id'   => $_REQUEST['panelID'],
						'lang' => $_REQUEST['lang'],
						'data' => $options
					);

					do_action( 'better-framework/panel/save', $data );
					break;

				// Ajax Image Uploader
				case( 'image_upload' ):
					$data = $_FILES[ $_REQUEST['file_id'] ];
					do_action( 'better-framework/panel/image-upload', $data, $_REQUEST['file_id'] );
					break;

				// Add Custom Icon
				case( 'add_custom_icon' ):
					do_action( 'better-framework/icons/add-custom-icon', $_REQUEST['icon'] );
					break;

				// Remove Custom Icon
				case( 'remove_custom_icon' ):
					do_action( 'better-framework/icons/remove-custom-icon', $_REQUEST['icon'] );
					break;

				// Option Panel, Reset Settings
				case( 'reset_options_panel' ):

					/**
					 * Fires for handling panel reset
					 *
					 * @since 1.0.0
					 *
					 * @param string $args reset panel data
					 */
					do_action( 'better-framework/panel/reset', array(
						'id'      => $_REQUEST['panelID'],
						'lang'    => $_REQUEST['lang'],
						'options' => $_REQUEST['to_reset']
					) );
					break;

				// Option Panel, Ajax Action
				case( 'ajax_action' ):

					$callback = isset( $_REQUEST['callback'] ) ? $_REQUEST['callback'] : '';

					$args = isset( $_REQUEST['args'] ) ? $_REQUEST['args'] : '';

					$error_message = isset( $_REQUEST['error-message'] ) ? $_REQUEST['error-message'] : __( 'An error occurred while doing action.', 'better-studio' );

					//Security issue fix
					if ( empty( $_REQUEST['bf_call_token'] ) || self::callback_token( $callback ) !== $_REQUEST['bf_call_token'] ) {

						echo json_encode(
							array(
								'status' => 'error',
								'msg'    => __( 'the security token is not valid!', 'better-studio' )
							)
						);

						return;
					}
					if ( ! empty( $callback ) && is_callable( $callback ) ) {

						if ( is_array( $args ) ) {

							$to_return = call_user_func_array( $callback, $args );

						} else {

							$to_return = call_user_func( $callback, $args );

						}

						if ( is_array( $to_return ) ) {
							echo json_encode( $to_return );
						} else {
							echo json_encode(
								array(
									'status' => 'error',
									'msg'    => $error_message
								)
							);
						}

					} else {
						echo json_encode(
							array(
								'status' => 'error',
								'msg'    => $error_message
							)
						);
					}
					break;

				// Option Panel, Ajax Field
				case( 'ajax_field' ):

					if ( isset( $_REQUEST['callback'] ) && is_callable( $_REQUEST['callback'] ) ) {

						$cb = $_REQUEST['callback'];

						$cb_args = array(
							! empty( $_REQUEST['key'] ) ? $_REQUEST['key'] : '',
							! empty( $_REQUEST['exclude'] ) ? $_REQUEST['exclude'] : ''
						);

						$to_return = call_user_func_array( $cb, $cb_args );

						if ( is_array( $to_return ) ) {
							echo count( $to_return ) === 0 ? - 1 : json_encode( $to_return );
						}
					}

					break;

				// Option Panel, Import Settings
				case( 'import' ):

					$data = $_FILES['bf-import-file-input'];

					/**
					 * Fires for handling panel import
					 *
					 * @since 1.1.0
					 *
					 * @param string $data contain import file data
					 * @param string $args contain import arguments
					 */
					do_action( 'better-framework/panel/import', $data, $_REQUEST );

					break;

				case 'fetch-deferred-field':

					if (
						! empty( $_REQUEST['sectionID'] ) &&
						! empty( $_REQUEST['panelID'] ) &&
						is_string( $_REQUEST['sectionID'] )
					) {  // panel field

						do_action( 'better-framework/panel/ajax-panel-field', $_REQUEST['panelID'], $_REQUEST['sectionID'] );
					} elseif ( ! empty( $_REQUEST['sectionID'] ) &&
					           ! empty( $_REQUEST['metabox'] ) &&
					           ! empty( $_REQUEST['metabox_id'] ) &&
					           is_string( $_REQUEST['sectionID'] )
					) { // metabox field

						$type      = isset( $_REQUEST['type'] ) ? $_REQUEST['type'] : '';
						$object_id = isset( $_REQUEST['object_id'] ) ? $_REQUEST['object_id'] : '';


						if ( $type === 'taxonomy' ) {

							$hook = 'better-framework/taxonomy/metabox/ajax-tab';

						} elseif ( $type === 'users' ) {

							$hook = 'better-framework/user-metabox/ajax-tab';

						} else {

							$hook = 'better-framework/metabox/ajax-tab';
						}

						do_action( $hook, $_REQUEST['sectionID'], $_REQUEST['metabox_id'], $object_id );
					}

					break;

				case 'fetch-mce-view-fields':

					if ( ! empty( $_REQUEST['shortcode'] ) ) {

						do_action( 'better-framework/shortcodes/tinymce-fields', wp_unslash( $_REQUEST['shortcode'] ), $_REQUEST );
					}

					break;

				case 'fetch-mce-view-shortcode':

					if ( ! empty( $_REQUEST['shortcodes'] ) ) {
						do_action( 'better-framework/shortcodes/tinymce-view-shortcode', wp_unslash( $_REQUEST['shortcodes'] ), $_REQUEST );
					}

					break;

				case 'term_select_items':


					if ( ! empty( $_REQUEST['data'] ) ) {

						do_action( 'better-framework/fields/term-select-items', $_REQUEST['data'] );
					}

					break;

			}
		} catch( Exception $e ) {

			$result = array(
				'error_message' => $e->getMessage(),
				'error_code'    => $e->getCode(),
				'is_error'      => true,
			);

			echo json_encode( compact( 'result' ) );
		}

		die;
	}


	public static function register_assets() {

		self::register_scripts();
		self::register_styles();
	}


	public static function register_scripts() {

		$version = Better_Framework::self()->version;
		$prefix  = ! bf_is( 'dev' ) ? '.min' : '';

		// Element Query
		bf_register_script( 'element-query', BF_URI . 'assets/js/element-query.min.js', array( 'jquery' ), BF_PATH . 'assets/js/element-query.min.js', $version );

		// PrettyPhoto
		bf_register_script( 'pretty-photo', BF_URI . 'assets/js/pretty-photo' . $prefix . '.js', array( 'jquery' ), BF_PATH . 'assets/js/pretty-photo' . $prefix . '.js', $version );

		//
		// Admin Scripts
		//

		bf_register_script( 'bf-admin-plugins', BF_URI . 'assets/js/admin-plugins.js', array(
			'wp-color-picker',
			'jquery'
		), BF_PATH . 'assets/js/admin-plugins.js', $version );

		// BF Used Plugins JS File
		bf_register_script( 'bf-better-modals', BF_URI . 'assets/js/better-modals.js', array( 'jquery' ), BF_PATH . 'assets/js/better-modals.js', $version );

		// BS-Modal
		bf_register_script( 'mustache', BF_URI . 'assets/js/mustache' . $prefix . '.js', array( 'jquery' ), BF_PATH . 'assets/js/mustache' . $prefix . '.js', $version );
		bf_register_script( 'bf-modal', BF_URI . 'assets/js/bs-modal' . $prefix . '.js', array(
			'mustache',
			'jquery'
		), BF_PATH . 'assets/js/bs-modal' . $prefix . '.js', $version );

		// Ace Code Editor
		if ( is_admin() ) {
			add_action( 'admin_footer', 'BF_Assets_Manager::print_ace_editor_oldie_js' );
		} elseif ( is_user_logged_in() ) {
			add_action( 'wp_footer', 'BF_Assets_Manager::print_ace_editor_oldie_js' );
		}

		// Better Fonts Manager
		bf_register_script( 'selector-modal', BF_URI . 'assets/js/selector-modal' . $prefix . '.js', array( 'jquery' ), BF_PATH . 'assets/js/selector-modal' . $prefix . '.js', $version );
		bf_register_script( 'better-fonts-manager', BF_URI . 'assets/js/better-fonts-manager.js', array( 'selector-modal' ), BF_PATH . 'assets/js/better-fonts-manager.js', Better_Framework::self()->version );

		// TinyMCE Shortcode View
		bf_register_script( 'tinymce-addon', BF_URI . 'assets/js/tinymce-addon' . $prefix . '.js', array( 'jquery' ), BF_PATH . 'assets/js/tinymce-addon' . $prefix . '.js', $version );

		bf_register_script( 'bf-gutenberg-fields', BF_URI . 'gutenberg/dev/dist/blocks.build.js', array(
			'wp-blocks',
			'wp-i18n',
			'wp-element'
		), BF_PATH . 'gutenberg/dev/dist/blocks.build.js', $version );

		bf_register_script( 'bf-gutenberg', BF_URI . 'assets/js/gutenberg' . $prefix . '.js', array(
			'bf-gutenberg-fields',
		), BF_PATH . 'assets/js/gutenberg' . $prefix . '.js', $version );


		// BetterFramework admin script
		bf_register_script( 'better-framework-admin', BF_URI . 'assets/js/admin-scripts.js', array(
			'bf-better-modals',
			'selector-modal',
			'bf-modal',
			'jquery',
			'jquery-ui-core',
			'jquery-ui-widget',
			'jquery-ui-slider',
			'jquery-ui-sortable',
			'bf-admin-plugins',
			'ace-editor-script',

		),
			BF_PATH . 'assets/js/admin-scripts.js',
			$version
		);


		bf_call_func( 'wp' . '_' . 'deregister' . '_' . 'script', 'ace-editor' ); // remove ‌VC troubled script
		wp_register_script(
			'ace-editor-script',
			'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js',
			array(),
			$version,
			true
		);

		// Slick carousel
		bf_register_script( 'bf-slick', BF_URI . 'assets/js/slick' . $prefix . '.js', array( 'jquery' ), BF_PATH . 'assets/js/slick' . $prefix . '.js', $version );

	}


	public static function register_styles() {

		$prefix = ! bf_is( 'dev' ) ? '.min' : '';

		$version = Better_Framework::self()->version;

		// FontAwesome
		wp_deregister_style( 'fontawesome' );
		wp_deregister_style( 'font-awesome' );
		bf_register_style( 'fontawesome', BF_URI . 'assets/css/font-awesome.min.css', array(), BF_PATH . 'assets/css/font-awesome.min.css', $version );

		// BetterStudio Font Icon
		bf_register_style( 'bs-icons', BF_URI . 'assets/css/bs-icons.css', array(), BF_PATH . 'assets/css/bs-icons.css', $version );

		// Better Studio Admin Icon
		bf_register_style( 'better-studio-admin-icon', BF_URI . 'assets/css/better-studio-admin-icon.css', array(), BF_PATH . 'assets/css/better-studio-admin-icon.css', $version );

		// Pretty Photo
		bf_register_style( 'pretty-photo', BF_URI . 'assets/css/pretty-photo' . $prefix . '.css', array(), BF_PATH . 'assets/css/pretty-photo' . $prefix . '.css', $version );

		// 
		// Admin Styles
		//

		/**
		 * Enqueue Color Picker Dependencies
		 *
		 * uncompressed version also available in assets/js/color-picker.js
		 */
		bf_register_style( 'wp-color-picker' );

		// Modal
		bf_register_style( 'better-modals', BF_URI . 'assets/css/better-modals.css', array(), BF_PATH . 'assets/css/better-modals.css', $version );


		// BF Used Plugins CSS
		bf_register_style( 'bf-admin-pages', BF_URI . 'assets/css/admin-pages.css', array(), BF_PATH . 'assets/css/admin-pages.css', $version );

		// BF Used Plugins CSS
		bf_register_style( 'bf-admin-plugins', BF_URI . 'assets/css/admin-plugins.css', array(), BF_PATH . 'assets/css/admin-plugins.css', $version );

		// CodeMirror (syntax highlighter code editor) CSS
		bf_register_style( 'bf-codemirror-packs', BF_URI . 'assets/css/codemirror-pack.css', array(), BF_PATH . 'assets/css/codemirror-pack.css', $version );

		// BS-Modal
		bf_register_style( 'bf-modal', BF_URI . 'assets/css/bs-modal.css', array(), BF_PATH . 'assets/css/bs-modal.css', $version );


		// BetterFramework admin style
		bf_register_style( 'better-framework-admin', BF_URI . 'assets/css/admin-style.css', array(
			'better-modals',
			'bf-modal',
			'bs-icons',
			'better-studio-admin-icon',
			'bf-admin-plugins',
			'bf-codemirror-packs',
			'wp-color-picker',
		),
			BF_PATH . 'assets/css/admin-style.css',
			$version
		);

		if ( is_rtl() ) {
			bf_register_style(
				'better-framework-admin-rtl',
				BF_URI . 'assets/css/rtl-admin-style.css',
				array(
					'better-framework-admin',
				),
				BF_PATH . 'assets/css/rtl-admin-style.css',
				$version
			);
		}

		// Slick carousel
		bf_register_style( 'bf-slick', BF_URI . 'assets/css/slick' . $prefix . '.css', array(), BF_PATH . 'assets/css/slick' . $prefix . '.css', $version );

	}


	public static function get_core_cache( $key, $default = null ) {

		$options = get_option( 'bf-core-cache' );

		if ( isset( $options[ $key ] ) ) {
			return $options[ $key ];
		}

		return $default;
	}


	/**
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @return bool False if value was not updated and true if value was updated.
	 */
	public static function set_core_cache( $key, $value ) {

		$options = get_option( 'bf-core-cache', array() );

		$options[ $key ] = $value;

		return update_option( 'bf-core-cache', $options );
	}
}
