<?php
/**
 * bs-popular-categories.php
 *---------------------------
 * [bs-popular-categories] shortcode & widget
 *
 */


/**
 * Publisher Popular Categories Shortcode
 */
class Publisher_Popular_Categories_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-popular-categories';

		$_options = array(
			'defaults'              => array(
				'count'                => 6,
				'exclude'              => '',
				//
				'title'                => publisher_translation_get( 'widget_popular_categories' ),
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

		publisher_set_prop( 'shortcode-bs-popular-categories-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-popular-categories' );

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
				'name' => __( 'General', 'publisher' ),
				'id'   => 'general',
			),
			array(
				'name'           => __( 'Categories Limit', 'publisher' ),
				'type'           => 'text',
				'id'             => 'count',
				//
				'vc_admin_label' => false,
			),
			array(
				'input-desc'     => __( 'Hold Command in Mac or CTRL in Windows to select multiple categories.', 'publisher' ),
				'name'           => __( 'Excluded Categories', 'publisher' ),
				'id'             => 'exclude',
				//
				'type'           => 'bf_select',
				'multiple'       => true,
				'options'        => array(
					'' => __( '-- No Exclude --', 'publisher' ),
					array(
						'label'   => __( 'Categories', 'publisher' ),
						'options' => array(
							'category_walker' => 'category_walker'
						),
					),
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
			'name'           => __( 'Popular Categories', 'publisher' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			'icon_url'       => PUBLISHER_THEME_URI . 'images/bs-popular-categories.png',
			"category"       => publisher_white_label_get_option( 'publisher' ),
		);
	} // page_builder_settings


	function tinymce_settings() {

		return array(
			'name' => __( 'Popular Categories', 'publisher' ),
		);
	}
}


/**
 * Publisher Popular Categories Widget
 */
class Publisher_Popular_Categories_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-popular-categories',
			sprintf( __( '%s - Popular Categories', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'description' => __( 'Show popular categories by post count.', 'publisher' )
			)
		);
	} // __construct


	/**
	 * Adds backend fields
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
				'name' => __( 'Categories Limit', 'publisher' ),
				'id'   => 'count',
				'type' => 'text',
			),
			array(
				'type'       => 'select',
				'name'       => __( 'Excluded Categories', 'publisher' ),
				"input-desc" => __( 'Hold Command in Mac or CTRL in Windows to select multiple categories.', 'publisher' ),
				"id"         => 'exclude',
				'multiple'   => true,
				'options'    => array(
					'' => __( '-- No Exclude --', 'publisher' ),
					array(
						'label'   => __( 'Categories', 'publisher' ),
						'options' => array(
							'category_walker' => 'category_walker'
						),
					),
				),
			)
		);

	}
}
