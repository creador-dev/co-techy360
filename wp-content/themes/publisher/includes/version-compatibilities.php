<?php


/**
 * Compatibility for versions before 1.1
 *
 * @return bool
 */
function publisher_version_1_1_compatibility() {

	$sidebars = wp_get_sidebars_widgets();

	$widgets_in_sidebar = array();

	foreach ( $sidebars['aside-logo'] as $widget_numbers ) {
		if ( preg_match( "/^(.*?)\-(\d.*)+/i", $widget_numbers, $match ) ) {

			$widget_id_base = &$match[1];
			$widget_number  = &$match[2];

			$widgets_in_sidebar[ $widget_id_base ][] = $widget_number;
		}
	}

	foreach ( $widgets_in_sidebar as $id_base => $widget_numbers ) {

		if ( $id_base != 'better-ads' ) {
			continue;
		}

		$option_name = "widget_$id_base";

		$option = get_option( $option_name );

		if ( $option && is_array( $option ) ) {

			$ads_manager = get_option( 'better_ads_manager' );

			$fields = array(
				'type',
				'banner',
				'campaign',
				'count',
				'columns',
				'orderby',
				'order',
				'align',
			);

			foreach ( $fields as $id ) {
				if ( ! empty( $option[ $widget_numbers[0] ][ $id ] ) ) {
					$ads_manager[ 'header_aside_logo_' . $id ] = $option[ $widget_numbers[0] ][ $id ];
				}
			}

			update_option( 'better_ads_manager', $ads_manager );

			break; // only first ads widget

		}
	}

	return true;
}


/**
 * Compatibility for versions before 1.4
 *
 * @return bool
 */
function publisher_version_1_4_compatibility() {

	$option = get_option( publisher_get_theme_panel_id() );

	$option['post-page-settings']['meta']['review']    = 1;
	$option['listing-modern-grid-1']['meta']['review'] = 1;
	$option['listing-modern-grid-2']['meta']['review'] = 1;
	$option['listing-modern-grid-3']['meta']['review'] = 1;
	$option['listing-modern-grid-4']['meta']['review'] = 1;
	$option['listing-modern-grid-5']['meta']['review'] = 1;
	$option['listing-modern-grid-6']['meta']['review'] = 1;
	$option['listing-mix-1-1']['meta']['review']       = 1;
	$option['listing-mix-1-2']['meta']['review']       = 1;
	$option['listing-mix-1-3']['meta']['review']       = 1;
	$option['listing-mix-1-4']['meta']['review']       = 1;
	$option['listing-mix-2-1']['meta']['review']       = 1;
	$option['listing-mix-2-2']['meta']['review']       = 1;
	$option['listing-mix-3-1']['meta']['review']       = 1;
	$option['listing-mix-3-2']['meta']['review']       = 1;
	$option['listing-mix-3-3']['meta']['review']       = 1;
	$option['listing-mix-3-4']['meta']['review']       = 1;
	$option['listing-mix-4-1']['meta']['review']       = 1;
	$option['listing-mix-4-2']['meta']['review']       = 1;
	$option['listing-mix-4-3']['meta']['review']       = 1;
	$option['listing-mix-4-4']['meta']['review']       = 1;
	$option['listing-mix-4-5']['meta']['review']       = 1;
	$option['listing-mix-4-6']['meta']['review']       = 1;
	$option['listing-mix-4-7']['meta']['review']       = 1;
	$option['listing-mix-4-8']['meta']['review']       = 1;
	$option['listing-grid-1']['meta']['review']        = 1;
	$option['listing-grid-2']['meta']['review']        = 1;
	$option['listing-blog-1']['meta']['review']        = 1;
	$option['listing-blog-2']['meta']['review']        = 1;
	$option['listing-blog-3']['meta']['review']        = 1;
	$option['listing-blog-4']['meta']['review']        = 1;
	$option['listing-blog-5']['meta']['review']        = 1;
	$option['listing-thumbnail-1']['meta']['review']   = 1;
	$option['listing-thumbnail-2']['meta']['review']   = 1;
	$option['listing-thumbnail-3']['meta']['review']   = 1;
	$option['listing-text-1']['meta']['review']        = 1;
	$option['listing-text-2']['meta']['review']        = 1;
	$option['listing-classic-1']['meta']['review']     = 1;
	$option['listing-classic-2']['meta']['review']     = 1;
	$option['listing-classic-3']['meta']['review']     = 1;
	$option['listing-tall-1']['meta']['review']        = 1;
	$option['listing-tall-2']['meta']['review']        = 1;

	update_option( publisher_get_theme_panel_id(), $option );

	return true;
}

/**
 * Compatibility for versions before 1.5
 *
 * @return bool
 */
