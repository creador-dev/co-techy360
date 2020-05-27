<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


/**
 * Handy Function for accessing to Publisher_Theme_Core
 *
 * @return Publisher_Theme_Core
 */
function Publisher_Theme_Core() {

	return Publisher_Theme_Core::self();
}


// Init
Publisher_Theme_Core()->init();


/**
 * Publisher Theme Core
 *
 * Core functionality of themes.
 *
 * @package  Publisher Theme Core
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.0.0
 * @access   public
 * @see      http://www.betterstudio.com
 */
class Publisher_Theme_Core {


	/**
	 * The version
	 *
	 * @var string
	 */
	private $version = '1.9.0';


	/**
	 * Directory URL
	 *
	 * @var string
	 */
	private $dir_url;


	/**
	 * Directory path
	 *
	 * @var string
	 */
	private $dir_path;


	/**
	 * Includes the config of Publisher Theme Core
	 *
	 * @var array
	 */
	public static $config = array(
		'sections' => array(
			'attr'                   => true,
			'meta-tags'              => true,
			'theme-helpers'          => true,
			'listing-pagin'          => true,
			'featured-image'         => true,
			//
			'translation'            => false,
			'vc-helpers'             => false,
			'social-meta-tags'       => false,
			'chat-format'            => false,
			'duplicate-posts'        => false,
			'gallery-sliders'        => false,
			'shortcodes-placeholder' => false,
			'rebuild-thumbnails'     => false,
			'page-templates'         => false,
			'post-fields'            => false,
			'lazy-load'              => false,
		)
	);


	/**
	 * Inner array of object instances and caches
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 * Initializes the core
	 *
	 * @return bool
	 */
	function init() {

		/**
		 * Filter Publisher Theme Core config
		 *
		 * todo following field should passed to this filter and all sub sections should use only from this
		 * - theme name
		 * - theme slug
		 * - theme ID
		 * - notice icon
		 *
		 * @since 1.0.0
		 *
		 * @param string $config configurations
		 */
		self::$config = apply_filters( 'publisher-theme-core/config', self::$config );

		if (
			empty( self::$config['theme-slug'] ) ||
			empty( self::$config['theme-name'] ) ||
			empty( self::$config['dir-url'] ) ||
			empty( self::$config['dir-path'] )
		) {
			return false;
		}


		$this->dir_url = trailingslashit( self::$config['dir-url'] );

		$this->dir_path = trailingslashit( self::$config['dir-path'] );


		if ( ! defined( 'PUBLISHER_THEME_ADMIN_ASSETS_URI' ) ) {
			define( 'PUBLISHER_THEME_ADMIN_ASSETS_URI', $this->dir_url . 'includes/admin-assets/' );
		}

		if ( ! defined( 'PUBLISHER_THEME_PATH' ) ) {
			define( 'PUBLISHER_THEME_PATH', $this->dir_path );
		}

		if ( ! defined( 'PUBLISHER_THEME_URI' ) ) {
			define( 'PUBLISHER_THEME_URI', $this->dir_url );
		}

		if ( ! defined( 'PUBLISHER_SLUG' ) ) {
			define( 'PUBLISHER_SLUG', self::$config['theme-slug'] );
		}

		if ( ! defined( 'PUBLISHER_NAME' ) ) {
			define( 'PUBLISHER_NAME', self::$config['theme-name'] );
		}

		if ( ! defined( 'PUBLISHER_THEME_VERSION' ) ) {
			define( 'PUBLISHER_THEME_VERSION', '1.0.0' );
		}

		// Initialize requested libs
		if ( isset( self::$config['sections'] ) ) {
			foreach ( (array) self::$config['sections'] as $section_id => $section ) {

				if ( ! $section ) {
					continue;
				}

				// current directory path
				$section_id = str_replace( '-', '_', $section_id );

				if ( is_callable( array( $this, $section_id ) ) ) {
					$this->$section_id();
				}

			}
		}

	}


	/**
	 * Used for accessing alive instance of Publisher_Theme_Core
	 *
	 * @since 1.0
	 *
	 * @return Publisher_Theme_Core
	 */
	public static function self() {

		return self::factory( 'self' );
	}


	/**
	 * Build the required object instance
	 *
	 * @param   string $object
	 * @param   bool   $fresh
	 * @param   bool   $just_include
	 *
	 * @return  null|Publisher_Theme_Core
	 */
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Publisher_Theme_Core Class
			 */
			case 'self':
				$class = 'Publisher_Theme_Core';
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
	 * Used for retrieving version
	 *
	 * @return string
	 */
	function get_version() {

		return $this->version;
	}


