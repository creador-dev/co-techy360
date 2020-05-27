<?php

/**
 * Cache WordPress nav menus for better performance
 *
 * @since      3.0.0
 * @package    BetterFramework/booster
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2017, BetterStudio
 *
 * @extends    BF_Item_Cache
 */


class BF_Menu_cache extends BF_Booster_Cache {

	/**
	 * Group name for cached data
	 *
	 * @var string
	 */
	public static $cache_group = 'menu';

	/**
	 * Flag to determine can cache the active mega menu
	 *
	 * @var bool|string unique id for cache if it's enable
	 */
	protected static $cache_menu = FALSE;

	/**
	 * List of the mega-menus that is available for cache
	 *
	 * 'mega menu type' => 'cache duration @see $cache_intervals'
	 *
	 * @var array
	 */
	protected static $mega_menus2cache = array();


	/**
	 *  Register event to initialize menu cache
	 */
	public static function Run() {

		add_action( 'init', 'BF_Menu_cache::init' );
	}


	/**
	 * Initialize Menu Cache
	 */
	public static function init() {

		if ( is_user_logged_in() ) {
			return;
		}

		// BF Development mode
		if ( bf_is( 'dev' ) ) {
			return;
		}

		// Cache plugin or not active
		if ( ! BF_Booster::get_option( 'cache-mega-menu' ) || self::have_cache_plugin() ) {
			return;
		}

		self::$mega_menus2cache = apply_filters( 'better-framework/booster/mega-menu/config', array() );

		add_filter( 'better-framework/menu/mega/end_lvl', 'BF_Menu_cache::print_cached_version', 5 );
		add_filter( 'better-framework/menu/mega/end_lvl', 'BF_Menu_cache::cache_mega_menu', 15 );
	}


	/**
	 * Append cached version of the bf mega-menu if available
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	public static function print_cached_version( $args ) {

		$cache_key = self::get_cache_key( $args );

		if ( ! isset( $args['current-item']->mega_menu ) ) {
			return $args;
		}

		$can_cache = apply_filters( 'better-framework/booster/mega-menu/cache', self::can_cache( $args['current-item']->mega_menu ), $args );

		if ( ! $can_cache ) {
			return $args;
		}

		if ( $cached = parent::get_cache( $cache_key, self::$cache_group ) ) {
			$args['output'] = $cached;

			self::$cache_menu = FALSE; # turn cache flag off to prevent save a cached data into cache storage over and over!
		} else {

			self::$cache_menu = $cache_key; # no cache found. so we enable cache flag to collect and cache the menu @see cache_mega_menu
		}

		return $args;
	}


	/**
	 * Cache the output of bf mega menu if necessary
	 *
	 * @param array $args bf mega menu arguments
	 *
	 * @return array.
	 */
	public static function cache_mega_menu( $args ) {

		if ( self::$cache_menu && $args['output'] ) {
			self::set_cache( self::$cache_menu, $args['output'], self::$cache_group );
		}

		return $args;
	}


	/**
	 * Is current mega menu available for caching
	 *
	 * @param string $mega_menu Root ID for widget
	 *
	 * @return bool
	 */
	public static function can_cache( $mega_menu ) {

		return isset( self::$mega_menus2cache[ $mega_menu ] );
	}


	/**
	 * Generate unique cache id for current mega menu
	 *
	 * @param array $args
	 *
	 * @return string
	 */
	protected static function get_cache_key( $args ) {

		return md5( serialize( wp_array_slice_assoc( $args, array( 'current-item', 'sub-menu', 'depth' ) ) ) );
	}
}

BF_Menu_cache::Run();
