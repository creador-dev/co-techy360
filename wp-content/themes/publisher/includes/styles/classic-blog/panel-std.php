<?php

$std_id = $this->get_std_id();

/**
 * => Template Options
 */
$fields['layout-2-col'][ $std_id ]          = array(
	'width'   => 1040,
	'content' => 67,
	'primary' => 33,
);
$fields['section_heading_style'][ $std_id ] = 't3-s7';
$fields['layout_style'][ $std_id ]          = 'full-width';
$fields['general_listing'][ $std_id ]       = 'grid-1';
$fields['layout_columns_space'][ $std_id ]  = '40';


/**
 * -> Homepage
 **/
$fields['home_layout'][ $std_id ]  = 'default';
$fields['home_listing'][ $std_id ] = 'default';
$fields['breadcrumb'][ $std_id ]   = 'hide';


/**
 * -> Posts
 **/
$fields['post_layout'][ $std_id ]   = 'default';
$fields['post_template'][ $std_id ] = 'style-13';


/**
 * -> Page
 **/
$fields['page_layout'][ $std_id ] = 'default';


/**
 * -> Categories Archive
 **/
$fields['cat_layout'][ $std_id ]             = 'default';
$fields['cat_listing'][ $std_id ]            = 'default';
$fields['cat_top_posts'][ $std_id ]          = 'style-5';
$fields['cat_top_posts_gradient'][ $std_id ] = 'simple-gr';


/**
 * -> Tags Archive
 **/
$fields['tag_layout'][ $std_id ]  = 'default';
$fields['tag_listing'][ $std_id ] = 'default';


/**
 * -> Authors Archive
 **/
$fields['author_layout'][ $std_id ]  = 'default';
$fields['author_listing'][ $std_id ] = 'default';


/**
 * -> Search Results Archive
 **/
$fields['search_layout'][ $std_id ]  = 'default';
$fields['search_listing'][ $std_id ] = 'default';

/**
 * -> bbPress
 **/
$fields['bbpress_layout'][ $std_id ] = 'default';


/**
 * => Header Options
 */
$fields['header_layout'][ $std_id ]        = 'full-width';
$fields['header_style'][ $std_id ]         = 'style-4';
$fields['menu_sticky'][ $std_id ]          = 'smart';
$fields['menu_show_search_box'][ $std_id ] = 'show';


/**
 * -> Topbar
 */
$fields['topbar_style'][ $std_id ]             = 'hidden';
$fields['topbar_show_date'][ $std_id ]         = 'hide';
$fields['topbar_show_social_icons'][ $std_id ] = 'show';
$fields['header_top_padding'][ $std_id ]       = '';
$fields['header_bottom_padding'][ $std_id ]    = '';


/**
 * => Footer Options
 */
$fields['footer_social'][ $std_id ]      = 'hide';
$fields['footer_social_feed'][ $std_id ] = 'style-3';
$fields['footer_widgets'][ $std_id ]     = '3-column';


/**
 * =>Color & Style
 */
$fields['theme_color'][ $std_id ]   = '#4ea371';
$fields['site_bg_color'][ $std_id ] = '';
$fields['site_bg_image'][ $std_id ] = '';


/**
 * -> Topbar Colors
 */
$fields['topbar_date_bg'][ $std_id ]          = '#434343';
$fields['topbar_date_color'][ $std_id ]       = '#ffffff';
$fields['topbar_text_color'][ $std_id ]       = '#707070';
$fields['topbar_text_hcolor'][ $std_id ]      = '#707070';
$fields['topbar_bg_color'][ $std_id ]         = '#f5f5f5';
$fields['topbar_border_color'][ $std_id ]     = '#f5f5f5';
$fields['topbar_icon_text_color'][ $std_id ]  = '#424242';
$fields['topbar_icon_text_hcolor'][ $std_id ] = '#3b3b3b';
$fields['topbar_icon_bg'][ $std_id ]          = '#f5f5f5';
$fields['topbar_icon_bg_hover'][ $std_id ]    = '';


