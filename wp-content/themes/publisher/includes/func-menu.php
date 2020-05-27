<?php

$GLOBALS['publisher_menu_pagebuilder_status'] = false;

if ( ! function_exists( 'publisher_get_menu_pagebuilder_status' ) ) {
	/**
	 * Used to detect current block is in the pagebuilder mega menu or not
	 *
	 * @return mixed
	 */
	function publisher_get_menu_pagebuilder_status() {

		global $publisher_menu_pagebuilder_status;

		return $publisher_menu_pagebuilder_status;

	}
}


if ( ! function_exists( 'publisher_set_menu_pagebuilder_status' ) ) {
	/**
	 * Sets the pagebuilder menu status or clear it
	 *
	 * @param bool $location
	 */
	function publisher_set_menu_pagebuilder_status( $location = false ) {

		global $publisher_menu_pagebuilder_status;

		$publisher_menu_pagebuilder_status = $location;
	}
}


if ( ! function_exists( 'publisher_mega_menus_list' ) ) {

	/**
	 * List of publisher mega menus
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_mega_menus_list() {

		return array(
			'disabled'          => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-disable.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '-- Disabled --', 'publisher' ),
			),
			'link-list'         => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-link-list.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Horizontal links', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Link', 'publisher' ),
					),
				),
			),
			'link-2-column'     => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-link-2-column.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '2 Column links', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Link', 'publisher' ),
					),
				),
			),
			'link-3-column'     => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-link-3-column.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '3 Column links', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Link', 'publisher' ),
					),
				),
			),
			'link-4-column'     => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-link-4-column.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '4 Column links', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Link', 'publisher' ),
					),
				),
			),
			'link-5-column'     => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-link-5-column.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( '5 Column links', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Link', 'publisher' ),
					),
				),
			),
			'tabbed-grid-posts' => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-tabbed-grid-posts.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Tabbed sub categories with posts', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Posts', 'publisher' ),
					),
				),
			),
			'grid-posts'        => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-grid-posts.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Latest posts with image', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Posts', 'publisher' ),
					),
				),
			),
			'page-builder'      => array(
				'img'   => PUBLISHER_THEME_URI . 'images/options/mega-page-builder.png?v=' . PUBLISHER_THEME_VERSION,
				'label' => __( 'Page Builder', 'publisher' ),
				'depth' => 0,
				'info'  => array(
					'cat' => array(
						__( 'Posts', 'publisher' ),
					),
				),
			),
		);
	}
}
