<?php


class Migrate_Posts implements Migration_Process, Safe_Migration_Process, Countable {


	/**
	 * Fillable columns in posts table
	 *
	 * @since 1.0.0
	 * @var array
	 */
	public $fillable_fields = array(
		'post_title',
		'post_content'
	);


	/**
	 * Process configuration array
	 *
	 * @since 1.0.0
	 * @var  Migration_Process_Config
	 */
	public $config = array();


	/**
	 * Get total number of the posts
	 *
	 * @return int
	 */
	public function count() {

		$total = 0;

		if ( $this->config->post_types ) {

			foreach ( (array) $this->config->post_types as $post_type ) {

				if ( $count = wp_count_posts( $post_type ) ) {
					$total += $count->publish;
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
	 * Get number of posts to handle in every recall
	 *
	 * @since 1.0.0
	 * @return int
	 */
	public function concurrent_items() {

		$rate = $this->config->server_power_rate();

		$steps = 1;

		if ( $rate === 3 ) {

			$steps = 2;
		} elseif ( $rate === 4 ) {

			$steps = 3;
		} elseif ( $rate === 5 ) {

			$steps = 5;
		}

		return $steps;
	}


	/**
	 * Transform data to new structure
	 *
	 * @param array $posts array
	 *
	 * @return int number of migrated items
	 */
	public function migrate( $posts ) {

		$migrated_items = 0;

		if ( empty( $posts ) || ! is_array( $posts ) ) {
			return $migrated_items;
		}

		if ( $posts ) {

			$response = Migrator_Connector::migrate(
				$this->config->product_type,
				$this->config->source_product_id,
				$this->config->destination_product_id,
				$this->config->source_product_version,
				$this->config->destination_product_version,
				compact( 'posts' )
			);


			if ( ! empty( $response['success'] ) ) {

				if ( ! empty( $response['posts'] ) ) {

					foreach ( $response['posts'] as $post_id => $update ) {

						$migrated_items ++;

						if ( ! empty( $update['post'] ) ) {

							$this->update_post( $post_id, $update['post'] );
						}

						if ( ! empty( $update['post_meta'] ) ) {

							$prev_metas = isset( $posts[ $post_id ]['post_meta'] ) ? $posts[ $post_id ]['post_meta'] : array();

							$this->update_post_metas( $post_id, $update['post_meta'], $prev_metas );
						}
					}
				}

				if ( $this->config->resume_enabled() ) {

					foreach ( array_keys( $posts ) as $post_id ) {

						add_post_meta( $post_id, $this->config->resumable_key, $this->config->resumable_value );
					}
				}

				return $migrated_items;
			}
		}

		return $migrated_items;
	}


	/**
	 * Update a post attributes/fields
	 *
	 * @param int   $post_id
	 * @param array $fields
	 *
	 * @return bool true on success
	 */
	public function update_post( $post_id, $fields ) {

		$field2update       = array_intersect_key( $fields, array_flip( $this->fillable_fields ) );
		$field2update['ID'] = $post_id;

		$result = wp_update_post( $field2update );

		return $result && ! is_wp_error( $result );
	}


	/**
	 * @param int   $post_id
	 * @param array $new_metas
	 * @param array $prev_metas
	 */
	public function update_post_metas( $post_id, $new_metas, $prev_metas = array() ) {

		foreach ( $new_metas as $meta_key => $meta_values ) {

			$i = 0;

			foreach ( $meta_values as $meta_value ) {
				$prev_value = isset( $prev_metas[ $meta_key ][ $i ] ) ? $prev_metas[ $meta_key ][ $i ] : NULL;

				update_post_meta( $post_id, $meta_key, $meta_value, $prev_value );

				$i ++;
			}
		}
	}


	/**
	 * @param Migration_Process_Config $configuration
	 * @param Migration_Process_Config $configuration2
	 */
	public function set_migration_config( $configuration, $configuration2 ) {

		$this->config = $configuration;
	}


	/**
	 * Backup existing data before start migrating process
	 *
	 * @param array $posts
	 *
	 * @return bool true true on success.
	 */
	public function migration_backup( $posts ) {

		foreach ( $posts as $post ) {

			if ( ! empty( $post['post'] ) && ! Migrator_Backup::backup( $post['post']['ID'], 'post', $post['post'] ) ) {
				return FALSE;
			}

			if ( ! empty( $post['post_meta'] ) && ! Migrator_Backup::backup( $post['post']['ID'], 'post_meta', $post['post_meta'] ) ) {

				if ( ! empty( $post['post']['ID'] ) ) {
					Migrator_Backup::delete( $post['post']['ID'], 'post' );
				}

				return FALSE;
			}

		}

		return TRUE;
	}


	/**
	 * Restore backup version
	 *
	 * @param int   $post_id
	 * @param bool  $delete_after delete data after restore
	 *
	 * @global wpdb $wpdb         wordpress database object
	 *
	 * @return bool true true on success.
	 */
	public function migration_restore( $post_id, $delete_after = TRUE ) {

		global $wpdb;

		if ( $post = Migrator_Backup::find( $post_id, 'post' ) ) {

			$updated = wp_update_post( $post->data );

			if ( ! $updated || is_wp_error( $updated ) ) {

				return FALSE;
			}
		}


		if ( $post_meta = Migrator_Backup::find( $post_id, 'post_meta' ) ) {

			if ( is_array( $post_meta->data ) ) {

				$wpdb->delete( $wpdb->postmeta, compact( 'post_id' ), array( '%d' ) );

				foreach ( $post_meta->data as $meta_key => $values ) {

					foreach ( $values as $value ) {

						if ( ! add_post_meta( $post_id, $meta_key, $value ) ) {

							return FALSE;
						}
					}
				}
			}
		}

		if ( $delete_after ) {
			Migrator_Backup::delete( $post_id, 'post' );
			Migrator_Backup::delete( $post_id, 'post_meta' );
		}


		return TRUE;
	}


	/**
	 * Get list of the posts to migrate
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function migration_items() {

		$posts = array();

		if ( $this->config->resume_enabled() ) { # Get list of the posts to migrate and not processed yet

			if ( $posts_id = $this->not_migrated_posts_id() ) {
				$posts = get_posts( array(
					'post__in'  => $posts_id,
					'post_type' => $this->config->post_types,
				) );
			}

		} else {

			$posts_count = $this->concurrent_items();
			$paged       = ( $this->config->current_step() - 1 ) * $posts_count;

			$posts = get_posts( array(
				'post_type'   => $this->config->post_types,
				'numberposts' => $posts_count,
				'offset'      => $paged,
			) );
		}

		$data2post = array();

		foreach ( $posts as $post ) {

			$data2post[ $post->ID ] = array(
				'post'      => get_object_vars( $post ),
				'post_meta' => get_post_meta( $post->ID )
			);
		}

		return $data2post;
	}


	/**
	 * Get list of posts id that needs to migrated
	 *
	 * @global wpdb WordPress database object
	 *
	 * @return array
	 */
	public function not_migrated_posts_id() {

		global $wpdb;

		$post_types_string = implode( "','", $this->config->post_types );
		//
		$posts_count = $this->concurrent_items();
		//	$paged       = ( $this->config->current_step() - 1 ) * $posts_count;


		/*
		$sql = 'SELECT p.ID FROM ' . $wpdb->posts . ' as p LEFT JOIN ' . $wpdb->postmeta . ' as pm ON (pm.post_id = p.ID) ' .
		       "WHERE  p.post_type IN ( '$post_types_string' ) AND p.post_status='publish' " .
		       'AND pm.meta_key = %s AND pm.meta_value != %s OR pm.meta_key IS NULL LIMIT %d,%d';

		$sql = $wpdb->prepare(
			$sql,

			$this->config->resumable_key,
			$this->config->resumable_value,
			//
			$paged,
			$posts_count
		);
		*/


		$sql = 'SELECT p.ID FROM ' . $wpdb->posts . ' as p WHERE p.post_status=\'publish\' ';

		if ( $post_types_string ) {
			$sql .= "AND p.post_type IN ( '$post_types_string' )";
		}

		$sql .= " AND NOT EXISTS(SELECT pm.post_id FROM $wpdb->postmeta as pm where pm.post_id = p.ID AND pm.meta_key=%s AND pm.meta_value = %s LIMIT 1)" .
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
}
