<?php
/**
 * Front Page Template
 *
 * @package Jk
 */

get_header();
?>

<div id="primary">
	<main id="main" class="site-main mt-5" role="main">
		<div class="home-page-wrap">
			<?php
			if ( have_posts() ) {
				//Start the loop.
				while ( have_posts() ) {

					the_post();

					get_template_part( 'template-parts/content', 'page' );

				}
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
			?>
		</div>
	</main>
</div>

<?php

get_footer();
