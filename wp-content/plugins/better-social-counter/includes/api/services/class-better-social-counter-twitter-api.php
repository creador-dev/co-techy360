<?php


class Better_Social_Counter_Twitter_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'twitter';


	/**
	 * @var string
	 */
	public $access_token = 'AAAAAAAAAAAAAAAAAAAAAJBzagAAAAAAXr%2Fxj2UWtV%2BnQNigsUm%2Bjrlkr4o%3DoYt2AFQFvPpPsJ1wtVmJ3MLetbYnmTWLFzDZJWLnXZtRJRZKOQ';


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

			$request_args = array(
				'httpversion' => '1.1',
				'blocking'    => true,
				'headers'     => array(
					'Authorization'   => 'Bearer ' . $this->access_token,
					'Accept-Language' => 'en',
				)
			);

			$url = 'https://api.twitter.com/1.1/users/show.json?screen_name=' . $this->data->id();

			if ( $response = Better_Social_Counter_Utilities::request( $url, $request_args ) ) {

				$count = isset( $response['followers_count'] ) ? $response['followers_count'] : $count;
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

		return 'https://twitter.com/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}