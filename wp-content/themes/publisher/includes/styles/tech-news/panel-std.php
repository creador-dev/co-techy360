<?php
//
// Custom default values for tech-news Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]          = 't5-s1';
$fields['layout-2-col'][ $std_id ]                   = array(
	'width'   => '1380',
	'content' => '76',
	'primary' => '24',
);
$fields['layout-3-col'][ $std_id ]                   = array(
	'width'     => '1380',
	'content'   => '56',
	'primary'   => '24',
	'secondary' => '20',
);
$fields['layout_columns_space'][ $std_id ]           = '25';
$fields['sticky_sidebar'][ $std_id ]                 = 'enable';
$fields['post_template'][ $std_id ]                  = 'style-1';
$fields['header_layout'][ $std_id ]                  = 'out-full-width';
$fields['header_style'][ $std_id ]                   = 'style-8';
$fields['resp_scheme'][ $std_id ]                    = 'light';
$fields['resp_bg_style'][ $std_id ]                  = 'color';
$fields['topbar_show_date'][ $std_id ]               = 'hide';
$fields['off_canvas'][ $std_id ]                     = '1';
$fields['off_canvas_position'][ $std_id ]            = 'left';
$fields['social_share_top_style'][ $std_id ]         = 'style-25';
$fields['social_share_bottom_style'][ $std_id ]      = 'style-25';
$fields['footer_layout'][ $std_id ]                  = 'out-full-width';
$fields['footer_widgets_heading_style'][ $std_id ]   = 't1-s1';
$fields['footer_social'][ $std_id ]                  = 'hide';
$fields['injection_after_header'][ $std_id ]         = '32';
$fields['theme_color'][ $std_id ]                    = '#0fc474';
$fields['site_bg_color'][ $std_id ]                  = '#f3f3f3';
$fields['topbar_text_color'][ $std_id ]              = '#878787';
$fields['topbar_text_hcolor'][ $std_id ]             = '#595959';
$fields['topbar_bg_color'][ $std_id ]                = '#f3f3f3';
$fields['topbar_icon_text_color'][ $std_id ]         = '#848484';
$fields['topbar_icon_text_hcolor'][ $std_id ]        = '#6b6b6b';
$fields['header_top_border'][ $std_id ]              = '0';
$fields['header_menu_text_color'][ $std_id ]         = '#000000';
$fields['header_bg_color'][ $std_id ]                = '#ffffff';
$fields['footer_link_color'][ $std_id ]              = 'rgba(255,255,255,0.6)';
$fields['footer_link_hover_color'][ $std_id ]        = '#ffffff';
$fields['footer_menu_bg_color'][ $std_id ]           = '#333333';
$fields['footer_copy_bg_color'][ $std_id ]           = '#1b1b1b';
$fields['footer_bg_color'][ $std_id ]                = '#1b1b1b';
$fields['section_title_color'][ $std_id ]            = '#1b1b1b';
$fields['section_title_bg_color'][ $std_id ]         = '#1b1b1b';
$fields['typo_body'][ $std_id ]                      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '15',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_heading'][ $std_id ]                   = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'letter-spacing' => '',
);
$fields['typo_meta'][ $std_id ]                      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => 'rgba(79,79,79,0.5)',
);
$fields['typo_meta_author'][ $std_id ]               = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                    = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]              = array(
	'family'         => 'Lato',
	'variant'        => '900',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '-.1px',
);
$fields['typo_post_tp1_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp2_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp3_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp4_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp5_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp6_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp7_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp8_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp9_heading'][ $std_id ]          = '41px';
$fields['typo_post_tp10_heading'][ $std_id ]         = '41px';
$fields['typo_post_tp11_heading'][ $std_id ]         = '41px';
$fields['typo_post_tp12_heading'][ $std_id ]         = '41px';
$fields['typo_post_tp13_heading'][ $std_id ]         = '41px';
$fields['typo_post_tp14_heading'][ $std_id ]         = '41px';
$fields['typo_post_subtitle'][ $std_id ]             = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'inherit',
	'size'           => '18',
	'letter-spacing' => '',
);
$fields['typo_entry_content'][ $std_id ]             = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '19',
	'line_height'    => '32',
	'letter-spacing' => '',
	'color'          => '#222222',
);
$fields['typo_post_summary'][ $std_id ]              = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '15',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#898989',
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
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
);
$fields['typ_header_sub_menu'][ $std_id ]            = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]               = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '11',
	'letter-spacing' => '',
);
$fields['typo_topbar_sub_menu'][ $std_id ]           = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '13',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]               = array(
	'family'         => 'Lato',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_archive_title'][ $std_id ]             = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#383838',
);
$fields['typo_blocks_subtitle'][ $std_id ]           = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#565656',
);
$fields['typo_listing_classic_1_title'][ $std_id ]   = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '31',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_classic_2_title'][ $std_id ]   = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '31',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_classic_3_title'][ $std_id ]   = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'line_height'    => '31',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_mg_1_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '37',
	'letter-spacing' => '-.1px',
	'color'          => '#ffffff',
);
$fields['typo_mg_2_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '37',
	'letter-spacing' => '-.1px',
	'color'          => '#ffffff',
);
$fields['typo_mg_3_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '900',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_4_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '900',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '16',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_big'][ $std_id ]            = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '20',
	'letter-spacing' => '',
);
$fields['typo_mg_5_title_small'][ $std_id ]          = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '15',
	'letter-spacing' => '',
);
$fields['typo_mg_6_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '32',
	'letter-spacing' => '-.1px',
	'color'          => '#ffffff',
);
$fields['typo_mg_7_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_8_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '25',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_9_title'][ $std_id ]                = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_mg_10_title'][ $std_id ]               = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '24',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_listing_grid_1_title'][ $std_id ]      = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_grid_2_title'][ $std_id ]      = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '19',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_tall_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_tall_2_title'][ $std_id ]      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_slider_1_title'][ $std_id ]    = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '28',
	'line_height'    => '34',
	'letter-spacing' => '',
);
$fields['typo_listing_slider_2_title'][ $std_id ]    = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '27',
	'line_height'    => '33',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_slider_3_title'][ $std_id ]    = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '27',
	'line_height'    => '33',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_box_1_title'][ $std_id ]       = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '23',
	'line_height'    => '29',
	'letter-spacing' => '',
);
$fields['typo_listing_box_2_title'][ $std_id ]       = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '21',
	'line_height'    => '26',
	'letter-spacing' => '',
);
$fields['typo_listing_box_3_title'][ $std_id ]       = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'line_height'    => '26',
	'letter-spacing' => '',
);
$fields['typo_listing_box_4_title'][ $std_id ]       = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '21',
	'line_height'    => '26',
	'letter-spacing' => '',
);
$fields['typo_listing_blog_1_title'][ $std_id ]      = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '22',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_blog_5_title'][ $std_id ]      = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '22',
	'line_height'    => '29',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_listing_thumbnail_1_title'][ $std_id ] = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#222222',
);
$fields['typo_listing_thumbnail_2_title'][ $std_id ] = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'none',
	'size'           => '16',
	'line_height'    => '20',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_text_listing_1_title'][ $std_id ]      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'center',
	'transform'      => 'capitalize',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#010101',
);
$fields['typo_text_listing_2_title'][ $std_id ]      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#222222',
);
$fields['typo_text_listing_3_title'][ $std_id ]      = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '14',
	'line_height'    => '18',
	'letter-spacing' => '',
	'color'          => '#222222',
);
$fields['typo_section_heading'][ $std_id ]           = array(
	'family'         => 'Lato',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '17',
	'line_height'    => '22',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]               = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '40',
	'letter-spacing' => '-.2px',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]               = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '14',
	'line_height'    => '18',
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
			'review'      => '1',
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
	'big-title-limit'         => '55',
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
	'small-thumbnail-type'    => 'featured-image',
	'small-title-limit'       => '70',
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
			'review'      => '1',
		),
);
$fields['listing-blog-2'][ $std_id ]                 = array(
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
$fields['listing-blog-4'][ $std_id ]                 = array(
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
			'review'      => '1',
		),
);
$fields['listing-blog-5'][ $std_id ]                 = array(
	'title-limit'       => '100',
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
	'title-limit'       => '40',
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
$fields['listing-thumbnail-2'][ $std_id ]            = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '65',
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
$fields['listing-text-2'][ $std_id ]                 = array(
	'title-limit'       => '70',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '0',
			'date'        => '0',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '0',
		),
);
$fields['listing-text-3'][ $std_id ]                 = array(
	'title-limit'       => '120',
	'excerpt-limit'     => '200',
	'subtitle'          => '0',
	'subtitle-limit'    => '0',
	'subtitle-location' => 'before-meta',
	'show-ranking'      => '',
	'meta'              =>
		array(
			'show'        => '1',
			'author'      => '0',
			'date'        => '0',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
);
