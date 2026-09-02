<?php
/**
 * REST controller for remaining seats.
 *
 * @package PlaySeats
 */

namespace PlaySeats\Rest;

use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

/**
 * Public GET endpoint returning remaining and total seats.
 *
 * DEMO: REST API for seat availability:
 *   GET /wp-json/play/v1/seats
 *   → { "remaining": 42, "total": 100 }
 */
class SeatsController {

	/**
	 * Registers the collection route.
	 *
	 * @return void
	 */
	public function registerRoute(): void {
		register_rest_route(
			'play/v1',
			'/seats',
			[
				[
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => [ $this, 'getItems' ],
					'permission_callback' => '__return_true',
				],
			]
		);
	}

	/**
	 * Returns the seat counts.
	 *
	 * @param WP_REST_Request $request Incoming request.
	 * @return WP_REST_Response
	 */
	public function getItems( WP_REST_Request $request ): WP_REST_Response {
		unset( $request );

		// DEMO: Mock seat inventory, swap for a real data source in production.
		return rest_ensure_response(
			[
				'remaining' => 42,
				'total'     => 100,
			]
		);
	}
}
