<?php


class Better_Social_Counter_Vine_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'vine';


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

			if ( ! class_exists( 'BSC_Vine' ) ) {
				require_once Better_Social_Counter()->dir_path() . 'includes/libs/class-bsc-vine.php';
			}

			$vine   = new BSC_Vine( $this->data->get( 'email' ), $this->data->get( 'pass' ) );
			$result = $vine->me();

			if ( isset( $result['followerCount'] ) ) {

				$count = intval( $result['followerCount'] );
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

		if ( ! $id = $this->data->id() ) {
			return '';
		}

		return 'https://vine.co/' . $id;
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}