<?php
/*
Plugin Name: Désactiver Gutenberg
Description: Retour à l'éditeur classique
*/
add_filter('use_block_editor_for_post', '__return_false');
