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


if ( ! function_exists( 'bf_get_current_lang_raw' ) ) {
	/**
	 * Used for finding current language in multilingual
	 *
	 * @sine 2.0
	 *
	 * @return string
	 */
	function bf_get_current_lang_raw() {

		static $lang;

		if ( $lang ) {
			return $lang;
		}

		// WPML : https://wpml.org/
		if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {

			$lang = icl_get_current_language();

			// Fix conditions WPML is active but not setup
			if ( is_null( $lang ) ) {
				$lang = 'none';
			}

		} // xili-language : https://wordpress.org/plugins/xili-language/
		elseif ( function_exists( 'xili_curlang' ) ) {

			// Tip for separating admin language when user selects specific locale
			if ( is_admin() ) {

				// get all xili active languages
				$languages = bf_get_all_languages();

				// get current locale
				$locale = get_locale();

				foreach ( (array) $languages as $_lang ) {

					if ( $_lang['locale'] == $locale ) {
						$lang = $_lang['id'];
					}

				}

			} else {
				$lang = xili_curlang();
			}

			if ( empty( $lang ) ) {
				$lang = 'all';
			}
		} // qTranslate : http://www.qianqin.de/qtranslate/
		elseif ( function_exists( 'qtrans_getLanguage' ) ) {
			$lang = qtrans_getLanguage();
		} // WPGlobe : http://www.wpglobus.com/
		elseif ( class_exists( 'WPGlobus' ) ) {

			// Tip for separating admin language when user selects specific locale
			if ( is_admin() ) {

				// get all xili active languages
				$languages = bf_get_all_languages();

				// get current locale
				$locale = get_locale();

				foreach ( (array) $languages as $_lang ) {

					if ( $_lang['locale'] == $locale ) {
						$lang = $_lang['id'];
					}

				}

			} else {
				$lang = WPGlobus::Config()->language;
			}

		} // Polylang : https://wordpress.org/plugins/polylang/
		elseif ( function_exists( 'pll_languages_list' ) ) {
			$lang = pll_current_language();

			$langs_list = pll_languages_list();

			// Fix conditions Polylang is active but not setup
			if ( ! $langs_list ) {
				$lang = 'none';
			} elseif ( $lang == false ) {
				$lang = 'all';
			}

		} else {
			$lang = 'none';
		}

		return $lang;
	}
}


if ( ! function_exists( 'bf_get_current_lang' ) ) {
	/**
	 * Used for finding current language in multilingual
	 *
	 * @sine 2.0
	 *
	 * @return string
	 */
	function bf_get_current_lang() {

		$lang = bf_get_current_lang_raw();

		// Default language is en!
		if ( $lang == 'en' ) {
			$lang = 'none';
		}

		return $lang;
	}
}


