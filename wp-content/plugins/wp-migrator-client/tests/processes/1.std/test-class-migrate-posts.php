<?php


/**
 * @coversDefaultClass Migrate_Posts
 */
class Migrate_Posts_Test extends WP_UnitTestCase {


	public function setUp() {

		parent::setUp();

		add_filter( 'wp-migrator/migrating/resume-enabled', '__return_false' );
	}

	/**
	 * @return Migrate_Posts
	 */
	public function get_instance() {

		$instance = $this->get_manager_instance()->factory( 'posts' );

		return $instance;
	}

	/**
	 * @return Migrator_Process_Manager
	 */
	public function get_manager_instance() {

		static $instance;

		if ( ! $instance ) {

			$product_id   = 'newspaper';
			$product_type = 'theme';

			$instance = new Migrator_Process_Manager( [
				'post_types'                  => [
					'post'
				],
				'product_type'                => $product_type,  # !important
				//
				'source_product_id'           => $product_id, # !important
				'source_product_version'      => '',
				//
				'destination_product_id'      => 'publisher',
				'destination_product_version' => '',

				'resumable_value' => mg_generate_uuid4(),
			] );
		}

		return $instance;
	}


	/**
	 * @test
	 *
	 * @covers $fillable_fields
	 */
	public function test_fillable_properties() {


		$this->assertEquals( [
			'post_title',
			'post_content',
		], $this->get_instance()->fillable_fields );
	}


	/**
	 * @test
	 *
	 * @covers ::calculate_steps
	 */

	public function a_few_posts_convert_in_single_request() {

		$this->factory->post->create();

		$this->assertEquals( 1, $this->get_instance()->calculate_steps() );
	}


	/**
	 * @test
	 * @depends a_few_posts_convert_in_single_request
	 *
	 * @covers ::calculate_steps
	 */
	public function a_lot_of_posts_will_convert_in_multiple_processes() {

		$this->factory->post->create_many( 20 );

		$this->assertGreaterThanOrEqual( 4, $this->get_instance()->calculate_steps() );
	}


	/**
	 * @test
	 *
	 * @covers ::migration_items
	 */
	public function all_posts_must_pass_for_migration_process() {

		add_filter( 'wp-migrator/migrating/resume-enabled', '__return_false' );

		$instance = $this->get_instance();

		$all_posts = $this->factory->post->create_many( 20 );

		$total_steps    = $instance->calculate_steps();
		$returned_posts = array();

		for ( $step = 1; $step <= $total_steps; $step ++ ) {

			$this->before_migration( $step );

			$instance->config->config['current_step'] = $step;

			$items_id = array_keys( $instance->migration_items() );

			$returned_posts = array_merge(
				$returned_posts,
				$items_id
			);

			$this->after_migration( $step, $items_id );
		}

		$returned_posts = array_unique( $returned_posts );

		sort( $all_posts );
		sort( $returned_posts );

		$this->assertEquals( $all_posts, $returned_posts );

		$instance->config->config['current_step'] = $step + 1;

		$items = array_filter( $instance->migration_items() );

		$this->assertEmpty( $items );

		$instance->config->config['current_step'] = 1;
	}


	/**
	 * @param int   $step
	 * @param array $posts_id
	 */
	public function after_migration( $step, $posts_id ) {

	}


	/**
	 * @param int $step
	 */
	public function before_migration( $step ) {

	}

	/**
	 * @test
	 */
	public function migrate_method_should_post_whole_post_object_and_metas() {

		$posts_id = $this->factory->post->create_many( 10 );

		$data2post       = array();
		$catch_post_data = function ( $res, $url, $args ) use ( &$data2post ) {

			$data2post = $args['body'];

			if ( ! empty( $data2post['data']['posts'] ) ) {  # unset post modified data

				foreach ( $data2post['data']['posts'] as $post_id => $post ) {

					unset( $data2post['data']['posts'][ $post_id ]['post']->post_modified );
					unset( $data2post['data']['posts'][ $post_id ]['post']->post_modified_gmt );
				}
			}

			return $res;
		};

		Migrator_Core_Connector::$compress = FALSE;
		add_filter( 'wp-migrator/http-request/result', $catch_post_data, 10, 3 );

		$posts = $this->get_instance()->migration_items();
		//
		$expected_data2post = $posts;

		$this->get_instance()->migrate( $posts );
		Migrator_Core_Connector::$compress = TRUE;

		$this->assertEquals( array( 'posts' => $expected_data2post ), $data2post['data'] );
	}


	/**
	 * @test
	 *
	 * @depends migrate_method_should_post_whole_post_object_and_metas
	 */

