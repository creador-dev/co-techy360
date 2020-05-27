<?php
/**
 * translation.php
 *---------------------------
 * Registers options for translation panel
 *
 */

add_filter( 'publisher-theme-core/translation/translations/fields', 'publisher_translation_fields' );

if ( ! function_exists( 'publisher_translation_fields' ) ) {
	/**
	 * Callback: Ads theme translation words to BetterTranslation
	 *
	 * Filter: better-translation/translations/fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_translation_fields( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/translation-fields.php';

		return $fields;
	} // publisher_translation_fields
} // if


add_filter( 'better-framework/panel/better-translation-' . 'publisher/std', 'publisher_translation_std', 100 );

if ( ! function_exists( 'publisher_translation_std' ) ) {
	/**
	 * Callback: Ads theme translation words to BetterTranslation
	 *
	 * Filter: better-translation/translations/fields
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_translation_std( $fields ) {

		include PUBLISHER_THEME_PATH . 'includes/options/translation-stds.php';

		return $fields;
	} // publisher_translation_fields
} // if


// Init BetterTranslation for theme
add_filter( 'publisher-theme-core/translation/languages', 'publisher_translations_languages' );

if ( ! function_exists( 'publisher_translations_languages' ) ) {
	/**
	 * Callback: Publisher Translation languages
	 *
	 * Filter: better-translation/languages
	 *
	 * @param $languages
	 *
	 * @return mixed
	 */
	function publisher_translations_languages( $languages ) {

		$translations = get_option( 'publisher_languages' );

		/**
		 * Update Translation List
		 */
		if ( $translations === false || ( isset( $translations['expire'] ) ? $translations['expire'] : 0 ) < time() ) {

			$response = BetterFramework_Oculus::request( 'get-translations-list', array(
				'json_assoc' => true,
				'group'      => 'translation',
			) );

			if ( ! is_wp_error( $response ) && ! empty( $response['success'] ) ) {
				$langs        = &$response['translations'];
				$expire       = strtotime( '+1 hour' );
				$translations = compact( 'langs', 'expire' );

				update_option( 'publisher_languages', $translations );
			}
		}


		if ( empty( $translations['langs'] ) ) {

			include PUBLISHER_THEME_PATH . 'includes/options/translation-languages.php';

			return $languages;
		}


		if ( empty( $languages ) ) {
			return array_merge( array( '' => ' - ' ), $translations['langs'] );
		} else {
			return array_merge( array( '' => ' - ' ), $languages, $translations['langs'] );
		}

	} // publisher_translations_languages
}
