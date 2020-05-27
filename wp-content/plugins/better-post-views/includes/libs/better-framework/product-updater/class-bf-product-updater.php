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


BF_Product_Updater::Run();


class BF_Product_Updater {

	public static $plugins_file = array();


	/**
	 * Initialize
	 */
	public static function Run() {

		global $bs_product_updater;

		if ( $bs_product_updater === FALSE ) {
			return;
		}

		if ( ! $bs_product_updater instanceof self ) {
			$bs_product_updater = new self();
			$bs_product_updater->init();
		}

		return $bs_product_updater;
	}

	public function init() {

		add_action( 'wp_update_themes', array( $this, 'update_product_schedule' ) );
		add_action( 'load-themes.php', array( $this, 'update_product_schedule' ) );
		add_action( 'load-update.php', array( $this, 'update_product_schedule' ) );
		add_action( 'load-update-core.php', array( $this, 'update_product_schedule' ) );
		add_action( 'upgrader_process_complete', array( $this, 'update_product_schedule' ) );

		add_filter( 'site_transient_update_themes', array( $this, 'fetch_theme_download_link' ) );
		add_filter( 'upgrader_source_selection', array( $this, 'fix_source_directory' ), 30, 4 );
	}

	function fetch_theme_download_link( $value ) {

		global $pagenow;

		if ( isset( $_REQUEST['action'] ) &&
		     in_array( $pagenow, array( 'admin-ajax.php', 'update.php' ) ) &&
		     in_array( $_REQUEST['action'], array(
			     'upgrade-theme',
			     'update-selected-themes',
			     'update-theme',
		     ) )
		) {
			if ( ! empty( $value->response ) && is_array( $value->response ) ) {

				add_filter( 'http_request_args', 'bf_remove_reject_unsafe_urls', 99 );

				foreach ( $value->response as $idx => $product ) {
					if ( isset( $product['package'] ) && preg_match( '/^FETCH_FROM_BETTER_STUDIO\/(.+)/i', $product['package'], $matched ) ) {
						$r            = &$value->response[ $idx ];
						$dl_link      = $this->get_product_download_link( array_pop( $matched ), $product['slug'] );
						$r['package'] = $dl_link;
					}
				}

				set_site_transient( 'update_themes', $value );
				remove_filter( 'site_transient_update_themes', array( $this, 'fetch_theme_download_link' ) );
			}
		}

		return $value;
	}


	protected function get_product_download_link( $item_id ) {

		if ( $purchase_info = get_option( 'bf-product-updater-items' ) ) {
			if ( isset( $purchase_info[ $item_id ] ) ) {
				$purchase_code = &$purchase_info[ $item_id ];

				$product_data = $this->api_request( 'download-latest-version', array(), compact( 'item_id', 'purchase_code' ) );
				if ( ! empty( $product_data->success ) && ! empty( $product_data->download_link ) ) {
					return $product_data->download_link;
				}
			}
		}
	}


	protected function get_products_info() {

		$results = array();
		$info    = apply_filters( 'better-framework/product-updater/product-info', array() );

		if ( $info ) {

			$cache_data = array();
			foreach ( $info as $d ) {

				if ( isset( $d['item_id'] ) && isset( $d['purchase_code'] ) ) {
					$cache_data[ $d['item_id'] ] = $d['purchase_code'];
				}

				$results[ $d['item_id'] ] = $d;
			}
			update_option( 'bf-product-updater-items', $cache_data, 'no' );
		}

		return $results;
	}

