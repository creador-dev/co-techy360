<?php
/**
 * bs-tabs.php
 *---------------------------
 * [bs-tabs] shortcode
 *
 */

$GLOBALS['publisher_sh_tabs_count'] = null;
$GLOBALS['publisher_sh_tabs']       = null;


/**
 * Inner Tab shortcode
 */
class Publisher_Tab_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'tab';

		$_options = array(
			'defaults'            => array(
				'title'   => '',
				'content' => '',
				'id'      => '',
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

		global $publisher_sh_tabs_count, $publisher_sh_tabs;

		if ( is_null( $publisher_sh_tabs_count ) ) {
			$publisher_sh_tabs_count = 0;
		}

		$publisher_sh_tabs[ $publisher_sh_tabs_count ] = array(
			'title'   => sprintf( $atts['title'], $publisher_sh_tabs_count ),
			'content' => wpautop( do_shortcode( $content ) ),
			'id'      => ! empty( $atts['id'] ) ? $atts['id'] : mt_rand(),
		);

		$publisher_sh_tabs_count ++;
	}
}


/**
 * Publisher Heading shortcode
 */
class Publisher_Tabs_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'tabs';

		$_options = array(
			'defaults'              => array(
				'title'        => '',
				'tab_settings' => array(
					array(
						'title'   => '',
						'content' => '',
						'id'      => '',
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

		global $publisher_sh_tabs_count, $publisher_sh_tabs;

		$panes     = $tabs = array();
		$tabs_list = array();
		$count     = 0;


		if ( empty( $atts['tab_settings'] ) || ( is_array( $atts['tab_settings'] ) && bf_count( $atts['tab_settings'] ) == 1 && empty( $atts['tab_settings'][0]['title'] ) ) ) {
			$tabs_list = $this->parse_content_tabs( $content );
		} else {
			$tabs_list = $this->parse_attr_tabs( $atts['tab_settings'] );
		}


		foreach ( $tabs_list as $tab ) {
			$count ++;

			$tab_class = ( $count == 1 ? ' class="active"' : '' );

			$tab_pane_class = ( $count == 1 ? ' class="active tab-pane"' : ' class="tab-pane"' );

			$tabs[]  = '<li' . $tab_class . '><a href="#tab-' . $tab['id'] . '" data-toggle="tab">' . $tab['title'] . '</a></li>';
			$panes[] = '<div id="tab-' . $tab['id'] . '"' . $tab_pane_class . '>' . $tab['content'] . '</div>';
		}

		$output =
			'<div class="bs-tab-shortcode">
                    <ul class="nav nav-tabs" role="tablist">' . implode( '', $tabs ) . '</ul>
                    <div class="tab-content">' . implode( "\n", $panes ) . '</div>
                </div>';

		$publisher_sh_tabs_count = $publisher_sh_tabs = null;

		return $output;
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
				'name'          => '',
				'id'            => 'tab_settings',
				'type'          => 'repeater',
				'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add New Tab', 'publisher' ),
				'delete_label'  => __( 'Delete Tab', 'publisher' ),
				'item_title'    => __( 'Tab', 'publisher' ),
				'section_class' => 'full-with-both',
				'options'       => array(
					'title'   => array(
						'name' => __( 'Tab Title', 'publisher' ),
						'id'   => 'title',
						'type' => 'text',
					),
					'content' => array(
						'name'              => __( 'Tab Content', 'publisher' ),
						'id'                => 'content',
						'type'              => 'textarea',
						'shortcode_content' => true,
					),
					'id'      => array(
						'name' => __( 'Custom Tab ID (Optional)', 'publisher' ),
						'id'   => 'id',
						'type' => 'text',
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
			'name'           => __( 'Tabs', 'publisher' ),
			'sub_shortcodes' => array( 'tab_settings' => 'tab' ),

			'scripts' => array(
				array(
					'type'    => 'registered',
					'handles' => array( 'theme-libs' ),
				)
			),
		);
	}


	public function page_builder_settings() {

		return array(
			'name'       => __( 'Tabs', 'publisher' ),
			'id'         => $this->id,
			'category'   => publisher_white_label_get_option( 'publisher' ),
			'click_able' => true,
		);
	}


	/**
	 * @param array $settings
	 *
	 * @return array
	 */
	public function parse_attr_tabs( $settings ) {

		if ( ! $settings ) {

			return array();
		}

		$tabs_list = array();

		foreach ( $settings as $index => $tab ) {

			if ( isset( $tab['title'] ) && isset( $tab['content'] ) ) {

				$tabs_list[] = array(
					'title'   => sprintf( $tab['title'], $index ),
					'content' => wpautop( do_shortcode( $tab['content'] ) ),
					'id'      => isset( $tab['content'] ) ? $tab['content'] : mt_rand(),
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
	public function parse_content_tabs( $content ) {

		global $publisher_sh_tabs_count, $publisher_sh_tabs;

		$publisher_sh_tabs_count = 0;
		$publisher_sh_tabs       = array();

		// parse nested shortcodes and collect data
		do_shortcode( $content );

		return $publisher_sh_tabs;
	}
}

