<?php
/**
 * bs-user-listing-1.php
 *---------------------------
 * [bs-user-listing-1,2,3,4,5] shortcode
 *
 */


/**
 * Publisher User Listing 1
 */
class Publisher_User_Listing_1_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-user-listing-1';

		$_options = array(
			'defaults'              => array(
				'columns' => 1,
				'style'   => 'user-listing-1',
			),
			'have_widget'    => TRUE,
			'have_vc_add_on' => TRUE,

			'query_type' => 'user',
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		publisher_set_prop( $this->id, $atts );
		publisher_set_prop( 'user-query', $this->get_query() );
		publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );

		publisher_get_view( 'loop', 'listing-user-1' );
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'    => __( 'Columns', 'publisher' ),
					'id'      => 'columns',
					//
					'type'    => 'select',
					'options' => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
					),
				),
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'User 1', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-1.png',
		);
	} // page_builder_settings
} // Publisher_User_Listing_1_Shortcode


/**
 * Publisher User Listing 1 Widget
 */
class Publisher_User_Listing_1_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		$this->defaults['columns'] = 1;

		parent::__construct(
			'bs-user-listing-1',
			__( 'Listing - User 1', 'publisher' ),
			array(
				'description' => __( 'Widget for Listing Authors', 'publisher' )
			),
			false,
			'user'
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array_merge(
			array(
				array(
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-1-big-widget.png',
				),
				array(
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
				),
			),
			$this->fields_map_listing_filters(),
			$this->fields_map_listing_tabs(),
			$this->fields_map_listing_pagination(),
			$this->fields_map_listing_design()
		);
	}


	/**
	 * Loads widget -> shortcode default attrs
	 */
	public function load_defaults() {

		if ( $this->defaults_loaded ) {
			return;
		}

		$this->defaults_loaded = true;
		$this->defaults        = BF_Shortcodes_Manager::factory( $this->base_widget_id )->defaults;

		$this->defaults['paginate']              = 'next_prev';
		$this->defaults['pagination-show-label'] = 1;
		$this->defaults['columns']               = 1;
		$this->defaults['listing-settings']      = publisher_get_option( $this->get_listing_option_id() );
	}
}


/**
 * Publisher User Listing 2
 */
class Publisher_User_Listing_2_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-user-listing-2';

		$_options = array(
			'defaults'              => array(
				'columns' => 1,
				'style'   => 'user-listing-2',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,

			'query_type' => 'user',
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {


		publisher_set_prop( $this->id, $atts );
		publisher_set_prop( 'user-query', $this->get_query() );
		publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );

		publisher_get_view( 'loop', 'listing-user-2' );
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'    => __( 'Columns', 'publisher' ),
					'id'      => 'columns',
					//
					'type'    => 'select',
					'options' => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
					),
				),
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'User 2', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-2.png',
		);
	} // page_builder_settings
} // Publisher_User_Listing_2_Shortcode


/**
 * Publisher User Listing 2 Widget
 */
class Publisher_User_Listing_2_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		$this->defaults['columns'] = 1;

		parent::__construct(
			'bs-user-listing-2',
			__( 'Listing - User 2', 'publisher' ),
			array(
				'description' => __( 'Widget for Listing Authors', 'publisher' )
			),
			false,
			'user'
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array_merge(
			array(
				array(
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-2-big-widget.png',
				),
				array(
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
				),
			),
			$this->fields_map_listing_filters(),
			$this->fields_map_listing_tabs(),
			$this->fields_map_listing_pagination(),
			$this->fields_map_listing_design()
		);
	}


	/**
	 * Loads widget -> shortcode default attrs
	 */
	public function load_defaults() {

		if ( $this->defaults_loaded ) {
			return;
		}

		$this->defaults_loaded = true;
		$this->defaults        = BF_Shortcodes_Manager::factory( $this->base_widget_id )->defaults;

		$this->defaults['paginate']              = 'next_prev';
		$this->defaults['pagination-show-label'] = 1;
		$this->defaults['columns']               = 1;
		$this->defaults['listing-settings']      = publisher_get_option( $this->get_listing_option_id() );
	}
}


/**
 * Publisher User Listing 3
 */
class Publisher_User_Listing_3_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-user-listing-3';

		$_options = array(
			'defaults'              => array(
				'columns' => '',
				'style'   => 'user-listing-3',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,

			'query_type' => 'user',
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		publisher_set_prop( $this->id, $atts );
		publisher_set_prop( 'user-query', $this->get_query() );
		publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );
		publisher_set_prop( 'listing-columns', $atts['columns'] );

		publisher_get_view( 'loop', 'listing-user-3' );
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'    => __( 'Columns', 'publisher' ),
					'id'      => 'columns',
					//
					'type'    => 'select',
					'options' => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
					),
				),
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'User 3', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-3.png',
		);
	} // page_builder_settings
} // Publisher_User_Listing_3_Shortcode


/**
 * Publisher User Listing 3 Widget
 */
