<?php


add_filter( 'better-fonts-manager/theme-fonts', 'publisher_add_theme_custom_fonts' );

/**
 * Adds custom fonts to Publisher
 *
 * @param $fonts
 *
 * @return mixed
 */
function publisher_add_theme_custom_fonts( $fonts ) {

	$fonts['Iran Sans - Regular'] = array(
		'id'    => 'Iran Sans - Regular',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iransans/woff/IRANSansWeb.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iransans/woff2/IRANSansWeb.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iransans/ttf/IRANSansWeb.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iransans/eot/IRANSansWeb.eot' ),
	);

	$fonts['Iran Sans - Ultra Light'] = array(
		'id'    => 'Iran Sans - Ultra Light',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iransans/woff/IRANSansWeb_UltraLight.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iransans/woff2/IRANSansWeb_UltraLight.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iransans/ttf/IRANSansWeb_UltraLight.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iransans/eot/IRANSansWeb_UltraLight.eot' ),
	);

	$fonts['Iran Sans - Light'] = array(
		'id'    => 'Iran Sans - Light',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iransans/woff/IRANSansWeb_Light.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iransans/woff2/IRANSansWeb_Light.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iransans/ttf/IRANSansWeb_Light.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iransans/eot/IRANSansWeb_Light.eot' ),
	);

	$fonts['Iran Sans - Medium'] = array(
		'id'    => 'Iran Sans - Medium',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iransans/woff/IRANSansWeb_Medium.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iransans/woff2/IRANSansWeb_Medium.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iransans/ttf/IRANSansWeb_Medium.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iransans/eot/IRANSansWeb_Medium.eot' ),
	);

	$fonts['Iran Sans - Bold'] = array(
		'id'    => 'Iran Sans - Bold',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iransans/woff/IRANSansWeb_Bold.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iransans/woff2/IRANSansWeb_Bold.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iransans/ttf/IRANSansWeb_Bold.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iransans/eot/IRANSansWeb_Bold.eot' ),
	);

	$fonts['Iran Sans - Black'] = array(
		'id'    => 'Iran Sans - Black',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iransans/woff/IRANSansWeb_Black.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iransans/woff2/IRANSansWeb_Black.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iransans/ttf/IRANSansWeb_Black.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iransans/eot/IRANSansWeb_Black.eot' ),
	);

	//
	// Iran Yekan Family
	//

	$fonts['Iran Yekan - Thin'] = array(
		'id'   => 'Iran Sans - thin',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebthin.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebthin.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebthin.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebthin.eot' ),
	);

	$fonts['Iran Yekan - Light'] = array(
		'id'   => 'Iran Sans - Light',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanweblight.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanweblight.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanweblight.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanweblight.eot' ),
	);

	$fonts['Iran Yekan - Regular'] = array(
		'id'   => 'Iran Sans - Regular',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebregular.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebregular.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebregular.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebregular.eot' ),
	);

	$fonts['Iran Yekan - Medium'] = array(
		'id'   => 'Iran Sans - Medium',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebmedium.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebmedium.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebmedium.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebmedium.eot' ),
	);

	$fonts['Iran Yekan - Bold'] = array(
		'id'    => 'Iran Sans - Black',
		'woff'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebbold.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebbold.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebbold.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebbold.eot' ),
	);

	$fonts['Iran Yekan - Extra Bold'] = array(
		'id'   => 'Iran Sans - Extra Bold',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebextrabold.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebextrabold.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebextrabold.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebextrabold.eot' ),
	);

	$fonts['Iran Yekan - Black'] = array(
		'id'   => 'Iran Sans - Black',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebblack.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebblack.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebblack.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebblack.eot' ),
	);

	$fonts['Iran Yekan - Extra Black'] = array(
		'id'   => 'Iran Sans - Extra Black',
		'woff' => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebextrablack.woff' ),
		'svg'  => bf_get_theme_uri( 'includes/fonts/iranyekan/woff/iranyekanwebextrablack.svg' ),
		'ttf'  => bf_get_theme_uri( 'includes/fonts/iranyekan/ttf/iranyekanwebextrablack.ttf' ),
		'eot'  => bf_get_theme_uri( 'includes/fonts/iranyekan/eot/iranyekanwebextrablack.eot' ),
	);


	//
	// Sahel Family
	//

	$fonts['Sahel - Regular'] = array(
		'id'    => 'Sahel - Regular',
		'woff'  => bf_get_theme_uri( 'includes/fonts/sahel/woff/Sahel-FD.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/sahel/woff/Sahel-FD.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/sahel/ttf/Sahel-FD.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/sahel/eot/Sahel-FD.eot' ),
	);

	$fonts['Sahel - Bold'] = array(
		'id'    => 'Sahel - Bold',
		'woff'  => bf_get_theme_uri( 'includes/fonts/sahel/woff/Sahel-Bold-FD.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/sahel/woff/Sahel-Bold-FD.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/sahel/ttf/Sahel-Bold-FD.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/sahel/eot/Sahel-Bold-FD.eot' ),
	);

	$fonts['Sahel - Black'] = array(
		'id'    => 'Sahel - Black',
		'woff'  => bf_get_theme_uri( 'includes/fonts/sahel/woff/Sahel-Black-FD.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/sahel/woff/Sahel-Black-FD.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/sahel/ttf/Sahel-Black-FD.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/sahel/eot/Sahel-Black-FD.eot' ),
	);


	//
	// Vazir Family
	//

	$fonts['Vazir - Regular'] = array(
		'id'    => 'Vazir - Regular',
		'woff'  => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-FD-WOL.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-FD-WOL.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/vazir/ttf/Vazir-FD-WOL.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/vazir/eot/Vazir-FD-WOL.eot' ),
	);

	$fonts['Vazir - Black'] = array(
		'id'    => 'Vazir - Black',
		'woff'  => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Black-FD-WOL.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Black-FD-WOL.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/vazir/ttf/Vazir-Black-FD-WOL.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/vazir/eot/Vazir-Black-FD-WOL.eot' ),
	);

	$fonts['Vazir - Bold'] = array(
		'id'    => 'Vazir - Bold',
		'woff'  => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Bold-FD-WOL.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Bold-FD-WOL.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/vazir/ttf/Vazir-Bold-FD-WOL.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/vazir/eot/Vazir-Bold-FD-WOL.eot' ),
	);

	$fonts['Vazir - Light'] = array(
		'id'    => 'Vazir - Light',
		'woff'  => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Light-FD-WOL.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Light-FD-WOL.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/vazir/ttf/Vazir-Light-FD-WOL.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/vazir/eot/Vazir-Light-FD-WOL.eot' ),
	);

	$fonts['Vazir - Medium'] = array(
		'id'    => 'Vazir - Medium',
		'woff'  => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Medium-FD-WOL.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Medium-FD-WOL.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/vazir/ttf/Vazir-Medium-FD-WOL.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/vazir/eot/Vazir-Medium-FD-WOL.eot' ),
	);

	$fonts['Vazir - Thin'] = array(
		'id'    => 'Vazir - Thin',
		'woff'  => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Thin-FD-WOL.woff' ),
		'woff2' => bf_get_theme_uri( 'includes/fonts/vazir/woff/Vazir-Thin-FD-WOL.woff2' ),
		'ttf'   => bf_get_theme_uri( 'includes/fonts/vazir/ttf/Vazir-Thin-FD-WOL.ttf' ),
		'eot'   => bf_get_theme_uri( 'includes/fonts/vazir/eot/Vazir-Thin-FD-WOL.eot' ),
	);

	return $fonts;
}
