// DEMO: Shared spinner markup for render.php and the block editor.
export function SeatBadgeSpinner() {
	return (
		<svg
			className="play-seats-badge__spinner"
			viewBox="0 0 100 100"
			width="16"
			height="16"
			xmlns="http://www.w3.org/2000/svg"
			role="presentation"
			focusable="false"
		>
			<circle
				className="play-seats-badge__spinner-track"
				cx="50"
				cy="50"
				r="50"
				vectorEffect="non-scaling-stroke"
			/>
			<path
				className="play-seats-badge__spinner-indicator"
				d="m 50 0 a 50 50 0 0 1 50 50"
				vectorEffect="non-scaling-stroke"
			/>
		</svg>
	);
}
