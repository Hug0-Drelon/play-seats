/**
 * DEMO: Client-side hydration:
 *   1. Read REST URL injected by Plugin.php (window.playSeatsRoute)
 *   2. Fetch GET /wp-json/play/v1/seats
 *   3. Replace the spinner with data.remaining
 */
const restUrl = window.playSeatsRoute;
const badge = document.querySelector( '.play-seats-badge' );
const countEl = badge?.querySelector( '.play-seats-badge__count' );

/**
 * Replaces the loading spinner with the seat count on the first badge in the document.
 *
 * @param {number|string} remaining Remaining seats, or "—" when the fetch fails.
 */
function updateBadges( remaining ) {
	badge?.removeAttribute( 'aria-busy' );
	if ( countEl ) {
		countEl.textContent = String( remaining );
	}
}

if ( restUrl && countEl ) {
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
