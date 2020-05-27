<?php


class Migrate_Terms implements Migration_Process, Safe_Migration_Process, Countable {

	/**
	 * Fillable term columns
	 *
	 * @since 1.0.0
	 * @var array
	 */
	public $fillable_fields = array(
		'name',
		'description'
	);


	/**
	 * Configuration array of the source product
	 *
	 * @since 1.0.0
	 * @var  Migration_Process_Config
	 */
	public $config = array();

	/**
	 * Destination product configuration array
	 *
	 * @since 1.0.0
	 * @var  Migration_Process_Config
	 */
	public $config2 = array();


	/**
	 * Current active configuration
	 *
	 * @since 1.0.0
	 * @var  Migration_Process_Config
	 */
	public $active_config = array();


	/**
	 * Which one of the configuration array should use
	 *
	 * @since 1.0.0
	 * @var int
	 */
	public $active_config_number = 1;


	/**
	 * @param int $which 1 or 2
	 */
	public function switch_active_configuration( $which ) {

		if ( $which == 2 ) {

			$this->active_config_number = 2;

			$this->active_config = $this->config2;

		} else {

			$this->active_config_number = 1;

			$this->active_config = $this->config;
		}

	}

	/**
	 * Get total number of the terms
	 *
	 * @since 1.0.0
	 * @return int
	 */
	public function count() {

		$total = 0;

		if ( $this->active_config->taxonomies ) {

			foreach ( $this->active_config->taxonomies as $taxonomy ) {

				$count = wp_count_terms( $taxonomy );

				if ( $count && ! is_wp_error( $count ) ) {
					$total += intval( $count );
				}
			}
		}

		return $total;
	}

	/**
	 * Calculate how many recall needed to complete the process
	 *
	 * @return int
	 */
	public function calculate_steps() {

		$steps = 0;

		if ( $total = $this->count() ) {

			$steps = ceil( $total / $this->concurrent_items() );
		}

		return max( $steps, 0 );
	}


	/**
	 *
	 * Get number of terms to handle in every recall
	 *
	 * @since 1.0.0
	 * @return int
	 */
	public function concurrent_items() {

		$rate = $this->active_config->server_power_rate();

		$steps = 1;

		if ( $rate === 3 ) {

			$steps = 3;
		} elseif ( $rate === 4 ) {

			$steps = 5;
		} elseif ( $rate === 5 ) {

			$steps = 8;
		}

		return $steps;
	}


	/**
	 * Transform data to new structure
	 *
	 * @param array $terms array of WP_Term object
	 *
	 * @return bool true on success or false on failure.
	 */
	public function migrate( $terms ) {

		$migrated_items = 0;

		if ( empty( $terms ) || ! is_array( $terms ) ) {
			return $migrated_items;
		}

		if ( $terms ) {

			$response = Migrator_Connector::migrate(
				$this->active_config->product_type,
				$this->active_config->source_product_id,
				$this->active_config->destination_product_id,
				$this->active_config->source_product_version,
				$this->active_config->destination_product_version,
				compact( 'terms' )
			);

			if ( ! empty( $response['success'] ) ) {

				if ( ! empty( $response['terms'] ) ) {

					$this->switch_active_configuration( 2 );

					foreach ( $response['terms'] as $term_id => $update ) {

						$migrated_items ++;

						if ( ! empty( $update['term'] ) ) {

							$field2update = array_intersect_key( $update['term'], array_flip( $this->fillable_fields ) );

							wp_update_term( $term_id, $this->get_term_taxonomy( $term_id ), $field2update );
						}

						if ( ! empty( $update['term_meta'] ) ) {

							foreach ( $update['term_meta'] as $meta_key => $meta_values ) {

								$i = 0;

								foreach ( $meta_values as $meta_value ) {

									$prev_value = isset( $terms[ $term_id ]['term_meta'][ $meta_key ][ $i ] ) ? $terms[ $term_id ]['term_meta'][ $meta_key ][ $i ] : NULL;

									$this->update_term_meta( $term_id, $meta_key, $meta_value, $prev_value );

									$i ++;
								}
							}
						}
					}

					$this->switch_active_configuration( 1 );
				}

				if ( $this->config->resume_enabled() ) {

					foreach ( array_keys( $terms ) as $term_id ) {

						add_term_meta( $term_id, $this->config->resumable_key, $this->config->resumable_value );
					}
				}


				return $migrated_items;
			}
		}

		return $migrated_items;
	}


