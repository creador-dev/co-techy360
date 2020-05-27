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


/**
 * Better Framework Font Manager
 *
 *
 * @package  BetterFramework
 * @author   BetterStudio <info@betterstudio.com>
 * @access   public
 * @see      http://www.betterstudio.com
 */
class BF_Fonts_Manager {


	/**
	 * Panel ID
	 *
	 * @var string
	 */
	public $option_panel_id = 'better-framework-custom-fonts';


	/**
	 * Inner array of object instances and caches
	 *
	 * @var array
	 */
	protected static $instances = array();


	/**
	 *
	 */
	function __construct() {

		add_filter( 'better-framework/panel/add', array(
			$this,
			'panel_add'
		), 100 );

		add_filter( 'better-framework/panel/' . $this->option_panel_id . '/config', array(
			$this,
			'panel_config'
		), 100 );

		add_filter( 'better-framework/panel/' . $this->option_panel_id . '/fields', array(
			$this,
			'panel_fields'
		), 100 );

		add_filter( 'better-framework/panel/' . $this->option_panel_id . '/std', array(
			$this,
			'panel_std'
		), 100 );

		// Callback for resetting data
		add_filter( 'better-framework/panel/reset/result', array( $this, 'callback_panel_reset_result' ), 10, 2 );

		// Callback for importing data
		add_filter( 'better-framework/panel/import/result', array( $this, 'callback_panel_import_result' ), 10, 3 );

		// Callback changing save result
		add_filter( 'better-framework/panel/save/result', array( $this, 'callback_panel_save_result' ), 10, 2 );

		// Adds fonts file types to WP uploader
		if ( is_admin() ) {
			add_filter( 'upload_mimes', array( $this, 'filter_upload_mimes_types' ), 1000 );
		}

		// Hook BF admin assets enqueue
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		// Output custom css for custom fonts
		add_action( 'template_redirect', array( $this, 'admin_custom_css' ), 1 );

		// Prints TypeKit font head js code
		add_action( 'wp_head', 'BF_Fonts_Manager::print_typekit_head_code' );
	}


	public static function ajax_add_custom_font( $data ) {

		$POST = array();
		wp_parse_str( urldecode( $data ), $POST );

		if ( ! isset( $POST['fonts'] ) || ! isset( $POST['font-name'] ) ) {
			return false;
		}

		$valid_keys = array(
			'woff'  => '',
			'woff2' => '',
			'ttf'   => '',
			'svg'   => '',
			'eot'   => '',
			'otf'   => '',
		);
		$font       = array_intersect_key( $POST['fonts'], $valid_keys ); // Filter sent data
		$font['id'] = sanitize_text_field( $POST['font-name'] ); // Font name

		$instance = BF_Fonts_Manager::factory();

		// Update options
		$options = get_option( $instance->option_panel_id );
		if ( ! isset( $options['custom_fonts'] ) ) {
			$options['custom_fonts'] = array();
		}
		array_push( $options['custom_fonts'], $font );
		$success = update_option( $instance->option_panel_id, $options );


		// clear cache
		BF_Options::$values[ $instance->option_panel_id ] = null;

		$new_font_id = $font['id'];

		return compact( 'success', 'new_font_id' );
	}


	/**
	 * Build the required object instance
	 *
	 * @param   string $object
	 * @param   bool   $fresh
	 * @param   bool   $just_include
	 *
	 * @return  null|BF_Fonts_Manager|BF_FM_Custom_Fonts_Helper|BF_FM_Font_Stacks_Helper|BF_FM_Google_Fonts_Helper
	 */
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main BF_Fonts_Manager Class
			 */
			case 'self':
				$class = 'BF_Fonts_Manager';
				break;

			/**
			 * Theme Fonts: BF_FM_Theme_Fonts_Helper Class
			 */
			case 'theme-fonts':

				bf_require_once( 'core/fonts-manager/class-bf-fm-theme-fonts-helper.php' );

				$class = 'BF_FM_Theme_Fonts_Helper';

