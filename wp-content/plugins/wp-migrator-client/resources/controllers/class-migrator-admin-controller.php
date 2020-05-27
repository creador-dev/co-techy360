<?php


class Migrator_Admin_Controller extends Migrator_Controller {

	/**
	 * Store Localize script variables
	 *
	 * @var array
	 */
	public $l10n = array();


	/**
	 * Initialize
	 *
	 * @since initial
	 */
	public function setup() {

		$this->l10n = array(
			'ajaxurl' => mg_ajax_url(),

			'labels' => array(
				'play'      => __( 'Start migration', WPMG_LOC ),
				'pause'     => __( 'Pause importing', WPMG_LOC ),
				'starting'  => __( 'Starting', WPMG_LOC ),
				'importing' => __( 'importing %s', WPMG_LOC ),
			),
		);

		parent::setup();

		add_action( 'wp_ajax_migration_steps', array( $this, 'ajax_get_migration_steps' ) );

		add_action( 'wp_ajax_migration_process', array( $this, 'ajax_do_migration' ) );
	}


	/**
	 * Enqueue css/js file dependencies
	 *
	 * @since 1.0.0
	 */
	public function tear_down() {

		parent::tear_down();

		wp_enqueue_style( 'font-awesome', mg_asset( 'css/font-awesome.min.css' ) );
		wp_enqueue_style( 'wp-migrator-panel', mg_asset( 'css/wp-migrator-panel.css' ) );

		if ( is_rtl() ) {
			wp_enqueue_style( 'wp-migrator-panel-rtl', mg_asset( 'css/wp-migrator-panel-rtl.css' ) );
		}

		wp_enqueue_script( 'wp-migrator', mg_asset( 'js/wp-migrator.js' ), array( 'jquery' ) );
		wp_localize_script( 'wp-migrator', 'wp_migrator_loc', $this->l10n );
	}


	/**
	 * Get current active theme info
	 *
	 * @since 1.0.0
	 * @return WP_Theme
	 */
	public function current_theme() {


		$theme = wp_get_theme();

		if ( '' != $theme->get( 'Template' ) ) {
			$theme = wp_get_theme( $theme->get( 'Template' ) );
		}

		return $theme;
	}


	/**
	 * Migration main page
	 *
	 * @since 1.0.0
	 *
	 * @throws BS_Exception
	 * @return bool|string|WP_Error
	 */
	public function index() {

		$request = Migrator_Connector::products_list();

		$themes                  = isset( $request['themes'] ) ? array_values( $request['themes'] ) : array();
		$current_theme           = $this->current_theme()->get( 'Name' );
		$theme_migration_support = TRUE; // FIXME: check

		$plugins                  = isset( $request['plugins'] ) ? array_values( $request['plugins'] ) : array();
		$plugin_migration_support = TRUE;

		$this->l10n['items'] = compact( 'themes', 'plugins' );

		return mg_view( 'main', compact(
			'themes',
			'theme_migration_support',
			'plugin_migration_support',
			'current_theme',
			'plugins'
		) );
	}


