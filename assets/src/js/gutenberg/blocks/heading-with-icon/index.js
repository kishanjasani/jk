/**
 * WordPress Dependencies.
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';

/**
 * Internal dependencies.
 */
import Edit from './edit';

/**
 * Register block type.
 */
registerBlockType( 'jk-blocks/heading', {
	/**
	 * Block title.
	 *
	 * @type {string}
	 */
	title: __( 'Heading with Icon', 'jk' ),

	/**
	 * Block icon.
	 *
	 * @type {string}
	 */
	icon: 'admin-customizer',

	/**
	 * Block description.
	 *
	 * @type {string}
	 */
	description: __( 'Add Heading and select Icons', 'jk' ),

	/**
	 * Block category.
	 *
	 * @type {string}
	 */
	category: 'jk',

	/**
	 * Attributes.
	 */
	attributes: {
		option: {
			type: 'string',
			default: 'dos',
		},
		content: {
			type: 'string',
			source: 'html',
			selector: 'h4',
			default: __( 'Dos', 'jk' ),
		},
	},
	edit: Edit,

	/**
	 * Save function.
	 *
	 * @param {Object} props Props
	 *
	 * @return {Object} Content.
	 */
	save( props ) {
		const {
			attributes: { content },
		} = props;
		return (
			<div>
				<span className="jk-icon-heading__heading" />
				<RichText.Content tagName="h4" value={ content } />
			</div>
		);
	},
} );
