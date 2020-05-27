<?php


/**
 * Publisher Products 1
 */
class Publisher_Products_1_Shortcode extends Publisher_Theme_Listing_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-products-1';

		$this->name = __( 'Products', 'publisher' );

		$this->description = '';

		$_options = array(
			'defaults'              => array(
				'title'           => publisher_translation_get( 'products' ),
				'hide_title'      => 0,
				'icon'            => '',
				'heading_color'   => '',
				'heading_style'   => 'default',
				//
				'post_ids'        => '',
				'category'        => '',
				'tag'             => '',
				'post_type'       => 'product',
				'offset'          => '',
				'count'           => 8,
				'order_by'        => 'date',
				'order'           => '',
				'time_filter'     => '',
				'columns'         => 4,
				'style'           => 'products',
				//
				'tabs_cat_filter' => '',
				'tabs'            => '',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => true,
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => true,
		);

		add_filter( 'publisher-theme-core/pagination/filter-data/' . __CLASS__, array(
			$this,
			'append_required_atts'
		) );

		add_filter( 'publisher-theme-core/pagination-manager/query/args', array( $this, 'filter_query_args' ), 10, 3 );

		$_options = bf_merge_args( $_options, $options );

		parent::__construct( $id, $_options );

	}


	/**
	 * Adds this listing custom atts to bs_pagin
	 *
	 * @return array
	 */
	public function append_required_atts( $atts ) {

		return array_merge(
			$atts,
			array(
				'columns',
				'tax_query',
			)
		);
	}


	/**
	 * Display the inner content of listing
	 *
	 * @param string $atts         Attribute of shortcode or ajax action
	 * @param string $tab          Tab
	 * @param string $pagin_button Ajax action button
	 */
	function display_content( &$atts, $tab = '', $pagin_button = '' ) {

		publisher_set_prop( 'shortcode-bs-products-1-atts', $atts );

		publisher_get_view( 'woocommerce', 'shortcodes/bs-products-1' );
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => $this->name,
			"base"           => $this->id,
			"icon"           => $this->icon,
			"description"    => $this->description,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => publisher_white_label_get_option( 'publisher' ),
		);
	} // page_builder_settings


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
						'3' => __( '3 Column', 'publisher' ),
						'4' => __( '4 Column', 'publisher' ),
						'5' => __( '5 Column', 'publisher' ),
					),
					//
					'vc_admin_label' => true,
				),
			),
			$this->heading_fields(),
			array(
				array(
					'type' => 'tab',
					'name' => __( 'Products Filter', 'publisher' ),
					'id'   => 'products_filter',
				)
			),
			array(
				array(
					'name'           => __( 'Categories', 'publisher' ),
					'id'             => 'category',
					//
					'type'           => 'select',
					'options'        => array(
						'' => __( 'All Posts', 'publisher' ),
						array(
							'label'   => __( 'Categories', 'publisher' ),
							'options' => array(
								'category_walker' => array(
									'taxonomy' => 'product_cat'
								)
							),
						),
					),
					//
					'vc_admin_label' => true,
				),
				array(
					'description'    => __( "Filter multiple products by ID. Enter here the product IDs separated by commas (ex: 10,27,233). To exclude products from this block add them with '-' (ex: -7, -16)", 'publisher' ),
					'name'           => __( 'Product ID filter', 'publisher' ),
					'id'             => 'post_ids',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),
				array(
					"description"    => __( 'If the field is empty the limit product number will be the number from WordPress Settings -> Reading.', 'publisher' ),
					'name'           => __( 'Number of Products', 'publisher' ),
					'id'             => 'count',
					'type'           => 'text',
					//
					'vc_admin_label' => true,
				),
				array(
					'name'           => __( 'Order By', 'publisher' ),
					'id'             => 'order_by',
					//
					'type'           => 'select',
					'options'        => array(
						''           => __( 'Default order', 'publisher' ),
						'popularity' => __( 'Sort popularity', 'publisher' ),
						'rating'     => __( 'Sort by average rating', 'publisher' ),
						'date'       => __( 'Sort by newsness', 'publisher' ),
						'price'      => __( 'Sort by price: low to high', 'publisher' ),
						'price-desc' => __( 'Sort by price: high to low', 'publisher' ),
						'rand'       => __( 'Random', 'publisher' ),
					),
					//
					'vc_admin_label' => false,
				),
				array(
					'name'           => __( 'Time Filter', 'publisher' ),
					'id'             => 'time_filter',
					//
					'type'           => 'select',
					'options'        => array(
						''          => __( 'No Filter', 'publisher' ),
						'today'     => __( 'Today Products', 'publisher' ),
						'yesterday' => __( 'Today + Yesterday Products', 'publisher' ),
						'week'      => __( 'This Week Products', 'publisher' ),
						'month'     => __( 'This Month Products', 'publisher' ),
						'year'      => __( 'This Year Products', 'publisher' ),
					),
					//
					'vc_admin_label' => false,
				),
				array(
					"description"    => __( 'Start the count with an offset. If you have a block that shows 4 posts before this one, you can make this one start from the 5\'th post (by using offset 4)', 'publisher' ),
					'name'           => __( 'Offset Products', 'publisher' ),
					'id'             => 'offset',
					'type'           => 'text',
					//
					'vc_admin_label' => false,
				),
			),
			$this->pagination_fields(),
			$this->option_fields()
		);
	}


	/**
	 * Callback: Filters query args for this shortcode
	 * Filter: publisher-theme-core/pagination-manager/query/args
	 *
	 * @param $wp_query_args
	 * @param $view
	 *
	 * @return mixed
	 */
	function filter_query_args( $wp_query_args, $view, $atts ) {

		if ( $view == 'Publisher_Products_1_Shortcode' ) {
			$wp_query_args = $this->isolate_query_args( $wp_query_args );

			return apply_filters( 'woocommerce_shortcode_products_query', $wp_query_args, $atts, 'products' );
		} else {
			return $wp_query_args;
		}

	}


	/**
	 * Handy function to set query args. Childs can override this
	 *
	 * @param $wp_query_args
	 *
	 * @return \WP_Query
	 */
	function set_query( $wp_query_args, $atts = array() ) {

		$wp_query_args = $this->isolate_query_args( $wp_query_args );

		return publisher_theme_pagin_manager()->set_post_query( apply_filters( 'woocommerce_shortcode_products_query', $wp_query_args, $atts, 'products' ) );

	}


	/**
	 * Handy function to isolate query args for WooCommerce
	 *
	 * @param $wp_query_args
	 *
	 * @return mixed
	 */
	function isolate_query_args( $wp_query_args ) {

		if ( isset( $wp_query_args['tax_query'] ) && ! empty( $wp_query_args['tax_query'][0] ) ) {
			$wp_query_args['tax_query'][0]['taxonomy'] = 'product_cat';
		}

		return $wp_query_args;
	}


	/**
	 * TinyMCE View Settings
	 *
	 * @return array
	 */
	public function tinymce_settings() {

		return array(
			'name' => __( 'Products', 'publisher' ),

			'styles' => array(
				array(
					'type'    => 'registered',
					'handles' => array( 'woocommerce-general', 'woocommerce-layout', 'woocommerce-smallscreen' )
				)
			),

		);
	}
} // Publisher_Products_1_Shortcode
