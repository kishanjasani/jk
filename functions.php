<?php
/**
 * Theme Functions.
 * 
 * @package Jk
 */

if ( ! defined( 'JK_DIR_PATH' ) ) {
    define( 'JK_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

require_once JK_DIR_PATH . '/inc/helpers/autoloader.php';

function jk_get_theme_instance() {
    JK_THEME\Inc\JK_THEME::get_instance();
}
jk_get_theme_instance();

function jk_enqueue_scripts() {

    // Register Styles.
    wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( JK_DIR_PATH . '/style.css' ), 'all' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css' , [], false, 'all' );

    // Register Scripts.
    wp_register_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime( JK_DIR_PATH . '/assets/main.js' ), true );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

    // Enqueue Styles.
    wp_enqueue_style( 'stylesheet' );
    wp_enqueue_style( 'bootstrap-css' );

    // Enqueue Scrips.
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
}

add_action( 'wp_enqueue_scripts', 'jk_enqueue_scripts' );
