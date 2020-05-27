<?php

/**
 * BetterStudio Youtube playlist service
 */
class BS_YouTube_PlayList_Service implements BS_PlayList_Service_Interface {


	/**
	 * Fetch Videos Info From Google API
	 *
	 * @param array $videos
	 *
	 * @return array|bool array on success or false on failure.
	 */
	public function get_videos_info( $videos ) {

		$results            = array();
		$videos_per_request = 50;


		foreach ( array_chunk( $videos, $videos_per_request ) as $_videos ) {

			$videos_id = implode( ',', $_videos );
			$url       = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videos_id . '&part=id,snippet,contentDetails&key=' . bsp_get_google_api_key();
			$data      = BS_PlayList::fetch_json_data( $url );

			if ( is_object( $data ) && ! empty( $data->items ) ) {
				foreach ( $data->items as $item ) {
					$idx = &$item->id;

					$results[ $idx ] = array(
						'title'      => $item->snippet->title,
						//			'description' => $item->snippet->description,
						'thumbnails' => $item->snippet->thumbnails,
						//			'video_id'   => $item->id,
						'duration'   => $item->contentDetails->duration,
					);
				}

			}
		}

		return $results ? $results : FALSE;
	}


	/**
	 * Get YouTube PlayList Snippet Info
	 *
	 * @param string $play_list_id
	 *
	 * @return array|bool array on success or false on failure.
	 */
	public function get_playlist_info( $play_list_id ) {

		$url = 'https://www.googleapis.com/youtube/v3/playlists?part=snippet&id=' . $play_list_id . '&key=' . bsp_get_google_api_key();

		$data = BS_PlayList::fetch_json_data( $url );

		if ( is_object( $data ) && ! empty( $data->items ) ) {

			return $data->items[0]->snippet;;
		}

		return FALSE;
	}


	/**
	 * Filters attribute
	 *
	 * @param $atts
	 *
	 * @return mixed
	 */
	public function filter_atts( $atts ) {

		if ( ! empty( $atts['videos'] ) ) {
			$videos = &$atts['videos'];
			$videos = explode( "\n", $videos );
			$videos = array_map( array( $this, 'get_video_ID' ), $videos );
		}

		if ( ! empty( $atts['playlist_url'] ) ) {
			$atts['playlist_url'] = $this->bs_get_playlist_ID( $atts['playlist_url'] );
		}

		return $atts;
	}


	/**
	 * get video ID from URL
	 *
	 * @param $youtube_url
	 *
	 * @return string
	 */
	protected function get_video_ID( $youtube_url ) {

		$youtube_url = str_replace( '&amp;', '&', $youtube_url );
		if ( preg_match( '#^(?: https? \: )? (?: //)? w* \.? youtube \.com [^\?]+ \? (.+)$#ix', $youtube_url, $matched ) ) {
			parse_str( $matched[1], $q );
			if ( ! empty( $q['v'] ) ) {
				return $q['v'];
			}
		} else {
			$video_ID = &$youtube_url;

			return $video_ID;
		}
	}


	/**
	 * Get playlist ID from URL
	 *
	 * @param $youtube_url
	 *
	 * @return string
	 */
	protected function bs_get_playlist_ID( $youtube_url ) {

		$youtube_url = str_replace( '&amp;', '&', $youtube_url );
		if ( preg_match( '#^(?: https? \: )? (?: //)? w* \.? youtube \.com [^\?]+ \? (.+)$#ix', $youtube_url, $matched ) ) {
			parse_str( $matched[1], $q );
			if ( ! empty( $q['list'] ) ) {
				return $q['list'];
			}
		}
	}


	/**
	 * @param     $play_list_id
	 *
	 * @param int $limit
	 *
	 * @return array|bool
	 */
	public function get_playlist_videos_info( $play_list_id, $limit = 50 ) {

		$q_limit = min( 50, $limit ); // valid range is [0 50]

		$url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=' . $q_limit . '&playlistId=' . $play_list_id . '&key=' . bsp_get_google_api_key();

		$data = BS_PlayList::fetch_json_data( $url );

		if ( empty( $data->items ) || ! is_array( $data->items ) ) {
			return FALSE;
		}


		$fetced_items    = 0;
		$playlist_videos = array();
		do {
			$page_token = isset( $data->nextPageToken ) ? $data->nextPageToken : FALSE;
			foreach ( $data->items as $item ) {
				$playlist_videos[] = $item->snippet->resourceId->videoId;
				$fetced_items ++;
			}

		} while ( $fetced_items < $limit && $page_token && ( $data = BS_PlayList::fetch_json_data( $url . '&pageToken=' . $page_token ) ) );

		return $this->get_videos_info( $playlist_videos );
	}


	/**
	 * Returns frame URL
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function default_frame_url( $atts ) {
		return 'https://www.youtube.com/embed/{video-id}?autoplay=0';
	}


	/**
	 * Returns video frame url
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function change_video_frame_url( $atts ) {
		return 'https://www.youtube.com/embed/{video-id}?autoplay=1';
	}

} // BS_YouTube_PlayList_Service