				break;

			/**
			 * Google Fonts: BF_FM_Google_Fonts_Helper Class
			 */
			case 'google-fonts':

				bf_require_once( 'core/fonts-manager/class-bf-fm-google-fonts-helper.php' );

				$class = 'BF_FM_Google_Fonts_Helper';

				break;

			/**
			 * Google Early Access Fonts: BF_FM_Google_EA_Fonts_Helper Class
			 */
			case 'google-ea-fonts':

				bf_require_once( 'core/fonts-manager/class-bf-fm-google-ea-fonts-helper.php' );

				$class = 'BF_FM_Google_EA_Fonts_Helper';

				break;

			/**
			 * Custom Fonts: BF_FM_Custom_Fonts_Helper Class
			 */
			case 'custom-fonts':

				bf_require_once( 'core/fonts-manager/class-bf-fm-custom-fonts-helper.php' );

				$class = 'BF_FM_Custom_Fonts_Helper';

				break;

			/**
			 * Font Stacks: BF_FM_Font_Stacks_Helper Class
			 */
			case 'font-stacks':

				bf_require_once( 'core/fonts-manager/class-bf-fm-font-stacks-helper.php' );

				$class = 'BF_FM_Font_Stacks_Helper';

				break;

			/**
			 * TypeKit Fonts: BF_FM_Typekit_Fonts_Helper Class
			 */
			case 'typekit-fonts':

				bf_require_once( 'core/fonts-manager/class-bf-fm-typekit-fonts-helper.php' );

				$class = 'BF_FM_Typekit_Fonts_Helper';

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
	 * @return BF_FM_Google_Fonts_Helper
	 */
	public static function google_fonts() {

		return self::factory( 'google-fonts' );
	}


	/**
	 * @return BF_FM_Google_EA_Fonts_Helper
	 */
	public static function google_ea_fonts() {

		return self::factory( 'google-ea-fonts' );
	}


	/**
	 * @return BF_FM_Custom_Fonts_Helper
	 */
	public static function custom_fonts() {

		return self::factory( 'custom-fonts' );
	}


	/**
	 * @return BF_FM_Font_Stacks_Helper
	 */
	public static function font_stacks() {

		return self::factory( 'font-stacks' );
	}


	/**
	 * @return BF_FM_Typekit_Fonts_Helper
	 */
	public static function typekit_fonts() {

		return self::factory( 'typekit-fonts' );
	}


	/**
	 * @return BF_FM_Theme_Fonts_Helper
	 */
	public static function theme_fonts() {

		return self::factory( 'theme-fonts' );
	}


	/**
	 * Used for getting protocol for links of google fonts
	 *
	 * @param string $protocol custom protocol for using outside
	 *
	 * @return string
	 */
	public function get_protocol( $protocol = '' ) {

		if ( empty( $protocol ) ) {
			$protocol = $this->get_option( 'google_fonts_protocol' );
		}

		switch ( $protocol ) {

			case 'http':
				$protocol = 'http://';
				break;

			case 'https':
				$protocol = 'https://';
				break;

			case 'relative':
				$protocol = '//';
				break;

			default:
				$protocol = 'https://';

		}

		return $protocol;

	}