	/**
	 * @param Migration_Process_Config $configuration
	 * @param Migration_Process_Config $configuration2
	 */
	public function set_migration_config( $configuration, $configuration2 ) {

		$this->config  = $configuration;
		$this->config2 = $configuration2;

		$this->active_config = $this->config;
	}


	/**
	 * Backup existing data before start migrating process
	 *
	 * @param array $terms an array of WP_Term object
	 *
	 * @return bool true true on success.
	 */
	public function migration_backup( $terms ) {

		/**
		 * @var WP_Term $term
		 */
		foreach ( $terms as $term ) {

			if ( ! empty( $term['term'] ) && ! Migrator_Backup::backup( $term['term']['term_id'], 'term', $term['term'] ) ) {
				return FALSE;
			}

			if ( ! empty( $term['term_meta'] ) && ! Migrator_Backup::backup( $term['term']['term_id'], 'term_meta', $term['term_meta'] ) ) {

				if ( ! empty( $term['term']['term_id'] ) ) {
					Migrator_Backup::delete( $term['term']['term_meta'], 'term' );
				}

				return FALSE;
			}
		}

		return TRUE;
	}


	/**
	 * Restore backup version
	 *
	 * @param int   $term_id
	 * @param bool  $delete_after delete data after restore
	 *
	 * @global wpdb $wpdb         wordpress database object
	 *
	 * @since 1.0.0
	 * @return bool true true on success.
	 */
	public function migration_restore( $term_id, $delete_after = TRUE ) {

		global $wpdb;

		if ( $term = Migrator_Backup::find( $term_id, 'term' ) ) {

			$updated = wp_update_term( $term->data['term_id'], $term->data['taxonomy'], $term->data );

			if ( $updated && ! is_wp_error( $updated ) ) {

				if ( $term_meta = Migrator_Backup::find( $term_id, 'term_meta' ) ) {

					if ( is_array( $term_meta->data ) ) {

						$wpdb->delete( $wpdb->termmeta, compact( 'term_id' ), array( '%d' ) );

						foreach ( $term_meta->data as $meta_key => $values ) {

							foreach ( $values as $value ) {

								// insert term_meta
								$this->update_term_meta( $term_id, $meta_key, $value );
							}
						}
					}

					if ( $delete_after ) {
						Migrator_Backup::delete( $term_id, 'term' );
						Migrator_Backup::delete( $term_id, 'term_meta' );
					}

					return TRUE;
				}
			}
		}

		return FALSE;
	}


	/**
	 * Get list of the posts to migrate
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function migration_items() {

		$terms = array();

		if ( $this->config->resume_enabled() ) {

			if ( $terms_id = $this->not_migrated_terms_id() ) {

				$terms = get_terms( array(
					'include'    => $terms_id,
					'hide_empty' => FALSE,
				) );
			}

		} else {


			$terms_count = $this->concurrent_items();
			$paged       = ( $this->active_config->current_step() - 1 ) * $terms_count;

			$terms = get_terms( array(
				'number'     => $terms_count,
				'taxonomy'   => $this->active_config->taxonomies,
				'offset'     => $paged,
				'hide_empty' => FALSE,
			) );

		}


		$items = array();

		if ( ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {

				$term = get_object_vars( $term );

				$term_meta                 = $this->get_term_meta( $term['term_id'] );
				$items[ $term['term_id'] ] = compact( 'term', 'term_meta' );

			}
		}

		return $items;
	}


	/**
	 * Get list of terms id that needs to migrated
	 *
	 * @global wpdb WordPress database object
	 *
	 * @return array
	 */
	public function not_migrated_terms_id() {

		global $wpdb;

		$taxonomy_string = implode( "','", $this->active_config->taxonomies );
		//
		$posts_count = $this->concurrent_items();
		//	$paged       = ( $this->config->current_step() - 1 ) * $posts_count;


		$sql = "SELECT t.term_id FROM $wpdb->term_taxonomy  as t WHERE t.taxonomy IN ( '$taxonomy_string' ) " .
		       "AND NOT EXISTS(SELECT tm.term_id FROM $wpdb->termmeta as tm where tm.term_id = t.term_id AND tm.meta_key=%s AND tm.meta_value = %s LIMIT 1)" .
		       " LIMIT 0,%d";

		$sql = $wpdb->prepare(
			$sql,

			$this->config->resumable_key,
			$this->config->resumable_value,
			//
			# $paged,
			$posts_count
		);

		return $wpdb->get_col( $sql );
	}

