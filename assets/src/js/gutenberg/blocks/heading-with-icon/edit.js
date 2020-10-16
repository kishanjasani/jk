import { RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

const Edit = ( { className, attributes, setAttributes } ) => {

	const { content } = attributes;

	return (
		<div className='jk-icon-heading'>
			<span className='jk-icon-heading__heading' />
			<RichText
				tagName='h4'
				className={ className }
				value={ content }
				onChange={ ( content ) => { setAttributes( { content } ) } }
				placeholder={ __( 'Heading..', 'jk' ) }
			/>
		</div>
	);
}

export default Edit;
