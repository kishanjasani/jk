<?php
/**
 * The template part for displaying a message that posts cannot be found.
 * 
 * @package Jk
 */

?>

<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'jk' ); ?></h1>
    </header>
    <div class="page-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) {
            ?>
            <p>
                <?php
                printf(
                    wp_kses(
                        __( 'Ready to publish your first post? <a href="%1$s">Get Started here</a>', 'jk' ),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                ?>
            </p>
            <?php
        } elseif ( is_search() ) {
            ?>
            <p><?php esc_html_e( 'Sorry but not found your page!', 'jk' ); ?></p>
            <?php
            get_search_form();
        } else {
            ?>
            <p><?php esc_html_e( 'No posts found!', 'jk' ); ?></p>
            <?php
            get_search_form();
        }
        ?>
    </div>
</section>
