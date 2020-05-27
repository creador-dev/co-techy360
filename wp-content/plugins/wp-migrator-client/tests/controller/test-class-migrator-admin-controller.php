<?php


/**
 * @coversDefaultClass Migrator_Admin_Controller
 */


class Migrator_Admin_Controller_Ajax_Test extends WP_Ajax_UnitTestCase {

	public function setUp() {

		parent::setUp();

		mg_fire( 'Migrator_Admin_Controller@__construct', [], $callback );
	}


	/**
	 * @covers ::ajax_get_migration_steps
	 *
	 * @dataProvider process_manage_data
	 *
	 * @param $config
	 */
	public function test_ajax_get_migration_steps( $config ) {

		$instance = new Migrator_Process_Manager( $config );

		try {

			$_GET = array(
				'product'  => 'theme:newspaper:publisher',
				'settings' => array(),
			);

			foreach ( $instance->processors as $id => $_ ) {

				$_GET['settings']['migrate'][ $id ] = 'active';
			}

			$this->_handleAjax( 'migration_steps' );

			$this->markTestIncomplete();

		} catch( Exception $e ) {

			$response = json_decode( $this->_last_response, TRUE );

			if ( ! isset( $response['data']['steps'] ) ) {
				$this->fail( 'Cannot fetch migration steps' );
			}

			$data = $response['data'];


			$expected = array();

			foreach ( $instance->processors as $id => $class ) {
				$expected['steps'][ $id ] = $instance->factory( $id )->calculate_steps();
			}

			$migration_id = $data['migration_id'];
			unset( $data['migration_id'] );

			$this->assertEquals( $expected, $data );

			$this->assertTrue( (bool) preg_match( '/^\w{8}\-\w{4}\-\w{4}\-\w{4}\-\w{12}$/', $migration_id ) );
		}
	}


	/**
	 * @covers ::ajax_do_migration
	 *
	 * @test
	 */
	public function migration_process_ajax_action_should_handle_request() {

		add_filter( 'wp-migrator/migrating/backup', '__return_false' );

		$requested_urls = [];

		try {

			$this->factory->post->create( [ 'post_type' => 'post', 'post_status' => 'publish' ] );

			$_GET = array(
				'product'      => 'theme:newspaper:publisher',
				'current_type' => 'posts',
				'current_step' => '1',
			);


			add_filter( 'wp-migrator/http-request/result', function ( $res, $url, $args ) use ( &$requested_urls ) {

				$requested_urls[] = $url;

				return $res;

			}, 10, 3 );

			$this->_handleAjax( 'migration_process' );

			$this->markTestIncomplete();

		} catch( Exception $e ) {

			$response = json_decode( $this->_last_response, TRUE );

			$must_requested = [
				str_replace( '%ep%', 'config', Migrator_Core_Connector::$uri ),  # source product config
				str_replace( '%ep%', 'config', Migrator_Core_Connector::$uri ),  # destination product config
				str_replace( '%ep%', 'migrate', Migrator_Core_Connector::$uri ), # migration process
			];

			$this->assertTrue( $response['success'] );

			$this->assertSame( $must_requested, $requested_urls, 'migration_process ajax action must fetch configuration & migration information from remote server.' );
		}
	}

	/**
	 * todo: add more data
	 */
	public function process_manage_data() {

		return [

			[
				[
					'post_types' => [ 'post' ],
					'taxonomies' => [ 'category' ],
				]
			]
		];
	}
}


/**
 * @coversDefaultClass Migrator_Admin_Controller
 */
class Migrator_Admin_Controller_Test extends WP_UnitTestCase {

	public $user_id;


	function setUp() {

		parent::setUp();

		$this->user_id = self::factory()->user->create( array( 'role' => 'administrator' ) );

		wp_set_current_user( $this->user_id );
	}


