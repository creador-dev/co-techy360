<?php

/**
 * @coversDefaultClass BS_Deffer_Callback
 */
class BS_Deffer_Callback_Test extends WP_UnitTestCase {

	/**
	 * @covers ::queue
	 * @covers ::can_queue
	 *
	 * @test
	 */
	public function try_to_queue_a_hook_that_is_fired_before() {

		$hook = 'better-studio';

		do_action( $hook, '' );

		$mock = $this->createMock( 'BS_Deffer_Callback_Test' );
		$mock->expects( $this->never() )
		     ->method( 'output' );

		$result = BS_Deffer_Callback::queue( $hook, [
			'callback' => array( $mock, 'output' ),
		] );

		$this->assertFalse( $result );
	}


	/**
	 * @test
	 *
	 * @covers ::queue
	 * @covers ::set_stack
	 * @covers ::get_stack
	 * @covers ::run_queue
	 */
	public function queue_a_callback_with_valid_options() {

		$hook   = 'better-studio-2';
		$params = [
			[
				'a' => 'string',
				'b' => 12.34,
			],
		];

		$mock = $this->createMock( 'BS_Deffer_Callback_Test' );
		$mock->expects( $this->exactly( 2 ) )
		     ->method( 'output' )
		     ->with( $this->equalTo( $params[0] ) );

		$result = BS_Deffer_Callback::queue( $hook, [
			'callback' => array( $mock, 'output' ),
			'params'   => $params,
		] );

		$this->assertTrue( $result );

				do_action( $hook, '' );

		do_action( $hook, '' );
	}


	public function output() {


	}
}
