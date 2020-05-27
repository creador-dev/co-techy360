<?php


class Better_Social_Counter_Google_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'google';


	/**
	 * @var string
	 */
	public $key = 'AIzaSyBAwpfyAadivJ6EimaAOLh-F1gBeuwyVoY';

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

			$username = $this->data->id();

			if ( ! preg_match( '/^(\d{20,22})$/', $username ) ) {
				$username = "+$username";
			}

			$url = sprintf(
				'https://www.googleapis.com/plus/v1/people/%s?key=%s',
				$username,
				$this->key
			);

			if ( ! $response = Better_Social_Counter_Utilities::request( $url ) ) {

				return $count;
			}

			$count = isset( $response['circledByCount'] ) ? $response['circledByCount'] : $count;
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

		$id = $this->data->id();

		if ( ! is_numeric( $id[0] ) && ltrim( $id[0], '+' ) ) {
			$id = '+' . $id;
		}

		return 'https://plus.google.com/' . $id;
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}