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
 * Handy Function for accessing to Publisher_Translation
 *
 * @return Publisher_Translation
 */
function publisher_translation() {
	return Publisher_Translation::self();
}

// Init Better Translation
publisher_translation();

/**
 * Publisher Translation
 *
 * Includes all functionality for adding advanced translation panel for theme
 *
 *
 * @package  BetterStudio Publisher Theme Translation
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.0.3
 * @access   public
 * @see      http://www.betterstudio.com
 */
class Publisher_Translation {


	/**
	 * Publisher Translation version
	 *
	 * @var string
	 */
	private $version = '1.0.3';


	/**
	 * Theme ID
	 *
	 * @var string
	 */
	private $theme_id;


	/**
	 * Theme name
	 *
	 * @var string
	 */
	private $publisher;


	/**
	 * Notice Icon
	 *
	 * @var string
	 */
	private $notice_icon;


	/**
	 * Translation panel ID
	 *
	 * @var string
	 */
	public $option_panel_id;


	/**
	 * Publisher Translation directory URL
	 *
	 * @var string
	 */
	private $dir_url;


	/**
	 * Publisher Translation directory path
	 *
	 * @var string
	 */
	private $dir_path;


	/**
	 * Publisher Translation Parent Menu
	 *
	 * @var string
	 */
	private $menu_parent = 'better-studio';


	/**
	 * Publisher Translation menu position
	 *
	 * @var string
	 */
	private $menu_position = '30';


	/**
	 * Pre translations array
	 *
	 * @var array
	 */
	private $languages = array();


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

		/**
		 * Filter Publisher Translation config
		 *
		 * @since 1.0.0
		 *
		 * @param string $config configurations
		 */
		$config = apply_filters( 'publisher-theme-core/translation/config', array() );

		// check config
		if ( ! isset( $config['theme-id'] ) || ! isset( $config['theme-name'] ) ) {
			return false;
		}

		$this->dir_url = trailingslashit( Publisher_Theme_Core()->get_dir_url( 'translation/' ) );

		$this->dir_path = trailingslashit( Publisher_Theme_Core()->get_dir_path( 'translation/' ) );

		// include functions
		include_once $this->dir_path . 'functions.php';

		$this->theme_id = $config['theme-id'];

		$this->publisher = $config['theme-name'];

		if ( ! empty( $config['notice-icon'] ) ) {
			$this->notice_icon = $config['notice-icon'];
		}

		if ( ! empty( $config['menu-parent'] ) ) {
			$this->menu_parent = $config['menu-parent'];
		}

		if ( ! empty( $config['menu-position'] ) ) {
			$this->menu_position = $config['menu-position'];
		}

		$this->option_panel_id = 'better-translation-' . $config['theme-id'];

		// change translation for languages if it's first time!
		if ( ! $this->get_current_lang() ) {
			add_filter( 'after_setup_theme', array( $this, 'setup_translation_panel_before' ), 12 );
		}

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

		// Callback for resetting data
		add_filter( 'better-framework/panel/reset/result', array( $this, 'callback_panel_reset_result' ), 10, 2 );

		// Callback for importing data
		add_filter( 'better-framework/panel/import/result', array( $this, 'callback_panel_import_result' ), 10, 3 );

		// Callback for adding current language to export file
		add_filter( 'better-framework/panel/export/data', array( $this, 'callback_panel_export_data' ) );

		// Callback for changing export file name
		add_filter( 'better-framework/panel/export/file-name', array(
			$this,
			'callback_panel_export_file_name'
		), 10, 2 );

		// Callback changing save result
		add_filter( 'better-framework/panel/save/result', array( $this, 'callback_panel_save_result' ), 10, 2 );

		// Admin style and scripts
		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		unset( $config );
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
	public function panel_add( $panels ) {

		$panels[ $this->option_panel_id ] = array(
			'id'    => $this->option_panel_id,
			'style' => false,
			'css'   => false,
		);

		return $panels;
	} // panel_add


	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panel
	 *
	 * @return mixed
	 */
	public function panel_config( $panel ) {
		include $this->dir_path . 'panel-config.php';

		return $panel;
	} // config_panel


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
		include $this->dir_path . 'panel-fields.php';

