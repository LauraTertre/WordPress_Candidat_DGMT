<?php
add_action('init', 'create_prop_cpt');
function create_prop_cpt(){
  $post_type = "propositions";
  $labels = array(
        'name'               => 'propositions',
        'singular_name'      => 'propositions',
        'all_items'          => 'Toutes les propositions',
        'add_new'            => 'Ajouter une proposition',
        'add_new_item'       => 'Ajouter une propositions',
        'edit_item'          => "Éditer la proposition",
        'new_item'           => 'Nouvelle propositions',
        'view_item'          => "Voir la proposition",
        'search_items'       => 'Rechercher une proposition',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'proposition parent',
        'menu_name'          => 'Propositions',
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
    register_post_type( 'propositions', $args );
    $taxonomy = "thematique";
    $object_type='propositions';
    $args = array(
          'label' => 'Catégorie de proposition',
          'rewrite' => array( 'slug' => 'propositions-categorie' ),
          'hierarchical' => true,
      );
    register_taxonomy( $taxonomy, $object_type, $args );
}