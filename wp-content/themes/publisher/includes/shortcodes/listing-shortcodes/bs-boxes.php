<?php
/**
 * bs-boxes.php
 *---------------------------
 * [bs-boxes-{1,2,3,4}] shortcode
 */


/**
 * Publisher Box 1
 */
class Publisher_Box_1_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-box-1';

		$_options = array(
			'defaults'              => array(
				'title'                => '',
				'show_title'           => 0,
				'icon'                 => '',
				'heading_style'        => 'default',
				'heading'              => '',
				'text'                 => '',
				'link'                 => '',
				'image'                => '',
				'bs-show-desktop'      => true,
				'bs-show-tablet'       => true,
				'bs-show-phone'        => true,
				'bs-text-color-scheme' => '',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);


		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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

		publisher_set_prop( 'shortcode-bs-box-1-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-box-1' );

		publisher_clear_props();

		return ob_get_clean();

	}


	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Box', 'publisher' ),
				'id'   => 'box',
			),
			array(
				'desc'           => __( 'Box pre heading', 'publisher' ),
				'name'           => __( 'Pre heading', 'publisher' ),
				'id'             => 'text',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Box heading', 'publisher' ),
				'name'           => __( 'Heading', 'publisher' ),
				'type'           => 'text',
				'id'             => 'heading',
				//
				'vc_admin_label' => true,
			),
			array(
				'desc'           => __( 'Link of box', 'publisher' ),
				'name'           => __( 'Link', 'publisher' ),
				'type'           => 'text',
				'id'             => 'link',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Box background image', 'publisher' ),
				'type'           => 'media_image',
				'id'             => 'image',
				'data-type'      => 'id',
				//
				'vc_admin_label' => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Custom Heading', 'publisher' ),
				'id'   => 'custom_heading',
			),
			array(
				'name'           => __( 'Title', 'publisher' ),
				'id'             => 'title',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Show Title?', 'publisher' ),
				'id'             => 'show_title',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Heading Custom Color', 'publisher' ),
				'desc'           => __( 'Change block heading color.', 'publisher' ),
				'id'             => 'heading_color',
				'type'           => 'color',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'             => __( 'Custom Heading Style', 'publisher' ),
				'desc'             => __( 'Specialize this block with custom heading.', 'publisher' ),
				'id'               => 'heading_style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_heading_option_list',
					'args'     => array(
						true
					),
				),
				'column_class'     => 'one-column',
				//
				'vc_admin_label'   => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Design options', 'publisher' ),
				'id'   => 'design_options',
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Desktop', 'publisher' ),
				'id'             => 'bs-show-desktop',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Tablet Portrait', 'publisher' ),
				'id'             => 'bs-show-tablet',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Phone', 'publisher' ),
				'id'             => 'bs-show-phone',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
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
			),
			array(
				'name' => __( 'CSS box', 'publisher' ),
				'type' => 'css_editor',
				'id'   => 'css',
			)
		);

	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Box 1', 'publisher' ),
			"base"           => $this->id,
			"icon"           => '',
			"description"    => '',
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-box-1.png',
		);
	} // page_builder_settings

} // Publisher_Box_1_Shortcode


/**
 * Publisher Box 1 Widget
 */
class Publisher_Box_1_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-box-1',
			sprintf( __( '%s - Box 1', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'Box with background and link.', 'publisher' )
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
				'name'           => __( 'Widget Title', 'publisher' ),
				'id'             => 'title',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Box pre heading', 'publisher' ),
				'name'           => __( 'Pre heading', 'publisher' ),
				'id'             => 'text',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Box heading', 'publisher' ),
				'name'           => __( 'Heading', 'publisher' ),
				'type'           => 'text',
				'id'             => 'heading',
				//
				'vc_admin_label' => true,
			),
			array(
				'desc'           => __( 'Link of box', 'publisher' ),
				'name'           => __( 'Link', 'publisher' ),
				'type'           => 'text',
				'id'             => 'link',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Box background image', 'publisher' ),
				'type'           => 'media_image',
				'id'             => 'image',
				'data-type'      => 'id',
				//
				'vc_admin_label' => false,
			),
		);
	}
}


/**
 * Publisher Box 2
 */
