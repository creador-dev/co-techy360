<?php

if ( ! class_exists( 'Plugin_Installer_Skin' ) ) {

	require ABSPATH . '/wp-admin/includes/class-wp-upgrader-skins.php';
}


class BF_Plugin_Install_Skin extends Plugin_Installer_Skin {


	public function __construct( $args = array() ) {

		$args['url'] = add_query_arg( $_GET );

		parent::__construct( $args );
	}


	public function after() {

		if ( ! empty( $this->options['return_link'] ) ) {

			$install_actions['plugins_page'] = '<a href="admin.php?page=' . esc_attr( $_REQUEST['page'] ) . '">' . __( 'Return to Plugin Installer', 'publisher' ) . '</a>';
		}

		if ( ! empty( $install_actions ) ) {
			$this->feedback( implode( ' ', (array) $install_actions ) );
		}
	}
}
