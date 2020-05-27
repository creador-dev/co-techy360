<?php

if ( ! class_exists( 'Plugin_Installer_Skin' ) ) {

	require ABSPATH . '/wp-admin/includes/class-wp-upgrader-skins.php';
}


class BF_Plugin_Bulk_Install_Skin extends Bulk_Plugin_Upgrader_Skin {

	public function __construct( $args = array() ) {

		$args['url'] = add_query_arg( $_GET );

		parent::__construct( $args );
	}


	/**
	 * @access public
	 */
	public function bulk_footer() {

		parent::bulk_footer();

		$update_actions = array(
			'plugins_page' => '<a href="admin.php?page=' . esc_attr( $_REQUEST['page'] ) . '" target="_parent">' . __( 'Return to Plugins page', 'publisher' ) . '</a>',
		);

		if ( ! current_user_can( 'activate_plugins' ) ) {
			unset( $update_actions['plugins_page'] );
		}

		/**
		 * Filter the list of action links available following bulk plugin updates.
		 *
		 * @since 3.0.0
		 *
		 * @param array $update_actions Array of plugin action links.
		 * @param array $plugin_info    Array of information for the last-updated plugin.
		 */
		$update_actions = apply_filters( 'update_bulk_plugins_complete_actions', $update_actions, $this->plugin_info );

		if ( ! empty( $update_actions ) ) {
			$this->feedback( implode( ' | ', (array) $update_actions ) );
		}

		$this->filter_updated_plugins();
	}


	/**
	 * Iterate over the plugins update list to remove updated items if it's been already updated successfully.
	 *
	 * @since 3.10.2
	 * @return bool true if any change made.
	 */
	protected function filter_updated_plugins() {

		$update_plugins = get_site_transient( 'update_plugins' );

		if ( empty( $update_plugins->response ) ) {
			return false;
		}

		$current                  = count( $update_plugins->response );
		$update_plugins->response = array_filter( $update_plugins->response, array( $this, 'is_valid_item' ) );

		if ( $current !== count( $update_plugins->response ) ) {

			set_site_transient( 'update_plugins', $update_plugins );

			return true;
		}

		return false;
	}

	/**
	 * Whether to check if the plugin update info is valid.
	 *
	 * @param stdClass $item
	 *
	 * @since 3.10.2
	 * @return bool true if it's valid.
	 */
	protected function is_valid_item( $item ) {

		$plugin_installed_data = get_plugin_data(
			trailingslashit( WP_PLUGIN_DIR ) . $item->plugin
		);

		if ( empty( $plugin_installed_data['Version'] ) ) {
			return true;
		}

		return version_compare( $plugin_installed_data['Version'], $item->new_version, '<' );
	}
}
