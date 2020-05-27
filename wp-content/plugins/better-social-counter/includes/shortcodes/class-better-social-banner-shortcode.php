<?php


/**
 * Better Social Counter Shortcode
 */
class Better_Social_Banner_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id              = 'better-social-banner';
		$this->widget_id = 'better-social-banner';

		$options = array_merge( array(
			'defaults'       => array(
				'title'           => '',
				'show_title'      => 0,
				'site'            => '',
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
	 * Handle displaying of shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {

		ob_start();

		if ( empty( $atts['css-class'] ) ) {
			$atts['css-class'] = '';
		}

		$atts['css-class'] .= ' better-studio-shortcode better-social-banner bsc-clearfix';

		$custom_id = empty( $atts['custom-id'] ) ? '' : sanitize_html_class( $atts['custom-id'] );

		?>
		<div <?php
		if ( $custom_id ) {
			echo 'id="', $custom_id, '"';
		}
		?> class=" <?php echo esc_attr( $atts['css-class'] ); ?>">
			<?php


			$this->display_inner( $atts );

			?>
		</div>
		<?php

		return ob_get_clean();
	}


	public function display_inner( $atts ) {

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		if ( ! $data = Better_Social_Counter_Data_Manager::get_full_data( $atts['site'] ) ) {
			return '';
		}

		?>
		<a href="<?php echo $data->link(); ?>" class="banner-item item-<?php echo $atts['site']; ?>">
			<i class="item-icon bsfi-<?php echo $atts['site']; ?>"
			   aria-label="<?php echo $atts['site']; ?>"></i>
			<span class="item-count"><?php

				if ( $count = $data->count() ) {

					echo $count;

				} else {

					echo $data->get( 'name' );
				}

				?></span>
			<span class="item-title"><?php

				if ( $title = $data->get( 'title' ) ) {

					echo $title;

				} else {

					echo $data->get( 'button' );
				}

				?></span>
			<span class="item-button"><?php

				if ( $button = $data->get( 'button' ) ) {

					echo $button;

				} else {

					echo $data->get( 'title_join' );
				}

				?></span>
		</a>
		<?php
	}


	/**
	 * Registers Visual Composer Add-on
	 */
	function register_vc_add_on() {

		vc_map( array(
			"name"           => __( 'Better Social Banner', 'better-studio' ),
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

		$sites = Better_Social_Counter_Data_Manager::self()->get_select_options_for_banner( true, true );

		// Select first active site
		$active_site = '';
		if ( empty( $this->defaults['site'] ) ) {
			foreach ( $sites as $site_key => $site_value ) {
				if ( is_array( $site_value ) ) {
					continue;
				}
				$active_site = $site_key;
				break;
			}
		}

		// Fields of this shortcode
		$fields = array(
			array(
				'type' => 'tab',
				'name' => __( 'Site', 'better-studio' ),
				'id'   => 'style_options',
			),
			array(
				'name'           => __( 'Site', 'better-studio' ),
				'type'           => 'select',
				"id"             => 'site',
				"std"            => empty( $this->defaults['site'] ) ? $active_site : $this->defaults['site'],
				'options'        => $sites,
				//
				"vc_admin_label" => true,
			)
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
}
