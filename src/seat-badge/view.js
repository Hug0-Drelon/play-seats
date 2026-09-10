/**
 * DEMO: Client-side hydration:
 *   1. Read REST URL injected by Plugin.php (window.playSeatsRoute)
 *   2. Fetch GET /wp-json/play/v1/seats
 *   3. Replace the spinner with data.remaining
 */
const restUrl = window.playSeatsRoute;
const badges = document.querySelectorAll( '.play-seats-badge' );

/**
 * Replaces the loading spinner with the seat count on every badge in the document.
 *
 * @param {number|string} remaining Remaining seats, or "—" when the fetch fails.
 */
function updateBadges( remaining ) {
	badges.forEach( ( badge ) => {
		badge.removeAttribute( 'aria-busy' );
		const countEl = badge.querySelector( '.play-seats-badge__count' );
		if ( countEl ) {
			countEl.textContent = String( remaining );
		}
	} );
}

if ( restUrl && badges.length ) {
	fetch( restUrl )
		.then( ( response ) => {
			if ( ! response.ok ) {
				throw new Error( `HTTP ${ response.status }` );
			}

			return response.json();
		} )
		.then( ( data ) => {
			updateBadges( data.remaining );
		} )
		.catch( () => {
			updateBadges( '—' );
		} );
}
