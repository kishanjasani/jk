<?php
/**
 * Header template.
 * 
 * @package Jk
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jk</title>
    <?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">

<?php wp_body_open(); ?>

    <div id="page" class="site">
        <header id="masthead" class="site-header" role="banner">
            <?php get_template_part( 'template-parts/header/nav' ); ?>
        </header>
        <div id="content" class="site-content">
        
