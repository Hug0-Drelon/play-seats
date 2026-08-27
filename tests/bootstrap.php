<?php
/**
 * PHPUnit bootstrap.
 *
 * @package PlaySeats
 */

use Yoast\WPTestUtils\WPIntegration;

require_once dirname( __DIR__ ) . '/vendor/yoast/wp-test-utils/src/WPIntegration/bootstrap-functions.php';

$playSeatsTestsDir = WPIntegration\get_path_to_wp_test_dir();

if ( false === $playSeatsTestsDir ) {
	echo 'Could not locate the WordPress test suite. Set WP_TESTS_DIR.' . PHP_EOL;
	exit( 1 );
}

require_once $playSeatsTestsDir . 'includes/functions.php';

/**
 * Loads the plugin under test.
 *
 * @return void
 */
function play_seats_manually_load_plugin() { // phpcs:ignore Generic.NamingConventions.CamelCapsFunctionName
	require dirname( __DIR__ ) . '/play-seats.php';
}

tests_add_filter( 'muplugins_loaded', 'play_seats_manually_load_plugin' );

WPIntegration\bootstrap_it();
