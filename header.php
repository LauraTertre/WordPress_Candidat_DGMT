<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

        <!-- Appel du fichier style.css de notre thème -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>"/>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="header">
        <nav>
            <?php
            $args=array(
                'theme_location' => 'header',
                'menu' => 'header_fr',
                'menu_class' => 'menu_header',
                'menu_id' => 'menu_id'
            );
            wp_nav_menu($args);
            ?>
        </nav>
        <?php 
        global $post;
        ?>
        </header>