import { useEffect, useState } from '@wordpress/element';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

import { SeatBadgeSpinner } from './spinner';

const LOAD_DELAY_MS = 1000;

// DEMO: Editor preview, mirrors the front-end badge while editing.
export default function Edit() {
	const [ isLoading, setIsLoading ] = useState( true );
	const [ remaining, setRemaining ] = useState( null );

	const blockProps = useBlockProps( {
		className: 'play-seats-badge',
	} );

	useEffect( () => {
		const timeoutId = setTimeout( () => {
			fetch( '/wp-json/play/v1/seats' )
				.then( ( response ) => {
					if ( ! response.ok ) {
						throw new Error( `HTTP ${ response.status }` );
					}

					return response.json();
				} )
				.then( ( data ) => {
					setRemaining( data.remaining );
				} )
				.catch( () => {
					setRemaining( '—' );
				} )
				.finally( () => {
					setIsLoading( false );
				} );
		}, LOAD_DELAY_MS );

		return () => clearTimeout( timeoutId );
	}, [] );

	return (
		<div { ...blockProps }>
			<span className="play-seats-badge__count" aria-busy={ isLoading }>
				{ isLoading ? (
					<>
						<SeatBadgeSpinner />
						<span className="screen-reader-text">
							{ __( 'Loading seats…', 'play-seats' ) }
						</span>
					</>
				) : (
					remaining
				) }
			</span>
		</div>
	);
}
