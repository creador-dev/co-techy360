<?php


/**
 * @coversDefaultClass Migrator_Backup
 */
class Migrator_Backup_Test extends WP_UnitTestCase {

	function start_transaction() {

	}


	/**
	 * @test
	 *
	 * @covers ::table_name
	 *
	 * @before
	 */
	public function validate_table_name() {

		global $wpdb;

		$this->assertEquals( "{$wpdb->prefix}migrator_backups", Migrator_Backup::table_name() );
	}


	/**
	 * @test
	 *
	 * @global wpdb $wpdb wordpress database object
	 *
	 * @covers ::install
	 */
	public function database_table_should_create() {

		global $wpdb;

		$installed = Migrator_Backup::install();

		$this->assertTrue( $installed );

		$table_name = Migrator_Backup::table_name();

		$sql = $wpdb->prepare( 'SHOW TABLES LIKE %s ;', $table_name );

		$this->assertEquals( $table_name, $wpdb->get_var( $sql ), 'Backup table not found!' );
	}


	public function backup_method_data() {

		return [

			[
				123,
				'test',
				range( 1, 5 )
			]
		];
	}


	/**
	 * @test
	 * @depends      database_table_should_create
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 */
	public function look_for_not_exists_data( $object_id, $group_name ) {

		$found = Migrator_Backup::exists( $object_id, $group_name );

		$this->assertFalse( $found );
	}


	/**
	 *
	 * @test
	 * @depends      look_for_not_exists_data
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 * @param array  $data
	 *
	 * @global wpdb  $wpdb wordpress database object
	 *
	 * @covers ::backup
	 */
	public function backup_must_save_not_existing_data( $object_id, $group_name, $data ) {

		global $wpdb;

		$inserted = Migrator_Backup::backup( $object_id, $group_name, $data );

		$this->assertTrue( $inserted );

		$table_name = Migrator_Backup::table_name();

		$sql = "SELECT * FROM $table_name WHERE object_id = %d AND group_name = %s";

		$sql = $wpdb->prepare( $sql, $object_id, $group_name );

		$db_response = $wpdb->get_row( $sql );

		$this->assertNotEmpty( $db_response );

		$this->assertEquals( $object_id, $db_response->object_id );
		$this->assertEquals( $group_name, $db_response->group_name );
		$this->assertEquals( $data, maybe_unserialize( $db_response->data ) );
	}

	/**
	 * @test
	 */
	public function it_should_not_save_an_item_without_unique_id() {

		$post_id = $this->factory->post->create();

		$result = Migrator_Backup::backup( 0, 'post', get_post( $post_id ) );

		$this->assertFalse( $result );
	}


	/**
	 * @test
	 * @depends      backup_must_save_not_existing_data
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 * @param array  $data
	 */
	public function backup_must_not_save_existing_data( $object_id, $group_name, $data ) {

		$inserted = Migrator_Backup::backup( $object_id, $group_name, $data );
		$this->assertFalse( $inserted );
	}


	/**
	 * @test
	 * @depends      backup_must_not_save_existing_data
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 */
	public function look_for_existing_data( $object_id, $group_name ) {

		$found = Migrator_Backup::exists( $object_id, $group_name );

		$this->assertTrue( $found );
	}


	/**
	 * @test
	 * @depends      backup_must_not_save_existing_data
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 */
	public function try_to_replace_existing_data( $object_id, $group_name ) {

		$data = [ '-changed-', 1, 2, [ 3 ] ];

		$inserted = Migrator_Backup::backup( $object_id, $group_name, $data, [ 'replace' => TRUE ] );

		$this->assertTrue( $inserted );

		$found = Migrator_Backup::find( $object_id, $group_name );

		$this->assertEquals( $data, maybe_unserialize( $found->data ) );
	}


	/**
	 * @test
	 * @depends      try_to_replace_existing_data
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 */
	public function unserialize_found_data( $object_id, $group_name ) {

		$data = Migrator_Backup::find( $object_id, $group_name );

		$this->assertInternalType( 'object', $data );

		$this->assertNotInternalType( 'string', $data->data, 'it\'s better to unserialize output' );
	}


	/**
	 * @test
	 * @depends      unserialize_found_data
	 * @dataProvider backup_method_data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 */
	public function drop_backup( $object_id, $group_name ) {

		$deleted = Migrator_Backup::delete( $object_id, $group_name );

		$this->assertTrue( $deleted );

		$this->assertNull( Migrator_Backup::find( $object_id, $group_name ) );
	}


	public static function tearDownAfterClass() {

		parent::tearDownAfterClass();

		global $wpdb;

		$table_name = Migrator_Backup::table_name();

		$wpdb->query( "DROP TABLE  $table_name" );
	}
}
