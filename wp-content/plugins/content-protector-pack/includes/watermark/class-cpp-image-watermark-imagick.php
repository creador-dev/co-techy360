<?php


/**
 * Paste a watermark on image.
 *
 * @package    content-protector-pack/watermark/Imagick
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2018, BetterStudio
 *
 * @since      1.0.0
 */
class CPP_Image_Watermark_Imagick extends CPP_Image_Watermark_Handler {

	/**
	 * Store instance of Imagick for image.
	 *
	 * @var Imagick
	 *
	 * @since 1.0.0
	 */
	protected $image;


	/**
	 * Store instance of Imagick for watermark.
	 *
	 * @var Imagick
	 *
	 * @since 1.0.0
	 */
	protected $watermark;


	/**
	 * Checks to see if current environment supports imagick.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public static function test() {

		return extension_loaded( 'imagick' ) && class_exists( 'Imagick', FALSE );
	}


	/**
	 * Set the main image.
	 *
	 * @param string $path absolute path to the image.
	 *
	 * @since 1.0.0
	 * @return bool|WP_Error true on success.
	 */
	public function load_image( $path ) {

		if ( ! file_exists( $path ) ) {
			return new WP_Error( 'image_not_found', __( 'Image file not exists.', 'content-protector-pack' ) );
		}

		$image = new Imagick();

		if ( ! $image->readImage( $path ) ) {

			return new WP_Error( 'invalid_image_source', __( 'Cannot read image.', 'content-protector-pack' ) );
		}

		if ( $image->getIteratorIndex() > 0 ) { # Is animated image?

			return new WP_Error( 'animated_image_ignore', __( 'Currently  animated image is not supported.', 'content-protector-pack' ) );

			//			if ( ! method_exists( 'Imagick', 'setIteratorIndex' ) ) {
			//
			//				return new WP_Error( 'gif_handle_error', __( 'Animated gif currently is not supported.', 'content-protector-pack' ) );
			//			}
			//
			//			$image->setIteratorIndex( 0 );
		}

		$this->image = $image;

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
	 * @since 1.0.0
	 * @return bool|WP_Error true on success.
	 */
	public function load_watermark( $path ) {

		if ( ! file_exists( $path ) ) {
			return new WP_Error( 'watermark_not_found', __( 'Watermark file not exists.', 'content-protector-pack' ) );
		}

		$watermark = new Imagick();

		if ( ! $watermark->readImage( $path ) ) {

			return new WP_Error( 'invalid_watermark_source', __( 'Cannot read watermark.', 'content-protector-pack' ) );
		}


		$this->watermark = $watermark;

		return TRUE;
	}


	/**
	 * Start action and add the watermark to the main image.
	 *
	 * @since 1.0.0
	 * @return bool|WP_Error WP_Error|false on failure or true on success.
	 */
	public function apply() {

		if ( ! $this->image || ! $this->watermark ) {
			return FALSE;
		}

		$image_width      = $this->image->getImageWidth();
		$image_height     = $this->image->getImageHeight();
		$watermark_width  = $this->watermark->getImageWidth();
		$watermark_height = $this->watermark->getImageHeight();

		if ( $image_width < $watermark_width || $image_height < $watermark_height ) {

			return new WP_Error( 'small_image_ignore', __( 'Watermark is greater than the image.', 'content-protector-pack' ) );
		}

		if ( $image_height < $watermark_height || $image_width < $watermark_width ) {
			// resize the watermark
			$this->watermark->scaleImage( $image_width, $image_height );

			// get new size
			$watermark_width  = $this->watermark->getImageWidth();
			$watermark_height = $this->watermark->getImageHeight();
		}

		$position = $this->calculate_location( $image_width, $image_height, $watermark_width, $watermark_height );

		$this->image->compositeImage( $this->watermark, imagick::COMPOSITE_OVER, $position[0], $position[1] );

		return $this->image->writeImage( $this->destination_file );
	}
}
