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
 * enqueue static files.
 */

add_action( 'admin_enqueue_scripts', 'bf_install_plugins_enqueue_scripts' );

if ( ! function_exists( 'bf_install_plugins_enqueue_scripts' ) ) {

	/**
	 * Enqueue plugin page styles & scripts
	 *
	 * @hooked admin_enqueue_scripts
	 */
	function bf_install_plugins_enqueue_scripts() {

		if ( ! bf_is_product_page( 'install-plugin' ) ) {
			return;
		}

		bf_enqueue_script( 'bf-modal' );
		bf_enqueue_style( 'bf-modal' );

		$ver = BF_Product_Pages::Run()->get_version();

		wp_enqueue_style(
			'bs-product-plugin-styles',
			BF_Product_Pages::get_url( 'install-plugin/assets/css/bs-plugin-install.css' ),
			array(),
			$ver
		);

		wp_enqueue_script(
			'bs-product-plugin-scripts',
			BF_Product_Pages::get_url( 'install-plugin/assets/js/bs-plugin-install.js' ),
			array(),
			$ver
		);

		wp_localize_script( 'bs-product-plugin-scripts', 'bs_plugin_install_loc', array(
			'search_failed' => __( 'No plugins found for %s', 'better-studio' ),
			'item_count'    => __( '%s item', 'better-studio' ),
			'items_count'   => __( '%s item', 'better-studio' ),


			'delete_confirm' => array(
				'icon'       => 'fa-trash',
				'header'     => __( 'Delete Selected Plugin(s)', 'better-studio' ),
				'title'      => '',
				'body'       => __( 'Are you sure you want to delete the selected plugins and their data? %list%', 'better-studio' ),
				'button_yes' => __( 'Yes, Delete', 'better-studio' ),
				'button_no'  => __( 'No', 'better-studio' ),
			),
			'confirm_delete' => __( '', 'better-studio' ),
			'menu_slug'      => BF_PRODUCT_PAGES_MAIN_MENU
		) );
	}
}


if ( ! function_exists( 'bf_get_plugins_config' ) ) {

	/**
	 * get plugins config array
	 *
	 * @return array  {
	 *
	 *  Plugin_ID => array {
	 *
	 * @type string  $name        plugin name
	 * @type string  $slug        plugin slug( plugin directory )
	 * @type boolean $required    is plugin required?
	 * @type string  $version     plugin version number
	 * @type string  $description plugin description
	 * @type string  $thumbnail   plugin image  URI
	 * @type string  $local_path  path to zip file if plugin not exists in wordpress.org plugin repository
	 *
	 * }
	 *
	 * ...
	 * }
	 */
	function bf_get_plugins_config() {

		$result = array();


		foreach ( bf_plugins_config_array() as $id => $plugin ) {

			if ( ! isset( $plugin['type'] ) ) {
				$plugin['type'] = empty( $plugin['local_path'] ) ? 'global' : 'local';
			}

			$result[ $id ] = $plugin;
		}

		return $result;
	}
}

if ( ! function_exists( 'bf_plugins_config_array' ) ) {

	/**
	 * Retrieve plugins configuration array.
	 *
	 * @since 3.9.0
	 * @return array
	 */
	function bf_plugins_config_array() {

		list( $data, $is_expired ) = bf_get_transient( 'bf-plugins-config', array() );

		if ( ! $is_expired ) {

			return $data;
		}

		if ( $config = bf_plugins_config_fetch() ) {

			$data = $config;
		}

		bf_set_transient( 'bf-plugins-config', $data, 60 * 60 * 5 /* 5 Hour */ );

		return $data;
	}
}


if ( ! function_exists( 'bf_plugins_config_fetch' ) ) {

	/**
	 * Fetch list of bundled products from server.
	 *
	 * @since 3.9.0
	 * @return array
	 */
	function bf_plugins_config_fetch() {

		$results = BetterFramework_Oculus::request( 'bundled-products-list', array( 'json_assoc' => true ) );

		if ( is_wp_error( $results ) ) {
			return array();
		}

		return ! empty( $results['bundled_products'] ) ? $results['bundled_products'] : array();
	}
}

