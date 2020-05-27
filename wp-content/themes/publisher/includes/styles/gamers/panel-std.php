<?php
//
// Custom default values for gamers Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't6-s6';
$fields['layout_style'][ $std_id ]                   = 'boxed';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1200',
	'content' => '70',
	'primary' => '30',
);
$fields['layout_columns_space'][ $std_id ]           = '50';
$fields['general_listing'][ $std_id ]                = 'blog-5';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_featured_image_cut'][ $std_id ]        = 'full';
$fields['inline_related_posts_status'][ $std_id ]    = 'show';
$fields['cat_top_posts'][ $std_id ]                  = 'style-1';
$fields['header_layout'][ $std_id ]                  = 'out-full-width';
$fields['resp_settings'][ $std_id ]                  = array(
	'login'        => '0',
	'topbar_nav'   => '1',
	'search'       => '1',
	'social_icons' => '1',
);
$fields['resp_bg_gradient'][ $std_id ]               = 'gr-4';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_show_date'][ $std_id ]               = 'hide';
$fields['header_top_padding'][ $std_id ]             = '14.8';
$fields['header_bottom_padding'][ $std_id ]          = '14.5';
$fields['off_canvas'][ $std_id ]                     = '1';
$fields['off_canvas_title'][ $std_id ]               = 'Publisher Theme';
$fields['off_canvas_desc'][ $std_id ]                = 'I’m a gamer, always have been.';
$fields['off_canvas_search'][ $std_id ]              = '0';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-7';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-9';
$fields['footer_layout'][ $std_id ]                  = 'out-full-width';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#f42c1a';
$fields['site_bg_color'][ $std_id ]                  = '#000000';
$fields['site_bg_color_2'][ $std_id ]                = '#000000';
$fields['topbar_text_color'][ $std_id ]              = '#b0b0b0';
$fields['topbar_bg_color'][ $std_id ]                = '#0b0b0b';
$fields['topbar_border_color'][ $std_id ]            = '#1e1e1e';
$fields['topbar_icon_text_color'][ $std_id ]         = '#b0b0b0';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#f42c1a';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_btop_color'][ $std_id ]         = '#f42c1a';
$fields['header_menu_text_color'][ $std_id ]         = '#ffffff';
$fields['header_menu_text_h_color'][ $std_id ]       = '#ffffff';
$fields['header_menu_bg_color'][ $std_id ]           = '#f42c1a';
$fields['header_bg_color'][ $std_id ]                = '#0b0b0b';
$fields['footer_widgets_bg_color'][ $std_id ]        = '#161616';
$fields['footer_copy_bg_color'][ $std_id ]           = '#0f0f0f';
$fields['section_title_bg_color'][ $std_id ]         = '#161616';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Barlow',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Barlow',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#a0a0a0',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Barlow',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Oswald',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '0.4px',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '33px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '33px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '33px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '33px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '25px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#4a4a4a',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#4a4a4a',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'System Font',
	'variant'        => '400',
	'subset'         => 'unknown',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
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
	'family'         => 'Oswald',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '11',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '.5px',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '36',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Barlow',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Barlow',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '21',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Barlow',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '21',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Barlow',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'line_height'    => '26',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_1_subtitle'][ $std_id ]             = '15';
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_subtitle'][ $std_id ]             = '15';
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '17',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_mg_4_subtitle'][ $std_id ]             = '16';
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_mg_5_subtitle'][ $std_id ]             = '15';
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '26',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_subtitle'][ $std_id ]             = '15';
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_subtitle'][ $std_id ]             = '15';
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '15',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '26',
	'line_height'    => '30',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '21',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '21',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '25',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '20',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '20',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '22',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_blog_5_subtitle'][ $std_id ]   = '15';
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Barlow',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Barlow',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'line_height'    => '17',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Barlow',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#161616',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Oswald',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '15',
	'line_height'    => '32',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '50',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Barlow',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '13',
	'line_height'    => '19',
	'letter-spacing' => '',
);
$fields['listing-modern-grid-1'][ $std_id ]          = array(
	'item-1-title-limit' => '160',
	'item-2-title-limit' => '90',
	'item-3-title-limit' => '70',
	'item-4-title-limit' => '70',
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
			'comment'     => '0',
			'review'      => '0',
		),
);
$fields['listing-modern-grid-3'][ $std_id ]          = array(
	'title-limit'      => '60',
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
$fields['listing-modern-grid-4'][ $std_id ]          = array(
	'title-limit'       => '0',
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
			'comment'     => '1',
			'review'      => '1',
		),
);
$fields['listing-modern-grid-7'][ $std_id ]          = array(
	'big-title-limit'         => '140',
	'big-subtitle'            => '0',
	'big-subtitle-limit'      => '0',
	'big-subtitle-location'   => 'before-meta',
	'big-format-icon'         => '1',
	'big-term-badge'          => '1',
	'big-term-badge-count'    => '2',
	'big-term-badge-tax'      => 'category',
	'big-meta'                =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '0',
		),
	'small-title-limit'       => '60',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'before-meta',
	'small-format-icon'       => '1',
	'small-term-badge'        => '0',
	'small-term-badge-count'  => '1',
	'small-term-badge-tax'    => 'category',
	'small-meta'              =>
		array(
			'show'        => '0',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
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
$fields['listing-mix-3-1'][ $std_id ]                = array(
	'big-title-limit'         => '60',
	'big-excerpt'             => '0',
	'big-excerpt-limit'       => '115',
	'big-subtitle'            => '0',
	'big-subtitle-limit'      => '0',
	'big-subtitle-location'   => 'before-meta',
	'big-format-icon'         => '1',
	'big-term-badge'          => '0',
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
			'review'      => '0',
		),
	'small-thumbnail-type'    => 'featured-image',
	'small-title-limit'       => '70',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'before-meta',
	'small-meta'              =>
		array(
			'show'        => '1',
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '0',
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
$fields['listing-blog-5'][ $std_id ]                 = array(
	'title-limit'       => '100',
	'excerpt-limit'     => '200',
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
			'comment'     => '1',
			'review'      => '0',
		),
	'read-more'         => '0',
);
$fields['listing-thumbnail-1'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '60',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '0',
			'date'        => '1',
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
$fields['listing-bs-slider-1'][ $std_id ]            = array(
	'title-limit'       => '0',
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
			'comment'     => '1',
			'review'      => '1',
		),
);
$fields['listing-bs-slider-2'][ $std_id ]            = array(
	'title-limit'       => '0',
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
			'comment'     => '1',
			'review'      => '1',
		),
	'read-more'         => '1',
);
$fields['listing-bs-slider-3'][ $std_id ]            = array(
	'title-limit'       => '0',
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
			'comment'     => '1',
			'review'      => '1',
		),
	'read-more'         => '1',
);
$fields['blocks-related-posts'][ $std_id ]           = array(
	'title-limit'       => '70',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'format-icon'       => '1',
	'term-badge'        => '1',
	'term-badge-count'  => '1',
	'term-badge-tax'    => 'category',
);
