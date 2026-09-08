import { RequestUtils } from '@wordpress/e2e-test-utils-playwright';

/**
 * Initialise WordPress avant la suite E2E :
 * active le plugin Play Seats et le thème de démo via l'API REST.
 */
export default async function globalSetup() {
	const requestUtils = await RequestUtils.setup( {
		baseURL: 'http://localhost:8889',
		user: {
			username: 'admin',
			password: 'password',
		},
	} );

	await requestUtils.activatePlugin( 'play-seats' );
	await requestUtils.activateTheme( 'play-seats-demo' );
}