add_action( 'in_admin_header', 'bf_required_plugin_notice', 17 );

if ( ! function_exists( 'bf_required_plugin_notice' ) ) {

	/**
	 * Display notice if required plugins was not installed
	 *
	 * @hooked in_admin_header
	 */
	function bf_required_plugin_notice() {

		if ( ! $plugins = bf_get_plugins_config() ) {
			return;
		}

		$add_notice            = false;
		$last_required_plugins = get_option( 'bs-require-plugin-install' );
		$required_plugins      = array();

		if ( ! class_exists( 'BS_Product_Plugin_Factor' ) ) {
			require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
		}

		foreach ( $plugins as $plugin_ID => $plugin ) {

			if ( ! empty( $plugin['required'] ) && $plugin['required'] ) {

				if ( ! BF_Product_Plugin_Installer::is_plugin_installed( $plugin_ID )
				     ||
				     ! BF_Product_Plugin_Installer::is_plugin_active( $plugin_ID )
				) {
					$required_plugins[] = $plugin['name'];
				}
			}
		}

		if ( $last_required_plugins === false ) {
			$add_notice = true;
		} else {
			sort( $required_plugins );
			if ( $required_plugins != $last_required_plugins ) {
				$add_notice = true;
			}
		}

		if ( ! $add_notice ) {
			return;
		}

		if ( empty( $required_plugins ) ) {
			delete_option( 'bs-require-plugin-install' );
			Better_Framework::admin_notices()->remove_notice( 'bs-product-required-plugins' );

		} else {

			update_option( 'bs-require-plugin-install', $required_plugins );

			$link = admin_url( 'admin.php?page=' . BF_Product_Pages::$menu_slug . '-install-plugin' );

			if ( bf_count( $required_plugins ) > 1 ) {

				if ( bf_count( $required_plugins ) === 2 ) {
					$msg = wp_kses( sprintf(
						__( 'The <strong>%s</strong> and <strong>%s</strong> plugins are required for %s to work properly. Install and activate them from <a href="%s">Plugin Installer</a>.', 'better-studio' ),
						isset( $required_plugins['0'] ) ? $required_plugins['0'] : '',
						isset( $required_plugins['1'] ) ? $required_plugins['1'] : '',
						BF_Product_Pages::get_product_info( 'product_name', '' ),
						$link
					), bf_trans_allowed_html() );
				} else {
					$msg = wp_kses( sprintf( __( 'Some required plugins was not installed currently. Install and activate them from <a href="%s">Plugin Installer</a>.', 'better-studio' ), $link ), bf_trans_allowed_html() );
				}

			} else {
				$msg = wp_kses( sprintf(
					__( 'The <strong>%s</strong> plugin is required for %s to work properly. Install and activate it from <a href="%s">Plugin Installer</a>.', 'better-studio' ),
					isset( $required_plugins['0'] ) ? $required_plugins['0'] : '',
					BF_Product_Pages::get_product_info( 'product_name', '' ),
					$link
				), bf_trans_allowed_html() );
			}

			Better_Framework::admin_notices()->add_notice( array(
				'msg'       => $msg,
				'id'        => 'bs-product-required-plugins',
				'type'      => 'fixed',
				'state'     => 'danger',
				'thumbnail' => BF_Product_Pages::get_product_info( 'notice-icon', '' ),
			) );
		}
	}
}

add_filter( 'pre_set_site_transient_update_plugins', 'bf_update_plugin_schedule', 9999 );


