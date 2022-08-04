<?php

register_nav_menus(
    array(
        'Top' => 'Navigation principale'
    )
);

function yr_add_css() {
	wp_register_style('style', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style( 'style' );
}
add_action('wp_enqueue_scripts','yr_add_css', 1);

function yr_theme_js() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array() );
}
add_action( 'wp_footer', 'yr_theme_js' );

/* Hide admin bar */
function my_function_admin_bar(){ return true; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');
show_admin_bar( false );

function add_search_box($items, $args) {

    ob_start();
    get_search_form();
    $searchform = ob_get_contents();
    ob_end_clean();

    $items .= '<li>' . $searchform . '</li>'; 
    return $items;
}
add_filter('wp_nav_menu_items','add_search_box', 10, 2);

add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
 
function my_posts_where( $where ) {
  $where = str_replace("meta_key = 'ingredients_$", "meta_key LIKE 'ingredients_%", $where);
  return $where;
}
add_filter('posts_where', 'my_posts_where');

/* Suppression de la margin-top du HTML */
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );