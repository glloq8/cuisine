<?php
/*
Plugin name: Disable feed
Description: Disable feed - RSS, Atom...
*/
defined('ABSPATH') or die();

function mu_disable_feed() {
  wp_redirect( esc_url( home_url( '/' ) ), 301 );
  die();
}
add_action( 'do_feed', 'mu_disable_feed' );
add_action( 'do_feed_rdf', 'mu_disable_feed' );
add_action( 'do_feed_rss', 'mu_disable_feed' );
add_action( 'do_feed_rss2', 'mu_disable_feed' );
add_action( 'do_feed_atom', 'mu_disable_feed' );
