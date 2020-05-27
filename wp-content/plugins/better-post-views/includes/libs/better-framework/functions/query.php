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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


if ( ! function_exists( 'bf_get_pages' ) ) {
	/**
	 * Get Pages
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 2.3
	 *
	 * @return array
	 */
	function bf_get_pages( $extra = array() ) {

		/*
			Extra Usage:

			array(
				'sort_order'        =>  'ASC',
				'sort_column'       =>  'post_title',
				'hierarchical'      =>  1,
				'exclude'           =>  '',
				'include'           =>  '',
				'meta_key'          =>  '',
				'meta_value'        =>  '',
				'authors'           =>  '',
				'child_of'          =>  0,
				'parent'            =>  -1,
				'exclude_tree'      =>  '',
				'number'            =>  '',
				'offset'            =>  0,
				'post_type'         =>  'page',
				'post_status'       =>  'publish'
			)

		*/

		if ( ! empty( $extra['advanced-label'] ) ) {
			$advanced_label = TRUE;
			unset( $extra['advanced-label'] );

			if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) {
				$front_page = get_option( 'page_on_front' );
			} else {
				$front_page = - 1;
			}
		} else {
			$advanced_label = FALSE;
			$front_page     = - 1;
		}

		$output = array();


		$query = get_pages( $extra );

		foreach ( $query as $page ) {

			/** @var WP_Post $page */

			if ( $advanced_label ) {

				$append = '';

				if ( $page->post_status === 'private' ) {
					$append .= '(' . __( 'Private', 'better-studio' ) . ')';
				} elseif ( $page->post_status === 'draft' ) {
					$append .= '(' . __( 'Draft', 'better-studio' ) . ')';
				}

				if ( $page->ID == $front_page ) {
					$append .= '(' . __( 'Front Page', 'better-studio' ) . ')';
				}

				if ( ! empty( $append ) ) {
					$output[ $page->ID ] = $page->post_title . ' - ' . $append;
				} else {
					$output[ $page->ID ] = $page->post_title;
				}

			} else {
				$output[ $page->ID ] = $page->post_title;
			}
		}

		return $output;

	} // bf_get_pages
} // if


if ( ! function_exists( 'bf_get_posts' ) ) {

	/**
	 * Get Posts
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 2.3
	 *
	 * @return array
	 */
	function bf_get_posts( $extra = array() ) {

		/*
			Extra Usage:

			array(
				'posts_per_page'  => 5,
				'offset'          => 0,
				'category'        => '',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'include'         => '',
				'exclude'         => '',
				'meta_key'        => '',
				'meta_value'      => '',
				'post_type'       => 'post',
				'post_mime_type'  => '',
				'post_parent'     => '',
				'post_status'     => 'publish',
				'suppress_filters' => true
			)
		*/

		$output = array();

		$query = get_posts( $extra );

		foreach ( $query as $post ) {
			$output[ $post->ID ] = $post->post_title;
		}

		return $output;

	} // bf_get_posts

} // if


if ( ! function_exists( 'bf_get_random_post_link' ) ) {
	/**
	 * Get an link for a random post
	 *
	 * @param bool $echo
	 *
	 * @return bool|string
	 */
	function bf_get_random_post_link( $echo = TRUE ) {

		$query = new WP_Query(
			array(
				'orderby'        => 'rand',
				'posts_per_page' => '1'
			)
		);

		if ( $echo ) {
			echo get_permalink( $query->posts[0] ); // escaped before inside WP Core
		} else {
			return get_permalink( $query->posts[0] );
		}

	} // bf_get_random_post_link
} // if


