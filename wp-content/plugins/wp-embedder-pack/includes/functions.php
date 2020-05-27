<?php


if ( ! function_exists( 'wep_view' ) ) {

	/**
	 * Load view file
	 *
	 * @param string $file File name
	 * @param bool   $load
	 *
	 * @return bool true|string absolute path to the template file on success or false on failure.
	 * @since 1.0.0
	 *
	 */
	function wep_view( $file = '', $load = TRUE ) {

		$relative_path    = $file . '.php';
		$scan_directories = array(
			wep_get_template_directory(),
		);

		$scan_directories = array_unique( array_filter( $scan_directories ) );

		foreach ( $scan_directories as $theme_directory ) {

			if ( $theme_file_path = wep_load_templates( $relative_path, $theme_directory, $load, FALSE ) ) {
				return $theme_file_path;
			}
		}

		return FALSE;
	}
}

if ( ! function_exists( 'wep_get_template_directory' ) ) {

	/**
	 * Get absolute path to local template directory
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function wep_get_template_directory() {

		return WP_Embedder_Pack::dir_path( '/templates' );
	}
}


if ( ! function_exists( 'wep_get_template_directory_uri' ) ) {

	/**
	 * Get url of local template directory.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function wep_get_template_directory_uri() {

		return WP_Embedder_Pack::dir_url( '/templates' );
	}
}

if ( ! function_exists( 'wep_load_templates' ) ) {

	/**
	 * Require the template file.
	 *
	 * @param string|array $templates
	 * @param string       $theme_directory base directory. scan $templates files into this directory
	 * @param bool         $load
	 * @param bool         $require_once
	 *
	 * @since 1.0.0
	 *
	 * @return bool|string absolute path to the template file on success or false on failure.
	 */
	function wep_load_templates( $templates, $theme_directory, $load = FALSE, $require_once = TRUE ) {

		foreach ( (array) $templates as $theme_file ) {

			$theme_file      = ltrim( $theme_file, '/' );
			$theme_directory = trailingslashit( $theme_directory );

			if ( file_exists( $theme_directory . $theme_file ) ) {

				if ( $load ) {

					if ( $require_once ) {
						require_once $theme_directory . $theme_file;
					} else {
						require $theme_directory . $theme_file;
					}
				}

				return $theme_directory . $theme_file;
			}
		}

		return FALSE;
	}
}

if ( ! function_exists( 'wep_get_option' ) ) {

	/**
	 * Get an option from panel.
	 *
	 * @param string $option_key
	 *
	 * @since 1.0.0
	 * @return array|bool false on failure or array on success
	 */
	function wep_get_option( $option_key ) {

		return bf_get_option( $option_key, 'better-wp-embedder' );
	}
}

if ( ! function_exists( 'wep_google_drive_api' ) ) {

	/**
	 * Get google drive API Key & Client ID if it's enabled.
	 *
	 * @since 1.0.0
	 *
	 * @return bool|array false on failure or array on success
	 */
	function wep_google_drive_api() {

		if ( ! wep_get_option( 'use-google-drive' ) ) {
			return FALSE;
		}

		$api = array(
			'api_key'   => wep_get_option( 'google-drive-api-key' ),
			'client_id' => wep_get_option( 'google-drive-client-id' ),
		);

		if ( $api = array_filter( $api ) ) {
			return $api;
		}

		return FALSE;
	}
}


if ( ! function_exists( 'wep_dropbox_api' ) ) {

	/**
	 * Get dropbox API Key if it's enabled.
	 *
	 * @since 1.0.0
	 *
	 * @return bool|string false on failure or string on success
	 */
	function wep_dropbox_api() {

		if ( ! wep_get_option( 'use-google-drive' ) ) {
			return FALSE;
		}

		if ( $api = wep_get_option( 'dropbox-api-key' ) ) {
			return $api;
		}

		return FALSE;
	}
}


if ( ! function_exists( 'bew_translation_get' ) ) {

	/**
	 * Get translation from panel.
	 *
	 * @param string $translation_key
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function bew_translation_get( $translation_key ) {

		return wep_get_option( 'translation-' . $translation_key );
	}
}
