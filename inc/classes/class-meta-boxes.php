<?php
/**
 * Register Meta Boxes.
 *
 * @package Jk
 */

namespace JK_THEME\Inc;

use JK_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		// Actions and filters.
		add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_post_meta_data' ] );
	}

	public function add_custom_meta_box( $post ) {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',
				__( 'Hide page title', 'jk' ),
				[ $this, 'custom_meta_box_html' ],
				$screen,
				'side'
			);
		}
	}

	public function custom_meta_box_html( $post ) {
		$value = get_post_meta( $post->ID, '_hide_page_title', true );

		/**
		 * Use nonce for verification.
		 */
		wp_nonce_field( plugin_basename( __FILE__ ), 'jk_hide_title_meta_box_nonce' );

		?>
		<label for="jk-hide-title-field"><?php esc_html_e( 'Hide the page title', 'jk' ); ?></label>
		<select name="jk_hide_title_field" id="jk-hide-title-field" class="">
			<option value=""><?php esc_html_e( 'Select', 'jk' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'jk' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'jk' ); ?>
			</option>
		</select>
		<?php
	}

	public function save_post_meta_data( $post_id ) {

		/**
		 * Nonce verification & Authorization.
		 */
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( empty( $_POST['jk_hide_title_meta_box_nonce'] ) ||
			! wp_verify_nonce( $_POST['jk_hide_title_meta_box_nonce'], plugin_basename( __FILE__ ) )
		) {
			return;
		}


		if ( array_key_exists( 'jk_hide_title_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST['jk_hide_title_field']
			);
		}
	}

}