class Publisher_Box_2_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-box-2';

		$_options = array(
			'defaults'              => array(
				'title'                => '',
				'show_title'           => 0,
				'icon'                 => '',
				'heading_style'        => 'default',
				'heading'              => '',
				'text'                 => '',
				'link'                 => '',
				'image'                => '',
				'bs-show-desktop'      => true,
				'bs-show-tablet'       => true,
				'bs-show-phone'        => true,
				'bs-text-color-scheme' => '',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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

		publisher_set_prop( 'shortcode-bs-box-2-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-box-2' );

		publisher_clear_props();

		return ob_get_clean();

	}


	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Box', 'publisher' ),
				'id'   => 'box',
			),
			array(
				'desc'           => __( 'Box heading', 'publisher' ),
				'name'           => __( 'Heading', 'publisher' ),
				'type'           => 'text',
				'id'             => 'heading',
				//
				'vc_admin_label' => true,
			),
			array(
				'desc'           => __( 'Link of box', 'publisher' ),
				'name'           => __( 'Link', 'publisher' ),
				'type'           => 'text',
				'id'             => 'link',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Box background image', 'publisher' ),
				'type'           => 'media_image',
				'id'             => 'image',
				'data-type'      => 'id',
				//
				'vc_admin_label' => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Custom Heading', 'publisher' ),
				'id'   => 'custom_heading',
			),
			array(
				'name'           => __( 'Title', 'publisher' ),
				'type'           => 'text',
				'id'             => 'title',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Show Title?', 'publisher' ),
				'id'             => 'show_title',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Heading Custom Color', 'publisher' ),
				'desc'           => __( 'Change block heading color.', 'publisher' ),
				'id'             => 'heading_color',
				'type'           => 'color',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'             => __( 'Custom Heading Style', 'publisher' ),
				'desc'             => __( 'Specialize this block with custom heading.', 'publisher' ),
				'id'               => 'heading_style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_heading_option_list',
					'args'     => array(
						true
					),
				),
				'column_class'     => 'one-column',
				//
				'vc_admin_label'   => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Design options', 'publisher' ),
				'id'   => 'design_options',
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Desktop', 'publisher' ),
				'id'             => 'bs-show-desktop',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Tablet Portrait', 'publisher' ),
				'id'             => 'bs-show-tablet',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Phone', 'publisher' ),
				'id'             => 'bs-show-phone',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
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
			),
			array(
				'name' => __( 'CSS box', 'publisher' ),
				'type' => 'css_editor',
				'id'   => 'css',
			)
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Box 2', 'publisher' ),
			"base"           => $this->id,
			"icon"           => '',
			'desc'           => '',
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-box-2.png',

		);
	} // page_builder_settings

} // Publisher_Box_2_Shortcode


/**
 * Publisher Box 2 Widget
 */
class Publisher_Box_2_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-box-2',
			sprintf( __( '%s - Box 2', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'Box with background and link.', 'publisher' )
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
				'name'           => __( 'Widget Title', 'publisher' ),
				'id'             => 'title',
				'type'           => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Box heading', 'publisher' ),
				'name'           => __( 'Heading', 'publisher' ),
				'type'           => 'text',
				'id'             => 'heading',
				//
				'vc_admin_label' => true,
			),
			array(
				'desc'           => __( 'Link of box', 'publisher' ),
				'name'           => __( 'Link', 'publisher' ),
				'type'           => 'text',
				'id'             => 'link',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Box background image', 'publisher' ),
				'type'           => 'media_image',
				'id'             => 'image',
				'data-type'      => 'id',
				//
				'vc_admin_label' => false,
			),
		);
	}
}


/**
 * Publisher Box 3
 */
