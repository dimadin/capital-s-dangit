<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Capital_S_Dangit
 */

$capital_s_dangit_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $capital_s_dangit_tests_dir ) {
	$capital_s_dangit_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $capital_s_dangit_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $capital_s_dangit_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // WPCS: XSS ok.
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $capital_s_dangit_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function capital_s_dangit_manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/capital-s-dangit.php';
}
tests_add_filter( 'muplugins_loaded', 'capital_s_dangit_manually_load_plugin' );

// Start up the WP testing environment.
require $capital_s_dangit_tests_dir . '/includes/bootstrap.php';
