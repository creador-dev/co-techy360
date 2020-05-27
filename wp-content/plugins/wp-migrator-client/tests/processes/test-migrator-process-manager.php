<?php


/**
 * @coversDefaultClass Migrator_Process_Manager
 */
class Migrator_Process_Manager_Test extends WP_UnitTestCase {

	public $call_order = [];


	/**
	 * @before
	 */
	public function test_list_of_processors_property() {

		$instance = new Migrator_Process_Manager( [] );

		$expected = $this->list_classes();
		sort( $expected );

		$actual = array_values( $instance->processors );
		sort( $actual );

		$this->assertEquals( $expected, $actual );
	}


	/**
	 * todo: add more data
	 */
	public function process_manage_data() {

		return [

			[
				[
					'post_types' => [ 'post' ],
				]
			]
		];
	}


	/**
	 * @test
	 *
	 * @dataProvider process_manage_data
	 *
	 * @covers ::factory
	 * @covers ::calculate_total_steps
	 *
	 * @param array $config
	 */
	public function total_steps_must_sum_every_single_process_recalls( $config ) {


		$instance = new Migrator_Process_Manager( $config );

		$total = 0;

		foreach ( $instance->processors as $id => $class ) {

			$total += $instance->factory( $id )->calculate_steps();
		}

		$this->assertSame( $total, $instance->calculate_total_steps() );
	}


	/**
	 * @dataProvider process_manage_data
	 *
	 * @covers ::factory
	 * @covers ::get_number_of_recalls
	 *
	 * @param array $config
	 */
	public function test_get_number_of_recalls( $config ) {


		$instance = new Migrator_Process_Manager( $config );

		$total = array();
		$check = array();

		foreach ( $instance->processors as $id => $class ) {

			$total[ $id ] = $instance->factory( $id )->calculate_steps();

			$check[] = $id;
		}

		$this->assertSame( $total, $instance->get_number_of_recalls( $check ) );
	}


	/**
	 * @test
	 *
	 * @dataProvider process_manage_data
	 * @covers ::migrate
	 *
	 * @param array $config
	 *
	 * @throws \BS_Exception
	 */
	public function backup_existing_data_should_fire_before_migration_process( $config ) {

		$mock = $this->getMockBuilder( 'Migrator_Sample_Processor' )->setMethods( [
			'set_migration_config',
			'migration_backup',
			'migration_items',
			'migrate'
		] )->getMock();


		$this->call_order = [];

		$items = [
			'item-1',
			'item-2'
		];

		$mock->expects( $this->any() )
		     ->method( 'migration_items' )
		     ->will( $this->returnValue( $items ) );

		$mock->expects( $this->exactly( 1 ) )
		     ->method( 'migration_backup' )
		     ->will( $this->returnCallback( function ( $input ) {

			     $this->call_order[] = [ 'migration_backup', $input ];
		     } ) );

		$mock->expects( $this->once() )
		     ->method( 'migrate' )
		     ->will( $this->returnCallback( function ( $input ) {

			     $this->call_order[] = [ 'migrate', $input ];

			     return TRUE;
		     } ) );

		$instance = new Migrator_Process_Manager( $config );

		$instance->processors['_posts'] = $mock;

		$result = $instance->migrate( '_posts' );


		$this->assertTrue( $result );

		$valid_recall_trace = [];

		$valid_recall_trace[] = [ 'migration_backup', $items ];
		$valid_recall_trace[] = [ 'migrate', $items ];

		$this->assertEquals( $valid_recall_trace, $this->call_order, "Backup method must call before migrate method." );
	}


	public function list_classes() {

		$files = glob( WP_MIGRATOR_PATH . '/includes/processors/*.php' );

		$classes = [];

		foreach ( $files as $file ) {
			if ( preg_match( '/class-(.+)\.php$/i', $file, $match ) ) {

				$class = ucwords( str_replace( '-', ' ', $match[1] ) );
				$class = str_replace( ' ', '_', $class );

				if ( in_array( 'Migration_Process', class_implements( $class ) ) ) {
					$classes[] = $class;
				}
			}
		}

		return $classes;
	}
}


class Migrator_Sample_Processor implements Migration_Process, Safe_Migration_Process {

	public $mock;


	public function __construct( $mock = NULL ) {

		if ( $mock ) {
			$this->mock = $mock;
		}
	}


	/**
	 * Calculate how many steps needed to complete the process
	 *
	 * @return int
	 */
	public function calculate_steps() {

		return $this->mock->calculate_steps();
	}


	/**
	 * Transform data to new structure
	 *
	 * @return bool true on success or false on failure.
	 */
	public function migrate( $items ) {

		return $this->mock->migrate();
	}


	/**
	 * Set configuration of the migration process
	 *
	 * @param Migration_Process_Config  $configuration
	 * @param xMigration_Process_Config $configuration2
	 *
	 * @return mixed
	 */
	public function set_migration_config( $configuration, $configuration2 ) {

		return $this->mock->migrate( $configuration );
	}


	/**
	 * Backup existing data before start migrating process
	 *
	 * @param mixed $item_info
	 *
	 * @return bool true true on success.
	 */
	public function migration_backup( $item_info ) {

		return $this->mock->migrate( $item_info );
	}


	/**
	 *  Restore backup version
	 *
	 * @param mixed $item_info
	 * @param bool  $delete_after
	 *
	 * @return bool true true on success.
	 */
	public function migration_restore( $item_info, $delete_after = TRUE ) {

		return $this->mock->migration_restore( $item_info );
	}


	public function migration_items() {

		return $this->mock->migration_items();

	}

	/**
	 * Get total number of items
	 *
	 * @return int
	 */
	public function total_items() {

		return $this->mock->total_items();
	}

	/**
	 * Handle another method recalls
	 *
	 * @param string $method
	 * @param array  $args
	 *
	 * @return mixed
	 */
	public function __call( $method, $args ) {

		return call_user_func_array( array( $this->mock, $method ), $args );
	}
}