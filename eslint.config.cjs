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
			'playwright.config.mjs',
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
	{
		files: [ 'tests/e2e/**/*.js' ],
		rules: {
			// tests/e2e/package.json scopes ESM; resolve deps from the project root.
			'import/no-extraneous-dependencies': [
				'error',
				{
					devDependencies: true,
					packageDir: __dirname,
				},
			],
		},
	},
];
