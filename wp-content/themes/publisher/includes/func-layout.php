<?php


if ( ! function_exists( 'publisher_layout_option_list' ) ) {
	/**
	 * Panels layout field options
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_layout_option_list( $default = false ) {

		$option = array();

		if ( $default ) {
			$option['default'] = array(
				'img'           => PUBLISHER_THEME_URI . 'images/options/layout-default.png?v=' . PUBLISHER_THEME_VERSION,
				'label'         => __( 'Default', 'publisher' ),
				'current_label' => __( 'Default Layout', 'publisher' ),
			);
		}

		$option['1-col']   = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-1-col.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'No Sidebar (1)', 'publisher' ),
			'info'  => array(
				'cat' => array(
					__( '1 Column', 'publisher' ),
				),
			),
		);
		$option['3-col-0'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-0.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( 'No Sidebar (2)', 'publisher' ),
			'info'  => array(
				'cat' => array(
					__( '1 Column', 'publisher' ),
				),
			),
		);

		$option['2-col-right'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-2-col-right.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '2 Column (1)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '2 Column', 'publisher' ),
				),
			),
		);
		$option['2-col-left']  = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-2-col-left.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '2 Column (2)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '2 Column', 'publisher' ),
				),
			),
		);

		$option['3-col-1'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-1.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '3 Column (1)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '3 Column', 'publisher' ),
				),
			),
		);
		$option['3-col-2'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-2.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '3 Column (2)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '3 Column', 'publisher' ),
				),
			),
		);
		$option['3-col-3'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-3.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '3 Column (3)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '3 Column', 'publisher' ),
				),
			),
		);
		$option['3-col-4'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-4.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '3 Column (4)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '3 Column', 'publisher' ),
				),
			),
		);
		$option['3-col-5'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-5.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '3 Column (5)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '3 Column', 'publisher' ),
				),
			),
		);
		$option['3-col-6'] = array(
			'img'   => PUBLISHER_THEME_URI . 'images/options/layout-3-col-6.png?v=' . PUBLISHER_THEME_VERSION,
			'label' => __( '3 Column (6)', 'publisher' ),
			'class' => 'bf-flip-img-rtl',
			'info'  => array(
				'cat' => array(
					__( '3 Column', 'publisher' ),
				),
			),
		);

		return $option;
	} // publisher_layout_option_list
} // if


if ( ! function_exists( 'publisher_is_valid_layout' ) ) {
	/**
	 * Check the parameter is theme valid layout or not!
	 *
	 * This is because of multiple theme that have same page_layout id for page layout
	 *
	 * @param $layout
	 *
	 * @return bool
	 */
	function publisher_is_valid_layout( $layout ) {

		$valid = array(
			'1-col'       => '',
			'2-col-left'  => '',
			'2-col-right' => '',
			'3-col-0'     => '',
			'3-col-1'     => '',
			'3-col-2'     => '',
			'3-col-3'     => '',
			'3-col-4'     => '',
			'3-col-5'     => '',
			'3-col-6'     => '',
		);

		return isset( $valid[ $layout ] );
	} // publisher_is_valid_layout
} // if


if ( ! function_exists( 'publisher_get_page_boxed_layout' ) ) {
	/**
	 * Used to get current page boxed layout
	 *
	 * @return bool|mixed|null|string|void
	 */
	function publisher_get_page_boxed_layout() {

		$layout = '';


		// Retrieve post "page layout" from parent category
		if ( is_singular( 'post' ) ) {

			$main_term = publisher_get_post_primary_cat();

			if ( ! is_wp_error( $main_term ) && is_object( $main_term ) && bf_get_term_meta( 'override_in_posts', $main_term ) ) {
				$layout = bf_get_term_meta( 'layout_style', $main_term );
			}
		} elseif ( publisher_is_valid_tax() ) {
			$layout = bf_get_term_meta( 'layout_style' );

			$bg_img = bf_get_term_meta( 'bg_image' );
			if ( ! empty( $bg_img['img'] ) ) {
				$layout = 'boxed';
			}
		}

		if ( empty( $layout ) || $layout == false || $layout === 'default' ) {
			$layout = publisher_get_option( 'layout_style' );

			if ( $layout === 'full-width' ) {
				$bg_img = publisher_get_option( 'site_bg_image' );
				if ( ! empty( $bg_img['img'] ) ) {
					$layout = 'boxed';
				}
			}
		}

		return $layout;
	}
}


