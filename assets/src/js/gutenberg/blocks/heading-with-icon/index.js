import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';
import Edit from './edit';

registerBlockType( 'jk-blocks/heading', {
	title: __( 'Heading with Icon', 'jk' ),
	icon: 'admin-customizer',
	category: 'jk',
	attributes: {
		option: {
			type: 'string',
			default: 'dos',
		},
		content: {
			type: 'string',
			source: 'html',
			selector: 'h4',
			default: __( 'Dos', 'jk' )
		}
	},
	edit: Edit,
	save({ attributes: { content } }) {
		return (
			<div>
				<span className='jk-icon-heading__heading' />
				<RichText.Content
					tagName='h4'
					value={ content }
				/>
			</div>
		)
	}
} );
