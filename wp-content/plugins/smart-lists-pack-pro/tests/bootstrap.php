<?php

function get( $name ) {

	$abspath = dirname( __FILE__ ) . '/data-providers';
	$name    = str_replace( '.', '/', $name );

	$data     = include "$abspath/$name.data.php";
	$expected = include "$abspath/$name.expected.php";


	return [
		$data,
		$expected
	];
}

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	// Root of current WP installation
	$_tests_dir = dirname( dirname( dirname( ( dirname( dirname( __FILE__ ) ) ) ) ) ) . '/wp-test/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {

	require dirname( dirname( __FILE__ ) ) . '/includes/content-parser.php';
	require dirname( dirname( __FILE__ ) ) . '/includes/libs/better-framework/functions/other.php';
}

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
