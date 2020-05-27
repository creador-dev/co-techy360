<?php

if ( ! class_exists( 'Plugin_Installer_Skin' ) ) {

	require ABSPATH . '/wp-admin/includes/class-wp-upgrader-skins.php';
}


class BF_Plugin_Upgrade_Skin extends Bulk_Plugin_Upgrader_Skin {

	public function after() {

		$install_actions['plugins_page'] = '<a href="admin.php?page=' . esc_attr( $_REQUEST['page'] ) . '">' . __( 'Return to Plugin Installer', 'better-studio' ) . '</a>';
	}
}