function publisher_version_1_5_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$option = get_option( publisher_get_theme_panel_id() );

	$keys = array(
		'post-page-settings'    => array(
			'format-icon' => 1,
			'term-count'  => 3,
			'tag'         => 1,
			'tag-count'   => 10,
		),
		'listing-modern-grid-1' => array(
			'term-badge-count' => 1,
		),
		'listing-modern-grid-2' => array(
			'term-badge-count' => 1,
		),
		'listing-modern-grid-3' => array(
			'term-badge-count' => 1,
		),
		'listing-modern-grid-4' => array(
			'term-badge-count' => 1,
		),
		'listing-modern-grid-5' => array(
			'term-badge-count' => 1,
		),
		'listing-modern-grid-6' => array(
			'term-badge-count' => 1,
		),
		'listing-mix-1-1'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-1-2'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-1-3'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-1-4'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-2-1'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-2-2'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-3-1'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-3-2'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-3-3'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-3-4'       => array(
			'big-term-badge-count' => 1,
		),
		'listing-mix-4-1'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-2'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-3'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-4'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-5'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-6'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-7'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-mix-4-8'       => array(
			'big-term-badge-count'   => 1,
			'small-term-badge-count' => 1,
		),
		'listing-grid-1'        => array(
			'term-badge-count' => 1,
		),
		'listing-grid-2'        => array(
			'term-badge-count' => 1,
		),
		'listing-blog-1'        => array(
			'term-badge-count' => 1,
		),
		'listing-blog-2'        => array(
			'term-badge-count' => 1,
		),
		'listing-blog-3'        => array(
			'term-badge-count' => 1,
		),
		'listing-blog-4'        => array(
			'term-badge-count' => 1,
		),
		'listing-blog-5'        => array(
			'term-badge-count' => 1,
		),
		'listing-thumbnail-2'   => array(
			'term-badge-count' => 1,
		),
		'listing-text-1'        => array(
			'term-badge-count' => 1,
		),
		'listing-classic-1'     => array(
			'term-badge-count' => 1,
		),
		'listing-classic-2'     => array(
			'term-badge-count' => 1,
		),
		'listing-classic-3'     => array(
			'term-badge-count' => 1,
		),
		'listing-tall-1'        => array(
			'term-badge-count' => 1,
		),
		'listing-tall-2'        => array(
			'term-badge-count' => 1,
		),
		'blocks-related-posts'  => array(
			'term-badge-count' => 1,
		),
		'blocks-mega-menu'      => array(
			'term-badge-count' => 1,
		),
	);

	foreach ( $keys as $field_id => $elements ) {
		if ( ! isset( $option[ $field_id ] ) ) {
			$option[ $field_id ] = $fields[ $field_id ]['std'];
		} else {
			foreach ( (array) $elements as $el => $vl ) {
				$option[ $field_id ][ $el ] = $vl;
			}
		}
	}

	update_option( publisher_get_theme_panel_id(), $option );

	return true;
}


/**
 * Compatibility for versions before 1.6.0
 *
 * @return bool
 */
