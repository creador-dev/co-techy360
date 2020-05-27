<?php
//
// Custom default values for adventure-blog Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't3-s7';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1060',
	'content' => '64',
	'primary' => '36',
);
$fields['layout_columns_space'][ $std_id ]           = '54';
$fields['general_listing'][ $std_id ]                = 'grid-1';
$fields['pagination_type'][ $std_id ]                = 'numbered';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['cat_posts_count'][ $std_id ]                = '9';
$fields['header_layout'][ $std_id ]                  = 'full-width';
$fields['header_style'][ $std_id ]                   = 'style-1';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_style'][ $std_id ]                   = 'hidden';
$fields['topbar_show_date'][ $std_id ]               = 'hide';
$fields['header_top_padding'][ $std_id ]             = '10';
$fields['header_bottom_padding'][ $std_id ]          = '110';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['breadcrumb'][ $std_id ]                     = 'hide';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#8c9a78';
$fields['site_bg_color_2'][ $std_id ]                = '#d0d0c6';
$fields['topbar_date_color'][ $std_id ]              = '#ffffff';
$fields['topbar_text_hcolor'][ $std_id ]             = '#ffffff';
$fields['topbar_icon_text_color'][ $std_id ]         = '#5a6052';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#505647';
$fields['topbar_icon_bg'][ $std_id ]                 = 'rgba(0,0,0,0.1411764705882353)';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_btop_color'][ $std_id ]         = '#8c9a78';
$fields['header_menu_st1_bbottom_color'][ $std_id ]  = '#8c9a78';
$fields['header_menu_text_color'][ $std_id ]         = '#ffffff';
$fields['header_menu_text_h_color'][ $std_id ]       = '#ffffff';
$fields['header_menu_bg_color'][ $std_id ]           = '#8c9a78';
$fields['footer_copy_bg_color'][ $std_id ]           = '#2e3129';
$fields['footer_social_bg_color'][ $std_id ]         = '#2e3129';
$fields['footer_bg_color'][ $std_id ]                = '#2e3129';
$fields['section_title_color'][ $std_id ]            = '#ffffff';
$fields['section_title_bg_color'][ $std_id ]         = '#8d907c';
$fields['listings_readmore_color'][ $std_id ]        = '#707c61';
$fields['listings_readmore_color_hover'][ $std_id ]  = '#8c9a78';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Merriweather',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Merriweather',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => 'rgba(82,86,77,0.63)',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Merriweather',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Merriweather',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '26px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '28px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '28px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '28px';
$fields['typo_post_tp5_heading'][ $std_id ]          = '28px';
$fields['typo_post_tp6_heading'][ $std_id ]          = '26px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '26px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '26px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '26px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '26px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '25px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '24px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '24px';
$fields['typo_post_tp14_heading'][ $std_id ]         = '24px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Merriweather',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Merriweather',
	'variant'        => '300',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'letter-spacing' => '',
	'color'          => '#303030',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Merriweather',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '13',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#737769',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Merriweather',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '24',
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
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '15',
	'letter-spacing' => '1.1px',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Merriweather',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '32',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Merriweather',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '15',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '24',
	'line_height'    => '32',
	'letter-spacing' => '0.818px',
	'color'          => '#31362b',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '24',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '24',
	'line_height'    => '32',
	'letter-spacing' => '0.818px',
	'color'          => '#31362b',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '16',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '0.299px',
	'color'          => '#31362b',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '22',
	'line_height'    => '30',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Merriweather',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '12',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Merriweather',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#31362b',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '15',
	'line_height'    => '20',
	'letter-spacing' => '1.27px',
);
$fields['typo_widget_section_heading'][ $std_id ]    = array(
	'enable'         => '0',
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '20',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Oswald',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '38',
	'letter-spacing' => '1px',
	'color'          => '#e0e2d4',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Merriweather',
	'variant'        => '300',
	'subset'         => 'latin',
	'size'           => '12',
	'line_height'    => '18',
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
			'comment'     => '0',
			'review'      => '0',
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
$fields['listing-mix-4-3'][ $std_id ]                = array(
	'big-title-limit'         => '0',
	'big-excerpt-limit'       => '220',
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
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '0',
		),
	'big-read-more'           => '1',
	'small-title-limit'       => '82',
	'small-excerpt-limit'     => '115',
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
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
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
$fields['listing-blog-1'][ $std_id ]                 = array(
	'title-limit'       => '100',
	'excerpt-limit'     => '80',
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
$fields['listing-blog-2'][ $std_id ]                 = array(
	'title-limit'       => '100',
	'excerpt-limit'     => '61',
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
$fields['listing-thumbnail-1'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '51',
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
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '1',
		),
);
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '40',
	'excerpt'           => '',
	'excerpt-limit'     => '',
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
			'show'        => '',
			'author'      => '',
			'date'        => '',
			'date-format' => 'standard',
			'view'        => '',
			'share'       => '',
			'comment'     => '',
			'review'      => '',
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
			'author'      => '0',
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
			'author'      => '0',
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
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
	'read-more'         => '1',
);