		return $fields;
	} // panel_fields


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
		include $this->dir_path . 'panel-std.php';

		return $fields;
	} // panel_std


	/**
	 * Used for accessing alive instance of Publisher_Translation
	 *
	 * @since 1.0
	 *
	 * @return Publisher_Translation
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
	 * @return  null|Publisher_Translation
	 */
	public static function factory( $object = 'self', $fresh = false, $just_include = false ) {

		if ( isset( self::$instances[ $object ] ) && ! $fresh ) {
			return self::$instances[ $object ];
		}

		switch ( $object ) {

			/**
			 * Main Publisher_Translation Class
			 */
			case 'self':
				$class = 'Publisher_Translation';
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
	 * Used for retrieving Publisher Translation version
	 *
	 * @return string
	 */
	function get_version() {

		return $this->version;

	}


	/**
	 * Used for retrieving Publisher Translation directory URL
	 *
	 * @return string
	 */
	function get_dir_url() {

		return $this->dir_url;

	}


	/**
	 * Used for retrieving Publisher Translation directory path
	 *
	 * @return string
	 */
	function get_dir_path() {

		return $this->dir_path;

	}


	/**
	 * Used for retrieving current language ( active )
	 *
	 * @return string
	 */
	function get_current_lang() {

		$multilingual = bf_get_current_language_option_code();

		if ( ( $current = get_option( $this->option_panel_id . $multilingual . '-current' ) ) == true ) {

			return $current;

		} else {

			return false;

		}

	}


	/**
	 * Used for saving current language ( active )
	 *
	 * @param      $lang
	 * @param null $multilingual
	 */
	function set_current_lang( $lang, $multilingual = NULL ) {

		if ( is_null( $multilingual ) ) {
			$multilingual = bf_get_current_lang();
		}

		if ( $multilingual == 'en' || $multilingual == 'none' || empty( $multilingual ) || $multilingual == 'all' ) {
			$multilingual = '';
		} else {
			$multilingual = '_' . $multilingual;
		}

		update_option( $this->option_panel_id . $multilingual . '-current', $lang );

	}


	/**
	 * Used for retrieving pre translations
	 *
	 * @return array
	 */
	function get_languages() {

		static $loaded;

		if ( $loaded ) {
			return $this->languages;
		}

		$loaded = true;

		return $this->languages = apply_filters( 'publisher-theme-core/translation/languages', array() );
	}


	/**
	 * Used for retrieving a translation from panel
	 *
	 * Use like __() function
	 *
	 * todo add default value for this function
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	function _get( $option_key ) {
		return bf_get_option( $option_key, $this->option_panel_id );
	}


	/**
	 * Used for retrieving a translation from panel
	 *
	 * Use like esc_attr__() function
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	function _get_esc_attr( $option_key ) {
		return esc_attr( bf_get_option( $option_key, $this->option_panel_id ) );
	}


	/**
	 * Used for retrieving a translation from panel
	 *
	 * Use like _e() function
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	function _echo( $option_key ) {
		bf_echo_option( $option_key, $this->option_panel_id );
	}


	/**
	 * Used for retrieving a translation from panel
	 *
	 * Use like esc_attr__() function
	 *
	 * @param $option_key
	 *
	 * @return mixed|null
	 */
	function _echo_esc_attr( $option_key ) {
		echo esc_attr( bf_get_option( $option_key, $this->option_panel_id ) );
	}


	/**
	 * Enqueue scripts and styles
	 */
	function enqueue_scripts() {
		include $this->dir_path . 'scripts.php';
	}


	/**
	 * Callback for changing translations
	 *
	 * @param   string      $lang_id      Selected Language ID
	 * @param   null|string $multilingual Current WP Language ( Multilingual )
	 *
	 * @return array
	 */
	public static function change_translation( $lang_id, $multilingual = NULL ) {

		if ( $multilingual === 'en_US' || $multilingual === 'none' || empty( $multilingual ) ) {
			$_multilingual = '';
		} else {
			$_multilingual = '_' . $multilingual;
		}

		// Don't download file for "en_US"
		if ( $lang_id === 'en_US' ) {

			// empty panel -> data will be come from STD
			$panel_data = array(
				'lang-id' => $lang_id
			);

			update_option( publisher_translation()->option_panel_id . $_multilingual, $panel_data, ! empty( $_multilingual ) ? 'no' : 'yes' );
			publisher_translation()->set_current_lang( $lang_id, $multilingual );

			$result = array(
				'status'  => 'succeed',
				'msg'     => sprintf( __( 'Theme translation changed to "%s"', 'publisher' ), __( 'English - US', 'publisher' ) ),
				'refresh' => true
			);

			// Add admin notice
			Better_Framework()->admin_notices()->add_notice( array(
				'msg'       => $result['msg'],
				'thumbnail' => publisher_translation()->notice_icon,
				'product'   => 'theme:publisher',
			) );

			return $result;
		}

		$languages = publisher_translation()->get_languages();

		/**
		 * Fires before changing translation
		 *
		 * @since 1.0.0
		 *
		 * @param string $lang_id      Selected translation id for change
		 * @param array  $translations All active translations list
		 */
		do_action( 'publisher-theme-core/translation/change-translation/before', $lang_id, $languages );

		$translation = self::get_language_translation( $lang_id );

		if ( $translation['status'] === 'error' ) {
			$translation['refresh'] = false;

			return $translation;
		}

		/**
		 * Filter translation data
		 *
		 * @since 1.0.0
		 */
		$data = apply_filters( 'publisher-theme-core/translation/change-translation/data', $translation['translation'] );


		// Validate translation file data
		if ( ! isset( $data['panel-id'] ) || empty( $data['panel-id'] ) || ! isset( $data['panel-data'] ) ) {

			return array(
				'status'  => 'error',
				'msg'     => __( 'Translation file for selected language is not valid!', 'publisher' ),
				'refresh' => false
			);

		}

		// Validate translation panel id
		if ( $data['panel-id'] !== publisher_translation()->option_panel_id ) {

			return array(
				'status'     => 'error',
				'error_code' => 'invalid-translation',
				'msg'        => sprintf( __( 'Translation file is not valid for "%s"', 'publisher' ), publisher_translation()->publisher ),
				'refresh'    => false
			);

		}

		// Save translation and update current lang
		update_option( publisher_translation()->option_panel_id . $_multilingual, $data['panel-data'], ! empty( $_multilingual ) ? 'no' : 'yes' );
		publisher_translation()->set_current_lang( $lang_id, $multilingual );

		$result = array(
			'status'  => 'succeed',
			'msg'     => sprintf( __( 'Theme translation changed to "%s"', 'publisher' ), $languages[ $lang_id ]['name'] ),
			'refresh' => true
		);

		// Add admin notice
		Better_Framework()->admin_notices()->add_notice( array(
			'msg'       => $result['msg'],
			'thumbnail' => publisher_translation()->notice_icon,
			'product'   => 'theme:publisher',
		) );

		return $result;
	}


	/**
	 * Callback for send translations
	 *
	 * @param string $lang_name
	 * @param string $lang_code
	 * @param string $translator
	 *
	 * @return array
	 * @throws BF_Exception
	 */
	public static function callback_send_translation( $lang_name = '', $lang_code = '', $translator = '' ) {
		/**
		 * Fires before send translation
		 *
		 * @since 1.0.0
		 *
		 * @param string $lang_name Language name
		 * @param array  $lang_code Country name
		 */
		do_action( 'publisher-theme-core/translation/send-translation/before', $lang_name, $lang_code );

		$_current_user = wp_get_current_user();
		$sent          = BetterFramework_Oculus::request( 'share', array(
			'group' => 'translation',
			'data'  => array(
				'theme'             => publisher_translation()->publisher,
				'lang_name'         => $lang_name,
				'lang_code'         => $lang_code,
				'user_email'        => $_current_user->user_email,
				'translation'       => json_encode( get_option( publisher_translation()->option_panel_id ) ),
				'user_display_name' => $_current_user->data->display_name,
			)
		) );

		if ( $sent ) {
			$result = array(
				'status' => 'succeed',
				'msg'    => __( 'Translation sent successfully.', 'publisher' ),
			);
		} else {
			$result = array(
				'status' => 'error',
				'msg'    => __( 'There is a problem in sending translation.', 'publisher' ),
			);
		}

		/**
		 * Filter result of import options
		 *
		 * @since 1.0.0
		 *
		 * @param array  $result     contains result of reset
		 * @param string $lang_name  Language name
		 * @param array  $lang_code  Country name
		 * @param array  $translator Translator name
		 * @param array  $desc       Desc
		 */
		return apply_filters( 'publisher-theme-core/translation/send-translation/result', $result, $lang_name, $lang_code );
	}


	/**
	 * Filter callback: For changing email from name
	 *
	 * @param $name
	 *
	 * @return string
	 */
	function wp_mail_from_name( $name ) {

		$name = Publisher_Translation::$instances['from-name'];

		if ( empty( $name ) ) {
			$name = 'Anonymous';
		}

		// remove cache
		unset( Publisher_Translation::$instances['from-name'] );

		return $name;
	}


	/**
	 * Filter callback: Used for resetting current language on resetting panel
	 *
	 * @param $options
	 * @param $result
	 *
	 * @return array
	 */
	function callback_panel_reset_result( $result, $options ) {

		// check panel
		if ( $options['id'] != $this->option_panel_id ) {
			return $result;
		}

		// reset current language
		$this->set_current_lang( 'en_US' );

		// change messages
		if ( $result['status'] == 'succeed' ) {
			$result['msg'] = __( 'Theme translation reset to default.', 'publisher' );
		} else {
			$result['msg'] = __( 'An error occurred while resetting theme translation.', 'publisher' );
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
			$result['msg'] = __( 'Theme translation successfully imported.', 'publisher' );
		} else {
			if ( $result['msg'] == __( 'Imported data is not for this panel.', 'publisher' ) ) {
				$result['msg'] = __( 'Imported translation is not for this theme.', 'publisher' );
			} else {
				$result['msg'] = __( 'An error occurred while importing theme translation.', 'publisher' );
			}
		}


		// current lang
		if ( isset( $data['panel-data']['lang-id'] ) ) {
			$this->set_current_lang( $data['panel-data']['lang-id'] );
		} else {
			$this->set_current_lang( 'en_US' );
		}

		return $result;
	}


	/**
	 * Filter callback: Used for adding current language to export data
	 *
	 * @param $options_array
	 *
	 * @return array
	 */
	function callback_panel_export_data( $options_array ) {

		if ( $options_array['panel-id'] == $this->option_panel_id ) {
			$options_array['panel-data']['lang-id'] = $this->get_current_lang();
		}

		return $options_array;
	}


	/**
	 * Filter callback: Used for changing export file name
	 *
	 * @param $file_name
	 * @param $options_array
	 *
	 * @return string
	 */
	function callback_panel_export_file_name( $file_name, $options_array ) {

		// change only for translation panel
		if ( $options_array['panel-id'] == $this->option_panel_id ) {

			$file_name = $this->theme_id . '-' . $this->get_current_lang();

		}

		return $file_name;
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
				$output['msg'] = __( 'Translations saved.', 'publisher' );
			} else {
				$output['msg'] = __( 'An error occurred while saving translations.', 'publisher' );
			}
		}

		return $output;
	}


	/**
	 * Callback: Used to add smart support of multilingual translation panel
	 */
	function setup_translation_panel_before() {

		// Get current multilingual language
		$multilingual = bf_get_current_lang();

		// All languages page
		if ( $multilingual == 'all' ) {

			// Add current language to all languages
			foreach ( bf_get_all_languages() as $lang ) {

				if ( $lang['id'] == 'en' || $lang == 'all' ) {
					$_lang = '';
				} else {
					$_lang = '_' . $lang['id'];
				}

				if ( false == get_option( $this->option_panel_id . $_lang . '-current' ) ) {
					$this->set_current_lang( 'en_US', $lang['id'] );
				}

			}

			return;
		} elseif ( $multilingual == 'en' || $multilingual == 'none' || $multilingual == false ) {

			if ( false == get_option( $this->option_panel_id . '-current' ) ) {
				$this->set_current_lang( 'en_US' );
			}

			return;
		}

		$_multilingual = '_' . $multilingual;

		$opt_current = get_option( $this->option_panel_id . $_multilingual . '-current' );

		// if data is saved before
		if ( $opt_current !== false ) {
			return;
		}

		// Get language all information and locale
		$language = bf_get_language_data( $multilingual );

		$languages = $this->get_languages();

		// Use pre-translation if available
		if ( isset( $languages[ $language['locale'] ] ) ) {

			$translation_options_data = self::get_language_translation( $language['locale'] );

			if ( $translation_options_data['status'] === 'error' ) {
				return;
			}

			/**
			 * Filter translation data
			 *
			 * @since 1.0.0
			 */
			$data = apply_filters( 'publisher-theme-core/translation/change-translation/data', $translation_options_data['translation'] );


			// Validate translation file data
			if ( ! isset( $data['panel-id'] ) || empty( $data['panel-id'] ) || ! isset( $data['panel-data'] ) ) {
				return;
			}


			// Validate translation panel id
			if ( $data['panel-id'] != publisher_translation()->option_panel_id ) {
				return;
			}


			// Save translation and update current lang
			update_option( publisher_translation()->option_panel_id . $_multilingual, $data['panel-data'], ! empty( $_multilingual ) ? 'no' : 'yes' );
			publisher_translation()->set_current_lang( $language['locale'], $multilingual );

		} else {
			$this->set_current_lang( 'en_US', $multilingual );
		}

	}


	/**
	 * Handy function to get final translation data from locale (DRY)
	 *
	 * @param $lang_id
	 *
	 * @return array
	 */
	public static function get_language_translation( $lang_id ) {

		static $translation;

		// from cache (used for multilingual)
		if ( ! is_null( $translation ) && isset( $translation[ $lang_id ] ) ) {
			return $translation[ $lang_id ];
		}

		$languages = publisher_translation()->get_languages();

		if ( ! isset( $languages[ $lang_id ] ) ) {
			return $translation[ $lang_id ] = array(
				'status' => 'error',
				'msg'    => __( 'Translation for selected language not found!', 'publisher' ),
			);
		}

		// translation data from core
		if ( $languages[ $lang_id ]['type'] === 'core' && class_exists( 'BetterFramework_Oculus' ) ) {

			$core_translation = BetterFramework_Oculus::request( 'get-translation', array(
				'group'      => 'translation',
				'json_assoc' => true,
				'data'       => array(
					'code' => $lang_id
				)
			) );

			if ( is_wp_error( $core_translation ) ) {
				return $translation[ $lang_id ] = array(
					'status'        => 'Error',
					'error_code'    => $core_translation->get_error_code(),
					'error_message' => $core_translation->get_error_message(),
				);
			}

			if ( ! empty( $core_translation['success'] ) && ! empty( $core_translation['translation']['translation'] ) ) {
				return $translation[ $lang_id ] = array(
					'status'      => 'success',
					'translation' => json_decode( $core_translation['translation']['translation'], true ),
				);
			}

		}

		// url is not found for online
		if ( ! isset( $languages[ $lang_id ]['url'] ) ) {
			return $translation[ $lang_id ] = array(
				'status' => 'error',
				'msg'    => __( 'Translation for selected language not found!', 'publisher' ),
			);
		}


		/**
		 * Filter translation file url
		 *
		 * @since 1.0.0
		 */
		$translation_url = apply_filters( 'publisher-theme-core/translation/change-translation/file-url', $languages[ $lang_id ]['url'] );

		// Read translation json file
		$translation_options_data = wp_remote_get( $translation_url );
		if ( is_wp_error( $translation_options_data ) ) {
			return $translation[ $lang_id ] = array(
				'status'        => 'Error',
				'error_code'    => $translation_options_data->get_error_code(),
				'error_message' => $translation_options_data->get_error_message(),
			);
		}

		// request is not 200
		$http_code = wp_remote_retrieve_response_code( $translation_options_data );
		if ( $http_code !== 200 ) {
			return $translation[ $lang_id ] = array(
				'status'        => 'error',
				'error_code'    => 'http-code-error',
				'error_message' => sprintf( __( 'Http request code was %s', 'publisher' ), $http_code ),
			);
		}

		// file body is not valid
		$translation_options_data = wp_remote_retrieve_body( $translation_options_data );
		if ( ! $translation_options_data ) {
			return $translation[ $lang_id ] = array(
				'status' => 'error',
				'msg'    => __( 'Translation file for selected language not found!', 'publisher' ),
			);
		}

		return $translation[ $lang_id ] = array(
			'status'      => 'success',
			'translation' => json_decode( $translation_options_data, true ),
		);

	}

}