if ( ! function_exists( 'bf_get_categories' ) ) {
	/**
	 * Get categories
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_categories( $extra = array() ) {

		/*
			Extra Usage:

			array(
				'type'          => 'post',
				'child_of'      => 0,
				'parent'        => '',
				'orderby'       => 'name',
				'order'         => 'ASC',
				'hide_empty'    => 1,
				'hierarchical'  => 1,
				'exclude'       => '',
				'include'       => '',
				'number'        => '',
				'taxonomy'      => 'category',
				'pad_counts'    => false
			)
		*/

		$output = array();

		$query = get_categories( $extra );

		foreach ( $query as $cat ) {
			$output[ $cat->cat_ID ] = $cat->name;
		}

		return $output;

	} // bf_get_categories
} // if


if ( ! function_exists( 'bf_get_categories_by_slug' ) ) {
	/**
	 * Get categories
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_categories_by_slug( $extra = array() ) {

		/*
			Extra Usage:

			array(
				'type'          => 'post',
				'child_of'      => 0,
				'parent'        => '',
				'orderby'       => 'name',
				'order'         => 'ASC',
				'hide_empty'    => 1,
				'hierarchical'  => 1,
				'exclude'       => '',
				'include'       => '',
				'number'        => '',
				'taxonomy'      => 'category',
				'pad_counts'    => false
			)
		*/

		$output = array();

		$query = get_categories( $extra );

		foreach ( $query as $cat ) {
			$output[ $cat->slug ] = $cat->name;
		}

		return $output;

	} // bf_get_categories_by_slug
} // if


if ( ! function_exists( 'bf_get_tags' ) ) {
	/**
	 * Get Tags
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return mixed
	 */
	function bf_get_tags( $extra = array() ) {

		$output = array();
		$query  = get_tags( $extra );

		foreach ( $query as $tag ) {
			$output[ $tag->term_id ] = $tag->name;
		}

		return $output;

	} // bf_get_tags
} // if


if ( ! function_exists( 'bf_get_users' ) ) {
	/**
	 * Get users
	 *
	 * @param array      $extra           Extra Options.
	 * @param array|bool $advanced_output Advanced Query is the results with query other resutls
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_users( $extra = array(), $advanced_output = FALSE ) {

		$output = array();

		$extra = bf_merge_args(
			$extra,
			array(
				'orderby' => 'post_count',
				'order'   => 'DESC'
			)
		);

		$advanced_label = isset( $extra['advanced-label'] ) && $extra['advanced-label'];

		if ( $advanced_label ) {

			$current_user = wp_get_current_user();
		}

		$query = new WP_User_Query( $extra );

		foreach ( $query->results as $user ) {

			if ( $advanced_label ) {

				$label = $user->data->display_name . " ({$user->data->user_login})";

				if ( $user->data->ID === $current_user->get( 'ID' ) ) {
					$label = __( 'Me: ', 'better-studio' ) . $label;
				}

				$output[ $user->data->ID ] = $label;
			} else {
				$output[ $user->data->ID ] = $user->data->display_name;
			}
		}

		if ( $advanced_output ) {
			// Unset the result for make free the memory
			unset( $query->results );

			return array( $output, $query );
		}

		return $output;

	} // bf_get_users
} // if


if ( ! function_exists( 'bf_get_post_types' ) ) {
	/**
	 * Get Post Types
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_post_types( $extra = array() ) {

		$output = array();

		if ( ! isset( $extra['exclude'] ) || ! is_array( $extra['exclude'] ) ) {
			$extra['exclude'] = array();
		}

		// Add revisions, nave menu and attachment post types to excludes
		$extra['exclude'] = array_merge( $extra['exclude'], array( 'revision', 'nav_menu_item', 'attachment' ) );

		$query = get_post_types();

		foreach ( $query as $key => $val ) {

			if ( in_array( $key, $extra['exclude'] ) ) {
				continue;
			}

			$output[ $key ] = ucfirst( $val );
		}

		return $output;

	} // bf_get_post_types
} // if


if ( ! function_exists( 'bf_get_page_templates' ) ) {
	/**
	 * Get Page Templates
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return mixed
	 */
	function bf_get_page_templates( $extra = array() ) {

		$output = array();

		if ( ! isset( $extra['exclude'] ) || ! is_array( $extra['exclude'] ) ) {
			$extra['exclude'] = array();
		}

		$query = wp_get_theme()->get_page_templates();

		foreach ( $query as $key => $val ) {

			if ( in_array( $key, $extra['exclude'] ) ) {
				continue;
			}

			$output[ $key ] = $val;
		}

		return $output;

	} // bf_get_page_templates
} // if


