<?php
/**
 * bs-heading.php
 *---------------------------
 * [bs-heading] shortcode
 *
 */


/**
 * Publisher Heading shortcode
 */
class Publisher_White_Space_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-white-space';

		$_options = array(
			'defaults'              => array(
				'desktop-ws' => '30',
				'tablet-ws'  => '16',
				'mobile-ws'  => '10',
			),
			'have_widget'           => false,
			'have_vc_add_on'        => false,
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => false,
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

		ob_start();

		if ( bf_is_doing_ajax( 'fetch-mce-view-shortcode' ) ) {
			$this->tinymce_view( $atts );
		} else {
			$atts       = shortcode_atts( $this->defaults, $atts );
			$data_attrs = '';
			foreach (
				wp_array_slice_assoc( $atts, array(
					'desktop-ws',
					'tablet-ws',
					'mobile-ws'
				) ) as $key => $value
			) {
				$data_attrs .= 'data-' . $key . '="' . esc_attr( $value ) . '"';
			}
			echo '<div class="bs-white-space"', $data_attrs, '></div>';
		}

		return ob_get_clean();
	}


	public function tinymce_view( $atts ) {

		?>
		<div class="bs-white-space">

			<div class="label">White Space</div>

			<ul class="detail">

				<li class="desktop">
					<i class="fa fa-desktop" aria-hidden="true"></i>
					<span>
						<?php
						if ( isset( $atts['desktop-ws'] ) ) {
							echo intval( $atts['desktop-ws'] );
						} else {
							echo intval( $this->defaults['desktop-ws'] );
						}
						?>px</span>
				</li>

				<li class="tablet">
					<i class="fa fa-tablet" aria-hidden="true"></i>
					<span><?php
						if ( isset( $atts['tablet-ws'] ) ) {
							echo intval( $atts['tablet-ws'] );
						} else {
							echo intval( $this->defaults['tablet-ws'] );
						}
						?>px</span>
				</li>

				<li class="mobile">
					<i class="fa fa-mobile" aria-hidden="true"></i>
					<span><?php
						if ( isset( $atts['mobile-ws'] ) ) {
							echo intval( $atts['mobile-ws'] );
						} else {
							echo intval( $this->defaults['mobile-ws'] );
						}
						?>px</span>
				</li>
			</ul>
		</div>
		<?php
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
				'name'      => __( 'Desktop White-Space', 'publisher' ),
				'id'        => 'desktop-ws',
				//
				'type'      => 'slider',
				'dimension' => 'pixel',
				'min'       => '0',
				'max'       => '600',
				'step'      => '2',
				//
				'std'       => '10',
			),

			array(
				'name'      => __( 'Tablet White-Space', 'publisher' ),
				'id'        => 'tablet-ws',
				//
				'type'      => 'slider',
				'dimension' => 'pixel',
				'min'       => '0',
				'max'       => '600',
				'step'      => '2',
				//
				'std'       => '10',
			),

			array(
				'name'      => __( 'Mobile White-Space', 'publisher' ),
				'id'        => 'mobile-ws',
				//
				'type'      => 'slider',
				'dimension' => 'pixel',
				'min'       => '0',
				'max'       => '300',
				'step'      => '2',
				//
				'std'       => '10',
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
			'name' => __( 'White Space', 'publisher' ),

			'styles' => array(
				array(
					'type' => 'inline',
					'data' => '
						.bs-white-space {
							min-height: 100px;
							color: #cacaca;
							background: #fff;

							position: relative;
							border: 2px dashed #e1e1e1;
						}
						.bs-white-space .label {
							color: #8f8f8f;
							font-size: 15px;
							text-transform: uppercase;

							position: absolute;
							top: 50%;
							transform: translateY(-50%);
							width: 100%;
							display: block;
						}
						.bs-white-space .detail {
							letter-spacing: normal;
							position: absolute;
							left: 20px;
							bottom: 10px;

							margin: 0;
							padding: 0;
						}
						.bs-white-space .detail li {
							display: inline-block;
							margin-right: 20px;
							font-size: 12px;
						}
						.bs-white-space .detail .fa {
							font-size: 16px;
							vertical-align: middle;
						}
						.bs-white-space .detail span{
							vertical-align: middle;
						}
					',
				),

				array(
					'type' => 'registered',
					'data' => array( 'fontawesome' ),
				)
			),

			'scripts'       => array(
				array(
					'type'    => 'registered',
					'handles' => array( 'jquery-ui-resizable' ),
				),
				array(
					'type' => 'inline',
					'data' => '
						jQuery(function($){
							console.log("RESIZABLE");
							$(".bs-white-space").resizable();
						});
					'
				),
			),
			'view_features' => array(
				'jquery-ui-resizable'
			),
		);
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'     => __( 'White Space', 'publisher' ),
			"id"       => $this->id,
			"category" => publisher_white_label_get_option( 'publisher' ),
		);
	} // page_builder_settings

}