	public function update_product_schedule() {

		static $loaded = FALSE;
		remove_action( 'wp_update_themes', array( $this, 'update_product_schedule' ) );
		if ( $loaded ) {
			return;
		}
		$items_info = $this->get_products_info();
		if ( ! $items_info ) {
			return;
		}

		$status = $this->check_for_update( $items_info, TRUE );

		if ( ! ( $plugins_update = get_site_transient( 'update_plugins' ) ) ) {
			$plugins_update = new stdClass();
		}
		if ( ! ( $themes_update = get_site_transient( 'update_themes' ) ) ) {
			$themes_update = new stdClass();
		}

		if ( ! empty( $status->plugins ) && is_array( $status->plugins ) ) {
			if ( empty( $plugins_update->response ) ) {
				$plugins_update->response = array();
			}

			$r = &$plugins_update->response;
			foreach ( $status->plugins as $plugin_data ) {
				$p_file = self::plugin_slug_to_file_path( $plugin_data['slug'] );

				$r[ $p_file ]          = (object) $plugin_data;
				$r[ $p_file ]->plugin  = $p_file;
				$r[ $p_file ]->package = 'FETCH_FROM_BETTER_STUDIO/' . $plugin_data['slug'];
			}

			set_site_transient( 'update_plugins', $plugins_update );
		}

		if ( ! empty( $status->themes ) && is_array( $status->themes ) ) {
			if ( empty( $themes_update->response ) ) {
				$themes_update->response = array();
			}

			$r = &$themes_update->response;
			foreach ( $status->themes as $item_id => $theme_data ) {

				$slug = &$theme_data['slug'];

				$r[ $slug ] = bf_merge_args( $theme_data, array(
					'package' => 'FETCH_FROM_BETTER_STUDIO/' . $item_id,
					//todo link to readme file
					'url'     => 'http://betterstudio.com/'
				) );
			}

			set_site_transient( 'update_themes', $themes_update );
		}

		$loaded = TRUE;
	}

	/**
	 * Check group of items update
	 *
	 * @param array $items
	 * @param bool  $force
	 *
	 * @return bool|object object on success
	 */
	protected function check_for_update( $items, $force = FALSE ) {

		global $wp_version, $pagenow;

		// Don't check update while updating another item!

		if (
			( isset( $_REQUEST['action'] ) && 'do-theme-upgrade' === $_REQUEST['action'] )
			||
			(
				isset( $_REQUEST['action'] ) &&
				in_array( $pagenow, array( 'admin-ajax.php', 'update.php' ) ) &&
				in_array( $_REQUEST['action'], array(
					'upgrade-theme',
					'update-selected-themes',
					'update-theme',
				) )
			)
		) {
			return FALSE;
		}

		if ( empty( $items ) || ! is_array( $items ) ) {
			return FALSE;
		}

		include ABSPATH . WPINC . '/version.php';

		$update_status               = new stdClass();
		$update_status->last_checked = time();
		$update_status->themes       = array();
		$update_status->plugins      = array();
		$update_status->misc         = array();

		if ( ! $force ) {
			$prev_status = get_option( 'bf-product-items-status' );

			if ( ! is_object( $prev_status ) ) {
				$prev_status               = new stdClass();
				$prev_status->last_checked = time();
				$skip_update               = FALSE;
			} else {
				$skip_update = $this->check_update_duration > ( time() - $prev_status->last_checked );
			}

			if ( $skip_update ) {

				return $prev_status;
			}
		}

		/**
		 * check bundled plugins update
		 */

		$check_update = $this->api_request( 'check-products-update', compact( 'items' ) );

		if ( ! empty( $check_update->success ) && ! empty( $check_update->response ) ) {
			foreach ( $check_update->response as $item_id => $update_info ) {

				$ver       = &$update_info->version;
				$type      = &$update_info->type;
				$slug      = &$update_info->slug;
				$readme    = $update_info->readme ? $update_info->readme : FALSE;
				$changelog = isset( $update_info->changelog ) ? $update_info->changelog : FALSE;

				// Set active theme folder name instead of original folder name
				//  to handle changed folder names
				if ( ! empty( $items[ $item_id ]['active_theme'] ) ) {
					$slug = get_template();
				}

				if ( $ver !== 'latest' ) {

					$info_array = array(
						'slug'        => $slug,
						'new_version' => $ver,
						'url'         => $readme,
						'changelog'   => $changelog,
					);

					if ( $type === 'theme' ) {
						$update_status->themes[ $item_id ] = $info_array;
					} elseif ( $type === 'plugin' ) {
						$update_status->plugins[ $item_id ] = $info_array;
					} else {
						$update_status->misc[ $item_id ] = $info_array;
					}
				}
			}
		}

		do_action( 'better-framework/product-pages/product-update-check', $update_status, $check_update );

		update_option( 'bf-product-items-status', $update_status, 'no' );

		return $update_status;
	}

