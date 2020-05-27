<?php

/**
 * Base shortcode class for Vimeo album
 */
class BS_Vimeo_Album_Shortcode extends BS_PlayList_Shortcode {

	/**
	 * Decode Videos List Encoded by Visual Composer
	 *
	 * @param array $atts
	 */
	protected function sanitize_atts( &$atts ) {
		if ( ! Better_Framework::widget_manager()->get_current_sidebar() ) {
			if ( ! empty( $atts['videos'] ) ) {
				$atts['videos'] = htmlentities( rawurldecode( base64_decode( $atts['videos'] ) ), ENT_COMPAT, 'UTF-8' );
			}
		}
	}


	/**
	 * Injects Vimeo service provider
	 *
	 * @return \BS_Vimeo_PlayList_Service
	 */
	protected function get_service() {
		return new BS_Vimeo_PlayList_Service();
	}


	/**
	 * Customize labels for Vimeo
	 * @return array
	 */
	public function get_labels() {
		return array(
			'type=playlist'       => __( 'Vimeo Album', 'better-studio' ),
			'playlist_title'      => __( 'Album Title', 'better-studio' ),
			'show_playlist_title' => __( 'Show Album Title?', 'better-studio' ),
			'playlist_url'        => __( 'Album URL', 'better-studio' ),
			'videos'              => __( 'Custom Video Links', 'better-studio' ),
		);
	}

} // BS_Vimeo_Playlist_1_Shortcode


/**
 * bs-vimeo-album-1 shortcode
 */
class BS_Vimeo_Album_1_Shortcode extends BS_Vimeo_Album_Shortcode {

	public function __construct( $id, $options ) {

		$this->name                  = __( 'Vimeo Album 1', 'better-studio' );
		$this->default_atts['style'] = 'style-1';
		parent::__construct( $id, $options );
	}

} // BS_Vimeo_Playlist_1_Shortcode


/**
 * BS Vimeo Album 1
 */
class BS_Vimeo_Album_1_Widget extends BS_PlayList_Widget {

	public function __construct() {
		$this->widget_name        = __( 'BetterStudio - Vimeo Album 1', 'better-studio' );
		$this->widget_description = __( 'Vimeo Album 1', 'better-studio' );
		$this->widget_ID          = 'bs-vimeo-album-1';

		parent::__construct();
	}


	/**
	 * Customize labels for Vimeo widget
	 *
	 * @return array
	 */
	public function get_labels() {
		return array(
			'type=playlist'       => __( 'Vimeo Album', 'better-studio' ),
			'playlist_title'      => __( 'Album Title', 'better-studio' ),
			'show_playlist_title' => __( 'Show Album Title?', 'better-studio' ),
			'playlist_url'        => __( 'Album URL', 'better-studio' ),
			'videos'              => __( 'Custom Video Links', 'better-studio' ),
		);
	}

} // BS_Vimeo_PlayList_1_Widget


/**
 * bs-vimeo-album-2 shortcode
 */
class BS_Vimeo_Album_2_Shortcode extends BS_Vimeo_Album_Shortcode {

	public function __construct( $id, $options ) {

		$this->name                  = __( 'Vimeo Album 2', 'better-studio' );
		$this->default_atts['style'] = 'style-2';
		parent::__construct( $id, $options );
	}

} // BS_Vimeo_Playlist_2_Shortcode


/**
 * BS Vimeo Album 2
 */
class BS_Vimeo_Album_2_Widget extends BS_PlayList_Widget {

	public function __construct() {
		$this->widget_name        = __( 'BetterStudio - Vimeo Album 2', 'better-studio' );
		$this->widget_description = __( 'Vimeo Album 2', 'better-studio' );
		$this->widget_ID          = 'bs-vimeo-album-2';

		parent::__construct();
	}

	/**
	 * Customize labels for Vimeo widget
	 *
	 * @return array
	 */
	public function get_labels() {
		return array(
			'type=playlist'       => __( 'Vimeo Album', 'better-studio' ),
			'playlist_title'      => __( 'Album Title', 'better-studio' ),
			'show_playlist_title' => __( 'Show Album Title?', 'better-studio' ),
			'playlist_url'        => __( 'Album URL', 'better-studio' ),
			'videos'              => __( 'Custom Video Links', 'better-studio' ),
		);
	}

} // BS_Vimeo_Album_2_Widget
