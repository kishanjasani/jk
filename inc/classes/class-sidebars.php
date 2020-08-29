<?php
/**
 * Register Sidebars.
 *
 * @package Jk
 */

namespace JK_THEME\Inc;

use JK_THEME\Inc\Traits\Singleton;

class Sidebars {
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
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
		add_action( 'widgets_init', [ $this, 'register_widgets' ] );
	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_sidebars() {
		register_sidebar(
			[
				'name'          => __( 'Sidebar', 'jk' ),
				'id'            => 'sidebar-1',
				'description'   => __( 'Main sidebar', 'jk' ),
				'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => __( 'Footer', 'jk' ),
				'id'            => 'sidebar-2',
				'description'   => __( 'Footer sidebar', 'jk' ),
				'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
	}

	public function register_widgets() {
		register_widget( 'JK_THEME\Inc\Clock_Widget' );
	}
}
