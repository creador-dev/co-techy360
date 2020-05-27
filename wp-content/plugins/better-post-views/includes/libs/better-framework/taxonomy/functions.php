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


if ( ! function_exists( 'bf_use_wp_term_meta' ) ) {

	/**
	 * Check WordPress version support term meta
	 *
	 * @return bool true on support
	 */
	function bf_use_wp_term_meta() {
		static $bf_use_wp_term_meta;

		if ( is_null( $bf_use_wp_term_meta ) ) {
			$bf_use_wp_term_meta = get_option( 'db_version' ) >= 34370 && function_exists( 'add_term_meta' );
		}

		return $bf_use_wp_term_meta;
	}
}

if ( ! function_exists( 'bf_get_term_meta' ) ) {
	/**
	 * Used For retrieving meta of term
	 *
	 * @param   int|object  $term_id       Term ID or object
	 * @param   string      $meta_key      Custom Field ID
	 * @param   bool|string $force_default Default Value
	 * @param   bool        $single        Whether to return a single value. If false, an array of all values matching the
	 *                                     `$term_id`/`$key` pair will be returned. Default: false.
	 *
	 * @return mixed If `$single` is false, an array of metadata values. If `$single` is true, a single metadata value.
	 */
	function bf_get_term_meta( $meta_key, $term_id = NULL, $force_default = NULL, $single = TRUE ) {

		// Extract ID from term object if passed
		if ( is_object( $term_id ) ) {

			if ( ! is_a( $term_id, 'WP_Term' ) ) {
				return bf_get_term_meta_default( $meta_key, $force_default );
			}

			if ( isset( $term_id->term_id ) ) {
				$term_id = $term_id->term_id;
			} else {
				return $force_default;
			}
		}


		if ( bf_use_wp_term_meta() ) {

			if ( ! $term_id ) {
				if ( is_category() || is_tag() || is_tax() ) {
					$queried_object = get_queried_object();
					$term_id        = isset( $queried_object->term_id ) ? $queried_object->term_id : 0;
				}
			}

			if ( $term_id ) {

				$meta_value = get_term_meta( $term_id, $meta_key, $single );

				if ( is_null( $meta_value ) || $meta_value === '' ) {
					// Calculates default value from panel
					if ( is_null( $force_default ) ) {
						return bf_get_term_meta_default( $meta_key, '' );
					} else {
						return $force_default;
					}
				}
			} else {
				return bf_get_term_meta_default( $meta_key, '' );
			}


			return $meta_value;
		}


		// If term ID not passed
		if ( is_null( $term_id ) ) {
			// If its category or tag archive get that term ID
			if ( is_category() || is_tag() || is_tax() ) {
				$queried_object = get_queried_object();
				$term_id        = isset( $queried_object->term_id ) ? $queried_object->term_id : 0;
			} else {
				return $force_default;
			}

		}


		// init 
		if ( ! class_exists( 'BF_Taxonomy_Core' ) ) {
			Better_Framework()->taxonomy_meta();
		}


		// Return it from cache
		if ( isset( BF_Taxonomy_Core::$cache[ $term_id ][ $meta_key ] ) ) {
			return BF_Taxonomy_Core::$cache[ $term_id ][ $meta_key ];
		} else if ( empty( $meta_key ) ) {
			if ( $cached = BF_Taxonomy_Core::$cache[ $term_id ] ) {
				return $cached;
			}
		}

		// Returns from saved meta
		if ( $output = get_option( 'bf_term_' . $term_id ) ) {
			if ( isset( $output[ $meta_key ] ) ) {
				BF_Taxonomy_Core::$cache[ $term_id ] = $output; // Save to cache
				return $output[ $meta_key ];
			} else if ( empty( $meta_key ) ) {
				return $output;
			}
		}

		// Default value for function have more priority to std field
		if ( ! is_null( $force_default ) ) {
			return $force_default;
		}

		// Calculates and returns from meta box STD value
		return bf_get_term_meta_default( $meta_key, '' );
	}
}


if ( ! function_exists( 'bf_echo_term_meta' ) ) {
	/**
	 * Used For echo meta of term
	 *
	 * @param   int|object  $term_id       Term ID or object
	 * @param   string      $meta_id       Custom Field ID
	 * @param   bool|string $force_default Default Value
	 *
	 * @return bool
	 */
	function bf_echo_term_meta( $meta_id, $term_id = NULL, $force_default = NULL ) {
		echo bf_get_term_meta( $meta_id, $term_id, $force_default ); // escaped before
	}
}


