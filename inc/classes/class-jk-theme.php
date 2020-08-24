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
    }

}