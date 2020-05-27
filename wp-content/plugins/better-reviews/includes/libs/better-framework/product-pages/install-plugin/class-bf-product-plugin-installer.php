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
 * plugin installer/ updater handler
 *
 * Class BF_Product_Plugin_Factory
 */
class BF_Product_Plugin_Installer extends BF_Product_Pages_Base {

	/**
	 * store data while installing plugin. at last save data into an option
	 *
	 * @var array
	 */
	private $process_data;

	/**
	 * installing plugin data, option key
	 *
	 * @var string
	 */
	private $data_option_name;

	/**
	 * store list of plugin file array {
	 *  plugin_directory => plugin_directory/plugin_file.php
	 * }
	 *
	 * @var array
	 */
	static $plugins_file;

	/**
	 * store list of plugins need update array {
	 *  plugin_directory => plugin_directory/plugin_file.php
	 * }
	 *
	 * @var array
	 */
	static $plugins_update;

	/**
	 * temporary data option name pattern
	 *
	 * %s replace with plugin name
	 *
	 * @var string
	 */
	private $option_name_pattern = 'bs_plugin_%s';


	/**
	 * @var array
	 */
	private $messages = array();


	/**
	 * BF_Product_Plugin_Factory constructor.
	 *
	 */
	public function __construct() {

		if ( ! class_exists( 'Plugin_Upgrader' ) ) {

			require_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
		}
	}


	/**
	 * get list of plugins and cache
	 *
	 * @see $plugins_file
	 *
	 * @return array array of plugins on success.
	 */
	public static function get_plugins_basename() {

		if ( ! is_array( self::$plugins_file ) ) {

			self::$plugins_file = array();

			if ( function_exists( 'get_plugins' ) ) { // fix for when there is no any active plugin!
				foreach ( get_plugins() as $file => $info ) {
					self::$plugins_file[ dirname( $file ) ] = $file;
				}
			}
		}

		return self::$plugins_file;
	}


	/**
	 * check a plugin in already installed
	 *
	 * @param string $plugin_directory plugin directory name
	 *
	 * @return bool return true if plugin installed
	 */

	public static function is_plugin_installed( $plugin_directory ) {

		self::get_plugins_basename();

		return ! empty( self::$plugins_file[ $plugin_directory ] );
	}


	/**
	 * Get the plugin file relative path
	 *
	 * @param string $plugin_directory plugin directory name
	 *
	 * @return string
	 */
	public static function the_plugin_file( $plugin_directory ) {

		self::get_plugins_basename();

		if ( isset( self::$plugins_file[ $plugin_directory ] ) ) {

			return self::$plugins_file[ $plugin_directory ];
		}

		return '';
	}


	/**
	 * check a plugin in already activated
	 *
	 * @param string $plugin_directory plugin directory name
	 *
	 * @return bool return true if plugin was activated.
	 */
	public static function is_plugin_active( $plugin_directory ) {

		self::get_plugins_basename();

		return isset( self::$plugins_file[ $plugin_directory ] ) &&
		       is_plugin_active( self::$plugins_file[ $plugin_directory ] );
	}


	/**
	 * check a plugin is deactivated
	 *
	 * @param string $plugin_directory plugin directory name
	 *
	 * @return bool return true if plugin was activated.
	 */
	public static function is_plugin_deactivate( $plugin_directory ) {

		return ! self::is_plugin_active( $plugin_directory );
	}


	/**
	 * get list of plugins need update and cache
	 *
	 * @see \BF_Product_Plugin_Manager::update_plugins
	 */
	private static function get_updates() {

		if ( is_array( self::$plugins_update ) ) {
			return;
		}

		self::$plugins_update = array();
		//
		$updates = get_option( 'bs-product-plugins-status' );

		if ( ! is_object( $updates ) ) {
			return;
		}

		// append remote plugins data
		if ( ! empty( $updates->remote_plugins ) && is_array( $updates->remote_plugins ) ) {

			foreach ( $updates->remote_plugins as $file => $info ) {

				$slug = empty( $info['slug'] ) ? dirname( $file ) : $info['slug'];

				self::$plugins_update[ $slug ] = $file;
			}
		}

		// append local plugins data
		if ( ! empty( $updates->local_plugins ) && is_array( $updates->local_plugins ) ) {

			foreach ( $updates->local_plugins as $file => $info ) {

				$slug = empty( $info['slug'] ) ? dirname( $file ) : $info['slug'];

				self::$plugins_update[ $slug ] = $file;
			}
		}
	}


