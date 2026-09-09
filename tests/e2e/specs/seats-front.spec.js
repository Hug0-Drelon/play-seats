import { test, expect } from '@playwright/test';

test( 'Affiche le nombre de places restantes', async ( { page } ) => {
	// 1. Accéder à la page de la keynote
	await page.goto( '/' );

	// 2. Vérifier le décompte affiché après l'appel API REST
	await expect(
		page.getByRole( 'status', { name: 'Remaining seats' } )
	).toHaveText( '42 places restantes' );
} );
