<?php
/**
 * Theme Functions.
 *
 * @package Jk
 */

if ( ! defined( 'JK_DIR_PATH' ) ) {
	define( 'JK_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'JK_DIR_URI' ) ) {
	define( 'JK_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'JK_BUILD_URI' ) ) {
	define( 'JK_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'JK_BUILD_JS_URI' ) ) {
	define( 'JK_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'JK_BUILD_JS_DIR_PATH' ) ) {
	define( 'JK_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'JK_BUILD_IMAGE_URI' ) ) {
	define( 'JK_BUILD_IMAGE_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}

if ( ! defined( 'JK_BUILD_CSS_URI' ) ) {
	define( 'JK_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'JK_BUILD_CSS_DIR_PATH' ) ) {
	define( 'JK_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

require_once JK_DIR_PATH . '/inc/helpers/autoloader.php';
require_once JK_DIR_PATH . '/inc/helpers/template-tags.php';

function jk_get_theme_instance() {
	JK_THEME\Inc\JK_THEME::get_instance();
}
jk_get_theme_instance();

// Remove Guteberg Block Library CSS from loading on frontend.
function jk_remove_block_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wp-block-style' ); // Remove WooCommerce block CSS.
}
// add_action( 'wp_enqueue_scripts', 'jk_remove_block_styles', 100 );