	/**
	 * TODO: check update for local plugins
	 *
	 * check is plugin in latest version
	 *
	 * @param string $plugin_directory plugin directory name
	 *
	 * @return bool false if update available
	 */
	public static function is_plugin_latest_version( $plugin_directory ) {

		self::get_updates();

		return empty( self::$plugins_update[ $plugin_directory ] );
	}


	/**
	 * Active a plugin
	 *
	 * @param string $plugin_directory plugin folder name
	 *
	 * @return bool true on success.
	 * @throws BF_Exception
	 */
	public static function active_plugin( $plugin_directory ) {

		if ( ! function_exists( 'activate_plugin' ) ) {

			require_once ABSPATH . '/wp-admin/includes/plugin.php';
		}

		$plugin_directory = trim( $plugin_directory, '/' . DIRECTORY_SEPARATOR );

		if ( $plugin_data = get_plugins( '/' . $plugin_directory ) ) {

			wp_cache_delete( 'plugins', 'plugins' ); // FIX: 'The plugin does not have a valid header' error

			$plugin_file = trailingslashit( $plugin_directory ) . key( $plugin_data );
			$activated   = activate_plugin( $plugin_file, false, false );
			self::throw_if_is_wp_error( $activated, $plugin_file );

			return true;
		}

		return false;
	}


	/**
	 * Flush cache
	 */
	public static function flush_cache() {

		self::$plugins_file = null;
	}


	/**
	 * deactivate a plugin
	 *
	 * @param string $plugin_directory plugin directory name
	 *
	 * @return bool true on success.
	 */
	public function deactivate_plugin( $plugin_directory ) {

		if ( ! function_exists( 'activate_plugin' ) ) {

			require_once ABSPATH . '/wp-admin/includes/plugin.php';
		}

		$plugin_directory = trim( $plugin_directory, '/' . DIRECTORY_SEPARATOR );

		if ( $plugin_data = get_plugins( '/' . $plugin_directory ) ) {

			deactivate_plugins( trailingslashit( $plugin_directory ) . key( $plugin_data ), false, false );

			/**
			 * Deactivate plugin in multisite if plugin was network activated
			 */
			if ( is_multisite() ) {
				deactivate_plugins( trailingslashit( $plugin_directory ) . key( $plugin_data ), false, true );
			}

			return true;
		}

		return false;
	}


	/**
	 * Fetch bundled plugin download link
	 *
	 * @param string $plugin_slug
	 * @param string $action
	 * @param bool   $mirror
	 *
	 * @return bool|string|\WP_Error url string on success bool|WP_Error otherwise
	 */
	public function get_bundled_plugin_download_link( $plugin_slug, $action = '', $mirror = false ) {

		$plugin_data = $this->api_request( 'download-plugin', compact( 'plugin_slug', 'action', 'mirror' ) );

		if ( is_wp_error( $plugin_data ) ) {
			return $plugin_data;
		}

		if ( ! empty( $plugin_data->success ) && ! empty( $plugin_data->download_link ) ) {
			return $plugin_data->download_link;
		}

		return false;
	}