	/**
	 * Get option value of the term meta in legacy structure.
	 *
	 * @param int    $term_id
	 * @param string $meta_key
	 *
	 * @since 1.0.0
	 * @return array|void array on success or void on failure.
	 */
	public function get_term_option( $term_id, $meta_key ) {

		if ( $option_name = $this->get_meta_option_name( $term_id, $meta_key ) ) {

			if ( strstr( $option_name, '%' ) && '%' !== $option_name ) {

				$values = $this->_get_all_legacy_term_meta( $option_name );

			} else {

				$values = get_option( $option_name );
			}

			return $values;
		}
	}

	/**
	 * List all legacy term meta when %meta_key% exists in option name
	 *
	 * @param string $option_name
	 *
	 * @global wpdb  $wpdb database object
	 *
	 * @access internal
	 *
	 * @since  1.1.0
	 * @return array
	 */
	protected function _get_all_legacy_term_meta( $option_name ) {

		global $wpdb;

		$option_name_sql   = $wpdb->esc_like( esc_sql( $option_name ) );
		$unfiltered_values = $wpdb->get_results( "SELECT option_name,option_value FROM $wpdb->options WHERE option_name LIKE '$option_name_sql'" );

		$option_name_regex = str_replace( '%', '(.*?)', $option_name );
		$option_name_regex = "/^$option_name_regex\$/";

		$values = array();

		foreach ( $unfiltered_values as $unfiltered_value ) {

			if ( ! preg_match( $option_name_regex, $unfiltered_value->option_name, $_match ) ) {
				continue;
			}

			$meta_key = $_match[1];

			$values[ $meta_key ] = maybe_unserialize( $unfiltered_value->option_value );
		}

		return $values;
	}

	/**
	 * Retrieves metadata for a term
	 *
	 * @see   get_term_meta for documentation
	 *
	 * @param int    $term_id
	 * @param string $key
	 * @param bool   $single
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function get_term_meta( $term_id, $key = '', $single = FALSE ) {

		if ( $this->legacy_meta_structure() ) {

			if ( $option = $this->get_term_option( $term_id, $key ) ) {

				$result = mg_get_array_index( $option, $this->get_meta_option_index( $term_id, $key ) );

				if ( is_null( $result ) ) {
					return '';
				}

				/**
				 * TODO: write unit test this block
				 */
				if ( ! $single && empty( $key ) && empty( $this->active_config->term_meta_path[2] ) ) {

					$new_result = array();

					foreach ( $result as $meta_key => $meta_value ) {

						$new_result[ $meta_key ] = array( $meta_value );
					}

					$result     = $new_result;
					$new_result = NULL;
				}

