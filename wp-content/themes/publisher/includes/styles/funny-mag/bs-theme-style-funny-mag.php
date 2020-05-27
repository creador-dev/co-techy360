<?php


/**
 * Publisher -> Funny Magazine
 */
class Publisher_Theme_Style_Funny_Mag extends Publisher_Theme_Style {

	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'funny-mag';

		add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/std', array(
			$this,
			'panel_std'
		), 20 );

		add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/css', array(
			$this,
			'panel_css'
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

		include PUBLISHER_THEME_PATH . 'includes/styles/funny-mag/panel-std.php';

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

		include PUBLISHER_THEME_PATH . 'includes/styles/funny-mag/panel-css.php';

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
	 * Enqueue current style css file
	 */
	function register_assets() {

		bf_enqueue_style(
			'publisher-theme-funny-mag',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'funny-mag/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'funny-mag/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * TinyMCE Style
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-funny-mag' );
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

} // Publisher_Theme_Style_Funny_Mag
