/**
 * WordPress Dependencies.
 */
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';

/**
 * Edit
 *
 * @param {Object} props Props.
 *
 * @return {Object} Content.
 */
const Edit = ( props ) => {
	const { className, attributes, setAttributes } = props;
	const { content } = attributes;

	return (
		<div className="jk-icon-heading">
			<span className="jk-icon-heading__heading" />
			<RichText
				tagName="h4"
				className={ className }
				value={ content }
				onChange={ ( contentVal ) => {
					setAttributes( { content: contentVal } );
				} }
				placeholder={ __( 'Heading..', 'jk' ) }
			/>
		</div>
	);
};

export default Edit;
