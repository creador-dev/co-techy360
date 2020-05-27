<?php

if ( ! function_exists( '___sample_options_select__' ) ) {

	function ___sample_options_select__( $a = '', $b = '' ) {

		if ( $a === - 1 && $b === true ) {

			return array(

				'opt-1' => 'option 1',
				'opt-2' => 'option 2',
			);
		}

		return array( 'invalid-function-call' );
	}
}

return array(
	array(
		'name' => 'Field Title',
		'id'   => 'field-id',
		'type' => 'select',

		'deferred-options' => array(
			'callback' => '___sample_options_select__',
			'args'     => array(
				- 1,
				true
			),
		),
	)
);