if ( ! function_exists( 'publisher_get_page_layout' ) ) {
	/**
	 * Used to get current page layout
	 *
	 * @return string
	 */
	function publisher_get_page_layout() {

		// Return from cache
		if ( publisher_get_global( 'page-layout' ) ) {
			return publisher_get_global( 'page-layout' );
		}

		$layout = 'default';

		// Homepage layout
		if ( is_home() ||
		     ( ( 'page' === get_option( 'show_on_front' ) ) && is_front_page() && bf_get_query_var_paged( 1 ) > 1 )
		) {
			$layout = publisher_get_option( 'home_layout' );
		} // Post, page and custom post types layout
		elseif ( publisher_is_valid_cpt() ) {

			$layout = bf_get_post_meta( 'page_layout' );

			if ( $layout === 'default' ) {
				if ( is_page() ) {
					$layout = publisher_get_option( 'page_layout' );
				} else {
					$layout = publisher_get_option( 'post_layout' );

					// default -> Retrieve from parent category
					if ( $layout === 'default' || ! publisher_is_valid_layout( $layout ) ) {

						$main_term = publisher_get_post_primary_cat();

						if ( ! is_wp_error( $main_term ) && is_object( $main_term ) && bf_get_term_meta( 'override_in_posts', $main_term ) ) {
							$layout = bf_get_term_meta( 'page_layout', $main_term );
						}
					}
				}
			}

		}  // Category Layout
		elseif ( publisher_is_valid_tax() ) {

			$layout = bf_get_term_meta( 'page_layout' );

			if ( $layout === 'default' ) {
				$layout = publisher_get_option( 'cat_layout' );
			}
		} // Tag Layout
		elseif ( publisher_is_valid_tax( 'tag' ) ) {

			$layout = bf_get_term_meta( 'page_layout' );

			if ( $layout === 'default' ) {
				$layout = publisher_get_option( 'tag_layout' );
			}
		} // Author Layout
		elseif ( is_author() ) {
			$layout = bf_get_user_meta( 'page_layout' );

			if ( $layout === 'default' ) {
				$layout = publisher_get_option( 'author_layout' );
			}
		} // Search Layout
		elseif ( is_search() ) {
			$layout = publisher_get_option( 'search_layout' );
		} // bbPress Layout
		elseif ( is_post_type_archive( 'forum' ) || is_singular( 'forum' ) || is_singular( 'topic' ) ) {

			$layout = bf_get_post_meta( 'page_layout', null, $layout );

			if ( $layout == 'default' ) {
				$layout = publisher_get_option( 'bbpress_layout' );
			}

		} // Attachments
		elseif ( is_attachment() ) {
			$layout = publisher_get_option( 'attachment_layout' );
		} // WooCommerce
		elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {

			if ( is_shop() ) {
				$layout = bf_get_post_meta( 'page_layout', wc_get_page_id( 'shop' ) );
			} elseif ( is_product() ) {
				$layout = bf_get_post_meta( 'page_layout', get_the_ID() );
			} elseif ( is_cart() ) {
				$layout = bf_get_post_meta( 'page_layout', wc_get_page_id( 'cart' ) );
			} elseif ( is_checkout() ) {
				$layout = bf_get_post_meta( 'page_layout', wc_get_page_id( 'checkout' ) );
			} elseif ( is_account_page() ) {
				$layout = bf_get_post_meta( 'page_layout', wc_get_page_id( 'myaccount' ) );
			} elseif ( is_product_category() || is_product_tag() ) {
				$layout = bf_get_term_meta( 'page_layout', get_queried_object()->term_id );
			}

			if ( $layout === 'default' ) {
				$layout = publisher_get_option( 'shop_layout' );
			}

		}

		// Return default
		if ( $layout === 'default' || ! publisher_is_valid_layout( $layout ) ) {
			$layout = publisher_get_option( 'general_layout' );
		}

		$layout = apply_filters( 'publisher/page-layout', $layout );

		// Cache
		publisher_set_global( 'page-layout', $layout );

		return $layout;

	} // publisher_get_page_layout
}// if