	/**
	 * Used for retrieving options simply and safely for next versions
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	public function get_option( $option_key ) {

		return bf_get_option( $option_key, $this->option_panel_id );
	}


	/**
	 * Callback: Output Custom CSS for Custom Fonts
	 *
	 * Filter: template_redirect
	 */
	public function admin_custom_css() {

		// just when custom css requested
		if ( empty( $_GET['better_fonts_manager_custom_css'] ) OR intval( $_GET['better_fonts_manager_custom_css'] ) != 1 ) {
			return;
		}

		// Custom font requested
		if ( ! empty( $_GET['custom_font_id'] ) ) {

			$font_id      = $_GET['custom_font_id'];
			$custom_fonts = self::custom_fonts()->get_all_fonts();

		}// Google EA Font
		elseif ( ! empty( $_GET['google_ea_font_id'] ) ) {

			$font_id      = $_GET['google_ea_font_id'];
			$custom_fonts = self::google_ea_fonts()->get_font( $font_id );

			// Send output with import
			status_header( 200 );
			header( "Content-type: text/css; charset: utf-8" );
			die( '@import url(' . $custom_fonts['url'] . ');' );

		} // Theme font requested
		elseif ( ! empty( $_GET['theme_font_id'] ) ) {
			$font_id      = $_GET['theme_font_id'];
			$custom_fonts = self::theme_fonts()->get_all_fonts();
		} else {
			die;
		}

		// If custom font is not valid
		if ( ! isset( $custom_fonts[ $font_id ] ) ) {
			return;
		}

		status_header( 200 );
		header( "Content-type: text/css; charset: utf-8" );

		$font = $custom_fonts[ $font_id ];
		$src  = array(
			'main'  => array(),
			'extra' => array(),
		);

		$output = " @font-face { font-family: '" . $font_id . "';";

		// .EOT
		if ( ! empty( $font['eot'] ) ) {
			$src['extra'][] = "url('" . $font['eot'] . "')";
			$src['extra'][] = "url('" . $font['eot'] . "?#iefix') format('embedded-opentype')";
		}

		// .WOFF2
		if ( ! empty( $font['woff2'] ) ) {
			$src['main'][] = "url('" . $font['woff2'] . "') format('woff2')";
		}

		// .WOFF
		if ( ! empty( $font['woff'] ) ) {
			$src['main'][] = "url('" . $font['woff'] . "') format('woff')";
		}

		// .TTF
		if ( ! empty( $font['ttf'] ) ) {
			$src['main'][] = "url('" . $font['ttf'] . "') format('truetype')";
		}

		// .SVG
		if ( ! empty( $font['svg'] ) ) {
			$src['main'][] = "url('" . $font['svg'] . "#" . $font_id . "') format('svg')";
		}

		// .OTF
		if ( ! empty( $font['otf'] ) ) {
			$src['main'][] = "url('" . $font['otf'] . "#" . $font_id . "') format('opentype')";
		}

		//
		// Generate SRC attrs
		//
		{
			if ( ! empty( $src['extra'] ) ) {
				foreach ( $src['extra'] as $_src ) {
					$output .= "src: $_src;";
				}
			}

			if ( ! empty( $src['main'] ) ) {
				$output .= 'src: ' . implode( ",\n", $src['main'] ) . ';';
			}
		}

		$output .= "
    font-weight: normal;
    font-style: normal;
}";

