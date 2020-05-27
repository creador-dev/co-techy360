<?php


/**
 * Paste a watermark on image.
 *
 * @package    content-protector-pack/watermark/gd
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2018, BetterStudio
 *
 * @since      1.0.0
 */
class CPP_Image_Watermark_GD extends CPP_Image_Watermark_Handler {

	/**
	 * Store An image resource.
	 *
	 * @var resource
	 *
	 * @since 1.0.0
	 */
	protected $image;


	/**
	 * Store watermark resource.
	 *
	 * @var resource
	 *
	 * @since 1.0.0
	 */
	protected $watermark;


	/**
	 * Store main image mime type. EX: image/gif
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $image_mime_type;

	/**
	 * Store main image mime type. EX: image/gif
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $watermark_mime_type;


	/**
	 * Checks to see if dg extension is loaded.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public static function test() {

		return extension_loaded( 'gd' ) && function_exists( 'imagecreatefromstring' );
	}


	/**
	 * Set the main image.
	 *
	 * @param string $path absolute path to the image.
	 *
	 * @return bool|WP_Error true on success.
	 */
	public function load_image( $path ) {

		if ( ! file_exists( $path ) ) {
			return new WP_Error( 'image_not_found', __( 'Image file not exists.', 'content-protector-pack' ) );
		}

		$this->image = @imagecreatefromstring( file_get_contents( $path ) );

		if ( ! is_resource( $this->image ) ) {
			return new WP_Error( 'invalid_image_source', __( 'Cannot read image.', 'content-protector-pack' ) );
		}

		$this->image_mime_type = $this->get_mime_type( $this->get_extension( $path ) );

		if ( 'image/png' === $this->image_mime_type ) {

			$this->fix_colors( $this->image );

		} elseif ( 'image/gif' === $this->image_mime_type && $this->is_animated_gif( $path ) ) {

			return new WP_Error( 'gif_handle_error', __( 'Animated gif currently is not supported.', 'content-protector-pack' ) );
		}

		if ( empty( $this->destination_file ) ) {
			$this->destination_file = $path;
		}

		return TRUE;
	}


	/**
	 * Set the watermark image.
	 *
	 * @param string $path absolute path to the image.
	 *
	 * @return bool|WP_Error true on success.
	 */
	public function load_watermark( $path ) {

		if ( ! file_exists( $path ) ) {
			return new WP_Error( 'watermark_not_found', __( 'Watermark file not exists.', 'content-protector-pack' ) );
		}

		$this->watermark = @imagecreatefromstring( file_get_contents( $path ) );

		if ( ! is_resource( $this->watermark ) ) {
			return new WP_Error( 'invalid_watermark_source', __( 'Cannot read watermark.', 'content-protector-pack' ) );
		}

		$this->watermark_mime_type = $this->get_mime_type( $this->get_extension( $path ) );

		if ( 'image/png' === $this->watermark_mime_type ) {

			$this->fix_colors( $this->watermark );
		}

		return TRUE;
	}


	/**
	 * Start action and add the watermark to the main image.
	 *
	 * @return bool|WP_Error WP_Error|false on failure or true on success.
	 */
	public function apply() {

		if ( ! $this->image || ! $this->watermark ) {
			return FALSE;
		}

		$image_width      = imagesx( $this->image );
		$image_height     = imagesy( $this->image );
		$watermark_width  = imagesx( $this->watermark );
		$watermark_height = imagesy( $this->watermark );

		if ( $image_height < $watermark_height || $image_width < $watermark_width ) {
			// resize the watermark
			if ( function_exists( 'imagescale' ) ) {

				imagescale( $this->watermark, $image_width, $image_height );
			}
			// get new size
			$watermark_width  = imagesx( $this->watermark );
			$watermark_height = imagesy( $this->watermark );
		}


		if ( 'image/png' === $this->image_mime_type || 'image/png' === $this->watermark_mime_type ) {

			$result = $this->imagecopymerge_alpha( $image_width, $image_height, $watermark_width, $watermark_height );

		} else {

			$position = $this->calculate_location( $image_width, $image_height, $watermark_width, $watermark_height );
			$result   = imagecopymerge( $this->image, $this->watermark, $position[0], $position[1], 0, 0, $watermark_width, $watermark_height, $this->watermark_opacity );
		}

		if ( ! $result ) {
			return new WP_Error( 'paste_error', __( 'Cannot paste watermark on the image.', 'content-protector-pack' ) );
		}

		return $this->save();
	}


