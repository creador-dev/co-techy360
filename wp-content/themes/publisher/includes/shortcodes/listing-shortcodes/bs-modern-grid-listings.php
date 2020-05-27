<?php


/**
 * bs-modern-grid-listings.php
 *---------------------------
 * [bs-modern-grid-listing-[1,2,3] shortcode
 *
 */
class Publisher_Modern_Grid_Listing_Shortcode extends Publisher_Theme_Listing_Shortcode {

	/**
	 * Publisher_Modern_Grid_Listing_Shortcode constructor.
	 */
	public function __construct( $id, $options ) {

		parent::__construct( $id, $options );

		add_filter( 'publisher-theme-core/pagination/filter-data/' . get_class( $this ), array(
			$this,
			'append_required_atts'
		) );
	}


	/**
	 * Adds modern listing custom atts to bs_pagin
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'overlay';
		$atts[] = 'text-color';
		$atts[] = 'override-listing-settings';
		$atts[] = 'listing-settings';

		return $atts;
	}

}


/**
 * Publisher Modern Grid Listing 1
 */
class Publisher_Modern_Grid_Listing_1_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-1';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'post_ids'    => '',
				'category'    => '',
				'tag'         => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 4,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'modern-grid-listing-1',
				'overlay' => 'simple-gr',

				'tabs_cat_filter' => '',
				'tabs'            => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = 'slider-overlay-' . $atts['overlay'];
		$atts  = publisher_improve_block_atts_for_size( $atts, 'mg-1' );

		if ( isset( $atts['mg-layout'] ) ) {
			$class .= " {$atts['mg-layout']}";
		}

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-1' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 1', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/bs-modern-grid-1.png',
		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_1_Shortcode


/**
 * Publisher Modern Grid Listing 2
 */
class Publisher_Modern_Grid_Listing_2_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-2';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'category'        => '',
				'tag'             => '',
				'post_ids'        => '',
				'post_type'       => '',
				'offset'          => '',
				'tabs_cat_filter' => '',
				'tabs'            => '',
				'count'           => 5,
				'order_by'        => 'date',
				'order'           => 'DESC',
				'time_filter'     => '',

				'style'   => 'modern-grid-listing-2',
				'overlay' => 'simple-gr',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}


		$class = 'slider-overlay-' . $atts['overlay'];
		$atts  = publisher_improve_block_atts_for_size( $atts, 'mg-2' );

		if ( isset( $atts['mg-layout'] ) ) {
			$class .= " {$atts['mg-layout']}";
		}

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-2' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 2', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/bs-modern-grid-2.png',
		);
	} // page_builder_settings
} // Publisher_Modern_Grid_Listing_2_Shortcode


/**
 * Publisher Modern Grid Listing 3
 */
class Publisher_Modern_Grid_Listing_3_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-3';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'category'        => '',
				'tag'             => '',
				'post_ids'        => '',
				'post_type'       => '',
				'offset'          => '',
				'tabs_cat_filter' => '',
				'tabs'            => '',
				'count'           => 3,
				'order_by'        => 'date',
				'order'           => 'DESC',
				'time_filter'     => '',

				'style'   => 'modern-grid-listing-3',
				'overlay' => 'simple-gr',
				'columns' => 3,
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
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
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = '';

		// Set columns
		if ( isset( $atts['columns'] ) ) {
			$atts = publisher_improve_block_atts_for_size( $atts, 'mg-3' );

			if ( isset( $atts['mg-layout'] ) ) {
				$class .= " {$atts['mg-layout']}";
			}

			publisher_set_prop( 'listing-columns', $atts['columns'] );
		}

		$class .= ' slider-overlay-' . $atts['overlay'] . ' columns-' . $atts['columns'];

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-3' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
						'4' => __( '4 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				)
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Modern Grid 3', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/bs-modern-grid-3.png',
		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_3_Shortcode


/**
 * Publisher Modern Grid Listing 3 Widget
 */
class Publisher_Modern_Grid_Listing_3_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		parent::__construct(
			'bs-modern-grid-listing-3',
			__( 'Listing - MG 3', 'publisher' ),
			array(
				'desc' => __( 'Widget for Modern Grid 3', 'publisher' )
			)
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
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
					'desc' => __( 'If you select category in post filters then the category will be shown in widget title by default.', 'publisher' ),
				),
				array(
					'type'      => 'switch',
					'name'      => __( 'Hide Widget Title', 'publisher' ),
					'id'        => 'hide_name',
					'off-label' => __( 'Show', 'publisher' ),
					'on-label'  => __( 'Hide', 'publisher' ),
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

		$this->defaults['paginate']                 = 'slider';
		$this->defaults['slider-control-dots']      = 'style-1';
		$this->defaults['slider-control-next-prev'] = 'off';
		$this->defaults['pagination-slides-count']  = 5;
		$this->defaults['count']                    = 1;
		$this->defaults['columns']                  = 1;
		$this->defaults['listing-settings']         = publisher_get_option( $this->get_listing_option_id() );
	}
}


