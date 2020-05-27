<?php


/**
 * Class BS_PlayList_Shortcode
 */
abstract class BS_PlayList_Shortcode extends BF_Shortcode {

	/**
	 * BroadCast Service Instance
	 *
	 * @return BS_PlayList_Service_Interface instance
	 */
	abstract protected function get_service();


	/**
	 * Default attributes that can be changed in class childs
	 *
	 * @var array
	 */
	protected $default_atts = array(
		'type'                => 'playlist',
		'videos_limit'        => 50,
		'playlist_title'      => false,
		'show_playlist_title' => true,
		'videos'              => '',
		'style'               => 'style-1',
		'by'                  => '',
		//
		'title'               => '',
		'show_title'          => 0,
		'icon'                => '',
		'heading_style'       => 'default',
		'heading_color'       => '',
		//
		'bs-show-desktop'     => 1,
		'bs-show-tablet'      => 1,
		'bs-show-phone'       => 1,
		'css'                 => '',
		'custom-css-class'    => '',
		'custom-id'           => '',
	);


	/**
	 * Initialize shortcode
	 *
	 * @param string $id
	 * @param array  $options
	 */
	function __construct( $id, $options = array() ) {

		// default translated title
		if ( empty( $this->default_atts['title'] ) ) {
			$this->default_atts['title'] = Better_Playlist::_get( 'widget_playlist' );
		}

		$_options = array(
			'defaults'       => $this->default_atts,
			'have_widget'    => true,
			'have_vc_add_on' => true,
			'have_gutenberg_add_on' => true,

		);

		$_options = wp_parse_args( $_options, $options );

		parent::__construct( $id, $_options );
	}


	/**
	 * Filter custom css codes for shortcode widget!
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function register_custom_css( $fields ) {

		return $fields;
	}


	/**
	 * Handle displaying of shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {

		$this->sanitize_atts( $atts );

		//set service object
		$atts['playlist_service'] = $this->get_service();

		if ( ! isset( $atts['class'] ) ) {
			$atts['class'] = '';
		}

		$atts['class'] .= $this->extra_classes( $atts );

		// custom css classes from generators
		if ( ! empty( $atts['css-class'] ) ) {
			$atts['class'] .= " {$atts['css-class']}";
		}

		// custom css classes shortcode settings
		if ( ! empty( $atts['custom-css-class'] ) ) {
			$atts['class'] .= " {$atts['custom-css-class']}";
		}

		ob_start();

		bsp_set_prop( 'shortcode-bs-playlist-atts', $atts );

		include $this->get_template( $atts );

		bsp_clear_prop();

		return ob_get_clean();

	}


	/**
	 * Prepares custom classes for plylist container
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	protected function extra_classes( &$atts ) {

		$classes = array();

		$classes[] = $this->id;

		$classes[] = 'bsp-' . $atts['style'];

		if ( ! empty( $atts['playlist_service'] ) && is_object( $atts['playlist_service'] ) ) {
			$classes[] = str_replace( '_', '-', strtolower( get_class( ( $atts['playlist_service'] ) ) ) );
		}

		$classes = array_map( 'sanitize_html_class', $classes );

		return implode( ' ', $classes );
	}


	/**
	 * Sanitize attributes
	 *
	 * @param $atts
	 */
	protected function sanitize_atts( &$atts ) {

	}


