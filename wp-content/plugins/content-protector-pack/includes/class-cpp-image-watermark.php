<?php


class CPP_Image_Watermark {

	/**
	 * @var string
	 */
	public $image_file = '';

	/**
	 * @var string
	 */
	public $image_backup_file = '';


	/**
	 * @return bool
	 */
	public static function is_active() {

		return cpp_option( 'image_watermark_enable' ) && cpp_option( 'watermark_file' );

	}


	/**
	 * Initialize
	 *
	 * @since 1.0.0
	 */
	public function init() {

		if ( is_admin() && ! wp_next_scheduled( 'content-protector-pack/watermark/clear-backups' ) ) {

			wp_schedule_event( time(), 'daily', 'content-protector-pack/watermark/clear-backups' );
		}


		add_action( 'better-rebuild-thumbnails/thumbnail-regenerated', array( $this, 'thumbnail_regenerated' ) );

		add_filter( 'wp_handle_upload', array( $this, 'append_watermark' ) );
		add_filter( 'wp_generate_attachment_metadata', array( $this, 'save_backup_file' ), 20, 2 );
		add_filter( 'attachment_fields_to_edit', array( $this, 'add_manage_links' ), 10, 2 );

		add_action( 'content-protector-pack/watermark/clear-backups', array( $this, 'clear_backup_files' ) );

		add_action( 'wp_ajax_cpp-watermark', array( $this, 'handle_ajax_actions' ) );

		add_action( 'delete_attachment', array( $this, 'delete_backup_file' ) );
	}


	/**
	 * Append watermark.
	 *
	 * @hooked wp_handle_upload
	 *
	 * @param array $upload
	 *
	 * @since  1.0.0
	 * @return mixed
	 */
	public function append_watermark( $upload ) {

		if ( substr( $upload['type'], 0, 6 ) !== 'image/' ) {
			return $upload;
		}

		if ( ! $this->is_active() ) {
			return $upload;
		}

		if ( ! cpp_option( 'watermark_auto' ) ) {
			return $upload;
		}

		if ( isset( $_SERVER['HTTP_REFERER'] ) && stristr( urldecode( $_SERVER['HTTP_REFERER'] ), 'better-studio/content-protector-pack' ) ) {
			return $upload;
		}

		$this->watermark( $upload['file'] );

		return $upload;
	}


	/**
	 * @param string $file absolute path to the image
	 * @param string $destination_file
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function watermark( $file, $destination_file = '' ) {

		if ( ! $handler = $this->get_handler_instance() ) {

			return FALSE;
		}

		if ( ! $watermark = $this->watermark_file() ) {
			return FALSE;
		}


		// Backup Original File
		$ext         = substr( basename( $file ), strrpos( basename( $file ), '.' ) + 1 );
		$filename    = substr( basename( $file ), 0, strrpos( basename( $file ), '.' ) );
		$backup_file = dirname( $file ) . "/$filename.backup.$ext";
		//
		$this->file_system_instance()->copy( $file, $backup_file );

		$this->image_file        = preg_replace( '#^' . preg_quote( $this->upload_base_dir(), '#' ) . '/*(.+)#', '$1', $file );
		$this->image_backup_file = preg_replace( '#^' . preg_quote( $this->upload_base_dir(), '#' ) . '/*(.+)#', '$1', $backup_file );


		$handler->load_image( $file );
		$handler->load_watermark( $watermark );

		if ( $destination_file ) {
			$handler->destination_file( $destination_file );
		}

		return $handler->apply();
	}

	/**
	 * @param int $attachment_id
	 *
	 * @since 1.0.0
	 * @return bool true on success.
	 */
	public function thumbnail_regenerated( $attachment_id ) {

		if ( ! $meta_data = wp_get_attachment_metadata( $attachment_id ) ) {

			return FALSE;
		}

		$upload_dir = wp_upload_dir();

		if ( ! empty( $upload_dir['error'] ) ) {
			return FALSE;
		}

		$sub_dir    = trim( dirname( $meta_data['file'] ), '/' ) . '/';
		$upload_dir = trailingslashit( $upload_dir['basedir'] );

		$this->watermark( $upload_dir . $meta_data['file'] );

		if ( ! empty( $meta_data['sizes'] ) ) {

			foreach ( $meta_data['sizes'] as $file_info ) {

				$this->watermark( $upload_dir . $sub_dir . $file_info['file'] );
			}
		}

		return TRUE;
	}


