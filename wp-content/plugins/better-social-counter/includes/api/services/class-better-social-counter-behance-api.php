<?php


class Better_Social_Counter_Behance_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'behance';


	protected $key = 'INekEPLWGFlXlfmWjjOZD79vWNaD1Nxj';

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
				'https://www.behance.net/v2/users/%s?api_key=%s',
				$this->data->id(),
				$this->key
			);

			$results = Better_Social_Counter_Utilities::request(
				$url,
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en'
					),
				)
			);

			if ( isset( $results['user']['stats']['followers'] ) ) {

				return intval( $results['user']['stats']['followers'] );
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

		return 'https://www.behance.net/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}