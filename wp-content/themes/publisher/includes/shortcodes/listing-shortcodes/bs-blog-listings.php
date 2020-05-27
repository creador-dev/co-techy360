<?php
/**
 * bs-blog-listings.php
 *---------------------------
 * [bs-blog-listing-1] shortcode
 *
 */


/**
 * Publisher Blog Listing 1
 */
class Publisher_Blog_Listing_1_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-blog-listing-1';

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

				'style'         => 'listing-blog-1',
				'columns'       => 1,
				'show_excerpt'  => 1,
				'heading_style' => 'default',

				'tabs'            => false,
				'tabs_cat_filter' => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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
	 * @param $atts
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'show_excerpt';
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

		unset( $_check ); // clear memory

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

		publisher_set_prop( 'show-excerpt', $atts['show_excerpt'] );
		publisher_get_view( 'loop', 'listing-blog-1' );

	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'You can hide post excerpt with turning off this field.', 'publisher' ),
					'name'           => __( 'Show Post Excerpt?', 'publisher' ),
					'section_class'  => 'style-floated-left bordered',
					'id'             => 'show_excerpt',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
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
			'name'           => __( 'Blog 1', 'publisher' ),
			"base"           => $this->id,
			'desc'           => __( '1 and 2 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'              => PUBLISHER_THEME_URI . '/images/shortcodes/bs-blog-listing-1.png',

		);
	} // page_builder_settings

} // Publisher_Blog_Listing_1_Shortcode


/**
 * Publisher Blog Listing 2
 */
class Publisher_Blog_Listing_2_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-blog-listing-2';

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

				'style'        => 'listing-blog-2',
				'columns'      => 1,
				'show_excerpt' => 1,

				'tabs'            => false,
				'tabs_cat_filter' => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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
	 * @param $atts
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'show_excerpt';
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

		publisher_set_prop( 'show-excerpt', $atts['show_excerpt'] );
		publisher_get_view( 'loop', 'listing-blog-2' );

	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'You can hide post excerpt with turning off this field.', 'publisher' ),
					'name'           => __( 'Show Post Excerpt?', 'publisher' ),
					'section_class'  => 'style-floated-left bordered',
					'id'             => 'show_excerpt',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
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
			'name'           => __( 'Blog 2', 'publisher' ),
			"base"           => $this->id,
			'desc'           => __( '1 and 2 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'              => PUBLISHER_THEME_URI . '/images/shortcodes/bs-blog-listing-2.png',

		);
	} // page_builder_settings

} // Publisher_Blog_Listing_2_Shortcode


/**
 * Publisher Blog Listing 3
 */
class Publisher_Blog_Listing_3_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-blog-listing-3';

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

				'style'        => 'listing-blog-3',
				'columns'      => 1,
				'show_excerpt' => 1,

				'tabs'            => false,
				'tabs_cat_filter' => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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
	 * @param $atts
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'show_excerpt';
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

		unset( $_check ); // clear memory

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

		publisher_set_prop( 'show-excerpt', $atts['show_excerpt'] );
		publisher_get_view( 'loop', 'listing-blog-3' );

	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'You can hide post excerpt with turning off this field.', 'publisher' ),
					'name'           => __( 'Show Post Excerpt?', 'publisher' ),
					'section_class'  => 'style-floated-left bordered',
					'id'             => 'show_excerpt',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
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
			'name'           => __( 'Blog 3', 'publisher' ),
			"base"           => $this->id,
			'desc'           => __( '1 and 2 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'              => PUBLISHER_THEME_URI . '/images/shortcodes/bs-blog-listing-3.png',

		);
	} // page_builder_settings

} // Publisher_Blog_Listing_3_Shortcode


/**
 * Publisher Blog Listing 4
 */
class Publisher_Blog_Listing_4_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-blog-listing-4';

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

				'style'        => 'listing-blog-4',
				'columns'      => 1,
				'show_excerpt' => 1,

				'tabs'            => false,
				'tabs_cat_filter' => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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
	 * @param $atts
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'show_excerpt';
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

		publisher_set_prop( 'show-excerpt', $atts['show_excerpt'] );
		publisher_get_view( 'loop', 'listing-blog-4' );

	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'You can hide post excerpt with turning off this field.', 'publisher' ),
					'name'           => __( 'Show Post Excerpt?', 'publisher' ),
					'section_class'  => 'style-floated-left bordered',
					'id'             => 'show_excerpt',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
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
			'name'           => __( 'Blog 4', 'publisher' ),
			"base"           => $this->id,
			'desc'           => __( '1 and 2 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'              => PUBLISHER_THEME_URI . '/images/shortcodes/bs-blog-listing-4.png',
		);
	} // page_builder_settings

} // Publisher_Blog_Listing_4_Shortcode


/**
 * Publisher Blog Listing 5
 */
class Publisher_Blog_Listing_5_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-blog-listing-5';

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

				'style'        => 'listing-blog-1',
				'columns'      => 1,
				'show_excerpt' => 1,

				'tabs'            => false,
				'tabs_cat_filter' => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_gutenberg_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
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
	 * @param $atts
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		$atts[] = 'columns';
		$atts[] = 'show_excerpt';
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

		publisher_set_prop( 'show-excerpt', isset( $atts['show_excerpt'] ) ? $atts['show_excerpt'] : null );
		publisher_get_view( 'loop', 'listing-blog-5' );

	}


	public function get_fields() {

		return array_merge(
			array(
				array(
					'type' => 'tab',
					'name' => __( 'General', 'publisher' ),
					'id'   => 'general',
				),
				array(
					'name'           => __( 'Columns', 'publisher' ),
					'id'             => 'columns',
					//
					'type'           => 'select',
					'options'        => array(
						'1' => __( '1 Column', 'publisher' ),
						'2' => __( '2 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'desc'           => __( 'You can hide post excerpt with turning off this field.', 'publisher' ),
					'name'           => __( 'Show Post Excerpt?', 'publisher' ),
					'section_class'  => 'style-floated-left bordered',
					'id'             => 'show_excerpt',
					'type'           => 'switch',
					//
					'vc_admin_label' => false,
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
			'name'           => __( 'Blog 5', 'publisher' ),
			"base"           => $this->id,
			"description"    => __( '1 and 2 Column', 'publisher' ),
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
			'icon_url'              => PUBLISHER_THEME_URI . '/images/shortcodes/bs-blog-listing-5.png',
		);
	} // page_builder_settings

} // Publisher_Blog_Listing_5_Shortcode
