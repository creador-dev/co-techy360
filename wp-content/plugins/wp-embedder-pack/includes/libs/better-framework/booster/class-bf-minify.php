<?php


/**
 * Merge and compress static js/css files.
 *
 * @since 2.9.0
 */
abstract class BF_Minify extends WP_Dependencies {

	/**
	 * Relative path to cache directory
	 *
	 * @var string
	 *
	 * @since 2.9.0
	 */
	public static $cache_dir = 'bs-booster-cache';

	/**
	 * Static files path
	 *
	 * @var array
	 *
	 * @since 2.9.0
	 */
	public $files_path = array();


	/**
	 * @return mixed
	 */
	abstract public function print_output();


	/**
	 * Callback to compress files content
	 *
	 * @param string $content
	 *
	 * @since 2.9.0
	 * @return string|bool
	 */
	public function minify( $content ) {

		return $content;
	}


	/**
	 * Callback to compress sanitize files content
	 *
	 * @param string $content
	 * @param array  $handle
	 *
	 * @return string
	 * @since 2.9.0
	 */
	public function sanitize( $content, $handle ) {

		return $content;
	}


	/**
	 * Put contents into a file
	 *
	 * @param string $file_path full path to file
	 * @param string $content   file content
	 *
	 * @return bool true on success or false on failure
	 * @since 2.9.0
	 */
	public static function write_file( $file_path, $content ) {

		$dir = dirname( $file_path );

		if ( ! is_dir( $dir ) ) {
			wp_mkdir_p( $dir );
		}

		return bf_file_system_instance()->put_contents(
			$file_path,
			$content
		);
	}


	public function is_dir_writable( $dir_path ) {

		if ( ! is_dir( $dir_path ) ) {
			wp_mkdir_p( $dir_path );
		}

		return is_writeable( $dir_path );
	}


	/**
	 * Get file content
	 *
	 * @param string $handle handle name
	 *
	 * @since 2.9.0
	 * @return bool|string string on success or false on failure
	 */
	public function get_file_content( $handle ) {

		if ( ! empty( $this->files_path[ $handle ] ) && is_readable( $this->files_path[ $handle ] ) ) {

			return bf_get_local_file_content( $this->files_path[ $handle ] );
		}

		return false;
	}


	/**
	 * Get unique file hash
	 *
	 * @param array $handles
	 *
	 * @since 2.9.0
	 * @return string
	 */
	public function handles_hash( $handles ) {

		return md5( serialize( array_intersect_key( $this->registered, array_flip( $handles ) ) ) );
	}


	public function string_hash( $string ) {

		return md5( $string );
	}


	/**
	 * Combine and compress files content
	 *
	 * @param array  $handles
	 * @param string $new_filename
	 *
	 * @since 2.9.0
	 * @return bool true on success or false on failure
	 */
	public function do_minify( $handles, $new_filename ) {

		if ( ! bf_booster_is_active( 'minify-css' ) ) {
			return;
		}

		if ( is_admin() ) {
			return;
		}

		if ( ! $this->is_dir_writable( dirname( $new_filename ) ) ) {
			return false;
		}

		$output = '';

		foreach ( $handles as $handle ) {

			$content = $this->get_file_content( $handle );

			if ( $content === false ) {

				return false;
			}

			$output .= $this->sanitize( $content, $handle ) . "\n";
		}

		if ( $output = $this->minify( $output ) ) {

			return self::write_file( $new_filename, $output );
		}

		return false;
	}


	public static function add_hooks() {

		add_action( 'bs-booster/minify/clear-cache', 'BF_Minify::clear_cache' );
	}


	public static function register_schedule() {

		if ( ! wp_next_scheduled( 'bs-booster/minify/clear-cache' ) ) {
			wp_schedule_event( time(), 'daily', 'bs-booster/minify/clear-cache' );
		}

	}


	/**
	 * Clears all minified caches (files)
	 *
	 * @param string $type all|outdated
	 *
	 * @return bool
	 */
	public static function clear_cache( $type = 'outdated' ) {

		$dir = trailingslashit( WP_CONTENT_DIR . '/' . self::$cache_dir );

		if ( $files = bf_file_system_instance()->dirlist( $dir, false, false ) ) {

			$files = array_keys( $files );
		} else {

			return false;
		}

		$current_time = time();
		$duration     = DAY_IN_SECONDS * 2;

		if ( $type == 'outdated' ) {
			foreach ( $files as $file ) {

				$delete_file = $duration < ( $current_time - fileatime( $dir . $file ) );

				if ( $delete_file ) {

					@unlink( $dir . $file );
				}

			}
		} else {
			foreach ( $files as $file ) {
				@unlink( $dir . $file );
			}
		}

		return true;
	} // clear_cache
}


if ( is_admin() ) {
	BF_Minify::register_schedule();
}

BF_Minify::add_hooks();
