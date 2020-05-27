<?php


class Better_Social_Counter_Envato_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'envato';


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
			$results = Better_Social_Counter_Utilities::request(
				"http://marketplace.envato.com/api/edge/user:{$this->data->id()}.json",
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en',
					),
				)
			);

			if ( isset( $results['user']['followers'] ) ) {

				$count = intval( $results['user']['followers'] );
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

		if ( strtolower( $this->data->id() ) == 'better-studio' ) {
			return 'http://betterstudio.com'; // replace our TF link buy our site!
		}

		return 'https://' . $this->data->get( 'marketplace' ) . '.net/user/' . $this->data->id() . '?ref=Better-Studio';
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}