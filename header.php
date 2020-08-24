<?php
/**
 * Header template.
 * 
 * @package Jk
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jk</title>
    <?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">

<?php wp_body_open(); ?>

    <header>Header</header>