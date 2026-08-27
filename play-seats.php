<?php
/**
 * Plugin Name:       Play Seats
 * Description:       Displays remaining seats for a play.
 * Version:           1.0.0
 * Requires at least: 6.8
 * Requires PHP:      8.1
 * Author:            Play Seats
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       play-seats
 *
 * @package PlaySeats
 */

defined( 'ABSPATH' ) || exit;

define( 'PLAY_SEATS_VERSION', '1.0.0' );
define( 'PLAY_SEATS_FILE', __FILE__ );

if ( ! is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	return;
}

require_once __DIR__ . '/vendor/autoload.php';

( new PlaySeats\Plugin() )->register();