	/**
	 * Save final image.
	 *
	 * @since 1.0.0
	 * @return bool|WP_Error true on success or false|WP_Error on error.
	 */
	protected function save() {

		ob_start();

		switch ( $this->image_mime_type ) {

			case 'image/gif':

				imagegif( $this->image );

				break;

			case 'image/png':

				imagepng( $this->image );

				break;

			case 'image/jpeg':

				imagejpeg( $this->image );

				break;
		}

		$contents = ob_get_clean();

		if ( empty( $contents ) ) {

			return new WP_Error( 'pre_save_error', __( 'Cannot process the image.', 'content-protector-pack' ) );
		}

		if ( ! $fp = fopen( $this->destination_file, 'w' ) ) {

			return new WP_Error( 'save_error', __( 'Cannot save image.', 'content-protector-pack' ) );
		}

		if ( ! fwrite( $fp, $contents ) ) {

			return new WP_Error( 'save_error', __( 'Cannot save image.', 'content-protector-pack' ) );
		}

		fclose( $fp );

		return TRUE;

	}


	/**
	 * Convert from full colors to index colors, like original PNG.
	 *
	 * @param resource $image_resource
	 *
	 * @since 1.0.0
	 * @return bool true on success.
	 */
	protected function fix_colors( $image_resource ) {

		if ( function_exists( 'imageistruecolor' ) && ! imageistruecolor( $image_resource ) ) {
			return imagetruecolortopalette( $image_resource, FALSE, imagecolorstotal( $image_resource ) );
		}

		return TRUE;
	}


	/**
	 *
	 * @param int $image_width
	 * @param int $image_height
	 * @param int $watermark_width
	 * @param int $watermark_height
	 *
	 * @since 1.0.0
	 * @return bool true on success or false on failure.
	 */
	protected function imagecopymerge_alpha( $image_width, $image_height, $watermark_width, $watermark_height ) {

		$position = $this->calculate_location( $image_width, $image_height, $watermark_width, $watermark_height );

		// create a cut resource
		$cut = imagecreatetruecolor( $image_width, $image_height );

		imagecopy( $cut, $this->image, 0, 0, 0, 0, $image_width, $image_height );

		imagecopy( $cut, $this->watermark, $position[0], $position[1], 0, 0, $watermark_width, $watermark_height );

		$this->image = $cut;

		return TRUE;
	}


	/**
	 * Detect is given image animated.
	 *
	 * @param string $file_path
	 *
	 * @author ZeBadger <https://secure.php.net/manual/en/function.imagecreatefromgif.php#Hcom59787>
	 *
	 * @since  1.0.0
	 * @return bool
	 */
	protected function is_animated_gif( $file_path ) {

		$file_contents = file_get_contents( $file_path );
		$str_loc       = $count = 0;

		while( $count < 2 ) { # There is no point in continuing after we find a 2nd frame

			$where1 = strpos( $file_contents, "\x00\x21\xF9\x04", $str_loc );

			if ( $where1 === FALSE ) {

				break;
			}

			$str_loc = $where1 + 1;
			$where2  = strpos( $file_contents, "\x00\x2C", $str_loc );

			if ( $where2 === FALSE ) {
				break;
			}

			if ( $where1 + 8 == $where2 ) {
				$count ++;
			}

			$str_loc = $where2 + 1;
		}

		if ( $count > 1 ) {

			return TRUE;
		}

		return FALSE;
	}


	/**
	 * Destroy images resources.
	 *
	 * @since 1.0.0
	 */
	public function __destruct() {

		if ( $this->watermark ) {
			imagedestroy( $this->watermark );
		}

		if ( $this->image ) {
			imagedestroy( $this->image );
		}
	}
}