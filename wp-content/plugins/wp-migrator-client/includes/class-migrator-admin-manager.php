<?php


/**
 * WordPress Migrator Main Class
 *
 * @since     1.0.0
 *
 * @package   WP-Migrator/Admin_Manager
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */
class Migrator_Admin_Manager {

	/**
	 * User capability to access any migrator features
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public static $user_cap = 'manage_options';


	public static function Run() {

		add_action( 'after_setup_theme', 'Migrator_Admin_Manager::admin_page_view' );
	}


	public static function admin_page_view() {

		$menu_title = class_exists( 'Publisher' ) ? __( 'Publisher Migrator', WPMG_LOC ) : __( 'WordPress Migrator', WPMG_LOC );

		$route_name = 'migrate';

		mg_admin_route(
			class_exists( 'Publisher' ) ? 'bs-product-pages-welcome' : 'index.php',
			WPMG_LOC,
			'Migrator_Admin_Controller@index',
			array(
				'item' => '@migrate'
			),
			compact( 'menu_title', 'route_name' )
		);
	}
}