if ( ! function_exists( 'publisher_get_page_layout_file' ) ) {
	/**
	 * Used to get current page layout file
	 *
	 * @return string
	 */
	function publisher_get_page_layout_file() {

		static $layout_file;

		if ( $layout_file ) {
			return $layout_file;
		}

		$layout_file = publisher_get_page_layout();
		$layout_file = $layout_file[0];

		if ( $layout_file == '2' ) {
			$layout_file = '2-col';
		} elseif ( $layout_file == '1' ) {
			$layout_file = '1-col';
		} elseif ( $layout_file == '3' ) {
			$layout_file = '3-col';
		} else {
			$layout_file = '2-col';
		}

		return $layout_file;

	} // publisher_get_page_layout
}// if


if ( ! function_exists( 'publisher_get_page_layout_setting' ) ) {
	/**
	 * Used to get current page layout columns setting
	 *
	 * @return array
	 */
	function publisher_get_page_layout_setting() {

		static $layout;

		if ( $layout ) {
			return $layout;
		}

		$layout['layout']    = publisher_get_page_layout();
		$layout['container'] = '';
		$layout['columns']   = array();

		switch ( $layout['layout'][0] ) {

			//
			// 2 Column layouts
			//
			case '2':

				if ( $layout['layout'] === '2-col-right' ) {
					$layout['container'] = 'layout-2-col layout-2-col-1 layout-right-sidebar';
					$layout['columns']   = array(
						array(
							'id'    => 'content',
							'class' => 'col-sm-8 content-column',
						),
						array(
							'id'    => 'primary',
							'class' => 'col-sm-4 sidebar-column sidebar-column-primary',
						),
					);
				} else {
					$layout['container'] = 'layout-2-col layout-2-col-2 layout-left-sidebar';
					$layout['columns']   = array(
						array(
							'id'    => 'content',
							'class' => 'col-sm-8 col-sm-push-4 content-column',
						),
						array(
							'id'    => 'primary',
							'class' => 'col-sm-4 col-sm-pull-8 sidebar-column sidebar-column-primary',
						),
					);
				}

				break;

			//
			// 3 Column layouts
			//
			case '3':

				$layout['container'] = 'layout-3-col layout-' . $layout['layout'];

				if ( $layout['layout'][6] == 0 ) {
					$layout['columns'] = array(
						array(
							'id'    => 'content',
							'class' => 'col-sm-12 content-column',
						),
					);

					// Page that was not built with WP Bakery Page Builder
					if ( ! is_singular() || ! publisher_is_pagebuilder_used( get_the_ID() ) ) {
						$layout['container'] .= ' container';
					}

				} else {
					$layout['container'] .= ' container';
					$layout['columns']   = array(
						array(
							'id'    => 'content',
							'class' => 'col-sm-7 content-column',
						),
						array(
							'id'    => 'primary',
							'class' => 'col-sm-3 sidebar-column sidebar-column-primary',
						),
						array(
							'id'    => 'secondary',
							'class' => 'col-sm-2 sidebar-column sidebar-column-secondary',
						),
					);
				}

				break;

			//
			// 1 Column layouts
			//
			case '1':
				$layout['container'] = 'layout-1-col layout-no-sidebar';
				$layout['columns']   = array(
					array(
						'id'    => 'content',
						'class' => 'col-sm-12 content-column',
					),
				);
				break;

		}

		return apply_filters( 'publisher/page-layout-settings', $layout );

	} // publisher_get_page_layout
}// if


if ( ! function_exists( 'bf_get_current_sidebar' ) ) {
	/**
	 * Used For retrieving current sidebar
	 *
	 * @since 2.5.5
	 *
	 * @return string
	 */
	function bf_get_current_sidebar() {

		$current_sidebar = Better_Framework::widget_manager()->get_current_sidebar();

		if ( $current_sidebar ) {
			return $current_sidebar;
		}

		if ( publisher_get_global( 'bs-vc-sidebar-column', false ) ) {
			return 'bs-vc-sidebar-column';
		}

		return '';
	}
}
