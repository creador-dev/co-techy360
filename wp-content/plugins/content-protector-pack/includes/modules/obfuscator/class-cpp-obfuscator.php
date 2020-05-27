<?php


class CPP_Obfuscator {

	public function init() {

		if ( $this->is_active() ) {

			add_filter( 'content-protector-pack/buffer-output/enable', '__return_true' );
			add_filter( 'content-protector-pack/buffer-output', array( $this, 'obfuscate_email_addresses' ) );
		}
	}


	/**
	 * Is module active.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	protected function is_active() {

		return 'text-obfuscation' === cpp_option( 'email_protection' );
	}


	/**
	 * @param string $buffer
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function obfuscate_email_addresses( $buffer ) {

		return preg_replace_callback( '/\b([a-z0-9_\-\.]+@\w+\.[a-z]+)\b/i', array(
			$this,
			'obfuscate_email'
		), $buffer );

	}


	/**
	 * @param string $match
	 *
	 * @since 1.0.0
	 * @return string
	 */
	protected function obfuscate_email( $match ) {

		$result = '';

		foreach ( str_split( $match[1] ) as $char ) {

			$result .= '<span>' . $char . '</span>';
		}

		return $result;
	}
}

