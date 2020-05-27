<?php
/*
 * Plugin Name: Publisher Migrator
 * Description: Switch to Publisher without losing data or shortcodes
 * Author: BetterStudio
 * Plugin URI: http://betterstudio.com
 * Version: 1.1.0
 * Author URI: http://betterstudio.com/
*/

require 'bootstrap.php';


/**
 * WordPress Migrator Main Class
 *
 * @since     1.0.0
 *
 * @package   WP-Migrator
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */
class Migrator_Client {

	/**
	 * Semantic Version of the library
	 *
	 * @link  http://semver.org/
	 *
	 * @since 1.0.0
	 */
	CONST VERSION = '1.1.0';


	/**
	 * Initialize WordPress Migrator Plugin
	 *
	 * @since 1.0.0
	 */
	public static function Run() {

		if ( is_admin() ) {

			Migrator_Admin_Manager::Run();

			register_activation_hook( __FILE__, array( __CLASS__, 'setup' ) );

			include WP_MIGRATOR_PATH . '/includes/class-migrator-notification.php';
		}
	}


	/**
	 * Install required tables
	 *
	 * @since 1.0.0
	 */
	public static function setup() {

		Migrator_Backup::install();

		Migrator_Notification::theme_migrate_notification();
	}

}


Migrator_Client::Run();
