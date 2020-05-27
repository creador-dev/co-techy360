<?php

if ( ! function_exists( 'mg_get_array_index' ) ) {

	/**
	 * Pick an index from given array
	 *
	 * @param array $array
	 * @param array $indexes
	 *
	 * @since 1.0.0
	 * @return mixed
	 */
	function mg_get_array_index( &$array, $indexes ) {

		if ( $indexes ) {

			if ( is_string( $indexes ) ) {
				$indexes = explode( '.', $indexes );
			} elseif ( count( $indexes ) === 1 ) {
				$indexes = explode( '.', $indexes[0] );
			}

			$first_index = array_shift( $indexes );

			if ( isset( $array[ $first_index ] ) ) {

				$data = $array[ $first_index ];

				foreach ( $indexes as $index ) {

					if ( ! isset( $data[ $index ] ) ) {
						return;
					}

					$data = $data[ $index ];
				}

				return $data;
			}

		} else {
			return $array;
		}
	}
}

if ( ! function_exists( 'mg_push_value' ) ) {


	/**
	 * Push $value into $data
	 *
	 * @param array  &$data
	 * @param string &$id
	 * @param mixed  &$value
	 *
	 * @since  1.0.0
	 */
	function mg_push_value( &$data, &$id, &$value ) {

		$ref = &$data;

		foreach ( explode( '.', $id ) as $index ) {

			if ( is_string( $ref ) ) { // if is not array it cause php error, illegal index
				return;
			}

			if ( ! isset( $ref[ $index ] ) ) {
				$ref[ $index ] = array();
			}

			$ref = &$ref[ $index ];
		}

		$ref = $value;
	}
}


if ( ! function_exists( 'mg_generate_uuid4' ) ) {

	/**
	 * Generate a random UUID (version 4).
	 *
	 * @since 1.0.0
	 *
	 * @return string UUID.
	 */
	function mg_generate_uuid4() {

		//
		// WP >=  4.7.0
		//
		if ( function_exists( 'wp_generate_uuid4' ) ) {

			return wp_generate_uuid4();
		}

		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}
}


if ( ! function_exists( 'mg_get_migration_steps' ) ) {

	/**
	 * Get How many steps need to complete the migration process
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type theme|plugin
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function mg_get_migration_steps( $source_product, $destination_product, $product_type ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-steps' : 'wp-migrator-themes-steps';
		$steps       = get_option( $option_name, array() );

		if ( $steps && isset( $steps[ $source_product ][ $destination_product ] ) ) {

			return $steps[ $source_product ][ $destination_product ];
		}

		return array();
	}
}


if ( ! function_exists( 'mg_set_migration_steps' ) ) {

	/**
	 * Set migration process steps
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 * @param array  $steps Migration_Process::calculate_steps
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function mg_set_migration_steps( $source_product, $destination_product, $product_type, $steps ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-steps' : 'wp-migrator-themes-steps';
		//
		$recalls = get_option( $option_name, array() );

		$recalls[ $source_product ][ $destination_product ] = $steps;

		return update_option( $option_name, $recalls );
	}
}


if ( ! function_exists( 'mg_is_migration_paused' ) ) {

	/**
	 * Detect is product paused
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function mg_is_migration_paused( $source_product, $destination_product, $product_type ) {

		$percentage = mg_get_migration_steps( $source_product, $destination_product, $product_type );

		return ! empty( $percentage ) && mg_get_migration_paused_step( $source_product, $destination_product, $product_type ) > 0;
	}
}

if ( ! function_exists( 'mg_get_migration_paused_step' ) ) {

	/**
	 * Determine migration process stopped in which step
	 *
	 * @see   mg_get_migration_steps for steps sequence and
	 *
	 * @param string $source_product      the unique id of source product
	 * @param string $destination_product the unique id of destination product
	 * @param string $product_type        theme|plugin
	 *
	 * @since 1.0.0
	 * @return int
	 */
	function mg_get_migration_paused_step( $source_product, $destination_product, $product_type ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-paused-plugins' : 'wp-migrator-paused-themes';
		$paused      = get_option( $option_name, array() );

		if ( isset( $paused[ $source_product ][ $destination_product ] ) ) {
			return intval( $paused[ $source_product ][ $destination_product ] );
		}

		return 0;
	}
}
if ( ! function_exists( 'mg_set_migration_paused_step' ) ) {

	/**
	 * Update current active step of the migration process
	 *
	 * @see   mg_get_migration_paused_step
	 *
	 * @param string $source_product      the unique id of source product
	 * @param string $destination_product the unique id of destination product
	 * @param string $product_type        theme|plugin
	 * @param int    $type                current active type
	 * @param int    $step                current step number
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function mg_set_migration_paused_step( $source_product, $destination_product, $product_type, $type, $step ) {

		$initial = 0;

		if ( $steps = mg_get_migration_steps( $source_product, $destination_product, $product_type ) ) {

			foreach ( $steps as $step_type => $many ) {

				if ( $type === $step_type ) {
					break;
				}

				$initial += $many;
			}
		}

		$option_name = $product_type === 'plugin' ? 'wp-migrator-paused-plugins' : 'wp-migrator-paused-themes';
		$paused      = get_option( $option_name, array() );

		$paused[ $source_product ][ $destination_product ] = intval( $step ) + $initial;

		return update_option( $option_name, $paused );
	}
}

if ( ! function_exists( 'mg_get_migration_uuid' ) ) {

	/**
	 *
	 * @param string $source_product      the unique id of the source product
	 * @param string $destination_product the unique id of the destination product
	 * @param string $product_type        theme|plugin
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function mg_get_migration_uuid( $source_product, $destination_product, $product_type ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-uuid' : 'wp-migrator-themes-uuid';
		$ids         = get_option( $option_name, array() );

		if ( isset( $ids[ $source_product ][ $destination_product ] ) ) {
			return $ids[ $source_product ][ $destination_product ];
		}

		return '';
	}
}

if ( ! function_exists( 'mg_set_migration_uuid' ) ) {

	/**
	 *
	 * @param string $source_product      the unique id of the source product
	 * @param string $destination_product the unique id of the destination product
	 * @param string $product_type        theme|plugin
	 * @param string $uuid
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function mg_set_migration_uuid( $source_product, $destination_product, $product_type, $uuid = '' ) {

		if ( empty( $uuid ) ) {
			$uuid = mg_generate_uuid4();
		}

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-uuid' : 'wp-migrator-themes-uuid';
		$ids         = get_option( $option_name, array() );

		$ids[ $source_product ][ $destination_product ] = $uuid;

		return update_option( $option_name, $ids );
	}
}

if ( ! function_exists( 'mg_set_migration_settings' ) ) {

	/**
	 * Set migration process settings
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 * @param array  $settings
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function mg_set_migration_settings( $source_product, $destination_product, $product_type, $settings ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-settings' : 'wp-migrator-themes-settings';
		//
		$data = get_option( $option_name, array() );

		$data[ $source_product ][ $destination_product ] = $settings;

		return update_option( $option_name, $data );
	}
}

if ( ! function_exists( 'mg_get_migration_settings' ) ) {

	/**
	 * Get migration process settings
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function mg_get_migration_settings( $source_product, $destination_product, $product_type ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-settings' : 'wp-migrator-themes-settings';
		//
		$data = get_option( $option_name, array() );

		if ( isset( $data[ $source_product ][ $destination_product ] ) ) {
			return $data[ $source_product ][ $destination_product ];
		}

		return array();
	}
}


if ( ! function_exists( 'mg_finished_migration_process' ) ) {

	/**
	 * Clear steps information
	 *
	 * @param string $source_product      the unique id of the source product
	 * @param string $destination_product the unique id of the destination product
	 * @param string $product_type
	 *
	 * @since 1.0.0
	 */
	function mg_finished_migration_process( $source_product, $destination_product, $product_type ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-paused-plugins' : 'wp-migrator-paused-themes';

		$paused = get_option( $option_name, array() );
		unset( $paused[ $source_product ][ $destination_product ] );
		//
		update_option( $option_name, $paused );


		// Clear steps
		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-steps' : 'wp-migrator-themes-steps';
		$steps       = get_option( $option_name, array() );
		unset( $steps[ $source_product ][ $destination_product ] );
		//
		update_option( $option_name, $steps );


		// Clear uuid
		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-uuid' : 'wp-migrator-themes-uuid';
		$ids         = get_option( $option_name, array() );
		unset( $ids[ $source_product ][ $destination_product ] );
		//
		update_option( $option_name, $ids );


		// clear log

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-log' : 'wp-migrator-themes-log';

		$history = (array) get_option( $option_name, array() );
		unset( $history[ $source_product ][ $destination_product ] );

		update_option( $option_name, $history );

	}
}