if ( ! function_exists( 'bf_get_taxonomies' ) ) {
	/**
	 * Get Taxonomies
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_taxonomies( $extra = array() ) {

		$output = array();

		$query = get_taxonomies();

		if ( ! isset( $extra['exclude'] ) || ! is_array( $extra['exclude'] ) ) {
			$extra['exclude'] = array();
		}

		foreach ( $query as $key => $val ) {

			if ( in_array( $key, $extra['exclude'] ) ) {
				continue;
			}

			$output[ $key ] = ucfirst( str_replace( '_', ' ', $val ) );
		}

		return $output;

	} // bf_get_taxonomies
} // if


if ( ! function_exists( 'bf_get_terms' ) ) {
	/**
	 * Get All Terms of Specific Taxonomy
	 *
	 * @param array|string $tax   Taxonomy Slug
	 * @param array        $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_terms( $tax = 'category', $extra = array() ) {

		if ( ! isset( $extra['exclude'] ) || ! is_array( $extra['exclude'] ) ) {
			$extra['exclude'] = array();
		}

		$query  = get_terms( $tax, $extra );
		$output = array();

		foreach ( $query as $taxonomy ) {

			if ( in_array( $taxonomy->slug, $extra['exclude'] ) ) {
				continue;
			}

			$output[ $taxonomy->slug ] = $taxonomy->name;
		}

		return $output;

	} // bf_get_terms
}// if


if ( ! function_exists( 'bf_get_roles' ) ) {
	/**
	 * Get Roles
	 *
	 * @param array $extra Extra Options.
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_roles( $extra = array() ) {

		global $wp_roles;

		$output = array();

		if ( ! isset( $extra['exclude'] ) || ! is_array( $extra['exclude'] ) ) {
			$extra['exclude'] = array();
		}

		foreach ( $wp_roles->roles as $key => $val ) {

			if ( in_array( $key, $extra['exclude'] ) ) {
				continue;
			}

			$output[ $key ] = $val['name'];
		}

		return $output;

	} // bf_get_roles
} // if


if ( ! function_exists( 'bf_get_menus' ) ) {
	/**
	 * Get Menus
	 *
	 * @param bool $hide_empty
	 *
	 * @since 1.0
	 * @return array
	 */
	function bf_get_menus( $hide_empty = FALSE ) {

		$output = array();

		$menus = get_terms( 'nav_menu', array( 'hide_empty' => $hide_empty ) );

		foreach ( $menus as $menu ) {
			$output[ $menu->term_id ] = $menu->name;
		}

		return $output;

	} // bf_get_menus
} // if

if ( ! function_exists( 'bf_is_a_category' ) ) {
	/**
	 * Used to detect category from id
	 *
	 * @param null $id
	 *
	 * @return bool|mixed
	 */
	function bf_is_a_category( $id = NULL ) {

		if ( is_null( $id ) ) {
			return FALSE;
		}

		$cat = get_category( $id );

		if ( count( $cat ) > 0 ) {
			return current( $cat );
		} else {
			return FALSE;
		}

	} // bf_is_a_category
} // if


if ( ! function_exists( 'bf_is_a_tag' ) ) {
	/**
	 * Used to detect tag from id
	 *
	 * @param null $id
	 *
	 * @return bool|mixed
	 */
	function bf_is_a_tag( $id = NULL ) {

		if ( is_null( $id ) ) {
			return FALSE;
		}

		$tag = get_tag( $id );

		if ( count( $tag ) > 0 ) {
			return current( $tag );
		} else {
			return FALSE;
		}

	} // bf_is_a_tag
} // if


