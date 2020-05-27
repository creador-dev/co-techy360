<?php


/**
 * @coversDefaultClass Migrate_Terms
 */
class Migrate_Terms_Test extends WP_UnitTestCase {


	function setUp() {

		parent::setUp();

		add_filter( 'wp-migrator/migrating/resume-enabled', '__return_false' );
	}


	/**
	 * @return Migrate_Terms
	 */
	public function get_instance() {

		$instance = $this->get_manager_instance()->factory( 'terms' );

		return $instance;
	}

	/**
	 * @return Migrator_Process_Manager
	 */
	public function get_manager_instance() {

		static $instance;

		if ( ! $instance ) {
			$instance = new Migrator_Process_Manager(
				array_merge(
					[
						'resumable_value' => mg_generate_uuid4(),
					],

					$this->base_config()
				)
			);
		}

		return $instance;
	}


	public function base_config() {

		return [
			'taxonomies'                  => [
				'category'
			],
			'product_type'                => 'theme',  # !important
			//
			'source_product_id'           => 'newspaper', # !important
			'source_product_version'      => '',
			//
			'destination_product_id'      => 'publisher',
			'destination_product_version' => '',

		];
	}

	/**
	 * @test
	 *
	 * @covers $fillable_fields
	 */
	public function test_fillable_properties() {


		$this->assertEquals( [
			'name',
			'description',
		], $this->get_instance()->fillable_fields );
	}


	/**
	 * @test
	 */
	public function get_term_meta_should_support_new_wp_term_meta_structure() {

		$term_id = $this->factory->term->create( [
			'taxonomy' => 'category'
		] );


		$this->assertEquals( 'category', $this->get_instance()->get_term_taxonomy( $term_id ) );

		$term_id = $this->factory->term->create( [
			'taxonomy' => 'post_tag'
		] );

		$this->assertEquals( 'post_tag', $this->get_instance()->get_term_taxonomy( $term_id ) );

		$this->assertEmpty( $this->get_instance()->get_term_taxonomy( $term_id + 1 ) );
	}


