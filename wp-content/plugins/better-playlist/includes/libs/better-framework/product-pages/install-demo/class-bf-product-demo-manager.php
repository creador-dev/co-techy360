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


if ( ! class_exists( 'BF_Product_Multi_Step_Item' ) ) {
	if ( is_admin() ) {
		require_once BF_PRODUCT_PAGES_PATH . 'backend.php';
	} else {
		require_once BF_PRODUCT_PAGES_PATH . 'frontend.php';
	}
}


/**
 * Class BF_Product_Demo_Manager
 */
class BF_Product_Demo_Manager extends BF_Product_Multi_Step_Item {

	/**
	 * module id
	 *
	 * @var string
	 */
	public $id = 'install-demo';

	/**
	 * plugin installation step name have this prefix
	 *
	 * @var string
	 */
	public $plugin_installation_step_prefix = 'plugin_';

	/**
	 * demo import data context.  content or setting
	 *
	 * @var string
	 */
	public $data_context = 'content';


	protected function before_render() {

		if ( ! class_exists( 'BF_Product_Demo_Installer' ) ) {
			require_once BF_Product_Pages::get_path( 'install-demo/class-bf-product-demo-installer.php' );
		}
	}


	/**
	 * HTML output to display admin user.
	 *
	 * @param $options
	 */
	public function render_content( $options ) {

		if ( $demos_list = apply_filters( 'better-framework/product-pages/install-demo/config', array() ) ) :

			$is_active = bf_is_product_registered();

			?>
			<div class="bs-product-pages-install-demo">

				<?php

				foreach ( $demos_list as $demo_id => $demo_data ) :

					?>
					<div
							class="bf-item-container bs-pages-demo-item<?php if ( BF_Product_Demo_Installer::is_demo_installed( $demo_id ) ) {
								echo ' installed';
							}
							echo ! $is_active ? ' not-active' : ''; ?>">
						<div class="bs-pages-overlay "></div>

						<div class="bs-pages-ribbon-wrapper">
							<div class="bs-pages-ribbon">
							</div>
							<div class="bs-pages-ribbon-label">
								<i class="fa fa-check"></i>
							</div>
						</div>

						<figure>
							<img src="<?php echo esc_url( $demo_data['thumbnail'] ) ?>"
							     alt="<?php echo esc_attr( $demo_data['name'] ); ?>"
							     class="bs-demo-thumbnail">

							<?php if ( ! empty( $demo_data['badges'] ) ) { ?>
								<div class="demo-badges">
									<?php

									foreach ( (array) $demo_data['badges'] as $badge ) {
										echo '<span class="badge badge-', esc_attr( $badge ), '" >', $badge, '</span>';
									}

									?>
								</div>
							<?php } ?>
						</figure>
						<div class="bs-pages-progressbar">
							<div class="bs-pages-progress">

							</div>

						</div>

						<footer class="bf-item-footer bs-pages-demo-item-footer bf-clearfix">
							<span class="bf-item-title bs-pages-demo-name">
									<?php echo esc_html( $demo_data['name'] ); ?>
							</span>

							<?php if ( $is_active ) { ?>
								<div class="bf-item-buttons bs-pages-buttons"
								     data-demo-id="<?php echo esc_attr( $demo_id ) ?>">
									<?php #if ( has_filter( 'better-framework/product-pages/install-demo/' . $demo_id ) ) :
									?>
									<span class="install-demo highlight-section">
									<a href="#"
									   class="bf-btn-primary bs-pages-primary-btn"
									   disabled="disabled"><?php esc_html_e( 'Install', 'better-studio' ) ?></a>
								</span>
									<?php #endif;
									?>
									<span class="preview-demo">
									<a href="<?php echo esc_url( $demo_data['preview_url'] ); ?>" target="_blank"
									   class="bf-btn-secondary bs-pages-secondary-btn"><?php esc_html_e( 'Preview', 'better-studio' ) ?></a>
								</span>
									<span class="uninstall-demo highlight-section">
									<a href="#"
									   class="bf-btn-secondary bs-pages-secondary-btn"><?php esc_html_e( 'Uninstall', 'better-studio' ) ?></a>
								</span>
								</div>
								<div class="messages">
									<div class="installing highlight-section">
										<i class="fa fa-refresh fa-spin"></i>
										<?php esc_html_e( 'Installing...', 'better-studio' ) ?>
									</div>
									<div class="uninstalling highlight-section">
										<i class="fa fa-refresh fa-spin"></i>
										<?php esc_html_e( 'Uninstalling...', 'better-studio' ) ?>
									</div>
									<div class="installed highlight-section">
										<i class="fa fa-check"></i>
										<?php esc_html_e( 'Installed', 'better-studio' ) ?>
									</div>
									<div class="uninstalled highlight-section">
										<i class="fa fa-check"></i>
										<?php esc_html_e( 'Uninstalled', 'better-studio' ) ?>
									</div>
									<div class="failed">
										<?php esc_html_e( 'Process failed', 'better-studio' ) ?>
									</div>
								</div>
							<?php } else { ?>
								<span
										class="active-error"><?php _e( 'Please register your theme', 'better-studio' ); ?></span>
							<?php } ?>
						</footer>
					</div>
				<?php endforeach ?>

