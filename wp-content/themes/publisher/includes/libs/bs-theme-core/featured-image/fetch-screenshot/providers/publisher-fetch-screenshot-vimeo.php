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
 * Generates screenshot for Vimeo videos
 */
class Publisher_Fetch_Screenshot_Vimeo implements Publisher_Fetch_Screenshot_Service_Interface {


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

		$api    = 'http://vimeo.com/api/oembed.json?url=' . $video_url;
		$remote = wp_remote_get( $api );

		if ( ! $remote || is_wp_error( $remote ) ) {
			return '';
		}

		if ( wp_remote_retrieve_response_code( $remote ) !== 200 ) {
			return '';
		}

		$response = wp_remote_retrieve_body( $remote );
		$response = json_decode( $response, true );

		if ( ! empty( $response['thumbnail_url'] ) ) {
			return $response['thumbnail_url'];
		}

		return '';
	}


	/**
	 * @param string $video_url
	 *
	 * @return string
	 */
	public function get_video_id( $video_url ) {

		if ( preg_match( '#^(?: https?:)?// (?: w{3}.)? vimeo.com .*? /+ (\d+)#ix', $video_url, $match ) ) {
			return $match[1];
		}
		if ( preg_match( '#^(?: https?:)?// (?: w{3}.)? vimeo.com .*? /+ channels /+ [^\/]+ /+  (\d+) #ix', $video_url, $match ) ) {
			return $match[1];
		}

		return '';
	}

}
