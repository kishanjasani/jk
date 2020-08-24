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

require_once JK_DIR_PATH . '/inc/helpers/autoloader.php';

function jk_get_theme_instance() {
    JK_THEME\Inc\JK_THEME::get_instance();
}
jk_get_theme_instance();
