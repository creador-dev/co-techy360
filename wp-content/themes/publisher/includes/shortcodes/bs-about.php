<?php
/**
 * publisher-about-shortcode.php
 *---------------------------
 * [bs-about] shortcode & widget
 *
 */


/**
 * Publisher About Shortcode
 */
class Publisher_About_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-about';

		$_options = array(
			'name' => __( 'About Us', 'publisher' ),

			'defaults'              => array(
				'content'              => '',
				'logo_text'            => '',
				'logo_img'             => '',
				'about_link_url'       => '',
				'about_link_text'      => publisher_translation_get( 'widget_readmore' ),
				//
				'link_facebook'        => '',
				'link_twitter'         => '',
				'link_google'          => '',
				'link_instagram'       => '',
				'link_email'           => '',
				'link_youtube'         => '',
				'link_dribbble'        => '',
				'link_vimeo'           => '',
				'link_github'          => '',
				'link_behance'         => '',
				'link_pinterest'       => '',
				'link_telegram'        => '',
				'link_vk'              => '',
				//
				'bs-text-color-scheme' => '',
				//
				'title'                => publisher_translation_get( 'about_us' ),
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

		publisher_set_prop( 'shortcode-bs-about-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-about' );

		publisher_clear_props();

		return ob_get_clean();

	}


	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'General', 'publisher' ),
				'id'   => 'general',
			),
			array(
				'name'           => __( 'Logo', 'publisher' ),
				'id'             => 'logo_img',
				//
				'type'           => 'media_image',
				'upload_label'   => __( 'Upload Logo', 'publisher' ),
				'remove_label'   => __( 'Remove', 'publisher' ),
				'media_title'    => __( 'Remove', 'publisher' ),
				'media_button'   => __( 'Select as Logo', 'publisher' ),
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Logo Text (alt)', 'publisher' ),
				'id'             => 'logo_text',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Description', 'publisher' ),
				'type'           => 'textarea',
				'id'             => 'content',
				//
				'vc_admin_label' => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Read More', 'publisher' ),
				'id'   => 'read_more',
			),
			array(
				'name'           => __( 'Read more text', 'publisher' ),
				'id'             => 'about_link_text',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Read more link', 'publisher' ),
				'id'             => 'about_link_url',
				'type'           => 'text',
				//
				'vc_admin_label' => true,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Social Icons', 'publisher' ),
				'id'   => 'social_icons',
			),
			array(
				'name'           => __( 'Facebook Full URL', 'publisher' ),
				'id'             => 'link_facebook',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Twitter Full URL', 'publisher' ),
				'id'             => 'link_twitter',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Google+ Full URL', 'publisher' ),
				'id'             => 'link_google',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Instagram Full URL', 'publisher' ),
				'id'             => 'link_instagram',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Email', 'publisher' ),
				'id'             => 'link_email',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Youtube Full URL', 'publisher' ),
				'id'             => 'link_youtube',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Dribbble Full URL', 'publisher' ),
				'id'             => 'link_dribbble',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Vimeo Full URL', 'publisher' ),
				'id'             => 'link_vimeo',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Github Full URL', 'publisher' ),
				'id'             => 'link_github',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Behance Full URL', 'publisher' ),
				'id'             => 'link_behance',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Pinterest Full URL', 'publisher' ),
				'id'             => 'link_pinterest',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Telegram Full URL', 'publisher' ),
				'id'             => 'link_telegram',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'VK Full URL', 'publisher' ),
				'id'             => 'link_vk',
				'type'           => 'text',
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
			'name'           => __( 'About Us', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-about.png',

		);
	} // page_builder_settings


	function tinymce_settings() {

		return array(
			'name' => __( 'About Us', 'publisher' ),
		);
	}
}


/**
 * Publisher About Widget
 */