function publisher_version_1_6_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$demo = publisher_get_style() . '-' . publisher_get_demo_id();

	$std_id = 'std-' . publisher_get_style();

	$option = get_option( publisher_get_theme_panel_id() );

	/**
	 * Merge all block options with std values
	 */
	$blocks = array(
		'listing-modern-grid-1',
		'listing-modern-grid-2',
		'listing-modern-grid-3',
		'listing-modern-grid-4',
		'listing-modern-grid-5',
		'listing-modern-grid-6',
		'listing-modern-grid-7',
		'listing-modern-grid-8',
		'listing-modern-grid-9',
		'listing-modern-grid-10',
		'listing-mix-1-1',
		'listing-mix-1-2',
		'listing-mix-1-3',
		'listing-mix-1-4',
		'listing-mix-2-1',
		'listing-mix-2-2',
		'listing-mix-3-1',
		'listing-mix-3-2',
		'listing-mix-3-3',
		'listing-mix-3-4',
		'listing-mix-4-1',
		'listing-mix-4-2',
		'listing-mix-4-3',
		'listing-mix-4-4',
		'listing-mix-4-5',
		'listing-mix-4-6',
		'listing-mix-4-7',
		'listing-mix-4-8',
		'listing-grid-1',
		'listing-grid-2',
		'listing-blog-1',
		'listing-blog-2',
		'listing-blog-3',
		'listing-blog-4',
		'listing-blog-5',
		'listing-thumbnail-1',
		'listing-thumbnail-2',
		'listing-thumbnail-3',
		'listing-text-1',
		'listing-text-2',
		'listing-classic-1',
		'listing-classic-2',
		'listing-classic-3',
		'listing-tall-1',
		'listing-tall-2',
		'blocks-related-posts',
		'blocks-mega-menu',
	);

	foreach ( $blocks as $id ) {
		if ( isset( $option[ $id ] ) ) {
			if ( isset( $fields[ $id ][ $std_id ] ) ) {
				$option[ $id ] = bf_array_replace_recursive( $fields[ $id ][ $std_id ], $option[ $id ] );
			} else {
				$option[ $id ] = bf_array_replace_recursive( $fields[ $id ]['std'], $option[ $id ] );
			}
		}
	}

	// Section heading typo
	if ( isset( $option['typo_section_heading'] ) ) {

		// clean mag
		if ( $demo == 'clean-magazine' && $option['typo_section_heading']['family'] == 'Roboto' ) {
			$option['typo_section_heading']['size']        = 20;
			$option['typo_section_heading']['line_height'] = 22;
			$option['typo_section_heading']['variant']     = '500';
			$option['typo_section_heading']['transform']   = 'capitalize';
		} // clean blog
		elseif ( $demo == 'clean-blog' && $option['typo_section_heading']['family'] == 'Noto Sans' && $option['typo_section_heading']['size'] == '13' && $option['typo_section_heading']['variant'] == 'regular' ) {
			$option['typo_section_heading']['size']        = 14;
			$option['typo_section_heading']['variant']     = '700';
			$option['typo_section_heading']['line_height'] = '30';
		} // clean video
		elseif ( $demo == 'clean-video' && $option['typo_section_heading']['family'] == 'Noto Sans' && $option['typo_section_heading']['size'] == '12' && $option['typo_section_heading']['variant'] == '700' ) {
			$option['typo_section_heading']['size']        = 16;
			$option['typo_section_heading']['line_height'] = '30';
		}

	} else {
		if ( isset( $fields['typo_section_heading'][ $std_id ] ) ) {
			$option['typo_section_heading'] = $fields['typo_section_heading'][ $std_id ];
		} else {
			$option['typo_section_heading'] = $fields['typo_section_heading']['std'];
		}
	}


	// Widget heading typo
	if ( isset( $option['typo_widget_title'] ) ) {

		// clean mag
		if ( $demo == 'clean-magazine' && $option['typo_widget_title']['family'] == 'Roboto' ) {
			$option['typo_widget_title']['size']        = 20;
			$option['typo_widget_title']['line_height'] = 22;
			$option['typo_widget_title']['variant']     = '500';
			$option['typo_widget_title']['transform']   = 'capitalize';
		} // clean blog
		elseif ( $option['typo_widget_title']['family'] == 'Noto Sans' && $option['typo_widget_title']['size'] == '13' && $option['typo_widget_title']['variant'] == 'regular' ) {
			$option['typo_widget_title']['size']        = 14;
			$option['typo_widget_title']['variant']     = '700';
			$option['typo_widget_title']['line_height'] = '30';
		} // clean video
		elseif ( $option['typo_widget_title']['family'] == 'Noto Sans' && $option['typo_widget_title']['size'] == '12' && $option['typo_widget_title']['variant'] == '700' ) {
			$option['typo_widget_title']['size']        = 16;
			$option['typo_widget_title']['line_height'] = '30';
		}

	} else {
		if ( isset( $fields['typo_widget_title'][ $std_id ] ) ) {
			$option['typo_widget_title'] = $fields['typo_widget_title'][ $std_id ];
		} else {
			$option['typo_widget_title'] = $fields['typo_widget_title']['std'];
		}
	}


	// Clean Magazine section heading colors
	if ( $demo == 'clean-magazine' ) {
		if ( $option['section_title_bg_color'] === '#444444' ) {
			$option['section_title_bg_color'] = 'rgba(0, 0, 0, 0.08)';
		}

		if ( $option['section_title_color'] === '#ffffff' ) {
			$option['section_title_color'] = '#444444';
		}

		if ( $option['widget_title_bg_color'] === '#0080ce' ) {
			$option['widget_title_bg_color'] = 'rgba(0, 0, 0, 0.08)';
		} elseif ( $option['widget_title_bg_color'] == $option['theme_color'] ) {
			$option['widget_title_bg_color'] = 'rgba(0, 0, 0, 0.08)';
			$option['widget_title_color']    = $option['theme_color'];
		}

		if ( $option['widget_title_color'] === '#ffffff' ) {
			$option['widget_title_color'] = '#444444';
		}

		if ( $option['typ_header_menu']['family'] == 'Roboto' && $option['typ_header_menu']['size'] == '15' ) {
			$option['typ_header_menu']['size']      = '16';
			$option['typ_header_menu']['transform'] = 'capitalize';
		}

	} elseif ( $demo == 'clean-blog' || $demo == 'clean-video' ) {

		if ( $option['section_title_color'] === '#ffffff' ) {
			$option['section_title_color'] = $option['section_title_bg_color'];
		}

		if ( $option['widget_title_color'] === '#ffffff' ) {
			$option['widget_title_color'] = $option['widget_title_bg_color'];
		}
	}


	// Resets new elements typo settings to relevant elements that is changed before
	// it's done because if user is selected new typo the new elements typo should be same as the user customization.
	$typo_keys = array(
		'typo_mg_7_title'  => 'typo_mg_1_title',
		'typo_mg_8_title'  => 'typo_mg_1_title',
		'typo_mg_9_title'  => 'typo_mg_2_title',
		'typo_mg_10_title' => 'typo_mg_2_title',
	);

	foreach ( $typo_keys as $field_id => $fallback_field ) {
		if ( isset( $option[ $fallback_field ] ) ) {
			$option[ $field_id ] = $option[ $fallback_field ];;
		} else {
			$option[ $field_id ] = $fields[ $field_id ]['std'];
		}
	}


	unset( $fields );
	update_option( publisher_get_theme_panel_id(), $option );

	return true;
}


