<?php


/**
 * Base class for watermark handler classes.
 *
 * @package    content-protector-pack/watermark/base
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2018, BetterStudio
 *
 * @since      1.0.0
 */
abstract class CPP_Image_Watermark_Handler {

	/**
	 * Location of the watermark image.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $watermark_position = 'top-left';

	/**
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $destination_file;


	/**
	 * Checks to see if current environment meet requirements.
	 *
	 * @return bool
	 */
	abstract public static function test();


	/**
	 * Set the main image.
	 *
	 * @param string $path absolute path to the image.
	 *
	 * @return bool|WP_Error true on success.
	 */
	abstract public function load_image( $path );


	/**
	 * Set the watermark image.
	 *
	 * @param string $path absolute path to the image.
	 *
	 * @return bool|WP_Error true on success.
	 */
	abstract public function load_watermark( $path );


	/**
	 * Start action and add the watermark to the main image.
	 *
	 * @return bool|WP_Error WP_Error|false on failure or true on success.
	 */
	abstract public function apply();


	/**
	 * Initialize
	 *
	 * @param array $settings           array{
	 *
	 * @type string $image              absolute path to the image.
	 * @type string $watermark          absolute path to the watermark.
	 * @type string $watermark_position watermark x,y position.
	 *                         each top, center and bottom are allowed for x,y. default:top-left
	 * }
	 */
	public function __construct( array $settings = array() ) {

		if ( isset( $settings['image'] ) ) {
			$this->load_image( $settings['image'] );
		}

		if ( isset( $settings['watermark'] ) ) {
			$this->load_watermark( $settings['watermark'] );
		}

		if ( isset( $settings['watermark_position'] ) ) {
			$this->watermark_position = $settings['watermark_position'];
		}

		if ( isset( $settings['destination_file'] ) ) {
			$this->destination_file = $settings['destination_file'];
		}
	}


	/**
	 * Set destination file path.
	 *
	 * @param string $file
	 *
	 * @since 1.0.0
	 */
	public function destination_file( $file ) {

		$this->destination_file = $file;
	}


	/**
	 * Returns first matched mime-type from extension,
	 * as mapped from wp_get_mime_types()
	 *
	 * @since  3.5.0
	 *
	 * @static
	 * @access protected
	 *
	 * @param string $extension
	 *
	 * @return string|false
	 */
	protected static function get_mime_type( $extension = NULL ) {

		if ( ! $extension ) {
			return FALSE;
		}

		$mime_types = wp_get_mime_types();
		$extensions = array_keys( $mime_types );

		foreach ( $extensions as $_extension ) {
			if ( preg_match( "/{$extension}/i", $_extension ) ) {
				return $mime_types[ $_extension ];
			}
		}

		return FALSE;
	}


	/**
	 * Get file extension.
	 *
	 * @param string $file
	 *
	 * @since 1.0.0
	 * @return string
	 */
	protected static function get_extension( $file ) {

		return strtolower( pathinfo( $file, PATHINFO_EXTENSION ) );
	}


	/**
	 * Calculate watermark location x,y.
	 *
	 * @param int $image_width
	 * @param int $image_height
	 * @param int $watermark_width
	 * @param int $watermark_height
	 *
	 * @since 1.0.0
	 * @return array [x position, y position]
	 */
	protected function calculate_location( $image_width, $image_height, $watermark_width, $watermark_height ) {

		$y_position = $x_position = 0;

		if ( ! strstr( $this->watermark_position, '-' ) ) {
			return array( $x_position, $y_position );
		}

		list( $y_position_name, $x_position_name ) = explode( '-', $this->watermark_position, 2 );

		if ( 'bottom' === $y_position_name ) {

			$y_position = $image_height - $watermark_height;

		} elseif ( 'center' === $y_position_name ) {

			$y_position = ( $image_height - $watermark_height ) / 2;;

		}
		if ( 'right' === $x_position_name ) {

			$x_position = $image_width - $watermark_width;

		} elseif ( 'center' === $x_position_name ) {

			$x_position = ( $image_width - $watermark_width ) / 2;

		}

		return array( $x_position, $y_position );
	}
}
