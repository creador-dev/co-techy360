<?php

/**
 * Vimeo source service provider
 */
class BS_Vimeo_PlayList_Service implements BS_PlayList_Service_Interface {

	/**
	 * Better Studio Vimeo Client Identifier
	 *
	 * @access private
	 *
	 * @var string
	 */
	private $client_id = '4916188d503be79ff8ef330483bc211ebd8d7337';


	/**
	 * Better Studio Vimeo Client Secrets
	 *
	 * @access private
	 *
	 * @var string
	 */
	private $client_secret = 'hdSrrgpA8kQVfwfH++RTBd5YOOHpPoCXjNeDAkrudCoE6imrZTz7rKzloMrlrDb8gGotGfeU2pWNVFahizvgqt5qhoCcqeRCza62ypZ0nj/7K5B8UvIeUsDIpEx+MMcD';


	/**
	 * Fetch Videos Info From Google API
	 *
	 * @param array $videos
	 *
	 * @return array none empty array on success.
	 */
	public function get_videos_info( $videos ) {

		$results = array();
		foreach ( $videos as $video_id ) {

			$results[ $video_id ] = $this->get_video_info( $video_id );
		}

		return $results;
	}


	/**
	 * Gets video info with old API
	 *
	 * @param $video_id
	 *
	 * @deprecated
	 *
	 * @return array|bool
	 */
	function get_video_info_old_api( $video_id ) {

		$raw_response = wp_remote_get( 'http://vimeo.com/api/v2/video/' . $video_id . '.php' );

		if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) ) {
			return FALSE;
		}
		$data    = maybe_unserialize( wp_remote_retrieve_body( $raw_response ) );
		$results = array();

		if ( $data && is_array( $data ) ) {

			foreach ( $data as $item ) {
				if ( empty( $item['id'] ) ) {
					continue;
				}
				$id = (string) $item['id'];

				$results[ $id ] = array(

					'title' => $item['title'],
					//				'description' => $item['description'],

					'thumbnails' => bs_get_vimeo_video_thumbnails( $item ),
					'duration'   => $item['duration']
				);
			}
		}

		return $results;
	}


	/**
	 * Fetch remote data
	 *
	 * @param $url
	 *
	 * @return array|bool|object
	 */
	private function fetch_remote( $url ) {
		return BS_PlayList::fetch_json_data( $url, array(
			'headers' => $this->remote_header()
		) );
	}


	/**
	 * Vimeo Authentication Header
	 *
	 * @return array
	 */
	private function remote_header() {
		return array(
			'Authorization' => 'Basic ' . base64_encode( $this->client_id . ':' . $this->client_secret ),
			'mime-type'     => 'application/json',
			'Accept'        => 'application/vnd.vimeo.*+json; version=3.2',
		);
	}


	/**
	 * Get Single Video Info
	 *
	 * @param string|int $video_id vimeo video ID
	 *
	 * @return array|bool array on success otherwise false.
	 */
	function get_video_info( $video_id ) {
		$data = $this->fetch_remote( 'https://api.vimeo.com/videos/' . $video_id );

		if ( $data && is_object( $data ) ) {

			return array(
				'title'      => $data->name,
				//			    'description' => $data->description,
				'thumbnails' => $this->prepare_thumbnails( $data->pictures->sizes ),
				'duration'   => (int) $data->duration
			);
		}
	}


	/**
	 * Creates video thumbnail from response
	 *
	 * @param $video_response
	 *
	 * @return bool|\stdClass
	 */
	function get_video_thumbnails( $video_response ) {
		if ( ! is_array( $video_response ) ) {
			return FALSE;
		}
		$result = new stdClass();

		foreach (
			//array('vimeo-index' => response property
			array(
				'thumbnail_small'  => 'default',
				'thumbnail_medium' => 'medium',
				'thumbnail_large'  => 'high',
			)
			as $index => $prop
		) {
			if ( ! isset( $video_response[ $index ] ) ) {
				continue;
			}

			$thumb  = &$video_response[ $index ];
			$width  = 0;
			$height = 0;

			if ( preg_match( '#(\d+)(?:x(\d+))?\.(?:jpe?g|gif|png)$#i', $thumb, $match ) ) {
				$width = $match[1];
				if ( isset( $match[2] ) ) {
					$height = $match[2];
				}
			}


			$result->$prop = (object) array(
				'url'    => $thumb,
				'width'  => $width,
				'height' => $height,
			);

		}

		return $result;
	}


	/**
	 * Get Vimeo PlayList Snippet Info
	 *
	 * @param string $play_list_id
	 *
	 * @return array|bool array on success or false on failure.
	 */
	public function get_playlist_info( $play_list_id ) {
		return $this->get_album_info( $play_list_id );
	}


	/**
	 * Fetches album info from Vimeo
	 *
	 * @param $album_id
	 *
	 * @return bool|object
	 */
	public function get_album_info( $album_id ) {

		$url  = 'https://api.vimeo.com/albums/' . $album_id;
		$data = $this->fetch_remote( $url );

		if ( $data && is_object( $data ) ) {

			return (object) array(
				'title'       => $data->name,
				'description' => $data->description,
				'username'    => $data->user->name,
			);
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
			$atts['playlist_url'] = $this->get_album_ID( $atts['playlist_url'] );
		}

		return $atts;
	}


	/**
	 * Returns video id from URL
	 *
	 * @param $vimeo_url
	 *
	 * @return mixed
	 */
	protected function get_video_ID( $vimeo_url ) {

		$vimeo_url = trim( str_replace( '&amp;', '&', $vimeo_url ) );

		if ( preg_match( '#^(?: https? \: )? (?: //)? w* \.? vimeo \.com /* ([^\s]+)$#ix', $vimeo_url, $matched ) ) {

			return $matched[1];
		} else {
			$video_ID = &$vimeo_url;

			return $video_ID;
		}
	}


	/**
	 * Returns album ID from URL
	 *
	 * @param $vimeo_album_url
	 *
	 * @return mixed
	 */
	protected function get_album_ID( $vimeo_album_url ) {

		if ( preg_match( '#^(?: https? \: )? (?: //)? w* \.? vimeo \.com /*album/* ([^\s]+)$#ix', $vimeo_album_url, $matched ) ) {

			return $matched[1];
		}

		return $vimeo_album_url;
	}


	/**
	 * Returns playlist/album info
	 *
	 * @param     $play_list_id
	 *
	 * @param int $limit
	 *
	 * @return array|bool
	 */
	public function get_playlist_videos_info( $play_list_id, $limit = 50 ) {

		return $this->get_album_videos_info( $play_list_id, $limit );
	}


	/**
	 * Fetches album info from Vimeo
	 *
	 * @param $album_id
	 *
	 * @return array|bool
	 */
	public function get_album_videos_info( $album_id ) {

		if ( empty( $album_id ) ) {
			return FALSE;
		}
		$url  = 'https://api.vimeo.com/albums/' . $album_id . '/videos';
		$data = $this->fetch_remote( $url );

		if ( $data && isset( $data->data ) && is_array( $data->data ) ) {
			$videos_info = array();

			foreach ( $data->data as $video ) {
				$video_id = $this->get_video_ID( $video->link );

				$videos_info[ $video_id ] = array(
					'title'      => $video->name,
					//					'description' => $video->description,
					'thumbnails' => $this->prepare_thumbnails( $video->pictures->sizes ),
					'duration'   => (int) $video->duration,
				);
			}

			return $videos_info;
		}

		return FALSE;
	}


	/**
	 * Prepares thumbnails
	 *
	 * @param $sizes
	 *
	 * @return bool|\stdClass
	 */
	private function prepare_thumbnails( $sizes ) {

		if ( empty( $sizes ) || ! is_array( $sizes ) ) {
			return FALSE;
		}

		$sizes_name = array(
			0 => 'default',
			1 => 'small',
			2 => 'medium',
			3 => 'high',
			4 => 'xhigh',
			5 => 'standard',
			6 => 'large',
			7 => 'xlarge',
			8 => 'huge',
			9 => 'xhuge',
		);

		$result = new stdClass();
		usort( $sizes, array( $this, '_sort_by_width' ) );
		$max_resolution = array_pop( $sizes );

		$result->maxres = array(
			'url'    => $max_resolution->link,
			'width'  => $max_resolution->width,
			'height' => $max_resolution->height,
		);
		foreach ( $sizes as $index => $size ) {
			$sz_index = floor( $size->width / 100 ) - 1;

			if ( isset( $sizes_name[ $sz_index ] ) ) {
				$sz_name = &$sizes_name[ $sz_index ];

				$result->$sz_name = array(
					'url'    => $size->link,
					'width'  => $size->width,
					'height' => $size->height,
				);
			}
		}

		return $result;
	}


	/**
	 * Handy function for usort
	 *
	 * @param $a
	 * @param $b
	 *
	 * @return bool
	 */
	private function _sort_by_width( $a, $b ) {
		return $a->width > $b->width;
	}


	/**
	 * Handy function for default frame url
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function default_frame_url( $atts ) {
		return 'https://player.vimeo.com/video/{video-id}?autoplay=0';
	}


	/**
	 * Handy function for video frame URL
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function change_video_frame_url( $atts ) {

		return 'https://player.vimeo.com/video/{video-id}?autoplay=1';
	}

}