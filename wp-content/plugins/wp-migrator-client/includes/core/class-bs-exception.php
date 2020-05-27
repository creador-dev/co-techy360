<?php

if ( ! class_exists( 'BS_Exception' ) ) {

	/**
	 * Custom Exception except error code as string
	 *
	 * Class BF_API_Exception
	 *
	 * @since 1.0.0
	 */
	Class BS_Exception extends Exception {

		public function __construct( $message = '', $code = '' ) {

			parent::__construct( $message, 0 );
			$this->code = $code;
		}
	}
}
