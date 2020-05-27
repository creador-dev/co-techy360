<?php


/**
 * Cache WordPress widgets output for better performance
 *
 * @since      3.0.0
 * @package    BetterFramework/booster
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2017, BetterStudio
 *
 * @extends    BF_Item_Cache
 */
class BF_Widget_Cache extends BF_Booster_Cache {

	/**
	 * Group name for cached data
	 *
	 * @var string
	 */
	public static $cache_group = 'widget';

	/**
	 * List of widgets that is available for cache
	 *
	 * 'base id of widget' => 'cache duration @see $cache_intervals'
	 *
	 * @var array
	 */
	public static $widgets2cache = array();


	/**
	 * Register event to initialize widget cache
	 */
	public static function Run() {

		add_action( 'init', 'BF_Widget_Cache::init' );
	}


	/**
	 * Initialize widget cache
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
		if ( ! BF_Booster::get_option( 'cache-widgets' ) || self::have_cache_plugin() ) {
			return;
		}

		self::$widgets2cache = apply_filters( 'better-framework/booster/widgets/config', array() );

		add_filter( 'widget_display_callback', 'BF_Widget_Cache::display_widget', 2, 3 );
	}


	/**
	 * Handle widget display callback
	 *
	 * Fetch widget output from the cache storage or fire the widget callback if necessary
	 *
	 *
	 * @param array     $instance  The current widget instance's settings
	 * @param WP_Widget $wp_widget The current widget instance
	 * @param array     $args      An array of default widget arguments
	 *
	 * @return bool|array
	 */
	public static function display_widget( $instance, $wp_widget, $args ) {


		if ( false === $instance ) { # False means another high priority hook did some stuff and we must leave it!
			return false;
		}

		$id_base   = $wp_widget->id_base;
		$can_cache = apply_filters( 'better-framework/booster/widgets/cache', self::can_cache( $id_base ), $instance, $args, $id_base, $wp_widget );

		if ( ! $can_cache ) { # We are not allow to cache this specific widget
			return $instance;
		}

		$cache_key = self::get_cache_key( $instance, $args );

		if ( $cached = self::get_cache( $cache_key, self::$cache_group ) ) { # The current widget already cached

			echo $cached;


		} else { # not cache found!

			// Fire the widget output callback and cache it

			$expiration = self::get_cache_duration( $id_base );

			ob_start();

			$wp_widget->widget( $args, $instance );

			$widget_output = ob_get_contents();

			self::set_cache( $cache_key, $widget_output, self::$cache_group, $expiration ); // Cache the widget output

			ob_end_flush(); // Print the output then delete the buffer
		}

		return false; # Return false tell WordPress to avoid fire output callback again
	}


	/**
	 * Get unique cache key for the widget
	 *
	 * @param array $instance The current widget instance's settings
	 * @param array $args     An array of default widget arguments
	 *
	 * @return string
	 */
	public static function get_cache_key( &$instance, &$args ) {

		return md5( $args['widget_id'] . serialize( $instance ) );
	}


	/**
	 * Is a widget available for caching
	 *
	 * @param string $widget_id_base Root ID for widget
	 *
	 * @return bool
	 */
	public static function can_cache( $widget_id_base ) {

		return isset( self::$widgets2cache[ $widget_id_base ] );
	}


	/**
	 * Get cache duration interval
	 *
	 * @param string $widget_id_base Root ID for widget
	 *
	 * @return int|void int on success
	 */
	public static function get_cache_duration( $widget_id_base ) {

		if ( isset( self::$widgets2cache[ $widget_id_base ] ) ) {

			$dur = self::$widgets2cache[ $widget_id_base ];

			if ( isset( self::$cache_intervals[ $dur ] ) ) {

				return self::$cache_intervals[ $dur ];
			}
		}
	}
}


BF_Widget_Cache::Run();
