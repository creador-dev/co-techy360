<?php


/**
 * bs-newsletter-mailchimp.php
 *---------------------------
 * [bs-newsletter-mailchimp] short code & widget
 *
 */
class Publisher_Newsletter_MailChimp_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-newsletter-mailchimp';

		$_options = array(
			'defaults'              => array(
				'mailchimp-code'       => '',
				'msg'                  => publisher_translation_get( 'widget_newsletter_msg' ),
				'image'                => PUBLISHER_THEME_URI . 'images/other/email-illustration.png',
				'show-powered'         => true,
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

		publisher_set_prop( 'shortcode-bs-newsletter-mailchimp-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-newsletter-mailchimp' );

		publisher_clear_props();

		return ob_get_clean();

	}


	/**
	 * Fields of Visual Composer and tinyMCE
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
				'std'       => wp_kses(
					sprintf(
						__( '<p>To integrate MailChimp with your Publisher site, you will need MailChimp signup form code that you can find it with following steps:</p>
<ol>
    <li><a href="%s" target="_blank">Log in</a> to your MailChimp account.</li>
    <li>From your account Dashboard, click <strong>Lists</strong> in the navigation menu.</li>
    <li>Find the list you want to connect to your site, click on it.</li>
    <li>Find the "<strong>Sign up forms</strong>" from the list navigation, click on it.</li>
    <li>Click "<strong>Select</strong>" on the "<strong>Embedded</strong>" forms option.</li>
    <li>Find the "<strong>Copy/paste onto your site</strong>" section.</li>
    <li>Click anywhere in the box to select the code.</li>
    <li>Press "<strong>ctrl + C</strong>" on a PC or "<strong>command + C</strong>" on a Mac to copy the code.</li>
    <li>Paste it in following "<strong>MailChimp Form Code</strong>" field.</li>
</ol>
			                ', 'publisher' )
						,
						'https://goo.gl/MU6UWn'
					), bf_trans_allowed_html()
				),
				'name'      => __( 'Instructions', 'publisher' ),
				'id'        => 'help',
				//
				'type'      => 'bf_info',
				'state'     => 'open',
				'info-type' => 'help',
			),
			array(
				'name'           => __( 'MailChimp Form Code', 'publisher' ),
				'type'           => 'textarea_raw_html',
				'id'             => 'mailchimp-code',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'MailChimp List URL', 'publisher' ),
				'id'             => 'mailchimp-url',
				'type'           => 'textarea',
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
				'type'           => 'bf_media_image',
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
			'name'           => __( 'Newsletter - MailChimp', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-newsletter-mailchimp.png',
		);

	} // page_builder_settings


	function tinymce_settings() {

		return array(
			'name' => __( 'Newsletter - MailChimp', 'publisher' ),
		);
	}
}


class Publisher_Newsletter_MailChimp_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-newsletter-mailchimp',
			sprintf( __( '%s - Newsletter - MailChimp', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'description' => __( 'MailChimp newsletter signup form widget.', 'publisher' )
			)
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		$this->fields = array(
			array(
				'name'      => __( 'Instructions', 'publisher' ),
				'id'        => 'help',
				'type'      => 'info',
				'std'       => wp_kses(
					sprintf(
						__( '<p>To integrate MailChimp with your Publisher site, you will need MailChimp signup form code that you can find it with following steps:</p>
<ol>
    <li><a href="%s" target="_blank">Log in</a> to your MailChimp account.</li>
    <li>From your account Dashboard, click <strong>Lists</strong> in the navigation menu.</li>
    <li>Find the list you want to connect to your site, click on it.</li>
    <li>Find the "<strong>Sign up forms</strong>" from the list navigation, click on it.</li>
    <li>Click "<strong>Select</strong>" on the "<strong>Embedded</strong>" forms option.</li>
    <li>Find the "<strong>Copy/paste onto your site</strong>" section.</li>
    <li>Click anywhere in the box to select the code.</li>
    <li>Press "<strong>ctrl + C</strong>" on a PC or "<strong>command + C</strong>" on a Mac to copy the code.</li>
    <li>Paste it in following "<strong>MailChimp Form Code</strong>" field.</li>
</ol>
			                ', 'publisher' )
						,
						'https://goo.gl/MU6UWn'
					), bf_trans_allowed_html()
				),
				'state'     => 'open',
				'info-type' => 'help',
			),
			array(
				'name' => __( 'Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name'            => __( 'MailChimp Form Code', 'publisher' ),
				'id'              => 'mailchimp-code',
				'type'            => 'textarea',
				'container_class' => 'widget-mailchimp-code-field',
			),
			array(
				'name'            => __( 'MailChimp URL', 'publisher' ),
				'id'              => 'mailchimp-url',
				'type'            => 'text',
				'container_class' => 'widget-mailchimp-url-field',
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
