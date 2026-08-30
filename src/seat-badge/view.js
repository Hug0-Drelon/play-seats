import './style.css';

/**
 * DEMO: Client-side hydration:
 *   1. Read REST URL injected by Plugin.php (window.playSeatsRoute)
 *   2. Fetch GET /wp-json/play/v1/seats
 *   3. Replace the spinner with data.remaining
 */
const restUrl = window.playSeatsRoute;
const badge = document.querySelector( '.play-seats-badge' );
const countEl = badge?.querySelector( '.play-seats-badge__count' );

if ( restUrl && countEl ) {
	fetch( restUrl )
		.then( ( response ) => {
			if ( ! response.ok ) {
				throw new Error( `HTTP ${ response.status }` );
			}

			return response.json();
		} )
		.then( ( data ) => {
			countEl.removeAttribute( 'aria-busy' );
			countEl.textContent = String( data.remaining );
		} )
		.catch( () => {
			countEl.removeAttribute( 'aria-busy' );
			countEl.textContent = '—';
		} );
}
