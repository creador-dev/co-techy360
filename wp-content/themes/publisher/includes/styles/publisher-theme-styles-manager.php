<?php


/**
 * Base class of options
 */
class Publisher_Theme_Styles_Manager {

	/**
	 * Contains list of current active styles
	 *
	 * @var array
	 */
	public static $styles = array( 'default' );


	/**
	 * Contains instance of styles classes
	 *
	 * @var array
	 */
	public $style_instances = array();


	/**
	 * Contains current active style ID
	 *
	 * @var string
	 */
	public static $current_style = 'default';


	/**
	 * Contains current active demo ID
	 *
	 * @var mixed|string
	 */
	public static $current_demo = '';


	/**
	 * Contains styles dir path
	 *
	 * @var string
	 */
	public static $style_dir = '';


	/**
	 * Contains styles directory URI
	 *
	 * @var string
	 */
	public static $style_uri = '';


	/**
	 * Base theme styles initializer
	 */
	public function __construct() {

		// Adds general page templates
		add_filter( 'publisher-theme-core/page-templates/config', array( $this, 'general_page_templates' ), 100 );


		//
		// Cache current state
		//
		self::$current_style = publisher_get_style();
		self::$current_demo  = publisher_get_demo_id();
		self::$style_dir     = PUBLISHER_THEME_PATH . 'includes/styles/';
		self::$style_uri     = PUBLISHER_THEME_URI . 'includes/styles/';

		// loads all styles when bf panel is saving to fix issues!
		if ( defined( 'DOING_AJAX' )
		     && isset( $_REQUEST['action'] )
		     && $_REQUEST['action'] == 'bf_ajax'
		     && ( ! isset( $_REQUEST['reqID'] ) || $_REQUEST['reqID'] !== 'fetch-panel-tab' )
		) {
			$all_styles = publisher_styles_config();
			$styles     = array_keys( $all_styles );
		} else {
			if ( self::$current_style === 'default' ) {
				$styles = array( 'default' );
			} else {
				$styles = array( 'default', self::$current_style );
			}
		}

		// Set styles
		self::set_styles( $styles );

		foreach ( $styles as $style ) {

			// default style is in base fields and there is no preparation for that
			if ( $style === 'default' ) {
				continue;
			}

			// Unknown bug
			// todo find the reason for this values
			{
				$_check = array(
					'default-'                      => 'clean-magazine',
					'clean-clean-magazine'          => 'clean-magazine',
					'clean-magazine-magazine'       => 'clean-magazine',
					'clean-magazine-clean-magazine' => 'clean-magazine',
					'classic-classic-magazine'      => 'classic-magazine',
					'classic-magazine-magazine'     => 'classic-magazine',
					'pure-pure-magazine'            => 'pure-magazine',
					'pure-magazine-magazine'        => 'pure-magazine',
					'pure-magazine-pure-magazine'   => 'pure-magazine',
				);

				if ( isset( $_check[ $style ] ) ) {
					$lang             = bf_get_current_language_option_code();
					$style            = $_check[ $style ];
					$options          = get_option( publisher_get_theme_panel_id() . $lang );
					$options['style'] = $style;
					update_option( publisher_get_theme_panel_id(), $options );
					update_option( publisher_get_theme_panel_id() . $lang . '_current_style', $style );
					update_option( publisher_get_theme_panel_id() . $lang . '_current_demo', $style );
				}
			}


			//
			// Compatibility for versions before 1.7 because in that versions the style and demo id was separeate
			// and the compatibility runs after this so we should make it temporarily work the first time
			// todo remove this after v2
			//
			{
				$_check = array(
					'pure'     => 'pure',
					'clean'    => 'clean',
					'classic'  => 'classic',
					'pure-'    => 'pure',
					'clean-'   => 'clean',
					'classic-' => 'classic',
				);

				//
				// Fix style id
				//
				if ( isset( $_check[ $style ] ) ) {

					$_demo = self::$current_demo;

					if ( empty( $_demo ) ) {
						$_demo = 'magazine';
					} else {
						$_demo = explode( '-', $_demo );

						if ( ! empty( $_demo[1] ) ) {
							$_demo = $_demo[1];
						} else {
							$_demo = 'magazine';
						}
					}

					if ( $_check[ $style ] === 'pure' ) {
						if ( $_demo != 'magazine' ) {
							$_demo = 'magazine';
						}
					} elseif ( $_check[ $style ] === 'classic' ) {
						if ( $_demo != 'magazine' && $_demo != 'blog' ) {
							$_demo = 'magazine';
						}
					}

					$style = $_check[ $style ] . '-' . $_demo;

				}
			} // comp fix

			$class = $this->get_class_name( $style );

			if ( ! class_exists( $class ) ) {
				include self::get_path( $style . '/bs-theme-style-' . $style . '.php' );
			}

			if ( class_exists( $class ) ) {
				$this->add_style_instance( new $class );
			}
		}

	}


	/**
	 * Used to get path of styles directory
	 *
	 * @param $append
	 *
	 * @return string
	 */
	public static function get_path( $append ) {

		return self::$style_dir . $append;
	}


	/**
	 * Used to get path of styles URI
	 *
	 * @param $append
	 *
	 * @return string
	 */
	public static function get_uri( $append ) {

		return self::$style_uri . $append;
	}


	/**
	 * Convert string to class name
	 *
	 * @param string $name
	 *
	 * @return string
	 */
	public function convert_class_name( $name = '' ) {

		$class = str_replace(
			array( '/', '-', ' ' ),
			'_',
			$name
		);

		$class = explode( '_', $class );
		$class = array_map( 'ucwords', $class );

		return implode( '_', $class );
	}


