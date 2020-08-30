<?php
/**
 * Page Content template.
 *
 * @package Jk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
	<?php
	if ( ! is_home() ) {
		?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<?php
	}
	?>
	<div class="entry-content">
		<?php
		the_content();
		if ( ! is_home() ) {
			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jk' ),
					'after'  => '</div>',
				]
			);
		}
		?>
	</div>
	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'jk' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
