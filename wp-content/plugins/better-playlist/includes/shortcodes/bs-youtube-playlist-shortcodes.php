<?php

/**
 * Base shortcode class for Youtube playlist
 */
class BS_YouTube_Playlist_Shortcode extends BS_PlayList_Shortcode {

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
	 * Injects service provider to shortcode
	 *
	 * @return \BS_YouTube_PlayList_Service
	 */
	protected function get_service() {
		return new BS_YouTube_PlayList_Service();
	}

} // BS_YouTube_Playlist_1_Shortcode


/**
 * bs-youtube-playlist-1 shortcode
 */
class BS_YouTube_Playlist_1_Shortcode extends BS_YouTube_Playlist_Shortcode {

	public function __construct( $id, $_options ) {
		$this->name                  = __( 'YouTube Playlist 1', 'better-studio' );
		$this->default_atts['style'] = 'style-1';
		parent::__construct( $id, $_options );
	}

} // BS_YouTube_Playlist_1_Shortcode


/**
 * BS Youtube playlist 1 widget
 */
class BS_YouTube_PlayList_1_Widget extends BS_PlayList_Widget {

	public function __construct() {

		$this->widget_name        = __( 'BetterStudio - YouTube Playlist 1', 'better-studio' );
		$this->widget_description = __( 'YouTube Playlist 1', 'better-studio' );
		$this->widget_ID          = 'bs-youtube-playlist-1';

		parent::__construct();
	}

} // BS_YouTube_PlayList_1_Widget class

/**
 * bs-youtube-playlist-1 shortcode
 */
class BS_YouTube_Playlist_2_Shortcode extends BS_YouTube_Playlist_Shortcode {


	public function __construct( $id, $_options ) {
		$this->name                  = __( 'YouTube Playlist 2', 'better-studio' );
		$this->default_atts['style'] = 'style-2';
		parent::__construct( $id, $_options );
	}

} // BS_YouTube_Playlist_2_Shortcode


/**
 * BS Youtube playlist 2 widget
 */
class BS_YouTube_PlayList_2_Widget extends BS_PlayList_Widget {

	public function __construct() {

		$this->widget_name        = __( 'BetterStudio - YouTube Playlist 2', 'better-studio' );
		$this->widget_description = __( 'YouTube Playlist 2', 'better-studio' );
		$this->widget_ID          = 'bs-youtube-playlist-2';

		parent::__construct();
	}

} // BS_YouTube_PlayList_2_Widget class