	public function install_finished() {

		//delete temporary option data
		delete_option( $this->data_option_name );

		//delete downloaded package file
		if ( ! empty( $this->process_data['downloaded_package_path'] ) ) {

			@unlink( $this->process_data['downloaded_package_path'] );
		}

		/**
		 * update update cache status for to prevent display update message after updated plugin!
		 *
		 * @see \BF_Product_Plugin_Manager::update_plugins
		 */
		if ( isset( $this->process_data['slug'] ) ) {

			$prev_status = get_option( 'bs-product-plugins-status' );
			if ( is_object( $prev_status ) ) {
				$slug = &$this->process_data['slug'];

				if ( $this->process_data['is_remote'] ) {
					$plugins_list = &$prev_status->remote_plugins;

				} else {
					$plugins_list = &$prev_status->local_plugins;
				}

				$need_update = false;
				if ( $plugins_list && is_array( $plugins_list ) ) {

					foreach ( $plugins_list as $plugin_basename => $new_plugin_data ) {

						//remove plugin from update list
						if ( $slug === $new_plugin_data['slug'] ) {

							//check version again to make sure plugin was updated successfully
							if ( isset( $new_plugin_data['new_version'] ) ) {

								$plugin_file = trailingslashit( WP_PLUGIN_DIR ) . $plugin_basename;
								$plugin_data = get_plugin_data( $plugin_file );

								if ( isset( $plugin_data['Version'] ) &&
								     $plugin_data['Version'] === $new_plugin_data['new_version']
								) {
									unset( $plugins_list[ $plugin_basename ] );
									$need_update = true;
								}
							}

							break;
						}
					}
				}

				if ( $need_update ) {
					update_option( 'bs-product-plugins-status', $prev_status, 'no' );
				}
			}
		}

		do_action( 'better-framework/product-pages/install-plugin/install-finished', $this->process_data );
	}


	/**
	 * delete temporary data generated while installing plugin
	 *
	 * @param string $plugin_slug
	 *
	 * @return boll always true
	 */
	public function rollback( $plugin_slug ) {

		$data_option_name = sprintf( $this->option_name_pattern, $plugin_slug );
		$process_data     = get_option( $data_option_name, array() );


		//delete downloaded package file
		if ( ! empty( $process_data['downloaded_package_path'] ) ) {

			@unlink( $process_data['downloaded_package_path'] );
		}

		//delete extracted files & folders
		if ( ! empty( $process_data['unpacked_path'] ) ) {
			bf_file_system_instance()->rmdir( $process_data['unpacked_path'], true );
		}

		//delete temporary option data
		delete_option( $data_option_name );

		return true;
	}


	function __destruct() {

		if ( ! headers_sent() ) {
			// prevent redirect page
			if ( function_exists( 'header_remove' ) ) {
				header_remove( 'Location' );
			}
			status_header( 200 );
		}
	}


	/**
	 * Get plugin upgrader/ installer object instance.
	 *
	 * @param bool   $is_upgrade
	 * @param array  $args
	 * @param string $plugin_slug
	 *
	 * @return Plugin_Upgrader
	 */
	protected function get_upgrader_instance( $plugin_slug, $args = array(), $is_upgrade = false ) {

		$prefix = $is_upgrade ? 'upgrade' : 'install';

		$skin_args = array(
			'type'       => 'web',
			'url'        => esc_url_raw( add_query_arg(
				array(
					'action' => "$prefix-plugin",
					'plugin' => urlencode( $plugin_slug ),
				),
				'update.php'
			) ),
			'nonce'      => "$prefix-plugin_$plugin_slug", // check  admin referrer
			'plugin'     => '',
			'extra'      => array(),
			'is_upgrade' => $is_upgrade,
		);

		$skin_args = array_merge( $skin_args, $args );


		if ( $is_upgrade ) {

			$skin = new Plugin_Upgrader_Skin( $skin_args );
		} else {

			$skin = new BF_Plugin_Install_Skin( $skin_args );
		}

		return new Plugin_Upgrader( $skin );
	}


	/**
	 * Download & install remote path plugins
	 *
	 * @param array $plugins_slug plugins slug list
	 * @param bool  $upgrade      upgrade or install
	 *
	 * @throws BF_Exception
	 */
	public function download_plugins( $plugins_slug, $upgrade = false ) {

		if ( empty( $plugins_slug ) ) {
			return;
		}

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}

		if ( ! class_exists( 'Plugin_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		if ( ! class_exists( 'BF_Plugin_Install_Skin' ) ) {
			require BF_Product_Pages::get_path( 'install-plugin/class-bf-plugin-install-skin.php' );
		}

		if ( ! class_exists( 'BF_Plugin_Bulk_Install_Skin' ) ) {
			require BF_Product_Pages::get_path( 'install-plugin/class-bf-plugin-bulk-install-skin.php' );
		}

		if ( $upgrade ) {

			$this->bulk_upgrade( $plugins_slug );

		} else {

			$this->bulk_install( $plugins_slug );
		}
	}


