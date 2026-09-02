<?php
/**
 * Server-side rendering for the seat badge block.
 *
 * @package PlaySeats
 */

?>
<?php // DEMO: Server-side render, outputs a spinner placeholder; view.js replaces it with live data. ?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'play-seats-badge' ] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by WordPress. ?>>
	<span class="play-seats-badge__count" aria-busy="true">
		<svg class="play-seats-badge__spinner" viewBox="0 0 100 100" width="16" height="16" xmlns="http://www.w3.org/2000/svg" role="presentation" focusable="false">
			<circle class="play-seats-badge__spinner-track" cx="50" cy="50" r="50" vector-effect="non-scaling-stroke" />
			<path class="play-seats-badge__spinner-indicator" d="m 50 0 a 50 50 0 0 1 50 50" vector-effect="non-scaling-stroke" />
		</svg>
		<span class="screen-reader-text"><?php esc_html_e( 'Loading seats…', 'play-seats' ); ?></span>
	</span>
</div>
