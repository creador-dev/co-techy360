<?php


$fields['header_bg_color'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0  => '.site-header.header-style-1',
							1  => '.site-header.header-style-2',
							2  => '.site-header.header-style-3',
							3  => '.site-header.header-style-4',
							4  => '.site-header.header-style-5.full-width',
							5  => '.site-header.header-style-5.boxed > .content-wrap > .container',
							6  => '.site-header.header-style-5.boxed > .bs-pinning-wrapper > .bs-pinning-block',
							7  => '.site-header.header-style-6',
							8  => '.site-header.header-style-6 > .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
							9  => '.site-header.header-style-7',
							10 => '.site-header.header-style-8',
							11 => '.site-header.header-style-8 > .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
						),
					'prop'     =>
						array(
							'background-color' => '%%value%%',
						),
				),
		),
);

$fields['header_bg_image'] = array(
	'css' =>
		array(
			0 =>
				array(
					'selector' =>
						array(
							0 => '.site-header.header-style-1',
							1 => '.site-header.header-style-2',
							2 => '.site-header.header-style-3',
							3 => '.site-header.header-style-4',
							4 => '.site-header.header-style-5 .content-wrap',
							5 => '.site-header.header-style-7',
						),
					'prop'     =>
						array(
							0 => 'background-image',
						),
					'type'     => 'background-image',
				),
		),
);

$fields['header_top_padding'] = array(
	'css-echo-default' => false,
	'css'              => array(
		array(
			'selector' => array(
				0 => '.site-header.header-style-1 .header-inner',
				1 => '.site-header.header-style-2 .header-inner',
				2 => '.site-header.header-style-3 .header-inner',
				3 => '.site-header.header-style-4 .header-inner',
				4 => '.site-header.header-style-7 .header-inner',
				5 => '.site-header.header-style-1.h-a-ad .header-inner',
				6 => '.site-header.header-style-4.h-a-ad .header-inner',
				7 => '.site-header.header-style-7.h-a-ad .header-inner',
			),
			'prop'     => array( 'padding-top' => '%%value%%px !important' ),
		)
	),
);

$fields['header_bottom_padding'] = array(
	'css-echo-default' => false,
	'css'              => array(
		array(
			'selector' => array(
				0 => '.site-header.header-style-1 .header-inner',
				1 => '.site-header.header-style-2 .header-inner',
				2 => '.site-header.header-style-3 .header-inner',
				3 => '.site-header.header-style-4 .header-inner',
				4 => '.site-header.header-style-7 .header-inner',
				5 => '.site-header.header-style-1.h-a-ad .header-inner',
				6 => '.site-header.header-style-4.h-a-ad .header-inner',
				7 => '.site-header.header-style-7.h-a-ad .header-inner',
			),
			'prop'     => array( 'padding-bottom' => '%%value%%px !important' ),
		)
	),
);


/**
 * -> Background
 */
$fields['bg_color'] = array(
	'css' => array(
		array(
			'selector' =>
				array(
					0 => 'body',
					1 => 'body.boxed',
				),
			'prop'     =>
				array(
					'background-color' => '%%value%%',
				),
		),
	)
);
$fields['bg_image'] = array(
	'css' => array(
		array(
			'selector' => array(
				'body'
			),
			'prop'     => array( 'background-image' ),
			'type'     => 'background-image',
		)
	)
);
