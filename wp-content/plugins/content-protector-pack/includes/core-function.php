<?php

if ( ! function_exists( 'cpp_option' ) ) {

	/**
	 * Get Content Protector Pack option.
	 *
	 * @param string $option_key
	 *
	 * @since 1.0.0
	 * @return mixed
	 */
	function cpp_option( $option_key ) {

		return bf_get_option( $option_key, Content_Protector_Pack::$panel_id );
	}
}


if ( ! function_exists( 'cpp_is_amp' ) ) {
	/**
	 * Detects active AMP page & plugin
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function cpp_is_amp() {

		static $is_amp;

		if ( ! is_null( $is_amp ) ) {
			return $is_amp;
		}

		// BetterAMP plugin
		if ( function_exists( 'is_better_amp' ) && is_better_amp() ) {
			$is_amp = 'better';
		} // Official AMP Plugin
		elseif ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			$is_amp = 'amp';
		} else {
			$is_amp = false;
		}

		return $is_amp;
	}
}


if ( ! function_exists( 'cpp_module_path' ) ) {

	/**
	 * Get absolute path to the module
	 *
	 * @param string $path
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function cpp_module_path( $path = '' ) {

		$path = ltrim( $path, '/' );

		return Content_Protector_Pack::dir_path( "includes/modules/$path" );
	}
}

if ( ! function_exists( 'cpp_module_uri' ) ) {

	/**
	 * Get url to the module
	 *
	 * @param string $path
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function cpp_module_uri( $path = '' ) {

		$path = ltrim( $path, '/' );

		return Content_Protector_Pack::dir_url( "includes/modules/$path" );
	}
}


if ( ! function_exists( 'cpp_hosts' ) ) {

	/**
	 * Get list of website domains.
	 *
	 * todo: add support for parked domains
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function cpp_hosts() {

		$host = parse_url( site_url( '/' ), PHP_URL_HOST );

		if ( substr( $host, 0, 4 ) === 'www.' ) {

			$host = substr( $host, 4 );
		}

		return array( $host );
	}
}


if ( ! function_exists( 'cpp_list_pages' ) ) {

	/**
	 * List available pages.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function cpp_list_pages() {

		$results = array(
			0 => __( 'None', 'content-protector-pack' )
		);

		if ( ! $pages = get_pages( 'post_status=publish,private' ) ) {
			return $results;
		}

		foreach ( $pages as $page ) {

			$results[ $page->ID ] = empty( $page->post_title ) ? sprintf( '(page: %d)', $page->ID ) : $page->post_title;
		}

		return $results;
	}
}


if ( ! function_exists( 'cpp_list_user_roles' ) ) {

	/**
	 * List available user roles.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function cpp_list_user_roles() {

		$results = array(
			0 => __( 'None', 'content-protector-pack' )
		);

		foreach ( get_editable_roles() as $role => $info ) {

			$results[ $role ] = $info['name'];
		}

		return $results;
	}
}


if ( ! function_exists( 'cpp_list_taxonomies' ) ) {

	/**
	 * List available and public taxonomies.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function cpp_list_taxonomies() {

		$results    = array(
			0 => __( 'None', 'content-protector-pack' )
		);
		$taxonomies = get_taxonomies( array( 'public' => true, ) );
		unset( $taxonomies['post_format'] );

		foreach ( $taxonomies as $id => $_ ) {

			if ( $object = get_taxonomy( $id ) ) {

				$results[ $id ] = $object->label;
			}
		}

		return $results;
	}
}


if ( ! function_exists( 'cpp_list_post_types' ) ) {

	/**
	 * List available and public post types.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function cpp_list_post_types() {

		$results = array(
			0 => __( 'None', 'content-protector-pack' )
		);

		foreach (
			get_post_types( array(
				'public'             => true,
				'publicly_queryable' => true
			) ) as $post_type => $_
		) {

			if ( ! $post_type_object = get_post_type_object( $post_type ) ) {
				continue;
			}

			$results[ $post_type ] = $post_type_object->label;
		}

		return $results;
	}
}
