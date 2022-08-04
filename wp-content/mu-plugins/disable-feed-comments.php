<?php
/*
Plugin name: Disable feed comments
Description: Disable feed comments - RSS, Atom...
*/
defined('ABSPATH') or die();

function mu_disable_feed_comments() {
  wp_redirect( esc_url( home_url( '/' ) ), 301 );
  die();
}
add_action( 'do_feed_rss2_comments', 'mu_disable_feed_comments' );
add_action( 'do_feed_atom_comments', 'mu_disable_feed_comments' );