class Publisher_Box_3_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-box-3';

		$_options = array(
			'defaults'              => array(
				'title'                => '',
				'show_title'           => 0,
				'icon'                 => '',
				'heading_style'        => 'default',
				'text_align'           => is_rtl() ? 'right' : 'left',
				'box_icon'             => '',
				'name'                 => '',
				'text'                 => '',
				'link'                 => '',
				'image'                => '',
				'bs-show-desktop'      => true,
				'bs-show-tablet'       => true,
				'bs-show-phone'        => true,
				'bs-text-color-scheme' => '',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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

		publisher_set_prop( 'shortcode-bs-box-3-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-box-3' );

		publisher_clear_props();

		return ob_get_clean();

	}


	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Box', 'publisher' ),
				'id'   => 'box',
			),
			array(
				'desc'           => __( 'Select custom icon for box.', 'publisher' ),
				'name'           => __( 'Custom Box Icon (Optional)', 'publisher' ),
				'type'           => 'icon_select',
				'id'             => 'box_icon',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Box heading', 'publisher' ),
				'name'           => __( 'Heading', 'publisher' ),
				'type'           => 'text',
				'id'             => 'heading',
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'Text align', 'publisher' ),
				'id'             => 'text_align',
				//
				'type'           => 'bf_select',
				'options'        => array(
					'left'   => __( 'Left align', 'publisher' ),
					'center' => __( 'Center align', 'publisher' ),
					'right'  => __( 'Right align', 'publisher' ),
				),
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'desc', 'publisher' ),
				'type'           => 'textarea',
				'id'             => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Link of box', 'publisher' ),
				'name'           => __( 'Link', 'publisher' ),
				'type'           => 'text',
				'id'             => 'link',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Box background image', 'publisher' ),
				'type'           => 'media_image',
				'id'             => 'image',
				'data-type'      => 'id',
				//
				'vc_admin_label' => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Custom Heading', 'publisher' ),
				'id'   => 'custom_heading',
			),
			array(
				'name'           => __( 'Title', 'publisher' ),
				'type'           => 'text',
				'id'             => 'title',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Show Title?', 'publisher' ),
				'type'           => 'switch',
				'id'             => 'show_title',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Heading Custom Color', 'publisher' ),
				'desc'           => __( 'Change block heading color.', 'publisher' ),
				'id'             => 'heading_color',
				'type'           => 'color',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'             => __( 'Custom Heading Style', 'publisher' ),
				'desc'             => __( 'Specialize this block with custom heading.', 'publisher' ),
				'id'               => 'heading_style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_heading_option_list',
					'args'     => array(
						true
					),
				),
				'column_class'     => 'one-column',
				//
				'vc_admin_label'   => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Design options', 'publisher' ),
				'id'   => 'design_options',
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Desktop', 'publisher' ),
				'id'             => 'bs-show-desktop',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Tablet Portrait', 'publisher' ),
				'id'             => 'bs-show-tablet',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Phone', 'publisher' ),
				'id'             => 'bs-show-phone',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
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
			),
			array(
				'name' => __( 'CSS box', 'publisher' ),
				'type' => 'css_editor',
				'id'   => 'css',
			)
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Box 3', 'publisher' ),
			"base"           => $this->id,
			"icon"           => '',
			'desc'           => '',
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-box-3.png',

		);
	} // page_builder_settings

} // Publisher_Box_3_Shortcode


/**
 * Publisher Box 3 Widget
 */
class Publisher_Box_3_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-box-3',
			sprintf( __( '%s - Box 3', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'Box with background and link.', 'publisher' )
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
				'name' => __( 'Widget Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'desc' => __( 'Select custom icon for box.', 'publisher' ),
				'name' => __( 'Custom Box Icon (Optional)', 'publisher' ),
				'type' => 'icon_select',
				'id'   => 'box_icon',
			),
			array(
				'desc' => __( 'Box heading', 'publisher' ),
				'name' => __( 'Heading', 'publisher' ),
				'type' => 'text',
				'id'   => 'heading',
			),
			array(
				'name'    => __( 'Text align', 'publisher' ),
				'id'      => 'text_align',
				//
				'type'    => 'bf_select',
				'options' => array(
					'left'   => __( 'Left align', 'publisher' ),
					'center' => __( 'Center align', 'publisher' ),
					'right'  => __( 'Right align', 'publisher' ),
				),
			),
			array(
				'name' => __( 'desc', 'publisher' ),
				'type' => 'textarea',
				'id'   => 'text',
			),
			array(
				'desc' => __( 'Link of box', 'publisher' ),
				'name' => __( 'Link', 'publisher' ),
				'type' => 'text',
				'id'   => 'link',
			),
			array(
				'name'      => __( 'Box background image', 'publisher' ),
				'type'      => 'media_image',
				'id'        => 'image',
				'data-type' => 'id',
			),
		);
	}
}


/**
 * Publisher Box 4
 */
