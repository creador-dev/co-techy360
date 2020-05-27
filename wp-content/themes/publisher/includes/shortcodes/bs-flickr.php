<?php
/**
 * bs-flickr.php
 *---------------------------
 * [bs-flickr] short code & widget
 *
 */


/**
 * Publisher Flickr Shortcode
 */
class Publisher_Flickr_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-flickr';

		$_options = array(
			'defaults'              => array(
				'user_id'              => '',
				'photo_count'          => 6,
				'style'                => 3,
				'tags'                 => '',
				//
				'title'                => publisher_translation_get( 'widget_flickr_photos' ),
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

		publisher_set_prop( 'shortcode-bs-flickr-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-flickr' );

		publisher_clear_props();

		return ob_get_clean();

	}


	/**
	 * Fields of Visual Composer and TinyMCE
	 */
	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Flickr', 'publisher' ),
				'id'   => 'flickr',
			),
			array(
				'name'           => __( 'Flicker ID', 'publisher' ),
				'type'           => 'text',
				'id'             => 'user_id',
				//
				'vc_admin_label' => true,
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
			array(
				'name'           => __( 'Tags (comma separated, optional)', 'publisher' ),
				'type'           => 'text',
				'id'             => 'tags',
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
			'name'           => __( 'Flickr Photos', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-flickr.png',

			"category" => publisher_white_label_get_option( 'publisher' ),
		);

	} // page_builder_settings


	function tinymce_settings() {

		return array(
			'name' => __( 'Flickr Photos', 'publisher' ),
		);
	}
} // Publisher_Flickr_Shortcode


if ( ! function_exists( 'publisher_shortcode_flickr_get_data' ) ) {
	/**
	 * Wrapper ro getting Flickr data with cache mechanism
	 *
	 * @param $atts
	 *
	 * @return array|bool|mixed|void
	 */
	function publisher_shortcode_flickr_get_data( $atts ) {

		$data_store = 'bs-fk-' . $atts['user_id'];
		$back_store = 'bs-fk-bk-' . $atts['user_id'];
		$cache_time = HOUR_IN_SECONDS * 6;

		if ( ( $images_list = get_transient( $data_store ) ) === false ) {

			$images_list = publisher_shortcode_flickr_fetch_data( $atts );

			if ( is_wp_error( $images_list ) && is_user_logged_in() ) {
				return $images_list;
			} elseif ( ! is_wp_error( $images_list ) ) {

				// Save a transient to expire in $cache_time and a permanent backup option ( fallback )
				set_transient( $data_store, $images_list, $cache_time );
				update_option( $back_store, $images_list, 'no' );

			} // Fall to permanent backup store
			else {
				$images_list = get_option( $back_store );
			}
		}

		return $images_list;
	} // publisher_shortcode_flickr_get_data
} // if


if ( ! function_exists( 'publisher_shortcode_flickr_fetch_data' ) ) {
	/**
	 * Retrieve Flickr fresh data
	 *
	 * @param $atts
	 *
	 * @return array|bool
	 */
	function publisher_shortcode_flickr_fetch_data( $atts ) {

		$remote_response = wp_remote_get( 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&id=' . urlencode( $atts['user_id'] ) . '&nojsoncallback=1&tags=' . urlencode( $atts['tags'] ) );

		if ( is_wp_error( $remote_response ) || 200 != wp_remote_retrieve_response_code( $remote_response ) ) {
			return new WP_Error( 'invalid_response', __( 'Flickr did not return a 200.', 'publisher' ) );
		}

		// Fix Flickr JSON escape bug
		$remote_body = wp_remote_retrieve_body( $remote_response );
		$remote_body = str_replace( "\\'", "'", $remote_body );

		$json = json_decode( $remote_body, true );

		if ( ! is_array( $json ) ) {
			return new WP_Error( 'bad_array', __( 'Flickr has returned invalid data.', 'publisher' ) );
		}

		$images_list = $json['items'];

		// Replace medium with small square image
		foreach ( $images_list as $key => $item ) {
			$images_list[ $key ]['media']['xs'] = preg_replace( '/_m\.(jp?g|png|gif)$/', '_s.\\1', $item['media']['m'] );
			$images_list[ $key ]['media']['s']  = preg_replace( '/_m\.(jp?g|png|gif)$/', '_q_d.\\1', $item['media']['m'] );
		}

		return $images_list;
	} // publisher_shortcode_flickr_fetch_data
} // if


/**
 * Publisher Flickr Widget
 */
class Publisher_Flickr_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-flickr',
			sprintf( __( '%s - Flickr', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'Display latest photos from Flickr.', 'publisher' )
			)
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array(
			array(
				'name'      => __( 'Instructions', 'publisher' ),
				'id'        => 'help',
				'type'      => 'info',
				'std'       => wp_kses( sprintf( __( '<p>You need to get the user id from your Flickr account.</p>
                <ol>
                    <li>Attain your user id using <a href="%s" target="_blank">this tool</a></li>
                    <li>Copy the user id</li>
                    <li>Paste it in the "Flickr ID" input box below</li>
                </ol>
                ', 'publisher' ), 'http://goo.gl/pHx7LV' ), bf_trans_allowed_html() ),
				'state'     => 'open',
				'info-type' => 'help',
			),
			array(
				'name' => __( 'Title:', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name' => __( 'Flickr ID:', 'publisher' ),
				'id'   => 'user_id',
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
			array(
				'name' => __( 'Number of Photos:', 'publisher' ),
				'id'   => 'photo_count',
				'type' => 'text',
			),
			array(
				'name' => __( 'Tags (comma separated, optional):', 'publisher' ),
				'id'   => 'tags',
				'type' => 'text',
			),
		);

	}
}
