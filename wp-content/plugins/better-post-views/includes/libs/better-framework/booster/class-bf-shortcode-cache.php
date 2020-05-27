<?php

/**
 * Cache WordPress shortcodes output for better performance
 *
 * @since      3.0.0
 * @package    BetterFramework/booster
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2017, BetterStudio
 *
 * @extends    BF_Item_Cache
 */

class BF_Shortcode_Cache extends BF_Booster_Cache {

	/**
	 * Group name for cached data
	 *
	 * @var string
	 */
	public static $cache_group = 'shortcode';

	/**
	 * List of shortcodes which is available for cache
	 *
	 * 'shortcode tag name' => 'cache duration @see $cache_intervals'
	 *
	 * @var array
	 */
	public static $shortcodes2cache = array();


	/**
	 * Store shortcode callback handler
	 *
	 * 'shortcode tag name' => callback to fire when shortcode is found
	 *                          in the order hand, this is second argument ($func) of add_shortcode function
	 *
	 * @var array
	 */
	public static $shortcodes_callback = array();


	/**
	 * A flag to detect is current shortcode nested level.
	 *
	 * @see display_shortcode
	 *
	 * @var int
	 */
	public static $shortcode_level = 0;


	/**
	 * Register event to initialize shortcode cache
	 */
	public static function Run() {

		add_action( 'init', 'BF_Shortcode_Cache::init' );
	}


	/**
	 * Initialize shortcode cache
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
		if ( ! BF_Booster::get_option( 'cache-shortcodes' ) || self::have_cache_plugin() ) {
			return;
		}

		self::$shortcodes2cache = apply_filters( 'better-framework/booster/shortcodes/config', array() );

		add_action( 'template_redirect', 'BF_Shortcode_Cache::apply_cache', 999 );
	}


	/**
	 * Change shortcode handle callback to response check cache storage before fire it if necessary
	 */
	public static function apply_cache() {

		global $shortcode_tags;

		# TODO: maybe we could replace this block of the code with array_diff/array_intersect stuff! :D
		foreach ( self::$shortcodes2cache as $shortcode_tag => $_ ) {

			if ( ! isset( $shortcode_tags[ $shortcode_tag ] ) ) { # shortcode not found! maybe it's an invalid $shortcode_tag value of the shortcode will register (add_shortcode) further
				continue;
			}

			self::$shortcodes_callback[ $shortcode_tag ] = $shortcode_tags[ $shortcode_tag ];        # TODO: we don't need the original callback if the cache already exists.
			$shortcode_tags[ $shortcode_tag ]            = 'BF_Shortcode_Cache::display_shortcode';
		}
	}


	/**
	 * Handle shortcode output
	 *
	 * @param string|array $atts          shortcode attributes. it could be an empty string
	 * @param string       $content       shortcode inner content
	 * @param string       $shortcode_tag shortcode tag name
	 *
	 * @return string
	 */
	public static function display_shortcode( $atts, $content, $shortcode_tag ) {

		# it's always true. we added this line for more flexibility because we are good citizen
		$can_cache = apply_filters( 'better-framework/booster/shortcodes/cache', self::can_cache( $shortcode_tag ), $atts, $content, $shortcode_tag );

		if ( ! $can_cache ) { # We are not allow to cache this specific shortcode
			return self::fire_shortcode_handler( $atts, $content, $shortcode_tag );
		}

		$cache_key = self::get_cache_key( $atts, $content, $shortcode_tag );

		if ( $cached = self::get_cache( $cache_key, self::$cache_group ) ) { # current shortcode already cached

			return $cached;
		} else { # not cache found!


			self::$shortcode_level ++; # increase shortcode to detect nested shortcodes. $shortcode_level > 1
			$shortcode_output = self::fire_shortcode_handler( $atts, $content, $shortcode_tag );

			if ( is_string( $shortcode_output ) ) { # string means everything is ok

				/**
				 * Just cache parent shortcode
				 *
				 * It doesn't need to cache nested shortcode ( shortcodes in the $content)
				 * if we cache top level shortcode,  another child-shortcodes will also cache
				 */
				if ( self::$shortcode_level === 1 ) {
					$expiration = self::get_cache_duration( $shortcode_tag );
					self::set_cache( $cache_key, $shortcode_output, self::$cache_group, $expiration ); # Cache the shortcode output
				}
			}

			self::$shortcode_level --; # rollback increased value

			return $shortcode_output;
		}
	}


	/**
	 *
	 * Just fire shortcode callback handle without considering cache version
	 *
	 * @param string|array $atts          shortcode attributes. it could be an empty string
	 * @param string       $content       shortcode inner content
	 * @param string       $shortcode_tag shortcode tag name
	 *
	 * @return string|void string on success or void on failure
	 */
	public static function fire_shortcode_handler( &$atts, &$content, &$shortcode_tag ) {

		if ( ! isset( self::$shortcodes_callback[ $shortcode_tag ] ) ) { # invalid $shortcode_tag
			return;
		}

		ob_start(); # Some damn plugins echo the output instead of return it! we handle this issue because we are Better Studio

		$output = call_user_func( self::$shortcodes_callback[ $shortcode_tag ], $atts, $content, $shortcode_tag );
		$buffer = ob_get_clean();

		if ( ! $output && $buffer ) {
			$output = $buffer;
		}

		if ( is_string( $output ) ) {
			return $output;
		}

		# i have no idea why the output is not string :|
	}


	/**
	 * Get unique cache key for the shortcode
	 *
	 * @param string|array $atts
	 * @param string       $content
	 * @param string       $shortcode_tag
	 *
	 * @return string
	 */
	public static function get_cache_key( &$atts, &$content, &$shortcode_tag ) {

		return md5( serialize( $atts ) . $shortcode_tag . $content );
	}


	/**
	 * Is a shortcode available for caching
	 *
	 * @param string $shortcode_tag shortcode tag name
	 *
	 * @return bool
	 */
	public static function can_cache( $shortcode_tag ) {

		return isset( self::$shortcodes2cache[ $shortcode_tag ] );
	}


	/**
	 * Get cache duration interval
	 *
	 * @param string $shortcode_tag shortcode tag name
	 *
	 * @return int|void int on success
	 */
	public static function get_cache_duration( $shortcode_tag ) {

		if ( isset( self::$shortcodes2cache[ $shortcode_tag ] ) ) {

			$dur = self::$shortcodes2cache[ $shortcode_tag ];

			if ( isset( self::$cache_intervals[ $dur ] ) ) {

				return self::$cache_intervals[ $dur ];
			}
		}
	}
}

BF_Shortcode_Cache::Run();
