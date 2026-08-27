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
 */
class SeatsController extends WP_REST_Controller {

	/**
	 * Route base (not the core `$rest_base` property).
	 *
	 * @var string
	 */
	protected $restBase = 'seats';

	/**
	 * Sets the REST namespace.
	 */
	public function __construct() {
		$this->namespace = 'play/v1';
	}

	/**
	 * Registers the collection route.
	 *
	 * @return void
	 */
	public function register_routes() { // phpcs:ignore Generic.NamingConventions.CamelCapsFunctionName
		register_rest_route(
			'play/v1',
			'/' . $this->restBase,
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

		return rest_ensure_response(
			array(
				'remaining' => 42,
				'total'     => 100,
			)
		);
	}
}
