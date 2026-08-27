<?php
/**
 * Play Seats demo theme setup.
 *
 * @package PlaySeats
 */

/**
 * Registers theme features.
 *
 * @return void
 */
function playSeatsDemoSetup(): void {
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'playSeatsDemoSetup' );

/**
 * Enqueues the theme stylesheet.
 *
 * @return void
 */
function playSeatsDemoEnqueueStyles(): void {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'play-seats-demo',
		get_stylesheet_uri(),
		array(),
		is_string( $version ) ? $version : '1.0.0'
	);
}

add_action( 'wp_enqueue_scripts', 'playSeatsDemoEnqueueStyles' );
