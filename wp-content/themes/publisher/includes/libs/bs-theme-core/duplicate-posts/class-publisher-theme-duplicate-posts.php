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


// Fire up
Publisher_Theme_Duplicate_Posts::setup();


/**
 * Publisher Duplicate Posts
 *
 * Used to remove duplicate posts from page. there will no duplicate posts with using this.
 * With it's advanced functionality prevent every duplicate posts!
 *
 *
 * @package  Publisher Duplicate Posts
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.0.0
 * @access   public
 * @see      http://betterstudio.com
 */
class Publisher_Theme_Duplicate_Posts {

	/**
	 * Contains array of active pages
	 * @var array
	 */
	public static $active_pages = array();


	/**
	 * Contains current page state, It's cache field!
	 *
	 * @var bool
	 */
	public static $current_page_active = false;


	/**
	 * Appeared posts queue for removing theme in next queries for removing duplicate posts
	 *
	 * @var array
	 */
	public static $appeared_posts = array();


	/**
	 * Flag used to detect main and first query of each page was processed for collecting all appeared posts IDs
	 *
	 * @var bool
	 */
	public static $first_query_processed = false;


	/**
	 * ID of global that used to disable duplicate posts temporary
	 *
	 * @var string
	 */
	public static $temporary_disable_global = 'disable-duplicate-posts';


	/**
	 * ID of global that used to activate duplicate posts temporary in ajax requests
	 *
	 * @var string
	 */
	public static $temporary_activate_ajax = false;


	public static function setup() {
		add_action( 'better-framework/after_setup', array( 'Publisher_Theme_Duplicate_Posts', 'init' ) );
	}


	/**
	 * Initialization
	 */
	public static function init() {

		/**
		 * Filters list of active pages for removing duplicate posts in them.
		 *
		 * @since 1.0.0
		 *
		 * @param array $active_pages All active pages
		 */
		self::$active_pages = apply_filters( 'publisher-theme-core/duplicate-posts/config', self::$active_pages );

		// hooked to pre_get_posts because we should current page!
		add_action( 'pre_get_posts', array( 'Publisher_Theme_Duplicate_Posts', 'hack_pre_get_posts' ) );
	}


	/**
	 * Callback: Hooked to pre_get_posts to remove appeared posts from query
	 *
	 * @param   WP_Query $query WP_Query instance
	 */
	public static function hack_pre_get_posts( $query ) {

		// Do not work in AMP ( Better AMP and Automatic AMP )
		if (
			( function_exists( 'is_better_amp' ) AND is_better_amp( $query ) ) OR
			( function_exists( 'is_amp_endpoint' ) AND is_amp_endpoint() )
		) {
			return;
		}

		// Process hiding appeared posts from queries
		if ( ( ! is_admin() && $query->is_main_query() ) || ( bf_is_doing_ajax() && self::$temporary_activate_ajax ) ) {

			// Remove this
			remove_action( 'pre_get_posts', array( 'Publisher_Theme_Duplicate_Posts', 'hack_pre_get_posts' ) );

			self::determine_is_active( $query );

			// Action if current page is active
			if ( ! self::is_active() ) {
				return;
			}

			// Filter WP_Query
			add_action( 'pre_get_posts', array( 'Publisher_Theme_Duplicate_Posts', 'pre_get_posts' ), 99 );

			// Filter WP_Query
			add_filter( 'the_posts', array( 'Publisher_Theme_Duplicate_Posts', 'the_posts' ) );

			// Filter WP_Query
			add_action( 'the_post', array( 'Publisher_Theme_Duplicate_Posts', 'the_post' ) );
		}
	}


	/**
	 * @return array
	 */
	public static function get_appeared_posts() {
		return self::$appeared_posts;
	}


	/**
	 * Adds post to appeared posts queue
	 *
	 * @param $appeared_posts
	 *
	 */
	public static function add_appeared_post( $appeared_posts ) {

		if ( is_array( $appeared_posts ) ) {
			self::$appeared_posts = array_merge( self::$appeared_posts, $appeared_posts );
		} else {
			self::$appeared_posts[ $appeared_posts ] = $appeared_posts;
		}
	}


