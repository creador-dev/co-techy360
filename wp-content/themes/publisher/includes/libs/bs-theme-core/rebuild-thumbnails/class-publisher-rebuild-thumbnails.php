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


/**
 * Publisher Rebuild Thumbnails
 *
 * @package  Publisher Rebuild Thumbnails
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.0.3
 * @access   public
 * @see      http://www.betterstudio.com
 */
class Publisher_Theme_Rebuild_Thumbnails extends BF_Admin_Page {


	/**
	 * Better Rebuild Thumbnails version
	 *
	 * @var string
	 */
	private $version = '1.0.3';


	/**
	 * Initialize Better Rebuild Thumbnails
	 *
	 * @since   1.0.0
	 *
	 * @param   array $args Configuration
	 */
	function __construct( $args = array() ) {

		$args['id']    = 'publisher-theme-rebuild-thumbnails';
		$args['class'] = 'hide-notices';
		$args['slug']  = 'rebuild-thumbnails';

		$args['dir-uri'] = Publisher_Theme_Core()->get_dir_url( 'rebuild-thumbnails/' );

		parent::__construct( $args );

		// Ajax callback for getting all images list in front end
		add_action( 'wp_ajax_BRT_get_thumbnails_list', array( $this, 'callback_get_thumbnails_list' ) );

		// Ajax callback for rebuilding image from front end
		add_action( 'wp_ajax_BRT_rebuild_image', array( $this, 'callback_rebuild_image' ) );
	}


	/**
	 * Callback: Used for registering menu to WordPress
	 *
	 * Action: better-framework/admin-menus/admin-menu/before
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @return  void
	 */
	function add_menu() {

		Better_Framework()->admin_menus()->add_menupage( array(
				'id'         => $this->page_id,
				'slug'       => 'better-studio/' . $this->args['slug'],
				'name'       => __( 'Rebuild Thumbnails', 'publisher' ),
				'parent'     => 'better-studio',
				'page_title' => __( 'Rebuild Thumbnails', 'publisher' ),
				'menu_title' => __( 'Rebuild Thumbnails', 'publisher' ),
				'position'   => 50.02,
				'callback'   => array( $this, 'display' ),
			)
		);

	}


	/**
	 * Used for retrieving Better Rebuild Thumbnails version
	 *
	 * @return string
	 */
	function get_version() {

		return $this->version;

	}


	/**
	 * Page title
	 *
	 * @since   1.0.0
	 *
	 * @return string
	 */
	function get_title() {

		return sprintf( __( '%s Thumbnails Regenerator', 'publisher' ), Publisher_Theme_Core::$config['theme-name'] );
	}


	/**
	 * Page desc in header
	 *
	 * @since   1.0.0
	 *
	 * @return string
	 */
	function get_desc() {

		return '<p>' . __( 'Rebuild all thumbnails at once without script timeouts on your server.', 'publisher' ) . '</p>';
	}


	/**
	 * Page Body
	 *
	 * @since   1.0.0
	 *
	 * @return string
	 */
	function get_body() {

		ob_start();
		?>
		<div class="thumbnails-rebuild-wrapper bf-clearfix">

			<div class="pre-desc">
				<p><?php esc_html_e( 'Hit following button to rebuild all thumbnails', 'publisher' ); ?></p>

				<label>
					<input type="checkbox" id="only_featured" name="only_featured" checked="checked"/>
					<?php esc_html_e( 'Only rebuild featured images', 'publisher' ); ?>
				</label>
			</div>

			<div class="better-rebuild-all-thumbnails bf-button bf-main-button large-2x" id="better-rebuild-thumbnails">
				<span class="text-1"><i
							class="fa fa-refresh"></i> <?php esc_html_e( 'Rebuild All Thumbnails', 'publisher' ) ?></span>
			</div>

			<div class="rebuild-log-container">
				<a class="show-rebuild-log"><?php esc_html_e( 'Show Rebuild Log', 'publisher' ); ?></a>
				<div class="rebuild-log">
					<ol></ol>
				</div>
			</div>
		</div>

		<?php
		return ob_get_clean();
	}


