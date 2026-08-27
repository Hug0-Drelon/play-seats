const { defineConfig } = require( '@playwright/test' );

/**
 * Playwright is started locally for the live demo (`npm run test:e2e`).
 * Specs are added during the session; none are committed.
 */
module.exports = defineConfig( {
	testDir: __dirname,
	testMatch: '**/*.spec.js',
	use: {
		baseURL: 'http://localhost:8888',
	},
} );
