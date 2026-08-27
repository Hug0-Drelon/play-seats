const restUrl = window.playSeatsRoute;

if (restUrl) {
	// Update the seat badge with the API payload.
	const badge = document.querySelector('.play-seats-badge');

	fetch(restUrl)
		.then((response) => response.json())
		.then((data) => {
			badge.querySelector('.play-seats-badge__count').textContent =
				String(data.remaining);
		});
}
