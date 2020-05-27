<?php


if ( ! function_exists( 'publisher_is_valid_cpt' ) ) {
	/**
	 * Handy function to detect current post is valid post type for post options or not!
	 *
	 * @param string $type
	 *
	 * @since 1.7
	 * @return bool
	 */
	function publisher_is_valid_cpt( $type = 'both' ) {

		if ( ! is_admin() && ! is_singular() ) {
			return false;
		}

		static $valid;

		if ( ! is_null( $valid ) && isset( $valid[ $type ] ) ) {
			return $valid[ $type ];
		}

		if ( publisher_get_option( 'advanced_post_options_types' ) ) {
			$post_types = array_flip( explode( ',', publisher_get_option( 'advanced_post_options_types' ) ) );
		} else {
			$post_types = array();
		}

		if ( $type === 'both' ) {
			$post_types['post'] = '';
			$post_types['page'] = '';
		} elseif ( $type === 'post' ) {
			$post_types['post'] = '';
		} elseif ( $type === 'page' ) {
			$post_types['page'] = '';
		}

		return $valid[ $type ] = isset( $post_types[ get_post_type() ] );

	}
}


if ( ! function_exists( 'publisher_is_valid_tax' ) ) {
	/**
	 * Handy function to detect current post is valid taxonomy for category options or not!
	 *
	 * @param string $type
	 * @param bool   $queried_object
	 *
	 * @since 1.7
	 * @return bool
	 */
	function publisher_is_valid_tax( $type = 'category', $queried_object = false ) {

		static $valid;

		if ( ! is_null( $valid ) && isset( $valid[ $type ] ) ) {
			return $valid[ $type ];
		}

		if ( $type === 'category' ) {

			if ( ! $queried_object ) {
				if ( is_category() ) {
					return $valid[ $type ] = true;
				} elseif ( ! is_tax() ) {
					return $valid[ $type ] = false;
				}
			}

			if ( publisher_get_option( 'advanced_category_options_tax' ) ) {
				$taxonomies = array_flip( explode( ',', publisher_get_option( 'advanced_category_options_tax' ) ) );
			}

		} elseif ( $type === 'tag' ) {

			$type = 'post_tag'; // Tag taxonomy

			if ( ! $queried_object ) {
				if ( is_tag() ) {
					return $valid[ $type ] = true;
				} elseif ( ! is_tax() ) {
					return $valid[ $type ] = false;
				}
			}

			if ( publisher_get_option( 'advanced_tag_options_tax' ) ) {
				$taxonomies = array_flip( explode( ',', publisher_get_option( 'advanced_tag_options_tax' ) ) );
			}

		} else {
			return $valid[ $type ] = false;
		}

		$taxonomies[ $type ] = '';

		if ( ! is_object( $queried_object ) ) {
			$queried_object = get_queried_object();
		}

		if ( ! isset( $queried_object->taxonomy ) ) {
			return $valid[ $type ] = false;
		}

		return $valid[ $type ] = isset( $taxonomies[ $queried_object->taxonomy ] );

	}
}