	protected function bulk_install( $plugins_slug ) {

		$plugins = array_intersect_key( // Filter valid plugins
			bf_get_plugins_config(),
			array_flip( (array) $plugins_slug )
		);

		end( $plugins );
		$last_plugin = key( $plugins );

		add_filter( 'upgrader_post_install', array( $this, 'active_after_install' ), 999, 3 );

		foreach ( $plugins as $slug => $plugin ) {

			$return_link = $last_plugin === $slug;
			$upgrader    = $this->get_upgrader_instance( $slug, compact( 'return_link' ) );
			$installed   = $upgrader->install(
				$this->get_plugin_package_url( $plugin )
			);
		}
	}


	/**
	 * Active plugin immediately after installed
	 *
	 * @hooked upgrader_post_install
	 *
	 * @param bool|WP_Error $response   Installation response.
	 * @param array         $hook_extra Extra arguments passed to hooked filters.
	 * @param array         $result     Installation result data.
	 *
	 * @return bool|WP_Error
	 */
	public function active_after_install( $response, $hook_extra, $result ) {

		if ( ! $response || is_wp_error( $response ) ) {
			return $response;
		}

		try {

			$this->active_plugin( plugin_basename( $result['destination'] ) );

		} catch( BF_Exception $e ) {

			$response = new WP_Error( $e->getCode(), $e->getMessage() );
		}

		return $response;
	}


	/**
	 * Upgrade plugins
	 *
	 * @param $plugins_slug
	 *
	 * @return bool
	 */
	protected function bulk_upgrade( $plugins_slug ) {

		if ( ! $bf_states = get_option( 'bs-product-plugins-status' ) ) {

			return false;
		}

		$current  = get_site_transient( 'update_plugins' );
		$skin     = new BF_Plugin_Bulk_Install_Skin();
		$upgrader = new Plugin_Upgrader( $skin );
		$plugins  = array_intersect_key( // Filter valid plugins
			bf_get_plugins_config(),
			array_flip( (array) $plugins_slug )
		);


		$plugins_slug = array();

		foreach ( $plugins as $slug => $plugin ) {

			if ( ! $this->is_plugin_active( $slug ) ) {
				continue;
			}

			$plugin_file = $this->the_plugin_file( $slug );

			if ( ! empty( $plugin['local_path'] ) ) { # local plugin

				$current->response[ $plugin_file ] = (object) array(

					'id'          => $plugin['slug'],
					'slug'        => $plugin['slug'],
					'plugin'      => $plugin_file,
					'package'     => $this->get_plugin_package_url( $plugin ),
					'new_version' => $plugin['version'],
				);

			} else { # Plugin with remote source


				if ( ! isset( $bf_states->remote_plugins[ $plugin_file ] ) ) {
					continue;
				}

				$plugin_info = $bf_states->remote_plugins[ $plugin_file ];

				$current->response[ $plugin_file ] = (object) array(

					'id'          => $plugin_info['id'],
					'slug'        => $plugin_info['id'],
					'plugin'      => $plugin_file,
					'package'     => $this->get_plugin_package_url( $plugin ),
					'new_version' => $plugin_info['new_version'],
				);
			}

			//
			$plugins_slug[] = $plugin_file;
		}

		bf_update_plugin_schedule_status( 'disable' );

		set_site_transient( 'update_plugins', $current );

		if ( $upgraded = $upgrader->bulk_upgrade( $plugins_slug ) ) {

			$status = get_option( 'bs-product-plugins-status' );

			foreach ( $upgraded as $plugin_file ) {

				$plugin_rel_path = $plugin_file['destination_name'];
				$plugin_rel_path .= '/' . $plugin_file['source_files'][0];

				unset( $status->remote_plugins[ $plugin_rel_path ] );
			}


			update_option( 'bs-product-plugins-status', $status );
		}
	}