/**
 * -> Header Colors
 */
$fields['header_top_border'][ $std_id ]             = 0;
$fields['header_top_border_color'][ $std_id ]       = '';
$fields['header_menu_btop_color'][ $std_id ]        = '#2d2d2d';
$fields['header_menu_st1_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_st2_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_st3_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_st4_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_st5_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_st6_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_st7_bbottom_color'][ $std_id ] = '#2d2d2d';
$fields['header_menu_text_color'][ $std_id ]        = '#ffffff';
$fields['header_menu_bg_color'][ $std_id ]          = '#2d2d2d';
$fields['header_bg_color'][ $std_id ]               = '';
$fields['header_bg_image'][ $std_id ]               = '';
$fields['resp_scheme'][ $std_id ]                   = 'dark';


/**
 * -> Slider Colors
 */
$fields['cat_topposts_bg_color'][ $std_id ] = '';


/**
 * -> Footer Colors
 */
$fields['footer_link_color'][ $std_id ]       = '#ffffff';
$fields['footer_link_hover_color'][ $std_id ] = '';
$fields['footer_widgets_text'][ $std_id ]     = 'light-text';
$fields['footer_widgets_bg_color'][ $std_id ] = '';
$fields['footer_copy_bg_color'][ $std_id ]    = '#2e2e2e';
$fields['footer_social_bg_color'][ $std_id ]  = '#292929';
$fields['footer_bg_color'][ $std_id ]         = '';
$fields['footer_bg_image'][ $std_id ]         = '';


/**
 * -> Section Headings
 */
$fields['section_title_color'][ $std_id ]    = '';
$fields['section_title_bg_color'][ $std_id ] = '#2d2d2d';


/**
 * => Typography
 */
$fields['typo_body'][ $std_id ] = array(
	'family'         => 'Lora',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);

$fields['typo_heading'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'letter-spacing' => '',
);

$fields['typo_meta'][ $std_id ]        = array(
	'family'         => 'Lora',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '11',
	'letter-spacing' => '',
	'color'          => '#adb5bd',
);
$fields['typo_meta_author'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => ''
);

$fields['typo_badges'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);

$fields['typo_post_heading'][ $std_id ] = array(
	'family'      => 'Montserrat',
	'variant'     => 'regular',
	'subset'      => 'latin',
	'transform'   => 'uppercase',
	'size'        => '22',
	'line_height' => '26',
);

$fields['typo_post_tp1_heading'][ $std_id ] = '22px';

$fields['typo_post_tp2_heading'][ $std_id ] = '26px';

$fields['typo_post_tp3_heading'][ $std_id ] = '26px';

$fields['typo_post_tp4_heading'][ $std_id ] = '26px';

$fields['typo_post_tp5_heading'][ $std_id ] = '24px';

$fields['typo_post_tp6_heading'][ $std_id ] = '22px';

$fields['typo_post_tp7_heading'][ $std_id ] = '22px';

$fields['typo_post_tp8_heading'][ $std_id ] = '22px';

$fields['typo_post_tp9_heading'][ $std_id ] = '22px';

$fields['typo_post_tp10_heading'][ $std_id ] = '22px';

$fields['typo_post_tp11_heading'][ $std_id ] = '20px';

$fields['typo_post_tp12_heading'][ $std_id ] = '22px';

$fields['typo_post_tp13_heading'][ $std_id ] = '22px';

$fields['typo_post_tp14_heading'][ $std_id ] = '22px';

$fields['typo_post_subtitle'][ $std_id ] = array(
	'family'         => 'Lora',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '20',
	'letter-spacing' => '',
);

$fields['typo_entry_content'][ $std_id ] = array(
	'family'         => 'Lora',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '14',
	'letter-spacing' => '',
	'color'          => '#222222',
);

