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
			'plugins_page' => '<a href="admin.php?page=' . esc_attr( $_REQUEST['page'] ) . '" target="_parent">' . __( 'Return to Plugins page' , 'better-studio') . '</a>',
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
	}
}
