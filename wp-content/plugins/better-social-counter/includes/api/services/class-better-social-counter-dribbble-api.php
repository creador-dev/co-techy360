<?php


class Better_Social_Counter_Dribbble_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'dribbble';


	/**
	 * @var string
	 */
	public $token = 'b290669f9190657eea521b46fbe0d615811b98263afc673cf58161d061b5076a';

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

			$url = sprintf(
				'http://api.dribbble.com/v1/users/%s?access_token=%s',
				$this->data->id(),
				$this->token
			);

			$response = Better_Social_Counter_Utilities::request(
				$url,
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en'
					),
				)
			);

			if ( ! $response ) {

				return $count;
			}

			$count = isset( $response['followers_count'] ) ? $response['followers_count'] : $count;
		}

		return bf_human_number_format( $count );
	}


	/**
	 * @return string
	 */
	public function link() {

		return 'https://dribbble.com/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}