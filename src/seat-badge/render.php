<?php
/**
 * Server-side rendering for the seat badge block.
 *
 * @package PlaySeats
 */

?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'play-seats-badge' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by WordPress. ?>>
	<span class="play-seats-badge__count"><?php esc_html_e( 'Loading…', 'play-seats' ); ?></span>
</div>
