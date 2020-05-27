<?php
/**
 * bs-accordions.php
 *---------------------------
 * [bs-accordion] shortcode
 *
 */

$GLOBALS['publisher_sh_accordion_panes'] = null;


/**
 * Publisher Accordion Panel shortcode
 */
class Publisher_Accordion_Panel_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'accordion';

		$_options = array(
			'defaults'            => array(
				'title' => '',
				'load'  => false,
			),
			'have_widget'         => false,
			'have_vc_add_on'      => false,
			'have_tinymce_add_on' => false,
		);

		parent::__construct( $id, $_options );
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

		global $publisher_sh_accordion_panes;

		$publisher_sh_accordion_panes[] = array(
			'title'   => $atts['title'],
			'load'    => $atts['load'],
			'content' => wpautop( do_shortcode( $content ) ),
		);

	}

}


/**
 * Publisher Heading shortcode
 */
class Publisher_Accordions_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'accordions';

		$_options = array(
			'defaults'              => array(
				'title'        => '',
				'tab_settings' => array(
					array(
						'title'   => '',
						'content' => '',
					)
				),
			),
			'have_widget'           => false,
			'have_vc_add_on'        => false,
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => true,
		);

		parent::__construct( $id, $_options );
	}


	/**
	 * Handle displaying of shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * TODO: need some refactor
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {

		global $publisher_sh_accordion_panes;

		$id = mt_rand();

		$output = '<div class="panel-group bs-accordion-shortcode" id="accordion-' . $id . '">';

		$count = 0;


		if ( ! empty( $atts['accordion_settings'] ) ) {

			$pane_list = $this->parse_attr_pane_list( $atts['accordion_settings'] );
		} else {

			$pane_list = $this->parse_content_pane_list( $content );
		}

		foreach ( $pane_list as $pane ) {

			$count ++;

			$active = $pane['load'] == 'show' ? ' in' : '';

			$output .= '<div class="panel panel-default ' . ( $active == ' in' ? 'open' : '' ) . '">
                            <div class="panel-heading ' . ( $active == ' in' ? 'active' : '' ) . '">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-' . $id . '" href="#accordion-' . $id . '-pane-' . $count . '">';
			$output .= ! empty( $pane['title'] ) ? $pane['title'] : __( 'Accordion', 'publisher' ) . ' ' . $count;
			$output .= '</a>
                              </h4>
                            </div>
                            <div id="accordion-' . $id . '-pane-' . $count . '" class="panel-collapse collapse ' . $active . '">
                              <div class="panel-body">';
			$output .= $pane['content'];
			$output .= '
                                </div>
                            </div>
                        </div>';

		}

		unset( $publisher_sh_accordion_panes );

		return $output . '</div>';
	}


	/**
	 * Shortcode Helper: Part of Tabs
	 */
	public static function publisher_sh_tab( $atts, $content = null ) {

		global $publisher_sh_tabs_count, $publisher_sh_tabs;

		if ( is_null( $publisher_sh_tabs_count ) ) {
			$publisher_sh_tabs_count = 0;
		}

		extract( shortcode_atts( array( 'title' => 'Tab %d' ), $atts ), EXTR_SKIP );

		$publisher_sh_tabs[ $publisher_sh_tabs_count ] = array(
			'title'   => sprintf( $title, $publisher_sh_tabs_count ),
			'content' => wpautop( do_shortcode( $content ) ),
			'id'      => mt_rand(),
		);

		$publisher_sh_tabs_count ++;
	}


	/**
	 * Custom Fields
	 *
	 * @return array
	 */
	public function get_fields() {

		return array(
			array(
				'type' => 'tab',
				'name' => __( 'General', 'publisher' ),
				'id'   => 'general',
			),
			array(
				'name' => __( 'Title', 'publisher' ),
				'type' => 'text',
				'id'   => 'title',
			),
			array(
				'name'          => '',
				'id'            => 'accordion_settings',
				'type'          => 'repeater',
				'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add New Accordion', 'publisher' ),
				'delete_label'  => __( 'Delete Accordion', 'publisher' ),
				'item_title'    => __( 'Accordion', 'publisher' ),
				'section_class' => 'full-with-both',
				'options'       => array(
					'title'   => array(
						'name' => __( 'Accordion Title', 'publisher' ),
						'id'   => 'title',
						'type' => 'text',
					),
					'content' => array(
						'name'              => __( 'Tab Title', 'publisher' ),
						'id'                => 'content',
						'type'              => 'textarea',
						'shortcode_content' => true,
					),
					'load'    => array(
						'name'    => __( 'Default Status', 'publisher' ),
						'type'    => 'select',
						'id'      => 'load',
						'options' => array(
							'hide' => __( 'Hidden', 'publisher' ),
							'show' => __( 'Visible', 'publisher' ),
						),
					),
				),
			),
		);
	}


	/**
	 * TinyMCE view  settings
	 *
	 * @return array
	 */
	function tinymce_settings() {

		return array(
			'name'           => __( 'Accordion', 'publisher' ),
			'sub_shortcodes' => array( 'accordion_settings' => 'accordion' ),

			'scripts' => array(
				array(
					'type'    => 'registered',
					'handles' => array( 'theme-libs' ),
				)
			),
		);
	}

	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'     => __( 'Accordion', 'publisher' ),
			"id"       => $this->id,
			"category" => publisher_white_label_get_option( 'publisher' ),
			'icon_url' => PUBLISHER_THEME_URI . 'images/shortcodes/accordion.png',
			'click_able' => true,
		);
	} // page_builder_settings

	/**
	 * @param array $settings
	 *
	 * @return array
	 */
	public function parse_attr_pane_list( $settings ) {

		if ( ! $settings ) {

			return array();
		}

		$tabs_list = array();

		foreach ( $settings as $index => $tab ) {

			if ( isset( $tab['title'] ) && isset( $tab['content'] ) ) {

				$tabs_list[] = array(
					'title'   => sprintf( $tab['title'], $index ),
					'content' => wpautop( do_shortcode( $tab['content'] ) ),
					'load'    => ! empty( $tab['load'] ),
				);
			}
		}

		return $tabs_list;
	}


	/**
	 * @param string $content
	 *
	 * @return array
	 */
	public function parse_content_pane_list( $content ) {

		global $publisher_sh_accordion_panes;

		$publisher_sh_accordion_panes = array();

		// parse nested shortcodes and collect data
		do_shortcode( $content );

		return $publisher_sh_accordion_panes;
	}
}
