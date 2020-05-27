<?php


/**
 * @coversDefaultClass Migrate_Menus
 */
class Migrate_Menus_Test extends WP_UnitTestCase {


	/**
	 * Create a sample menu
	 *
	 * @param array $args
	 *
	 * @return int|\WP_Error
	 */
	public function create_menu( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'name'     => 'foo',
			'location' => 'primary-nav',
		) );

		$menu_id = wp_create_nav_menu( $args['name'] );

		// Set location

		if ( $args['location'] ) {

			$locations = get_theme_mod( 'nav_menu_locations', array() );
			$locations = array_merge( $locations, [
				$args['location'] => $menu_id,
			] );

			set_theme_mod( 'nav_menu_locations', $locations );
		}

		return $menu_id;
	}


	/**
	 * Append sample items to a menu
	 *
	 * @param int $menu_id
	 * @param int $items
	 *
	 * @return int
	 */
	public function menu_items( $menu_id, $items = 3 ) {

		$post_id = $this->factory->post->create( [ 'post_type' => 'page' ] );

		$menu_items = [];

		for ( $i = 1; $i <= $items; $i ++ ) {


			$item_id = $this->factory->post->create( [

				'post_type'  => 'nav_menu_item',
				'menu_order' => $i,
			] );

			add_post_meta( $item_id, '_menu_item_type', 'post_type' );
			add_post_meta( $item_id, '_menu_item_object_id', $post_id );
			add_post_meta( $item_id, '_menu_item_object', 'page' );


			$menu_items[] = $item_id;
		}

		foreach ( $menu_items as $menu_item ) {
			wp_set_object_terms( $menu_item, $menu_id, 'nav_menu', TRUE );
		}

		return $menu_items;
	}

	/**
	 * @return Migrate_Menus
	 */
	public function
	get_instance() {

		$instance = $this->get_manager_instance()->factory( 'menus' );

		return $instance;
	}


	/**
	 * @return Migrator_Process_Manager
	 */
	public function get_manager_instance() {

		static $instance;

		if ( ! $instance ) {

			$instance = new Migrator_Process_Manager( [
				'post_types'                  => [
					'post'
				],
				'product_type'                => 'theme',  # !important
				//
				'source_product_id'           => 'newspaper', # !important
				'source_product_version'      => '',
				//
				'destination_product_id'      => 'publisher',
				'destination_product_version' => '',

			] );
		}

		return $instance;
	}

	/**
	 * @test
	 */
	public function menu_migration_process_have_one_extra_step_for_migrate_menu_options() {

		$this->assertEquals( 1, $this->get_instance()->calculate_steps() );

		$this->menu_items( $this->create_menu() );

		$this->assertEquals( 2, $this->get_instance()->calculate_steps() );
	}

	/**
	 * @test
	 */
	public function menu_options_should_migrate_in_first_step() {

		$this->create_menu();

		$results = $this->get_instance()->migration_items();
		$this->assertNotEmpty( $results['menu_options'] );

		$this->get_instance()->config->config['current_step'] = 2;

		$results = $this->get_instance()->migration_items();
		$this->assertTrue( empty( $results['menu_options'] ) );

		$this->get_instance()->config->config['current_step'] = 1;
	}


	/**
	 * @test
	 */
	public function pass_menu_items_to_migrator() {

		$menu_id     = $this->create_menu();
		$menu_items  = $this->menu_items( $menu_id, 2 );
		$posted_data = [];

		Migrator_Core_Connector::$compress = FALSE;
		add_filter( 'wp-migrator/http-request/result', function ( $res, $url, $args ) use ( &$posted_data ) {

			if ( isset( $args['body']['data']['menus'] ) ) {
				$posted_data = $args['body']['data']['menus'];
			}

			return [];

		}, 10, 3 );


		$this->get_instance()->config->config['current_step'] = 2;

		$results = $this->get_instance()->migrate( $this->get_instance()->migration_items() );


		$expected = [];

		foreach ( $menu_items as $menu_item ) {

			$menu = get_post( $menu_item, ARRAY_A );

			unset( $menu['tags_input'] );
			unset( $menu['post_category'] );
			unset( $menu['page_template'] );
			unset( $menu['ancestors'] );

			$menu_meta = get_post_meta( $menu_item );

			$expected[ $menu_item ] = compact( 'menu', 'menu_meta' );
		}

		$this->assertEquals( $expected, $posted_data );

		$this->get_instance()->config->config['current_step'] = 1;
	}

	/**
	 * @test
	 */
	public function test_migrate_menu_options() {

		$menu_id = $this->create_menu( [
			'name'     => 'foo',
			'location' => 'primary'
		] );
		$this->menu_items( $menu_id, 1 );

		$menu_id2 = $this->create_menu( [
			'name'     => 'foo 2',
			'location' => 'secondary'
		] );

		$expected_locations = [
			'primary'   => $menu_id,
			'secondary' => $menu_id2,
		];

		Migrator_Core_Connector::$compress = FALSE;

		add_filter( 'wp-migrator/http-request/result', function ( $res, $url, $args ) use ( &$expected_locations ) {

			// Fake response

			$new_locations = [
				'footer' => $this->create_menu( [ 'name' => 'foo 3', 'location' => FALSE ] ),
			];

			$res['menus'] = [
				'menu_options' => [
					'locations' => $new_locations
				]
			];

			$expected_locations = array_merge( $expected_locations, $new_locations );


			return $res;

		}, 10, 3 );


		$items   = $this->get_instance()->migration_items();
		$results = $this->get_instance()->migrate( $items );

		$this->assertSame( 1, $results );

		$this->assertEquals( $expected_locations, get_theme_mod( 'nav_menu_locations' ) );
	}
}
