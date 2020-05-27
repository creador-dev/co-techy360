<?php
//
// Custom default values for the-online-post Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't3-s1';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1115',
	'content' => '70',
	'primary' => '30',
);
$fields['layout-3-col'][ $std_id ]                   = array(
	'width'     => '1250',
	'content'   => '61',
	'primary'   => '20',
	'secondary' => '19',
);
$fields['layout_columns_space'][ $std_id ]           = '25';
$fields['general_listing'][ $std_id ]                = 'blog-5';
$fields['pagination_type'][ $std_id ]                = 'numbered';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['inline_related_posts_status'][ $std_id ]    = 'show';
$fields['header_layout'][ $std_id ]                  = 'full-width';
$fields['header_style'][ $std_id ]                   = 'style-1';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_show_login'][ $std_id ]              = 'hide';
$fields['header_top_padding'][ $std_id ]             = '4';
$fields['header_bottom_padding'][ $std_id ]          = '31';
$fields['off_canvas_desc'][ $std_id ]                = 'The news is by your side.';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-17';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-9';
$fields['footer_layout'][ $std_id ]                  = 'out-full-width';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#1b3ea3';
$fields['site_bg_color'][ $std_id ]                  = '#f8f8f8';
$fields['topbar_date_bg'][ $std_id ]                 = '#06266c';
$fields['topbar_date_color'][ $std_id ]              = '#ffffff';
$fields['topbar_text_color'][ $std_id ]              = 'rgba(255,255,255,0.55)';
$fields['topbar_text_hcolor'][ $std_id ]             = '#ffffff';
$fields['topbar_border_color'][ $std_id ]            = 'rgba(239,239,239,0)';
$fields['topbar_icon_text_color'][ $std_id ]         = '#ffffff';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#ffffff';
$fields['topbar_icon_bg'][ $std_id ]                 = '#06266c';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_btop_color'][ $std_id ]         = 'rgba(222,222,222,0)';
$fields['header_menu_st1_bbottom_color'][ $std_id ]  = 'rgba(222,222,222,0)';
$fields['header_menu_text_color'][ $std_id ]         = '#212121';
$fields['header_menu_bg_color'][ $std_id ]           = '#ffffff';
$fields['header_bg_color'][ $std_id ]                = '#082f87';
$fields['footer_link_color'][ $std_id ]              = '#a3a2a2';
$fields['footer_link_hover_color'][ $std_id ]        = '#d8d6d6';
$fields['footer_widgets_bg_color'][ $std_id ]        = 'rgba(24,24,24,0)';
$fields['footer_copy_bg_color'][ $std_id ]           = '#181818';
$fields['footer_social_bg_color'][ $std_id ]         = '#181818';
$fields['footer_bg_color'][ $std_id ]                = '#181818';
$fields['section_title_color'][ $std_id ]            = '#0e0d0d';
$fields['section_title_bg_color'][ $std_id ]         = '#000000';
$fields['listings_readmore_color'][ $std_id ]        = '#1b3ea3';
$fields['listings_readmore_color_hover'][ $std_id ]  = '#02087c';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#111111',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#9c9c9c',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'none',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '34px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp5_heading'][ $std_id ]          = '36px';
$fields['typo_post_tp6_heading'][ $std_id ]          = '35px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '35px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '35px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '35px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '35px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '34px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '33px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '33px';
$fields['typo_post_tp14_heading'][ $std_id ]         = '33px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
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
	'size'           => '16',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#222222',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#696969',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '17',
	'line_height'    => '27',
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
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '-0.8px',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '-0.8px',
	'color'          => '#1e1e1e',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '33',
	'line_height'    => '37',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '33',
	'line_height'    => '37',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '30',
	'line_height'    => '33',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '26',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'letter-spacing' => '-0.8px',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '-0.8px',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '-0.8px',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '24',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '24',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '22',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '26',
	'line_height'    => '30',
	'letter-spacing' => '-0.8px',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '-0.8px',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '16',
	'letter-spacing' => '-0.8px',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '-0.8px',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '-0.8px',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '20',
	'line_height'    => '24',
	'letter-spacing' => '-.6px',
	'color'          => '#000000',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'line_height'    => '27',
	'letter-spacing' => '-0.8px',
	'color'          => '#000000',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#414141',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#414141',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '15',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#414141',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Frank Ruhl Libre',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '39',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
);
$fields['listing-mix-1-2'][ $std_id ]                = array(
	'big-title-limit'         => '70',
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
	'small-title-limit'       => '55',
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
$fields['listing-mix-1-3'][ $std_id ]                = array(
	'big-title-limit'         => '70',
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
			'comment'     => '0',
			'review'      => '0',
		),
	'small-title-limit'       => '90',
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
$fields['listing-mix-3-3'][ $std_id ]                = array(
	'big-title-limit'         => '75',
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
			'show'        => '0',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '0',
		),
	'small-title-limit'       => '58',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'before-meta',
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
$fields['listing-blog-1'][ $std_id ]                 = array(
	'title-limit'       => '65',
	'excerpt-limit'     => '240',
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
			'comment'     => '1',
			'review'      => '1',
		),
);
$fields['listing-blog-5'][ $std_id ]                 = array(
	'title-limit'       => '75',
	'excerpt-limit'     => '130',
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
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '44',
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
$fields['listing-thumbnail-3'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '55',
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
$fields['listing-text-1'][ $std_id ]                 = array(
	'title-limit'       => '80',
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
			'date'        => '0',
			'date-format' => 'readable',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '0',
		),
);
$fields['listing-text-3'][ $std_id ]                 = array(
	'title-limit'       => '64',
	'excerpt-limit'     => '200',
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
$fields['listing-classic-1'][ $std_id ]              = array(
	'title-limit'        => '85',
	'excerpt-limit'      => '350',
	'excerpt-limit-2col' => '175',
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
			'comment'     => '1',
			'review'      => '1',
		),
	'read-more'          => '1',
);
