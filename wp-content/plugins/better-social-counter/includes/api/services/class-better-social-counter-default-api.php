<?php


class Better_Social_Counter_Default_API implements Better_Social_Counter_Service_Interface {

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

		return '';
	}


	/**
	 * Get page link
	 *
	 *
	 * @return string
	 */
	public function link() {

		if ( $link = $this->data->link() ) {

			return $link;
		}

		return $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}