	/**
	 * Callback: Used for enqueue scripts in WP backend
	 *
	 * Action: admin_enqueue_scripts
	 *
	 * @since   1.0.0
	 */
	function admin_enqueue_scripts() {

		parent::admin_enqueue_scripts();

		wp_enqueue_style( 'publisher-rebuild-thumbnails', $this->get_dir_uri() . 'assets/css/better-rebuild-thumbnails.css', array(), $this->get_version() );

		wp_enqueue_script( 'publisher-rebuild-thumbnails', $this->get_dir_uri() . 'assets/js/better-rebuild-thumbnails.js', array(), $this->get_version() );

		wp_localize_script(
			'publisher-rebuild-thumbnails',
			'better_rebuild_thumbnails_loc',
			apply_filters(
				'better-rebuild-thumbnails/localized-items',
				array(
					'ajax_url'              => admin_url( 'admin-ajax.php' ),
					'text_confirm'          => __( "Are you sure do you want rebuild all thumbnails?", 'publisher' ),
					'text_loading'          => '<div class="text-1">' . __( 'Loading...', 'publisher' ) . '</div>',
					'text_loader'           => '<div class="text-1"><i class="fa fa-refresh"></i><span></span></div><div class="loader" style="width:0%;"><div class="text-2"><i class="fa fa-refresh"></i><span></span></div></div>',
					'text_done'             => '<div class="text-1"><i class="fa fa-check"></i> ' . __( 'Done', 'publisher' ) . '</div>',
					'text_rebuilding_state' => __( 'Rebuilding %number% of %all%', 'publisher' ),
					'text_no_image'         => '<i class="fa fa-exclamation"></i>' . __( 'No any image found.', 'publisher' ),
				)
			)
		);

	}


