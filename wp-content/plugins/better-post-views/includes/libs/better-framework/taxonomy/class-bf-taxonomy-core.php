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


/**
 * Manage all functionality for generating fields and retrieving fields data from them
 */
class BF_Taxonomy_Core {

	/**
	 * Contain all options that retrieved from better-framework/taxonomy/options and used for generating forms
	 *
	 * @var array
	 */
	public $taxonomy_options = array();


	/**
	 * Used for protect redundancy loading
	 *
	 * @var bool
	 */
	public $options_loaded = FALSE;


	/**
	 * Used for caching terms data for next calls
	 * it was used for old meta and currently will not used
	 *
	 * @var array
	 */
	public static $cache = array();


	/**
	 * Contains all metabox's
	 *
	 * @var array
	 */
	public static $metabox = array();


	/**
	 * Contains config for all metabox's
	 *
	 * @var array
	 */
	public static $config = array();


	/**
	 * Contains all fields
	 *
	 * @var array
	 */
	public static $fields = array();


	/**
	 * Contains all std
	 *
	 * @var array
	 */
	public static $std = array();


	/**
	 * Contains all css
	 *
	 * @var array
	 */
	public static $css = array();


	/**
	 * Initializes all metabox
	 */
	public static function init_metabox() {

		static $loaded;

		if ( $loaded ) {
			return;
		}

		self::$metabox = apply_filters( 'better-framework/taxonomy/metabox/add', array() );

	}


	/**
	 * loads and returns metabox config
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_config( $metabox_id = '' ) {

		if ( empty( $metabox_id ) ) {
			return array();
		}

		if ( isset( self::$config[ $metabox_id ] ) ) {
			return self::$config[ $metabox_id ];
		}
		self::$config[ $metabox_id ] = apply_filters( 'better-framework/taxonomy/metabox/' . $metabox_id . '/config', array() );

		return self::$config[ $metabox_id ];
	}


	/**
	 * loads and returns metabox std values
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_std( $metabox_id = '' ) {

		if ( empty( $metabox_id ) || ! isset( self::$metabox[ $metabox_id ] ) ) {
			return array();
		}

		if ( isset( self::$std[ $metabox_id ] ) ) {
			return self::$std[ $metabox_id ];
		}

		return self::$std[ $metabox_id ] = apply_filters( 'better-framework/taxonomy/metabox/' . $metabox_id . '/std', array() );
	}


	/**
	 * loads and returns metabox std values
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_fields( $metabox_id = '' ) {

		if ( empty( $metabox_id ) || ! isset( self::$metabox[ $metabox_id ] ) ) {
			return array();
		}

		if ( isset( self::$fields[ $metabox_id ] ) ) {
			return self::$fields[ $metabox_id ];
		}

		return self::$fields[ $metabox_id ] = apply_filters( 'better-framework/taxonomy/metabox/' . $metabox_id . '/fields', array() );
	}


	/**
	 * loads and returns metabox css
	 *
	 * @param string $metabox_id
	 *
	 * @return array
	 */
	public static function get_metabox_css( $metabox_id = '' ) {

		if ( empty( $metabox_id ) || ! isset( self::$metabox[ $metabox_id ] ) ) {
			return array();
		}

		if ( isset( self::$css[ $metabox_id ] ) ) {
			return self::$css[ $metabox_id ];
		}

		return self::$css[ $metabox_id ] = apply_filters( 'better-framework/taxonomy/metabox/' . $metabox_id . '/css', array() );
	}


	/**
	 *
	 */
	function __construct() {

		self::init_metabox();

		add_action( 'admin_init', array( $this, 'register_taxonomies' ) );
	}


	/**
	 * Register taxonomy fields
	 */
	function register_taxonomies() {

		if ( ! is_admin() ) {
			return;
		}

		if ( ! class_exists( 'BF_Taxonomy_Meta_Field' ) ) {
			bf_require_once( 'taxonomy/class-bf-taxonomy-meta-field.php' );
		}

		foreach ( self::$metabox as $metabox_id => $metabox ) {
			new BF_Taxonomy_Meta_Field( $metabox_id );
		}
	}


	/**
	 * Deprecated: Use bf_get_term_meta
	 *
	 * Used For retrieving meta of term
	 *
	 * @param   int|object  $term    Term ID or object
	 * @param   string      $meta_id Custom Field ID
	 * @param   bool|string $default Default Value
	 *
	 * @return bool
	 */
	public function get_term_meta( $term, $meta_id, $default = NULL ) {
		return bf_get_term_meta( $meta_id, $term, $default );
	}
}