if ( ! function_exists( 'bf_get_rev_sliders' ) ) {
	/**
	 * Used to find list of all RevolutionSlider Sliders.zip
	 *
	 * @return array
	 */
	function bf_get_rev_sliders() {

		if ( ! class_exists( 'RevSlider' ) ) {
			return array();
		}

		try {

			$slider = new RevSlider();

			return $slider->getArrSlidersShort();

		} catch( Exception $e ) {
			return array();
		}

	} // bf_get_rev_sliders
} // if


if ( ! function_exists( 'bf_get_wp_query_vars' ) ) {
	/**
	 * Creats flatted and valid query_vars from an instance of WP_Query object
	 *
	 * @param WP_Query $wp_query
	 *
	 * @return array
	 */
	function bf_get_wp_query_vars( $wp_query ) {

		if ( ! is_a( $wp_query, 'WP_Query' ) ) {
			return array();
		}

		$args = $wp_query->query_vars;

		// remove empty vars
		foreach ( $args as $_a => $_v ) {
			if ( is_array( $_v ) ) {
				if ( count( $_v ) === 0 ) {
					unset( $args[ $_a ] );
				}
			} else {
				if ( empty( $_v ) || $_v === 0 ) {
					unset( $args[ $_a ] );
				}
			}
		}

		// Remove extra vars
		unset( $args['suppress_filters'] );
		unset( $args['cache_results'] );
		unset( $args['update_post_term_cache'] );
		unset( $args['update_post_meta_cache'] );
		unset( $args['comments_per_page'] );
		unset( $args['no_found_rows'] );
		unset( $args['search_orderby_title'] );

		// create tax query
		if ( ! empty( $args['tax_query']['queries'] ) ) {
			$args['tax_query'] = $args['tax_query']['queries'];
		}

		return $args;

	} // bf_get_wp_query_vars
} // if


if ( ! function_exists( 'bf_get_wp_query_total_pages' ) ) {
	/**
	 * Calculates query total pages with support of offset and custom posts per page
	 *
	 * @param WP_Query $wp_query
	 * @param int      $offset
	 * @param int      $posts_per_page
	 * @param bool     $use_query_offset
	 *
	 * @return float|int
	 */
	function bf_get_wp_query_total_pages( &$wp_query, $offset = 0, $posts_per_page = 0, $use_query_offset = TRUE ) {

		$offset = intval( $offset );

		$posts_per_page = intval( $posts_per_page );
		if ( $posts_per_page <= 0 ) {
			$posts_per_page = $wp_query->get( 'posts_per_page' );

			if ( $posts_per_page <= 0 ) {
				$posts_per_page = $wp_query->get( 'showposts' );
			}
		}

		// use the query offset if it was set
		if ( $use_query_offset && $offset <= 0 ) {

			if ( ! $offset = $wp_query->get( 'original_offset' ) ) { # original_offset is our custom name
				$offset = $wp_query->get( 'offset' );
			}

			$offset = intval( $offset );
		}

		if ( $offset > 0 && empty( $wp_query->_bs_optimization['found-rows'] ) && $posts_per_page > 0 ) {
			$total = ceil( ( $wp_query->found_posts - $offset ) / $posts_per_page );
		} else {
			$total = $wp_query->max_num_pages;
		}

		return $total;
	}
}

if ( ! function_exists( 'bf_get_comment_query_total_pages' ) ) {
	/**
	 * Calculates query total pages with support of offset and custom posts per page
	 *
	 * @param WP_Comment_Query $cm_query
	 * @param int              $offset
	 * @param int              $posts_per_page
	 * @param bool             $use_query_offset
	 *
	 * @return float|int
	 */
	function bf_get_comment_query_total_pages( &$cm_query, $offset = 0, $posts_per_page = 0, $use_query_offset = TRUE ) {

		$offset = intval( $offset );


		$posts_per_page = intval( $posts_per_page );
		if ( $posts_per_page <= 0 ) {
			$posts_per_page = $cm_query->query_vars['number'];
		}

		// use the query offset if it was set
		if ( $use_query_offset && $offset <= 0 ) {
			$offset = $cm_query->query_vars['offset'];
		}


		if ( $offset > 0 && $posts_per_page > 0 ) {
			$total = ceil( ( $cm_query->found_comments - $offset ) / $posts_per_page );
		} else {
			$total = $cm_query->max_num_pages;
		}

		return $total;
	}
}


