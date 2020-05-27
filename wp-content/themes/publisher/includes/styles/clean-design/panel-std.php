<?php


$std_id = $this->get_std_id();

$fields['layout_columns_space'][ $std_id ]  = '26';
$fields['section_heading_style'][ $std_id ] = 't4-s1';

/**
 * =>Color & Style
 */
$fields['theme_color'][ $std_id ]   = '#0762a2';
$fields['site_bg_color'][ $std_id ] = '#f7f7f7';


/**
 * -> Topbar Colors
 */
$fields['topbar_text_color'][ $std_id ]      = '#525252';
$fields['topbar_bg_color'][ $std_id ]        = '#ffffff';
$fields['topbar_border_color'][ $std_id ]    = '#e6e6e6';
$fields['topbar_icon_text_color'][ $std_id ] = '#525252';
$fields['topbar_icon_bg'][ $std_id ]         = '#f0f0f0';
$fields['topbar_icon_bg_hover'][ $std_id ]   = '#dbdbdb';


/**
 * -> Header Colors
 */
$fields['header_top_border_color'][ $std_id ]       = '';
$fields['header_menu_st2_bbottom_color'][ $std_id ] = '#d6d6d6';
$fields['header_menu_st5_bbottom_color'][ $std_id ] = '#e0e0e0';
$fields['header_menu_st6_bbottom_color'][ $std_id ] = '#e0e0e0';
$fields['header_menu_st8_bbottom_color'][ $std_id ] = '#e0e0e0';
$fields['header_menu_bg_color'][ $std_id ]          = '#ffffff';
$fields['resp_scheme'][ $std_id ]                   = 'light';
$fields['header_bg_color'][ $std_id ]               = '#ffffff';
$fields['header_top_border'][ $std_id ]             = 0;


/**
 * -> Footer Colors
 */
$fields['footer_link_color'][ $std_id ]       = '#616161';
$fields['footer_link_hover_color'][ $std_id ] = '#303030';
$fields['footer_copy_bg_color'][ $std_id ]    = '#ffffff';
$fields['footer_social_bg_color'][ $std_id ]  = '';
$fields['footer_bg_color'][ $std_id ]         = '#ffffff';


/**
 * -> Section Headings
 */
$fields['section_title_bg_color'][ $std_id ] = '';


/**
 * => Template Options
 */
$fields['general_listing'][ $std_id ] = 'grid-1';


/**
 * -> Posts
 **/
$fields['post_template'][ $std_id ] = 'style-10';


/**
 * => Header Options
 */
$fields['header_layout'][ $std_id ] = 'full-width';
$fields['header_style'][ $std_id ]  = 'style-8';


/**
 * -> Topbar
 */
$fields['topbar_style'][ $std_id ]             = 'style-1';
$fields['topbar_show_date'][ $std_id ]         = 'hide';
$fields['topbar_show_social_icons'][ $std_id ] = 'show';


/**
 * => Footer Options
 */
$fields['footer_social'][ $std_id ]      = 'hide';
$fields['footer_social_feed'][ $std_id ] = 'style-3';


/**
 * -> Section Heading
 */
$fields['section_title_color'][ $std_id ]    = '#ffffff';
$fields['section_title_bg_color'][ $std_id ] = '';


/**
 * -> Typography
 */
$fields['typo_body'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);

$fields['typo_heading'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);

$fields['typo_meta'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#adb5bd',
);

$fields['typo_meta_author'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => ''
);

$fields['typo_badges'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);

$fields['typo_post_heading'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '',
);

$fields['typo_post_tp1_heading'][ $std_id ] = '20px';

$fields['typo_post_tp2_heading'][ $std_id ] = '20px';

$fields['typo_post_tp3_heading'][ $std_id ] = '22px';

$fields['typo_post_tp4_heading'][ $std_id ] = '22px';

$fields['typo_post_tp5_heading'][ $std_id ] = '22px';

$fields['typo_post_tp6_heading'][ $std_id ] = '20px';

$fields['typo_post_tp7_heading'][ $std_id ] = '20px';

$fields['typo_post_tp8_heading'][ $std_id ] = '20px';

$fields['typo_post_tp9_heading'][ $std_id ] = '20px';

$fields['typo_post_tp10_heading'][ $std_id ] = '20px';

$fields['typo_post_tp11_heading'][ $std_id ] = '20px';

$fields['typo_post_tp12_heading'][ $std_id ] = '20px';

$fields['typo_post_tp13_heading'][ $std_id ] = '20px';

$fields['typo_post_tp14_heading'][ $std_id ] = '20px';

$fields['typo_post_subtitle'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '15',
	'letter-spacing' => '',
);

$fields['typo_entry_content'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'letter-spacing' => '',
	'color'          => '#222222',
);

$fields['typo_post_summary'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '13',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#888888',
);

$fields['typo_post_summary_single'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '22',
	'letter-spacing' => '',
);

$fields['typ_header_menu'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '15',
	'letter-spacing' => '',
);

$fields['typ_header_sub_menu'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);

$fields['typo_topbar_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);

$fields['typo_topbar_sub_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
);

$fields['typo_topbar_date'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);

$fields['typo_archive_title_pre'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);

$fields['typo_archive_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '26',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_classic_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_classic_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_classic_3_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_mg_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_3_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'letter-spacing' => '',
);

$fields['typo_mg_4_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'letter-spacing' => '',
);

$fields['typo_mg_5_title_big'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'none',
	'size'           => '18',
	'letter-spacing' => '',
);

$fields['typo_mg_5_title_small'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'none',
	'size'           => '14',
	'letter-spacing' => '',
);

$fields['typo_mg_6_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_7_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_8_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_9_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_10_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_listing_grid_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '15',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_grid_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_tall_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_tall_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_slider_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '22',
	'line_height'    => '28',
	'letter-spacing' => '',
);

$fields['typo_listing_slider_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_slider_3_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_box_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'line_height'    => '28',
	'letter-spacing' => '',
);

$fields['typo_listing_box_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
);

$fields['typo_listing_box_3_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '28',
	'letter-spacing' => '',
);

$fields['typo_listing_box_4_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '28',
	'letter-spacing' => '',
);

$fields['typo_listing_blog_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '17',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_blog_5_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '12',
	'line_height'    => '17',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'line_height'    => '17',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_text_listing_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_text_listing_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_text_listing_3_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'line_height'    => '17',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_section_heading'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '21',
	'letter-spacing' => '',
);

$fields['typo_footer_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_footer_copy'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '11',
	'line_height'    => '18',
	'letter-spacing' => '',
);

unset( $std_id );