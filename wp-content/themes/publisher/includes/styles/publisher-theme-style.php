<?php


/**
 * Class Publisher_Style_Option
 */
abstract class Publisher_Theme_Style {

	/**
	 * Current style id
	 *
	 * @var string
	 */
	public $style_id = '';


	/**
	 * Current demo id
	 *
	 * @var string
	 */
	public $demo_id = '';


	/**
	 * style initializer.
	 *
	 * @param bool $active_style is current style
	 */
	public function __construct() {

		/*
		 * Enqueue assets (css, js)
		 */

		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 100 );
		$this->include_functions();

		if ( $this->style_id === Publisher_Theme_Styles_Manager::$current_style ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'tinymce_enqueue_assets' ), 110 );
		}
	}


	/**
	 * Used to add custom functions for style or demo
	 *
	 * @return mixed
	 */
	abstract function include_functions();


	/**
	 * Enqueues style assets
	 *
	 * @return mixed
	 */
	abstract function register_assets();


	/**
	 * Enqueue style static files
	 */
	public function tinymce_enqueue_assets() {

		if ( bf_is_doing_ajax( 'fetch-mce-view-shortcode' ) ) {
			$tinymce_assets_cb = array( $this, 'register_tinymce_assets' );

			if ( is_callable( $tinymce_assets_cb ) ) {
				call_user_func( $tinymce_assets_cb );
			}
		}
	}


	/**
	 * Returns std id of current style
	 *
	 * @return string
	 */
	function get_std_id() {

		return 'std-' . $this->style_id;
	}


	/**
	 * Returns css id of current style
	 *
	 * @return string
	 */
	function get_css_id() {

		return 'css-' . $this->style_id;
	}


	/**
	 * Returns list of all styles exclude current style
	 *
	 * @return string
	 */
	function get_styles_exc_current() {

		$styles_exc_current = array_flip( Publisher_Theme_Styles_Manager::get_styles() );
		unset( $styles_exc_current[ $this->style_id ] );

		return array_keys( $styles_exc_current );
	}

} // Publisher_Theme_Style
