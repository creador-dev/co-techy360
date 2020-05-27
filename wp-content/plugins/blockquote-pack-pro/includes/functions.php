<?php


/**
 * List of quote styles used as BF field callback
 *
 * @return array
 */
function bs_blockquote_pack_styles_option( $default = FALSE ) {

	$version = BS_Blockquote_Pack_Pro::$version;

	$option = array();

	if ( $default ) {
		$option['default'] = array(
			'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-' . BS_Blockquote_Pack_Pro::get_option( 'quote-style' ) . '.png?v=' . $version ),
			'label' => __( 'Default Style', 'better-studio' ),
		);
	}

	$option['style-1']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-1.png?v=' . $version ),
		'label' => __( 'Style 1', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-2']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-2.png?v=' . $version ),
		'label' => __( 'Style 2', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-3']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-3.png?v=' . $version ),
		'label' => __( 'Style 3', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-4']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-4.png?v=' . $version ),
		'label' => __( 'Style 4', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
			),
		),
	);
	$option['style-5']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-5.png?v=' . $version ),
		'label' => __( 'Style 5', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-6']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-6.png?v=' . $version ),
		'label' => __( 'Style 6', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
			),
		),
	);
	$option['style-7']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-7.png?v=' . $version ),
		'label' => __( 'Style 7', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
			),
		),
	);
	$option['style-8']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-8.png?v=' . $version ),
		'label' => __( 'Style 8', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
			),
		),
	);
	$option['style-9']  = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-9.png?v=' . $version ),
		'label' => __( 'Style 9', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
			),
		),
	);
	$option['style-10'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-10.png?v=' . $version ),
		'label' => __( 'Style 10', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-11'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-11.png?v=' . $version ),
		'label' => __( 'Style 11', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-12'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-12.png?v=' . $version ),
		'label' => __( 'Style 12', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-13'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-13.png?v=' . $version ),
		'label' => __( 'Style 13', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-14'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-14.png?v=' . $version ),
		'label' => __( 'Style 14', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-15'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-15.png?v=' . $version ),
		'label' => __( 'Style 15', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-16'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-16.png?v=' . $version ),
		'label' => __( 'Style 16', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Minimal', 'better-studio' ),
			),
		),
	);
	$option['style-17'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-17.png?v=' . $version ),
		'label' => __( 'Style 17', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-18'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-18.png?v=' . $version ),
		'label' => __( 'Style 18', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Boxed', 'better-studio' ),
				__( 'Simple', 'better-studio' ),
			),
		),
	);
	$option['style-19'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-19.png?v=' . $version ),
		'label' => __( 'Style 19', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-20'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-20.png?v=' . $version ),
		'label' => __( 'Style 20', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-21'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-21.png?v=' . $version ),
		'label' => __( 'Style 21', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-22'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-22.png?v=' . $version ),
		'label' => __( 'Style 22', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Creative', 'better-studio' ),
			),
		),
	);
	$option['style-23'] = array(
		'img'   => BS_Blockquote_Pack_Pro::dir_url( 'img/options/quote-style-23.png?v=' . $version ),
		'label' => __( 'Style 23', 'better-studio' ),
		'info'  => array(
			'cat' => array(
				__( 'Simple', 'better-studio' ),
			),
		),
	);


	return $option;
} //themname_quote_styles_option


/**
 * Array config for panel CSS
 *
 * @return array
 */
function bs_blockquote_pack_panel_css_config() {

	$css = array(
		'bg_color'              =>
			array(
				'selector' =>
					array(
						1 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1:after',
						2 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s8 .quote-content:after',
					),
				'prop'     =>
					array(
						'background-color' => '%%value%%',
					),
			),
		'color'                 =>
			array(
				'selector' =>
					array(
						1 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s14',
						2 => 'blockquote.bs-quote.bsq-t1.bsq-s15.bs-quote:before',
					),
				'prop'     =>
					array(
						'color' => '%%value%%',
					),
			),
		'color_impo'            =>
			array(
				'selector' =>
					array(
						1 => 'blockquote.bs-quote.bs-quote.bs-quote a',
						2 => 'blockquote.bs-quote.bs-quote.bs-quote a:hover',
						3 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1:before',
						4 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s1:before',
						5 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s14',
						6 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s14 p',
						8 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s15:before',
						7 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s16:before',
					),
				'prop'     =>
					array(
						'color' => '%%value%%',
					),
			),
		'border_top_color_impo' =>
			array(
				'selector' =>
					array(
						1 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s8:after',
					),
				'prop'     =>
					array(
						'border-top-color' => '%%value%%',
					),
			),
		'quote_18'              =>
			array(
				'selector' =>
					array(
						0 => 'blockquote.bs-quote.bs-quote.bs-quote.bsq-t1.bsq-s15 .quote-content',
					),
				'prop'     =>
					array(
						'-webkit-box-shadow' => '10px 0 0 %%value%%, -10px 0 0 %%value%%',
						'-moz-box-shadow'    => '10px 0 0 %%value%%, -10px 0 0 %%value%%',
						'box-shadow'         => '10px 0 0 %%value%%, -10px 0 0 %%value%%',
						'background'         => '%%value%%',
					),
			),
	);

	return $css;
} //themname_quote_styles_option