if ( ! function_exists( 'bf_update_term_meta' ) ) {

	/**
	 * Updates term metadata.
	 *
	 * Use the `$prev_value` parameter to differentiate between meta fields with the same key and term ID.
	 *
	 * If the meta field for the term does not exist, it will be added.
	 *
	 * @param int    $term_id    Term ID.
	 * @param string $meta_key   Metadata key.
	 * @param mixed  $meta_value Metadata value.
	 * @param mixed  $prev_value Optional. Previous value to check before removing.
	 *
	 * @return int|WP_Error|bool Meta ID if the key didn't previously exist. True on successful update.
	 *                           WP_Error when term_id is ambiguous between taxonomies. False on failure.
	 */
	function bf_update_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' ) {

		if ( bf_use_wp_term_meta() ) {
			return update_term_meta( $term_id, $meta_key, $meta_value, $prev_value );
		}

		//use old method
		$all_meta  = get_option( 'bf_term_' . $term_id, array() );
		$old_value = isset( $all_meta[ $meta_key ] ) ? $all_meta[ $meta_key ] : NULL;

		// Compare existing value to new value if no prev value given and the key exists only once.
		if ( empty( $prev_value ) ) {
			if ( $old_value === $meta_value ) {
				return FALSE;
			}
		} else {
			$prev_value = maybe_serialize( $prev_value );
			if ( maybe_serialize( $old_value ) !== $prev_value ) {
				return FALSE;
			}
		}

		$all_meta[ $meta_key ] = $meta_value;

		return update_option( 'bf_term_' . $term_id, $all_meta, 'no' );
	}
}

if ( ! function_exists( 'bf_delete_term_meta' ) ) {

	/**
	 * Removes metadata matching criteria from a term.
	 *
	 * @param int    $term_id    Term ID.
	 * @param string $meta_key   Metadata name.
	 * @param mixed  $meta_value Optional. Metadata value. If provided, rows will only be removed that match the value.
	 *
	 * @return bool True on success, false on failure.
	 */
	function bf_delete_term_meta( $term_id, $meta_key, $meta_value = '' ) {

		if ( bf_use_wp_term_meta() ) {
			return delete_term_meta( $term_id, $meta_key, $meta_value );
		}

		//use old method
		$all_meta  = get_option( 'bf_term_' . $term_id, array() );
		$old_value = isset( $all_meta[ $meta_key ] ) ? $all_meta[ $meta_key ] : NULL;

		// Compare existing value to new value if no prev value given and the key exists only once.
		if ( ! empty( $meta_value ) ) {
			$meta_value = maybe_serialize( $meta_value );
			if ( maybe_serialize( $old_value ) !== $meta_value ) {
				return FALSE;
			}
		}
		unset( $all_meta[ $meta_key ] );

		return update_option( 'bf_term_' . $term_id, $all_meta, 'no' );
	}
}


if ( ! function_exists( 'bf_add_term_meta' ) ) {

	/**
	 * Adds metadata to a term.
	 *
	 * @param int    $term_id    Term ID.
	 * @param string $meta_key   Metadata name.
	 * @param mixed  $meta_value Metadata value.
	 * @param bool   $unique     Optional. Whether to bail if an entry with the same key is found for the term.
	 *                           Default false.
	 *
	 * @return int|WP_Error|bool Meta ID on success. WP_Error when term_id is ambiguous between taxonomies.
	 *                           False on failure.
	 */
	function bf_add_term_meta( $term_id, $meta_key, $meta_value, $unique = FALSE ) {

		if ( bf_use_wp_term_meta() ) {
			return add_term_meta( $term_id, $meta_key, $meta_value, $unique );
		}

		return bf_update_term_meta( $term_id, $meta_key, $meta_value );
	}
}


if ( ! function_exists( 'bf_get_term_meta_default' ) ) {
	/**
	 * @param      $meta_key
	 * @param null $default
	 *
	 * @return null
	 */
	function bf_get_term_meta_default( $meta_key, $default = NULL ) {

		// init
		if ( ! class_exists( 'BF_Taxonomy_Core' ) ) {
			Better_Framework()->taxonomy_meta();
		}

		// Iterate All Metaboxe
		foreach ( BF_Taxonomy_Core::$metabox as $metabox_id => $metabox ) {

			$metabox_std = BF_Taxonomy_Core::get_metabox_std( $metabox_id );

			if ( ! isset( $metabox_std[ $meta_key ] ) ) {
				unset( $metabox_std );
				continue;
			}

			if ( isset( $metabox['panel-id'] ) ) {
				$std_id = BF_Options::get_panel_std_id( $metabox['panel-id'] );
			} else {
				$std_id = 'std';
			}

			if ( isset( $metabox_std[ $meta_key ][ $std_id ] ) ) {
				return $metabox_std[ $meta_key ][ $std_id ];
			} elseif ( isset( $metabox_std[ $meta_key ]['std'] ) ) {
				return $metabox_std[ $meta_key ]['std'];
			} else {
				return $default;
			}

		}// for

	} // bf_get_term_meta_default
}
