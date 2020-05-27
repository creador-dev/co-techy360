<?php
/**
 * bs-quote.php
 *---------------------------
 * [bs-quote] advanced quote shortcode.
 *
 */


/**
 * bs-quote shortcode
 */
class Blockquote_Pack_Quote_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$_options = array(
			'defaults'              => array(
				'style'         => 'style-1',
				'quote'         => 'Great things in business are never done by one person. They are done by a team of people.',
				'color'         => '',
				'author_name'   => '',
				'author_job'    => '',
				'author_avatar' => '',
				'author_link'   => '',
				'align'         => 'center',
			),
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => true,
		);

		parent::__construct( 'bs-quote', $_options );

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

		$_check = array(
			''        => '',
			'default' => '',
		);


		if ( isset( $_check[ $atts['style'] ] ) ) {

			$atts['style'] = BS_Blockquote_Pack_Pro::get_option( 'quote-style' );

			if ( isset( $_check[ $atts['style'] ] ) ) {
				$atts['style'] = 'style-1';
			}
		}


		ob_start();

		include BS_Blockquote_Pack_Pro::dir_path( "template/{$atts['style']}.php" );

		// BetterAMP or Official AMP plugins
		if ( bf_is_amp() === 'better' ) {

			static $icons_printed, $color_printed;
			$code = '';

			//
			// Print Icons Code only 1 time
			//
			if ( is_null( $icons_printed ) ) {
				ob_start();
				include bf_get_dir( 'assets/css/bs-icons.css' );
				$code          = ob_get_clean();
				$code          = str_replace( '../fonts/', bf_get_uri( 'assets/fonts/' ), $code );
				$icons_printed = true;
			}

			// Get style -> Do not prints duplicate styles
			{
				ob_start();
				echo $this->get_inline_style( $atts['style'] );
				$_t = ob_get_clean();

				if ( ! empty( $_t ) ) {
					$code .= $_t;
				}
			}

			//
			// Print panel color only when the custom override color was not provided
			//
			if ( is_null( $color_printed ) && empty( $atts['color'] ) ) {

				$css_blocks = bs_blockquote_pack_panel_css_config();
				$color      = BS_Blockquote_Pack_Pro::get_option( 'color' );

				foreach ( $css_blocks as $block ) {
					$_t = bf_render_css_block_array( $block, $color );

					if ( empty( $_t['code'] ) ) {
						continue;
					}

					$code .= $_t['code'];
				}
			}

			if ( ! empty( $code ) ) {
				better_amp_add_inline_style( better_amp_css_sanitizer( $code ), 'blockquote-pack' );
			}
		}

		return ob_get_clean();
	}


	/**
	 * Fields for all panels
	 *
	 * @return array
	 */
	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Quote', 'better-studio' ),
				'id'   => 'quote_tab',
			),
			array(
				'name' => __( 'Quote Text:', 'better-studio' ),
				'type' => 'textarea',
				'id'   => 'quote',
			),
			array(
				'name'             => __( 'Style:', 'better-studio' ),
				'id'               => 'style',
				'desc'             => __( 'Chose newsletter style.', 'better-studio' ),
				'type'             => 'select_popup',
				'std'              => '',
				'deferred-options' => array(
					'callback' => 'bs_blockquote_pack_styles_option',
					'args'     => array(
						true,
					),
				),
				'texts'            => array(
					'modal_title'   => __( 'Choose Style', 'better-studio' ),
					'box_pre_title' => __( 'Active style', 'better-studio' ),
					'box_button'    => __( 'Change Style', 'better-studio' ),
				),
				'section_class'    => 'newsletter-pack-newsletter-field',
			),
			array(
				'name'          => __( 'Align:', 'better-studio' ),
				'id'            => 'align',
				'type'          => 'image_radio',
				'options'       => array(
					'left'   => array(
						'img' => BS_Blockquote_Pack_Pro::dir_url( 'img/options/align-left.png' ),
					),
					'center' => array(
						'img' => BS_Blockquote_Pack_Pro::dir_url( 'img/options/align-center.png' ),
					),
					'right'  => array(
						'img' => BS_Blockquote_Pack_Pro::dir_url( 'img/options/align-right.png' ),
					),
				),
				'section_class' => 'style-floated-left bordered affect-block-align-on-change',
			),
			array(
				'name'    => __( 'Color:', 'better-studio' ),
				'id'      => 'color',
				'type'    => 'color',
				'show_on' => array(
					array(
						'style!=style-11',
						'style!=style-12',
						'style!=style-14',
						'style!=style-15',
					),
				)
			),
			array(
				'type' => 'tab',
				'name' => __( 'Citation', 'better-studio' ),
				'id'   => 'citation_tab',
			),
			array(
				'name' => __( 'Author:', 'better-studio' ),
				'id'   => 'author_name',
				'type' => 'text',
			),
			array(
				'name' => __( 'Author Job Title:', 'better-studio' ),
				'id'   => 'author_job',
				'type' => 'text',
			),
			array(
				'name'         => __( 'Author Avatar:', 'better-studio' ),
				'desc'         => __( 'Upload square images to show it before author name. <br><br> <strong>Recommended Size: </strong> The best size is 60x60 images.', 'better-studio' ),
				'id'           => 'author_avatar',
				'type'         => 'media_image',
				'media_button' => __( 'Upload Avatar', 'better-studio' ),
			),
			array(
				'name' => __( 'Author Link:', 'better-studio' ),
				'id'   => 'author_link',
				'type' => 'text',
			),
		);
	}


	/**
	 * Registers configuration of tinyMCE views
	 *
	 * @return array
	 */
	function tinymce_settings() {

		$styles = array(
			array(
				'type' => 'custom',
				'url'  => BF_URI . 'assets/css/bs-icons.css',
			),
			array(
				'type' => 'custom',
				'url'  => bf_append_suffix( BS_Blockquote_Pack_Pro::dir_url( 'css/blockquote-pack' ), '.css' ),
			),
		);

		if ( is_rtl() ) {
			$styles[] = array(
				'type' => 'custom',
				'url'  => bf_append_suffix( BS_Blockquote_Pack_Pro::dir_url( 'css/blockquote-pack-rtl' ), '.css' ),
			);
		}

		return array(
			'name'   => __( 'Advanced Quote', 'better-studio' ),
			'styles' => $styles,
		);
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
	 * Handy function used to get inline and exact css codes of each style
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function get_inline_style( $style = 'style-1' ) {

		$_check = array(
			'style-1'  => array(
				'normalize',
				'type-1',
				'type-1-style-1',
			),
			'style-2'  => array(
				'normalize',
				'type-1',
				'type-1-style-2',
			),
			'style-3'  => array(
				'normalize',
				'type-1',
				'type-1-style-3',
			),
			'style-4'  => array(
				'normalize',
				'type-1',
				'type-1-style-4',
			),
			'style-5'  => array(
				'normalize',
				'type-1',
				'type-1-style-5',
			),
			'style-6'  => array(
				'normalize',
				'type-1',
				'type-1-style-6',
			),
			'style-7'  => array(
				'normalize',
				'type-1',
				'type-1-style-7',
			),
			'style-8'  => array(
				'normalize',
				'type-1',
				'type-1-style-8',
			),
			'style-9'  => array(
				'normalize',
				'type-1',
				'type-1-style-9',
			),
			'style-10' => array(
				'normalize',
				'type-1',
				'type-1-style-10',
			),
			'style-11' => array(
				'normalize',
				'type-2',
				'type-2-style-1',
			),
			'style-12' => array(
				'normalize',
				'type-2',
				'type-2-style-2',
			),
			'style-13' => array(
				'normalize',
				'type-1',
				'type-1-style-11',
			),
			'style-14' => array(
				'normalize',
				'type-1',
				'type-1-style-12',
			),
			'style-15' => array(
				'normalize',
				'type-1',
				'type-1-style-13',
			),
			'style-16' => array(
				'normalize',
				'type-1',
				'type-1-style-14',
			),
			'style-17' => array(
				'normalize',
				'type-1',
				'type-1-style-15',
			),
			'style-18' => array(
				'normalize',
				'type-1',
				'type-1-style-16',
			),
			'style-19' => array(
				'normalize',
				'type-1',
				'type-1-style-17',
			),
			'style-20' => array(
				'normalize',
				'type-1',
				'type-1-style-18',
			),
			'style-21' => array(
				'normalize',
				'type-1',
				'type-1-style-19',
			),
			'style-22' => array(
				'normalize',
				'type-1',
				'type-1-style-17',
			),
			'style-23' => array(
				'normalize',
				'type-1',
				'type-1-style-20',
			),
		);

		static $cache;

		if ( ! isset( $_check[ $style ] ) ) {
			return '';
		}

		ob_start();

		if ( is_rtl() ) {
			$_rtl_check = array(
				'normalize'       => '',
				//
				'type-1'          => '',
				'type-1-style-3'  => '',
				'type-1-style-6'  => '',
				'type-1-style-7'  => '',
				'type-1-style-8'  => '',
				'type-1-style-10' => '',
				'type-1-style-11' => '',
				'type-1-style-12' => '',
				'type-1-style-13' => '',
				'type-1-style-14' => '',
				'type-1-style-16' => '',
				'type-1-style-17' => '',
				'type-1-style-18' => '',
				'type-1-style-19' => '',
				'type-1-style-20' => '',
				//
				'type-2'          => '',
				'type-2-style-1'  => '',
				'type-2-style-2'  => '',
			);
		}

		$rtl_code = '';

		foreach ( $_check[ $style ] as $file ) {

			if ( ! isset( $cache[ $file ] ) ) {
				$cache[ $file ] = true;
			} else {
				continue;
			}

			include bf_append_suffix( BS_Blockquote_Pack_Pro::dir_path( "css/styles/{$file}" ), '.css' );

			if ( is_rtl() && isset( $_rtl_check[ $file ] ) ) {
				ob_start();
				include bf_append_suffix( BS_Blockquote_Pack_Pro::dir_path( "css/styles/{$file}-rtl" ), '.css' );
				$rtl_code .= ob_get_clean();
			}
		}

		echo $rtl_code;

		return ob_get_clean();
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Blockquote Pack', 'better-studio' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => $this->block_category(),
			'icon_url'       => BS_Blockquote_Pack_Pro::dir_url( 'img/bs-blockquote-pack.png' ),

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

} // Blockquote_Pack_Quote_Shortcode