/**
 * Compatibility for versions before 1.7.0
 *
 * @return bool
 */
function publisher_version_1_7_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}


	//
	// Styles new structure migration (with support of multilingual)
	//
	{
		// current lang style or default none lang
		$raw_style = get_option( $theme_panel_id . '_current_style' );
		$raw_demo  = get_option( $theme_panel_id . '_current_demo' );

		if ( empty( $raw_demo ) ) {
			$raw_demo = 'magazine';
		} else {
			if ( $raw_style === 'pure' ) {
				if ( $raw_demo != 'magazine' ) {
					$raw_demo = 'magazine';
				}
			} elseif ( $raw_style === 'classic' ) {
				if ( $raw_demo != 'magazine' && $raw_demo != 'blog' ) {
					$raw_demo = 'magazine';
				}
			}
		}

		$full_style = $raw_style . '-' . $raw_demo;

		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {

				// update style and demo id for global lang (En)
				update_option( $theme_panel_id . '_current_style', $full_style );
				update_option( $theme_panel_id . '_current_demo', $full_style );
				continue;

			} else {
				$_lang = '_' . $lang['id'];
			}

			$_raw_style = get_option( $theme_panel_id . $_lang . '_current_style' );
			$_raw_demo  = get_option( $theme_panel_id . $_lang . '_current_demo' );

			if ( empty( $raw_demo ) ) {
				$_raw_demo = 'magazine';
			} else {

				if ( $_raw_style === 'pure' ) {
					if ( $_raw_demo != 'magazine' ) {
						$_raw_demo = 'magazine';
					}
				} elseif ( $_raw_style === 'classic' ) {
					if ( $_raw_demo != 'magazine' && $_raw_demo != 'blog' ) {
						$_raw_demo = 'magazine';
					}
				}
			}

			$_full_style = $_raw_style . '-' . $_raw_demo;

			$_check = array(
				'default-'                      => 'clean-magazine',
				'clean-clean-magazine'          => 'clean-magazine',
				'clean-magazine-magazine'       => 'clean-magazine',
				'clean-magazine-clean-magazine' => 'clean-magazine',
				'classic-classic-magazine'      => 'classic-magazine',
				'classic-magazine-magazine'     => 'classic-magazine',
				'pure-pure-magazine'            => 'pure-magazine',
				'pure-magazine-magazine'        => 'pure-magazine',
			);

			if ( isset( $_check[ $_full_style ] ) ) {
				$_full_style = $_check[ $_full_style ];
			}

			update_option( $theme_panel_id . $_lang . '_current_style', $_full_style );
			update_option( $theme_panel_id . $_lang . '_current_demo', $_full_style );
		}

	} // style migration


	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';

				$style = $demo = get_option( $theme_panel_id . '_current_style' );

			} else {
				$_lang = '_' . $lang['id'];
				$style = $demo = get_option( $theme_panel_id . $_lang . '_current_style' );
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// update panel style field
				$option['style'] = $style;

				// avatar
				if ( isset( $option['post-page-settings'] ) ) {
					$option['post-page-settings']['meta']['author_avatar'] = 1;
				} else {
					$option['post-page-settings'] = $fields['post-page-settings']['std'];
				}

				// Text listing 3 and 4 typo
				if ( isset( $option['typo_text_listing_1_title'] ) ) {
					$_typo          = $option['typo_text_listing_1_title'];
					$_typo['align'] = 'inherit';

					$_check = array(
						'pure-magazine' => 'pure-magazine',
						'clean-tech'    => 'clean-tech',
					);

					if ( isset( $_check[ $style ] ) ) {
						$_typo['size']        -= 1;
						$_typo['line_height'] -= 2;
					}

					$option['typo_text_listing_3_title'] = $option['typo_text_listing_4_title'] = $_typo;
				}


				// Custom site width
				if ( isset( $option['site_box_width'] ) && strpos( $option['site_box_width'], 'px' ) ) {
					$option['layout-2-col'] = array(
						'width'   => str_replace( 'px', '', $option['site_box_width'] ),
						'content' => 67,
						'primary' => 33,
					);
				}

				// Columns gap fix
				if ( $style === 'clean-tech' ) {
					$option['layout_columns_space'] = '18';
				} elseif ( $style == 'clean-design' ) {
					$option['layout_columns_space'] = '16';
				}

				// Site Width size
				if ( $style === 'classic-blog' || $style === 'clean-blog' ) {
					$option['layout-2-col'] = array(
						'width'   => 1040,
						'content' => 67,
						'primary' => 33,
					);
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );

	return true;
}