if ( ! function_exists( 'bf_update_plugin_schedule' ) ) {

	/**
	 * @hooked pre_set_site_transient_update_plugins
	 *
	 * @param mixed $value
	 *
	 * @return mixed
	 */
	function bf_update_plugin_schedule( $value ) {

		if ( ! class_exists( 'BF_Product_Plugin_Installer' ) ) {
			require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
		}

		if ( ! class_exists( 'BF_Product_Plugin_Manager' ) ) {
			require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-manager.php' );
		}

		$obj    = new BF_Product_Plugin_Manager();
		$status = $obj->update_plugins( true );

		$plugins_config = bf_get_plugins_config();

		if ( ! empty( $status->remote_plugins ) && is_array( $status->remote_plugins ) ) {

			if ( empty( $value->response ) ) {

				if ( ! is_object( $value ) ) {
					$value = new stdClass();
				}

				$value->response = array();
			}

			$r = &$value->response;

			foreach ( $status->remote_plugins as $p_file => $plugin_data ) {

				$slug = $plugin_data['slug'];

				if ( ! isset( $plugins_config[ $slug ]['type'] ) ||
				     'bundled' !== $plugins_config[ $slug ]['type']
				) {

					continue;
				}

				$r[ $p_file ]          = (object) $plugin_data;
				$r[ $p_file ]->plugin  = $p_file;
				$r[ $p_file ]->package = 'FETCH_FROM_BETTER_STUDIO/' . $slug;
			}
		}

		return $value;
	}
}


if ( ! function_exists( 'bf_update_plugin_schedule_status' ) ) {

	/**
	 * @param string $status enable or disable
	 *
	 * @since 3.9.1
	 */
	function bf_update_plugin_schedule_status( $status ) {

		global $bf_update_plugin_schedule_disabled;

		$bf_update_plugin_schedule_disabled = $status === 'disable';
	}
}


add_action( 'site_transient_update_plugins', 'bf_update_plugins_list' );

if ( ! function_exists( 'bf_update_plugins_list' ) ) {

	/**
	 *
	 * @param mixed $value
	 *
	 * @hooked site_transient_update_plugins
	 *
	 * @return mixed
	 */
	function bf_update_plugins_list( $value ) {

		if ( ! bf_is_doing_ajax( 'update-plugin' ) ) { // when updating plugin in plugins.php page

			return $value;
		}

		if ( empty( $value->response ) || ! is_array( $value->response ) ) {

			return $value;
		}

		if ( ! class_exists( 'BF_Product_Plugin_Installer' ) ) {
			require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
		}
		$installer = new BF_Product_Plugin_Installer();
		add_filter( 'http_request_args', 'bf_remove_reject_unsafe_urls', 99 );

		foreach ( $value->response as $p_file => $plugin_data ) {

			if ( isset( $plugin_data->package ) && preg_match( '/^FETCH_FROM_BETTER_STUDIO\/.+/i', $plugin_data->package ) ) {

				$action  = BF_Product_Plugin_Installer::is_plugin_installed( $plugin_data->slug ) ? 'update' : 'install';
				$dl_link = $installer->get_bundled_plugin_download_link( $plugin_data->slug, $action );

				if ( $dl_link && ! is_wp_error( $dl_link ) ) {
					$value->response[ $p_file ]->package = $dl_link;
				}
			}
		}

		return $value;
	}
}

add_filter( 'set_site_transient_update_plugins', 'bf_sync_plugin_update_information' );

if ( ! function_exists( 'bf_sync_plugin_update_information' ) ) {

	/**
	 *
	 * @param object $value
	 *
	 * @hooked set_site_transient_update_plugins
	 *
	 * @return object
	 */
	function bf_sync_plugin_update_information( $value ) {

		global $pagenow;

		// Make sure plugin update data is valid
		// we expect wordpress check plugin updates in plugin and updates page
		if ( ! in_array( $pagenow, array(
				'plugins.php',
				'update-core.php',
				'update.php'
			) ) && ! bf_is_doing_ajax( 'update-plugin' )
		) {
			return $value;
		}

		$current_plugin_stat = get_option( 'bs-product-plugins-status' );
		$update_plugin_stat  = false;

		//
		// Remove Updated Plugin From our List
		//
		if ( ! empty( $current_plugin_stat->remote_plugins ) ) {

			$plugins       = empty( $value->response ) ? array() : $value->response;
			$maybe_updated = array_diff_key( $current_plugin_stat->remote_plugins, $plugins );

			$plugin_dir = trailingslashit( WP_PLUGIN_DIR );
			foreach ( $maybe_updated as $plugin_path => $plugin_new_ver ) {

				$plugin_installed_data = get_plugin_data( $plugin_dir . $plugin_path );

				// check if plugin was really updated
				if ( version_compare( $plugin_installed_data['Version'], $plugin_new_ver['new_version'], '=' ) ) {
					unset( $current_plugin_stat->remote_plugins[ $plugin_path ] );
					$update_plugin_stat = true;
				}
			}
		}

		if ( $update_plugin_stat ) {
			update_option( 'bs-product-plugins-status', $current_plugin_stat );
		}

		return $value;
	}
}


