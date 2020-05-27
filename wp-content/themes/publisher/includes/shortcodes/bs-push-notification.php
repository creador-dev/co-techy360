<?php


/**
 * Push Notification Shortcode Class
 *
 * @since 5.0.0
 */
class Publisher_Push_Notification_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-push-notification';

		$_options = array(
			'defaults'              => array(
				'style'                => 't1-s1',
				'location'             => '',
				//
				'title'                => publisher_translation_get( 'widget_push_notification' ),
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
			'have_tinymce_add_on'   => false,
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

		if ( preg_match( '/^t(\d+)-s(\d+)/', $atts['style'], $m ) ) {
			$atts['style-class'] = "bspn-t{$m[1]} bspn-s{$m[2]}";
		} else {
			$atts['style-class'] = "bspn-t1 bspn-s1";
		}

		publisher_set_prop( 'shortcode-bs-push-notification-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-push-notification-' . $atts['style'] );

		publisher_clear_props();

		return ob_get_clean();

	}


	/**
	 * The shortcode fields
	 *
	 * @return array
	 */
	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Style', 'publisher' ),
				'id'   => 'style_tab',
			),
			array(
				'name'             => __( 'Notification Style', 'publisher' ),
				'desc'             => __( 'Select push notification box style.', 'publisher' ),
				'id'               => 'style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_widget_notification_styles_list',
					'args'     => array(
						false
					),
				),
				'column_class'     => 'two-column',
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
			'name'           => __( 'Push Notification', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-push-notification.png',
			"category"       => publisher_white_label_get_option( 'publisher' ),
		);

	} // page_builder_settings
}


/**
 * Push Notification Widget Class
 *
 * @since 5.0.0
 */
class Publisher_Push_Notification_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-push-notification',
			sprintf( __( '%s - Push Notification', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'description' => __( 'OneSignal push notification widget.', 'publisher' )
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
				'name'             => __( 'Notification Style', 'publisher' ),
				'desc'             => __( 'Select push notification box style.', 'publisher' ),
				'id'               => 'style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_widget_notification_styles_list',
					'args'     => array(
						false
					),
				),
				'column_class'     => 'two-column',
			)
		);
	}
}
