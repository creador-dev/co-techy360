<?php


/**
 * Classic style -> Blog demo
 */
class Publisher_Theme_Style_Classic_Blog extends Publisher_Theme_Style {


	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'classic-blog';

		add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/std', array(
			$this,
			'panel_std'
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
			'publisher-theme-classic-blog',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'classic-blog/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'classic-blog/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);

	}


	/**
	 * TinyMCE Style
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-classic-blog' );
	}


	/**
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/classic-blog/panel-std.php';

		return $fields;
	}


	/**
	 * Modify each style or demo category fields
	 */
	function customize_category_fields( $fields ) {

		$term_color = include PUBLISHER_THEME_PATH . 'includes/options/category-css-term_color.php';

		unset( $term_color['color']['selector'][4] ); // section heading:after

		// archive title bg color
		$term_color['bg_color']['selector'][] = 'body.category-%%id%% .archive-title.with-actions .page-heading';

		// archive title bottom arrow color
		$term_color['border_top_color']['selector'][] = 'body.category-%%id%% .archive-title.with-actions .page-heading:after';

		$fields['term_color'][ $this->get_css_id() ] = $term_color;
		unset( $term_color );

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

} // Publisher_Theme_Style_Classic_Blog