if ( ! function_exists( 'bf_remove_reject_unsafe_urls' ) ) {

	/**
	 * @param array $args
	 *
	 * @return array
	 */
	function bf_remove_reject_unsafe_urls( $args ) {

		$args['reject_unsafe_urls'] = false;

		return $args;
	}
}

add_filter( 'upgrader_pre_download', 'bf_update_plugin_bulk', 999, 2 );

if ( ! function_exists( 'bf_update_plugin_bulk' ) ) {

	/**
	 * @param bool   $bool
	 * @param string $package
	 *
	 * @hooked upgrader_pre_download
	 *
	 * @return bool|string|WP_Error
	 */
	function bf_update_plugin_bulk( $bool, $package ) {

		if ( ! preg_match( '/^FETCH_FROM_BETTER_STUDIO\/(.+)/i', $package, $match ) ) {

			return $bool;
		}

		$plugin_slug = &$match[1];

		try {

			if ( ! class_exists( 'BF_Product_Plugin_Installer' ) ) {
				require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
			}

			if ( $url = bf_bundle_plugin_package_url( $plugin_slug ) ) {

				return download_url( $url );
			}

		} catch( Exception $e ) {

			return '';
		}

		return $bool;
	}
}


if ( ! function_exists( 'bf_bundle_plugin_package_url' ) ) {

	/**
	 * Get the plugin package download url
	 *
	 * @param string $plugin_slug
	 * @param bool   $mirror
	 *
	 * @return string
	 */
	function bf_bundle_plugin_package_url( $plugin_slug, $mirror = false ) {

		if ( ! class_exists( 'BF_Product_Plugin_Installer' ) ) {
			require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
		}

		$installer = new BF_Product_Plugin_Installer();
		$action    = BF_Product_Plugin_Installer::is_plugin_installed( $plugin_slug ) ? 'update' : 'install';
		$url       = $installer->get_bundled_plugin_download_link( $plugin_slug, $action, $mirror );

		if ( ! $url || is_wp_error( $url ) ) {

			return '';
		}

		return $url;
	}
}


add_action( 'vc_after_mapping', 'bf_remove_vc_register_notice' );

if ( ! function_exists( 'bf_remove_vc_register_notice' ) ) {

	/**
	 * callback: remove visual composer register admin notice
	 * action  : vc_after_mapping
	 *
	 * @hooked vc_after_mapping
	 */
	function bf_remove_vc_register_notice() {

		global $_bs_vc_access_changes;

		if ( ! function_exists( 'vc_user_access' ) ) {
			return;
		}

		$instance = vc_user_access();

		if ( is_callable( array( $instance, 'setValidAccess' ) ) ) {
			$instance->setValidAccess( false );
		}

		if ( is_callable( array( $instance, 'getValidAccess' ) ) ) {
			$_bs_vc_access_changes = vc_user_access()->getValidAccess();
		}
	}
}

add_action( 'better-framework/product-pages/install-plugin/install-finished', 'bf_remove_revslider_register_notice' );
add_action( 'better-framework/product-pages/install-plugin/active-finished', 'bf_remove_revslider_register_notice' );

if ( ! function_exists( 'bf_remove_revslider_register_notice' ) ) {

	/**
	 * callback: Hide register revolution slider admin notice
	 *
	 * @hooked better-framework/product-pages/install-plugin/install-finished,
	 * @hooked better-framework/product-pages/install-plugin/active-finished
	 *
	 * @param string|array $data
	 *
	 * @return bool
	 */
	function bf_remove_revslider_register_notice( $data ) {

		if ( is_string( $data ) ) {
			$slug = $data;
		} elseif ( isset( $data['slug'] ) ) {
			$slug = $data['slug'];
		} else {
			return false;
		}

		if ( $slug === 'revslider' ) {
			remove_filter( 'pre_update_option_revslider-valid-notice', '__return_false', PHP_INT_MAX );
			update_option( 'revslider-valid-notice', 'false' );
		}

		return true;
	}
}

