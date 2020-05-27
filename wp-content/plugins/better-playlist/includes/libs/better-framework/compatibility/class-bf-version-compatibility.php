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

BF_Version_Compatibility::init();


/**
 * BetterFramework version compatibility manager.
 *
 * @package   BetterFramework
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   2.14.0
 * @access    public
 */
class BF_Version_Compatibility {

	/**
	 * Contains main compatibility log option ID
	 *
	 * @var string
	 */
	public static $option_id = 'bf-version-compatibility';

	/**
	 * Library Unique ID
	 *
	 * @var string
	 */
	public static $id = 'version-compatibility';


	/**
	 * Initialize !
	 *
	 * @since 2.14.0
	 */
	public static function init() {

		add_action( 'better-framework/after_setup', array( __CLASS__, 'init_compatibility' ), 1 );
	}


	/**
	 * Object of Theme
	 *
	 * @return WP_Theme
	 */
	protected static function WP_Theme_Object() {

		$theme = wp_get_theme();

		if ( '' != $theme->get( 'Template' ) ) {
			$theme = wp_get_theme( $theme->get( 'Template' ) );
		}

		return $theme;
	}


	/**
	 * Fire compatibility
	 */
	public static function init_compatibility() {

		$config = apply_filters( 'better-framework/' . self::$id . '/config', array( 'compatibility-actions' => array() ) );

		return self::do_compatibility( $config );
	}


	/**
	 * Logs theme versions and make theme compatible with latest version
	 *
	 * @param array $config
	 *
	 * @return bool
	 */
	public static function do_compatibility( $config ) {

		/**
		 * Config version compatibility array {
		 *
		 * @type array $products the product information array{
		 *
		 *   key: unique-id => value: array(
		 *      'active-version' => current version of the product
		 *    }
		 *    ...
		 *  }
		 *
		 * @type array ${'compatibility-actions'}  the product update actions array {
		 *
		 *   key: unique-id => value: array(
		 *      'version number' => custom callback
		 *    }
		 *    ...
		 * }
		 * }
		 *
		 */

		if ( empty( $config['products'] ) ) {
			return false;
		}

		$comp_info = self::get_compatibility_info();

		$must_update  = false;
		$must_refresh = false;
		$history      = &$comp_info['history'];
		$comp         = &$comp_info['comp'];

		if ( ! empty( $config['compatibility-actions'] ) ) {

			foreach ( $config['compatibility-actions'] as $product_id => $list_of_updates ) {
				$product_info  = &$config['products'][ $product_id ];
				$product_ver   = &$product_info['active-version']; // product active version
				$last_comp_ver = isset( $comp_info['last'][ $product_id ] ) ? $comp_info['last'][ $product_id ] : 0;
				// maybe need compatibility
				if ( $last_comp_ver ) {
					uksort( $list_of_updates, array( __CLASS__, 'version_compare' ) );

					foreach ( $list_of_updates as $version => $callback ) {
						/**
						 * Just apply update when:
						 * $last_comp_ver < update version <= active product version
						 */
						if (
							self::version_compare( $last_comp_ver, $version, '<' ) &&
							self::version_compare( $version, $product_ver, '<=' )
						) {

							if ( ! isset( $comp[ $product_id ] ) || ! in_array( $version, $comp[ $product_id ] ) ) {
								if ( is_callable( $callback ) ) {

									if ( call_user_func( $callback, $version, $product_id ) ) {
										$comp_info['last'][ $product_id ] = $version;

										$comp[ $product_id ][] = $version;
										$must_update           = true;
										$must_refresh          = true;
									} else {
										break;
									}
								}
							}
						}
					}
				} else {
					// First installation

					//setup compatibility pointer
					$comp_info['last'][ $product_id ] = $product_ver;
					$must_update                      = true;
				}
			}
		}

		if ( ! $must_update ) {
			$active_theme_version = self::WP_Theme_Object()->get( 'Version' );

			//Set version number in history if necessary
			if ( empty( $history[ $active_theme_version ] ) ) {
				$history[ $active_theme_version ] = time();
				$must_update                      = true;
			}
		}

		// Update log
		if ( $must_update ) {

			do_action( 'better-framework/' . self::$id . '/checked', $comp_info );

			self::set_compatibility_info( $comp_info );
			self::clear_css_cache();
		}

		if ( $must_refresh ) {
			header( 'Location: ' . ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		}

		return true;
	} // do_compatibility


	/**
	 * Clear css generator cache storage
	 *
	 */
	public static function clear_css_cache() {

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

	}


	/**
	 * Get least version of several versions
	 *
	 * @param array $history_array list of version numbers
	 *
	 * @return string|null|bool string version number on success or null|false on failure.
	 */
	protected static function get_initial_version( $history_array ) {

		if ( $history_array ) {
			$history_array = array_flip( $history_array );
			usort( $history_array, array( __CLASS__, 'version_compare' ) );

			return array_shift( $history_array );
		}

		return false;
	}


	/**
	 * Set compatibility status array
	 *
	 * @param array $comp_info {@see get_compatibility_info return value}
	 *
	 * @since 2.14.0
	 */
	public static function set_compatibility_info( $comp_info ) {

		$comp_info = wp_parse_args( $comp_info );
		update_option( self::$option_id, $comp_info, true );
	}


	/**
	 * Get information about compatibility situation
	 *
	 * @return array none empty array on success. array {
	 * @type string $active  active theme version number
	 * @type array  $history theme updates history array{
	 *     key:version number => value: updated time stamp
	 *      ...
	 *    }
	 *
	 * }
	 *
	 * @since 2.14.0
	 */
	public static function get_compatibility_info() {

		if ( $info = get_option( self::$option_id, array() ) ) {
			return $info;
		}

		// TODO: Remove This Backward compatibility
		if ( $info = get_option( 'publisher-theme-comp-info', array() ) ) {

			update_option( self::$option_id, $info );
			delete_option( 'publisher-theme-comp-info' );

			return $info;
		}

		self::apply_default_compatibility_info(); // First installation

		return get_option( self::$option_id, array() );
	}


	/**
	 * Creates base compatibility data
	 *
	 * @since 2.14.0
	 */
	protected static function apply_default_compatibility_info() {

		self::set_compatibility_info( array(
			'history' => array(),
			'comp'    => array(),
		) );
	}


	/**
	 * Compare two version
	 *
	 * @param string $current_version
	 * @param string $another_version
	 * @param string $operator [optional] comparison operator
	 *
	 * @since 2.14.0
	 * @return int
	 *
	 * -1 if $current_version is lower than $another_version,
	 *  0 if they are equal
	 *  1 if $another_version is lower.
	 */
	protected static function version_compare( $current_version, $another_version, $operator = '>' ) {

		return version_compare( $current_version, $another_version, $operator );
	}
}
