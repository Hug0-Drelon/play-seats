# Play Seats

WordPress plugin that provides a dynamic Gutenberg block displaying the remaining seats for a play. The local environment includes a Twenty Twenty-Five child theme for the demonstration.

## Requirements

- Node.js 24+
- PHP 8.4
- Docker (for [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/))
- Composer (installed automatically inside the wp-env development container)

## Setup

```bash
npm install
npm run env:start
npm run env:composer -- update
npm run build
```

The development site is available at [http://localhost:8888](http://localhost:8888) (admin: `admin` / `password`).

## Scripts

| Command | Description |
| --- | --- |
| `npm run build` | Compile front-end assets with `@wordpress/scripts` |
| `npm run start` | Watch mode for assets |
| `npm run env:start` | Start the development wp-env (port 8888) |
| `npm run env:stop` | Stop the development wp-env |
| `npm run env:test:start` | Start the test wp-env (port 8889) |
| `npm run env:test:stop` | Stop the test wp-env |
| `npm run env:start:all` | Start both development and test environments |
| `npm run env:stop:all` | Stop both development and test environments |
| `npm run env:composer -- <args>` | Run Composer in the plugin directory inside the development wp-env |
| `npm run env:test:composer -- <args>` | Run Composer in the plugin directory inside the test wp-env |
| `npm run lint:js` | ESLint |
| `npm run lint:php` | PHPCS and PHPStan (requires a running environment) |
| `npm run test:php` | PHPUnit integration tests (requires a running environment) |
| `npm run test:e2e` | Playwright (local / demo; not run in CI) |

## Continuous integration

GitHub Actions runs ESLint, PHPCS, PHPStan, and PHPUnit on every push and pull request. The browser test remains a local demonstration command.

## License

MIT
