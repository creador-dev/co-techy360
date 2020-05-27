<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * Handles enqueue scripts and styles for preventing conflict and also multiple version of assets in on page
 */
class BF_Assets_Manager {


	/**
	 * Contains footer js codes
	 *
	 * @var array
	 */
	private $footer_js = array();


	/**
	 * Contains head js codes
	 *
	 * @var array
	 */
	private $head_js = array();


	/**
	 * Contains footer js codes
	 *
	 * @var array
	 */
	private $footer_jquery_js = array();


	/**
	 * Contains head js codes
	 *
	 * @var array
	 */
	private $head_jquery_js = array();


	/**
	 * Contains footer css codes
	 *
	 * @var array
	 */
	private $footer_css = array();


	/**
	 * Contains head css codes
	 *
	 * @var array
	 */
	private $head_css = array();


	/**
	 * Contains admin footer js codes
	 *
	 * @var array
	 */
	private $admin_footer_js = array();


	/**
	 * Contains admin head js codes
	 *
	 * @var array
	 */
	private $admin_head_js = array();


	/**
	 * Contains admin footer css codes
	 *
	 * @var array
	 */
	private $admin_footer_css = array();


	/**
	 * Contains admin head css codes
	 *
	 * @var array
	 */
	private $admin_head_css = array();

	/**
	 * Contains header codes
	 *
	 * @var array
	 */
	private $head_codes = array();


	function __construct() {

		// Front End Inline Codes
		add_action( 'wp_head', array( $this, 'print_head' ), 100 );
		add_action( 'wp_head', array( $this, 'force_head_print' ), 100 );
		add_action( 'wp_footer', array( $this, 'print_footer' ), 100 );

		// Backend Inline Codes
		add_action( 'admin_head', array( $this, 'force_head_print' ), 100 );
		add_action( 'admin_head', array( $this, 'print_admin_head' ), 100 );
		add_action( 'admin_footer', array( $this, 'print_admin_footer' ), 100 );

		// Backend Modal
		if ( is_admin() ) {
			add_action( 'admin_footer', array( 'BF_Assets_Manager', 'enqueue_modals' ) );
		}

	}


	/**
	 * DRY!
	 *
	 * @param array  $code
	 * @param string $type
	 * @param string $comment
	 * @param string $before
	 * @param string $after
	 */
	private function _print( $code = array(), $type = 'style', $comment = '', $before = '', $after = '' ) {

		$output = '';

		foreach ( (array) $code as $_code ) {
			$output .= $_code . "\n";
		}

		if ( $output ) {

			if ( ! empty( $comment ) ) {
				echo "\n<!-- {$comment} -->\n<{$type}>{$before}\n{$output}\n{$after}</{$type}>\n<!-- /{$comment}-->\n";
			} else {
				echo "\n<{$type}>{$before}\n{$output}\n{$after}</{$type}>\n";
			}
		}

	}


	/**
	 * Filter Callback: used for printing style and js codes in header
	 */
	function print_head() {

		$this->_print( $this->head_css, 'style', __( 'BetterFramework Head Inline CSS', 'better-studio' ) );
		$this->head_css = array();

		$this->_print( $this->head_js, 'script', __( 'BetterFramework Head Inline JS', 'better-studio' ) );
		$this->head_js = array();

		$this->_print( $this->head_jquery_js, 'script', __( 'BetterFramework Head Inline jQuery Code', 'better-studio' ), 'jQuery(function($){', '});' );
		$this->head_jquery_js = array();

	}


	/**
	 * Filter Callback: used for printing style and js codes in footer
	 */
	function print_footer() {

		// Print header lagged CSS
		$this->_print( $this->head_css, 'style', __( 'BetterFramework Header Lagged Inline CSS', 'better-studio' ) );

		// Print footer CSS
		$this->_print( $this->footer_css, 'style', __( 'BetterFramework Footer Inline CSS', 'better-studio' ) );

		// Print header lagged JS
		$this->_print( $this->head_js, 'script', __( 'BetterFramework Header Lagged Inline JS', 'better-studio' ) );

		// Print header lagged jQuery JS
		$this->_print( $this->head_jquery_js, 'script', __( 'BetterFramework Header Lagged Inline jQuery JS', 'better-studio' ), 'jQuery(function($){', '});' );

		// Print footer JS
		$this->_print( $this->footer_js, 'script', __( 'BetterFramework Footer Inline JS', 'better-studio' ) );

		// Print footer jQuery JS
		$this->_print( $this->footer_jquery_js, 'script', __( 'BetterFramework Footer Inline jQuery JS', 'better-studio' ), 'jQuery(function($){', '});' );

	}


	/**
	 * Filter Callback: used for printing style and js codes in admin header
	 */
	function print_admin_head() {

		// Print admin header CSS
		$this->_print( $this->admin_head_css, 'style', __( 'BetterFramework Admin Head Inline CSS', 'better-studio' ) );
		$this->admin_head_css = array();

		// Print admin header JS
		$this->_print( $this->admin_head_js, 'script', __( 'BetterFramework Head Inline JS', 'better-studio' ) );
		$this->admin_head_js = array();

	}


