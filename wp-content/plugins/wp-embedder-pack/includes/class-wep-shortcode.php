<?php
/**
 * themename-login-shortcode.php
 *---------------------------
 * [bs-login] shortcode & widget
 *
 */


/**
 * Shortcode handler
 */
class WEP_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'wp-embedder-pack';

		$_options = array(
			'defaults'              => array(
				'title'                => __( 'Embedded Document', 'better-studio' ),
				'width'                => '100%',
				'height'               => '400px',
				'show_title'           => 1,
				'heading_color'        => '',
				'heading_style'        => 'default',
				'bs-show-desktop'      => true,
				'bs-show-tablet'       => true,
				'bs-show-phone'        => true,
				'bs-text-color-scheme' => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		if ( isset( $options['widget_class'] ) ) {
			$_options['widget_class'] = $options['widget_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Filter custom css codes for shortcode widget!
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function register_custom_css( $fields ) {

		return $fields;
	}


	/**
	 * Handle displaying of shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {


		$atts = bf_merge_args( $atts, array(
			'download-text' => '',
			'title'         => __( 'Embedded Document', 'better-studio' ),
			'width'         => '100%',
			'height'        => '400px',
			'url'           => false,
			'download'      => 'all',
			'attachment_id' => 0,
		) );


		if ( empty( $atts['width'] ) ) {
			$atts['width'] = '100%';
		}

		if ( empty( $atts['height'] ) ) {
			$atts['height'] = '400px';
		}

		if ( ! empty( $atts['attachment_id'] ) ) {
			$atts['url'] = wp_get_attachment_url( $atts['attachment_id'] );
		}

		if ( empty( $atts['url'] ) ) {
			return '';
		}

		if ( empty( $atts['download-text'] ) ) {
			$atts['download-text'] = bew_translation_get( 'download' );
		}

		$downloadable = true;
		$before       = $after = '';

		if ( preg_match( '#^(?: https?:)?// (?: w{3}.)? (?: drive|docs|photos ).google.com (.*?)/*$#ix', $atts['url'] ) ) {

			$downloadable = false;
			//
			$iframe = sprintf( '<iframe src="%s" title="%s" width="%s" height="%s"></iframe>', $atts['url'], $atts['title'], $atts['width'], $atts['height'] );

		} else {

			$locale = preg_replace( '/(?:\-|_).+$/', '', get_locale() );
			$iframe = sprintf( '<iframe src="//docs.google.com/viewer?url=%s&amp;embedded=true&amp;hl=%s" title="%s" width="%s" height="%s"></iframe>', urlencode( $atts['url'] ), $locale, $atts['title'], $atts['width'], $atts['height'] );
		}

		$before .= '<div class="wep-preview">';

		if ( $downloadable && ! empty( $atts['download-text'] ) ) {

			if ( 'all' === $atts['download'] || ( 'logged-in' === $atts['download'] && is_user_logged_in() ) ) {
				$after .= '<div class="wep-download-document">';
				$after .= sprintf( '<a href="%s" target="_blank">%s</a>', $atts['url'], $atts['download-text'] );
				$after .= '</div>';
			}
		}
		$after .= '</div>';

		return $before . $iframe . $after;
	}


	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'General', 'wp-embedder-pack' ),
				'id'   => 'heading',
			),
			array(
				'name'         => __( 'Upload Document', 'wp-embedder-pack' ),
				'id'           => 'url',
				'type'         => 'media_image',
				'show_input'   => true,
				'hide_preview' => true,
			),
			array(
				'name' => __( 'Width', 'wp-embedder-pack' ),
				'id'   => 'width',
				'type' => 'text',
			),
			array(
				'name' => __( 'Height', 'wp-embedder-pack' ),
				'id'   => 'height',
				'type' => 'text',
			),
			array(
				'placeholder' => bew_translation_get( 'download' ),
				'name'        => __( 'Download link label', 'wp-embedder-pack' ),
				'id'          => 'download-text',
				'type'        => 'text',
			),
			array(
				'name'    => __( 'Show download link to', 'wp-embedder-pack' ),
				'id'      => 'download',
				'type'    => 'select',
				'options' => array(
					'all'       => __( 'All users', 'wp-embedder-pack' ),
					'logged-in' => __( 'Logged in', 'wp-embedder-pack' ),
					'off'       => __( 'Hide', 'wp-embedder-pack' ),
				)
			),
		);
	}


	/**
	 * Registers Visual Composer Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'WP Embedder Pack', 'better-studio' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => __( 'BetterStudio', 'better-studio' ),
		);

	} // page_builder_settings

}