	/**
	 * @test
	 *
	 * @covers ::enqueue_static_files
	 */
	public function migrator_panel_css_file_must_attach_just_in_dedicated_page() {

		wp_styles()->done = array();

		unset( wp_styles()->registered['wp-migrator-panel'] );

		$url = mg_asset( 'css/wp-migrator-panel.css' );

		$pattern = "#<link \s+ rel='stylesheet' .*?  href='$url\?ver=.*?' \s+ type='text/css' \s+#isx";

		$this->assertNotRegExp( $pattern, get_echo( 'wp_print_styles' ), 'wp-migrator-panel.css should not include in every wp-admin single pages!' );

		mg_fire( 'Migrator_Admin_Controller@index' );

		$this->assertRegExp( $pattern, get_echo( 'wp_print_styles' ), 'wp-migrator-panel.css must load in migrator admin panel' );
	}


	/**
	 * @test
	 *
	 * @covers ::enqueue_static_files
	 */
	public function migrator_js_file_must_attach_in_migration_page() {

		wp_scripts()->done = array();

		unset( wp_scripts()->registered['wp-migrator'] );

		$url = mg_asset( 'js/wp-migrator.js' );

		$pattern = "#<script \s+ type='text/javascript' .*?  src='$url\?ver=.*?'\s*\>#isx";

		$this->assertNotRegExp( $pattern, get_echo( 'wp_print_scripts' ), 'wp-migrator.js should not load in all wp-admin pages' );

		mg_fire( 'Migrator_Admin_Controller@index' );

		$this->assertRegExp( $pattern, get_echo( 'wp_print_scripts' ), 'wp-migrator.js must load in migrator admin panel.' );
	}


	/**
	 * @test
	 *
	 * @covers ::enqueue_static_files
	 */
	public function migrator_localize_script_script_should_load_in_dedicated_page() {

		wp_scripts()->done = array();

		unset( wp_scripts()->registered['wp-migrator'] );

		$pattern = "#<script \s+ type='text/javascript'\s*\>.*?var \s* wp_migrator_loc\s*=\s* (?:\{|\[)#isx";

		$this->assertNotRegExp( $pattern, get_echo( 'wp_print_scripts' ), 'Localization script should not load in all wordpress admin panel!' );

		mg_fire( 'Migrator_Admin_Controller@index' );

		$this->assertRegExp( $pattern, get_echo( 'wp_print_scripts' ), 'Localization script not found!' );

	}


	/**
	 * @test
	 *
	 * @covers ::enqueue_static_files
	 */
	public function migrator_font_awesome_css_file_must_attach_just_in_dedicated_page() {

		wp_styles()->done = array();

		unset( wp_styles()->registered['font-awesome'] );

		$pattern = "#<link \s+ rel='stylesheet' .*? id='font-awesome-css' \s+#isx";

		$this->assertNotRegExp( $pattern, get_echo( 'wp_print_styles' ), 'font-awesome should not include in every wp-admin single pages!' );

		mg_fire( 'Migrator_Admin_Controller@index' );

		$this->assertRegExp( $pattern, get_echo( 'wp_print_styles' ), 'font-awesome should load in migrator admin panel' );
	}


	/**
	 * @test
	 */
	public function themes_list_should_fetch_from_server() {

		$html   = mg_fire( 'Migrator_Admin_Controller@index' );
		$themes = Migrator_Connector::products_list( 0, 4 )['themes'];

		foreach ( $themes as $theme ) {
			$this->assertContains( $theme['name'], $html );
		}
	}


	function tearDown() {

		parent::tearDown();

		wp_set_current_user( 0 );
	}

	/**
	 * @test
	 */

	//	public function theme_info_should_fetch_from_server() {
	//
	//		$theme = Migrator_Connector::themes_list( 0, 1 )['themes'][0];
	//
	//		mg_fire( 'Migrator_Admin_Controller@migrate_theme', [ $theme['id'] ] );
	//		$fired = FALSE;
	//		add_action( 'wp-migrator/http-request/result', function ( $response ) use ( &$fired ) {
	//
	//			var_dump( $response );
	//			exit;
	//
	//			return $response;
	//		} );
	//
	//	}


}

