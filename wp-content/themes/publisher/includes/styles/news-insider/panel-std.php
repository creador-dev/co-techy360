<?php
//
// Custom default values for news-insider Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't3-s9';
$fields['layout_style'][ $std_id ]                   = 'boxed';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1300',
	'content' => '74',
	'primary' => '26',
);
$fields['layout_columns_space'][ $std_id ]           = '20';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['listing-user-1'][ $std_id ]                 = array(
	'title-limit'        => '60',
	'social-icons'       => '0',
	'social-icons-limit' => '',
	'show-ranking'       => '',
	'show-posts-url'     => '1',
);
$fields['cat_listing'][ $std_id ]                    = 'blog-1';
$fields['header_layout'][ $std_id ]                  = 'full-width';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['topbar_show_login'][ $std_id ]              = 'hide';
$fields['header_top_padding'][ $std_id ]             = '6';
$fields['header_bottom_padding'][ $std_id ]          = '20';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-25';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-25';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't1-s4';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#013b82';
$fields['site_bg_color'][ $std_id ]                  = '#f4f4f4';
$fields['topbar_date_bg'][ $std_id ]                 = 'rgba(10,10,10,0)';
$fields['topbar_date_color'][ $std_id ]              = '#000000';
$fields['topbar_border_color'][ $std_id ]            = 'rgba(10,10,10,0)';
$fields['topbar_icon_text_color'][ $std_id ]         = '#013b82';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = 'rgba(1,59,130,0.82)';
$fields['header_menu_btop_color'][ $std_id ]         = '#013c81';
$fields['header_menu_st2_bbottom_color'][ $std_id ]  = '#e8e8e8';
$fields['header_menu_text_color'][ $std_id ]         = '#000000';
$fields['header_menu_text_h_color'][ $std_id ]       = '#ffffff';
$fields['header_menu_bg_color'][ $std_id ]           = '#f8f8f8';
$fields['footer_link_hover_color'][ $std_id ]        = '#ffffff';
$fields['footer_menu_bg_color'][ $std_id ]           = '#00244d';
$fields['footer_copy_bg_color'][ $std_id ]           = '#001834';
$fields['footer_social_bg_color'][ $std_id ]         = '#012a5c';
$fields['footer_bg_color'][ $std_id ]                = '#012a5c';
$fields['section_title_color'][ $std_id ]            = '#f6af49';
$fields['section_title_bg_color'][ $std_id ]         = '#013b82';
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
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#9a9a9a',
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
$fields['typo_post_tp1_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp5_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp6_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '42px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '42px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '40px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '40px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '38px';
$fields['typo_post_tp14_heading'][ $std_id ]         = '40px';
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '19',
	'line_height'    => '31',
	'letter-spacing' => '',
	'color'          => '#343434',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '13',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#656565',
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
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '29',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '29',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '29',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '19',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '14',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#1a1a1a',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '15',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '67',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
);
$fields['listing-modern-grid-5'][ $std_id ]          = array(
	'big-title-limit'   => '120',
	'small-title-limit' => '50',
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
$fields['listing-mix-3-1'][ $std_id ]                = array(
	'big-title-limit'         => '82',
	'big-excerpt'             => '1',
	'big-excerpt-limit'       => '115',
	'big-subtitle'            => '0',
	'big-subtitle-limit'      => '0',
	'big-subtitle-location'   => 'before-meta',
	'big-term-badge'          => '0',
	'big-term-badge-count'    => '1',
	'big-term-badge-tax'      => 'category',
	'big-format-icon'         => '1',
	'big-meta'                =>
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
	'small-thumbnail-type'    => 'featured-image',
	'small-title-limit'       => '60',
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
$fields['listing-blog-1'][ $std_id ]                 = array(
	'title-limit'       => '120',
	'excerpt-limit'     => '180',
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
	'title-limit'       => '40',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '0',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '1',
			'date'        => '0',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '0',
		),
);
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '80',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'after-title',
	'term-badge'        => '0',
	'term-badge-count'  => '1',
	'term-badge-tax'    => 'category',
	'show-ranking'      => '',
	'format-icon'       => '1',
	'excerpt'           => '0',
	'excerpt-limit'     => '115',
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
$fields['listing-text-2'][ $std_id ]                 = array(
	'title-limit'       => '60',
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
$fields['listing-classic-3'][ $std_id ]              = array(
	'title-limit'        => '0',
	'excerpt-limit'      => '300',
	'excerpt-limit-2col' => '150',
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