	public function test_get_meta_option_name() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);


		{ # Data 1
			$this->assertEmpty( $this->get_instance()->get_meta_option_name( 1, 'sample' ) );

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'%taxonomy%_%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			$this->assertEquals( "category_$term_id", $instance->get_meta_option_name( $term_id, 'sample' ) );
			$this->assertEmpty( $instance->get_meta_option_index( $term_id, 'sample' ) );
		}


		{  # Data 2

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'cat_%meta_key%_term'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			$this->assertEquals( 'cat_sample_term', $instance->get_meta_option_name( $term_id, 'sample' ) );
			$this->assertSame( "$term_id", $instance->get_meta_option_index( $term_id, 'sample' ) );

		}



		{  # Data 3

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'constant',
							'%taxonomy%.%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			$this->assertEquals( 'constant', $instance->get_meta_option_name( $term_id, 'sample' ) );
			$this->assertSame( "category.$term_id", $instance->get_meta_option_index( $term_id, 'sample' ) );

		}
	}

	/**
	 * @test
	 */
	public function get_term_meta_must_fetch_the_data_from_options_table_to_support_ancient_architecture() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);


		{ # wp standard term meta

			add_term_meta( $term_id, 'meta-key', '#123#' );

			$this->assertEquals( "#123#", $this->get_instance()->get_term_meta( $term_id, 'meta-key', TRUE ) );
			$this->assertEquals( [ "#123#" ], $this->get_instance()->get_term_meta( $term_id, 'meta-key', FALSE ) );
		}

		{ # Data 1


			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'%taxonomy%_%term_id%',
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			add_option( "category_$term_id", '_123_' );

			$this->assertEquals( '_123_', $instance->get_term_meta( $term_id, 'sample', TRUE ) );
			$this->assertEquals( [ '_123_' ], $instance->get_term_meta( $term_id, 'sample', FALSE ) );
		}


		{  # Data 2

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'cat_%meta_key%_term'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			$meta_value = range( 2, 4 );

			add_option( 'cat_sample_term', [ $term_id => $meta_value ] );

			$this->assertEquals( $meta_value, $instance->get_term_meta( $term_id, 'sample', TRUE ) );
			$this->assertEquals( [ $meta_value ], $instance->get_term_meta( $term_id, 'sample', FALSE ) );
		}


		{  # Data 3

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'constant',
							'%taxonomy%.%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );


			add_option( 'constant', [
				'category' => [
					$term_id => "@@@"
				]
			] );


			$this->assertEquals( '@@@', $instance->get_term_meta( $term_id, 'dont-care', TRUE ) );
			$this->assertEquals( [ '@@@' ], $instance->get_term_meta( $term_id, 'dont-care', FALSE ) );
		}
	}


	/**
	 * @test
	 */
	public function get_all_term_meta_in_legacy_form_when_option_name_contain_meta_key() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);

		{ # Data 1

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'%meta_key%_%term_id%',
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			add_option( "not-a-term-meta-$term_id", 1 );

			add_option( "category_$term_id", '_123_' );
			add_option( "color_$term_id", 'brown' );

			$this->assertEquals( [
				'category' => [
					'_123_'
				],
				'color'    => [
					'brown'
				],
			],
				$instance->get_term_meta( $term_id )
			);

			$this->assertCount( 2, $GLOBALS['wpdb']->last_result, 'Underscore should escape from option_name in sql query' );
		}


	}

	/**
	 * @test
	 */
	public function update_term_meta_must_update_the_stored_data_in_options_table_to_support_ancient_architecture() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);


		{ # Data 1

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'%taxonomy%_%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			# add_option( "category_$term_id", '#v1' );

			$this->assertTrue( $instance->update_term_meta( $term_id, 'sample', '#v2' ) );

			$this->assertEquals( '#v2', $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertTrue( $instance->update_term_meta( $term_id, 'sample', '#v3', '#v2' ) );

			$this->assertEquals( '#v3', $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertFalse( $instance->update_term_meta( $term_id, 'sample', '#v4', '#v2' ) );

			$this->assertEquals( '#v3', $instance->get_term_meta( $term_id, 'sample', TRUE ) );
		}


		{  # Data 2

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'cat_%meta_key%_term'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			# add_option( 'cat_sample_term', [ $term_id => 'initial' ] );


			$this->assertTrue( $instance->update_term_meta( $term_id, 'sample', '#v2' ) );

			$this->assertEquals( '#v2', $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertTrue( $instance->update_term_meta( $term_id, 'sample', '#v3', '#v2' ) );

			$this->assertEquals( '#v3', $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertFalse( $instance->update_term_meta( $term_id, 'sample', '#v4', '#v2' ) );

			$this->assertEquals( '#v3', $instance->get_term_meta( $term_id, 'sample', TRUE ) );
		}


		{  # Data 3

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'constant',
							'%taxonomy%.%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );


			$this->assertTrue( $instance->update_term_meta( $term_id, 'sample', [ 1, 2, 3 ] ) );

			$this->assertEquals( [ 1, 2, 3 ], $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertTrue( $instance->update_term_meta( $term_id, 'sample', '#v3', [ 1, 2, 3 ] ) );

			$this->assertEquals( '#v3', $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertFalse( $instance->update_term_meta( $term_id, 'sample', '#v4', [ 1, 2, 3 ] ) );

			$this->assertEquals( '#v3', $instance->get_term_meta( $term_id, 'sample', TRUE ) );
		}
	}


	/**
	 * @test
	 */
	public function delete_term_meta_must_delete_the_stored_data_in_options_table_to_support_ancient_architecture() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);

		{ # Data 1


			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'%taxonomy%_%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			add_option( "category_$term_id", '#v1' );

			$this->assertFalse( $instance->delete_term_meta( $term_id, 'sample', '123123' ) );

			$this->assertTrue( $instance->delete_term_meta( $term_id, 'sample' ) );

			$this->assertEmpty( $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertFalse( $instance->delete_term_meta( $term_id, 'sample' ) );
		}


		{  # Data 2

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'cat_%meta_key%_term'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );

			add_option( 'cat_sample_term', [ $term_id => 'initial' ] );

			$this->assertFalse( $instance->delete_term_meta( $term_id, 'sample', '123123' ) );

			$this->assertTrue( $instance->delete_term_meta( $term_id, 'sample', 'initial' ) );

			$this->assertEmpty( $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertFalse( $instance->delete_term_meta( $term_id, 'sample' ) );
		}

		{  # Data 3

			$manager = new Migrator_Process_Manager(
				array_merge(
					[
						'term_meta_path' => [
							'constant',
							'%taxonomy%.%term_id%'
						],
					],

					$this->base_config()
				)
			);

			/**
			 * @var Migrate_Terms $instance
			 */
			$instance = $manager->factory( 'terms' );


			add_option( 'constant', [
				'category' => [
					$term_id => "initial"
				]
			] );


			$this->assertFalse( $instance->delete_term_meta( $term_id, 'sample', '123123' ) );

			$this->assertTrue( $instance->delete_term_meta( $term_id, 'sample', 'initial' ) );

			$this->assertEmpty( $instance->get_term_meta( $term_id, 'sample', TRUE ) );

			$this->assertFalse( $instance->delete_term_meta( $term_id, 'sample' ) );
		}
	}

	/**
	 * @test
	 *
	 * @covers ::calculate_steps
	 */

	public function a_few_terms_will_migrate_in_single_request() {

		$this->factory->term->create();

		$this->assertEquals( 1, $this->get_instance()->calculate_steps() );
	}


	/**
	 * @test
	 * @depends a_few_terms_will_migrate_in_single_request
	 *
	 * @covers ::calculate_steps
	 */
	public function a_lot_of_terms_will_migrate_in_multiple_processes() {

		$this->factory->term->create_many( 40, [ 'taxonomy' => 'category' ] );

		$this->assertGreaterThanOrEqual( 5, $this->get_instance()->calculate_steps() );
	}


	/**
	 * @test
	 *
	 * @covers ::migration_items
	 */
	public function all_terms_should_pass_for_migration_process() {

		add_filter( 'wp-migrator/migrating/resume-enabled', '__return_false' );

		$instance = $this->get_instance();

		$all_terms = $this->factory->term->create_many( 20, array( 'taxonomy' => 'category' ) );

		array_unshift( $all_terms, 1 ); // Append uncategorized category

		$total_steps = $instance->calculate_steps();
		$terms_id    = array();

		for ( $step = 1; $step <= $total_steps; $step ++ ) {

			$this->before_migration( $step );

			$instance->active_config->config['current_step'] = $step;

			$items_id = array_keys( $instance->migration_items() );

			$terms_id = array_merge( $terms_id, $items_id );

			$this->after_migration( $step, $items_id );
		}

		$terms_id = array_unique( $terms_id );

		sort( $all_terms );
		sort( $terms_id );

		$this->assertEquals( $all_terms, $terms_id );

		$instance->active_config->config['current_step'] = $step + 1;

		$this->assertEmpty( array_filter( $instance->migration_items() ) );

		$instance->active_config->config['current_step'] = 1;
	}


	/**
	 * @param int   $step
	 * @param array $items_id
	 */
	public function after_migration( $step, $items_id ) {

	}


	/**
	 * @param int $step
	 */
	public function before_migration( $step ) {

	}


	/**
	 * @test
	 */
	public function migrate_method_should_post_whole_terms_object_and_metas() {

		$this->factory->term->create_many( 10 );

		$data2post       = array();
		$catch_term_data = function ( $res, $url, $args ) use ( &$data2post ) {

			$data2post = $args['body'];

			if ( ! empty( $data2post['data']['terms'] ) ) {

				foreach ( $data2post['data']['terms'] as $term_id => $term ) {

					unset( $data2post['data']['terms'][ $term_id ]['term']->post_modified );
					unset( $data2post['data']['terms'][ $term_id ]['term']->post_modified_gmt );
				}
			}

			return $res;
		};

		Migrator_Core_Connector::$compress = FALSE;
		add_filter( 'wp-migrator/http-request/result', $catch_term_data, 10, 3 );

		$expected_data2post = $this->get_instance()->migration_items();

		$this->get_instance()->migrate( $expected_data2post );

		$this->assertEquals( array( 'terms' => $expected_data2post ), $data2post['data'] );

		Migrator_Core_Connector::$compress = TRUE;
	}

	/**
	 * @test
	 *
	 * @depends2 migrate_method_should_post_whole_terms_object_and_metas
	 */
	public function migrator_should_receive_migrated_data_in_standard_expected_format() {

		$terms_id = $this->factory->term->create_many( 3 );

		foreach ( $terms_id as $term_id ) {

			$this->get_instance()->update_term_meta( $term_id, 'slider_number', '2' );
		}

		$response       = array();
		$catch_response = function ( $res, $url, $args ) use ( &$response ) {

			$response = $res;

			return $res;
		};

		Migrator_Core_Connector::$compress = FALSE;
		add_filter( 'wp-migrator/http-request/result', $catch_response, 10, 3 );

		$this->get_instance()->migrate( $this->get_instance()->migration_items() );

		if ( empty( $response['terms'] ) ) {
			$this->markTestSkipped();
		}

		foreach ( $terms_id as $term_id ) {
			$this->assertTrue( isset( $response['terms'][ $term_id ]['term'] ) );
			$this->assertTrue( isset( $response['terms'][ $term_id ]['term_meta'] ) );
		}

		Migrator_Core_Connector::$compress = TRUE;
	}


	/**
	 * @test
	 */
	public function migrate_method_should_update_old_data_and_insert_new_data() {

		$faker = Faker\Factory::create();

		$terms_id = $this->factory->term->create_many( 10, array( 'taxonomy' => 'category' ) );

		$items         = $this->get_instance()->migration_items();
		$fake_response = array();

		foreach ( $terms_id as $term_id ) {
			add_term_meta( $term_id, $faker->word, $faker->randomLetter );
		}

		$sample_http_response = function () use ( $items, &$fake_response, $faker ) {

			$terms = array();

			foreach ( $items as $item ) {

				$term_id = $item['term']['term_id'];

				$new_fields = [

					'name'        => $faker->sentence( 2 ),
					'description' => $faker->text,
				];

				$tm_update = [];
				$tm_new    = [];

				$term_meta        = array_slice( $this->get_instance()->get_term_meta( $term_id ), 0, rand( 3, 6 ) );
				$meta_keys2update = array_keys( $term_meta );

				foreach ( $meta_keys2update as $meta_key ) {

					$new_term_metas[ $meta_key ] = $faker->sentence;
				}

				$tm_new['__new_meta__'] = [ range( 1, 3 ) ];

				$terms[ $term_id ]['term']      = $new_fields;
				$terms[ $term_id ]['term_meta'] = array_merge( $tm_update, $tm_new );
			}

			$fake_response = $terms;

			return [
				'success' => TRUE,
				'terms'   => $terms,
			];
		};


		add_filter( 'wp-migrator/http-request/result', $sample_http_response, 11, 3 );

		$results = $this->get_instance()->migrate( $this->get_instance()->migration_items() );

		$this->assertSame( count( $items ), $results );

		foreach ( $items as $term_before_update ) {

			$id = $term_before_update['term']['term_id'];

			$term_after_update = get_term( $id );

			$new_term_fields = array_intersect_key( get_object_vars( $term_after_update ), $fake_response[ $id ]['term'] );
			$this->assertEquals( $fake_response[ $id ]['term'], $new_term_fields, 'Term was not updated!' );


			$new_term_meta_status = array_intersect_key( $this->get_instance()->get_term_meta( $id ), $fake_response[ $id ]['term_meta'] );

			$this->assertEquals(
				$fake_response[ $id ]['term_meta'],
				map_deep( $new_term_meta_status, 'maybe_unserialize' ),
				'Term meta was not updated!'
			);
		}
	}


	/**
	 * @test
	 */
	public function backup_process_should_backup_term_object_and_metas() {

		Migrator_Backup::install();

		$instance = $this->get_instance();

		$term_id  = $this->factory->term->create( array( 'taxonomy' => 'category' ) );
		$term_org = get_term( $term_id );

		$this->get_instance()->update_term_meta( $term_id, 'sample', '#1' );

		$backed_up = $instance->migration_backup( [
			$term_id => [

				'term'      => get_object_vars( get_term( $term_id, 'category' ) ),
				'term_meta' => $this->get_instance()->get_term_meta( $term_id )
			]
		] );

		$this->assertTrue( $backed_up );

		$faker = Faker\Factory::create();

		$updated = wp_update_term(
			$term_id,
			$term_org->taxonomy,
			[
				'name'        => $faker->sentence( 2 ),
				'description' => $faker->sentence( 10 ),
			]
		);

		$this->get_instance()->update_term_meta( $term_id, 'sample', '#2' );

		$this->get_instance()->update_term_meta( $term_id, 'new-term-meta', 1 );

		if ( is_wp_error( $updated ) || ! $updated ) {
			$this->markTestSkipped();
		}

		$restored = $instance->migration_restore( $term_id );

		$this->assertTrue( $restored );

		$this->assertEquals( $term_org, get_term( $term_id ) );
		$this->assertEquals( '#1', $this->get_instance()->get_term_meta( $term_id, 'sample', TRUE ) );
		$this->assertEmpty( $this->get_instance()->get_term_meta( $term_id, 'new-term-meta', TRUE ) );


		$this->assertNull( Migrator_Backup::find( $term_id, 'term' ) );
		$this->assertNull( Migrator_Backup::find( $term_id, 'term_meta' ) );
	}


	public function test_switch_active_configuration() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);

		$manager = new Migrator_Process_Manager(
			array_merge(
				[
					'term_meta_path' => [
						'%taxonomy%_%term_id%'
					],
				],

				$this->base_config()
			),

			array_merge(
				[
					'term_meta_path' => [
						'constant',
						'%term_id%.%meta_key%'
					],
				],

				$this->base_config()
			)

		);


		/**
		 * @var Migrate_Terms $instance
		 */
		$instance = $manager->factory( 'terms' );


		add_option( "category_$term_id", '#config-1#' );
		add_option( 'constant', [

			$term_id => [
				'meta_key' => '#config-2#',
			]
		] );


		$this->assertEquals( '#config-1#', $instance->get_term_meta( $term_id, 'meta_key', TRUE ) );

		$instance->switch_active_configuration( 2 );

		$this->assertEquals( 2, $instance->active_config_number );


		$this->assertEquals( [
			'constant',
			'%term_id%.%meta_key%'
		], $instance->active_config->term_meta_path );

		$this->assertEquals( '#config-2#', $instance->get_term_meta( $term_id, 'meta_key', TRUE ) );

		$instance->switch_active_configuration( 1 );

		$this->assertEquals( 1, $instance->active_config_number );

		$this->assertEquals( '#config-1#', $instance->get_term_meta( $term_id, 'meta_key', TRUE ) );
	}


	protected function unshift_metas( &$data ) {


		foreach ( $data as $idx => $value ) {

			$data[ $idx ] = [ $value ];
		}
	}

	/**
	 * @test
	 */
	public function it_should_transform_data_form_legacy_term_meta_to_wp_term_meta_format() {

		$term_id = $this->factory->term->create(
			[
				'taxonomy' => 'category'
			]
		);
		$term    = get_term( $term_id );

		$manager = new Migrator_Process_Manager(
			array_merge(
				[
					'term_meta_path' => [
						'%taxonomy%_%term_id%',
						'%meta_key%'
					],
				],

				$this->base_config()
			)
		);

		/**
		 * @var Migrate_Terms $instance
		 */
		$instance = $manager->factory( 'terms' );

		$default_terms = [
			'meta_key' => '#meta_value#',
		];

		add_option( "category_$term_id", $default_terms );


		$fake_response = array();
		$tm_new        = [
			'new_term_meta' => [ '33' ],
			'meta_key'      => [ 'update' ],
		];

		$sample_http_response = function () use ( $term, &$fake_response, $tm_new ) {


			$terms[ $term->term_id ]['term']      = array();
			$terms[ $term->term_id ]['term_meta'] = $tm_new;


			$fake_response = $terms;

			return [
				'success' => TRUE,
				'terms'   => $terms,
			];
		};

		add_filter( 'wp-migrator/http-request/result', $sample_http_response, 11, 3 );

		$instance->migrate( [
			'term'      => get_object_vars( $term ),
			'term_meta' => $this->get_instance()->get_term_meta( $term->term_id )
		] );

		$this->assertEquals( $default_terms, get_option( "category_$term_id" ) );


		$this->unshift_metas( $default_terms );
		$this->assertEquals( $default_terms, $instance->get_term_meta( $term_id ) );

		$instance->switch_active_configuration( 2 );

		$this->assertEquals( $tm_new, $instance->get_term_meta( $term_id ) );
	}
}
