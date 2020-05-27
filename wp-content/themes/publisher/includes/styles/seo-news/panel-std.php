<?php
//
// Custom default values for seo-news Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't3-s1';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1250',
	'content' => '69',
	'primary' => '31',
);
$fields['layout_columns_space'][ $std_id ]           = '50';
$fields['general_listing'][ $std_id ]                = 'blog-5';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['listing-user-1'][ $std_id ]                 = array(
	'title-limit'        => '60',
	'social-icons'       => '0',
	'social-icons-limit' => '2',
	'show-ranking'       => '',
	'show-posts-url'     => '1',
);
$fields['listing-user-2'][ $std_id ]                 = array(
	'title-limit'        => '60',
	'social-icons'       => '0',
	'social-icons-limit' => '',
	'show-biography'     => '1',
	'biography-limit'    => '150',
	'show-ranking'       => '',
	'show-posts-url'     => '1',
);
$fields['listing-user-3'][ $std_id ]                 = array(
	'big-social-icons'         => '0',
	'big-social-icons-limit'   => '',
	'big-show-biography'       => '1',
	'big-biography-limit'      => '150',
	'big-show-ranking'         => '',
	'big-show-posts-url'       => '1',
	'big-title-limit'          => '60',
	'small-social-icons'       => '1',
	'small-social-icons-limit' => '2',
	'small-show-ranking'       => '',
	'small-show-posts-url'     => '1',
	'small-title-limit'        => '60',
);
$fields['listing-user-4'][ $std_id ]                 = array(
	'title-limit'        => '25',
	'social-icons'       => '0',
	'social-icons-limit' => '6',
	'show-biography'     => '1',
	'biography-limit'    => '65',
	'show-ranking'       => '',
	'show-posts-url'     => '1',
);
$fields['listing-user-5'][ $std_id ]                 = array(
	'title-limit'        => '25',
	'social-icons'       => '0',
	'social-icons-limit' => '2',
	'show-biography'     => '1',
	'biography-limit'    => '85',
	'show-ranking'       => '',
	'show-posts-url'     => '1',
);
$fields['post_featured_image_cut'][ $std_id ]        = 'full';
$fields['inline_related_posts_status'][ $std_id ]    = 'show';
$fields['header_layout'][ $std_id ]                  = 'full-width';
$fields['header_style'][ $std_id ]                   = 'style-6';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_show_date'][ $std_id ]               = 'hide';
$fields['topbar_show_login'][ $std_id ]              = 'hide';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-7';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-9';
$fields['footer_layout'][ $std_id ]                  = 'out-full-width';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't1-s4';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['injection_after_header'][ $std_id ]         = '35';
$fields['injection_before_footer'][ $std_id ]        = '194';
$fields['theme_color'][ $std_id ]                    = '#4285f4';
$fields['topbar_text_color'][ $std_id ]              = '#ffffff';
$fields['topbar_text_hcolor'][ $std_id ]             = '#ffffff';
$fields['topbar_bg_color'][ $std_id ]                = '#4285f4';
$fields['topbar_icon_text_color'][ $std_id ]         = '#ffffff';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#ffffff';
$fields['topbar_icon_bg'][ $std_id ]                 = 'rgba(255,255,255,0.15)';
$fields['topbar_icon_bg_hover'][ $std_id ]           = 'rgba(255,255,255,0.3)';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_btop_color'][ $std_id ]         = '';
$fields['header_menu_st6_bbottom_color'][ $std_id ]  = '#ecf3f5';
$fields['header_menu_text_color'][ $std_id ]         = '#353535';
$fields['footer_link_color'][ $std_id ]              = '#353535';
$fields['footer_link_hover_color'][ $std_id ]        = '#000000';
$fields['footer_widgets_text'][ $std_id ]            = 'dark-text';
$fields['footer_widgets_bg_color'][ $std_id ]        = '#f3fafd';
$fields['footer_line_top_color'][ $std_id ]          = '#4285f4';
$fields['footer_menu_bg_color'][ $std_id ]           = '#dbedf5';
$fields['footer_copy_bg_color'][ $std_id ]           = '#f3fafd';
$fields['footer_social_bg_color'][ $std_id ]         = '#f3fafd';
$fields['footer_bg_color'][ $std_id ]                = '#f3fafd';
$fields['section_title_color'][ $std_id ]            = '#282828';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Rubik',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_heading_h2_color'][ $std_id ]          = '#212020';
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#b2b2b2',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Rubik',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Rubik',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '1.2',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp6_heading'][ $std_id ]          = '34px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '34px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '34px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '34px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '34px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '33px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '32px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '32px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '18',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#1e1e1e',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '13',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#9b9999',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
);
$fields['typ_header_logo'][ $std_id ]                = array(
	'enable'         => '0',
	'family'         => 'Helvetica',
	'variant'        => '700',
	'subset'         => 'unknown',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '30',
	'letter-spacing' => '',
);
$fields['typ_header_menu'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '26',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '26',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => 'w25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '27',
	'line_height'    => '32',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '15',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'line_height'    => '26',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#5a5959',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '15',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#282828',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Rubik',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '24',
	'letter-spacing' => '',
);
$fields['typo_widget_section_heading'][ $std_id ]    = array(
	'enable'         => '0',
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '22',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '45',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Rubik',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '13',
	'line_height'    => '21',
	'letter-spacing' => '',
);
$fields['listing-mix-1-2'][ $std_id ]                = array(
	'big-title-limit'         => '82',
	'big-excerpt'             => '1',
	'big-excerpt-limit'       => '115',
	'big-subtitle'            => '0',
	'big-subtitle-limit'      => '0',
	'big-subtitle-location'   => 'before-meta',
	'big-format-icon'         => '1',
	'big-term-badge'          => '1',
	'big-term-badge-count'    => '1',
	'big-term-badge-tax'      => 'category',
	'big-meta'                =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
	'small-thumbnail-type'    => 'featured-image',
	'small-title-limit'       => '60',
	'small-excerpt'           => '0',
	'small-excerpt-limit'     => '110',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'after-title',
	'small-format-icon'       => '1',
	'small-term-badge'        => '1',
	'small-term-badge-count'  => '1',
	'small-term-badge-tax'    => 'category',
	'small-meta'              =>
		array(
			'show'        => '0',
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
);
$fields['listing-mix-4-5'][ $std_id ]                = array(
	'big-title-limit'         => '0',
	'big-excerpt-limit'       => '350',
	'big-subtitle'            => '0',
	'big-subtitle-limit'      => '0',
	'big-subtitle-location'   => 'before-meta',
	'big-format-icon'         => '1',
	'big-term-badge'          => '1',
	'big-term-badge-count'    => '1',
	'big-term-badge-tax'      => 'category',
	'big-meta'                =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
	'big-read-more'           => '1',
	'small-title-limit'       => '60',
	'small-excerpt-limit'     => '160',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'before-meta',
	'small-format-icon'       => '1',
	'small-term-badge'        => '1',
	'small-term-badge-count'  => '1',
	'small-term-badge-tax'    => 'category',
	'small-meta'              =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
	'small-read-more'         => '1',
);
$fields['listing-grid-1'][ $std_id ]                 = array(
	'title-limit'       => '60',
	'excerpt-limit'     => '155',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'format-icon'       => '1',
	'term-badge'        => '1',
	'term-badge-count'  => '1',
	'term-badge-tax'    => 'category',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
);
$fields['listing-thumbnail-1'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '70',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '0',
	'meta'              =>
		array(
			'show'        => '0',
			'author'      => '1',
			'date'        => '0',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
);
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '50',
	'excerpt'           => '0',
	'excerpt-limit'     => '115',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'after-title',
	'format-icon'       => '1',
	'term-badge'        => '0',
	'term-badge-count'  => '1',
	'term-badge-tax'    => 'category',
	'show-ranking'      => '',
	'meta'              =>
		array(
			'show'        => '0',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '0',
		),
);
$fields['listing-text-1'][ $std_id ]                 = array(
	'title-limit'       => '56',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'term-badge'        => '1',
	'term-badge-count'  => '1',
	'term-badge-tax'    => 'category',
	'show-ranking'      => '',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'readable',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
);
$fields['listing-classic-1'][ $std_id ]              = array(
	'title-limit'        => '0',
	'excerpt-limit'      => '200',
	'excerpt-limit-2col' => '175',
	'excerpt-limit-3col' => '100',
	'subtitle'           => '0',
	'subtitle-limit'     => '0',
	'subtitle-location'  => 'before-meta',
	'format-icon'        => '1',
	'term-badge'         => '1',
	'term-badge-count'   => '1',
	'term-badge-tax'     => 'category',
	'meta'               =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
	'read-more'          => '0',
);
$fields['listing-classic-2'][ $std_id ]              = array(
	'title-limit'        => '0',
	'excerpt-limit'      => '150',
	'excerpt-limit-2col' => '160',
	'excerpt-limit-3col' => '100',
	'subtitle'           => '0',
	'subtitle-limit'     => '0',
	'subtitle-location'  => 'before-meta',
	'format-icon'        => '1',
	'term-badge'         => '0',
	'term-badge-count'   => '1',
	'term-badge-tax'     => 'category',
	'meta'               =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
	'read-more'          => '0',
);
