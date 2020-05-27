<?php


class Better_Social_Counter_Steam_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'steam';


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
			if ( ! class_exists( 'SimpleXmlElement' ) ) {

				return $count;
			}

			try {

				$prev = libxml_use_internal_errors( true );

				$data = Better_Social_Counter_Utilities::request(
					'http://steamcommunity.com/groups/' . $this->data->id() . '/memberslistxml',
					array(
						'sslverify' => false,
						'headers'   => array(
							'Accept-Language' => 'en',
						),
					),
					true
				);

				if ( empty( $data ) || is_array( $data ) ) {
					throw new Exception( 'invalid results' );
				}

				$data = @new SimpleXmlElement( $data );

				if ( isset( $data->groupDetails->memberCount ) ) {
					$count = intval( $data->groupDetails->memberCount );
				}

				libxml_use_internal_errors( $prev );
				libxml_clear_errors();

			} catch( Exception $e ) {

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

		return 'https://steamcommunity.com/groups/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}