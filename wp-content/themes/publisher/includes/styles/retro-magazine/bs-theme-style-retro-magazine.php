<?php


/**
 * Publisher -> Retro Magazine
 */
class Publisher_Theme_Style_Retro_Magazine extends Publisher_Theme_Style {

	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'retro-magazine';

		add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/std', array(
			$this,
			'panel_std'
		), 20 );

		add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/css', array(
			$this,
			'panel_css'
		), 20 );


		add_filter( 'better-framework/taxonomy/metabox/better-category-options/css', array(
			$this,
			'customize_category_fields'
		), 20 );

		add_filter( 'better-framework/menu/options', array( $this, 'menu_option' ), 200 );


		if ( Publisher_Theme_Styles_Manager::$current_style === $this->style_id ) {
			add_filter( 'publisher-theme-core/page-templates/config', array(
				$this,
				'page_templates_config'
			) );
		}

		parent::__construct();
	}


	/**
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/retro-magazine/panel-std.php';

		return $fields;
	}


	/**
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_css( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/retro-magazine/panel-css.php';

		return $fields;
	}


	function customize_category_fields( $fields ) {

		$term_css = include PUBLISHER_THEME_PATH . 'includes/options/category-css-term_color.php';

		/**
		 * Categories
		 */
		// Border Color
		$term_css['color']['selector'][] = 'body.category-%%id%% .archive-title .rss-link';

		/**
		 * Single Page
		 */
		// Text Color
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .archive-title .rss-link';


		$term_css[]                      = array(
			'selector' =>
				array(
					0 => '.site-header.site-header li.menu-term-%%id%% > a > .better-custom-badge:after',
				),
			'prop'     =>
				array(
					'border-bottom-color' => '%%value%% !important',
				),
		);
		$term_css['color']['selector'][] = '.site-header .main-menu > li.menu-term-%%id%%.current-menu-item > a';

		$fields['term_color'][ $this->get_css_id() ] = $term_css;
		// Clear memory
		unset( $term_css );

		return $fields;
	}


	/**
	 * Adds custom functions of style
	 */
	function include_functions() {
	}


	/**
	 * Enqueue current style css file
	 */
	function register_assets() {

		bf_enqueue_style(
			'publisher-theme-retro-magazine',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'retro-magazine/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'retro-magazine/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * TinyMCE Style
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-retro-magazine' );
	}


	/**
	 * Injects Page templates for current style
	 *
	 * @param $page_templates
	 *
	 * @return mixed
	 */
	function page_templates_config( $page_templates ) {

		publisher_set_global( 'style-page-template', $this->style_id );

		include PUBLISHER_THEME_PATH . 'includes/styles/' . $this->style_id . '/page-templates.php';

		publisher_unset_global( 'style-page-template' );

		return $page_templates;
	}


	/**
	 * @param array $fields
	 *
	 * @hooked better-framework/menu/options
	 *
	 * @return array
	 */
	public function menu_option( $fields ) {

		$fields['badge_bg_color']['css'][] = array(
			'selector' => array(
				'%%class%%%%class%% > a > .better-custom-badge:after',
			),
			'prop'     => array(
				'border-bottom-color' => '%%value%% !important',
			)
		);

		return $fields;
	}

} // Publisher_Theme_Style_Retro_Magazine
