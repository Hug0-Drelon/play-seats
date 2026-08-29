import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

// DEMO: Editor preview, mirrors the front-end badge while editing.
export default function Edit() {
	const blockProps = useBlockProps({
		className: 'play-seats-badge',
	});

	return (
		<div {...blockProps}>
			<span className="play-seats-badge__count">
				{__('Loading…', 'play-seats')}
			</span>
		</div>
	);
}
