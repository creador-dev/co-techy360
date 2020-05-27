<?php


class mg_view_function_Test extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();


		add_filter( 'wp-migrator/core/view-dir', [ __CLASS__, 'root_path' ] );
	}


	public static function root_path() {

		return WPMG_SAMPLE_TEST_DIR . '/views';
	}


	/**
	 * @test
	 *
	 * @expectedException BS_Exception
	 * @expectedExceptionCode file_not_found
	 */
	public function load_not_existing_file() {


		mg_view( 'file.name', [], [
			'error_type' => BS_Error_handler::THROW_ERROR,
		] );
	}


	/**
	 * @test
	 *
	 * @expectedException BS_Exception
	 * @expectedExceptionCode  invalid_file_name
	 */
	public function invalid_file_name_must_throw_an_exception() {

		mg_view( [ 1, 2 ], [], [
			'error_type' => BS_Error_handler::THROW_ERROR,
		] );
	}


	/**
	 * @test
	 */
	public function load_valid_file_with_standard_slash_notation_in_file_name() {

		$echo = FALSE;

		$loaded = mg_view( 'layouts/sample-view-file', [], compact( 'echo' ) );

		$this->assertEquals( 'view', $loaded );


		$root   = self::root_path() . '/layouts';
		$loaded = mg_view( 'sample-view-file', [], compact( 'echo', 'root' ) );

		$this->assertEquals( 'view', $loaded );
	}


	/**
	 * @test
	 */
	public function load_valid_file_with_dot_notation_in_file_name() {

		$echo = FALSE;

		$loaded = mg_view( 'layouts.sample-view-file', [], compact( 'echo' ) );

		$this->assertEquals( 'view', $loaded );
	}


	/**
	 * @test
	 */
	public function pass_variables_to_view() {

		$echo = FALSE;

		$var1 = '-aaa';
		$var2 = '-xyz';

		$loaded = mg_view( 'layouts.sample-view-file', compact( 'var1', 'var2' ), compact( 'echo' ) );

		$this->assertEquals( 'view' . $var1 . $var2, $loaded );
	}


	function tearDown() {

		parent::tearDown();

		remove_filter( 'wp-migrator/core/view-dir', [ __CLASS__, 'root_path' ] );

	}
}
