<?php


class Better_Social_Counter_Instagram_API implements Better_Social_Counter_Service_Interface {


	/**
	 * @var string
	 */
	protected $service_id = 'instagram';


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

		if ( empty( $count ) ) {
			$url     = 'http://instagram.com/' . $this->data->id() . '#';
			$results = Better_Social_Counter_Utilities::request(
				$url,
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en',
					),
				),
				true
			);
			$pattern = "/followed_by\":[ ]*{\"count\":(.*?)}/";

			if ( is_string( $results ) && preg_match( $pattern, $results, $matches ) ) {

				$count = intval( $matches[1] );
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

		return 'https://instagram.com/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}