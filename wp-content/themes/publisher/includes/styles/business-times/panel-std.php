<?php
//
// Custom default values for business-times Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't1-s3';
$fields['layout_style'][ $std_id ]                   = 'boxed';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1080',
	'content' => '69',
	'primary' => '31',
);
$fields['layout-3-col'][ $std_id ]                   = array(
	'width'     => '1100',
	'content'   => '58',
	'primary'   => '25',
	'secondary' => '17',
);
$fields['layout_columns_space'][ $std_id ]           = '20';
$fields['pagination_type'][ $std_id ]                = 'numbered';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['listing-user-1'][ $std_id ]                 = array(
	'title-limit'        => '60',
	'social-icons'       => '0',
	'social-icons-limit' => '',
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
	'small-social-icons-limit' => '',
	'small-show-ranking'       => '',
	'small-show-posts-url'     => '1',
	'small-title-limit'        => '60',
);
$fields['cat_top_posts'][ $std_id ]                  = 'style-2';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_gradient'][ $std_id ]               = 'gr-6';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-17';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-9';
$fields['footer_widgets'][ $std_id ]                 = '3-column';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't3-s1';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['theme_color'][ $std_id ]                    = '#137f39';
$fields['site_bg_color'][ $std_id ]                  = '#ececec';
$fields['topbar_date_bg'][ $std_id ]                 = '#0f662e';
$fields['topbar_date_color'][ $std_id ]              = '#ffffff';
$fields['topbar_text_color'][ $std_id ]              = 'rgba(255,255,255,0.4)';
$fields['topbar_text_hcolor'][ $std_id ]             = '#ffffff';
$fields['topbar_icon_text_color'][ $std_id ]         = 'rgba(255,255,255,0.4)';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#ffffff';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_text_color'][ $std_id ]         = '#ffffff';
$fields['header_menu_text_h_color'][ $std_id ]       = '#ffffff';
$fields['header_menu_bg_color'][ $std_id ]           = '#137f39';
$fields['header_bg_color'][ $std_id ]                = '#137f39';
$fields['footer_copy_bg_color'][ $std_id ]           = '#151515';
$fields['footer_bg_color'][ $std_id ]                = '#151515';
$fields['section_title_color'][ $std_id ]            = '#000000';
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
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_heading_h1'][ $std_id ]                = '22px';
$fields['typo_heading_h2'][ $std_id ]                = '18px';
$fields['typo_heading_h3'][ $std_id ]                = '16px';
$fields['typo_heading_h4'][ $std_id ]                = '14px';
$fields['typo_heading_h5'][ $std_id ]                = '12px';
$fields['typo_heading_h6'][ $std_id ]                = '10px';
$fields['typo_heading_h6_color'][ $std_id ]          = '#2d2d2d';
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '11',
	'letter-spacing' => '',
	'color'          => '#a1a1a1',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '11',
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
	'family'         => 'Libre Franklin',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'none',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '34px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Libre Franklin',
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
	'size'           => '15',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#121212',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '11',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#4d4d4d',
);
$fields['typo_post_summary_single'][ $std_id ]       = array(
	'family'         => 'Libre Baskerville',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '25',
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
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '10',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Libre Franklin',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
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
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'italic',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '27',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '13',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '13',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '20',
	'line_height'    => '30',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '30',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '13',
	'line_height'    => '16',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '18',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '28',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'line_height'    => '24',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '15',
	'line_height'    => '21',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#181818',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '22',
	'letter-spacing' => '0',
);
$fields['typo_widget_section_heading'][ $std_id ]    = array(
	'enable'         => '0',
	'family'         => 'Libre Franklin',
	'variant'        => '600',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '22',
	'letter-spacing' => '0',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Libre Franklin',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '11',
	'line_height'    => '18',
	'letter-spacing' => '',
);
$fields['listing-modern-grid-3'][ $std_id ]          = array(
	'title-limit'      => '80',
	'format-icon'      => '1',
	'term-badge'       => '0',
	'term-badge-count' => '1',
	'term-badge-tax'   => 'category',
	'meta'             =>
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
$fields['listing-mix-1-3'][ $std_id ]                = array(
	'big-title-limit'         => '92',
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
	'small-title-limit'       => '60',
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
$fields['listing-mix-3-3'][ $std_id ]                = array(
	'big-title-limit'         => '92',
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
			'review'      => '1',
		),
	'small-title-limit'       => '93',
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
	'title-limit'       => '92',
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
			'review'      => '1',
		),
);
$fields['listing-blog-1'][ $std_id ]                 = array(
	'title-limit'       => '100',
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
			'author'      => '0',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '0',
			'review'      => '0',
		),
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
	'title-limit'       => '60',
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
$fields['listing-text-3'][ $std_id ]                 = array(
	'title-limit'       => '95',
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
	'title-limit'       => '120',
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
	'title-limit'        => '0',
	'excerpt-limit'      => '350',
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
