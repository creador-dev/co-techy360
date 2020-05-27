<?php


/**
 * Publisher -> BetterMag
 */
class Publisher_Theme_Style_Better_Mag extends Publisher_Theme_Style {


	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'better-mag';

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

		if ( Publisher_Theme_Styles_Manager::$current_style === $this->style_id ) {
			add_filter( 'publisher-theme-core/page-templates/config', array(
				$this,
				'page_templates_config'
			) );
		}

		parent::__construct();
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
			'publisher-theme-better-mag',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'better-mag/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'better-mag/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * TinyMCE Style
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-better-mag' );
	}


	/**
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/better-mag/panel-std.php';

		return $fields;
	}


	/**
	 * Modify each style or demo category fields
	 *
	 * @param $fields array
	 *
	 * @return array
	 */
	function customize_category_fields( $fields ) {

		$term_css = include PUBLISHER_THEME_PATH . 'includes/options/category-css-term_color.php';

		/**
		 * Categories
		 */
		// Border Color
		$term_css['border_color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination .page-numbers:hover';
		$term_css['border_color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination > span';
		// Text Color
		$term_css['color']['selector'][] = 'body.category-%%id%% .archive-title .rss-link';
		// Background Color
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .archive-title .term-badges span.term-badge a:hover';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .back-top';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination .current';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination a.page-numbers:hover';

		/**
		 * Single Page
		 */
		// Text Color
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% ul.bs-shortcode-list li:before';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .next-prev-post .title a:hover';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .bf-breadcrumb .bf-breadcrumb-item a:hover span';
		// Background Color
		//
		$term_css['selection']     = array(
			'selector' =>
				array(
					'body.single-prim-cat-%%id%% ::selection'
				),
			'prop'     =>
				array(
					'background' => '%%value%% !important',
				),
		);
		$term_css['moz_selection'] = array(
			'selector' =>
				array(
					'body.single-prim-cat-%%id%% ::-moz-selection'
				),
			'prop'     =>
				array(
					'background' => '%%value%% !important',
				),
		);


		$fields['term_color'][ $this->get_css_id() ] = $term_css;
		// Clear memory
		unset( $term_css );

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

		include PUBLISHER_THEME_PATH . 'includes/styles/better-mag/panel-css.php';

		return $fields;
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

} // Publisher_Theme_Style_Better_Mag
