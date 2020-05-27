<?php


/**
 * Publisher
 *      -> Clean Style
 *          -> Design Demo
 */
class Publisher_Theme_Style_Clean_Design extends Publisher_Theme_Style {


	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'clean-design';

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
	 * Enqueue current style css file
	 */
	function register_assets() {

		bf_enqueue_style(
			'publisher-theme-clean-design',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'clean-design/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'clean-design/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * Style for TinyMCE
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-clean-design' );
	}


	/**
	 * Adds custom functions of style
	 */
	function include_functions() {
	}


	/**
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/clean-design/panel-std.php';

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

		include PUBLISHER_THEME_PATH . 'includes/styles/clean-design/panel-css.php';

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

		// bs slider button color
		$term_css['bg_color']['selector'][20] = '.bs-slider-2-item.main-term-%%id%% .content-container a.read-more';
		$term_css['bg_color']['selector'][21] = '.bs-slider-3-item.main-term-%%id%% .content-container a.read-more';

		unset( $term_css['color']['selector'][15] );
		unset( $term_css['color']['selector'][16] );
		unset( $term_css['color']['selector'][17] );
		unset( $term_css['color']['selector'][18] );


		// change tb 2 hover to default color
		$term_css['bg_color']['selector'][6] = '.listing-item-tb-2.main-term-%%id%% .term-badges.floated .term-badge a';

		// bs slider button color
		$term_css['bg_color']['selector'][20] = '.bs-slider-2-item.main-term-%%id%% .content-container a.read-more';
		$term_css['bg_color']['selector'][21] = '.bs-slider-3-item.main-term-%%id%% .content-container a.read-more';

		$fields['term_color'][ $this->get_css_id() ] = $term_css;
		unset( $term_css );

		return $fields;
	} // customize_category_fields


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

} // Publisher_Theme_Style_Clean_Design
