<?php


/**
 * PHP wrapper for the Instagram API.
 *
 * @author   Ali Aghdam <ali@betterstudio.com>
 * @license  MIT License
 * @version  1.1
 */
class Publisher_Instagram_Scraper_Client_v1 {

	/**
	 * Scraps Instagram site for getting user shots without any app registration
	 *
	 * based on https://gist.github.com/cosmocatalano/4544576
	 * but improved to cover instagram limit on first page
	 *
	 * output[]
	 *      [
	 *          'id',
	 *          'description',
	 *          'link'',
	 *          'time',
	 *          'comments',
	 *          'likes',
	 *          'type',
	 *          'images'[]
	 *              [
	 *                  'thumbnail',
	 *                  'small',
	 *                  'large',
	 *                  'original',
	 *              ],
	 *      ]
	 *
	 *
	 *
	 * @param        $username
	 * @param int    $count
	 * @param string $max_id
	 *
	 * @return mixed|\WP_Error
	 */
	function scrape_user( $username, $count = 12, $max_id = '' ) {

		$remote_response = wp_remote_get( $this->get_remote_url( $username, $max_id ) );

		if ( is_wp_error( $remote_response ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'publisher' ) );
		}

		if ( 200 != wp_remote_retrieve_response_code( $remote_response ) ) {
			return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'publisher' ) );
		}

		$shards      = explode( 'window._sharedData = ', $remote_response['body'] );
		$insta_json  = explode( ';</script>', $shards[1] );
		$insta_array = json_decode( $insta_json[0], true );

		if ( ! $insta_array ) {
			return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'publisher' ) );
		}

		if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
			$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
		} elseif ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
			$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
		} else {
			return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'publisher' ) );
		}

		if ( ! is_array( $images ) ) {
			return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'publisher' ) );
		}

		// todo collect user data here

		$images_list = array();
		$counter     = 0;
		$width       = array(
			'150' => 'thumbnail',
			'320' => 'small',
		);

		foreach ( $images as $image ) {

			if ( isset( $image['node'] ) ) {
				$image = $image['node'];
			}

			//
			// Use "thumbnail_resources" to extract more image sizes
			//
			if ( isset( $image['thumbnail_resources'] ) && is_array( $image['thumbnail_resources'] ) ) {
				foreach ( $image['thumbnail_resources'] as $img ) {
					if ( isset( $img['config_width'] ) && isset( $width[ $img['config_width'] ] ) ) {
						$image[ $width[ $img['config_width'] ] ] = $img['src'];
					}
				}
			}

			$id            = isset( $image['id'] ) ? $image['id'] : '';
			$code          = isset( $image['code'] ) ? $image['code'] : isset( $image['shortcode'] ) ? $image['shortcode'] : '';
			$time          = isset( $image['date'] ) ? $image['date'] : isset( $image['taken_at_timestamp'] ) ? $image['taken_at_timestamp'] : '';
			$comments      = isset( $image['comments']['count'] ) ? $image['comments']['count'] : isset( $image['edge_media_to_comment']['count'] ) ? $image['edge_media_to_comment']['count'] : '';
			$likes         = isset( $image['likes']['count'] ) ? $image['likes']['count'] : isset( $image['edge_media_preview_like']['count'] ) ? $image['edge_media_preview_like']['count'] : '';
			$thumbnail_url = isset( $image['thumbnail_src'] ) ? $image['thumbnail_src'] : isset( $image['display_url'] ) ? $image['display_url'] : '';

			//
			// Use old methods to detect image size
			// Not works for all images
			//
			if ( ! isset( $image['thumbnail'] ) ) {
				// handle both types of CDN url
				if ( ( strpos( $thumbnail_url, 's640x640' ) !== false ) ) {
					$image['thumbnail'] = str_replace( 's640x640', 's160x160', $thumbnail_url );
					$image['small']     = str_replace( 's640x640', 's320x320', $thumbnail_url );
				} else {
					$urlparts  = $this->parse_url( $thumbnail_url );
					$pathparts = explode( '/', $urlparts['path'] );
					array_splice( $pathparts, 3, 0, array( 's160x160' ) );
					$image['thumbnail'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
					$pathparts[3]       = 's320x320';
					$image['small']     = '//' . $urlparts['host'] . implode( '/', $pathparts );
				}
			}


			$images_list[] = array(
				'id'          => $id,
				'description' => ! empty( $image['caption'] ) ? $image['caption'] : '',
				'link'        => trailingslashit( '//instagram.com/p/' . $code ),
				'time'        => $time,
				'comments'    => $comments,
				'likes'       => $likes,
				'type'        => $image['is_video'] == true ? 'video' : 'image',
				'images'      => array(
					'thumbnail' => $image['thumbnail'],
					'small'     => $image['small'],
					'large'     => $thumbnail_url,
					'original'  => $thumbnail_url,
				),
			);

			$counter ++;

			// don't return more than requested
			if ( $counter >= $count ) {
				break;
			}

		}

		if ( ( $count - $counter ) > 0 && $counter == 12 && bf_count( $images_list ) > 0 ) {

			$last_item        = end( $images_list );
			$paginated_images = $this->scrape_user( $username, $count - $counter, $last_item['id'] );

			if ( ! is_wp_error( $paginated_images ) ) {
				$images_list = array_merge( $images_list, $paginated_images );
			}

		}

		return $images_list;

	} // scrape_user


	/**
	 * Creates remote url for page that should eb scraped
	 *
	 * @param string $username
	 * @param string $max_id
	 *
	 * @return string
	 */
	function get_remote_url( $username = '', $max_id = '' ) {

		$username = trim( str_replace( '@', '', strtolower( $username ) ) );

		if ( ! empty( $max_id ) ) {
			return 'https://www.instagram.com/' . $username . '?max_id=' . $max_id;
		} else {
			return 'https://www.instagram.com/' . $username;
		}

	}


	/**
	 * A wrapper for PHP parse_url() function that handles edgecases in < PHP 5.4.7
	 *
	 * copy of this: https://developer.wordpress.org/reference/functions/wp_parse_url/
	 *
	 * @param $url
	 *
	 * @return mixed
	 */
	function parse_url( $url ) {

		$parts = @parse_url( $url );
		if ( ! $parts ) {
			// < PHP 5.4.7 compat, trouble with relative paths including a scheme break in the path
			if ( '/' == $url[0] && false !== strpos( $url, '://' ) ) {
				// Since we know it's a relative path, prefix with a scheme/host placeholder and try again
				if ( ! $parts = @parse_url( 'placeholder://placeholder' . $url ) ) {
					return $parts;
				}
				// Remove the placeholder values
				unset( $parts['scheme'], $parts['host'] );
			} else {
				return $parts;
			}
		}

		// < PHP 5.4.7 compat, doesn't detect schemeless URL's host field
		if ( '//' == substr( $url, 0, 2 ) && ! isset( $parts['host'] ) ) {
			$path_parts    = explode( '/', substr( $parts['path'], 2 ), 2 );
			$parts['host'] = $path_parts[0];
			if ( isset( $path_parts[1] ) ) {
				$parts['path'] = '/' . $path_parts[1];
			} else {
				unset( $parts['path'] );
			}
		}

		return $parts;
	} // parse_url

} // Publisher_Instagram_Scraper_Client_v1


