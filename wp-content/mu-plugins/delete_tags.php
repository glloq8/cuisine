<?php
/*
Plugin Name: Delete tags
Description: Suppression des tags (mots clés)
*/
/* suppression de la metabox des tags et des formats sur la page d'ajout/edition de posts */
function yr_remove_tags_metabox() {
    remove_meta_box('tagsdiv-post_tag', 'post', 'side');
}
add_action('admin_menu', 'yr_remove_tags_metabox');
/* suppression de la colonne "Mots-clefs" sur la liste des articles */
function yr_remove_tags_column($defaults) {
    unset($defaults['tags']);
    return $defaults;
}
add_filter( 'manage_posts_columns', 'yr_remove_tags_column');
/* suppression du menu "Mots-clefs" */
function yr_remove_tags_menu() {
    global $submenu;
    unset($submenu['edit.php'][16]);
}
add_action('admin_head', 'yr_remove_tags_menu');
