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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


BF_Editor_Shortcodes::Run();


class BF_Editor_Shortcodes {

	/**
	 * Contains configuration's of shortcodes
	 *
	 * @var array
	 */
	public static $config = array();


	/**
	 * Contains alive instance of class
	 *
	 * @var  self
	 */
	protected static $instance;


	/**
	 * BF_Editor_Shortcodes instance
	 *
	 * @var BF_Editor_Shortcodes
	 */
	protected static $editor_instance;


	/**
	 * All registered shortcodes
	 *
	 * @var array
	 */
	private static $shortcodes = array();


	/**
	 * [ create and ] Returns life version
	 *
	 * @return \BF_Editor_Shortcodes
	 */
	public static function Run() {

		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}


	/**
	 * Handy function used to get custom value from config
	 *
	 * @param        $id
	 * @param string $default
	 *
	 * @return string
	 */
	public static function get_config( $id = null, $default = '' ) {

		if ( is_null( $id ) ) {
			return $default;
		}

		/**
		 * Calculates numbers of 2 column layout
		 */
		if ( $id === 'layout-2-col' ) {

			if ( ! isset( self::$config[ $id ] ) ) {
				return self::$config[ $id ] = array(
					'width'      => 1180,
					'content'    => 790.6,
					'primary'    => 389.4,
					'calculated' => true,
				);
			}

			if ( isset( self::$config[ $id ]['calculated'] ) ) {
				return self::$config[ $id ];
			}

			self::$config[ $id ]['content'] = ( self::$config[ $id ]['content'] * 0.01 ) * self::$config[ $id ]['width'];
			self::$config[ $id ]['primary'] = ( self::$config[ $id ]['primary'] * 0.01 ) * self::$config[ $id ]['width'];

			self::$config[ $id ]['calculated'] = true;

			return self::$config[ $id ];
		}


		/**
		 * Calculates numbers of 3 column layout
		 */
		if ( $id === 'layout-3-col' ) {

			if ( ! isset( self::$config[ $id ] ) ) {
				return self::$config[ $id ] = array(
					'width'      => 1300,
					'content'    => 754,
					'primary'    => 325,
					'secondary'  => 221,
					'calculated' => true,
				);
			}

			if ( isset( self::$config[ $id ]['calculated'] ) ) {
				return self::$config[ $id ];
			}

			self::$config[ $id ]['content']   = ( self::$config[ $id ]['content'] * 0.01 ) * self::$config[ $id ]['width'];
			self::$config[ $id ]['primary']   = ( self::$config[ $id ]['primary'] * 0.01 ) * self::$config[ $id ]['width'];
			self::$config[ $id ]['secondary'] = ( self::$config[ $id ]['secondary'] * 0.01 ) * self::$config[ $id ]['width'];

			self::$config[ $id ]['calculated'] = true;

			return self::$config[ $id ];
		}

		return isset( self::$config[ $id ] ) ? self::$config[ $id ] : $default;
	}


	/**
	 * @return array
	 */
	public static function get_shortcodes() {

		return self::$shortcodes;
	}


	/**
	 * @param array $shortcodes
	 */
	public static function set_shortcodes( $shortcodes ) {

		self::$shortcodes = $shortcodes;
	}


	/**
	 * Get BF url
	 *
	 * @param string $append optional.
	 *
	 * @return string
	 */
	public static function url( $append = '' ) {

		return bf_get_uri( 'editor-shortcodes/' . ltrim( $append, '/' ) );
	}


	/**
	 * Get library path
	 *
	 * @param string $append optional.
	 *
	 * @return string
	 */
	public static function path( $append = '' ) {

		return bf_get_dir( 'editor-shortcodes/' . ltrim( $append, '/' ) );
	}


	/**
	 * Register Hooks
	 */
	public function init() {

		add_action( 'better-framework/after_setup', array( $this, 'setup_shortcodes' ) );
	}


	/**
	 * Print dynamic editor css
	 */
	public function load_editor_css() {

		if ( isset( $_GET['bf-editor-shortcodes'] ) ) {

			@header( 'Content-Type: text/css; charset=UTF-8' );

			ob_start();

			// IF post ID was bigger than 0 == valid post
			if ( intval( $_GET['bf-editor-shortcodes'] ) > 0 ) {
				if ( ! empty( self::$config['editor-style'] ) ) {
					@include self::$config['editor-style'];
				} else {
					include self::path( '/assets/css/editor-style.php' );
				}

				// Injects dynamics generated CSS codes from PHP files outside of library
				if ( ! empty( self::$config['editor-dynamic-style'] ) ) {

					if ( is_array( self::$config['editor-dynamic-style'] ) ) {

						foreach ( self::$config['editor-dynamic-style'] as $_file ) {
							@include $_file;
						}

					} else {
						@include self::$config['editor-dynamic-style'];
					}
				}
			}


			$output = ob_get_clean();
			$fonts  = '';

			// Move all @import to the beginning of generated CSS
			{
				preg_match_all( '/@import .*/', $output, $matched );

				if ( ! empty( $matched[0] ) ) {
					foreach ( $matched[0] as $item ) {
						$fonts .= $item . "\n\n";

						$output = str_replace( $item, '', $output );
					}
				}
			}

			echo $fonts;
			echo $output;

			exit;
		}

	}


