<?php
/**
 * bs-thumbnail-listings.php
 *---------------------------
 * [bs-thumbnail-listing{1,2,3}] shortcodes
 *
 */


/**
 * Publisher Thumbnail Listing 1 Shortcode
 */
class Publisher_Thumbnail_Listing_1_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-thumbnail-listing-1';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 0,
				'icon'       => '',

				'category'    => '',
				'tag'         => '',
				'post_ids'    => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 4,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'listing-thumbnail-1',
				'columns' => 2,

				'tabs'            => false,
				'tabs_cat_filter' => '',
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

		add_filter( 'publisher-theme-core/pagination/filter-data/' . __CLASS__, array(
			$this,
			'append_required_atts'
		) );

		parent::__construct( $id, $_options );

	}


	/**
	 * Adds this listing custom atts to bs_pagin
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'override-listing-settings';
		$atts[] = 'listing-settings';

		return $atts;
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		// Process block level add and set props
		publisher_process_listing_block_ad( $atts );

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

		unset( $_check );

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		// Set columns
		if ( isset( $atts['columns'] ) ) {

			$atts = publisher_improve_block_atts_for_size( $atts );

			publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );
			publisher_set_prop( 'listing-columns', $atts['columns'] );
		}

		publisher_get_view( 'loop', 'listing-thumbnail-1' );
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
				),
			),
			parent::get_fields(),
			parent::block_ad_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			"name"           => __( 'Thumbnail 1', 'publisher' ),
			"base"           => $this->id,
			"description"    => __( '1 to 4 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-thumbnail-listing-1.png',
		);
	} // page_builder_settings

} // Publisher_Thumbnail_Listing_1_Shortcode


/**
 * Publisher Thumbnail Listing 1 Widget
 */
class Publisher_Thumbnail_Listing_1_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		$this->defaults['columns'] = 1;

		parent::__construct(
			'bs-thumbnail-listing-1',
			__( 'Listing - Thumbnail 1', 'publisher' ),
			array(
				'description' => __( 'Widget for Thumbnail Listing 1', 'publisher' )
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
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-thumbnail-listing-1-big-widget.png',
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
 * BS Thumbnail Listing 2 Shortcode
 */
class Publisher_Thumbnail_Listing_2_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-thumbnail-listing-2';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 0,
				'icon'       => '',

				'category'    => '',
				'tag'         => '',
				'post_ids'    => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 4,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'listing-thumbnail-2',
				'columns' => 2,

				'tabs'            => false,
				'tabs_cat_filter' => '',
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

		add_filter( 'publisher-theme-core/pagination/filter-data/' . __CLASS__, array(
			$this,
			'append_required_atts'
		) );

		parent::__construct( $id, $_options );

	}


	/**
	 * Adds this listing custom atts to bs_pagin
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'override-listing-settings';
		$atts[] = 'listing-settings';

		return $atts;
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		// Process block level add and set props
		publisher_process_listing_block_ad( $atts );

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

		unset( $_check ); // Clear memory

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		// Set columns
		if ( isset( $atts['columns'] ) ) {

			$atts = publisher_improve_block_atts_for_size( $atts, 'medium-columns' );

			publisher_set_prop( 'listing-class', sprintf( 'scolumns-%d %s', $atts['columns'], publisher_get_block_size_class() ) );
			publisher_set_prop( 'listing-columns', $atts['columns'] );
		}

		publisher_get_view( 'loop', 'listing-thumbnail-2' );
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
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
						'3' => __( '3 Column', 'publisher' ),
						'4' => __( '4 Column', 'publisher' ),
						'5' => __( '5 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
			),
			parent::get_fields(),
			parent::block_ad_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			"name"           => __( 'Thumbnail 2', 'publisher' ),
			"base"           => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'       => PUBLISHER_THEME_URI . 'images/shortcodes/bs-thumbnail-listing-2.png',
		);
	} // page_builder_settings

} // Publisher_Thumbnail_Listing_2_Shortcode


/**
 * Publisher Thumbnail Listing 2 Widget
 */
class Publisher_Thumbnail_Listing_2_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		parent::__construct(
			'bs-thumbnail-listing-2',
			__( 'Listing - Thumbnail 2', 'publisher' ),
			array(
				'description' => __( 'Widget for Thumbnail Listing 2', 'publisher' )
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
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-thumbnail-listing-2-big-widget.png',
				),
				array(
					'name' => __( 'Widget Title', 'publisher' ),
					'id'   => 'title',
					'type' => 'text',
				),
				array(
					'type'    => 'select',
					'name'    => __( 'Columns', 'publisher' ),
					'id'      => 'columns',
					'options' => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
					),
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

		// Set columns
		if ( isset( $atts['columns'] ) ) {

			$atts = publisher_improve_block_atts_for_size( $atts );

			publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );
			publisher_set_prop( 'listing-columns', $atts['columns'] );
		}

		$this->defaults['paginate']              = 'next_prev';
		$this->defaults['pagination-show-label'] = 1;
		$this->defaults['listing-settings']      = publisher_get_option( $this->get_listing_option_id() );
	}

}


