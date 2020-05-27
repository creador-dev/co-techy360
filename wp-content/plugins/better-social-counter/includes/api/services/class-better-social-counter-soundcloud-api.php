<?php


class Better_Social_Counter_SoundCloud_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'soundcloud';


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

			$response = Better_Social_Counter_Utilities::request(
				"http://api.soundcloud.com/users/" . $this->data->id() . ".json?consumer_key=" . $this->data->get( 'api_key' ),
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en',
					),
				)
			);

			if ( ! $response ) {

				return $count;
			}

			if ( isset( $response['followers_count'] ) ) {

				$count = intval( $response['followers_count'] );
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

		return 'https://soundcloud.com/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}