	/**
	 * Creates class name from style and demo ID's
	 *
	 * @param string $style
	 * @param string $demo
	 *
	 * @return string
	 */
	public function get_class_name( $style = '', $demo = '' ) {

		$class = 'Publisher_Theme_Style_' . $this->convert_class_name( $style );

		if ( ! empty( $demo ) ) {
			$class .= '_' . $this->convert_class_name( $demo );
		}

		return $class;
	}


	/**
	 * Used to set styles from outside
	 *
	 * @param array $styles
	 */
	public static function set_styles( $styles ) {

		if ( is_array( $styles ) ) {
			self::$styles = $styles;
		} else {
			self::$styles = array( $styles );
		}
	}


	/**
	 * Used to get current active styles
	 *
	 * @return array
	 */
	public static function get_styles() {

		return self::$styles;
	}


	/**
	 * @param $instance
	 */
	public function add_style_instance( $instance ) {

		$this->style_instances[] = $instance;
	}


	/**
	 * Adds general page templates to all demos
	 *
	 * @hooked publisher-theme-core/page-templates/config
	 *
	 * @param $page_templates
	 *
	 * @return mixed
	 */
	public function general_page_templates( $page_templates ) {

		$page_templates['our-contributors-1'] = array(
			'name'           => __( 'Our Contributors 1', 'publisher' ),
			'screenshot'     => 'http://cdn.betterstudio.com/publisher/page-templates/general/our-contributors-1.png?v=' . PUBLISHER_THEME_VERSION,
			'preview'        => 'http://demo.betterstudio.com/publisher/our-contributors-1/',
			'category'       => array(
				__( '2 Column', 'publisher' ),
			),
			'type'           => array(
				__( 'Contributors', 'publisher' ),
			),
			'post_meta'      => array(
				array(
					'meta_key'   => 'page_layout',
					'meta_value' => '1-col',
				),
				array(
					'meta_key'   => '_hide_title',
					'meta_value' => 1,
				),
				array(
					'meta_key'   => '_bs_imported_template',
					'meta_value' => 'our-contributors-1',
				),
				array(
					'meta_key'   => '_custom_css_code',
					'meta_value' => '.our-contributors-title h4{
    font-size: 26px;
}
.our-contributors-title {
    margin-bottom: 20px !important;
}
.wpb_text_column{
    margin-bottom: 22px !important;
}
.vc_btn3-container{
    margin-bottom: 35px !important;
}',
				),
				array(
					'meta_key'   => 'bam_disable_all',
					'meta_value' => 1,
				),

			),
			'prepare_vc_css' => true,
		);

		$page_templates['our-contributors-2'] = array(
			'name'           => __( 'Our Contributors 2', 'publisher' ),
			'screenshot'     => 'http://cdn.betterstudio.com/publisher/page-templates/general/our-contributors-2.png?v=' . PUBLISHER_THEME_VERSION,
			'preview'        => 'http://demo.betterstudio.com/publisher/our-contributors-2/',
			'category'       => array(
				__( '2 Column', 'publisher' ),
			),
			'type'           => array(
				__( 'Contributors', 'publisher' ),
			),
			'post_meta'      => array(
				array(
					'meta_key'   => 'page_layout',
					'meta_value' => '1-col',
				),
				array(
					'meta_key'   => '_hide_title',
					'meta_value' => 1,
				),
				array(
					'meta_key'   => '_bs_imported_template',
					'meta_value' => 'our-contributors-2',
				),
				array(
					'meta_key'   => '_custom_css_code',
					'meta_value' => '.wpb_text_column{
    margin-bottom: 12px!important;
}
.wpb_text_column h1{
    font-size: 28px!important;
    margin: 0 0 10px;
}
.vc_btn3-container{
    margin-bottom: 28px !important;
}
.vc_separator {
    margin-bottom: 28px !important;
}',
				),
				array(
					'meta_key'   => 'bam_disable_all',
					'meta_value' => 1,
				),
			),
			'prepare_vc_css' => true,
		);

		$page_templates['our-contributors-3'] = array(
			'name'           => __( 'Our Contributors 3', 'publisher' ),
			'screenshot'     => 'http://cdn.betterstudio.com/publisher/page-templates/general/our-contributors-3.png?v=' . PUBLISHER_THEME_VERSION,
			'preview'        => 'http://demo.betterstudio.com/publisher/our-contributors-3/',
			'category'       => array(
				__( '2 Column', 'publisher' ),
			),
			'type'           => array(
				__( 'Contributors', 'publisher' ),
			),
			'post_meta'      => array(
				array(
					'meta_key'   => 'page_layout',
					'meta_value' => '1-col',
				),
				array(
					'meta_key'   => '_hide_title',
					'meta_value' => 1,
				),
				array(
					'meta_key'   => '_bs_imported_template',
					'meta_value' => 'our-contributors-3',
				),
				array(
					'meta_key'   => '_custom_css_code',
					'meta_value' => '.wpb_text_column h1{
    font-size: 28px!important;
    margin: 0 0 10px;
}
.wpb_text_column{
    margin-bottom: 30px !important;
}',
				),
				array(
					'meta_key'   => 'bam_disable_all',
					'meta_value' => 1,
				),
			),
			'prepare_vc_css' => true,
		);

		return $page_templates;
	}

} // Publisher_Theme_Styles_Manager