if ( ! function_exists( 'bf_get_child_categories' ) ) {
	/**
	 * Gets category child or siblings if enabled
	 *
	 * @param null $term        Term object or ID
	 * @param int  $limit       Number of cats
	 * @param bool $or_siblings Return siblings if there is nor child
	 *
	 * @return array
	 */
	function bf_get_child_categories( $term = NULL, $limit = - 1, $or_siblings = FALSE ) {

		if ( ! $term ) {
			return array();
		} elseif ( is_int( $term ) || is_string( $term ) ) {
			$term = get_term( $term, 'category' );
			if ( ! $term || is_wp_error( $term ) ) {
				return array();
			}
		} elseif ( is_object( $term ) && ! is_a( $term, 'WP_Term' ) ) {
			return array();
		}

		// fix limit number for get_categories
		if ( $limit === - 1 ) {
			$limit = 0;
		}

		$cat_args = array(
			'parent'     => $term->term_id,
			'hide_empty' => 0,
			'number'     => $limit === - 1 ? 0 : $limit
		);

		// Get child categories
		$child_categories = get_categories( $cat_args );

		// Get sibling cats if there is no child category
		if ( count( $child_categories ) == 0 && $or_siblings ) {
			$child_categories = bf_get_sibling_categories( $term, $limit );
		}

		return $child_categories;

	} // bf_get_child_categories
} // if


if ( ! function_exists( 'bf_get_sibling_categories' ) ) {
	/**
	 * Gets category siblings
	 *
	 * @param null $term  Term object or ID
	 * @param int  $limit Number of cats
	 *
	 * @return array
	 */
	function bf_get_sibling_categories( $term = NULL, $limit = - 1 ) {

		if ( ! $term ) {
			return array();
		} elseif ( is_int( $term ) || is_string( $term ) ) {
			$term = get_term( $term, 'category' );
			if ( ! $term || is_wp_error( $term ) ) {
				return array();
			}
		} elseif ( is_object( $term ) && ! is_a( $term, 'WP_Term' ) ) {
			return array();
		}

		// fix limit number
		if ( $limit === - 1 ) {
			$limit = 0;
		}

		$cat_args = array(
			'parent'     => $term->parent,
			'hide_empty' => 0,
			'number'     => $limit === - 1 ? 0 : $limit,
			'exclude'    => $term->term_id,
		);

		$child_categories = get_categories( $cat_args );

		return $child_categories;

	} // bf_get_sibling_categories
} // if


if ( ! function_exists( 'bf_get_term_posts_count' ) ) {

	/**
	 * Returns count of all posts of category
	 *
	 * @param null  $term_id
	 * @param array $args
	 *
	 * @return int
	 */
	function bf_get_term_posts_count( $term_id = NULL, $args = array() ) {

		if ( is_null( $term_id ) ) {
			return 0;
		}

		$args = bf_merge_args( $args, array(
			'include_childs' => FALSE,
			'post_type'      => 'post',
			'taxonomy'       => 'category',
			'term_field'     => 'term_id',
		) );


		// simple term posts count using get_term, this will work quicker because of WP Cache
		// but this is not real post count, because this wouldn't count sub terms posts count in hierarchical taxonomies
		if ( ! is_taxonomy_hierarchical( $args['taxonomy'] ) || ! $args['include_childs'] ) {

			$term = get_term( get_queried_object()->term_id, $args['taxonomy'] );

			if ( ! is_wp_error( $term ) ) {
				return $term->count;
			} else {
				return 0;
			}

		} // Real term posts count in hierarchical taxonomies
		else {

			$query = new WP_Query( array(
				'post_type'      => $args['post_type'],
				'tax_query'      => array(
					array(
						'taxonomy' => $args['taxonomy'],
						'field'    => $args['term_field'],
						'terms'    => $term_id,
					),
				),
				'posts_per_page' => 1,
				'fields'         => 'ids',
			) );

			return $query->found_posts;
		}

	} // bf_get_term_posts_count
}

