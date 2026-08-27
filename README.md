# Play Seats

WordPress plugin that provides a dynamic Gutenberg block displaying the remaining seats for a play. The local environment includes a Twenty Twenty-Five child theme for the demonstration.

## Requirements

- Node.js 20+
- Docker (for [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/))
- Composer (installed automatically inside the wp-env tests container)

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
| `npm run env:start` | Start wp-env |
| `npm run env:stop` | Stop wp-env |
| `npm run env:composer -- <args>` | Run Composer in the plugin directory inside wp-env |
| `npm run lint:js` | ESLint |
| `npm run lint:php` | PHPCS and PHPStan (requires a running environment) |
| `npm run test:php` | PHPUnit integration tests (requires a running environment) |
| `npm run test:e2e` | Playwright (local / demo; not run in CI) |

## Continuous integration

GitHub Actions runs ESLint, PHPCS, PHPStan, and PHPUnit on every push and pull request. The browser test remains a local demonstration command.

## License

MIT
