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
 * Handy functions for making development quicker in getting addresses.
 *
 * @package    BetterFramework
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2015, BetterStudio
 */


if ( ! function_exists( 'bf_get_dir' ) ) {
	/**
	 * Get BetterFramework directory path
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_get_dir( $append = '' ) {

		return BF_PATH . $append;
	}
}


if ( ! function_exists( 'bf_require' ) ) {
	/**
	 * Used to require file inside BetterFramework
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_require( $append = '' ) {

		require BF_PATH . $append;
	}
}


if ( ! function_exists( 'bf_require_once' ) ) {
	/**
	 * Used to require_once file inside BetterFramework
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_require_once( $append = '' ) {

		require_once BF_PATH . $append;
	}
}


if ( ! function_exists( 'bf_get_uri' ) ) {
	/**
	 * Get BetterFramework directory URI (URL)
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_get_uri( $append = '' ) {

		return BF_URI . $append;
	}
}


if ( ! function_exists( 'bf_get_theme_dir' ) ) {
	/**
	 * Parent theme directory.
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_get_theme_dir( $append = '' ) {

		static $directory;

		if ( ! $directory ) {
			$directory = get_template_directory() . '/';
		}

		return $directory . $append;
	}
}


if ( ! function_exists( 'bf_get_theme_uri' ) ) {
	/**
	 * Parent theme directory URI.
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_get_theme_uri( $append = '' ) {

		static $uri;

		if ( ! $uri ) {
			$uri = get_template_directory_uri() . '/';
		}

		return $uri . $append;
	}
}


if ( ! function_exists( 'bf_get_child_theme_dir' ) ) {
	/**
	 * Child theme directory.
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_get_child_theme_dir( $append = '' ) {

		static $directory;

		if ( ! $directory ) {
			$directory = get_stylesheet_directory() . '/';
		}

		return $directory . $append;
	}
}


if ( ! function_exists( 'bf_get_child_theme_uri' ) ) {
	/**
	 * Child theme directory URI.
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function bf_get_child_theme_uri( $append = '' ) {

		static $uri;

		if ( ! $uri ) {
			$uri = get_stylesheet_directory_uri() . '/';
		}

		return $uri . $append;
	}
}


if ( ! function_exists( 'bf_basename' ) ) {
	/**
	 * Fixes basename functionality when file name start with an accent
	 * https://stackoverflow.com/questions/32115609/basename-fail-when-file-name-start-by-an-accent
	 *
	 * @param $url
	 *
	 * @return mixed
	 */
	function bf_basename( $url ) {

		$file_name = explode( '/', $url );

		return end( $file_name );
	}
}