<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( ! function_exists( 'bf_inject_panel_custom_css_fields' ) ) {
	/**
	 * Handy function for adding panel/metaboxe custom CSS fields in standard/centralized way
	 *
	 * @param            $fields $fields array by reference
	 * @param array      $args
	 */
	function bf_inject_panel_custom_css_fields( &$fields, $args = array() ) {

		$args = bf_merge_args( $args, array(
			'css'                  => true,
			'css-default'          => '',
			'css-class'            => true,
			'loop-css-class'       => false,
			'responsive'           => true,
			'responsive-group'     => 'close',
			'advanced-class'       => false,
			'advanced-class-group' => 'close',
		) );


		/**
		 *
		 * Base Tab
		 *
		 */
		$fields['_custom_css_settings'] = array(
			'name'       => __( 'Custom CSS', 'better-studio' ),
			'id'         => '_custom_css_settings',
			'type'       => 'tab',
			'icon'       => 'bsai-css3',
			'margin-top' => '20',
			'ajax-tab'   => true,
		);


		/**
		 *
		 * Custom CSS
		 *
		 */
		if ( $args['css'] ) {
			$fields['_custom_css_code'] = array(
				'name'           => __( 'Custom CSS Code', 'better-studio' ),
				'id'             => '_custom_css_code',
				'type'           => 'editor',
				'section_class'  => 'width-70',
				'lang'           => 'css',
				'std'            => $args['css-default'],
				'desc'           => __( 'Paste your CSS code, do not include any tags or HTML in the field. Any custom CSS entered here will override the theme CSS. In some cases, the <code>!important</code> tag may be needed.', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
		}


		/**
		 *
		 * Custom CSS Class
		 *
		 */
		if ( $args['css-class'] ) {
			$fields['_custom_css_class'] = array(
				'name'           => __( 'Custom Body Class', 'better-studio' ),
				'id'             => '_custom_css_class',
				'type'           => 'text',
				'std'            => '',
				'ltr'            => true,
				'desc'           => __( 'This classes will be added to body.', 'better-studio' ) . '<br>' . __( 'Separate classes with space.', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
		}


		/**
		 *
		 * Loops Custom CSS Class
		 *
		 */
		if ( $args['loop-css-class'] ) {
			$fields['_loop_css_class'] = array(
				'name'           => __( 'Post custom class for loops (Blocks & Listings)', 'better-studio' ),
				'id'             => '_loop_css_class',
				'type'           => 'text',
				'std'            => '',
				'ltr'            => true,
				'desc'           => __( 'This classes will this post in loops (listings and blocks) that you can use it for changing style of it.', 'better-studio' ) . '<br>' . __( 'Separate classes with space.', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
		}


		/**
		 *
		 * Custom responsive CSS
		 *
		 */
		if ( $args['responsive'] ) {
			$fields[]                                    = array(
				'name'           => __( 'Responsive CSS', 'better-studio' ),
				'type'           => 'group',
				'state'          => $args['responsive-group'],
				'desc'           => __( 'Paste your custom css in the appropriate box, to run only on a specific device', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_desktop_code']          = array(
				'name'           => __( 'Desktop', 'better-studio' ),
				'id'             => '_custom_css_desktop_code',
				'type'           => 'editor',
				'lang'           => 'css',
				'section_class'  => 'width-70',
				'std'            => '',
				'desc'           => __( '1200px +', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_tablet_landscape_code'] = array(
				'name'           => __( 'Tablet Landscape', 'better-studio' ),
				'id'             => '_custom_css_tablet_landscape_code',
				'type'           => 'editor',
				'lang'           => 'css',
				'section_class'  => 'width-70',
				'std'            => '',
				'desc'           => __( '1019px - 1199px', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_tablet_portrait_code']  = array(
				'name'           => __( 'Tablet Portrait', 'better-studio' ),
				'id'             => '_custom_css_tablet_portrait_code',
				'type'           => 'editor',
				'lang'           => 'css',
				'section_class'  => 'width-70',
				'std'            => '',
				'desc'           => __( '768px - 1018px', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_phones_code']           = array(
				'name'           => __( 'Phones', 'better-studio' ),
				'id'             => '_custom_css_phones_code',
				'type'           => 'editor',
				'lang'           => 'css',
				'section_class'  => 'width-70',
				'std'            => '',
				'desc'           => __( '768px - 1018px', 'better-studio' ),
				'ajax-tab-field' => '_custom_css_settings',
			);
		}


		/**
		 *
		 * Advanced custom classes
		 *
		 */
		if ( $args['advanced-class'] ) {
			$fields[]                             = array(
				'name'           => __( 'Advanced Custom Body Class', 'better-studio' ),
				'type'           => 'group',
				'state'          => $args['advanced-class-group'],
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_class_category'] = array(
				'name'           => __( 'Categories Custom Body Class', 'better-studio' ),
				'id'             => '_custom_css_class_category',
				'type'           => 'text',
				'std'            => '',
				'desc'           => __( 'This classes will be added in body of all categories.<br> Separate classes with space.', 'better-studio' ),
				'ltr'            => true,
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_class_tag']      = array(
				'name'           => __( 'Tags Custom Body Class', 'better-studio' ),
				'id'             => '_custom_css_class_tag',
				'type'           => 'text',
				'std'            => '',
				'desc'           => __( 'This classes will be added in body of all tags.<br> Separate classes with space.', 'better-studio' ),
				'ltr'            => true,
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_class_author']   = array(
				'name'           => __( 'Authors Custom Body Class', 'better-studio' ),
				'id'             => '_custom_css_class_author',
				'type'           => 'text',
				'std'            => '',
				'desc'           => __( 'This classes will be added in body of all authors.<br> Separate classes with space.', 'better-studio' ),
				'ltr'            => true,
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_class_post']     = array(
				'name'           => __( 'Posts Custom Body Class', 'better-studio' ),
				'id'             => '_custom_css_class_post',
				'type'           => 'text',
				'std'            => '',
				'desc'           => __( 'This classes will be added in body of all posts.<br> Separate classes with space.', 'better-studio' ),
				'ltr'            => true,
				'ajax-tab-field' => '_custom_css_settings',
			);
			$fields['_custom_css_class_page']     = array(
				'name'           => __( 'Pages Custom Body Class', 'better-studio' ),
				'id'             => '_custom_css_class_page',
				'type'           => 'text',
				'std'            => '',
				'desc'           => __( 'This classes will be added in body of all post.<br> Separate classes with space.', 'better-studio' ),
				'ltr'            => true,
				'ajax-tab-field' => '_custom_css_settings',
			);
		}

	} // bf_inject_panel_custom_css_fields
}


if ( ! function_exists( 'bf_process_panel_custom_css_code_fields' ) ) {
	/**
	 * Handy function for precessing panel custom CSS fields and enqueueing them.
	 *
	 * @param array $args
	 */
	function bf_process_panel_custom_css_code_fields( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'css'        => true,
			'responsive' => true,
			'general'    => true,
			'singular'   => true,
			'term'       => true,
			'author'     => true,
			'function'   => '',
		) );

		if ( empty( $args['function'] ) || ! is_callable( $args['function'] ) ) {
			return;
		}

		$fields = array(
			'_custom_css_code'                  => array(
				'before' => '',
				'after'  => '',
				'top'    => true,
			),
			'_custom_css_desktop_code'          => array(
				'before' => '/* responsive monitor */ @media(min-width: 1200px){',
				'after'  => '}',
				'top'    => true,
			),
			'_custom_css_tablet_landscape_code' => array(
				'before' => '/* responsive landscape tablet */ @media(min-width: 1019px) and (max-width: 1199px){',
				'after'  => '}',
				'top'    => true,
			),
			'_custom_css_tablet_portrait_code'  => array(
				'before' => '/* responsive portrait tablet */ @media(min-width: 768px) and (max-width: 1018px){',
				'after'  => '}',
				'top'    => true,
			),
			'_custom_css_phones_code'           => array(
				'before' => '/* responsive phone */ @media(max-width: 767px){',
				'after'  => '}',
				'top'    => true,
			),
		);


		foreach ( $fields as $id => $value ) {

			//
			// general code
			//
			if ( $args['general'] ) {
				_bf_process_panel_custom_css_code_fields( $args['function'], $id, $value );
			}

			switch ( true ) {

				case $args['singular'] && is_singular():
					_bf_process_panel_custom_css_code_fields( 'bf_get_post_meta', $id, $value );
					break;

				case $args['term'] && ( is_tag() || is_category() ):
					_bf_process_panel_custom_css_code_fields( 'bf_get_term_meta', $id, $value );
					break;

				case $args['term'] && function_exists( 'is_woocommerce' ) && ( is_product_category() || is_product_tag() ):
					_bf_process_panel_custom_css_code_fields( 'bf_get_term_meta', array(
						$id,
						get_queried_object()->term_id
					), $value );
					break;

				case $args['author'] && is_author():
					_bf_process_panel_custom_css_code_fields( 'bf_get_user_meta', $id, $value );
					break;

			}

		}

	} // bf_process_panel_custom_css_fields
}


if ( ! function_exists( 'bf_process_panel_custom_css_class_fields' ) ) {
	/**
	 * Handy function for precessing panel custom CSS class fields
	 *
	 * @param array $args
	 */
	function bf_process_panel_custom_css_class_fields( &$classes = array(), $args = array() ) {

		$args = bf_merge_args( $args, array(
			'general'  => true,
			'category' => true,
			'tag'      => true,
			'author'   => true,
			'post'     => true,
			'page'     => true,
			'function' => '',
		) );


		if ( empty( $args['function'] ) || ! is_callable( $args['function'] ) ) {
			return;
		}

		$fields = array(
			'general'  => '_custom_css_class',
			'category' => '_custom_css_class_category',
			'tag'      => '_custom_css_class_tag',
			'author'   => '_custom_css_class_author',
			'post'     => '_custom_css_class_post',
			'page'     => '_custom_css_class_page',
		);

		// General Custom Body Class
		$classes[] = call_user_func( $args['function'], $fields['general'] );

		switch ( true ) {

			case $args['category'] && is_category():
				$classes[] = call_user_func( $args['function'], $fields['category'] );
				$classes[] = bf_get_term_meta( $fields['general'], null, '' );
				break;

			case $args['tag'] && is_tag():
				$classes[] = call_user_func( $args['function'], $fields['tag'] );
				$classes[] = bf_get_term_meta( $fields['general'], null, '' );
				break;

			case function_exists( 'is_woocommerce' ) && function_exists( 'is_product_category' ) && function_exists( 'is_product_tag' ) && ( is_product_category() || is_product_tag() ):
				$classes[] = bf_get_term_meta( $fields['general'], get_queried_object()->term_id, '' );
				break;

			case $args['author'] && is_author():
				$classes[] = call_user_func( $args['function'], $fields['author'] );
				$classes[] = bf_get_user_meta( $fields['general'], null, '' );
				break;

			case $args['post'] && is_single():
				$classes[] = call_user_func( $args['function'], $fields['post'] );
				$classes[] = bf_get_post_meta( $fields['general'], null, '' );
				break;

			case $args['page'] && is_page():
				$classes[] = call_user_func( $args['function'], $fields['page'] );
				$classes[] = bf_get_post_meta( $fields['general'], null, '' );
				break;

		}

	} // bf_process_panel_custom_css_fields
}


if ( ! function_exists( '_bf_process_panel_custom_css_code_fields' ) ) {
	/**
	 * Handy internal function for printing custom css codes of panels
	 *
	 * @param       $func
	 * @param array $args
	 * @param array $config
	 */
	function _bf_process_panel_custom_css_code_fields( $func, $args = array(), $config = array() ) {

		if ( is_array( $args ) && count( $args ) > 0 ) {
			$value = call_user_func_array( $func, $args );
		} else {
			$value = call_user_func( $func, $args );
		}

		if ( ! empty( $value ) ) {
			bf_add_css( $config['before'] . $value . $config['after'], $config['top'] );
		}

	} // _bf_process_panel_custom_css_fields
}


if ( ! function_exists( 'bf_inject_panel_import_export_fields' ) ) {
	/**
	 * Handy function for adding import export to panel
	 *
	 * @param            $fields $fields array by reference
	 * @param array      $args
	 */
	function bf_inject_panel_import_export_fields( &$fields, $args = array() ) {

		$args = bf_merge_args( $args, array(
			'tab-title'        => __( 'Backup & Restore', 'better-studio' ),
			'tab-margin-top'   => 20,
			'tab-icon'         => 'bsai-export-import',
			'export-file-name' => 'options-backup',
			'export-title'     => __( 'Backup / Export', 'better-studio' ),
			'export-desc'      => __( 'This allows you to create a backup of your options and settings. Please note, it will not backup anything else.', 'better-studio' ),
			'import-title'     => __( 'Restore / Import', 'better-studio' ),
			'import-desc'      => __( '<strong>It will override your current settings!</strong> Please make sure to select a valid backup file.', 'better-studio' ),
			'panel-id'         => '',
		) );


		$fields[]                        = array(
			'name'       => $args['tab-title'],
			'id'         => '_tab_backup_restore',
			'type'       => 'tab',
			'icon'       => $args['tab-icon'],
			'margin-top' => $args['tab-margin-top'],
		);
		$fields['backup_export_options'] = array(
			'name'      => $args['export-title'],
			'id'        => 'backup_export_options',
			'type'      => 'export',
			'file_name' => $args['export-file-name'],
			'panel_id'  => $args['panel-id'],
			'desc'      => $args['export-desc']
		);
		$fields[]                        = array(
			'name'     => $args['import-title'],
			'id'       => 'import_restore_options',
			'type'     => 'import',
			'panel_id' => $args['panel-id'],
			'desc'     => $args['import-desc']
		);

		unset( $args );

	} // bf_inject_panel_import_export_fields
}


if ( ! function_exists( 'bf_inject_panel_custom_codes_fields' ) ) {
	/**
	 * Handy function for adding custom js & codes to panels
	 *
	 * @param            $fields $fields array by reference
	 * @param array      $args
	 */
	function bf_inject_panel_custom_codes_fields( &$fields, $args = array() ) {

		$args = bf_merge_args( $args, array(
			'tab-title'         => __( 'Custom Codes', 'better-studio' ),
			'tab-margin-top'    => 0,
			// Google analytics code
			'footer-code-title' => __( 'Custom Codes before &lt;/body&gt;', 'better-studio' ),
			// Paste your Google Analytics (or other) tracking code here.
			'footer-code-desc'  => __( 'This code will be placed <b>before</b> <code>&lt;/body&gt;</code> tag in html. Please put code inside script tags.<br><br> <code>Please note:</code> Don\'t add analytic codes in this field.', 'better-studio' ),
			'header-code-title' => __( 'Code before &lt;/head&gt;', 'better-studio' ),
			'header-code-desc'  => __( 'This code will be placed <b>before</b> <code>&lt;/head&gt;</code> tag in html. Useful if you have an external script that requires it. <br><br> <code>Please note:</code> Don\'t add analytic codes in this field.', 'better-studio' ),
		) );

		$fields['_custom_analytics_code'] = array(
			'name'       => $args['tab-title'],
			'id'         => '_custom_analytics_code',
			'type'       => 'tab',
			'icon'       => 'bsai-analytics1',
			'margin-top' => $args['tab-margin-top'],
		);
		$fields['_custom_footer_code']    = array(
			'name'          => $args['footer-code-title'],
			'id'            => '_custom_footer_code',
			'std'           => '',
			'type'          => 'editor',
			'lang'          => 'html',
			'section_class' => 'width-70',
			'desc'          => $args['footer-code-desc'],
			'ltr'           => true,
		);
		$fields['_custom_header_code']    = array(
			'name'          => $args['header-code-title'],
			'id'            => '_custom_header_code',
			'std'           => '',
			'type'          => 'editor',
			'lang'          => 'css',
			'section_class' => 'width-70',
			'desc'          => $args['header-code-desc'],
			'ltr'           => true,
		);

		unset( $args );

	} // bf_inject_panel_custom_codes_fields
}


/**
 *
 * Deferred Callbacks
 *
 */

if ( ! function_exists( 'bf_deferred_option_get_users' ) ) {
	/**
	 * Handy deferred option callback for gating users
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function bf_deferred_option_get_users( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'default'       => false,
			'default-label' => __( 'Default User', 'better-studio' ),
			'default-id'    => '',
			'query'         => array(),
			'group'         => false,
			'group_label'   => __( 'Select User', 'better-studio' ),
		) );

		if ( ! isset( $args['query']['advanced-label'] ) ) {
			$args['query']['advanced-label'] = true;
		}

		$pages = bf_get_users( $args['query'] );

		if ( $args['group'] ) {
			$pages = array(
				array(
					'label'   => $args['group_label'],
					'options' => $pages,
				)
			);
		}

		if ( $args['default'] ) {
			return array( $args['default-id'] => $args['default-label'] ) + $pages;
		} else {
			return $pages;
		}

	} // bf_deferred_option_get_pages
}


if ( ! function_exists( 'bf_deferred_option_get_pages' ) ) {
	/**
	 * Handy deferred option callback for gating pages
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function bf_deferred_option_get_pages( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'default'       => false,
			'default-label' => __( 'Default Page', 'better-studio' ),
			'default-id'    => '',
			'query'         => array(),
			'group'         => false,
			'group_label'   => __( 'Select Page', 'better-studio' ),
		) );

		if ( ! isset( $args['query']['advanced-label'] ) ) {
			$args['query']['advanced-label'] = true;
		}

		$pages = bf_get_pages( $args['query'] );

		if ( $args['group'] ) {
			$pages = array(
				array(
					'label'   => $args['group_label'],
					'options' => $pages,
				)
			);
		}

		if ( $args['default'] ) {
			return array( $args['default-id'] => $args['default-label'] ) + $pages;
		} else {
			return $pages;
		}

	} // bf_deferred_option_get_pages
}


if ( ! function_exists( 'bf_deferred_option_get_rev_sliders' ) ) {
	/**
	 * Used to find list of all "Slider Revolution" Sliders
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function bf_deferred_option_get_rev_sliders( $args = array() ) {

		$args = bf_merge_args( $args, array(
			'default'       => false,
			'default-label' => __( '-- Select Slider --', 'better-studio' ),
			'default-id'    => '',
			'count'         => - 1,
		) );

		$sliders = bf_get_rev_sliders();

		if ( $args['count'] > 0 ) {
			$sliders = array_slice( $sliders, $args['count'] );
		}

		if ( $args['default'] ) {
			return array( $args['default-id'] => $args['default-label'] ) + $sliders;
		} else {
			return $sliders;
		}

	} // bf_deferred_option_get_rev_sliders
}


if ( ! function_exists( 'bf_set_transient' ) ) {

	/**
	 * Set/update the value of a transient.
	 *
	 * @param string $transient  Transient name. Expected to not be SQL-escaped. Must be
	 *                           172 characters or fewer in length.
	 * @param mixed  $value      Transient value. Must be serializable if non-scalar.
	 *                           Expected to not be SQL-escaped.
	 * @param int    $expiration Optional. Time until expiration in seconds. Default 0 (no expiration).
	 *
	 * @since 3.11.0
	 * @return bool
	 */
	function bf_set_transient( $transient, $value, $expiration = 0 ) {

		return update_option( $transient, array(
			'data' => $value,
			'time' => $expiration ? time() + $expiration : 0,
		) );
	}
}

if ( ! function_exists( 'bf_get_transient' ) ) {

	/**
	 * Get the value of a transient.
	 *
	 * @param string $transient Transient name.
	 * @param bool   $default
	 *
	 * @return array {
	 *
	 * [0]  mixed    saved data.
	 * [1]  bool    $is_expired is transient expired.
	 * }
	 * @since 3.11.0
	 */
	function bf_get_transient( $transient, $default = false ) {

		$cache      = get_option( $transient );
		$data       = isset( $cache['data'] ) ? $cache['data'] : $default;
		$cache_time = isset( $cache['time'] ) ? $cache['time'] : 0;
		//
		$is_expired =  empty( $cache ) || ! empty( $cache_time ) && $cache_time < time();

		return array( $data, $is_expired );
	}
}