	/**
	 * Get image handler object instance.
	 *
	 * @since 1.0.0
	 *
	 * @return CPP_Image_Watermark_Handler|bool false on failure.
	 */
	public function get_handler_instance() {

		foreach ( $this->get_handler_classes() as $handler_class ) {

			$test_cb = array( $handler_class, 'test' );

			if ( call_user_func( $test_cb ) ) {

				return new $handler_class( array(
					'watermark_position' => cpp_option( 'watermark_position' ),
				) );
			}
		}

		return FALSE;
	}


	/**
	 * Get list of image handlers class name.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_handler_classes() {

		if ( ! class_exists( 'CPP_Image_Watermark_Handler' ) ) {
			require Content_Protector_Pack::dir_path( 'includes/watermark/class-cpp-image-watermark-handler.php' );
		}

		if ( ! class_exists( 'CPP_Image_Watermark_GD' ) ) {

			require Content_Protector_Pack::dir_path( 'includes/watermark/class-cpp-image-watermark-gd.php' );
		}
		if ( ! class_exists( 'CPP_Image_Watermark_Imagick' ) ) {

			require Content_Protector_Pack::dir_path( 'includes/watermark/class-cpp-image-watermark-imagick.php' );
		}

		return array(
			'CPP_Image_Watermark_Imagick',
			'CPP_Image_Watermark_GD',
		);
	}


	/**
	 * Get an instance of WP FileSystem Object
	 *
	 * @global WP_Filesystem_Direct $wp_filesystem WordPress Filesystem Class
	 *
	 * @since 1.0.0
	 * @return WP_Filesystem_Direct
	 */
	public function file_system_instance() {

		global $wp_filesystem;

		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
		}

		WP_Filesystem( TRUE, WP_CONTENT_DIR, FALSE );

