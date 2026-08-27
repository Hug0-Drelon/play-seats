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
 */
class Plugin {

	/**
	 * Hooks the plugin into WordPress.
	 *
	 * @return void
	 */
	public function register(): void {
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

		register_block_type( $blockPath );

		$route = wp_json_encode( rest_url( 'play/v1/seats' ) );

		if ( ! is_string( $route ) ) {
			return;
		}

		wp_add_inline_script(
			'play-seats-seat-badge-view-script',
			'window.playSeatsRoute = ' . $route . ';',
			'before'
		);
	}
}