	/**
	 * Used for retrieving directory URL
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function get_dir_url( $append = '' ) {

		return $this->dir_url . ltrim( $append, '/' );
	}


	/**
	 * Used for retrieving directory path
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function get_dir_path( $append = '' ) {

		return $this->dir_path . ltrim( $append, '/' );
	}


	/**
	 * Attributes & Schema.org Helpers.
	 */
	function attr() {

		$dir = self::get_dir_path();


		// Core functions
		include $dir . 'attr/core.php';

		// Structural tags functions and filters
		include $dir . 'attr/structural.php';

		// Header tags functions and filters
		include $dir . 'attr/header.php';

		// Post tags functions and filters
		include $dir . 'attr/post.php';

		// Comment tags functions and filters
		include $dir . 'attr/comment.php';
	}


	/**
	 * Init 'meta-tags' section
	 */
	function meta_tags() {

		$dir = self::get_dir_path();

		include $dir . 'meta-tags/core.php';
		include $dir . 'meta-tags/tags.php';
	}


	/**
	 * Init 'social-meta-tags' section
	 * Social Networks Meta Tag Generator
	 */
	function social_meta_tags() {

		include self::get_dir_path() . 'social-meta-tags/class-publisher-theme-social-meta-tag-generator.php';
	}


	/**
	 * Init 'chat-format' section
	 * Chat post format content formatter
	 */
	function chat_format() {

		include self::get_dir_path() . 'chat-format/chat-format.php';
	}


	/**
	 * Init 'duplicate-posts' section
	 * Duplicate posts remover
	 */
	function duplicate_posts() {

		include self::get_dir_path() . 'duplicate-posts/class-publisher-theme-duplicate-posts.php';
	}


	/**
	 * Init 'gallery-slider' section
	 */
	function gallery_slider() {

		include self::get_dir_path() . 'gallery-slider/class-publisher-theme-gallery-slider.php';
	}


	/**
	 * Init 'shortcodes-placeholder' section
	 * Shortcodes placeholder
	 */
	function shortcodes_placeholder() {

		include self::get_dir_path() . 'shortcodes-placeholder/class-publisher-theme-shortcodes-placeholder.php';
	}


	/**
	 * Init 'theme-helpers' section
	 */
	function theme_helpers() {

		$dir = self::get_dir_path();

		include $dir . 'theme-helpers/core.php';
		include $dir . 'theme-helpers/template-helpers.php';
		include $dir . 'theme-helpers/template-content.php';
		include $dir . 'theme-helpers/template-comment.php';
	}


	/**
	 * Init 'vc-helpers' section
	 * Visual Composer Helpers
	 */
	function vc_helpers() {

		include self::get_dir_path() . 'vc-helpers/vc-helpers.php';
	}


	/**
	 * Init 'listing-pagin' section
	 */
	function listing_pagin() {

		include self::get_dir_path() . 'listing-pagin/init.php';
	}


	/**
	 * Init 'translation' section
	 */
	function translation() {

		include self::get_dir_path() . 'translation/class-publisher-translation.php';
	}


	/**
	 * Init 'rebuild-thumbnails' section
	 */
	function rebuild_thumbnails() {

		if ( ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) // check is doing ajax
		     ||
		     is_admin()
		) {
			include self::get_dir_path() . 'rebuild-thumbnails/init.php';
		}
	}


	/**
	 * Init 'page-templates' section
	 */
	public function page_templates() {

		if ( ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) // check is doing ajax
		     ||
		     is_admin()
		) {
			include self::get_dir_path() . 'page-templates/init.php';
		}

	}


	/**
	 * Init 'post-fields' section
	 */
	public function post_fields() {

		if ( ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) // check is doing ajax
		     ||
		     is_admin()
		) {
			include self::get_dir_path() . 'post-fields/publisher-theme-post-fields.php';
		}

	}


	/**
	 * Include lazy loading library
	 *
	 * @since 1.1.0
	 */
	public function lazy_load() {

		include self::get_dir_path() . 'lazy-load/lazy-loading.php';
	}


	/**
	 * Include lazy loading library
	 *
	 * @since 1.1.0
	 */
	public function featured_image() {

		include self::get_dir_path() . 'featured-image/publisher-extend-featured-image.php';
	}

} // Publisher_Theme_Core
