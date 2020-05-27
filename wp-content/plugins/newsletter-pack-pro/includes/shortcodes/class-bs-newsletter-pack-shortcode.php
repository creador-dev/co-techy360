<?php


/**
 * Class BS_Newsletter_Pack_Shortcode
 *
 * @since 1.0
 */
class BS_Newsletter_Pack_Shortcode extends BF_Shortcode {

	/**
	 * BS_Newsletter_Pack_Shortcode constructor.
	 *
	 * @param string $id
	 * @param array  $options
	 */
	function __construct( $id, $options ) {

		$id = 'newsletter-pack';

		$this->name = __( 'Newsletter Pack', 'better-studio' );

		$this->description = 'Show pre-defined newsletter in sidebar.';

		$_options = array(
			'defaults'              => array(
				'newsletter'       => '',
				'style'            => 'default',
				'si_style'         => 'default',
				//
				'title'            => '',
				'show_title'       => 0,
				'icon'             => '',
				'heading_style'    => 'default',
				'heading_color'    => '',
				//
				'bs-show-desktop'  => 1,
				'bs-show-tablet'   => 1,
				'bs-show-phone'    => 1,
				'css'              => '',
				'custom-css-class' => '',
				'custom-id'        => '',
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

		if ( ! empty( $atts['newsletter'] ) || $atts['newsletter'] !== 'none' ) {

			$atts['newsletter-data'] = bsnp_get_newsletter_data( $atts['newsletter'] );

			// newsletter is not active
			if ( ! empty( $atts['newsletter-data']['active-newsletter'] ) ) {
				$atts['active_location'] = true;
			}

			$atts['newsletter-data']['style-type'] = 'widget';

			$_check = array(
				'default' => '',
				''        => '',
			);

			// update custom style
			if ( ! isset( $_check[ $atts['style'] ] ) ) {
				$atts['newsletter-data']['style'] = $atts['style'];
			}

			// update custom social icon
			if ( ! isset( $_check[ $atts['si_style'] ] ) ) {

				if ( $atts['si_style'] === 'hidden' ) {
					$atts['newsletter-data']['social_icons'] = false;
				} else {
					$atts['newsletter-data']['social_icons_style'] = $atts['si_style'];
				}
			}


		}

		echo BS_Newsletter_Pack_Pro()->show_newsletter( $atts );

		return ob_get_clean();

	}


	/**
	 * @return array
	 */
	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Newsletter', 'better-studio' ),
				'id'   => 'newsletter_tab',
			),
			array(
				'name'             => __( 'Newsletter', 'better-studio' ),
				'id'               => 'newsletter',
				'type'             => 'select',
				'deferred-options' => array(
					'callback' => 'bsnp_get_newsletters_list_option',
					'args'     => array(
						- 1,
						true
					),
				),
				//
				'vc_admin_label'   => true,
			),
			array(
				'name'             => __( 'Override Style', 'better-studio' ),
				'id'               => 'style',
				'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'bsnp_get_newsletters_style_option',
					'args'     => array(
						true,
					),
				),
				'texts'            => array(
					'modal_title'   => __( 'Choose Newsletter Style', 'better-studio' ),
					'box_pre_title' => __( 'Active style', 'better-studio' ),
					'box_button'    => __( 'Change Style', 'better-studio' ),
				),
				'section_class'    => 'newsletter-pack-newsletter-field',
				//
				'vc_admin_label'   => false,
			),
			array(
				'name'             => __( 'Override Social Icons Style', 'better-studio' ),
				'id'               => 'si_style',
				'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'bsnp_get_newsletters_si_style_option',
					'args'     => array(
						true,
						true,
					),
				),
				'texts'            => array(
					'modal_title'   => __( 'Choose Social Icons Style', 'better-studio' ),
					'box_pre_title' => __( 'Active style', 'better-studio' ),
					'box_button'    => __( 'Change Style', 'better-studio' ),
				),
				'section_class'    => 'newsletter-pack-newsletter-field',
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

		return $fields;

	}


	/**
	 * Registers Visual Composer Add-on
	 */
	function register_vc_add_on() {

		vc_map(
			array(
				'name'           => $this->name,
				'base'           => $this->id,
				'icon'           => $this->icon,
				'desc'           => $this->description,
				'weight'         => 10,
				'wrapper_height' => 'full',
				'category'       => __( 'Content', 'better-studio' ),
				'params'         => $this->vc_map_listing_all(),
			)
		);
	}


	/**
	 * TinyMCE view  settings
	 *
	 * @return array
	 */
	function tinymce_settings() {

		return array(
			'name'   => __( 'Newsletter Pack', 'better-studio' ),
			'styles' => array(
				array(
					'type' => 'custom',
					'url'  => bf_append_suffix( BS_Newsletter_Pack_Pro::dir_url() . 'css/newsletter-pack', '.css' ),
				)
			),
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Newsletter', 'better-studio' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => $this->block_category(),
			'icon_url'       => BS_Newsletter_Pack_Pro::dir_url( 'images/vc-newsletter-pack.png' ),

		);
	} // page_builder_settings


	/**
	 * Page builder block/map category.
	 */
	public function block_category() {

		global $pagenow;

		if ( defined( 'GUTENBERG_VERSION' ) && GUTENBERG_VERSION ) {

			// can not use is_gutenberg_page() function

			if ( in_array( $pagenow, array(
					'post.php',
					'post-new.php'
				) ) && ! isset( $_GET['classic-editor'] )
			) {

				return 'common';
			}

		}

		return __( 'Better Studio', 'better-studio' );
	}

}
