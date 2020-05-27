<?php


/**
 * Better Social Counter Shortcode
 */
class Better_Social_Counter_Shortcode extends BF_Shortcode {

	private $valid_styles = array(
		'clean'      => '',
		'box'        => '',
		'button'     => '',
		'big-button' => '',
		'modern'     => '',
		'name'       => '',
		'style-6'    => '',
		'style-7'    => '',
		'style-8'    => '',
		'style-9'    => '',
		'style-10'   => '',
		'style-11'   => '',
	);


	function __construct( $id, $options ) {

		$id              = 'better-social-counter';
		$this->widget_id = 'better-social-counter';

		$options = array_merge( array(
			'defaults'       => array(
				'title'           => __( 'Stay With Us', 'better-studio' ),
				'show_title'      => 1,
				'style'           => 'modern',
				'colored'         => 1,
				'columns'         => 4,
				'order'           => array(),
				'bs-show-desktop' => true,
				'bs-show-tablet'  => true,
				'bs-show-phone'   => true,
			),
			'have_widget'    => true,
			'have_vc_add_on' => true,
		), $options );

		parent::__construct( $id, $options );

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
	 * Internal function for make decide result have a link or not
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	private function decide_link( $id ) {

		switch ( $id ) {

			case 'members':
			case 'comments':
			case 'posts':
				return false;

		}

		return true;

	}


	/**
	 * Used for generating li for social list
	 *
	 * @param string $id
	 * @param string $style
	 *
	 * @return string
	 */
	function get_full_li( $id = '', $style = '' ) {

		if ( empty( $id ) ) {
			return '';
		}

		if ( ! $data = Better_Social_Counter_Data_Manager::get_full_data( $id ) ) {
			return '';
		}

		$output = '<li class="social-item ' . $id . '">';

		if ( $this->decide_link( $id ) ) {
			$output .= '<a href="' . $data->link() . '" class="item-link" target="_blank">';
		}

		$count = $data->count() ? $data->count() : $data->get( 'name' );
		$title = $data->get( 'title' ) ? $data->get( 'title' ) : $data->get( 'button' );

		switch ( $style ) {

			case 'style-11':
			case 'style-10':
			case 'style-9':
			case 'style-8':
			case 'style-7':

				$output .= '<i class="item-icon bsfi-' . $id . '"></i>';

				if ( $data->exists( 'count' ) ) {
					$output .= '<span class="item-count">' . $count . '</span>';
				}

				if ( $data->exists( 'title' ) ) {
					$output .= '<span class="item-title">' . $title . ' </span> ';
				}

				if ( $data->exists( 'button' ) ) {
					$output .= '<span class="item-join">' . ( $data->get( 'button' ) ? $data->get( 'button' ) : $data->get( 'title_join' ) ) . '</span> ';
				}

				break;

			default:
				$output .= '<i class="item-icon bsfi-' . $id . '" ></i> ';
				$output .= '<span class="item-count" > ' . $count . '</span> ';
				$output .= '<span class="item-title" > ' . $title . '</span> ';

		}


		if ( $this->decide_link( $id ) ) {
			$output .= '</a> ';
		}

		$output .= '</li> ';

		return $output;
	}


	/**
	 * Used for generating li for social list in "Big Button" style
	 *
	 * @param string $id
	 *
	 * @return string
	 */
	function get_big_button_li( $id = '' ) {

		if ( empty( $id ) ) {
			return '';
		}

		if ( ! $data = Better_Social_Counter_Data_Manager::get_short_data( $id ) ) {
			return '';
		}

		$title  = $data->get( 'name' ) ? $data->get( 'name' ) : $data->get( 'title' );
		$button = $data->get( 'title_join' ) ? $data->get( 'title_join' ) : $data->get( 'button' );

		$output = '<li class="social-item ' . $id . '"> ';

		if ( $this->decide_link( $id ) ) {
			$output .= '<a href = "' . $data->link() . '" class="item-link" target = "_blank" > ';
		}

		$output .= '<i class="item-icon bsfi-' . $id . '" ></i><span class="item-name" > ' . $title . '</span> ';
		$output .= '<span class="item-title-join" > ' . $button . '</span> ';

		if ( $this->decide_link( $id ) ) {
			$output .= '</a> ';
		}

		$output .= '</li> ';

		return $output;
	}


	/**
	 * Used for generating li for social list
	 *
	 * @param string $id
	 *
	 * @return string
	 */
	function get_short_li( $id = '' ) {

		if ( empty( $id ) ) {
			return '';
		}

		if ( ! $data = Better_Social_Counter_Data_Manager::get_short_data( $id ) ) {
			return '';
		}

		$output = '<li class="social-item ' . $id . '">';

		if ( $this->decide_link( $id ) ) {
			$output .= '<a href = "' . $data->link() . '" target = "_blank" > ';
		}

		$output .= '<i class="item-icon bsfi-' . $id . '" ></i><span class="item-title" > ' . $data->get( 'title' ) . ' </span> ';

		if ( $this->decide_link( $id ) ) {
			$output .= '</a> ';
		}

		return $output . '</li> ';
	}


	/**
	 * Used for generating li for social list
	 *
	 * @param string $id
	 *
	 * @return string
	 */
	function get_name_li( $id = '' ) {

		if ( empty( $id ) ) {
			return '';
		}

		if ( ! $data = Better_Social_Counter_Data_Manager::get_short_data( $id ) ) {
			return '';
		}

		$output = ' <li class="social-item ' . $id . '" > ';

		if ( $this->decide_link( $id ) ) {
			$output .= '<a href = "' . $data->link() . '" target = "_blank" > ';
		}

		$output .= '<i class="item-icon bsfi-' . $id . '" ></i><span class="item-name" > ' . $data->get( 'name' ) . ' </span> ';

		if ( $this->decide_link( $id ) ) {
			$output .= '</a> ';
		}

		return $output . '</li> ';

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

		ob_start();

		if ( BF_Widgets_Manager::is_special_sidebar() ) {
			$atts['style'] = 'button';
		}

		if ( ! isset( $this->valid_styles[ $atts['style'] ] ) ) {
			$atts['style'] = 'clean';
		}

		if ( empty( $atts['css-class'] ) ) {
			$atts['css-class'] = '';
		}

		$atts['css-class'] .= ' better-studio-shortcode bsc-clearfix better-social-counter style-' . $atts['style'];

		if ( $atts['style'] != 'clean' ) {
			$atts['css-class'] .= $atts['colored'] ? ' colored' : ' not-colored';
		}

		$atts['css-class'] .= ' in-' . $atts['columns'] . '-col';

		if ( ! empty( $atts['custom-css-class'] ) ) {
			$atts['css-class'] .= ' ' . sanitize_html_class( $atts['custom-css-class'] );
		}

		$custom_id = empty( $atts['custom-id'] ) ? '' : sanitize_html_class( $atts['custom-id'] );

		if ( empty( $atts['order'] ) ) {
			$atts['order'] = array_flip( Better_Social_Counter_Data_Manager::self( false )->get_supported_sites() );
		}

		?>
		<div <?php
		if ( $custom_id ) {
			echo 'id="', $custom_id, '"';
		}
		?> class=" <?php echo esc_attr( $atts['css-class'] ); ?>">
			<?php

			bf_shortcode_show_title( $atts ); // show title

			// Custom and Auto Generated CSS Codes
			if ( ! empty( $atts['css-code'] ) ) {
				bf_add_css( $atts['css-code'], true, true );
			}

			?>
			<ul class="social-list bsc-clearfix"><?php

				if ( is_array( $atts['order'] ) ) {

					$atts['order'] = array_keys( $atts['order'] );

				} else {

					$atts['order'] = explode( ',', $atts['order'] );
				}

				$atts['order'] = array_filter( $atts['order'], array( $this, 'filter_active_items' ) );

				switch ( $atts['style'] ) {

					// Big Button Style
					case 'big-button':
						foreach ( $atts['order'] as $site ) {
							echo $this->get_big_button_li( $site );
						}
						break;

					// Button Style
					case 'button':
						foreach ( $atts['order'] as $site ) {
							echo $this->get_short_li( $site );
						}
						break;

					// Name Style
					case 'name':
						foreach ( $atts['order'] as $site ) {
							echo $this->get_name_li( $site );
						}
						break;

					// Other Full Styles
					default:
						foreach ( $atts['order'] as $site ) {
							echo $this->get_full_li( $site, $atts['style'] );
						}

				}
				?>
			</ul>
		</div>
		<?php

		return ob_get_clean();
	}


	/**
	 * @access internal
	 *
	 * @param string $item
	 *
	 * @return bool
	 */
	protected function filter_active_items( $item ) {

		return Better_Social_Counter_Data_Manager::self( false )->is_active( $item );
	}


	/**
	 * Registers Visual Composer Add-on
	 */
	function register_vc_add_on() {

		vc_map( array(
			"name"           => __( 'Better Social Counter', 'better-studio' ),
			"base"           => $this->id,
			"weight"         => 1,
			"wrapper_height" => 'full',
			"category"       => __( 'Content', 'better-studio' ),
			"params"         => $this->vc_map_listing_all(),
		) );
	}


	/**
	 * @return array
	 */
	public function get_fields() {

		// Fields of this shortcode
		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Style', 'better-studio' ),
				'id'   => 'style_options',
			),
			array(
				'name'           => __( 'Style', 'better-studio' ),
				'type'           => 'image_radio',
				"id"             => 'style',
				'section_class'  => 'style-floated-left',
				'options'        => array(
					'modern'     => array(
						'label' => __( 'Style 1', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-modern.jpg'
					),
					'clean'      => array(
						'label' => __( 'Style 2', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-clean.jpg'
					),
					'box'        => array(
						'label' => __( 'Style 3', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-box.jpg'
					),
					'button'     => array(
						'label' => __( 'Style 4', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-button.jpg'
					),
					'big-button' => array(
						'label' => __( 'Style 5', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-big-button.jpg'
					),
					'style-6'    => array(
						'label' => __( 'Style 6', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-6.jpg'
					),
					'style-7'    => array(
						'label' => __( 'Style 7', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-7.png'
					),
					'style-8'    => array(
						'label' => __( 'Style 8', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-8.png'
					),
					'style-9'    => array(
						'label' => __( 'Style 9', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-9.png'
					),
					'style-10'   => array(
						'label' => __( 'Style 10', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-10.png'
					),
					'style-11'   => array(
						'label' => __( 'Style 11', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-11.png'
					),
				),
				//
				"vc_admin_label" => true,
			),
			array(
				"type"           => 'select',
				"name"           => __( 'Number of Columns', 'better-studio' ),
				"id"             => 'columns',
				"options"        => array(
					'1'  => __( '1 Column', 'better-studio' ),
					'2'  => __( '2 Column', 'better-studio' ),
					'3'  => __( '3 Column', 'better-studio' ),
					'4'  => __( '4 Column', 'better-studio' ),
					'5'  => __( '5 Column', 'better-studio' ),
					'6'  => __( '6 Column', 'better-studio' ),
					'7'  => __( '7 Column', 'better-studio' ),
					'8'  => __( '8 Column', 'better-studio' ),
					'9'  => __( '9 Column', 'better-studio' ),
					'10' => __( '10 Column', 'better-studio' ),
				),
				//
				"vc_admin_label" => true,
			),
			array(
				"type"           => 'switchery',
				"name"           => __( 'Show in colored  style?', 'better-studio' ),
				"id"             => 'colored',
				//
				"vc_admin_label" => false,
			),
			array(
				'type' => 'tab',
				'name' => __( 'Sites', 'better-studio' ),
				'id'   => 'sites_tab',
			),
			array(
				"type"           => 'sorter_checkbox',
				"name"           => __( 'Active and Sort Sites', 'better-studio' ),
				"id"             => 'order',
				"options"        => Better_Social_Counter_Data_Manager::self()->get_widget_options_list(),
				'section_class'  => 'better-social-counter-sorter',
				//
				"vc_admin_label" => true,
			),
		);


		/**
		 * Retrieve heading fields from outside (our themes are defining them)
		 */
		{
			$heading_fields = apply_filters( 'better-framework/shortcodes/heading-fields', array(), $this->id );

			if ( $heading_fields ) {
				$fields = array_merge( $heading_fields, $fields );
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
}
