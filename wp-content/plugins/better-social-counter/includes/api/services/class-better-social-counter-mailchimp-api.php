<?php


class Better_Social_Counter_Mailchimp_API implements Better_Social_Counter_Service_Interface {


	/**
	 * @var string
	 */
	protected $service_id = 'mailchimp';


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
			try {

				$mc_api = $this->mailchimp_instance();
				$list   = $mc_api->get( 'lists/' . $this->data->get( 'list_id' ) );

				if ( isset( $list['stats']['member_count'] ) ) {
					return $list['stats']['member_count'];
				} else {
					return $count;
				}
			} catch( Exception $e ) {
			}
		}

		return bf_human_number_format( $count );
	}


	/**
	 * @return MailChimp
	 */
	public function mailchimp_instance() {

		// Mail chimp API wrapper
		if ( ! class_exists( 'MailChimp' ) ) {

			require_once Better_Social_Counter()->dir_path() . 'includes/libs/mailchimp/class-mailchimp.php';
		}

		return new MailChimp( $this->data->get( 'api_key' ) );
	}


	/**
	 * Get page link
	 *
	 * @return string
	 */
	public function link() {

		return $this->data->get( 'list_url' );
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}