class Publisher_User_Listing_3_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		$this->defaults['columns'] = 1;

		parent::__construct(
			'bs-user-listing-3',
			__( 'Listing - User 3', 'publisher' ),
			array(
				'description' => __( 'Widget for Listing Authors', 'publisher' )
			),
			false,
			'user'
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array_merge(
			array(
				array(
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-3-big-widget.png',
				),
				array(
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
				),
			),
			$this->fields_map_listing_filters(),
			$this->fields_map_listing_tabs(),
			$this->fields_map_listing_pagination(),
			$this->fields_map_listing_design()
		);
	}


	/**
	 * Loads widget -> shortcode default attrs
	 */
	public function load_defaults() {

		if ( $this->defaults_loaded ) {
			return;
		}

		$this->defaults_loaded = true;
		$this->defaults        = BF_Shortcodes_Manager::factory( $this->base_widget_id )->defaults;

		$this->defaults['paginate']              = 'next_prev';
		$this->defaults['pagination-show-label'] = 1;
		$this->defaults['columns']               = 1;
		$this->defaults['listing-settings']      = publisher_get_option( $this->get_listing_option_id() );
	}
}


/**
 * Publisher User Listing 4
 */
class Publisher_User_Listing_4_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-user-listing-4';

		$_options = array(
			'defaults'              => array(
				'columns' => 3,
				'style'   => 'user-listing-4',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,

			'query_type' => 'user',
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {


		publisher_set_prop( $this->id, $atts );
		publisher_set_prop( 'user-query', $this->get_query() );
		publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );

		publisher_get_view( 'loop', 'listing-user-4' );
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'    => __( 'Columns', 'publisher' ),
					'id'      => 'columns',
					//
					'type'    => 'select',
					'options' => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
						'4' => __( '4 Column', 'publisher' ),
						'5' => __( '5 Column', 'publisher' ),
					),
				),
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'User 4', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-4.png',
		);
	} // page_builder_settings
} // Publisher_User_Listing_4_Shortcode


/**
 * Publisher User Listing 4 Widget
 */
class Publisher_User_Listing_4_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		$this->defaults['columns'] = 1;

		parent::__construct(
			'bs-user-listing-4',
			__( 'Listing - User 4', 'publisher' ),
			array(
				'description' => __( 'Widget for Listing Authors', 'publisher' )
			),
			false,
			'user'
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array_merge(
			array(
				array(
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-4-big-widget.png',
				),
				array(
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
				),
			),
			$this->fields_map_listing_filters(),
			$this->fields_map_listing_tabs(),
			$this->fields_map_listing_pagination(),
			$this->fields_map_listing_design()
		);
	}


	/**
	 * Loads widget -> shortcode default attrs
	 */
	public function load_defaults() {

		if ( $this->defaults_loaded ) {
			return;
		}

		$this->defaults_loaded = true;
		$this->defaults        = BF_Shortcodes_Manager::factory( $this->base_widget_id )->defaults;

		$this->defaults['paginate']              = 'next_prev';
		$this->defaults['pagination-show-label'] = 1;
		$this->defaults['columns']               = 1;
		$this->defaults['listing-settings']      = publisher_get_option( $this->get_listing_option_id() );
	}
}


/**
 * Publisher User Listing 5
 */
class Publisher_User_Listing_5_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-user-listing-5';

		$_options = array(
			'defaults'              => array(
				'columns' => 3,
				'style'   => 'user-listing-5',
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,

			'query_type' => 'user',
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {


		publisher_set_prop( $this->id, $atts );
		publisher_set_prop( 'user-query', $this->get_query() );
		publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );

		publisher_get_view( 'loop', 'listing-user-5' );
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'    => __( 'Columns', 'publisher' ),
					'id'      => 'columns',
					//
					'type'    => 'select',
					'options' => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
						'4' => __( '4 Column', 'publisher' ),
						'5' => __( '5 Column', 'publisher' ),
					),
				),
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'User 5', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-5.png',
		);
	} // page_builder_settings
} // Publisher_User_Listing_5_Shortcode


/**
 * Publisher User Listing 5 Widget
 */
class Publisher_User_Listing_5_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		$this->defaults['columns'] = 1;

		parent::__construct(
			'bs-user-listing-5',
			__( 'Listing - User 5', 'publisher' ),
			array(
				'description' => __( 'Widget for Listing Authors', 'publisher' )
			),
			false,
			'user'
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array_merge(
			array(
				array(
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-user-listing-5-big-widget.png',
				),
				array(
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
				),
			),
			$this->fields_map_listing_filters(),
			$this->fields_map_listing_tabs(),
			$this->fields_map_listing_pagination(),
			$this->fields_map_listing_design()
		);
	}


	/**
	 * Loads widget -> shortcode default attrs
	 */
	public function load_defaults() {

		if ( $this->defaults_loaded ) {
			return;
		}

		$this->defaults_loaded = true;
		$this->defaults        = BF_Shortcodes_Manager::factory( $this->base_widget_id )->defaults;

		$this->defaults['paginate']              = 'next_prev';
		$this->defaults['pagination-show-label'] = 1;
		$this->defaults['columns']               = 1;
		$this->defaults['listing-settings']      = publisher_get_option( $this->get_listing_option_id() );
	}
}