	/**
	 * Ajax Callback: Used to get all images list
	 *
	 * Ajax Action: BRT_get_thumbnails_list
	 *
	 * @since   1.0.0
	 */
	function callback_get_thumbnails_list() {

		// get only featured images list
		$only_featured = isset( $_POST['only_featured'] ) ? $_POST['only_featured'] : false;

		$images = array();

		// Only featured images
		if ( $only_featured ) {

			global $wpdb;

			// todo update this
			$featured_images = $wpdb->get_results( $wpdb->prepare( "
                SELECT meta_value,{$wpdb->posts}.post_title AS title
                FROM {$wpdb->postmeta}, {$wpdb->posts}
                WHERE meta_key = '%s' AND {$wpdb->postmeta}.post_id={$wpdb->posts}.ID
                ORDER BY {$wpdb->posts}.ID DESC
            ", array( '_thumbnail_id' ) ) );

			foreach ( $featured_images as $image ) {
				$images[] = array(
					'id'    => $image->meta_value,
					'title' => $image->title
				);
			}

		} // All images
		else {

			$attachments = get_children( array(
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'posts_per_page' => - 1,
				'post_status'    => NULL,
				'post_parent'    => NULL,
				'output'         => 'object',
			) );

			foreach ( $attachments as $attachment ) {
				$images[] = array(
					'id'    => $attachment->ID,
					'title' => $attachment->post_title
				);
			}
		}

		die( json_encode( $images ) );

	}


	/**
	 * Ajax Callback: Used for rebuild an image sizes
	 *
	 * Ajax Action: BRT_rebuild_image
	 *
	 * @since   1.0.0
	 */
	function callback_rebuild_image() {

		if ( ! isset( $_POST['id'] ) || ! isset( $_POST['title'] ) ) {
			return false;
		}

		$attachment_id = $_POST["id"];

		$attachment_title = $_POST["title"];

		$attachment_url = get_attached_file( $attachment_id );

		$result = array(
			'id'  => $attachment_id,
			'url' => $attachment_url,
		);

		if ( false !== $attachment_url && @file_exists( $attachment_url ) ) {

			@set_time_limit( 30 );

			include_once ABSPATH . 'wp-admin/includes/image.php';

			wp_update_attachment_metadata( $attachment_id, $this->generate_attachment_metadata_custom( $attachment_id, $attachment_url, $this->get_image_sizes() ) );

			$result['status']  = 'success';
			$result['url']     = wp_get_attachment_thumb_url( $attachment_id );
			$result['message'] = '<li class="success"><strong>' . __( 'Completed', 'publisher' ) . '</strong>: <a target="_blank" href="' . wp_get_attachment_url( $attachment_id ) /* escaped before */ . '">' . $attachment_title . '</a></li>';

			if ( $result['url'] ) {

				do_action( 'better-rebuild-thumbnails/thumbnail-regenerated', $attachment_id, $attachment_url );
			}

		} else {
			$result['status']  = 'error';
			$result['message'] = __( 'File not found', 'publisher' );
			$result['message'] = '<li class="error"><strong>' . __( 'File not found', 'publisher' ) . '</strong>: <a target="_blank" href="' . wp_get_attachment_url( $attachment_id ) /* escaped before */ . '">' . $attachment_title . '</a></li>';

		}

		die( json_encode( $result ) );
	}


	/**
	 * Used for finding all image sizes
	 *
	 * @since   1.0.0
	 *
	 * @return array|null
	 */
	function get_image_sizes() {

		global $_wp_additional_image_sizes;

		foreach ( get_intermediate_image_sizes() as $size ) {

			$sizes[ $size ] = array(
				'name'   => '',
				'width'  => '',
				'height' => '',
				'crop'   => false
			);

			$sizes[ $size ]['name'] = $size;

			if ( isset( $_wp_additional_image_sizes[ $size ]['width'] ) ) {
				$sizes[ $size ]['width'] = intval( $_wp_additional_image_sizes[ $size ]['width'] );
			} else {
				$sizes[ $size ]['width'] = get_option( "{$size}_size_w" );
			}

			if ( isset( $_wp_additional_image_sizes[ $size ]['height'] ) ) {
				$sizes[ $size ]['height'] = intval( $_wp_additional_image_sizes[ $size ]['height'] );
			} else {
				$sizes[ $size ]['height'] = get_option( "{$size}_size_h" );
			}

			if ( isset( $_wp_additional_image_sizes[ $size ]['crop'] ) ) {
				$sizes[ $size ]['crop'] = intval( $_wp_additional_image_sizes[ $size ]['crop'] );
			} else {
				$sizes[ $size ]['crop'] = get_option( "{$size}_crop" );
			}
		}

		return apply_filters( 'better-rebuild-thumbnails/intermediate-image-sizes-advanced', $sizes );
	}


	/**
	 * Generate post thumbnail attachment meta data.
	 *
	 * @since 1.0.0
	 *
	 * @param   int    $attachment_id Attachment ID
	 * @param   string $file          File path of the attached image.
	 * @param   null   $thumbnails    List of image sizes
	 *
	 * @return  mixed   Metadata for attachment.
	 */
	function generate_attachment_metadata_custom( $attachment_id, $file, $thumbnails = NULL ) {

		$attachment = get_post( $attachment_id );

		$metadata = array();

		if ( preg_match( '!^image/!', get_post_mime_type( $attachment ) ) && file_is_displayable_image( $file ) ) {

			$imagesize = getimagesize( $file );

			$metadata['width'] = $imagesize[0];

			$metadata['height'] = $imagesize[1];

			list( $uwidth, $uheight ) = wp_constrain_dimensions( $metadata['width'], $metadata['height'], 128, 96 );

			$metadata['hwstring_small'] = "height='$uheight' width='$uwidth'";

			// Make the file path relative to the upload dir
			$metadata['file'] = _wp_relative_upload_path( $file );

			$sizes = $this->get_image_sizes();

			foreach ( $sizes as $size => $size_data ) {

				$intermediate_size = image_make_intermediate_size( $file, $size_data['width'], $size_data['height'], $size_data['crop'] );

				if ( $intermediate_size ) {
					$metadata['sizes'][ $size ] = $intermediate_size;
				}
			}

			// fetch additional metadata from exif/iptc
			$image_meta = wp_read_image_metadata( $file );
			if ( $image_meta ) {
				$metadata['image_meta'] = $image_meta;
			}

		}

		return apply_filters( 'wp_generate_attachment_metadata', $metadata, $attachment_id );
	}

}
