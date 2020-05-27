<?php


class Migrator_Notification {

	/**
	 * Add an admin notice about list of available themes to migrate
	 *
	 * @since 1.0.0
	 * @return bool true on success or false on failure.
	 */
	public static function theme_migrate_notification() {

		if ( ! function_exists( 'bf_add_notice' ) ) {
			return FALSE;
		}

		return bf_add_notice( array(
			'msg'            => array( 'Migrator_Notification', 'notice_message' ),
			//
			'notice-icon'    => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png', # Fixme: change icon
			'product'        => 'publisher:migrator',
			'type'           => 'fixed',
			'class'          => 'publisher-update-notice',
			'state'          => 'success',
			'id'             => 'migrator-themes',
			'show_all_label' => __( '… See all themes', WPMG_LOC ),
		) );
	}

	/**
	 * Return migrator admin notice message
	 */
	public static function notice_message() {

		global $pagenow;

		if ( 'admin.php' === $pagenow && ! empty( $_GET['page'] ) && 'wp-migrator' === $_GET['page'] ) {

			return FALSE;
		}

		$theme_list = Migrator_Util::themes_list();

		if ( empty( $theme_list ) ) {
			return FALSE;
		}

		$list = array();
		$sure = FALSE;

		if ( ! empty( $theme_list['sure'] ) ) {

			$sure = TRUE;
			$list = $theme_list['sure'];

		} elseif ( ! empty( $theme_list['guss'] ) ) {

			$list = $theme_list['guss'];
		}

		// Remove Publisher
		unset( $list['publisher'] );

		if ( empty( $list ) ) {
			return FALSE;
		}

		if ( $sure ) {
			$message = __( 'Publisher Migrator found the following theme data and you can migrate those right now!', WPMG_LOC );

		} else {

			$message = __( 'It seems that you have been installed the following themes and there is some data in the database which is ready to migrate!', WPMG_LOC );
		}

		$message .= '<ul>';

		foreach ( $list as $theme ) {

			$message .= sprintf( '<li>%s</li>', $theme );

		}
		$message .= '</ul>';


		$message .= sprintf(
			'<a href="%s" class="button button-primary">%s</a>',
			admin_url( 'admin.php?page=wp-migrator' ),
			__( 'Go to migrator page', 'better-studio' )
		);


		return '<p>' . $message . '</p>';
	}
}
