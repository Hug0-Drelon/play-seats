import { registerBlockType } from '@wordpress/blocks';

import Edit from './edit';
import metadata from './block.json';

// DEMO: Dynamic block, save() returns null; PHP render.php handles front-end output.
registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