/**
 * Publisher Thumbnail Listing 3 Shortcode
 */
class Publisher_Thumbnail_Listing_3_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-thumbnail-listing-3';

		$_options = array(
			'defaults'              => array(
				'title'      => '',
				'hide_title' => 0,
				'icon'       => '',

				'category'    => '',
				'tag'         => '',
				'post_ids'    => '',
				'post_type'   => '',
				'offset'      => '',
				'count'       => 4,
				'order_by'    => 'date',
				'order'       => 'DESC',
				'time_filter' => '',

				'style'   => 'listing-thumbnail-3',
				'columns' => 2,

				'tabs'            => false,
				'tabs_cat_filter' => '',
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

		add_filter( 'publisher-theme-core/pagination/filter-data/' . __CLASS__, array(
			$this,
			'append_required_atts'
		) );

		parent::__construct( $id, $_options );

	}


	/**
	 * Adds this listing custom atts to bs_pagin
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'override-listing-settings';
		$atts[] = 'listing-settings';

		return $atts;
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		// Process block level add and set props
		publisher_process_listing_block_ad( $atts );

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

		unset( $_check ); // Clear memory

		// Change title tag to p for adding more priority to content heading tags.
		if ( bf_get_current_sidebar() || publisher_inject_location_get_status() ) {
			publisher_set_blocks_title_tag( 'p' );
		}

		// Set columns
		if ( isset( $atts['columns'] ) ) {

			$atts = publisher_improve_block_atts_for_size( $atts );

			publisher_set_prop( 'listing-class', sprintf( 'columns-%d', $atts['columns'] ) );
			publisher_set_prop( 'listing-columns', $atts['columns'] );
		}

		publisher_get_view( 'loop', 'listing-thumbnail-3' );
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
				),
			),
			parent::get_fields(),
			parent::block_ad_fields()
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			"name"           => __( 'Thumbnail 3', 'publisher' ),
			"base"           => $this->id,
			"description"    => __( '1 to 4 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'              => PUBLISHER_THEME_URI . 'images/shortcodes/bs-thumbnail-listing-3.png',
		);
	} // page_builder_settings

} // Publisher_Thumbnail_Listing_3_Shortcode


/**
 * Publisher Thumbnail Listing 3 Widget
 */
class Publisher_Thumbnail_Listing_3_Widget extends Publisher_Theme_Listing_Widget {

	/**
	 * Register widget.
	 */
	function __construct() {

		parent::__construct(
			'bs-thumbnail-listing-3',
			__( 'Listing - Thumbnail 3', 'publisher' ),
			array(
				'description' => __( 'Widget for Thumbnail Listing 3', 'publisher' )
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
					'name' => '',
					'id'   => '_help_img',
					'type' => 'image_preview',
					'std'  => PUBLISHER_THEME_URI . 'images/shortcodes/bs-thumbnail-listing-3-big-widget.png',
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