/**
 * Compatibility for versions before 1.7.1
 *
 * @return bool
 */
function publisher_version_1_7_1_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// share sites
				if ( isset( $option['social_share_sites'] ) ) {
					$option['social_share_sites']['line']  = false;
					$option['social_share_sites']['bbm']   = false;
					$option['social_share_sites']['viber'] = false;
				} else {
					$option['social_share_sites'] = $fields['social_share_sites']['std'];
				}


			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );

	return true;
}


/**
 * Compatibility for versions before 1.7.5
 *
 * @return bool
 */
function publisher_version_1_7_5_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// date type
				if ( isset( $option['post-page-settings'] ) ) {
					$option['post-page-settings']['meta']['date_type'] = 'one';
				} else {
					$option['post-page-settings'] = $fields['post-page-settings']['std'];
				}


			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );

	return true;
}


/**
 * Compatibility for versions before 1.8.0
 *
 * @return bool
 */
function publisher_version_1_8_0_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// All fields that have to merged for new keys
				$keys = array(
					// Blocks fields
					'listing-modern-grid-1',
					'listing-modern-grid-2',
					'listing-modern-grid-3',
					'listing-modern-grid-4',
					'listing-modern-grid-5',
					'listing-modern-grid-6',
					'listing-modern-grid-7',
					'listing-modern-grid-8',
					'listing-modern-grid-9',
					'listing-modern-grid-10',
					'listing-mix-1-1',
					'listing-mix-1-2',
					'listing-mix-1-3',
					'listing-mix-1-4',
					'listing-mix-2-1',
					'listing-mix-2-2',
					'listing-mix-3-1',
					'listing-mix-3-2',
					'listing-mix-3-3',
					'listing-mix-3-4',
					'listing-mix-4-1',
					'listing-mix-4-2',
					'listing-mix-4-3',
					'listing-mix-4-4',
					'listing-mix-4-5',
					'listing-mix-4-6',
					'listing-mix-4-7',
					'listing-mix-4-8',
					'listing-grid-1',
					'listing-grid-2',
					'listing-blog-1',
					'listing-blog-2',
					'listing-blog-3',
					'listing-blog-4',
					'listing-blog-5',
					'listing-thumbnail-1',
					'listing-thumbnail-2',
					'listing-thumbnail-3',
					'listing-text-1',
					'listing-text-2',
					'listing-text-3',
					'listing-text-4',
					'listing-classic-1',
					'listing-classic-2',
					'listing-classic-3',
					'listing-tall-1',
					'listing-tall-2',
					'blocks-related-posts',
					'blocks-mega-menu',
					// post page settings
					'post-page-settings',
					// Typo
					'typo_text_listing_1_title',
					'typo_text_listing_2_title',
					'typo_text_listing_3_title',
				);

				// Save new changes into saved data
				foreach ( $keys as $field_id ) {
					if ( ! isset( $option[ $field_id ] ) ) {
						$option[ $field_id ] = $fields[ $field_id ]['std'];
					} else {
						$option[ $field_id ] = array_replace_recursive( $fields[ $field_id ]['std'], $option[ $field_id ] );
					}
				}


				// New single summary
				if ( ! isset( $option['typo_post_summary_single'] ) && isset( $option['typo_post_summary'] ) ) {

					$summary = $option['typo_post_summary'];

					unset( $summary['color'] );
					$summary['size']        = intval( $summary['size'] ) + 2;
					$summary['line_height'] = intval( $summary['line_height'] ) + 3;

					$option['typo_post_summary_single'] = $summary;
					unset( $summary );
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );


	//
	// Convert Custom User Avatar URL to Attachment ID
	//

	$users = get_users( array(
		'meta_key'     => 'avatar',
		'meta_compare' => '!=',
		'meta_value'   => ' ',
		'number'       => 10,
		'fields'       => 'ID'
	) );

	foreach ( $users as $user_id ) {

		$avatar_url = get_user_meta( $user_id, 'avatar', true );

		if ( filter_var( $avatar_url, FILTER_VALIDATE_URL ) ) {

			if ( $attachment_id = bf_get_attachment_id_by_url( $avatar_url, true ) ) {

				update_user_meta( $user_id, 'avatar', $attachment_id, $avatar_url );
			}
		}
	}

	return true;
}