	/**
	 * Get requested action
	 *
	 * @return string
	 */
	protected function current_action() {

		$action = '';

		if ( isset( $_REQUEST['action'] ) && '-1' !== $_REQUEST['action'] ) {

			$action = $_REQUEST['action'];

		} elseif ( ! empty( $_REQUEST['action2'] ) ) {

			$action = $_REQUEST['action2'];
		}

		return $action;
	}


	/**
	 * Handle Plugin Table Single/Bulk Actions
	 *
	 * @return string handled action
	 * @throws BF_Exception
	 */
	public function handle_early_action() {

		$handled_action = '';

		switch ( $this->current_action() ) {

			case 'activate-selected':

				check_admin_referer( 'bulk-plugins' );

				$download_and_active = array();
				$active_only         = array();

				foreach ( $_REQUEST['checked'] as $slug ) {

					if ( $this->the_plugin_file( $slug ) ) {

						$active_only[] = $slug;

					} else {

						$download_and_active[] = $slug;
					}
				}

				if ( empty( $download_and_active ) && $active_only ) {

					$this->download_plugins( $download_and_active, false );

					$handled_action = 'activate';
					$plugins_file   = array_map( array( $this, 'the_plugin_file' ), $active_only );

					activate_plugins( $plugins_file );
				}

				break;

			case 'deactivate':

				check_admin_referer( 'deactivate-plugin_' . $_REQUEST['plugin'] );

				deactivate_plugins( $this->the_plugin_file( $_REQUEST['plugin'] ) );

				$handled_action = 'deactivate';

				break;

			case 'activate':

				check_admin_referer( 'activate-plugin_' . $_REQUEST['plugin'] );

				$active = activate_plugin( $this->the_plugin_file( $_REQUEST['plugin'] ) );

				if ( ! is_wp_error( $active ) && ! $active ) {
					$handled_action = 'activate';
				}

				break;

			case 'deactivate-selected':

				check_admin_referer( 'bulk-plugins' );

				$plugins = array();

				if ( ! empty( $_REQUEST['checked'] ) ) {

					$plugins = $_REQUEST['checked'];

				} elseif ( ! empty( $_REQUEST['plugin'] ) ) {

					$plugins = array( $_REQUEST['plugin'] );
				}

				$handled_action = 'deactivate';
				$plugins_file   = array_map( array( $this, 'the_plugin_file' ), $plugins );

				deactivate_plugins( $plugins_file );

				break;

			case 'delete':
			case 'delete-selected':

				if ( $this->current_action() === 'delete' ) {

					check_admin_referer( 'delete-plugin_' . $_REQUEST['plugin'] );

					$plugins = (array) $_REQUEST['plugin'];

				} else {

					check_admin_referer( 'bulk-plugins' );

					$plugins = $_REQUEST['checked'];
				}

				$plugins = array_filter( $plugins, array( $this, 'is_plugin_installed' ) );
				$plugins = array_filter( $plugins, array( $this, 'is_plugin_deactivate' ) );

				if ( empty( $plugins ) ) {
					return;
				}

				if ( empty( $_REQUEST['verify-delete'] ) ) {

					$this->ask_verify_delete( $plugins );

					$handled_action = 'delete-confirm';

				} else {

					if ( delete_plugins( array_map( array( $this, 'the_plugin_file' ), $plugins ) ) ) {

						if ( bf_count( $plugins ) === 1 ) {

							$handled_action = 'delete';

						} else {

							$handled_action = 'delete-multi';
						}
					}
				}

				break;
		}

		return $handled_action;
	}


