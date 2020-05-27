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


/**
 * Utility and helper function for "BF Fetch Screenshot" library
 */
class Publisher_Fetch_Screenshot_util {

	/**
	 * Determinate the given video url is belong to which video hosts
	 *
	 * @param string $video_url
	 *
	 * @return string
	 */
	public static function detect_service_provider( $video_url ) {

		if ( preg_match( '#^(?: https?:)?// (?: w{3}.)? ([^\.]+)#ix', $video_url, $match ) ) {

			return strtolower( $match[1] );
		}

		return '';
	}


	/**
	 * Categorize videos url by website name
	 *
	 * @param array $urls_list
	 *
	 * @return array
	 */
	public static function categorize_video_url_list( array $urls_list ) {

		$categorized = array();

		foreach ( $urls_list as $url ) {

			if ( ! $provider = self::detect_service_provider( $url ) ) {
				continue;
			}

			$categorized[ $provider ][] = $url;
		}

		return $categorized;
	}


	/**
	 * Is remote url exits and return 2000 header
	 *
	 * @param string $remote_url
	 *
	 * @return true on success or false on failure.
	 */
	public static function remote_file_exists( $remote_url ) {

		if ( ! $remote_url ) {
			return false;
		}

		$response = wp_remote_head( $remote_url,array('sslverify' => false) );

		if ( ! $response || is_wp_error( $response ) ) {
			return false;
		}

		return wp_remote_retrieve_response_code( $response ) === 200;
	}
}
