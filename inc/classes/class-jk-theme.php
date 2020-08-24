<?php
/**
 * Bootstraps the Theme.
 * 
 * @package Jk
 */

namespace JK_THEME\Inc;

use JK_THEME\Inc\Traits\Singleton;

class JK_THEME {
    use Singleton;

    protected function __construct() {

        // load class.
        Assets::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        // Actions and filters.
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', [
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ],
        ] );
        
        add_theme_support( 'custom-background', [
            'default-color'  => '000000',
            'default-image'  => '',
            'default-repeat' => 'no-repeat',    
        ] );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' );

        global $content_width;
        if ( empty( $content_width ) ) {
            $content_width = 1240;
        }

        add_editor_style();
    }

}