	public function migrator_should_receive_migrated_data_in_standard_expected_format() {

		$posts_id = $this->factory->post->create_many( 3 );

		foreach ( $posts_id as $post_id ) {
			add_post_meta( $post_id, 'td_sidebar_position', 'no_sidebar' );
		}

		$response       = array();
		$catch_response = function ( $res, $url, $args ) use ( &$response ) {

			$response = $res;

			return $res;
		};

		Migrator_Core_Connector::$compress = FALSE;
		add_filter( 'wp-migrator/http-request/result', $catch_response, 10, 3 );

		$this->get_instance()->migrate( $this->get_instance()->migration_items() );
		Migrator_Core_Connector::$compress = TRUE;

		if ( empty( $response['posts'] ) ) {
			$this->markTestSkipped();
		}

		foreach ( $posts_id as $post_id ) {
			$this->assertTrue( isset( $response['posts'][ $post_id ]['post'] ) );
			$this->assertTrue( isset( $response['posts'][ $post_id ]['post_meta'] ) );
		}
	}


	/**
	 * @test
	 */
	public function migrate_method_should_update_old_data_and_insert_new_data() {

		$this->factory->post->create_many( 10 );

		$items         = $this->get_instance()->migration_items();
		$fake_response = array();

		$sample_http_response = function () use ( $items, &$fake_response ) {

			$posts = array();
			$faker = Faker\Factory::create();

			foreach ( $items as $item ) {

				$post_id = $item['post']['ID'];

				$new_post_fields = [

					'post_title'   => $faker->sentence( 2 ),
					'post_content' => $faker->text,
				];

				$pm_update = [];
				$pm_new    = [];

				$post_meta        = array_slice( $item['post_meta'], 0, rand( 3, 6 ) );
				$meta_keys2update = array_keys( $post_meta );

				foreach ( $meta_keys2update as $meta_key ) {

					$new_post_metas[ $meta_key ] = $faker->sentence;
				}

				$pm_new['__new_post_meta__'] = [ range( 1, 3 ) ];

				// Update post meta
				$posts[ $post_id ]['post']      = $new_post_fields;
				$posts[ $post_id ]['post_meta'] = array_merge( $pm_update, $pm_new );
			}

			$fake_response = $posts;

			return [
				'success' => TRUE,
				'posts'   => $posts,
			];
		};

		Migrator_Core_Connector::$compress = FALSE;

		add_filter( 'wp-migrator/http-request/result', $sample_http_response, 11, 3 );

		$results = $this->get_instance()->migrate( $this->get_instance()->migration_items() );

		Migrator_Core_Connector::$compress = TRUE;


		$this->assertSame( count( $items ), $results );

		foreach ( $items as $before_update ) {

			$id = $before_update['post']['ID'];

			$post_after_update = get_post( $id );

			$new_post_fields = array_intersect_key( get_object_vars( $post_after_update ), $fake_response[ $id ]['post'] );
			$this->assertEquals( $fake_response[ $id ]['post'], $new_post_fields, 'Post was not updated!' );


			$new_post_meta_status = array_intersect_key( get_post_meta( $id ), $fake_response[ $id ]['post_meta'] );

			$this->assertEquals(
				$fake_response[ $id ]['post_meta'],
				map_deep( $new_post_meta_status, 'maybe_unserialize' ),
				'Post meta was not updated!'
			);
		}
	}


	/**
	 * @test
	 */
	public function backup_process_should_works_perfectly_fine() {

		Migrator_Backup::install();

		$instance = $this->get_instance();

		$post_id  = $this->factory->post->create();
		$post_org = get_post( $post_id );

		add_post_meta( $post_id, 'sample', '#1' );

		$posts = [

			$post_id => [
				'post'      => get_object_vars( get_post( $post_id ) ),
				'post_meta' => get_post_meta( $post_id )
			]
		];

		$backed_up = $instance->migration_backup( $posts );

		$this->assertTrue( $backed_up );

		$faker = Faker\Factory::create();
		//
		$post_title    = $faker->sentence( 2 );
		$post_content  = $faker->sentence( 10 );
		$fields2update = compact( 'post_title', 'post_content' );

		$updated = wp_update_post( array_merge(
			[
				'ID' => $post_id,
			],
			$fields2update
		) );


		$this->assertEquals( $post_id, $updated );

		update_post_meta( $post_id, 'sample', '#2' );

		add_post_meta( $post_id, 'new-post-meta', 1 );

		$restored = $instance->migration_restore( $post_id );

		$this->assertTrue( $restored );

		$post = get_post( $post_id );

		unset( $post_org->post_modified );
		unset( $post_org->post_modified_gmt );
		unset( $post->post_modified );
		unset( $post->post_modified_gmt );

		$this->assertEquals( $post_org, $post );
		$this->assertEquals( '#1', get_post_meta( $post_id, 'sample', TRUE ) );
		$this->assertEmpty( get_post_meta( $post_id, 'new-post-meta', TRUE ) );

		$this->assertNull( Migrator_Backup::find( $post_id, 'post' ) );
		$this->assertNull( Migrator_Backup::find( $post_id, 'post_meta' ) );
	}
}