$fields['typo_post_summary'][ $std_id ] = array(
	'family'         => 'Lora',
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
	'family'         => 'Lora',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '22',
	'letter-spacing' => '',
);

$fields['typ_header_menu'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '1px',
);

$fields['typ_header_sub_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);

$fields['typo_topbar_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '10',
	'letter-spacing' => '',
);

$fields['typo_topbar_sub_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);

$fields['typo_topbar_date'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);

$fields['typo_archive_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '14',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_listing_classic_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_classic_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_classic_3_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_mg_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_3_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'letter-spacing' => '',
);

$fields['typo_mg_4_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '15',
	'letter-spacing' => '',
);

$fields['typo_mg_5_title_big'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
);

$fields['typo_mg_5_title_small'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '14',
	'letter-spacing' => '-0.4px',
);

$fields['typo_mg_6_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_7_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_8_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_9_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_mg_10_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_listing_grid_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_grid_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_tall_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '15',
	'line_height'    => '22',
	'letter-spacing' => '-0.4px',
	'color'          => '#383838',
);

$fields['typo_listing_tall_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '15',
	'line_height'    => '22',
	'letter-spacing' => '-0.4px',
	'color'          => '#383838',
);

$fields['typo_listing_slider_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
);

$fields['typo_listing_slider_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '26',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_slider_3_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '26',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_box_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '28',
	'letter-spacing' => '',
);

$fields['typo_listing_box_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
);

$fields['typo_listing_box_3_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
);

$fields['typo_listing_box_4_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
);

$fields['typo_listing_blog_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_blog_5_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '16',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '16',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_text_listing_1_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '15',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_text_listing_2_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '16',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_text_listing_3_title'][ $std_id ] = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '16',
	'letter-spacing' => '',
	'color'          => '#383838',
);

$fields['typo_section_heading'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'line_height'    => '16',
	'letter-spacing' => '1px',
);

$fields['typo_footer_menu'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'line_height'    => '12',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);

$fields['typo_footer_copy'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '10',
	'line_height'    => '10',
	'letter-spacing' => '',
);

$fields['typo_blocks_subtitle'][ $std_id ]              = array(
	'family'         => 'Lato',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_subtitle'][ $std_id ]   = 17;
$fields['typo_listing_classic_2_subtitle'][ $std_id ]   = 17;
$fields['typo_listing_classic_3_subtitle'][ $std_id ]   = 17;
$fields['typo_mg_1_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_2_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_3_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_4_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_5_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_6_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_7_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_8_subtitle'][ $std_id ]                = 16;
$fields['typo_mg_9_subtitle'][ $std_id ]                = 15;
$fields['typo_mg_10_subtitle'][ $std_id ]               = 16;
$fields['typo_listing_grid_1_subtitle'][ $std_id ]      = 16;
$fields['typo_listing_grid_2_subtitle'][ $std_id ]      = 16;
$fields['typo_listing_tall_1_subtitle'][ $std_id ]      = 14;
$fields['typo_listing_tall_2_subtitle'][ $std_id ]      = 14;
$fields['typo_listing_slider_1_subtitle'][ $std_id ]    = 15;
$fields['typo_listing_slider_2_subtitle'][ $std_id ]    = 15;
$fields['typo_listing_slider_3_subtitle'][ $std_id ]    = 15;
$fields['typo_listing_blog_1_subtitle'][ $std_id ]      = 15;
$fields['typo_listing_blog_5_subtitle'][ $std_id ]      = 17;
$fields['typo_listing_thumbnail_1_subtitle'][ $std_id ] = 14;
$fields['typo_listing_thumbnail_2_subtitle'][ $std_id ] = 14;
$fields['typo_text_listing_1_subtitle'][ $std_id ]      = 14;
$fields['typo_text_listing_2_subtitle'][ $std_id ]      = 14;
$fields['typo_text_listing_3_subtitle'][ $std_id ]      = 14;

unset( $std_id );
