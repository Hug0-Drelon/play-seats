import { test, expect } from '@playwright/test';

test( 'Affiche le nombre de places restantes', async ( { page } ) => {
	// 1. Accéder à la page de la keynote
	await page.goto( '/' );

	// 2. Cibler le badge des places
	const seatBadge = page.getByRole( 'status', { name: 'Remaining seats' } );

	// 3. Vérifier que le badge affiche le décompte après l'appel API
	await expect( seatBadge ).toHaveText( '42' );
} );
