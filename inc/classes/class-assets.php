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
	}

	/**
	 * Register styles.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_styles() {

		// Register Styles.
		wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( JK_DIR_PATH . '/style.css' ), 'all' );
		wp_register_style( 'bootstrap-css', JK_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'style-css' );
		wp_enqueue_style( 'bootstrap-css' );
	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_scripts() {

		// Register Scripts.
		wp_register_script( 'main-js', JK_DIR_URI . '/assets/main.js', [], filemtime( JK_DIR_PATH . '/assets/main.js' ), true );
		wp_register_script( 'bootstrap-js', JK_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

		// Enqueue Scrips.
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'bootstrap-js' );
	}
}
