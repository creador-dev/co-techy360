<?php


class Better_Ads_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'better-ads';

		$this->widget_id = 'better ads';

		$this->name = __( 'Ad Box', 'better-studio' );

		$this->description = 'BetterAds ad box';

		$_options = array(
			'defaults'              => array(
				'title'           => '',
				'type'            => '',
				'banner'          => 'none',
				'campaign'        => 'none',
				'count'           => 2,
				'columns'         => 1,
				'align'           => 'center',
				'lazy-load'       => '',
				'order'           => 'ASC',
				'orderby'         => 'rand',
				'float'           => 'none',
				'show-caption'    => true,
				'bs-show-desktop' => true,
				'bs-show-tablet'  => true,
				'bs-show-phone'   => true,
			),
			'have_widget'           => true,
			'have_vc_add_on'        => true,
			'have_tinymce_add_on'   => apply_filters( 'better-ads/shortcode/live-preview', true ),
			'have_gutenberg_add_on' => apply_filters( 'better-ads/shortcode/live-preview', true ),
		);

		$_options = wp_parse_args( $_options, $options );

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

		// ad can not be shown
		if ( ! better_ads_ad_can_be_shown( bf_get_current_sidebar() ? 'widget' : 'shortcode' ) ) {
			return '';
		}

		// Add float class to shortcodes that are not inside a widget sidebar!
		if ( ! bf_get_current_sidebar() && isset( $atts['align'] ) ) {
			$atts['float'] = $atts['align'];
		}

		ob_start();
		echo Better_Ads_Manager()->show_ads( $atts );

		return ob_get_clean();

	}


	/**
	 * Registers Visual Composer Add-on
	 */
	function register_vc_add_on() {

		vc_map( array(
			"name"           => $this->name,
			"base"           => $this->id,
			"description"    => $this->description,
			"weight"         => 10,
			"wrapper_height" => 'full',

			"category" => __( 'Content', 'better-studio' ),
			"params"   => $this->vc_map_listing_all()
		) );

	} // register_vc_add_on


	/**
	 * Fields for all panels
	 *
	 * @return array
	 */
	public function get_fields() {

		return array(

			array(
				'type' => 'tab',
				'name' => __( 'General', 'better-studio' ),
				'id'   => 'general_tab',
			),
			array(
				"name"           => __( 'Ad Type', 'better-studio' ),
				"type"           => 'select',
				"id"             => 'type',
				'options'        => array(
					''         => __( '-- Select Ad Type', 'better-studio' ),
					'campaign' => __( 'Campaign', 'better-studio' ),
					'banner'   => __( 'Banner', 'better-studio' ),
				),
				//
				"vc_admin_label" => true,
			),
			//
			// Banner
			//
			array(
				"type"             => 'select',
				"name"             => __( 'Banner', 'better-studio' ),
				"id"               => 'banner',
				'deferred-options' => array(
					'callback' => 'better_ads_get_banners_option',
					'args'     => array(
						- 1,
						true
					),
				),
				'show_on'          => array(
					array( 'type=banner' ),
				),
				//
				"vc_admin_label"   => true,
			),
			//
			// Campaign
			//
			array(
				"type"             => 'select',
				"name"             => __( 'Campaign', 'better-studio' ),
				"id"               => 'campaign',
				'deferred-options' => array(
					'callback' => 'better_ads_get_campaigns_option',
					'args'     => array(
						- 1,
						true
					),
				),
				'show_on'          => array(
					array( 'type=campaign' ),
				),
				//
				"vc_admin_label"   => true,
			),
			array(
				"type"           => 'text',
				"name"           => __( 'Max Amount of Allowed Banners', 'better-studio' ),
				"desc"           => __( 'Leave empty to show all banners.', 'better-studio' ),
				"id"             => 'count',
				'show_on'        => array(
					array( 'type=campaign' ),
				),
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'select',
				"name"           => __( 'Columns', 'better-studio' ),
				"id"             => 'columns',
				"options"        => array(
					1 => __( '1 Column', 'better-studio' ),
					2 => __( '2 Column', 'better-studio' ),
					3 => __( '3 Column', 'better-studio' ),
				),
				'show_on'        => array(
					array( 'type=campaign' ),
				),
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'select',
				"name"           => __( 'Order By', 'better-studio' ),
				"id"             => 'orderby',
				"options"        => array(
					'date'  => __( 'Date', 'better-studio' ),
					'title' => __( 'Title', 'better-studio' ),
					'rand'  => __( 'Rand', 'better-studio' ),
				),
				'show_on'        => array(
					array( 'type=campaign' ),
				),
				'section_class'  => 'affect-block-align-on-change',
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'select',
				"name"           => __( 'Order', 'better-studio' ),
				"id"             => 'order',
				"options"        => array(
					'ASC'  => __( 'Ascending', 'better-studio' ),
					'DESC' => __( 'Descending', 'better-studio' ),
				),
				'show_on'        => array(
					array( 'type=campaign' ),
				),
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'select',
				"name"           => __( 'Align', 'better-studio' ),
				"id"             => 'align',
				"options"        => array(
					'left'   => __( 'Left', 'better-studio' ),
					'center' => __( 'Center', 'better-studio' ),
					'right'  => __( 'Right', 'better-studio' ),
				),
				'show_on'        => array(
					array( 'type=campaign' ),
					array( 'type=banner' ),
				),
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'select',
				"name"           => __( 'Show Captions', 'better-studio' ),
				"id"             => 'show-caption',
				"options"        => array(
					1 => __( 'Show caption\'s', 'better-studio' ),
					0 => __( 'Hide caption\'s', 'better-studio' ),
				),
				'show_on'        => array(
					array( 'type=campaign' ),
					array( 'type=banner' ),
				),
				//
				"vc_admin_label" => false,
			),
			array(
				'name'           => __( 'Lazy Load Ad?', 'better-studio' ),
				'desc'           => __( 'Chose the behaviour of lazy loading.', 'better-studio' ),
				'id'             => 'lazy-load',
				'type'           => 'select',
				"options"        => array(
					''        => __( '-- Inherit from panel --', 'better-studio' ),
					'enable'  => __( 'Yes, Lazy load this ad', 'better-studio' ),
					'disable' => __( 'No, Load this Ad as normal', 'better-studio' ),
				),
				'std'            => 'center',
				'show_on'        => array(
					array(
						'type=banner',
					),
					array(
						'type=campaign',
					),
				),
				'section_class'  => 'better-ads-ad-field',
				//
				"vc_admin_label" => false,
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
				'url'  => bf_append_suffix( Better_Ads_Manager::dir_url( 'css/bam' ), '.css' ),
			),
		);

		return array(
			'name'   => __( 'Better Ads', 'better-studio' ),
			'styles' => $styles,
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => __( 'Better Ads', 'better-studio' ),
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => $this->block_category(),
			'icon_url'       => Better_Ads_Manager::dir_url( 'images/vc-better-ads.png' ),

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
