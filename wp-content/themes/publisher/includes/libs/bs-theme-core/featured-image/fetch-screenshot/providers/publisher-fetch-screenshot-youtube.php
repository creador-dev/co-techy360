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
 * Generates screenshot Youtube videos
 */
class Publisher_Fetch_Screenshot_Youtube implements Publisher_Fetch_Screenshot_Service_Interface {

	/**
	 * Patterns for youtube URLs
	 *
	 * @var array
	 */
	protected $urls_pattern = array(
		'http://img.youtube.com/vi/{VIDEO_ID}/maxresdefault.jpg',
		'http://img.youtube.com/vi/{VIDEO_ID}/hqdefault.jpg',
		'http://img.youtube.com/vi/{VIDEO_ID}/mqdefault.jpg',
	);


	/**
	 * @param array $video_urls
	 *
	 * @return array
	 */
	public function get_video_id_list( array $video_urls ) {

		$id_ist = array();

		foreach ( $video_urls as $video_url ) {

			if ( $video_id = $this->get_video_id( $video_url ) ) {

				$id_ist[ $video_url ] = $video_id;
			}
		}

		return $id_ist;
	}


	/**
	 *
	 * @param array $video_urls
	 *
	 * @return array
	 */
	public function fetch_screenshots_list( array $video_urls ) {

		$screenshots = array();

		foreach ( $video_urls as $video_url ) {

			if ( $screenshot = $this->fetch_screenshot( $video_url ) ) {

				$screenshots[ $video_url ] = $screenshot;
			}
		}

		return $screenshots;
	}


	/**
	 * @param string $video_url
	 *
	 * @return string
	 */
	public function fetch_screenshot( $video_url ) {

		if ( ! $video_id = $this->get_video_id( $video_url ) ) {
			return '';
		}

		foreach ( $this->urls_pattern as $url_pattern ) {

			$screenshot_url = str_replace( '{VIDEO_ID}', $video_id, $url_pattern );

			if ( Publisher_Fetch_Screenshot_util::remote_file_exists( $screenshot_url ) ) {

				return $screenshot_url;
			}
		}

		return '';

	}


	/**
	 * @param string $video_url
	 *
	 * @return string
	 */
	public function get_video_id( $video_url ) {

		$parsed_url = parse_url( $video_url );

		if ( ! $parsed_url['query'] ) {

			return '';
		}

		parse_str( $parsed_url['query'], $q );

		return isset( $q['v'] ) ? $q['v'] : '';
	}
}
