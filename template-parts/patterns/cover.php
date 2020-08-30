<?php
/**
 * Cover Block Patterns Template.
 *
 * @package Jk
 */

?>

<!-- wp:cover {"url":"<?php echo esc_url( JK_BUILD_IMAGE_URI . '/patterns/cover.jpg' ); ?>","id":770,"minHeight":640,"align":"full"} -->
<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(<?php echo esc_url( JK_BUILD_IMAGE_URI . '/patterns/cover.jpg' ); ?>);min-height:640px"><div class="wp-block-cover__inner-container"><!-- wp:heading {"align":"center"} -->
<h2 class="has-text-align-center">Never let your memories be greater than your dreams!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"cyan-bluish-gray"} -->
<p class="has-cyan-bluish-gray-color has-text-color"><strong>Lorem Ipsum</strong>&nbsp;is simply dummied text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"textColor":"cyan-bluish-gray","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-cyan-bluish-gray-color has-text-color">Blogs</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
