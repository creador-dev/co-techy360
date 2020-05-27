<?php


/**
 * Publisher -> Newspaper Daily
 */
class Publisher_Theme_Style_Newspaper_Daily extends Publisher_Theme_Style {

	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'newspaper-daily';

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

		include PUBLISHER_THEME_PATH . 'includes/styles/newspaper-daily/panel-std.php';

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

		include PUBLISHER_THEME_PATH . 'includes/styles/newspaper-daily/panel-css.php';

		// Header Menu Current Color
		//		$fields['header_menu_text_h_color']['css'][0]['selector'][] = '.site-header .search-container .search-handler';
		$fields['header_menu_text_h_color']['css'][0]['selector'][] = '.site-header.site-header.header-style-6 .main-menu.menu > li.current-menu-item > a:after';
		$fields['header_menu_text_h_color']['css'][0]['selector'][] = '.site-header.site-header.header-style-6 .main-menu.menu > li:hover > a:after';

		$fields['header_menu_text_color']['css']['color']['selector'][] = '.site-header.site-header.header-style-6 .main-menu.menu > li > a:after';

		return $fields;
	}


	/**
	 * Adds custom functions of style
	 */
	function include_functions() {
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
		$term_css['border_color']['selector'][] = 'body.category-%%id%%';
		$term_css['border_color']['selector'][] = 'body.category-%%id%% .bs-pinning-block.pinned .main-menu-container';
		$term_css['border_color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination .page-numbers:hover';
		$term_css['border_color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination > span';
		// Text Color
		$term_css['color']['selector'][] = 'body.category-%%id%% .off-canvas-menu li.current-menu-item>a';
		$term_css['color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination .page-numbers:hover';
		$term_css['color']['selector'][] = 'body.category-%%id%% .off-canvas-menu ul.menu>li>a:hover';
		$term_css['color']['selector'][] = 'body.category-%%id%% .site-header .top-menu.menu > li:hover > a';
		$term_css['color']['selector'][] = 'body.category-%%id%% .archive-title .rss-link';
		$term_css['color']['selector'][] = 'body.category-%%id%% .pagination.bs-numbered-pagination > span';
		// Background Color
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .archive-title .term-badges span.term-badge a:hover';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .back-top';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .site-header.header-style-8 .bs-pinning-wrapper.bspw-header-style-8 > .bs-pinning-block';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .site-header.header-style-8.full-width';
		$term_css['bg_color']['selector'][] = 'body.category-%%id%% .rh-cover';

		/**
		 * Single Page
		 */
		// Border Color
		$term_css['border_color']['selector'][] = 'body.single-prim-cat-%%id%% .btn-bs-pagination:hover';
		$term_css['border_color']['selector'][] = 'body.single-prim-cat-%%id%% .bs-pinning-block.pinned .main-menu-container';
		$term_css['border_color']['selector'][] = 'body.single-prim-cat-%%id%%';
		// Text Color
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .site-header .top-menu.menu > li:hover > a';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .archive-title .rss-link';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% ul.bs-shortcode-list li:before';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .next-prev-post .title a:hover';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .off-canvas-menu ul.menu>li>a:hover';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .bf-breadcrumb .bf-breadcrumb-item a:hover span';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .single-post-content p a';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .footer-widgets .widget a:hover';
		$term_css['color']['selector'][] = 'body.single-prim-cat-%%id%% .listing-item-thumbnail:hover .title a';
		// Background Color
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .archive-title .term-badges span.term-badge a:hover';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .back-top';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .section-heading.sh-t2:after';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .site-footer:before';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% input[type="submit"]';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% input[type="submit"]:hover';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .ajax-search-results:after';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .off-canvas-inner:after';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .bs-subscribe-newsletter .newsletter-subscribe';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .btn-bs-pagination:hover';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .entry-terms.post-tags a:hover';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .site-header.header-style-8 .bs-pinning-wrapper.bspw-header-style-8 > .bs-pinning-block';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .site-header.header-style-8.full-width';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .bs-newsletter-pack .bsnp-button';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .section-heading.sh-t4.sh-s3 .h-text';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .section-heading.sh-t4.sh-s3 .h-text:before';
		$term_css['bg_color']['selector'][] = 'body.single-prim-cat-%%id%% .rh-cover';
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
	 * Enqueue current style css file
	 */
	function register_assets() {

		bf_enqueue_style(
			'publisher-theme-newspaper-daily',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'newspaper-daily/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'newspaper-daily/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * TinyMCE Style
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-newspaper-daily' );
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

} // Publisher_Theme_Style_Newspaper_Daily