	/**
	 * Adds custom dynamic editor css
	 *
	 * @param  array $stylesheets list of stylesheets uri
	 *
	 * @return array
	 */
	public function prepare_editor_style_uri( $stylesheets = array() ) {

		// Detect current active editor
		{
			$editor = 'tinymce';

			if ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {
				$editor = 'gutenberg';
			}
		}

		$url = home_url( '?bf-editor-shortcodes=' . bf_get_admin_current_post_id() . '&editor=' . $editor );
		$url = set_url_scheme( $url );

		// Add dynamic css file
		$stylesheets[] = $url;

		// Enqueue font awesome library from better framework
		$stylesheets[] = BF_URI . 'assets/css/font-awesome.min.css';

		return $stylesheets;
	}


	/**
	 * Add custom editor script
	 */
	public function append_editor_script() {

		wp_enqueue_script( 'bf-editor-script', $this->url( 'assets/js/edit-post-script.js' ), '', Better_Framework()->version );
	}


	/**
	 * Used for retrieving instance
	 *
	 * @param $fresh
	 *
	 * @return mixed
	 */
	public static function editor_instance( $fresh = false ) {

		if ( self::$editor_instance != null && ! $fresh ) {
			return self::$editor_instance;
		}

		if ( ! class_exists( 'BF_Editor_Shortcodes_TinyMCE' ) ) {
			require self::path( 'includes/class-bf-editor-shortcodes-tinymce.php' );
		}

		return self::$editor_instance = new BF_Editor_Shortcodes_TinyMCE();
	}


	/**
	 *
	 */
	public function setup_shortcodes() {

		/**
		 * Retrieves configurations
		 *
		 * @since 1.0.0
		 *
		 * @param string $args reset panel data
		 */
		self::$config = apply_filters( 'better-framework/editor-shortcodes/config', self::$config );

		// injects all our custom styles to TinyMCE
		add_filter( 'editor_stylesheets', array( $this, 'prepare_editor_style_uri' ), 100 );

		// Register style for the Gutenberg
		add_action( 'enqueue_block_editor_assets', array( $this, 'gutenberg_styles' ) );

		// Prints dynamic custom css if needed
		add_action( 'template_redirect', array( $this, 'load_editor_css' ), 1 );
		add_action( 'admin_init', array( $this, 'load_editor_css' ), 1 );

		$this->load_all_shortcodes();

		// registers shortcodes
		add_action( 'init', array( $this, 'register_all_shortcodes' ), 50 );

		global $pagenow;
		// Initiate custom shortcodes only in post edit editor
		if ( is_admin() && ( bf_is_doing_ajax() || in_array( $pagenow, array( 'post-new.php', 'post.php' ) ) ) ) {
			add_action( 'load-post.php', array( $this, 'append_editor_script' ) );
			add_action( 'load-post-new.php', array( $this, 'append_editor_script' ) );

			self::editor_instance();
		}
	}


	/**
	 * Loads all active shortcodes
	 */
	public function load_all_shortcodes() {

		self::set_shortcodes( apply_filters( 'better-framework/editor-shortcodes/shortcodes-array', array() ) );

	}


	/**
	 * Register shortcode from nested array
	 *
	 * @param $shortcode_key
	 * @param $shortcode
	 */
	public function register_shortcode( $shortcode_key, $shortcode ) {

		// Menu
		if ( isset( $shortcode['type'] ) && $shortcode['type'] == 'menu' ) {

			foreach ( (array) $shortcode['items'] as $_shortcode_key => $_shortcode_value ) {

				$this->register_shortcode( $_shortcode_key, $_shortcode_value );

			}

			return;
		}

		// Do not register shortcode
		if ( isset( $shortcode['register'] ) && $shortcode['register'] === false ) {
			return;
		}

		// External callback
		if ( isset( $shortcode['external-callback'] ) && $shortcode['external-callback'] ) {
			call_user_func( 'add' . '_' . 'shortcode', $shortcode_key, $shortcode['external-callback'] );
		} elseif ( isset( $shortcode['callback'] ) ) {
			call_user_func( 'add' . '_' . 'shortcode', $shortcode_key, array( $this, $shortcode['callback'] ) );
		}

	}


