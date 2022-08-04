<?php
// Create Outils
add_action( 'init', 'ingredients_init' );
function ingredients_init() {
  $labels = array(
    'name'               => _x( 'Ingrédients', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Ingrédient', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Les ingrédients', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Les ingrédients', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Ajouter un nouvel ingrédient', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Ajouter un nouvel ingrédient', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Nouvel ingrédient', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Modifier l\'ingrédient', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Voir l\'ingrédient', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Tous les ingrédients', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Chercher un ingrédient', 'your-plugin-textdomain' ),
    'not_found'          => __( 'Aucun ingrédient', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'Aucun ingrédient dans la corbeille', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'ingredients' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'exclude_from_search' => true,
    'supports'           => array( 'title' )
  );

  register_post_type( 'ingredients', $args );
}
