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


/**
 * Class BF_Demo_Menu_Manager
 *
 * Create Nav Menu & Nav Menu Item
 */
//TODO: add better-framework menu options support
class BF_Demo_Menu_Manager {

	public $menu_id = 0;


	/**
	 * Get nav menu object
	 *
	 * @param string|int|object $menu Menu ID, slug, or name - or the menu object.
	 *
	 * @return object|bool menu object on success or false on error;
	 */
	protected function get_menu( $menu ) {

		$menu_object = wp_get_nav_menu_object( $menu );
		if ( is_object( $menu_object ) && isset( $menu_object->term_id ) ) {
			return $menu_object;
		}

		return false;
	}


	/**
	 * Try to Create new Menu if not already exists.
	 *
	 * @param string $menu_name name of the navigation menu
	 * @param string $location  navigation menu location registered by register_nav_menu() function.
	 * @param bool   $unique    optional. create unique menu if menu already exists, default true.
	 *
	 * @return array|int|WP_Error return false or WP_Error on failure or array on success.
	 *          array result contain {
	 * @type integer $menu_id   Navigation Menu ID in database
	 * @type bool    $exists    Navigation exists before
	 *          }
	 */
	function create_menu( $menu_name, $location, $unique = true ) {

		if ( $unique ) {
			$original_name = $menu_name;
			$suffix        = 2;
			while( $menu_object = $this->get_menu( $menu_name ) ) {
				$menu_name = $original_name . ' ' . $suffix;
				$suffix ++;
			}
		} else {
			$menu_object = $this->get_menu( $menu_name );
		}

		if ( ! is_object( $menu_object ) || ! isset( $menu_object->term_id ) ) {

			$maybe_menu_id = wp_create_nav_menu( $menu_name );

			if ( is_wp_error( $maybe_menu_id ) ) {

				return $maybe_menu_id;
			}
			$menu_id = &$maybe_menu_id;
			$exists  = false;

		} else {

			$exists  = true;
			$menu_id = &$menu_object->term_id;
		}


		$menu_locations = get_theme_mod( 'nav_menu_locations' );

		// activate the menu only if it's not already active
		if ( empty( $menu_locations[ $location ] ) || $menu_locations[ $location ] != $menu_id ) {
			$menu_locations[ $location ] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $menu_locations );
		}

		$this->menu_id = $menu_id;

