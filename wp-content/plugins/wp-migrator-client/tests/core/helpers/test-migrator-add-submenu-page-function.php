<?php


class Migrator_Add_Submenu_Page_Function_Test extends WP_UnitTestCase {

	public $user_id;


	function setUp() {

		parent::setUp();

		$this->user_id = self::factory()->user->create( array( 'role' => 'administrator' ) );

		wp_set_current_user( $this->user_id );
	}


	/**
	 * @test
	 *
	 * @covers migrator_add_submenu_page
	 * @covers _migrator_submenu_page_callback
	 */
	public function arguments_must_pass_to_specified_callback() {

		$class  = '_sample_controller_3';
		$method = 'show';

		$parent_slug = 'index.php';
		$page_title  = 'page-title';
		$menu_title  = 'page-title';
		$capability  = 'manage_options';
		$menu_slug   = 'custom-slug';
		$arguments   = [ [ 1, 2, 3 ], 'string' ];

		$mock = $this->createMock( $class );
		$mock->expects( $this->once() )
		     ->method( $method )
		     ->with( $this->equalTo( $arguments[0] ), $this->equalTo( $arguments[1] ) );


		$function = array( $mock, $method );

		$hook = migrator_add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function, $arguments );

		$this->assertNotFalse( $hook );

		$this->assertInternalType( 'string', $hook );

		do_action( $hook );
	}


	/**
	 * @test
	 *
	 * @covers _migrator_submenu_page_callback
	 */

	public function if_user_is_in_a_sub_page_then_the_associated_callback_must_call() {

		global $mg_routes_sub_pages;

		$var1 = '123';

		$parent_slug = 'plugins.php';
		$page_title  = 'sample';
		$menu_title  = 'sample';
		$capability  = 'manage_options';

		$menu_slug = 'wp-migrator-6';

		$mock = $this->createMock( '_sample_controller_3' );

		$mock->expects( $this->once() )
		     ->method( 'sub_page_1' )
		     ->with( $this->equalTo( $var1 ) );

		$mock->expects( $this->never() )
		     ->method( 'main' );

		$hook = migrator_add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, [
			$mock,
			'main'
		] );


		$this->assertTrue( TRUE );

		$_REQUEST['var1'] = $var1;

		$mg_routes_sub_pages[ $hook ] = [
			'var1' => array( $mock, 'sub_page_1' ),
		];


		do_action( $hook );

		unset( $_REQUEST['var1'] );
	}




	/**
	 * @test
	 *
	 * @covers migrator_add_submenu_page
	 */
	public function callback_should_not_call_when_user_is_not_in_the_sub_menu_page() {

		$class  = '_sample_controller_3';
		$method = 'show';

		$parent_slug = 'index.php';
		$page_title  = 'page-title';
		$menu_title  = 'page-title';
		$capability  = 'manage_options';
		$menu_slug   = 'custom-slug2';

		$mock = $this->createMock( $class );
		$mock->expects( $this->never() )
		     ->method( $method );

		$function = array( $mock, $method );

		$hook = migrator_add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

		$this->assertNotFalse( $hook );
		$this->assertInternalType( 'string', $hook );
	}


	function tearDown() {

		parent::tearDown();

		wp_set_current_user( 0 );
	}
}


class _sample_controller_3 extends Migrator_Controller {

	public function show() {


	}


	public function sub_page_1() {


	}


	public function main() {


	}
}
