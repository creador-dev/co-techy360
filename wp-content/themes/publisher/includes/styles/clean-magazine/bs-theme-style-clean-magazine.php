<?php


/**
 * Publisher
 *      -> Clean Magazine Style
 */
class Publisher_Theme_Style_Clean_Magazine extends Publisher_Theme_Style {


	/**
	 * Style initializer
	 */
	public function __construct() {

		$this->style_id = 'clean-magazine';

		if ( Publisher_Theme_Styles_Manager::$current_style === $this->style_id ) {
			add_filter( 'publisher-theme-core/page-templates/config', array(
				$this,
				'page_templates_config'
			) );
		}

		parent::__construct();
	}


	/**
	 * Used to add custom functions for style or demo
	 *
	 * @return mixed
	 */
	function include_functions() {
	}


	/**
	 * Enqueues style assets
	 *
	 * @return mixed
	 */
	function register_assets() {
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

} // Publisher_Theme_Style_Clean_Magazine
