<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Wp_Migrator_Client
 */


define( 'WPMG_SAMPLE_TEST_DIR', dirname( __FILE__ ) . '/samples' );

require dirname( __FILE__ ) . '/vendor/autoload.php';
require dirname( __FILE__ ) . '/functions.php';


$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/Applications/MAMP/htdocs/wp-test/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {

	require dirname( dirname( __FILE__ ) ) . '/wp-migrator-client.php';
}

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
