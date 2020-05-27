<?php


class Better_Social_Counter_Facebook_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'facebook';


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
	 * @return bool|int
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

			$remote = wp_remote_get( $this->link(), array(
				'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36',
				'headers'    => array(
					'Accept-Language' => 'en',
				),
			) );

			$content = wp_remote_retrieve_body( $remote );

			preg_match( "'.*?id\s*=\s*
				([\"\'])?
				PagesLikesCountDOMID\\1
				.*?\>  \s*   \<\s*span.*?\>
				\s* ([0-9\,\.]+)
				'isx", $content, $match );

			if ( ! empty( $match[2] ) ) {
				$count = intval( str_replace( array( ',', '.' ), '', $match[2] ) );
			}
		}

		return bf_human_number_format( $count );
	}


	/**
	 * Get page link
	 *
	 *
	 * @return string
	 */
	public function link() {

		return 'https://www.facebook.com/' . $this->sanitize_username( $this->data->id() );
	}


	/**
	 * @param string $username
	 *
	 * @return string
	 */
	public function sanitize_username( $username ) {

		return preg_replace( '/[^a-zA-Z0-9_\-\.]/', '', $username );
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}
