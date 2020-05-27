<?php


/**
 * bs-newsletter-feedburner.php
 *---------------------------
 * [bs-subscribe-newsletter] short code & widget
 *
 */
class Publisher_Subscribe_Newsletter_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-subscribe-newsletter';

		$_options = array(
			'defaults'              => array(
				'feedburner-id'        => '',
				'msg'                  => publisher_translation_get( 'widget_newsletter_msg' ),
				'image'                => PUBLISHER_THEME_URI . 'images/other/email-illustration.png',
				'show-powered'         => true,
				//
				//
				'title'                => publisher_translation_get( 'widget_newsletter' ),
				'show_title'           => 1,
				'icon'                 => '',
				'heading_style'        => 'default',
				'heading_color'        => '',
				//
				'bs-show-desktop'      => 1,
				'bs-show-tablet'       => 1,
				'bs-show-phone'        => 1,
				'css'                  => '',
				'custom-css-class'     => '',
				'custom-id'            => '',
				//
				'bs-text-color-scheme' => '',
			),
			'have_widget'           => true,
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
	 * Handle displaying of shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {

		ob_start();

		publisher_set_prop( 'shortcode-bs-newsletter-feedburner-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-newsletter-feedburner' );

		publisher_clear_props();

		return ob_get_clean();

	}


	/**
	 * Fields of Visual Composer & TinyMCE
	 *
	 * @return array
	 */
	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Newsletter', 'publisher' ),
				'id'   => 'newsletter',
			),
			array(
				'name'           => __( 'Feedburner ID', 'publisher' ),
				'id'             => 'feedburner-id',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Image', 'publisher' ),
				'id'             => 'image',
				//
				'media_button'   => __( 'Select as Image', 'publisher' ),
				'upload_label'   => __( 'Upload Image', 'publisher' ),
				'remove_label'   => __( 'Remove', 'publisher' ),
				'media_title'    => __( 'Remove', 'publisher' ),
				'type'           => 'media_image',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Message', 'publisher' ),
				'type'           => 'textarea',
				'id'             => 'msg',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show Powered By?', 'publisher' ),
				'id'             => 'show-powered',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
		);

		/**
		 * Retrieve heading fields from outside (our themes are defining them)
		 */
		{
			$heading_fields = apply_filters( 'better-framework/shortcodes/heading-fields', array(), $this->id );

			if ( $heading_fields ) {
				$fields = array_merge( $fields, $heading_fields );
			}
		}


		/**
		 * Retrieve design fields from outside (our themes are defining them)
		 */
		{
			$design_fields = apply_filters( 'better-framework/shortcodes/design-fields', array(), $this->id );

			if ( $design_fields ) {
				$fields = array_merge( $fields, $design_fields );
			}
		}

		bf_array_insert_after(
			'bs-show-phone',
			$fields,
			'bs-text-color-scheme',
			array(
				'name'           => __( 'Block Text Color Scheme', 'publisher' ),
				'id'             => 'bs-text-color-scheme',
				//
				'type'           => 'select',
				'options'        => array(
					''      => __( '-- Default --', 'publisher' ),
					'light' => __( 'White Color Texts', 'publisher' ),
				),
				//
				'vc_admin_label' => false,
			)
		);

		return $fields;
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Newsletter - FeedBurner', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-subscribe-newsletter.png',
		);

	} // page_builder_settings


	function tinymce_settings() {

		return array(
			'name' => __( 'Newsletter - FeedBurner', 'publisher' ),
		);
	}
}


class Publisher_Subscribe_Newsletter_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-subscribe-newsletter',
			sprintf( __( '%s - Newsletter - FeedBurner', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'description' => __( 'Widget display NewsLetter Subscribe form it support Feedburner.', 'publisher' )
			)
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		$this->fields = array(
			array(
				'name' => __( 'Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name'       => __( 'FeedBurner ID', 'publisher' ),
				'input-desc' => __( 'Enter Feedburner ID.', 'publisher' ),
				'id'         => 'feedburner-id',
				'type'       => 'text',
			),
			array(
				'name'         => __( 'Image', 'publisher' ),
				'id'           => 'image',
				'type'         => 'media_image',
				'upload_label' => __( 'Upload Image', 'publisher' ),
				'remove_label' => __( 'Remove', 'publisher' ),
				'media_title'  => __( 'Remove', 'publisher' ),
				'media_button' => __( 'Select Image', 'publisher' ),
			),
			array(
				'name' => __( 'Message', 'publisher' ),
				'id'   => 'msg',
				'type' => 'textarea',
			),
			array(
				'name' => __( 'Show Powered By?', 'publisher' ),
				'id'   => 'show-powered',
				'type' => 'switch',
			),
		);
	}
}
