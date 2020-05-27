<?php
//
// Custom default values for crypto-news Demo
// 


$std_id = $this->get_std_id();


$fields['section_heading_style'][ $std_id ]         = 't1-s8';
$fields['layout_style'][ $std_id ]                  = 'boxed';
$fields['layout-2-col'][ $std_id ]                  = array(
	'width'   => '1150',
	'content' => '69',
	'primary' => '31',
);
$fields['layout_columns_space'][ $std_id ]          = '30';
$fields['pagination_type'][ $std_id ]               = 'numbered';
$fields['sticky_sidebar'][ $std_id ]                = 'enable';
$fields['post_template'][ $std_id ]                 = 'style-1';
$fields['inline_related_posts_status'][ $std_id ]   = 'show';
$fields['header_layout'][ $std_id ]                 = 'out-full-width';
$fields['resp_bg_style'][ $std_id ]                 = 'color';
$fields['topbar_show_login'][ $std_id ]             = 'hide';
$fields['header_top_padding'][ $std_id ]            = '18';
$fields['header_bottom_padding'][ $std_id ]         = '17';
$fields['off_canvas_position'][ $std_id ]           = 'left';
$fields['footer_layout'][ $std_id ]                 = 'out-full-width';
$fields['footer_widgets'][ $std_id ]                = '3-column';
$fields['footer_widgets_heading_style'][ $std_id ]  = 't1-s8';
$fields['footer_social'][ $std_id ]                 = 'hide';
$fields['theme_color'][ $std_id ]                   = '#ffc536';
$fields['topbar_date_bg'][ $std_id ]                = 'rgba(10,10,10,0)';
$fields['topbar_text_color'][ $std_id ]             = '#626d73';
$fields['topbar_text_hcolor'][ $std_id ]            = '#ffc536';
$fields['topbar_bg_color'][ $std_id ]               = '#151616';
$fields['topbar_border_color'][ $std_id ]           = 'rgba(239,239,239,0)';
$fields['topbar_icon_text_color'][ $std_id ]        = '#626d73';
$fields['topbar_icon_text_hcolor'][ $std_id ]       = '#ffc536';
$fields['header_top_border'][ $std_id ]             = '0';
$fields['header_menu_btop_color'][ $std_id ]        = 'rgba(222,222,222,0)';
$fields['header_menu_st2_bbottom_color'][ $std_id ] = 'rgba(222,222,222,0)';
$fields['header_menu_text_color'][ $std_id ]        = '#222222';
$fields['header_menu_text_h_color'][ $std_id ]      = '#000000';
$fields['header_menu_bg_color'][ $std_id ]          = '#ffc536';
$fields['header_bg_color'][ $std_id ]               = '#1b2228';
$fields['footer_link_hover_color'][ $std_id ]       = '#ffc536';
$fields['footer_copy_bg_color'][ $std_id ]          = '#151a1e';
$fields['footer_bg_color'][ $std_id ]               = '';
$fields['section_title_color'][ $std_id ]           = '#1a1a1a';
$fields['section_title_bg_color'][ $std_id ]        = '#ffc536';
$fields['typo_body'][ $std_id ]                     = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'inherit',
	'size'           => '13',
	'letter-spacing' => '',
	'color'          => '#7b7b7b',
);
$fields['typo_meta'][ $std_id ]                     = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '12',
	'letter-spacing' => '',
	'color'          => '#aeaeae',
);
$fields['typo_meta_author'][ $std_id ]              = array(
	'family'         => 'Roboto Condensed',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'size'           => '12',
	'letter-spacing' => '',
);
$fields['typo_badges'][ $std_id ]                   = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);
$fields['typo_post_heading'][ $std_id ]             = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'transform'      => 'capitalize',
	'letter-spacing' => '',
);
$fields['typo_post_tp1_heading'][ $std_id ]         = '28px';
$fields['typo_entry_content'][ $std_id ]            = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '16',
	'line_height'    => '25',
	'letter-spacing' => '',
	'color'          => '#4e4e4e',
);
$fields['typo_post_summary'][ $std_id ]             = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '13',
	'line_height'    => '19',
	'letter-spacing' => '',
	'color'          => '#888888',
);
$fields['typo_post_summary_single'][ $std_id ]      = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'initial',
	'size'           => '16',
	'line_height'    => '22',
	'letter-spacing' => '',
);
$fields['typ_header_logo'][ $std_id ]               = array(
	'enable'         => '0',
	'family'         => 'Helvetica',
	'variant'        => '700',
	'subset'         => 'unknown',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '30',
	'letter-spacing' => '',
);
$fields['typ_header_menu'][ $std_id ]               = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_topbar_menu'][ $std_id ]              = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);
$fields['typo_topbar_date'][ $std_id ]              = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '11',
	'letter-spacing' => '',
);
$fields['typo_archive_title_pre'][ $std_id ]        = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '14',
	'letter-spacing' => '',
);
$fields['typo_listing_grid_1_title'][ $std_id ]     = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '17',
	'line_height'    => '23',
	'letter-spacing' => '',
	'color'          => '#222222',
);
$fields['typo_listing_slider_1_title'][ $std_id ]   = array(
	'family'         => 'Roboto',
	'variant'        => '700',
	'subset'         => 'latin',
	'align'          => 'inherit',
	'transform'      => 'capitalize',
	'size'           => '30',
	'line_height'    => '34',
	'letter-spacing' => '-1px',
);
$fields['typo_section_heading'][ $std_id ]          = array(
	'family'         => 'Roboto',
	'variant'        => '500',
	'subset'         => 'latin',
	'transform'      => 'none',
	'size'           => '19',
	'line_height'    => '22',
	'letter-spacing' => '',
);
$fields['typo_footer_menu'][ $std_id ]              = array(
	'family'         => 'Roboto Condensed',
	'variant'        => '700',
	'subset'         => 'latin',
	'transform'      => 'uppercase',
	'size'           => '14',
	'line_height'    => '28',
	'letter-spacing' => '',
	'color'          => '#ffffff',
);
$fields['typo_footer_copy'][ $std_id ]              = array(
	'family'         => 'Roboto',
	'variant'        => 'regular',
	'subset'         => 'latin',
	'size'           => '13',
	'line_height'    => '18',
	'letter-spacing' => '',
);
$fields['listing-mix-1-2'][ $std_id ]               = array(
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
$fields['listing-mix-3-3'][ $std_id ]               = array(
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
			'show'        => '0',
			'author'      => '1',
			'date'        => '1',
			'date-format' => 'standard',
			'view'        => '0',
			'share'       => '0',
			'comment'     => '1',
			'review'      => '1',
		),
	'small-title-limit'       => '55',
	'small-subtitle'          => '0',
	'small-subtitle-limit'    => '0',
	'small-subtitle-location' => 'before-meta',
	'small-meta'              =>
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
$fields['listing-mix-4-5'][ $std_id ]               = array(
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
$fields['listing-grid-1'][ $std_id ]                = array(
	'title-limit'       => '90',
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
			'comment'     => '1',
			'review'      => '1',
		),
);
$fields['listing-blog-1'][ $std_id ]                = array(
	'title-limit'       => '90',
	'excerpt-limit'     => '165',
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
$fields['listing-thumbnail-1'][ $std_id ]           = array(
	'thumbnail-type'    => 'featured-image',
	'title-limit'       => '52',
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
			'review'      => '0',
		),
);
$fields['listing-text-1'][ $std_id ]                = array(
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
$fields['listing-bs-slider-1'][ $std_id ]           = array(
	'title-limit'       => '75',
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