if ( ! function_exists( 'mg_log_migration_process' ) ) {

	/**
	 *
	 * @param string $source_product      the unique id of the source product
	 * @param string $destination_product the unique id of the destination product
	 * @param string $product_type        theme|plugin
	 * @param string $situation           started|finished|error|paused
	 *
	 * @since 1.0.0
	 * @return boolean true on success
	 */
	function mg_log_migration_process( $source_product, $destination_product, $product_type, $situation ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-log' : 'wp-migrator-themes-log';

		$history = (array) get_option( $option_name, array() );
		$item    = &$history[ $source_product ][ $destination_product ];


		switch ( $situation ) {

			case 'started':
			case 'error':
			case 'finished':
			case 'paused':

				if ( ! isset( $item[ $situation ] ) ) {

					$item[ $situation ] = array();
				}

				array_push( $item[ $situation ], array(
					time(),
					get_current_user_id(),
				) );

				break;

			/*
						case 'error':
						case 'finished':
						case 'paused':

							if ( $item && is_array( $item ) ) {

								end( $item );

								$id = key( $item );

								if ( empty( $item[ $id ]['finished'] ) ) {

									$situation === 'finished' ? 'done' : NULL;

									$item[ $id ][ $situation ] = time();
									$item[ $id ]['status']     = $situation;
								}
							}

							break;
			*/
		}

		return update_option( $option_name, $history );
	}
}
if ( ! function_exists( 'mg_get_process_log' ) ) {

	/**
	 * Read migration process log
	 *
	 * @param string $source_product      the unique id of the source product
	 * @param string $destination_product the unique id of the destination product
	 * @param string $product_type        theme|plugin
	 *
	 * @since 1.0.0
	 * @return array
	 */
	function mg_get_process_log( $source_product, $destination_product, $product_type ) {

		$option_name = $product_type === 'plugin' ? 'wp-migrator-plugins-log' : 'wp-migrator-themes-log';
		$history     = get_option( $option_name, array() );


		if ( isset( $history[ $source_product ][ $destination_product ] ) ) {

			return $history[ $source_product ][ $destination_product ];
		}

		return array();
	}
}

// FIXME: add hook : mg_finished_migration_process