	/**
	 * Registers Visual Composer Add-on
	 */
	function register_vc_add_on() {

		vc_map(
			array(
				"name"        => $this->name,
				"base"        => $this->id,
				"description" => $this->description,
				"weight"      => 1,

				"wrapper_height" => 'full',

				"category" => __( 'Publisher', 'better-studio' ),

				"params" => $this->vc_map_listing_all(),
			)
		);
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		$labels = array(
			'type'           => __( 'Playlist Type', 'better-studio' ),
			'type=playlist'  => __( 'Youtube Playlist', 'better-studio' ),
			'type=custom'    => __( 'Custom Video Links', 'better-studio' ),
			'playlist_title' => __( 'Playlist Title', 'better-studio' ),
			'playlist_url'   => __( 'Playlist URL', 'better-studio' ),
			'videos_limit'   => __( 'Maximum Videos Count', 'better-studio' ),
			'videos'         => __( 'Playlist Videos List', 'better-studio' ),
			'by'             => __( 'By', 'better-studio' ),
		);

		$labels = wp_parse_args( $this->get_labels(), $labels );

		// Fields of this shortcode
		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Videos', 'better-studio' ),
				'id'   => 'videos_tab',
			),
			array(
				"type"           => 'select',
				"name"           => $labels['type'],
				"id"             => 'type',
				'value'          => $this->defaults['type'],
				"options"        => array(
					'playlist' => $labels['type=playlist'],
					'custom'   => $labels['type=custom'],
				),
				'always_show'    => true,
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'text',
				"name"           => $labels['playlist_url'],
				"id"             => 'playlist_url',
				'show_on'        => array( 'type=playlist' ),
				//
				"vc_admin_label" => true,
			),
			array(
				"type"           => 'textarea_raw_html',
				"name"           => $labels['videos'],
				"id"             => 'videos',
				'desc'           => __( 'Enter videos links each in one line.', 'better-studio' ),
				'show_on'        => array( 'type=custom' ),
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'text',
				"name"           => $labels['videos_limit'],
				"id"             => 'videos_limit',
				'show_on'        => array( 'type=playlist' ),
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'text',
				"name"           => $labels['by'],
				"id"             => 'by',
				'desc'           => __( 'Enter your name.', 'better-studio' ),
				'show_on'        => array( 'type=custom' ),
				//
				"vc_admin_label" => false,
			),
			array(
				"type"           => 'text',
				"name"           => $labels['playlist_title'],
				"id"             => 'playlist_title',
				//
				"vc_admin_label" => true,
			),
			array(
				"type"           => 'switchery',
				"name"           => __( 'Show Playlist Title?', 'better-studio' ),
				"id"             => 'show_playlist_title',
				//
				"vc_admin_label" => false,
			),
		);


		/**
		 * Retrieve heading fields from outside (our themes are defining them)
		 */
		{
			$heading_fields = apply_filters( 'better-framework/shortcodes/heading-fields', array(), $this->id );

			if ( $heading_fields ) {
				$fields = array_merge( $fields, $heading_fields );
			}
		}


		/**
		 * Retrieve design fields from outside (our themes are defining them)
		 */
		{
			$design_fields = apply_filters( 'better-framework/shortcodes/design-fields', array(), $this->id );

			if ( $design_fields ) {
				$fields = array_merge( $fields, $design_fields );
			}
		}

		return $fields;
	}


	/**
	 * method for override labels array indexes
	 *
	 * @return array
	 */
	function get_labels() {

		return array();
	}


	/**
	 * Finds appropriate template file and return path
	 * This make option to change template in themes
	 *
	 * @return string
	 */
	function get_template( $atts ) {

		// Use theme specified template for shortcode
		if ( file_exists( get_template_directory() . '/better-playlist/bs-playlist-' . $atts['style'] . '.php' ) ) {
			return get_template_directory() . '/better-playlist/bs-playlist-' . $atts['style'] . '.php';
		}

		return Better_Playlist::dir_path() . 'views/bs-playlist-' . $atts['style'] . '.php';

	} // get_template


	/**
	 * Registers Page Builder Add-on
	 */
	public function page_builder_settings() {


		return array(
			'name'           => $this->name,
			"base"           => $this->id,
			"description"    => $this->description,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => __( 'Better Studio', 'better-studio' ),
			'icon_url'       => Better_Playlist::dir_url( sprintf( 'img/%s.png', $this->id ) ),
		);
	} // page_builder_settings
} // BS_PlayList_Shortcode
