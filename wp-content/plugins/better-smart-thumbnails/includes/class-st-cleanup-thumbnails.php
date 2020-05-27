<?php


class ST_CleanUp_Thumbnail {

	/**
	 * @var int
	 *
	 * @since 1.0.0
	 */
	protected $attachment_id = 0;


	/**
	 * Store thumbnail metadata info.
	 *
	 * @var array
	 */
	protected $metadata = array();

	/**
	 * @var array
	 *
	 * @since 1.0.0
	 */
	protected $files = array();


	/**
	 * Sore any shared data.
	 *
	 * @var mixed
	 *
	 * @since 1.0.0
	 */
	protected $storage;


	/**
	 * St_CleanUp_Thumbnail constructor.
	 *
	 * @param int $attachment_id
	 *
	 * @since 1.0.0
	 */
	public function __construct( $attachment_id = 0 ) {

		if ( $attachment_id ) {
			$this->set_attachment_id( $attachment_id );
		}
	}


	/**
	 * @since 1.0.0
	 * @return array|bool false on error or list of cleaned file on success.
	 */
	public function cleanup() {

		if ( ! $this->list_upload_sub_dir() ) {
			return FALSE;
		}

		if ( ! $this->filter_attachment_thumbnails() ) {
			return FALSE;
		}

		return $this->delete_useless_files();
	}


	/**
	 * Scan thumbnail subdirectory on upload directory for any file.
	 *
	 * @since 1.0.0
	 * @return bool false on error or true on success.
	 */
	protected function list_upload_sub_dir() {

		if ( ! $scan_dir = $this->working_dir() ) {
			return FALSE;
		}

		$this->files = array();

		if ( ! $all_files = $this->file_system_instance()->dirlist( $scan_dir ) ) {
			return FALSE;
		}

		foreach ( $all_files as $file ) {
			$this->files[] = $file['name'];
		}

		return TRUE;
	}


	/**
	 * Get base directory.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function base_dir() {

		$scan_dir = wp_upload_dir();

		return trailingslashit( $scan_dir['basedir'] );
	}


	/**
	 * Get absolute path to the working directory.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function working_dir() {

		if ( empty( $this->metadata['file'] ) ) {
			return '';
		}

		return $this->base_dir() . dirname( $this->metadata['file'] ) . '/';
	}


	/**
	 * @since 1.0.0
	 * @return array
	 */
	protected function list_attachment_sizes() {

		$files = array();

		if ( empty( $this->metadata['sizes'] ) ) {

			return $files;
		}

		foreach ( $this->metadata['sizes'] as $info ) {

			$files[] = $info['file'];
		}

		return array_unique( $files );
	}


	/**
	 * @since 1.0.0
	 *
	 * @return bool false on error or true on success.
	 */
	protected function filter_attachment_thumbnails() {

		if ( empty( $this->metadata['file'] ) ) {
			return FALSE;
		}
		if ( ! $this->files ) {
			return FALSE;
		}

		$file_ext_q = substr( basename( $this->metadata['file'] ), strrpos( basename( $this->metadata['file'] ), '.' ) );
		$file_ext_q = preg_quote( $file_ext_q, '#' );
		//
		$file_name_q = substr( basename( $this->metadata['file'] ), 0, strrpos( basename( $this->metadata['file'] ), '.' ) );
		$file_name_q = preg_quote( $file_name_q, '#' );

		$filter_file_pattern = '#^';
		$filter_file_pattern .= "$file_name_q-\d+x\d+$file_ext_q";
		$filter_file_pattern .= '$#';

		$this->storage = $filter_file_pattern;
		$this->files   = array_filter( $this->files, array( $this, 'filter_file_name' ) );

		return ! empty( $this->files );
	}


	/**
	 * @since 1.0.0
	 *
	 * @return bool|array false on failure or list of extra files on success.
	 */
	protected function delete_useless_files() {

		if ( ! $this->files ) {
			return FALSE;
		}

		$working_dir = $this->working_dir();
		$file_system = $this->file_system_instance();
		$extra_files = array_diff( $this->files, $this->list_attachment_sizes() );

		foreach ( $extra_files as $extra_file ) {

			$file_system->delete( $working_dir . $extra_file );
		}

		return $extra_files;
	}


	/**
	 * @param int $thumbnail_id
	 *
	 * @since 1.0.0
	 */
	public function set_attachment_id( $thumbnail_id ) {

		$this->attachment_id = $thumbnail_id;

		$this->metadata = wp_get_attachment_metadata( $thumbnail_id );
	}


	/**
	 * @since 1.0.0
	 * @return int
	 */
	public function get_attachment_id() {

		return $this->attachment_id;
	}


	/**
	 * @param string $file
	 *
	 * @access private
	 *
	 * @return bool
	 */
	protected function filter_file_name( $file ) {

		return preg_match( $this->storage, $file );
	}


	/**
	 * Get an instance of WP FileSystem Object
	 *
	 * @global WP_Filesystem_Direct $wp_filesystem WordPress Filesystem Class
	 *
	 * @since 1.0.0
	 * @return WP_Filesystem_Direct
	 */
	protected function file_system_instance() {

		global $wp_filesystem;

		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
		}

		WP_Filesystem( TRUE, WP_CONTENT_DIR, FALSE );

		return $wp_filesystem;
	}

}