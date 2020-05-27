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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


// Initializes all panels
BF_Options::init();

/**
 * Panels Options Handler
 */
class BF_Options {


	/**
	 * Contains all values
	 *
	 * @var array
	 */
	public static $values = array();


	/**
	 * Contains ID's of active panels
	 *
	 * @var null
	 */
	public static $panels = NULL;


	/**
	 * Configuration of all panels
	 *
	 * @var null
	 */
	public static $panels_config = NULL;


	/**
	 * std value for all panels
	 *
	 * @var array
	 */
	public static $panel_std = array();


	/**
	 * style of all panels
	 *
	 * @var array
	 */
	public static $panel_style = array();


	/**
	 * css of all panels
	 *
	 * @var array
	 */
	public static $panel_css = array();


	/**
	 * fields of all panels
	 *
	 * @var null
	 */
	public static $fields = NULL;


	/**
	 * Store key of paneles that their value updated and should be saved in DB.
	 *
	 * @var null
	 */
	public static $updated_panels = array();


	/**
	 * Initialize panels
	 */
	public static function init() {

		self::get_panels();

		$lang = bf_get_current_language_option_code();

		foreach ( self::$panels as $panel_id => $panel ) {

			if ( ! isset( $panel['id'] ) ) {
				continue;
			}

			// Gets data from DB
			$saved_value = get_option( $panel_id . $lang );
			if ( $saved_value == FALSE ) {
				$saved_value = get_option( $panel_id );
			}


			// Adds default style option if needed
			if ( isset( $panel['style'] ) && $panel['style'] ) {


				$current_style = self::get_panel_style( $panel_id );

				// when have style form last
				if ( $current_style == FALSE ) {
					update_option( $panel_id . $lang . '_current_style', bf_get_panel_default_style() );
					self::$panel_style[ $panel_id ] = bf_get_panel_default_style();
				}
			}


			// Save options value to database if is not saved before
			if ( $saved_value == FALSE ) {

				// save to db
				self::save_panel_default_values( $panel_id );

			} else {
				self::$values[ $panel_id ] = $saved_value;
			}

		} // for


		add_action( 'wp_footer', array( 'BF_Options', 'wp_footer' ) );

	} // init


	/**
	 * Loads all panels and return
	 *
	 * @return mixed|null|void
	 */
	public static function get_panels() {

		if ( ! is_null( self::$panels ) ) {
			return self::$panels;
		}

		return self::$panels = apply_filters( 'better-framework/panel/add', array() );
	}


	/**
	 * Loads and return panel config
	 *
	 * @param string $panel_id
	 *
	 * @return array|mixed|void
	 */
	public static function load_panel_config( $panel_id = '' ) {

		self::get_panels();

		if ( ! isset( self::$panels[ $panel_id ] ) ) {
			return array();
		}

		if ( isset( self::$panels_config[ $panel_id ] ) ) {
			return self::$panels_config[ $panel_id ];
		}

		return self::$panels_config[ $panel_id ] = apply_filters( 'better-framework/panel/' . $panel_id . '/config', array() );
	}


	/**
	 * Loads and return panel fields
	 *
	 * @param string $panel_id
	 *
	 * @return array|mixed|void
	 */
	public static function load_panel_fields( $panel_id = '' ) {

		if ( empty( $panel_id ) ) {
			return array();
		}

		if ( isset( self::$fields[ $panel_id ] ) ) {
			return self::$fields[ $panel_id ];
		}

		return self::$fields[ $panel_id ] = apply_filters( 'better-framework/panel/' . $panel_id . '/fields', array() );
	}


	/**
	 * Loads and return panel css
	 *
	 * @param string $panel_id
	 *
	 * @return array|mixed|void
	 */
	public static function load_panel_css( $panel_id = '' ) {

		if ( empty( $panel_id ) ) {
			return array();
		}

		if ( isset( self::$panel_css[ $panel_id ] ) ) {
			return self::$panel_css[ $panel_id ];
		}

		return self::$panel_css[ $panel_id ] = apply_filters( 'better-framework/panel/' . $panel_id . '/css', array(), $panel_id );
	}


