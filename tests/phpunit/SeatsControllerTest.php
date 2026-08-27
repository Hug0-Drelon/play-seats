<?php
/**
 * Integration tests for the seats REST endpoint.
 *
 * @package PlaySeats
 */

namespace PlaySeats\Tests;

use WP_REST_Request;
use WP_UnitTestCase;

/**
 * Verifies the public seats route contract.
 */
class SeatsControllerTest extends WP_UnitTestCase {

	/**
	 * Prepares the REST server.
	 *
	 * @return void
	 */
	public function set_up() { // phpcs:ignore Generic.NamingConventions.CamelCapsFunctionName
		parent::set_up();
		do_action( 'rest_api_init' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
	}

	public function testSeatsEndpointReturnsRemainingSeats() {
		$request  = new WP_REST_Request( 'GET', '/play/v1/seats' );
		$response = rest_get_server()->dispatch( $request );

		$this->assertSame( 200, $response->get_status() );
		$this->assertSame(
			array(
				'remaining' => 42,
				'total'     => 100,
			),
			$response->get_data()
		);
	}
}
