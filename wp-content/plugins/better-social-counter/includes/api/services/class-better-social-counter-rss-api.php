<?php


class Better_Social_Counter_RSS_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'rss';


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
	 * @return string
	 */
	public function count() {

		$count = 'RSS';

		if ( ! Better_Social_Counter::get_option( $this->service_id . '_show_counter' ) ) {
			return $count;
		}

		if ( Better_Social_Counter::get_option( $this->service_id . '_count' ) ) {
			$count = Better_Social_Counter::get_option( $this->service_id . '_count' );
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

		$type = $this->data->get( 'type' );

		if ( 'custom_link' === $type ) {

			return $this->data->get( 'link' );
		}

		if ( 'category' === $type ) {

			if ( $link = get_category_feed_link( $this->data->get( 'category' ) ) ) {

				return $link;
			}
		}

		return get_bloginfo( 'rss_url' );
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}