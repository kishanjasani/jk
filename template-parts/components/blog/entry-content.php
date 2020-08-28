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

        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jk' ),
                'after'  => '</div>',
            ]
        );

    } else {
        jk_the_excerpt();
        jk_excerpt_more();
    }

    ?>
</div>