/**
 * Publisher Modern Grid Listing 4
 */
class Publisher_Modern_Grid_Listing_4_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-4';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'category'        => '',
				'tag'             => '',
				'post_ids'        => '',
				'post_type'       => '',
				'offset'          => '',
				'tabs_cat_filter' => '',
				'tabs'            => '',
				'count'           => 4,
				'order_by'        => 'date',
				'order'           => 'DESC',
				'time_filter'     => '',

				'style'   => 'modern-grid-listing-4',
				'overlay' => 'simple-gr',
				'columns' => 4,
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
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
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		$_check = array(
			'more_btn'          => '',
			'infinity'          => '',
			'more_btn_infinity' => '',
		);

		if ( isset( $_check[ $pagin_button ] ) ) {
			publisher_set_prop( 'show-listing-wrapper', false );
			$atts['bs-pagin-add-to']   = '.listing';
			$atts['bs-pagin-add-type'] = 'append';
		}

		unset( $_check ); // clear memory

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = '';

		// Set columns
		if ( isset( $atts['columns'] ) ) {
			$atts = publisher_improve_block_atts_for_size( $atts, 'mg-4' );

			if ( isset( $atts['mg-layout'] ) ) {
				$class .= " {$atts['mg-layout']}";
			}

			publisher_set_prop( 'listing-columns', $atts['columns'] );
		}

		$class .= ' slider-overlay-' . $atts['overlay'] . ' columns-' . $atts['columns'];

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-4' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
						'4' => __( '4 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				)
			),
			parent::get_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Modern Grid 4', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-4.png',

		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_4_Shortcode


/**
 * Publisher Modern Grid Listing 4 Widget
 */
class Publisher_Modern_Grid_Listing_4_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		parent::__construct(
			'bs-modern-grid-listing-4',
			__( 'Listing - MG 4', 'publisher' ),
			array(
				'desc' => __( 'Widget for Modern Grid 4', 'publisher' )
			)
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
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
					'desc' => __( 'If you select category in post filters then the category will be shown in widget title by default.', 'publisher' ),
				),
				array(
					'type'      => 'switch',
					'name'      => __( 'Hide Widget Title', 'publisher' ),
					'id'        => 'hide_name',
					'off-label' => __( 'Show', 'publisher' ),
					'on-label'  => __( 'Hide', 'publisher' ),
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

		$this->defaults['paginate']                 = 'slider';
		$this->defaults['slider-control-dots']      = 'style-1';
		$this->defaults['slider-control-next-prev'] = 'off';
		$this->defaults['pagination-slides-count']  = 5;
		$this->defaults['count']                    = 1;
		$this->defaults['columns']                  = 1;
		$this->defaults['listing-settings']         = publisher_get_option( $this->get_listing_option_id() );
	}
}


/**
 * Publisher Modern Grid Listing 5
 */
class Publisher_Modern_Grid_Listing_5_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-5';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'text-color' => '',

				'category'        => '',
				'tag'             => '',
				'post_ids'        => '',
				'post_type'       => '',
				'offset'          => '',
				'tabs_cat_filter' => '',
				'tabs'            => '',
				'count'           => 5,
				'order_by'        => 'date',
				'order'           => 'DESC',
				'time_filter'     => '',

				'style'   => 'modern-grid-listing-5',
				'overlay' => 'simple-gr',
				'columns' => '',
			),
			'have_widget'           => false,
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

		//
		// Adds style for texts of items
		//
		if ( ! empty( $atts['text-color'] ) && ! bf_is_doing_ajax() ) {

			$class = bf_shortcode_custom_css_class( $atts );

			if ( empty( $class ) ) {
				$class = 'listing-modern-grid-5_' . rand( 100, 900000 );
			}

			if ( ! empty( $atts['css-class'] ) ) {
				$atts['css-class'] .= ' ' . $class;
			} else {
				$atts['css-class'] = $class;
			}

			bf_add_css( '.' . $class . ' .listing-mg-5-item .title a,.' . $class . ' .post-meta, .' . $class . ' .post-meta a, .' . $class . ' .post-meta .post-author{color: ' . $atts['text-color'] . ' !important}', true, true );
		}

		return parent::display( $atts, $content );

	} // display


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = '';

		// Set columns
		$atts = publisher_improve_block_atts_for_size( $atts, 'mg-5' );

		if ( isset( $atts['mg-layout'] ) ) {
			$class .= " {$atts['mg-layout']}";
		}

		$class .= ' bsw-' . publisher_get_block_size();
		$class .= ' slider-overlay-' . $atts['overlay'];

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-5' );
	}


	public function get_fields() {

		return array_merge(
			$this->heading_fields(),
			$this->filter_fields(),
			$this->tab_fields(),
			$this->pagination_fields(),
			$this->option_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Modern Grid 5', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-5.png',
		);
	} // page_builder_settings


	/**
	 * Override to add new text color design option
	 *
	 * @return array
	 */
	//	function option_fields() {
	//
	//		$fields = parent::option_fields();
	//
	//		$fields = bf_array_insert_before( 'css', $fields, 'text-color', array(
	//			'desc'           => __( 'Change color of texts with this option.', 'publisher' ),
	//			'name'           => __( 'Texts Color', 'publisher' ),
	//			'id'             => 'text-color',
	//			'type'           => 'color',
	//			//
	//			'vc_admin_label' => true,
	//		) );
	//
	//		return $fields;
	//	} // option_fields

} // Publisher_Modern_Grid_Listing_5_Shortcode


