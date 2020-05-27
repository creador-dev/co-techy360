<?php

/**
 * bs-smart-list-shortcodes.php
 *---------------------------
 * Shortcodes for smart list.
 *
 */
class BS_Smart_List_Break_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$_options = array(
			'defaults'              => array(),
			'have_tinymce_add_on'   => true,
			'have_gutenberg_add_on' => true,
		);

		parent::__construct( $id, $_options, true );

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

		if ( bf_is_doing_ajax( 'fetch-mce-view-shortcode' ) || bf_is_block_render_request() ) {

			return '<div class="bssl-list-break bssl-list-break-start">
						<div class="title"><img src="' . BS_Smart_Lists_Pack_Pro::dir_url( 'img/options/editor-list-' . ( $this->id === 'bs_smart_list_pack_start' ? 'start' : 'stop' ) . '.svg' ) . '">
				' . $this->name . '</div></div>';
		}

		// Smart list is not active for current post.
		if ( ! bf_get_post_meta( '_bs_smart_lists_enabled', get_the_ID(), false ) ) {
			return '';
		}

		return '<span class="bs-smart-list-' . ( $this->id === 'bs_smart_list_pack_start' ? 'start' : 'end' ) . '"></span>';
	}


	/**
	 * TinyMCE view  settings
	 *
	 * @return array
	 */
	function tinymce_settings() {

		return array(
			'name' => $this->name,

			'styles' => array(
				array(
					'type' => 'inline',
					'data' => '
						.mce-content-body p:empty {
							display: none;
						}
		
						.bssl-list-break {
							color: #3579A6;
							background: #fff;
							position: relative;
							padding: 10px;
						}
		
						.bssl-list-break .title {
							color: #3579A6;
							font-size: 17px;
							display: block;
							text-align: inherit;
							font-weight: 400;
							font-family: sans-serif;
							line-height: 36px;
						}
		
						.bssl-list-break .title img {
							margin: 0 10px;
						}
					',
				),
			),
		);
	}


	/**
	 * Custom Fields
	 *
	 * @return array
	 */
	public function get_fields() {

		return array(
			array(
				'std'       => __( '<p>This shortcode is only for breaking smart lists content and have not any settings.</p>', 'better-studio' ),
				'name'      => __( 'Please note', 'better-studio' ),
				'id'        => 'help',
				//
				'type'      => 'info',
				'state'     => 'open',
				'info-type' => 'help',
			),
		);
	}


	/**
	 * Page builder block/map category.
	 */
	public function block_category() {

		global $pagenow;

		if ( defined( 'GUTENBERG_VERSION' ) && GUTENBERG_VERSION ) {

			// can not use is_gutenberg_page() function

			if ( in_array( $pagenow, array(
					'post.php',
					'post-new.php'
				) ) && ! isset( $_GET['classic-editor'] )
			) {

				return 'common';
			}

		}

		return __( 'Better Studio', 'better-studio' );
	}


	/**
	 * Registers Page Builder Add-on
	 */
	function page_builder_settings() {

		return array(
			'name'           => $this->name,
			"id"             => $this->id,
			"weight"         => 10,
			"wrapper_height" => 'full',
			"category"       => $this->block_category(),
			'icon_url'       => BS_Smart_Lists_Pack_Pro::dir_url( 'images/ ' . $this->id . '.png' ),
		);
	}
}


/**
 * bs_smart_list_pack_start shortcode
 */
class BS_Smart_List_Start_Shortcode extends BS_Smart_List_Break_Shortcode {

	function __construct( $id, $options ) {

		$this->name = __( 'Smart List Start Break', 'better-studio' );

		parent::__construct( 'bs_smart_list_pack_start', $options );
	}

}


/**
 * bs_smart_list_pack_end shortcode
 */
class BS_Smart_List_End_Shortcode extends BS_Smart_List_Break_Shortcode {

	function __construct( $id, $options ) {

		$this->name = __( 'Smart List Stop Break', 'better-studio' );

		parent::__construct( 'bs_smart_list_pack_end', $options );

	}
}
