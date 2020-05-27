<?php


/**
 * @coversDefaultClass Migrator_Controller
 */
class Migrator_Controller_Test extends WP_UnitTestCase {


	/**
	 * @test
	 */
	public function controller_class_must_implements_controller_contract_rule() {

		$this->assertArrayHasKey( 'Migrator_Is_Controller', class_implements( 'Migrator_Controller' ), 'Migrator_Controller Class must implements Migrator_Is_Controller interface' );
	}



}
