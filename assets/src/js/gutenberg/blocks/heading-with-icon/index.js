import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

registerBlockType( 'jk-blocks/heading', {
	title: __( 'Heading with Icon', 'jk' ),
	icon: 'admin-customizer',
	category: 'jk',
	edit() {
		return <div>Hello From Editor</div>
	},
	save() {
		return <div>Hello From Frontend</div>
	}
} );
