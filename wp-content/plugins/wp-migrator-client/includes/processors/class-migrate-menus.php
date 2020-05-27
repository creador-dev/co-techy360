<?php


class Migrate_Menus extends Migrate_Posts {


	/**
	 * Get total number of the menus
	 *
	 * @return int
	 */
	public function count() {

		$total = 0;

		if ( $count = wp_count_posts( 'nav_menu_item' ) ) {
			$total = $count->publish;
		}

		return $total;
	}


	/**
	 * Get list of the menus to migrate
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function migration_items() {

		$current_step = $this->config->current_step();

		if ( $current_step === 1 ) { // Pass menu options in first step

			$locations = get_theme_mod( 'nav_menu_locations' );

			return array(
				'menu_options' => compact( 'locations' ),
			);

		} else {

			$posts = array();

			if ( $this->config->resume_enabled() ) { # Get list of the posts to migrate and not processed yet

				if ( $posts_id = $this->not_migrated_posts_id() ) {

					$posts = get_posts( array(
						'post__in'  => $posts_id,
						'post_type' => 'nav_menu_item',
					) );
				}

			} else {

				$posts_count = $this->concurrent_items();
				$paged       = ( $current_step - 2 ) * $posts_count;

				$posts = get_posts( array(
					'post_type'   => 'nav_menu_item',
					'numberposts' => $posts_count,
					'offset'      => $paged,
				) );
			}

			$data2post = array();

			foreach ( $posts as $post ) {

				$data2post[ $post->ID ] = array(
					'menu'      => get_object_vars( $post ),
					'menu_meta' => get_post_meta( $post->ID )
				);

			}

			return $data2post;
		}
	}


	/**
	 * Transform data to new structure
	 *
	 * @param array $menus array of WP_Post object
	 *
	 * @return int number of migrated items
	 */
	public function migrate( $menus ) {

		$migrated_items = 0;

		if ( empty( $menus ) || ! is_array( $menus ) ) {
			return $migrated_items;
		}

		if ( $menus ) {

			$response = Migrator_Connector::migrate(
				$this->config->product_type,
				$this->config->source_product_id,
				$this->config->destination_product_id,
				$this->config->source_product_version,
				$this->config->destination_product_version,
				compact( 'menus' )
			);

			if ( ! empty( $response['success'] ) ) {

				if ( ! empty( $response['menus'] ) ) {

					if ( ! empty( $response['menus']['menu_options'] ) ) {

						if ( $this->update_menu_options( $response['menus']['menu_options'] ) ) {
							$migrated_items ++;
						}

						unset( $response['menus']['menu_options'] );
					}

					foreach ( $response['menus'] as $post_id => $update ) {

						$migrated_items ++;

						if ( ! empty( $update['menu'] ) ) {
							$this->update_post( $post_id, $update['menu'] );
						}

						if ( ! empty( $update['menu_meta'] ) ) {

							// $prev_metas = isset( $menus[ $post_id ]['menu_meta'] ) ? $menus[ $post_id ]['menu_meta'] : array();

							$this->update_post_metas( $post_id, $update['menu_meta']/*, $prev_metas */ );
						}
					}
				}

				if ( $this->config->resume_enabled() ) {

					foreach ( array_keys( $menus ) as $post_id ) {

						add_post_meta( $post_id, $this->config->resumable_key, $this->config->resumable_value );
					}
				}

				return $migrated_items;
			}
		}

		return $migrated_items;
	}


	/**
	 * Update menu options
	 *
	 * @since 1.0.0
	 *
	 * @param array $options option array
	 *
	 * @return bool true on success
	 */
	public function update_menu_options( $options ) {

		try {

			if ( ! empty( $options['locations'] ) ) {

				$locations = (array) get_theme_mod( 'nav_menu_locations', array() );
				$locations = array_merge( $locations, $options['locations'] );

				set_theme_mod( 'nav_menu_locations', $locations );
			}

		} catch( Exception $e ) {

			return FALSE;
		}

		return TRUE;
	}


	/**
	 * Get list of posts id that needs to migrated
	 *
	 * @global wpdb $wpdb database object
	 *
	 * @return array
	 */
	public function not_migrated_posts_id() {

		global $wpdb;

		$posts_count = $this->concurrent_items();

		$sql = "SELECT p.ID FROM $wpdb->posts as p WHERE p.post_status='publish' AND p.post_type = 'nav_menu_item' " .
		       "AND NOT EXISTS(SELECT pm.post_id FROM $wpdb->postmeta as pm where pm.post_id = p.ID AND pm.meta_key=%s AND pm.meta_value = %s LIMIT 1)" .
		       " LIMIT 0,%d";

		$sql = $wpdb->prepare(
			$sql,

			$this->config->resumable_key,
			$this->config->resumable_value,
			//
			$posts_count
		);

		return $wpdb->get_col( $sql );
	}

	/**
	 * Backup existing data before start migrating process
	 *
	 * @param array $menus
	 *
	 * @return bool true true on success.
	 */
	public function migration_backup( $menus ) {

		foreach ( $menus as $menu ) {

			if ( ! empty( $menu['menu'] ) && ! Migrator_Backup::backup( $menu['menu']['ID'], 'post', $menu['menu'] ) ) {
				return FALSE;
			}

			if ( ! empty( $menu['menu_meta'] ) && ! Migrator_Backup::backup( $menu['menu']['ID'], 'post_meta', $menu['menu_meta'] ) ) {

				if ( ! empty( $menu['menu']['ID'] ) ) {
					Migrator_Backup::delete( $menu['menu']['ID'], 'post' );
				}

				return FALSE;
			}

		}

		return TRUE;
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

		$steps ++; // One extra step for migrate menu options

		return max( $steps, 0 );
	}
}
