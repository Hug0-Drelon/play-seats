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
	{
		rules: {
			// @wordpress/* packages are editor runtime externals (window.wp.*).
			// List them in peerDependencies so import/no-extraneous-dependencies allows them.
			'import/no-unresolved': [
				'error',
				{
					ignore: [ '^@wordpress/' ],
				},
			],
		},
	},
];