if ( ! function_exists( 'bf_get_term_childs' ) ) {

	/**
	 * Retrieves children of terms as Term IDs - Except the excludes ones
	 *
	 * @param array  $include  List of term_id to include
	 * @param string $taxonomy Term taxonomy
	 * @param array  $exclude  List of term_id to exclude
	 *
	 * @return array
	 */
	function bf_get_term_childs( $include, $exclude = array(), $taxonomy = 'category' ) {

		$hierarchy_struct = _get_term_hierarchy( $taxonomy );
		$parents_ID       = array_keys( $hierarchy_struct );

		$includes_list = array();

		if ( $include ) {
			_bs_get_term_childs( $include, $hierarchy_struct, $exclude, $includes_list );
		}


		$parents = array();
		do {

			$_parents = $parents;
			$parents  = array_intersect(
				$includes_list,
				$parents_ID
			);
			_bs_get_term_childs( $parents, $hierarchy_struct, $exclude, $includes_list );

		} while( sizeOf( $_parents ) !== sizeOf( $parents ) );

		return $includes_list;
	}


	function _bs_get_term_childs( $terms_id, $hierarchy_struct, $exclude, &$includes_list ) {

		foreach ( $terms_id as $maybe_parent ) {
			$includes_list[] = $maybe_parent;

			if ( isset( $hierarchy_struct[ $maybe_parent ] ) ) {

				$includes_list = array_merge( array_diff( $hierarchy_struct[ $maybe_parent ], $exclude ), $includes_list );
				#$exclude_list = array_merge( array_intersect( $exclude, $hierarchy_struct[ $maybe_parent ] ), $exclude_list ); // List of childrens ID to exclude
			}

		}

		$includes_list = array_unique( $includes_list );
		#$exclude_list  = array_unique( $exclude_list );
	}
}


if ( ! function_exists( 'bf_taxonomy_supports_post_type' ) ) {
	/**
	 * Checks taxonomy to make sure that was added to a post type
	 *
	 * @param $taxonomy
	 * @param $post_type
	 *
	 * @return bool|mixed
	 */
	function bf_taxonomy_supports_post_type( $taxonomy, $post_type ) {

		static $supports;

		if ( is_null( $supports ) ) {
			$supports = array();
		}

		if ( isset( $supports[ $post_type ] ) ) {
			return $supports[ $post_type ];
		}

		global $wp_taxonomies;

		if ( empty( $wp_taxonomies[ $taxonomy ]->object_type ) ) {
			return $supports[ $post_type ] = FALSE;
		}

		return $supports[ $post_type ] = in_array( $post_type, $wp_taxonomies[ $taxonomy ]->object_type );

	}
}


if ( ! function_exists( 'bf_get_post_attached_media' ) ) {
	/**
	 * Retrieves media attached to the passed post.
	 *
	 * @since 2.8.11
	 *
	 * @param string      $type Mime type.
	 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
	 * @param array       $args
	 *
	 * @return array Found attachments.
	 */
	function bf_get_post_attached_media( $type, $post = 0, $args = array() ) {

		if ( ! $post = get_post( $post ) ) {
			return array();
		}

		$args = bf_merge_args( $args, array(
			'post_parent'    => $post->ID,
			'post_type'      => 'attachment',
			'post_mime_type' => $type,
			'posts_per_page' => - 1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		) );


		/**
		 * Filters arguments used to retrieve media attached to the given post.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $args Post query arguments.
		 * @param string $type Mime type of the desired media.
		 * @param mixed  $post Post ID or object.
		 */
		$args = apply_filters( 'get_attached_media_args', $args, $type, $post );

		$children = get_children( $args );

		/**
		 * Filters the list of media attached to the given post.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $children Associative array of media attached to the given post.
		 * @param string $type     Mime type of the media desired.
		 * @param mixed  $post     Post ID or object.
		 */
		return (array) apply_filters( 'get_attached_media', $children, $type, $post );
	}
}