	/**
	 * Saves panel all options to database
	 *
	 * @param      $id
	 * @param null $lang
	 *
	 * @return bool
	 */
	public static function save_panel_default_values( $id, $lang = NULL ) {

		if ( is_null( $lang ) || empty( $lang ) ) {
			$lang = bf_get_current_lang();
		}
		if ( $lang == 'none' || $lang == 'all' ) {
			$lang = '';
		}

		$std_fields = self::get_panel_std( $id );

		$current_style = self::get_panel_style( $id );

		$std_id = 'std-' . $current_style;

		$values = array();

		foreach ( $std_fields as $field_id => $field ) {

			if ( isset( $field[ $std_id ] ) ) {
				$value = $field[ $std_id ];
			} else if ( isset( $field['std'] ) ) {
				$value = $field['std'];
			} else if ( isset( $field['default'] ) ) {
				$value = $field['default'];
			} else {
				$value = '';
			}

			if ( $field_id == 'style' && $value != $current_style ) {
				if ( $lang != '' ) {
					update_option( $id . '_' . $lang . '_current_style', $value );
				} else {
					update_option( $id . '_current_style', $value );
				}
				$values[ $field_id ] = $value;
			} else {
				$values[ $field_id ] = $value;
			}

		}

		delete_transient( $id . 'panel_css' );

		return self::add_option( $id, $values, $lang );
	}


	/**
	 * Deprecated! Use bf_get_option function.
	 *
	 * Get an option from the database (cached) or the default value provided
	 * by the options setup.
	 *
	 * @param   string $key       Option ID
	 * @param   string $panel_key Panel ID
	 * @param   string $lang      Language
	 *
	 * @return  mixed|null
	 */
	public static function get( $key, $panel_key = '', $lang = NULL ) {
		return bf_get_option( $key, $panel_key, $lang );
	}


	/**
	 * Return default std id for fields
	 *
	 * @param $panel_id
	 *
	 * @return string
	 */
	public static function get_panel_std_id( $panel_id = FALSE, $lang = NULL ) {

		// default std
		if ( $panel_id == FALSE ) {
			return 'std';
		}

		static $panel_std_ids;

		// from cache
		if ( isset( $panel_std_ids[ $panel_id ] ) ) {
			return $panel_std_ids[ $panel_id ];
		}

		$current_style = self::get_panel_style( $panel_id, $lang );

		if ( $current_style && $current_style == 'default' ) {
			return $panel_std_ids[ $panel_id ] = 'std';
		} else {
			return $panel_std_ids[ $panel_id ] = 'std-' . $current_style;
		}

	}


	/**
	 * Return default value field id
	 *
	 * @param $panel_id
	 *
	 * @return array
	 */
	public static function get_panel_std( $panel_id = FALSE ) {

		// default std
		if ( $panel_id == FALSE ) {
			return '';
		}

		// from cache
		if ( isset( self::$panel_std[ $panel_id ] ) ) {
			return self::$panel_std[ $panel_id ];
		}

		return self::$panel_std[ $panel_id ] = apply_filters( 'better-framework/panel/' . $panel_id . '/std', array(), $panel_id );
	}


	/**
	 * Returns panel current style
	 *
	 * @param bool $panel_id
	 * @param null $lang
	 *
	 * @return mixed|string|void
	 */
	public static function get_panel_style( $panel_id = FALSE, $lang = NULL ) {

		// default std
		if ( $panel_id == FALSE ) {
			return 'std';
		}

		// from cache
		if ( isset( self::$panel_style[ $panel_id ] ) ) {
			return self::$panel_style[ $panel_id ];
		}

		return self::$panel_style[ $panel_id ] = get_option( $panel_id . bf_get_current_language_option_code( $lang ) . '_current_style' );
	}


	/**
	 * Used for safe add option
	 *
	 * @param   Int    $ID    Option ID
	 * @param   Array  $value Option Value
	 * @param   string $lang  Option Language
	 *
	 * @return  bool
	 */
	public static function add_option( $ID = NULL, $value = NULL, $lang = NULL ) {

		// if the parameters are not defined stop the process.
		if ( $ID === NULL || $value === NULL ) {
			return FALSE;
		}

		if ( is_null( $lang ) ) {
			$lang = bf_get_current_lang();
		}

		if ( $lang != 'none' && ! empty( $lang ) && $lang != 'all' ) {
			$ID .= '_' . $lang;
		}

		$old_value = get_option( $ID );

		if ( $old_value === FALSE ) {
			return add_option( $ID, $value );
		} else {
			if ( $old_value === $value ) {
				return TRUE;
			} else {

				return update_option( $ID, $value );
			}
		}
	}


	/**
	 * Callback: store updated panel values
	 * Action: wp_footer
	 */
	public static function wp_footer() {

		if ( empty( self::$updated_panels ) ) {
			return;
		}

		foreach ( self::$updated_panels as $panel_id ) {

			if ( ! isset( self::$values[ $panel_id ] ) ) {
				continue;
			}

			update_option( $panel_id, self::$values[ $panel_id ] );

		}

	}
}