	/**
	 * Get plugin file path by plugin slug
	 *
	 * Ex: plugin_slug_to_file_path('js_composer') ==> js_composer/js_composer.php
	 *
	 * @param string $slug plugin slug (plugin directory)
	 *
	 * @return bool|string plugin file path on success or false on error
	 */
	public static function plugin_slug_to_file_path( $slug ) {

		if ( ! is_array( self::$plugins_file ) ) {

			self::$plugins_file = array();

			foreach ( get_plugins() as $file => $info ) {

				self::$plugins_file[ dirname( $file ) ] = $file;
			}
		}

		if ( isset( self::$plugins_file[ $slug ] ) ) {
			return self::$plugins_file[ $slug ];
		}

		return FALSE;
	} // plugin_slug_to_file_path


	/**
	 * handle api request
	 *
	 * @see \BetterFramework_Oculus::request
	 *
	 * @param string $action
	 * @param array  $data
	 * @param array  $auth
	 * @param bool   $use_wp_error
	 *
	 * @return array|bool|object|WP_Error
	 */
	protected function api_request( $action, $data = array(), $auth = array(), $use_wp_error = FALSE ) {

		if ( ! class_exists( 'BetterFramework_Oculus' ) ) {
			return FALSE;
		}

		return BetterFramework_Oculus::request( $action, compact( 'auth', 'data', 'use_wp_error' ) );
	} //api_request

	/**
	 * Rename downloaded package folder to user-defined directory name
	 * for support renamed product folders while upgrading process.
	 *
	 * @param string              $source        File source location.
	 * @param string              $remote_source Remote file source location.
	 * @param WP_Upgrader         $WP_Upgrader   WP_Upgrader instance. unused
	 * @param array               $hook_extra    Extra arguments passed to hooked filters.
	 *
	 * @hooked upgrader_source_selection
	 * @global WP_Filesystem_Base $wp_filesystem
	 *
	 * @since  3.7.0
	 * @return string
	 */
	public function fix_source_directory( $source, $remote_source, $WP_Upgrader, $hook_extra ) {

		global $wp_filesystem;

		if ( ! $source ) {
			return $source;
		}

		if ( ! empty( $hook_extra['theme'] ) ) {

			$product_type        = 'theme';
			$current_folder_name = $hook_extra['theme'];

		} elseif ( ! empty( $hook_extra['plugin'] ) ) {

			$product_type        = 'plugin';
			$current_folder_name = $hook_extra['plugin'];

		} else {

			return $source;
		}

		$check = array(
			'product_type'   => $product_type,
			'product_folder' => basename( $source ),
		);

		$original_folder_name = &$check['product_folder'];

		// Dose user changed original product folder name?

		if ( $current_folder_name === $original_folder_name ) {

			return $source;
		}

		/// Is this a betterstudio product?
		$is_better_product = FALSE;

		foreach ( apply_filters( 'better-framework/product-updater/product-info', array() ) as $info ) {

			if ( ! array_diff_assoc( $check, $info ) ) {

				$is_better_product = TRUE;
				break;
			}
		}

		if ( ! $is_better_product ) {
			// Do not touch none betterstudio themes or plugins
			return $source;
		}

		// Rename original product folder to user customized name
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
		}

		WP_Filesystem( FALSE, WP_CONTENT_DIR, FALSE );

		$renamed_path  = $remote_source . '/' . $current_folder_name;
		$original_path = $remote_source . '/' . $original_folder_name;

		$wp_filesystem->delete( $renamed_path, TRUE );

		if ( $wp_filesystem->move( $original_path, $renamed_path ) ) {

			return $renamed_path;
		}

		return $source;
	}
}