	/**
	 * Migrate an item page
	 *
	 * @param string $item
	 *
	 * @since 1.0.0
	 *
	 * @throws BS_Exception
	 * @return bool|string
	 */
	public function migrate( $item ) {


		$this->l10n['on_error'] = array(
			'button_ok'       => __( 'Ok', WPMG_LOC ),
			'default_message' => __( 'Cannot mirate theme/plugin.', WPMG_LOC ),
			'body'            => __( 'Please try again several minutes later or contact better studio team support.', WPMG_LOC ),
			'header'          => __( 'theme/plugin migration failed', WPMG_LOC ),
			'title'           => __( 'An error occurred while migrating process', WPMG_LOC ),
			'display_error'   => __( '<div class="bs-pages-error-section">
					<a href="#" class="btn bs-pages-error-copy" data-copied="' . esc_attr__( 'Copied !', WPMG_LOC ) . '">
						<i class="fa fa-files-o" aria-hidden="true"></i> Copy</a>  <textarea> Error:  %ERROR_CODE% %ERROR_MSG% </textarea>
				</div>', 'better-studio' ),
		);

		try {

			$view_vars = array();

			{ # Validate

				$product_type = isset( $_GET['type'] ) && in_array( $_GET['type'], array(
					'theme',
					'plugin'
				) ) ? $_GET['type'] : 'theme';

				$product_info   = Migrator_Connector::product_info( $item, $product_type );
				$source_product = isset( $product_info['info'] ) ? $product_info['info'] : array();

				if ( $item === 'publisher' ) {

					throw new Exception( 'You cannot migrate publisher to any other themes' );
				}

				if ( empty( $product_info ) || empty( $source_product ) ) {

					throw new Exception( 'server-error' );
				}

				if ( empty( $product_info['linked_products'] ) && $product_type === 'plugin' ) {

					throw new Exception( 'Cannot migrate this plugin' );
				}

				array_push( $view_vars, 'source_product', 'product_type', 'product_type' );
			}


			{ # Prepare destination product information

				$migrate_to = isset( $product_info['migrate_to'] ) ? $product_info['migrate_to'] : '';

				$destination_product = $active_plugins = array();
				$products            = array();

				$labels = array(
					'posts'      => __( 'Posts', WPMG_LOC ),
					'menus'      => __( 'Menu items', WPMG_LOC ),
					'terms'      => __( 'Category, Tag & Terms', WPMG_LOC ),
					'shortcodes' => __( 'Shortcodes', WPMG_LOC ),
				);

				$products_list = Migrator_Connector::products_list();

				if ( $product_type === 'theme' ) {

					$destination_product = array(
						'thumbnail'    => mg_asset( 'img/publisher.png' ),
						'creator_url'  => 'http://betterstudio.com',
						'creator_name' => 'Better Studio',
						'id'           => 'publisher',
						'name'         => 'Publisher',
					);

				} elseif ( $product_type === 'plugin' ) {

					if ( ! empty( $product_info['linked_products'] ) && ! $migrate_to ) {

						if ( ! empty( $product_info['linked_products'] ) && ! empty( $products_list[ $product_type . 's' ] ) ) {

							$products       = $product_info['linked_products'];
							$active_plugins = array_intersect_key( $products, Migrator_Util::list_active_plugins( FALSE ) );

							if ( /* count( $products ) === 1 &&*/
								count( $active_plugins ) === 1
							) {

								$destination_product = key( $products );
							} else {

								$destination_product = isset( $_GET['destination'] ) ? $_GET['destination'] : '';
							}

							if ( $destination_product && isset( $products[ $destination_product ] ) ) {

								$destination_product = $products[ $destination_product ];
							}
						}
					}
				}


				array_push( $view_vars, 'destination_product' );
			}


			{  # Choose destination product if needed

				if ( empty( $destination_product ) ) {

					$disabled     = empty( $active_plugins );
					$base_product = $product_info['info'];

					return mg_view( 'choose', compact( 'products', 'disabled', 'base_product', 'active_plugins', 'source_product' ) );

				} elseif ( ! is_array( $destination_product ) || empty( $destination_product['id'] ) ) {


					throw  new Exception( 'Invalid product ID.' );
				}

				array_push( $view_vars, '' );
			}

			{ # Fill variables that are associated with configuration

				$configs = $this->get_configuration_arrays( $source_product['id'], $destination_product['id'], $product_type );

				if ( mg_is_migration_paused( $source_product['id'], $destination_product['id'], $product_type ) ) {
					$this->l10n['current_state'] = mg_get_migration_steps( $source_product['id'], $destination_product['id'], $product_type );
					# $this->l10n['migration_id']  = mg_get_migration_uuid( $source_product['id'], $destination_product['id'], $product_type );
					$this->l10n['paused_step'] = mg_get_migration_paused_step( $source_product['id'], $destination_product['id'], $product_type );
				}

				$config       = Migrator_Connector::config( $product_type, $source_product['id'] );
				$migration_id = mg_get_migration_uuid( $source_product['id'], $destination_product['id'], $product_type );
				$percentage   = $this->calculate_migration_percentage( $source_product['id'], $destination_product['id'], $product_type );

				array_push( $view_vars, 'config', 'percentage', 'migration_id' );
			}


			{ # Prepare pre-migration settings

				$settings        = array();
				$process_manager = new Migrator_Process_Manager( $configs[0], $configs[1] );
				$saved_settings  = mg_get_migration_settings( $source_product['id'], $destination_product['id'], $product_type );
				$total           = 0;

				unset( $saved_settings['migrate']['widgets'] );

				if ( ! empty( $product_info['settings'] ) ) {

					$s = &$product_info['settings'];

					if ( isset( $s['parts'] ) ) {

						foreach ( $s['parts'] as $id => $status ) {

							$check_status = isset( $saved_settings['migrate'][ $id ] ) ? $saved_settings['migrate'][ $id ] === 'active' : $status[0];
							$label        = isset( $labels[ $id ] ) ? $labels[ $id ] : ucfirst( $id );
							$children     = array();

							if ( ! empty( $status['children'] ) ) {

								foreach ( $status['children'] as $child_id => $child_status ) {

									$child_label = isset( $labels[ $child_id ] ) ? $labels[ $child_id ] : ucfirst( $child_id );

									$children[ $child_id ] = array( $child_label, $child_status );
								}

							}

							$count           = $process_manager->count_items( $id );
							$settings[ $id ] = array( $label, $check_status, $children, $count );

							$total += $count;
						}
					}
				}


				array_push( $view_vars, 'settings', 'total' );
			}


			// Render migration view

			return mg_view( 'migrate', compact( $view_vars ) );

		} catch( Exception  $e ) {

			if ( 'server-error' === $e->getMessage() ) {

				return mg_view( 'server-error' );
			}

			return mg_view( 'error', array( 'error' => $e->getMessage() ) );
		}
	}


	/**
	 * Calculate how many step needs to finish the process
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 *
	 * @since 1.0.0
	 * @return int
	 */
	public function calculate_migration_percentage( $source_product, $destination_product, $product_type ) {

		if ( ! mg_is_migration_paused( $source_product, $destination_product, $product_type ) ) {
			return 0;
		}

		if ( ! $steps = mg_get_migration_steps( $source_product, $destination_product, $product_type ) ) {
			return 0;
		}

		if ( $total_steps = array_sum( $steps ) ) {

			$current_step = mg_get_migration_paused_step( $source_product, $destination_product, $product_type );

			return floor( ( $current_step * 100 ) / $total_steps );
		}

		return 0;
	}


	/**
	 * Ajax Action: migration_steps
	 *
	 * Callback:    Calculate how many steps need to complete the migration process
	 *
	 * @since 1.0.0
	 */
	public function ajax_get_migration_steps() {

		if ( empty( $_REQUEST['product'] ) || ! strstr( $_REQUEST['product'], ':' ) ) {
			return;
		}

		$parse_product = explode( ':', $_REQUEST['product'], 3 );

		if ( count( $parse_product ) !== 3 ) {
			return;
		}

		$prev_settings = array();

		$settings = isset( $_REQUEST['settings'] ) &&
		            is_array( $_REQUEST['settings'] ) ? $_REQUEST['settings'] : array();

		$destination_product = $parse_product[2];
		$source_product      = $parse_product[1];
		$product_type        = $parse_product[0];

		if ( ! $configs = $this->get_configuration_arrays( $source_product, $destination_product, $product_type ) ) {
			wp_send_json_error();
		}

		$migration_paused = FALSE;

		if ( ! empty( $_REQUEST['migration_id'] ) ) { // Start new migration

			if ( mg_get_migration_uuid( $source_product, $destination_product, $product_type ) == $_REQUEST['migration_id'] ) {

				$migration_id     = $_REQUEST['migration_id'];
				$migration_paused = TRUE;
			}
		}

		$force = isset( $settings['force'] ) && $settings['force'] === 'active';

		if ( $migration_paused && ! $force ) {

			$prev_settings = mg_get_migration_settings( $source_product, $destination_product, $product_type );
			$start_step    = mg_get_migration_paused_step( $source_product, $destination_product, $product_type );
			$start_step    += 1; // Next step

		} else {

			$migration_id = mg_generate_uuid4();

			mg_set_migration_uuid( $source_product, $destination_product, $product_type, $migration_id );

			mg_log_migration_process( $source_product, $destination_product, $product_type, 'started' );
		}

		$parts = array();

		if ( ! empty( $settings['migrate'] ) && is_array( $settings['migrate'] ) ) {

			foreach ( $settings['migrate'] as $part => $status ) {

				if ( 'active' === $status ) {
					$parts[] = $part;
				}
			}
		}

		$instance = new Migrator_Process_Manager( $configs[0], $configs[1] );
		$steps    = $instance->get_number_of_recalls( $parts );

		mg_set_migration_steps( $source_product, $destination_product, $product_type, $steps );

		mg_set_migration_settings( $source_product, $destination_product, $product_type, array_merge( $prev_settings, $settings ) );

		wp_send_json_success( compact( 'steps', 'migration_id', 'start_step' ) );
	}


	/**
	 * Ajax Action: migration_process
	 *
	 * Callback:    Handle migration requests
	 *
	 * @throws BS_Exception
	 *
	 * @since 1.0.0
	 */
	public function ajax_do_migration() {

		$required_fields = array(
			'product'      => '',
			'current_type' => '',
			'current_step' => '',
		);

		if ( array_diff_key( $required_fields, $_REQUEST ) ) {
			return;
		}

		$parse_product = explode( ':', $_REQUEST['product'], 3 );

		if ( count( $parse_product ) !== 3 ) {
			wp_send_json_error();
		}

		$destination_product = $parse_product[2];
		$source_product      = $parse_product[1];
		$product_type        = $parse_product[0];

		$type = $_REQUEST['current_type'];
		$step = $_REQUEST['current_step'];

		if ( ! $configs = $this->get_configuration_arrays( $source_product, $destination_product, $product_type ) ) {
			wp_send_json_error();
		}

		$instance = new Migrator_Process_Manager( $configs[0], $configs[1] );
		$migrate  = $instance->migrate( $type );

		if ( $migrate >= 0 && ! is_wp_error( $migrate ) ) {

			$settings = mg_get_migration_settings( $source_product, $destination_product, $product_type );
			$data     = array();

			$settings['migrated_items'] = isset( $settings['migrated_items'] ) ?
				$settings['migrated_items'] + $migrate : $migrate;

			if ( $this->is_final_step( $source_product, $destination_product, $product_type, $type, $step ) ) {

				mg_log_migration_process( $source_product, $destination_product, $product_type, 'finished' );

				$logs   = mg_get_process_log( $source_product, $destination_product, $product_type );
				$start  = 0;
				$finish = time();

				if ( ! empty( $logs['started'] ) ) {
					$log_item = end( $logs['started'] );
					$start    = $log_item[0];
				}

				// todo: fix static values
				$data['skipped'] = 0;
				$data['warning'] = 0;
				$data['success'] = isset( $settings['migrated_items'] ) ? $settings['migrated_items'] : 0;

				$data['msg'] = sprintf(
					__( 'All done! all items were successfully switched in %s and there were 0 failures.', WPMG_LOC ),
					human_time_diff( $start, $finish )
				);

				mg_finished_migration_process( $source_product, $destination_product, $product_type );

			} else {

				mg_set_migration_paused_step( $source_product, $destination_product, $product_type, $type, $step );
				mg_log_migration_process( $source_product, $destination_product, $product_type, 'paused' );
			}

			mg_set_migration_settings( $source_product, $destination_product, $product_type, $settings );

			wp_send_json_success( $data );

		} else {


			if ( Migrator_Connector::$last_error ) {
				wp_send_json_error( array(
					'message' => Migrator_Connector::$last_error[0],
					'code'    => Migrator_Connector::$last_error[1]
				) );
			}

			if ( is_wp_error( $migrate ) ) {
				wp_send_json_error( $migrate->get_error_message() );
			}

			wp_send_json_error();
		}
	}


	/**
	 * Fetch and prepare configuration array of the both products
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_configuration_arrays( $source_product, $destination_product, $product_type ) {

		if ( ! $config = Migrator_Connector::config( $product_type, $source_product ) ) {
			wp_send_json_error();
		}

		if ( ! $config2 = Migrator_Connector::config( $product_type, $destination_product ) ) {
			wp_send_json_error();
		}

		$this->prepare_configuration_array( $config, $source_product, $destination_product, $product_type );
		$this->prepare_configuration_array( $config2, $source_product, $destination_product, $product_type );

		return array( $config, $config2 );
	}


	/**
	 * Prepare migration process configuration array
	 *
	 * @param array  &$config
	 * @param string $source_product_id
	 * @param string $destination_product_id
	 * @param string $product_type
	 *
	 * @since 1.0.0
	 */
	protected function prepare_configuration_array( &$config, $source_product_id, $destination_product_id, $product_type ) {

		$resumable_value = mg_get_migration_uuid( $source_product_id, $destination_product_id, $product_type );

		$config = array_merge(
			compact( 'product_type', 'source_product_id', 'destination_product_id', 'resumable_value' ),
			$config
		);
	}


	/**
	 * Is the request final step of the migration process
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 *
	 * @param string $step_type
	 * @param string $step_number
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function is_final_step( $source_product, $destination_product, $product_type, $step_type, $step_number ) {

		if ( $steps = mg_get_migration_steps( $source_product, $destination_product, $product_type ) ) {

			$final_step_number = end( $steps );

			return key( $steps ) === $step_type && $final_step_number == $step_number;
		}

		return FALSE;
	}


	/**
	 * Is the request start step of the migration process
	 *
	 * @param string $source_product
	 * @param string $destination_product
	 * @param string $product_type
	 *
	 * @param string $step_type
	 * @param string $step_number
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function is_start_step( $source_product, $destination_product, $product_type, $step_type, $step_number ) {

		if ( $steps = mg_get_migration_steps( $source_product, $destination_product, $product_type ) ) {

			return key( $steps ) === $step_type && 1 == $step_number[ key( $steps ) ];
		}

		return FALSE;
	}
}
