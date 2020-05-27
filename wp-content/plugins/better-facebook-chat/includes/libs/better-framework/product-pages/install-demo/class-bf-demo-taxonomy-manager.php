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
 * Class BF_Demo_Taxonomy_Manager
 */
class BF_Demo_Taxonomy_Manager {


	/**
	 * prepare term params. add default indexes and filter some indexes.
	 *
	 * @param array $term_params
	 */
	protected function parse_term_params( &$term_params ) {

		$term_params = bf_merge_args( $term_params, array(
			'term_id'  => '',
			'name'     => '',
			'slug'     => '',
			'taxonomy' => 'category',
		) );

		BF_Product_Demo_Installer::data_params_filter( $term_params );
	}


	/**
	 * Add a new term to the database.
	 *
	 * @param array $term_params
	 *
	 * @return array|WP_Error WP_Error or empty array on failure or An array containing the `term_id` and
	 *                        `term_taxonomy_id` on success
	 *
	 */
	public function add_term( $term_params ) {

		$this->parse_term_params( $term_params );

		if ( ! $term_params['name'] ) {
			return new WP_Error( 'empty_term_name', 'term name could not be empty.' );
		}

		if ( empty( $term_params['slug'] ) ) {
			$term_params['slug'] = 'bs-' . sanitize_title( $term_params['name'] );
		}

		// Term Exists!? try to make unique copy!
		{
			$term_id = term_exists( $term_params['name'], $term_params['taxonomy'] );

			if ( $term_id !== 0 && $term_id !== null ) {
				$term_params['slug'] .= '-' . mt_rand( 1000, 100000 );
			}
		}

		$added_term = wp_insert_term( $term_params['name'], $term_params['taxonomy'], $term_params );

		if ( is_wp_error( $added_term ) ) {
			return $added_term;
		}

		if ( isset( $added_term['term_id'] ) ) {
			return $added_term['term_id'];
		}

		return array();
	}


	/**
	 * Removes a term from the database.
	 *
	 * @param array $term_params
	 *
	 * @return bool|int|WP_Error true on success, false if term does not exist. Zero on attempted
	 *                           deletion of default Category. WP_Error if the taxonomy does not exist.
	 */
	public function remove_term_by_params( $term_params ) {

		$this->parse_term_params( $term_params );

		return wp_delete_term( $term_params['term_id'], $term_params['taxonomy'], $term_params );
	}


	/**
	 * Removes a term from the database by unique term ID,
	 *
	 * @param int $term_id
	 *
	 * @return bool true on success or false on failure.
	 */
	public function remove_term( $term_id ) {

		settype( $term_id, 'integer' );


		$term = $this->get_term( $term_id );

		if ( $term && ! is_wp_error( $term ) ) {

			$deleted = wp_delete_term( intval( $term_id ), $term->taxonomy );

			return $deleted && ! is_wp_error( $deleted );
		}

		return false;
	}


	/**
	 * Get term just by term id
	 *
	 * get_term $taxonomy param become optional since version 4.4.0
	 * this function pass taxonomy param for version before 4.4.0
	 *
	 * @param int     $term_id    unique term id in database
	 *
	 * @global string $wp_version wordpress version number
	 *
	 * @return mixed|null|WP_Error
	 * @see get_term()
	 */
	public function get_term( $term_id ) {

		global $wp_version;


		$params = array( $term_id );
		if ( version_compare( '4.4.0', $wp_version, '>' ) ) {
			//its older version!
			$params[1] = $this->get_taxonomy_by_term_id( $term_id );
		}

		return call_user_func_array( 'get_term', $params );
	}


	/**
	 * get term taxonomy by term ID
	 *
	 * @param       $term_id
	 *
	 * @global wpdb $wpdb wordpress database object
	 *
	 * @return bool|string not a empty string on success empty string or false otherwise.
	 */
	protected function get_taxonomy_by_term_id( $term_id ) {

		global $wpdb;

		$taxonomy = wp_cache_get( $term_id, 'term-id-taxonomy' );

		if ( $taxonomy === false ) {
			$taxonomy = $wpdb->get_var( $wpdb->prepare( "SELECT taxonomy FROM $wpdb->term_taxonomy WHERE term_id = %d", $term_id ) );
			wp_cache_add( $term_id, $taxonomy, 'term-id-taxonomy' );
		}

		return $taxonomy;
	}


	/**
	 *
	 * prepare a array with three index to pass add,delete,update term meta function
	 *  via call_user_func_array function.
	 *
	 * @param array $term_meta_params
	 *
	 * @return array none empty array on success
	 */
	protected function get_meta_params( $term_meta_params ) {

		$required_params = array(
			'term_id'    => '',
			'meta_key'   => '',
			'meta_value' => '',
		);

		if ( ! array_diff_key( $required_params, $term_meta_params ) ) {

			return array(
				$term_meta_params['term_id'],
				$term_meta_params['meta_key'],
				$term_meta_params['meta_value']
			);
		}

		return array();
	}


	/**
	 *
	 * Adds metadata to a term.
	 *
	 * @param array $term_meta_params
	 *
	 * @return int|WP_Error|bool Meta ID on success. WP_Error when term_id is ambiguous between taxonomies.
	 *                           False on failure.
	 */
	public function add_term_meta( $term_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $term_meta_params ) ) {
			return call_user_func_array( 'bf_add_term_meta', $meta_params );
		}

		return false;
	}


	/**
	 * Delete inserted term meta
	 *
	 * @param array $term_data  array {
	 *
	 * @type int    $term_id    term ID
	 * @type string $meta_key   Term meta key
	 * @type mixed  $meta_value Term value
	 * }
	 *
	 * @return bool true on successful delete, false on failure.
	 */

	public function remove_term_meta( $term_data ) {

		$required_params = array(
			'term_id'    => '',
			'meta_key'   => '',
			'meta_value' => '',
		);

		if ( ! array_diff_key( $required_params, $term_data ) ) {
			return bf_delete_term_meta( $term_data['term_id'], $term_data['meta_key'], $term_data['meta_value'] );
		}

		return false;
	}


	/**
	 * Delete term metadata from database.
	 *
	 * @param array $term_meta_params
	 *
	 * @return int|WP_Error|bool Meta ID on success. WP_Error when term_id is ambiguous between taxonomies.
	 *                           False on failure.
	 */
	public function delete_term_meta( $term_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $term_meta_params ) ) {

			return call_user_func_array( 'bf_delete_term_meta', $meta_params );
		}

		return false;
	}


	/**
	 * update term meta data
	 *
	 * @param array $term_meta_params
	 *
	 * @return int|WP_Error|bool true on successful WP_Error|False on failure.
	 */
	public function update_term_meta( $term_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $term_meta_params ) ) {
			$meta_params[3] = isset( $term_meta_params['prev_value'] ) ? $term_meta_params['prev_value'] : '';

			return call_user_func_array( 'bf_update_term_meta', $meta_params );
		}

		return false;
	}


	/**
	 * get term meta data.
	 *
	 * @param array $term_meta_params
	 *
	 * @return mixed meta value.
	 */
	public function get_term_meta( $term_meta_params ) {

		if ( $meta_params = $this->get_meta_params( $term_meta_params ) ) {
			$term_id   = &$meta_params[0];
			$meta_key  = &$meta_params[1];
			$is_single = isset( $term_meta_params['single'] ) ? $term_meta_params['single'] : false;

			return bf_get_term_meta( $meta_key, $term_id, '', $is_single );
		}

		return '';
	}
}
