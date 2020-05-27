<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Wp_Migrator_Client
 */


//require dirname( __FILE__ ) . '/vendor/autoload.php';
require dirname( __FILE__ ) . '/functions.php';


$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/Users/aboli/Sites/wp-test/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

function _load_bf() {

	require_once dirname( __DIR__ ) . '/init.php';

	// load elementor plugin
}

function _register_bf() {

	$dir = dirname( dirname( __FILE__ ) );

	if ( preg_match( '#(/wp-content/.+)#', $dir, $match ) ) {
		$rel_path = $match[1];
	} else {
		$rel_path = $dir;
	}


	return array(
		array(
			'version' => '3.0.1',
			'path'    => $dir . '/',
			'uri'     => home_url( $rel_path ),
		)
	);
}

tests_add_filter( 'better-framework/loader', '_register_bf' );
tests_add_filter( 'muplugins_loaded', '_load_bf' );

// Start up the WP testing environment.

require $_tests_dir . '/includes/bootstrap.php';
