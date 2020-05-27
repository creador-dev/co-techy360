<?php


class Better_Social_Counter_Vimeo_API implements Better_Social_Counter_Service_Interface {

	/**
	 * @var string
	 */
	protected $service_id = 'vimeo';


	/**
	 * @var string
	 */
	public $tokens = array(
		'f8ef92f31c737be59223b8448c9c1045',
		'e3ac7d85daf38bc652890e6d1dae9b06',
		'f0971d776f10b153b9dea8b19f836f1e',
	);

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
			$type  = $this->data->get( 'type' );
			$field = $this->data->get( 'field' );


			$valid       = false;
			$total       = 0;
			$data_fields = array();

			if ( $field === 'total' ) {

				$data_fields[] = 'followers';
				$data_fields[] = 'videos';

			} elseif ( $field === 'videos' ) {

				$data_fields[] = 'videos';

			} else {

				$data_fields[] = 'followers';

			}

			$_check = array(
				'user'    => 'users',
				'channel' => 'channels',
			);

			if ( isset( $_check[ $type ] ) ) {
				$results = $this->request( '/' . $_check[ $type ] . '/' . $this->data->id() );
			}

			foreach ( $data_fields as $field ) {

				if ( $type === 'channel' && $field === 'followers' ) {
					$index = 'users';
				} else {
					$index = $field;
				}

				if ( isset( $results['metadata']['connections'][ $index ]['total'] ) ) {

					$valid = true;
					$total += $results['metadata']['connections'][ $index ]['total'];
				}
			}

			$count = $valid ? $total : $count;
		}

		return bf_human_number_format( $count );
	}


	public function request( $endpoint ) {

		/**
		 * Choose a token
		 */
		$current_token = false;

		foreach ( $this->tokens as $token ) {

			if ( get_transient( 'tk-stat-' . $token ) !== 'disabled' ) {

				$current_token = $token;
				break;
			}
		}

		if ( ! $current_token ) {
			return false;
		}

		$url = 'https://api.vimeo.com/' . ltrim( $endpoint, '/' );

		$response = wp_remote_get( $url, array(
			'headers'   => array(
				'Authorization'   => 'Bearer ' . $current_token,
				'Accept-Language' => 'en',
			),
			'sslverify' => false
		) );

		if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {

			return false;
		}

		/**
		 * Temporary disable token if needed
		 */

		$remaining = (int) wp_remote_retrieve_header( $response, 'x-ratelimit-remaining' );

		if ( $remaining < 2 ) {

			$reset = wp_remote_retrieve_header( $response, 'x-ratelimit-reset' );
			$reset = strtotime( $reset ) - time();

			if ( $reset > 0 ) {

				set_transient( 'tk-stat-' . $current_token, 'disabled', $reset );
			}
		}

		$data = wp_remote_retrieve_body( $response );

		return json_decode( $data, true );
	}


	/**
	 * @return string
	 */
	public function link() {

		$link = 'https://vimeo.com/';

		if ( $this->data->get( 'type' ) == 'channel' ) {
			$link .= 'channels/' . $this->data->id();
		} else {
			$link .= $this->data->id();
		}

		return $link;
	}


	public function use_cache( $format ) {

		return 'full' === $format;
	}
}