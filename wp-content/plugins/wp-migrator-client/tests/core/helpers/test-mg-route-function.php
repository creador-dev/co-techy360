<?php


class mg_route_function_Test extends WP_UnitTestCase {

	public $user_id;


	function setUp() {

		parent::setUp();

		$this->user_id = self::factory()->user->create( array( 'role' => 'administrator' ) );

		if ( ! did_action( 'admin_menu' ) ) {
			do_action( 'admin_menu' );
		}

		wp_set_current_user( $this->user_id );
	}


	/**
	 * @test
	 */
	public function not_defined_route_should_return_nothing() {

		$undefined_route = 'name_123';

		$result = mg_route( $undefined_route );

		$this->assertEmpty( $result );


		$result = mg_route( $undefined_route, [ 'a' => 'x', 'b' => 'y' ] );

		$this->assertEmpty( $result );

	}


	/**
	 * @test
	 *
	 * @covers mg_route
	 */
	public function check_named_route_permalink() {


		if ( ! did_action( 'admin_menu' ) ) {
			do_action( 'admin_menu' );
		}

		$slug = 'custom-menu-slug-4';

		$return = mg_admin_route(
			'tools.php', $slug, '__return_empty_string', array(), [
				'menu_title' => 'Menu Title',
				'route_name' => 'route_name_4',
				'error_type' => BS_Error_handler::THROW_ERROR
			]
		);

		$this->assertTrue( $return );

		$this->assertEquals( mg_route( 'route_name_4' ), menu_page_url( $slug, FALSE ) );
	}


	/**
	 * @test
	 *
	 * @covers  mg_route
	 *
	 * @depends check_named_route_permalink
	 */
	public function check_it_with_http_query_args() {

		$query_args = [ 'member_1' => 'ali', 'member_2' => 'aboli' ];

		$url = menu_page_url( 'custom-menu-slug-4', FALSE );

		$this->assertEquals( mg_route( 'route_name_4', $query_args ), add_query_arg( $query_args, $url ) );

	}


	function tearDown() {

		parent::tearDown();

		wp_set_current_user( 0 );
	}
}
