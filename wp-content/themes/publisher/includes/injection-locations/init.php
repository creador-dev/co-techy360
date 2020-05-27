<?php
/**
 * init.php
 *---------------------------
 * Publisher injection locations functionality
 */

$GLOBALS['publisher_injection_location_status'] = false;

if ( ! function_exists( 'publisher_can_inject' ) ) {
	/**
	 * Determines the injections location is active or not
	 *
	 * @param string $location_id
	 *
	 * @return bool|mixed|null The page ID
	 */
	function publisher_can_inject( $location_id = '' ) {

		if ( ! $location_id ) {
			return false;
		}

		// Cache it
		{
			static $locations = array();

			if ( isset( $locations[ $location_id ] ) ) {
				return $locations[ $location_id ];
			}
		}

		//
		// Detect location form admin panel
		//
		{
			$option = false;

			if ( publisher_is_valid_cpt() ) {

				$option = bf_get_post_meta( "injection_disable_all" );

				if ( ! $option ) {
					$option = (boolean) bf_get_post_meta( "injection_$location_id" );
				}
			} elseif ( publisher_is_valid_tax() ) {
				$option = bf_get_term_meta( "injection_disable_all" );

				if ( ! $option ) {
					$option = (boolean) bf_get_term_meta( "injection_$location_id" );
				}
			}

			if ( ! $option ) {
				$option = publisher_get_option( "injection_$location_id" );
			}
		}

		return $locations[ $location_id ] = $option;
	}
}


// Setup continue reading
add_action( 'template_redirect', 'publisher_init_injection_locations' );


if ( ! function_exists( 'publisher_init_injection_locations' ) ) {
	/**
	 * Adds appropriate hooks for injection locations
	 */
	function publisher_init_injection_locations() {

		if ( publisher_can_inject( 'before_header' ) ) {
			add_action( 'publisher/main-wrap/before', 'publisher_inject_location_before_header' );
		}

		if ( publisher_can_inject( 'after_header' ) ) {
			add_action( 'publisher/content-wrap/before', 'publisher_inject_location_after_header' );
		}

		if ( publisher_can_inject( 'post_after_header' ) && is_single() ) {
			add_action( 'publisher/content-wrap/before', 'publisher_inject_location_post_after_header' );
		}

		if ( publisher_can_inject( 'post_before_footer' ) && is_single() ) {
			add_action( 'publisher/main-wrap/end', 'publisher_inject_location_post_before_footer' );
		}

		if ( publisher_can_inject( 'before_footer' ) ) {
			add_action( 'publisher/main-wrap/end', 'publisher_inject_location_before_footer' );
		}

		if ( publisher_can_inject( 'after_footer' ) ) {
			add_action( 'publisher/main-wrap/after', 'publisher_inject_location_after_footer' );
		}

		if ( publisher_can_inject( 'category_after_header' ) ) {
			add_action( 'publisher/archive/before-loop', 'publisher_inject_location_category_after_header' );
		}

		if ( publisher_can_inject( 'category_after_posts' ) ) {
			add_action( 'publisher/archive/after-loop', 'publisher_inject_location_category_after_posts' );
		}

		if ( publisher_can_inject( 'tag_after_header' ) ) {
			add_action( 'publisher/archive/before-loop', 'publisher_inject_location_tag_after_header' );
		}

		if ( publisher_can_inject( 'tag_after_posts' ) ) {
			add_action( 'publisher/archive/after-loop', 'publisher_inject_location_tag_after_posts' );
		}

	}
}


if ( ! function_exists( 'publisher_inject_location_before_header' ) ) {
	/**
	 * Before header
	 */
	function publisher_inject_location_before_header() {

		publisher_inject_location( 'before_header' );
	}
}


if ( ! function_exists( 'publisher_inject_location_after_header' ) ) {
	/**
	 * After header
	 */
	function publisher_inject_location_after_header() {

		publisher_inject_location( 'after_header' );
	}
}

if ( ! function_exists( 'publisher_inject_location_post_after_header' ) ) {
	/**
	 * After header in posts
	 */
	function publisher_inject_location_post_after_header() {

		publisher_inject_location( 'post_after_header' );
	}
}


if ( ! function_exists( 'publisher_inject_location_post_before_footer' ) ) {
	/**
	 * Before footer in posts
	 */
	function publisher_inject_location_post_before_footer() {

		publisher_inject_location( 'post_before_footer' );
	}
}

if ( ! function_exists( 'publisher_inject_location_before_footer' ) ) {
	/**
	 * Before footer
	 */
	function publisher_inject_location_before_footer() {

		publisher_inject_location( 'before_footer' );
	}
}


if ( ! function_exists( 'publisher_inject_location_after_footer' ) ) {
	/**
	 * After footer
	 */
	function publisher_inject_location_after_footer() {

		publisher_inject_location( 'after_footer' );
	}
}


if ( ! function_exists( 'publisher_inject_location_category_after_header' ) ) {
	/**
	 * After footer
	 */
	function publisher_inject_location_category_after_header() {

		if ( publisher_is_valid_tax() ) {
			publisher_inject_location( 'category_after_header' );
		}
	}
}


if ( ! function_exists( 'publisher_inject_location_category_after_posts' ) ) {
	/**
	 * After footer
	 */
	function publisher_inject_location_category_after_posts() {

		if ( publisher_is_valid_tax() ) {
			publisher_inject_location( 'category_after_posts' );
		}
	}
}


