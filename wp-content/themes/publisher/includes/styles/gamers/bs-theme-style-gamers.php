<?php


/**
 * Publisher -> Gamers
 */
class Publisher_Theme_Style_Gamers extends Publisher_Theme_Style {

	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'gamers';

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
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/gamers/panel-std.php';

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

		include PUBLISHER_THEME_PATH . 'includes/styles/gamers/panel-css.php';

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
			'publisher-theme-gamers',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'gamers/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'gamers/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * TinyMCE Style
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-gamers' );
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
	 * Modify each style or demo category fields
	 *
	 * @param $fields array
	 *
	 * @return array
	 */
	function customize_category_fields( $fields ) {

		$term_css = include PUBLISHER_THEME_PATH . 'includes/options/category-css-term_color.php';

		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.boxed.header-style-1 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.full-width.header-style-1 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .bspw-header-style-1.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.boxed.header-style-2 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.full-width.header-style-2 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .bspw-header-style-2.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.boxed.header-style-3 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.full-width.header-style-3 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .bspw-header-style-3.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.boxed.header-style-4 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.full-width.header-style-4 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .bspw-header-style-4.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.header-style-5 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.header-style-5.full-width .content-wrap.pinned';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.boxed.header-style-7 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .site-header.full-width.header-style-7 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-cat-%%id%% .bspw-header-style-7.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['border_top_color']['selector'][] = 'body.single-cat-%%id%% .site-header.boxed .main-menu-wrapper .main-menu-container';
		$term_css['border_top_color']['selector'][] = 'body.single-cat-%%id%% .site-header.full-width .main-menu-wrapper';

		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.boxed.header-style-1 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.full-width.header-style-1 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .bspw-header-style-1.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.boxed.header-style-2 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.full-width.header-style-2 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .bspw-header-style-2.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.boxed.header-style-3 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.full-width.header-style-3 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .bspw-header-style-3.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.boxed.header-style-4 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.full-width.header-style-4 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .bspw-header-style-4.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.header-style-5 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.header-style-5.full-width .content-wrap.pinned';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.boxed.header-style-7 .main-menu-wrapper .main-menu-container';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.full-width.header-style-7 .main-menu-wrapper';
		$term_css['bg_color']['selector'][]         = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .bspw-header-style-7.boxed > .bs-pinning-block.pinned.main-menu-wrapper .main-menu-container';
		$term_css['border_top_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.boxed .main-menu-wrapper .main-menu-container';
		$term_css['border_top_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-header.full-width .main-menu-wrapper';

		// Menu Hover Color
		$term_css['bg_color']['selector'][] = 'body.single-cat-%%id%% .main-menu.menu .sub-menu > li:hover > a';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .main-menu.menu .sub-menu > li:hover > a';
		$term_css['bg_color']['selector'][] = 'body.single-cat-%%id%% .ajax-search-results:after';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .ajax-search-results:after';
		$term_css['bg_color']['selector'][] = 'body.single-cat-%%id%% .off-canvas-inner:after';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .off-canvas-inner:after';

		// Footer Top Line
		$term_css['border_top_color']['selector'][] = 'body.single-cat-%%id%% .site-footer';
		$term_css['border_top_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .site-footer';

		// Back to Top
		$term_css['bg_color']['selector'][] = 'body.single-cat-%%id%% .back-top';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .back-top';

		// Archive RSS icon color
		$term_css['color']['selector'][] = 'body.single-cat-%%id%% .archive-title .rss-link';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%%.single-cat-%%id%% .archive-title .rss-link';

		$fields['term_color'][ $this->get_css_id() ] = $term_css;
		unset( $term_css );

		return $fields;
	}


} // Publisher_Theme_Style_Gamers