				<div class="clearfix"></div>
			</div>

			<?php

		else:

			//TODO: add alert class to this message
			echo 'no demo registered';

		endif;
	}


	/**
	 * @return null|BF_Product_Plugin_Manager object on success null otherwise
	 */
	protected function get_plugin_manager_instance() {

		$plugin_installer = BF_Product_Pages::Run()->get_item_handler_instance( 'plugins' );

		if ( $plugin_installer ) {

			return $plugin_installer;
		}
	}


	/**
	 * @return null|BF_Demo_Install_Plugin_Adapter object on success null otherwise
	 */
	protected function get_plugin_installer_adapter() {


		if ( ! class_exists( 'BF_Demo_Install_Plugin_Adapter' ) ) {

			$class_path = BF_Product_Pages::get_path( 'install-demo/class-bf-demo-install-plugin-adapter.php' );

			if ( file_exists( $class_path ) ) {
				require_once $class_path;
			}

			return new BF_Demo_Install_Plugin_Adapter();
		}
	}


	/**
	 * Calculate how many step needs to complete installation of demo.
	 *
	 * @param string $demo_id       Demo ID
	 * @param string $context       Demo process action( install|uninstall )
	 *
	 * @return array|bool boll on failure or array on success.
	 *
	 * array {
	 *
	 * @type         $total         integer number of total steps
	 * @type         $step          array    each data type, how many step need to complete.
	 * @type         $plugins       only plugin installation process. how many step needs to complete  install plugin.
	 *
	 * }
	 *
	 */
	protected function calculate_process_steps( $demo_id, $context = 'install' ) {

		$demo_data = $this->get_demo_data( $demo_id );

		if ( empty( $demo_data ) ) {
			return false;
		}

		$total = 0;
		$steps = $plugins = array();

		// calculate how many steps take to complete installation plugin process

		if ( ! empty( $demo_data['plugins'] ) && is_array( $demo_data['plugins'] ) ) {

			/**
			 * @var $plugin_manager BF_Product_Plugin_Manager
			 */
			$plugin_manager = $this->get_plugin_manager_instance();

			if ( $plugin_manager ) {

				$plugins_list = $plugin_manager->get_plugins_data();

				foreach ( $demo_data['plugins'] as $plugin_ID ) {

					if ( ! isset( $plugins_list[ $plugin_ID ] ) ) {
						continue;
					}

					$plugin_data          = &$plugins_list[ $plugin_ID ];
					$installation_process = $plugin_manager->calculate_process_steps( $plugin_data, 'install', true );

					if ( isset( $installation_process['steps'] ) ) {

						$total                                                        += $installation_process['total'];
						$steps[ $this->plugin_installation_step_prefix . $plugin_ID ] = $installation_process['total'];

						$plugins[ $plugin_ID ] = $installation_process;
					}

				}

			}
		}

		if ( ! class_exists( 'BF_Product_Demo_Installer' ) ) {
			require_once BF_Product_Pages::get_path( 'install-demo/class-bf-product-demo-installer.php' );
		}

		foreach ( BF_Product_Demo_Installer::import_data_sequence() as $type ) {

			if ( ! isset( $demo_data[ $type ] ) ) {
				continue;
			}

			$data = &$demo_data[ $type ];

			if ( ( $context === 'uninstall' && ( ! isset( $data['uninstall_multi_steps'] ) || ! $data['uninstall_multi_steps'] ) )
			     ||
			     ( $context !== 'uninstall' && ( ! isset( $data['multi_steps'] ) || ! $data['multi_steps'] ) )
			) {

				$steps[ $type ] = 1;
				$total ++;
			} else {

				unset( $data['multi_steps'] );
				unset( $data['uninstall_multi_steps'] );

				$current_type_steps = $this->calc_steps( $data, $type );
				$steps[ $type ]     = $current_type_steps;
				$total              += $current_type_steps;
			}
		}

		// uninstalling step have a extra step called clean, to make sure
		// all temporary data will deleted and uninstalling completed.
		if ( $context === 'uninstall' ) {
			$steps['clean'] = 1;
			$total ++;

		}

		return compact( 'total', 'steps', 'plugins' );
	}


	/**
	 * Calculate how many step needs to import data
	 *
	 * @param array  $data      array of data
	 * @param string $data_type {@see BF_Product_Demo_Factory::import_data_sequence}
	 *
	 * @return int number of steps
	 */
	public function calc_steps( $data, $data_type ) {

		$method   = sprintf( 'calc_%s_per_step', $data_type );
		$callback = array( $this, $method );

		if ( is_callable( $callback ) ) {
			$step = call_user_func( $callback, $data );

			return ceil(
				bf_count( $data ) /
				$step
			);
		}

		return bf_count( $data );
	}


	/**
	 * Calculate how many step needs to import media per each step
	 *
	 * @return int number of steps
	 */
	public function calc_media_per_step() {

		$is_memory_enough = bf_is_ini_value_changeable() || wp_convert_hr_to_bytes( WP_MEMORY_LIMIT ) < 67108864; // 64MB

		if ( ! $is_memory_enough ) {
			$import_per_step = 2;
		} elseif ( version_compare( '5.3', PHP_VERSION, '>' ) ) {
			$import_per_step = 2;
		} elseif ( version_compare( '5.5', PHP_VERSION, '>' ) ) {
			$import_per_step = 3;
		} elseif ( version_compare( '5.5', PHP_VERSION, '<=' ) ) {
			$import_per_step = 4;
		} else {
			$import_per_step = 2;
		}

		return apply_filters( 'better-framework/product-pages/install-demo/media-per-steps', $import_per_step, $is_memory_enough );
	}


	/**
	 * @param array  $demo_data
	 * @param string $context
	 *
	 * @return array
	 */
	public function prepare_data_before_import( $demo_data, $context = 'install' ) {

		foreach ( $demo_data as $data_type => $data ) {
			$method   = sprintf( 'calc_%s_per_step', $data_type );
			$callback = array( $this, $method );

			if ( is_callable( $callback ) ) {
				$step = call_user_func( $callback );

				if ( ( $context === 'uninstall' && ( ! isset( $data['uninstall_multi_steps'] ) || ! $data['uninstall_multi_steps'] ) )
				     ||
				     ( $context !== 'uninstall' && ( ! isset( $data['multi_steps'] ) || ! $data['multi_steps'] ) )
				) {
					$demo_data[ $data_type ] = array( $data );
				} else {
					$demo_data[ $data_type ] = $this->array_chunk( $data, $step );
				}
			}
		}

		return $demo_data;
	}


	/**
	 * @param array $array
	 * @param int   $size
	 *
	 * @return array
	 */
	protected function array_chunk( $array, $size ) {

		$array2merge = array();
		// list of keys to skip chunk action
		$ignore_chunk = array(
			'multi_steps',
			'uninstall_multi_steps'
		);
		foreach ( $ignore_chunk as $key ) {
			if ( isset( $array[ $key ] ) ) {
				$array2merge[ $key ] = $array[ $key ];

				unset( $array[ $key ] );
			}
		}

		$result = array_chunk( $array, $size );
		if ( $array2merge ) {
			$result = array_merge( $array2merge, $result );
		}

		return $result;
	}


	/**
	 * @param string $demo_id
	 *
	 * @return array
	 */
	protected function get_demo_data( $demo_id ) {

		return bf_get_demo_data( $demo_id, $this->data_context );
	}


	/**
	 * ajax handler for demo install/unInstall demo requests
	 *
	 * @param Array $params
	 *
	 * @return bool true on success or false on failure.
	 *
	 * @see BS_Theme_Pages_Item::append_hidden_fields()
	 */
	public function ajax_request( $params ) {

		$required_params = array(
			'bs_pages_action' => '',
			'demo_id'         => '',
			'context'         => '',
		);

		if ( array_diff_key( $required_params, $params ) ) {
			return false;
		}
		$demo_id = &$params['demo_id'];

		//set demo data context
		if ( $params['context'] === 'install' ) {

			$this->data_context = isset( $params['have_content'] ) && $params['have_content'] === 'no' ? 'setting' : 'content';
		} elseif ( $params['context'] === 'uninstall' ) {

			// read data context saved in database when demo installed
			$option_name  = sprintf( 'bs_demo_id_%s', $demo_id );
			$option_value = get_option( $option_name, array() );

			if ( ! empty( $option_value['_context'] ) ) {
				$this->data_context = $option_value['_context'];
			}

		}

		$response = array();
		try {
			switch ( $params['bs_pages_action'] ) {

				case 'get_steps':

					if ( $install_steps = $this->calculate_process_steps( $params['demo_id'], $params['context'] ) ) {

						$this->set_steps_data( $params['demo_id'], $install_steps );

						$response = array(
							'steps'       => array_values( $install_steps['steps'] ),
							'types'       => array_keys( $install_steps['steps'] ),
							'steps_count' => bf_count( $install_steps['steps'] ) - 1,
							'total'       => $install_steps['total'],
						);
					}

					//save demo data context to database, used to rollback demo
					if ( $params['context'] === 'install' ) {
						$option_name              = sprintf( 'bs_demo_id_%s', $demo_id );
						$option_value             = get_option( $option_name, array() );
						$option_value['_context'] = $this->data_context;
						update_option( $option_name, $option_value, 'no' );
					}

					break;


				case 'import':

					if ( isset( $params['current_type'] ) && isset( $params['current_step'] ) ) {

						$type  = &$params['current_type'];
						$step  = intval( $params['current_step'] );
						$index = $step - 1;


						$current_data = false;
						$demo_data    = $this->get_demo_data( $demo_id );
						$demo_data    = $this->prepare_data_before_import( $demo_data );

						//					$is_single_step = empty( $demo_data[ $type ]['multi_step'] );

						if ( isset( $demo_data[ $type ][ $index ] ) ) {

							$current_data = &$demo_data[ $type ][ $index ];

							if ( ! class_exists( 'BF_Product_Demo_Installer' ) ) {
								require_once BF_Product_Pages::get_path( 'install-demo/class-bf-product-demo-installer.php' );
							}

							$response = BF_Product_Demo_Installer::Run()->import_start( $current_data, $type, $index, $demo_id, $this->data_context );

							BF_Product_Demo_Installer::Run()->import_stop();

							if ( $this->is_final_step( $demo_id, $type, $step ) ) {

								$this->delete_steps_data( $demo_id );

								BF_Product_Demo_Installer::Run()->import_finished();
							}
						} else {

							//make sure its plugin installation step
							$pattern = preg_quote( $this->plugin_installation_step_prefix );
							if ( preg_match( "/^$pattern(.+)/i", $params['current_type'], $matched ) ) {

								$plugin_ID = &$matched[1];
								$step      = intval( $params['current_step'] );

								/**
								 * @var $plugin_installer BF_Demo_Install_Plugin_Adapter
								 * @var $plugin_manager   BF_Product_Plugin_Manager
								 */
								$plugin_installer = $this->get_plugin_installer_adapter();
								$plugin_manager   = $this->get_plugin_manager_instance();

								$steps_data = $this->get_steps_data( $demo_id );

								if ( $plugin_installer && $plugin_manager ) {

									$step_data = $this->get_steps_data( $demo_id );

									if ( isset( $step_data['plugins'][ $plugin_ID ] ) ) {

										$plugin_steps = &$step_data['plugins'][ $plugin_ID ];

										$plugin_installer->install_start( $plugin_steps, $step, $plugin_ID );
										$plugin_installer->install_stop();
									}
								}

								$response = true;
							}
						}
					}
					break;

				case 'rollback':

					if ( isset( $params['current_type'] ) && isset( $params['current_step'] ) ) {

						$type  = &$params['current_type'];
						$step  = intval( $params['current_step'] );
						$index = $step - 1;

						if ( ! class_exists( 'BF_Product_Demo_Installer' ) ) {
							require_once BF_Product_Pages::get_path( 'install-demo/class-bf-product-demo-installer.php' );
						}

						$response = BF_Product_Demo_Installer::Run()->rollback_start( $type, $index, $demo_id, $this->data_context );
						$response = is_wp_error( $response ) ? $response : true;

						BF_Product_Demo_Installer::Run()->rollback_stop();
					}
					break;

				case 'rollback_force':

					if ( ! class_exists( 'BF_Product_Demo_Installer' ) ) {
						require_once BF_Product_Pages::get_path( 'install-demo/class-bf-product-demo-installer.php' );
					}

					$response = true;
					BF_Product_Demo_Installer::Run()->rollback_force( $demo_id, $this->data_context );
					break;
			}
		} catch( Exception $e ) {
			$response = new WP_Error( $e->getCode(), $e->getMessage() );
		}

		if ( is_wp_error( $response ) ) {
			/**
			 * @var WP_Error $response
			 */
			$response = array(
				'is_error'      => true,
				'error_message' => $response->get_error_message(),
				'error_code'    => $response->get_error_code(),
			);
		}

		if ( $response ) {
			return $response;
		}

		return false;
	} // ajax_request
}