function publisher_version_1_8_4_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// All fields that have to merged for new keys
				$keys = array(
					// Blocks fields
					'listing-modern-grid-1',
					'listing-modern-grid-2',
					'listing-modern-grid-3',
					'listing-modern-grid-4',
					'listing-modern-grid-5',
					'listing-modern-grid-6',
					'listing-modern-grid-7',
					'listing-modern-grid-8',
					'listing-modern-grid-9',
					'listing-modern-grid-10',
					'listing-mix-1-1',
					'listing-mix-1-2',
					'listing-mix-1-3',
					'listing-mix-1-4',
					'listing-mix-2-1',
					'listing-mix-2-2',
					'listing-mix-3-1',
					'listing-mix-3-2',
					'listing-mix-3-3',
					'listing-mix-3-4',
					'listing-mix-4-1',
					'listing-mix-4-2',
					'listing-mix-4-3',
					'listing-mix-4-4',
					'listing-mix-4-5',
					'listing-mix-4-6',
					'listing-mix-4-7',
					'listing-mix-4-8',
					'listing-grid-1',
					'listing-grid-2',
					'listing-blog-1',
					'listing-blog-2',
					'listing-blog-3',
					'listing-blog-4',
					'listing-blog-5',
					'listing-thumbnail-1',
					'listing-thumbnail-2',
					'listing-thumbnail-3',
					'listing-text-1',
					'listing-text-2',
					'listing-text-3',
					'listing-text-4',
					'listing-classic-1',
					'listing-classic-2',
					'listing-classic-3',
					'listing-tall-1',
					'listing-tall-2',
					'blocks-related-posts',
					'blocks-mega-menu',
				);

				// Save new changes into saved data
				foreach ( $keys as $field_id ) {
					if ( ! isset( $option[ $field_id ] ) ) {
						$option[ $field_id ] = $fields[ $field_id ]['std'];
					} else {
						$option[ $field_id ] = array_replace_recursive( $fields[ $field_id ]['std'], $option[ $field_id ] );
					}
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}


function publisher_version_1_9_0_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// Update "Clean Magazine" section title
				if ( ! empty( $option['style'] ) && $option['style'] === 'clean-magazine' ) {

					if ( $option['section_title_bg_color'] == 'rgba(0, 0, 0, 0.08)' ) {
						$option['section_title_bg_color'] = '';
					}
				}


				// Update CleanFashion section title
				if ( ! empty( $option['style'] ) && $option['style'] === 'clean-fashion' ) {

					if ( $option['section_title_color'] == '#ffffff' ) {
						$option['section_title_color'] = '#444444';
					}

					if ( $option['section_title_color'] === publisher_get_option( 'theme_color' ) ) {
						$option['section_title_color'] = '';
					}
				}


				// Update "Clean Design" section title
				if ( ! empty( $option['style'] ) && $option['style'] === 'clean-design' ) {

					if ( $option['section_title_color'] == '#ffffff' ) {
						$option['section_title_color'] = '';
					}

					if ( $option['section_title_bg_color'] === publisher_get_option( 'theme_color' ) ) {
						$option['section_title_bg_color'] = '';
					}
				}

				// Update "Clean Sport" section title
				if ( ! empty( $option['style'] ) && $option['style'] === 'clean-sport' ) {

					if ( $option['section_title_color'] == '#ffffff' ) {
						$option['section_title_color'] = '';
					}

					if ( $option['section_title_bg_color'] === publisher_get_option( 'theme_color' ) ) {
						$option['section_title_bg_color'] = '';
					}
				}


				// Update "Classic Blog" section title
				if ( ! empty( $option['style'] ) && $option['style'] === 'classic-blog' ) {

					if ( $option['section_title_color'] == '#ffffff' ) {
						$option['section_title_color'] = '';
					}
				}


				// Update CleanBlog section
				if ( ! empty( $option['style'] ) && $option['style'] === 'clean-blog' ) {

					if ( ! empty( $option['section_title_color'] ) && $option['section_title_color'] == $option['theme_color'] ) {
						$option['section_title_color'] = '';
					}

					if ( ! empty( $option['section_title_bg_color'] ) && $option['section_title_bg_color'] == $option['theme_color'] ) {
						$option['section_title_bg_color'] = '';
					}
				}


				// Update extra widgets background color
				{
					$_check = array(
						'classic-magazine' => '',
						'clean-video'      => '',
						'clean-sport'      => '',
						'clean-blog'       => '',
						'clean-magazine'   => '',
						'clean-design'     => '',
					);

					if ( ! empty( $option['style'] ) && isset( $_check[ $option['style'] ] ) && $option['widget_bg_color'] == '#ffffff' ) {
						$option['widget_bg_color'] = '';
					}
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}


