<?php


class Better_Social_Counter_YouTube_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'youtube';


	/**
	 * @var string
	 */
	public $key = 'AIzaSyBAwpfyAadivJ6EimaAOLh-F1gBeuwyVoY';


	/**
	 * @var Better_Social_Counter_Data
	 */
	protected $data;


	/**
	 * @var string
	 */
	protected $type;


	/**
	 * Get input data
	 *
	 * @param Better_Social_Counter_Data $data
	 *
	 * @return bool
	 */
	public function init( $data ) {

		$this->data = $data;

		return true;
	}


	/**
	 *
	 * @param bool $force
	 *
	 * @return int
	 */
	public function count( $force = false ) {

		$count = false;

		if ( ! $force && ! Better_Social_Counter::get_option( $this->service_id . '_show_counter' ) ) {
			return $count;
		}

		if ( ! $force && Better_Social_Counter::get_option( $this->service_id . '_count' ) ) {
			$count = Better_Social_Counter::get_option( $this->service_id . '_count' );
		}

		if ( ! $count ) {
			$page_id = $this->data->id();

			if ( strlen( $page_id ) === 24 ) {

				$this->type = 'channel';

				if ( ! ( $results = $this->_get_youtube_channel_info( $page_id ) ) ) {

					$results    = $this->_get_youtube_account_info( $page_id );
					$this->type = 'user';
				}
			} else {

				$this->type = 'user';

				if ( ! ( $results = $this->_get_youtube_account_info( $page_id ) ) ) {

					$results    = $this->_get_youtube_channel_info( $page_id );
					$this->type = 'channel';
				}
			}

			if ( isset( $results['items'][0]['statistics']['subscriberCount'] ) ) {

				$count = intval( $results['items'][0]['statistics']['subscriberCount'] );
			}
		}

		return bf_human_number_format( $count );
	}


	protected function _get_youtube_account_info( $username ) {

		$cache = wp_cache_get( $username, __METHOD__ );

		if ( false !== $cache ) {

			return $cache;
		}

		$url = sprintf(
			"https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername=%s&key=%s",
			$username,
			$this->key
		);

		$results = Better_Social_Counter_Utilities::request( $url );

		if ( ! empty( $results['items'][0] ) ) {

			wp_cache_add( $username, $results, __METHOD__ );

			return $results;
		}

		return false;
	}


	protected function _get_youtube_channel_info( $channel_id ) {

		$cache = wp_cache_get( $channel_id, __METHOD__ );

		if ( false !== $cache ) {

			return $cache;
		}

		$url     = sprintf(
			"https://www.googleapis.com/youtube/v3/channels?part=statistics&id=%s&key=%s",
			$channel_id,
			$this->key
		);
		$results = Better_Social_Counter_Utilities::request( $url );

		if ( ! empty( $results['items'][0] ) ) {

			wp_cache_add( $channel_id, $results, __METHOD__ );

			return $results;
		}

		return false;
	}


	/**
	 * Get page link
	 *
	 * @return string
	 */
	public function link() {

		if ( empty( $this->type ) ) {
			$this->count( true );
		}

		if ( $this->type == 'channel' ) {

			return 'https://youtube.com/channel/' . $this->data->id();

		} elseif ( $this->type == 'user' ) {

			return 'https://youtube.com/user/' . $this->data->id();
		}

		return '';
	}


	public function use_cache( $format ) {

		return true;
	}
}