if ( ! function_exists( 'publisher_inject_location_tag_after_header' ) ) {
	/**
	 * After footer
	 */
	function publisher_inject_location_tag_after_header() {

		if ( publisher_is_valid_tax( 'tag' ) ) {
			publisher_inject_location( 'tag_after_header' );
		}
	}
}


if ( ! function_exists( 'publisher_inject_location_tag_after_posts' ) ) {
	/**
	 * After footer
	 */
	function publisher_inject_location_tag_after_posts() {

		if ( publisher_is_valid_tax( 'tag' ) ) {
			publisher_inject_location( 'tag_after_posts' );
		}
	}
}


if ( ! function_exists( 'publisher_inject_location' ) ) {
	/**
	 * Injects a location from location ID
	 *
	 * @param $location_id
	 */
	function publisher_inject_location( $location_id ) {

		$page = publisher_can_inject( $location_id );

		// if the injection location is a boolean value
		// it means comes from override (disable)
		if ( $page === true || $page === false ) {
			return;
		}

		$content         = false;
		$page_layout     = publisher_get_page_layout_file();
		$injector_status = BF_Content_Inject::$working;

		if ( $page && ( $page_object = get_post( $page ) ) ) {

			publisher_inject_location_set_status( $location_id );
			BF_Content_Inject::$working = false;

			$content = bf_the_content_by_id( $page, array( 'echo' => false, 'context' => 'inject_location' ) );

			BF_Content_Inject::$working = $injector_status;
			publisher_inject_location_set_status( $location_id ); // clear
		}

		//
		// show injection content
		//
		if ( $content ) {
			echo "<div class='bs-injection bs-injection-$location_id bs-injection-$page_layout bs-vc-content'>$content</div>";
		}

	} // publisher_inject_location
}


if ( ! function_exists( 'publisher_inject_location_get_status' ) ) {
	/**
	 * Returns current active injection location ID or false
	 *
	 * @return mixed
	 */
	function publisher_inject_location_get_status() {

		global $publisher_injection_location_status;

		return $publisher_injection_location_status;

	}
}


if ( ! function_exists( 'publisher_inject_location_set_status' ) ) {
	/**
	 * Sets current active injection location ID or clear it!
	 *
	 * @param bool $location
	 */
	function publisher_inject_location_set_status( $location = false ) {

		global $publisher_injection_location_status;

		$publisher_injection_location_status = $location;
	}
}

/**
 * Compatible inject location with 'Ultimate VC Addons' plugin
 *
 * To enqueue needed scripts & css in injected post content.
 *
 * @since 5.2.0
 */
if ( class_exists( 'Ultimate_VC_Addons' ) ) {

	/**
	 * We add post content of all injected locations to 'Ultimate VC Addons' script loader
	 * To determine which script and styles must enqueue and print in the page.
	 *
	 * @since 5.2.0
	 */
	add_filter( 'ultimate_front_scripts_post_content', 'publisher_inject_location_uva_compatibility' );

	/**
	 * 'Ultimate VC Addons' do not work and enqueue static files in 404 & search page.
	 *
	 * To bypass this limitation we temporary tell lie and return false for all is_search() & is_404() function calls.
	 *
	 * @since 5.2.0
	 */
	add_action( 'wp_enqueue_scripts', 'publisher_inject_location_before_uva', 98.9 );
	add_action( 'wp_enqueue_scripts', 'publisher_inject_location_after_uva', 99.1 );

	if ( ! function_exists( 'publisher_inject_location_uva_compatibility' ) ) {

		/**
		 * Append all injected locations post content to 'Ultimate VC Addons' script loader
		 *
		 * @hooked ultimate_front_scripts_post_content
		 *
		 * @param string $post_content
		 *
		 * @since  5.2.0
		 * @return string
		 */
		function publisher_inject_location_uva_compatibility( $post_content ) {

			$all_locations = array(
				'before_header',
				'after_header',
				'before_footer',
				'after_footer',
			);

			foreach ( $all_locations as $location ) {

				if ( ! $post_id = publisher_can_inject( $location ) ) {
					continue;
				}

				if ( ! $post_object = get_post( $post_id ) ) {
					continue;
				}

				$post_content .= ' ';
				$post_content .= $post_object->post_content;
			}

			return $post_content;
		}
	}

	if ( ! function_exists( 'publisher_inject_location_before_uva' ) ) {

		/**
		 * Set is_404 and is_search of wp main query to false.
		 *
		 * @since 5.2.0
		 */
		function publisher_inject_location_before_uva() {

			global $wp_query, $publisher_inject_location_uva_compatibility;

			$publisher_inject_location_uva_compatibility['is_404']    = is_404();
			$publisher_inject_location_uva_compatibility['is_search'] = is_search();

			$wp_query->is_404    = false;
			$wp_query->is_search = false;
		}

	}

	if ( ! function_exists( 'publisher_inject_location_after_uva' ) ) {

		/**
		 * Reset wp main query manipulations.
		 *
		 * @since 5.2.0
		 */
		function publisher_inject_location_after_uva() {

			global $wp_query, $publisher_inject_location_uva_compatibility;

			$wp_query->is_404    = $publisher_inject_location_uva_compatibility['is_404'];
			$wp_query->is_search = $publisher_inject_location_uva_compatibility['is_search'];

			unset( $publisher_inject_location_uva_compatibility );
		}
	}
}
