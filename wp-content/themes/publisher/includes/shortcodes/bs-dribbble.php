<?php
/**
 * bs-dribbble.php
 *---------------------------
 * [bs-dribbble] shortcode & widget
 *
 */


/**
 * Publisher Dribbble Shortcode
 */
class Publisher_Dribbble_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-dribbble';

		$_options = array(
			'defaults'              => array(
				'user_id'              => '',
				'access_token'         => '',
				'photo_count'          => 6,
				'style'                => 3,
				//
				'title'                => publisher_translation_get( 'widget_dribbble_shots' ),
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

		ob_start();

		publisher_set_prop( 'shortcode-bs-dribbble-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-dribbble' );

		publisher_clear_props();

		return ob_get_clean();

	}


	/**
	 * Fields of VC and tinyMCE
	 */
	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Dribbble', 'publisher' ),
				'id'   => 'dribbble',
			),
			array(
				'name'           => __( 'Dribbble ID', 'publisher' ),
				'id'             => 'user_id',
				'type'           => 'text',
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'Access Token', 'publisher' ),
				'id'             => 'access_token',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Number of Shots', 'publisher' ),
				'id'             => 'photo_count',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Columns', 'publisher' ),
				'id'             => 'style',
				//
				'type'           => 'select',
				'options'        => array(
					2        => __( '2 Column', 'publisher' ),
					3        => __( '3 Column', 'publisher' ),
					'slider' => __( 'Slider', 'publisher' ),
				),
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
			'name'           => __( 'Dribbble Shots', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-dribbble.png',
		);
	}


	function tinymce_settings() {

		return array(
			'name' => __( 'Dribbble Shots', 'publisher' ),
			/*
						'scripts' => array(
							array(
								'type'    => 'registered',
								'handles' => array( 'theme-libs' )
							),
						),
			*/
		);
	}

}


if ( ! function_exists( 'publisher_shortcode_dribbble_get_data' ) ) {

	/**
	 * Wrapper ro getting Dribbble data with cache mechanism
	 *
	 * @param $atts
	 *
	 * @return array|bool|mixed|void
	 */
	function publisher_shortcode_dribbble_get_data( $atts ) {

		$data_store = 'bs-drb-' . $atts['user_id'];
		$back_store = 'bs-drb-bk-' . $atts['user_id'];

		if ( ( $data = get_transient( $data_store ) ) === false ) {

			$data = publisher_shortcode_dribbble_fetch_data( $atts );

			if ( $data ) {

				$cache_time = HOUR_IN_SECONDS * 6;

				// save a transient to expire in $cache_time and a permanent backup option ( fallback )
				set_transient( $data_store, $data, $cache_time );
				update_option( $back_store, $data, 'no' );

			} // fallback to permanent backup store
			else {
				$data = get_option( $back_store );
			}
		}

		return $data;
	}
}


if ( ! function_exists( 'publisher_shortcode_dribbble_fetch_data' ) ) {
	/**
	 * Retrieve Dribbble fresh data
	 *
	 * @param $atts
	 *
	 * @return array|bool
	 */
	function publisher_shortcode_dribbble_fetch_data( $atts ) {

		if ( ! class_exists( 'Publisher_Dribbble_Client_v1' ) ) {
			require_once bf_get_theme_dir( 'includes/libs/bs-theme-api/class-publisher-dribbble-api.php' );
		}

		$client = new Publisher_Dribbble_Client_v1( $atts['access_token'] );

		try {
			$shots = $client->getUserShots( $atts['user_id'] );
		} catch( Exception $e ) {
			$shots = array();
		}

		return $shots;
	}
}


/**
 * Publisher Dribbble Widget
 */
class Publisher_Dribbble_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-dribbble',
			sprintf( __( '%s - Dribbble', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'Display latest shots from Dribbble.', 'publisher' )
			)
		);
	}


	/**
	 * Loads fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array(
			array(
				'name'      => __( 'Instructions', 'publisher' ),
				'id'        => 'help',
				'type'      => 'info',
				'std'       => wp_kses( sprintf( __( '<p>You need to get the access token from your Dribbble account.</p>
                <ol>
                    <li>Go to <a href="%s" target="_blank">Applications</a> page.</li>
                    <li>Click on <strong>Register a new application</strong> button.</li>
                    <li>Fill all fields in next page and click on "<strong>Register application</strong>" button.</li>
                    <li>Copy "<strong>Client Access Token</strong>" in next page and paste in following Access Token field.</li>
                </ol>
                ', 'publisher' ), 'https://goo.gl/Xtidw3' ), bf_trans_allowed_html() ),
				'state'     => 'open',
				'info-type' => 'help',
			),
			array(
				'name' => __( 'Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name' => __( 'Dribbble ID', 'publisher' ),
				'id'   => 'user_id',
				'type' => 'text',
			),
			array(
				'name' => __( 'Access Token', 'publisher' ),
				'id'   => 'access_token',
				'type' => 'text',
			),
			array(
				'name' => __( 'Number of Shots', 'publisher' ),
				'id'   => 'photo_count',
				'type' => 'text',
			),
			array(
				'name'    => __( 'Columns', 'publisher' ),
				'id'      => 'style',
				'type'    => 'select',
				'options' => array(
					2        => __( '2 Column', 'publisher' ),
					3        => __( '3 Column', 'publisher' ),
					'slider' => __( 'Slider', 'publisher' ),
				),
			),
		);

	}


}
