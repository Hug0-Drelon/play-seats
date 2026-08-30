import { addFilter } from '@wordpress/hooks';
import { registerBlockType } from '@wordpress/blocks';

import Edit from './edit';
import metadata from './block.json';
import './style.css';

// DEMO: Dynamic block, save() returns null; PHP render.php handles front-end output.
registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );

addFilter(
	'blocks.registerBlockType',
	'play-seats/seat-badge-add-to-navigation',
	( settings, name ) => {
		if ( name !== 'core/navigation' ) {
			return settings;
		}

		return {
			...settings,
			allowedBlocks: [
				...( settings.allowedBlocks ?? [] ),
				metadata.name,
			],
		};
	}
);
