/**
 * DEMO: Client-side hydration:
 *   1. Read REST URL injected by Plugin.php (window.playSeatsRoute)
 *   2. Fetch GET /wp-json/play/v1/seats
 *   3. Replace the spinner with data.remaining
 */
const restUrl = window.playSeatsRoute;
const badges = document.querySelectorAll( '.play-seats-badge' );

function updateBadges( text ) {
	badges.forEach( ( badge ) => {
		badge.removeAttribute( 'aria-busy' );
		const countEl = badge.querySelector( '.play-seats-badge__count' );
		if ( countEl ) {
			countEl.textContent = text;
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
			updateBadges( `${ data.remaining } places restantes` );
		} )
		.catch( () => {
			updateBadges( '—' );
		} );
}
