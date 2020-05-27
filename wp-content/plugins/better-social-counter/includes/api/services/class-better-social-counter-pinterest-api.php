<?php


class Better_Social_Counter_Pinterest_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'pinterest';


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
			if ( ! class_exists( 'DOMDocument' ) ) {
				return $count;
			}

			$html = Better_Social_Counter_Utilities::request(
				$this->link(),
				array(
					'sslverify' => false,
					'headers'   => array(
						'Accept-Language' => 'en',
					),
				),
				true
			);

			if ( ! $html ) {
				return $count;
			}

			try {

				$prev = libxml_use_internal_errors( true );
				$doc  = new DOMDocument();

				@$doc->loadHTML( $html );

				libxml_use_internal_errors( $prev );

				$metas = $doc->getElementsByTagName( 'meta' );

				for ( $i = 0; $i < $metas->length; $i ++ ) {

					$meta = $metas->item( $i );

					if ( $meta->getAttribute( 'name' ) == 'pinterestapp:followers' ) {

						$count = $meta->getAttribute( 'content' );
						break;
					}

				}
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

		return 'http://www.pinterest.com/' . $this->data->id();
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}