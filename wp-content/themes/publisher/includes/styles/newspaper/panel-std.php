<?php
//
// Custom default values for newspaper Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't2-s1';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1040',
	'content' => '68',
	'primary' => '32',
);
$fields['layout_columns_space'][ $std_id ]           = '40';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['header_layout'][ $std_id ]                  = 'out-full-width';
$fields['header_style'][ $std_id ]                   = 'style-1';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['header_top_padding'][ $std_id ]             = '26';
$fields['header_bottom_padding'][ $std_id ]          = '28';
$fields['off_canvas'][ $std_id ]                     = '1';
$fields['off_canvas_desc'][ $std_id ]                = 'The news is by your side.';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-17';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-10';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't5-s1';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#ba141a';
$fields['site_bg_color'][ $std_id ]                  = '#ffffff';
$fields['topbar_date_bg'][ $std_id ]                 = '#090909';
$fields['topbar_date_color'][ $std_id ]              = '#a3a3a3';
$fields['topbar_text_color'][ $std_id ]              = '#a3a3a3';
$fields['topbar_bg_color'][ $std_id ]                = '#090909';
$fields['topbar_border_color'][ $std_id ]            = '#090909';
$fields['topbar_icon_text_color'][ $std_id ]         = '#a3a3a3';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#ba141a';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_btop_color'][ $std_id ]         = '#000000';
$fields['header_menu_st1_bbottom_color'][ $std_id ]  = '#dddddd';
$fields['header_menu_text_color'][ $std_id ]         = '#000000';
$fields['footer_link_color'][ $std_id ]              = '#292828';
$fields['footer_widgets_text'][ $std_id ]            = 'dark-text';
$fields['footer_widgets_bg_color'][ $std_id ]        = '#ffffff';
$fields['footer_copy_bg_color'][ $std_id ]           = '#ffffff';
$fields['footer_social_bg_color'][ $std_id ]         = '#ffffff';
$fields['footer_bg_color'][ $std_id ]                = '#ffffff';
$fields['section_title_color'][ $std_id ]            = '#131313';
$fields['section_title_bg_color'][ $std_id ]         = '#000000';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '9',
	'letter-spacing' => '',
	'color'          => '#909090',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '9',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'none',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '27px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '27px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '12',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#313131',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '11',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#434343',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Libre Baskerville',
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
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '12',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '12',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '12',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '30',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '16',
	'line_height'    => '26',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '26',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '26',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '11',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '12',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '11',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Libre Baskerville',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '11',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#131313',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '29',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '11',
	'line_height'    => '19',
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
$fields['listing-mix-1-4'][ $std_id ]                = array(
	'big-title-limit'         => '70',
	'big-excerpt'             => '1',
	'big-excerpt-limit'       => '180',
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
			'review'      => '1',
		),
	'small-thumbnail-type'    => 'featured-image',
	'small-title-limit'       => '80',
	'small-excerpt'           => '0',
	'small-excerpt-limit'     => '110',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'after-title',
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
			'review'      => '0',
		),
);
$fields['listing-mix-3-3'][ $std_id ]                = array(
	'big-title-limit'         => '53',
	'big-excerpt'             => '1',
	'big-excerpt-limit'       => '100',
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
	'small-title-limit'       => '50',
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
	'title-limit'       => '75',
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
$fields['listing-blog-1'][ $std_id ]                 = array(
	'title-limit'       => '85',
	'excerpt-limit'     => '190',
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
$fields['listing-blog-3'][ $std_id ]                 = array(
	'title-limit'       => '140',
	'excerpt-limit'     => '530',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'format-icon'       => '1',
	'term-badge'        => '1',
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
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '55',
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
$fields['listing-thumbnail-3'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '67',
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
$fields['listing-text-3'][ $std_id ]                 = array(
	'title-limit'       => '90',
	'excerpt-limit'     => '200',
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
$fields['listing-text-4'][ $std_id ]                 = array(
	'title-limit'       => '65',
	'excerpt-limit'     => '200',
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
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
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
