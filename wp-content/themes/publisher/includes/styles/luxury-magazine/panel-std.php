<?php
//
// Custom default values for luxury-magazine Demo
// 


$std_id = $this->get_std_id();


$fields['layout_style'][ $std_id ]                   = 'boxed';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1240',
	'content' => '72',
	'primary' => '28',
);
$fields['layout_columns_space'][ $std_id ]           = '30';
$fields['general_listing'][ $std_id ]                = 'blog-5';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-6';
$fields['post-page-settings'][ $std_id ]             = array(
	'featured'     => '1',
	'format-icon'  => '1',
	'term'         => '1',
	'term-count'   => '3',
	'term-tax'     => 'category',
	'meta'         =>
		array(
			'show'          => '1',
			'author_avatar' => '1',
			'author'        => '1',
			'date'          => '1',
			'date_type'     => 'one',
			'comment'       => '0',
			'review'        => '1',
			'views'         => '1',
		),
	'tag'          => '1',
	'tag-count'    => '8',
	'excerpt'      => '0',
	'excerpt_type' => 'after-title',
);
$fields['header_style'][ $std_id ]                   = 'style-1';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_style'][ $std_id ]                   = 'hidden';
$fields['header_top_padding'][ $std_id ]             = '11';
$fields['header_bottom_padding'][ $std_id ]          = '10';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-17';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-10';
$fields['breadcrumb'][ $std_id ]                     = 'hide';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't1-s7';
$fields['footer_social_feed'][ $std_id ]             = 'style-2';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#b59d58';
$fields['site_bg_color'][ $std_id ]                  = '#e7e8ea';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_top_border_color'][ $std_id ]        = '#000000';
$fields['header_menu_btop_color'][ $std_id ]         = 'rgba(10,10,10,0)';
$fields['header_menu_st1_bbottom_color'][ $std_id ]  = 'rgba(10,10,10,0)';
$fields['header_menu_text_color'][ $std_id ]         = '#3e3d3d';
$fields['header_menu_bg_color'][ $std_id ]           = '#ffffff';
$fields['header_bg_color'][ $std_id ]                = '#151515';
$fields['footer_widgets_bg_color'][ $std_id ]        = '#0b0b0b';
$fields['footer_copy_bg_color'][ $std_id ]           = '#232323';
$fields['footer_social_bg_color'][ $std_id ]         = '#0b0b0b';
$fields['footer_bg_color'][ $std_id ]                = '#0b0b0b';
$fields['section_title_bg_color'][ $std_id ]         = '#b59d58';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Playfair Display',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '',
	'color'          => '#adb5bd',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '2px',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '38px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '38px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '38px';
$fields['typo_post_tp5_heading'][ $std_id ]          = '38px';
$fields['typo_post_tp6_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '36px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '35px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '34px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '34px';
$fields['typo_post_tp14_heading'][ $std_id ]         = '34px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '17',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#313131',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '13',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#888888',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Playfair Display',
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
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '2px',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Montserrat',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Montserrat',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Montserrat',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '30',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#020202',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '30',
	'line_height'    => '42',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '24',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#020202',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#020202',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '18',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#020202',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '15',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Playfair Display',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '30',
	'line_height'    => '25',
	'letter-spacing' => '',
);
$fields['typo_widget_section_heading'][ $std_id ]    = array(
	'enable'         => '1',
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '10',
	'line_height'    => '25',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Montserrat',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '9',
	'line_height'    => '25',
	'letter-spacing' => '2px',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Montserrat',
	'variant'        => '500',
	'subset'         => 'latin',
	'size'           => '11',
	'line_height'    => '21',
	'letter-spacing' => '',
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
$fields['listing-modern-grid-5'][ $std_id ]          = array(
	'big-title-limit'   => '120',
	'small-title-limit' => '40',
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
	'title-limit'       => '73',
	'excerpt-limit'     => '160',
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
	'read-more'         => '0',
);
$fields['listing-thumbnail-1'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '72',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '',
	'meta'              =>
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
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '70',
	'excerpt'           => '0',
	'excerpt-limit'     => '115',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'after-title',
	'format-icon'       => '1',
	'term-badge'        => '1',
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
