<?php
//
// Custom default values for game-news Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't7-s1';
$fields['layout_style'][ $std_id ]                   = 'boxed';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1200',
	'content' => '70',
	'primary' => '30',
);
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['topbar_show_date'][ $std_id ]               = 'hide';
$fields['topbar_show_login'][ $std_id ]              = 'hide';
$fields['off_canvas'][ $std_id ]                     = '1';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-3';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-3';
$fields['footer_widgets'][ $std_id ]                 = '1-column';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't1-s6';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#12359c';
$fields['site_bg_color'][ $std_id ]                  = 'rgba(10,10,10,0)';
$fields['site_bg_color_2'][ $std_id ]                = '#001534';
$fields['topbar_text_color'][ $std_id ]              = 'rgba(255,255,255,0.4)';
$fields['topbar_text_hcolor'][ $std_id ]             = '#ffffff';
$fields['topbar_border_color'][ $std_id ]            = 'rgba(255,255,255,0.1)';
$fields['topbar_icon_text_color'][ $std_id ]         = 'rgba(255,255,255,0.3)';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#ffffff';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_btop_color'][ $std_id ]         = '#0b246f';
$fields['header_menu_st2_bbottom_color'][ $std_id ]  = '#0b246f';
$fields['header_menu_text_color'][ $std_id ]         = '#ffffff';
$fields['header_menu_text_h_color'][ $std_id ]       = '#ffffff';
$fields['header_menu_bg_color'][ $std_id ]           = '#0b246f';
$fields['header_bg_color'][ $std_id ]                = '#020b27';
$fields['footer_link_hover_color'][ $std_id ]        = '#ffffff';
$fields['footer_widgets_bg_color'][ $std_id ]        = '#000823';
$fields['footer_copy_bg_color'][ $std_id ]           = '#010511';
$fields['footer_bg_color'][ $std_id ]                = '#000823';
$fields['section_title_color'][ $std_id ]            = '#000000';
$fields['section_title_bg_color'][ $std_id ]         = '#12359c';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Rajdhani',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Rajdhani',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#a8a8a8',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Rajdhani',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '44px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '46px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '46px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '46px';
$fields['typo_post_tp5_heading'][ $std_id ]          = '44';
$fields['typo_post_tp6_heading'][ $std_id ]          = '44px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '44px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '44px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '44px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '44px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '43px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '42px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '42px';
$fields['typo_post_tp14_heading'][ $std_id ]         = '44px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Rajdhani',
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
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#1e1e1e',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Roboto',
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
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Rajdhani',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'line_height'    => '33',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'line_height'    => '33',
	'letter-spacing' => '',
	'color'          => '#0a0a0a',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'left',
	'transform'      => 'capitalize',
	'size'           => '21',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '30',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '23',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '23',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'line_height'    => '30',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '22',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Rajdhani',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Rajdhani',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '26',
	'line_height'    => '22',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Rajdhani',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '14',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Rajdhani',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
);
$fields['listing-modern-grid-3'][ $std_id ]          = array(
	'title-limit'      => '50',
	'format-icon'      => '1',
	'term-badge'       => '0',
	'term-badge-count' => '1',
	'term-badge-tax'   => 'category',
	'meta'             =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '0',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
);
$fields['listing-modern-grid-5'][ $std_id ]          = array(
	'big-title-limit'   => '70',
	'small-title-limit' => '40',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'format-icon'       => '1',
	'term-badge'        => '0',
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
	'title-limit'       => '82',
	'excerpt-limit'     => '115',
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
	'title-limit'       => '50',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '0',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '0',
			'date'        => '0',
			'date-format' => 'standard',
			'view'        => '1',
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
$fields['listing-tall-2'][ $std_id ]                 = array(
	'title-limit'       => '56',
	'excerpt-limit'     => '115',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'format-icon'       => '1',
	'term-badge'        => '0',
	'term-badge-count'  => '1',
	'term-badge-tax'    => 'category',
	'meta'              =>
		array(
			'show'        => '0',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
);