class Publisher_About_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-about',
			sprintf( __( '%s - About Us', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'About us widget.', 'publisher' )
			)
		);
	} // __construct


	/**
	 * Loads fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array(
			array(
				'name' => __( 'Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name'         => __( 'Logo Image', 'publisher' ),
				'id'           => 'logo_img',
				'type'         => 'media_image',
				'upload_label' => __( 'Upload Logo', 'publisher' ),
				'remove_label' => __( 'Remove', 'publisher' ),
				'media_title'  => __( 'Remove', 'publisher' ),
				'media_button' => __( 'Select as Logo', 'publisher' ),
			),
			array(
				'name' => __( 'Logo Text', 'publisher' ),
				'id'   => 'logo_text',
				'type' => 'text',
			),
			array(
				'name' => __( 'About Us', 'publisher' ),
				'id'   => 'content',
				'type' => 'textarea',
			),
			'link_group' => array(
				'name'  => __( 'About Link', 'publisher' ),
				'type'  => 'group',
				'id'    => 'link_group',
				'state' => 'close',
			),
			array(
				'name' => __( 'About Link Text', 'publisher' ),
				'id'   => 'about_link_text',
				'type' => 'text',
			),
			array(
				'name' => __( 'About Link URL', 'publisher' ),
				'id'   => 'about_link_url',
				'type' => 'text',
			),

			'social_group' => array(
				'name'  => __( 'Social Icons', 'publisher' ),
				'type'  => 'group',
				'id'    => 'social_group',
				'state' => 'close',
			),
			array(
				'name' => __( 'Facebook Full URL', 'publisher' ),
				'id'   => 'link_facebook',
				'type' => 'text',
			),
			array(
				'name' => __( 'Twitter Full URL', 'publisher' ),
				'id'   => 'link_twitter',
				'type' => 'text',
			),
			array(
				'name' => __( 'Google+ Full URL', 'publisher' ),
				'id'   => 'link_google',
				'type' => 'text',
			),
			array(
				'name' => __( 'Instagram Full URL', 'publisher' ),
				'id'   => 'link_instagram',
				'type' => 'text',
			),
			array(
				'name' => __( 'Enter Your E-Mail', 'publisher' ),
				'id'   => 'link_email',
				'type' => 'text',
			),
			array(
				'name' => __( 'Youtube Full URL', 'publisher' ),
				'id'   => 'link_youtube',
				'type' => 'text',
			),
			array(
				'name' => __( 'Dribbble Full URL', 'publisher' ),
				'id'   => 'link_dribbble',
				'type' => 'text',
			),
			array(
				'name' => __( 'Vimeo Full URL', 'publisher' ),
				'id'   => 'link_vimeo',
				'type' => 'text',
			),
			array(
				'name' => __( 'Github Full URL', 'publisher' ),
				'id'   => 'link_github',
				'type' => 'text',
			),
			array(
				'name' => __( 'Behance Full URL', 'publisher' ),
				'id'   => 'link_behance',
				'type' => 'text',
			),
			array(
				'name' => __( 'Pinterest Full URL', 'publisher' ),
				'id'   => 'link_pinterest',
				'type' => 'text',
			),
			array(
				'name' => __( 'Telegram Full URL', 'publisher' ),
				'id'   => 'link_telegram',
				'type' => 'text',
			),
			array(
				'name' => __( 'VK Full URL', 'publisher' ),
				'id'   => 'link_vk',
				'type' => 'text',
			),
		);
	} // load_fields
}


if ( ! function_exists( 'publisher_shortcode_about_get_icons' ) ) {
	/**
	 * Creates and returns about widget social network icons
	 *
	 * @param $atts
	 *
	 * @return array|bool
	 */
	function publisher_shortcode_about_get_icons( $atts ) {

		$output = '';

		if ( ! empty( $atts['link_facebook'] ) ) {
			$output .= '<li class="about-icon-item facebook"><a href="' . esc_url( $atts['link_facebook'] ) . '" target="_blank"><i class="fa fa-facebook"></i></a>';
		}

		if ( ! empty( $atts['link_twitter'] ) ) {
			$output .= '<li class="about-icon-item twitter"><a href="' . esc_url( $atts['link_twitter'] ) . '" target="_blank"><i class="fa fa-twitter"></i></a>';
		}

		if ( ! empty( $atts['link_google'] ) ) {
			$output .= '<li class="about-icon-item google-plus"><a href="' . esc_url( $atts['link_google'] ) . '" target="_blank"><i class="fa fa-google"></i></a>';
		}

		if ( ! empty( $atts['link_instagram'] ) ) {
			$output .= '<li class="about-icon-item instagram"><a href="' . esc_url( $atts['link_instagram'] ) . '" target="_blank"><i class="fa fa-instagram"></i></a>';
		}

		if ( ! empty( $atts['link_email'] ) ) {
			$output .= '<li class="about-icon-item email"><a href="' . esc_url( $atts['link_email'] ) . '" target="_blank"><i class="fa fa-envelope"></i></a>';
		}

		if ( ! empty( $atts['link_youtube'] ) ) {
			$output .= '<li class="about-icon-item youtube"><a href="' . esc_url( $atts['link_youtube'] ) . '" target="_blank"><i class="item-icon bsfi bsfi-youtube"></i></a>';
		}

		if ( ! empty( $atts['link_dribbble'] ) ) {
			$output .= '<li class="about-icon-item dribbble"><a href="' . esc_url( $atts['link_dribbble'] ) . '" target="_blank"><i class="fa fa-dribbble"></i></a>';
		}

		if ( ! empty( $atts['link_vimeo'] ) ) {
			$output .= '<li class="about-icon-item vimeo"><a href="' . esc_url( $atts['link_vimeo'] ) . '" target="_blank"><i class="fa fa-vimeo"></i></a>';
		}

		if ( ! empty( $atts['link_github'] ) ) {
			$output .= '<li class="about-icon-item github"><a href="' . esc_url( $atts['link_github'] ) . '" target="_blank"><i class="fa fa-github"></i></a>';
		}

		if ( ! empty( $atts['link_behance'] ) ) {
			$output .= '<li class="about-icon-item behance"><a href="' . esc_url( $atts['link_behance'] ) . '" target="_blank"><i class="fa fa-behance"></i></a>';
		}

		if ( ! empty( $atts['link_pinterest'] ) ) {
			$output .= '<li class="about-icon-item pinterest"><a href="' . esc_url( $atts['link_pinterest'] ) . '" target="_blank"><i class="fa fa-pinterest"></i></a>';
		}

		if ( ! empty( $atts['link_telegram'] ) ) {
			$output .= '<li class="about-icon-item telegram"><a href="' . esc_url( $atts['link_telegram'] ) . '" target="_blank"><i class="fa fa-send"></i></a>';
		}

		if ( ! empty( $atts['link_vk'] ) ) {
			$output .= '<li class="about-icon-item vk"><a href="' . esc_url( $atts['link_vk'] ) . '" target="_blank"><i class="fa fa-vk"></i></a>';
		}

		if ( ! empty( $output ) ) {
			return '<ul class="about-icons-list">' . $output . '</ul>';
		} else {
			return '';
		}
	}
} // publisher_shortcode_about_get_icons