	/**
	 * Registers all active shortcodes
	 */
	public function register_all_shortcodes() {

		foreach ( (array) self::get_shortcodes() as $shortcode_key => $shortcode ) {

			$this->register_shortcode( $shortcode_key, $shortcode );

		}
	}


	/**
	 * Enqueue WordPress theme styles within Gutenberg
	 */
	function gutenberg_styles() {

		$list = $this->prepare_editor_style_uri();

		foreach ( $list as $k => $style ) {
			wp_enqueue_style( "bf-gutenberg-$k", $style, false, Better_Framework()->version, 'all' );
		}
	}


	/**
	 * Shortcode: Columns
	 */
	public function columns( $atts, $content = null ) {

		extract( shortcode_atts( array( 'class' => '' ), $atts ) );

		$classes = array( 'row', 'bs-row-shortcode' );

		if ( $class ) {
			$classes = array_merge( $classes, explode( ' ', $class ) );
		}

		$output = '<div class="' . implode( ' ', $classes ) . '">';

		$this->temp['columns'] = array();

		// parse nested shortcodes and collect data
		do_shortcode( $content );

		foreach ( $this->temp['columns'] as $column ) {
			$output .= $column;
		}

		unset( $this->temp['columns'] );

		return $output . '</div>';
	}


	/**
	 * Shortcode Helper: Column
	 */
	public function column( $atts, $content = null ) {

		extract(
			shortcode_atts( array(
				'size'       => '1/1',
				'class'      => '',
				'text_align' => ''
			),
				$atts
			),
			EXTR_SKIP
		);

		$classes = array( 'column' );

		if ( $class ) {
			$classes = array_merge( $classes, explode( ' ', $class ) );
		}

		if ( stristr( $size, '/' ) ) {

			$size = str_replace(
				array(
					'1/1',
					'1/2',
					'1/3',
					'1/4',
				),
				array(
					'col-lg-12',
					'col-lg-6',
					'col-lg-4',
					'col-lg-3',
				),
				$size
			);

		} else {
			$size = 'col-lg-6';
		}

		// Add size to column classes
		array_push( $classes, $size );

		// Add style such as text-align
		$style = '';
		if ( in_array( $text_align, array( 'left', 'center', 'right' ) ) ) {
			array_push( $classes, esc_attr( strip_tags( $text_align ) ) );
		}

		$this->temp['columns'][] = $column = '<div class="' . implode( ' ', $classes ) . '"' . $style . '>' . do_shortcode( $content ) . '</div>';

		return $column;
	}


	/**
	 * Shortcode: List
	 */
	public function list_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array( 'style' => 'check', 'class' => '' ), $atts ), EXTR_SKIP );

		$this->temp['list_style'] = $style;

		// parse nested shortcodes and collect data
		$content = do_shortcode( $content );
		$content = preg_replace( '#^<\/p>|<div>|<\/div>|<p>$#', '', $content );
		$content = preg_replace( '#<\/li><br \/>#', '</li>', $content );
		// no list?
		if ( ! preg_match( '#<(ul|ol)[^<]*>#i', $content ) ) {

			$content = '<ul>' . $content . '</ul>'; // escaped before

		}

		$content = preg_replace( '#<ul><br \/>#', '<ul>', $content );

		return '<div class="bs-shortcode-list list-style-' . esc_attr( $style ) . $class . '">' . $content . '</div>';
	}


	/**
	 * Shortcode Helper: List item
	 */
	public function list_item( $atts, $content = null ) {

		$icon = '<i class="fa fa-' . $this->temp['list_style'] . '"></i>';

		return '<li>' . $icon . do_shortcode( $content ) . '</li>';

	}


	/**
	 * Shortcode: Button
	 */
	public function button( $atts, $content = null ) {

		$atts = bf_merge_args( $atts, array(
			'style'      => 'default',
			'link'       => '#link',
			'size'       => 'medium',
			'target'     => '',
			'background' => '',
			'color'      => '',
		) );

		$atts['size'] = str_replace(
			array(
				'large',
				'medium',
				'small',
			),
			array(
				'lg',
				'sm',
				'xs'
			),
			$atts['size']
		);

		$style = '';

		if ( ! empty( $atts['background'] ) ) {
			$style .= 'background:#' . ltrim( $atts['background'], '#' ) . ' !important;';
		}

		if ( ! empty( $atts['color'] ) ) {
			$style .= 'color:#' . ltrim( $atts['color'], '#' ) . ' !important;';
		}

		return '<a class="btn btn-' . $atts['style'] . ' btn-' . $atts['size'] . ' btn-shortcode" href="' . $atts['link'] . '" target="' . $atts['target'] . '" ' . ( $style ? 'style="' . $style . '"' : '' ) . '>' . do_shortcode( $content ) . '</a>';
	}

}