/**
 * Class Publisher_Instagram_Client_v1
 */
class Publisher_Instagram_Client_v1 {

	/**
	 * The API base URL.
	 */
	const API_URL = 'https://api.instagram.com/v1/';

	/**
	 * The Instagram API Key.
	 *
	 * @var string
	 */
	private $_access_token;


	/**
	 * Default constructor.
	 *
	 * @param array|string $config Instagram configuration data
	 *
	 * @throws \Exception
	 */
	public function __construct( $access_token ) {

		if ( is_string( $access_token ) ) {
			// if you only want to access public data
			$this->setAccessToken( $access_token );
		} else {
			throw new Exception( 'Error: __construct() - Access token is missing.' );
		}
	}


	/**
	 * Search for a user.
	 *
	 * @param string $name  Instagram username
	 * @param int    $limit Limit of returned results
	 *
	 * @return mixed
	 */
	public function searchUser( $name, $limit = 0 ) {

		$params = array();

		$params['q'] = $name;

		if ( $limit > 0 ) {
			$params['count'] = $limit;
		}

		return $this->_makeCall( 'users/search', $params );
	}


	/**
	 * Get user info.
	 *
	 * @param int $id Instagram user ID
	 *
	 * @return mixed
	 */
	public function getUser( $id = 0 ) {

		if ( $id === 0 ) {
			$id = 'self';
		}

		return $this->_makeCall( 'users/' . $id );
	}


