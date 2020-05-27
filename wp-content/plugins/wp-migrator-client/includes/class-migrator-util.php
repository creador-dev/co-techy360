<?php


class Migrator_Util {


	/**
	 * Get list of all themes that ever installed on this wordpress installation
	 *
	 * @param bool $strict
	 *
	 * @return array
	 */
	public static function themes_list( $strict = FALSE ) {

		global $wpdb;

		$themes_dir = $wpdb->get_col( "SELECT SUBSTRING(`option_name`,12) FROM $wpdb->options WHERE option_name LIKE 'theme_mod_%' LIMIT 999" );

		$guss = array();
		$sure = array();

		foreach ( $themes_dir as $theme_dir ) {

			$theme = wp_get_theme( $theme_dir );

			if ( ! $theme->exists() ) {

				continue;
			}

			if ( $template = $theme->get( 'Template' ) ) {

				$theme = wp_get_theme( $template );
			}

			$guss[ $theme->get_stylesheet() ] = $theme->get( 'Name' );
		}


		$request = Migrator_Connector::product_detector( 'theme' );

		if ( ! empty( $request['themes'] ) ) {

			foreach ( $request['themes'] as $theme_id => $options ) {

				if ( empty( $options['rules']['option'] ) ) {
					continue;
				}

				foreach ( $options['rules']['option'] as $option_name ) {

					$option_value = get_option( $option_name );

					$exists = ! empty( $option_value );

					if ( ! $exists ) {
						break;
					}
				}

				if ( $exists ) {
					$sure[ $theme_id ] = $options['name'];
				}
			}
		}

		// TODO: cache $sure

		return compact( 'guss', 'sure' );
	}


	/**
	 * Load all active and valid plugins list
	 *
	 * @param bool $in_detail
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public static function list_active_plugins( $in_detail = FALSE ) {

		$plugins = array();

		if ( $in_detail && ! function_exists( 'get_plugin_data' ) ) {
			require ABSPATH . 'wp-admin/includes/plugin.php';
		}

		foreach ( wp_get_active_and_valid_plugins() as $plugin ) {

			$plugin_basename = plugin_basename( $plugin );
			$separator       = strstr( $plugin_basename, '/' ) ? '/' : '.';
			$id              = substr( $plugin_basename, 0, strpos( $plugin_basename, $separator ) );

			if ( $in_detail ) {

				$plugins[ $id ] = get_plugin_data( $plugin );

			} else {

				$plugins[ $id ] = $id;

			}
		}

		return $plugins;
	}

	/**
	 * Is the given object countable
	 *
	 * @link  http://php.net/manual/en/class.countable.php
	 *
	 * @since 1.0.0
	 *
	 * @param string|object $object
	 *
	 * @return bool
	 */
	public static function is_object_countable( $object ) {

		return $object instanceof Countable;
	}
}
