<?php
/*
Plugin Name: Open graph
Description: Ajout d'open graph
*/
// Ajout d'Open Graph pour le Doctype
function add_opengraph_doctype( $output ) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

function insert_opengraph_in_head() {
  global $post;
  if ( !is_singular()) // On vérifie si nous somme dans un article ou une page
  return;
  echo '<meta property="og:title" content="' . get_the_title() . '"/>';
  echo '<meta property="og:type" content="article"/>';
  echo '<meta property="og:url" content="' . get_permalink() . '"/>';
  echo '<meta property="og:description" content="' .strip_tags(get_the_excerpt($post->ID)) . '" />';
  echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
  $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
  echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
  echo '<link rel="image_src" href="'. esc_attr( $thumbnail_src[0] ) . '" />';
}
add_action( 'wp_head', 'insert_opengraph_in_head', 5 );
?>
