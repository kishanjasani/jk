<?php
/**
 * Enqueue theme assets.
 *
 * @package Jk
 */

namespace JK_THEME\Inc;

use JK_THEME\Inc\Traits\Singleton;

class Assets {
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
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
	}

	/**
	 * Register styles.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_styles() {

		// Register Styles.
		wp_register_style( 'main-css', JK_BUILD_CSS_URI . '/main.css', [ 'bootstrap-css' ], filemtime( JK_BUILD_CSS_DIR_PATH . '/main.css' ), 'all' );
		wp_register_style( 'bootstrap-css', JK_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'bootstrap-css' );
		wp_enqueue_style( 'main-css' );
	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_scripts() {

		// Register Scripts.
		wp_register_script( 'main-js', JK_BUILD_JS_URI . '/main.js', [], filemtime( JK_BUILD_JS_DIR_PATH . '/main.js' ), true );
		wp_register_script( 'bootstrap-js', JK_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

		// Enqueue Scrips.
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'bootstrap-js' );
	}

	public function enqueue_editor_assets() {
		$asset_config_file = sprintf( '%s/assets.php', JK_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = require_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : filemtime( $asset_config_file );

		// Theme Gutenberg block JS.
		if ( is_admin() ) {
			wp_enqueue_script(
				'jk-blocks-js',
				JK_BUILD_JS_URI . '/blocks.js',
				$js_dependencies,
				$version,
				true
			);
		}

		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'jk-blocks-css',
			JK_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			filemtime( JK_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);
	}
}
