import { request } from '@playwright/test';
import { RequestUtils } from '@wordpress/e2e-test-utils-playwright';

const BASE_URL = 'http://localhost:8889';
const STORAGE_STATE_PATH = 'artifacts/storage-states/admin.json';

/**
 * Initialise WordPress avant la suite E2E :
 * authentifie l'admin, active le plugin et le thème de démo.
 */
export default async function globalSetup() {
	const requestContext = await request.newContext( { baseURL: BASE_URL } );
	const requestUtils = new RequestUtils( requestContext, {
		storageStatePath: STORAGE_STATE_PATH,
	} );

	await requestUtils.setupRest();
	await requestUtils.activatePlugin( 'play-seats' );
	await requestUtils.activateTheme( 'play-seats-demo' );

	await requestContext.dispose();
}
