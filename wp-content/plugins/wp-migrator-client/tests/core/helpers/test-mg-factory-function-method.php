<?php


class mg_factory_method_function_Test extends WP_UnitTestCase {

	/**
	 * @test
	 * @covers mg_factory_method
	 */
	public function for_controller_callback_must_return_a_method_that_are_associated_with_controller() {

		$controller_callback = '_sample_test_controller@index';

		$result = mg_factory_method( $controller_callback );

		$expected = [
			'callable' => [
				'_sample_test_controller',
				'controller_call_method',
			],

			'args' => [
				'_sample_test_controller',
				'index',
			]
		];

		$this->assertSame( $expected, $result );
	}


	/**
	 * @test
	 */
	public function pass_none_string_as_first_argument() {

		$class = new stdClass();

		$result = mg_factory_method( $class, FALSE );

		$this->assertFalse( $result );

		$class = range( 1, 4 );

		$result = mg_factory_method( $class, 123 );

		$this->assertSame( 123, $result );


	}
}


class _sample_test_controller extends Migrator_Controller {

	public function index() {


	}

}
