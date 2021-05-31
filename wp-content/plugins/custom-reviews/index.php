<?php

/*
  Plugin Name: Custom Reviews
  Description: This plugin is just a reviews plugin
  Version: 1.0
  Author: Bilal Khan
*/
include 'assets/templates/table.php';

register_activation_hook( __FILE__, 'table_create' );
// register_activation_hook( __FILE__, 'insertdata' );

function calling_scripts(){
  wp_enqueue_style('custom-style', plugins_url('assets/styles/style.css',__FILE__ ),'', null);
  wp_enqueue_script('custom-script', plugins_url('assets/scripts/script.js',__FILE__),'', null);
}
add_action('admin_enqueue_scripts','calling_scripts');

function show_in_menu(){
  add_menu_page('Custom Reviews', 'Custom Reviews', 'manage_options','review', 'init','dashicons-format-quote', 9);
  add_submenu_page('review', 'Add New Review', 'Add new', 'manage_options', 'add-new-review', 'add_new_review');
}
add_action('admin_menu','show_in_menu');

function init(){
  include 'assets/templates/main.php';
}

function add_new_review(){
  include 'assets/templates/new_review.php';
}

?>