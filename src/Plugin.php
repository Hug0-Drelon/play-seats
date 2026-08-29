<?php
/**
 * Plugin bootstrap.
 *
 * @package PlaySeats
 */

namespace PlaySeats;

use PlaySeats\Rest\SeatsController;

/**
 * Registers REST routes and the seat badge block.
 *
 * DEMO: Architecture overview:
 *   REST API (SeatsController) ← view.js fetch ← seat badge block (render.php)
 */
class Plugin {

	/**
	 * Hooks the plugin into WordPress.
	 *
	 * @return void
	 */
	public function register(): void {
		// DEMO: Two integration points, a REST API and a dynamic Gutenberg block.
		add_action( 'rest_api_init', array( $this, 'registerRestRoutes' ) );
		add_action( 'init', array( $this, 'registerBlock' ) );
	}

	/**
	 * Registers the seats REST controller.
	 *
	 * @return void
	 */
	public function registerRestRoutes(): void {
		$controller = new SeatsController();
		$controller->register_routes();
	}

	/**
	 * Registers the dynamic seat badge block.
	 *
	 * @return void
	 */
	public function registerBlock(): void {
		$blockPath = plugin_dir_path( PLAY_SEATS_FILE ) . 'build/seat-badge';

		if ( ! is_readable( $blockPath . '/block.json' ) ) {
			return;
		}

		// DEMO: Block metadata lives in block.json; compiled assets in build/seat-badge/.
		register_block_type( $blockPath );

		$route = wp_json_encode( rest_url( 'play/v1/seats' ) );

		if ( ! is_string( $route ) ) {
			return;
		}

		// DEMO: Pass the REST URL to view.js so the front end can hydrate the badge.
		wp_add_inline_script(
			'play-seats-seat-badge-view-script',
			'window.playSeatsRoute = ' . $route . ';',
			'before'
		);
	}
}
