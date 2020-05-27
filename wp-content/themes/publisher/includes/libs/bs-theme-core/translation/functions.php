<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( ! function_exists( 'publisher_translation_get' ) ) {
	/**
	 * Handy wrapper function
	 *
	 * @param $option_key
	 *
	 * @return mixed
	 */
	function publisher_translation_get( $option_key ) {
		return publisher_translation()->_get( $option_key );
	}
}


if ( ! function_exists( 'publisher_translation_echo' ) ) {
	/**
	 * Handy wrapper function
	 *
	 * @param $option_key
	 *
	 * @return mixed
	 */
	function publisher_translation_echo( $option_key ) {
		return publisher_translation()->_echo( $option_key );
	}
}


if ( ! function_exists( 'publisher_translation_esc_attr' ) ) {
	/**
	 * Handy wrapper function
	 *
	 * @param $option_key
	 *
	 * @return mixed
	 */
	function publisher_translation_esc_attr( $option_key ) {
		return publisher_translation()->_get_esc_attr( $option_key );
	}
}


if ( ! function_exists( 'publisher_translation_echo_esc_attr' ) ) {
	/**
	 * Handy wrapper function
	 *
	 * @param $option_key
	 *
	 * @return mixed
	 */
	function publisher_translation_echo_esc_attr( $option_key ) {
		return publisher_translation()->_echo_esc_attr( $option_key );
	}
}


