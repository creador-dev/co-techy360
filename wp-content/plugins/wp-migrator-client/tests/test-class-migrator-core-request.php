<?php


/**
 * @coversDefaultClass  Migrator_Core_Connector
 */
class Migrator_Core_Connector_Test extends WP_UnitTestCase {


	/**
	 * @test
	 *
	 * @covers ::$uri
	 */
	public function connect_to_the_right_server() {

		$this->assertEquals( Migrator_Core_Connector::$uri, 'http://core.migrator.betterstudio.com/v1/%ep%' );
	}


	/**
	 * @test
	 *
	 * @covers ::remote_header
	 */
	public function appropriate_headers_should_send() {

		$required_headers = [

			'migrator-version' => '',
			'wp-version'       => '',
			'php-version'      => '',
			'site-locale'      => '',
			'site-url'         => '',
		];


		$headers = Migrator_Core_Connector::remote_header();

		$this->assertEmpty( array_diff_key( $required_headers, $headers ) );

		$this->assertEquals( Migrator_Client::VERSION, $headers['migrator-version'] );
		$this->assertEquals( PHP_VERSION, $headers['php-version'] );
		$this->assertEquals( get_locale(), $headers['site-locale'] );
		$this->assertEquals( home_url(), $headers['site-url'] );

		include ABSPATH . '/wp-includes/version.php';
		$this->assertEquals( $GLOBALS['wp_version'], $headers['wp-version'] );
	}

	/**
	 * @test
	 */
	public function data_should_compress_before_send() {

		if ( ! function_exists( 'gzdeflate' ) ) {
			$this->markTestSkipped( 'gzdeflate() not found!' );
		}

		$sent_data = [];

		add_filter( 'wp-migrator/http-request/result', function ( $response, $url, $args ) use ( &$sent_data ) {

			$sent_data = $args['body'];
		}, 11, 3 );

		$data2post = [
			'array'  => [ 1, 2, 3 ],
			'string' => 'Lorem ipsum dolor sit amet'
		];

		Migrator_Core_Connector::$compress = TRUE;
		Migrator_Core_Connector::request( 'sample', $data2post );


		$this->assertTrue( isset( $sent_data['compressed'] ) && isset( $sent_data['compressed_string'] ), 'Send compressed data to migrator server.' );
		$this->assertEquals( $sent_data['compressed_string'], base64_encode(
			gzdeflate( serialize( $data2post ) )
		) );
	}


	/**
	 * @test
	 *
	 * @covers fetch_json_data
	 */
	public function check_fetch_json_data() {

		$url = 'http://core.betterstudio.com/api/v1/register-product';

		$json = Migrator_Core_Connector::fetch_json_data( $url );
		$this->assertNotEmpty( $json );
		$this->assertInternalType( 'object', $json );
	}


	/**
	 * @test
	 *
	 * @covers ::request
	 *
	 * @depends check_fetch_json_data
	 * todo: test post data
	 */
	public function check_request_method_fetch_data() {

		$temp = Migrator_Core_Connector::$uri;

		Migrator_Core_Connector::$uri = 'http://core.betterstudio.com/api/v1/%ep%';

		$json = Migrator_Core_Connector::request( 'register-product' );

		$this->assertNotEmpty( $json );
		$this->assertInternalType( 'array', $json );

		Migrator_Core_Connector::$uri = $temp;
	}

	/**
	 * @test
	 */
//	public function check_request_method_send_data() {
//	}
}