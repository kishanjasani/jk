<?php
/**
 * Custom Blocks.
 *
 * @package Jk
 */

namespace JK_THEME\Inc\Blocks;

use JK_THEME\Inc\Traits\Singleton;

class Blocks {
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
		add_action( 'block_categories', [ $this, 'add_block_categories' ] );
	}

	public function add_block_categories( $categories ) {
		$category_slugs = wp_list_pluck( $categories, 'slug' );
		return in_array( 'jk', $category_slugs, true ) ? $category_slugs :
			array_merge(
				$categories,
				[
					[
						'slug'  => 'jk',
						'title' => __( 'Jk Blocks', 'jk' ),
						'icon'  => 'table-row-after',
					]
				]
			);
	}
}