function publisher_version_3_0_1_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				//
				// Make montserate bigger because of font update!
				//
				$typo_fields = array(
					'typo_body'                         => '',
					'typo_meta'                         => '',
					'typo_meta_author'                  => '',
					'typo_badges'                       => '',
					'typo_heading'                      => '',
					'typo_heading_h1'                   => '',
					'typo_heading_h1_color'             => '',
					'typo_heading_h2'                   => '',
					'typo_heading_h2_color'             => '',
					'typo_heading_h3'                   => '',
					'typo_heading_h3_color'             => '',
					'typo_heading_h4'                   => '',
					'typo_heading_h4_color'             => '',
					'typo_heading_h5'                   => '',
					'typo_heading_h5_color'             => '',
					'typo_heading_h6'                   => '',
					'typo_heading_h6_color'             => '',
					'typo_post_heading'                 => '',
					'typo_post_tp1_heading'             => '',
					'typo_post_tp2_heading'             => '',
					'typo_post_tp3_heading'             => '',
					'typo_post_tp4_heading'             => '',
					'typo_post_tp5_heading'             => '',
					'typo_post_tp6_heading'             => '',
					'typo_post_tp7_heading'             => '',
					'typo_post_tp8_heading'             => '',
					'typo_post_tp9_heading'             => '',
					'typo_post_tp10_heading'            => '',
					'typo_post_tp11_heading'            => '',
					'typo_post_tp12_heading'            => '',
					'typo_post_tp13_heading'            => '',
					'typo_post_subtitle'                => '',
					'typo_entry_content'                => '',
					'typo_post_summary'                 => '',
					'typo_post_summary_single'          => '',
					'typ_header_logo'                   => '',
					'typ_header_menu'                   => '',
					'typ_header_sub_menu'               => '',
					'typo_topbar_menu'                  => '',
					'typo_topbar_sub_menu'              => '',
					'typo_topbar_date'                  => '',
					'typo_archive_title_pre'            => '',
					'typo_archive_title'                => '',
					'typo_blocks_subtitle'              => '',
					'typo_listing_classic_1_title'      => '',
					'typo_listing_classic_1_subtitle'   => '',
					'typo_listing_classic_2_title'      => '',
					'typo_listing_classic_2_subtitle'   => '',
					'typo_listing_classic_3_title'      => '',
					'typo_listing_classic_3_subtitle'   => '',
					'typo_mg_1_title'                   => '',
					'typo_mg_1_subtitle'                => '',
					'typo_mg_2_title'                   => '',
					'typo_mg_2_subtitle'                => '',
					'typo_mg_3_title'                   => '',
					'typo_mg_4_title'                   => '',
					'typo_mg_4_subtitle'                => '',
					'typo_mg_5_title_big'               => '',
					'typo_mg_5_title_small'             => '',
					'typo_mg_5_subtitle'                => '',
					'typo_mg_6_title'                   => '',
					'typo_mg_6_subtitle'                => '',
					'typo_mg_7_title'                   => '',
					'typo_mg_7_subtitle'                => '',
					'typo_mg_8_title'                   => '',
					'typo_mg_8_subtitle'                => '',
					'typo_mg_9_title'                   => '',
					'typo_mg_9_subtitle'                => '',
					'typo_mg_10_title'                  => '',
					'typo_mg_10_subtitle'               => '',
					'typo_listing_grid_1_title'         => '',
					'typo_listing_grid_1_subtitle'      => '',
					'typo_listing_grid_2_title'         => '',
					'typo_listing_grid_2_subtitle'      => '',
					'typo_listing_tall_1_title'         => '',
					'typo_listing_tall_1_subtitle'      => '',
					'typo_listing_tall_2_title'         => '',
					'typo_listing_tall_2_subtitle'      => '',
					'typo_listing_slider_1_title'       => '',
					'typo_listing_slider_1_subtitle'    => '',
					'typo_listing_slider_2_title'       => '',
					'typo_listing_slider_2_subtitle'    => '',
					'typo_listing_slider_3_title'       => '',
					'typo_listing_slider_3_subtitle'    => '',
					'typo_listing_box_1_title'          => '',
					'typo_listing_box_2_title'          => '',
					'typo_listing_box_3_title'          => '',
					'typo_listing_box_4_title'          => '',
					'typo_listing_blog_1_title'         => '',
					'typo_listing_blog_1_subtitle'      => '',
					'typo_listing_blog_5_title'         => '',
					'typo_listing_blog_5_subtitle'      => '',
					'typo_listing_thumbnail_1_title'    => '',
					'typo_listing_thumbnail_1_subtitle' => '',
					'typo_listing_thumbnail_2_title'    => '',
					'typo_listing_thumbnail_2_subtitle' => '',
					'typo_text_listing_1_title'         => '',
					'typo_text_listing_1_subtitle'      => '',
					'typo_text_listing_2_title'         => '',
					'typo_text_listing_2_subtitle'      => '',
					'typo_text_listing_3_title'         => '',
					'typo_text_listing_3_subtitle'      => '',
					'typo_section_heading'              => '',
					'typo_widget_section_heading'       => '',
					'typo_footer_menu'                  => '',
					'typo_footer_copy'                  => '',
				);

				$_check = array(
					'regular' => '500',
					'400'     => '500',
					'700'     => '800',
				);

				foreach ( $typo_fields as $k => $v ) {

					if ( isset( $option[ $k ]['family'] ) &&
					     $option[ $k ]['family'] === 'Montserrat' &&
					     isset( $option[ $k ]['variant'] ) &&
					     isset( $_check[ $option[ $k ]['variant'] ] )
					) {
						$option[ $k ]['variant'] = $_check[ $option[ $k ]['variant'] ]; // replace it
					}
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}


