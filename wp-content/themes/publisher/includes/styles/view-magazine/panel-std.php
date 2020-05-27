<?php
//
// Custom default values for view-magazine Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't4-s5';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1280',
	'content' => '68',
	'primary' => '32',
);
$fields['layout_columns_space'][ $std_id ]           = '40';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['inline_related_posts_status'][ $std_id ]    = 'show';
$fields['cat_listing'][ $std_id ]                    = 'blog-5';
$fields['header_layout'][ $std_id ]                  = 'full-width';
$fields['header_style'][ $std_id ]                   = 'style-6';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_style'][ $std_id ]                   = 'hidden';
$fields['off_canvas'][ $std_id ]                     = '1';
$fields['off_canvas_desc'][ $std_id ]                = 'Ultimate magazine theme for WordPress.';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-3';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-3';
$fields['breadcrumb'][ $std_id ]                     = 'hide';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't5-s1';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['injection_after_header'][ $std_id ]         = '45';
$fields['theme_color'][ $std_id ]                    = '#ee009d';
$fields['header_top_border_color'][ $std_id ]        = '#ee009d';
$fields['header_menu_text_color'][ $std_id ]         = '#000000';
$fields['header_menu_text_h_color'][ $std_id ]       = '#000000';
$fields['footer_link_color'][ $std_id ]              = 'rgba(255,255,255,0.35)';
$fields['footer_line_top_color'][ $std_id ]          = '#ee009d';
$fields['footer_copy_bg_color'][ $std_id ]           = '#0e1335';
$fields['footer_bg_color'][ $std_id ]                = '#111847';
$fields['section_title_bg_color'][ $std_id ]         = '#dd3333';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Raleway',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#959595',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '9',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '-2px',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '42px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Questrial',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '19',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#262626',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Raleway',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#6a6a6a',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Poppins',
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
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Poppins',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]         = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#0a0a0a',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Poppins',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#0a0a0a',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '23',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '30',
	'letter-spacing' => '-1.1px',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '-0.5px',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'line_height'    => '28',
	'letter-spacing' => '-0.7px',
	'color'          => '#000000',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'line_height'    => '30',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#0a0a0a',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#0a0a0a',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '20',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '21',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#0a0a0a',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'line_height'    => '31',
	'letter-spacing' => '-0.6px',
	'color'          => '#000000',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '-0.3px',
	'color'          => '#000000',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#000000',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Poppins',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '23',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Poppins',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Poppins',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '13',
	'line_height'    => '23',
	'letter-spacing' => '',
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
			'comment'     => '0',
			'review'      => '1',
		),
);
$fields['listing-mix-3-1'][ $std_id ]                = array(
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
			'review'      => '1',
		),
);
$fields['listing-mix-3-4'][ $std_id ]                = array(
	'big-title-limit'         => '60',
	'big-format-icon'         => '1',
	'big-term-badge'          => '1',
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
	'title-limit'       => '55',
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
			'comment'     => '0',
			'review'      => '0',
		),
);
$fields['listing-blog-5'][ $std_id ]                 = array(
	'title-limit'       => '100',
	'excerpt-limit'     => '240',
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
	'read-more'         => '0',
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
	'title-limit'       => '70',
	'excerpt-limit'     => '200',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '1',
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