add_action( 'delete_option_revslider-valid-notice', 'bf_hide_revslider_register_notice', PHP_INT_MAX );
add_filter( 'pre_update_option_revslider-valid-notice', '__return_false', PHP_INT_MAX );

if ( ! function_exists( 'bf_hide_revslider_register_notice' ) ) {

	/**
	 * Hide revolution slider registration notice
	 *
	 * @hooked delete_option_revslider-valid-notice
	 */
	function bf_hide_revslider_register_notice() {

		add_option( 'revslider-valid-notice', 'false' );
	}
}


add_action( 'vc_after_init', 'bf_undo_vc_access_changes' );

if ( ! function_exists( 'bf_undo_vc_access_changes' ) ) {

	/**
	 * callback: undo changes on visual composer user access
	 *
	 * @hooked vc_after_init
	 */
	function bf_undo_vc_access_changes() {

		global $_bs_vc_access_changes;

		if ( ! is_null( $_bs_vc_access_changes ) ) {
			vc_user_access()->setValidAccess( $_bs_vc_access_changes );
			unset( $_bs_vc_access_changes );
		}
	}
}

add_action( 'load-update.php', 'bf_force_check_plugins_update' );
add_action( 'load-update-core.php', 'bf_force_check_plugins_update' );

if ( ! function_exists( 'bf_force_check_plugins_update' ) ) {

	/**
	 * @hooked load-update.php
	 * @hooked load-update-core.php
	 */
	function bf_force_check_plugins_update() {

		BF_Product_Pages::Run()->plugins_menu_instance()->update_plugins( true );
	}
}

add_filter( 'better-framework/product-pages/register-menu/params', 'bf_append_plugins_update_badge' );

if ( ! function_exists( 'bf_append_plugins_update_badge' ) ) {

	/**
	 * @hooked better-framework/product-pages/register-menu/params
	 *
	 * @param array $menu
	 *
	 * @return array
	 */
	function bf_append_plugins_update_badge( $menu ) {

		if ( ! empty( $menu['parent'] ) && $menu['id'] !== BF_Product_Pages::$menu_slug . '-install-plugin' ) {

			return $menu;
		}

		if ( ! $update_status = get_option( 'bs-product-plugins-status' ) ) {

			return $menu;
		}

		$activated_plugins_updates = 0;

		if ( ! empty( $update_status->remote_plugins ) && is_array( $update_status->remote_plugins ) ) {

			/**
			 * Just display number of updates for activated plugins
			 *
			 * @see BF_Product_Plugin_Manager::render_content
			 */
			if ( ! class_exists( 'BS_Product_Plugin_Factor' ) ) {
				require_once BF_Product_Pages::get_path( 'install-plugin/class-bf-product-plugin-installer.php' );
			}

			foreach ( $update_status->remote_plugins as $plugin ) {

				if ( isset( $plugin['slug'] ) &&
				     BF_Product_Plugin_Installer::is_plugin_installed( $plugin['slug'] ) &&
				     BF_Product_Plugin_Installer::is_plugin_active( $plugin['slug'] )
				) {
					$activated_plugins_updates ++;
				}
			}

			if ( $activated_plugins_updates ) {

				$menu_title_index = $menu['parent'] ? 'menu_title' : 'parent_title';

				$menu[ $menu_title_index ] .= ' &nbsp;<span class="bs-admin-menu-badge"><span class="plugin-count">'
				                              . number_format_i18n( $activated_plugins_updates ) .
				                              '</span></span>';
			}
		}

		if ( ! isset( $update_status->number ) || $update_status->number !== $activated_plugins_updates ) {

			$update_status->number = $activated_plugins_updates;
			update_option( 'bs-product-plugins-status', $update_status );
		}

		return $menu;
	}
}
