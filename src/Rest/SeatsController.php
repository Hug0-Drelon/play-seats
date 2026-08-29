<?php
/**
 * REST controller for remaining seats.
 *
 * @package PlaySeats
 */

namespace PlaySeats\Rest;

use WP_REST_Controller;
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
class SeatsController extends WP_REST_Controller {

	/**
	 * REST API namespace.
	 */
	private const ROUTE_NAMESPACE = 'play/v1';

	/**
	 * Sets the REST namespace and route base.
	 */
	public function __construct() {
		$this->namespace = self::ROUTE_NAMESPACE;
		$this->rest_base = 'seats'; // phpcs:ignore Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps -- WP_REST_Controller property.
	}

	/**
	 * Registers the collection route.
	 *
	 * @return void
	 */
	public function register_routes() { // phpcs:ignore Generic.NamingConventions.CamelCapsFunctionName
		register_rest_route(
			self::ROUTE_NAMESPACE,
			'/' . $this->rest_base, // phpcs:ignore Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps -- WP_REST_Controller property.
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'getItems' ),
					'permission_callback' => '__return_true',
				),
			)
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
			array(
				'remaining' => 42,
				'total'     => 100,
			)
		);
	}
}
