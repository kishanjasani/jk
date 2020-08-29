<?php
/**
 * Register Menus.
 *
 * @package Jk
 */

namespace JK_THEME\Inc;

use JK_THEME\Inc\Traits\Singleton;

class Menus {
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
		add_action( 'init', [ $this, 'register_menus' ] );
	}

	/**
	 * Register menus.
	 *
	 * @action init
	 */
	public function register_menus() {

		register_nav_menus([
			'jk-header-menu' => esc_html__( 'Header Menu', 'jk' ),
			'jk-footer-menu' => esc_html__( 'Footer Menu', 'jk' ),
		]);
	}

	public function get_menu_id( $location ) {

		// Get all locations.
		$locations = get_nav_menu_locations();

		// Get menu id by location.
		$menu_id =  $locations[ $location ];

		return ! empty( $menu_id ) ? $menu_id : '';
	}

	public function get_child_menu_items( $menu_array, $parent_id ) {

		$child_menus = [];

		if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
			foreach ( $menu_array as $menu ) {
				if ( intval( $menu->menu_item_parent ) === $parent_id ) {
					array_push( $child_menus, $menu );
				}
			}
		}

		return $child_menus;
	}

}