class Publisher_Box_4_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-box-4';

		$_options = array(
			'defaults'              => array(
				'title'                => '',
				'show_title'           => 0,
				'icon'                 => '',
				'heading'              => '',
				'heading_style'        => 'default',
				'text_align'           => is_rtl() ? 'right' : 'left',
				'box_icon'             => '',
				'name'                 => '',
				'text'                 => '',
				'link'                 => '',
				'image'                => '',
				'bs-show-desktop'      => true,
				'bs-show-tablet'       => true,
				'bs-show-phone'        => true,
				'bs-text-color-scheme' => '',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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

		publisher_set_prop( 'shortcode-bs-box-4-atts', $atts );

		publisher_get_view( 'shortcodes', 'bs-box-4' );

		publisher_clear_props();

		return ob_get_clean();

	}


	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'Box', 'publisher' ),
				'id'   => 'box',
			),
			array(
				'desc'           => __( 'Select custom icon for box.', 'publisher' ),
				'name'           => __( 'Custom Box Icon (Optional)', 'publisher' ),
				'type'           => 'icon_select',
				'id'             => 'box_icon',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Box heading', 'publisher' ),
				'name'           => __( 'Heading', 'publisher' ),
				'type'           => 'text',
				'id'             => 'heading',
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'Text align', 'publisher' ),
				'id'             => 'text_align',
				//
				'type'           => 'bf_select',
				'options'        => array(
					'left'   => __( 'Left align', 'publisher' ),
					'center' => __( 'Center align', 'publisher' ),
					'right'  => __( 'Right align', 'publisher' ),
				),
				//
				'vc_admin_label' => true,
			),
			array(
				'name'           => __( 'desc', 'publisher' ),
				'type'           => 'textarea',
				'id'             => 'text',
				//
				'vc_admin_label' => false,
			),
			array(
				'desc'           => __( 'Link of box', 'publisher' ),
				'name'           => __( 'Link', 'publisher' ),
				'type'           => 'text',
				'id'             => 'link',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Box background image', 'publisher' ),
				'type'           => 'media_image',
				'id'             => 'image',
				'data-type'      => 'id',
				//
				'vc_admin_label' => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Custom Heading', 'publisher' ),
				'id'   => 'custom_heading',
			),
			array(
				'name'           => __( 'Title', 'publisher' ),
				'type'           => 'text',
				'id'             => 'title',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Show Title?', 'publisher' ),
				'type'           => 'switch',
				'id'             => 'show_title',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'           => __( 'Heading Custom Color', 'publisher' ),
				'desc'           => __( 'Change block heading color.', 'publisher' ),
				'id'             => 'heading_color',
				'type'           => 'color',
				//
				'vc_admin_label' => false,
			),
			array(
				'name'             => __( 'Custom Heading Style', 'publisher' ),
				'desc'             => __( 'Specialize this block with custom heading.', 'publisher' ),
				'id'               => 'heading_style',
				'type'             => 'select_popup',
				'deferred-options' => array(
					'callback' => 'publisher_cb_heading_option_list',
					'args'     => array(
						true
					),
				),
				'column_class'     => 'one-column',
				//
				'vc_admin_label'   => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Design options', 'publisher' ),
				'id'   => 'design_options',
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Desktop', 'publisher' ),
				'id'             => 'bs-show-desktop',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Tablet Portrait', 'publisher' ),
				'id'             => 'bs-show-tablet',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
			array(
				'section_class'  => 'style-floated-left bordered bf-css-edit-switch',
				'name'           => __( 'Show on Phone', 'publisher' ),
				'id'             => 'bs-show-phone',
				'type'           => 'switch',
				//
				'vc_admin_label' => false,
			),
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
			),
			array(
				'name' => __( 'CSS box', 'publisher' ),
				'type' => 'css_editor',
				'id'   => 'css',
			)
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Box 4', 'publisher' ),
			"base"           => $this->id,
			"icon"           => '',
			'desc'           => '',
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-box-4.png',

		);
	} // page_builder_settings
} // Publisher_Box_4_Shortcode


/**
 * Publisher Box 4 Widget
 */
class Publisher_Box_4_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-box-4',
			sprintf( __( '%s - Box 4', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'desc' => __( 'Box with background and link.', 'publisher' )
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
				'name' => __( 'Widget Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'desc' => __( 'Select custom icon for box.', 'publisher' ),
				'name' => __( 'Custom Box Icon (Optional)', 'publisher' ),
				'type' => 'icon_select',
				'id'   => 'box_icon',
			),
			array(
				'desc' => __( 'Box heading', 'publisher' ),
				'name' => __( 'Heading', 'publisher' ),
				'type' => 'text',
				'id'   => 'heading',
			),
			array(
				'name'    => __( 'Text align', 'publisher' ),
				'id'      => 'text_align',
				//
				'type'    => 'select',
				'options' => array(
					'left'   => __( 'Left align', 'publisher' ),
					'center' => __( 'Center align', 'publisher' ),
					'right'  => __( 'Right align', 'publisher' ),
				),
			),
			array(
				'name' => __( 'desc', 'publisher' ),
				'type' => 'textarea',
				'id'   => 'text',
			),
			array(
				'desc' => __( 'Link of box', 'publisher' ),
				'name' => __( 'Link', 'publisher' ),
				'type' => 'text',
				'id'   => 'link',
			),
			array(
				'name'      => __( 'Box background image', 'publisher' ),
				'type'      => 'media_image',
				'id'        => 'image',
				'data-type' => 'id',
			),
		);
	}
}
