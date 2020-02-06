<?php

add_action( 'wp_enqueue_scripts', 'add_aside_styles' );

function add_aside_styles(){

wp_register_style( 'reset_style', get_template_directory_uri() . '../sources/styles/reset.css' );
wp_enqueue_style('reset_style');
wp_register_style( 'main_style', get_template_directory_uri() . '../sources/styles/style.css' );
wp_enqueue_style('main_style');
}
?>