	/**
	 * Handle Plugin Table Single/Bulk Actions
	 *
	 * @return string handled action
	 * @throws BF_Exception
	 */
	public function handle_action() {

		$handled_action = '';

		switch ( $this->current_action() ) {

			case 'install':

				// Download, install and activate single plugin

				check_admin_referer( 'install-plugin_' . $_REQUEST['plugin'] );

				$this->download_plugins( $_REQUEST['plugin'] );

				$handled_action = 'install';

				break;


			case 'activate-selected':

				check_admin_referer( 'bulk-plugins' );

				$download_and_active = array();
				$active_only         = array();

				foreach ( $_REQUEST['checked'] as $slug ) {

					if ( $this->the_plugin_file( $slug ) ) {

						$active_only[] = $slug;

					} else {

						$download_and_active[] = $slug;
					}
				}

				if ( $download_and_active ) {

					$this->download_plugins( $download_and_active, false );

					$handled_action   = 'install';
					$this->messages[] = __( 'Selected plugins <strong>activated</strong>.', 'better-studio' );
				}

				break;

			case 'update-selected':

				check_admin_referer( 'bulk-plugins' );

				$this->download_plugins( $_REQUEST['checked'], true );

				$handled_action = 'upgrade';

				break;


			case 'upgrade':

				check_admin_referer( 'upgrade-plugin_' . $_REQUEST['plugin'] );

				$this->download_plugins( $_REQUEST['plugin'], true );

				$handled_action = 'upgrade';

				break;

		}

		return $handled_action;
	}


	public function defined_message( $id ) {

		$messages = array(
			'deactivate'   => __( 'Plugin <strong>deactivated</strong>.', 'better-studio' ),
			'activate'     => __( 'Selected plugins <strong>activated</strong>.', 'better-studio' ),
			'delete'       => __( 'The selected plugin has been <strong>deleted</strong>.', 'better-studio' ),
			'delete-multi' => __( 'The selected plugins have been < strong>deleted </strong >.', 'better-studio' ),
		);

		if ( isset( $messages[ $id ] ) ) {
			return $messages[ $id ];
		}
	}


	/**
	 * Get admin messages list
	 *
	 * @return array
	 */
	public function get_messages() {

		return $this->messages;
	}


	/**
	 * Get plugin download url
	 *
	 * @param array $plugin plugin info array
	 *
	 * @return string
	 */
	protected function get_plugin_package_url( $plugin ) {

		if ( empty( $plugin['slug'] ) ) {
			return '';
		}

		$plugin_type = isset( $plugin['type'] ) ? $plugin['type'] : 'bundled';

		if ( 'global' === $plugin_type ) {

			$api = plugins_api( 'plugin_information', array(
				'slug'   => $plugin['slug'],
				'fields' => array( 'sections' => false )
			) );

			if ( isset( $api->download_link ) ) {
				$source = $api->download_link;
			}

		} elseif ( 'local' === $plugin_type ) {

			$source = isset( $plugin['local_path'] ) ? $plugin['local_path'] : '';

		} else {

			$source = bf_bundle_plugin_package_url( $plugin['slug'] );
		}

		return $source;
	}


	protected function ask_verify_delete( $plugins ) {

		$plugins = array_intersect_key( // Filter valid plugins
			bf_get_plugins_config(),
			array_flip( (array) $plugins )
		);

		_e( 'Are you sure you wish to delete these files ? ', 'better-studio' );

		?>
		<ul class="ul-disc">
			<?php
			foreach ( $plugins as $plugin ) {

				if ( is_uninstallable_plugin( $this->the_plugin_file( $plugin['slug'] ) ) ) {
					/* translators: 1: plugin name, 2: plugin author */
					echo ' < li>', sprintf( __( ' % 1$s by % 2$s ( will also <strong>delete its data </strong >)', 'better-studio' ), ' <strong>' . $plugin['name'] . ' </strong > ', '<em > ' . $plugin['author'] . ' </em > ' ), '</li> ';
				} else {
					/* translators: 1: plugin name, 2: plugin author */
					echo '<li > ', sprintf( _x( ' % 1$s by % 2$s', 'plugin', 'better-studio' ), ' <strong>' . $plugin['name'] . ' </strong > ', '<em > ' . $plugin['author'] ) . ' </em > ', '</li > ';
				}
			}
			?>
		</ul>
		<form method="post" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" style="display:inline;">
			<input type="hidden" name="verify-delete" value="1"/>
			<input type="hidden" name="action" value="delete-selected"/>
			<?php

			foreach ( (array) $plugins as $slug => $plugin ) {
				echo ' < input type = "hidden" name = "checked[]" value = "' . esc_attr( $slug ) . '" />';
			}

			wp_nonce_field( 'bulk-plugins' );

			submit_button( __( 'Yes, delete these files', 'better-studio' ), '', 'submit', false ); ?>
		</form>
		<?php

	}
}