		return array( $menu_id, $exists );
	} // create_menu


	/**
	 * @param string $menu Menu ID, slug, or name.
	 *
	 * @return bool true on success or false on failure.
	 */
	public function remove_menu( $menu ) {

		$deleted = wp_delete_nav_menu( $menu );

		return $deleted && ! is_wp_error( $deleted );
	}


	/**
	 * Set active menu id
	 * uses by some methods
	 *
	 * @param int $menu_id
	 *
	 * @return bool true on success or false on failure.
	 */
	public function set_menu_id( $menu_id ) {

		$menu_object = wp_get_nav_menu_object( (int) $menu_id );

		if ( ! is_object( $menu_object ) || ! isset( $menu_object->term_id ) ) {
			return false;
		}

		$this->menu_id = $menu_id;

		return true;
	}


	/**
	 * @param array $menu_params The menu item's data.
	 *
	 * @see wp_update_nav_menu_item() $menu_item_data parameter
	 *
	 * @return int|WP_Error WP_ERROR on failure or item ID on success.
	 */
	public function create_link( $menu_params ) {

		$menu_item_data = bf_merge_args( $menu_params, array(
			'menu-item-object'    => '',
			'menu-item-title'     => '',
			'menu-item-url'       => '',
			'menu-item-type'      => 'custom',
			'menu-item-status'    => 'publish',
			'menu-item-parent-id' => 0
		) );

		if ( ! $menu_item_data['menu-item-title'] && $menu_item_data['menu-item-type'] == 'custom' ) {
			return new WP_Error( 'empty_menu_title', 'menu-item-title cannot be empty!' );
		}

		if ( $menu_item_data['menu-item-type'] === 'post_type' ) {

			//object-id is required param for post_type item type
			if ( empty( $menu_item_data['menu-item-object-id'] ) ) {
				return 0;
			}
			if ( ! $menu_item_data['menu-item-url'] ) {
				$menu_item_data['menu-item-url'] = get_permalink( $menu_item_data['menu-item-object-id'] );
			}

			if ( ! $menu_item_data['menu-item-title'] ) {
				$menu_item_data['menu-item-title'] = get_post_field( 'post_title', $menu_item_data['menu-item-object-id'] );
			}
		}

		$maybe_menu_item_id = wp_update_nav_menu_item( $this->menu_id, 0, $menu_item_data );

		if ( is_wp_error( $maybe_menu_item_id ) ) {
			return $maybe_menu_item_id;
		}

		$menu_item_id = &$maybe_menu_item_id;

		return $menu_item_id;
	} // create_link


	/**
	 * @param array $item_id menu item ID Generated by $this->create_link()
	 *
	 * @return bool true on success or false on failure
	 */
	public function remove_item( $item_id ) {

		//TODO: delete item from nav menu object

		return (bool) wp_delete_post( $item_id, true );
	}


	/**
	 * add "menu-item-" prefix to array indexes
	 *
	 * @param Array $params
	 */
	protected function prepare_menu_params( &$params ) {

		$new_params = array();


		BF_Product_Demo_Installer::data_params_filter( $params );

		foreach ( $params as $key => $value ) {
			$new_params[ 'menu-item-' . $key ] = $value;
		}


		$params = $new_params;
	}


	/**
	 * append custom link to menu
	 * array {
	 *
	 * @type string $title menu title
	 * @type string $url   menu url
	 * }
	 *
	 * @see create_link()
	 *
	 * @param Array $params
	 *
	 * @return int|WP_Error WP_ERROR on failure or item ID on success.
	 */
	public function append_link( $params ) {

		$this->prepare_menu_params( $params );

		return $this->create_link( $params );
	}


	/**
	 * @param int   $page_id page id in database
	 * @param array $params  additional setting
	 *
	 * @see create_menu()
	 *
	 * @return int|WP_Error WP_ERROR on failure or item ID on success.
	 */
	public function append_page_link( $page_id, $params = array() ) {

		$params = bf_merge_args( $params, array(
			'object'    => 'page',
			'type'      => 'post_type',
			'object-id' => $page_id
		) );

		$this->prepare_menu_params( $params );

		return $this->create_link( $params );
	}


	/**
	 * append custom post type link to menu
	 *
	 * @param int    $post_id   Post ID in Database
	 * @param string $post_type Post Type
	 * @param array  $params
	 *
	 * @see create_link()
	 *
	 * @return int|WP_Error WP_ERROR on failure or item ID on success.
	 */
	public function append_post_link( $post_id, $post_type = 'post', $params = array() ) {

		$params = bf_merge_args( $params, array(
			'object'    => $post_type,
			'type'      => 'post_type',
			'object-id' => $post_id
		) );

		$this->prepare_menu_params( $params );

		return $this->create_link( $params );
	}


	/**
	 * append taxonomy link to menu
	 *
	 * @param int    $term_id  Term ID in Database
	 * @param string $taxonomy The taxonomy name to use
	 * @param array  $params
	 *
	 * @return int|bool|WP_Error WP_ERROR or false on failure or item ID on success.
	 */
	public function append_taxonomy_link( $term_id, $taxonomy, $params = array() ) {

		if ( ! taxonomy_exists( $taxonomy ) ) {
			return false;
		}

		settype( $term_id, 'int' );

		if ( ! term_exists( $term_id, $taxonomy ) ) {
			return false;
		}

		$params = bf_merge_args( $params, array(
			'object-id' => $term_id,
			'type'      => 'taxonomy',
			'object'    => $taxonomy,
			'url'       => get_term_link( $term_id, $taxonomy )
		) );


		$this->prepare_menu_params( $params );

		return $this->create_link( $params );
	}


	/**
	 * append category item to menu
	 *
	 * @param int $category_id
	 *
	 * @see append_taxonomy_link()
	 *
	 * @return int|bool|WP_Error WP_ERROR or false on failure or item ID on success.
	 */

	public function append_category_link( $category_id ) {

		return $this->append_taxonomy_link( $category_id, 'category' );
	}


	/**
	 * append tag item to menu
	 *
	 * @param int $tag_id
	 *
	 * @see append_taxonomy_link()
	 *
	 * @return int|bool|WP_Error WP_ERROR or false on failure or item ID on success.
	 */
	public function append_tag_link( $tag_id ) {

		return $this->append_taxonomy_link( $tag_id, 'post_tag' );
	}

}