/**
 * Publisher Modern Grid Listing 6
 */
class Publisher_Modern_Grid_Listing_6_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-6';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'post_ids'    => '',
				'category'    => '',
				'tag'         => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 2,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'modern-grid-listing-6',
				'overlay' => 'simple-gr',

				'tabs_cat_filter' => '',
				'tabs'            => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		publisher_set_prop( 'listing-class', 'slider-overlay-' . $atts['overlay'] . ' bsw-' . publisher_get_block_size() );

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		publisher_get_view( 'loop', 'listing-modern-grid-6' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 6', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-6.png',
		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_6_Shortcode


/**
 * Publisher Modern Grid Listing 7
 */
class Publisher_Modern_Grid_Listing_7_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-7';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'post_ids'    => '',
				'category'    => '',
				'tag'         => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 5,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'modern-grid-listing-7',
				'overlay' => 'simple-gr',

				'tabs_cat_filter' => '',
				'tabs'            => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		publisher_set_prop( 'listing-class', 'slider-overlay-' . $atts['overlay'] . ' bsw-' . publisher_get_block_size() );

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		publisher_get_view( 'loop', 'listing-modern-grid-7' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 7', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-7.png',
		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_7_Shortcode


/**
 * Publisher Modern Grid Listing 8
 */
class Publisher_Modern_Grid_Listing_8_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-8';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'post_ids'    => '',
				'category'    => '',
				'tag'         => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 5,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'modern-grid-listing-8',
				'overlay' => 'simple-gr',

				'tabs_cat_filter' => '',
				'tabs'            => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = 'slider-overlay-' . $atts['overlay'];
		$atts  = publisher_improve_block_atts_for_size( $atts, 'mg-8' );

		if ( isset( $atts['mg-layout'] ) ) {
			$class .= " {$atts['mg-layout']}";
		}

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-8' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 8', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-8.png',
		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_8_Shortcode


/**
 * Publisher Modern Grid Listing 9
 */
class Publisher_Modern_Grid_Listing_9_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-9';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'category'        => '',
				'tag'             => '',
				'post_ids'        => '',
				'post_type'       => '',
				'offset'          => '',
				'tabs_cat_filter' => '',
				'tabs'            => '',
				'count'           => 7,
				'order_by'        => 'date',
				'order'           => 'DESC',
				'time_filter'     => '',

				'style'   => 'modern-grid-listing-9',
				'overlay' => 'simple-gr',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = 'slider-overlay-' . $atts['overlay'];
		$atts  = publisher_improve_block_atts_for_size( $atts, 'mg-9' );

		if ( isset( $atts['mg-layout'] ) ) {
			$class .= " {$atts['mg-layout']}";
		}

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-9' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 9', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-9.png',
		);
	} // page_builder_settings
} // Publisher_Modern_Grid_Listing_9_Shortcode


/**
 * Publisher Modern Grid Listing 10
 */
class Publisher_Modern_Grid_Listing_10_Shortcode extends Publisher_Modern_Grid_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-modern-grid-listing-10';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 1,
				'icon'       => '',

				'post_ids'    => '',
				'category'    => '',
				'tag'         => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 6,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'modern-grid-listing-10',
				'overlay' => 'simple-gr',

				'tabs_cat_filter' => '',
				'tabs'            => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
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

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		$class = 'slider-overlay-' . $atts['overlay'];
		$atts  = publisher_improve_block_atts_for_size( $atts, 'mg-10' );

		if ( isset( $atts['mg-layout'] ) ) {
			$class .= " {$atts['mg-layout']}";
		}

		publisher_set_prop( 'listing-class', $class );
		publisher_get_view( 'loop', 'listing-modern-grid-10' );
	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Style', 'publisher' ),
					'id'   => 'style',
				),
				array(
					'name'           => __( 'Overlay style', 'publisher' ),
					'id'             => 'overlay',
					//
					'type'           => 'select',
					'options'        => array(
						'colored'      => __( 'Colored Gradient', 'publisher' ),
						'colored-anim' => __( 'Animated Gradient', 'publisher' ),
						'simple-gr'    => __( 'Simple Gradient', 'publisher' ),
						'simple'       => __( 'Simple', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
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
			'name'           => __( 'Modern Grid 10', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-modern-grid-10.png',
		);
	} // page_builder_settings

} // Publisher_Modern_Grid_Listing_10_Shortcode