		return $wp_filesystem;
	}


	/**
	 * @param string $file          relative path to the file.
	 * @param int    $attachment_id optional
	 *
	 * @return bool true on success.
	 * @since 1.0.0
	 */
	protected function add_to_delete_queue( $file, $attachment_id ) {

		$files          = get_option( 'cpp-watermark-backups', array() );
		$files[ $file ] = $attachment_id;

		return (bool) update_option( 'cpp-watermark-backups', array_filter( $files ) );
	}


	/**
	 * @hooked content-protector-pack/watermark/clear-backups
	 *
	 * @since  1.0.0
	 * @return bool true on success.
	 */
	public function clear_backup_files() {

		if ( ! $files = get_option( 'cpp-watermark-backups', array() ) ) {
			return FALSE;
		}

		$file_system = $this->file_system_instance();
		$basedir     = $this->upload_base_dir();

		foreach ( $files as $file => $attachment_id ) {

			if ( $file_system->delete( $basedir . $file ) ) {

				unset( $files[ $file ] );

				$this->backup_image_unset( $attachment_id );
			}
		}

		return (bool) update_option( 'cpp-watermark-backups', array_filter( $files ) );
	}


	/**
	 * @hooked wp_generate_attachment_metadata
	 *
	 * @param array $metadata      An array of attachment meta data.
	 * @param int   $attachment_id Current attachment ID.
	 *
	 * @since  1.0.0
	 * @return array
	 */
	public function save_backup_file( $metadata, $attachment_id ) {

		if ( $this->image_file !== $metadata['file'] ) {
			return $metadata;
		}

		if ( ! cpp_option( 'watermark_backup_original' ) ) {

			$this->add_to_delete_queue( $this->image_backup_file, $attachment_id );
		}

		$metadata['without_watermark'] = $this->image_backup_file;
		$metadata['cpp_watermark']     = TRUE;

		return $metadata;
	}


	/**
	 * @param int $attachment_id Current attachment ID.
	 *
	 * @since 1.0.0
	 * @return bool true on success.
	 */
	protected function backup_image_unset( $attachment_id ) {

		if ( ! $metadata = wp_get_attachment_metadata( $attachment_id ) ) {
			return FALSE;
		}

		if ( ! isset( $metadata['without_watermark'] ) ) {
			return FALSE;
		}

		unset( $metadata['without_watermark'] );

		return (bool) wp_update_attachment_metadata( $attachment_id, $metadata );
	}


	/**
	 * @param array   $form_fields An array of attachment form fields.
	 * @param WP_Post $attachment  The WP_Post attachment object.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function add_manage_links( $form_fields, $attachment ) {

		$have_watermark = $this->has_post_thumbnail_attachment( $attachment->ID );

		$form_fields['cpp_watermark_control'] = array(
			'show_in_edit' => FALSE,
			'tr'           => '
			<div data-post-id="' . $attachment->ID . '" class="cpp-watermark-control" data-nonce="' . $this->get_nonce( $attachment->ID ) . '" style="position: relative;">
				<label class="setting">
					<span class="name">' . __( 'Image Watermark', 'content-protector-pack' ) . '</span>
					<span class="value">
						<ul style="padding: 0;margin: 0;">
							<li class="cpp-watermark-add" style="display:' . ( $have_watermark ? 'none' : 'list-item' ) . '"><a href="#">' . __( 'Set watermark', 'content-protector-pack' ) . '</a></li>
							<li class="cpp-watermark-remove"  style="display: ' . ( $have_watermark ? 'list-item' : 'none' ) . '"><a href="#">' . __( 'Remove watermark', 'content-protector-pack' ) . '</a></li>
						</ul>
					</span>
				</label>
				<div class="clear"></div>
			</div>
			',
		);

		return $form_fields;
	}


	/**
	 * @param int $attachment_id
	 *
	 * @return bool true if exists.
	 */
	protected function has_post_thumbnail_attachment( $attachment_id ) {

		if ( ! $metadata = wp_get_attachment_metadata( $attachment_id ) ) {
			return FALSE;
		}

		return ! empty( $metadata['cpp_watermark'] );
	}


	/**
	 * @hooked wp_ajax_cpp-watermark
	 * @since  1.0.0
	 */
	public function handle_ajax_actions() {

		if ( empty( $_REQUEST['status'] ) || empty( $_REQUEST['post_id'] ) ) {
			return;
		}

		$status        = $_REQUEST['status'];
		$attachment_id = intval( $_REQUEST['post_id'] );

		check_ajax_referer( $this->get_nonce_key( $attachment_id ), 'nonce' );

		if ( ! $metadata = wp_get_attachment_metadata( $attachment_id ) ) {
			return FALSE;
		}

		$basedir = $this->upload_base_dir();

		// Apply watermark
		if ( 'add' === $status ) {

			if ( $this->watermark( $basedir . $metadata['file'] ) ) {

				wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $basedir . $metadata['file'] ) );

				wp_send_json_success();
			}
		}

		// Remove watermark
		if ( 'remove' === $status ) {

			if ( empty( $metadata['without_watermark'] ) ) {
				wp_send_json_error();
			}

			$file_system = $this->file_system_instance();

			$file_system->delete( $basedir . $metadata['file'] );

			if ( $file_system->move( $basedir . $metadata['without_watermark'], $basedir . $metadata['file'] ) ) {

				wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $basedir . $metadata['file'] ) );

				wp_send_json_success();
			}
		}


		wp_send_json_error();
	}


	/**
	 * Get security nonce for given post
	 *
	 * @param $post_id the post id
	 *
	 * @since 1.0.0
	 * @return string
	 */
	protected function get_nonce( $post_id ) {

		return wp_create_nonce( $this->get_nonce_key( $post_id ) );
	}


	/**
	 * Get nonce key.
	 *
	 * @param int $post_id
	 *
	 * @since 1.0.0
	 * @return string
	 */
	protected function get_nonce_key( $post_id ) {

		return 'cpp-watermark-' . $post_id;
	}


	/**
	 * @since 1.0.0
	 * @return array
	 */
	protected function upload_base_dir() {

		$basedir = wp_get_upload_dir();
		$basedir = $basedir['basedir'];

		return trailingslashit( $basedir );
	}


	/**
	 * @since 1.0.0
	 * @return string
	 */
	protected function watermark_file() {

		return get_attached_file( cpp_option( 'watermark_file' ), 'full' );
	}


	/**
	 * @param int $attachment_id
	 *
	 * @since 1.0.0
	 */
	public function delete_backup_file( $attachment_id ) {

		$metadata = wp_get_attachment_metadata( $attachment_id );

		if ( empty( $metadata['without_watermark'] ) ) {

			return;
		}

		$basedir = $this->upload_base_dir();

		$this->file_system_instance()->delete( $basedir . $metadata['without_watermark'] );
	}
}
