<?php


/**
 * @coversDefaultClass Migrator_Connector
 */
class Migrator_Connector_Test extends WP_UnitTestCase {

	/**
	 * @test
	 */
	public function fetch_themes_list_from_server() {

		$response = Migrator_Connector::products_list();

		$this->assert_valid_response( $response );

		$this->assertTrue( ! empty( $response['themes'] ) );

		$theme = array_shift( $response['themes'] );

		$this->assertEmpty( array_diff_key( $theme, [
			'badge'        => '',
			'name'         => '',
			'creator_name' => '',
			'creator_url'  => '',
			'thumbnail'    => '',
			'id'           => '',
		] ), 'Invalid keys found in response array' );
	}


	/**
	 * @test
	 */
	public function fetch_theme_info_from_server() {

		$response = Migrator_Connector::product_info( 'newspaper', 'theme' );

		$this->assert_valid_response( $response );

		$this->assertTrue( isset( $response['settings']['parts'] ) );
	}


	/**
	 * @test
	 */
	public function response_requests_should_cache() {

		$fake_response = function () {

			return [ 'themes' => 'fake-data #1', 'success' => TRUE, 'status' => 'success' ];
		};

		$fake_response2 = function () {

			return [ 'themes' => 'fake-data #2', 'success' => TRUE, 'status' => 'success' ];
		};

		add_filter( 'wp-migrator/http-request/result', $fake_response, 11 );

		Migrator_Connector::products_list();

		add_filter( 'wp-migrator/http-request/result', $fake_response2, 12 );


		$this->assertEquals(
			[ 'themes' => 'fake-data #1', 'success' => TRUE, 'status' => 'success' ],
			Migrator_Connector::products_list(),

			'Http Requests should cache.'
		);
	}


	public function assert_valid_response( $response ) {

		$this->assertInternalType( 'array', $response );

		$this->assertTrue( $response['success'] );
	}
}
