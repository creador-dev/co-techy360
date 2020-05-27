<?php


if ( ! function_exists( 'better_reviews_is_review_active' ) ) {
	/**
	 * Handy function to check state of review
	 *
	 * @since 1.3.0
	 */
	function better_reviews_is_review_active() {

		return Better_Reviews::get_meta( '_bs_review_enabled' );
	}
}


if ( ! function_exists( 'better_reviews_get_total_rate' ) ) {
	/**
	 * Handy function to get total rate of review
	 *
	 * @sine 1.3.0
	 */
	function better_reviews_get_total_rate() {


		return Better_Reviews()->generator()->calculate_overall_rate();
	}
}


if ( ! function_exists( 'better_reviews_get_review_type' ) ) {
	/**
	 * Handy function to get total rate of review
	 *
	 * @since 1.3.0
	 */
	function better_reviews_get_review_type() {

		$type = Better_Reviews::get_meta( '_bs_review_rating_type' );

		if ( empty( $type ) ) {
			$type = 'stars';
		}

		return $type;
	}
}


if ( ! function_exists( 'better_reviews_locate_template' ) ) {
	/**
	 * Retrieve the name of the highest priority review template file that exists.
	 *
	 * @see   locate_template for more doc
	 *
	 * @param string|array $template_names Template file(s) to search for, in order.
	 * @param bool         $load           If true the template file will be loaded if it is found.
	 * @param bool         $require_once   Whether to require_once or require. Default true. Has no effect if $load is false.
	 *
	 * @since 1.0.0
	 *
	 * @return string The template filename if one is located.
	 */
	function better_reviews_locate_template( $template_names, $load = FALSE, $require_once = FALSE ) {

		$wp_theme_can_override = current_theme_supports( 'better-review-template' );

		/**
		 * Scan WordPress theme directory at first, if override feature was enabled
		 */
		if ( $wp_theme_can_override ) {
			$scan_directories = array(
				STYLESHEETPATH . '/' . Better_Reviews::OVERRIDE_TPL_DIR . '/',
				TEMPLATEPATH . '/' . Better_Reviews::OVERRIDE_TPL_DIR . '/',
				Better_Reviews::dir_path( 'templates' ),
			);
		} else {
			$scan_directories = array(
				Better_Reviews::dir_path( 'template' ),
				STYLESHEETPATH . '/' . Better_Reviews::OVERRIDE_TPL_DIR . '/',
				TEMPLATEPATH . '/' . Better_Reviews::OVERRIDE_TPL_DIR . '/',
			);
		}

		$scan_directories = array_unique( array_filter( $scan_directories ) );

		foreach ( $scan_directories as $theme_directory ) {
			if ( $theme_file_path = better_reviews_load_templates( $template_names, $theme_directory, $load, $require_once ) ) {
				return $theme_file_path;
			}
		}

		return '';
	}
}


if ( ! function_exists( 'better_reviews_load_templates' ) ) {
	/**
	 * Require the template file
	 *
	 * @param string|array $templates
	 * @param string       $theme_directory base directory. scan $templates files into this directory
	 * @param bool         $load
	 * @param bool         $require_once
	 *
	 * @see   better_reviews_locate_template for parameters documentation
	 *
	 * @since 1.3.0
	 *
	 * @return bool|string
	 */
	function better_reviews_load_templates( $templates, $theme_directory, $load = FALSE, $require_once = TRUE ) {

		foreach ( (array) $templates as $theme_file ) {

			$theme_file      = ltrim( $theme_file, '/' );
			$theme_directory = trailingslashit( $theme_directory );

			if ( file_exists( $theme_directory . $theme_file ) ) {

				if ( $load ) {
					if ( $require_once ) {
						require_once $theme_directory . $theme_file;
					} else {
						require $theme_directory . $theme_file;
					}
				}

				return $theme_directory . $theme_file;
			}
		}

		return FALSE;
	}
}


if ( ! function_exists( 'better_reviews_review_box_style_options' ) ) {
	/**
	 * List of review box style options
	 *
	 * @since 1.3.0
	 * @return array
	 */
	function better_reviews_review_box_style_options( $default = FALSE ) {

		$options = array();

		if ( $default ) {
			$options['default'] = array(
				'img'   => Better_Reviews::dir_url( 'img/options/style-default.png?v=' . Better_Reviews::$version ),
				'label' => __( 'Default', 'better-studio' ),
			);
		}

		$options['big-1']  = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-big-1.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Big 1', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Big', 'better-studio' ),
				),
			),
		);
		$options['big-2']  = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-big-2.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Big 2', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Big', 'better-studio' ),
				),
			),
		);
		$options['big-3']  = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-big-3.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Big 3', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Big', 'better-studio' ),
				),
			),
		);
		$options['big-4']  = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-big-4.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Big 4', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Big', 'better-studio' ),
				),
			),
		);
		$options['big-5']  = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-big-5.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Big 5', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Big', 'better-studio' ),
				),
			),
		);
		$options['tall-1'] = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-tall-1.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Tall 1', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Tall', 'better-studio' ),
				),
			),
		);
		$options['tall-2'] = array(
			'img'   => Better_Reviews::dir_url( 'img/options/style-tall-2.png?v=' . Better_Reviews::$version ),
			'label' => __( 'Tall 2', 'better-studio' ),
			'depth' => 0,
			'info'  => array(
				'cat' => array(
					__( 'Tall', 'better-studio' ),
				),
			),
		);

		return $options;
	} // better_reviews_review_box_style_options
}
