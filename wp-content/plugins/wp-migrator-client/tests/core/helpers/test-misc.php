<?php


class tiny_helper_functions_Test extends WP_UnitTestCase {

	/**
	 * @covers mg_sanitize_file_name
	 */
	public function test_mg_sanitize_file_name() {

		$name = 'dir1.dir2.dir3.filename.php';

		$result = mg_sanitize_file_name( $name );

		$this->assertEquals( str_replace( '.', '/', $name ), $result );
	}


	/**
	 * @covers mg_asset
	 */
	public function test_mg_asset() {

		$asset_path = 'css/wp-migrator-panel.css';
		$plugin_dir = trim( plugin_basename( WP_MIGRATOR_PATH ), '/' );
		$plugin_url = untrailingslashit( WP_PLUGIN_URL );

		$this->assertEquals( "$plugin_url/$plugin_dir/assets/$asset_path", mg_asset( $asset_path ) );
	}


	/**
	 * @covers mg_current_controller
	 */
	public function test_mg_current_controller() {

		{ # Set active user

			$user_id = self::factory()->user->create( array( 'role' => 'administrator' ) );

			if ( ! did_action( 'admin_menu' ) ) {
				do_action( 'admin_menu' );
			}

			wp_set_current_user( $user_id );
		}

		{ # register  & fire a controller

			$unique_name = __METHOD__;

			$parent = 'themes.php';
			$slug   = $unique_name;


			$result = mg_admin_route(
				$parent, $slug, "_sample_controller_5@show", [], [
					'menu_title' => 'My Menu Title',
					'route_name' => $unique_name
				]
			);

			$this->assertTrue( $result, 'cannot add admin page #6' );


			$page_hook = "admin_page_$slug";

			do_action( $page_hook );
		}


		$this->assertSame( '_sample_controller_5', mg_current_controller() );
	}


	/**
	 * @covers  mg_ajax_url
	 *
	 * @depends test_mg_current_controller
	 */
	public function test_mg_ajax_url() {

		$parse_url = parse_url( mg_ajax_url() );

		if ( ! isset( $parse_url['path'] ) ) {
			$parse_url['path'] = '';
		}

		$queries = isset( $parse_url['query'] ) ? $parse_url['query'] : [];
		parse_str( $queries, $queries );

		$this->assertSame( site_url( admin_url( 'admin-ajax.php', 'relative' ) ), "$parse_url[scheme]://$parse_url[host]$parse_url[path]" );

		$controller = '_sample_controller_5';

		$this->assertEmpty( array_diff_assoc( [
			'_mgctrl'       => $controller,
			'_mgctrl_token' => wp_create_nonce( "migrator-controller-$controller" ),
		], $queries ), 'active controller should pass via ajax request' );
	}
}


class _sample_controller_5 extends Migrator_Controller {

	public function show() {


	}

}
