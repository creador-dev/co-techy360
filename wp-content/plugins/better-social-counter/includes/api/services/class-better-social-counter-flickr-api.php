<?php


class Better_Social_Counter_Flickr_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'flickr';


	protected $key = '4cc99760f3e5550369b5c7e80b8c3b77';

	/**
	 * @var Better_Social_Counter_Data
	 */
	protected $data;


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
	 * @return int
	 */
	public function count() {

		$count = false;

		if ( ! Better_Social_Counter::get_option( $this->service_id . '_show_counter' ) ) {
			return $count;
		}

		if ( Better_Social_Counter::get_option( $this->service_id . '_count' ) ) {
			$count = Better_Social_Counter::get_option( $this->service_id . '_count' );
		}

		if ( ! $count ) {

			$group_id = $this->get_flickr_group_id(
				$this->data->id()
			);

			$url = sprintf(
				'https://api.flickr.com/services/rest/?method=flickr.groups.getInfo&api_key=%s&group_id=%s&format=json&nojsoncallback=1',
				$this->key,
				$group_id
			);

			$results = Better_Social_Counter_Utilities::request(
				$url,
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en',
					),
				)
			);

			if ( isset( $results['group']['members']['_content'] ) ) {

				$count = intval( $results['group']['members']['_content'] );
			}
		}

		return bf_human_number_format( $count );
	}


	/**
	 * @param string $group_slug
	 *
	 * @return string
	 */
	protected function get_flickr_group_id( $group_slug ) {

		$url      = 'https://www.flickr.com/groups/' . $group_slug;
		$response = Better_Social_Counter_Utilities::request( $url, array( 'sslverify' => false ), true );

		if ( ! $response ) {
			return '';
		}

		$dom = Better_Social_Counter_Utilities::dom( $response );

		if ( ! $dom ) {
			return '';
		}

		$style_attr = $dom->find( '.coverphoto-content .avatar', 0 )->style;

		if ( ! $style_attr || ! preg_match( '#url\s*\(.+/(.*?)\.(?:jpg|png)([^\)]+)#', $style_attr, $matched ) ) {

			return '';
		}

		if ( ! empty( $matched[2] ) && $matched[2][0] === '#' && strstr( $matched[2], '@' ) ) {

			$flickr_id = substr( $matched[2], 1 );

		} else {

			$flickr_id = $matched[1];
		}

		return $this->sanitize_flickr_id( $flickr_id );
	}


	/**
	 * @param string $flickr_id
	 *
	 * @return string
	 */
	protected function sanitize_flickr_id( $flickr_id ) {

		if ( preg_match( '/^(.*?\C+\d+)/i', $flickr_id, $matched ) ) {
			return $matched[1];
		}

		return '';
	}


	/**
	 * Get page link
	 *
	 *
	 * @return string
	 */
	public function link() {

		return 'https://www.flickr.com/groups/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}