				return $single || empty( $key ) ? $result : array( $result );
			}

			return '';
		}


		return get_term_meta( $term_id, $key, $single );
	}

	/**
	 * Updates term metadata
	 *
	 * @param int    $term_id    Term ID.
	 * @param string $meta_key   Metadata key.
	 * @param mixed  $meta_value Metadata value.
	 * @param mixed  $prev_value Optional. Previous value to check before removing.
	 *
	 * @since 1.0.0
	 *
	 * @see   get_term_meta for more documentation
	 *
	 * @return int|WP_Error|bool
	 */
	public function update_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' ) {

		if ( $this->legacy_meta_structure() ) {

			if ( $option_name = $this->get_meta_option_name( $term_id, $meta_key ) ) {

				$option       = get_option( $option_name );
				$option_index = $this->get_meta_option_index( $term_id, $meta_key );

				if ( $prev_value ) {

					if ( mg_get_array_index( $option, $option_index ) != $prev_value ) {

						return FALSE;
					}
				}

				if ( $option_index ) {

					mg_push_value( $option, $option_index, $meta_value );

				} else {

					$option = $meta_value;
				}

				return update_option( $option_name, $option );
			}

			return FALSE;
		}


		return update_term_meta( $term_id, $meta_key, $meta_value, $prev_value );
	}

	/**
	 * Removes metadata matching criteria from a term.
	 *
	 * @param int    $term_id    Term ID.
	 * @param string $meta_key   Metadata name.
	 * @param mixed  $meta_value Optional. Metadata value. If provided, rows will only be removed that match the value.
	 *
	 * @see   delete_term_meta for more documentation
	 *
	 * @since 1.0.0
	 *
	 * @return string the taxonomy of the term
	 */
	public function delete_term_meta( $term_id, $meta_key, $meta_value = '' ) {


		if ( $this->legacy_meta_structure() ) {

			if ( $option_name = $this->get_meta_option_name( $term_id, $meta_key ) ) {

				$option       = get_option( $option_name );
				$option_index = $this->get_meta_option_index( $term_id, $meta_key );

				if ( $meta_value ) {

					if ( mg_get_array_index( $option, $option_index ) != $meta_value ) {

						return FALSE;
					}
				}

				if ( $option_index ) {

					$value = NULL;
					mg_push_value( $option, $option_index, $value );

					array_filter( $option, array( __CLASS__, 'not_is_null' ) );

					return update_option( $option_name, $option );

				} else {

					return delete_option( $option_name );
				}
			}

			return FALSE;
		}


		return delete_term_meta( $term_id, $meta_key, $meta_value );
	}

	/**
	 * get term taxonomy by term ID
	 *
	 * @param int   $term_id
	 *
	 * @global wpdb $wpdb wordpress database object
	 *
	 * @since 1.0.0
	 * @return bool|string not a empty string on success empty string or false otherwise.
	 */
	public function get_term_taxonomy( $term_id ) {

		global $wpdb;

		$taxonomy = wp_cache_get( $term_id, 'term-id-taxonomy' );

		if ( $taxonomy === FALSE ) {
			$taxonomy = $wpdb->get_var( $wpdb->prepare( "SELECT taxonomy FROM $wpdb->term_taxonomy WHERE term_id = %d", $term_id ) );
			wp_cache_add( $term_id, $taxonomy, 'term-id-taxonomy' );
		}

		return $taxonomy;
	}

	/**
	 * Get option_name that is associated with the term metas
	 *
	 * @param int    $term_id
	 * @param string $meta_key
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function get_meta_option_name( $term_id, $meta_key = '' ) {

		if ( empty( $this->active_config->term_meta_path[0] ) ) {
			return '';
		}

		$taxonomy = '';

		if ( stristr( $this->active_config->term_meta_path[0], '%taxonomy%' ) ) {
			$taxonomy = $this->get_term_taxonomy( $term_id );
		}

		//
		// When meta-key is empty, it means multiple-options list should fetch with mysql LIKE query
		//
		if ( empty( $meta_key ) ) {
			$meta_key = '%';
		}

		return str_replace(
			array(
				'%taxonomy%',
				'%term_id%',
				'%meta_key%',
			),
			array(
				$taxonomy,
				$term_id,
				$meta_key,
			),
			$this->active_config->term_meta_path[0]
		);
	}


	/**
	 * Get index of the option array that is associated with the term meta
	 *
	 * @param int    $term_id
	 * @param string $meta_key
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function get_meta_option_index( $term_id, $meta_key ) {

		if ( empty( $this->active_config->term_meta_path[0] ) ) {
			return '';
		}

		if ( empty( $this->active_config->term_meta_path[1] ) ) {

			if ( stristr( $this->active_config->term_meta_path[0], '%term_id%' ) ) {

				return '';
			} else {

				return "$term_id";
			}
		} else {

			$taxonomy = '';

			if ( stristr( $this->active_config->term_meta_path[1], '%taxonomy%' ) ) {
				$taxonomy = $this->get_term_taxonomy( $term_id );
			}

			return str_replace(
				array(
					'%taxonomy%',
					'%term_id%',
					'%meta_key%',
				),
				array(
					$taxonomy,
					$term_id,
					$meta_key,
				),
				$this->active_config->term_meta_path[1]
			);
		}
	}

	/**
	 * Determine is product still store term-meta in options table
	 *
	 * @since 1.0.0
	 *
	 * @return bool true
	 */
	public function legacy_meta_structure() {

		return $this->active_config->term_meta_path && ! empty( $this->active_config->term_meta_path[0] )
		       && function_exists( 'get_term_meta' );
	}


	/**
	 * Super simple functions do not need to document :-P
	 *
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public static function not_is_null( $value ) {

		return ! is_null( $value );
	}
}
