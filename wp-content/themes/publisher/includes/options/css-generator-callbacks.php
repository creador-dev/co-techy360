<?php

if ( ! function_exists( 'publisher_cb_css_generator_layout_2_col' ) ) {
	/**
	 * Custom CSS generator for 2 column layout
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_layout_2_col( &$block = array(), &$value = '' ) {

		$block = array();

		//
		// Site width
		//
		$block[1] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.page-layout-1-col .container',
					2  => '.page-layout-1-col .content-wrap',
					3  => 'body.page-layout-1-col .boxed.site-header .main-menu-wrapper',
					4  => 'body.page-layout-1-col .boxed.site-header.header-style-5 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
					5  => 'body.page-layout-1-col .boxed.site-header.header-style-6 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
					6  => 'body.page-layout-1-col .boxed.site-header.header-style-8 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
					7  => 'body.page-layout-1-col.boxed .main-wrap',
					8  => '.page-layout-2-col-right .container',
					9  => '.page-layout-2-col-right .content-wrap',
					10 => 'body.page-layout-2-col-right.boxed .main-wrap',
					11 => '.page-layout-2-col-left .container',
					12 => '.page-layout-2-col-left .content-wrap',
					13 => 'body.page-layout-2-col-left.boxed .main-wrap',
					14 => '.page-layout-1-col .bs-vc-content>.vc_row',
					17 => '.page-layout-1-col .bs-vc-content>.vc_vc_row',
					// front end edit
					15 => '.page-layout-1-col .bs-vc-content .vc_row[data-vc-full-width=true] > .bs-vc-wrapper',
					16 => '.footer-instagram.boxed,.site-footer.boxed',
					// 17 reserved
					// Ultimate VC Addon compatibility
					18 => '.page-layout-1-col .bs-vc-content>.vc_row.vc_row-has-fill .upb-background-text.vc_row',
					// max-width for injection locations
					19 => '.bs-injection.bs-injection-1-col>.vc_row',
					20 => '.bs-injection.bs-injection-1-col>.vc_vc_row',
					21 => '.bs-injection.bs-injection-1-col>.vc_row[data-vc-full-width=true] > .bs-vc-wrapper',
					22 => '.bs-injection.bs-injection-2-col>.vc_row',
					23 => '.bs-injection.bs-injection-2-col>.vc_vc_row',
					24 => '.bs-injection.bs-injection-2-col>.vc_row[data-vc-full-width=true] > .bs-vc-wrapper',
				),
			'prop'            =>
				array(
					'max-width' => _themename_width_changer_to_px( $value['width'] ),
					'width'     => '100%',
				),
		);

		//
		// Content column width
		//
		$block[2] = array(
			'before'          => '@media (min-width: 768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-2-col .content-column',
					2 => '.bf-2-main-column-size',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);

		//
		// Sidebar column width
		//
		$block[3] = array(
			'before'          => '@media (min-width: 768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-2-col .sidebar-column',
					2 => '.bf-2-primary-column-size',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);


		//
		// Push content column to right
		//
		$block[4] = array(
			'before'          => '@media (min-width: 768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-2-col.layout-2-col-2 .content-column',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);
		$block[5] = array(
			'before'          => '@media (min-width: 768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-2-col.layout-2-col-2 .content-column',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);


		//
		// Pull sidebar column to left
		//
		$block[6] = array(
			'before'          => '@media (min-width: 768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-2-col.layout-2-col-2 .sidebar-column',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);
		$block[7] = array(
			'before'          => '@media (min-width: 768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-2-col.layout-2-col-2 .sidebar-column',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);


		//
		// Hide Skyscrapper ad
		//
		$block[8] = array(
			'before'          => '@media (max-width: ' . ( $value['width'] + 90 ) . 'px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.page-layout-1-col .bs-sks .bs-sksitem',
					2 => '.page-layout-2-col-right .bs-sks .bs-sksitem',
					3 => '.page-layout-2-col-left .bs-sks .bs-sksitem',
				),
			'prop'            =>
				array(
					'display' => 'none !important',
				),
		);


		$value = '';

	} // publisher_cb_css_generator_layout_2_col
}


if ( ! function_exists( 'publisher_cb_css_generator_layout_3_col' ) ) {
	/**
	 * Custom CSS generator for 3 column layout
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_layout_3_col( &$block = array(), &$value = '' ) {

		$block = array();

		$sm_content = $value['content'] + ceil( $value['secondary'] / 2 );
		$sm_primary = 100 - $sm_content;

		$xs_primary   = $value['primary'] + ceil( $value['content'] / 2 );
		$xs_secondary = 100 - $xs_primary;

		//
		// Site width
		//
		$block[1] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.page-layout-3-col-0 .container',
					2  => '.page-layout-3-col-0 .content-wrap',
					3  => 'body.page-layout-3-col-0.boxed .main-wrap',
					4  => '.page-layout-3-col-1 .container',
					5  => '.page-layout-3-col-1 .content-wrap',
					6  => 'body.page-layout-3-col-1.boxed .main-wrap',
					7  => '.page-layout-3-col-2 .container',
					8  => '.page-layout-3-col-2 .content-wrap',
					9  => 'body.page-layout-3-col-2.boxed .main-wrap',
					10 => '.page-layout-3-col-3 .container',
					11 => '.page-layout-3-col-3 .content-wrap',
					12 => 'body.page-layout-3-col-3.boxed .main-wrap',
					13 => '.page-layout-3-col-4 .container',
					14 => '.page-layout-3-col-4 .content-wrap',
					15 => 'body.page-layout-3-col-4.boxed .main-wrap',
					16 => '.page-layout-3-col-5 .container',
					17 => '.page-layout-3-col-5 .content-wrap',
					18 => 'body.page-layout-3-col-5.boxed .main-wrap',
					19 => '.page-layout-3-col-6 .container',
					20 => '.page-layout-3-col-6 .content-wrap',
					21 => 'body.page-layout-3-col-6.boxed .main-wrap',
					22 => 'body.boxed.page-layout-3-col .site-header.header-style-5 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
					23 => 'body.boxed.page-layout-3-col .site-header.header-style-6 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
					24 => 'body.boxed.page-layout-3-col .site-header.header-style-8 .content-wrap > .bs-pinning-wrapper > .bs-pinning-block',
					25 => '.layout-3-col-0 .bs-vc-content>.vc_row',
					27 => '.layout-3-col-0 .bs-vc-content>.vc_vc_row',
					// front end edit!
					26 => '.layout-3-col-0 .bs-vc-content .vc_row[data-vc-full-width=true] > .bs-vc-wrapper',
					// 28 reserved
					29 => '.layout-3-col-0 .bs-vc-content>.vc_row.vc_row-has-fill .upb-background-text.vc_row',
					// Ultimate VC Addon compatibility
					30 => '.bs-injection.bs-injection-3-col>.vc_row',
					31 => '.bs-injection.bs-injection-3-col>.vc_vc_row',
					32 => '.bs-injection.bs-injection-3-col>.vc_row[data-vc-full-width=true] > .bs-vc-wrapper',
				),
			'prop'            =>
				array(
					'max-width' => _themename_width_changer_to_px( $value['width'] ),
					'width'     => '100%',
				),
		);


		//
		// Content > 1000px
		//
		$block[2] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .content-column',
					2 => '.bf-3-main-column-size',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);


		//
		// Primary > 1000px
		//
		$block[3] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .sidebar-column-primary',
					2 => '.bf-3-primary-column-size',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);


		//
		// Secondary > 1000px
		//
		$block[4] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .sidebar-column-secondary',
					2 => '.bf-3-secondary-column-size',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);


		//
		// 768px < Layout-3-col-1 < 1000px
		// 768px < Layout-3-col-2 < 1000px
		//
		$block[5] = array(
			'before'          => '@media (max-width:1000px) and (min-width:768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .content-column',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $sm_content, '%' ),
				),
		);
		$block[6] = array(
			'before'          => '@media (max-width:1000px) and (min-width:768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $sm_primary, '%' ),
				),
		);

		//
		// 500px < Layout-3-col-1 < 768px
		//
		$block[7] = array(
			'before'          => '@media (max-width:767px) and (min-width:500px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $xs_primary, '%' ),
				),
		);
		$block[8] = array(
			'before'          => '@media (max-width:767px) and (min-width:500px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'width' => _themename_width_changer_to_px( $xs_secondary, '%' ),
				),
		);


		//
		// Layout-3-col-2 > 1000px
		//
		$block[9]  = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-2 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);
		$block[10] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-2 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);
		$block[11] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-2 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);
		$block[12] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-2 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);


		//
		// Layout-3-col-3 > 1000px
		//
		$block[13] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-3 .content-column',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);
		$block[14] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-3 .content-column',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['primary'], '%' ),
				),
		);
		$block[15] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-3 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);
		$block[16] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-3 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);


		//
		// Layout-3-col-4 > 1000px
		//
		$block[17] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-4 .content-column',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);
		$block[18] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-4 .content-column',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);
		$block[19] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-4 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);
		$block[20] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-4 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['secondary'], '%' ),
				),
		);
		$block[21] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-4 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'] + $value['primary'], '%' ),
				),
		);
		$block[22] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-4 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'] + $value['primary'], '%' ),
				),
		);


		//
		// Layout-3-col-5 > 1000px
		//
		$block[23] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-5 .content-column',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['secondary'] + $value['primary'], '%' ),
				),
		);
		$block[24] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-5 .content-column',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['secondary'] + $value['primary'], '%' ),
				),
		);
		$block[25] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-5 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);
		$block[26] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-5 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);
		$block[27] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-5 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);
		$block[28] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-5 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'], '%' ),
				),
		);


		//
		// Layout-3-col-6 > 1000px
		//
		$block[29] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-6 .content-column',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $value['secondary'] + $value['primary'], '%' ),
				),
		);
		$block[30] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-6 .content-column',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $value['secondary'] + $value['primary'], '%' ),
				),
		);
		$block[31] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-6 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'] - $value['secondary'], '%' ),
				),
		);
		$block[32] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-6 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'] - $value['secondary'], '%' ),
				),
		);
		$block[33] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-6 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $value['content'] + $value['primary'], '%' ),
				),
		);
		$block[34] = array(
			'before'          => '@media (min-width: 1000px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-6 .sidebar-column-secondary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $value['content'] + $value['primary'], '%' ),
				),
		);


		//
		// 500px < Layout-3-col-3 < 768px
		// 500px < Layout-3-col-5 < 768px
		// 500px < Layout-3-col-6 < 768px
		//
		$block[35] = array(
			'before'          => '@media (max-width:1000px) and (min-width:768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-3 .content-column',
					2 => '.layout-3-col-5 .content-column',
					3 => '.layout-3-col-6 .content-column',
				),
			'prop'            =>
				array(
					'left' => _themename_width_changer_to_px( $sm_primary, '%' ),
				),
		);
		$block[36] = array(
			'before'          => '@media (max-width:1000px) and (min-width:768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-3 .content-column',
					2 => '.rtl .layout-3-col-5 .content-column',
					3 => '.rtl .layout-3-col-6 .content-column',
				),
			'prop'            =>
				array(
					'left'  => 'inherit',
					'right' => _themename_width_changer_to_px( $sm_primary, '%' ),
				),
		);
		$block[37] = array(
			'before'          => '@media (max-width:1000px) and (min-width:768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-3-col-3 .sidebar-column-primary',
					2 => '.layout-3-col-5 .sidebar-column-primary',
					3 => '.layout-3-col-6 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => _themename_width_changer_to_px( $sm_content, '%' ),
				),
		);
		$block[38] = array(
			'before'          => '@media (max-width:1000px) and (min-width:768px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.rtl .layout-3-col-3 .sidebar-column-primary',
					2 => '.rtl .layout-3-col-5 .sidebar-column-primary',
					3 => '.rtl .layout-3-col-6 .sidebar-column-primary',
				),
			'prop'            =>
				array(
					'right' => 'inherit',
					'left'  => _themename_width_changer_to_px( $sm_content, '%' ),
				),

		);


		//
		// Hide Skyscrapper ad
		//
		$block[8] = array(
			'before'          => '@media (max-width: ' . ( $value['width'] + 90 ) . 'px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					0 => '.page-layout-3-col-0 .bs-sks .bs-sksitem',
					1 => '.page-layout-3-col-1 .bs-sks .bs-sksitem',
					2 => '.page-layout-3-col-2 .bs-sks .bs-sksitem',
					3 => '.page-layout-3-col-3 .bs-sks .bs-sksitem',
					4 => '.page-layout-3-col-4 .bs-sks .bs-sksitem',
					5 => '.page-layout-3-col-5 .bs-sks .bs-sksitem',
					6 => '.page-layout-3-col-6 .bs-sks .bs-sksitem',
				),
			'prop'            =>
				array(
					'display' => 'none !important',
				),
		);


		$value = '';
	} // publisher_cb_css_generator_layout_3_col
}


if ( ! function_exists( 'publisher_cb_css_generator_columns_space' ) ) {
	/**
	 * Custom CSS generator space between columns
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_columns_space( &$block = array(), &$value = '' ) {

		$block = array();
		$style = publisher_get_style();

		$space               = intval( $value );
		$columns_padding     = $space / 2;
		$columns_padding_neg = - 1 * $columns_padding;

		$space_1_6 = $space - ( $space / 6 );
		$space_2_6 = $space - ( ( $space / 6 ) * 2 );
		$space_3_6 = $space - ( ( $space / 6 ) * 3 );

		$block[1] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12',
					2 => '.vc_row .vc_column_container>.vc_column-inner',
					3 => '.container,.vc_column_container.vc_column_container',
					4 => '.vc_row.vc_column-gap-35, .vc_row.vc_column-gap-30, .vc_row.vc_column-gap-25, .vc_row.vc_column-gap-20, .vc_row.vc_column-gap-15, .vc_row.vc_column-gap-10, .vc_row.vc_column-gap-5, .vc_row.vc_column-gap-4, .vc_row.vc_column-gap-3, .vc_row.vc_column-gap-2, .vc_row.vc_column-gap-1',
				),
			'prop'            =>
				array(
					'padding-left'  => _themename_width_changer_to_px( $columns_padding ),
					'padding-right' => _themename_width_changer_to_px( $columns_padding ),
				),
		);

		$block[2] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.vc_row.wpb_row',
					2 => '.row',
					3 => '.bs-vc-content .vc_row.vc_row-no-padding[data-vc-stretch-content="true"]',
				),
			'prop'            =>
				array(
					'margin-left'  => _themename_width_changer_to_px( $columns_padding_neg ),
					'margin-right' => _themename_width_changer_to_px( $columns_padding_neg ),
				),
		);

		$block[18] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					4 => '.vc_row.vc_inner',
				),
			'prop'            =>
				array(
					'margin-left'  => _themename_width_changer_to_px( $columns_padding_neg, 'px', '!important' ),
					'margin-right' => _themename_width_changer_to_px( $columns_padding_neg, 'px', '!important' ),
				),
		);

		$block[3] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.widget',
					2  => '.entry-content .better-studio-shortcode',
					3  => '.better-studio-shortcode',
					4  => '.bs-shortcode',
					5  => '.bs-listing',
					6  => '.' . BAM_PREFIX, // Better Ads Manager Dynamic Class!
					7  => '.content-column > div:last-child',
					8  => '.slider-style-18-container',
					9  => '.slider-style-16-container',
					10 => '.slider-style-8-container',
					11 => '.slider-style-2-container',
					12 => '.slider-style-4-container',
					13 => '.bsp-wrapper',
					14 => '.single-container',
					15 => '.content-column > div:last-child',
					16 => '.vc_row .vc_column-inner .wpb_content_element',
					17 => '.wc-account-content-wrap',
					18 => '.order-customer-detail',
					19 => '.order-detail-wrap',
					20 => '.slider-style-23-container',
				),
			'prop'            =>
				array(
					'margin-bottom' => _themename_width_changer_to_px( $space ),
				),
		);

		$block[4] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.archive-title',
				),
			'prop'            =>
				array(
					'margin-bottom' => _themename_width_changer_to_px( $space_2_6 ),
				),
		);


		$_tp = $space_1_6;
		if ( $_tp > 35 ) {
			$_tp = 35;
		} elseif ( $_tp < 18 ) {
			$_tp = 18;
		}

		$block[5] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-1-col',
					2 => '.layout-2-col',
					3 => '.layout-3-col',
				),
			'prop'            =>
				array(
					'margin-top' => _themename_width_changer_to_px( $_tp ),
				),
		);

		$block[14] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.layout-1-col.layout-bc-before',
					2 => '.layout-2-col.layout-bc-before',
					3 => '.layout-3-col.layout-bc-before',
				),
			'prop'            =>
				array(
					'margin-top' => _themename_width_changer_to_px( $space_3_6 ),
				),
		);

		$_tp = $space_1_6;
		if ( $_tp > 35 ) {
			$_tp = 35;
		} elseif ( $_tp < 18 ) {
			$_tp = 18;
		}

		$block[6] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.bs-vc-content>.vc_row.vc_row-fluid.vc_row-has-fill:first-child',
					2 => '.bs-listing.bs-listing-products .bs-slider-controls, .bs-listing.bs-listing-products .bs-pagination',
				),
			'prop'            =>
				array(
					'margin-top' => _themename_width_changer_to_px( - $_tp, 'px', '!important' ),
				),
		);

		$block[7] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					// Column -> Inside
					1  => '.vc_col-has-fill>.bs-vc-wrapper',

					// inner of first sticky column after ( Filled and Full Width ) row!
					2  => '.vc_row-has-fill+.vc_row-full-width+.vc_row>.bs-vc-wrapper>.wrapper-sticky>.bs-vc-column>.bs-vc-wrapper',

					// inner of all columns after ( Filled and Full Width )  row
					3  => '.vc_row-has-fill+.vc_row-full-width+.vc_row>.bs-vc-wrapper>.bs-vc-column>.bs-vc-wrapper',

					// inner of all columns after filled row
					4  => '.vc_row-has-fill+.vc_row>.bs-vc-wrapper>.bs-vc-column>.bs-vc-wrapper',

					// inner of first sticky column after filled row!
					5  => '.vc_row-has-fill+.vc_row>.bs-vc-wrapper>.wrapper-sticky>.bs-vc-column>.bs-vc-wrapper',

					// 6 removed
					//6 => '.vc_row-has-fill+.vc_row>.vc_column_container>.vc_column-inner',

					// inner of all columns after a filled [inner row]
					7  => '.vc_row-has-fill+.vc_row>.wpb_column>.bs-vc-wrapper ',

					// removed
					//8 => '.vc_row-has-fill+.vc_vc_row_inner>.vc_row>.vc_vc_column_inner>.vc_column_container>.vc_column-inner',

					// Top Space for row with BG (fill)
					9  => '.vc_row-has-fill>.bs-vc-wrapper>.vc_column_container>.bs-vc-wrapper',
					// FIX

					// inner of all columns in filled [inner row]
					12 => '.vc_row-has-fill>.wpb_column>.bs-vc-wrapper',

					// removed
					//10 => '.vc_row-has-fill>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner',

					// removed
					//11 => '.vc_row-has-fill>.vc_vc_column_inner>.vc_column_container>.vc_column-inner',
				),
			'prop'            =>
				array(
					'padding-top' => _themename_width_changer_to_px( $space_1_6, 'px', '!important' ),
				),
		);

		$block[8] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.vc_row-has-fill .wpb_wrapper > .bsp-wrapper:last-child',
					2  => '.vc_col-has-fill .wpb_wrapper > .bsp-wrapper:last-child',
					3  => '.vc_row-has-fill .wpb_wrapper > .bs-listing:last-child',
					4  => '.vc_col-has-fill .wpb_wrapper > .bs-listing:last-child',
					5  => '.main-section',
					6  => '#bbpress-forums #bbp-search-form',
					7  => '.vc_row-has-fill .wpb_wrapper > .' . BAM_PREFIX . ':last-child',
					8  => '.vc_col-has-fill .wpb_wrapper > .' . BAM_PREFIX . ':last-child',
					9  => '.vc_row-has-fill .wpb_wrapper > .bs-shortcode:last-child',
					10 => '.vc_col-has-fill .wpb_wrapper > .bs-shortcode:last-child',
					11 => '.vc_row-has-fill .wpb_wrapper > .better-studio-shortcode:last-child',
					12 => '.vc_col-has-fill .wpb_wrapper > .better-studio-shortcode:last-child',
				),
			'prop'            =>
				array(
					'margin-bottom' => _themename_width_changer_to_px( $space_1_6 ),
				),
		);

		// 9 removed

		$_check = array(
			'newswatch'    => $space,
			'clean-tech'   => $space,
			'clean-design' => $space,
		);

		if ( isset( $_check[ $style ] ) ) {
			$block[16] = array(
				'skip_validation' => true,
				'selector'        =>
					array(
						1 => '.bs-listing-modern-grid-listing-3.bs-listing',
					),
				'prop'            =>
					array(
						'margin-bottom' => _themename_width_changer_to_px( $_check[ $style ], 'px', '!important' ),
					),
			);
		} else {
			$block[16] = array(
				'skip_validation' => true,
				'selector'        =>
					array(
						1 => '.bs-listing-modern-grid-listing-3.bs-listing',
					),
				'prop'            =>
					array(
						'margin-bottom' => _themename_width_changer_to_px( $space_3_6, 'px', '!important' ),
					),
			);
		}


		$_check = array(
			'clean-design' => 0,
		);

		if ( isset( $_check[ $style ] ) ) {
			$block[10] = array(
				'skip_validation' => true,
				'selector'        =>
					array(
						1 => '.vc_row-has-fill .wpb_wrapper>.bs-listing-modern-grid-listing-3.bs-listing:last-child',

					),
				'prop'            =>
					array(
						'margin-bottom' => _themename_width_changer_to_px( $_check[ $style ], 'px', '!important' ),
					),
			);
		} else {
			$block[10] = array(
				'skip_validation' => true,
				'selector'        =>
					array(
						1 => '.vc_row-has-fill .wpb_wrapper>.bs-listing-modern-grid-listing-3.bs-listing:last-child',

					),
				'prop'            =>
					array(
						'margin-bottom' => _themename_width_changer_to_px( $space_1_6 > 20 ? $space_1_6 - 20 : $space_1_6, 'px', '!important' ),
					),
			);
		}


		$block[11] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.single-container > .post-author',
					2  => '.post-related',
					3  => '.post-related + .comments-template',
					4  => '.post-related+.single-container',
					5  => '.post-related+.ajax-post-content',
					// 6 removed
					7  => '.comments-template',
					8  => '.comment-respond.comments-template',
					9  => '.' . BAM_PREFIX . '.' . BAM_PREFIX . '-post-before-author',
					10 => '.woocommerce-page div.product .woocommerce-tabs',
					11 => '.woocommerce-page div.product .related.products',
					12 => '.woocommerce .cart-collaterals .cart_totals',
					13 => '.woocommerce .cart-collaterals .cross-sells',
					14 => '.woocommerce-checkout-review-order-wrap',
					15 => '.woocommerce + .woocommerce',
					16 => '.woocommerce + .bs-shortcode',
					17 => '.up-sells.products',
					18 => '.single-container > .bs-newsletter-pack',
					19 => 'body.single .content-column > .bs-newsletter-pack',
				),
			'prop'            =>
				array(
					'margin-top' => _themename_width_changer_to_px( $space ),
				),
		);

		$block[12] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.better-gcs-wrapper',
				),
			'prop'            =>
				array(
					'margin-top' => _themename_width_changer_to_px( - 1 * $space ),
				),
		);

		$block[13] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.slider-style-21-container',
					2  => '.slider-style-20-container',
					3  => '.slider-style-19-container',
					4  => '.slider-style-17-container',
					5  => '.slider-style-15-container',
					6  => '.slider-style-13-container',
					7  => '.slider-style-11-container',
					8  => '.slider-style-9-container',
					9  => '.slider-style-7-container',
					10 => '.slider-style-4-container.slider-container-1col',
					11 => '.slider-style-3-container',
					12 => '.slider-style-5-container',
					13 => '.slider-style-2-container.slider-container-1col',
					14 => '.slider-style-1-container',
					15 => '.slider-container + .bs-sks',
					16 => '.slider-style-22-container',
				),
			'prop'            =>
				array(
					'padding-top'    => _themename_width_changer_to_px( $space_1_6 ),
					'padding-bottom' => _themename_width_changer_to_px( $space ),
					'margin-bottom'  => _themename_width_changer_to_px( - 1 * $space_1_6 ),
				),
		);

		// 14 is reserved

		$block[15] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1  => '.slider-style-21-container.slider-bc-before',
					2  => '.slider-style-20-container.slider-bc-before',
					3  => '.slider-style-19-container.slider-bc-before',
					4  => '.slider-style-17-container.slider-bc-before',
					5  => '.slider-style-15-container.slider-bc-before',
					6  => '.slider-style-13-container.slider-bc-before',
					7  => '.slider-style-11-container.slider-bc-before',
					8  => '.slider-style-9-container.slider-bc-before',
					9  => '.slider-style-7-container.slider-bc-before',
					11 => '.slider-style-3-container.slider-bc-before',
					12 => '.slider-style-5-container.slider-bc-before',
					14 => '.slider-style-1-container.slider-bc-before',
					15 => '.slider-container.slider-bc-before + .bs-sks',
					16 => '.slider-style-22-container.slider-bc-before',
					17 => '.slider-style-23-container.slider-bc-before',
				),
			'prop'            =>
				array(
					'padding-top'    => _themename_width_changer_to_px( $space_3_6 ),
					'padding-bottom' => _themename_width_changer_to_px( $space_3_6 ),
					'margin-bottom'  => _themename_width_changer_to_px( $space_3_6 ),
				),
		);

		// 16 is reserved

		$heading_bottom = $space_2_6;
		if ( $heading_bottom < 23 ) {
			$heading_bottom = 23;
		} elseif ( $heading_bottom > 28 ) {
			$heading_bottom = 28;
		}

		$block[17] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.section-heading',
				),
			'prop'            =>
				array(
					'margin-bottom' => _themename_width_changer_to_px( $heading_bottom ),
				),
		);

		// 18 reserved

		// Space after columns in responsive mode to separate widgets
		$block[19] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.footer-widgets > .content-wrap > .container > .row > *',
				),
			'prop'            =>
				array(
					'margin-bottom' => _themename_width_changer_to_px( $space_1_6 ),
				),
			'before'          => '@media only screen and (max-width : 678px) {',
			'after'           => '}',
		);

		$block[20] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.bs-injection.bs-injection-before_footer', // before footer top
					2 => '.bs-injection.bs-injection-after_footer', // after footer top
				),
			'prop'            =>
				array(
					'margin-top' => _themename_width_changer_to_px( $space_1_6 ),
				),
		);

		$block[21] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.bs-injection.bs-injection-before_header', // before header top
					2 => '.bs-injection.bs-injection-after_header', // after header top
				),
			'prop'            =>
				array(
					'padding-top' => _themename_width_changer_to_px( $space_1_6 ),
				),
		);

		//
		// Push notification top
		//
		{
			$space = $space_2_6;
			if ( $space < 23 || $space > 28 ) {
				$space = 23;
			}

			$block[22] = array(
				'skip_validation' => true,
				'selector'        =>
					array(
						1 => '.single-container > .bs-push-noti.post-bottom',
						2 => '.single-container > .bs-push-noti.post-bottom + .post-author',
					),
				'prop'            =>
					array(
						'margin-top' => _themename_width_changer_to_px( $space ),
					),
			);
			$block[23] = array(
				'skip_validation' => true,
				'selector'        =>
					array(
						1 => '.bs-push-noti.post-top',
					),
				'prop'            =>
					array(
						'margin-bottom' => _themename_width_changer_to_px( $space ) . '!important',
					),
			);

		}


	} // publisher_cb_css_generator_columns_space
}


if ( ! function_exists( 'publisher_cb_css_generator_views_ranking' ) ) {
	/**
	 * Custom CSS generator for views ranking
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_views_ranking( &$block = array(), &$value = '' ) {

		$block = array();

		foreach ( (array) $value as $rank ) {

			if ( intval( $rank['color'] ) < 0 ) {
				continue;
			}

			if ( empty( $rank['rate'] ) ) {
				$selector = array(
					'.post-meta .views.rank-default',
					'.single-post-share .post-share-btn.post-share-btn-views.rank-default',
				);
			} else {
				$selector = array(
					'.post-meta .views.rank-' . $rank['rate'],
					'.single-post-share .post-share-btn.post-share-btn-views.rank-' . $rank['rate'],
				);
			}

			$block[] = array(
				'skip_validation' => true,
				'selector'        => $selector,
				'prop'            =>
					array(
						'color' => $rank['color'] . ' !important',
					),
			);

		}

	} // publisher_cb_css_generator_views_ranking
}


if ( ! function_exists( 'publisher_cb_css_generator_shares_ranking' ) ) {
	/**
	 * Custom CSS generator for shares ranking
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_shares_ranking( &$block = array(), &$value = '' ) {

		$block = array();

		foreach ( (array) $value as $rank ) {

			if ( empty( $rank['color'] ) ) {
				continue;
			}

			if ( empty( $rank['rate'] ) ) {
				$selector = array(
					'.post-meta .share.rank-default',
					'.single-post-share .post-share-btn.rank-default',
				);
			} else {
				$selector = array(
					'.post-meta .share.rank-' . $rank['rate'],
					'.single-post-share .post-share-btn.rank-' . $rank['rate'],
				);
			}

			$block[] = array(
				'skip_validation' => true,
				'selector'        => $selector,
				'prop'            =>
					array(
						'color' => $rank['color'] . ' !important',
					),
			);

		}

	} // publisher_cb_css_generator_shares_ranking
}


if ( ! function_exists( 'publisher_cb_css_term_badge_bg_color' ) ) {
	/**
	 * CSS Generator callback for Term Badge Background Color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_term_badge_bg_color( &$block, $value ) {

		$block[] = array(
			'selector' =>
				array(
					'.term-badges.floated a',
				),
			'prop'     =>
				array(
					'background-color' => '%%value%% !important',
				),
		);
	}
}

if ( ! function_exists( 'publisher_cb_css_term_badge_text_color' ) ) {
	/**
	 * CSS Generator callback for Term Badge Background Color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_term_badge_text_color( &$block, $value ) {

		$block[] = array(
			'selector' =>
				array(
					'.term-badges.floated a',
				),
			'prop'     =>
				array(
					'color' => '%%value%%',
				),
		);
	}
}


if ( ! function_exists( 'publisher_cb_css_generator_section_heading' ) ) {
	/**
	 * Creates section heading generator color
	 *
	 * @param array  $block
	 * @param string $value
	 * @param array  $args
	 */
	function publisher_cb_css_generator_section_heading( &$block = array(), &$value = '', $args = array() ) {

		// Tabbed or not!
		if ( ! isset( $args['tabbed'] ) ) {
			$args['tabbed'] = true;
		}

		// CSS for which sections?
		if ( ! isset( $args['section'] ) ) {
			$args['section'] = 'all';
		}

		// For Term selectors
		$term_class     = '';
		$term_class_imp = '';
		$tab_term_class = '';

		// For Blocks & Widgets selector
		$block_class     = '';
		$block_class_imp = '';

		//
		// Config variables
		//
		if ( $args['type'] == 'term_color' ) {
			$term_class     = '.main-term-' . $block['_TERM_ID'];
			$tab_term_class = '.mtab-main-term-' . $block['_TERM_ID'];
			$term_class_imp = str_repeat( $term_class, 2 );
		} elseif ( $args['type'] === 'block' && ! empty( $block['_BLOCK_ID'] ) ) {
			$block_class     = ".{$block['_BLOCK_ID']}";
			$block_class_imp = str_repeat( $block_class, 2 );
		} elseif ( $args['type'] === 'widget_color' && ! empty( $block['_WIDGET_ID'] ) ) {
			$block_class     = $block['_WIDGET_ID'];
			$block_class_imp = str_repeat( $block_class, 2 );

			// BF sends heading style to use it for generating smaller css code
			if ( ! empty( $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-style'] ) ) {
				$args['style'] = $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-style'];
			}
		}

		// Empty style
		// not set by block or widget
		if ( empty( $args['style'] ) ) {
			$args['style'] = '';

			//
			// Custom styles for widgets of sidebars
			//
			if ( $args['type'] === 'widget_color' ) {

				$_check = array(
					''        => '',
					'default' => '',
				);

				if ( isset( $block['_SIDEBAR_ID_'] ) ) {

					$_check2 = array(
						'footer-1' => '',
						'footer-2' => '',
						'footer-3' => '',
						'footer-4' => '',
					);

					if ( isset( $_check2[ $block['_SIDEBAR_ID_'] ] ) ) {
						$args['style'] = publisher_get_option( 'footer_widgets_heading_style' );
					}

					if ( isset( $_check[ $args['style'] ] ) ) {
						$args['style'] = publisher_get_option( 'widgets_heading_style' );
					}
				}
			}

			$_check = array(
				''        => '',
				'default' => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {
				$args['style'] = publisher_get_option( 'section_heading_style' );
			}
		}


		/**
		 * Color
		 */
		$block['sh_color'] = array(
			'selector' => array(),
			'prop'     => array(
				'color' => '%%value%%'
			),
		);


		/**
		 * Important Color
		 */
		$block['sh_color_imp'] = array(
			'selector' => array(),
			'prop'     => array(
				'color' => '%%value%% !important'
			),
		);


		/**
		 * Background Color
		 */
		$block['sh_bg'] = array(
			'selector' => array(),
			'prop'     => array(
				'background-color' => '%%value%%'
			),
		);


		/**
		 * Background Color Important
		 */
		$block['sh_bg_imp'] = array(
			'selector' => array(),
			'prop'     => array(
				'background-color' => '%%value%% !important'
			),
		);


		/***
		 * SPECIAL CONDITIONS
		 */
		{
			//
			// Changes all section to BG if the source is custom color for widget
			// to prevent the text color issue.
			//
			if ( $args['style'] === 't3-s4' && $args['type'] === 'widget_color' && $args['section'] === 'all' ) {
				$args['section'] = 'bg';
			}
		}


		/***
		 * Do Color
		 */
		{
			$_do_color = $args['section'] === 'all' || $args['section'] === 'color';

			// don't create extra and unneeded code!
			if ( $_do_color && $args['type'] === 'theme_color' && $args['section'] === 'all' && publisher_get_option( 'section_title_color' ) !== '' ) {
				$_do_color = false;
			}
		}


		/***
		 * Do BG Color
		 */
		{
			$_do_bg = $args['section'] === 'all' || $args['section'] === 'bg';

			// don't create extra and unneeded code!
			if ( $_do_bg && $args['type'] === 'theme_color' && $args['section'] === 'all' && publisher_get_option( 'section_title_bg_color' ) !== '' ) {
				$_do_bg = false;
			}
		}


		/***
		 * Do Widget BG Fix
		 */
		{
			$_do_widget_bg_fix = ( $args['type'] === 'block' || $args['type'] === 'widget_color' ) && $args['section'] === 'bg_fix';
		}


		/***
		 * Do Block Color Fix
		 */
		{
			$_do_block_color_fix = true;

			// Stop block color fix from outside;
			if ( isset( $args['fix-block-color'] ) && ! $args['fix-block-color'] ) {
				$_do_block_color_fix = false;
			}

			if ( $_do_block_color_fix ) {
				$_do_block_color_fix = ( $args['type'] === 'block' || $args['type'] === 'widget_color' ) && $args['section'] != 'bg_fix' && ( $_do_color || $_do_bg );
			}
		}


		/***
		 *
		 * Type 1
		 *
		 */
		{
			$_check = array(
				't1-s1' => '',
				't1-s2' => '',
				't1-s3' => '',
				't1-s4' => '',
				't1-s5' => '',
				't1-s6' => '',
				't1-s7' => '',
				't1-s8' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class_imp .section-heading.sh-t1 a:hover .h-text$term_class_imp";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1 a.active .h-text$term_class";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1 > .h-text";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1 .main-link:first-child:last-child .h-text$term_class";

				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					if ( $args['section'] === 'all' || $args['style'] === 't1-s2' || $args['style'] === 't1-s8' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp$block_class $term_class.section-heading.sh-t1:after";
						$block[]                      = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t1.sh-s8 .main-link .h-text$term_class:before",
								"$block_class_imp $term_class.section-heading.sh-t1.sh-s8 .main-link.h-text:before",
								"$block_class_imp .section-heading.sh-t1.sh-s8 > .h-text:before"
							),
							'prop'     => array(
								'border-right-color' => '%%value%% !important'
							),
						);
					}

					if ( $args['section'] === 'all' || $args['style'] === 't1-s5' ) {
						$block['sh_color_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1.sh-s5 > .main-link > $term_class.h-text:after";
						$block['sh_color_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1.sh-s5 > a:first-child:last-child > $term_class.h-text:after";
						$block['sh_color_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1.sh-s5 > $term_class.h-text:first-child:last-child:after";
					}
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {

					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t1 .h-text";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t1 .bs-pretty-tabs-container";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t1 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
					$block[]                      = array(
						'selector' => array(
							"$block_class_imp .section-heading.sh-t1.sh-s8 > .h-text:before"
						),
						'prop'     => array(
							'border-right-color' => '%%value%% !important'
						),
					);

				}
			}
		}


		/***
		 *
		 * Type 2
		 *
		 */
		{
			$_check = array(
				't2-s1' => '',
				't2-s2' => '',
				't2-s3' => '',
				't2-s4' => '',
				't2-s5' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][]     = "$block_class $term_class.section-heading.sh-t2 a.active";
					$block['sh_color']['selector'][]     = "$block_class_imp $term_class.section-heading.sh-t2 .main-link:first-child:last-child $term_class.h-text";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t2 > .h-text";
				}


				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color_imp']['selector'][] = "$block_class .section-heading.sh-t2 a:hover .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t2 a.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t2:after";
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {

					if ( $args['style'] == 't2-s1' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t2 .bs-pretty-tabs-container";
					}

					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t2 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
				}

			}

		}



		/***
		 *
		 * Type 3
		 *
		 * Highlight Color only for blocks and terms!
		 *
		 */
		{
			$_check = array(
				't3-s1' => '',
				't3-s2' => '',
				't3-s3' => '',
				't3-s4' => '',
				't3-s5' => '',
				't3-s6' => '',
				't3-s7' => '',
				't3-s8' => '',
				't3-s9' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {


				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t3 a.active";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t3 .main-link:first-child:last-child $term_class.h-text";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t3 > .h-text";

					if ( $args['style'] === 'all' || $args['style'] === 't3-s8' ) {
						$block['sh_color']['selector'][] = "$block_class_imp $tab_term_class.section-heading.sh-t3.sh-s8 > .h-text";
						$block['sh_color']['selector'][] = "$block_class_imp $tab_term_class.section-heading.sh-t3.sh-s8 > a.main-link > .h-text";
					}
				}


				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color_imp']['selector'][] = "$block_class .section-heading.sh-t3 a:hover .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t3 a.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg_imp']['selector']['tp_3_0'] = "$block_class_imp $term_class.section-heading.sh-t3:after";

					if ( $args['style'] === 'all' || $args['style'] === 't3-s7' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t3:before"
							),
							'prop'     => array(
								'border-top-color' => '%%value%% !important'
							),
						);
					}

					if ( ( $args['style'] === 'all' && $args['type'] === 'widget_color' ) || $args['style'] == 't3-s7' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s7:after";
					}


					if ( $args['style'] === 'all' || $args['style'] === 't3-s8' ) {

						$block[] = array(
							'selector' => array(
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t3.sh-s8 >.main-link > .h-text",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text",
								// Its not duplicate! It's for adding more priority to tab main term!
								"$block_class_imp $term_class.section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child",
							),
							'prop'     => array(
								'border-color'
							),
						);
					}


					if ( $args['style'] === 'all' || $args['style'] === 't3-s9' ) {
						//						$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t3.sh-s9:before";
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t3.sh-s9:before"
							),
							'prop'     => array(
								'background-color' => publisher_get_option( 'section_title_bg_color' ) . '!important'
							),
						);
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t3.sh-s9:after"
							),
							'prop'     => array(
								'background-color' => publisher_get_option( 'section_title_color' ) . '!important'
							),
						);
					}

					$block['sh_bg_imp']['selector'][] = ".bsb-have-heading-color$block_class_imp $term_class.section-heading.sh-t3.sh-s9:after";
					$block['sh_bg_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t3.sh-s9:after";
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {

					$block['sh_bg']['selector']['tp_3_1'] = "$block_class_imp .section-heading.sh-t3 .bs-pretty-tabs-container .bs-pretty-tabs-elements";

					if ( ( $args['style'] === 'all' && $args['type'] === 'widget_color' ) || $args['style'] == 't3-s1' ) {
						$block['sh_bg']['selector']['tp_3_2'] = "$block_class_imp .section-heading.sh-t3 .bs-pretty-tabs-container";
					}

					if ( ( $args['style'] === 'all' && $args['type'] === 'widget_color' ) || $args['style'] == 't3-s8' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 >.main-link > .h-text:after";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 >.main-link > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > a > .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8.multi-tab .bs-pretty-tabs-container";
					}
				}

			}

		}


		/***
		 *
		 * Type 4
		 *
		 * Highlight Color on hover and main colored
		 *
		 */
		{
			$_check = array(
				't4-s1' => '',
				't4-s2' => '',
				't4-s3' => '',
				't4-s4' => '',
				't4-s5' => '',
				't4-s6' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					if ( $args['tabbed'] ) {
						$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t4 .bs-pretty-tabs-container:hover .bs-pretty-tabs-more.other-link:hover $term_class.h-text";
						$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t4 .bs-pretty-tabs-more.other-link:hover $term_class.h-text";
						$block['sh_color']['selector'][] = "$block_class_imp .section-heading.sh-t4.sh-s5 .h-text$term_class";
					}
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s4 .h-text$term_class";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s4 .h-text$term_class:before";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s5 .h-text$term_class";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s6 a.active .h-text$term_class";
					$block['sh_bg']['selector'][]        = "$block_class_imp .section-heading.sh-t4 a.active .h-text$term_class";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s6 .main-link .h-text$term_class";
					$block['sh_bg']['selector'][]        = "$block_class_imp .section-heading.sh-t4$term_class .main-link:first-child:last-child .h-text$term_class";
					$block['sh_bg']['selector'][]        = "$block_class_imp .section-heading.sh-t4$term_class_imp > .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class_imp .section-heading.sh-t4 a:hover .h-text$term_class";

					$block[] = array(
						'selector' => array(
							"$block_class_imp $term_class.section-heading.sh-t4.sh-s6 .h-text:before"
						),
						'prop'     => array(
							'border-bottom-color' => '%%value%% !important'
						),
					);
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {
					$block['sh_bg_imp']['selector'][] = "$block_class .section-heading.sh-t4.sh-s4 .other-link .h-text";
					$block['sh_bg_imp']['selector'][] = "$block_class .section-heading.sh-t4.sh-s4 .other-link .h-text:before";
					$block['sh_bg_imp']['selector'][] = "$block_class .section-heading.sh-t4.sh-s5 .other-link .h-text";
					$block['sh_bg']['selector'][]     = "$block_class .section-heading.sh-t4 > a > .h-text";
					$block['sh_bg']['selector'][]     = "$block_class_imp .section-heading.sh-t4 .h-text:after";
					$block['sh_bg']['selector'][]     = "$block_class_imp .section-heading.sh-t4 .bs-pretty-tabs-container";
					$block['sh_bg']['selector'][]     = "$block_class_imp .section-heading.sh-t4 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
					$block['sh_bg_imp']['selector'][] = "$block_class_imp .section-heading.multi-tab.sh-t4 .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link:hover .h-text";
					$block['sh_bg_imp']['selector'][] = "$block_class_imp .section-heading.multi-tab.sh-t4.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text";
					$block[]                          = array(
						'selector' => array(
							"$block_class_imp $term_class.section-heading.sh-t4.sh-s5 .h-text:before",
						),
						'prop'     => array(
							'border-top-color' => '%%value%% !important'
						),
					);


				}
			}
		}



		/***
		 *
		 * Type 5
		 *
		 */
		{
			$_check = array(
				't5-s1' => '',
				't5-s2' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t5 > .main-link > .h-text$term_class";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t5 a.active";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t5 .main-link:first-child:last-child $term_class.h-text";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t5 > .h-text";
				}


				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color_imp']['selector'][] = "$block_class .section-heading.sh-t5 a:hover .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t5 a.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 > .main-link > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 > a:first-child:last-child > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 > $term_class.h-text:first-child:last-child:before";
				}
			}


			/**
			 * BG Fix for blocks with custom background color
			 */
			if ( $_do_widget_bg_fix ) {
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
			}
		}


		/***
		 *
		 * Type 6
		 *
		 */
		{
			$_check = array(
				't6-s1'  => '',
				't6-s2'  => '',
				't6-s3'  => '',
				't6-s4'  => '',
				't6-s5'  => '',
				't6-s6'  => '',
				't6-s7'  => '',
				't6-s8'  => '',
				't6-s9'  => '',
				't6-s10' => '',
				't6-s11' => '',
				't6-s12' => '',
				't6-s13' => '',
				'all'    => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t6 .other-link:hover .h-text$term_class";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t6 .other-link.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg']['selector'][] = "$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6:before";
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6:before";
					$block['sh_bg']['selector'][] = "$block_class $term_class.section-heading.sh-t6 > .h-text";
					$block['sh_bg']['selector'][] = "$block_class $term_class.section-heading.sh-t6 > .h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6 > .main-link > $term_class.h-text";
					$block['sh_bg']['selector'][] = "$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6 > .main-link > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6 > a:first-child:last-child > $term_class.h-text";
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6 > a:first-child:last-child > $term_class.h-text:before";


					if ( $args['style'] === 'all' || $args['style'] === 't6-s3' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6.sh-s3 > a:first-child:last-child > $term_class.h-text";
						$block[]                      = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s3 > .main-link > $term_class.h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s3 > a:last-child:first-child > $term_class.h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s3 > $term_class.h-text:last-child:first-child:before",
							),
							'prop'     => array(
								'border-bottom-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s9' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s9 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s9 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s9 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s9 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s9 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-top-color' => '%%value%%',
								'background-color' => 'transparent'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s10' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s10 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s10 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s10 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s10 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s10 > .main-link > .h-text:before",

							),
							'prop'     => array(
								'border-top-color' => '%%value%%',
								'background-color' => 'transparent'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s11' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s11 svg path",

							),
							'prop'     => array(
								'fill' => '%%value%%'
							),
						);

						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s11 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s11 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s11 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s11 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s11 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'background-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s12' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s12 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s12 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s12 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s12 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class.section-heading.sh-t6.sh-s12 > .main-link > .h-text:before",

							),
							'prop'     => array(
								'border-top-color' => '%%value%%'
							),
						);
					}
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6 .bs-pretty-tabs-container .bs-pretty-tabs-elements";

					if ( $args['style'] == 'all' || $args['style'] == 't6-s2' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s2.bs-pretty-tabs .bs-pretty-tabs-more.other-link .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s2 .other-link .h-text";
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s3' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s3 > .main-link > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s3 > a:last-child:first-child > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s3 > .h-text:last-child:first-child:before";
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s4' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-' . ( is_rtl() ? 'right' : 'left' ) . '-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s5' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s5 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s5 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s5 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-top-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s6' ) {

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-top-color' => '%%value%%'
							),
						);

						$block[] = array(
							'selector' => array(
								".bs-light-scheme$block_class_imp .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child",
								".bs-light-scheme$block_class_imp .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text",
								".bs-light-scheme$block_class_imp .section-heading.sh-t6.sh-s6 > .main-link > .h-text",
							),
							'prop'     => array(
								'color' => '%%value%% !important'
							),
						);

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .main-link > .h-text:after",
							),
							'prop'     => array(
								'background-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s7' ) {

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-bottom-color' => '%%value%%'
							),
						);

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .main-link > .h-text:after",
							),
							'prop'     => array(
								'background-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s8' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after",
							),
							'prop'     => array(
								'border-right-color' => '%%value%%'
							),
						);
					}
				}

			}

		}



		/***
		 *
		 * Type 7
		 *
		 */
		{
			$_check = array(
				't7-s1' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * BG Color
				 */
				if ( $_do_bg && ! isset( $args['fix-block-scheme'] ) ) {
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > .main-link > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > a:first-child:last-child > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > $term_class.h-text:first-child:last-child:before";
				}


				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t7 > .h-text";
				}


			}
			if ( $args['style'] === 'all' || $args['style'] === 't7-s1' ) {
				$block[] = array(
					'selector' => array(
						"$block_class_imp $term_class.section-heading.sh-t7.sh-s1 > .h-text",
						".section-heading.sh-t7.sh-s1 > .h-text"
					),
					'prop'     => array(
						'color' => publisher_get_option( 'section_title_color' )
					),
				);
			}


			/**
			 * BG Fix for blocks with custom background color
			 */
			if ( $_do_widget_bg_fix ) {
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > a > .h-text";
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > .h-text";
			}
		}



		/***
		 *
		 * Clear Empty Blocks
		 *
		 */
		{
			if ( empty( $block['sh_bg']['selector'] ) ) {
				unset( $block['sh_bg'] );
			}

			if ( empty( $block['sh_bg_imp']['selector'] ) ) {
				unset( $block['sh_bg_imp'] );
			}

			if ( empty( $block['sh_color']['selector'] ) ) {
				unset( $block['sh_color'] );
			}

			if ( empty( $block['sh_color_imp']['selector'] ) ) {
				unset( $block['sh_color_imp'] );
			}
		}

		/**
		 *
		 * Customize Block
		 *
		 */
		if ( $_do_block_color_fix ) {


			$block['_block_customize_color'] = array(
				'selector' => array(
					"$block_class_imp .listing-item:hover .title a",
					"$block_class_imp .listing-item-text-1 .post-meta a:hover",
					"$block_class_imp .listing-item-grid .post-meta a:hover",
					"$block_class_imp .listing-item .rating-stars span:before",
				),
				'prop'     => array(
					'color' => '%%value%% !important'
				),
			);

			$block['_block_customize_bg']                = array(
				'selector' => array(
					"$block_class_imp .listing-item .rating-bar span",
					"$block_class_imp .listing-item .post-count-badge.pcb-t1.pcb-s1",
					"$block_class_imp.better-newsticker .heading",
				),
				'prop'     => array(
					'background-color' => '%%value%% !important',
				),
			);
			$block['_block_customize_border_left_color'] = array(
				'selector' => array(
					"$block_class_imp.better-newsticker .heading:after",
				),
				'prop'     => array(
					'border-left-color' => '%%value%% !important',
				),
			);
			$block['_block_customize_pagin_bg']          = array(
				'selector' => array(
					"$block_class .bs-pagination .btn-bs-pagination:hover",
					"$block_class .btn-bs-pagination.bs-pagination-in-loading",
				),
				'prop'     => array(
					'background-color' => '%%value%% !important',
					'border-color'     => '%%value%% !important',
					'color'            => '#fff !important',
				),
			);

			$block['_block_customize_border'] = array(
				'selector' => array(
					"$block_class .listing-item-text-2:hover .item-inner",
				),
				'prop'     => array(
					'border-color' => '%%value%% !important',
				),
			);

			$block['_block_customize_badge_bg'] = array(
				'selector' => array(
					"$block_class_imp$block_class_imp .term-badges.floated .term-badge a",
					"$block_class_imp .bs-pagination-wrapper .bs-loading > div",
				),
				'prop'     => array(
					'background-color' => '%%value%% !important',
					'color'            => '#fff !important',
				),
			);

		}

	} //publisher_cb_css_generator_section_heading
}


