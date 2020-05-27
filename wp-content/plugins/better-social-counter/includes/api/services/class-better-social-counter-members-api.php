<?php


class Better_Social_Counter_Members_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'members';


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

		if ( ! Better_Social_Counter::get_option( $this->service_id . '_enabled' ) ) {
			return $count;
		}

		if ( Better_Social_Counter::get_option( $this->service_id . '_count' ) ) {
			$count = Better_Social_Counter::get_option( $this->service_id . '_count' );
		}

		if ( ! $count ) {
			$members_count = count_users();

			$count = $members_count['total_users'];
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

		return '';
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}