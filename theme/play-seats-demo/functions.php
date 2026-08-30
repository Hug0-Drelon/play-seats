<?php
/**
 * Play Seats demo theme setup.
 *
 * DEMO: Twenty Twenty-Five child theme — embeds the seat badge in the site header.
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
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor.css' );
}

add_action( 'after_setup_theme', 'playSeatsDemoSetup' );

/**
 * Enqueues editor-only styles for the Site Editor canvas.
 *
 * @return void
 */
function playSeatsDemoEnqueueEditorStyles(): void {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'play-seats-demo-editor',
		get_stylesheet_directory_uri() . '/editor.css',
		array(),
		is_string( $version ) ? $version : '1.0.0'
	);
}

add_action( 'enqueue_block_editor_assets', 'playSeatsDemoEnqueueEditorStyles' );

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
