<?php
/**
 * publisher-login-shortcode.php
 *---------------------------
 * [bs-login] shortcode & widget
 *
 */


/**
 * Publisher Login Shortcode
 */
class Publisher_Login_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-login';

		$_options = array(
			'defaults'              => array(
				'title'                => '',
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

		if ( ! empty( $content ) ) {
			$atts['content'] = $content;
		}

		ob_start();

		publisher_set_prop( 'shortcode-bs-login-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-login' );

		publisher_clear_props();

		return ob_get_clean();

	}


	/**
	 * Fields of Visual Composer and TinyMCE
	 */
	public function get_fields() {

		$fields = array();


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
			'name'           => __( 'Login', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category" => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-Login.png',
		);
	} // page_builder_settings


	function tinymce_settings() {

		return array(
			'name'    => __( 'Login', 'publisher' ),
			'scripts' => array(
				array(
					'type'    => 'registered',
					'handles' => 'publisher',
				),
			),
		);
	}
}


/**
 * Publisher Login Widget
 */
class Publisher_Login_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-login',
			sprintf( __( '%s - Login', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'description' => __( 'Login and Reset password widget.', 'publisher' )
			)
		);
	} // __construct


	/**
	 * Front-end display of widget.
	 *
	 * @see BetterWidget::widget()
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$this->load_defaults();
		$instance = $this->parse_args( $this->defaults, $instance );

		echo $args['before_widget'];  // escaped before inside WP

		if ( is_user_logged_in() ) {
			$instance['title'] = publisher_translation_get( 'login_profile' );
		} else {
			$instance['title'] = publisher_translation_get( 'login_login' );
		}

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->base_widget_id );
		if ( ! empty( $title ) && $this->with_title ) {
			echo $args['before_title'] . $title . $args['after_title']; // escaped before inside WP
		}

		echo BF_Shortcodes_Manager::factory( $this->base_widget_id )->handle_widget( $instance ); // escaped before inside WP

		echo $args['after_widget']; // escaped before inside WP
	}

}
