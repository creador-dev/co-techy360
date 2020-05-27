<?php


class mg_admin_route_function_Ajax_Test extends WP_Ajax_UnitTestCase {

	/**
	 * @test
	 */
	public function active_controller_should_detect_in_ajax_request() {

		global $_sample_controller_2;

		$_sample_controller_2 = [];

		$controller = '_sample_controller_4';
		$_REQUEST   = array(

			'action'        => 'dont-care',
			'_mgctrl'       => $controller,
			'_mgctrl_token' => wp_create_nonce( "migrator-controller-$controller" ),
		);

		if ( ! did_action( 'admin_init' ) ) {
			do_action( 'admin_init' );
		}

		$this->assertEquals( $controller, mg_current_controller() );
	}


	/**
	 * @test
	 *
	 * @depends active_controller_should_detect_in_ajax_request
	 */
	public function controller_will_fire_in_ajax_requests() {

		global $_sample_controller_2;


		$this->assertArrayHasKey( 'ajax_init', $_sample_controller_2 );
	}
}


class mg_admin_route_function_Test extends WP_UnitTestCase {

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
	 *
	 * @covers mg_admin_route
	 */
	public function check_with_array_input_callback() {

		$args = array(
			0 => 'index . php',
			1 => 'wp - migrator',
			2 =>
				array(
					0 => '_sample_controller_2',
					1 => 'show',
				),
			3 => array(),
			4 =>
				array(
					'capability' => 'manage_options',
					'error_type' => 4,
					'page_title' => '',
					'menu_title' => 'WordPress Migrator',
				),
		);

		$result = call_user_func_array( 'mg_admin_route', $args );

		$this->assertTrue( $result, 'cannot add admin page #1' );
	}


	/**
	 * @test
	 * @expectedException BS_Exception
	 * @expectedExceptionCode invalid-callback
	 *
	 * @covers                mg_admin_route
	 */
	public function passing_invalid_callback_must_throw_and_exception() {

		mg_admin_route(
			'index.php', 'sample_slug', 'we are better', array(), [
				'error_type' => BS_Error_handler::THROW_ERROR,
				'menu_title' => '1234'
			]
		);
	}


	/**
	 * @test
	 *
	 * @expectedException BS_Exception
	 * @expectedExceptionCode  empty-menu_title
	 * @covers                 mg_admin_route
	 */
	public function menu_title_is_a_require_option() {


		mg_admin_route(
			'index.php', 'sample_slug', '_sample_controller_2@show', array(), [ 'error_type' => BS_Error_handler::THROW_ERROR ]
		);
	}


	/**
	 * @test
	 * @covers mg_admin_route
	 */
	public function register_valid_route() {

		$return = mg_admin_route(
			'index.php', 'sample_slug', '_sample_controller_2@show', array(), [
				'error_type' => BS_Error_handler::THROW_ERROR,
				'menu_title' => 'My Menu Title'
			]
		);

		$this->assertTrue( $return, 'cannot add admin page #2' );
	}


	/**
	 * @test
	 *
	 * @covers mg_admin_route
	 */
	public function named_route_information_must_store_in_global_variable() {

		global $mg_named_routes;

		$mg_named_routes = [];

		$parent = 'tools.php';
		$slug   = 'wp-migrator-2';


		$return = mg_admin_route(
			$parent, $slug, '_sample_controller_2@show', array(), [
				'menu_title' => 'My Menu Title',
				'route_name' => 'route_name_1'
			]
		);

		$this->assertTrue( $return, 'cannot add admin page #3' );

		$this->assertSame( $mg_named_routes, [
			'route_name_1' => $slug,
		], 'there is a problem with named routing' );
	}


	/**
	 * @test
	 */

	public function sub_pages_of_it_should_store_in_global_variable() {

		global $mg_routes_sub_pages;

		$mg_routes_sub_pages = array();


		$parent = 'themes.php';
		$slug   = 'wp-migrator-3';


		$sub_pages = [
			'a' => function () {

				return TRUE;
			},

			'b' => 'ctrl@method',
			'c' => '@method_2'
		];


		$return = mg_admin_route(
			$parent, $slug, '_sample_controller_3@show', $sub_pages, [
				'menu_title' => 'My Menu Title',
				'route_name' => 'route_name_2'
			]
		);

		$this->assertTrue( $return, 'cannot add admin page #4' );

		$this->assertSame( [ 'admin_page_wp-migrator-3' => $sub_pages ], $mg_routes_sub_pages, 'there is a problem with sub pages' );
	}


	/**
	 * @test
	 *
	 * @covers mg_admin_route
	 */
	public function sub_pages_will_determine_with_query_arg() {

		self::factory();
		global $_sample_controller_2;

		$parent = 'themes.php';
		$slug   = 'wp-migrator-4';


		$sub_pages = [

			'pg2' => '@page_2',
			'pg3' => '@page_3',
		];

		$_REQUEST['pg2'] = 'true';

		$result = mg_admin_route(
			$parent, $slug, '_sample_controller_4@page_1', $sub_pages, [
				'menu_title' => 'My Menu Title',
				'route_name' => __METHOD__
			]
		);

		$this->assertTrue( $result, 'cannot add admin page #5' );


		$page_hook = "admin_page_$slug";

		$_sample_controller_2 = [];

		do_action( $page_hook );

		unset( $_REQUEST['pg2'] );

		$this->assertArrayNotHasKey( 'page_1', $_sample_controller_2, 'Route sub pages is not working' );

		$this->assertEquals( [
			'page_2' => [
				[
					'true'
				],
			]
		], $_sample_controller_2, 'something in router sub page handler is wrong ' );
	}


	function tearDown() {

		parent::tearDown();

		wp_set_current_user( 0 );
	}
}


class _sample_controller_2 extends Migrator_Controller {

	public function show() {

	}

}


class _sample_controller_4 extends Migrator_Controller {


	public function __call( $method, $arguments ) {

		global $_sample_controller_2;

		$_sample_controller_2[ $method ][] = $arguments;
	}


	public function ajax_init() {

		global $_sample_controller_2;

		$_sample_controller_2['ajax_init'][] = func_get_args();

	}
}