	/**
	 * Filter Callback: used for printing style and js codes in admin footer
	 */
	function print_admin_footer() {

		// Print header lagged CSS
		$this->_print( $this->admin_head_css, 'style', __( 'BetterFramework Admin Header Lagged Inline CSS', 'better-studio' ) );

		// Print footer CSS
		$this->_print( $this->admin_footer_css, 'style', __( 'BetterFramework Admin Footer Inline CSS', 'better-studio' ) );

		// Print header lagged JS
		$this->_print( $this->admin_head_js, 'script', __( 'BetterFramework Admin Footer Inline JS', 'better-studio' ) );

		// Print footer JS
		$this->_print( $this->admin_footer_js, 'script', __( 'BetterFramework Admin Footer Inline JS', 'better-studio' ) );

	}


	protected function force_print( $code = array(), $type = 'style', $comment = '', $before = '', $after = '' ) {

		// Before head script print or inside TinyMCE ajax callback
		if ( bf_is_doing_ajax( 'fetch-mce-view-shortcode' ) || did_action( is_admin() ? 'admin_head' : 'wp_head' ) ) {
			$this->_print( $code, $type, $comment, $before, $after );
		} else {
			$this->head_codes[] = func_get_args();
		}
	}


	public function force_head_print() {

		if ( $this->head_codes ) {
			foreach ( $this->head_codes as $args ) {
				call_user_func_array( array( $this, '_print' ), $args );
			}

			$this->head_codes = array();
		}
	}


	/**
	 * Used for adding inline js
	 *
	 * @param string $code
	 * @param bool   $to_top
	 * @param bool   $force
	 */
	function add_js( $code = '', $to_top = FALSE, $force = FALSE ) {

		if ( $force ) {
			$this->force_print( $code, 'script' );

			return;
		}

		if ( $to_top ) {
			$this->head_js[] = $code;
		} else {
			$this->footer_js[] = $code;
		}
	}


	/**
	 * Used for adding inline js
	 *
	 * @param string $code
	 * @param bool   $to_top
	 * @param bool   $force
	 */
	function add_jquery_js( $code = '', $to_top = FALSE, $force = FALSE ) {

		if ( $force ) {
			$this->force_print( $code, 'script', 'jQuery(function($){', '});' );

			return;
		}

		if ( $to_top ) {
			$this->head_jquery_js[] = $code;
		} else {
			$this->footer_jquery_js[] = $code;
		}

	}


	/**
	 * Used for adding inline css
	 *
	 * @param string $code
	 * @param bool   $to_top
	 * @param bool   $force
	 */
	function add_css( $code = '', $to_top = FALSE, $force = FALSE ) {

		//
		// Handle inline custom css code inside AMP
		//
		if ( bf_is_amp() === 'better' ) {

			better_amp_add_inline_style( $code );

			return;
		}


		if ( $force ) {
			$this->force_print( $code, 'style' );

			return;
		}


		if ( $to_top ) {
			$this->head_css[] = $code;
		} else {
			$this->footer_css[] = $code;
		}
	}


	/**
	 * Used for adding inline js
	 *
	 * @param string $code
	 * @param bool   $to_top
	 * @param bool   $force
	 */
	function add_admin_js( $code = '', $to_top = FALSE, $force = FALSE ) {

		if ( $force ) {
			$this->force_print( $code, 'script' );

			return;
		}

		if ( $to_top ) {
			$this->admin_head_js[] = $code;
		} else {
			$this->admin_footer_js[] = $code;
		}

	}


	/**
	 * Used for adding inline css
	 *
	 * @param string $code
	 * @param bool   $to_top
	 * @param bool   $force
	 */
	function add_admin_css( $code = '', $to_top = FALSE, $force = FALSE ) {

		if ( $force ) {
			$this->force_print( $code, 'style' );

			return;
		}

		if ( $to_top ) {
			$this->admin_head_css[] = $code;
		} else {
			$this->admin_footer_css[] = $code;
		}

	}


	/**
	 * Enqueue styles safely
	 *
	 * @param $style_key
	 */
	function enqueue_style( $style_key = '' ) {

		bf_enqueue_style( $style_key );
	}


	/**
	 * Enqueue scripts safely
	 *
	 * @param $script_key
	 */
	function enqueue_script( $script_key ) {

		bf_enqueue_script( $script_key );
	}


	public static function print_ace_editor_oldie_js() {

		static $loaded = FALSE;

		if ( $loaded ) {
			return;
		}
		?>
		<!--[if lt IE 9]>
		<script type='text/javascript'
		        src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ext-old_ie.js'></script>
		<![endif]-->
		<?php

		$loaded = TRUE;
	}


	/**
	 * Contains list of active modals that should be printed in bottom of page
	 *
	 * @var array
	 */
	public static $active_modals;


	/**
	 * Adds modals to active modals list
	 *
	 * @param $modal_id
	 */
	public static function add_modal( $modal_id ) {

		self::$active_modals[ $modal_id ] = $modal_id;
	}


	/**
	 * Callback: Hooked to admin_footer to print all modals in bottom of page
	 */
	public static function enqueue_modals() {

		foreach ( (array) self::$active_modals as $modal ) {
			$modal_template_file = BF_PATH . '/core/field-generator/modals/' . $modal . '.php';
			include $modal_template_file;
		}

	} // enqueue_modals

}
