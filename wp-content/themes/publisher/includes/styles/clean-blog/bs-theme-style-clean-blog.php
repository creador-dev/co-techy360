<?php


/**
 * Publisher
 *      -> Clean Blog Style
 */
class Publisher_Theme_Style_Clean_Blog extends Publisher_Theme_Style {

	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'clean-blog';

		add_filter( 'better-framework/panel/' . publisher_get_theme_panel_id() . '/fields', array(
			$this,
			'panel_fields'
		), 20 );

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
	 * Demo panel fields
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_fields( $fields ) {

		$fields['topbar_border_color']['style'] = $this->get_styles_exc_current();

		return $fields;
	}


	/**
	 * Demo panel STD's
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function panel_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/styles/clean-blog/panel-std.php';

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

		include PUBLISHER_THEME_PATH . 'includes/styles/clean-blog/panel-css.php';

		return $fields;
	}


	/**
	 * Enqueue current style css file
	 */
	function register_assets() {

		bf_enqueue_style(
			'publisher-theme-clean-blog',
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_uri( 'clean-blog/style' ), '.css' ),
			array( 'publisher' ),
			bf_append_suffix( Publisher_Theme_Styles_Manager::get_path( 'clean-blog/style' ), '.css' ),
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * Style for TinyMCE
	 */
	public function register_tinymce_assets() {

		bf_enqueue_tinymce_style( 'registered', 'publisher-theme-clean-blog' );

	}


	/**
	 * Adds custom functions of style
	 */
	function include_functions() {
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

} // Publisher_Theme_Style_Clean_Blog
