const wpPlugin = require( '@wordpress/eslint-plugin' );

module.exports = [
	{
		ignores: [
			'**/build/**',
			'**/node_modules/**',
			'**/vendor/**',
			'coverage/**',
			'playwright-report/**',
			'test-results/**',
			'webpack.config.js',
			'tests/e2e/playwright.config.js',
		],
	},
	...wpPlugin.configs.recommended,
];
