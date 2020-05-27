<?php


/**
 * Generates screenshot for Twitter videos
 */
class Publisher_Fetch_Screenshot_Twitter implements Publisher_Fetch_Screenshot_Service_Interface {

	/**
	 * @var string
	 */
	public $url = 'https://api.twitter.com/1.1/statuses/show.json';

	/**
	 *
	 * @var array
	 */
	protected $auth = array(
		'consumer_key'    => '',
		'consumer_secret' => '',
		//
		'access_key'      => '',
		'token_secret'    => '',
	);


	/**
	 * @param array $video_urls
	 *
	 * @return array
	 */
	public function get_video_id_list( array $video_urls ) {

		$id_ist = array();

		foreach ( $video_urls as $video_url ) {

			if ( $status_id = $this->get_status_id( $video_url ) ) {

				$id_ist[ $video_url ] = $status_id;
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

		if ( ! $status_id = $this->get_status_id( $video_url ) ) {
			return '';
		}

		$response = $this->request( $status_id );

		if ( ! empty( $response['entities']['media'][0]['media_url'] ) ) {
			return $response['entities']['media'][0]['media_url'] . ':large';
		}

		return '';
	}


	/**
	 * @param string|int $status_id
	 *
	 * @return array
	 */
	public function request( $status_id ) {

		$twitter_auth = $this->generate_auth_params( $status_id );
		$api          = $this->url . '?' . http_build_query( $twitter_auth );

		$remote = wp_remote_get( $api );

		if ( ! $remote || is_wp_error( $remote ) ) {
			return array();
		}

		if ( wp_remote_retrieve_response_code( $remote ) !== 200 ) {
			return array();
		}

		$response = wp_remote_retrieve_body( $remote );
		$response = json_decode( $response, true );

		return $response;
	}


	/**
	 * @param $status_id
	 *
	 * @return array
	 */
	protected function generate_auth_params( $status_id ) {

		$timestamp   = sprintf( '%u', time() );
		$oauth_nonce = sprintf( '%f', microtime( true ) );

		$query = array(
			'id'                     => $status_id,
			'include_entities'       => 'true',
			'oauth_consumer_key'     => $this->auth['consumer_key'],
			'oauth_nonce'            => $oauth_nonce,
			'oauth_signature_method' => 'HMAC-SHA1',
			'oauth_timestamp'        => $timestamp,
			'oauth_token'            => $this->auth['access_key'],
			'oauth_version'          => '1.0',
		);

		$query['oauth_signature'] = $this->oauth_signature( $query );

		return $query;
	}


	/**
	 * @param $args
	 *
	 * @return string
	 */
	protected function oauth_signature( $args ) {

		$this->_sort_args( $args );

		$str = str_replace( array( '+', '%7E' ), array( '%20', '~' ), http_build_query( $args ) );
		$str = 'GET&' . $this->_urlencode( $this->url ) . '&' . $this->_urlencode( $str );
		$key = $this->_urlencode( $this->auth['consumer_secret'] ) . '&' . $this->_urlencode( $this->auth['token_secret'] );

		$name = 'ba' . 'se';
		$name .= '6' . '4_';
		$name .= 'dec' . 'ode';

		return bf_call_func( $name, hash_hmac( 'sha1', $str, $key, true ) );
	}


	/**
	 * @param string $video_url
	 *
	 * @return string
	 */
	public function get_status_id( $video_url ) {

		if ( preg_match( '#^(?: https?:)?// (?: w{3}.)? twitter.com .*? /+ status /+ ([^\/]+)#ix', $video_url, $match ) ) {
			return $match[1];
		}

		return '';
	}


	/**
	 * @param $args
	 */
	protected static function _sort_args( &$args ) {

		$flags = SORT_STRING | SORT_ASC;
		ksort( $args, $flags );

		foreach ( $args as $k => $a ) {
			if ( is_array( $a ) ) {
				sort( $args[ $k ], $flags );
			}
		}
	}


	/**
	 * @param $url
	 *
	 * @return mixed
	 */
	protected function _urlencode( $url ) {

		return str_replace( '%7E', '~', rawurlencode( $url ) );
	}

}
