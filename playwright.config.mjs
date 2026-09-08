import { defineConfig, devices } from '@playwright/test';

export default defineConfig( {
	testDir: './tests/e2e',

	// 1. Initialiser WordPress & activer le plugin Play Seats
	globalSetup: './tests/e2e/global.setup.mjs',

	use: {
		baseURL: 'http://localhost:8889',
		trace: 'on-first-retry',
	},

	// 2. Les deux scènes de test : Desktop et Mobile
	projects: [
		{
			name: 'Desktop Chrome',
			use: { ...devices[ 'Desktop Chrome' ] },
		},
		{
			name: 'Mobile Safari',
			use: { ...devices[ 'iPhone 14' ] },
		},
	],
} );
