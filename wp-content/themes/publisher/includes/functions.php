<?php
/**
 * functions.php
 *---------------------------
 * This file contains general functions that used inside theme to
 * do important sections.
 *
 * We create them in a way that you can override them in child them simply!
 * Simply copy the function into child theme and remove the "if( ! function_exists( '*****' ) ){".
 */


$template_directory = trailingslashit( get_template_directory() );
$template_uri       = trailingslashit( get_template_directory_uri() );

if ( ! defined( 'PUBLISHER_THEME_ADMIN_ASSETS_URI' ) ) {
	define( 'PUBLISHER_THEME_ADMIN_ASSETS_URI', $template_uri . 'includes/admin-assets/' );
}

if ( ! defined( 'PUBLISHER_THEME_PATH' ) ) {
	define( 'PUBLISHER_THEME_PATH', $template_directory );
}

if ( ! defined( 'PUBLISHER_THEME_URI' ) ) {
	define( 'PUBLISHER_THEME_URI', $template_uri );
}

if ( ! defined( 'PUBLISHER_THEME_VERSION' ) ) {
	define( 'PUBLISHER_THEME_VERSION', '7.6.2' );
}

// Defines constant to prevent ad blockers to detect the Better Ads Manager classes!
// It's a fallback because we used it inside theme and if the Better Ads Manager was active this constant will be defined
// by BAM sooner!
if ( ! defined( 'BAM_PREFIX' ) ) {
	define( 'BAM_PREFIX', 'bsac' );
}


if ( ! function_exists( 'publisher_get_theme_panel_id' ) ) {
	/**
	 * Used to get theme panel id
	 *
	 * @return string
	 */
	function publisher_get_theme_panel_id() {

		return 'bs_' . 'publisher_theme_options';
	}
}


add_filter( 'publisher-theme-core/config', 'publisher_config_theme_core', 22 );

if ( ! function_exists( 'publisher_config_theme_core' ) ) {
	/**
	 * Callback: Config "Publisher Theme Core" library needle sections.
	 * Filter: publisher-theme-core/config
	 *
	 * @param array $config
	 *
	 * @return array
	 */
	function publisher_config_theme_core( $config = array() ) {

		$config['dir-path']   = PUBLISHER_THEME_PATH . 'includes/libs/bs-theme-core/';
		$config['dir-url']    = PUBLISHER_THEME_URI . 'includes/libs/bs-theme-core/';
		$config['theme-slug'] = 'publisher';
		$config['theme-name'] = publisher_white_label_get_option( 'publisher' );

		$config['sections']['attr']                   = true;
		$config['sections']['meta-tags']              = true;
		$config['sections']['listing-pagin']          = true;
		$config['sections']['translation']            = true;
		$config['sections']['social-meta-tags']       = true;
		$config['sections']['chat-format']            = true;
		$config['sections']['duplicate-posts']        = true;
		$config['sections']['gallery-slider']         = true;
		$config['sections']['shortcodes-placeholder'] = is_user_logged_in();
		$config['sections']['theme-helpers']          = true;
		$config['sections']['vc-helpers']             = true;
		$config['sections']['rebuild-thumbnails']     = true;
		$config['sections']['page-templates']         = true;
		$config['sections']['post-fields']            = true;
		$config['sections']['lazy-load']              = true;
		$config['sections']['svg-support']            = true;
		$config['sections']['featured-image']         = true;

		return $config;
	}
}


// Init BetterTranslation for theme
add_filter( 'publisher-theme-core/translation/config', 'publisher_translations_config' );

if ( ! function_exists( 'publisher_translations_config' ) ) {
	/**
	 * Callback: Publisher Translation configurations
	 *
	 * Filter: better-translation/config
	 *
	 * @param $config
	 *
	 * @return mixed
	 */
	function publisher_translations_config( $config ) {

		$config['theme-id']      = 'publisher';
		$config['theme-name']    = publisher_white_label_get_option( 'publisher' );
		$config['notice-icon']   = PUBLISHER_THEME_URI . 'images/admin/notice-logo.png';
		$config['menu-parent']   = 'bs-product-pages-welcome';
		$config['menu-position'] = 55;

		return $config;
	} // publisher_translations_config
}


// Initialize White Label Feature
include $template_directory . 'includes/white-label/init.php';


// Initialize push notification Feature
include $template_directory . 'includes/push-notifications/init.php';


// block functions
include $template_directory . 'includes/func-block.php';


// block heading functions
include $template_directory . 'includes/func-block-heading.php';


// block settings functions
include $template_directory . 'includes/func-block-setting.php';

// Config Publisher fonts
include $template_directory . 'includes/fonts/theme-fonts.php';


// Config demos
include $template_directory . 'includes/demos/init.php';


// Initialize styles
include $template_directory . 'includes/styles/init.php';


// main slider functions
include $template_directory . 'includes/func-slider.php';


// share functions
include $template_directory . 'includes/func-share.php';


// layout functions
include $template_directory . 'includes/func-layout.php';


// listing functions
include $template_directory . 'includes/func-listing.php';


// pagination functions
include $template_directory . 'includes/func-pagination.php';


// header functions
include $template_directory . 'includes/func-header.php';


// footer functions
include $template_directory . 'includes/func-footer.php';


// CPT & TAX functions
include $template_directory . 'includes/func-cpt-tax.php';


// template functions
include $template_directory . 'includes/func-template.php';


// review and rating functions
include $template_directory . 'includes/func-review-rating.php';


// social login functions
include $template_directory . 'includes/func-social-login.php';


// more stories functions
include $template_directory . 'includes/func-more-stories.php';

// related posts functions
include $template_directory . 'includes/func-related-posts.php';


// search functions
include PUBLISHER_THEME_PATH . 'includes/func-search.php';


// lazy loading functions
include PUBLISHER_THEME_PATH . 'includes/func-lazyloading.php';


// Includes panel blocks setting field generator callback only in admin
if ( is_admin() ) {
	include PUBLISHER_THEME_PATH . 'includes/options/fields-cb.php';
}


// loop functions
include PUBLISHER_THEME_PATH . 'includes/func-loop.php';


// menu functions
include PUBLISHER_THEME_PATH . 'includes/func-menu.php';


// other functions
include PUBLISHER_THEME_PATH . 'includes/func-other.php';