if ( ! function_exists( 'bf_get_post_primary_cat' ) ) {
	/**
	 * Returns post main category object
	 *
	 * @return array|mixed|null|object|\WP_Error
	 */
	function bf_get_post_primary_cat() {

		$prim_cat = bf_get_post_meta( '_bs_primary_category', NULL, 'auto-detect' );

		if ( $prim_cat === 'auto-detect' ) {

			// Primary category from Yoast SEO plugin
			if ( class_exists( 'WPSEO_Primary_Term' ) ) {

				$prim_cat = get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', TRUE );

				if ( $prim_cat ) {

					$prim_cat = get_category( $prim_cat );

					if ( ! is_wp_error( $prim_cat ) ) {
						return $prim_cat;
					}
				}
			}

		} else {
			$prim_cat = get_category( $prim_cat );

			if ( ! is_wp_error( $prim_cat ) ) {
				return $prim_cat;
			}
		}

		return current( get_the_category() ); // fallback -> first category
	} // bf_get_post_primary_cat
} // if


if ( ! function_exists( 'bf_get_term_link' ) ) {
	/**
	 * Retrieve term link URL.
	 *
	 * @since 1.0.0
	 * @see   get_term_link()
	 *
	 * @param int|object $term Category ID or object.
	 * @param string     $taxonomy
	 *
	 * @return string Link on success, empty string if term does not exist.
	 */
	function bf_get_term_link( $term, $taxonomy = 'category' ) {

		if ( ! is_object( $term ) ) {
			$term = (int) $term;
		}

		$term = get_term_link( $term, $taxonomy );

		if ( is_wp_error( $term ) ) {
			return '';
		}

		return $term;
	}
}

if ( ! function_exists( 'bf_get_attachment_id_by_url' ) ) {
	/**
	 * Get attachment ID of the given url
	 *
	 * @param string $url
	 * @param bool   $deep deep scan, default: false
	 *
	 * @global wpdb  $wpdb wordpress database object
	 * @since 3.0.0
	 * @return int
	 */
	function bf_get_attachment_id_by_url( $url, $deep = FALSE ) {

		global $wpdb;

		$attachment_id = 0;

		if ( ! $deep ) {

			$results = $wpdb->get_col( 'SELECT ID FROM ' . $wpdb->posts .
			                           $wpdb->prepare( ' WHERE guid = %s LIMIT 2', $url )
			);

			if ( count( $results ) === 1 ) {
				$attachment_id = intval( $results[0] );
			}

			return $attachment_id;
		}

		$dir = wp_upload_dir();
		if ( FALSE !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
			$file       = basename( $url );
			$query_args = array(
				'post_type'   => 'attachment',
				'post_status' => 'inherit',
				'fields'      => 'ids',
				'meta_query'  => array(
					array(
						'value'   => $file,
						'compare' => 'LIKE',
						'key'     => '_wp_attachment_metadata',
					),
				)
			);
			$query      = new WP_Query( $query_args );
			if ( $query->have_posts() ) {
				foreach ( $query->posts as $post_id ) {
					$meta                = wp_get_attachment_metadata( $post_id );
					$original_file       = basename( $meta['file'] );
					$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
					if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
						$attachment_id = $post_id;
						break;
					}
				}
			}
		}

		return $attachment_id;
	}
}