if ( ! function_exists( 'publisher_cb_css_generator_section_heading_widget' ) ) {
	/**
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_generator_section_heading_widget( &$block, &$value ) {

		$new_block = array(
			'fix-block-color' => false,
		);

		// type from panel callback or widget callback
		$type = isset( $block['callback']['args']['type'] ) ? $block['callback']['args']['type'] : ( isset( $block['args']['type'] ) ? $block['args']['type'] : false );

		// no callback mean not valid call!
		if ( ! $type ) {
			return;
		}

		if ( $type == 'general-widget' ) {

			// not a difference style
			if ( $value == publisher_get_option( 'section_heading_style' ) ) {
				$block = $new_block;

				return;
			}

			$section_title_bg_color = publisher_get_option( 'section_title_bg_color' );
			$section_title_color    = publisher_get_option( 'section_title_color' );
		} else {

			if ( ! empty( $block['_NEEDED_WIDGET_VALUE']['bf-widget-title-bg-color'] ) ) {
				$section_title_bg_color = $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-bg-color'];
			} else {
				$section_title_bg_color = publisher_get_option( 'section_title_bg_color' );
			}

			if ( ! empty( $block['_NEEDED_WIDGET_VALUE']['bf-widget-title-color'] ) ) {
				$section_title_color = $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-color'];
			} else {
				$section_title_color = publisher_get_option( 'section_title_color' );
			}
		}

		$theme_color = publisher_get_option( 'theme_color' );
		$args        = array(
			'type'            => 'widget_color',
			'section'         => 'all',
			'fix-block-color' => false, // do not generate general styles
			'style'           => $value
		);

		if ( ! $section_title_bg_color && ! $section_title_color ) {

			$value = $theme_color;
			publisher_cb_css_generator_section_heading( $new_block, $value, $args );
			$block = $new_block;
		} else {

			// same color
			if ( $section_title_bg_color && $section_title_bg_color == $section_title_color ) {
				$value = $section_title_bg_color;
				publisher_cb_css_generator_section_heading( $new_block, $value, $args );
				$block = $new_block;
			} else {

				$color_block = $new_block;
				$bg_block    = $new_block;

				if ( $section_title_color ) {

					$args['section'] = 'color';
					$value           = $section_title_color ? $section_title_color : $theme_color;
					publisher_cb_css_generator_section_heading( $color_block, $value, $args );

					foreach ( $color_block as $k => $v ) {
						if ( is_array( $color_block[ $k ] ) ) {
							$color_block[ $k ]['value'] = $value;
						}
					}
				}

				if ( $section_title_bg_color ) {

					$args['section'] = 'bg';
					$value           = $section_title_bg_color ? $section_title_bg_color : $theme_color;
					publisher_cb_css_generator_section_heading( $bg_block, $value, $args );

					foreach ( $bg_block as $k => $v ) {
						$bg_block[ $k ]['value']           = $value;
						$bg_block[ $k ]['fix-block-color'] = false;
					}
				}

				$block = array_merge( array_values( $bg_block ), array_values( $color_block ) );
			}
		}
	} // publisher_cb_css_generator_section_heading_widget
}


if ( ! function_exists( 'publisher_cb_css_resp_bg_image' ) ) {
	/**
	 * CSS Generator callback for Responsive Header BG Image
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_resp_bg_image( &$block, $value ) {

		// Only when user selected bg image style!
		if ( publisher_get_option( 'resp_bg_style' ) !== 'image' ) {
			return;
		}

		$block[] = array(
			'selector' =>
				array(
					'.rh-cover',
				),
			'prop'     =>
				array(
					'background-image',
				),
			'type'     => 'background-image',
		);
	}
}

if ( ! function_exists( 'publisher_cb_css_footer_line_top_color' ) ) {
	/**
	 * CSS Generator callback for Footer Menu background color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_line_top_color( &$block, $value ) {

		if ( $value === BF_Front_End_CSS::$empty_value_marker || empty( $value ) ) {

			$block[] = array(
				'selector' =>
					array(
						'.site-footer:before',
					),
				'prop'     =>
					array(
						'display' => 'none',
					),
			);
		} else {

			$block[] = array(
				'selector' =>
					array(
						'.site-footer:before',
					),
				'prop'     =>
					array(
						'background' => '%%value%%',
					),
			);
			$block[] = array(
				'selector' =>
					array(
						'.site-footer.boxed',
					),
				'prop'     =>
					array(
						'position' => 'relative',
					),
			);
		}
	}
}

if ( ! function_exists( 'publisher_cb_css_footer_menu_bg' ) ) {
	/**
	 * CSS Generator callback for Footer Menu background color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_menu_bg( &$block, $value ) {

		if ( $value === BF_Front_End_CSS::$empty_value_marker || empty( $value ) ) {

			$block[] = array(
				'selector' =>
					array(
						'.copy-footer .content-wrap',
					),
				'prop'     =>
					array(
						'overflow-x' => 'auto',
					),
			);

			$block[] = array(
				'selector' =>
					array(
						'.site-footer .copy-footer .footer-menu-wrapper .footer-menu-container:before',
					),
				'prop'     =>
					array(
						'display' => 'none',
					),
			);
		} else {
			$block[] = array(
				'selector' =>
					array(
						'.site-footer .copy-footer .footer-menu-wrapper .footer-menu-container:before',
					),
				'prop'     =>
					array(
						'background-color' => '%%value%%',
					),
			);
			$block[] = array(
				'selector' =>
					array(
						'.footer-menu-container',
					),
				'prop'     =>
					array(
						'border-bottom' => 'none',
					),
			);
			$block[] = array(
				'selector' =>
					array(
						'.copy-footer',
					),
				'prop'     =>
					array(
						'overflow-x' => 'hidden',
					),
			);
		}
	}
}


if ( ! function_exists( 'publisher_cb_css_footer_bg' ) ) {
	/**
	 * Generates background for widgets heading
	 * if the CSS Generator callback for Footer widgets background color did not fired
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_bg( &$block, $value ) {

		if ( publisher_get_option( 'footer_widgets_bg_color' ) ) {
			return;
		}

		// Call the main function for CSS colors
		publisher_cb_css_footer_widgets_bg( $block, $value );
	}
}


if ( ! function_exists( 'publisher_cb_css_footer_widgets_bg' ) ) {
	/**
	 * CSS Generator callback for Footer widgets background color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_widgets_bg( &$block, $value ) {

		$block[] = array(
			'selector' =>
				array(
					'.site-footer .footer-widgets .section-heading.sh-t1 .h-text',
					'.footer-widgets .section-heading.sh-t4.sh-s3 .h-text:after',
					'.footer-widgets .section-heading.sh-t4.sh-s1 .h-text:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .main-link > .h-text:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before',
					'.footer-widgets .section-heading.sh-t3.sh-s8 >.main-link > .h-text:before',
					'.footer-widgets .section-heading.sh-t3.sh-s8.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > a > .h-text',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .h-text',
					'.footer-widgets .section-heading.sh-t6.sh-s7 > .main-link > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:after',
					'.footer-widgets .section-heading.sh-t6.sh-s6 > .main-link > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:after',
					'.footer-widgets .section-heading.sh-t7.sh-s1 > .main-link > .h-text',
					'.footer-widgets .section-heading.sh-t7.sh-s1 > a:last-child:first-child > .h-text',
					'.footer-widgets .section-heading.sh-t7.sh-s1 .h-text'
				),
			'prop'     =>
				array(
					'background-color' => '%%value%%',
				),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-' . ( is_rtl() ? 'right' : 'left' ) . '-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-' . ( is_rtl() ? 'right' : 'left' ) . '-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before',
				'.footer-widgets .section-heading.sh-t6.sh-s6 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:before',
				'.footer-widgets .section-heading.sh-t6.sh-s5 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s5 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s5 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-top-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-bottom-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.ltr .footer-widgets .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after',
				'.ltr .footer-widgets .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after',
				'.ltr .footer-widgets .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after'
			),
			'prop'     => array(
				'border-right-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.rtl .footer-widgets .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after',
				'.rtl .footer-widgets .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after',
				'.rtl .footer-widgets .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after'
			),
			'prop'     => array(
				'border-left-color' => '%%value%%'
			),
		);

	} // publisher_cb_css_footer_widgets_bg
}