if ( ! function_exists( 'publisher_theme_core_translations_send_translations_cb' ) ) {
	/**
	 * Callback for BetterTranslation Send translation custom field
	 *
	 * @since 1.0.3
	 */
	function publisher_theme_core_translations_send_translations_cb() {
		?>
		<div class="bf-translation-header bf-columns-2 bf-clearfix">
			<div class="bf-column bf-first-column">
				<h4>
					<i class="fa fa-globe" aria-hidden="true"></i>
					<?php esc_html_e( 'Load translation', 'publisher' ); ?>
				</h4>

				<p>
					<?php esc_html_e( 'Select pre translations from following dropdown also if your language is not available you can
					translate
					it and share it with community.', 'publisher' ); ?>
				</p>

				<div class="bf-column-container">
					<div class="typo-field-container bf-fullwidth-dropdown" style="width: 100%;">
						<select name="name" id="better-framework-pre-translations">
							<?php

							if ( $translations = Publisher_Translation::factory()->get_languages() ) {
								$current_panel_lang = get_option( Publisher_Translation::factory()->option_panel_id . bf_get_current_language_option_code() . '-current' );

								foreach ( $translations as $locale => $data ) {

									if( ! is_array( $data ) ){
										continue;
									}

									$selected = $locale === $current_panel_lang ? ' selected="selected"' : '';
									printf( '<option value="%s"%s>%s</option>', esc_attr( $locale ), $selected, $data['name'] );
								}
								$translations = NULL;
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="bf-column bf-second-column">

				<h4>
					<i class="fa fa-life-ring"
					   aria-hidden="true"></i> <?php esc_html_e( 'Help the community', 'publisher' ); ?>
				</h4>
				<p>
					<?php esc_html_e( 'If you fixed a word or if you have a better translation for a phrase feel free to share it with the
					community .', 'publisher' ); ?>
				</p>
				<a id="better-translation-send"
				   class="button-large bf-button bf-main-button"> <?php esc_html_e( 'Send Translation', 'publisher' ); ?></a>
				<script>
					var betterTranslationAllLanguages = {
						af: "Afrikaans",
						af_NA: "Afrikaans (Namibia)",
						af_ZA: "Afrikaans (South Africa)",
						ak: "Akan",
						ak_GH: "Akan (Ghana)",
						sq: "Albanian",
						sq_AL: "Albanian (Albania)",
						am: "Amharic",
						am_ET: "Amharic (Ethiopia)",
						ar: "Arabic",
						ar_DZ: "Arabic (Algeria)",
						ar_BH: "Arabic (Bahrain)",
						ar_EG: "Arabic (Egypt)",
						ar_IQ: "Arabic (Iraq)",
						ar_JO: "Arabic (Jordan)",
						ar_KW: "Arabic (Kuwait)",
						ar_LB: "Arabic (Lebanon)",
						ar_LY: "Arabic (Libya)",
						ar_MA: "Arabic (Morocco)",
						ar_OM: "Arabic (Oman)",
						ar_QA: "Arabic (Qatar)",
						ar_SA: "Arabic (Saudi Arabia)",
						ar_SD: "Arabic (Sudan)",
						ar_SY: "Arabic (Syria)",
						ar_TN: "Arabic (Tunisia)",
						ar_AE: "Arabic (United Arab Emirates)",
						ar_YE: "Arabic (Yemen)",
						hy: "Armenian",
						hy_AM: "Armenian (Armenia)",
						as: "Assamese",
						as_IN: "Assamese (India)",
						asa: "Asu",
						asa_TZ: "Asu (Tanzania)",
						az: "Azerbaijani",
						az_Cyrl: "Azerbaijani (Cyrillic)",
						az_Cyrl_AZ: "Azerbaijani (Cyrillic, Azerbaijan)",
						az_Latn: "Azerbaijani (Latin)",
						az_Latn_AZ: "Azerbaijani (Latin, Azerbaijan)",
						bm: "Bambara",
						bm_ML: "Bambara (Mali)",
						eu: "Basque",
						eu_ES: "Basque (Spain)",
						be: "Belarusian",
						be_BY: "Belarusian (Belarus)",
						bem: "Bemba",
						bem_ZM: "Bemba (Zambia)",
						bez: "Bena",
						bez_TZ: "Bena (Tanzania)",
						bn: "Bengali",
						bn_BD: "Bengali (Bangladesh)",
						bn_IN: "Bengali (India)",
						bs: "Bosnian",
						bs_BA: "Bosnian (Bosnia and Herzegovina)",
						bg: "Bulgarian",
						bg_BG: "Bulgarian (Bulgaria)",
						my: "Burmese",
						my_MM: "Burmese (Myanmar [Burma])",
						ca: "Catalan",
						ca_ES: "Catalan (Spain)",
						tzm: "Central Morocco Tamazight",
						tzm_Latn: "Central Morocco Tamazight (Latin)",
						tzm_Latn_MA: "Central Morocco Tamazight (Latin, Morocco)",
						chr: "Cherokee",
						chr_US: "Cherokee (United States)",
						cgg: "Chiga",
						cgg_UG: "Chiga (Uganda)",
						zh: "Chinese",
						zh_Hans: "Chinese (Simplified Han)",
						zh_Hans_CN: "Chinese (Simplified Han, China)",
						zh_Hans_HK: "Chinese (Simplified Han, Hong Kong SAR China)",
						zh_Hans_MO: "Chinese (Simplified Han, Macau SAR China)",
						zh_Hans_SG: "Chinese (Simplified Han, Singapore)",
						zh_Hant: "Chinese (Traditional Han)",
						zh_Hant_HK: "Chinese (Traditional Han, Hong Kong SAR China)",
						zh_Hant_MO: "Chinese (Traditional Han, Macau SAR China)",
						zh_Hant_TW: "Chinese (Traditional Han, Taiwan)",
						kw: "Cornish",
						kw_GB: "Cornish (United Kingdom)",
						hr: "Croatian",
						hr_HR: "Croatian (Croatia)",
						cs: "Czech",
						cs_CZ: "Czech (Czech Republic)",
						da: "Danish",
						da_DK: "Danish (Denmark)",
						nl: "Dutch",
						nl_BE: "Dutch (Belgium)",
						nl_NL: "Dutch (Netherlands)",
						ebu: "Embu",
						ebu_KE: "Embu (Kenya)",
						en: "English",
						en_AS: "English (American Samoa)",
						en_AU: "English (Australia)",
						en_BE: "English (Belgium)",
						en_BZ: "English (Belize)",
						en_BW: "English (Botswana)",
						en_CA: "English (Canada)",
						en_GU: "English (Guam)",
						en_HK: "English (Hong Kong SAR China)",
						en_IN: "English (India)",
						en_IE: "English (Ireland)",
						en_JM: "English (Jamaica)",
						en_MT: "English (Malta)",
						en_MH: "English (Marshall Islands)",
						en_MU: "English (Mauritius)",
						en_NA: "English (Namibia)",
						en_NZ: "English (New Zealand)",
						en_MP: "English (Northern Mariana Islands)",
						en_PK: "English (Pakistan)",
						en_PH: "English (Philippines)",
						en_SG: "English (Singapore)",
						en_ZA: "English (South Africa)",
						en_TT: "English (Trinidad and Tobago)",
						en_UM: "English (U.S. Minor Outlying Islands)",
						en_VI: "English (U.S. Virgin Islands)",
						en_GB: "English (United Kingdom)",
						en_US: "English (United States)",
						en_ZW: "English (Zimbabwe)",
						eo: "Esperanto",
						et: "Estonian",
						et_EE: "Estonian (Estonia)",
						ee: "Ewe",
						ee_GH: "Ewe (Ghana)",
						ee_TG: "Ewe (Togo)",
						fo: "Faroese",
						fo_FO: "Faroese (Faroe Islands)",
						fil: "Filipino",
						fil_PH: "Filipino (Philippines)",
						fi: "Finnish",
						fi_FI: "Finnish (Finland)",
						fr: "French",
						fr_BE: "French (Belgium)",
						fr_BJ: "French (Benin)",
						fr_BF: "French (Burkina Faso)",
						fr_BI: "French (Burundi)",
						fr_CM: "French (Cameroon)",
						fr_CA: "French (Canada)",
						fr_CF: "French (Central African Republic)",
						fr_TD: "French (Chad)",
						fr_KM: "French (Comoros)",
						fr_CG: "French (Congo - Brazzaville)",
						fr_CD: "French (Congo - Kinshasa)",
						fr_CI: "French (C&#xF4;te d&#x2019;Ivoire)",
						fr_DJ: "French (Djibouti)",
						fr_GQ: "French (Equatorial Guinea)",
						fr_FR: "French (France)",
						fr_GA: "French (Gabon)",
						fr_GP: "French (Guadeloupe)",
						fr_GN: "French (Guinea)",
						fr_LU: "French (Luxembourg)",
						fr_MG: "French (Madagascar)",
						fr_ML: "French (Mali)",
						fr_MQ: "French (Martinique)",
						fr_MC: "French (Monaco)",
						fr_NE: "French (Niger)",
						fr_RW: "French (Rwanda)",
						fr_RE: "French (R&#xE9;union)",
						fr_BL: "French (Saint Barth&#xE9;lemy)",
						fr_MF: "French (Saint Martin)",
						fr_SN: "French (Senegal)",
						fr_CH: "French (Switzerland)",
						fr_TG: "French (Togo)",
						ff: "Fulah",
						ff_SN: "Fulah (Senegal)",
						gl: "Galician",
						gl_ES: "Galician (Spain)",
						lg: "Ganda",
						lg_UG: "Ganda (Uganda)",
						ka: "Georgian",
						ka_GE: "Georgian (Georgia)",
						de: "German",
						de_AT: "German (Austria)",
						de_BE: "German (Belgium)",
						de_DE: "German (Germany)",
						de_LI: "German (Liechtenstein)",
						de_LU: "German (Luxembourg)",
						de_CH: "German (Switzerland)",
						el: "Greek",
						el_CY: "Greek (Cyprus)",
						el_GR: "Greek (Greece)",
						gu: "Gujarati",
						gu_IN: "Gujarati (India)",
						guz: "Gusii",
						guz_KE: "Gusii (Kenya)",
						ha: "Hausa",
						ha_Latn: "Hausa (Latin)",
						ha_Latn_GH: "Hausa (Latin, Ghana)",
						ha_Latn_NE: "Hausa (Latin, Niger)",
						ha_Latn_NG: "Hausa (Latin, Nigeria)",
						haw: "Hawaiian",
						haw_US: "Hawaiian (United States)",
						he: "Hebrew",
						he_IL: "Hebrew (Israel)",
						hi: "Hindi",
						hi_IN: "Hindi (India)",
						hu: "Hungarian",
						hu_HU: "Hungarian (Hungary)",
						is: "Icelandic",
						is_IS: "Icelandic (Iceland)",
						ig: "Igbo",
						ig_NG: "Igbo (Nigeria)",
						id: "Indonesian",
						id_ID: "Indonesian (Indonesia)",
						ga: "Irish",
						ga_IE: "Irish (Ireland)",
						it: "Italian",
						it_IT: "Italian (Italy)",
						it_CH: "Italian (Switzerland)",
						ja: "Japanese",
						ja_JP: "Japanese (Japan)",
						kea: "Kabuverdianu",
						kea_CV: "Kabuverdianu (Cape Verde)",
						kab: "Kabyle",
						kab_DZ: "Kabyle (Algeria)",
						kl: "Kalaallisut",
						kl_GL: "Kalaallisut (Greenland)",
						kln: "Kalenjin",
						kln_KE: "Kalenjin (Kenya)",
						kam: "Kamba",
						kam_KE: "Kamba (Kenya)",
						kn: "Kannada",
						kn_IN: "Kannada (India)",
						kk: "Kazakh",
						kk_Cyrl: "Kazakh (Cyrillic)",
						kk_Cyrl_KZ: "Kazakh (Cyrillic, Kazakhstan)",
						km: "Khmer",
						km_KH: "Khmer (Cambodia)",
						ki: "Kikuyu",
						ki_KE: "Kikuyu (Kenya)",
						rw: "Kinyarwanda",
						rw_RW: "Kinyarwanda (Rwanda)",
						kok: "Konkani",
						kok_IN: "Konkani (India)",
						ko: "Korean",
						ko_KR: "Korean (South Korea)",
						khq: "Koyra Chiini",
						khq_ML: "Koyra Chiini (Mali)",
						ses: "Koyraboro Senni",
						ses_ML: "Koyraboro Senni (Mali)",
						lag: "Langi",
						lag_TZ: "Langi (Tanzania)",
						lv: "Latvian",
						lv_LV: "Latvian (Latvia)",
						lt: "Lithuanian",
						lt_LT: "Lithuanian (Lithuania)",
						luo: "Luo",
						luo_KE: "Luo (Kenya)",
						luy: "Luyia",
						luy_KE: "Luyia (Kenya)",
						mk: "Macedonian",
						mk_MK: "Macedonian (Macedonia)",
						jmc: "Machame",
						jmc_TZ: "Machame (Tanzania)",
						kde: "Makonde",
						kde_TZ: "Makonde (Tanzania)",
						mg: "Malagasy",
						mg_MG: "Malagasy (Madagascar)",
						ms: "Malay",
						ms_BN: "Malay (Brunei)",
						ms_MY: "Malay (Malaysia)",
						ml: "Malayalam",
						ml_IN: "Malayalam (India)",
						mt: "Maltese",
						mt_MT: "Maltese (Malta)",
						gv: "Manx",
						gv_GB: "Manx (United Kingdom)",
						mr: "Marathi",
						mr_IN: "Marathi (India)",
						mas: "Masai",
						mas_KE: "Masai (Kenya)",
						mas_TZ: "Masai (Tanzania)",
						mer: "Meru",
						mer_KE: "Meru (Kenya)",
						mfe: "Morisyen",
						mfe_MU: "Morisyen (Mauritius)",
						naq: "Nama",
						naq_NA: "Nama (Namibia)",
						ne: "Nepali",
						ne_IN: "Nepali (India)",
						ne_NP: "Nepali (Nepal)",
						nd: "North Ndebele",
						nd_ZW: "North Ndebele (Zimbabwe)",
						nb: "Norwegian Bokm&#xE5;l",
						nb_NO: "Norwegian Bokm&#xE5;l (Norway)",
						nn: "Norwegian Nynorsk",
						nn_NO: "Norwegian Nynorsk (Norway)",
						nyn: "Nyankole",
						nyn_UG: "Nyankole (Uganda)",
						or: "Oriya",
						or_IN: "Oriya (India)",
						om: "Oromo",
						om_ET: "Oromo (Ethiopia)",
						om_KE: "Oromo (Kenya)",
						ps: "Pashto",
						ps_AF: "Pashto (Afghanistan)",
						fa: "Persian",
						fa_IR: "Persian (Iran)",
						fa_AF: "Persian (Afghanistan)",
						pl: "Polish",
						pl_PL: "Polish (Poland)",
						pt: "Portuguese",
						pt_BR: "Portuguese (Brazil)",
						pt_GW: "Portuguese (Guinea-Bissau)",
						pt_MZ: "Portuguese (Mozambique)",
						pt_PT: "Portuguese (Portugal)",
						pa: "Punjabi",
						pa_Arab: "Punjabi (Arabic)",
						pa_Arab_PK: "Punjabi (Arabic, Pakistan)",
						pa_Guru: "Punjabi (Gurmukhi)",
						pa_Guru_IN: "Punjabi (Gurmukhi, India)",
						ro: "Romanian",
						ro_MD: "Romanian (Moldova)",
						ro_RO: "Romanian (Romania)",
						rm: "Romansh",
						rm_CH: "Romansh (Switzerland)",
						rof: "Rombo",
						rof_TZ: "Rombo (Tanzania)",
						ru: "Russian",
						ru_MD: "Russian (Moldova)",
						ru_RU: "Russian (Russia)",
						ru_UA: "Russian (Ukraine)",
						rwk: "Rwa",
						rwk_TZ: "Rwa (Tanzania)",
						saq: "Samburu",
						saq_KE: "Samburu (Kenya)",
						sg: "Sango",
						sg_CF: "Sango (Central African Republic)",
						seh: "Sena",
						seh_MZ: "Sena (Mozambique)",
						sr: "Serbian",
						sr_Cyrl: "Serbian (Cyrillic)",
						sr_Cyrl_BA: "Serbian (Cyrillic, Bosnia and Herzegovina)",
						sr_Cyrl_ME: "Serbian (Cyrillic, Montenegro)",
						sr_Cyrl_RS: "Serbian (Cyrillic, Serbia)",
						sr_Latn: "Serbian (Latin)",
						sr_Latn_BA: "Serbian (Latin, Bosnia and Herzegovina)",
						sr_Latn_ME: "Serbian (Latin, Montenegro)",
						sr_Latn_RS: "Serbian (Latin, Serbia)",
						sn: "Shona",
						sn_ZW: "Shona (Zimbabwe)",
						ii: "Sichuan Yi",
						ii_CN: "Sichuan Yi (China)",
						si: "Sinhala",
						si_LK: "Sinhala (Sri Lanka)",
						sk: "Slovak",
						sk_SK: "Slovak (Slovakia)",
						sl: "Slovenian",
						sl_SI: "Slovenian (Slovenia)",
						xog: "Soga",
						xog_UG: "Soga (Uganda)",
						so: "Somali",
						so_DJ: "Somali (Djibouti)",
						so_ET: "Somali (Ethiopia)",
						so_KE: "Somali (Kenya)",
						so_SO: "Somali (Somalia)",
						es: "Spanish",
						es_AR: "Spanish (Argentina)",
						es_BO: "Spanish (Bolivia)",
						es_CL: "Spanish (Chile)",
						es_CO: "Spanish (Colombia)",
						es_CR: "Spanish (Costa Rica)",
						es_DO: "Spanish (Dominican Republic)",
						es_EC: "Spanish (Ecuador)",
						es_SV: "Spanish (El Salvador)",
						es_GQ: "Spanish (Equatorial Guinea)",
						es_GT: "Spanish (Guatemala)",
						es_HN: "Spanish (Honduras)",
						es_419: "Spanish (Latin America)",
						es_MX: "Spanish (Mexico)",
						es_NI: "Spanish (Nicaragua)",
						es_PA: "Spanish (Panama)",
						es_PY: "Spanish (Paraguay)",
						es_PE: "Spanish (Peru)",
						es_PR: "Spanish (Puerto Rico)",
						es_ES: "Spanish (Spain)",
						es_US: "Spanish (United States)",
						es_UY: "Spanish (Uruguay)",
						es_VE: "Spanish (Venezuela)",
						sw: "Swahili",
						sw_KE: "Swahili (Kenya)",
						sw_TZ: "Swahili (Tanzania)",
						sv: "Swedish",
						sv_FI: "Swedish (Finland)",
						sv_SE: "Swedish (Sweden)",
						gsw: "Swiss German",
						gsw_CH: "Swiss German (Switzerland)",
						shi: "Tachelhit",
						shi_Latn: "Tachelhit (Latin)",
						shi_Latn_MA: "Tachelhit (Latin, Morocco)",
						shi_Tfng: "Tachelhit (Tifinagh)",
						shi_Tfng_MA: "Tachelhit (Tifinagh, Morocco)",
						dav: "Taita",
						dav_KE: "Taita (Kenya)",
						ta: "Tamil",
						ta_IN: "Tamil (India)",
						ta_LK: "Tamil (Sri Lanka)",
						te: "Telugu",
						te_IN: "Telugu (India)",
						teo: "Teso",
						teo_KE: "Teso (Kenya)",
						teo_UG: "Teso (Uganda)",
						th: "Thai",
						th_TH: "Thai (Thailand)",
						bo: "Tibetan",
						bo_CN: "Tibetan (China)",
						bo_IN: "Tibetan (India)",
						ti: "Tigrinya",
						ti_ER: "Tigrinya (Eritrea)",
						ti_ET: "Tigrinya (Ethiopia)",
						to: "Tonga",
						to_TO: "Tonga (Tonga)",
						tr: "Turkish",
						tr_TR: "Turkish (Turkey)",
						uk: "Ukrainian",
						uk_UA: "Ukrainian (Ukraine)",
						ur: "Urdu",
						ur_IN: "Urdu (India)",
						ur_PK: "Urdu (Pakistan)",
						uz: "Uzbek",
						uz_Arab: "Uzbek (Arabic)",
						uz_Arab_AF: "Uzbek (Arabic, Afghanistan)",
						uz_Cyrl: "Uzbek (Cyrillic)",
						uz_Cyrl_UZ: "Uzbek (Cyrillic, Uzbekistan)",
						uz_Latn: "Uzbek (Latin)",
						uz_Latn_UZ: "Uzbek (Latin, Uzbekistan)",
						vi: "Vietnamese",
						vi_VN: "Vietnamese (Vietnam)",
						vun: "Vunjo",
						vun_TZ: "Vunjo (Tanzania)",
						cy: "Welsh",
						cy_GB: "Welsh (United Kingdom)",
						yo: "Yoruba",
						yo_NG: "Yoruba (Nigeria)",
						zu: "Zulu",
						zu_ZA: "Zulu (South Africa)"
					};
				</script>
			</div>
		</div>
		<?php
	} // publisher_theme_core_translations_send_translations_cb
}
