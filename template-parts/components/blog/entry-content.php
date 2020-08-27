<?php
/**
 * Template for entry content.
 * 
 * @package Jk
 */

?>

<div class="entry-content">
    <?php
    if ( is_single() ) {
        the_content(
            sprintf( 
                wp_kses(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jk' ),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false ) 
            )
        );
    } else {
        jk_the_excerpt();
    }
    ?>
</div>
