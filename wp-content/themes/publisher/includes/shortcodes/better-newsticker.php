<?php


/**
 * BetterNewsTicker Shortcode
 */
class Better_Newsticker_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'better-newsticker';

		$options = array_merge( array(
			'defaults'              => array(
				'ticker_text'          => publisher_translation_get( 'newsticker_trending' ),
				'speed'                => 12,
				'count'                => 10,
				'cat'                  => '',
				'tag'                  => '',
				'class'                => '',
				'bg_color'             => '',
				//
				'title'                => publisher_translation_get( 'newsticker_trending' ),
				'show_title'           => 0,
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
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => true,
		), $options );

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		parent::__construct( $id, $options );
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
	 * @return array
	 */
	public function get_fields() {

		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Newsticker', 'publisher' ),
				'id'   => 'newsticker',
			),
			array(
				'name'           => __( 'News Ticker Text', 'publisher' ),
				'id'             => 'ticker_text',
				'type'           => 'text',
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'Speed', 'publisher' ),
				'id'             => 'speed',
				//
				'type'           => 'slider',
				'dimension'      => 'second',
				'min'            => '3',
				'max'            => '60',
				'step'           => '1',
				//
				'std'            => '15',
				'desc'           => __( 'Set the speed of the ticker cycling, in second.', 'publisher' ),
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'Category', 'publisher' ),
				'id'             => 'cat',
				//
				'type'           => 'select',
				'options'        => array(
					'' => __( 'All Posts', 'publisher' ),
					array(
						'label'   => __( 'Categories', 'publisher' ),
						'options' => array(
							'category_walker' => 'category_walker'
						),
					),
				),
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'Number of Posts', 'publisher' ),
				'id'             => 'count',
				'type'           => 'text',
				//
				'vc_admin_label' => true,
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
			'name'           => __( 'News Ticker', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			'icon_url'       => PUBLISHER_THEME_URI . 'images/better-newsticker.png',

			"category" => publisher_white_label_get_option( 'publisher' ),
		);
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

		publisher_set_prop( 'shortcode-better-newsticker', $atts );

		publisher_get_view( 'shortcodes', 'better-newsticker' );

		publisher_clear_props();
		publisher_clear_query();

		return ob_get_clean();
	}


	function tinymce_settings() {

		return array(
			'name' => __( 'News Ticker', 'publisher' ),

			'scripts' => array(
				array(
					'type'    => 'registered',
					'handles' => array( 'theme-libs' )
				),

				array(
					'type' => 'inline',
					'data' => 'jQuery(function($){$(\'.better-newsticker\').betterNewsticker({control_nav: true});})',
				),
			),
		);
	}
}