function publisher_version_5_0_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// All fields that have to merged for new keys
				$keys = array(
					// Blocks fields
					'listing-mix-1-1',
					'listing-mix-1-2',
					'listing-mix-1-4',
					'listing-mix-2-1',
					'listing-mix-3-1',
					'listing-mix-3-2',
					'listing-thumbnail-1',
					'listing-thumbnail-2',
					'listing-thumbnail-3',
				);

				// Save new changes into saved data
				foreach ( $keys as $field_id ) {
					if ( ! isset( $option[ $field_id ] ) ) {
						$option[ $field_id ] = $fields[ $field_id ]['std'];
					} else {
						$option[ $field_id ] = array_replace_recursive( $fields[ $field_id ]['std'], $option[ $field_id ] );
					}
				}

				//
				// Sets the Template 13 font size to Template 14 font size
				//
				if ( ! isset( $option['typo_post_tp14_heading'] ) && isset( $option['typo_post_tp13_heading'] ) ) {
					$option['typo_post_tp14_heading'] = $option['typo_post_tp13_heading'];
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}


function publisher_version_7_5_0_compatibility() {

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{
				$option['post_author_box_posts']    = 'hide';
				$option['post_author_box_comments'] = 'hide';
				$option['author_posts']             = 'hide';
				$option['author_comments']          = 'hide';
			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}


function publisher_version_7_5_1_compatibility() {

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				//
				// Fixes the issue of BF commit #69d6d5c9c4c6f0468052cb72f3d051aa8f29041c
				//
				{
					$fields = array(
						'home_cat_include',
						'home_cat_exclude',
						'home_slider_cat_include',
						'home_slider_cat_exclude',
					);

					foreach ( $fields as $key ) {

						if ( empty( $option[ $key ] ) ) {
							continue;
						}

						if ( is_array( $option[ $key ] ) ) {

							if ( bf_count( $option[ $key ] ) > 1 ) {
								if ( is_array( $option[ $key ][0] ) ) {
									$temp = array();
									foreach ( $option[ $key ] as $value ) {
										$temp = array_merge( $temp, $value );
									}
									$option[ $key ] = $temp;
								}
							} elseif ( bf_count( $option[ $key ] ) == 1 ) {
								if ( is_array( $option[ $key ][0] ) ) {
									$option[ $key ] = $option[ $key ][0];
								}
							}
						}
					}
				}

			} // Theme options compatibility

			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}


function publisher_version_7_6_0_compatibility() {

	$fields = array();
	include PUBLISHER_THEME_PATH . 'includes/options/panel-std.php';

	$theme_panel_id = publisher_get_theme_panel_id();

	// All current active langs
	$all_langs = bf_get_all_languages();

	// Default is English
	if ( empty( $all_langs ) ) {
		$all_langs = array(
			array(
				'id' => 'en',
			)
		);
	}

	//
	// Languages compatibility
	//
	{
		// Do compatibility for all languages
		foreach ( $all_langs as $lang ) {

			if ( $lang['id'] == 'en' || $lang == 'all' ) {
				$_lang = '';
			} else {
				$_lang = '_' . $lang['id'];
			}

			$option = get_option( $theme_panel_id . $_lang );

			//
			// Theme options compatibility
			//
			{

				// All fields that have to merged for new keys
				$keys = array(
					// Blocks fields
					'listing-text-1',
					'listing-text-2',
					'listing-text-3',
					'listing-text-4',
				);

				// Save new changes into saved data
				foreach ( $keys as $field_id ) {
					if ( ! isset( $option[ $field_id ] ) ) {
						$option[ $field_id ] = $fields[ $field_id ]['std'];
					} else {
						$option[ $field_id ] = array_replace_recursive( $fields[ $field_id ]['std'], $option[ $field_id ] );
					}
				}

			} // Theme options compatibility


			// Update changed option
			update_option( $theme_panel_id . $_lang, $option );

		} // foreach

	}

	unset( $fields );
	unset( $all_langs );
}