	/**
	 * Clears appeared posts queue
	 */
	public static function clear_appeared_posts() {
		self::$appeared_posts = array();
	}


	/**
	 * Callback: simple hack to collect posts from first and main query to removing them from queries that are
	 * retrieving before main query!
	 *
	 * Filter: the_posts
	 *
	 * @param $posts
	 *
	 * @return mixed
	 */
	public static function the_posts( $posts ) {


		// Disable temporarily
		if ( publisher_get_global( self::$temporary_disable_global, false ) ) {
			return $posts;
		}

		// Do one time
		if ( ! self::$first_query_processed ) {

			if ( $posts ) {
				foreach ( $posts as $post_id => $post_data ) {
					self::add_appeared_post( $post_data->ID );
				}
			}

			self::$first_query_processed = true;
		}

		return $posts;
	}


	/**
	 * Callback: Adds current post ID
	 *
	 * Action: the_post
	 *
	 * @param $post
	 */
	public static function the_post( $post ) {

		// Disable temporarily
		if ( publisher_get_global( self::$temporary_disable_global, false ) ) {
			return;
		}

		self::add_appeared_post( $post->ID );
	}


	/**
	 * Callback: Hooked to pre_get_posts to remove appeared posts from query
	 *
	 * @param   WP_Query $query WP_Query instance
	 */
	public static function pre_get_posts( $query ) {

		// Disable temporarily
		if ( publisher_get_global( self::$temporary_disable_global, false ) ) {
			return;
		}

		// Process hiding appeared posts from queries
		if ( ! is_admin() || self::$temporary_activate_ajax ) {

			$excludes = $query->get( 'post__not_in' );

			if ( empty( $excludes ) ) {
				$query->set( 'post__not_in', array_keys( self::get_appeared_posts() ) );
			} else {
				$query->set( 'post__not_in', array_merge( array_values( $excludes ), array_values( self::get_appeared_posts() ) ) );
			}
		}

	}


	/**
	 * Determine current page is activated or not and cache it
	 *
	 * @param $query WP_Query
	 */
	public static function determine_is_active( $query ) {

		if ( bf_is_doing_ajax() && publisher_get_global( self::$temporary_activate_ajax, false ) ) {
			self::$current_page_active = true;

			return;
		}

		// Process current page state
		if ( self::$active_pages ) {

			// Whole site activation
			if ( in_array( 'full', self::$active_pages ) ) {
				self::$current_page_active = true;

				return;
			}


			// Hack to detect home page safely
			$is_home = false;
			if ( $query->is_home() ) {
				$is_home = true;
			} elseif ( $query->is_page() ) {
				if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_on_front' ) && $query->query_vars['page_id'] == get_option( 'page_on_front' ) ) {
					$is_home = true;
				}
			}


			// Home page
			if ( $is_home && in_array( 'home', self::$active_pages ) ) {
				self::$current_page_active = true;

				return;
			} // Categories
			elseif ( $query->is_category() ) {

				// All categories
				if ( in_array( 'categories', self::$active_pages ) ) {
					self::$current_page_active = true;

					return;
				} // Current category
				elseif ( in_array( 'category-' . $query->get_queried_object_id(), self::$active_pages ) ) {
					self::$current_page_active = true;

					return;
				}

			} // Tags
			elseif ( $query->is_tag() ) {

				// All categories
				if ( in_array( 'tags', self::$active_pages ) ) {
					self::$current_page_active = true;

					return;
				} // Current category
				elseif ( in_array( 'tag-' . $query->get_queried_object_id(), self::$active_pages ) ) {
					self::$current_page_active = true;

					return;
				}

			}
		}
	}


	/**
	 * Handy function to get current page state
	 *
	 * @return bool
	 */
	public static function is_active() {
		return self::$current_page_active;
	}
}
