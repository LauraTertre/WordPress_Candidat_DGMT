<?php

add_action('wp_enqueue_scripts','add_aside_scripts');
function add_aside_scripts()
{


  wp_register_script('main.js', get_template_directory_uri() . '/sources/js/script.js', array(),'1', true);
  wp_enqueue_script('main.js');

}