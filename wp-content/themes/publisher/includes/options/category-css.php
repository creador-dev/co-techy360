<?php

/**
 * => Style
 */
$fields['term_color'] = array(
	'css' => include PUBLISHER_THEME_PATH . 'includes/options/category-css-term_color.php',
);


/**
 * -> Background
 */
$fields['bg_color'] = array(
	'css' => array(
		array(
			'selector' => array(
				0 => 'body.category-%%id%%',
				1 => 'body.boxed.category-%%id%%',
			),
			'prop'     => array(
				'background-color' => '%%value%%'
			)
		),
	)
);
$fields['bg_image'] = array(
	'css' => array(
		array(
			'selector' => array(
				'body.category-%%id%%'
			),
			'prop'     => array( 'background-image' ),
			'type'     => 'background-image',
		)
	)
);


/**
 * -> Logo
 */
$fields['header_top_padding']    = array(
	'css-echo-default' => false,
	'css'              => array(
		array(
			'selector' => array(
				0 => 'body.category-%%id%% .site-header.header-style-1 .header-inner',
				1 => 'body.category-%%id%% .site-header.header-style-2 .header-inner',
				2 => 'body.category-%%id%% .site-header.header-style-3 .header-inner',
				3 => 'body.category-%%id%% .site-header.header-style-4 .header-inner',
				4 => 'body.category-%%id%% .site-header.header-style-7 .header-inner',
				5 => 'body.category-%%id%% .site-header.header-style-1.h-a-ad .header-inner',
				6 => 'body.category-%%id%% .site-header.header-style-4.h-a-ad .header-inner',
				7 => 'body.category-%%id%% .site-header.header-style-7.h-a-ad .header-inner',
			),
			'prop'     => array( 'padding-top' => '%%value%%px' ),
		)
	),
);
$fields['header_bottom_padding'] = array(
	'css-echo-default' => false,
	'css'              => array(
		array(
			'selector' => array(
				0 => 'body.category-%%id%% .site-header.header-style-1 .header-inner',
				1 => 'body.category-%%id%% .site-header.header-style-2 .header-inner',
				2 => 'body.category-%%id%% .site-header.header-style-3 .header-inner',
				3 => 'body.category-%%id%% .site-header.header-style-4 .header-inner',
				4 => 'body.category-%%id%% .site-header.header-style-7 .header-inner',
				5 => 'body.category-%%id%% .site-header.header-style-1.h-a-ad .header-inner',
				6 => 'body.category-%%id%% .site-header.header-style-4.h-a-ad .header-inner',
				7 => 'body.category-%%id%% .site-header.header-style-7.h-a-ad .header-inner',
			),
			'prop'     => array( 'padding-bottom' => '%%value%%px' ),
		)
	),
);
