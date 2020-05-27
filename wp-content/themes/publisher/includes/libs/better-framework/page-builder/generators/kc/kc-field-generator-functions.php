<?php

if ( ! function_exists( 'bf_kc_field_generator' ) ) {

	function bf_kc_field_generator( $type, $settings = array() ) {

		if ( ! class_exists( 'BF_KC_Fields_Generator' ) ) {
			require BF_PATH . 'page-builder/generators/kc/class-bf-kc-fields-generator.php';
		}

		$options = wp_parse_args( array(
			'input_name'     => '{{data.name}}',
			'value'          => '{{data.value}}',
			'type'           => $type,
			'bypass_wrapper' => true,
		), $settings );


		$generator = new BF_KC_Fields_Generator( $options, $options['input_name'] );
		$input     = $generator->get_field();

		include BF_PATH . 'page-builder/generators/kc/templates/default-js.php';
	}
}

if ( ! function_exists( 'bf_kc_field_switch' ) ) {

	function bf_kc_field_switch() {

		bf_kc_field_generator( 'switch' );
	}
}
//
//if ( ! function_exists( 'bf_kc_field_color' ) ) {
//
//	function bf_kc_field_color() {
//
//		bf_kc_field_generator( 'color' );
//	}
//}
