<?php
add_action('init', 'create_member_cpt');
function create_member_cpt(){
  $post_type = "equipe";
  $labels = array(
        'name'               => 'Equipes',
        'singular_name'      => 'Equipe',
        'all_items'          => 'Toutes l equipe',
        'add_new'            => 'Ajouter un membre',
        'add_new_item'       => 'Ajouter une equipe',
        'edit_item'          => "Éditer l equipe",
        'new_item'           => 'Nouvelle equipe',
        'view_item'          => "Voir l equipe",
        'search_items'       => 'Rechercher un membre',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'Equipe parent',
        'menu_name'          => 'Equipe',
    );
    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'supports'            => array( 'title','thumbnail','editor'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 0,
        'menu_icon'           => 'dashicons-video-alt3',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => array( 'slug' => $post_type )
    );
    register_post_type( 'equipe', $args );
    $taxonomy = "genre";
    $object_type='equipe';
    $args = array(
          'label' => 'Catégorie de membre',
          'rewrite' => array( 'slug' => 'equipe-categorie' ),
          'hierarchical' => true,
      );
    register_taxonomy( $taxonomy, $object_type, $args );
}