	/**
	 * Get user activity feed.
	 *
	 * @param int $limit Limit of returned results
	 *
	 * @return mixed
	 */
	public function getUserFeed( $limit = 0 ) {

		$params = array();
		if ( $limit > 0 ) {
			$params['count'] = $limit;
		}

		return $this->_makeCall( 'users/self/feed', $params );
	}


	/**
	 * Get user recent media.
	 *
	 * @param int|string $id    Instagram user ID
	 * @param int        $limit Limit of returned results
	 *
	 * @return mixed
	 */
	public function getUserMedia( $id = '', $limit = 0 ) {

		$params = array();

		if ( empty( $id ) ) {
			$id = 'self';
		}

		if ( $limit > 0 ) {
			$params['count'] = $limit;
		}

		return $this->_makeCall( 'users/' . $id . '/media/recent', $params );
	}


	/**
	 * Pagination feature.
	 *
	 * @param object $obj   Instagram object returned by a method
	 * @param int    $limit Limit of returned results
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function pagination( $obj, $limit = 0 ) {

		if ( is_object( $obj ) && ! is_null( $obj->pagination ) ) {
			if ( ! isset( $obj->pagination->next_url ) ) {
				return;
			}
			$apiCall = explode( '?', $obj->pagination->next_url );
			if ( bf_count( $apiCall ) < 2 ) {
				return;
			}
			$function = str_replace( self::API_URL, '', $apiCall[0] );
			$auth     = ( strpos( $apiCall[1], 'access_token' ) !== false );
			if ( isset( $obj->pagination->next_max_id ) ) {
				return $this->_makeCall( $function, $auth, array(
					'max_id' => $obj->pagination->next_max_id,
					'count'  => $limit
				) );
			}

			return $this->_makeCall( $function, array( 'cursor' => $obj->pagination->next_cursor, 'count' => $limit ) );
		}

		throw new Exception( "Error: pagination() | This method doesn't support pagination." );
	}


	/**
	 * The call operator.
	 *
	 * @param string $function API resource path
	 * @param bool   $auth     Whether the function requires an access token
	 * @param array  $params   Additional request parameters
	 * @param string $method   Request type GET|POST
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	protected function _makeCall( $function, $params = NULL, $method = 'GET' ) {

		$authMethod = '?access_token=' . $this->getAccessToken();

		$paramString = NULL;
		if ( isset( $params ) && is_array( $params ) ) {
			$paramString = '&' . http_build_query( $params );
		}

		$apiCall = self::API_URL . $function . $authMethod . ( ( 'GET' === $method ) ? $paramString : NULL );

		$headerData = array( 'Accept: application/json' );

		$ch = bf_init_curl();
		curl_setopt( $ch, CURLOPT_URL, $apiCall );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headerData );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 90 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_HEADER, true );
		$jsonData = bf_exec_curl( $ch );
		// split header from JSON data
		// and assign each to a variable
		list( $headerContent, $jsonData ) = explode( "\r\n\r\n", $jsonData, 2 );
		// convert header content into an array
		$headers = $this->processHeaders( $headerContent );
		if ( ! $jsonData ) {
			throw new Exception( 'Error: _makeCall() - cURL error: ' . curl_error( $ch ) );
		}
		curl_close( $ch );

		return json_decode( $jsonData );
	}


	/**
	 * Read and process response header content.
	 *
	 * @param array
	 *
	 * @return array
	 */
	private function processHeaders( $headerContent ) {

		$headers = array();
		foreach ( explode( "\r\n", $headerContent ) as $i => $line ) {
			if ( $i === 0 ) {
				$headers['http_code'] = $line;
				continue;
			}
			list( $key, $value ) = explode( ':', $line );
			$headers[ $key ] = $value;
		}

		return $headers;
	}


	/**
	 * Access Token Setter.
	 *
	 * @param object|string $data
	 *
	 * @return void
	 */
	public function setAccessToken( $data ) {

		$token               = is_object( $data ) ? $data->access_token : $data;
		$this->_access_token = $token;
	}


	/**
	 * Access Token Getter.
	 *
	 * @return string
	 */
	public function getAccessToken() {

		return $this->_access_token;
	}

}
