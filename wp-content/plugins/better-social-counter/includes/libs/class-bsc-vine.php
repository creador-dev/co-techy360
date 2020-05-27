<?php


/**
 * Vine API wrapper in PHP
 *
 * @author       Peter A. Tariche
 * @copyright    2012 Peter A. Tariche <ptariche@gmail.com>
 * @license      http://www.opensource.org/licenses/mit-license.php MIT
 * @link         http://github.com/ptariche/VinePHP
 * @category     Services
 * @package      Vine
 * @version      0.0.5
 * @todos        Search by Tags, Get Post on Post ID
 */
Class BSC_Vine {

	private static $username;

	private static $password;

	private $_baseURL = 'https://api.vineapp.com';


	public function __construct() {

		if ( func_get_args( 0 ) ) {
			self::$username = func_get_arg( 0 );
		}

		if ( func_get_arg( 1 ) ) {
			self::$password = func_get_arg( 1 );
		}
	}


	private function _getCurl( $params = array() ) {

		$url = $params["url"];
		$key = $params["key"];

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_USERAGENT, "com.vine.iphone/1.0.3 (unknown, iPhone OS 6.1.0, iPhone, Scale/2.000000)" );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'vine-session-id: ' . $key ) );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		$result = curl_exec( $ch );
		curl_close( $ch );
		if ( ! $result ) {
			echo curl_error( $ch );
		}

		return $result;

	}


	private function _postCurl( $params = array() ) {

		$url        = $params["url"];
		$postFields = $params["postFields"];

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields );
		curl_setopt( $ch, CURLOPT_USERAGENT, "com.vine.iphone/1.0.3 (unknown, iPhone OS 6.1.0, iPhone, Scale/2.000000)" );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		$result = curl_exec( $ch );
		curl_close( $ch );
		if ( ! $result ) {
			echo curl_error( $ch );
		}

		return $result;
	}


	public function getKey() {

		$username   = urlencode( self::$username );
		$password   = urlencode( self::$password );
		$postFields = "username=$username&password=$password";
		$url        = $this->_baseURL . '/users/authenticate';
		$params     = array( "url" => $url, "postFields" => $postFields, );
		$result     = $this->_postCurl( $params );
		$json       = json_decode( $result, true );
		$key        = $json["data"]["key"];

		return $key;
	}


	public function meJSON() {

		$key                = $this->getKey();
		$userId             = strtok( $key, '-' );
		$url                = $this->_baseURL . '/users/me';
		$params             = array( "url" => $url, "key" => $key, );
		$result             = $this->_getCurl( $params );
		$result_pregReplace = preg_replace( '/:\s?(\d{14,})/', ': "${1}"', $result );
		$json               = json_decode( $result_pregReplace, true );

		return $json;
	}


	public function getYourLikesOnVineJSON() {

		$key                = $this->getKey();
		$userId             = strtok( $key, '-' );
		$url                = $this->_baseURL . '/timelines/users/' . $userId . '/likes';
		$params             = array( "url" => $url, "key" => $key, );
		$result             = $this->_getCurl( $params );
		$result_pregReplace = preg_replace( '/:\s?(\d{14,})/', ': "${1}"', $result );
		$json               = json_decode( $result_pregReplace, true );

		return $json;
	}


	public function getVinesbyTagJSON( $tag ) {

		$key    = $this->getKey();
		$url    = $this->_baseURL . '/timelines/tags/' . $tag;
		$params = array( "url" => $url, "key" => $key, );
		$result = $this->_getCurl( $params );
		$json   = json_decode( $result, true );

		return $json;
	}


	public function getVinePostJSON( $postId ) {

		$key    = $this->getKey();
		$url    = $this->_baseURL . '/timelines/posts/' . $postId;
		$params = array( "url" => $url, "key" => $key, );
		$result = $this->_getCurl( $params );
		$json   = json_decode( $result, true );

		return $json;
	}


	public function me() {

		$json              = $this->meJSON();
		$followerCount     = $json["data"]["followerCount"];
		$userId            = $json["data"]["userId"];
		$likeCount         = $json["data"]["likeCount"];
		$postCount         = $json["data"]["postCount"];
		$avatarUrl         = $json["data"]["avatarUrl"];
		$authoredPostCount = $json["data"]["authoredPostCount"];
		$phoneNumber       = $json["data"]["phoneNumber"];
		$location          = $json["data"]["location"];
		$email             = $json["data"]["email"];
		$username          = $json["data"]["username"];
		$description       = $json["data"]["description"];
		$followingCount    = $json["data"]["followingCount"];
		$facebookConnected = $json["data"]["facebookConnected"];
		$twitterConnected  = $json["data"]["twitterConnected"];
		$twitterId         = $json["data"]["twitterId"];

		$me = array(
			"userId"            => $userId,
			"username"          => $username,
			"email"             => $email,
			"phoneNumber"       => $phoneNumber,
			"location"          => $location,
			"description"       => $description,
			"avatarUrl"         => $avatarUrl,
			"twitterId"         => $twitterId,
			"followingCount"    => $followingCount,
			"followerCount"     => $followerCount,
			"authoredPostCount" => $authoredPostCount,
			"likeCount"         => $likeCount,
			"postCount"         => $postCount,
			"twitterConnected"  => $twitterConnected,
			"facebookConnected" => $facebookConnected,
		);

		return $me;
	}


	public function YourLikesOnVine() {

		$json              = $this->getYourLikesOnVineJSON();
		$postId            = $json["data"]["records"][0]["postId"];
		$foursquareVenueId = $json["data"]["records"][0]["foursquareVenueId"];
		$likes             = $json["data"]["records"][0]["likes"];
		$likesOnVine       = array();

		return $likesOnVine;
	}


	public function getRecentlyLikedVine() {

		$json        = $this->getYourLikesOnVineJSON();
		$description = $json["data"]["records"][0]["description"];
		$video_url   = $json["data"]["records"][0]["shareUrl"];
		$vinedata    = array( "video_url" => $video_url, "description" => $description, );

		return $vinedata;
	}

}


?>