		echo $output; // escaped before
		exit;
	}


	/**
	 * Used for getting font when we do not know what type is the font!
	 *
	 * Priority:
	 *  1. Theme Fonts
	 *  2. Custom Fonts
	 *  3. Font Stacks
	 *  4. Google fonts
	 *
	 * @param   string $font_name Font ID
	 *
	 * @return bool
	 */
	public static function get_font( $font_name ) {

		// Get from theme fonts
		$font = self::theme_fonts()->get_font( $font_name );

		if ( $font !== false ) {
			return $font;
		}

		// Get from custom fonts
		$font = self::custom_fonts()->get_font( $font_name );

		if ( $font !== false ) {
			return $font;
		}

		// Get from font stacks
		$font = self::font_stacks()->get_font( $font_name );

		if ( $font !== false ) {
			return $font;
		}

		// Get from TypeKit Fonts
		$font = self::typekit_fonts()->get_font( $font_name );

		if ( $font !== false ) {
			return $font;
		}

		// Get from font Google EA fonts
		$font = self::google_ea_fonts()->get_font( $font_name );

		if ( $font !== false ) {
			return $font;
		}

		// Get from google fonts
		$font = self::google_fonts()->get_font( $font_name );

		if ( $font !== false ) {
			return $font;
		}

		return false;
	}


	/**
	 * Get font variants HTML option tags
	 *
	 * @param   string|array $font            Font ID
	 * @param   string       $current_variant Active or Selected Variant ID
	 */
	public static function get_font_variants_option_elements( $font, $current_variant = '' ) {

		switch ( $font['type'] ) {

			// Theme fonts variants
			case 'theme-font':

				echo self::theme_fonts()->get_font_variants_option_elements( $current_variant ); // escaped before

				return;
				break;

			// Custom fonts variants
			case 'custom-font':

				echo self::custom_fonts()->get_font_variants_option_elements( $current_variant ); // escaped before

				return;
				break;

			// Font stacks variants
			case 'font-stack':

				echo self::font_stacks()->get_font_variants_option_elements( $current_variant ); // escaped before

				return;
				break;

			// TypeKit Font variants
			case 'typekit-font':

				echo self::typekit_fonts()->get_font_variants_option_elements( $current_variant ); // escaped before

				return;
				break;

			// Google fonts variants
			case 'google-font':

				echo self::google_fonts()->get_font_variants_option_elements( $font, $current_variant ); // escaped before

				return;
				break;

			// Google EA fonts variants
			case 'google-ea-font':

				echo self::google_ea_fonts()->get_font_variants_option_elements( $font, $current_variant ); // escaped before

				return;
				break;

		}

	}


	/**
	 * Get font subsets HTML option tags
	 *
	 * @param   string|array $font           Font ID
	 * @param   string       $current_subset Active or Selected Subset ID
	 */
	public static function get_font_subset_option_elements( $font, $current_subset = '' ) {

		switch ( $font['type'] ) {

			case 'theme-font':

				echo self::custom_fonts()->get_font_subset_option_elements(); // escaped before

				return;
				break;

			case 'custom-font':

				echo self::custom_fonts()->get_font_subset_option_elements(); // escaped before

				return;
				break;

			case 'font-stack':

				echo self::font_stacks()->get_font_subset_option_elements(); // escaped before

				return;
				break;

			case 'typekit-fonts':

				echo self::typekit_fonts()->get_font_subset_option_elements(); // escaped before

				return;
				break;

			case 'google-font':

				echo self::google_fonts()->get_font_subset_option_elements( $font, $current_subset ); // escaped before

				return;
				break;

			case 'google-ea-font':

				echo self::google_ea_fonts()->get_font_subset_option_elements( $font, $current_subset ); // escaped before

				return;
				break;

		}

	}


	/**
	 * List all available fonts by font category
	 *
	 * @return array
	 */
	public function get_all_fonts() {

		return array(
			'google_fonts'    => Better_Framework()->fonts_manager()->google_fonts()->get_all_fonts(),
			'google_ea_fonts' => Better_Framework()->fonts_manager()->google_ea_fonts()->get_all_fonts(),
			'theme_fonts'     => Better_Framework()->fonts_manager()->theme_fonts()->get_all_fonts(),
			'custom_fonts'    => Better_Framework()->fonts_manager()->custom_fonts()->get_all_fonts(),
			'font_stacks'     => Better_Framework()->fonts_manager()->font_stacks()->get_all_fonts(),
			'typekit_fonts'   => Better_Framework()->fonts_manager()->typekit_fonts()->get_all_fonts(),
		);
	}


	/**
	 * Callback: Used for enqueue font manager assets
	 *
	 * Filter: admin_enqueue_scripts
	 */
	function admin_enqueue_scripts() {

		if ( Better_Framework()->sections['admin_panel'] != true || Better_Framework()->get_current_page_type() != 'panel' ) {
			return;
		}

		bf_enqueue_script( 'better-fonts-manager' );

		bf_localize_script(
			'better-fonts-manager',
			'better_fonts_manager_loc',
			apply_filters(
				'better-framework/fonts-manager/localized-items',
				array(
					'type'  => 'panel',

					// Fonts lib
					'fonts' => $this->get_all_fonts(),

					'admin_fonts_css_url' => get_site_url() . '/?better_fonts_manager_custom_css=1&ver=' . time(),

					'texts'    => array(
						'variant_100'       => __( 'Ultra-Light 100', 'publisher' ),
						'variant_300'       => __( 'Book 300', 'publisher' ),
						'variant_400'       => __( 'Normal 400', 'publisher' ),
						'variant_500'       => __( 'Medium 500', 'publisher' ),
						'variant_700'       => __( 'Bold 700', 'publisher' ),
						'variant_900'       => __( 'Ultra-Bold 900', 'publisher' ),
						'variant_100italic' => __( 'Ultra-Light 100 Italic', 'publisher' ),
						'variant_300italic' => __( 'Book 300 Italic', 'publisher' ),
						'variant_400italic' => __( 'Normal 400 Italic', 'publisher' ),
						'variant_500italic' => __( 'Medium 500 Italic', 'publisher' ),
						'variant_700italic' => __( 'Bold 700 Italic', 'publisher' ),
						'variant_900italic' => __( 'Ultra-Bold 900 Italic', 'publisher' ),

						'subset_unknown' => __( 'Unknown', 'publisher' ),
					),
					'labels'   => array(
						'types' => array(
							'theme_fonts'     => __( 'Theme Fonts', 'publisher' ),
							'google_fonts'    => __( 'Google Fonts', 'publisher' ),
							'google_ea_fonts' => __( 'Google Early Access Font', 'publisher' ),
							'custom_fonts'    => __( 'Custom Fonts', 'publisher' ),
							'typekit_font'    => __( 'TypeKit Fonts', 'publisher' ),
							'font_stacks'     => __( 'Font Stack', 'publisher' ),
						),

						'style'  => __( '%s style(s)', 'publisher' ),
						'search' => __( 'Search Font...', 'publisher' ),

						'preview_text' => bf_get_option( 'typo_text_font_manager', 'better-framework-custom-fonts' ),
						'choose_font'  => __( 'Choose a font', 'publisher' ),
						'upload_font'  => __( 'Upload Custom Font', 'publisher' ),
						'add_font'     => __( 'Add Custom Font', 'publisher' ),

						'filter_cat_title' => __( 'Category', 'publisher' ),
						'filter_cats'      => array(
							'serif'       => __( 'Serif', 'publisher' ),
							'sans-serif'  => __( 'Sans Serif', 'publisher' ),
							'display'     => __( 'Display', 'publisher' ),
							'handwriting' => __( 'Handwriting', 'publisher' ),
							'monospace'   => __( 'Monospace', 'publisher' ),
						),


						'all_l10n'          => __( 'All Fonts', 'publisher' ),
						'filter_type_title' => __( 'Type', 'publisher' ),
						'filter_types'      => array(
							'google_font'    => __( 'Google Fonts', 'publisher' ),
							'custom_font'    => __( 'Custom Fonts', 'publisher' ),
							'font_stacks'    => __( 'Font Stacks', 'publisher' ),
							'google_ea_font' => __( 'Google Early Access Fonts', 'publisher' ),
							'theme_font'     => __( 'Theme Fonts', 'publisher' ),
							'typekit_font'   => __( 'TypeKit Fonts', 'publisher' ),
						),

						'font_name'    => __( 'Font Name', 'publisher' ),
						'font_woff'    => __( 'Font .woff', 'publisher' ),
						'upload_woff'  => __( 'Upload .woff', 'publisher' ),
						'font_woff2'   => __( 'Font .woff2', 'publisher' ),
						'upload_woff2' => __( 'Upload .woff2', 'publisher' ),
						'font_ttf'     => __( 'Font .ttf', 'publisher' ),
						'upload_ttf'   => __( 'Upload .ttf', 'publisher' ),
						'font_svg'     => __( 'Font .svg', 'publisher' ),
						'upload_svg'   => __( 'Upload .svg', 'publisher' ),
						'font_eot'     => __( 'Font .eot', 'publisher' ),
						'upload_eot'   => __( 'Upload .eot', 'publisher' ),
						'font_otf'     => __( 'Font .otf', 'publisher' ),
						'upload_otf'   => __( 'Upload .otf', 'publisher' ),
					),
					'add_font' => array(
						'callback'      => 'BF_Fonts_Manager::ajax_add_custom_font',
						'bf_call_token' => Better_Framework::callback_token( 'BF_Fonts_Manager::ajax_add_custom_font' ),
					)
				)
			)
		);

	}


	/**
	 * Callback: Used for adding fonts mimes to WordPress uploader
	 *
	 * Filter: upload_mimes
	 *
	 * @param $mimes
	 *
	 * @return mixed
	 */
	function filter_upload_mimes_types( $mimes ) {

		$mimes['ttf']   = 'application/x-font-ttf';
		$mimes['woff']  = 'application/x-font-woff';
		$mimes['woff2'] = 'application/x-font-woff2';
		$mimes['svg']   = 'image/svg+xml';
		$mimes['eot']   = 'application/vnd.ms-fontobject';
		$mimes['otf']   = 'application/x-font-otf';

		return $mimes;
	}


	/**
	 * Callback: Setup panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param array $panels
	 *
	 * @return array
	 */
	function panel_add( $panels ) {

		$panels[ $this->option_panel_id ] = array(
			'id'    => $this->option_panel_id,
			'style' => false,

		);

		return $panels;
	}


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return mixed
	 */
	public function panel_config( $panels ) {

		include BF_PATH . 'core/fonts-manager/panel-config.php';

		return $panels;
	}


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	public function panel_fields( $fields ) {

		include BF_PATH . 'core/fonts-manager/panel-fields.php';

		return $fields;
	}


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	public function panel_std( $fields ) {

		include BF_PATH . 'core/fonts-manager/panel-std.php';

		return $fields;
	}


	/**
	 * Filter callback: Used for resetting current language on resetting panel
	 *
	 * @param   $options
	 * @param   $result
	 *
	 * @return array
	 */
	function callback_panel_reset_result( $result, $options ) {

		// check panel
		if ( $options['id'] != $this->option_panel_id ) {
			return $result;
		}

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'Font manager reset to default.', 'publisher' );
		} else {
			$result['msg'] = __( 'An error occurred while resetting font manager.', 'publisher' );
		}

		return $result;
	}


	/**
	 * Filter callback: Used for changing current language on importing translation panel data
	 *
	 * @param $result
	 * @param $data
	 * @param $args
	 *
	 * @return array
	 */
	function callback_panel_import_result( $result, $data, $args ) {

		// check panel
		if ( $args['panel-id'] != $this->option_panel_id ) {
			return $result;
		}

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'Font manager options imported successfully.', 'publisher' );
		} else {
			if ( $result['msg'] == __( 'Imported data is not for this panel.', 'publisher' ) ) {
				$result['msg'] = __( 'Imported translation is not for fonts manager.', 'publisher' );
			} else {
				$result['msg'] = __( 'An error occurred while importing font manager options.', 'publisher' );
			}
		}

		return $result;
	}


	/**
	 * Filter callback: Used for changing save translation panel result
	 *
	 * @param $output
	 * @param $args
	 *
	 * @return string
	 */
	function callback_panel_save_result( $output, $args ) {

		// change only for translation panel
		if ( $args['id'] == $this->option_panel_id ) {
			if ( $output['status'] == 'succeed' ) {
				$output['msg'] = __( 'Fonts saved.', 'publisher' );
			} else {
				$output['msg'] = __( 'An error occurred while saving fonts.', 'publisher' );
			}
		}

		return $output;
	}


	/**
	 * Prints TypeKit head js code
	 *
	 * @hooked wp_head
	 *
	 * @since  2.10.0
	 */
	public static function print_typekit_head_code() {

		if ( $code = bf_get_option( 'typekit_code', Better_Framework::fonts_manager()->option_panel_id ) ) {
			echo $code;
		}

	}

}
