import { test, expect } from '@wordpress/e2e-test-utils-playwright';

test( 'Ajoute le bloc Play Seats Badge dans l’éditeur', async ( {
	admin,
	editor,
}, testInfo ) => {
	test.skip(
		testInfo.project.name !== 'Desktop Chrome',
		'L’éditeur de blocs n’est testé qu’en Desktop.'
	);

	// 1. Ouvrir un nouvel article
	await admin.createNewPost( { showWelcomeGuide: false } );

	// 2. Insérer le bloc depuis l’inserter
	await editor.insertBlock( { name: 'play-seats/seat-badge' } );

	// 3. Vérifier que le bloc est bien enregistré dans le document
	const blocks = await editor.getBlocks();
	expect( blocks ).toContainEqual(
		expect.objectContaining( { name: 'play-seats/seat-badge' } )
	);
} );
