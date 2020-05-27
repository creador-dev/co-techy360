<?php


/**
 * @coversDefaultClass Migrator_Client
 */
class Migrator_Client_Test extends WP_UnitTestCase {

	/**
	 * @test
	 *
	 * @covers ::VERSION
	 */
	public function plugin_header_version_must_be_equal_with_version_constant() {

		$plugin_file = WP_MIGRATOR_PATH . '/wp-migrator-client.php';

		$plugin_data = get_plugin_data( $plugin_file );

		$this->assertEquals( $plugin_data['Version'], Migrator_Client::VERSION, 'Plugin version is not equal to Better_Plugin_Core::VERSION value' );
	}



	/**
	 * @test
	 */
//	public function install_db_table_on_plugin_activation() {
//
//	}
}