if ( ! function_exists( 'bf_get_all_languages' ) ) {
	/**
	 * Returns all active multilingual languages
	 *
	 * @since 2.0
	 *
	 * @return array
	 */
	function bf_get_all_languages() {

		$languages = array();

		// WPML : https://wpml.org/
		if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {

			global $sitepress;

			// get filtered active language informations
			$temp_lang = icl_get_languages( 'skip_missing=1' );

			foreach ( $temp_lang as $lang ) {

				// Get language raw data from DB
				$_lang = $sitepress->get_language_details( $lang['language_code'] );

				$languages[] = array(
					'id'     => $lang['language_code'],
					'name'   => $_lang['english_name'], // english display name
					'flag'   => $lang['country_flag_url'],
					'locale' => $lang['default_locale'],
				);

			}

		} // xili-language : https://wordpress.org/plugins/xili-language/
		elseif ( function_exists( 'xili_curlang' ) ) {

			global $xili_language;

			$languages = array();

			foreach ( (array) $xili_language->get_listlanguages() as $lang ) {

				$desc = unserialize( $lang->description );

				$languages[] = array(
					'id'     => $lang->slug,
					'name'   => $lang->name,
					'flag'   => '',
					'locale' => $desc['locale'],
				);

			}

		} // qTranslate : http://www.qianqin.de/qtranslate/
		elseif ( function_exists( 'qtrans_getLanguage' ) ) {

			global $q_config;

			$languages = array();

			foreach ( (array) $q_config['enabled_languages'] as $lang ) {

				$languages[] = array(
					'id'     => $lang,
					'name'   => $q_config['language_name'][ $lang ],
					'flag'   => trailingslashit( WP_CONTENT_URL ) . $q_config['flag_location'] . $q_config['flag'][ $lang ],
					'locale' => $q_config['locale'][ $lang ],
				);

			}

		} // WPGlobe : http://www.wpglobus.com/
		elseif ( class_exists( 'WPGlobus' ) ) {

			$_languages = WPGlobus::Config()->enabled_languages;

			foreach ( (array) $_languages as $lang ) {

				$languages[] = array(
					'id'     => $lang,
					'name'   => WPGlobus::Config()->en_language_name[ $lang ], // english display name
					'flag'   => WPGlobus::Config()->flags_url . WPGlobus::Config()->flag[ $lang ],
					'locale' => WPGlobus::Config()->locale[ $lang ],
				);
			}

		} // Polylang : https://wordpress.org/plugins/polylang/
		elseif ( function_exists( 'pll_languages_list' ) ) {

			$_languages = pll_languages_list( array( 'fields' => 'locale' ) );

			foreach ( (array) $_languages as $_lang ) {

				//get_language
				global $polylang;

				$_raw_lang = $polylang->model->get_language( $_lang );

				$languages[] = array(
					'id'     => $_raw_lang->slug,
					'name'   => $_raw_lang->name, // english display name
					'flag'   => $_raw_lang->flag_url,
					'locale' => $_raw_lang->locale,
				);
			}

		}

		return $languages;

	}
}


if ( ! function_exists( 'bf_get_language_data' ) ) {
	/**
	 * Returns multilingual language information
	 *
	 * @since 2.0
	 *
	 * @param null $lang
	 *
	 * @return array
	 */
	function bf_get_language_data( $lang = null ) {

		$output = array(
			'id'     => '',
			'name'   => '',
			'flag'   => '',
			'locale' => '',
		);

		if ( is_null( $lang ) ) {
			return $output;
		}

		$languages = bf_get_all_languages();

		foreach ( $languages as $_language ) {

			if ( $_language['id'] == $lang ) {

				$output = $_language;

			}

		}

		return $output;

	}
}


if ( ! function_exists( 'bf_get_language_name' ) ) {
	/**
	 * Returns multilingual language name from ID
	 *
	 * @since 2.0
	 *
	 * @param null $lang
	 *
	 * @return array
	 */
	function bf_get_language_name( $lang = null ) {

		$lang = bf_get_language_data( $lang );

		if ( isset( $lang['name'] ) ) {
			return $lang['name'];
		}

		return '';
	}
}


if ( ! function_exists( 'bf_get_current_language_option_code' ) ) {
	/**
	 * Returns multilingual language option id that starts with _
	 * ex: _fa
	 * for english and all language code returns empty
	 *
	 * @since 2.3
	 *
	 * @return array
	 */
	function bf_get_current_language_option_code( $lang = null ) {

		static $_lang;

		// for special codes that passes the lang
		if ( ! is_null( $lang ) ) {

			$lang = bf_get_current_lang();

			if ( $lang == 'none' || $lang == 'all' ) {
				$lang = '';
			} else {
				$lang = '_' . $lang;
			}

			return $lang;
		}

		// from cache
		if ( $_lang ) {
			return $_lang;
		}

		$_lang = bf_get_current_lang();

		if ( $_lang == 'none' || $_lang == 'all' ) {
			$_lang = '';
		} else {
			$_lang = '_' . $_lang;
		}

		return $_lang;
	}
}