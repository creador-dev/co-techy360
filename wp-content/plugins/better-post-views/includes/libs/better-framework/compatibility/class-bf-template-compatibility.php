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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */

BF_Template_Compatibility::init();

/**
 * BetterFramework static files compatibility manager.
 *
 * @package   BetterFramework
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   2.14.0
 * @access    public
 */
class BF_Template_Compatibility {

	/**
	 * @var string
	 */
	public static $id = 'bf-template-compatibility';

	/**
	 * Initialize library
	 *
	 * @since 2.14.0
	 */
	public static function init() {
		add_action( 'better-framework/after_setup', 'BF_Template_Compatibility::init_compatibility' );
	}


	/**
	 * Fire compatibility
	 *
	 * @since 2.14.0
	 * @return array
	 */
	public static function init_compatibility() {
		$config = apply_filters( 'better-framework/template-compatibility/config', array( 'scan_dir' => array() ) );

		return self::do_compatibility( $config );
	}

	/**
	 * Scan files/folders for outdated items
	 *
	 * @since 2.14.0
	 *
	 * @param array $config
	 * @param bool  $fire_callback
	 *
	 * @return array
	 */
	public static function do_compatibility( $config = array(), $fire_callback = TRUE ) {

		/**
		 * @var array $config array
		 *
		 *  array['scan_dir] configuration array
		 *
		 *      array['version']
		 *      array['override']
		 *      array['parent']
		 *      array['callback']
		 *      array['options']
		 *           array['recursive']
		 *           array['include_hidden']
		 *           array['exclude']
		 *           array['valid_extensions']
		 * }
		 */


		if ( empty( $config['scan_dir'] ) ) {
			return array();
		}

		$config['scan_dir'] = array_map( 'BF_Template_Compatibility::_normalize_indexes', $config['scan_dir'] );

		$outdated_files_all = array();
		$outdated_files     = array();
		$update_status      = FALSE;
		$wp_filesystem      = self::file_system_instance();
		$current_status     = (array) get_option( self::$id, array() );

		foreach ( $config['scan_dir'] as $info ) {

			if ( ! empty( $current_status[ $info['hash'] ] ) && empty( $info['force'] ) ) { // is compatibility executed previously?
				continue;
			}

			//
			// Validate configuration indexes
			//

			if ( empty( $info['version'] ) ) {
				continue;
			}

			if ( empty( $info['callback'] ) || ! is_callable( $info['callback'] ) ) {
				continue;
			}

			$override_dir = trailingslashit( $info['override'] );
			$parent_dir   = trailingslashit( $info['parent'] );

			if ( $override_dir === $parent_dir ) {
				continue;
			}

			$options = &$info['options'];

			$dirlist = $wp_filesystem->dirlist( $override_dir, $options['include_hidden'], $options['recursive'] );
			if ( ! $dirlist ) {
				$current_status[ $info['hash'] ] = time();
				$update_status                   = TRUE;
				continue;
			}
			$dirlist = $options['exclude'] ? array_diff_key( $dirlist, array_flip( $options['exclude'] ) ) : $dirlist;

			$outdated_files      = array();
			$validate_extensions = isset( $options['valid_extensions'] );
			$valid_extensions    = $validate_extensions ? array_flip( $options['valid_extensions'] ) : array();

			foreach ( $dirlist as $item ) {

				$basedir = basename( $override_dir );

				foreach ( self::get_files( $item ) as $path => $file ) {

					// only check file with specified extension
					if ( $validate_extensions ) {
						$ext = substr( $path, strrpos( $path, '.' ) + 1 );
						if ( ! isset( $valid_extensions[ $ext ] ) ) {
							continue;
						}
					}

					$override_version = self::get_file_version( $override_dir . $path );
					$parent_version   = self::get_file_version( $parent_dir . $path );

					if ( $parent_version && ( ! $override_version || version_compare( $override_version, $parent_version, '<' ) ) ) {
						$path             = $basedir . '/' . $path;
						$outdated_files[] = compact( 'path', 'override_version', 'parent_version' );
					}
				}
			}

			$outdated_files_all[ $parent_dir ] = $outdated_files;

			if ( $fire_callback && call_user_func( $info['callback'], $outdated_files, $options, $override_dir, $parent_dir ) ) {
				$current_status[ $info['hash'] ] = time();
				$update_status                   = TRUE;
			}
		}

		if ( $update_status ) {
			do_action( 'better-framework/template-compatibility/done', $outdated_files_all, $config );

			update_option( self::$id, $current_status );
		}

		return $outdated_files;
	}


	/**
	 * Arrange configuration array indexes
	 *
	 * @param array $config
	 *
	 * @access private
	 *
	 * @return array
	 */
	public static function _normalize_indexes( $config ) {

		$config['options'] = bf_merge_args( ( isset( $config['options'] ) ? $config['options'] : array() ), array(
			'recursive'      => FALSE,
			'include_hidden' => FALSE,
			'exclude'        => array(),
		) );

		$config['hash'] = md5( serialize( array(
			'version'  => $config['override'],
			'override' => $config['override'],
			'parent'   => $config['parent'],
			'options'  => $config['options'],
		) ) );

		return $config;
	}


	/**
	 * List Directory Files Recursively
	 *
	 * @param array  $filesystem_item
	 * @param string $_base_dir
	 *
	 * @return array
	 */
	public static function get_files( $filesystem_item, $_base_dir = '' ) {

		if ( $filesystem_item['type'] === 'd' ) {

			$_base_dir .= $filesystem_item['name'] . '/';

			$results = array();
			foreach ( $filesystem_item['files'] as $file ) {
				$results += self::get_files( $file, $_base_dir );
			}

			return $results;
		}

		$key = $_base_dir . $filesystem_item['name'];

		return array( $key => $filesystem_item );
	}

	/**
	 * Get an instance of WP FileSystem Object
	 *
	 * @global WP_Filesystem_Direct $wp_filesystem WordPress Filesystem Class
	 * @return WP_Filesystem_Direct
	 */
	public static function file_system_instance() {
		global $wp_filesystem;

		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
		}

		WP_Filesystem( TRUE, WP_CONTENT_DIR, FALSE );

		return $wp_filesystem;
	}

	/**
	 * Retrieve metadata from a file. Based on WP Core's get_file_data function.
	 *
	 * @param  string               $file          Path to the file
	 *
	 * @global WP_Filesystem_Direct $wp_filesystem WordPress Filesystem Class
	 *
	 * @return string
	 */
	public static function get_file_version( $file ) {
		global $wp_filesystem;

		/**
		 * @var WP_Filesystem_Direct $wp_filesystem
		 */

		if ( ! $wp_filesystem->exists( $file ) ) {
			return '';
		}

		// Make sure we catch CR-only line endings.
		$file_data = str_replace( "\r", "\n", $wp_filesystem->get_contents( $file ) );
		$version   = '';

		if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( '@version', '/' ) . '(.*)$/mi', $file_data, $match ) && $match[1] ) {
			$version = _cleanup_header_comment( $match[1] );
		}

		return $version;
	}
}
